<?php

// SVN file version:
// $Id$

//if(!isset($_SESSION["pixelpost_admin"]) || $cfgrow['password'] != $_SESSION["pixelpost_admin"] || $_GET["_SESSION"]["pixelpost_admin"] == $_SESSION["pixelpost_admin"] || $_POST["_SESSION"]["pixelpost_admin"] == $_SESSION["pixelpost_admin"] || $_COOKIE["_SESSION"]["pixelpost_admin"] == $_SESSION["pixelpost_admin"])
if(!isset($_SESSION["pixelpost_admin"]) || $cfgrow['password'] != $_SESSION["pixelpost_admin"])
{
	die ("Try another day!!");
}

// view = options

if(isset($_GET['view']) AND $_GET['view'] == "options") {
// switch ($_GET['optaction']) {
if(!isset($_GET['optionsview'])){
    $_GET['optionsview'] = '';
}
$lang_error = 0;

//=========== START PAGE ONE: GENERAL ===========
if(isset($_GET['optaction']) AND $_GET['optaction'] == 'updateall')
{
	if(isset($_GET['optionsview']) AND $_GET['optionsview'] == '' OR isset($_GET['optionsview']) AND $_GET['optionsview'] == 'general')
	{
		//case "updatetitle":
		//case "updatesubtitle":
		//case "updateurl":
		if(!get_magic_quotes_gpc())
		{
			// we need to escape the string before saving it to the db
			$update = sql_query(
				"UPDATE ".$pixelpost_db_prefix."config
				SET
					sitetitle='".addslashes($_POST['new_site_title'])."',
					subtitle='".addslashes($_POST['new_sub_title'])."',
					siteurl='".addslashes($_POST['new_site_url'])."'");
		}
		else
		{
			$update = sql_query(
				"UPDATE ".$pixelpost_db_prefix."config
				SET
					sitetitle='".($_POST['new_site_title'])."',
					subtitle='".($_POST['new_sub_title'])."',
					siteurl='".($_POST['new_site_url'])."'");
		}

		//case "updateadmin": // admin user+password
		if ($_POST['newadminpass']!= '')
		{
			if ($_POST['newadminpass_re'] == $_POST['newadminpass'])
			{
				$new_pass = md5($_POST['newadminpass']);
				$update = sql_query(
					"UPDATE ".$pixelpost_db_prefix."config
					SET
						admin='".clean($_POST['new_admin_user'])."',
						password='$new_pass'");

				echo "<div class='content confirm'>$admin_lang_optn_pass_chngd_txt</div>";
				unset($_SESSION["pixelpost_admin"]);
			 	setcookie( "pp_user", "", time()-36000);
				setcookie( "pp_password", "", time()-36000);
			}
			elseif ( $_POST['newadminpass_re']!='')
			{
				echo "<div class='content confirm'>$admin_lang_optn_pass_notchngd_txt</div>";
			}
		}
		//break;

		//case "updatelang":
		if ($_POST['new_lang']!=$_POST['alt_lang']){
			$update = sql_query(
				"UPDATE ".$pixelpost_db_prefix."config
				SET
					langfile='".clean($_POST['new_lang'])."',
					altlangfile='".clean($_POST['alt_lang'])."'");

			//$lang_error = 0;
		} else {
			$lang_error = 1;
		}
		//break;

		//case "updatecommentemail":
		//case "updatehtmlemailnote":
		//case "updateallowcomments":
		//case "updatetimezone":
		//case "updatethumbnailpath": // imagepath
		//case "updateimagepath": // imagepath
		//case "updateemail":
		//case "updateadminlang"
			$update = sql_query(
				"UPDATE ".$pixelpost_db_prefix."config
				SET
					commentemail='".clean($_POST['new_commentemail'])."',
					htmlemailnote='".clean($_POST['new_htmlemailnote'])."',
					global_comments='".clean($_POST['global_comments'])."',
					timezone='".clean($_POST['timezone'])."',
					thumbnailpath='".clean($_POST['new_thumbnail_path'])."',
					imagepath='".clean($_POST['new_image_path'])."',
					email='".clean($_POST['new_email'])."',
					admin_langfile='".clean($_POST['new_admin_lang'])."'");

		// markdown
		// exif
		// book visitors
		// time stamps
			$upquery = sql_query(
				"UPDATE ".$pixelpost_db_prefix."config
				SET
					markdown='".clean($_POST['markdown'])."',
					exif='".clean($_POST['exif'])."',
					visitorbooking='".clean($_POST['visitorbooking'])."',
					timestamp='".clean($_POST['timestamp'])."'");

		// RSS settings
		if(!get_magic_quotes_gpc())
		{
			// we need to escape the string before saving it to the db
			$upquery = sql_query(
				"UPDATE ".$pixelpost_db_prefix."config
				SET
					rsstype='".addslashes($_POST['rsstype'])."',
					feed_discovery='".addslashes($_POST['feed_discovery'])."',
					feeditems='".(int) $_POST['feeditems']."',
					feed_title='".addslashes($_POST['feed_title'])."',
					feed_description='".addslashes($_POST['feed_description'])."',
					feed_copyright='".addslashes($_POST['feed_copyright'])."',
					allow_comment_feed='".addslashes($_POST['allow_comment_feed'])."'");
		}
		else
		{
			$upquery = sql_query(
				"UPDATE ".$pixelpost_db_prefix."config
				SET
					rsstype='".$_POST['rsstype']."',
					feed_discovery='".$_POST['feed_discovery']."',
					feeditems='".(int) $_POST['feeditems']."',
					feed_title='".$_POST['feed_title']."',
					feed_description='".$_POST['feed_description']."',
					feed_copyright='".$_POST['feed_copyright']."',
					allow_comment_feed='".$_POST['allow_comment_feed']."'");
		}
		
		// external feed
		// do not bother to update unless the external feed option is selected and not null
		if($_POST['feed_discovery'] == 'E' &&  $_POST['feed_external'] != '')
		{
			if(!get_magic_quotes_gpc())
			{
				// we need to escape the string before saving it to the db
				$upquery = sql_query("UPDATE ".$pixelpost_db_prefix."config SET feed_external='".addslashes($_POST['feed_external'])."', feed_external_type='".clean($_POST['feed_external_type'])."'");
			}
			else
			{
				$upquery = sql_query("UPDATE ".$pixelpost_db_prefix."config SET feed_external='".clean($_POST['feed_external'])."', feed_external_type='".clean($_POST['feed_external_type'])."'");
			}
		}
		
		// displayorder
			$upquery = sql_query("UPDATE ".$pixelpost_db_prefix."config SET display_sort_by='".clean($_POST['display_sort_by'])."', display_order='".$_POST['display_order']."'");
		
		// Refresh the settings
		$cfgrow = sql_array("SELECT * FROM ".$pixelpost_db_prefix."config");

	}// end frist page
} //end update all

//=========== END OF PAGE ONE: GENERAL ===========

$action = '';
if(isset($_GET['optaction'])){
	$action = $_GET['optaction'];
}

switch ($action)
{

//=========== START PAGE TWO: TEMPLATE ===========
	case "updatetemplate":
		$update = sql_query("UPDATE ".$pixelpost_db_prefix."config SET template='".clean($_POST['new_template'])."'");
	break;


	case "updatedateformat":
		$update = sql_query("UPDATE ".$pixelpost_db_prefix."config SET dateformat='".clean($_POST['new_dateformat'])."'");
	break;

	case "updatecatformat":
		if ($_POST['catformat']=='') break;

		if ($_POST['catformat']!='custom')
		{
			// selected from the drop box
			$startcatformat = '';
			$endcatformat = clean($_POST['catformat']);
			if ($_POST['catformat'] == '[')
			{
						$startcatformat = '[';
						$endcatformat = ']';
			} // end if '['
		} // end if custom
		else
		{
			// custom fromat
			$startcatformat = clean($_POST['startcatformat']);
			$endcatformat = clean($_POST['endcatformat']);
		}

		$upquery = sql_query("UPDATE ".$pixelpost_db_prefix."config SET catgluestart='" .$startcatformat ."', catglueend='" .$endcatformat ."'");
	break;

	case "updatecalendar":
		$update = sql_query("UPDATE ".$pixelpost_db_prefix."config SET calendar='".clean($_POST['cal'])."'");
	break;
//=========== END OF PAGE TWO: TEMPLATE ===========


//=========== START PAGE THREE: THUMBNAIL ===========
	case "updatethumbrow":
		$update = sql_query("UPDATE ".$pixelpost_db_prefix."config SET thumbnumber='".clean($_POST['thumbnumber'])."'");
	break;

	case "updatecrop":
		$update = sql_query("UPDATE ".$pixelpost_db_prefix."config SET crop='".clean($_POST['new_crop'])."'");
	break;

	case "updatethumbsize":
		$upquery = sql_query("UPDATE ".$pixelpost_db_prefix."config SET thumbwidth='".clean($_POST['thumbwidth'])."', thumbheight='".clean($_POST['thumbheight'])."'");
	break;

	case "updatethumbnails":
		if(function_exists('gd_info'))
		{
			$thumbnail_counter = 0;
			//$dir = "../images"; // images folder
			$dir = rtrim($cfgrow['imagepath'],"/");
			if($handle = opendir($dir))
			{
				while (false !== ($file = readdir($handle)))
				{
					if(is_file($dir."/".$file))
					{
						$thumbnail = createthumbnail($file);
						$thumbnail_counter++;
					} // if
				} // while

				closedir($handle);

				echo "<div class='jcaption'>$admin_lang_optn_thumb_updated</div><div class='content confirm'>$admin_lang_done $thumbnail_counter $admin_lang_optn_updated </div><p />";
			} // if handle
		} // if function exists
	break;

	case "updatecompression":
		$update = sql_query("UPDATE ".$pixelpost_db_prefix."config SET compression='".clean($_POST['new_compression'])."'");
	break;
	case "updatethumbsharpening":
		$update = sql_query("UPDATE ".$pixelpost_db_prefix."config SET thumb_sharpening='".clean($_POST['new_thumb_sharpening'])."'");
	break;
//=========== END OF PAGE THREE: THUMBNAIL ===========

} // end of switch:


if(isset($_GET['optaction']) AND $_GET['optaction'] != "")
{
	if ($lang_error == 0){
		echo "<div class='jcaption'>$admin_lang_optn_upd_done</div><div class='content confirm'>$admin_lang_done <a href='".PHP_SELF."?view=options'>$admin_lang_reload";
		if (isset($_POST['token_time']) AND $_POST['token_time'] < 1 && $_GET['optionsview'] == 'antispam') {
			// token time < 1 minute is not allowed. Correct it and show error mesage.
			$_POST['token_time']=1;
			echo "<br /><br />".$admin_lang_optn_token_error;
		}
		echo "</a></div><p />\n";
	} elseif(isset($_GET['optaction']) AND $_GET['optaction'] == 'updateall' AND $lang_error = 1){
		echo "<div class='jcaption'>$admin_lang_optn_upd_error</div><div class='content'><font color=\"red\">$admin_lang_optn_upd_lang_error</font></div><p />\n";
	}
	
}

echo "<div id='caption'>$admin_lang_options</div>\n<div id='submenu'>";
			$submenucssclass = 'notselected';
if (!isset($_GET['optionsview']) || $_GET['optionsview']=='general')	$submenucssclass = 'selectedsubmenu';

echo "<a href='index.php?view=options&amp;optionsview=general' class='".$submenucssclass."'>$admin_lang_optn_general</a>\n";
			$submenucssclass = 'notselected';

if (isset($_GET['optionsview']) && $_GET['optionsview']=='template')	$submenucssclass = 'selectedsubmenu';

echo "|<a href='index.php?view=options&amp;optionsview=template' class='".$submenucssclass."'>$admin_lang_optn_template</a>\n";
			$submenucssclass = 'notselected';


if (isset($_GET['optionsview']) && $_GET['optionsview']=='thumb')	$submenucssclass = 'selectedsubmenu';

echo "|<a href='?view=options&amp;optionsview=thumb' class='".$submenucssclass."'>$admin_lang_optn_thumbnails</a>\n";
			$submenucssclass = 'notselected';


if (isset($_GET['optionsview']) && $_GET['optionsview']=='antispam')	$submenucssclass = 'selectedsubmenu';

echo "|<a href='?view=options&amp;optionsview=antispam' class='".$submenucssclass."'>$admin_lang_spam</a>\n";

echo_addon_admin_menus($addon_admin_functions,"options");
echo "</div>\n";

// get the config row again after updates
if($cfgquery = mysql_query("select * from ".$pixelpost_db_prefix."config"))	$cfgrow = mysql_fetch_assoc($cfgquery);

eval_addon_admin_workspace_menu("options","options");

	//showoptions();
// functions for view = options
//function showoptions(){
	//global $cfgrow;

if (isset($_GET['optionsview']) AND $_GET['optionsview'] == 'general' OR isset($_GET['optionsview']) AND $_GET['optionsview']=='' OR !isset($_GET['optionsview']))
{
		$decoded_pass = "";
		$_POST['newadminpass'] ='';
		$pixelpost_site_title = $cfgrow['sitetitle'];
		$pixelpost_site_title = pullout($cfgrow['sitetitle']);
		$pixelpost_site_title = htmlspecialchars($pixelpost_site_title,ENT_QUOTES);
		
		$pixelpost_sub_title = $cfgrow['subtitle'];
		$pixelpost_sub_title = pullout($cfgrow['subtitle']);
		$pixelpost_sub_title = htmlspecialchars($pixelpost_sub_title,ENT_QUOTES);
		echo "
			<form method='post' action='".$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']."&amp;optaction=updateall' accept-charset='UTF-8'>
			<div class='jcaption'>
			$admin_lang_optn_title_url
			</div>

			<div class='content'>
			$admin_lang_optn_title_url_text<p />
			$admin_lang_optn_title&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='new_site_title' value='".$pixelpost_site_title."' class='input' style='width:300px;' />
			<p />
			
			$admin_lang_optn_sub_title&nbsp;&nbsp;<input type='text' name='new_sub_title' value='".$pixelpost_sub_title."' class='input' style='width:300px;' />
			<p />

		$admin_lang_optn_url&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='new_site_url' value='".$cfgrow['siteurl']."' class='input' style='width:300px;' />
		<p />
		$admin_lang_optn_tip
		</div>

		<div class='jcaption'>
		$admin_lang_optn_usr_pss
		</div>
		<div class='content'>
		$admin_lang_optn_usr_pss_txt <p />
		$admin_lang_optn_usr <input type='text' name='new_admin_user' value='".$cfgrow['admin']."' />

		$admin_lang_optn_pss <input type='password' name='newadminpass' value='$decoded_pass' />
		$admin_lang_optn_pss_re <input type='password' name='newadminpass_re' value=''  />
		<input type='hidden' name='passchanged' value='no' />
  	</div>

		<div class='jcaption'>
		$admin_lang_optn_lang_file
		</div>

		<div class='content'>
		$admin_lang_optn_lang<br/>
		<select name='new_lang'>
		<option value='".$cfgrow['langfile']."'>".$cfgrow['langfile']."</option>
		";
		// go through language folder
		$dir = "../language";
		
		$langFiles = array(); 
         
        if($handle = opendir($dir)) { 
            while(false !== ($file = readdir($handle))) {
			
				if(is_file('../language/'.$file) && ($file != "index.html")) {
				
					$file = ereg_replace("lang-","",$file);
					$file = ereg_replace(".php","",$file);
					// check that admin-language-files are not listed
					$admin_pre = substr("$file",0,6);
					if($admin_pre != "admin-"){
						if($file !== $cfgrow['langfile']) {
							$langFiles[] = $file; 
						}
					}
				}
			}
            
            closedir($handle); 
        } 
         
        sort($langFiles); 
         
        foreach($langFiles as $val){ 
            echo "<option value='$val'>$val</option>"; 
        }
		
		echo "</select><p />";
		// Alternative language settings
		echo "$admin_lang_optn_alt_lang<br />
		<select name='alt_lang'>";
		if ($cfgrow['altlangfile'] != 'Off')
		{
			echo " <option value='".$cfgrow['altlangfile']."'>".$cfgrow['altlangfile']."</option>
			<option value='Off'> -=$admin_lang_optn_alt_lang_dis=-</option>";
		} else {
			echo "<option value='Off'>".ucfirst($admin_lang_optn_alt_lang_no)."</option>";
		}
		// go through language folder
		$dir = "../language";
			
		$altLangFiles = array(); 
         
        if($handle = opendir($dir)) { 
            while(false !== ($file = readdir($handle))) {
			
				if(is_file('../language/'.$file) && ($file != "index.html")) {
				
					$file = ereg_replace("lang-","",$file);
					$file = ereg_replace(".php","",$file);
					// check that admin-language-files are not listed
					$admin_pre = substr("$file",0,6);
					if($admin_pre != "admin-"){
						if($file !== $cfgrow['langfile']) {
							$altLangFiles[] = $file; 
						}
					}
				}
			}
			
            closedir($handle); 
        } 
         
        sort($altLangFiles); 
         
        foreach($altLangFiles as $val){ 
            echo "<option value='$val'>$val</option>"; 
        }
        
		echo "
			</select></div>
			
		<div class='jcaption'>
		$admin_lang_optn_lang_file_admin
		</div>

		<div class='content'>
		<select name='new_admin_lang'>";
		if (!isset($cfgrow['admin_langfile'])) $cfgrow['admin_langfile'] = $cfgrow['langfile'];
		echo "<option value='".$cfgrow['admin_langfile']."'>".$cfgrow['admin_langfile']."</option>
		";
		// go through language folder
		$dir = "../language";
		
		$adminLangFiles = array(); 
         
        if($handle = opendir($dir)) { 
			while (false !== ($file = readdir($handle))) {
			
				$admin_pre = substr("$file",0,6);
				// only admin-language-files are listed
				if(is_file('../language/'.$file) && ($file != "index.html") && $admin_pre == "admin-") {
					$file = ereg_replace("admin-lang-","",$file);
					$file = ereg_replace(".php","",$file);
					if ($file !== $cfgrow['admin_langfile']) {
						$adminLangFiles[] = $file;
					}
				}
			}
			
            closedir($handle); 
        } 
         
        sort($adminLangFiles); 
         
        foreach($adminLangFiles as $val){ 
            echo "<option value='$val'>$val</option>"; 
        }
			
		echo "</select></div>
		
		
		<div class='jcaption'>
		$admin_lang_optn_email
		</div>

		<div class='content'>
		<input type='text' name='new_email' value='".$cfgrow['email']."' />
		<br />
		$admin_lang_optn_fillit
		</div>


		<div class='jcaption'>
		$admin_lang_optn_img_path
		</div>

		<div class='content'>
		<input type='text' name='new_image_path' value='".$cfgrow['imagepath']."' style='width:300px;' /> <br /><br />
		<input type='text' name='new_thumbnail_path' value='".$cfgrow['thumbnailpath']."' style='width:300px;' /> <br />
		<br />";
		echo str_replace("http://www.pixelpost.org/", "../images/ or ../thumbnails/", $admin_lang_optn_tip);
		echo"</div>


		<div class='jcaption'>
		$admin_lang_optn_tz: ".gmdate($cfgrow['dateformat'],time()+(3600 * $cfgrow['timezone']))." localtime
		</div>
		<div class='content'>
		$admin_lang_optn_tz_txt <br />
		<select name='timezone'>
			".timezone_select()."
		</select>";
		echo "
		$admin_lang_optn_gmt<p />
		</div>
		<!-- Allow commenting on pictures -->
		<div class='jcaption'>$admin_lang_optn_comment_setting</div>
    <div class='content'>$admin_lang_optn_cmnt_mod_txt
    		<select name=\"global_comments\">";
		echo "
				<option value=\"A\"".($cfgrow['global_comments']=='A'?' selected="selected"':'').">$admin_lang_optn_cmnt_mod_allowed</option>
				<option value=\"M\"".($cfgrow['global_comments']=='M'?' selected="selected"':'').">$admin_lang_optn_cmnt_mod_moderation</option>
				<option value=\"F\"".($cfgrow['global_comments']=='F'?' selected="selected"':'').">$admin_lang_optn_cmnt_mod_forbidden</option>";    		
 		echo"</select></div>
		<div class='jcaption'>
		$admin_lang_optn_sendemail
		</div>
		<div class='content'>
										";
				if ($cfgrow['commentemail']=='yes')
					$toecho = $admin_lang_optn_yes;
				else
					$toecho = $admin_lang_optn_no;

				if ($cfgrow['commentemail']=='yes')
					$optnecho = $admin_lang_optn_no;
				else
					$optnecho = $admin_lang_optn_yes;

				if ($cfgrow['commentemail']=='yes')
					$optnval = 'no';
				else
					$optnval = 'yes';
				echo "
		$admin_lang_optn_sendemail_txt
		<select name='new_commentemail'>
		<option value='".$cfgrow['commentemail']."'>".$toecho."</option>
		<option value='$optnval'>$optnecho</option>
		</select>
										";
				if ($cfgrow['htmlemailnote']=='yes')
					$toecho = $admin_lang_optn_yes;
				else
					$toecho = $admin_lang_optn_no;

				if ($cfgrow['htmlemailnote']=='yes')
					$optnecho = $admin_lang_optn_no;
				else
					$optnecho = $admin_lang_optn_yes;

				if ($cfgrow['htmlemailnote']=='yes')
					$optnval = 'no';
				else
					$optnval = 'yes';
				echo "
		$admin_lang_optn_sendemail_html_txt
		<select name='new_htmlemailnote'>
		<option value='".$cfgrow['htmlemailnote']."'>".$toecho."</option>
		<option value='$optnval'>$optnecho</option>
		</select>
		</div>

		<!-- comment moderation
		<div class='jcaption'>
		// $ admin_lang_optn_comment_moderation
		</div> -->

		<!-- Timestamp -->
		<div class='jcaption'>
		$admin_lang_optn_timestamps_title
		</div>

		<div class='content'>
				";
		if ($cfgrow['timestamp']=='yes')
			$toecho = $admin_lang_optn_yes;
		else
			$toecho = $admin_lang_optn_no;

		if ($cfgrow['timestamp']=='yes')
			$optnecho = $admin_lang_optn_no;
		else
			$optnecho = $admin_lang_optn_yes;

		if ($cfgrow['timestamp']=='yes')
			$optnval = 'no';
		else
			$optnval = 'yes';

		echo "
		$admin_lang_optn_timestamps_desc
		<select name='timestamp'><option value='".$cfgrow['timestamp']."'>".$toecho."</option>
		<option value='$optnval'>$optnecho</option>
		</select>

		</div>

		<!-- Visitor Booking -->
				<div class='jcaption'>
				$admin_lang_optn_visitorbooking_title
				</div>

				<div class='content'>
						";
				if ($cfgrow['visitorbooking']=='yes')
					$toecho = $admin_lang_optn_yes;
				else
					$toecho = $admin_lang_optn_no;

				if ($cfgrow['visitorbooking']=='yes')
					$optnecho = $admin_lang_optn_no;
				else
					$optnecho = $admin_lang_optn_yes;

				if ($cfgrow['visitorbooking']=='yes')
					$optnval = 'no';
				else
					$optnval = 'yes';

				echo "
				$admin_lang_optn_visitorbooking_desc
				<select name='visitorbooking'><option value='".$cfgrow['visitorbooking']."'>".$toecho."</option>
				<option value='$optnval'>$optnecho</option>
				</select>

				</div>

		<!-- Markdown -->
				<div class='jcaption'>
				$admin_lang_optn_markdown
				</div>

				<div class='content'>
						";
				if ($cfgrow['markdown']=='T')
					$toecho = $admin_lang_optn_yes;
				else
					$toecho = $admin_lang_optn_no;

				if ($cfgrow['markdown']=='T')
					$optnecho = $admin_lang_optn_no;
				else
					$optnecho = $admin_lang_optn_yes;

				if ($cfgrow['markdown']=='T')
					$optnval = 'F';
				else
					$optnval = 'T';

				echo "
				$admin_lang_optn_markdown_desc
				<select name='markdown'><option value='".$cfgrow['markdown']."'>".$toecho."</option>
				<option value='$optnval'>$optnecho</option>
				</select>

				</div>
				<div class='jcaption'>
				$admin_lang_optn_exif
				</div>

				<div class='content'>
						";
				if ($cfgrow['exif']=='T')
					$toecho = $admin_lang_optn_yes;
				else
					$toecho = $admin_lang_optn_no;

				if ($cfgrow['exif']=='T')
					$optnecho = $admin_lang_optn_no;
				else
					$optnecho = $admin_lang_optn_yes;

				if ($cfgrow['exif']=='T')
					$optnval = 'F';
				else
					$optnval = 'T';
				
				echo "
				$admin_lang_optn_exif_desc
				<select name='exif'><option value='".$cfgrow['exif']."'>".$toecho."</option>
				<option value='$optnval'>$optnecho</option>
				</select>

				</div>";
				
				$feed_title = pullout($cfgrow['feed_title']);
				$feed_title = htmlspecialchars($feed_title,ENT_QUOTES);
				
				$feed_description = pullout($cfgrow['feed_description']);
				$feed_description = htmlspecialchars($feed_description,ENT_QUOTES);
				
				$feed_copyright = pullout($cfgrow['feed_copyright']);
				$feed_copyright = htmlspecialchars($feed_copyright,ENT_QUOTES);
				
				$feed_external = pullout($cfgrow['feed_external']);
				
				echo "
				<!-- RSS feed options -->
				<div class='jcaption'>$admin_lang_optn_rss_setting</div>
    			<div class='content'>
    			$admin_lang_optn_rss_title:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"text\" name=\"feed_title\" value=\"".$feed_title."\" style=\"width:300px;\" />
    			<br /><br />
    			$admin_lang_optn_rss_desc:&nbsp;&nbsp;<input type=\"text\" name=\"feed_description\" value=\"".$feed_description."\" style=\"width:300px;\" />
    			<br /><br />
    			$admin_lang_optn_rss_copyright:&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"text\" name=\"feed_copyright\" value=\"".$feed_copyright."\" style=\"width:300px;\" />
    			<br /><br />
    			$admin_lang_optn_rss_discovery:
    			<select name=\"feed_discovery\" onchange=\"if (this.selectedIndex=='3') { flip('external_feed_discovery'); }else{ hide('external_feed_discovery'); }return false;\" >";
    		echo "
    			<option value=\"RA\"".($cfgrow['feed_discovery']=='RA'?' selected="selected"':'').">".$admin_lang_optn_rss_opt_both."</option>
    			<option value=\"R\"".($cfgrow['feed_discovery']=='R'?' selected="selected"':'').">".$admin_lang_optn_rss_opt_rss."</option>
    			<option value=\"A\"".($cfgrow['feed_discovery']=='A'?' selected="selected"':'').">".$admin_lang_optn_rss_opt_atom."</option>
    			<option value=\"E\"".($cfgrow['feed_discovery']=='E'?' selected="selected"':'').">".$admin_lang_optn_rss_opt_ext."</option>
    			<option value=\"N\"".($cfgrow['feed_discovery']=='N'?' selected="selected"':'').">".$admin_lang_optn_rss_opt_none."</option>";
    		echo "
    			</select>
    			<br /><br />
    			<div id=\"external_feed_discovery\">
    			$admin_lang_optn_rss_ext_type: 
    			<select name=\"feed_external_type\">";
    		echo "<option value=\"ER\"".($cfgrow['feed_external_type']=='ER'?' selected="selected"':' class="ER"').">".$admin_lang_optn_rss_opt_rss."</option>
 					<option value=\"EA\"".($cfgrow['feed_external_type']=='EA'?' selected="selected"':' class="EA"').">".$admin_lang_optn_rss_opt_atom."</option>";
 				echo "
    			</select>
    			<br /><br />
    			$admin_lang_optn_rss_ext:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"text\" name=\"feed_external\" value=\"".$feed_external."\" style=\"width:300px;\" />
    			<br />
    			$admin_lang_example: http://feeds.feedburner.com/YourBurnedBlog
    			<br /><br />
    			</div>";
    			// always show the external feed option if selected
    			if($cfgrow['feed_discovery'] != 'E')
    			{
    				echo "<script type=\"text/javascript\">flip('external_feed_discovery');</script>";
    			}
    			if ($cfgrow['allow_comment_feed']=='Y'){
					$toecho = $admin_lang_optn_yes;
				}else{
					$toecho = $admin_lang_optn_no;
				}
				if ($cfgrow['allow_comment_feed']=='Y'){
					$optnecho = $admin_lang_optn_no;
				}else{
					$optnecho = $admin_lang_optn_yes;
				}
				if ($cfgrow['allow_comment_feed']=='Y'){
					$optnval = 'N';
				}else{
					$optnval = 'Y';
				}
				echo "
				$admin_lang_optn_rss_enable_comment_feed:
				<select name=\"allow_comment_feed\">
				<option value=\"".$cfgrow['allow_comment_feed']."\">".$toecho."</option>
				<option value=\"".$optnval."\">".$optnecho."</option>
				</select>
    			<br /><br />
    			$admin_lang_optn_rsstype_desc 
    			<select name=\"rsstype\">";
    		echo "
    			<option value=\"F\"".($cfgrow['rsstype']=='F'?' selected="selected"':'').">$admin_lang_optn_rss_full</option>
    			<option value=\"FO\"".($cfgrow['rsstype']=='FO'?' selected="selected"':'').">$admin_lang_optn_rss_full_only</option>
    			<option value=\"T\"".($cfgrow['rsstype']=='T'?' selected="selected"':'').">$admin_lang_optn_rss_thumbs</option>
    			<option value=\"O\"".($cfgrow['rsstype']=='O'?' selected="selected"':'').">$admin_lang_optn_rss_thumbs_only</option>
    			<option value=\"N\"".($cfgrow['rsstype']=='N'?' selected="selected"':'').">$admin_lang_optn_rss_text</option>";	
			echo"</select><br /><br />
			$admin_lang_optn_feeditems_desc <input type='text' style=\"text-align: right;\" size=\"2\" name='feeditems' value='".$cfgrow['feeditems']."' />
			</div>
			<div class='jcaption'>
				$admin_lang_optn_img_display
				</div>
				<div class='content'>$admin_lang_optn_img_display_desc";
				echo "<select name=\"display_sort_by\">";
				echo "
					<option value=\"datetime\"".($cfgrow['display_sort_by']=='datetime'?' selected="selected"':'').">$admin_lang_ni_datetime</option>
					<option value=\"headline\"".($cfgrow['display_sort_by']=='headline'?' selected="selected"':'').">$admin_lang_ni_image_title</option>
					<option value=\"body\"".($cfgrow['display_sort_by']=='body'?' selected="selected"':'').">$admin_lang_ni_description</option>";
				echo"</select>";

				if ($cfgrow['display_order']=='default')
					$toecho = $admin_lang_optn_img_display_default;
				else
					$toecho = $admin_lang_optn_img_display_reversed;

				if ($cfgrow['display_order']=='default')
					$optnecho = $admin_lang_optn_img_display_reversed;
				else
					$optnecho = $admin_lang_optn_img_display_default;

				if ($cfgrow['display_order']=='default')
					$optnval = 'reversed';
				else
					$optnval = 'default';
				
				echo "
				<select name='display_order'><option value='".$cfgrow['display_order']."'>".$toecho."</option>
				<option value='$optnval'>$optnecho</option>
				</select>

				</div>
		<div class='jcaption'>
				$admin_lang_optn_update
				</div>

		<div class='content'>
		<input type='submit' value='$admin_lang_optn_update'  />
		</div>
		</form>
		";

	} // end option / general

	if (isset($_GET['optionsview']) AND $_GET['optionsview'] == 'template')
	{
	echo "

		<div class='jcaption'>
		$admin_lang_optn_switch_template
		</div>

		<div class='content'>
		<form method='post' action='".$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']."&amp;optaction=updatetemplate' accept-charset='UTF-8'>
		<select name='new_template'>
		<option value='".$cfgrow['template']."'>".$cfgrow['template']."</option>
		";
		// go through template folder
		$dir = "../templates";
		$tmplFiles = array(); 
         
        if($handle = opendir($dir)) { 
            while (false !== ($file = readdir($handle))) { 
                if($file != "." && $file != ".." && $file != "splash_page.html" && $file != "index.html" && $file != $cfgrow['template']) { 
                    $tmplFiles[] = $file; 
                } 
            } 
            closedir($handle); 
        } 
         
        sort($tmplFiles); 
         
        foreach($tmplFiles as $val){ 
            echo "<option value='$val'>$val</option>"; 
        }
		echo "
		</select>
		<input type='submit' value='$admin_lang_optn_update' />
		</form>
		</div>


	     <div class='jcaption'>
		$admin_lang_optn_dateformat
		</div>

		<div class='content'>
		<form method='post' action='".$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']."&amp;optaction=updatedateformat' accept-charset='UTF-8'>
		$admin_lang_optn_dateformat_txt<p />
		<input type='text' name='new_dateformat' value='".$cfgrow['dateformat']."' style='width:150px;' />
		<input type='submit' value='$admin_lang_optn_update' />
		</form>
		</div>

		<div class='jcaption'>
		$admin_lang_optn_cat_link_format
		</div>

		<div class='content'>
		<form name='catformatform' method='post' action='".$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']."&amp;optaction=updatecatformat' accept-charset='UTF-8' >
		$admin_lang_optn_cat_link_format_txt<br />
		<select name='catformat' onchange=\"if (this.selectedIndex=='6') { flip('costumcatformat'); }else{ hide('costumcatformat'); } return false;\" >";
		if($cfgrow['catglueend'] == "")
		{
      $catglue = "Select Category Links Format";
    }
    else
    {
      $catglue = $cfgrow['catgluestart'] . "category-1" . $cfgrow['catglueend']." ".$cfgrow['catgluestart']. "category-2" . $cfgrow['catglueend']." ".$cfgrow['catgluestart'] . "etc" . $cfgrow['catglueend'];
    }
		echo"
		<option value='".$cfgrow['catglueend']."' >$catglue</option>

		<option value='[' >[category-1] [category-2] [etc]</option>
		<option value='	,'>category-1, category-2, etc</option>
		<option value=' -'>category-1 - category-2 - etc</option>
		<option value=' |'>category-1 | category-2 | etc</option>
		<option value=' /'>category-1 / category-2 / etc</option>
		<option value='custom' >custom...</option>

		</select>

		<div id='costumcatformat'>
		<p />
		 $admin_lang_optn_catlinkformat_custom_start <input type='text' name='startcatformat' class='input' size='3' value='[' />
		$admin_lang_optn_catlinkformat_custom_end  <input type='text' name='endcatformat' size='3' value=']' />
		</div>
		<script type='text/javascript'>flip('costumcatformat');</script>
		<input type='submit' value='$admin_lang_optn_update' />

		</form>
		</div>


		<div class='jcaption'>
		$admin_lang_optn_calendar_type
		</div>

		<div class='content'>
		<form method='post' action='".$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']."&amp;optaction=updatecalendar' accept-charset='UTF-8'>
		<select name='cal'>
		";
		echo "
		<option value='Horizontal'".($cfgrow['calendar']=='Horizontal'?' selected="selected"':'').">Horizontal</option>
		<option value='Normal'".($cfgrow['calendar']=='Normal'?' selected="selected"':'').">Normal</option>
		<option value='No Calendar'".($cfgrow['calendar']=='No Calendar'||$cfgrow['calendar']==''?' selected="selected"':'').">Don't Use a Calendar</option>
		</select>
		<input type='submit' value='$admin_lang_optn_update' />
		</form>
		</div>


	";
	}
	if (isset($_GET['optionsview']) AND $_GET['optionsview'] == 'thumb')
	{

	echo "

		<div class='jcaption'>
		$admin_lang_optn_thumb_row
		</div>

		<div class='content'>
		<form method='post' action='".$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']."&amp;optaction=updatethumbrow' accept-charset='UTF-8'>
		$admin_lang_optn_thumb_row_txt<p />
		<input type='text' name='thumbnumber' value='".$cfgrow['thumbnumber']."' style='width:50px;' />
		<input type='submit' value='$admin_lang_optn_update' />
		</form>
		</div>

		<div class='jcaption'>
		$admin_lang_optn_crop_thumbs
		</div>

		<div class='content'>
		<form method='post' action='".$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']."&amp;optaction=updatecrop' accept-charset='UTF-8'>
		$admin_lang_optn_crop_thumbs_txt<p />
		<select name='new_crop'>";
		$cropmethod = $cfgrow['crop'];
		echo "
		<option value='yes'".($cropmethod=='yes'?' selected=\'selected\'':'').">$admin_lang_optn_yes</option>
		<option value='12c'".($cropmethod=='12c'?' selected=\'selected\'':'').">12CropImage</option>
		<option value='no'".($cropmethod=='no'?' selected=\'selected\'':'').">$admin_lang_optn_no</option>
		</select>
		<input type='submit' value='$admin_lang_optn_update' />
		</form>
		</div>

		<div class='jcaption'>
		$admin_lang_optn_thumb_size
		</div>

		<div class='content'>
		<form method='post' action='".$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']."&amp;optaction=updatethumbsize' accept-charset='UTF-8'>
		$admin_lang_optn_thumb_size_txt<br />
		<input type='text' name='thumbwidth' value='".$cfgrow['thumbwidth']."' /> x
		<input type='text' name='thumbheight' value='".$cfgrow['thumbheight']."' />
		<input type='submit' value='$admin_lang_optn_thumb_size_new' />
		</form><p />

		<form method='post' action='".$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']."&amp;optaction=updatethumbnails' accept-charset='UTF-8'>
		<input type='submit' value='$admin_lang_optn_reg_thumbs_button' /><br />$admin_lang_optn_regen_thumbs_txt
		</form>
		</div>

		<div class='jcaption'>
		$admin_lang_optn_img_compression
		</div>

		<div class='content'>
		$admin_lang_optn_img_compression_txt<p />
		<form method='post' action='".$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']."&amp;optaction=updatecompression' accept-charset='UTF-8'>
		<input type='text' name='new_compression' value='".$cfgrow['compression']."' style='width:50px;' />
		<input type='submit' value='$admin_lang_optn_update' />
		</form>
		</div>

		<div class='jcaption'>
		$admin_lang_optn_thumb_sharp
		</div>

		<div class='content'>
		$admin_lang_optn_thumb_sharp_txt<p />
		<form method='post' action='".$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']."&amp;optaction=updatethumbsharpening' accept-charset='UTF-8'>
		<select name='new_thumb_sharpening' value='".$cfgrow['thumb_sharpening']."' style='width:150px;'>";

	for($i = 0; $i < 5; $i++)
	{
		echo '
			<option value="' . $i . '"' . (($i==$cfgrow['thumb_sharpening']) ? ' selected' : '') . '>' . ${'admin_lang_optn_thumb_sharp'.$i} . '</option>';
	}

	echo "
		</select>
		<input type='submit' value='$admin_lang_optn_update' />
		</form>
		</div>
		";
    };


    if(isset($_GET['optionsview']) AND $_GET['optionsview'] == 'antispam'){
    
    	if (isset($_GET['optaction']) AND $_GET['optaction']=='updateantispam'){
				// token
				// DSBL settings
				// SPAM Flood settings
				// Maximum URI in comment
				$upquery = sql_query(
					"UPDATE ".$pixelpost_db_prefix."config
					SET
						token='".clean($_POST['token'])."',
						token_time='".(int) $_POST['token_time']."',
						comment_timebetween='".(int) $_POST['comment_timebetween']."',
						max_uri_comments='".(int) $_POST['max_uri_comment']."'
						");
				// refresh the settings
				$cfgrow = sql_array("SELECT * FROM ".$pixelpost_db_prefix."config");
			} 
    	show_anti_spam();
    	
    	echo "<form method='post' action='".$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']."&amp;optaction=updateantispam&' accept-charset='UTF-8'>
    		<div class='jcaption'>
				$admin_lang_optn_token
				</div>

				<div class='content'>
						";
				if ($cfgrow['token']=='T')
					$toecho = $admin_lang_optn_yes;
				else
					$toecho = $admin_lang_optn_no;

				if ($cfgrow['token']=='T')
					$optnecho = $admin_lang_optn_no;
				else
					$optnecho = $admin_lang_optn_yes;

				if ($cfgrow['token']=='T')
					$optnval = 'F';
				else
					$optnval = 'T';

				echo "
				$admin_lang_optn_token_desc
				<select name='token'><option value='".$cfgrow['token']."'>".$toecho."</option>
				<option value='$optnval'>$optnecho</option>
				</select><br />
				$admin_lang_optn_token_time <input type='text' style=\"text-align: right;\" size=\"1\" name='token_time' value='".$cfgrow['token_time']."' />
				</div>
				
				<div class='jcaption'>
				$admin_lang_optn_time_between_comments
				</div>
				<div class='content'>
				$admin_lang_optn_time_between_comments_desc <input type='text' style=\"text-align: right;\" size=\"2\" name='comment_timebetween' value='".$cfgrow['comment_timebetween']."' /> s
				</div>
				<div class='jcaption'>
				$admin_lang_optn_max_uri_comment
				</div>
				<div class='content'>
				$admin_lang_optn_max_uri_comment_desc <input type='text' style=\"text-align: right;\" size=\"2\" name='max_uri_comment' value='".$cfgrow['max_uri_comments']."' />
				</div>";
				eval_addon_admin_workspace_menu("additional_spam_measures","");
				echo "<div class='jcaption'>
				$admin_lang_optn_update
				</div>

		<div class='content'>
		<input type='submit' value='$admin_lang_optn_update'  />
		</div>
		</form>";
		}

} // end if view options    }

