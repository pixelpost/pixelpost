<?php

// SVN file version:
// $Id$

//if(!isset($_SESSION["pixelpost_admin"]) || $cfgrow['password'] != $_SESSION["pixelpost_admin"] || $_GET["_SESSION"]["pixelpost_admin"] == $_SESSION["pixelpost_admin"] || $_POST["_SESSION"]["pixelpost_admin"] == $_SESSION["pixelpost_admin"] || $_COOKIE["_SESSION"]["pixelpost_admin"] == $_SESSION["pixelpost_admin"])
if(!isset($_SESSION["pixelpost_admin"]) || $cfgrow['password'] != $_SESSION["pixelpost_admin"])
{
	die ("Try another day!!");
}

// view=images
if(isset($_GET['view']) AND $_GET['view'] == "images")
{
	if(isset($_GET['action']) AND $_GET['action'] == "masspublish")
	{
		$idz= $_POST['moderate_image_boxes'];
		// This is rather interesting since when multiple pictures have the same datetime stamp only the last one
		// will be shown. This means we have to construct single queries for each selected id and give them a
		// unique datetimestamp.
		// Since the latest image is displayed first we need to sort the idz because the lowest id have to be
		// published first.
		sort($idz);
		$minute_offset = 1;
		$current_hour = date("H");
		$current_minutes = date("i");
		$current_seconds = date("s");
		$ids = count($idz) - 1;
 		$query = "UPDATE ".$pixelpost_db_prefix."pixelpost SET datetime = ";
 		for ($i=0; $i < count($idz); $i++)
 		{
 			$datetimestamp = gmdate("Y-m-d H:i:s", mktime($current_hour, $current_minutes-($minute_offset*($ids-$i)), $current_seconds, date("m"), date("d"), date("Y"))+(3600 * $tz));
			$finalquery=$query."'".$datetimestamp."' WHERE id = '".(int)$idz[$i]."'";
 			$finalquery  = sql_query($finalquery);
 		}
 		$c = count($idz);
 		echo "<div class='jcaption confirm'>$admin_lang_imgedit_published  $c $admin_lang_imgedit_unpublished_cmnts</div>";
 	}

	if(isset($_GET['action']) AND $_GET['action'] == "massdelete")
	{
 		$idz= $_POST['moderate_image_boxes'];
		// delete all the images:
		for ($i=0; $i < count($idz); $i++)
 		{
 			$imagerow = sql_array("SELECT image FROM ".$pixelpost_db_prefix."pixelpost where id='".(int)$idz[$i]."'");
			$image = $imagerow['image'];
 			$file_to_del = $cfgrow['imagepath'].$imagerow['image'];
			unlink($file_to_del);
			$file_to_del = $cfgrow['thumbnailpath']."thumb_".$imagerow['image'];
			unlink($file_to_del);
 		}
 		$query = "DELETE FROM ".$pixelpost_db_prefix."pixelpost ";
 		$where = "WHERE";
 		$where2 = $where;
    $where3 = $where;
 		for ($i=0; $i < count($idz)-1; $i++)
 		{
 			$where .= " id = '".(int)$idz[$i]."' or ";
 			$where2 .= " img_id = '".(int)$idz[$i]."' or ";
      $where3 .= " parent_id = '".(int)$idz[$i]."' or ";
 		}
 		$lastid = $idz[count($idz)-1];
 		$where .= " id = '$lastid'  ";
 		$where2 .= " img_id = '$lastid'  ";
 		$where3 .= " parent_id = '$lastid'  ";
 		$query .= $where;
 		mysql_query($query) or die(mysql_error());
 		$c = count($idz);
 		echo "<div class='jcaption'>$admin_lang_imgedit_delete1  $c $admin_lang_imgedit_delete2</div>";
		$query2 = "DELETE FROM " . $pixelpost_db_prefix . "tags " . $where2;
 		mysql_query($query2) or die(mysql_error());
		// delete the comments as well
		$query3 = "DELETE FROM " . $pixelpost_db_prefix . "comments " . $where3;
 		mysql_query($query3) or die(mysql_error());
 	}

	// Mass add or delete categories to images
	if(isset($_GET['id'])){ $_GET['id'] = (int)$_GET['id']; }
	if(isset($_GET['action']) AND $_GET['action'] == "masscatedit")
	{
		$command = $_GET['cmd'];
		$command = explode('-',$command);

		// if unassign
		if (current($command)=='unassign')
		{
			$cat_id = end($command);
			$idz= $_POST['moderate_image_boxes'];

			$query = "DELETE FROM ".$pixelpost_db_prefix."catassoc ";
			$where = "WHERE";
			for ($i=0; $i < count($idz); $i++)
			{	$where .= " (cat_id='$cat_id' and image_id='".(int)$idz[$i]."') or ";	}

			$where .= " 0 ";
			$query .= $where;
			$query  = sql_query($query);
			$c = count($idz);
			echo "<div class='jcaption'>$admin_lang_imgedit_mass_5 $c $admin_lang_imgedit_mass_6.</div>";
		} // end if un-assign

		// if assign
		if (current($command)=='assign')
		{
			$cat_id = end($command);
			$idz= $_POST['moderate_image_boxes'];

			// first delete all old values
			$query = "DELETE FROM ".$pixelpost_db_prefix."catassoc ";
			$where = "WHERE";
			for ($i=0; $i < count($idz); $i++)
			{
				$where .= " (cat_id='$cat_id' and image_id='".(int)$idz[$i]."]') or ";
			}

			$where .= " 0 ";
			$query .= $where;

			$query  = sql_query($query);

			// now assign the new values
			$query_val = array();

			for ($i=0; $i < count($idz); $i++)
			{
				$query_val[$i] = "(NULL,'$cat_id','".(int)$idz[$i]."')";
			}

			$query_st = "INSERT INTO ".$pixelpost_db_prefix."catassoc (id,cat_id,image_id) VALUES ".implode(",", $query_val).";";
			$query  = sql_query($query_st);

			$c = count($idz);
			echo "<div class='jcaption'>$admin_lang_imgedit_mass_7 $c $admin_lang_imgedit_mass_8</div>";
		} // end if assign
 	} // end if mass edit

	// if tagging option
	if(isset($_POST['masstagopt']) AND $_POST['masstagopt'] != '')
	{
		if($_POST['masstagopt'] == 'unset')
		{
			$idz = $_POST['moderate_image_boxes'];
			$ids_array = implode(', ', $idz);

			$query = "DELETE FROM ".$pixelpost_db_prefix."tags ";
			$where = "WHERE img_id IN ($ids_array)";

			$strtr_arr = array(',' => ' ', ';' => ' ');
			$tags = strtr($_POST['masstag'], $strtr_arr);
			$pat1 = '/([^a-zA-Z 0-9_-]+)/';
			$tags = preg_replace( $pat1, '_', $tags);
			$pat2 = array('/ _ /', '/ _/', '/(_){2,}/','/ - /', '/ -/', '/(-){2,}/');
			$rep2 = array('', '', '_', '', '', '-');
			$tags = preg_replace( $pat2, $rep2, $tags);
			$tags_arr = preg_split('/[ ]{1,}/',$tags,-1,PREG_SPLIT_NO_EMPTY);

			$tags_array = implode('", "', $tags_arr);

			$where .= ' AND (tag IN ("'.$tags_array.'") OR alt_tag IN ("'.$tags_array.'"))';
			$query .= $where;

			if(count($idz) > 0)	$query  = sql_query($query);
		}
		else
		{
			$idz = $_POST['moderate_image_boxes'];

			$query = "INSERT INTO ".$pixelpost_db_prefix."tags VALUES ";

			$strtr_arr = array(',' => ' ', ';' => ' ');
			$tags = strtr($_POST['masstag'], $strtr_arr);
			$pat1 = '/([^a-zA-Z 0-9_-]+)/';
			$tags = preg_replace( $pat1, '_', $tags);
			$pat2 = array('/ _ /', '/ _/', '/(_){2,}/','/ - /', '/ -/', '/(-){2,}/');
			$rep2 = array('', '', '_', '', '', '-');
			$tags = preg_replace( $pat2, $rep2, $tags);
			$tags_arr = preg_split('/[ ]{1,}/',$tags,-1,PREG_SPLIT_NO_EMPTY);

			if($_POST['masstagopt'] == 'set')
			{
				for($x = 0; $x < count($idz); $x++)
				{
					for($y = 0; $y < count($tags_arr); $y++)
					{
						$values[1] = '('.(int)$idz[$x].', "'.$tags_arr[$y].'", "")';
						$values[0] = implode(', ', $values);
					}
				}
			}
			elseif($_POST['masstagopt'] == 'set2')
			{
				for($x = 0; $x < count($idz); $x++)
				{
					for($y = 0; $y < count($tags_arr); $y++)
					{
						$values[1] = '('.(int)$idz[$x].', "", "'.$tags_arr[$y].'")';
						$values[0] = implode(', ', $values);
					}
				}
			}

			$query .= $values[0];
			
			if(count($idz) > 0)	$query  = @mysql_query($query);
		}
	}

  // x=update
  if(isset($_GET['x']) AND $_GET['x'] == "update")
  {
		$headline = clean($_POST['headline']);
		$body = clean($_POST['body']);
		$alt_headline = clean($_POST['alt_headline']);
		$alt_body = clean($_POST['alt_body']);
		$comments_settings = clean($_POST['comments_settings']);
		$getid = intval($_GET['imageid']);
		$newdatetime = $_POST['newdatetime'];
		save_tags_edit($_POST['tags'],$getid);

		if ($cfgrow['altlangfile'] != 'Off')	save_tags_edit($_POST['alt_tags'],$getid,"alt_");

		$query = "delete from ".$pixelpost_db_prefix."catassoc where image_id='$getid'";
		$result = mysql_query($query) ||("Error: ".mysql_error());
		eval_addon_admin_workspace_menu('image_update');
//------------

		if($_FILES['userfile']['tmp_name'] != "")
		{
			$oldfilename = $_POST['oldfilename'];
			$userfile = strtolower($_FILES['userfile']['name']);
			$uploadfile = $upload_dir .$oldfilename;
			// NEW WORKSPACE ADDED
      eval_addon_admin_workspace_menu('image_reupload_start');
			if(move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile))
			{
				chmod($uploadfile, 0644);
				$result = check_upload($_FILES['userfile']['error']);
				//$filnamn =strtolower($_FILES['userfile']['name']);
				//$filnamn = $oldfilename
				$filtyp = $_FILES['userfile']['type'];
				$filstorlek = $_FILES['userfile']['size'];
				$status = "ok";
				createthumbnail($oldfilename);
				//Get the exif data so we can store it.
				include_once('../includes/functions_exif.php');
				$exif_info_db = serialize_exif ($uploadfile);
				$update = sql_query("update ".$pixelpost_db_prefix."pixelpost set exif_info='$exif_info_db' where id='$getid'");
				$file_reupload_str = '<br/>'.$admin_lang_imgedit_file.'<b>' .$oldfilename .'</b> '.$admin_lang_imgedit_file_isuploaded;
				// NEW WORKSPACE ADDED
        eval_addon_admin_workspace_menu('image_reupload_succesful');
			}
			else
			{
				// something went wrong, try to describe what
				if ($_FILES['userfile']['error']!='0')
				{
					$result = check_upload($_FILES['userfile']['error']);
				}
				else
				{
					$result = "$admin_lang_ni_upload_error";
				}
				
				echo "<div id='warning'>$admin_lang_error ";
				echo "<br/>$result</div><hr/>";
				$status = "no";
				// NEW WORKSPACE ADDED
        eval_addon_admin_workspace_menu('image_reupload_failed');
			} // end move
		} // end prepare of file */
//------------
		if (isset($_POST['category']))
		{
			$query_val = array();

			foreach($_POST['category'] as $val)
			{
				$category = $val;
				$query_val[] = "(NULL,'$val','$getid')";
			}

			$query_st = "INSERT INTO ".$pixelpost_db_prefix."catassoc (id,cat_id,image_id) VALUES ".implode(",", $query_val).";";
			$result = mysql_query($query_st) || die("Error: ".mysql_error());
		}

		$query = "update ".$pixelpost_db_prefix."pixelpost set datetime='$newdatetime', headline='$headline', body='$body', category='$category', alt_headline='$alt_headline', alt_body='$alt_body', comments='$comments_settings' where id='$getid'";
		$result = mysql_query($query) ||("Error: ".mysql_error().$admin_lang_imgedit_db_error);


		echo "<div class='jcaption'>$admin_lang_imgedit_update</div>
      <div class='content confirm'>$admin_lang_done $admin_lang_imgedit_updated #".$getid.". ".$file_reupload_str.	"</div><p />";
  }

	echo "<div id='caption'><b>$admin_lang_images</b></div>";

	// x=delete
	if(isset($_GET['x']) AND $_GET['x'] == "delete")
	{
		eval_addon_admin_workspace_menu('image_deleted');
		$getid = intval($_GET['imageid']);
		del_tags_edit($getid);
		$imagerow = sql_array("SELECT image FROM ".$pixelpost_db_prefix."pixelpost where id='$getid'");
		$image = $imagerow['image'];
		$file_to_del = "$upload_dir".$imagerow['image'];
		 echo "<div class='jcaption'>$admin_lang_imgedit_deleted	</div>
		<div class='content confirm'>";
		$query = sql_query("delete from ".$pixelpost_db_prefix."pixelpost where id='$getid'");
		$query = "delete from ".$pixelpost_db_prefix."catassoc where image_id='$getid'";
		$result = mysql_query($query) ||("Error: ".mysql_error());
		// added by ramin to delete the comments too!!
		$query = "delete from ".$pixelpost_db_prefix."comments where parent_id='$getid'";
		$result = mysql_query($query) ||("Error: ".mysql_error());
		$query = "delete from ".$pixelpost_db_prefix."tags where img_id='$getid'";
		$result = mysql_query($query) ||("Error: ".mysql_error());
		
		echo "&nbsp;$admin_lang_imgedit_deleted1&nbsp;";
		
		if(unlink($file_to_del))	$image_message = "&nbsp;$admin_lang_imgedit_deleted2&nbsp;&nbsp;";
		else	$image_message = "$admin_lang_imgedit_delete_error<p />";
		
		echo $image_message;
		
		$file_to_del = $cfgrow['thumbnailpath']."thumb_".$imagerow['image'];

		if(unlink($file_to_del))	$image_message = "&nbsp;$admin_lang_imgedit_deleted3";
		else	$image_message = "$admin_lang_imgedit_delete_error2<p />";
		
		echo $image_message."</div>";
	}

  // print out a list over images/posts
  if(!isset($_GET['id']) OR $_GET['id'] == "")
  {
		// resetting filter entries
		unset($selectfcat);
		unset($selectftag);
		unset($selectfalttag);
		unset($selectfmon);
		unset($findfid);
		if (isset($_POST['filtercat']) && $_POST['selectfcat'] != '') $selectfcat = $_POST['selectfcat'];
		else if (isset($_GET['selectfcat'])) $selectfcat = $_GET['selectfcat'];
		else if (!isset($_GET['selectfcat']) OR !isset($_POST['filtercat'])) $selectfcat = '';
		
		if (isset($_POST['filtertag']) && $_POST['selectftag'] != '') $selectftag = $_POST['selectftag'];
		else if (isset($_GET['selectftag'])) $selectftag = $_GET['selectftag'];
		else if (!isset($_GET['selectftag']) OR !isset($_POST['filtertag'])) $selectftag = '';
		
		if (isset($_POST['filteralttag']) && $_POST['selectfalttag'] != '') $selectfalttag = $_POST['selectfalttag'];
		else if (isset($_GET['selectfalttag'])) $selectfalttag = $_GET['selectfalttag'];
		else if (!isset($_GET['selectfalttag']) OR !isset($_POST['filteralttag'])) $selectfalttag = '';
		
		if (isset($_POST['filtermon']) && $_POST['selectfmon'] != '') $selectfmon = $_POST['selectfmon'];
		else if (isset($_GET['selectfmon'])) $selectfmon = $_GET['selectfmon'];
		else if (!isset($_GET['selectfmon']) OR !isset($_POST['filtermon'])) $selectfmon = '';
		
		if (isset($_POST['findid']) && $_POST['findfid'] != '') $findfid = $_POST['findfid'];
		else if (!isset($_POST['findid'])) $findfid = '';

		// Get number of photos in database depending on filter		
		if (isset($selectfcat) AND $selectfcat != '') {
			$query = "select count(*) as count from ".$pixelpost_db_prefix."pixelpost as a, ".$pixelpost_db_prefix."catassoc as b WHERE a.id = b.image_id AND b.cat_id = ".$selectfcat;
		}
		else if (isset($selectftag) AND $selectftag != '') {
			$query = "select count(*) as count from ".$pixelpost_db_prefix."pixelpost as a, ".$pixelpost_db_prefix."tags as b WHERE a.id = b.img_id AND b.tag LIKE '".$selectftag."'";
		}
		else if (isset($selectfalttag) AND $selectfalttag != '') {
			$query = "select count(*) as count from ".$pixelpost_db_prefix."pixelpost as a, ".$pixelpost_db_prefix."tags as b WHERE a.id = b.img_id AND b.alt_tag LIKE '".$selectfalttag."'";
		}
		else if (isset($selectfmon) AND $selectfmon != '') {
			$query = "select count(*) as count from ".$pixelpost_db_prefix."pixelpost WHERE datetime LIKE '".$selectfmon."%'";
		}
		else if (isset($findfid) AND $findfid != '') {
			$query = "SELECT count(*) FROM ".$pixelpost_db_prefix."pixelpost WHERE id = ".$findfid." limit 0,1";
		}		
		else {
			$query = "select count(*) as count from ".$pixelpost_db_prefix."pixelpost";
		}
		$photonumb = sql_array($query);
		$photonumb['count'] = '';
		if ($photonumb['count']) $pixelpost_photonumb = $photonumb['count'];
		else $pixelpost_photonumb = "0";

	
		if(!isset($_GET['page']) OR $_GET['page'] == "")	$page = "0";
		else	$page = intval($_GET['page']);
 		$_SESSION['page_pp'] = (int) $page;
		$_SESSION['numimg_pp'] = (int) $_SESSION['numimg_pp'];
    
		if ($_SESSION['numimg_pp'] == 0)	$_SESSION['numimg_pp'] = 10;
		elseif (isset($_POST['numimg_pp']) && $_POST['numimg_pp'] > 0)
		{
			$_SESSION['numimg_pp'] = ($pixelpost_photonumb < $_POST['numimg_pp'] && $pixelpost_photonumb > 0) ? $pixelpost_photonumb : $_POST['numimg_pp'];
		}
	
	  $currntpg = ceil($page/$_SESSION['numimg_pp'])+1;
	  // calculate the number of pages
		$num_img_pages = ceil($pixelpost_photonumb/$_SESSION['numimg_pp']);
		$num_img_pages = ($num_img_pages > 0)	? $num_img_pages : 1;
		// Now the queries to show the select options for filtering
		// the query for the select by category statement
		$selectfcats = "<option value='' selected=\"selected\">All</option>\n";
		$query = mysql_query("select * from ".$pixelpost_db_prefix."categories order by name");
		while(list($id,$name) = mysql_fetch_row($query)) {
			$selectfcats .= "<option value='$id'".($id==$selectfcat?' selected=\"selected\"':'').">".pullout($name)."</option>\n";
		}
		// the query for the select by tag statement
		$selectftags = "<option value='' selected=\"selected\">All</option>\n";
		$query = mysql_query("select distinct tag from ".$pixelpost_db_prefix."tags WHERE tag NOT LIKE '' order by tag");
		while(list($tag) = mysql_fetch_row($query)) {
			$selectftags .= "<option value='$tag'".($tag==$selectftag?' selected=\"selected\"':'').">".$tag."</option>\n";
		}
		// the query for the select by alt_tag statement
		if ($cfgrow['altlangfile'] != 'Off') {
			$selectfalttags = "<option value='' selected=\"selected\">All</option>\n";
			$query = mysql_query("select distinct alt_tag from ".$pixelpost_db_prefix."tags WHERE alt_tag NOT LIKE '' order by alt_tag");
			while(list($alt_tag) = mysql_fetch_row($query)) {
				$selectfalttags .= "<option value='$alt_tag'".($alt_tag==$selectfalttag?' selected=\"selected\"':'').">".$alt_tag."</option>\n";
			}
		}
		// the query for the select by month statement
		$selectfmons = "<option value='' selected=\"selected\">All</option>\n";
		$query = mysql_query("select distinct DATE_FORMAT(datetime, '%Y-%m') as fmonth from ".$pixelpost_db_prefix."pixelpost order by datetime desc");
		while(list($fmonth) = mysql_fetch_row($query)) {
			$selectfmons .= "<option value='$fmonth'".($fmonth==$selectfmon?' selected=\"selected\"':'').">".$fmonth."</option>\n";
		}
		$langs = 'admin_lang_'.$cfgrow['langfile'];
		$langs = ${$langs};
		if ($cfgrow['altlangfile'] != 'Off') {
			$altlangs = 'admin_lang_'.$cfgrow['altlangfile'];
			$altlangs = ${$altlangs};
		}
		echo "<div class='jcaption'><a href='' onclick=\"flip('additionalSelects'); return false;\" title=\"$admin_lang_show $admin_lang_options\">$admin_lang_imgedit_title1 $admin_lang_ni_select_cat, $admin_lang_ni_month, ID</a></div>
	  <div id=\"additionalSelects\">";
	  if ($selectfcat == '' AND $selectftag == '' AND $selectfalttag == '' AND $selectfmon == '') echo "<script language='javascript' type='text/javascript'>flip('additionalSelects');</script>";
		echo "<div class='content'>
		<form method='post' name='filter' accept-charset='UTF-8' action='index.php?view=images'>
		<table width='400' border='0' cellpadding='2'>
		<tr>
		<td align='right'><strong>$admin_lang_show $admin_lang_imgedit_category_plural:&nbsp;</strong></td>
		<td><select name='selectfcat'>$selectfcats</select></td>
		<td><input class='cmnt-buttons' type='submit' name='filtercat' value='$admin_lang_go' /></td>
		</tr>
		<tr>
		<td align='right'><strong>$admin_lang_show $admin_lang_ni_tags $langs:&nbsp;</strong></td>
		<td><select name='selectftag'>$selectftags</select></td>
		<td><input class='cmnt-buttons' type='submit' name='filtertag' value='$admin_lang_go' /></td>
		</tr>";
		if ($cfgrow['altlangfile'] != 'Off') { 
			echo "<tr>
			<td align='right'><strong>$admin_lang_show $admin_lang_ni_tags $altlangs:&nbsp;</strong></td>
			<td><select name='selectfalttag'>$selectfalttags</select></td>
			<td><input class='cmnt-buttons' type='submit' name='filteralttag' value='$admin_lang_go' /></td>
			</tr>";
		}
		echo "<tr>
		<td align='right'><strong>$admin_lang_show ".ucfirst($admin_lang_ni_month).":&nbsp;</strong></td>
		<td><select name='selectfmon'>$selectfmons</select></td>
		<td><input class='cmnt-buttons' type='submit' name='filtermon' value='$admin_lang_go' /></td>
		</tr>
		<tr>
		<td align='right' height='50'><strong>$admin_lang_show ID:&nbsp;</strong></td>
		<td><input type='text' size='6' name='findfid' value='$findfid' /></td>
		<td><input class='cmnt-buttons' type='submit' name='findid' value='$admin_lang_go' /></td>
		</tr>
		</table></form></div></div>";

	//the filter stuff for showing the correct browse pages
    if (isset($selectfcat)  AND $selectfcat != '') {
			$getfstring = '&amp;selectfcat='.$selectfcat;
		}
		else if (isset($selectftag) AND $selectftag != '') {
			$getfstring = '&amp;selectftag='.$selectftag;
		}
		else if (isset($selectfalttag) AND $selectfalttag != '') {
			$getfstring = '&amp;selectfalttag='.$selectfalttag;
		}
		else if (isset($selectfmon) AND $selectfmon != '') {
			$getfstring = '&amp;selectfmon='.$selectfmon;
		}
		else {
			$getfstring = '';
		}
	
		echo "<div class=\"jcaption\"><strong><span id=\"photonumb\">$pixelpost_photonumb</span>$admin_lang_imgedit_title2".$_SESSION['numimg_pp']."$admin_lang_imgedit_title3$currntpg$admin_lang_imgedit_title4$num_img_pages</strong>
		</div>
		<div class=\"content\">
		<form method=\"post\" name=\"manageposts\" id=\"manageposts\"  accept-charset=\"UTF-8\" action=\"index.php?view=images&amp;page=$page$getfstring\">
			<input class=\"cmnt-buttons\" type=\"button\" onclick=\"checkAll(document.getElementById('manageposts')); return false; \" value=\"$admin_lang_cmnt_check_all\" name=\"chechallbox\" />
			<input class=\"cmnt-buttons\" type=\"button\" onclick=\"invertselection(document.getElementById('manageposts')); return false; \" value=\"$admin_lang_cmnt_invert_checks\" name=\"invcheckbox\" />
			<input class=\"cmnt-buttons\" type=\"submit\" name=\"submitdelete\" value=\"$admin_lang_cmnt_del_selected\" onclick=\"return (confirm('Delete all selected images? \\n  \'Cancel\' to stop, \'OK\' to delete.')) ? document.getElementById('manageposts').action='".PHP_SELF."?view=images&amp;action=massdelete' : false;\"/>
			<input class=\"cmnt-buttons\" type=\"submit\" name=\"submitpublish\" value=\"$admin_lang_cmnt_publish_sel\" onclick=\"return (confirm('Publish all selected images? \\n  \'Cancel\' to stop, \'OK\' to publish.')) ? document.getElementById('manageposts').action='".PHP_SELF."?view=images&amp;action=masspublish' : false;\"/>
			<br/><br/>
			<select name=\"mass-edit-cat\" id=\"mass-edit-cat\" onchange=\"document.getElementById('manageposts').action='".PHP_SELF."?view=images&amp;action=masscatedit&amp;cmd='+this.options[this.selectedIndex].value; \" >\n
			<option value=\"\">$admin_lang_imgedit_mass_1</option> \n
			<option value=\"\"></option> \n
			<option value=\"\">--- $admin_lang_imgedit_mass_2  ---</option> \n";
	
		$query = mysql_query("select * from ".$pixelpost_db_prefix."categories order by name");
	
		while(list($id,$name) = mysql_fetch_row($query))
		{
			$name = pullout($name);
			$cat_name[] = $name;
			$ids[] = $id;
			echo "<option value=\"assign-$id\">$name</option>\n";
		}
	
		echo "<option value=\"\"></option> \n
	         		<option value=\"\">--- $admin_lang_imgedit_mass_3 ---</option> \n";
	
		for ($k=0;$k<count($cat_name);$k++)
		{
			$name =$cat_name[$k];
			$id = $ids[$k];

			echo "<option value='unassign-$id'>$name</option>\n";
	  }
	
		echo "</select> <input type='text' size='40' name='masstag' value='$admin_lang_imgedit_masstag...' onblur=\"if(this.value=='') this.value='$admin_lang_imgedit_masstag...';\" onfocus=\"if(this.value=='$admin_lang_imgedit_masstag...') this.value='';\" /> <select name='masstagopt' size='1'><option value=''></option><option value='set'>$admin_lang_imgedit_masstag_set</option><option value='set2'>$admin_lang_imgedit_masstag_set2</option><option value='unset'>$admin_lang_imgedit_masstag_unset</option></select>";
		echo " <input type=\"submit\" name=\"submit-mass-catedit\" id=\"submit-mass-catedit\" value=\"".$admin_lang_imgedit_mass_4."\" /><p /> <ul>";

		
		//cat filter
		if (isset($selectfcat) AND $selectfcat !='') {
			$query = "SELECT a.id, datetime, headline, body, image, category, alt_headline FROM ".$pixelpost_db_prefix."pixelpost as a, ".$pixelpost_db_prefix."catassoc as b WHERE a.id = b.image_id AND b.cat_id = ".$selectfcat." ORDER BY a.datetime DESC limit $page,".$_SESSION['numimg_pp'];
		}
		//tag filter
		else if (isset($selectftag) AND $selectftag !='') {
			$query = "SELECT id, datetime, headline, body, image, category, alt_headline FROM ".$pixelpost_db_prefix."pixelpost as a, ".$pixelpost_db_prefix."tags as b WHERE a.id = b.img_id AND b.tag LIKE '".$selectftag."' ORDER BY a.datetime DESC limit $page,".$_SESSION['numimg_pp'];
		}
		//alt tag filter
		else if (isset($selectfalttag) AND $selectfalttag != '') {
			$query = "SELECT id, datetime, headline, body, image, category, alt_headline FROM ".$pixelpost_db_prefix."pixelpost as a, ".$pixelpost_db_prefix."tags as b WHERE a.id = b.img_id AND b.alt_tag LIKE '".$selectfalttag."' ORDER BY a.datetime DESC limit $page,".$_SESSION['numimg_pp'];
		}
		//month filter
		else if (isset($selectfmon) AND $selectfmon != '') {
			$query = "SELECT id, datetime, headline, body, image, category, alt_headline FROM ".$pixelpost_db_prefix."pixelpost WHERE datetime LIKE '".$selectfmon."%' ORDER BY datetime DESC limit $page,".$_SESSION['numimg_pp'];
		}
		else if (isset($findfid) AND $findfid != '') {
			$query = "SELECT id, datetime, headline, body, image, category, alt_headline FROM ".$pixelpost_db_prefix."pixelpost WHERE id = ".$findfid." limit 0,1";
		}
		else {
			$query = "SELECT id, datetime, headline, body, image, category, alt_headline FROM ".$pixelpost_db_prefix."pixelpost ORDER BY datetime DESC limit $page,".$_SESSION['numimg_pp'];
		}
		
		// construct the pagelinks
		if($pixelpost_photonumb > $_SESSION['numimg_pp'])
    	{			
    		$pagecounter = 0;
    		$pcntr = 0;
    		$image_page_Links = "";
			while ($pcntr < $num_img_pages)
		  	{
				$pcntr++;
				$image_page_Links .= "<a href='index.php?view=images&amp;page=$pagecounter$getfstring'>".($_GET['page']==$pagecounter?'<b>'.$pcntr.'</b>':$pcntr)."</a> ";
				$pagecounter=$pagecounter+$_SESSION['numimg_pp'];
			}// end while
			if ($page < (($num_img_pages-1)*$_SESSION['numimg_pp']))
      		{
	      		$newpage = $page+$_SESSION['numimg_pp'];
	      		$image_page_Links .= "<a href='index.php?view=images&amp;page=$newpage$getfstring'>$admin_lang_next</a>";
      		}
			if ($page >= $_SESSION['numimg_pp'])
      		{
        		$newpage = $page - $_SESSION['numimg_pp'];
        		$image_page_Links  = "<a href='index.php?view=images&amp;page=$newpage$getfstring'>$admin_lang_prev</a> " .$image_page_Links;
      		}
      		echo $image_page_Links."<hr />";
      	}
		
		$pagec = 0;
		$images = mysql_query($query);
		
		while(list($id,$datetime,$headline,$body,$image,$category, $alt_headline) = mysql_fetch_row($images))
		{
			$headline = pullout($headline);
			$alt_headline = pullout($alt_headline);			
# 		$headline = htmlentities($headline);
    
			list($local_width,$local_height,$type,$attr) = getimagesize($cfgrow['imagepath'].$image);
    
			$fs = filesize($cfgrow['imagepath'].$image);
			$fs*=0.001;
			
			if(isset($_POST['moderate_image_boxes'])){ $checked = in_array($id, $_POST['moderate_image_boxes']) ? 'checked' : ''; }else{ $checked = ''; }
			
			echo "<li><a href=\"../index.php?showimage=$id\"><img src=\"".$cfgrow['thumbnailpath']."thumb_$image\" align=\"left\" hspace=\"3\" alt=\"Click to go to image\" /></a>
				<input type=\"checkbox\" class=\"images-checkbox\" name=\"moderate_image_boxes[]\" value=\"$id\" $checked />
				<strong><a href=\"".PHP_SELF."?view=images&amp;id=$id\">[$admin_lang_imgedit_edit]</a> <a href=\"../index.php?showimage=$id\" target=\"_blank\">[$admin_lang_imgedit_preview]</a> <a onclick=\"return confirmDeleteImg()\" href=\"".PHP_SELF."?view=images&amp;x=delete&amp;imageid=$id\">[$admin_lang_imgedit_delete]</a></strong><br/>
				<strong>#$id<br/>
				$langs $admin_lang_imgedit_title</strong> $headline<br/>";
				if ($cfgrow['altlangfile'] != 'Off') { 
					echo "<strong>$altlangs $admin_lang_imgedit_alttitle</strong> $alt_headline<br/>";
				}
				echo"<strong>$admin_lang_imgedit_file_name</strong> $image<br/>
				<strong>$admin_lang_imgedit_dimensions</strong> $local_width x $local_height, $fs KB<br/>
				<strong>$admin_lang_imgedit_tbpublished</strong> $datetime<br/>";

			// categories
			echo "<strong>$admin_lang_imgedit_category_plural &nbsp;</strong>";
					$category_list = mysql_query("SELECT t2.name FROM ".$pixelpost_db_prefix."catassoc t1 INNER JOIN ".$pixelpost_db_prefix."categories t2 ON t1.cat_id = t2.id WHERE t1.image_id = '$id' ORDER BY t2.name ");

	    while(list($category_name) = mysql_fetch_row($category_list))
	    {
  		 	$category_name = pullout($category_name);
   			echo "[$category_name]";
			}

			echo "<br/>";

			// tags
			echo "<strong>$langs $admin_lang_ni_tags:</strong> ";
			echo list_tags_edit($id);
			if ($cfgrow['altlangfile'] != 'Off') { 
				echo "<br/><strong>$altlangs $admin_lang_ni_tags:</strong> ";
				echo list_tags_edit($id, "alt_");
			}
			echo "<br/>";
			// added workspace requested by KArin on the forums
				eval_addon_admin_workspace_menu('image_list');
			// end workspace
			echo "</li>";

      $pagec++;
		}

		echo "</ul></form>";

		if($pixelpost_photonumb > $_SESSION['numimg_pp'])
    	{
         	echo $image_page_Links;
        }
        
        if(isset($_GET['page'])) { $page = '&amp;page='.$_GET['page']; }else{ $page = ''; }
        
    echo '<br/>
       <form method="post" action="'.PHP_SELF.'?view=images'.$page.$getfstring.'" accept-charset="UTF-8">';
 		echo $admin_lang_show.' ';
    echo '<input type="text" name="numimg_pp" size="2" value="'.$_SESSION['numimg_pp'].'" /> '.$admin_lang_imgedit_img_page.'.
	    <input type="submit" value="'.$admin_lang_go.'" />
		     		</form>';
    echo "</div><p />";
  }
  else
  {
    // an id is specified, edit the image, pull it out and put it in a form
    $getid = intval($_GET['id']);
    $imagerow = sql_array("SELECT * FROM ".$pixelpost_db_prefix."pixelpost where id='$getid'");
    $headline = pullout($imagerow['headline']);
    $headline = htmlspecialchars($headline,ENT_QUOTES);
    $body = pullout($imagerow['body']);

    $alt_headline = pullout($imagerow['alt_headline']);
    $alt_headline = htmlspecialchars($alt_headline,ENT_QUOTES);
    $alt_body = pullout($imagerow['alt_body']);

    $image = $imagerow['image'];
    $category = $imagerow['category'];
    $category = explode(",",$category);

    echo "
		<div id='submenu'>
		<a href='?view=images&amp;id=$getid&amp;imagessview=edit' ";
		
		$selectedclass = '';
		if(!isset($_GET["imagesview"]))
		{
			$selectedclass = 'selectedsubmenu';
		}

		echo "class='".$selectedclass."'>$admin_lang_imgedit_edit_post</a>";
        	echo_addon_admin_menus($addon_admin_functions,"images","&amp;id=".$getid);

		echo "</div>";

		eval_addon_admin_workspace_menu("image_edit","images");

// edit image, list categories etc.

		if (isset($_GET['imagesview']) AND $_GET['imagesview'] == 'edit' OR isset($_GET['imagesview']) AND $_GET['imagesview'] == '' OR !isset($_GET['imagesview'])) 
		{
			$tags = list_tags_edit($_GET['id']);

			if ($cfgrow['altlangfile'] != 'Off')	$alt_tags = list_tags_edit($_GET['id'], "alt_");

			echo "
			<form method='post' action='".PHP_SELF."?view=images&amp;x=update&amp;imageid=".$getid."&amp;page=".$_SESSION['page_pp']."' enctype='multipart/form-data' accept-charset='UTF-8'>";
			echo "
			<div class='jcaption'>$admin_lang_imgedit_reupimg</div>
			<div class='content'>
				<input name='userfile' type='file' size='60'/>
        		<input name='oldfilename' type = 'hidden' value='$image' />
			</div>
			<div class='jcaption'>$admin_lang_imgedit_title</div>
			<div class='content'>
				<input type='text' name='headline' value='$headline' style='width:300px;' />
			</div>
			<div class='jcaption'>$admin_lang_imgedit_tags_edit</div>
			<div class='content'><input type='text' name='tags' style='width:550px;' value='$tags' />";
			eval_addon_admin_workspace_menu('edit_image_form_def_lang');
			echo "</div>
			<div class='jcaption'>$admin_lang_imgedit_txt_desc</div>
			<div class='content'>";

			if($cfgrow['markdown'] == 'T')
			{
				echo "
 			<div>".$admin_lang_ni_markdown_text."<br/>
  			<a href='http://daringfireball.net/projects/markdown/' title='<?php echo $admin_lang_ni_markdown_hp; ?>' target='_blank'>".$admin_lang_ni_markdown_hp."</a>
  			&nbsp;&nbsp;&nbsp;
  			<a href='http://daringfireball.net/projects/markdown/basics' title='<?php echo $admin_lang_ni_markdown_element; ?>' target='_blank'>".$admin_lang_ni_markdown_element."</a>
  			&nbsp;&nbsp;&nbsp;
  			<a href='http://daringfireball.net/projects/markdown/syntax' title='<?php echo $admin_lang_ni_markdown_syntax; ?>' target='_blank'>".$admin_lang_ni_markdown_syntax."</a>
  			</div>";
  		}

			echo"	<textarea name='body' cols='50' rows='5' style='width:95%;'>$body</textarea>
			</div>
			<div class='jcaption'>$admin_lang_imgedit_category_plural</div>
			<div class='content'>
			";
			category_list_as_table(array(), $cfgrow);
			echo "</div>";

			list($img_width,$img_height,$type,$attr) = getimagesize($cfgrow['imagepath'].$image);
			$img_size = filesize($cfgrow['imagepath'].$image);
      $img_size = number_format($img_size);

   		echo "
			<div class='jcaption'>$admin_lang_imgedit_dtime</div>
			<div class='content'>
				<input type='text' name='newdatetime' value='".$imagerow['datetime']."' style='width:300px;' />
			</div>
			<div class='jcaption'>$admin_lang_optn_comment_setting2</div>
 			<div class='content'>$admin_lang_optn_cmnt_mod_txt2
 				<select name=\"comments_settings\">";

			$comments_result = sql_array("SELECT comments FROM ".$pixelpost_db_prefix."pixelpost where id = '$getid'");
			$comments = pullout($comments_result['comments']);

			if ($comments =='A')
			{
				echo "<option selected=\"selected\" value=\"A\">$admin_lang_optn_cmnt_mod_allowed</option><option value=\"M\">$admin_lang_optn_cmnt_mod_moderation</option><option value=\"F\">$admin_lang_optn_cmnt_mod_forbidden</option>";
			}
			elseif ($comments =='M')
			{
				echo "<option value=\"A\">$admin_lang_optn_cmnt_mod_allowed</option><option  selected=\"selected\" value=\"M\">$admin_lang_optn_cmnt_mod_moderation</option><option value=\"F\">$admin_lang_optn_cmnt_mod_forbidden</option>";
			}
			else
			{
				echo "<option value=\"A\">$admin_lang_optn_cmnt_mod_allowed</option><option value=\"M\">$admin_lang_optn_cmnt_mod_moderation</option><option selected=\"selected\" value=\"F\">$admin_lang_optn_cmnt_mod_forbidden</option>";
			}

			echo "</select></div>";

			// Check if the language addon is enabled. If not there is no need to show these fields
			if ($cfgrow['altlangfile'] != 'Off')
			{
				echo "
					<div class='jcaption' style='text-align:left;color:black;'>$admin_lang_imgedit_alt_language</div><br />
						<div class='jcaption'>$admin_lang_imgedit_title</div>
							<div class='content'><input type='text' name='alt_headline' value='$alt_headline' style='width:300px;' /></div>
						<div class='jcaption'>$admin_lang_imgedit_tags_edit</div>
							<div class='content'><input type='text' name='alt_tags' style='width:550px;' value='$alt_tags' />";
							eval_addon_admin_workspace_menu('edit_image_form_alt_lang');
						echo "</div>
						<div class='jcaption'>$admin_lang_imgedit_txt_desc</div>
			<div class='content'>";
				if($cfgrow['markdown'] == 'T')
				{
					echo "
   							<div>".$admin_lang_ni_markdown_text."<br/>
    						<a href='http://daringfireball.net/projects/markdown/' title='<?php echo $admin_lang_ni_markdown_hp; ?>' target='_blank'>".$admin_lang_ni_markdown_hp."</a>
    						&nbsp;&nbsp;&nbsp;
    						<a href='http://daringfireball.net/projects/markdown/basics' title='<?php echo $admin_lang_ni_markdown_element; ?>' target='_blank'>".$admin_lang_ni_markdown_element."</a>
    						&nbsp;&nbsp;&nbsp;
    						<a href='http://daringfireball.net/projects/markdown/syntax' title='<?php echo $admin_lang_ni_markdown_syntax; ?>' target='_blank'>".$admin_lang_ni_markdown_syntax."</a>
    						</div>";
    		}

				echo" $admin_lang_imgedit_txt_desc<br/>
							<textarea name='alt_body' cols='50' rows='5' style='width:95%;'>$alt_body</textarea>
						</div><br />";

				
			}
			eval_addon_admin_workspace_menu("image_edit_form","images");
			echo "
			<div class='jcaption'>$admin_lang_imgedit_img</div>
			<div class='content'>
	    	<b>$admin_lang_imgedit_file_name</b> $image, <b>$admin_lang_imgedit_fsize</b> $img_width x $img_height; $img_size <b>kb</b>
				<br/>
         <img id='itemimg' src='".$cfgrow['thumbnailpath']."thumb_$image' alt='' />
			</div>
      <div class='content'>
	    	<input type='submit' value='$admin_lang_imgedit_u_post_button' />
			</div>
      	    </form>
			    	  ";

			// Check if the '12c' is selected as the crop then add 3 buttons to the page '+', '-', and 'crop'
			if ($cfgrow['crop']=='12c')
			{
				$to_echo ="
			<br/><br/>
			&nbsp;&nbsp;&nbsp;<strong>$admin_lang_imgedit_12cropimg</strong><br/>
            $admin_lang_imgedit_12cropimg_txt
            <input type='button' name='Submit1' value='$admin_lang_imgedit_uthmb_button' onclick=\"cropCheck('def','".$image ."');\" />
 	    	<input type='button' name='Submit3' value='".$txt['smaller']."' onmousedown=\"cropZoom('in');\" onmouseup='stopZoom();' />
	   		<input type='button' name='Submit4' value='".$txt['bigger']."' onmousedown=\"cropZoom('out');\" onmouseup='stopZoom();' />";
				echo $to_echo;

				// set the size of the crop frame according to the uploaded image
				setsize_cropdiv ($image);

				//--------------------------------------------------------
				$for_echo ="<p/>
	<img src='".$cfgrow['imagepath'].$image."' id='myimg' />
	<div id='cropdiv'>
	<table width='100%' height='100%' border='1' cellpadding='0' cellspacing='0' bordercolor='#000000'>
    <tr><td><img src='".$spacer."' /></td>
	</tr></table>
	</div>
	<div id='editthumbnail'>$admin_lang_imgedit_cropbg</div> <!-- end of edit thumb div -->
	 ";
				echo $for_echo;
				//--------------------------------------------------------
			}
			else	echo "$admin_lang_imgedit_12crop_opt<p />";
			echo "<!-- end of content div -->
         <p />";
		}
	}// end of if imagesview = edit
} // end view=images
?>