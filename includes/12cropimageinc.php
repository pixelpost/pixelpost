<?php //
////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////                                                //////////////////////////
//////////////////////////                 1 2 CROP IMAGE                 //////////////////////////
//////////////////////////                                                //////////////////////////
//////////////////////////             (c) 2002 Roel Meurders             //////////////////////////
//////////////////////////         mail: scripts@roelmeurders.com         //////////////////////////
//////////////////////////                  version 0.2                   //////////////////////////
//////////////////////////                                                //////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
///// CREDITS: Most Javascript is taken from DHTMLCentral.com and is made by Thomas Brattli. ///////
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
///// Modified by:   Ramin Mehran @ March 2005
///// Modifications: Modified substantially to make it
/////				 compatible with Pixelpost v1.4 (Pixelpost.org) and the original php
/////				 file has been broken into seperated parts.
/////  			 Updated in release of Pixelpost 1.5 for PHP 4.4.1 and PHP 5.1.1 compatibility.
/////
///// SVN file version:
///// $Id: 12cropimageinc.php 305 2007-05-31 17:31:29Z schonhose $
/////
////////////////////////////////////////////////////////////////////////////////////////////////////
// set the 12cropimage file path (in the include directory)

// You do not need to access this if not logged in - securing it
if(!isset($_SESSION["pixelpost_admin"]) || $cfgrow['password'] != $_SESSION["pixelpost_admin"] || $_GET["_SESSION"]["pixelpost_admin"] == $_SESSION["pixelpost_admin"] || $_POST["_SESSION"]["pixelpost_admin"] == $_SESSION["pixelpost_admin"])
{
	die ("Try another day!!");
}

  $spacer = "../includes/spacer.gif"; //Relactive path tpo spacer.gif, transparent image
  $javafile = "../includes/12cropimage.js"; //Relative path to js-file

// set global variables
global $txt, $imgW,$imgH, $imgProp, $spacer, $redirect, $javafile, $crw, $crh, $org, $res;

/* start up mysql */
mysql_error();

// if the user selected '12c' as the cropping tool
if ($_GET['x']=='12cropthumb')
{
	$w = $_GET['sw'];
	$h = $_GET['sh'];
	$dw = $_GET['dw'];
	$dh = $_GET['dh'];
	$file = $_GET['filename'];

	if (createthumbnail_12crop($w,$h,$dw,$dh,$file))	header("Location: index.php?view=images");// end if 12cropthumb
	else	echo 'Some error in 12crop: thumb is not created!';
}

// get specified thumbnail width and height
$cfgquery = mysql_query("select * from ".$pixelpost_db_prefix."config");
$cfgrow = mysql_fetch_array($cfgquery);
$max_width = $cfgrow['thumbwidth'];
$max_height = $cfgrow['thumbheight'];


// renaming the variable
$crw = $max_width;
$crh = $max_height;

// initialize the variables with some values
$imgH = 22;
$imgW = 22;
$imgProp = .4;

// save required messages
$txt['cropimage'] = "crop";
$txt['preview'] = "preview";
$txt['bigger'] = "+";
$txt['smaller'] = "-";
$txt['closewindow'] = "close window";
$txt['selectioninpicture'] = "The selection has to be completely on the image.";

/////////////////////////
// Functions

// prepare the cropdiv
function setsize_cropdiv ($file)
{
  global $pixelpost_db_prefix , $crw,$crh,$spacer;
  $cfgquery = mysql_query("select * from ".$pixelpost_db_prefix."config");
  $cfgrow = mysql_fetch_array($cfgquery);
  // credit to codewalkers.com - there is 90% a tutorial there
  $max_width = $cfgrow['thumbwidth'];
  $max_height = $cfgrow['thumbheight'];
  define(IMAGE_BASE, rtrim($cfgrow['imagepath'],"/"));
  $image_path = IMAGE_BASE . "/$file";
  $img = null;
  $ext_exp = explode('.', $image_path);
  $ext_end = end($ext_exp);
  $ext = strtolower($ext_end);

  if ($ext == 'jpg' || $ext == 'jpeg')
	{
		$img = @imagecreatefromjpeg($image_path);
  }
  elseif($ext == 'png')
  {
		$img = @imagecreatefrompng($image_path);
	}
	elseif($ext == 'gif')
	{
		$img = @imagecreatefromgif($image_path);
	}

  if($img)
  {
	  $rtrn = true;
    $imgW = imagesx($img);
    $imgH = imagesy($img);
    $divsize = $imgH+50;
    $imgProp = .8* min($imgW/$max_width, $imgH/$max_height);
	  $imgProp1 = $crw*$imgProp;
	  $imgProp2 = $crh*$imgProp;

    echo "<style type='text/css'>#cropdiv {position:absolute;width:$imgProp1".px.";height:$imgProp2".px.";z-index:2;background-image:url(".$spacer."); }
	      #editthumbnail{position:relative;height:$divsize".px.";visibility: hidden;}
	       </style>";
  }
  else
  {
		$rtrn = false;
	}

  imagedestroy($img);
  return $rtrn;
}

// special createthumbnail which uses 12cropimage
function createthumbnail_12crop($w,$h,$dw,$dh,$file)
{
  global $pixelpost_db_prefix;
  $cfgquery = mysql_query("select * from ".$pixelpost_db_prefix."config");
  $cfgrow = mysql_fetch_array($cfgquery);
  // credit to codewalkers.com - there is 90% a tutorial there
  $max_width = $cfgrow['thumbwidth'];
  $max_height = $cfgrow['thumbheight'];
  $tmp_img = imagecreatetruecolor($max_width,$max_height);
  define(IMAGE_BASE, rtrim($cfgrow['imagepath'],"/"));
  $image_path = IMAGE_BASE . "/$file";
  $img = null;
  $ext_exp = explode('.', $image_path);
	$ext_end = end($ext_exp);
  $ext = strtolower($ext_end);
  //$ext = strtolower(end(explode('.', $image_path)));
  if ($ext == 'jpg' || $ext == 'jpeg')
  {
    $img = @imagecreatefromjpeg($image_path);
  }
  elseif($ext == 'png')
  {
    $img = @imagecreatefrompng($image_path);
  }
  elseif($ext == 'gif')
  {
    $img = @imagecreatefromgif($image_path);
  }

  if($img)
  {
    $width = imagesx($img);
    $height = imagesy($img);

		// gd 2.0.1 or later: imagecopyresampled
		// gd less than 2.0: imagecopyresized
    if(function_exists(imagecopyresampled))
    {
      imagecopyresampled($tmp_img, $img, 0,0,$w,$h,$max_width,$max_height,$dw,$dh);
    }
    else
    {
      imagecopyresized($tmp_img, $img, 0,0,$w,$h,$max_width ,$max_height,$dw,$dh);
    }

    imagedestroy($img);

		// now save the thumbnail
	 	touch($cfgrow['thumbnailpath']."thumb_$file");
    imagejpeg($tmp_img, $cfgrow['thumbnailpath']."thumb_$file",$cfgrow['compression']);
		$thumbimage = $cfgrow['thumbnailpath']."thumb_$file";
    chmod($thumbimage,0644);
    imagedestroy($tmp_img);
    return true;
	}// if $img

// if you are here, something's wrong
	return false;
}
/// End of functions

?>