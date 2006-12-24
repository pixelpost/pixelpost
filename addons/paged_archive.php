<?php
/*

Requires Pixelpost version 1.4 or newer
Page-By-Page-Archive
ADDON-Version 1.1

SVN file version:
$Id$

Version 1.1: Fixed regex issue

Written by: Ramin Mehran
Contact: raminia@yahoo.com

Pixelpost www: http://www.pixelpost.org/

License: http://www.gnu.org/copyleft/gpl.html

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA 02111-1307, USA.

============================================================================

NEW TAGS:

<CATEGORY_LINKS_AS_LIST> // Category links as a text list for default PP's archive page
<CATEGORY_LINKS_AS_LIST_PAGED> // Category links as a text list for page-by-page archive
<BROWSE_MONTHLY_ARCHIVE_PAGED> // Monthly drop box for default PP's archive page
<BROWSE_MONTHLY_ARCHIVE_AS_LINK_PAGED> // Monthly links as a text list for page-by-page archive
<BROWSE_CATEGORIES_PAGED> // Category drop box for page-by-page archive
<THUMBNAILS_WHOLE_PAGED> // Thumbnails in this page
<THUMBNAILS_PAGES_LINKS> // Link to the pages of thumbnail in the selected category
<ARCHIVE_PAGES_NUM> // Page number you are viewing
<CATEGORY_OR_DATE_NAME_PAGED_ARCHIVE> // Name of the category or Month you select
<LINK_TO_PAGED_ARCHIVE> // Link to Paged-by-page archive page as <a href="index.php?x=browse&pagenum=1">Archive</a>',$tpl);
<TAG_LINKS_AS_LIST> // Tag links as a text list for default PP's archive page
<TAG_LINKS_AS_LIST_PAGED> // Tag links as a text list for page-by-page archive
<TAG_IMG_LIST> // list of tags for showed image
<TAG_IMG_LIST_PAGED> // list of tags for showed image
*/

$addon_name = "Page-By-Page-Archive for category and month (for PP v1.4)";
$addon_version = "1.0";

$maxpthumb = $cfgrow['maxpthumb'];

if (isset($_GET['updatedflagp'])&&$_GET['updatedflagp']=="1")
{
	$isupdated = "<font color='#FF0000'>Updated!</font>";
}
else
{
	$isupdated = "";
}
// FIELD_EXISTS
// Checks whether specified field exists in current or specified table.
$fieldname = "maxpthumb";

$table = $pixelpost_db_prefix ."config";
$fieldexists = 0;
$t = 0;
$attention_call = "";
if ($table != "")
{
	if(isset($table_name))
	{
		$current_table = $table;
	}
	$result_id = mysql_list_fields( $pixelpost_db_pixelpost, $table);

	for($t = 0; $t < mysql_num_fields($result_id); $t++)
	{
		if (strtolower( $fieldname) == strtolower(mysql_field_name($result_id, $t)))
		{
			$fieldexists = 1;
			break;
		}
	}
}

// if the field does not exit: Create it!
if($fieldexists==0)
{
	$result = mysql_query("ALTER TABLE $table ADD `maxpthumb` VARCHAR( 5) DEFAULT '100' NOT NULL ");
}

// if the maximum number of thumbnails in the admin section is updated
if(isset($_GET['x'])&&$_GET['x'] == "maxpthumb")
{
	$newmaxpthumb = (int) $_POST['newmaxpthumb'];
	$query = "update ".$pixelpost_db_prefix."config set maxpthumb='" .$newmaxpthumb ."'" ;
	$update = mysql_query($query);
};

// description
$addon_description = "$attention_call Page by page category and month archive. Useful when you have
plenty of photos in archive and you want to show them in few pages and not just as a whole. Compatible with Pixelpost version 1.3 with multi category mod and version 1.4.
Many new tags is added to handle the archives. Open the archive_page.php file to see the new tags.<p />
Enter the maximum number of thumbnails in each page of the archive page:
<form method='post' action='index.php?view=addons&amp;x=maxpthumb'>
<input type='text' name='newmaxpthumb' value='".$maxpthumb ."' style='width:40px'>
<input type='submit' value='update'>
</form> $isupdated

