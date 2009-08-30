<?php

// SVN file version:
// $Id: admin_akismet_comment.php 513 2008-01-16 18:43:22Z schonhose $

/**
 * Akismet comment filter addon for Pixelpost 1.7
 * Version 1.3
 *
 * @copyright Aditya Mooley <adityamooley@sanisoft.com>, Dr. Tarique Sani <tarique@sanisoft.com>
 * @license http://opensource.org/licenses/gpl-license.php GNU General Public License version 2 of the License, or
 * any later version.
 * Updated for Pixelpost 1.6 & 1.7 by Karin Uhlig <2@kg3.de>
 */

$addon_name = "Pixelpost Akismet comment filter (Admin Side)";
$addon_version = '1.4';

// The workspace stuff
$addon_workspace1 = "comments";
$addon_menu1 = "comments";
$addon_admin_submenu1 = "Akismet";
$addon_function_name1 = "get_akismet_pages";

// add the function
add_admin_functions($addon_function_name1,$addon_workspace1,$addon_menu1,$addon_admin_submenu1);

$addon_workspace2 = "additional_spam_measures";
$addon_menu2 = "";
$addon_admin_submenu2 = "";
$addon_function_name2 = "akismet_settings";

// add the function
add_admin_functions($addon_function_name2,$addon_workspace2,$addon_menu2,$addon_admin_submenu2);


add_admin_functions('get_akismet_links', 'show_commentbuttons_top');
add_admin_functions('get_akismet_links2', 'show_commentbuttons_bottom');
add_admin_functions('get_akismet_pages', 'pages_commentbuttons');
add_admin_functions('get_akismet_pages', 'single_comment_list');
add_admin_functions('get_akismet_style', 'admin_html_head');

//global declaration
GLOBAL $akismet_result_message;

//Check whether ADMIN has submitted comment to mark as spam for Akismet
if (isset($_GET['view']) && $_GET['view'] == 'comments' && $_GET['action'] == 'akismetspam') {
  if (pp_submit_spam_comment()) {
    $GLOBALS['akismet_result_message'] = '<div class="jcaption confirm">Selected comments reported as spam to Akismet</div>';
  }
}

//Check whether ADMIN has submitted comment to mark as spam for Akismet
if (isset($_GET['view']) && $_GET['view'] == 'comments' && $_GET['action'] == 'akismetnotspam') {
  if (pp_submit_nonspam_comment()) {
    $GLOBALS['akismet_result_message'] = '<div class="jcaption confirm">Selected comments reported as not spam to Akismet</div>';
  }
}

function get_akismet_links()
{
	global $pixelpost_db_prefix, $moderate_where, $cfgrow;
// Echo the links
    if (isset($_GET['commentsview']) && $_GET['commentsview']=='akismet'){
     echo "<br /><br />";
     echo "<input class='cmnt-buttons' type='submit' name='akismetnotspam' value='Report as NOT Spam To Akismet' onclick=\"
      document.getElementById('managecomments').action='$PHP_SELF?view=comments&amp;action=akismetnotspam'
      return confirm('Report all selected comments as Not Spam to Akismet?');\" />";
      echo "&nbsp;";
    } 
		if (isset($_GET['show']) || !isset($_GET['commentsview'])){ 
     echo " <input class='cmnt-buttons' type='submit' name='akismetspam' value='Report as Spam To Akismet' onclick=\"
	      document.getElementById('managecomments').action='$PHP_SELF?view=comments&amp;action=akismetspam'
    	  return confirm('Report all selected comments as Spam to Akismet?');\" />";
    }
    if ((isset($GLOBALS['akismet_result_message'])) && ($GLOBALS['akismet_result_message']!="")){
		echo "<br /><br />".$GLOBALS['akismet_result_message'];
	}
	$query = mysql_query("select count(*) as count from ".$pixelpost_db_prefix."comments  WHERE publish='spm' ");
	$akismet_count = mysql_fetch_array($query);
	if ($akismet_count['count'] < 1 && isset($_GET['commentsview']) && $_GET['commentsview']=='akismet'){
		echo "<div class=\"content\">Your quarantine is empty.</div> ";
	}
}

function get_akismet_links2()
{
	global $pixelpost_db_prefix, $moderate_where, $cfgrow;
// Echo the links
    if (isset($_GET['commentsview']) && $_GET['commentsview']=='akismet'){
     echo "<input class='cmnt-buttons' type='submit' name='akismetnotspam' value='Report as NOT Spam To Akismet' onclick=\"
      document.getElementById('managecomments').action='$PHP_SELF?view=comments&amp;action=akismetnotspam'
      return confirm('Report all selected comments as Not Spam to Akismet?');\" />";
 		 echo "&nbsp;";
    }
	  if (isset($_GET['show']) || !isset($_GET['commentsview'])){ 
     echo " <input class='cmnt-buttons' type='submit' name='akismetspam' value='Report as Spam To Akismet' onclick=\"
	      document.getElementById('managecomments').action='$PHP_SELF?view=comments&amp;action=akismetspam'
    	  return confirm('Report all selected comments as Spam to Akismet?');\" />";
    }
	// Delete comments older than X days and marked as SPAM by Akismet
	$query = "DELETE FROM {$pixelpost_db_prefix}comments WHERE (TO_DAYS(CURDATE()) - TO_DAYS(`datetime`)) > ".$cfgrow['akismet_keep']." AND publish='spm'";
	$result = mysql_query($query);
}

