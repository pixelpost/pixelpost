<?php
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
/////				 compatible with Pixelpost (Pixelpost.org) and the original php
/////				 file has been broken into seperated parts.
/////
///// SVN file version:
///// $Id: 12cropimageincscripts.php 78 2006-12-24 02:23:47Z piotr.galas $
/////
////////////////////////////////////////////////////////////////////////////////////////////////////

// You do not need to access this if not logged in - securing it
if(!isset($_SESSION["pixelpost_admin"]) || $cfgrow['password'] != $_SESSION["pixelpost_admin"] || $_GET["_SESSION"]["pixelpost_admin"] == $_SESSION["pixelpost_admin"] || $_POST["_SESSION"]["pixelpost_admin"] == $_SESSION["pixelpost_admin"])
{
	die ("Try another day!!");
}

echo  '<script type="text/javascript" src="'.$javafile .'"></script>';

//require("pixelpost.php");
/* start up mysql */
mysql_error();

// save new post when '12c' is selected as the croping tool

    $cfgquery = mysql_query("select * from ".$pixelpost_db_prefix."config");
    $cfgrow = mysql_fetch_array($cfgquery);
		if(($_GET['x'] == "save" || ($_GET['view']=="images" && $_GET['id']!=""))&& $cfgrow['crop']=='12c')
		{
			$headline = 	clean($_POST['headline']);
			if($headline == "" & $_GET['view']!="images")
			{
				echo "<div id='cropdiv'></div>
						 <div id='myimg'></div>";
			}
		}

// put these jscripts on the html section
    echo '<script type="text/javascript">';
		echo ' <!-- BEGIN ';
		echo "\n\nfunction libinit(){
	   obj=new lib_obj('cropdiv');
	   obj.dragdrop();
	   rimg = new lib_obj('myimg');
	}

	function cropCheck(crA,thumbfilename){
	   if (
	   ( (obj.x) <=rimg.cr+ rimg.x)&&
	   ( (obj.y) <= rimg.cb+rimg.y)&&
	   (obj.x >= rimg.x)&&
	   (obj.y >= rimg.y)&&
	   (obj.x+obj.cr<=rimg.cr+rimg.x)&&
	   (obj.y+obj.cb<=rimg.cb+rimg.y)
	   )
 	   {
		var url = '?x=12cropthumb&sw='+(obj.x-rimg.x)+'&sh='+(obj.y-rimg.y)+'&dw='+obj.cr+'&dh='+obj.cb+'&filename='+thumbfilename;
		if (crA == 'def'){
		   location.href=url;
		}
	   } else {
		alert('".$txt['selectioninpicture']."');
	   }
	}

	function stopZoom() {
	   loop = false;
	   clearTimeout(zoomtimer);
	}

	function cropZoom(dir){
		zoomtimer = null;
	   loop = true;
	   prop = ".$crh." / ".$crw.";

	   direction = dir;
	   if (loop == true) {
		if (direction == 'in') {
		   if ((obj.cr > " .$crw/$imgProp .")&&(obj.cb > " .$crh/$imgProp.")){
			cW = obj.cr - 1;
			cH = parseInt(prop * cW);
			obj.clipTo(0,cW,cH,0,1);
		   }
		} else {
		   if ((obj.cr < (rimg.cr-2))&&
		   (obj.cb < (rimg.cr-2))
		   ){
			cW = obj.cr + 1;
			cH = parseInt(prop * cW);
			obj.clipTo(0,cW,cH,0,1);
		   }
		}
		zoomtimer = setTimeout('cropZoom(direction)', 10);
	   }
	}
	onload = libinit;
    // -->
		</script>";

    // necessary styles
		$imgProp1 = $crw*$imgProp;
		$imgProp2 = $crh*$imgProp;
	$toecho = "<style type='text/css' >
	#cropdiv {position:absolute;width:$imgProp1".px.";height:$imgProp2".px.";z-index:2;background-image: url(".$spacer."); }
	#myimg {position:absolute;border:1px}
	</style>";

	echo $toecho; // add necessary styles to the admin/index.php

?>