<p>TAGS:<br/>
<br/>
&lt;CATEGORY_LINKS_AS_LIST&gt; // Category links as a text list for default PP's
archive page<br/>
&lt;CATEGORY_LINKS_AS_LIST_PAGED&gt; // Category links as a text list for page-by-page
archive<br/>
&lt;BROWSE_MONTHLY_ARCHIVE_PAGED&gt; // Monthly drop box for default PP's archive page<br/>
&lt;BROWSE_MONTHLY_ARCHIVE_AS_LINK_PAGED&gt; // Monthly links as a text list for
page-by-page archive<br/>
&lt;BROWSE_CATEGORIES_PAGED&gt; // Category drop box for page-by-page archive<br/>
&lt;THUMBNAILS_WHOLE_PAGED&gt; // Thumbnails in this page<br/>
&lt;THUMBNAILS_PAGES_LINKS&gt; // Link to the pages of thumbnail in the selected
category<br/>
&lt;ARCHIVE_PAGES_NUM&gt; // Page number you are viewing<br/>
&lt;CATEGORY_OR_DATE_NAME_PAGED_ARCHIVE&gt; // Name of the category or Month you
select<br/>
&lt;LINK_TO_PAGED_ARCHIVE&gt; // Link to Paged-by-page archive page</p>

<p>NEW TAGS:<br/>
<br/>
&lt;TAG_LINKS_AS_LIST&gt; // Tag links as a text list for default PP's archive page<br/>
&lt;TAG_LINKS_AS_LIST_PAGED&gt; // Tag links as a text list for page-by-page archive<br/>
&lt;TAG_IMG_LIST&gt; // list of tags for showed image<br/>
&lt;TAG_IMG_LIST_PAGED&gt; // list of tags for showed image</p>

";

// date time of now!
$tz = $cfgrow['timezone'];
$datetime = gmdate("Y-m-d H:i:s",gmdate("U")+(3600 * $tz));

// get maximum number of thumbnails in each browse page from db
$maxnumber_thumbs = $cfgrow['maxpthumb'];


// number of all photos
$photonumb = mysql_query("SELECT count(*) AS count FROM ".$pixelpost_db_prefix."pixelpost WHERE datetime<='$datetime'");
$row = mysql_fetch_array($photonumb);
// number of photos in the database
$pixelpost_all_photonumb = $row['count'] ;

//-------------------------------- Category Browse Menu (paged and original)
/*---------------------------------**********************---------------------------------------*/

$count= $pixelpost_all_photonumb;
$category_Link_List = " <a href='index.php?x=browse'> $lang_browse_all (" .$count .") </a><br />";

$category_Link_List_paged = "<ul id=\"taglist\">";
$category_Link_List_paged .= "<li><a href='index.php?x=browse&amp;pagenum=1'>$lang_browse_all (" .$count .")</a></li>";

$query = mysql_query("SELECT * FROM ".$pixelpost_db_prefix."categories ORDER BY name");
while(list($id,$name) = mysql_fetch_row($query))
{
	$queryr = "SELECT count(*) AS count,datetime
	FROM {$pixelpost_db_prefix}catassoc AS t1
	INNER JOIN {$pixelpost_db_prefix}pixelpost t2 on t2.id = t1.image_id
	WHERE (t1.cat_id = '".$id."' AND datetime<='$datetime')
	GROUP BY t1.cat_id ";

	$count = mysql_query($queryr);
	$count = mysql_fetch_array($count);
	$count= $count['count'];
	$name = pullout($name);
	$catname_count = $name ." (" .$count .")";

	$category_Link_List .= "<a href='index.php?x=browse&amp;category=$id'>$catname_count</a><br />";

	// paged version of the browse archive
	$category_Link_List_paged .= "<li><a href='index.php?x=browse&amp;category=$id&amp;pagenum=1'>$catname_count</a></li>";
}

