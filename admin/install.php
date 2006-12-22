<?php

/*
Pixelpost version 1.5

SVN file version:
$Id$

Pixelpost www: http://www.pixelpost.org/

Version 1.5:
Development Team:
Ramin Mehran, Connie Mueller-Goedecke, Will Duncan, Joseph Spurling, GeoS
Version 1.1 to Version 1.3: Linus <http://www.shapestyle.se>

Contact: thecrew@pixelpost.org
Copyright © 2006 Pixelpost.org <http://www.pixelpost.org>

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

require("../includes/pixelpost.php");
require('../includes/create_tables.php');

/* start up mysql */
mysql_connect($pixelpost_db_host, $pixelpost_db_user, $pixelpost_db_pass) || die("Error: ". mysql_error());
mysql_select_db($pixelpost_db_pixelpost) || die("Error: ". mysql_error());

// This will be 0 for clean install, 1.3 for that version, 1.4+ for newer versions...
$installed_version = Get_Pixelpost_Version( $pixelpost_db_prefix );
if( $installed_version == 1.514 ) {
    header("Location: index.php");
    exit;
}

?>

<html>
<head>
<link rel="stylesheet" href="admin_index.css" type="text/css">
<title>Pixelpost Installation</title>
</head>
<body>
<div id="wrapper">
<div id="header">
Installation
</div>
<?php

// Start of fresh install
if($_GET['install'] == "" && $installed_version == 0) {
?>

<div id="caption">Welcome to Pixelpost 1.5rc installation!</div>
<div class="jcaption">STEP 1: Prepare database</div>
<div class="content">
This will install/create the database tables that are needed for pixelpost.<p />
Table <b><?php echo $pixelpost_db_prefix; ?>pixelpost</b> will contain information about your images.<br />
Table <b><?php echo $pixelpost_db_prefix; ?>categories</b> will define categories to your images.<br />
Table <b><?php echo $pixelpost_db_prefix; ?>catassoc</b> will associate multiple categories to your images.<br />
Table <b><?php echo $pixelpost_db_prefix; ?>config</b> will hold a few configuration options.<br />
Table <b><?php echo $pixelpost_db_prefix; ?>comments</b> will keep hold of comments from your visitors.<br />
Table <b><?php echo $pixelpost_db_prefix; ?>visitors</b> will log visitors and is used to get total visits and a referer log.<br />
Table <b><?php echo $pixelpost_db_prefix; ?>version</b> will hold the information about the version of Pixelpost you are running.<br />
Table <b><?php echo $pixelpost_db_prefix; ?>addons</b> will track the in use and idle addons.

<form method="post" action="install.php?install=one">
You need to choose a username and password. This will be what you use in order to login and publish images to your photoblog.
Both username and password can be altered later.
<p />

<b>Name</b><br />
<input type="text" name="admin_user" /><p />
<b>Password</b><br />
<input type="password" name="admin_password" /><p />

Table prefix: <?php echo "<b>$pixelpost_db_prefix</b>"; ?><p />

<input type="submit" value="Create Tables">
</form>
</div>
<?php
}	// End of fresh install start page

// Start of Upgrade
else if($_GET['install'] == "") {
?>
<div id="caption">Welcome to Pixelpost 1.5rc upgrade!</div>
<div class="jcaption">STEP 1: Prepare database upgrade</div>
<div class="content">
This will update the database tables that are needed for this version of Pixelpost
and add needed tables to support the new features.  Press the Upgrade button to continue.
<form method="post" action="install.php?install=one">
<input type="submit" value="Upgrade">
</form>
</div>
<?php

}  // End of upgrade start page

// Step 1
else if($_GET['install'] == "one") {
$prefix = $pixelpost_db_prefix;
?>

<div id="caption">The Automagical Stuff</div>
<div class="jcaption">Wowzers - check out how everything is working! (hopefully)</div>
<div class="content">
<?php

// This is where the fun starts and the work happens.  Hold on tight...
switch( $installed_version ) {
	case 0:	// Not installed
		Create13Tables( $prefix );
		Set_Configuration($prefix);
		// Do not break, fall through to the next case statement
	case 1.3:	// Installed 1.3 or earlier
		UpgradeTo14( $prefix );
		if( $installed_version == 1.3 )
		{
			ConvertPassword( $prefix );
		}

		// Do not break, fall through to the next case statement
	case 1.4:	// Already upgraded
		UpgradeTo141($prefix);

	case 1.41: // fall to the next
	case 1.42: 		
	case 1.499:
	case 1.4993:
		//UpgradeTo1501($prefix);
	case 1.49931:
		//UpgradeTo15011($prefix);
	case 1.4994:
		//UpgradeTo15012($prefix);
	case 1.4995:
		UpgradeTo15beta($prefix,'1.49995');
	//case 1.5:
	//	UpgradeTo15final($prefix,'1.5');
	//case 1.6:
	//	UpgradeTo16($prefix,'1.6');
	// Changed the above code to:
	case 1.49995:  //upgrade from beta to final 1.5
		UpgradeTo15final($prefix,'1.5');
	case 1.5:  //upgrade from final to SVN 1.6
		UpgradeTo151($prefix,'1.51');
	case 1.51:  //upgrade from final to SVN 1.6
		UpgradeTo1511($prefix,'1.511');
	case 1.511:  //upgrade from final to SVN 1.6
		UpgradeTo1512($prefix,'1.512');
	case 1.512:  //upgrade from final to SVN 1.6
		UpgradeTo1513($prefix,'1.513');
	case 1.513:  //upgrade from final to SVN 1.6
		UpgradeTo1514($prefix,'1.514');
	
	
	// Add the upgrade to 1.6 here later	
}
	
echo "<b>The tables are all set.</b><p />";
if(!is_writable("../images/")) {
    $chmod_message = "<b>Images folder not writable!</b><p />You must set correct permissions on this folder or you will not be able to upload any images.<br /> Set the folder to chmod 777.<p />";
    } else {
    $chmod_message = "Images folder is writable, which is a good thing.<p />";
    }

if(!is_writable("../thumbnails/")) {
    $chmod_message2 = "<b>Thumbnails folder is not writable!</b><p />You must set correct permissions on this folder or thumbnails will not work.<br /> Set the folder to chmod 777.<p />";
    } else {
    $chmod_message2 = "Thumbnails folder is writable.<p />";
    }

?>
</div>
<div class="jcaption">Finally...</div>
<div class="content">
<b>Let's see if we can save images in the folder images:</b><p />
&raquo; <?php echo $chmod_message; ?><p />

<b>Let's see if we can save thumbnails in the folder thumbnails:</b><p />
&raquo; <?php echo $chmod_message2; ?><p /><p />

Next thing you want to do is <a href="index.php">login to the admin interface</a> and get started posting.<p />
<i>Pixelpost does not come with any warranties. Let's hope it'll work great for you and give you a worryfree great photoblog.</i>
</div>

<?php
} // if install=one done

// Step 2
else if($_GET['install'] == "two") {
    ?>
</div>
<div class="jcaption">Step 2: Done.</div>
<div class="content">
It's all set. Upload some images, test it out and make sure it works properly. <b>Take it for a spin.</b><p />
<b>Be sure to set the correct rights (?) on the "images" folder.</b> If it's not chmod 777 then no images will upload into that folder.<p />

<i>PIXELPOST is basic and intends to continue being so, but more than anything cater to the photobloggers needs. <br />
We would like to, but are not able to guarantee you eternal happiness because of using this. Instead we tell you that we cannot be held responsible for any damage this software might do to you, your webserver or your dog.</i>
</div>

<?php
}
?>
</div>
</body></html>