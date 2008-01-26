<?php

// SVN file version:
// $Id$

/*

Pixelpost version 1.7

Pixelpost www: http://www.pixelpost.org/

Version 1.7:
Development Team:
Ramin Mehran, Will Duncan, Joseph Spurling,
Piotr "GeoS" Galas, Dennis Mooibroek, Karin Uhlig, Jay Williams, David Kozikowski

Former members of the Development Team:
Connie Mueller-Goedecke
Version 1.1 to Version 1.3: Linus <http://www.shapestyle.se>

Copy Folder Addon version 1.1

*/

$copyfolderpath = ereg_replace("/images","",$cfgrow['imagepath']);
$message = '';

if( isset($_POST['folder_path']) && isset($_POST['copyfolder']))
{
	if(!isset($_SESSION["pixelpost_admin"]) || $cfgrow['password'] != $_SESSION["pixelpost_admin"] || isset($_GET["_SESSION"]["pixelpost_admin"]) AND $_GET["_SESSION"]["pixelpost_admin"] == $_SESSION["pixelpost_admin"] || isset($_POST["_SESSION"]["pixelpost_admin"]) AND $_POST["_SESSION"]["pixelpost_admin"] == $_SESSION["pixelpost_admin"] || isset($_COOKIE["_SESSION"]["pixelpost_admin"]) AND $_COOKIE["_SESSION"]["pixelpost_admin"] == $_SESSION["pixelpost_admin"])
	{
	    die ("Try another day!!");
	}

	// avoid maximum execution time reached!
	ini_set('max_execution_time', 400);

	$filenumber = 0;
	$upload_dir = $cfgrow['imagepath'];
	$folder = mysql_real_escape_string($_POST['folder_path']);
	$folder = "$folder/";
	$folder = ereg_replace("//","/",$folder);
	$secondcount = 0;
	$query = "select id from ".$pixelpost_db_prefix."categories order by id asc limit 0,1";
	$catid = mysql_query($query);
	$catid = mysql_fetch_array($catid,MYSQL_ASSOC);
	$category = $catid['id'];
	$tz = $cfgrow['timezone'];
	$Errors  = "<div style='background-color:#ffcccc;padding:5px;margin:3px;font-weight:bold;' >List of Errors <br/>";
	$errored = FALSE;
	$counter = 0;

	if($addon_handle = opendir($folder))
	{
		while (false !== ($file = readdir($addon_handle)))
		{
			if($file != "." && $file != ".." && $file != ".DS_Store")
			{
				$files[]=$file;
				$files_withdate[$counter]['filename'] = $file;
				$exifdate = copy_folder_get_exif_date($folder.$file);
				$files_withdate[$counter]['date'] = $exifdate;
				$counter++;
			} // end file !"."
		} // end while
		closedir($addon_handle);
	} // if addon_handle done

	if ($_POST['sort']=='alphabet')	natcasesort($files);
	else if($_POST['sort']=='exifdate')
	{
		$files_withdate = copy_folder_array_sort($files_withdate, 'date');
		for ($k=0;$k<count($files_withdate);$k++)
		{
			$files[$k] = $files_withdate[$k]['filename'];
			$dates[$k] = $files_withdate[$k]['date'] ;
		}
	}


	//for ($k=0;$k<count($files);$k++){
	foreach($files as $k => $file){
	
		if($secondcount < 11)	$secondcount = "0$secondcount";
		sleep(1);
		
		$file = $files[$k];
		
		$timenow = time()+(3600 * $tz);
		if($_POST['sort']=='exifdate' AND $dates[$k]!='bad')	$datetime= $dates[$k];
		else	$datetime  = gmdate("YmdHis",$timenow);

		//$clean_url = gmdate("Y_m_d_H_i_s",$timenow);
		$datetime .=$secondcount;
		$secondcount++;

		// prepare the file
		$oldfile = $file;
		if ($cfgrow['timestamp']=='yes')	$newfile = "{$datetime}_$file";
		else	$newfile = $file;

		$newpath = "$upload_dir$newfile";
		$file = "$folder$file";
		if(copy($file,$newpath))
		{
			$filenumber++;
			// insert post in mysql - supports new multi-category table in ver 1.4
			$query = "insert into ".$pixelpost_db_prefix."pixelpost(id,datetime,headline,body,image,category)
			VALUES(NULL,'$datetime','$oldfile','','$newfile','$category')";
			$result = mysql_query($query);
			if (mysql_error())
			{
				$Errors .= "Failed to insert $oldfile to db: ".mysql_error() ."<br/>";
				$errored = TRUE;
			}

			// get new image ID
			$theid = mysql_insert_id(); //Gets the id of the last added image to use in the next "insert"

			if(isset($_POST['category']))
			{
				foreach($_POST['category'] as $val)
				{
					$query  ="INSERT INTO ".$pixelpost_db_prefix."catassoc(id,cat_id,image_id) VALUES(NULL,'".mysql_real_escape_string($val)."','$theid')";
					$result = mysql_query($query);
					if (mysql_error())
					{
							$Errors .= "Insert categories to db error: ".mysql_error() ."<br/>";
							$errored = TRUE;
					}

				} // end foreach
			}// end if isset
			// update the exif in the database
			include_once('../includes/functions_exif.php');
			$exif_info_db = serialize_exif ($cfgrow['imagepath'].$newfile);
			mysql_query("update ".$pixelpost_db_prefix."pixelpost set exif_info='$exif_info_db' where id='$theid'");
			if (mysql_error())
			{
				$Errors .= "Insert EXIF information to db error: ".mysql_error() ."<br/>";
				$errored = TRUE;
			}
			// create thumbnail  too
			createthumbnail($newfile);

			// clean URLs code
			//save_permalink($clean_url, $theid, $cfgrow['siteurl']);

		} // if copy done
	} // end foreach
	//		} // if file done
	//	} // while false done
	//	closedir($addon_handle);
	//} // if addon_handle done

	$Errors  .="</div>";
	$message = "<span class='confirm'><b>Copied $filenumber files.</b><br />
		 Thumbnails are created while copying files with this addon.</span>";

	if($errored)	$message .= "<span class='confirm'>$Errors";

}

