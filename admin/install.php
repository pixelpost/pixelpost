<?php

// SVN file version:
// $Id: install.php 514 2008-01-16 19:24:38Z schonhose $

error_reporting(0);

define('PP_INSTALL', true);

/**
 * Define current Pixelpost version. !!!!! IMPORTANT !!!!!
 * This must be the same version number as stored in the version database table
 *
 */
define('PP_VERSION', '1.73');

// Start Timer
$time = microtime();
$time = explode(" ", $time);
$time = $time[1] + $time[0];
$start = $time;

$installed_version = 0;

if(file_exists('../includes/pixelpost.php')) {

	require_once("../includes/pixelpost.php");
	
	/**
	 * Start up mysql
	 *
	 */
	if(@mysql_connect($pixelpost_db_host, $pixelpost_db_user, $pixelpost_db_pass)) {
		
		@mysql_select_db($pixelpost_db_pixelpost);
		
		require_once('../includes/create_tables.php');
	}
}


require_once('../includes/functions.php');


if(file_exists('../includes/pixelpost.php')){ $installed_version = Get_Pixelpost_Version($pixelpost_db_prefix); }

if($installed_version == PP_VERSION) {

	header("Location: index.php");
    exit;
}

require_once('install/install_functions.php');


/**
 * Creates the requested config file for download
 *
 */
if(isset($_POST['dlconfig'])) {

	$config_data = create_config_file("../includes/","../includes/pixelpost.php");
	
	header("Content-Type: text/x-delimtext; name=\"pixelpost.php\"");
	header("Content-disposition: attachment; filename=\"pixelpost.php\"");
	echo $config_data;
	exit;
}

////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////
////						PAGE OUTPUT
////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<title>Pixelpost Installation</title>
<link rel="stylesheet" href="admin_index.css" type="text/css" />
<link rel="stylesheet" href="install/install.css" type="text/css" />
</head>

<body>

<?php if(isset($_GET['view']) && $_GET['view'] == "install" && isset($_GET['cat']) && $_GET['cat'] == "introduction" || isset($_GET['view']) && $_GET['view'] == "overview" || !isset($_GET['view'])) { ?>

<div id="lang_select_head">

<form method="post" action="" enctype="multipart/form-data" accept-charset="UTF-8">
	
<select name="language" id="lang_select">
<?php langOptions($lang); ?>
</select>
		
<button id="lang_button" type="submit" name="submit" value="<?php echo $lang_language_btn; ?>"><?php echo $lang_language_btn; ?></button>
	
</form>

</div>
	
<?php } ?>

<div id="wrapper">

<div id="header">PIXELPOST <?php echo PP_VERSION; ?></div>
 