function get_akismet_pages() {
	global $moderate_where, $moderate_where2;
	global $comment_row_class;
	if (isset($_GET['commentsview']) && $_GET['commentsview']=='akismet'){
		$moderate_where = " and publish='spm' ";	
		$moderate_where2 = " WHERE publish='spm' ";	
		$comment_row_class = "akismet-spam-comment";
	}
}


function get_akismet_style() {
 	global $pixelpost_db_prefix;
 	if($_GET['view'] == "comments") {
 		$query = mysql_query("select count(*) as count from ".$pixelpost_db_prefix."comments  WHERE publish='spm' ");
		$akismet_count = mysql_fetch_array($query);
		echo '<style  type="text/css">
		.akismet-spam-comment {background-color:#eca189;color:#666;}
		</style><script type="text/javascript" src="../addons/_akismet/libraries/domFunction.js"></script>
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
			var akismet = document.getElementById(\'commentsAkismet\');
			var akismet_total = \''.$akismet_count['count'].'\';
			if(akismet){
				akismet.innerHTML = akismet.innerHTML + \' (\' + akismet_total + \')\';
			}
		}); // End Dom Ready
		</script>
		';
	}
}


// Checks whether specified field exists in current or specified table.
$fieldname = "akismet_key";

$table = $pixelpost_db_prefix ."config";
$fieldexists = 0;
$t = 0;
$attention_call = "";
global $pixelpost_db_pixelpost, $cfgrow;
if ($table != "") {
  if (isset($table_name)) {
    $current_table = $table;
  }

  $result_id = mysql_list_fields( $pixelpost_db_pixelpost, $table );

  if ($result_id) {
  for ($t = 0; $t < mysql_num_fields($result_id); $t++) {
    if (strtolower( $fieldname) == strtolower(mysql_field_name($result_id, $t))) {
      $fieldexists = 1;
    break;
    }
  }
  }
}
// if the field does not exist: Create it!
if ($fieldexists == 0) {
  $result = mysql_query("ALTER TABLE $table ADD `akismet_key` VARCHAR( 50 ) DEFAULT '' NOT NULL	");
}
// if the akismet_keep field does not exist, create it
if(!mysql_query("SELECT akismet_keep from ".$pixelpost_db_prefix."config")) mysql_query("ALTER TABLE ".$pixelpost_db_prefix."config ADD `akismet_keep` INT DEFAULT '7' NOT NULL ") or die ('<span style="color:red"><b>Error: '. mysql_error());

$key = $cfgrow['akismet_key'];

global $pp_api_host, $pp_api_port, $pp_user_agent;

$pp_api_host = $key.'.rest.akismet.com';
$pp_api_port = 80;
$pp_user_agent = "Pixelpost/".Get_Pixelpost_Version($pixelpost_db_prefix )." | Akismet/1.12";

$addon_description = "<a name='akismet'></a>Pixelpost Add-On to filter spam using Akismet (<a href='http://akismet.com' target='_blank'>Info</a>).";


function akismet_settings(){
	global $pixelpost_db_prefix,$cfgrow;
	$newakismet_key = $cfgrow['akismet_key'];
	$newakismet_keep = $cfgrow['akismet_keep'];

	if ((isset($_GET['optaction'])) && ($_GET['optaction'] == "updateantispam")) {
  	$newakismet_key = mysql_real_escape_string($_POST['newakismet_key']);
	  $newakismet_keep = $_POST['newakismet_keep'];
  	if ('valid' == akismet_verify_key($newakismet_key)) {
    	$query = "update ".$pixelpost_db_prefix."config set akismet_key='" .$newakismet_key ."'" ;
	    $update = mysql_query($query );
  	  $addon_description .= "<font color='#006600'>API key validated succesfully.</font>";
	  } else {
  	  $addon_description .= "<font color='#FF0000'>Unable to validate API Key</font>";
	  }
  	$query = "update ".$pixelpost_db_prefix."config set akismet_keep='" .$newakismet_keep ."'" ;
	  if ($update = mysql_query($query )) $addon_description .= "<font color='#006600'>&quot;Days to keep&quot; succesfully saved.</font>";
  	else $addon_description .= '<span style="color:red"><b>Saving &quot;Days to keep&quot; to database failed!</b></span><br />Error: '. mysql_error();
}
	
 echo "<div class='jcaption'>Akismet settings</div>
  <div class='content'>
<strong>You need an API key from Wordpress.com to activate this protection.</strong><br />
If you have already signed up at Wordpress.com, copy your API key from your profile page.<br />
Otherwise sign up for a free Wordpress account here: <a href='http://wordpress.com/signup/' target='_blank'>SIGN UP</a>.<br /><br />
Enter your API key from Wordpress: <input type='text' name='newakismet_key' value='".$newakismet_key ."' style='width:100px'><br /><br />
Days to keep comments marked as spam by Akismet: <input type='text' name='newakismet_keep' value='".$newakismet_keep ."' style='width:20px'><br /><br />
</div>";
}

