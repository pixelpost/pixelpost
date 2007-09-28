<?php

// SVN file version:
// $Id$

require("../includes/pixelpost.php");
require('../includes/create_tables.php');
require('../includes/functions.php');

/* start up mysql */
mysql_connect($pixelpost_db_host, $pixelpost_db_user, $pixelpost_db_pass) || die("Error: ". mysql_error());
mysql_select_db($pixelpost_db_pixelpost) || die("Error: ". mysql_error());

// This will be 0 for clean install, 1.3 for that version, 1.4+ for newer versions...
$installed_version = Get_Pixelpost_Version( $pixelpost_db_prefix);
if( $installed_version == 1.652) {
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
if(!isset($_GET['install']) and $installed_version == 0) {
?>

<div id="caption">Welcome to Pixelpost 1.6 installation!</div>
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
else if(!isset($_GET['install']) || $_GET['install'] == "") {
?>
<div id="caption">Welcome to Pixelpost 1.6 upgrade!</div>
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
switch( $installed_version) {
	case 0:	// Not installed
		Show_username_password();
		Create13Tables( $prefix);
		Set_Configuration($prefix);
		// Do not break, fall through to the next case statement
	case 1.3:	// Installed 1.3 or earlier
		UpgradeTo14( $prefix);
		if( $installed_version == 1.3)
		{
			ConvertPassword( $prefix);
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
	case 1.49995:  //upgrade from beta to final 1.5
		UpgradeTo15final($prefix,'1.5');
	case 1.5:  //upgrade from final to 1.6Beta
		UpgradeTo16beta($prefix,'1.59');
	case 1.59:  //upgrade from 1.6Beta to 1.6Final
		UpgradeTo16final($prefix,'1.6');
	case 1.6:  //upgrade from 1.6Final to 1.6.5
		UpgradeTo165($prefix,'1.65');
	break;
	case 1.65:
		UpgradeTo1651($prefix,'1.651');
	case 1.651:
		UpgradeTo1652($prefix,'1.652');	
	break;
	// Add the upgrade to 1.7 here later
	default:
		echo "<b>Due to an error in your database, the installer was unable to continue.</b><br/><br/>
		Reason: The version table is incorrect.
		</div>
		</body></html>";
		exit();
	break;
}

echo "<b>The tables are all set.</b><p />";
// new foldercheck routine.

// Check if directory exists;
// If it doesn't, attempt to create it.

$images     =    check_and_set('../images/');
$thumbnails =    check_and_set('../thumbnails/');
if ($images=="chmod"){
	$chmod_message = "<b>Images folder not writable!</b><p />You must set correct permissions on this folder by using a FTP client or you will not be able to upload any images.<br /> Set the folder to chmod 755 or 777.<p />";
} elseif($images=="create"){
	$chmod_message = "<b>Images folder doesn't exists!</b><p />You must create an 'images' folder and set correct permissions on this folder by using a FTP client or you will not be able to upload any images.<br /> Set the folder to chmod 755 or 777.<p />";
} else {
	$chmod_message = "Images folder is writable, which is a good thing.<p />";
}

if ($thumbnails=="chmod"){
	$chmod_message2 = "<b>Thumbnails folder not writable!</b><p />You must set correct permissions on this folder by using an FTP client or you will not be able to upload any images.<br /> Set the folder to chmod 755 or 777.<p />";
} elseif($images=="create"){
	$chmod_message2 = "<b>Thumbnails folder doesn't exists!</b><p />You must create a 'thumbnails' folder and set correct permissions on this folder by using an FTP client or you will not be able to upload any images.<br /> Set the folder to chmod 755 or 777.<p />";
} else {
	$chmod_message2 = "Thumbnails folder is writable, which is a good thing.<p />";
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
<i>Pixelpost does not come with any warranties. Let's hope it'll work great for you and give you a worry-free great photoblog.</i>
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
<b>Be sure to set the correct rights (?) on the "images" folder.</b> If it's not chmod 755 or 777 then no images will upload into that folder.<p />

<i>PIXELPOST is basic and intends to continue being so, but more than anything cater to the photobloggers needs. <br />
We would like to, but are not able to guarantee you eternal happiness because of using this. Instead we tell you that we cannot be held responsible for any damage this software might do to you, your webserver or your dog.</i>
</div>

<?php
}
?>
</div>
</body></html>