$addon_name = "Pixelpost Copy Folder Contents";
$cats_table = category_list_as_table_noecho();
$addon_description = "Copy the entire contents of a folder into pixelpost database.<br />
Each entry will have the filename as title and and the first category (default) as category.<br />
<!--  <i>No thumbnails will be created.</i> You will have to come back to admin and update your thumbnails. -->
<br /><br />
Enter the absolute path to folder:<br /><br />
<form method='post' action='index.php?view=addons' accept-charset='UTF-8'>

<input type='hidden' name='copyfolder' value='1'>

<input type='text' name='folder_path' value='$copyfolderpath' style='width:400px'>
<input type='radio' name='sort' CHECKED value='alphabet' />Sort by filename
<input type='radio' name='sort' value='exifdate' />Publish using EXIF capture date
<br /><br />

Categories:
$cats_table
<input type='submit' value='Copy Folder'>
</form> $message";
$addon_version = "1.1";



// categories as table
function category_list_as_table_noecho()
{
	global $pixelpost_db_prefix;
  // get the id and name of the first entered category, default category.
  $query = mysql_query("select * from ".$pixelpost_db_prefix."categories order by id asc LIMIT 0,1");
  list($firstid,$firstname) = mysql_fetch_row($query);

	if(isset($_GET['id']))	$getid = (int) $_GET['id'];
 // begin of category-list as a table

	$toprint = "<table id='cattable'><tr>";
	$catcounter = 0;
  $query = mysql_query("select id, name from ".$pixelpost_db_prefix."categories  order by name");

	while(list($id,$name) = mysql_fetch_row($query))
	{
		$name = pullout($name);
		$id = pullout($id);
		$catcounter++;
		$inarow = 4;
		
		if ($firstid==$id) // if it is the first defualt category in the new_image page
			$toprint .="<td><input type='checkbox' CHECKED name='category[]' value='".$id."'>&nbsp;".$name."</td>";
		else // if it is other categories in the new image page
			$toprint .="<td><input type='checkbox' name='category[]' value='".$id."'>&nbsp;".$name."</td>";
		
		if ($catcounter % $inarow == 0)	$toprint .="\n</tr><tr>\n";
		else	$toprint .="\n";
	}

	if ($catcounter % $inarow > 0)	$toprint .="</tr>";
	$toprint .="</table><br clear='all' />\n\n";

	return $toprint;
}


function copy_folder_array_sort($array, $key)
{
	for ($i = 0; $i < sizeof($array); $i++)
	{
		$sort_values[$i] = $array[$i][$key];
	}
	asort ($sort_values);
	reset ($sort_values);
	while (list ($arr_key, $arr_val) = each ($sort_values))
	{
		$sorted_arr[] = $array[$arr_key];
	}
	return $sorted_arr;
}

// get EXIF date of each file
function copy_folder_get_exif_date($image_name)
{
	if (file_exists("../includes/exifer1_5/exif.php"))
	require_once("../includes/exifer1_5/exif.php");

	$curr_image = $image_name;

	if (function_exists('read_exif_data_raw'))
	{
		$exif_result = read_exif_data_raw($curr_image,"0");
		$capture_date = $exif_result['SubIFD']['DateTimeOriginal']; // Date and Time
		if ($capture_date=='')	$capture_date = 'bad';
		else
		{
			list($exifyear,$exifmonth,$exifday,$exifhour,$exifmin, $exifsec) = split('[: ]', $capture_date);
			$capture_date = date("YmdHis", mktime($exifhour, $exifmin, $exifsec, $exifmonth, $exifday, $exifyear));
		}

	}
	else $capture_date = "bad";

	return $capture_date;
}
?>