<?php
// ##########################################################################################//
// NEW EXIF STUFF
// SVN file version:
// $Id$
// ##########################################################################################//
if (isset($uploadfile))
{
	require_once("../includes/exifer1_5/exif.php");
}

function flatten_array($array,$keyname='')
{
	// Flatten an array to a twodimensional array
	$tmp = array();

	foreach($array as $key => $value)
	{
		if(is_array($value))
			$tmp = array_merge($tmp,flatten_array($value,$key));
		else
			$tmp[$key.$keyname] = $value;
	}
	return $tmp;
}

function serialize_exif ($uploaded_file)
{
	//$exif_tmp = read_exif_data_raw($_FILES['upload_file']['tmp_name'],0);
	$exif_tmp = read_exif_data_raw($uploaded_file,0);
	$flat_exif_tmp=flatten_array($exif_tmp);
	if (in_array("DataDumpMakerNote", $flat_exif_tmp))
	{
		// this field is set to empty because it causes trouble
		$flat_exif_tmp['DataDumpMakerNote']=NULL;
	}
	foreach ($flat_exif_tmp as $key=>$value)	$flat_exif_tmp[$key]=trim($value);
	$exif_info=serialize($flat_exif_tmp);
	// we need to escape the string before saving it to the db
	$exif_info = addslashes($exif_info);
	return $exif_info;
}

function unserialize_exif ($exif_info)
{
	// we need to strip the string before getting it from the db
	$exif_info = stripslashes($exif_info);
	if (unserialize($exif_info) !== null)
	{
   	$exif_info=unserialize($exif_info);
  }
  return $exif_info;
}