// Returns array with headers in $response[0] and entity in $response[1]
function pp_http_post($request, $host, $path, $port = 80) {
  global $pp_user_agent;

  $http_request  = "POST $path HTTP/1.0\r\n";
  $http_request .= "Host: $host\r\n";
  $http_request .= "Content-Type: application/x-www-form-urlencoded; charset=utf-8\r\n";
  $http_request .= "Content-Length: " . strlen($request) . "\r\n";
  $http_request .= "User-Agent: {$pp_user_agent}\r\n";
  $http_request .= "\r\n";
  $http_request .= $request;

  $response = '';

  if( false !== ( $fs = fsockopen($host, $port, $errno, $errstr, 30) ) ) {
    fwrite($fs, $http_request);

    while ( !feof($fs) )
      $response .= fgets($fs, 1160); // One TCP-IP packet
    fclose($fs);
    $response = explode("\r\n\r\n", $response, 2);
  }
  return $response;
}


function akismet_verify_key( $key ) {
  global $pp_api_host, $pp_api_port, $cfgrow;

  $blog = urlencode( $cfgrow['siteurl'] );
  $response = pp_http_post("key=$key&blog=$blog", 'rest.akismet.com', '/1.1/verify-key', $pp_api_port);
  if ( 'valid' == $response[1] )
    return true;
  else
    return false;
}

//Function to report the comment is not spam
function pp_submit_nonspam_comment () {
  global $pp_api_host, $pp_api_port, $cfgrow, $pixelpost_db_prefix;

  //Loop thru the $_POST['moderate_commnts_boxes'] and keep marking each comment as spam to Aksimet
  if (is_array($_POST['moderate_commnts_boxes'])) {
    foreach ($_POST['moderate_commnts_boxes'] as $cid) 
    {
      $query = "SELECT * FROM {$pixelpost_db_prefix}comments WHERE id = '".(int)$cid."'";
      $result = mysql_query($query);
      
      if ( !mysql_num_rows($result) ) 
      {// it was deleted
        continue;
      }

      $row = mysql_fetch_assoc($result);
      $comment = array('comment_type' => 'comment', 'comment_author' => $row['name'], 'comment_author_email' => $row['email'], 'comment_author_url' => $row['url'], 'comment_content' => $row['message'], 'ip' => $row['ip'], 'user_agent' => $pp_user_agent, 'blog' => $cfgrow['siteurl']);

      $query_string = '';
      foreach ( $comment as $key => $data ) 
      {
        $query_string .= $key . '=' . urlencode( stripslashes($data) ) . '&';
      }
      $response = pp_http_post($query_string, $pp_api_host, "/1.1/submit-ham", $pp_api_port);
      
      //Since comment is not spam, let's mark it to publish
      $query = "UPDATE {$pixelpost_db_prefix}comments SET publish = 'yes' WHERE id = '".(int)$cid."'";
      mysql_query($query);  
    }
    return true;
  } else {
    $GLOBALS['akismet_result_message'] = '<div class="jcaption confirm">You must select at least one comment.</div>';
    return false;;
  }
}

//Function to report the comment as spam which Akismet marked as not spam
function pp_submit_spam_comment () {
  global $pp_api_host, $pp_api_port, $cfgrow, $pixelpost_db_prefix, $pp_user_agent;

  //Loop thru the $_POST['moderate_commnts_boxes'] and keep marking each comment as spam to Aksimet
  if (is_array($_POST['moderate_commnts_boxes'])) {
    foreach ($_POST['moderate_commnts_boxes'] as $cid) {
      $query = "SELECT * FROM {$pixelpost_db_prefix}comments WHERE id = '".(int)$cid."'";
      $result = mysql_query($query);
      if ( !mysql_num_rows($result) ) {// it was deleted
        continue;
      }

      $row = mysql_fetch_assoc($result);
      $comment = array('comment_type' => 'comment', 'comment_author' => $row['name'], 'comment_author_email' => $row['email'], 'comment_author_url' => $row['url'], 'comment_content' => $row['message'], 'ip' => $row['ip'], 'user_agent' => $pp_user_agent, 'blog' => $cfgrow['siteurl']);

      $query_string = '';
      foreach ( $comment as $key => $data ) {
        $query_string .= $key . '=' . urlencode( stripslashes($data) ) . '&';
      }

      $response = pp_http_post($query_string, $pp_api_host, "/1.1/submit-spam", $pp_api_port);
      //Since comment is spam, let's mark it not to publish
      $query = "UPDATE {$pixelpost_db_prefix}comments SET publish = 'spm' WHERE id = '".(int)$cid."'";
      mysql_query($query);
    }
    return true;
  } else {
    $GLOBALS['akismet_result_message'] = '<div class="jcaption confirm">You must select at least one comment.</div>';
    return false;
  }
}
?>
