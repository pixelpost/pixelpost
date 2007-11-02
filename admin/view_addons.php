<?php

// SVN file version:
// $Id$

if(!isset($_SESSION["pixelpost_admin"]) || $cfgrow['password'] != $_SESSION["pixelpost_admin"] || $_GET["_SESSION"]["pixelpost_admin"] == $_SESSION["pixelpost_admin"] || $_POST["_SESSION"]["pixelpost_admin"] == $_SESSION["pixelpost_admin"] || $_COOKIE["_SESSION"]["pixelpost_admin"] == $_SESSION["pixelpost_admin"]) {
	die ("Try another day!!");
}

// view = addons

if($_GET['view'] == "addons") {

// update status of addons
if (isset($_GET['turnoff'])){
// turn off the addon
	$addon_name = $_GET['turnoff'];

	$query_ad_s = "update {$pixelpost_db_prefix}addons set status='off' where addon_name='$addon_name' ";
	$query_ad_s = mysql_query($query_ad_s);
	if (mysql_error())
		echo '$admin_lang_failed_addonstatus' .$addon_name;
}

// update status of addons
if (isset($_GET['turnon'])){
// trun off the addon
	$addon_name = $_GET['turnon'];
	$query_ad_s = "update {$pixelpost_db_prefix}addons set status='on' where addon_name='$addon_name' ";
	$query_ad_s = mysql_query($query_ad_s);
	if (mysql_error())
		echo '$admin_lang_failed_addonstatus' .$addon_name;
}
    echo "<div id='caption'>
    $admin_lang_addon_title
    </div>";
    $dir = "../addons/";
    $query_ad_s = "select id,addon_name,status from {$pixelpost_db_prefix}addons ORDER BY `status` DESC ";
		$query_ad_s = mysql_query($query_ad_s);
		while (list($id,$addonfilename,$status)= mysql_fetch_row($query_ad_s))	{
			if (file_exists($dir.$addonfilename.".php")){
				// check if we can read the file
				if (is_readable($dir.$addonfilename.".php")) {
					include($dir.$addonfilename.".php");
					//build the addon_on & addon_off arrays
					if (!isset($addon_description)) $addon_description="This addon provides no further information. Please have a look into the addon file for what it is meant to be and blame the addon author for that.";
					if (!isset($addon_version)) $addon_version="?";
					if (!isset($addon_name)) $addon_name="no name specified";
					$status = strtoupper($status);
					if ($status=='ON'){
						$addon_on[$addon_name] = array("status" => $status, "addon_description" => $addon_description, "addon_version" => $addon_version, "filename" => $addonfilename);
					}else{
						$addon_off[$addon_name] = array("status" => $status, "addon_description" => $addon_description, "addon_version" => $addon_version, "filename" => $addonfilename);
					}
				}else{
					// we cannot read the file so we cannot include it. Show error messages to the user.
					$addon_error[$filename] = array("status" => $status, "addon_description" => $admin_lang_pp_addon_error, "addon_version" => "?", "filename" => $addonfilename);
				}					
			}
			unset($addon_name);
			unset($addon_description);
			unset($addon_version);
		}
		if (isset($addon_on)) ksort($addon_on);
		if (isset($addon_off)) ksort($addon_off);
		if (isset($addon_error)) ksort($addon_error);
		if ((isset($addon_on)) && (isset($addon_off))) $addon_list = array_merge($addon_on, $addon_off);
		elseif (isset($addon_on)) $addon_list = $addon_on;
		elseif (isset($addon_off)) $addon_list = $addon_off;
		foreach ($addon_list as $addon_name => $addon_details){
			
			if ($addon_details['status']=='ON'){
				echo "<div class='addon_on'>".$addon_name." <i>(".$addon_details['filename']." - version ".$addon_details['addon_version'].")";
				$toecho_ad_s = " - status: <a href='index.php?view=addons&amp;turnoff=".$addon_details['filename']."' title='$admin_lang_addon_off'>".$addon_details['status']."</a>";
			}else{
				echo "<div class='addon_off'>".$addon_name." <i>(".$addon_details['filename']." - version ".$addon_details['addon_version'].")";
				$toecho_ad_s = " - status: <a href='index.php?view=addons&amp;turnon=".$addon_details['filename']."' title='$admin_lang_addon_on'>".$addon_details['status']."</a>";
			}
			echo $toecho_ad_s."
			</i></div>";
			if ($addon_details['status']=='ON'){
				echo "<div class='content'>\n";
				echo $addon_details['addon_description'];
				echo "</div><p />";
			}else{
				echo "<br />";
			}
	  }
	  // display error addons
	  if (isset($addon_error)){
  	  foreach ($addon_error as $addon_name => $addon_details)	{
  			echo "<div class='addon_error'><strong>ERROR: </strong>".$addon_details['filename']."</div>";
  			echo "<div class='content'>\n";
  			echo $addon_details['addon_description'];
  			echo "</div><p />";
  	  }
	  }
	  
    // done
	} // end addons
?>