function replace_exif_tags ($language_full, $image_exif, $tpl)
{
	// get exif
	$exif_result=unserialize_exif($image_exif);
	// get the language stuff
	require("language/lang-".$language_full.".php");
	if ($exif_result !== null)
	{
		$empty_exif=NULL;
    $exposure = $exif_result['ExposureTimeSubIFD']; // exposure time

    if(isset($exposure)&&$exposure != "")
    {
    	$exposure = reduceExif($exposure);
    	$exposure = "$exposure sec";
    }

    $aperture = $exif_result['FNumberSubIFD']; // Aperture
    $capture_date = $exif_result['DateTimeOriginalSubIFD']; // Date and Time
    $flash = $exif_result['FlashSubIFD']; // flash
    $focal = $exif_result['FocalLengthSubIFD']; // focal length
    $info_camera_manu = trim($exif_result['MakeIFD0']); // camera maker
    $info_camera_model = trim($exif_result['ModelIFD0']); // camera model
    $iso = trim($exif_result['ISOSpeedRatingsSubIFD']); //

    if(isset($flash)&&$flash == "No Flash")	$flash = "$lang_flash_not_fired";
    elseif(isset($flash)&&$flash)	$flash = "$lang_flash_fired";

    if(isset($exposure)&&$exposure != "")
    {
    	$exposure = "$exposure";
    	$tpl = ereg_replace("<EXIF_EXPOSURE_TIME>",$exposure,$tpl);
    }
    else
    {
    	$exposure = "$empty_exif";
    	$tpl = ereg_replace("<EXIF_EXPOSURE_TIME>",$exposure,$tpl);
    }

    $langexposure = "$lang_exposure $exposure";
    $tpl = ereg_replace("<LANG_EXPOSURE_TIME>",$langexposure,$tpl);


    if(isset($aperture)&&$aperture != "")
    {
    	$tpl = ereg_replace("<EXIF_APERTURE>",$aperture,$tpl);
    }
    else
    {
    	$aperture = "$empty_exif";
    	$tpl = ereg_replace("<EXIF_APERTURE>",$aperture,$tpl);
    }

    $langaperture = "$lang_aperture $aperture";
    $tpl = ereg_replace("<LANG_APERTURE>",$langaperture,$tpl);

    if(isset($capture_date)&&$capture_date != "")
    {
    	$tpl = ereg_replace("<EXIF_CAPTURE_DATE>",$capture_date,$tpl);
    }
    else
    {
    	$capture_date = "$empty_exif";
    	$tpl = ereg_replace("<EXIF_CAPTURE_DATE>",$capture_date,$tpl);
    }

    $langcapture_date = "$lang_capture_date $capture_date";
    $tpl = ereg_replace("<LANG_CAPTURE_DATE>",$langcapture_date,$tpl);

    if(isset($focal)&&$focal != "")
    {
    	$tpl = ereg_replace("<EXIF_FOCAL_LENGTH>",$focal,$tpl);
    }
    else
    {
    	$focal = "$empty_exif";
    	$tpl = ereg_replace("<EXIF_FOCAL_LENGTH>",$focal,$tpl);
    }

    $langfocal = "$lang_focal $focal";
    $tpl = ereg_replace("<LANG_FOCAL_LENGTH>",$langfocal,$tpl);

    if(isset($info_camera_manu)&&$info_camera_manu != "")
    {
    	$langcamera_manu = "$lang_camera_maker $info_camera_manu";
    	$tpl = ereg_replace("<EXIF_CAMERA_MAKE>",$info_camera_manu,$tpl);
    }
    else
    {
    	$info_camera_manu = "$empty_exif";
    	$tpl = ereg_replace("<EXIF_CAMERA_MAKE>",$info_camera_manu,$tpl);
    }

    $tpl = ereg_replace("<LANG_CAMERA_MAKE>",$langcamera_manu,$tpl);

    if(isset($info_camera_model)&&$info_camera_model != "")
    {
    	$langcamera_model = "$lang_camera_model $info_camera_model";
    	$tpl = ereg_replace("<EXIF_CAMERA_MODEL>",$info_camera_model,$tpl);
    }
    else
    {
    	$info_camera_model = "$empty_exif";
    	$tpl = ereg_replace("<EXIF_CAMERA_MODEL>",$info_camera_model,$tpl);
    }

    $tpl = ereg_replace("<LANG_CAMERA_MODEL>",$langcamera_model,$tpl);

    if(isset($iso)&&$iso != "")
    {
    	$tpl = ereg_replace("<EXIF_ISO>",$iso,$tpl);
    	$iso = "$iso";
    }
    else
    {
    	$iso = "$empty_exif";
    	$tpl = ereg_replace("<EXIF_ISO>",$iso,$tpl);
    }

    $langiso = "$lang_iso $iso";
    $tpl = ereg_replace("<LANG_ISO>",$langiso,$tpl);

    if(isset($flash)&&$flash != "")
    {
    	$tpl = ereg_replace("<EXIF_FLASH>",$flash,$tpl);
    	$flash = "$flash";
    }
    else
    {
    	$flash = "$empty_exif";
    	$tpl = ereg_replace("<EXIF_FLASH>",$flash,$tpl);
    }
  }
	return $tpl;
}

function replace_exif_tags_null($tpl)
{
	$tpl = ereg_replace("<EXIF_EXPOSURE_TIME>",NULL,$tpl);
	$tpl = ereg_replace("<LANG_EXPOSURE_TIME>",NULL,$tpl);
	$tpl = ereg_replace("<EXIF_APERTURE>",NULL,$tpl);
	$tpl = ereg_replace("<LANG_APERTURE>",NULL,$tpl);
	$tpl = ereg_replace("<EXIF_CAPTURE_DATE>",NULL,$tpl);
	$tpl = ereg_replace("<LANG_CAPTURE_DATE>",NULL,$tpl);
	$tpl = ereg_replace("<EXIF_FOCAL_LENGTH>",NULL,$tpl);
	$tpl = ereg_replace("<LANG_FOCAL_LENGTH>",NULL,$tpl);
	$tpl = ereg_replace("<EXIF_CAMERA_MAKE>",NULL,$tpl);
	$tpl = ereg_replace("<LANG_CAMERA_MAKE>",NULL,$tpl);
	$tpl = ereg_replace("<EXIF_CAMERA_MODEL>",NULL,$tpl);
	$tpl = ereg_replace("<LANG_CAMERA_MODEL>",NULL,$tpl);
	$tpl = ereg_replace("<EXIF_ISO>",NULL,$tpl);
	$tpl = ereg_replace("<LANG_ISO>",NULL,$tpl);
	$tpl = ereg_replace("<EXIF_FLASH>",NULL,$tpl);
	return $tpl;
}

?>