$category_Link_List_paged .= "</ul>";


// tags of Category List Of Links (default version)
$tpl = str_replace("<CATEGORY_LINKS_AS_LIST>",$category_Link_List,$tpl);

// paged version tages
$tpl = str_replace("<CATEGORY_LINKS_AS_LIST_PAGED>",$category_Link_List_paged,$tpl);


//----------- Monthly Archive Menu and List
if (isset($_GET['pagenum'])&&$_GET['pagenum'] != "")
{
	$tz = $cfgrow['timezone'];
	$thismonth = gmdate("Y-m",gmdate("U")+(3600 * $tz));
	$select_display_thismonth=date("F, Y",strtotime($thismonth."-01"));

	$archive_select = "<select name='browse' onChange='self.location.href=this.options[this.selectedIndex].value;'><option value=''>Monthly archive</option><option value='index.php?x=browse&amp;pagenum=1'>$lang_browse_all (" .$pixelpost_all_photonumb .")</option>";
	$archive_select_links = "<ul id=\"monthlist\">
                            <li><a href='index.php?x=browse&amp;pagenum=1'>$lang_browse_all (" .$pixelpost_all_photonumb .")</a></li>";
	$query = "SELECT distinct DATE_FORMAT(datetime, '%Y-%m') FROM ".$pixelpost_db_prefix."pixelpost
	WHERE DATE_FORMAT(datetime, '%Y-%m') <= '$thismonth' and datetime<='$datetime'
	ORDER BY datetime desc";

	$query = mysql_query($query);
	while(list($thedate) = mysql_fetch_row($query))
	{
		$query2 = "SELECT count(*) AS count FROM ".$pixelpost_db_prefix."pixelpost WHERE datetime<='$datetime' and DATE_FORMAT(datetime, '%Y-%m')='".$thedate ."'";
		$count = mysql_query($query2);
		$count = mysql_fetch_array($count);
		$count= $count['count'];
		$select_display_date=date("F, Y",strtotime($thedate."-01"));
		$thedate = pullout($thedate);
		$archive_select .= "<option value='index.php?x=browse&amp;archivedate=$thedate&amp;monthname=$select_display_date&amp;pagenum=1'>$name (" .$select_display_date .") (" .$count .")</option>";
		$archive_select_links .= "<li><a href='index.php?x=browse&amp;archivedate=$thedate&amp;monthname=$select_display_date&amp;pagenum=1'>$name " .$select_display_date ." (" .$count .")</a></li>";
	};// end while
	$archive_select .= "</select>";
	$archive_select_links .= "</ul>";
} // end $_GET['pagenum'] != "")
else
{
	// does not use page number
	$tz = $cfgrow['timezone'];
	$thismonth = gmdate("Y-m",gmdate("U")+(3600 * $tz));
	$select_display_thismonth=date("F, Y",strtotime($thismonth."-01"));

	if (isset($thedate))
	{
		$archive_select = "<select name='browse' onChange='self.location.href=this.options[this.selectedIndex].value;'><option value=''>Monthly archive</option><option value='index.php?x=browse&amp;archivedate=$thedate&amp;pagenum=1'>$lang_browse_all (" .$pixelpost_all_photonumb .")</option>";
		$archive_select_links = "<ul id='monthlist'><li><a href='index.php?x=browse&amp;archivedate=$thedate&amp;pagenum=1'>$lang_browse_all (" .$pixelpost_all_photonumb .")</a></li>";
	}
	else
	{
		$archive_select = "<select name='browse' onChange='self.location.href=this.options[this.selectedIndex].value;'><option value=''>Monthly archive</option><option value='index.php?x=browse&amp;pagenum=1'>$lang_browse_all (" .$pixelpost_all_photonumb .")</option>";
		$archive_select_links = "<ul id='monthlist'><li><a href='index.php?x=browse&amp;pagenum=1'>$lang_browse_all (" .$pixelpost_all_photonumb .")</a></li>";
	}

	$query = mysql_query("SELECT DISTINCT DATE_FORMAT(datetime, '%Y-%m') FROM ".$pixelpost_db_prefix."pixelpost ORDER BY datetime desc");

	while(list($thedate) = mysql_fetch_row($query))
	{
		$query3 = "SELECT count(*) AS count FROM ".$pixelpost_db_prefix."pixelpost WHERE DATE_FORMAT(datetime, '%Y-%m')='".$thedate ."'";
		$count = mysql_query($query3);
		$count = mysql_fetch_array($count);
		$count= $count['count'];

		$select_display_date=date("F, Y",strtotime($thedate."-01"));
		$thedate = pullout($thedate);
		$archive_select .= "<option value='index.php?x=browse&amp;archivedate=$thedate'>$name (" .$select_display_date .") (" .$count .")</option>";
		$archive_select_links .= "<li><a href='index.php?x=browse&amp;archivedate=$thedate'>$name " .$select_display_date ." (" .$count .")</a></li>";
	}; // end while

	$archive_select .= "</select>";
	$archive_select_links .= "</ul>";
} // end else

