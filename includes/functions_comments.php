<?php
/*

Pixelpost version 1.5

SVN file version:
$Id$

Pixelpost www: http://www.pixelpost.org/

Version 1.5:
Development Team:
Ramin Mehran, Connie Mueller-Goedecke, Will Duncan, Joseph Spurling, GeoS
Version 1.1 to Version 1.3: Linus <http://www.shapestyle.se>

Contact: thecrew@pixelpost.org
Copyright 2006 Pixelpost.org <http://www.pixelpost.org>


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
// ##########################################################################################//
// SAVE COMMENT
// ##########################################################################################//

// variable which says if notofication can be send (SPAM and problem free comment)
// by default it can't
$email_flag = 0;

if(isset($_GET['x'])&&$_GET['x'] == "save_comment")
{
// token check
	if ($cfgrow['token'] == 'T')
	{
		if (isset($_SESSION['token']) && ($_POST['token'] == $_SESSION['token']))
		{
			if ((time() - $_SESSION['token_time']) > ($cfgrow['token_time']*60))
			{
    		die("You waited more then five minutes to enter the comment");
    	}
		}
		else
		{
			die("Die you SPAMMER!");
		}
	}
// $parent_id		
	$parent_id = isset($_POST['parent_id']) ? $_POST['parent_id'] : "";

	if (eregi("\r",$parent_id) || eregi("\n",$parent_id))	die("No intrusion! ?? :(");

	if (!is_numeric($parent_id))	die('parent_id is not correct!');

// check if current image has got enabled comments
	$comments_result = sql_array("SELECT comments FROM ".$pixelpost_db_prefix."pixelpost where id = '$parent_id'");
	$cmnt_setting = pullout($comments_result['comments']);

	if($cmnt_setting == 'F')	die('Die you SPAMMER!!');

	$datetime = gmdate("Y-m-d H:i:s",time()+(3600 * $cfgrow['timezone'])) ;
	$ip = $_SERVER['REMOTE_ADDR'];

	if($cmnt_setting == 'A')
	{
		$cmnt_moderate_permission='no';
		$cmnt_publish_permission ='yes';
	}
	else
	{
		$cmnt_moderate_permission='yes';
		$cmnt_publish_permission ='no';
	}

// $message		
	$message = isset($_POST['message']) ? $_POST['message'] : "";
	$message = clean_comment($message);
	$message = preg_replace("/((\x0D\x0A){3,}|[\x0A]{3,}|[\x0D]{3,})/","\n\n",$message);
	$message = nl2br($message);

// $name 	
	$name = isset($_POST['name']) ? $_POST['name'] : "";
	if (eregi("\r",$name) || eregi("\n",$name))	die("No intrusion! ?? :(");
	$name = clean_comment($name);	

// $url 	
	$url = isset($_POST['url']) ? $_POST['url'] : "";
	if(eregi("\r",$url) || eregi("\n",$url))	die("No intrusion! ?? :(");
	if(strpos($url,'https://') === false && strpos($url,'http://') === false && strlen($url) > 0)	$url = "http://".$url;
	$url = clean_comment($url);

// $parent_name		
	$parent_name = isset($_POST['parent_name']) ? $_POST['parent_name'] : "";
	if (eregi("\r",$parent_name) || eregi("\n",$parent_name))	die("No intrusion! ?? :(");
	$parent_name = clean_comment($parent_name);	


// $email 		
	$email = isset($_POST['email']) ? clean_comment($_POST['email']) : "";
	if (eregi("\r",$email) || eregi("\n",$email))	die("No intrusion! ?? :(");


	// check that only one email-adress entered
	$onlyone = $email;
	$numberofats = substr_count("$onlyone", "@");
	if ($numberofats > 1)	die("only one email-adress allowed");
	
	// Ramin added more protections
	if (eregi("Content-Transfer-Encoding", $_POST['parent_name'] . $_POST['email'] . $_POST['url'] . $_POST['name'] . $_POST['message'] . $_POST['parent_id']))	die("SPAM Injection Error :(");
	if (eregi ("MIME-Version", $_POST['parent_name'] . $_POST['email'] . $_POST['url'] . $_POST['name'] . $_POST['message'] . $_POST['parent_id']))	die("SPAM Injection Error :(");
	if (eregi ("Content-Type", $_POST['parent_name'] . $_POST['email'] . $_POST['url'] . $_POST['name'] . $_POST['message'] . $_POST['parent_id']))	die("SPAM Injection Error :(");

	if($parent_id == "")	$extra_message = "<b>$lang_message_missing_image</b><p />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

	if($message == "")	$extra_message = "<b>$lang_message_missing_comment</b><p />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	
	if($name == "")	$extra_message = "<b>$lang_message_missing_name</b><p />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

	if(($parent_id != "") and ($message != "") and ($name != ""))
	{
		// check the comment with banlists
		if (!is_comment_in_blacklist($message,$ip,$name))
		{
			// send it to moderation if contains banned words but not black listed!
			if(is_comment_in_moderation_list($message,$ip,$name))
			{
				$cmnt_publish_permission = 'no';
				$cmnt_moderate_permission ='yes';
			}

			// to the job now
			if ($cmnt_moderate_permission =='yes')
				$extra_message = "<b>$lang_message_moderating_comment</b><p />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			$query = "INSERT INTO ".$pixelpost_db_prefix."comments(id,parent_id,datetime,ip,message,name,url,email,publish)
		VALUES(NULL,'$parent_id','$datetime','$ip','$message','$name','$url','$email','$cmnt_publish_permission')";
			$result = mysql_query($query);

			// added by GeoS for sure that comment is saved (moved by ramin for bug fixing)
			if (!mysql_error())
			$email_flag = 1;
		} // end if is not in the blacklist
		else $extra_message = "<b>$lang_message_banned_comment</b><p />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	}
}

// ##########################################################################################//
// EMAIL NOTE ON COMMENTS
// ##########################################################################################//

if(isset($_GET['x'])&&$_GET['x'] == "save_comment")
{
	if($cfgrow['commentemail'] == "yes" && $email_flag == 1)
	{
		$admin_email = $cfgrow['email'];
		$comment_name = clean_comment($_POST['name']);
		$comment_url  = clean_comment($_POST['url']);

		if(strpos($comment_url,'https://') === false && strpos($comment_url,'http://') === false && strlen($comment_url) > 0)	$comment_url = "http://".$comment_url;

		$comment_image_id = $_POST['parent_id'];
		$comment_message = clean_comment($_POST['message']);
		$comment_message = stripslashes($comment_message);
		$comment_email = clean_comment($_POST['email']);
		$link_to_comment = $cfgrow['siteurl']."./index.php?showimage=$comment_image_id";
		$comment_image_name = clean_comment($_POST['parent_name']);
		$link_to_comment = $cfgrow['siteurl']."?showimage=$comment_image_id";
		$link_to_img_thumb_cmmnt = "Thumbnail Link:" .$cfgrow['siteurl'] ."thumbnails/thumb_$comment_image_name";
		$img_thumb_cmmnt = "<img src='" .$cfgrow['siteurl'] ."thumbnails/thumb_$comment_image_name' >";
		$subject = "$pixelpost_site_title - $lang_email_notification_subject";
		$sent_date = gmdate("Y-m-d",time()+(3600 * $cfgrow['timezone'])) ;
		$sent_time = gmdate("H:i",time()+(3600 * $cfgrow['timezone'])) ;

		if ($cfgrow['htmlemailnote']!='yes')
		{
		// Plain text note email
			$body = "$lang_email_notificationplain_pt1 : $link_to_comment\n\n$lang_email_notificationplain_pt2\n\n$comment_message\n\n$lang_email_notificationplain_pt3: $comment_name";

			if ($comment_email!="")		$body .=  "- $comment_email";

			$body .= "\n\n$lang_email_notificationplain_pt4";
			$headers = "Content-type: text/plain; charset=UTF-8\n";
			$headers .= "Content-Transfer-Encoding: 8bit\n";
	
			if ($comment_email!="")	$headers .= "From: $comment_name<$comment_email>\n";
			else $headers .= "From: PIXELPOST <$admin_email>\n";

			$recipient_email = "admin <$admin_email>";
		}
		else
		{
			// HTML note email
			$body = "$lang_email_notification_pt1
      <a href='$link_to_comment'>$link_to_comment</a><br>
      $img_thumb_cmmnt<br>
$lang_email_notification_pt2
      $comment_message<br>
      $lang_email_notification_pt3 <a href='$comment_url' >$comment_name</a>  - $comment_email <br>
$lang_email_notification_pt4
      ";

			////////////
			$headers  = 'MIME-Version: 1.0' . "\n";
			$headers .= 'Content-type: text/html; charset=UTF-8' . "\n";

			// Additional headers
			if ($comment_email!="")	$headers .= "From: $comment_name  <$comment_email>\n";
			else $headers .= "From: PIXELPOST <$admin_email>\n";

			$recipient_email = "admin <$admin_email>";
		} // if (cfgrow['htmlemailnote']=='no')

    // Sending notification
		mail($recipient_email,$subject,$body,$headers);

	} // end of if($_GET['x'] == "save_comment")

?>

<!DOCTYPE html
     PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html><head>
	<meta http-equiv="refresh" content="8; URL=<?php echo $_SERVER['HTTP_REFERER']; ?>" />
	<title><?php echo $lang_comment_page_title; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" href="admin/admin_index.css" type="text/css" />
	</head>
	<body>
	<?php
	echo "<p />$lang_comment_thank_you<p />$extra_message<br />";
  echo "<a href='$_SERVER[HTTP_REFERER]'>$lang_comment_redirect</a><p />";
	echo "</body></html>";
} // commentemail yes

?>