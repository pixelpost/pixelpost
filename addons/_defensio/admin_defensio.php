<?php
/*
Requires Pixelpost version 1.7 or newer
Defensio ADMIN-side ADDON-Version 1.2.1

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

//*******************************************************************************************************************
//   GENERAL INFORMATION DISPLAYED IN ADDON LIST
//*******************************************************************************************************************
$addon_name = "Pixelpost Defensio comment filter (Admin Side)";
$addon_version = '1.2.1';
$result = mysql_query("SELECT `status` FROM `{$pixelpost_db_prefix}addons` WHERE `addon_name` LIKE '%akismet%' and `type`='front'") or die(mysql_error());
$akismet = mysql_fetch_array($result);
if ($akismet['status'] == 'on')
{
    $akismet_warning = "<br /><br /><font color=\"red\"><strong>Defensio is not designed to work with Akismet. It is suggested to disable Akismet if you want to use Defensio.</strong></font>";
    $GLOBALS['defensio_result_message'] = '<div class="jcaption confirm">Defensio is not designed to work with Akismet. It is suggested to disable Akismet if you want to use Defensio.</div>';
} else
{
    $akismet_warning = null;
}
$addon_description = "<a name='defensio'></a>Pixelpost Add-On to filter spam using Defensio (<a href='http://www.defensio.com' target='_blank'>Info</a>). This is the admin side of the addon, for displaying comments and changing options." . $akismet_warning . "<br /><br /><img src=\"../addons/_defensio/images/poweredbyd.png\">";

//*******************************************************************************************************************
//   WORKSPACE STUFF
//*******************************************************************************************************************
add_admin_functions("get_defensio_pages", "comments", "comments", "Defensio");
add_admin_functions("defensio_settings", "additional_spam_measures", "", "");
add_admin_functions('get_defensio_links', 'show_commentbuttons_top');
add_admin_functions('get_defensio_links2', 'show_commentbuttons_bottom');
add_admin_functions('get_defensio_pages', 'pages_commentbuttons');
add_admin_functions('defensio_commentlist', 'single_comment_list');
add_admin_functions('get_defensio_style', 'admin_html_head');

//*******************************************************************************************************************
//   CHECK DATABASE AND CREATE NECESSARY TABLES/FIELDS
//*******************************************************************************************************************
// Update comment table
if (!is_field_exists('spaminess', 'comments'))
{
    // create field
    update_comments_table_for_defensio();
}
// Create options table
if (!is_field_exists('server', 'defensio'))
{
    create_options_table_for_defensio();
}
// Update options table
if (!is_field_exists('defensio_stats', 'defensio'))
{
    update_options_table_for_defensio1_1();
}
// Suport for the SPAMlog addon
$query = "SELECT `start_datetime` FROM `{$pixelpost_db_prefix}spamlog` LIMIT 1";
if (mysql_query($query))
{
    //SPAMLOG table exists, check for field
    $query = "SELECT `defensio_addon` FROM `{$pixelpost_db_prefix}spamlog` LIMIT 1";
    if (!mysql_query($query))
        update_spamlog_table_for_defensio();
}

$result = mysql_query("SELECT * FROM `{$pixelpost_db_prefix}defensio` LIMIT 1") or die(mysql_error());
$defensio_conf = mysql_fetch_array($result);

//*******************************************************************************************************************
//   GLOBAL DECLARATION
//*******************************************************************************************************************
$GLOBALS['defensio_conf'] = $defensio_conf;

// widget support
$defensio_widget = defensio_counter($defensio_conf);
$tpl = ereg_replace("<DEFENSIO_WIDGET>", $defensio_widget, $tpl);

//*******************************************************************************************************************
//   MARK COMMENTS AS SPAM OR HAM (SELECTOR BASED ON FORM SUBMIT)
//*******************************************************************************************************************
//Check whether ADMIN has submitted comment to mark as spam for Defensio
if (isset($_GET['view']) && $_GET['view'] == 'comments' && $_GET['action'] == 'defensiospam')
{
    defensio_submit_spam_comment($defensio_conf);
}

//Check whether ADMIN has submitted comment to mark as ham for Defensio
if (isset($_GET['view']) && $_GET['view'] == 'comments' && $_GET['action'] == 'defensionotspam')
{
    defensio_submit_nonspam_comment($defensio_conf);
}
//Check whether ADMIN has submitted a comment to resend to Defensio
if (isset($_GET['view']) && $_GET['view'] == 'comments' && $_GET['action'] == 'defensiorecheck')
{
    // build $comment array used for testing.
    $comment = array();
    $comment['owner-url'] = $defensio_conf['blog'];
    $comment_id = (int)$_GET['cid'];
    $comment['id'] = $comment_id;
    // get the comment info in question
    $query = "SELECT * FROM `{$pixelpost_db_prefix}comments` WHERE `id` = '" . $comment_id . "'";
    $result = mysql_query($query) or die(mysql_error());
    while ($row = mysql_fetch_array($result))
    {
        $comment['user-ip'] = $row['ip'];
        $comment['comment_post_ID'] = $row['parent_id'];
        $comment['permalink'] = $defensio_conf['blog'] . "index.php?showimage=" . $comment['comment_post_ID'];
        $comment['comment-type'] = 'comment';
        $comment['comment-author'] = $row['name'];
        $comment['comment-content'] = $row['message'];
        $comment['comment-author-email'] = $row['email'];
        $comment['comment-author-url'] = $row['url'];
    }
    // get the date/time of the original posting
    $query = "SELECT `datetime` FROM `{$pixelpost_db_prefix}pixelpost` WHERE `id` = '" . $comment['comment_post_ID'] . "'";
    $result = mysql_query($query) or die(mysql_error());
    while ($row = mysql_fetch_array($result))
    {
        $comment['article-date'] = gmdate("Y/m/d", $row[0]);
    }
    //$comment['referrer'] = $_SERVER['HTTP_REFERER'];
    defensio_check_comment($defensio_conf, $comment);
}

//Check whether ADMIN has submitted an empty quarantine request
if (isset($_GET['view']) && $_GET['view'] == 'comments' && $_GET['action'] == 'emptyquarantine')
{
    $query = "DELETE FROM {$pixelpost_db_prefix}comments WHERE publish='dfn'";
    $result = mysql_query($query);
    $GLOBALS['defensio_result_message'] = '<div class="jcaption confirm">The Defensio Quarantine has been emptied.</div>';
}

function create_options_table_for_defensio()
{
    // create the options table for defensio
    global $cfgrow, $pixelpost_db_prefix;
    $query = "CREATE TABLE `{$pixelpost_db_prefix}defensio` (
			`server` VARCHAR( 100 ) NULL DEFAULT 'api.defensio.com',
			`path` VARCHAR( 100 ) NULL DEFAULT 'blog',
			`api-version` VARCHAR( 100 ) NULL DEFAULT '1.1',
			`format` VARCHAR( 100 ) NULL DEFAULT 'yaml',
			`blog` VARCHAR( 100 ) NULL DEFAULT '" . $cfgrow['siteurl'] . "',
			`post-timeout` INTEGER NULL DEFAULT 10,
			`threshold` FLOAT NULL DEFAULT 0.8,
			`remove_older_than` INTEGER NULL DEFAULT 0,
			`remove_older_than_days` INTEGER NULL DEFAULT 15,
			`key` VARCHAR( 100 ) NULL
   )";
    $result = mysql_query($query) or die(mysql_error());
    $query = "INSERT INTO `{$pixelpost_db_prefix}defensio` (
						`server` ,`path` ,`api-version` ,`format` ,`blog` ,`post-timeout` ,`threshold` ,`remove_older_than` ,
						`remove_older_than_days` ,`key`) VALUES (
						'api.defensio.com', 'blog', '1.1', 'yaml', '" . $cfgrow['siteurl'] . "', '10', '0.8', '0', '15', NULL);";
    $result = mysql_query($query) or die(mysql_error());
}

function update_options_table_for_defensio1_1()
{
    // update options table for defensio 1.1
    global $cfgrow, $pixelpost_db_prefix;
    $query = "ALTER TABLE `{$pixelpost_db_prefix}defensio` 
			ADD `defensio_stats` TEXT,
			ADD `defensio_stats_updated_at` VARCHAR( 20 ) NULL DEFAULT '1195732629',
			ADD `defensio_widget_image` VARCHAR( 20 ) NULL DEFAULT 'dark',
			ADD `defensio_widget_align` VARCHAR( 20 ) NULL DEFAULT 'left'";
    $result = mysql_query($query) or die(mysql_error());
}

function update_comments_table_for_defensio()
{
    // add two fields to the comment table
    global $cfgrow, $pixelpost_db_prefix;
    $query = "ALTER TABLE `{$pixelpost_db_prefix}comments` ADD `spaminess` FLOAT NULL ,ADD `signature` VARCHAR( 55 ) NULL";
    $result = mysql_query($query) or die(mysql_error());
}

function update_spamlog_table_for_defensio()
{
    // support for the spamlogtable
    global $cfgrow, $pixelpost_db_prefix;
    $query = "ALTER TABLE `{$pixelpost_db_prefix}spamlog` ADD `defensio_addon` INT NOT NULL DEFAULT '0'";
    $result = mysql_query($query) or die(mysql_error());
}

//*******************************************************************************************************************
//   BUTTONS FOR THE COMMENT SECTION IN ADMIN
//*******************************************************************************************************************
function get_defensio_links()
{
    global $pixelpost_db_prefix, $moderate_where, $cfgrow;
    $defensio_conf = $GLOBALS['defensio_conf'];
    if (isset($_GET['commentsview']) && $_GET['commentsview'] == 'defensio')
    {
        echo "<a href=\"http://defensio.com\"><img style=\"width: 160px; height: 25px;float:right;margin-top:-35px;border:0px;\" src=\"../addons/_defensio/images/poweredbyd.png\"></a>";
        echo "<span style=\"clear:both;\" />&nbsp;<span />";
        echo "<input class='cmnt-buttons' type='submit' name='defensionotspam' value='Report as NOT Spam To Defensio' onclick=\"
      			document.getElementById('managecomments').action='" . $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'] . "&amp;action=defensionotspam'
    			return confirm('Report all selected comments as Not Spam to Defensio?');\" />";
        echo "&nbsp;";
    }
    if (isset($_GET['show']) || !isset($_GET['commentsview']))
    {
        echo "  <input class='cmnt-buttons' type='submit' name='defensiospam' value='Report as Spam To Defensio' onclick=\"
      			document.getElementById('managecomments').action='" . $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'] . "&amp;action=defensiospam'
    			return confirm('Report all selected comments as Spam to Defensio?');\" />";
    }
    if (isset($_GET['commentsview']) && $_GET['commentsview'] == 'defensio')
    {
        // get obvious spam
        $result = mysql_query("select count(*) as count from `" . $pixelpost_db_prefix . "comments` WHERE `publish`='dfn' AND `spaminess` < '" . $defensio_conf['threshold'] . "'") or die(mysql_error());
        $defensio_count_smaller_threshold = mysql_fetch_array($result);
        $result = mysql_query("select count(*) as count from `" . $pixelpost_db_prefix . "comments` WHERE `publish`='dfn' AND `spaminess` >= '" . $defensio_conf['threshold'] . "'") or die(mysql_error());
        $defensio_count_larger_threshold = mysql_fetch_array($result);
        echo "<br /><br />";
        echo "<input id=\"defensio_hide_very_spam\" name=\"defensio_hide_very_spam\" value=\"1\"" . $_SESSION['defensio_hide_very_spam'] . " onclick=\"javascript:this.form.submit();\" type=\"checkbox\"> Hide obvious spam (" . $defensio_count_larger_threshold['count'] . ")";
        echo "&nbsp;&nbsp;<input class='cmnt-buttons' type='submit' name='emptyquarantine' value='Empty Quarantine' onclick=\"
		    document.getElementById('managecomments').action='" . $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'] . "&amp;action=emptyquarantine'
		    return confirm('Are you sure you want to empty the Defensio Quarantine?');\" />";
        echo "<input type=\"hidden\" value=\"dummy\" name=\"dummy\">";
        if ((isset($GLOBALS['defensio_result_message'])) && ($GLOBALS['defensio_result_message'] != ""))
        {
            echo "<br /><br />" . $GLOBALS['defensio_result_message'];
        }
        if ($defensio_count_smaller_threshold['count'] < 1)
        {
            echo "<div class=\"content\">Your quarantine is empty. ";
            if ($defensio_count_larger_threshold['count'] > 0)
            {
                echo "However you are hiding " . $defensio_count_larger_threshold['count'] . " obvious spam messages.";
            }
            echo "</div>";
        }
    }
}

function get_defensio_links2()
{
    global $pixelpost_db_prefix, $moderate_where, $cfgrow;
    $defensio_conf = $GLOBALS['defensio_conf'];
    // Echo the links
    if (isset($_GET['commentsview']) && $_GET['commentsview'] == 'defensio')
    {
        echo defensio_show_stats($defensio_conf) . "<br />";
        echo "	<input class='cmnt-buttons' type='submit' name='defensionotspam' value='Report as NOT Spam To Defensio' onclick=\"
      		document.getElementById('managecomments').action='" . $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'] . "&amp;action=defensionotspam'
      		return confirm('Report all selected comments as Not Spam to Defensio?');\" />";
        echo "&nbsp;";
    }
    if (isset($_GET['show']) || !isset($_GET['commentsview']))
    {
        echo " <input class='cmnt-buttons' type='submit' name='defensiospam' value='Report as Spam To Defensio' onclick=\"
      		document.getElementById('managecomments').action='" . $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'] . "&amp;action=defensiospam'
      		return confirm('Report all selected comments as Spam to Defensio?');\" />";
    }
    // Delete comments older than X days and marked as SPAM by Defensio
    if ($defensio_conf['remove_older_than'] == 1)
    {
        $query = "DELETE FROM {$pixelpost_db_prefix}comments WHERE (TO_DAYS(CURDATE()) - TO_DAYS(`datetime`)) > " . $defensio_conf['remove_older_than_days'] . " AND publish='dfn'";
        $result = mysql_query($query);
    }
}

//*******************************************************************************************************************
//   CHANGE DEFAULT SELECTION PARAMATERS (OVERRIDE THE ONES IN THE PP FUNCTIONS)
//*******************************************************************************************************************
function get_defensio_pages()
{
    global $moderate_where, $moderate_where2, $order_by, $pixelpost_db_prefix;
    global $comment_row_class;
    if (!isset($_SESSION['defensio_hide_very_spam']))
    {
        $_SESSION['defensio_hide_very_spam'] = "checked";
    }
    if (isset($_POST['defensio_hide_very_spam']) && $_POST['defensio_hide_very_spam'] == 1)
    {
        $_SESSION['defensio_hide_very_spam'] = "checked";
    } elseif (isset($_POST['dummy']))
    {
        $_SESSION['defensio_hide_very_spam'] = "";
    }
    if (isset($_GET['commentsview']) && $_GET['commentsview'] == 'defensio')
    {
        $defensio_conf = $GLOBALS['defensio_conf'];
        $moderate_where = " and publish='dfn' AND `spaminess` < '" . $defensio_conf['threshold'] . "' ";
        $moderate_where2 = " WHERE publish='dfn' AND `spaminess` < '" . $defensio_conf['threshold'] . "' ";
        $order_by = " ORDER BY spaminess ASC ";
        if ($_SESSION['defensio_hide_very_spam'] != "checked")
        {
            $moderate_where = " and publish='dfn' ";
            $moderate_where2 = " WHERE publish='dfn' ";
        }
    }
}

function defensio_commentlist()
{
    global $comment_row_class, $id, $pixelpost_db_prefix, $comment_meta_information, $admin_lang_cmnt_commenter, $datetime, $admin_lang_cmnt_ip, $ip;
    if (isset($_GET['commentsview']) && $_GET['commentsview'] == 'defensio')
    {
        $query = "SELECT `spaminess` FROM {$pixelpost_db_prefix}comments WHERE `id`='" . $id . "'";
        $result = mysql_query($query) or die(mysql_error());
        while ($row = mysql_fetch_array($result))
        {
            $spaminess = $row[0];
        }
        $comment_row_class = "defensio_" . defensio_class_for_spaminess($spaminess);
        if ($spaminess > 0)
        {
            $spaminess_show = $spaminess * 100 . "%";
        } else
        {
            // always clean the url
            $url_param = explode('&action=defensiorecheck', $_SERVER['QUERY_STRING']);
            $spaminess_show = "<span style='color:red;font-weight:bold;'>COMMENT NOT CHECKED WITH DEFENSIO <a href='" . $_SERVER['PHP_SELF'] . "?" . $url_param[0] . "&amp;action=defensiorecheck&amp;cid=" . $id . "'>CLICK HERE TO TRY AGAIN</a></span>";
        }
        // overide the comment meta information
        $comment_meta_information = "<i>$admin_lang_cmnt_commenter $datetime. $admin_lang_cmnt_ip  $ip. Spaminess: $spaminess_show.<br /></i>";
    }
}

//*******************************************************************************************************************
//   OPTIONS (GET&SAVE)
//*******************************************************************************************************************
function defensio_settings()
{
    global $pixelpost_db_prefix, $cfgrow, $defensio_conf;
    // get the settings
    $result = mysql_query("SELECT * FROM `{$pixelpost_db_prefix}defensio` LIMIT 1") or die(mysql_error());
    $defensio_conf = mysql_fetch_array($result);
    $v = array();
    $v['key'] = $defensio_conf['key'];
    if (defensio_verify_key($defensio_conf, $v['key']))
        $v['valid'] = true;
    else
        $v['valid'] = false;
    $v['threshold'] = $defensio_conf['threshold'] * 100;
    $v['remove_older_than'] = $defensio_conf['remove_older_than'];
    $v['remove_older_than_days'] = $defensio_conf['remove_older_than_days'];
    $v['defensio_widget_image'] = $defensio_conf['defensio_widget_image'];
    $v['defensio_widget_align'] = $defensio_conf['defensio_widget_align'];

    if (($_GET['optionsview'] == 'antispam') && ($_GET['optaction'] == 'updateantispam'))
    {
        $older_than_error = '';
        $minimum_days = 15;
        if (isset($_POST['defensio_remove_older_than_days']) and ((int)$_POST['defensio_remove_older_than_days'] < $minimum_days))
        {
            $older_than_error = 'Days has to be a numeric value greater than ' . $minimum_days;
            $v['remove_older_than_days'] = $minimum_days;
        } else
        {
            $v['remove_older_than_days'] = (int)$_POST['defensio_remove_older_than_days'];
        }
        $v['key'] = mysql_real_escape_string($_POST['new_key']);
        if (defensio_verify_key($defensio_conf, $v['key']))
            $v['valid'] = true;
        else
            $v['valid'] = false;
        $v['threshold'] = ((int)$_POST['new_threshold']);
        $v['defensio_widget_image'] = $_POST['defensio_widget_image'];
        $v['defensio_widget_align'] = $_POST['defensio_widget_align'];
        $v['remove_older_than_error'] = $older_than_error;
        if ($_POST['defensio_remove_older_than'] == 'on')
        {
            $v['remove_older_than'] = 1;
        } else
        {
            $v['remove_older_than'] = 0;
        }
        $threshold_db = $v['threshold'] / 100;
        $query = "UPDATE {$pixelpost_db_prefix}defensio SET 
			`threshold` = '" . $threshold_db . "', `remove_older_than` = '" . $v['remove_older_than'] . "', `remove_older_than_days` = '" . $v['remove_older_than_days'] . "',`key` = '" . $v['key'] . "',`defensio_widget_image` = '" . $v['defensio_widget_image'] . "',`defensio_widget_align` = '" . $v['defensio_widget_align'] . "'";
        $result = mysql_query($query) or die(mysql_error());
    }
    echo "<div class='jcaption'>DEFENSIO settings</div>
		<div class='content'>
		<a href=\"http://defensio.com\">Defensio</a>'s blog spam web service aggressively and intelligently prevents comment and trackback spam from hitting your blog. You should quickly notice a dramatic reduction in the amount of spam you have to worry about.
  		<p>When the filter does rarely make a mistake (say, the odd spam message gets through or a rare good comment is marked as spam) we've made it a joy to sort through your comments and set things straight. Not only will the filter learn and improve over time, but it will do so in a personalized way!</p>
  		<p>In order to use our service, you will need a <strong>free</strong> Defensio API key.  Get yours now at <a href=\"http://defensio.com/signup\">Defensio.com</a>.</p>
  		<h3>Defensio API Key</h3>";
    echo defensio_render_key_validity($v);
    echo "<input type=\"text\" value=\"" . $v['key'] . "\" name=\"new_key\" size=\"38\" /><br />";
    echo defensio_render_spaminess_threshold_option($v['threshold']);
    echo "<h3><label>Automatic removal of spam</label></h3>";
    echo defensio_render_delete_older_than_option($v);
    echo defensio_render_widget_image_option($v);
    echo defensio_render_widget_align_option($v);
    echo "</div>";
}

//*******************************************************************************************************************
//   SUPORTING FUNCTIONS
//*******************************************************************************************************************
function defensio_class_for_spaminess($spaminess)
{
    if ($spaminess < 0)
        return 'not_checked';
    elseif ($spaminess <= 0.55)
        return 'spam0';
    elseif ($spaminess <= 0.65)
        return 'spam1';
    elseif ($spaminess <= 0.70)
        return 'spam2';
    elseif ($spaminess <= 0.75)
        return 'spam3';
    elseif ($spaminess <= 0.80)
        return 'spam4';
    elseif ($spaminess <= 0.85)
        return 'spam5';
    elseif ($spaminess <= 0.90)
        return 'spam6';
    elseif ($spaminess <= 0.95)
        return 'spam7';
    elseif ($spaminess < 1)
        return 'spam8';
    else
        return 'spam9';
}

function get_defensio_style()
{
    // please this information in the <HEAD> section
    global $pixelpost_db_prefix;
    $defensio_conf = $GLOBALS['defensio_conf'];
    $query = "select count(*) as count from " . $pixelpost_db_prefix . "comments  WHERE publish='dfn' ";
    $result = mysql_query($query) or die(mysql_error());
    $count = mysql_fetch_array($result);
    echo '<style  type="text/css">
  .defensio_spam0 {background-color: #ffffff;border-bottom: 1px solid #ccc;}
  .defensio_spam1 {background-color: #faf0e1;}
  .defensio_spam2 {background-color: #faebd4;}
  .defensio_spam3 {background-color: #fae6c8;}
  .defensio_spam4 {background-color: #fae1bb;}
  .defensio_spam5 {background-color: #fadcaf;}
  .defensio_spam6 {background-color: #fad7a2;}
  .defensio_spam7 {background-color: #fad296;}
  .defensio_spam8 {background-color: #facd89;}
  .defensio_spam9 {background-color: #fac87d;}
  .defensio_not_checked {background-color: #a8c6ff;}
  #defensio_stats {list-style:disc;margin:0px;padding:0px;}
	#defensio_stats li {padding:0px;margin:0px 0px 5px 25px;border-bottom:0px;}
	</style>
  <script type="text/javascript" src="../addons/_defensio/libraries/domFunction.js"></script>
	<script type="text/javascript" charset="utf-8">
	var ElementReady;
	var foobar = new domFunction(function()
	{	
	// Script to make sure the function "getElementById()" will work on ALL browsers
	// Copied from: http://webbugtrack.blogspot.com/2007/08/bug-152-getelementbyid-returns.html
	if(ElementReady != true){
		//use browser sniffing to determine if IE or Opera (ugly, but required)
		var isOpera, isIE = false;
		if(typeof(window.opera) != \'undefined\'){isOpera = true;}
		if(!isOpera && navigator.userAgent.indexOf(\'Internet Explorer\')){isIE = true};
		//fix both IE and Opera (adjust when they implement this method properly)
		if(isOpera || isIE){
		  document.nativeGetElementById = document.getElementById;
		  //redefine it!
		  document.getElementById = function(id){
		    var elem = document.nativeGetElementById(id);
		    if(elem){
		      //verify it is a valid match!
		      if(elem.id == id){
		        //valid match!
		        return elem;
		      } else {
		        //not a valid match!
		        //start at one, because we know the first match, is wrong!
		        for(var i=1;i<document.all[id].length;i++){
		          if(document.all[id][i].id == id){
		            return document.all[id][i];
		          }
		        }
		      }
		    }
		    return null;
		  };
		}
		ElementReady = true;
	}
		// The actual code the makes it work:
		var defensio = document.getElementById(\'commentsDefensio\');
		var defensio_total = \'' . $count['count'] . '\';
		if(defensio){
			defensio.innerHTML = defensio.innerHTML + \' (\' + defensio_total + \')\';
		}
	}); // End Dom Ready
	</script>
	';
}

function defensio_render_spaminess_threshold_option($threshold)
{
    $threshold_values = array(50, 60, 70, 80, 90, 95);
    echo "<h3><label for=\"new_threshold\">Obvious Spam Threshold</label></h3>
		<p>Hide comments with a spaminess higher than&nbsp;
  		<select name=\"new_threshold\" >";
    foreach ($threshold_values as $val)
    {
        if ($val == $threshold)
        {
            echo "<option selected=\"1\" >" . $val . "</option>";
        } else
        {
            echo "<option>" . $val . "</option>";
        }
    }
    echo "</select></p>
	<p>Any comments calculated to be above or equal to this \"spaminess\" threshold will be hidden from view in your quarantine.</p>";
}

function defensio_render_delete_older_than_option($v)
{
    echo "<p>";
    if ($v['remove_older_than_error'])
    {
        echo "<div style=\"color:red\">";
        echo $v['remove_older_than_error'];
        echo "</div>";
    }
    echo "<input type=\"checkbox\" name=\"defensio_remove_older_than\"";
    if ($v['remove_older_than'] == 1)
    {
        echo ' checked ';
    }
    echo "size=\"3\" maxlength=\"3\"/>   
		Automatically delete spam for posts older than <input type=\"text\" name=\"defensio_remove_older_than_days\" value=\"" . $v['remove_older_than_days'] . "\" size=\"3\" maxlength=\"3\"/> days.</p>";
}

function defensio_render_widget_image_option($v)
{
    echo "<h3><label for=\"new_threshold\">Frontpage Image</label></h3>
		<p>Select the frontpage image &nbsp;
  		<select name=\"defensio_widget_image\" >";
    if ($v['defensio_widget_image'] == 'none')
    {
        echo "<option value=\"none\" selected=\"yes\">none</option>";
    } else
    {
        echo "<option value=\"none\">none</option>";
    }
    if ($v['defensio_widget_image'] == 'light')
    {
        echo "<option value=\"light\" selected=\"yes\">light</option>";
    } else
    {
        echo "<option value=\"light\">light</option>";
    }
    if ($v['defensio_widget_image'] == 'dark')
    {
        echo "<option value=\"dark\" selected=\"yes\">dark</option>";
    } else
    {
        echo "<option value=\"dark\" >dark</option>";
    }
    echo "</select>";
}

function defensio_render_widget_align_option($v)
{
    echo "<h3><label for=\"new_threshold\">Frontpage Image Alignment</label></h3>
		<p>Set the frontpage image alignment &nbsp;
  		<select name=\"defensio_widget_align\" >";
    if ($v['defensio_widget_align'] == 'left')
    {
        echo "<option value=\"left\" selected=\"yes\">left</option>";
    } else
    {
        echo "<option value=\"left\">left</option>";
    }
    if ($v['defensio_widget_align'] == 'right')
    {
        echo "<option value=\"right\" selected=\"yes\">right</option>";
    } else
    {
        echo "<option value=\"right\">right</option>";
    }
    if ($v['defensio_widget_align'] == 'center')
    {
        echo "<option value=\"center\" selected=\"yes\">center</option>";
    } else
    {
        echo "<option value=\"center\" >center</option>";
    }
    echo "</select>";
}

function defensio_render_key_validity($v)
{
    if ($v['valid'])
    {
        echo "<p style=\"padding: .5em; background-color: #2d2; color: #fff;font-weight: bold;width:250px;\">This key is valid.</p>";
    } else
    {
        echo "<p style=\"padding: .5em; background-color: #d22; color: #fff; font-weight: bold;width:250px;\">The key you entered is invalid.</p>";
    }
}

function defensio_submit_nonspam_comment($defensio_conf)
{
    //Function to report the comment is not spam
    //Loop thru the $_POST['moderate_commnts_boxes'] and keep marking each comment as spam to Defensio
    global $pixelpost_db_prefix;
    if (is_array($_POST['moderate_commnts_boxes']))
    {
        $number_of_images = count($_POST['moderate_commnts_boxes']);
        $counter = 0;
        $counter_no_signature = 0;
        $signatures = null;
        foreach ($_POST['moderate_commnts_boxes'] as $cid)
        {
            $query = "SELECT `signature` FROM {$pixelpost_db_prefix}comments WHERE id = '$cid'";
            $result = mysql_query($query);
            if (mysql_num_rows($result))
            {
                $row = mysql_fetch_assoc($result);
                if ($row['signature'] != null)
                {
                    $counter = $counter + 1;
                    if ($counter != $number_of_images)
                    {
                        $signatures .= $row['signature'] . ",";
                    } else
                    {
                        $signatures .= $row['signature'];
                    }
                    //Since comment is not spam, let's mark it to publish
                    $query = "UPDATE {$pixelpost_db_prefix}comments SET publish = 'yes' WHERE id = '$cid'";
                    mysql_query($query);
                } else
                {
                    // no signature was found
                    $counter_no_signature = $counter_no_signature + 1;
                }
            }
        }
        // construct the error message
        $GLOBALS['defensio_result_message'] = '<div class="jcaption confirm">';
        if ($signatures != null)
        {
            // we obviously have some signatures so submit them
            $r = defensio_submit_ham($defensio_conf, $signatures);
            $GLOBALS['defensio_result_message'] .= 'Reported ' . $counter . ' comments as HAM to Defensio.';
            if ($counter_no_signature > 0)
            {
                $GLOBALS['defensio_result_message'] .= 'However, ' . $counter_no_signature . 'comments could not be reported.';
            }
        } else
        {
            $GLOBALS['defensio_result_message'] .= 'Could not report ' . $counter_no_signature . ' comments as HAM to Defensio.';
        }
        $GLOBALS['defensio_result_message'] .= '</div>';
    } else
    {
        $GLOBALS['defensio_result_message'] = '<div class="jcaption confirm">You must select at least one comment.</div>';
    }
}

function defensio_submit_spam_comment($defensio_conf)
{
    //Function to report the comment as spam which Defensio marked as not spam
    //Loop thru the $_POST['moderate_commnts_boxes'] and keep marking each comment as spam to Defensio
    global $pixelpost_db_prefix;
    if (is_array($_POST['moderate_commnts_boxes']))
    {
        $number_of_images = count($_POST['moderate_commnts_boxes']);
        $counter = 0;
        $counter_no_signature = 0;
        $signatures = null;
        foreach ($_POST['moderate_commnts_boxes'] as $cid)
        {
            $query = "SELECT `signature` FROM {$pixelpost_db_prefix}comments WHERE id = '$cid'";
            $result = mysql_query($query) or die(mysql_error());
            if (mysql_num_rows($result))
            {
                $row = mysql_fetch_assoc($result);
                if ($row['signature'] != null)
                {
                    $counter = $counter + 1;
                    if ($counter != $number_of_images)
                    {
                        $signatures .= $row['signature'] . ",";
                    } else
                    {
                        $signatures .= $row['signature'];
                    }
                    //Since comment is spam, let's mark it as marked by defensio
                    $query = "UPDATE {$pixelpost_db_prefix}comments SET publish = 'dfn' WHERE id = '$cid'";
                    mysql_query($query);
                } else
                {
                    // no signature was found
                    $counter_no_signature = $counter_no_signature + 1;
                }
            }
        }
        // construct the error message
        $GLOBALS['defensio_result_message'] = '<div class="jcaption confirm">';
        if ($signatures != null)
        {
            // we obviously have some signatures so submit them
            $r = defensio_submit_spam($defensio_conf, $signatures);
            $GLOBALS['defensio_result_message'] .= 'Reported ' . $counter . ' comments as SPAM to Defensio.';
            if ($counter_no_signature > 0)
            {
                $GLOBALS['defensio_result_message'] .= 'However, ' . $counter_no_signature . 'comments could not be reported.';
            }
        } else
        {
            $GLOBALS['defensio_result_message'] .= 'Could not report ' . $counter_no_signature . ' comments as SPAM to Defensio.';
        }
        $GLOBALS['defensio_result_message'] .= '</div>';
    } else
    {
        $GLOBALS['defensio_result_message'] = '<div class="jcaption confirm">You must select at least one comment.</div>';
    }
}

function defensio_post($action, $defensio_conf, $args = null)
{
    // Use snoopy to post
    require_once ('libraries/Snoopy.class.php');
    $snoopy = new Snoopy();
    $snoopy->read_timeout = $defensio_conf['post_timeout'];
    // Supress the possible fsock warning
    @$snoopy->submit(defensio_url_for($action, $defensio_conf, $defensio_conf['key']), $args, array());
    // Defensio will return 200 nomally, 401 on authentication failure, anything else is unexpected behaivour
    if ($snoopy->status == 200 or $snoopy->status == 401)
        return $snoopy->results;
    else
        return false;
}

// Returns the URL for possible actions
function defensio_url_for($action, $defensio_conf, $key = null)
{
    if ($key == null)
        return null;
    else
    {
        if ($action == 'validate-key')
            return 'http://' . $defensio_conf['server'] . '/' . $defensio_conf['path'] . '/' . $defensio_conf['api-version'] . '/' . $action . '/' . $key . '.' . $defensio_conf['format'];

        if ($action == 'audit-comment')
            return 'http://' . $defensio_conf['server'] . '/' . $defensio_conf['path'] . '/' . $defensio_conf['api-version'] . '/' . $action . '/' . $key . '.' . $defensio_conf['format'];

        if ($action == 'report-false-negatives')
            return 'http://' . $defensio_conf['server'] . '/' . $defensio_conf['path'] . '/' . $defensio_conf['api-version'] . '/' . $action . '/' . $key . '.' . $defensio_conf['format'];

        if ($action == 'report-false-positives')
            return 'http://' . $defensio_conf['server'] . '/' . $defensio_conf['path'] . '/' . $defensio_conf['api-version'] . '/' . $action . '/' . $key . '.' . $defensio_conf['format'];

        if ($action == 'get-stats')
            return 'http://' . $defensio_conf['server'] . '/' . $defensio_conf['path'] . '/' . $defensio_conf['api-version'] . '/' . $action . '/' . $key . '.' . $defensio_conf['format'];

        if ($action == 'reset-stats')
            return 'http://' . $defensio_conf['server'] . '/' . $defensio_conf['path'] . '/' . $defensio_conf['api-version'] . '/' . $action . '/' . $key . '.' . $defensio_conf['format'];

        if ($action == 'announce-article')
            return 'http://' . $defensio_conf['server'] . '/' . $defensio_conf['path'] . '/' . $defensio_conf['api-version'] . '/' . $action . '/' . $key . '.' . $defensio_conf['format'];
    }
}


function defensio_verify_key($defensio_conf, $key)
{
    require_once ('libraries/spyc.php');
    $result = false;
    $params = array('key' => $key, 'owner-url' => $defensio_conf['blog']);
    if ($r = defensio_post('validate-key', $defensio_conf, $params))
    {
        // Parse result
        $ar = Spyc::YAMLLoad($r);
        // Spyc will return an empty array in case the result is not a well formed YAML string.
        // Verify that the array is a valid Defensio result before going on
        if (isset($ar['defensio-result']))
        {
            if ($ar['defensio-result']['status'] == "success")
            {
                $result = true;
                return $result;
            } else
                return $result;
        } else
            return $result;
    }
    return $result;
}

function defensio_get_stats($defensio_conf)
{
    global $pixelpost_db_prefix;
    require_once ('libraries/spyc.php');
    $r = defensio_post('get-stats', $defensio_conf, array('owner-url' => $defensio_conf['blog']));
    $ar = Spyc::YAMLLoad($r);
    if (isset($ar['defensio-result']))
    {
        // update table
        $defensio_stats = serialize($ar['defensio-result']);
        $defensio_stats_updated_at = mktime();
        mysql_query("UPDATE " . $pixelpost_db_prefix . "defensio SET defensio_stats='" . $defensio_stats . "', defensio_stats_updated_at='" . $defensio_stats_updated_at . "'");
        return $ar['defensio-result'];
    } else
        return false;
}

function defensio_show_stats($defensio_conf)
{
    $last_updated = $defensio_conf['defensio_stats_updated_at'];
    $two_hours = 60 * 60 * 2;
    if (($last_updated == null) or (mktime() - $last_updated > $two_hours))
    {
        $v = defensio_get_stats($defensio_conf);
    } else
    {
        $v = unserialize($defensio_conf['defensio_stats']);
    }
    if ($v['status'] == 'success')
    {
        $percentage = number_format($v['accuracy'] * 100, 2, '.', '');
        $stats = "<h2>Statistics</h2>
        	<div style=\"float:right;width:32%;background:url('../addons/_defensio/images/chart.gif') 0 15px no-repeat;padding-left:45px;\">
			<h3 style=\"font-size:10pt;margin-bottom: 4px;margin-top:-10px;\">There's more!</h3>
        	<p style=\"margin:0px;\">For more detailed statistics (and gorgeous charts), please visit your Defensio <a href=\"http://defensio.com/manage/stats/" . $defensio_conf['key'] . "\" target=\"_blank\">Account Management</a> panel.</p>
        	</div>";
        if ($v['learning'] == 1)
        {
            $stats .= "<span style=\"clear:both;color:red;font-weight:bold;\">" . $v['learning-status'] . "<br /><br /></span>";
        } else
        {
            $stats .= "<span style=\"clear:both;\">&nbsp;</span>";
        }
        $stats .= "<ul id='defensio_stats'>
      		<li class='defensio_statsline'><strong>Recent accuracy: " . $percentage . "%</strong></li>
      		<li class='defensio_statsline'>" . $v['spam'] . " spam</li>
      		<li class='defensio_statsline'>" . $v['ham'] . " legitimate comments</li>
      		<li class='defensio_statsline'>" . $v['false-negatives'] . " false negatives (undetected spam)</li>
     		<li class='defensio_statsline'>" . $v['false-positives'] . " false positives (legitimate comments identified as spam)</li>
 		   	</ul>";
    } else
    {
        $stats = "<p>Statistics could not be retrieved, please check back later.</p>";
    }
    return $stats;
}

function defensio_counter($defensio_conf)
{
    $last_updated = $defensio_conf['defensio_stats_updated_at'];
    $two_hours = 60 * 60 * 2;

    if (($last_updated == null) or (mktime() - $last_updated > $two_hours))
    {
        $v = defensio_get_stats($defensio_conf);
    } else
    {
        $v = unserialize($defensio_conf['defensio_stats']);
    }
    if ($v['status'] = 'success')
    {
        switch ($defensio_conf['defensio_widget_align'])
        {
            case 'left':
                $counter_image_style = "float: left;";
                break;
            case 'right':
                $counter_image_style = "float: right;";
                break;
            case 'center':
                $counter_image_style = "margin: 0 auto;";
                break;
        }
        if ($defensio_conf['defensio_widget_image'] == 'dark')
        {
            $counter_text_style = "color: #fff;";
        } else
        {
            $counter_text_style = "color:#211d1e;";
        }
        $counter_html = '
		<div id="defensio_counter" style="width: 100%; margin: 10px 0 10px 0; text-align: ' . $defensio_conf['defensio_widget_align'] . '">
			<a id="defensio_counter_link" style ="text-decoration: none;" href="http://defensio.com">
				<div id="defensio_counter_image" style="background:url(\'addons/_defensio/images/defensio-counter-' . $defensio_conf['defensio_widget_image'] . '.gif\') no-repeat top left; border:none; font: 10px \'Trebuchet MS\', \'Myriad Pro\', sans-serif; overflow: hidden; text-align: left; height: 50px; width: 120px;' . $counter_image_style . '" ">
					<div style="display:block; width: 100px; padding: 9px 9px 25px 12px; line-height: 1em; color: #211d1e;' . $counter_text_style . '" "><div style="font-size: 12px; font-weight: bold;">' . $v['spam'] . '</div> spam comments blocked</div>
				</div>
				<div style="clear:both;" class="defensio_clear">&nbsp;</div>
			</a>
		</div>';
    } else
    {
        $counter_html = 'Error in retrieving stats.';
    }
    if ($defensio_conf['defensio_widget_image'] != 'none')
    {
        return $counter_html;
    } else
    {
        return null;
    }
}

function defensio_submit_ham($defensio_conf, $signatures)
{
    $params = array('signatures' => $signatures, 'owner-url' => $defensio_conf['blog'], 'user-ip' => $comment->comment_author_IP);
    $r = defensio_post('report-false-positives', $defensio_conf, $params);
    return $r;
}

function defensio_submit_spam($defensio_conf, $signatures)
{
    $params = array('signatures' => $signatures, 'owner-url' => $defensio_conf['blog'], 'user-ip' => $comment->comment_author_IP);
    $r = defensio_post('report-false-negatives', $defensio_conf, $params);
    return $r;
}

function defensio_check_comment($defensio_conf, $comment)
{
    global $pixelpost_db_prefix;
    define('DF_SUCCESS', 'success');
    define('DF_FAIL', 'fail');
    require_once ('libraries/spyc.php');
    if ($r = defensio_post('audit-comment', $defensio_conf, $comment))
    {
        $ar = Spyc::YAMLLoad($r);
        if (isset($ar['defensio-result']))
        {
            if ($ar['defensio-result']['status'] == DF_SUCCESS)
            {
                // Set metadata about the comment
                // Mark it as SPAM
                $query = "UPDATE {$pixelpost_db_prefix}comments SET `spaminess` = '" . $ar['defensio-result']['spaminess'] . "', `signature` = '" . $ar['defensio-result']['signature'] . "' WHERE id = " . $comment['id'];
                mysql_query($query);
                if ($ar['defensio-result']['spam'])
                {
                    // in this case defensio thinks it is spam
                    $query = "UPDATE {$pixelpost_db_prefix}comments SET publish = 'dfn' WHERE id = " . $comment['id'];
                    mysql_query($query);
                    $query = "SELECT defensio_addon FROM {$pixelpost_db_prefix}spamlog LIMIT 1";
                    if (mysql_query($query))
                    {
                        $query = "UPDATE `{$pixelpost_db_prefix}spamlog` SET `defensio_addon`=`defensio_addon`+1";
                        $result = mysql_query($query) or die(mysql_error());
                    }
                } else
                {
                    //determine the setting for the image
                    $query = "SELECT `comments` FROM {$pixelpost_db_prefix}pixelpost WHERE id = " . $comment['comment_post_ID'];
                    $result = mysql_query($query) or die(mysql_error());
                    while ($row = mysql_fetch_array($result))
                    {
                        if ($row[0] == 'A')
                        {
                            $publish = 'yes';
                        } else
                        {
                            $publish = 'no';
                        }
                    }

                    $query = "UPDATE {$pixelpost_db_prefix}comments SET publish = '" . $publish . "' WHERE id = " . $comment['id'];
                    mysql_query($query);
                }
            } else
            {
                // Succesful http request, but Defensio failed.
                //Put comment in moderation queue.
                $query = "UPDATE {$pixelpost_db_prefix}comments SET publish = 'dfn',`spaminess` = '-1' WHERE id = " . $comment['id'];
                mysql_query($query);
            }
        }
    } else
    {
        // Unsuccesful POST to the server. Defensio might be down.
        // Put comment in moderation queue.
        $query = "UPDATE {$pixelpost_db_prefix}comments SET publish = 'dfn',`spaminess` = '-1' WHERE id = " . $comment['id'];
        mysql_query($query);
    }
}

?>