// bulid the new tag
$tpl = str_replace("<BROWSE_MONTHLY_ARCHIVE_PAGED>",$archive_select,$tpl);
$tpl = str_replace("<BROWSE_MONTHLY_ARCHIVE_AS_LINK_PAGED>",$archive_select_links,$tpl);

//--------------- check if it should be the browse page
if(isset($_GET['x'])&&$_GET['x'] == "browse")
{
	// initialize variables
	$thumb_output = "";
	$where = "";
	$limit = "";
	$pagenum = ($_GET['pagenum']!='') ? (int)$_GET['pagenum'] : 1;

	// did user select a category?

	if($_GET['category'] != "")
	{
		$where = "and (t2.cat_id ='".(int)$_GET['category']."')";
	}

	// do you use links with page number?
	if ($_GET['pagenum'] != "")
	{
		$start = $maxnumber_thumbs*((int)$_GET['pagenum']-1);// calculate start and end of the thumbs in the selected page
		$limit = " limit $start , $maxnumber_thumbs "; // create the limit command (in MS-SQL this should be TOP)
	}// end if ($_GET['pagenum'] != "")

	// build query
	if (!isset($_GET['archivedate']) && $_GET['category'] != "")
	{
	// no archive date
		$query = "SELECT t1.id,t1.headline,t1.image
		FROM {$pixelpost_db_prefix}pixelpost AS t1, {$pixelpost_db_prefix}catassoc AS t2
		WHERE (t1.datetime<='$cdate')
		$where
		AND (t1.id = t2.image_id)
		GROUP BY t1.id
		ORDER BY t1.datetime DESC" .$limit;
	} // if ($_GET['archivedate']=="")
	else if(eregi("^[0-9]{4}-[0-9]{2}$", $_GET['archivedate']))
	{ // archive date is available
		$archivedate_start = $_GET['archivedate'] ."-01 00:00:00";
		$archivedate_end = $_GET['archivedate'] ."-31 23:59:59";
		$query = "SELECT id,headline,image FROM ".$pixelpost_db_prefix."pixelpost
		WHERE (datetime<='$cdate' and datetime >='$archivedate_start' and datetime <= '$archivedate_end')
		$where ORDER BY datetime DESC" .$limit;
	}
	else if(isset($_GET['tag']) && eregi("[a-zA-Z 0-9_]+",$_GET['tag']))
	{
  	if ($language_abr == $default_language_abr)	$tag_selection = "AND (t2.tag = '" . $_GET['tag'] . "')";
	  else	$tag_selection = "AND (t2.alt_tag = '" . $_GET['tag'] . "')";

		$query = "SELECT t1.id,t1.headline,t1.image
		FROM {$pixelpost_db_prefix}pixelpost AS t1, {$pixelpost_db_prefix}tags AS t2
		WHERE (t1.datetime<='$cdate')
		$where
		AND (t1.id = t2.img_id)
		$tag_selection
		GROUP BY t1.id
		ORDER BY t1.datetime DESC" .$limit;
	}
	else
	{
		$query = "SELECT id, headline, image FROM {$pixelpost_db_prefix}pixelpost
		WHERE (datetime<='$cdate')
		GROUP BY id
		ORDER BY datetime DESC" .$limit;
	}

	$query = mysql_query($query);

	//---------------------------- Making thumbs row

	// for each record ...
	while(list($id,$title,$name) = mysql_fetch_row($query))
	{
		// from the thumbnail row. This could be build by tables too.
		$title = pullout($title);
		$thumbnail = "thumbnails/thumb_$name";
		$thumb_output .= "<a href='$PHP_SELF?showimage=$id'><img src='$thumbnail' alt='$title' title='$title' class='thumbnails' /></a>";
	} //end while
	// initialize page counter
	$pagecounter=0;

	//---------------- Get number of photos in database in the selected category

	// initialize where command
	$where = "";
	$monthname = "";

	// check if user selects a category
	if(isset($_GET['category'])&&$_GET['category'] != "")
	{
		$queryr = "SELECT count(*) AS count,datetime
		FROM {$pixelpost_db_prefix}catassoc AS t1
		INNER JOIN {$pixelpost_db_prefix}pixelpost t2 on t2.id = t1.image_id
		WHERE (t1.cat_id = '".(int)$_GET['category']."' AND datetime<='$datetime')";
		$queryr .= " GROUP BY t1.cat_id ";
	}// end if
	else if(isset($_GET['tag']) && eregi("[a-zA-Z 0-9_]+",$_GET['tag']))
	{
  	if ($language_abr == $default_language_abr)	$tag_selection = "AND (t2.tag = '" . $_GET['tag'] . "')";
	  else	$tag_selection = "AND (t2.alt_tag = '" . $_GET['tag'] . "')";

		$queryr = "SELECT count(*) AS count
		FROM {$pixelpost_db_prefix}pixelpost AS t1, {$pixelpost_db_prefix}tags AS t2
		WHERE (t1.datetime<='$cdate')
		AND (t1.id = t2.img_id)
		$tag_selection";
	}
	else if(isset($_GET['archivedate']) && eregi("^[0-9]{4}-[0-9]{2}$", $_GET['archivedate']))
	{
		$archivedate_start = $_GET['archivedate'] ."-01 00:00:00";
		$archivedate_end = $_GET['archivedate'] ."-31 23:59:59";
		$where = " AND datetime >='$archivedate_start' AND datetime <= '$archivedate_end' ";
		$monthname = $_GET['monthname'];
		$queryr = "SELECT count(*) AS count FROM ".$pixelpost_db_prefix."pixelpost WHERE datetime<='$datetime'" .$where;
	} // end if($_GET['archivedate'] != "")
	else // not cat selected return all images in the DB
	{
		$queryr = "SELECT count(*) AS count
		FROM {$pixelpost_db_prefix}pixelpost
		WHERE ( datetime<='$datetime')";
	} //end else

	$photonumb = mysql_query($queryr);
	$row = mysql_fetch_array($photonumb);
	// number of photos in the database in the same category
	$pixelpost_photonumb = $row['count'];

	// calculate the number of pages
	$num_browse_pages = (isset($_GET['pagenum'])) ? ceil($pixelpost_photonumb/$maxnumber_thumbs) : "";

	// initialize archive links
	$Archive_pages_Links = "";
	// selected category id
	$cat_id = ((isset($_GET['category']) && !empty($_GET['category'])) ? ((int)$_GET['category']) : "");

	//-------- Make page number to archive as links (for the selected category)

	// produce Previous page link
	if ($pagenum > 1)
	{
		$temp =$pagenum-1;
		if($cat_id != '')	$Archive_pages_Links .= "<a href='index.php?x=browse&amp;category=$cat_id&amp;pagenum=$temp'>$lang_previous</a> ";
		else if(isset($_GET['tag']) && eregi("[a-zA-Z 0-9_]+",$_GET['tag']))
		{
			$Archive_pages_Links .= "<a href='index.php?x=browse&amp;tag=".$_GET['tag']."&amp;pagenum=$temp'>$lang_previous</a> ";
		}
		else if(isset($_GET['archivedate']) && eregi("^[0-9]{4}-[0-9]{2}$", $_GET['archivedate']))
		{
			$monthname=str_replace(" ","%20",$monthname);
			$archivedate=$_GET['archivedate'];
			$Archive_pages_Links .= "<a  href='index.php?x=browse&amp;archivedate=$archivedate&amp;monthname=$monthname&amp;pagenum=$temp'>$lang_previous</a> ";
		}
		else	$Archive_pages_Links .= "<a href='index.php?x=browse&amp;pagenum=$temp'>$lang_previous</a> ";
	}

	if($cat_id != '')
	{
		$pagecounter = 0;

		while ($pagecounter < $num_browse_pages)
		{
			$pagecounter++;
			$Archive_pages_Links .= "<a href='index.php?x=browse&amp;category=$cat_id&amp;pagenum=$pagecounter'>$pagecounter</a> ";
		}// end while
	}// end if
	else if(isset($_GET['tag']) && eregi("[a-zA-Z 0-9_]+",$_GET['tag']))
	{
		$pagecounter = 0;

		while ($pagecounter < $num_browse_pages)
		{
			$pagecounter++;
			$Archive_pages_Links .= "<a href='index.php?x=browse&amp;tag=".$_GET['tag']."&amp;pagenum=$pagecounter'>$pagecounter</a> ";
		}
	}
	else if(isset($_GET['archivedate']) && eregi("^[0-9]{4}-[0-9]{2}$", $_GET['archivedate']))
	{
		$pagecounter = 0;

		while ($pagecounter < $num_browse_pages)
		{
			$monthname=str_replace(" ","%20",$monthname);
			$pagecounter++;
			$archivedate=$_GET['archivedate'];
			$Archive_pages_Links .= "<a  href='index.php?x=browse&amp;archivedate=$archivedate&amp;monthname=$monthname&amp;pagenum=$pagecounter'>$pagecounter</a> ";
		}// whilte
	}// end if $_GET['archivedate']!=""
	else
	{
		$pagecounter = 0;

		while ($pagecounter < $num_browse_pages)
		{
			$pagecounter++;
			$Archive_pages_Links .= "<a  href='index.php?x=browse&amp;category=&amp;pagenum=$pagecounter'>$pagecounter</a> ";
		}// end while
	}// end else

	// produce Next page link
	if ($pagenum < $num_browse_pages)
	{
		$temp = $pagenum+1;
		if($cat_id != '')	$Archive_pages_Links .= "<a href='index.php?x=browse&amp;category=$cat_id&amp;pagenum=$temp'>$lang_next</a>";
		else if(isset($_GET['tag']) && eregi("[a-zA-Z 0-9_]+",$_GET['tag']))
		{
			$Archive_pages_Links .= "<a href='index.php?x=browse&amp;tag=".$_GET['tag']."&amp;pagenum=$temp'>$lang_next</a>";
		}
		else if(isset($_GET['archivedate']) && eregi("^[0-9]{4}-[0-9]{2}$", $_GET['archivedate']))
		{
			$monthname=str_replace(" ","%20",$monthname);
			$archivedate=$_GET['archivedate'];
			$Archive_pages_Links .= "<a  href='index.php?x=browse&amp;archivedate=$archivedate&amp;monthname=$monthname&amp;pagenum=$temp'>$lang_next</a>";
		}
		else	$Archive_pages_Links .= "<a href='index.php?x=browse&amp;pagenum=$temp'>$lang_next</a>";
	}

	// selected category name
	if($cat_id != "")
	{
		$query = mysql_query("SELECT name FROM ".$pixelpost_db_prefix."categories WHERE id='$cat_id'");
		$images_category_or_date = mysql_fetch_array($query);
		$images_category_or_date = pullout($images_category_or_date['name']);
	}
	else
	{
		if (isset($_GET['tag']))	$images_category_or_date = $_GET['tag'];
		else if (isset($_GET['archivedate']))	$images_category_or_date = $_GET['monthname'];
		else	$images_category_or_date = $lang_browse_all;
	}
} // end if ($_GET['x'] == "browse")

