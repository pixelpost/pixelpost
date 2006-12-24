<?php

/*
Requires Pixelpost version 1.5 or newer
Update EXIF ADDON-Version 0.1

Written by: Schonhose
@:			schonhose@pixelpost.org
WWW:		http://foto.schonhose.nl/

Pixelpost www: http://www.pixelpost.org/

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

/****************************************/
/*				configuration variables				*/
/****************************************/
$addon_name = "Update EXIF";
$addon_version = "0.1";
$addon_description = "Since Pixelpost 1.6 the old behaviour of reading the EXIF files from the images upon loading is replaced by saving the EXIF in the database during the upload of an image.
	This will speed up loading time and will solve issues reported with the EXIF data. Please note you can turn the EXIF data off, this will effect the way the EXIF tags are replaced. EXIF data will always be saved in the database.
	<br /><br />
	This addon provides an easy way to extract the EXIF from the images and save it to the database so the old pictures are compatible with the new EXIF functions.
	<br /><br />";

/***********************/
/* ADDON CODE (action) */
/***********************/
if(isset($_POST['Action']) && ($_POST['Action']=="Update EXIF"))
{
	// select all the images with no EXIF
	include_once('../includes/functions_exif.php');
	$counter = 0;
	$query = "SELECT id,image FROM ".$pixelpost_db_prefix."pixelpost WHERE exif_info IS NULL";
  $sql = mysql_query($query) or die("db error");
  while($row = mysql_fetch_array($sql))
  {
  	$exif_info_db = serialize_exif ("../images/".$row['image']);
  	$id=$row['id'];
		mysql_query("update ".$pixelpost_db_prefix."pixelpost set exif_info='$exif_info_db' where id='$id'");
	 	$counter=$counter+1;
	}
	$Exif_Msg = "<font color=\"blue\">Updated ".$counter." images.</font>";
} 
  
/**************************/
/* ADDON CODE (Show Form) */
/**************************/

$addon_description.="<form name=\"update_exif_info\" action=\"index.php?view=addons\" method=\"post\" >
 		<input type=\"submit\" name=\"Action\" value=\"Update EXIF\" />
</form>";

if ($Exif_Msg!==""){
	$addon_description.="<br /><strong>".$Exif_Msg."</strong>";
}
?>