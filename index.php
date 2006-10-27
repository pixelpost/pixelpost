<?php
/*

Pixelpost version 1.5

SVN file version:
$Rev: 24 $
$LastChangedBy: Administrator $
$LastChangedDate: 2006-07-24 02:24:39 +0200 (Pn, 24 lip 2006) $

Pixelpost www: http://www.pixelpost.org/

Version 1.5:
Development Team:
Ramin Mehran, Connie Mueller-Goedecke, Will Duncan, Joseph Spurling, GeoS
Version 1.1 to Version 1.3: Linus <http://www.shapestyle.se>

Contact: thecrew@pixelpost.org
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

error_reporting(0);
ini_set('arg_separator.output', '&amp;');
session_start();

$PHP_SELF = "index.php";

// includes
require("includes/pixelpost.php");
require("includes/markdown.php");
require("includes/functions.php");
require("includes/exifer1_5/exif.php");

// Set cookie for visitor counter, re-count a person after 60 mins
setcookie("lastvisit","expires in 60 minutes",time() +60*60);

// save user info if requested
if(isset($_POST['vcookie']))
{
	$vcookiename = addslashes($_POST['name']);
	$vcookieurl = addslashes($_POST['url']);
	// modified for Email
	$vcookieemail = clean($_POST['email']);
	setcookie("visitorinfo","$vcookiename%$vcookieurl%$vcookieemail",time() +60*60*24*30); // save cookie 30 days
}


start_mysql();



// get config
if($cfgrow = sql_array("SELECT * FROM ".$pixelpost_db_prefix."config")) {
	$upload_dir = $cfgrow['imagepath'];
} else {
	$extra_message= "Coming Soon. Not Installed Yet. Cause #1";
	show_splash($extra_message,"templates");
	//echo "Coming Soon. Not Installed Yet.";
	//exit;
}

// book visitors
if (strtolower($cfgrow['visitorbooking'])!='no')
{
	book_visitor($pixelpost_db_prefix."visitors");	
	}
	

if(isset($mod_rewrite)&&$mod_rewrite == "1"){
	$showprefix = "";
} else {
	$showprefix = "./index.php?showimage=";
}

// refresh the addons table
$dir = "addons/";
refresh_addons_table($dir);


$tz = $cfgrow['timezone'];
$datetime = gmdate("Y-m-d H:i:s",time()+(3600 * $tz)); // current date+time
$cdate = $datetime;				// for future posting, current date+time

// get the language file
if (file_exists("language/lang-".$cfgrow['langfile'].".php") )
{
	if ( !isset($_GET['x'])OR($_GET['x'] != "rss" & $_GET['x'] != "atom"))
		require("language/lang-".$cfgrow['langfile'].".php");
}
else
{
	echo '<b>Error:</b><br />No <b>language</b> folder exists or the file <b>"lang-' .$cfgrow['langfile'] .'.php"</b> is missing in that folder.<br />Make sure that you have uploaded all necessary files with the exact same names as mentioned here.';
	exit;
}

// Double Quotes in <SITE_TITLE> break HTML Code
$pixelpost_site_title = $cfgrow['sitetitle'];
$pixelpost_site_title = pullout($cfgrow['sitetitle']);
$pixelpost_site_title = htmlspecialchars($pixelpost_site_title,ENT_QUOTES);


//  Added ability to use header and footers for templates.  They are not needed but used if included in the template
if(file_exists("templates/".$cfgrow['template']."/header.html"))
	$header = file_get_contents("templates/".$cfgrow['template']."/header.html");
if(file_exists("templates/".$cfgrow['template']."/footer.html"))
	$footer = file_get_contents("templates/".$cfgrow['template']."/footer.html");

// You can now add any template you want by just adding the template and a link to it.  For example,
// ?x=about will load the template about_template.html
if(isset($_GET['x'])&& $_GET['x'] == "ref" )
{
	// Maintain backwards compatibility with the referer template
	$_GET['x'] = "referer";
}

// refererlog
if(isset($_GET['x'])&&$_GET['x'] == "referer") {
		header("HTTP/1.0 404 Not Found");
		header("Status: 404 File Not Found!");
    // header("Location: index.php");
echo "<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\"><HTML><HEAD>\n<TITLE>404 Not Found</TITLE>\n</HEAD><BODY>\n<H1>Not Found</H1>\nThe requested URL /index.php was not found on this server.<P>\n<P>Additionally, a 404 Not Found\nerror was encountered while trying to use an ErrorDocument to handle the request.\n</BODY></HTML>";
    exit;
 } // end refererlog

if( isset($_GET['x'])&&file_exists( "templates/".$cfgrow['template']."/".$_GET['x']."_template.html" ) )
{
	if (eregi("[.]",$_GET['x']))
		die("Come on! forget about it...");
	
	$tpl = file_get_contents("templates/".$cfgrow['template']."/".$_GET['x']."_template.html");
}
else
{

	if (!file_exists("templates/".$cfgrow['template']."/image_template.html"))
	{
		echo '<b>Error:</b><br />No template folder exists by the name of <b>"' .$cfgrow['template'] .'"</b> or the file <b>image_template.html</b> is missing in that folder.<br />Make sure that you have uploaded all necessary files with the exact same names as mentioned here.';
		exit;
	}

// if the x=foo does not exist prompt it! don't show the main page anymore!

	if (isset($_GET['x'])&& $_GET['x']!='atom' && $_GET['x']!='rss' && $_GET['x']!='save_comment' ){ // if (isset($_GET['x']) and !file_exists( "templates/".$cfgrow['template']."/".$_GET['x']."_template.html" ))
			header("HTTP/1.0 404 Not Found");
			header("Status: 404 File Not Found!");
			// header("Location: index.php");
			echo "<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\"><HTML><HEAD>\n<TITLE>404 Not Found</TITLE>\n</HEAD><BODY>\n<H1>Not Found</H1>\nThe requested URL /index.php was not found on this server.<P>\n<P>Additionally, a 404 Not Found\nerror was encountered while trying to use an ErrorDocument to handle the request.\n</BODY></HTML>";
			exit;
		}

	$tpl = file_get_contents("templates/".$cfgrow['template']."/image_template.html");
}

if(isset($_GET['popup'])&&$_GET['popup'] == "comment")
{
		
	$tpl = file_get_contents("templates/".$cfgrow['template']."/comment_template.html");
}

// if showimage=badstuff or email to hijack!
if (isset($_GET['showimage']) && !is_numeric($_GET['showimage'])){
// show 404!
			header("HTTP/1.0 404 Not Found");
			header("Status: 404 File Not Found!");
			// header("Location: index.php");
			echo "<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\"><HTML><HEAD>\n<TITLE>404 Not Found</TITLE>\n</HEAD><BODY>\n<H1>Not Found</H1>\nDon't do that! go back to index.php! \n</BODY></HTML>";
			exit;
}

// Added ability to use header and footers for templates.  They are not needed but used if included in the template
if(isset($header))
	$tpl = $header . $tpl;
if(isset($footer))	
	$tpl = $tpl. $footer;

// Get visitor count
$visitors = sql_array("SELECT count(*) as count FROM ".$pixelpost_db_prefix."visitors");
$pixelpost_visitors = $visitors['count'];

// Get number of photos in database
$photonumb = sql_array("SELECT count(*) as count FROM ".$pixelpost_db_prefix."pixelpost WHERE datetime<='$datetime'");
$pixelpost_photonumb = $photonumb['count'];

// added for temp to create banlist table if it is not there TODO: THIS WILL GO INTO THE CREATE_TABLES
create_banlist();

// images/main site
if(!isset($_GET['x']) /*$_GET['x'] == ""*/)
{
  // Get Current Image.
	if(!isset($_SESSION["pixelpost_admin"]))
	{
		if(!isset($_GET['showimage']) /*$_GET['showimage'] == ""*/)
		{
			$row = sql_array("SELECT * FROM ".$pixelpost_db_prefix."pixelpost WHERE datetime<='$cdate' ORDER BY datetime DESC limit 0,1");
		}
		else
		{
			$row = sql_array("SELECT * FROM ".$pixelpost_db_prefix."pixelpost WHERE (id='".$_GET['showimage']."') AND datetime<='$cdate'");
		}
	}
	else
	{
		if($_GET['showimage'] == "")
		{
			$row = sql_array("SELECT * FROM ".$pixelpost_db_prefix."pixelpost ORDER BY datetime DESC limit 0,1");
		}
		else
		{
			$row = sql_array("SELECT * FROM ".$pixelpost_db_prefix."pixelpost WHERE (id='".$_GET['showimage']."')");
		}
	}

	if(!$row['image'])
	{
		echo "$lang_nothing_to_show";
		exit;
	}

	$image_name         = $row['image'];
	$image_title        = pullout($row['headline']);
	$image_title = htmlspecialchars($image_title,ENT_QUOTES);
	$image_id           = $row['id'];
	$image_datetime     = $row['datetime'];
	$image_datetime_formatted = strtotime($image_datetime);
	$image_datetime_formatted = date($cfgrow['dateformat'],$image_datetime_formatted);
	$image_date         = substr($row['datetime'],0,10);
	$image_time         = substr($row['datetime'],11,5);
	$image_date_year_full   = substr($row['datetime'],0,4);
	$image_date_year   = substr($row['datetime'],2,2);
	$image_date_month = substr($row['datetime'],5,2);
	$image_date_day = substr($row['datetime'],8,2);
	$image_notes        = pullout($row['body']);
	$image_notes        = markdown($image_notes);
	$thumbnail_extra = getimagesize("thumbnails/thumb_$image_name");
	$image_extra = getimagesize("images/$image_name");
	$image_width = $image_extra['0'];
	$image_height = $image_extra['1'];
	$tpl = str_replace("<IMAGE_WIDTH>",$image_width,$tpl);
	$tpl = str_replace("<IMAGE_HEIGHT>",$image_height,$tpl);
	$local_width = $thumbnail_extra['0'];
	$local_height = $thumbnail_extra['1'];




	//$image_title = htmlentities($image_title );
	$image_thumbnail = "<a href='$showprefix$image_id'><img src='thumbnails/thumb_$image_name' alt='$image_title' title='$image_title' width='$local_width' height='$local_height' /></a>";

	// thumnail no link
	$image_thumbnail_no_link = "<img src='thumbnails/thumb_$image_name' alt='$image_title' title='$image_title' width='$local_width' height='$local_height' />";

	$image_permalink = "<a href='$showprefix$image_id'>$lang_permalink</a>"; // permalink automated for fancy url/no fancy

	// get previous image id and name
	if(!isset($_SESSION["pixelpost_admin"]))
	{
		$previous_row = sql_array("SELECT id,headline,image,datetime FROM ".$pixelpost_db_prefix."pixelpost WHERE (datetime < '$image_datetime') and (datetime<='$cdate') ORDER BY datetime desc limit 0,1");
	}
	else
	{
		$previous_row = sql_array("SELECT id,headline,image,datetime FROM ".$pixelpost_db_prefix."pixelpost WHERE (datetime < '$image_datetime')  ORDER BY datetime desc limit 0,1");
	}
	$image_previous_name = $previous_row['image'];
	$image_previous_id = $previous_row['id'];
	$image_previous_title = pullout($previous_row['headline']);
	$image_previous_datetime = $previous_row['datetime'];
	$image_previous_link = "<a href='$showprefix$image_previous_id'>$lang_previous</a>";
	list($local_width,$local_height,$type,$attr) = getimagesize("thumbnails/thumb_$image_previous_name");
	$image_previous_thumbnail = "<a href='$showprefix$image_previous_id'><img src='thumbnails/thumb_$image_previous_name' width='$local_width' height='$local_height' alt='$image_previous_title' title='$image_previous_title' /></a>";

	if($image_previous_id == "")
	{
		$image_previous_id = $image_id;
		$image_previous_title = "$lang_no_previous";
		$image_previous_link = "";
		$image_previous_thumbnail = "";
	}

	// get next image id and name
	if(!isset($_SESSION["pixelpost_admin"]))
	{
		$next_row = sql_array("SELECT id,headline,image,datetime FROM ".$pixelpost_db_prefix."pixelpost WHERE (datetime > '$image_datetime') and (datetime<='$cdate') ORDER BY datetime asc limit 0,1");
	}
	else
	{
		$next_row = sql_array("SELECT id,headline,image,datetime FROM ".$pixelpost_db_prefix."pixelpost WHERE (datetime > '$image_datetime') ORDER BY datetime asc limit 0,1");
	}
	$image_next_name = $next_row['image'];
	$image_next_id = $next_row['id'];
	$image_next_title = pullout($next_row['headline']);
	$image_next_datetime = $next_row['datetime'];
	$image_next_link = "<a href='$showprefix$image_next_id'>$lang_next</a>";
	list($local_width,$local_height,$type,$attr) = getimagesize("thumbnails/thumb_$image_next_name");
	$image_next_thumbnail = "<a href='$showprefix$image_next_id'><img src='thumbnails/thumb_$image_next_name' alt='$image_next_title' width='$local_width' height='$local_height' title='$image_next_title' /></a>";

	if($image_next_id == "")
	{
		$image_next_id = $image_id;
		$image_next_title = "$lang_no_next";
		$image_next_link = "";
		$image_next_thumbnail = "";
	}

	if(function_exists('gd_info'))
	{
		$gd_info = gd_info();

		if($gd_info != "")
		{
		// check that gd is here before this
			$aheadnumb = sql_array("SELECT count(*) as count FROM ".$pixelpost_db_prefix."pixelpost WHERE (datetime > '$image_datetime') and (datetime<='$cdate')");
			$aheadnumb = $aheadnumb['count'];
			$behindnumb = sql_array("SELECT count(*) as count FROM ".$pixelpost_db_prefix."pixelpost WHERE (datetime < '$image_datetime') and (datetime<='$cdate')");
			$behindnumb = $behindnumb['count'];
			$aheadlimit = round(($cfgrow['thumbnumber']-1)/2);
			$behindlimit = round(($cfgrow['thumbnumber']-1)/2);

			if($aheadnumb <= $aheadlimit)
			{
				$behindlimit = ($cfgrow['thumbnumber']-1)-$aheadnumb;
				$aheadlimit = $aheadnumb;
			}

			if($behindnumb <= $behindlimit)
			{
				$aheadlimit = ($cfgrow['thumbnumber']-1)-$behindnumb;
				$behindlimit = $behindnumb;
			}

			$totalthumbcounter = 1;
			$ahead_thumbs = "";
			$ahead_thumbs_reverse  ="";
			$thumbs_ahead = mysql_query("SELECT id,headline,image FROM ".$pixelpost_db_prefix."pixelpost WHERE (datetime > '$image_datetime') and (datetime<='$cdate') ORDER BY datetime asc limit 0,$aheadlimit");

			while(list($id,$headline,$image) = mysql_fetch_row($thumbs_ahead))
			{
				$headline = pullout($headline);
				$headline = htmlspecialchars($headline,ENT_QUOTES);
				list($local_width,$local_height,$type,$attr) = getimagesize("thumbnails/thumb_$image_name");
				$ahead_thumbs .= "<a href='$showprefix$id'><img src='thumbnails/thumb_$image' alt='$headline' title='$headline' class='thumbnails' width='$local_width' height='$local_height' /></a>";
				$ahead_thumbs_reverse = "<a href='$showprefix$id'><img src='thumbnails/thumb_$image' alt='$headline' title='$headline' class='thumbnails' width='$local_width' height='$local_height' /></a>" .$ahead_thumbs_reverse ;
				$totalthumbcounter++;
			}

			$behind_thumbs = "";
			$behind_thumbs_reverse ="";
			$thumbs_behind = mysql_query("SELECT id,headline,image FROM ".$pixelpost_db_prefix."pixelpost WHERE (datetime < '$image_datetime') and (datetime<='$cdate') ORDER BY datetime desc limit 0,$behindlimit");

			while(list($id,$headline,$image) = mysql_fetch_row($thumbs_behind))
			{
				$headline = pullout($headline);
				$headline = htmlspecialchars($headline,ENT_QUOTES);
				list($local_width,$local_height,$type,$attr) = getimagesize("thumbnails/thumb_$image_name");
				$behind_thumbs = "<a href='$showprefix$id'><img src='thumbnails/thumb_$image' alt='$headline' title='$headline' class='thumbnails' width='$local_width' height='$local_height' /></a>$behind_thumbs";
				$behind_thumbs_reverse .= "<a href='$showprefix$id'><img src='thumbnails/thumb_$image' alt='$headline' title='$headline' class='thumbnails' width='$local_width' height='$local_height' /></a>";
				$totalthumbcounter++;
			}

			list($local_width,$local_height,$type,$attr) = getimagesize("thumbnails/thumb_$image_name");
			$thumbnail_row = "$behind_thumbs<a href='$showprefix$image_id'><img src='thumbnails/thumb_$image_name' alt='$image_title' title='$image_title' class='current-thumbnail' width='$local_width' height='$local_height' /></a>$ahead_thumbs";
			$thumbnail_row_reverse = "$ahead_thumbs_reverse<a href='$showprefix$image_id'><img src='thumbnails/thumb_$image_name' alt='$image_title' title='$image_title' class='current-thumbnail' width='$local_width' height='$local_height' /></a>$behind_thumbs_reverse";
			$tpl = ereg_replace("<IMAGE_THUMBNAIL_ROW>",$thumbnail_row,$tpl);
			$tpl = ereg_replace("<IMAGE_THUMBNAIL_ROW_REV>",$thumbnail_row_reverse,$tpl);
		} // gd_info()
	} // func exist

	// Modified from Mark Lewin's hack for multiple categories
	$querystr = "SELECT t1.cat_id,t2.name FROM ".$pixelpost_db_prefix."catassoc as t1 inner join ".$pixelpost_db_prefix."categories t2 on t1.cat_id = t2.id WHERE t1.image_id = '$image_id' ORDER BY t2.name ";
	$query = mysql_query($querystr);
	$image_category_number = 0;

	$image_category_all ="";
	$image_category_all_paged = "";
	while(list($cat_id,$name) = mysql_fetch_row($query))
	{
		$name = pullout($name);
		$image_category_all .= "<a href='$PHP_SELF?x=browse&amp;category=$cat_id'>" .$cfgrow['catgluestart'] .$name .$cfgrow['catglueend']."</a> &nbsp;";
		$image_category_all_paged .= "<a href='$PHP_SELF?x=browse&amp;category=$cat_id&amp;pagenum=1'>" .$cfgrow['catgluestart'] .$name .$cfgrow['catglueend']."</a> &nbsp;";
		$image_category_number = $image_category_number +1;
	}

	if ($image_category_number >1)	$image_categoryword = "$lang_category_plural ";
	else	$image_categoryword = "$lang_category_singular ";

	$tpl = ereg_replace("<SITE_TITLE>",$pixelpost_site_title,$tpl);
	$tpl = ereg_replace("<SITE_URL>",$cfgrow['siteurl'],$tpl);
	$tpl = ereg_replace("<IMAGE_CATEGORY>",$image_categoryword." ".$image_category_all,$tpl);
	// for paged_archive addon
	$tpl = ereg_replace("<IMAGE_CATEGORY_PAGED>",$image_categoryword." ".$image_category_all_paged,$tpl);
	$tpl = ereg_replace("<IMAGE_DATE_YEAR_FULL>",$image_date_year_full,$tpl);
	$tpl = ereg_replace("<IMAGE_DATE_YEAR>",$image_date_year,$tpl);
	$tpl = ereg_replace("<IMAGE_DATE_MONTH>",$image_date_month,$tpl);
	$tpl = ereg_replace("<IMAGE_DATE_DAY>",$image_date_day,$tpl);
	$tpl = ereg_replace("<IMAGE_THUMBNAIL>",$image_thumbnail,$tpl);
	// thumbnail no link
	$tpl = ereg_replace("<IMAGE_THUMBNAIL_NO_LINK>",$image_thumbnail_no_link,$tpl);
	$tpl = ereg_replace("<IMAGE_DATE>",$image_date,$tpl);
	$tpl = ereg_replace("<IMAGE_TIME>",$image_time,$tpl);
	$tpl = ereg_replace("<IMAGE_NAME>",$image_name,$tpl);
	$tpl = ereg_replace("<IMAGE_TITLE>",$image_title,$tpl);
	$tpl = ereg_replace("<IMAGE_DATETIME>",$image_datetime_formatted,$tpl);
	$tpl = ereg_replace("<IMAGE_NOTES>",$image_notes,$tpl);
	// image notes without HTML tags and double quotes
	$image_notes_clean = strip_tags($image_notes);
        $image_notes_clean = htmlspecialchars($image_notes_clean,ENT_QUOTES);
     	$tpl = ereg_replace("<IMAGE_NOTES_CLEAN>",$image_notes_clean,$tpl);
	// end image notes without HTML tags
	$tpl = ereg_replace("<IMAGE_ID>",$image_id,$tpl);
	$tpl = ereg_replace("<IMAGE_PERMALINK>",$image_permalink,$tpl);
	$tpl = ereg_replace("<IMAGE_PREVIOUS_LINK>",$image_previous_link,$tpl);
	$tpl = ereg_replace("<IMAGE_PREVIOUS_THUMBNAIL>",$image_previous_thumbnail,$tpl);
	$tpl = ereg_replace("<IMAGE_PREVIOUS_ID>",$image_previous_id,$tpl);
	$tpl = ereg_replace("<IMAGE_PREVIOUS_TITLE>",$image_previous_title,$tpl);
	$tpl = ereg_replace("<IMAGE_NEXT_LINK>",$image_next_link,$tpl);
	$tpl = ereg_replace("<IMAGE_NEXT_ID>",$image_next_id,$tpl);
	$tpl = ereg_replace("<IMAGE_NEXT_TITLE>",$image_next_title,$tpl);
	$tpl = ereg_replace("<IMAGE_NEXT_THUMBNAIL>",$image_next_thumbnail,$tpl);
	

	// get number of comments
	$cnumb_row = sql_array("SELECT count(*) as count FROM ".$pixelpost_db_prefix."comments WHERE parent_id='$image_id' and publish='yes'");
	$image_comments_number = $cnumb_row['count'];

	// get latest comment
	$latest_comment = sql_array("SELECT parent_id FROM ".$pixelpost_db_prefix."comments WHERE  publish='yes' ORDER BY id desc limit 0,1");
	$latest_comment = $latest_comment['parent_id'];
	$queryrow = sql_array("SELECT headline FROM ".$pixelpost_db_prefix."pixelpost WHERE id='$latest_comment'");
	$latest_comment_name = pullout($queryrow['headline']);


	// EXIF STUFF
	$curr_image = "images/$image_name";

	// set empty-tag + prepare not to produce empty exif-tags in the template
	$empty_exif = "";

	$exif_result = read_exif_data_raw($curr_image,"0");
	if (isset($exif_result['SubIFD']))
		$exposure = $exif_result['SubIFD']['ExposureTime']; // exposure time
	if(isset($exposure)&&$exposure != "")
	{
		$exposure = reduceExif($exposure);
		$exposure = "$exposure sec";
	}

	if (isset($exif_result['SubIFD'])){
		$aperture = $exif_result['SubIFD']['FNumber']; // Aperture
		$capture_date = $exif_result['SubIFD']['DateTimeOriginal']; // Date and Time

		$flash = $exif_result['SubIFD']['Flash']; // flash
		$focal = $exif_result['SubIFD']['FocalLength']; // focal length
	}
	if (isset($exif_result['IFD0'])){
	$info_camera_manu = trim($exif_result['IFD0']['Make']); // camera maker
	$info_camera_model = trim($exif_result['IFD0']['Model']); // camera model
	}
	if (isset($exif_result['SubIFD']))
		$iso = pullout($exif_result['SubIFD']['ISOSpeedRatings']); // not working apparently

	if(isset($flash)&&$flash == "No Flash")	$flash = "$lang_flash_not_fired";
	elseif(isset($flash)&&$flash)	$flash = "$lang_flash_fired";


	if(isset($exposure)&&$exposure != "") 	{
			$exposure = "$exposure";
			$tpl = ereg_replace("<EXIF_EXPOSURE_TIME>",$exposure,$tpl);
		}	else 	{
			$exposure = "$empty_exif";
			$tpl = ereg_replace("<EXIF_EXPOSURE_TIME>",$exposure,$tpl);
		}
		$langexposure = "$lang_exposure $exposure";
		$tpl = ereg_replace("<LANG_EXPOSURE_TIME>",$langexposure,$tpl);


	if(isset($aperture)&&$aperture != "") 	{
		 $tpl = ereg_replace("<EXIF_APERTURE>",$aperture,$tpl);
		} else 	{
		 $aperture = "$empty_exif";
		 $tpl = ereg_replace("<EXIF_APERTURE>",$aperture,$tpl);
		}
		$langaperture = "$lang_aperture $aperture";
	  $tpl = ereg_replace("<LANG_APERTURE>",$langaperture,$tpl);



	if(isset($capture_date)&&$capture_date != "") 	{
			$tpl = ereg_replace("<EXIF_CAPTURE_DATE>",$capture_date,$tpl);
		}	else {
			$capture_date = "$empty_exif";
			$tpl = ereg_replace("<EXIF_CAPTURE_DATE>",$capture_date,$tpl);
		}
		$langcapture_date = "$lang_capture_date $capture_date";
		$tpl = ereg_replace("<LANG_CAPTURE_DATE>",$langcapture_date,$tpl);


	if(isset($focal)&&$focal != "") 	{
			$tpl = ereg_replace("<EXIF_FOCAL_LENGTH>",$focal,$tpl);
		} else 	{
			$focal = "$empty_exif";
			$tpl = ereg_replace("<EXIF_FOCAL_LENGTH>",$focal,$tpl);
		}
		$langfocal = "$lang_focal $focal";
		$tpl = ereg_replace("<LANG_FOCAL_LENGTH>",$langfocal,$tpl);


	if(isset($info_camera_manu)&&$info_camera_manu != "") 	{
			$langcamera_manu = "$lang_camera_maker $info_camera_manu";
			$tpl = ereg_replace("<EXIF_CAMERA_MAKE>",$info_camera_manu,$tpl);
		}	else {
		  $info_camera_manu = "$empty_exif";
	  	$tpl = ereg_replace("<EXIF_CAMERA_MAKE>",$info_camera_manu,$tpl);
		}
		$tpl = ereg_replace("<LANG_CAMERA_MAKE>",$langcamera_manu,$tpl);


	if(isset($info_camera_model)&&$info_camera_model != "") {
			$langcamera_model = "$lang_camera_model $info_camera_model";
			$tpl = ereg_replace("<EXIF_CAMERA_MODEL>",$info_camera_model,$tpl);
		} else {
			$info_camera_model = "$empty_exif";
			$tpl = ereg_replace("<EXIF_CAMERA_MODEL>",$info_camera_model,$tpl);
		}
		$tpl = ereg_replace("<LANG_CAMERA_MODEL>",$langcamera_model,$tpl);


	if(isset($iso)&&$iso != "")
	{	$tpl = ereg_replace("<EXIF_ISO>",$iso,$tpl);
		$iso = "$iso";} else {$iso = "$empty_exif";
		$tpl = ereg_replace("<EXIF_ISO>",$iso,$tpl);}
		$langiso = "$lang_iso $iso";
		$tpl = ereg_replace("<LANG_ISO>",$langiso,$tpl);


	if(isset($flash)&&$flash != "")	{
			$tpl = ereg_replace("<EXIF_FLASH>",$flash,$tpl);
			$flash = "$flash";
		} else	{
			$flash = "$empty_exif";
			$tpl = ereg_replace("<EXIF_FLASH>",$flash,$tpl);
		}


	/////////////
	// build a string with all comments
	if(isset($_GET['x'])&&($_GET['x'] == "") or (isset($_GET['popup'])&&$_GET['popup'] == "comment"))
	{
		if(isset($_GET['comment'])&&$_GET['comment'] == "save")
		{
			// Ramin added more protections
			if (eregi ("Content-Transfer-Encoding", $_POST['parent_name'].$_POST['email'].$_POST['url'].$_POST['name'].$_POST['message'].$_POST['parent_id'])) {die("SPAM Injection Error :(");}
			if (eregi ("MIME-Version", $_POST['parent_name'].$_POST['email'].$_POST['url'].$_POST['name'].$_POST['message'].$_POST['parent_id'])) {die("SPAM Injection Error :(");}
			if (eregi ("Content-Type", $_POST['parent_name'].$_POST['email'].$_POST['url'].$_POST['name'].$_POST['message'].$_POST['parent_id'])) {die("SPAM Injection Error :(");}

			$datetime = gmdate("Y-m-d H:i:s",time()+(3600 * $cfgrow['timezone'])); // current date+time //was date("Y-m-d H:i:s");
			$ip = $_SERVER['REMOTE_ADDR'];
// $parent_id		$parent_id = $_POST['parent_id'];
			$parent_id = isset($_POST['parent_id']) ? $_POST['parent_id'] : "";
			if (eregi("\r",$parent_id) || eregi("\n",$parent_id)){  die("No intrusion! ?? :(");}
			if (!is_numeric($parent_id))
				die('parent_id is not correct!');

// $message		$message = clean(nl2br($_POST['message']));
			$message = isset($_POST['message']) ? $_POST['message'] : "";
			$message = clean_comment($message);
			$message = nl2br($message);
		
// $name 		$name = clean($_POST['name']);
			$name = isset($_POST['name']) ? $_POST['name'] : "";
			if (eregi("\r",$name) || eregi("\n",$name)){  die("No intrusion! ?? :(");}
			$name = clean_comment($name);	
		
// $url 		$url = clean($_POST['url']);
			$url = isset($_POST['url']) ? $_POST['url'] : "";
			if(eregi("\r",$url) || eregi("\n",$url)){  die("No intrusion! ?? :(");}
			if(strpos($url,'https://') === false && strpos($url,'http://') === false && strlen($url) > 0)	$url = "http://".$url;
			$url = clean_comment($url);

// $parent_name		$parent_name = clean($_POST['parent_name']);
			$parent_name = isset($_POST['parent_name']) ? $_POST['parent_name'] : "";
			if (eregi("\r",$parent_name) || eregi("\n",$parent_name)){  die("No intrusion! ?? :(");}
			$parent_name = clean_comment($parent_name);	

// $email 		$email = clean($_POST['email']);
			$email = isset($_POST['email']) ? $_POST['email'] : "";
			if (eregi("\r",$email) || eregi("\n",$email)){  die("No intrusion! ?? :(");}
			$email = clean_comment($email);	
			
			// check that only one email-adress entered
			$onlyone = $email;
			$numberofats = substr_count("$onlyone", "@");
			if ($numberofats > 1) {die("only one email-adress allowed");}

			$cmnt_moderate_permission = $cfgrow['moderate_comments'];

			if ($cmnt_moderate_permission=='yes')
				$cmnt_publish_permission ='no';
			if ($cmnt_moderate_permission=='no')
				$cmnt_publish_permission ='yes';

			if($parent_id == "")	$extra_message = "<b>$lang_message_missing_image</b><p />";

			if($message == "")	$extra_message = "<b>$lang_message_missing_comment</b><p />";

			if(($parent_id != "") and ($message != "")){

			// check the comment with banlists
			if (!is_comment_in_blacklist($message,$ip,$name)){

				// send it to moderation if contains banned words but not black listed!
				if(is_comment_in_moderation_list($message,$ip,$name)){
					$cmnt_publish_permission = 'no';
					$cmnt_moderate_permission = 'yes';
					}

				// to the job now
				if ($cmnt_moderate_permission =='yes')
					$extra_message = "<p /><b>$lang_message_moderating_comment</b><p />";
				sql_save("INSERT INTO ".$pixelpost_db_prefix."comments(id,parent_id,datetime,ip,message,name,url,email,publish)
					VALUES(NULL,'$parent_id','$datetime','$ip','$message','$name','$url','$email','$cmnt_publish_permission')");
				}
			} // end if not in the black list
		}
	} // end if comment
	// visitor information in comments
	$vinfo_name = "";
	$vinfo_url = "";
	$vinfo_email = "";
	if(isset($_COOKIE['visitorinfo']))	list($vinfo_name,$vinfo_url,$vinfo_email) = split("%",$_COOKIE['visitorinfo']);

	$tpl = ereg_replace("<VINFO_NAME>",$vinfo_name,$tpl);
	$tpl = ereg_replace("<VINFO_URL>",$vinfo_url,$tpl);
	$tpl = ereg_replace("<VINFO_EMAIL>",$vinfo_email,$tpl);

	if($_GET['showimage'] == "")	$imageid = $image_id;
	else	$imageid = $_GET['showimage'];

	$image_comments = print_comments($imageid);
	$tpl = ereg_replace("<IMAGE_COMMENTS>",$image_comments,$tpl);

	if(($_GET['popup'] == "comment") AND (!isset($_GET['x'])OR$_GET['x'] != "save_comment"))
	{
		include_once('includes/addons_lib.php');
		echo $tpl;
		exit;
	}
//} // end if comment
} // end imageprint

// fix a popuplink

$tpl = ereg_replace("<SITE_TITLE>",$pixelpost_site_title,$tpl);

if(isset($_GET['x']) &&$_GET['x'] == "browse")
{
	$thumb_output = "";
	$where = "";

	if(is_numeric($_GET['category']) && $_GET['category'] != "")
	{
		// Modified from Mark Lewin's hack for multiple categories
		$query = mysql_query("SELECT 1,t2.id,headline,image,datetime
													FROM  {$pixelpost_db_prefix}catassoc as t1
													INNER JOIN {$pixelpost_db_prefix}pixelpost t2 on t2.id = t1.image_id
													WHERE t1.cat_id = '".$_GET['category']."'
													AND (datetime<='$cdate')
													ORDER BY datetime DESC");
		$lookingfor = 1;
	}
	ELSE IF (isset($_GET['archivedate']) && eregi("^[0-9]{4}-[0-9]{2}$", $_GET['archivedate']))
	{
		$where = "AND (DATE_FORMAT(datetime, '%Y-%m')='".$_GET['archivedate']."')"; //DATE_FORMAT(foo, '%Y-%m-%d')
		$query = mysql_query("SELECT 1,id,headline,image, datetime FROM ".$pixelpost_db_prefix."pixelpost WHERE (datetime<='$cdate') $where ORDER BY datetime desc");
		$lookingfor = 1;
	}
	ELSEIF(isset($_POST['category']) )
	{
		$lookingfor = 0;
		$where = "(";

		foreach( $_POST['category'] as $cat )
		{
			$where .= "t1.cat_id='$cat' OR ";
			$lookingfor++;
		}

		$where .= " 0 )";
		$querystr = "SELECT COUNT(t1.id), t2.id,headline,image,datetime
									FROM {$pixelpost_db_prefix}catassoc AS t1
									INNER JOIN {$pixelpost_db_prefix}pixelpost t2 ON t2.id = t1.image_id
									WHERE (datetime<='$cdate') AND
									$where
									GROUP BY t2.id
									ORDER BY datetime, t2.id DESC";
		$query = mysql_query($querystr);
	}
	ELSE
	{
		$lookingfor = 1;
		$query = mysql_query("SELECT 1,id,headline,image,datetime FROM ".$pixelpost_db_prefix."pixelpost WHERE (datetime<='$cdate') ORDER BY datetime desc");
	}


	while(list($count,$id,$title,$name,$datetime) = mysql_fetch_row($query))
	{
		if( $count != $lookingfor ) continue;   // Major hack for the browse filters.
		$title = pullout($title);
		$title = htmlspecialchars($title,ENT_QUOTES);
		$thumbnail = "thumbnails/thumb_$name";
		$thumb_output .= "<a href=\"$showprefix$id\"><img src=\"$thumbnail\" alt=\"$title\" title=\"$title\" class=\"thumbnails\" /></a>";
	}

   $tpl = ereg_replace("<THUMBNAILS>",$thumb_output,$tpl);
}

// build browse menu
// $browse_select = "<select name='browse' onchange='self.location.href=this.options[this.selectedIndex].value;'><option value=''>$lang_browse_select_category</option><option value='?x=browse&amp;category='>$lang_browse_all</option>";
$browse_select = "<select name='browse' onchange='self.location.href=this.options[this.selectedIndex].value;'><option value=''>$lang_browse_select_category</option><option value='index.php?x=browse&amp;category='>$lang_browse_all</option>";
$query = mysql_query("SELECT * FROM ".$pixelpost_db_prefix."categories ORDER BY name");

while(list($id,$name) = mysql_fetch_row($query))
{
	$name = pullout($name);
//		$browse_select .= "<option value='?x=browse&amp;category=$id'>$name</option>";
	$browse_select .= "<option value='index.php?x=browse&amp;category=$id'>$name</option>";
}
$browse_select .= "</select>";
$tpl = ereg_replace("<BROWSE_CATEGORIES>",$browse_select,$tpl);

// build browse checkboxes
$checkboxes = "<form method='post' action='index.php?x=browse'>";
$query = mysql_query("SELECT * FROM ".$pixelpost_db_prefix."categories ORDER BY name");

while(list($id,$name) = mysql_fetch_row($query))
{
	$name = pullout($name);

	$checkbox_checked = "";

	if(isset($category)&&is_array($category)&& in_array($id,$category))	$checkbox_checked = "checked";

	$checkboxes .= "<input type='checkbox' name='category[]' value='$id' $checkbox_checked />$name&nbsp;&nbsp;&nbsp;\n";
}
$checkboxes .= "<input type='submit' value='Filter' /></form>";
$tpl = ereg_replace("<BROWSE_CHECKBOXLIST>",$checkboxes,$tpl);

// ##########################################################################################//
// RSS 2.0 FEED
// ##########################################################################################//

if(isset($_GET['x'])&&$_GET['x'] == "rss")

{
    $output = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
    <rss version=\"2.0\">
    <channel>
    <title>".$pixelpost_site_title."</title>
    <link>".$cfgrow['siteurl']."</link>
    <description>$pixelpost_site_title</description>
    <docs>http://blogs.law.harvard.edu/tech/rss</docs>
    <generator>pixelpost</generator>
    ";
	$tzoner = $cfgrow['timezone'];
	$tprefix = '+';
	$tzoner = sprintf ("%01.2f", $tzoner);
	if (substr($tzoner,0,1)=='-')
	{
		$tzoner = (substr($tzoner,1));
		$tprefix = '-';
	}

	if ($tzoner < 10)	$tzoner = "0".$tzoner;

	$hh = substr($tzoner,0,2);
	$mm = substr($tzoner,-2);
	$tzoner = $tprefix.$hh.$mm;
	$query = mysql_query("SELECT id,datetime,headline,body,image FROM ".$pixelpost_db_prefix."pixelpost WHERE (datetime<='$cdate') ORDER BY datetime desc limit 10");

	while(list($id,$datetime,$headline,$body,$image) = mysql_fetch_row($query))
	{
		$headline = pullout($headline);
		$headline = htmlspecialchars($headline,ENT_QUOTES);
		$image = $cfgrow['siteurl']."thumbnails/thumb_$image";
		$datetime = strtotime($datetime);
		$datetime =date("D, d M Y H:i",$datetime);
		$datetime .= ' ' .$tzoner;
		$body = pullout($body);
		$body = stripslashes($body);
		$body = strip_tags( $body );
		$body = htmlspecialchars($body,ENT_QUOTES);
		$body = ereg_replace("\n","\n&lt;br /&gt;",$body);
		$output .= "
        <item>
        <title>$headline</title>
        <link>".$cfgrow['siteurl']."?showimage=$id</link>
        <description>
	&lt;img src=&quot;$image&quot;&gt;
	&lt;br /&gt;$body
	</description>
        <pubDate>$datetime</pubDate>
	<guid>".$cfgrow['siteurl']."index.php?showimage=$id</guid>
        </item>
        ";
	}

 	$output .= "
        </channel>
        </rss>";
	header("Content-type:application/xml");
	echo $output;
	exit;
}
// ##########################################################################################//
// ATOM FEED, Version 1.0 
// ##########################################################################################//

if(isset($_GET['x'])&&$_GET['x'] == "atom")
{
	header("content-type: application/atom+xml");
	$tzoner = $cfgrow['timezone'];
	$tprefix = '+';
	$tzoner = sprintf ("%01.2f", $tzoner);

	if (substr($tzoner,0,1)=='-')
	{
     $tzoner = (substr($tzoner,1));
     $tprefix = '-';
	}

	if ($tzoner < 10) $tzoner = "0".$tzoner;

	$hh = substr($tzoner,0,2);
	$mm = substr($tzoner,-2);
	$tzoner = $tprefix.$hh.":".$mm;
	$url = $cfgrow['siteurl'];
	$atom = "<?xml version='1.0' encoding='UTF-8'?>
   <feed xml:lang='en' xmlns='http://www.w3.org/2005/Atom'>
   <title>$pixelpost_site_title photoblog</title>
   <link rel='alternate' type='text/html' href='".$cfgrow['siteurl']."' title='".$pixelpost_site_title."' />
	 <link rel='self' type='application/atom+xml' href='".$cfgrow['siteurl']."index.php?x=atom' title='".$pixelpost_site_title."' />	 
	 <author>
	 <name>".$pixelpost_site_title."</name>
	 <uri>$url</uri>
	 </author>
	 <generator uri='http://www.pixelpost.org/' version='1.5BETA'>PixelPost</generator>
	 <id>$url</id>
	 <updated>".date("Y-m-d\TH:i:s$tzoner")."</updated>
";
	$tag_url = $_SERVER['HTTP_HOST'];
	$query = mysql_query("SELECT id,datetime,headline,body,image FROM ".$pixelpost_db_prefix."pixelpost WHERE (datetime <='$cdate') ORDER BY datetime desc limit 0,20");

	while(list($id,$datetime,$headline,$body,$image) = mysql_fetch_row($query))
	{
		$headline = pullout($headline);
		$headline = htmlspecialchars($headline,ENT_QUOTES);
		$body = pullout($body);
		$body = htmlspecialchars($body,ENT_QUOTES);
		$body = strip_tags($body);
		$image = $cfgrow['siteurl']."thumbnails/thumb_$image";
		$tag_date =substr($datetime,0,10);
		$id_date = substr($datetime,0,10);
		$tag_time = substr($datetime,11,8);
		$tag_date .=T;
		$tag_date .=$tag_time;
		$tag_date .=Z;
		
			$modified_date =substr($datetime,0,10);
		$modified_date = $modified_date."T".(substr($datetime,11,8));
		$datetime = strtotime($datetime);
		$atom .= "	 <entry xmlns='http://www.w3.org/2005/Atom'>
	  <title type='html'>$headline</title>
		<link rel='alternate' type='text/html' href='".$cfgrow['siteurl']."?showimage=$id' title='$headline' />
	  <id>tag:$tag_url,$id_date:/$id</id>
    <content type='html'>
		  <![CDATA[
        	<img src='$image' /><br />$headline<br />$body]]>
	  </content>
	  <published>$tag_date</published>
	  <updated>$modified_date$tzoner</updated>
	 </entry>
";
		}

	$atom .= "</feed>";
	echo $atom;
	exit;
}
// ##########################################################################################//
// RSS- + ATOM - tags
// ##########################################################################################//
// keeping this "old" tag because it is used in user's template maybe
$atom_url = "http://".$HTTP_HOST.$REQUEST_URI."&amp;x=atom";
$tpl = str_replace("<ATOM_AUTODETECT>",$atom_url,$tpl);
$atom_auto = "<link rel=\"service.feed\" type=\"application/x.atom+xml\" title=\"$pixelpost_site_title - ATOM Feed\" href=\"".$cfgrow["siteurl"]."index.php?x=atom\" />";
$tpl = ereg_replace("<ATOM_AUTODETECT_LINK>",$atom_auto,$tpl);
$tpl = ereg_replace("<SITE_ATOM_LINK>","<a href='./index.php?x=atom'>ATOM feed</a>",$tpl);

$rss_auto = "<link rel=\"alternate\" type=\"application/rss+xml\" title=\"$pixelpost_site_title - RSS Feed\" href=\"".$cfgrow["siteurl"]."index.php?x=rss\" />";
$tpl = ereg_replace("<RSS_AUTODETECT_LINK>",$rss_auto,$tpl);
$tpl = ereg_replace("<SITE_RSS_LINK>","<a href='./index.php?x=rss'>RSS 2.0</a>",$tpl);

// ##########################################################################################//
// creating other tags
// ########################################################################################
$tpl = ereg_replace("<SITE_BROWSELINK>","./index.php?x=browse",$tpl);
$tpl = ereg_replace("<SITE_BROWSELINK_PAGED>","./index.php?x=browse&amp;pagenum=1",$tpl);
$tpl = ereg_replace("<SITE_PHOTONUMBER>",$pixelpost_photonumb,$tpl);
$tpl = ereg_replace("<SITE_VISITORNUMBER>",$pixelpost_visitors,$tpl);
$tpl = ereg_replace("<IMAGE_COMMENTS_NUMBER>",$image_comments_number,$tpl);
$tpl = ereg_replace("<LATEST_COMMENT_ID>",$latest_comment,$tpl);
$tpl = ereg_replace("<LATEST_COMMENT_NAME>",$latest_comment_name,$tpl);
$tpl = ereg_replace("<COMMENT_POPUP>","<a href='index.php?showimage=$image_id' onclick=\"window.open('index.php?popup=comment&amp;showimage=$image_id','Comments','width=480,height=540,scrollbars=yes,resizable=yes');\">$lang_comment_popup</a>",$tpl);
$tpl = ereg_replace("<BROWSE_CATEGORIES>",$browse_select,$tpl);
$tpl = str_replace("<BASE_HREF>","<base href='".$cfgrow['siteurl']."' />",$tpl);
$tag_list = list_tags_frontend();
$tpl = str_replace("<TAG_LIST>",$tag_list,$tpl);

// ##########################################################################################//
// SAVE COMMENT
// ##########################################################################################//

// variable which says if notofication can be send (SPAM and problem free comment) 
// by default it can't
$email_flag = 0;

if(isset($_GET['x'])&&$_GET['x'] == "save_comment")
{
	$datetime = gmdate("Y-m-d H:i:s",time()+(3600 * $cfgrow['timezone'])) ;
	$ip = $_SERVER['REMOTE_ADDR'];
	$cmnt_moderate_permission = $cfgrow['moderate_comments'];

// $parent_id		
	$parent_id = isset($_POST['parent_id']) ? $_POST['parent_id'] : "";
	if (eregi("\r",$parent_id) || eregi("\n",$parent_id)){  die("No intrusion! ?? :(");}
	if (!is_numeric($parent_id))
		die('parent_id is not correct!');

// $message		
	$message = isset($_POST['message']) ? $_POST['message'] : "";
	$message = clean_comment($message);
	$message = preg_replace("/((\x0D\x0A){3,}|[\x0A]{3,}|[\x0D]{3,})/","\n\n",$message);
	$message = nl2br($message);

// $name 	
	$name = isset($_POST['name']) ? $_POST['name'] : "";
	if (eregi("\r",$name) || eregi("\n",$name)){  die("No intrusion! ?? :(");}
	$name = clean_comment($name);	

// $url 	
	$url = isset($_POST['url']) ? $_POST['url'] : "";
	if(eregi("\r",$url) || eregi("\n",$url)){  die("No intrusion! ?? :(");}
	if(strpos($url,'https://') === false && strpos($url,'http://') === false && strlen($url) > 0)	$url = "http://".$url;
	$url = clean_comment($url);

// $parent_name		
	$parent_name = isset($_POST['parent_name']) ? $_POST['parent_name'] : "";
	if (eregi("\r",$parent_name) || eregi("\n",$parent_name)){  die("No intrusion! ?? :(");}
	$parent_name = clean_comment($parent_name);	


// $email 		
	$email = isset($_POST['email']) ? clean_comment($_POST['email']) : "";
	if (eregi("\r",$email) || eregi("\n",$email)){  die("No intrusion! ?? :(");}


	// check that only one email-adress entered
	$onlyone = $email;
	$numberofats = substr_count("$onlyone", "@");
	if ($numberofats > 1) {die("only one email-adress allowed");}
	
	// Ramin added more protections
	if (eregi ("Content-Transfer-Encoding", $_POST['parent_name'].$_POST['email'].$_POST['url'].$_POST['name'].$_POST['message'].$_POST['parent_id'])) {die("SPAM Injection Error :(");}
	if (eregi ("MIME-Version", $_POST['parent_name'].$_POST['email'].$_POST['url'].$_POST['name'].$_POST['message'].$_POST['parent_id'])) {die("SPAM Injection Error :(");}
	if (eregi ("Content-Type", $_POST['parent_name'].$_POST['email'].$_POST['url'].$_POST['name'].$_POST['message'].$_POST['parent_id'])) {die("SPAM Injection Error :(");}


	if ($cmnt_moderate_permission=='yes')
		$cmnt_publish_permission ='no';
	if ($cmnt_moderate_permission=='no')
		$cmnt_publish_permission ='yes';


	if($parent_id == "")	$extra_message = "<b>$lang_message_missing_image</b><p />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

	if($message == "")	$extra_message = "<b>$lang_message_missing_comment</b><p />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	
	if($name == "")	$extra_message = "<b>$lang_message_missing_name</b><p />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

	if(($parent_id != "") and ($message != "") and ($name != "")){
		// check the comment with banlists
		if (!is_comment_in_blacklist($message,$ip,$name)){

			// send it to moderation if contains banned words but not black listed!
			if(is_comment_in_moderation_list($message,$ip,$name)){
				$cmnt_publish_permission = 'no';
				$cmnt_moderate_permission ='yes';
				}

		// to the job now
			if ($cmnt_moderate_permission =='yes')
				$extra_message = "<b>$lang_message_moderating_comment</b><p />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			$query = "INSERT INTO ".$pixelpost_db_prefix."comments(id,parent_id,datetime,ip,message,name,url,email,publish)
		VALUES(NULL,'$parent_id','$datetime','$ip','$message','$name','$url','$email','$cmnt_publish_permission')";
		$result = mysql_query($query);
		if (!mysql_error())
		// added by GeoS for sure that comment is saved (moved by ramin for bug fixing)
			$email_flag = 1;
		} // end if is not in the blacklist
		else $extra_message = "<b>$lang_message_banned_comment</b><p />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	}
	
}

// ##########################################################################################//
// EMAIL NOTE ON COMMENTS
// ##########################################################################################//

if(isset($_GET['x'])&&$_GET['x'] == "save_comment")
{
	if($cfgrow['commentemail'] == "yes" && $email_flag == 1)
	{
		$admin_email = $cfgrow['email'];
		$comment_name = clean_comment($_POST['name']);
		$comment_url  = clean_comment($_POST['url']);
		if(strpos($comment_url,'https://') === false && strpos($comment_url,'http://') === false && strlen($comment_url) > 0)	$comment_url = "http://".$comment_url;
		$comment_image_id = $_POST['parent_id'];
		$comment_message = clean_comment($_POST['message']);
		$comment_message = stripslashes($comment_message);
		$comment_email = clean_comment($_POST['email']);
		$link_to_comment = $cfgrow['siteurl']."./index.php?showimage=$comment_image_id";
		$comment_image_name = clean_comment($_POST['parent_name']);
		$link_to_comment = $cfgrow['siteurl']."?showimage=$comment_image_id";
		$link_to_img_thumb_cmmnt = "Thumbnail Link:" .$cfgrow['siteurl'] ."thumbnails/thumb_$comment_image_name";
		$img_thumb_cmmnt = "<img src='" .$cfgrow['siteurl'] ."thumbnails/thumb_$comment_image_name' >";
		$subject = "$pixelpost_site_title - $lang_email_notification_subject";
		$sent_date = gmdate("Y-m-d",time()+(3600 * $cfgrow['timezone'])) ;
		$sent_time = gmdate("H:i",time()+(3600 * $cfgrow['timezone'])) ;

		if ($cfgrow['htmlemailnote']!='yes')
		{
		// Plain text note email
		$body = "$lang_email_notificationplain_pt1 : $link_to_comment\n\n$lang_email_notificationplain_pt2\n\n$comment_message\n\n$lang_email_notificationplain_pt3: $comment_name";
		if ($comment_email!="")		{$body .=  "- $comment_email";}
		$body .= "\n\n$lang_email_notificationplain_pt4";
		$headers = "Content-type: text/plain; charset=UTF-8\n";
		$headers .= "Content-Transfer-Encoding: 8bit\n";

		if ($comment_email!="")	$headers .= "From: $comment_name<$comment_email>\n";
			else $headers .= "From: PIXELPOST <$admin_email>\n";
			$recipient_email = "admin <$admin_email>";
		}
		else
		{
			// HTML note email
			$body = "$lang_email_notification_pt1
      <a href='$link_to_comment'>$link_to_comment</a><br>
      $img_thumb_cmmnt<br>
$lang_email_notification_pt2
      $comment_message<br>
      $lang_email_notification_pt3 <a href='$comment_url' >$comment_name</a>  - $comment_email <br>
$lang_email_notification_pt4
      ";

			////////////
			$headers  = 'MIME-Version: 1.0' . "\n";
			$headers .= 'Content-type: text/html; charset=UTF-8' . "\n";

			// Additional headers
			if ($comment_email!="")	$headers .= "From: $comment_name  <$comment_email>\n";
			else $headers .= "From: PIXELPOST <$admin_email>\n";

			$recipient_email = "admin <$admin_email>";
		} // if (cfgrow['htmlemailnote']=='no')

    // Sending notification
		mail($recipient_email,$subject,$body,$headers);

	} // end of if($_GET['x'] == "save_comment")

?>

<!DOCTYPE html
     PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html><head>
	<meta http-equiv="refresh" content="8; URL=<?php echo $_SERVER['HTTP_REFERER']; ?>" />
	<title><?php echo $lang_comment_page_title; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" href="admin/admin_index.css" type="text/css" />
	</head>
	<body>
	<?php
	echo "<p />$lang_comment_thank_you<p />$extra_message<br />";
  echo "<a href='$_SERVER[HTTP_REFERER]'>$lang_comment_redirect</a><p />";
	echo "</body></html>";
} // commentemail yes

// ##########################################################################################//
// SUCK IN ADDONS
// ##########################################################################################//

include_once('includes/addons_lib.php');

// ##########################################################################################//
// END - ECHO TEMPLATE
// ##########################################################################################//

if( (isset($_GET['x'])&&$_GET['x'] != "save_comment")OR(!isset($_GET['x'])) )	echo $tpl;

?>