//------------- Make Archive browse menu with link to paged archive
// build browse menu
$browse_select = "";


    $temppagenum =1;
// do you use links with page number?
if ($maxpthumb>0)
{
	$browse_select = "<select name='browse' onChange='self.location.href=this.options[this.selectedIndex].value;'><option value=''>$lang_browse_select_category</option><option value='index.php?x=browse&amp;category=&amp;pagenum=$temppagenum'>$lang_browse_all (" .$pixelpost_all_photonumb .")</option>";
}
else
{
	$browse_select = "<select name='browse' onChange='self.location.href=this.options[this.selectedIndex].value;'><option value=''>$lang_browse_select_category</option><option value='index.php?x=browse&amp;category='>$lang_browse_all (" .$pixelpost_all_photonumb .")</option>";
}

$query = mysql_query("SELECT * FROM ".$pixelpost_db_prefix."categories ORDER BY name");

while(list($id,$name,$alt_name) = mysql_fetch_row($query))
{
	if($language_abr == $default_language_abr)	$name = pullout($name);
	else	$name = pullout($alt_name);

	$queryr = "SELECT count(*) AS count,datetime
	FROM {$pixelpost_db_prefix}catassoc AS t1
	INNER JOIN {$pixelpost_db_prefix}pixelpost t2 on t2.id = t1.image_id
	WHERE (t1.cat_id = '".$id."' AND datetime<='$datetime')
	GROUP BY t1.cat_id ";
	$count = mysql_query($queryr);
	$count = mysql_fetch_array($count);
	$count= $count['count'];
	// check if you are using this addon
	// u r using
	if ($maxpthumb>0)	$browse_select .= "<option value='index.php?x=browse&amp;category=$id&amp;pagenum=1'>$name (" .$count .")</option>";
	// use the original browse category menu
	else	$browse_select .= "<option value='index.php?x=browse&amp;category=$id'>$name (" .$count .")</option>";
} // end while

