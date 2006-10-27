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

// view info
if($_GET['view'] == "info") {
echo "<div id='caption'>$admin_lang_general_info</div>";
    if($_GET['version'] == "check") {
      $pixelpost_latest_version = file_get_contents("http://www.pixelpost.org/service/version.txt");
        } else {
        $pixelpost_latest_version = "<a href='$PHP_SELF?view=info&amp;version=check'>Check</a>";
        }
    $mysql_version = mysql_get_server_info();
	if(function_exists('gd_info'))
	{
		$gd_info1 = gd_info();
		$gd_info = $gd_info1['GD Version'];
		if($gd_info == "")
		{
			$gd_info = "$admin_lang_info_gd";
		} else if ($gd_info1["JPG Support"]) $gd_info .= " $admin_lang_info_gd_jpg";
	}		// func exist
    $version = base64_decode($version);
    $version = stripslashes($version);
    $sess_save_path = ((session_save_path() != '') ? '<b>Session save path</b> ' . session_save_path() : '<b style="color:red">Session save path is empty!!</b>');
    echo "<div class='jcaption'>$admin_lang_pixelpostinfo</div>
    <div class='content'>
    $admin_lang_pp_currversion $version<br />
    $admin_lang_pp_version1  $pixelpost_latest_version<p />
    $admin_lang_pp_forum: <a href='http://www.pixelpost.org/forum'>www.pixelpost.org/forum/</a>
    </div>
    <p />
    <div class='jcaption'>$admin_lang_hostinfo</div>
    <div class='content'>
	<br />
	<b>URL</b> http://".$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME']."<p />
	<b>PHP-version</b> ".phpversion()." ($admin_lang_pp_min_php: 4.3.0&nbsp;)<p />
	$sess_save_path<p />
	<b>MySQL version</b> ".$mysql_version." ($admin_lang_pp_min_mysql: 3.23.58&nbsp;)<p />
	<b>GD-lib</b> $gd_info<p />
	$admin_lang_fileuploads  ";

		if(ini_get('file_uploads')==0)
			echo 'NOT possible! Check file_upload variable in php.ini file!';
		else
			echo 'possible.';

		echo "<p />\n	<b>$admin_lang_serversoft</b> ".$_SERVER['SERVER_SOFTWARE']."<p />
	";

// exif infomation: exifer
	echo "$admin_lang_pp_exif1 <b>exifer v1.5</b> $admin_lang_pp_exif2.";
	echo "</div><p />
	<div class='jcaption'>$admin_lang_pp_path</div>
	<div class='content'>
	<i><b>$admin_lang_pp_imagepath  ";
   $guess_path = pullout($_SERVER['DOCUMENT_ROOT']);
	 $guess_path .= $_SERVER['SCRIPT_NAME'];
   $guess_path = pathinfo($guess_path);
	 $guess_path = $guess_path['dirname'];
	 $guess_path = eregi_replace("admin","",$guess_path);
   echo $guess_path."images/</b></i><p />
	 <b>$admin_lang_pp_imagepath_conf </b> ".$cfgrow['imagepath']."<p />";
	 $work_path = eregi_replace("images/","",$cfgrow['imagepath']);

 if(!is_writable($work_path."images")) {
 $chmod_message = "<b>$admin_lang_pp_img_chmod1</b><br />$admin_lang_pp_img_chmod2 $admin_lang_pp_img_chmod3";
 } else {
 $chmod_message = "$admin_lang_pp_img_chmod4";
 }

  if(!is_writable($work_path."thumbnails")) {
  $chmod_message = "<b>$admin_lang_pp_img_chmod5</b> $admin_lang_pp_img_chmod2 $admin_lang_pp_img_chmod3";
  } else {
  $chmod_messagethumb = "$admin_lang_pp_img_chmod4";
  }

echo "<b>$admin_lang_pp_imgfolder</b> ";
if(file_exists($work_path."images")) {
	echo "OK - $chmod_message CHMOD: ".substr(sprintf('%o', fileperms($work_path."images")), -4)."<p />";
} else {
echo "$admin_lang_pp_folder_missing  ".$work_path."images) - $chmod_message<p />";
}

echo "<b>$admin_lang_pp_thumbfolder</b> ";
if(file_exists($work_path."thumbnails")) {
	echo "OK - $chmod_messagethumb CHMOD: ".substr(sprintf('%o', fileperms($work_path."images")), -4)."<p />";
} else {
echo "$admin_lang_pp_folder_missing  ".$work_path."thumbnails) - $chmod_messagethumb<p />";
}

echo "<b>$admin_lang_pp_langfolder </b> ";
if(file_exists($work_path."language")) {
	echo "OK<p />";
} else {
echo "$admin_lang_pp_folder_missing  ".$work_path."language)<p />";
}

echo "<b>$admin_lang_pp_addfolder</b> ";
if(file_exists($work_path."addons")) {
	echo "OK<p />";
} else {
echo "$admin_lang_pp_folder_missing  ".$work_path."addons)<p />";
}

echo "<b>$admin_lang_pp_incfolder</b> ";
if(file_exists($work_path."includes")) {
	echo "OK<p />";
} else {
echo "$admin_lang_pp_folder_missing  ".$work_path."includes)<p />";
}

echo "<b>$admin_lang_pp_tempfolder</b> ";
if(file_exists($work_path."templates")) {
	echo "OK<p />";
} else {
echo "$admin_lang_pp_folder_missing ".$work_path."templates)<p />";
}
echo "</div><p />";
// refererlog
echo "
	<div class='jcaption'>$admin_lang_pp_ref_log_title </div>
	<div class='content'>";

    $referer_print = "<ul>";
    // only count referers from the last seven days
    gmdate("Y-m-d H:i:s",time()+(3600 * $cfgrow['timezone'])); // current date+time
    $from_date = mktime(0,0,0,gmdate("m",time()+(3600 * $cfgrow['timezone'])) ,gmdate("d",time()+(3600 * $cfgrow['timezone'])) -7,gmdate("Y",time()+(3600 * $cfgrow['timezone'])) );
    $from_date = strftime("%Y-%m-%d", $from_date);
    $from_date = "$from_date 00:00:00";
    $referer = "";
    $query = mysql_query("select distinct referer from ".$pixelpost_db_prefix."visitors where (referer!='') AND (datetime>'$from_date')");
    while(list($nreferer) = mysql_fetch_row($query)) {
       $nreferer = htmlentities($nreferer);
  	    $referer .= "!".$nreferer;
    	}
    $referer = split("!",$referer);
    $ref_biglist = "";
    foreach($referer as $value) {
	    if($value != "") {
   	    	$row = sql_array("select count(*) as count from ".$pixelpost_db_prefix."visitors where (referer='$value') AND (datetime>'$from_date')");
       		$refnumb = $row['count'];
	    	$ref_biglist .= "$refnumb@$value!";
            }
	    }
    $ref_biglist = split("!",$ref_biglist);
    rsort($ref_biglist,SORT_NUMERIC);
    foreach($ref_biglist as $value) {
	    list($numb,$referer) = explode("@",$value);
	    if($numb > "0") {
	    	if($numb < "10") { $numb = "0$numb"; }
	    	$referername = $referer;
		$length = strlen($referername);
		if($length > 50) { $referername = substr($referername,0,50); $referername = "$referername..."; }

$referer_print .= "<li><a href='$referer' rel='nofollow'>$numb &nbsp;&nbsp;&nbsp; $referername</a></li>";
		}
	}
	$referer_print .= "</ul>";
	echo $referer_print;
	echo "</div><p />";
//-------------
    }
?>