<?php

if(!defined('PIXELPOST')){die("Try another day!!");}

// SVN file version:
// $Id: pass_recovery.php 460 2007-11-02 14:02:06Z piotr.galas $

// forgot password?
if(isset($_GET['x']) && $_GET['x']=='passreminder')
{
echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html>
	<head><title>$admin_lang_pw_title</title>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" /></head>
	<body>
	<p style="border:solid 2px;padding:5px;color:red;font-weight:bold;font-size:11px;margin-left:auto;margin-right:auto;margin-top:10%;font-family:verdana,arial,sans-serif;text-align:center;">';

	if ($cfgrow['admin']!= $_POST['user'])
	{
		echo "<span class=\"confirm\">$admin_lang_pw_wronguser</span><br />";
		echo "<br /><a href='index.php'>$admin_lang_pw_back</a></body></html>";
		die();
	}
	if ($cfgrow['email']== "")
	{
		echo "<span class=\"confirm\">$admin_lang_pw_noemail</span><br />";
		echo "<br /><a href='index.php' > $admin_lang_pw_back </a></body></html>";
		die();
	}

	if (strtolower($cfgrow['email'])==strtolower($_POST['reminderemail']))
	{
		// generate a random new pass
		$user_pass = substr( MD5('time' . rand(1, 16000)), 0, 6);
		$query = "update ".$pixelpost_db_prefix."config set password=MD5('$user_pass') where admin='".$cfgrow['admin']."'";
		if(mysql_query($query))
		{
			$subject = "$admin_lang_pw_subject";
			$body  = "$admin_lang_pw_text_1 \n\n";
			$body .= "$admin_lang_pw_usertext ".$cfgrow['admin']." \n";
			$body .= "$admin_lang_pw_mailtext ".$cfgrow['email']." \n\n";
			$body .= "$admin_lang_pw_newpw $user_pass";
			$body .= "\n\n$admin_lang_pw_text_7".$cfgrow['siteurl']."admin $admin_lang_pw_text_8";

			$headers = "Content-type: text/plain; charset=UTF-8\n";
			$headers .= "$admin_lang_pw_text_2 <".$cfgrow['email'].">\n";

			$recipient_email = $cfgrow['email'];
			if (mail($recipient_email,$subject,$body,$headers))
				{echo "$admin_lang_pw_text_3" .$cfgrow['email'];}
			else { echo "$admin_lang_pw_text_3";}
			echo "<br /><a href='index.php' > $admin_lang_pw_back </a></body></html>";
			die();
		}
		else
		{
			$dberror = mysql_error();
			echo "$admin_lang_pw_text_5 " .$dberror ."$admin_lang_pw_text_5 " ;
				echo "<br /><a href='index.php' > $admin_lang_pw_back </a></body></html>";
			die();
		}
	}
	else
	{
		echo "<span class=\"confirm\">$admin_lang_pw_notsent</span><br />";
		echo "<br /><a href='index.php'> $admin_lang_pw_back </a></body></html>";
		die();
	}// end else (strtolower($cfgrow['email'])==strtolower($_POST['reminderemail']) & $cfgrow['email']!= "")

} // end if($_GET['x']=='passreminder')
?>