// finilize the tag
$browse_select .= "</select>";
$tpl = str_replace("<BROWSE_CATEGORIES_PAGED>",$browse_select,$tpl); //Browse menu for paged archive

/* TAGS support */
$tags_output = '<div id="tag_cloud"><div id="tag_cloud_header">'.$lang_tags.'</div>';
$tags_paged_output = $tags_output;

$default_language_abr = strtolower($PP_supp_lang[$cfgrow['langfile']][0]);

if($language_abr == $default_language_abr)	$queryr = "SELECT COUNT( *) AS max
		FROM {$pixelpost_db_prefix}tags
		WHERE alt_tag LIKE ''
		GROUP BY tag
		ORDER BY max DESC
		LIMIT 1";
else	$queryr = "SELECT COUNT( *) AS max
		FROM {$pixelpost_db_prefix}tags
		WHERE tag LIKE ''
		GROUP BY alt_tag
		ORDER BY max DESC
		LIMIT 1";

$tag_max = mysql_query($queryr);
$tag_max = mysql_fetch_row($tag_max);
$tag_max = $tag_max[0];

if ($language_abr == $default_language_abr)	$queryr = "SELECT ROUND(COUNT(*)/$tag_max,1) AS rank, tag, COUNT(*) as cnt
		FROM {$pixelpost_db_prefix}tags
		WHERE alt_tag LIKE ''
		GROUP BY tag
		ORDER BY tag";
