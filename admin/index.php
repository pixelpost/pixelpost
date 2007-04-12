<?php

// SVN file version:
// $Id$

/*

Pixelpost version 1.6

Pixelpost www: http://www.pixelpost.org/

Version 1.6:
Development Team:
Ramin Mehran, Connie Mueller-Goedecke, Will Duncan, Joseph Spurling, 
Piotr "GeoS" Galas, Dennis Mooibroek, Karin Uhlig, Jay Williams, David Kozikowski
Version 1.1 to Version 1.3: Linus <http://www.shapestyle.se>

Contact: thecrew (at) pixelpost (dot) org
Copyright 2006 Pixelpost.org <http://www.pixelpost.org>


License: http://www.gnu.org/copyleft/gpl.html

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.

*/
// variable clean up
if(isset($_GET["loginmessage"]) || isset($_POST["loginmessage"]))	$loginmessage = "";

// variable saying we are inside admin panel (i.e. to use in addons)
$admin_panel = 1;

error_reporting(0);
session_start();

if (isset($_GET['errors']) && $_SESSION["pixelpost_admin"]){
	error_reporting(E_ALL ^ E_NOTICE);
	
}elseif(isset($_GET['errorsall']) && $_SESSION["pixelpost_admin"]){
	error_reporting(E_ALL);
	
}

require("../includes/pixelpost.php");
require("../includes/functions.php");

$pixelpost_prefix_used = $pixelpost_db_prefix;
start_mysql();

// added to allow upgrades
// This will be 0 for clean install, 1.3 for that version, 1.4+ for newer versions...
$installed_version = Get_Pixelpost_Version($pixelpost_db_prefix);
if( $installed_version < 1.6 )
{
	header("Location: install.php");
	exit;
}

// Changed to allow upgrades
if($cfgquery = mysql_query("select * from ".$pixelpost_db_prefix."config"))
{
	$cfgrow = mysql_fetch_assoc($cfgquery);
	$upload_dir = $cfgrow['imagepath'];
} else {
	header("Location: install.php");
	exit;
}

/* Special language file for Admin-Section, default is english */
if($cfgrow = sql_array("SELECT * FROM ".$pixelpost_db_prefix."config"))
{
	if (file_exists("../language/admin-lang-".$cfgrow['langfile'].".php"))
	{
		$admin_lang_file_name = "admin-lang-".$cfgrow['langfile'];
	}
	else
	{
		if (file_exists("../language/admin-lang-english.php"))
		{
			$admin_lang_file_name = "admin-lang-english";
		}
		else
		{
			echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
					 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
					<html>
					<head><title="Error, missing language file"></head><body>
					<hr/><p style="color:black;font-weight:bold;margin-left:20%;font-family:verdana,arial,sans-serif;">Attention! Take care, that at least the file <br /><br />
					<i style="color:red;font-size:bigger">admin-lang-english.php</i><br />
					<br />sits in the directory <i style="color:red;font-size:bigger">language</i>.<br /><br />
					You can find this file in the Pixelpost-ZIP-File in the directory <i style="color:red;font-size:bigger">language</i>.<br />
					<br />Please upload it to your server!</p><hr/></body></html>';
			exit;
		}
	}
}

require("../language/".$admin_lang_file_name.".php");

// check whether the language-files for the public part exist
if (file_exists("../language/lang-".$cfgrow['langfile'].".php"))
{
	require("../language/lang-".$cfgrow['langfile'].".php");
}
else
{
	echo '<b>$admin_lang_error :</b><br />$admin_start_1 <b>"lang-' .$cfgrow['langfile'] .'.php"</b> $admin_start_2';
	exit;
}

/************************ BEGINNING OF LOGIN STUFF ************************/

// forgot password?
include('pass_recovery.php');

// autologin data are valid and cookies are set for a week (604800 seconds)
if(($cfgrow['admin'] == $_COOKIE['pp_user']) AND (sha1($cfgrow['password'].$_SERVER["REMOTE_ADDR"]) === $_COOKIE['pp_password']) AND !isset($_SESSION["pixelpost_admin"]))
{
  error_reporting('E_ALL');
  unset($login);
  $_SESSION["pixelpost_admin"] = $cfgrow['password'];
  setcookie( "pp_user", $_COOKIE['pp_user'], time()+604800);
  setcookie( "pp_password", sha1($cfgrow['password'].$_SERVER["REMOTE_ADDR"]), time()+604800);
}

if($_GET['x'] == "login")
{
	$cfgrow_password = md5($_POST['password']);
	if(($cfgrow['admin'] == $_POST['user']) AND ($cfgrow_password == $cfgrow['password']))
	{
		error_reporting('E_ALL');
		// login is valid, set session
		unset($login);
		$_SESSION["pixelpost_admin"]  = $cfgrow_password;

		// set autologin cookie
		if($_POST['remember'] == 'on')
		{
			setcookie( "pp_user", $_POST['user'], time()+604800);
			setcookie( "pp_password", sha1($cfgrow_password.$_SERVER["REMOTE_ADDR"]), time()+604800);
		}
		header("Location:index.php");
	}
	else
	{
      $loginmessage = "$admin_start_userpw <br />
        <a href='#' onclick=\"flip('askforpass'); return false;\">$admin_start_pw_forgot</a><br /><br />
        ";
	}
} // if (login = yes) end

