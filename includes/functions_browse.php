<?php

// SVN file version:
// $Id$

if(isset($_GET['x']) &&$_GET['x'] == "browse")
{
	$thumb_output = "";
	$where = "";
	if ($language_abr == $default_language_abr){
 		$headline_selection = 'headline';
  } else  {
  	$headline_selection = 'alt_headline';
 	}
	if ($cfgrow['display_order']=='default'){
		$image_sorting = 'DESC';
	} else {
		$image_sorting = 'ASC';
	}
	if(is_numeric($_GET['category']) && $_GET['category'] != "")
	{
		// Modified from Mark Lewin's hack for multiple categories
		$query = mysql_query("SELECT 1,t2.id,{$headline_selection},image,datetime
													FROM  {$pixelpost_db_prefix}catassoc as t1
													INNER JOIN {$pixelpost_db_prefix}pixelpost t2 on t2.id = t1.image_id
													WHERE t1.cat_id = '".$_GET['category']."'
													AND (datetime<='$cdate')
													ORDER BY datetime ".$image_sorting);
		$lookingfor = 1;
	}
	elseif(isset($_GET['archivedate']) && eregi("^[0-9]{4}-[0-9]{2}$", $_GET['archivedate']))
	{
		$where = "AND (DATE_FORMAT(datetime, '%Y-%m')='".$_GET['archivedate']."')"; //DATE_FORMAT(foo, '%Y-%m-%d')
		$query = mysql_query("SELECT 1,id,{$headline_selection},image, datetime FROM ".$pixelpost_db_prefix."pixelpost WHERE (datetime<='$cdate') $where ORDER BY datetime ".$image_sorting);
		$lookingfor = 1;
	}
	elseif(isset($_POST['category']))
	{
		$lookingfor = 0;
		$where = "(";

		foreach( $_POST['category'] as $cat)
		{
			$where .= "t1.cat_id='$cat' OR ";
			$lookingfor++;
		}

		$where .= " 0)";
		$querystr = "SELECT COUNT(t1.id), t2.id,{$headline_selection},image,datetime
									FROM {$pixelpost_db_prefix}catassoc AS t1
									INNER JOIN {$pixelpost_db_prefix}pixelpost t2 ON t2.id = t1.image_id
									WHERE (datetime<='$cdate') AND
									$where
									GROUP BY t2.id
									ORDER BY datetime, t2.id ".$image_sorting;
		$query = mysql_query($querystr);
	}
	elseif(isset($_GET['tag']) && eregi("[a-zA-Z 0-9_]+",$_GET['tag']))
	{
		$lookingfor = 1;
		$default_language_abr = strtolower($PP_supp_lang[$cfgrow['langfile']][0]);

  	if ($language_abr == $default_language_abr)
  	{
  		$tag_selection = "AND (t2.tag = '" . $_GET['tag'] . "')";
	  }
	  else
	  {
  		$tag_selection = "AND (t2.alt_tag = '" . $_GET['tag'] . "')";
  	}

		$querystr = "SELECT 1, t1.id,t1.{$headline_selection},t1.image, t1.datetime
		FROM {$pixelpost_db_prefix}pixelpost AS t1, {$pixelpost_db_prefix}tags AS t2
		WHERE (t1.datetime<='$cdate')
		$where
		AND (t1.id = t2.img_id)
		$tag_selection
		GROUP BY t1.id
		ORDER BY t1.datetime ".$image_sorting;
		$query = mysql_query($querystr);
	}
	else
	{
		$lookingfor = 1;
 		$query = mysql_query("SELECT 1,id,{$headline_selection},image,datetime FROM ".$pixelpost_db_prefix."pixelpost WHERE (datetime<='$cdate') ORDER BY datetime ".$image_sorting);
	}


	while(list($count,$id,$title,$name,$datetime) = mysql_fetch_row($query))
	{
		if( $count != $lookingfor) continue;   // Major hack for the browse filters.

		$title = pullout($title);
		$title = htmlspecialchars($title,ENT_QUOTES);
		$thumbnail = ltrim($cfgrow['thumbnailpath'], "./")."thumb_".$name;
		$thumbnail_extra = getimagesize($thumbnail);
		$local_width = $thumbnail_extra['0'];
		$local_height = $thumbnail_extra['1'];
		$thumb_output .= "<a href=\"$showprefix$id\"><img src=\"$thumbnail\" alt=\"$title\" title=\"$title\" width=\"$local_width\" height=\"$local_height\" class=\"thumbnails\" /></a>";
	}

  $tpl = ereg_replace("<THUMBNAILS>",$thumb_output,$tpl);
}

// build browse menu
// $browse_select = "<select name='browse' onchange='self.location.href=this.options[this.selectedIndex].value;'><option value=''>$lang_browse_select_category</option><option value='?x=browse&amp;category='>$lang_browse_all</option>";
$browse_select = "<select name='browse' onchange='self.location.href=this.options[this.selectedIndex].value;'><option value=''>$lang_browse_select_category</option><option value='index.php?x=browse&amp;category='>$lang_browse_all</option>";
$query = mysql_query("SELECT * FROM ".$pixelpost_db_prefix."categories ORDER BY name");

while(list($id,$name, $alt_name) = mysql_fetch_row($query))
{
	if ($language_abr == $default_language_abr)
	{
  	$name = pullout($name);
	}
	else
	{
  	$name = pullout($alt_name);
  }
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
	if ($language_abr == $default_language_abr)
	{
  	$name = pullout($name);
	}
	else
	{
  	$name = pullout($alt_name);
  }

	$checkbox_checked = "";

	if(isset($category)&&is_array($category)&& in_array($id,$category))	$checkbox_checked = "checked";

	$checkboxes .= "<input type='checkbox' name='category[]' value='$id' $checkbox_checked />$name&nbsp;&nbsp;&nbsp;\n";
}

$checkboxes .= "<input type='submit' value='Filter' /></form>";
$tpl = ereg_replace("<BROWSE_CHECKBOXLIST>",$checkboxes,$tpl);

?>