else	$queryr = "SELECT ROUND(COUNT(*)/$tag_max,1) AS rank, alt_tag, COUNT(*) as cnt
		FROM {$pixelpost_db_prefix}tags
		WHERE tag LIKE ''
		GROUP BY alt_tag
		ORDER BY alt_tag";

$tags = mysql_query($queryr);

while(list($rank, $tag, $cnt)  = mysql_fetch_array($tags))
{
	$tags_output .= '<a href="index.php?x=browse&amp;tag='.$tag.'" class="tags'.$rank[0].$rank[2].'">'.$tag.'&nbsp;('.$cnt.')</a> ';
	$tags_paged_output .= '<a href="index.php?x=browse&amp;tag='.$tag.'&amp;pagenum=1" class="tags'.$rank[0].$rank[2].'">'.$tag.'&nbsp;('.$cnt.')</a> ';
}
$tags_output .= '</div>';
$tags_paged_output .= '</div>';

if ($language_abr == $default_language_abr)	$queryr = "SELECT tag
		FROM {$pixelpost_db_prefix}tags
		WHERE img_id = " . $image_id . "
		ORDER BY tag";
else	$queryr = "SELECT alt_tag
		FROM {$pixelpost_db_prefix}tags
		WHERE img_id = " . $image_id . "
		ORDER BY alt_tag";

