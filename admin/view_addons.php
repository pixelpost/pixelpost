<?php

/**************************
SVN file version:
$Rev: 24 $
$LastChangedBy: Administrator $
$LastChangedDate: 2006-07-24 02:24:39 +0200 (Pn, 24 lip 2006) $
**************************/

if(!isset($_SESSION["pixelpost_admin"]) || $cfgrow['password'] != $_SESSION["pixelpost_admin"] || $_GET["_SESSION"]["pixelpost_admin"] == $_SESSION["pixelpost_admin"] || $_POST["_SESSION"]["pixelpost_admin"] == $_SESSION["pixelpost_admin"]) {
	die ("Try another day!!");
}

// view = addons

if($_GET['view'] == "addons") {

// update status of addons
if (isset($_GET['turnoff']) ){
// turn off the addon
	$addon_name = $_GET['turnoff'];

	$query_ad_s = "update {$pixelpost_db_prefix}addons set status='off' where addon_name='$addon_name' ";
	$query_ad_s = mysql_query($query_ad_s);
	if (mysql_error())
		echo '$admin_lang_failed_addonstatus' .$addon_name;
}

// update status of addons
if (isset($_GET['turnon']) ){
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
    $query_ad_s = "select id,addon_name,status from {$pixelpost_db_prefix}addons ";

		$query_ad_s = mysql_query($query_ad_s);

		while (list($id,$filename,$status)= mysql_fetch_row($query_ad_s))	{
			if (file_exists($dir.$filename.".php")){
				include($dir.$filename.".php");
				echo "<div class='jcaption'>$addon_name
				<i>($filename - version $addon_version)
				";
				$status = strtoupper($status);
				if ($status=='ON')
					$toecho_ad_s = " - status: <a href='index.php?view=addons&amp;turnoff=$filename' title='$admin_lang_addon_off'>$status</a>";
				else
					$toecho_ad_s = " - status: <a href='index.php?view=addons&amp;turnon=$filename' title='$admin_lang_addon_on'>$status</a>";
				echo $toecho_ad_s."
				</i>
				</div><div class='content'>\n";
				if ($status=='ON')
					echo $addon_description;
				echo "</div><p />";
				}
			}
/*
    if($handle = opendir($dir)) {
        while (false !== ($file = readdir($handle))) {
            if($file != "." && $file != "..") {
                $ftype = strtolower(end(explode('.', $file)));
                if($ftype == "php") {
                    include("../addons/$file");

                    }
                }
            }
        closedir($handle);
        }
 */
    // done
    } // end addons
?>