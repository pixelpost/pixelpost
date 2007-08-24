<?php

// SVN file version:
// $Id: admin_akismet_comment.php 78 2006-12-24 02:23:47Z piotr.galas $

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
$addon_version = '1.3';

$newakismet_key = $cfgrow['akismet_key'];
$newakismet_keep = $cfgrow['akismet_keep'];

add_admin_functions('get_akismet_links', 'show_commentbuttons');
add_admin_functions('get_akismet_pages', 'pages_commentbuttons');
add_admin_functions('get_akismet_comments', 'single_comment_list');
add_admin_functions('get_akismet_style', 'admin_html_head');



function get_akismet_links()
{
	global $pixelpost_db_prefix, $moderate_where, $cfgrow;
	
// style for hightlight
	$spamstyle = ($_GET['show']=='spams'?' style="border-color:#ff6d6d;"':'');
// Echo the links

  echo <<<EOT
  <br /><br />
		
	<input class='cmnt-buttons' type='submit' name='showakismet' value='Show Akismet Spam' onclick="
			document.getElementById('managecomments').action='$PHP_SELF?view=comments&amp;show=spams'" $spamstyle />

  <input class='cmnt-buttons' type='submit' name='akismetspam' value='Report as Spam To Akismet' onclick="
      document.getElementById('managecomments').action='$PHP_SELF?view=comments&amp;action=akismetspam'
      return confirm('Report all selected comments as Spam to Akismet?');" />

  <input class='cmnt-buttons' type='submit' name='akismetnotspam' value='Report as HAM To Akismet' onclick="
      document.getElementById('managecomments').action='$PHP_SELF?view=comments&amp;action=akismetnotspam'
      return confirm('Report all selected comments as Not Spam to Akismet?');" />
EOT;

	// Delete comments older than X days and marked as SPAM by Akismet
	$query = "DELETE FROM {$pixelpost_db_prefix}comments WHERE (TO_DAYS(CURDATE()) - TO_DAYS(`datetime`)) > ".$cfgrow['akismet_keep']." AND publish='spm'";
	$result = mysql_query($query);

	if ($_GET['show']=='spams') {
		$moderate_where = " and publish='spm' ";
	}
}

function get_akismet_pages() {
	global $mod_where;
	if ($_GET['show']=='spams'){
		$mod_where = " WHERE publish='spm' ";
	}
}

function get_akismet_comments() {
	global $comment_row_class, $publish_permission;
	if ($publish_permission=='spm'){
    $comment_row_class = "akismet-spam-comment";
  }
}

function get_akismet_style() {
	echo '<style  type="text/css">
	.akismet-spam-comment {background-color:#eca189;color:#666;}
	</style>';
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

$addon_description = "<a name='akismet'></a>Pixelpost Add-On to filter spam using Akismet (<a href='http://akismet.com' target='_blank'>Info</a>).<br /><br />";

if(isset($_GET['x']) && $_GET['x'] == "akismet_key") {
  $newakismet_key = $_POST['newakismet_key'];
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
	
$addon_description .= "
<form method='post' action='index.php?view=addons&amp;x=akismet_key#akismet'>
<strong>You need an API key from Wordpress.com for working this Addon.</strong><br />
If you have already signed up at Wordpress.com, copy your API key from your profile page.<br />
Otherwise sign up for a free Wordpress account here: <a href='http://wordpress.com/signup/' target='_blank'>SIGN UP</a>.<br /><br />
Enter your API key from Wordpress: <input type='text' name='newakismet_key' value='".$newakismet_key ."' style='width:100px'><br /><br />
Days to keep comments marked as spam by Akismet: <input type='text' name='newakismet_keep' value='".$newakismet_keep ."' style='width:20px'><br /><br />
<input type='submit' value='update'>
</form>
";


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
      $query = "SELECT * FROM {$pixelpost_db_prefix}comments WHERE id = '$cid'";
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
      $query = "UPDATE {$pixelpost_db_prefix}comments SET publish = 'yes' WHERE id = '$cid'";
      mysql_query($query);  
    }
    return true;
  } else {
    echo '<div class="jcaption confirm">You must select at least one comment.</div>';
    return false;;
  }
}

//Function to report the comment as spam which Akismet marked as not spam
function pp_submit_spam_comment () {
  global $pp_api_host, $pp_api_port, $cfgrow, $pixelpost_db_prefix, $pp_user_agent;

  //Loop thru the $_POST['moderate_commnts_boxes'] and keep marking each comment as spam to Aksimet
  if (is_array($_POST['moderate_commnts_boxes'])) {
    foreach ($_POST['moderate_commnts_boxes'] as $cid) {
      $query = "SELECT * FROM {$pixelpost_db_prefix}comments WHERE id = '$cid'";
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
      $query = "UPDATE {$pixelpost_db_prefix}comments SET publish = 'spm' WHERE id = '$cid'";
      mysql_query($query);
    }
    return true;
  } else {
    echo '<div class="jcaption confirm">You must select at least one comment.</div>';
    return false;
  }
}



//Check whether ADMIN has submitted comment to mark as spam for Akismet
if ($_GET['view'] == 'comments' && $_GET['action'] == 'akismetspam') {
  if (pp_submit_spam_comment()) {
    echo '<div class="jcaption confirm">Selected comments reported as spam to Akismet</div>';
  }
}

//Check whether ADMIN has submitted comment to mark as spam for Akismet
if ($_GET['view'] == 'comments' && $_GET['action'] == 'akismetnotspam') {
  if (pp_submit_nonspam_comment()) {
    echo '<div class="jcaption confirm">Selected comments reported as not spam to Akismet</div>';
  }
}
?>