<?php /* Start of fresh install */ if($installed_version == 0) { ?>

<?php if(isset($_GET['view']) && $_GET['view'] == "overview" || !isset($_GET['view'])) { ?>

<table border='0'  cellspacing='0' cellpadding='0' style='width:100%;' id="menu">
<tr>
	<td  class='nav_cell' >
		&nbsp;
	</td>
	<td class='nav_cell' width='14%'>
		<a href="./install.php?view=overview&amp;cat=introduction">
		<div<?php isActive($cat,'introduction') ?> id='introduction'><?php echo $lang_menu_intro; ?></div>
		</a>
	</td>
	<td class='nav_cell' width='14%'>
		<a href="./install.php?view=overview&amp;cat=license">
			<div<?php isActive($cat,'license') ?> id='license'><?php echo $lang_menu_lic; ?></div>
		</a>
	</td>
	<td class='nav_cell' width='14%'>
		<a href="install.php?view=overview&amp;cat=support">
			<div<?php isActive($cat,'support') ?> id='support'><?php echo $lang_menu_support; ?></div>
		</a>
	</td>
	<td  class='nav_cell' >
		&nbsp;
	</td>
</tr>
</table>
      
<?php }elseif(isset($_GET['view']) && $_GET['view'] == "install") { ?>
    
<table border='0'  cellspacing='0' cellpadding='0' style='width:100%;' id="sub_menu">
<tr>
	<td  class='nav_cell' >
		&nbsp;
	</td>
	<td class='nav_cell' width='14%'>
		<div<?php isActive($cat, 'introduction') ?> id='introduction'><?php echo $lang_menu_intro; ?></div>
	</td>
	<td class='nav_cell' width='14%'>
		<div<?php isActive($cat, 'requirements') ?> id='requirements'><?php echo $lang_menu_req; ?></div>
	</td>
	<td class='nav_cell' width='14%'>
		<div<?php isActive($cat,     'database') ?> id='database'><?php echo $lang_menu_db; ?></div>
	</td>
	<td class='nav_cell' width='14%'>
		<div<?php isActive($cat,'administrator') ?> id='administrator'><?php echo $lang_menu_admin; ?></div>
	</td>
	<td class='nav_cell' width='14%'>
			<div<?php isActive($cat, 'settings') ?> id='settings'><?php echo $lang_menu_settings; ?></div>
	</td>
	<td class='nav_cell' width='14%'>
		<div<?php isActive($cat,'configuration') ?> id='configuration'><?php echo $lang_menu_config; ?></div>
	</td>
	<td class='nav_cell' width='14%'>
		<div<?php isActive($cat,     'finalize') ?> id='finalize'><?php echo $lang_menu_pop; ?></div>
	</td>
	<td  class='nav_cell' >
		&nbsp;
	</td>
</tr>
</table>
<?php }elseif(isset($_GET['view']) && $_GET['view'] == "db_fix") { ?>

<table border='0'  cellspacing='0' cellpadding='0' style='width:100%;' id="sub_menu">
<tr>
	<td  class='nav_cell' >
		&nbsp;
	</td>
	<td class='nav_cell' width='14%'>
		<div<?php isActive($cat,      'database') ?> id='database'><?php echo $lang_menu_db; ?></div>
	</td>
	<td class='nav_cell' width='14%'>
		<div<?php isActive($cat, 'configuration') ?> id='configuration'><?php echo $lang_menu_config; ?></div>
	</td>
	<td  class='nav_cell' >
		&nbsp;
	</td>
</tr>
</table>

<?php } ?>

<p />

<!-- PAGE CONTENT -->
<div class="content">

<?php

/**
 * Overview
 *
 */
if(isset($_GET['view']) && $_GET['view'] == "overview" && isset($_GET['cat']) && $_GET['cat'] == "introduction" || !isset($_GET['view'])) {

	echo '<h1>'.$lang_overview.'</h1>'.$lang_overview_intro_1.'<p />'.$lang_overview_intro_5.'<p />'.$lang_overview_intro_2.'&nbsp;<a href="http://www.pixelpost.org/docs/GettingStarted/Install">'.$lang_overview_intro_3.'</a>&nbsp;'.$lang_overview_intro_4.'<p /><button class="button" type="submit" id="submit" name="submit" value="'.$lang_start_btn.'" onclick="parent.location=\'./install.php?view=install&amp;cat=introduction\'">'.$lang_start_btn.' &raquo;</button>';
}
if(isset($_GET['view']) && $_GET['view'] == "overview" && isset($_GET['cat']) && $_GET['cat'] == "license") {

	echo "<h1>$lang_overview_lic</h1><textarea rows=\"30\" cols=\"50\" id=\"gnu_license\">"; require_once("install/gpl-2.0.txt"); echo"</textarea>";
}
if(isset($_GET['view']) && $_GET['view'] == "overview" && isset($_GET['cat']) && $_GET['cat'] == "support") {

	echo '<h1>'.$lang_overview_support.'</h1>'.$lang_overview_sup_1.'&nbsp;<a href="http://www.pixelpost.org/forum/">'.$lang_overview_sup_2.'</a>.<p />'.$lang_overview_sup_3.'<p />'.$lang_overview_sup_4.'&nbsp;<a href="http://www.pixelpost.org/docs/">'.$lang_overview_sup_5.'</a>.';
}
      
/**
 * Installation
 *
 */
if(isset($_GET['view']) && $_GET['view'] == "install" && isset($_GET['cat']) && $_GET['cat'] == "introduction") { ?>
      	
<form id="doinstall" method="post" action="install.php?view=install&amp;cat=requirements" enctype="multipart/form-data" accept-charset="UTF-8">

<h1><?php echo $lang_install; ?></h1>

<?php echo $lang_install_intro_1.'<br />'.$lang_install_intro_2.'<p />'.$lang_install_intro_3.'<br /><ul><li>'.$lang_install_intro_4.'</li><li>'.$lang_install_intro_5.'</li><li>'.$lang_install_intro_6.'</li></ul>'; ?>
		  
<button class="button" type="submit" id="submit" name="submit" value="$lang_proceed_btn"><?php echo $lang_proceed_btn." &raquo;"; ?></button>

</form>

<?php } if(isset($_GET['view']) && $_GET['view'] == "install" && isset($_GET['cat']) && $_GET['cat'] == "requirements") {

$url    = (!in_array(false, $passed)) ? "install.php?view=install&amp;cat=database" : "install.php?view=install&amp;cat=requirements";
$submit = (!in_array(false, $passed)) ? $lang_start_btn." &raquo;" : $lang_retest_btn; ?>

<form id="doinstall" method="post" action="<?php echo $url; ?>" enctype="multipart/form-data" accept-charset="UTF-8">

<h1><?php echo $lang_install_req; ?></h1>

<div class='statusmsg messageBox' >
	<div><?php echo $lang_req_msg_1."<br />".$lang_req_msg_2; ?></div>
</div>

<table border='0' cellspacing='0' cellpadding='0' style='width:100%;' class='tableBorder'>
	<tr>
		<td class='tableHeading'>
			<?php echo $lang_req_php; ?>
		</td>
		<td class='tableHeading value'>
			<?php echo $lang_value; ?> 
		</td>
	</tr>
	<tr>
		<td class='cellTwo'>
			<span class='defaultBold'><?php echo $lang_req_php_ver; ?></span> 
		</td>
		<td class='cellTwo'>
			<div class="<?php echo $css['php']; ?>">
				<?php echo $result['php']; ?>
			</div>
		</td>
	</tr>
	<tr>
		<td class='cellOne'>
			<span class='defaultBold'><?php echo $lang_req_globals_1.'&nbsp;<var><a href="http://www.php.net/register_globals">'.$lang_req_globals_2.'</a></var>&nbsp;'.$lang_req_globals_3; ?></span> 
			<div class="explain"><?php echo $lang_req_globals_msg; ?></div>
		</td>
		<td class='cellOne'>
			<div class="<?php echo $css['globals']; ?>">
				<?php echo $result['globals']; ?>
			</div>
		</td>
	</tr>
	<tr>
		<td class='cellTwo'>
			<span class='defaultBold'><?php echo $lang_req_imagesize_1.'&nbsp;<a href="http://www.php.net/getimagesize">'.$lang_req_imagesize_2.'</a>&nbsp;'.$lang_req_imagesize_3; ?></span>
			<div class="explain"><?php echo $lang_req_imgsize_msg; ?></div>
		</td>
		<td class='cellTwo'>
			<div class="<?php echo $css['imagesize']; ?>">
				<?php echo $result['imagesize']; ?>
			</div>
		</td>
	</tr>
	<tr>
		<td class='cellOne'>
			<span class='defaultBold'><?php echo $lang_req_pcre; ?></span>
			<div class="explain"><?php echo $lang_req_pcre_msg; ?></div>
		</td>
		<td class='cellOne'>
			<div class="<?php echo $css['pcre']; ?>">
				<?php echo $result['pcre']; ?>
			</div>
		</td>
	</tr>
	<tr>
		<td class='cellTwo'>
			<span class='defaultBold'><?php echo $lang_req_gd; ?></span>
			<div class="explain"><?php echo $lang_req_gd_msg; ?></div>
		</td>
		<td class='cellTwo'>
			<div class="<?php echo $css['gdinfo']; ?>">
				<?php echo $result['gdinfo']; ?>
			</div>
		</td>
	</tr>
</table>

<table border='0' cellspacing='0' cellpadding='0' style='width:100%;' class='tableBorder' summary='Pixelpost Folder Requirements'>
	<tr>
		<td class='tableHeading'>
			<?php echo $lang_files_folders; ?>
		</td>
		<td class='tableHeading value'>
			<?php echo $lang_value; ?>
		</td>
	</tr>
	<tr>
		<td class='cellTwo'>
			<span class='defaultBold'>images/:</span> 
		</td>
		<td class='cellTwo'>
			<span class="<?php echo $css['image_found']; ?>">
				<?php echo $result['image_create']; ?>
			</span>
			,
			<span class="<?php echo $css['image_write']; ?>">
				<?php echo $result['image_chmod']; ?>
			</span>
		</td>
	</tr>
	<tr>
		<td class='cellOne'>
			<span class='defaultBold'>thumbnails/:</span> 
			<div class="explain"><?php echo $lang_req_not_found; ?></div>
			<div class="explain"><?php echo $lang_req_unwritable; ?></div>
		</td>
		<td class='cellOne'>
			<span class="<?php echo $css['thumb_found']; ?>">
				<?php echo $result['thumb_create']; ?>
			</span>
			,
			<span class="<?php echo $css['thumb_write']; ?>">
				<?php echo $result['thumb_chmod']; ?>
			</span>
		</td>
	</tr>
</table>

<button class="button" type="submit" id="submit" name="submit" value="<?php echo $submit; ?>"><?php echo $submit; ?></button>

</form>

<?php } if(isset($_GET['view']) && $_GET['view'] == "install" && isset($_GET['cat']) && $_GET['cat'] == "database" || isset($_GET['view']) && $_GET['view'] == "db_fix" && !isset($_GET['cat'])) {

if($_GET['view'] != "db_fix") {
	$url    = ($connect_test) ? "install.php?view=install&amp;cat=administrator" : "install.php?view=install&amp;cat=database";
}else{
	$url    = ($connect_test) ? "install.php?view=db_fix&amp;cat=configuration" : "install.php?view=db_fix";
	
}
$submit = ($connect_test) ? $lang_cont." &raquo;" : $lang_test_btn; ?>

<form id="doinstall" method="post" action="<?php echo $url; ?>" enctype="multipart/form-data" accept-charset="UTF-8">

<?php echo $form_values; ?>
      	
<h1><?php echo $lang_install_db; ?></h1>

<?php 

$value     = ($connect_test) ? $db_pass : '';
$disabled  = ($connect_test) ? ' disabled="disabled"' : '';

$msgBoxCSS = ($connect_test) ? 'success' : 'error';


if(isset($_POST['db_check'])) { ?>

<div class='<?php echo $msgBoxCSS; ?> messageBox' >
	<div><?php echo $result['connect_test']; ?></div>
</div>

<?php }elseif(isset($_GET['view']) && $_GET['view'] == 'db_fix'){ ?>

<div class='statusmsg messageBox' >
	<div><?php echo $lang_db_fix_msg; ?></div>
</div>

<?php } ?>

<table border='0' cellspacing='0' cellpadding='0' style='width:100%;' class='tableBorder'>
	<tr>
		<td class='tableHeading'>
			<?php echo $lang_db_conf; ?>
		</td>
		<td class='tableHeading value'>
			<?php echo $lang_value; ?> 
		</td>
	</tr>
	<tr>
		<td class='cellTwo'>
			<label for="db_host" class='defaultBold'><?php echo $lang_db_host; ?></label>
			<div class="explain"><?php echo $lang_db_host_msg; ?></div>
		</td>
		<td class='cellTwo'>
			<input type="text" name="db_host" id="db_host" value="<?php echo $db_host ."\"".$disabled; ?> class="input" />
		</td>
	</tr>
	<tr>
		<td class='cellOne'>
			<label for="db_name" class='defaultBold'><?php echo $lang_db_name; ?></label> 
			<div class="explain"><?php echo $lang_db_name_msg; ?></div>
		</td>
		<td class='cellOne'>
			<input type="text" name="db_name" id="db_name" value="<?php echo $db_name ."\"".$disabled; ?> class="input" />
		</td>
	</tr>
	<tr>
		<td class='cellTwo'>
			<label for="db_user" class='defaultBold'><?php echo $lang_db_user; ?></label>
			<div class="explain"><?php echo $lang_db_user_msg; ?></div>
		</td>
		<td class='cellTwo'>
			<input type="text" name="db_user" id="db_user" value="<?php echo $db_user ."\"".$disabled; ?> class="input" />
		</td>
	</tr>
	<tr>
		<td class='cellOne'>
			<label for="db_pass" class='defaultBold'><?php echo $lang_db_pass; ?></label>
			<div class="explain"><?php echo $lang_db_pass_msg; ?></div>
		</td>
		<td class='cellOne'>
			<input type="password" name="db_pass" id="db_pass" value="<?php echo $value ."\"".$disabled; ?> class="input" />
		</td>
	</tr>
	<tr>
		<td class='cellTwo'>
			<label for="tbl_prefix" class='defaultBold'><?php echo $lang_db_prefix; ?></label>
			<div class="explain"><?php echo $lang_db_prefix_msg; ?></div>
		</td>
		<td class='cellTwo'>
			<input type="text" name="tbl_prefix" id="tbl_prefix" value="<?php echo $tbl_prefix ."\"".$disabled; ?> class="input" />
		</td>
	</tr>
</table>

<?php if(!$connect_test){ ?>

<input type="hidden" name="db_check" value="true" />

<?php } ?>

<button class="button" type="submit" id="submit" name="submit" value="<?php echo $submit; ?>"><?php echo $submit; ?></button>
		  

</form>

<?php } if(isset($_GET['view']) && $_GET['view'] == "install" && isset($_GET['cat']) && $_GET['cat'] == "administrator") {

$url       = ($admin_passed) ? 'install.php?view=install&amp;cat=settings' : 'install.php?view=install&amp;cat=administrator';

$submit    = ($admin_passed) ? $lang_cont." &raquo;" : $lang_verify_btn;

$disabled  = ($admin_passed) ? ' disabled="disabled"' : '';

$pswvalue  = ($admin_password1 == $admin_password2 && $admin_password1 != "") ? $admin_password1 : '';

$emvalue   = ($admin_email1 == $admin_email2 && $admin_email1 != "") ? $admin_email2 : '';

$msgBoxCSS = ($admin_passed) ? 'success' : 'error';

$checked1   = (isset($_POST['send_email']) && $_POST['send_email'] == '1' || !isset($_POST['send_email'])) ? ' checked="checked"' : '';

$checked2   = (isset($_POST['send_email']) && $_POST['send_email'] == '0') ? ' checked="checked"' : '';
?>

<form id="doinstall" method="post" action="<?php echo $url; ?>" enctype="multipart/form-data" accept-charset="UTF-8">

<?php echo $form_values; ?>
      
<h1><?php echo $lang_install_admin; ?></h1>
      	
<?php if(isset($_POST['admin_check'])) { ?>
      	
<div class='<?php echo $msgBoxCSS; ?> messageBox' >
	<div><?php echo $result['admin_details']; ?></div>
</div>

<?php } ?>

<table border='0' cellspacing='0' cellpadding='0' style='width:100%;' class='tableBorder'>
	<tr>
		<td class='tableHeading'>
			<?php echo $lang_admin_conf; ?>
		</td>
		<td class='tableHeading value'>
			<?php echo $lang_value; ?> 
		</td>
	</tr>
	<tr>
		<td class='cellTwo'>
			<label for="db_host" class='defaultBold'><?php echo $lang_admin_lang; ?></label>
		</td>
		<td class='cellTwo'>
			<select name="admin_language" id="admin_language"<?php echo $disabled; ?>><?php adminLangOptions($lang,$admin_language); ?></select>
		</td>
	</tr>
	<tr>
		<td class='cellOne'>
			<label for="db_name" class='defaultBold'><?php echo $lang_admin_user; ?></label> 
			<div class="explain"><?php echo $lang_admin_user_msg; ?></div>
		</td>
		<td class='cellOne'>
			<input type="text" name="admin_username" id="admin_username" value="<?php echo $admin_username ."\"".$disabled; ?> class="input" />
		</td>
	</tr>
	<tr>
		<td class='cellTwo'>
			<label for="db_user" class='defaultBold'><?php echo $lang_admin_pass1; ?></label>
			<div class="explain"><?php echo $lang_admin_pass1_msg; ?></div>
		</td>
		<td class='cellTwo'>
			<input type="password" name="admin_password1" id="admin_password1" value="<?php echo $pswvalue ."\"".$disabled; ?> class="input" />
		</td>
	</tr>
	<tr>
		<td class='cellOne'>
			<label for="db_pass" class='defaultBold'><?php echo $lang_admin_pass2; ?></label>
		</td>
		<td class='cellOne'>
			<input type="password" name="admin_password2" id="admin_password2" value="<?php echo $pswvalue ."\"".$disabled; ?> class="input" />
		</td>
	</tr>
	<tr>
		<td class='cellTwo'>
			<label for="tbl_prefix" class='defaultBold'><?php echo $lang_admin_email1; ?></label>
		</td>
		<td class='cellTwo'>
			<input type="text" name="admin_email1" id="admin_email1" value="<?php echo $admin_email1 ."\"".$disabled; ?> class="input" />
		</td>
	</tr>
	<tr>
		<td class='cellOne'>
			<label for="db_pass" class='defaultBold'><?php echo $lang_admin_email2; ?></label>
		</td>
		<td class='cellOne'>
			<input type="text" name="admin_email2" id="admin_email2" value="<?php echo $emvalue ."\"".$disabled; ?> class="input" />
		</td>
	</tr>
	<tr>
		<td class='cellTwo'>
			<label for="tbl_prefix" class='defaultBold'><?php echo $lang_email_cred; ?></label>
			<div class="explain"><?php echo $lang_email_cred_msg; ?></div>
		</td>
		<td class='cellTwo'>
			<input type="radio" name="send_email" id="send_email_yes" value="1"<?php echo $checked1; ?> />&nbsp;<?php echo $lang_yes; ?><br /><input type="radio" name="send_email" id="send_email_no" value="0"<?php echo $checked2; ?> />&nbsp;<?php echo $lang_no; ?>
		</td>
	</tr>
</table>

<?php if(!$admin_passed){ ?>

<input type="hidden" name="admin_check" value="true" />

<?php } ?>

<button class="button" type="submit" id="submit" name="submit" value="<?php echo $submit; ?>"><?php echo $submit; ?></button>

</form>

<?php } if(isset($_GET['view']) && $_GET['view'] == "install" && isset($_GET['cat']) && $_GET['cat'] == "settings") {

$url       = ($settings_passed) ? "install.php?view=install&amp;cat=configuration" : "install.php?view=install&amp;cat=settings";

$submit    = ($settings_passed) ? $lang_cont." &raquo;" : $lang_verify_btn;

$disabled  = ($settings_passed) ? ' disabled="disabled"' : '';

$checked1   = (isset($_POST['pp_timezone_dst']) && $_POST['pp_timezone_dst'] == '1') ? ' checked="checked"' : '';

$checked2   = (isset($_POST['pp_timezone_dst']) && $_POST['pp_timezone_dst'] == '0' || !isset($_POST['pp_timezone_dst'])) ? ' checked="checked"' : '';

$msgBoxCSS = ($settings_passed) ? 'success' : 'error';
?>

<form id="doinstall" method="post" action="<?php echo $url; ?>" enctype="multipart/form-data" accept-charset="UTF-8">

<?php echo $form_values; ?>
      
<h1><?php echo $lang_menu_settings; ?></h1>

<?php if(isset($_POST['settings_check'])) { ?>

<div class='<?php echo $msgBoxCSS; ?> messageBox' >
	<div><?php echo $result['setting_details']; ?></div>
</div>

<?php } ?>

<table border='0' cellspacing='0' cellpadding='0' style='width:100%;' class='tableBorder'>
	<tr>
		<td class='tableHeading'>
			<?php echo $lang_menu_settings; ?>
		</td>
		<td class='tableHeading value'>
			<?php echo $lang_value; ?> 
		</td>
	</tr>
	<tr>
		<td class='cellTwo'>
			<label for="db_host" class='defaultBold'><?php echo $lang_set_title; ?></label>
		</td>
		<td class='cellTwo'>
			<input type="text" name="pp_title" id="pp_title" value="<?php echo $pp_title ."\"".$disabled; ?> class="input" />
		</td>
	</tr>
	<tr>
		<td class='cellOne'>
			<label for="db_name" class='defaultBold'><?php echo $lang_set_sub_title; ?></label> 
		</td>
		<td class='cellOne'>
			<input type="text" name="pp_sub_title" id="pp_sub_title" value="<?php echo $pp_sub_title ."\"".$disabled; ?> class="input" />
		</td>
	</tr>
	<tr>
		<td class='cellTwo'>
			<label for="db_user" class='defaultBold'><?php echo $lang_set_path; ?></label>
		</td>
		<td class='cellTwo'>
			<input type="text" name="pp_path" id="pp_path" value="<?php echo $pp_path ."\"".$disabled; ?> class="input" />
		</td>
	</tr>
	<tr>
		<td class='cellOne'>
			<label for="db_pass" class='defaultBold'><?php echo $lang_set_timezone; ?></label>
			<div class="explain"><?php echo $lang_set_timezone_msg; ?></div>
		</td>
		<td class='cellOne'>
			<select name="pp_timezone" id="pp_timezone"<?php echo $disabled; ?>><?php echo tz_select('0', true, '75'); ?></select>
		</td>
	</tr>
	<tr>
		<td class='cellOne'>
			<label for="db_pass" class='defaultBold'><?php echo $lang_set_tz_dst; ?></label>
			<div class="explain"><?php echo $lang_set_tz_dst_msg; ?></div>
		</td>
		<td class='cellOne'>
			<input type="radio" name="pp_timezone_dst" id="pp_timezone_dst_yes" value="1"<?php echo $checked1; ?> />&nbsp;<?php echo $lang_yes; ?><br /><input type="radio" name="pp_timezone_dst" id="pp_timezone_dst_no" value="0"<?php echo $checked2; ?> />&nbsp;<?php echo $lang_no; ?>
		</td>
	</tr>
</table>

<?php if(!$settings_passed){ ?>

<input type="hidden" name="settings_check" value="true" />

<?php } ?>

<button class="button" type="submit" id="submit" name="submit" value="<?php echo $submit; ?>"><?php echo $submit; ?></button>

</form>

<?php } if(isset($_GET['view']) && $_GET['view'] == "install" && isset($_GET['cat']) && $_GET['cat'] == "configuration" || isset($_GET['view']) && $_GET['view'] == "db_fix" && isset($_GET['cat']) && $_GET['cat'] == "configuration") {

$result = create_config_file('../includes/','../includes/pixelpost.php');

if($_GET['view'] != "db_fix") {
	$url       = (!isset($result['error']) || $result['verifed'] == true) ? "install.php?view=install&amp;cat=finalize" : "install.php?view=install&amp;cat=configuration";
	$submit    = (!isset($result['error']) || $result['verifed'] == true) ? $lang_cont." &raquo;" : $lang_test_btn;
}else{
	$url       = (!isset($result['error']) || $result['verifed'] == true) ? "index.php" : "install.php?view=db_fix&amp;cat=configuration";
	$submit    = (!isset($result['error']) || $result['verifed'] == true) ? $lang_finished_btn." &raquo;" : $lang_test_btn;
}

$msgBoxCSS = (!isset($result['error']) || $result['verifed'] == true) ? 'success' : 'error';

?>

<h1><?php echo $lang_install_config; ?></h1>

<?php if(isset($result['error']) && $result['verifed'] == false) { ?>

<form id="download" method="post" action="install.php?view=install&amp;cat=configuration" enctype="multipart/form-data" accept-charset="UTF-8">

<?php echo $form_values; ?>
<input type="hidden" name="dlconfig" value="true" />

<button class="button" type="submit" id="submit" name="submit" value="<?php echo $lang_download_btn; ?>"><?php echo $lang_download_btn; ?></button>

</form>

<?php $lang_config_message = "$lang_download_msg_1<br />&nbsp;$lang_download_msg_2<br />&nbsp;$lang_download_msg_2_2<br /><br />&nbsp;$lang_download_msg_3"; ?>

<?php } ?>

<form id="doinstall" method="post" action="<?php echo $url; ?>" enctype="multipart/form-data" accept-charset="UTF-8">

<?php echo $form_values; ?>

<div class='<?php echo $msgBoxCSS; ?> messageBox' >
	<div><?php echo "&nbsp;".$lang_config_message; ?></div>
</div>

<table border='0' cellspacing='0' cellpadding='0' style='width:100%;' class='tableBorder' summary='Pixelpost Folder Requirements'>
	<tr>
		<td class='tableHeading'>
			<?php echo $lang_files_folders; ?>
		</td>
		<td class='tableHeading value'>
			<?php echo $lang_value; ?>
		</td>
	</tr>
	<tr>
		<td class='cellTwo'>
			<span class='defaultBold'>includes/:</span>
			<div class="explain"><?php echo $lang_req_unwritable; ?><br /><?php echo $lang_req_unwritable_2; ?></div>
		</td>
		<td class='cellTwo'>
			<div class="<?php echo $result['css_writable']; ?>">
				<?php echo $result['writable']; ?>
			</div>
		</td>
	</tr>
</table>

<table border='0' cellspacing='0' cellpadding='0' style='width:100%;' class='tableBorder'>
	<tr>
		<td class='tableHeading'>
			<?php echo $lang_config_config; ?>
		</td>
		<td class='tableHeading value'>
			<?php echo $lang_value; ?> 
		</td>
	</tr>
	<tr>
		<td class='cellTwo'>
			<span class='defaultBold'><?php echo $lang_config_open; ?></span>
			<div class="explain"><?php echo $lang_config_open_msg; ?></div>
		</td>
		<td class='cellTwo'>
			<div class="<?php echo $result['css_fopen']; ?>">
				<?php echo $result['fopen']; ?>
			</div>
		</td>
	</tr>
	<tr>
		<td class='cellOne'>
			<span class='defaultBold'><?php echo $lang_config_write; ?></span> 
			<div class="explain"><?php echo $lang_config_write_msg; ?></div>
		</td>
		<td class='cellOne'>
			<div class="<?php echo $result['css_fwrite']; ?>">
				<?php echo $result['fwrite']; ?>
			</div>
		</td>
	</tr>
	<tr>
		<td class='cellTwo'>
			<span class='defaultBold'><?php echo $lang_config_chmod; ?></span>
			<div class="explain"><?php echo $lang_config_chmod_msg; ?></div>
		</td>
		<td class='cellTwo'>
			<div class="<?php echo $result['css_chmod']; ?>">
				<?php echo $result['chmod']; ?>
			</div>
		</td>
	</tr>
	<tr>
		<td class='cellOne'>
			<span class='defaultBold'><?php echo $lang_config_exist; ?></span>
			<div class="explain"><?php echo $lang_config_exist_msg; ?></div>
		</td>
		<td class='cellOne'>
			<div class="<?php echo $result['css_exists']; ?>">
				<?php echo $result['exists']; ?>
			</div>
		</td>
	</tr>
	<tr>
		<td class='cellTwo'>
			<span class='defaultBold'><?php echo $lang_db_test; ?></span>
			<div class="explain"><?php echo $lang_config_conn_msg; ?></div>
		</td>
		<td class='cellTwo'>
			<div class="<?php echo $result['css_connect']; ?>">
				<?php echo $result['connect']; ?>
			</div>
		</td>
	</tr>
</table>

<button class="button" type="submit" id="submit" name="submit" value="<?php echo $submit; ?>"><?php echo $submit; ?></button>

</form>

<?php } if(isset($_GET['view']) && $_GET['view'] == "install" && isset($_GET['cat']) && $_GET['cat'] == "finalize") { ?>

<h1><?php echo $lang_menu_pop; ?></h1>

<?php require_once('install/install_schema.php');

if(file_exists('../includes/pixelpost.php')){ $installed_version = Get_Pixelpost_Version($pixelpost_db_prefix); }

$url    = ($installed_version == PP_VERSION) ? "index.php" : "install.php";
$submit = ($installed_version == PP_VERSION) ? $lang_finished_btn." &raquo;" : $lang_finished_cont_up." &raquo;";

if($installed_version != 0) { store_vars($pixelpost_db_prefix); } ?>

<form id="doinstall" method="post" action="<?php echo $url; ?>" enctype="multipart/form-data" accept-charset="UTF-8">

<?php echo $form_values; ?>

<table border='0' cellspacing='0' cellpadding='0' style='width:100%;' class='tableBorder'>
	<tr>
		<td class='tableHeading'>
			<?php echo $lang_process; ?>
		</td>
		<td class='tableHeading value'>
			<?php echo $lang_status; ?> 
		</td>
	</tr>
	<?php echo createTableStatus($ins_data); ?>
</table>

<button class="button" type="submit" id="submit" name="submit" value="<?php echo $submit; ?>"><?php echo $submit; ?></button>
		  
</form>

<?php } ?>

<?php }	/* End of fresh install start page , Start of Upgrade */ else{ ?>

<table border='0'  cellspacing='0' cellpadding='0' style='width:100%;' id="menu">
<tr>
	<td  class='nav_cell' >
		&nbsp;
	</td>
	<td class='nav_cell' width='14%'>
		<div<?php isActive($cat,'introduction') ?> id='introduction'><?php echo $lang_menu_intro; ?></div>
	</td>
	<td class='nav_cell' width='14%'>
		<div<?php isActive($cat,'upgrade') ?> id='upgrade'><?php echo $lang_menu_upgrade; ?></div>
	</td>
	<td  class='nav_cell' >
		&nbsp;
	</td>
</tr>
</table>

<div class="content">

<?php if(!isset($_GET['view']) || isset($_GET['view']) && $_GET['view'] != "upgrade") { ?>
    
<form method="post" action="install.php?view=upgrade&amp;cat=upgrade" enctype="multipart/form-data" accept-charset="UTF-8">

<?php echo $form_values; ?>

<h1><?php echo $lang_menu_upgrade; ?></h1>

<?php echo $lang_upgrade_msg_1.'<br />'.$lang_upgrade_msg_2; ?><p />

<button class="button defaultBold" type="submit" id="submit" name="submit" value="$lang_up_btn"><?php echo $lang_up_btn." &raquo;"; ?></button>

</form>

<?php } ?>

<?php }  /* End of upgrade start page , Step 1 */ if(isset($_GET['view']) && $_GET['view'] == "upgrade" && isset($_GET['cat']) && $_GET['cat'] == "upgrade") {


if($installed_version == 0) { exit("Oops! You want to be <a href='install.php'>here</a>."); } ?>

<h1><?php echo $lang_menu_upgrade; ?></h1>

<?php require_once('install/install_schema.php');

if(file_exists('../includes/pixelpost.php')){ $installed_version = Get_Pixelpost_Version($pixelpost_db_prefix); }

$url       = ($installed_version == PP_VERSION) ? "index.php" : "install.php?view=upgrade";
$submit    = ($installed_version == PP_VERSION) ? $lang_finished_btn." &raquo;" : $lang_finished_cont_up." &raquo;"; ?>

<form method="post" action="<?php echo $url; ?>" enctype="multipart/form-data" accept-charset="UTF-8">

<table border='0' cellspacing='0' cellpadding='0' style='width:100%;' class='tableBorder'>
	<tr>
		<td class='tableHeading'>
			<?php echo $lang_process; ?>
		</td>
		<td class='tableHeading value'>
			<?php echo $lang_status; ?> 
		</td>
	</tr>
	<?php echo createTableStatus($ins_data); ?>
</table>
	  
<button class="button" type="submit" id="submit" name="submit" value="$submit"><?php echo $submit; ?></button>

</form>

<?php } ?>

</div>

<?php

$time = microtime();
$time = explode(" ", $time);
$time = $time[1] + $time[0];
$finish = $time;
$totaltime = round(($finish - $start),4);

?>

</div>

<div id="footer">
	Page Render Time: <?php echo $totaltime; ?>
</div>

</body>
</html>