if($_GET['x'] == "logout")
{
	unset($_SESSION["pixelpost_admin"]);
	setcookie( "pp_user", "", time()-36000);
	setcookie( "pp_password", "", time()-36000);
	header("Location:index.php");
}

if(!isset($_SESSION["pixelpost_admin"]))
{
	// cookie is not set, send them to a form
	$login = "true";
} else {
	// cookie exists, check for validity
	if($cfgrow['password'] != $_SESSION["pixelpost_admin"])	$login = "true";
}

/************************ END OF LOGIN STUFF ************************/

//------------- addons in admin panel begins
// refresh the addons table
$dir = "../addons/";
refresh_addons_table($dir);

$addon_admin_functions = array(0 => array('function_name' => '','workspace' => '','menu_name' => '','submenu_name' => ''));
create_admin_addon_array();

if($cfgrow['crop']=="12c" && isset($_SESSION["pixelpost_admin"]))
{
	require("../includes/12cropimageinc.php");
}
//------------- addons in admin panel ends

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title><?php echo $cfgrow['sitetitle'];?> <?php echo $admin_start_browser_title;?></title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<meta name="robots" content="noindex" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="pragma" content="no-cache" />
<link rel="stylesheet" type="text/css" href="admin_index.css" />
<script src="script.js" type="text/javascript"></script>
<script type="text/javascript">
function confirmDeleteImg()
{
var agree=confirm("<?php echo $admin_lang_imgedit_js_del_im;?>");
if (agree) return true ;
else return false ;
}

function confirmDeleteComment()
{
var agree2=confirm("<?php echo $admin_lang_cmnt_js_del_comm;?>");
if (agree2) return true ;
else  return false ;
}
var installed_ver = <?php echo $installed_version;?>;
</script>

<?php
if
($cfgrow['crop']=="12c" &&  ( (!isset($_GET['view']) && isset($_GET['x']) && $_GET['x']=='save')  ||  ($_GET['view']=="images" && isset($_GET['id'])))){
	require("../includes/12cropimageincscripts.php");
}
eval_addon_admin_workspace_menu('admin_html_head');
?>

</head>
<body>
<div id="wrapper">

<?php
if($login == "true")
{
    ?>
	<div id="header">
<a href="index.php"><?php echo $admin_start_admin_1;?></a>&nbsp;<?php echo $admin_start_admin_2;?> <a href="../" title="<?php echo $admin_start_pp_tit;?>"><?php echo $cfgrow['sitetitle']; ?></a>
</div>
    <div id="caption">
   <?php echo $admin_start_welcome;?>
    </div>
    <div class='jcaption'>
   <?php echo $admin_start_cookie; ?>
    </div>
    <div class="content">
    <form method="post" action="<?php echo $PHP_SELF; ?>?x=login" accept-charset="UTF-8">
    <?php echo $admin_start_username;?> <br />
    <input type="text" name="user" class="input" /><br /><br />
    <?php echo $admin_start_pw;?> <br />
    <input type="password" name="password" class="input" /><br /><br />
    <?php echo $admin_start_remember;?>
    <input type="checkbox" name="remember" class="input" /><br /><br />
    <input type="submit" value="Login" /><br /><br />
    <?php echo $loginmessage; ?>
    </form>
    <div id='askforpass'><script type='text/javascript'>flip('askforpass');</script>
    <hr />
    <?php echo $admin_start_pw_recover;?>
    <form method='post' action='?x=passreminder' accept-charset='UTF-8'>
    <?php echo $admin_start_username;?><br /> <input type="text" name="user" class="input" /><br /><br />
    <?php echo $admin_start_email;?><br /> <input type='text' name='reminderemail' value='<?php echo $admin_start_email_button;?>' />
    <input type='submit' value='<?php echo $admin_start_pw_button;?>' />
    </form></div>
    </div></div>
	 </body></html>
    <?php
    exit();
}
?>

<div id="header">
<a href="index.php"><?php echo $admin_start_admin_1;?></a>&nbsp;<?php echo $admin_start_admin_2;?> <a href="../" title="<?php echo $admin_start_pp_tit;?>"><?php echo $cfgrow['sitetitle']; ?></a>
</div>

<div id="navigation">
<a href="<?php echo $PHP_SELF; ?>?"><?php echo $admin_lang_new_image; ?></a>
<a href="<?php echo $PHP_SELF; ?>?view=images"><?php echo $admin_lang_images ?></a>
<a href="<?php echo $PHP_SELF; ?>?view=categories"><?php echo $admin_lang_categories ?></a>
<a href="<?php echo $PHP_SELF; ?>?view=comments"><?php echo $admin_lang_comments ?></a>
<a href="<?php echo $PHP_SELF; ?>?view=options"><?php echo $admin_lang_options ?></a>
<a href="<?php echo $PHP_SELF; ?>?view=info"><?php echo $admin_lang_general_info ?></a>
<a href="<?php echo $PHP_SELF; ?>?view=addons"><?php echo $admin_lang_addons ?></a>
<?php eval_addon_admin_workspace_menu('admin_main_menu'); ?>
<a href="<?php echo $PHP_SELF; ?>?x=logout"><?php echo $admin_lang_logout ?></a>
</div>

<?php
// new image
include('new_image.php');

// view = addons
include('view_addons.php');

// options
include('options.php');

// view=images
include('images_edit.php');

// view=comments
include('comments.php');

// view=info
include('view_info.php');


// view=categories
include('categories.php');

eval_addon_admin_workspace_menu('admin_main_menu_contents');

?>
</div>
</body></html>