//========================== functions =================================

// do show anti spam in admin >> option page
function show_anti_spam()
{
// update it if neccessary
$additional_msg = update_banlist();
$additional_msg .= moderate_past_with_list();
$additional_msg .= delete_past_with_list();
$additional_msg .= delete_from_badreferer_list();
$html = options_anti_spam_html($additional_msg);
echo $html;

}
// create options HTML code
function options_anti_spam_html($additional_msg)
{
global $pixelpost_db_prefix,$admin_lang_spam_ban,$admin_lang_spam_content,$admin_lang_spam_modlist,$admin_lang_spam_blacklist,$admin_lang_spam_reflist,$admin_lang_spam_blacklist_text,$admin_lang_spam_htaccess_text,$admin_lang_spam_check_comm,$admin_lang_spam_del_bad_comm,$admin_lang_spam_del_bad_ref,$admin_lang_spam_updateblacklist;


	$mod_list   = get_moderation_banlist();
	$black_list = get_blacklist();
	$ref_list		= get_ref_ban_list();

	$query = "SELECT acceptable_num_links FROM {$pixelpost_db_prefix}banlist LIMIT 1";
	$result = mysql_query($query) or die( mysql_error());
	if( $row = mysql_fetch_row($result))
		$acceptable_num_links = $row[0];

	// htaccess stuff
	$htaccess = create_htaccess_banlist();


	$HTML = "
		<div class='jcaption'>
		$admin_lang_spam_ban
		</div>
		<div class='content'>
		$admin_lang_spam_content
		<form method='post' action='".$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']."&amp;optionsview=antispam'>\n
		<input type='hidden' name='banlistupdate' value='1' />
		<table >\n
		<tr >
		\t<td style='padding-right:5px;'>\n
				<b>$admin_lang_spam_modlist</b> <br/>
				<textarea name='moderation_list' class='banlists' style='width:200px;height:100px;' rows=\"\" cols=\"\">$mod_list</textarea>
				<br/><a href=\"index.php?view=options&amp;optionsview=antispam&amp;antispamaction=moderation\">$admin_lang_spam_check_comm</a>
		\t</td>\n

		\t<td style='padding-right:5px;'>\n
				<b>$admin_lang_spam_blacklist</b> <br/>
				<textarea name='blacklist' class='banlists' style='width:200px;height:100px;' rows=\"\" cols=\"\">$black_list</textarea>
				<br/><a href=\"index.php?view=options&amp;optionsview=antispam&amp;antispamaction=deletecmnt\">$admin_lang_spam_del_bad_comm</a>
			</td>\n


		\t<td style='padding-right:5px;'>\n
				<b>$admin_lang_spam_reflist </b> <br/>
				<textarea name='ref_ban_list' class='banlists' style='width:200px;height:100px;' rows=\"\" cols=\"\">$ref_list</textarea>
				<br/><a href='index.php?view=options&amp;optionsview=antispam&amp;antispamaction=deleterefs' >$admin_lang_spam_del_bad_ref</a>
			</td>\n


		</tr>\n
		</table >\n
		<input type='submit' value='$admin_lang_spam_updateblacklist' />\n
		</form>
		$additional_msg
		";
		if( isset( $_POST['banlistupdate'])){
			$HTML .="
			<div id='htaccess-deny' >
			$admin_lang_spam_blacklist_text
			<textarea name='htaccess-deny-list' style='width:600px;height:200px;' >$htaccess </textarea>
			</div>";
			}	else{
			$HTML .="
			<p />
			<a href=\"#\" onclick=\"flip('htaccess-deny'); return false;\"><i>$admin_lang_spam_htaccess_text</i></a><p />
			<div id=\"htaccess-deny\" >
			<script type=\"text/javascript\">flip('htaccess-deny');</script>
			$admin_lang_spam_blacklist_text
			<textarea name=\"htaccess-deny-list\" style=\"width:600px;height:200px;\" rows=\"\" cols=\"\">$htaccess</textarea>
			</div>";
			}
		$HTML .="
		</div> <!-- end of content-->
		";
	return $HTML;
}
?>