$tags = mysql_query($queryr);

$tags_img = $lang_tags;
$tags_paged_img = $tags_img;

while(list($tag)  = mysql_fetch_array($tags))
{
	$tags_img .= '<a href="index.php?x=browse&amp;tag='.$tag.'">'.$tag.'</a> ';
	$tags_paged_img .= '<a href="index.php?x=browse&amp;tag='.$tag.'&amp;pagenum=1">'.$tag.'</a> ';
}
$tags_img = trim($tags_img);
$tags_paged_img = trim($tags_paged_img);

$tpl = str_replace("<TAG_LINKS_AS_LIST>",$tags_output,$tpl); //thumbnails in this page
$tpl = str_replace("<TAG_LINKS_AS_LIST_PAGED>",$tags_paged_output,$tpl); //thumbnails in this page
$tpl = str_replace("<TAG_IMG_LIST>",$tags_img,$tpl); // list of tags for showed image
$tpl = str_replace("<TAG_IMG_LIST_PAGED>",$tags_paged_img,$tpl); // list of tags for showed image

//----------------- Build the additional new tages
//-- If you use paged archive
if (isset($pagenum))
{
	$tpl = str_replace("<THUMBNAILS_WHOLE_PAGED>",$thumb_output,$tpl); //thumbnails in this page
	$tpl = str_replace("<THUMBNAILS_PAGES_LINKS>",$Archive_pages_Links,$tpl); // link to the pages of thumbnail in the selected category
	$tpl = str_replace("<ARCHIVE_PAGES_NUM>",$pagenum,$tpl);// page number you are viewing
	$tpl = str_replace("<CATEGORY_OR_DATE_NAME_PAGED_ARCHIVE>",$images_category_or_date,$tpl); // Name of the category or Month you select
} //end if
//-- If you do not use page archive
else
{
	$tpl = str_replace("<THUMBNAILS_PAGES_LINKS>","",$tpl); // this does not use paged archive so there should be no links
	$tpl = str_replace("<ARCHIVE_PAGES_NUM>","",$tpl); // page number you are viewing (it's empty for this case)

	if(!isset($thumb_output))	$thumb_output = "";

	$tpl = str_replace("<THUMBNAILS_WHOLE_PAGED>",$thumb_output,$tpl); // the original thumb row in the archive

	if(!isset($images_category_or_date))	$images_category_or_date = "";

	$tpl = str_replace("<CATEGORY_OR_DATE_NAME_PAGED_ARCHIVE>",$images_category_or_date,$tpl); // Name of the category or Month you select
}// end else

$tpl = str_replace("<LINK_TO_PAGED_ARCHIVE>",'<a href="index.php?x=browse&amp;pagenum=1">Archive</a>',$tpl);

?>