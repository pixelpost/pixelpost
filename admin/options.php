<?php

// SVN file version:
// $Id$

if(!isset($_SESSION["pixelpost_admin"]) || $cfgrow['password'] != $_SESSION["pixelpost_admin"] || isset($_GET["_SESSION"]["pixelpost_admin"]) AND $_GET["_SESSION"]["pixelpost_admin"] == $_SESSION["pixelpost_admin"] || isset($_POST["_SESSION"]["pixelpost_admin"]) AND $_POST["_SESSION"]["pixelpost_admin"] == $_SESSION["pixelpost_admin"] || isset($_COOKIE["_SESSION"]["pixelpost_admin"]) AND $_COOKIE["_SESSION"]["pixelpost_admin"] == $_SESSION["pixelpost_admin"])
{
	die ("Try another day!!");
}

if(isset($_GET['view']) AND $_GET['view'] == "options")
{
	if(!isset($_GET['optionsview'])){ $_GET['optionsview'] = ''; }
	
	/**
	 * Initialize error array
	 *
	 */
	$error = array();

	////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////
	////
	////					GENERAL OPTIONS SQL 
	////
	////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////
	if(isset($_GET['optionsview']) AND $_GET['optionsview'] == '' OR isset($_GET['optionsview']) AND $_GET['optionsview'] == 'general');
	{
		if(isset($_GET['optaction']) AND $_GET['optaction'] == 'updateall')
		{
			/**
			 * Update title, sub-title, site-url
			 *
			 */
			$site_url = $_POST['new_site_url'];
			
			if(substr($site_url, -1) != '/'){ $site_url = $site_url.'/'; }	// Add the final backslash (/) if missing
			
			$site_url = preg_replace('#[\\\\/]{3,}#', '/', $site_url);		// Remove recursive backslashes
			
			if(strtolower(substr(trim($site_url), 0, 7)) != 'http://')		// Make sure we start with http://
			{
				$site_url	= 'http://'.trim($site_url);
			}
			else
			{
				$site_url	= trim($site_url);
			}
			
			
			/**
			 * Update:*
			 * sitetitle, subtitle, siteurl, commentemail, updatehtmlemailnote,
			 * updateallowcomments, markdown, exif, visitorbooking, timestamp, rsstype,
			 * feed_discovery, feeditems, feed_title, feed_description, feed_copyright, allow_comment_feed
			 *
			 */
			sql_query("
			UPDATE `".$pixelpost_db_prefix."config` SET
			`sitetitle`				=  '".clean($_POST['new_site_title'])."',
			`subtitle`				=  '".clean($_POST['new_sub_title'])."',
			`siteurl`				=  '".clean($site_url)."',
			`commentemail`			=  '".clean($_POST['new_commentemail'])."',
			`htmlemailnote`			=  '".clean($_POST['new_htmlemailnote'])."',
			`global_comments`		=  '".clean($_POST['global_comments'])."',
			`markdown`				=  '".clean($_POST['markdown'])."',
			`exif`					=  '".clean($_POST['exif'])."',
			`visitorbooking`		=  '".clean($_POST['visitorbooking'])."',
			`daysafterlastpost`		=  '".(int) $_POST['daysafterlastpost']."',
			`rsstype`				=  '".clean($_POST['rsstype'])."',
			`feed_discovery`		=  '".clean($_POST['feed_discovery'])."',
			`feeditems`				=  '".(int) $_POST['feeditems']."',
			`feed_title`			=  '".clean($_POST['feed_title'])."',
			`feed_description`		=  '".clean($_POST['feed_description'])."',
			`feed_copyright`		=  '".clean($_POST['feed_copyright'])."',
			`allow_comment_feed`	=  '".clean($_POST['allow_comment_feed'])."',
			`feed_enclosure`		=  '".clean($_POST['allow_feed_enclosure'])."'
			");
			
			/**
			 * Update default and alternative languages
			 *
			 */
			if($_POST['new_lang'] != $_POST['alt_lang'])
			{
				sql_query("
				UPDATE `".$pixelpost_db_prefix."config` SET
				`langfile`		=  '".clean($_POST['new_lang'])."',
				`altlangfile`	=  '".clean($_POST['alt_lang'])."'
				");
			}
			else
			{
				$error['lang'] = $admin_lang_optn_upd_lang_error;
			}
			
			/**
			 * External Feed
			 * Do not bother to update unless the external feed option is selected and not null
			 *
			 */
			if($_POST['feed_discovery'] == 'E' &&  $_POST['feed_external'] != '')
			{
				sql_query("
				UPDATE `".$pixelpost_db_prefix."config` SET
				`feed_external`			=  '".clean($_POST['feed_external'])."',
				`feed_external_type`	=  '".clean($_POST['feed_external_type'])."'
				");
			}
			
			/**
			 * Refresh the settings
			 *
			 */
			$cfgrow = sql_array("SELECT * FROM `".$pixelpost_db_prefix."config`");

		}	// END updateall
	}	// END optionsview / general
	
	////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////
	////
	////					TEMPLATE OPTIONS SQL
	////
	////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////
	if(isset($_GET['optionsview']) AND $_GET['optionsview'] == 'template')
	{
    	if(isset($_GET['optaction']) AND $_GET['optaction'] == 'updatetemp')
    	{
        	/**
         	 * Update:
         	 * template, dateformat, calendar
         	 *
         	 */
			sql_query("UPDATE `".$pixelpost_db_prefix."config` SET
			`template`		=  '".clean($_POST['new_template'])."',
			`dateformat`	=  '".clean($_POST['new_dateformat'])."',
			`calendar`		=  '".clean($_POST['cal'])."'
			");
			
			if($_POST['catformat'] != '')
			{
				if($_POST['catformat'] != 'custom')
				{	// selected from the drop box
					$startcatformat	= '';
					$endcatformat	= clean($_POST['catformat']);
					if($_POST['catformat'] == '[')
					{
						$startcatformat	= '[';
						$endcatformat	= ']';
					}
				}
				else
				{	// custom format
					$startcatformat	= clean($_POST['startcatformat']);
					$endcatformat	= clean($_POST['endcatformat']);
				}
				
				sql_query("
				UPDATE `".$pixelpost_db_prefix."config` SET
				`catgluestart`	=  '" .$startcatformat ."',
				`catglueend`	=  '" .$endcatformat ."'
				");
			}
			
			/**
			 * Refresh the settings
			 *
			 */
			$cfgrow = sql_array("SELECT * FROM `".$pixelpost_db_prefix."config`");
			        	
        }
	}   // END optionsview / template
	
	////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////
	////
	////					THUMBNAIL OPTIONS SQL
	////
	////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////
	if(isset($_GET['optionsview']) AND $_GET['optionsview'] == 'thumb')
    {
    	if(isset($_GET['optaction']) AND $_GET['optaction'] == 'updatethumb' AND isset($_POST['submit']))
    	{
        	/**
         	 * Update:
         	 * thumbnumber, crop, thumbwidth, thumbheight,
         	 * compression, thumb_sharpening
         	 *
         	 */
			sql_query("UPDATE `".$pixelpost_db_prefix."config` SET
			`thumbnumber`		=  '".clean($_POST['thumbnumber'])."',
			`crop`				=  '".clean($_POST['new_crop'])."',
			`thumbwidth`		=  '".clean($_POST['thumbwidth'])."',
			`thumbheight`		=  '".clean($_POST['thumbheight'])."',
			`compression`		=  '".clean($_POST['new_compression'])."',
			`thumb_sharpening`	=  '".clean($_POST['new_thumb_sharpening'])."'
			");
			        	
        }	// END updateuser
        elseif(isset($_GET['optaction']) AND $_GET['optaction'] == 'updatethumb' AND isset($_POST['regenerate']) AND isset($_POST['do']) AND $_POST['do'] == 'do')
		{
			/**
         	 * Update:
         	 * thumbwidth, thumbheight
         	 *
         	 */
			sql_query("UPDATE `".$pixelpost_db_prefix."config` SET
			`thumbwidth`		=  '".clean($_POST['thumbwidth'])."',
			`thumbheight`		=  '".clean($_POST['thumbheight'])."'
			");
			
			/**
         	 * Temporarily raise memory limit to 65M
         	 *
         	 */
			if(function_exists('ini_set'))
			{
				@ini_set('memory_limit','65M');
			}
			
			/**
         	 * Regenerate thumbnails
         	 *
         	 */
			if(function_exists('gd_info'))
			{
				$image	= mysql_query("SELECT `image` FROM `{$pixelpost_db_prefix}pixelpost`");

				$dir	= rtrim($cfgrow['imagepath'],"/");

				$thumbnail_counter = 0;
				while($row = mysql_fetch_assoc($image))
				{	
					if(file_exists($dir.'/'.$row['image']))
					{
						$thumbnail = createthumbnail($row['image']);
						$thumbnail_counter++;
					}
				}
				echo "<div class='jcaption'>$admin_lang_optn_thumb_updated</div><div class='content confirm'>$admin_lang_done $thumbnail_counter $admin_lang_optn_updated </div><p>&nbsp;</p>";
			}
		}
		if(isset($_GET['optaction']) AND $_GET['optaction'] == 'updatethumb' AND isset($_POST['submit']) OR isset($_GET['optaction']) AND $_GET['optaction'] == 'updatethumb' AND isset($_POST['regenerate']))
		{
			/**
			 * Refresh the settings
			 *
			 */
			$cfgrow = sql_array("SELECT * FROM `".$pixelpost_db_prefix."config`");
		}
	}   // END optionsview / thumbnails
	
	////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////
	////
	////					ANTISPAM OPTIONS SQL
	////
	////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////
    if(isset($_GET['optionsview']) AND $_GET['optionsview'] == 'antispam')
    {
    	if(isset($_GET['optaction']) AND $_GET['optaction']=='updateantispam')
    	{
			if(isset($_POST['token_time']) AND $_POST['token_time'] < 1)
			{
				/**
				 * Token time < 1 minute is not allowed. Correct it and show error mesage.
				 *
				 */
				$_POST['token_time'] = 1;
				$error['token_time'] = $admin_lang_optn_token_error;
			}
			
    		/**
    		 * UPDATE;
    		 * token, DSBL, flood, max URI
    		 *
    		 */
    		sql_query("
    		UPDATE `".$pixelpost_db_prefix."config` SET
    		`token`					=  '".clean($_POST['token'])."',
    		`token_time`			=  '".(int) $_POST['token_time']."',
    		`comment_timebetween`	=  '".(int) $_POST['comment_timebetween']."',
    		`max_uri_comments`		=  '".(int) $_POST['max_uri_comment']."'
    		");
    		
    		/**
			 * Refresh the settings
			 *
			 */
    		$cfgrow = sql_array("SELECT * FROM `".$pixelpost_db_prefix."config`");
    	}
    }	// END optionsview / antispam
	
	////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////
	////
	////					USER OPTIONS SQL 
	////
	////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////
	if(isset($_GET['optionsview']) AND $_GET['optionsview'] == 'user')
    {
    	if(isset($_GET['optaction']) AND $_GET['optaction'] == 'updateuser')
    	{
			/**
		 	 * Update admin username / password
		 	 *
		 	 */
        	if($_POST['newadminpass'] != '')
        	{
            	if($_POST['newadminpass_re'] == $_POST['newadminpass'])
            	{
                	$new_pass = md5($_POST['newadminpass']);
                	
                	sql_query("
                	UPDATE `".$pixelpost_db_prefix."config` SET
                	`admin`		=  '".clean($_POST['new_admin_user'])."',
                	`password`	=  '$new_pass'
                	");
                	
                	echo "<div class='content confirm'>$admin_lang_optn_pass_chngd_txt</div>";
                	
                	unset($_SESSION["pixelpost_admin"]);
                	setcookie( "pp_user", "", time()-36000);
                	setcookie( "pp_password", "", time()-36000);
            	}
            	elseif($_POST['newadminpass_re'] != '')
            	{
                	echo "<div class='content confirm'>$admin_lang_optn_pass_notchngd_txt</div>";
            	}
        	}
        	
        	
        	/**
         	 * Update:
         	 * updatetimezone, updateemail, updateadminlang
         	 *
         	 */
        	sql_query("
        	UPDATE `".$pixelpost_db_prefix."config` SET
        	`timezone`			=  '".clean($_POST['timezone'])."',
        	`email`				=  '".clean($_POST['new_email'])."',
        	`admin_langfile`	=  '".clean($_POST['new_admin_lang'])."'
        	");
			
			
			/**
		 	 * Refresh the settings
		 	 *
		 	 */
        	$cfgrow = sql_array("SELECT * FROM `".$pixelpost_db_prefix."config`");
        	
        }
	}   // END optionsview / user
	
	////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////
	////
	////					ADVANCED GENERAL OPTIONS SQL 
	////
	////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////
	if(isset($_GET['advancedview']) AND $_GET['advancedview'] == '' OR isset($_GET['advancedview']) AND $_GET['advancedview'] == 'general')
	{
		if(isset($_GET['optaction']) AND $_GET['optaction'] == 'updateadv_gen')
		{
			/**
			 * Update:
			 * updatethumbnailpath, updateimagepath,
			 * display sort, display order
			 *
			 * @advanced
			 *
			 */
			sql_query("
			UPDATE `".$pixelpost_db_prefix."config` SET
			`thumbnailpath`		=  '".clean($_POST['new_thumbnail_path'])."',
			`imagepath`			=  '".clean($_POST['new_image_path'])."',
			`timestamp`			=  '".clean($_POST['timestamp'])."',
			`display_sort_by`	=  '".clean($_POST['display_sort_by'])."',
			`display_order`		=  '".clean($_POST['display_order'])."'
			");
			
			/**
			 * Refresh the settings
			 *
			 */
			$cfgrow = sql_array("SELECT * FROM `".$pixelpost_db_prefix."config`");

		}	// END updateadv_gen
	}	// END advanced / general
	
	////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////
	////
	////					ADVANCED LOCALIZATION OPTIONS SQL 
	////
	////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////
	if(isset($_GET['advancedview']) AND $_GET['advancedview'] == '' OR isset($_GET['advancedview']) AND $_GET['advancedview'] == 'localization')
	{
		if(isset($_GET['optaction']) AND $_GET['optaction'] == 'updateadv_local' AND !isset($_POST['delete']))
		{
			/**
			 * Clean the posted variables.
			 *
			 */
			$language = strtolower($_POST['language']);
			$language = preg_replace('# {1,}#', '_', trim($language)); // Replace recursive spaces with one underscore
			$language = eregi_replace('[^a-zA-Z_]+','',$language);
							
			$abbreviation  = strtoupper(trim($_POST['abbr']));
			$abbreviation  = eregi_replace('[^A-Z]+','',$abbreviation);
			
			$native_tongue = trim($_POST['native_tongue']);
			
			/**
			 * Perform some simple checks before verifying the new language against the default pixelpost array.
			 * Make sure all fields are filled and make sure the abbr has a string length of exactly two alpha characters.
			 *
			 */
			if(empty($language) OR empty($abbreviation) OR empty($native_tongue))
			{
				$error['newlang_missing'] = $admin_lang_adv_local_err_fields;
			}
			elseif(strlen($abbreviation) < '2' OR  strlen($abbreviation) > '2')
			{
				$error['abbr_strlen'] = $admin_lang_adv_local_err_abbr_strlen;
			}
			else
			{
				/**
				 * Query the database and pullout the default pixelpost language array.
				 *
				 */
				$query = mysql_query("SELECT * FROM `".$pixelpost_db_prefix."localization`");
				$row   = mysql_fetch_array($query,MYSQL_ASSOC);
				
				/**
				 * Unserialize the defualt language array using the UTF8 safe unserialize function, mb_unserialize.
				 *
				 */
				$pp_supp_lang = mb_unserialize(stripslashes($row['pp_supp_lang']));
				
				/**
				 * If a user supplied language array exists,
				 * Unserialize the user language array using the UTF8 safe unserialize function, mb_unserialize,
				 * and merge with the default pixelpost array.
				 *
				 */
				if(!empty($row['user_supp_lang']))
				{
					$user_supp_lang = mb_unserialize(stripslashes($row['user_supp_lang']));
					$pp_supp_lang   = array_merge($pp_supp_lang, $user_supp_lang);
				}
				
				//var_dump($pp_supp_lang);
				
				/**
				 * Create an array of default and user supplied language abbreviations and names.
				 * Used to check for duplicate languages.
				 *
				 */
				$languages		= array();
				$abbreviations	= array();
				foreach($pp_supp_lang as $lang => $abbr)
				{
					$languages[]	 = $lang;		// EG: german
					$abbreviations[] = $abbr[0];	// EG: DE
				}
				
				if(in_array($language, $languages) OR in_array($abbreviation, $abbreviations))
				{
					$error['duplicate'] = $admin_lang_adv_local_err_duplicate;
				}
				else
				{
					/**
					 * Create the new user supplied language array
					 *
					 */
					$user_supp_lang_new = array($language => array($abbreviation,$native_tongue));
					
					/**
					 * Query the database and pullout the user supplied language array.
					 *
					 */
					$query = mysql_query("SELECT `user_supp_lang` FROM `".$pixelpost_db_prefix."localization`");
					$row   = mysql_fetch_array($query,MYSQL_ASSOC);
					
					/**
					 * If a user supplied language array already exists,
					 * Unserialize the user language array using the UTF8 safe unserialize function, mb_unserialize,
					 * and merge with the new user supplied language array.
					 *
					 */
					if(!empty($row['user_supp_lang']))
					{
						$user_supp_lang = mb_unserialize(stripslashes($row['user_supp_lang']));
						$user_supp_lang_new = array_merge($user_supp_lang, $user_supp_lang_new);
					}
					
					/**
					 * Serialize the new array and insert it back into the database
					 *
					 */
					$user_supp_lang_new = addslashes(serialize($user_supp_lang_new));
					
					//var_dump($user_supp_lang_new);
					
					$query = mysql_query("UPDATE `".$pixelpost_db_prefix."localization` SET `user_supp_lang` = '$user_supp_lang_new' WHERE `id` = '1'");
					
					/**
					 * Flag that clears the text boxes upon successfully adding a new language
					 *
					 */
					$lang_success = true;
				}
			}
		}	// END updateadv_local
		if(isset($_GET['optaction']) AND $_GET['optaction'] == 'updateadv_local' AND isset($_POST['delete']))
		{
			$abbr_to_del = $_POST['delete'];
			
			/**
			 * Query the database and pullout the default pixelpost language array.
			 *
			 */
			$query = mysql_query("SELECT `user_supp_lang` FROM `".$pixelpost_db_prefix."localization`");
			$row   = mysql_fetch_array($query,MYSQL_ASSOC);
			
			/**
			 * Unserialize the defualt language array using the UTF8 safe unserialize function, mb_unserialize.
			 *
			 */
			$user_supp_lang = mb_unserialize(stripslashes($row['user_supp_lang']));
			
			
			$user_supp_lang_new = array();
			foreach($user_supp_lang as $lang => $abbr)
			{
				if(!in_array($abbr[0], $abbr_to_del))
				{
					$user_supp_lang_new[$lang] = array($abbr[0],$abbr[1]);
				}
			}
			
			/**
			 * Serialize the new array and insert it back into the database
			 *
			 */
			$user_supp_lang_new = addslashes(serialize($user_supp_lang_new));
			
			//var_dump($user_supp_lang_new);
			
			$query = mysql_query("UPDATE `".$pixelpost_db_prefix."localization` SET `user_supp_lang` = '$user_supp_lang_new' WHERE `id` = '1'");
		}
	}	// END advanced / localization
	
	/**
	 * Display error or done when saving
	 *
	 */
	if(isset($_GET['optaction']) AND $_GET['optaction'] != "")
	{
		/**
		 * Show success or error message
		 *
		 */
		if(!sizeof(&$error))
		{
			echo "<div class='jcaption'>$admin_lang_optn_upd_done</div><div class='content confirm'>$admin_lang_done <a href='".PHP_SELF."?view=options'>$admin_lang_reload</a></div><p>&nbsp;</p>";
		}
		else
		{
			$result = implode('<br />', $error);
			echo "<div class='jcaption'>$admin_lang_optn_upd_error</div><div class='content'><font color='red'><strong>$result</strong></font></div><p>&nbsp;</p>";
		}
	}
	
	/**
	 * Options Menu Items
	 *
	 */
	$optn_title = (!isset($_GET['advancedview'])) ? $admin_lang_options : $admin_lang_adv;
	echo "<div id='caption'>$optn_title</div>\n<div id='submenu'>";
	
	if(isset($_GET['advancedview'])) // advanced options
	{
		$submenucssclass = 'notselected';
		if(isset($_GET['advancedview']) AND $_GET['advancedview'] == '' OR isset($_GET['advancedview']) AND $_GET['advancedview'] == 'general' OR !isset($_GET['advancedview']))
		{
			$submenucssclass = 'selectedsubmenu';
		}

		echo "<a href='index.php?view=options&amp;advancedview=general' class='$submenucssclass'>$admin_lang_optn_general</a>\n";
		
		$submenucssclass = 'notselected';
		if(isset($_GET['advancedview']) AND $_GET['advancedview'] == 'localization')
		{
			$submenucssclass = 'selectedsubmenu';
		}

		echo "|<a href='index.php?view=options&amp;advancedview=localization' class='$submenucssclass'>LOCALIZATION</a>";//$admin_lang_localization
		
		$submenucssclass = 'notselected';
		if(isset($_GET['advancedview']) AND $_GET['advancedview'] == 'antispam')
		{
			$submenucssclass = 'selectedsubmenu';
		}

		echo "|<a href='index.php?view=options&amp;advancedview=antispam' class='$submenucssclass'>$admin_lang_spam</a>";
	}
	else // basic options
	{
	
	$submenucssclass = 'notselected';
	if(isset($_GET['optionsview']) AND $_GET['optionsview'] == '' OR isset($_GET['optionsview']) AND $_GET['optionsview'] == 'general' OR isset($_GET['optionsview']) AND $_GET['optionsview'] == '' AND isset($_GET['view']) AND $_GET['view'] == 'options')
	{
		$submenucssclass = 'selectedsubmenu';
	}
	
	echo "<a href='index.php?view=options&amp;optionsview=general' class='".$submenucssclass."'>$admin_lang_optn_general</a>\n";
	
	$submenucssclass = 'notselected';
	if(isset($_GET['optionsview']) && $_GET['optionsview'] == 'template')
	{
		$submenucssclass = 'selectedsubmenu';
	}
	
	echo "|<a href='index.php?view=options&amp;optionsview=template' class='".$submenucssclass."'>$admin_lang_optn_template</a>\n";
	
	$submenucssclass = 'notselected';
	if(isset($_GET['optionsview']) && $_GET['optionsview'] == 'thumb')
	{
		$submenucssclass = 'selectedsubmenu';
	}
	
	echo "|<a href='?view=options&amp;optionsview=thumb' class='".$submenucssclass."'>$admin_lang_optn_thumbnails</a>\n";
	
	$submenucssclass = 'notselected';
	if(isset($_GET['optionsview']) && $_GET['optionsview'] == 'antispam')
	{
		$submenucssclass = 'selectedsubmenu';
	}
	
	echo "|<a href='?view=options&amp;optionsview=antispam' class='".$submenucssclass."'>$admin_lang_spam</a>\n";
	
	$submenucssclass = 'notselected';
	if(isset($_GET['optionsview']) && $_GET['optionsview'] == 'user')
	{
		$submenucssclass = 'selectedsubmenu';
	}
	
	echo "|<a href='?view=options&amp;optionsview=user' class='".$submenucssclass."'>".strtoupper($admin_lang_optn_usr)."</a>\n";
	
	echo_addon_admin_menus($addon_admin_functions,"options");
	
	}
	
	echo '</div>';
	
	if(isset($_GET['advancedview'])) // advanced notice
	{
		echo '
		<div class="jcaption">'.$admin_lang_adv_optn_notice_title.'</div>

		<div class="content">
			<span id="adv_warning">'.$admin_lang_adv_optn_notice.'</span>
		</div>';
	}
	
	/**
	 * Get the config row again after updates
	 *
	 */
	if($cfgquery = mysql_query("SELECT * FROM `".$pixelpost_db_prefix."config`"))
	{
		$cfgrow = mysql_fetch_assoc($cfgquery);
	}
	
	eval_addon_admin_workspace_menu("options","options");
	
	////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////
	////
	////					START PAGE ONE: GENERAL OPTIONS
	////
	////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////
	if(isset($_GET['optionsview']) AND $_GET['optionsview'] == 'general' AND !isset($_GET['advancedview']) OR isset($_GET['optionsview']) AND $_GET['optionsview'] == '' AND !isset($_GET['advancedview']) OR !isset($_GET['optionsview']) AND !isset($_GET['advancedview']))
	{
		/**
		 * Clean site and sub title
		 *
		 */
		$pixelpost_site_title =  htmlspecialchars(pullout($cfgrow['sitetitle']),ENT_QUOTES);
		$pixelpost_sub_title  =  htmlspecialchars(pullout($cfgrow['subtitle']),ENT_QUOTES);
		
		/**
		 * Store language option variables
		 *
		 */
		$default_lang_select = select_option('../language', 'langfile');
		
		if($cfgrow['altlangfile'] != 'Off')
		{
			$alternative_lang_select = "<option value=\"Off\">++".ucfirst($admin_lang_optn_alt_lang_dis)."++</option>";
		}
		else
		{
			$alternative_lang_select = "<option value=\"Off\" selected=\"selected\">".ucfirst($admin_lang_optn_alt_lang_no)."</option>";
		}
		$alternative_lang_select .= select_option('../language', 'altlangfile');
		
		/**
		 * Global Comment Setting option values
		 *
		 */
		$global_comments_select = '';
	    for($i = 0; $i <= 2; $i++)
	    {
		    $sel = '';
		    
		    if($i == 0){
			    $val = 'A';
			    $opt = $admin_lang_optn_cmnt_mod_allowed;
		    }elseif($i == 1){
			    $val = 'M';
			    $opt = $admin_lang_optn_cmnt_mod_moderation;
		    }elseif($i == 2){
			    $val = 'F';
			    $opt = $admin_lang_optn_cmnt_mod_forbidden;
		    }
		    
    	    if($cfgrow['global_comments'] == $val){ $sel=' selected="selected"'; }
            
    	    $global_comments_select .= '<option value="'.$val.'"'.$sel.'>'.$opt.'</option>';
	    }
		
		/**
		 * Send email on comment option values
		 *
		 */
		if($cfgrow['commentemail']=='yes')
		{
			$toecho_ce   = $admin_lang_optn_yes;
			$optnecho_ce = $admin_lang_optn_no;
			$optnval_ce  = 'no';
		}
		else
		{
			$toecho_ce   = $admin_lang_optn_no;
			$optnecho_ce = $admin_lang_optn_yes;
			$optnval_ce  = 'yes';
		}
		
		/**
		 * Send HTML email on comment option values
		 *
		 */
		if($cfgrow['htmlemailnote']=='yes')
		{
			$toecho_ce_html   = $admin_lang_optn_yes;
			$optnecho_ce_html = $admin_lang_optn_no;
			$optnval_ce_html  = 'no';
		}
		else
		{
			$toecho_ce_html   = $admin_lang_optn_no;
			$optnecho_ce_html = $admin_lang_optn_yes;
			$optnval_ce_html  = 'yes';
		}
		
		/**
		 * Visitor booking option values
		 *
		 */
		if($cfgrow['visitorbooking']=='yes')
		{
			$toecho_vb   = $admin_lang_optn_yes;
			$optnecho_vb = $admin_lang_optn_no;
			$optnval_vb  = 'no';
		}
		else
		{
			$toecho_vb   = $admin_lang_optn_no;
			$optnecho_vb = $admin_lang_optn_yes;
			$optnval_vb  = 'yes';
		}
		
		/**
		 * Markdown option values
		 *
		 */
		if($cfgrow['markdown']=='T')
		{
			$toecho_mrkd   = $admin_lang_optn_yes;
			$optnecho_mrkd = $admin_lang_optn_no;
			$optnval_mrkd  = 'F';
		}
		else
		{
			$toecho_mrkd   = $admin_lang_optn_no;
			$optnecho_mrkd = $admin_lang_optn_yes;
			$optnval_mrkd  = 'T';
		}
		
		/**
		 * EXIF option values
		 *
		 */
		if($cfgrow['exif']=='T')
		{
			$toecho_exif   = $admin_lang_optn_yes;
			$optnecho_exif = $admin_lang_optn_no;
			$optnval_exif  = 'F';
		}
		else
		{
			$toecho_exif   = $admin_lang_optn_no;
			$optnecho_exif = $admin_lang_optn_yes;
			$optnval_exif  = 'T';
		}
		
		/**
		 * RSS feed variables and option values
		 *
		 */
		$feed_title		  = htmlspecialchars(pullout($cfgrow['feed_title']),ENT_QUOTES);
		$feed_description = htmlspecialchars(pullout($cfgrow['feed_description']),ENT_QUOTES);
		$feed_copyright	  = htmlspecialchars(pullout($cfgrow['feed_copyright']),ENT_QUOTES);
		$feed_external	  = pullout($cfgrow['feed_external']);
		
		if($cfgrow['allow_comment_feed']=='Y')
    	{
    		$toecho_feed   = $admin_lang_optn_yes;
    		$optnecho_feed = $admin_lang_optn_no;
    		$optnval_feed  = 'N';
    	}
    	else
    	{
    		$toecho_feed   = $admin_lang_optn_no;
    		$optnecho_feed = $admin_lang_optn_yes;
    		$optnval_feed  = 'Y';
    	}
    	
    	if($cfgrow['feed_enclosure']=='Y')
    	{
    		$toecho_feed_enc   = $admin_lang_optn_yes;
    		$optnecho_feed_enc = $admin_lang_optn_no;
    		$optnval_feed_enc  = 'N';
    	}
    	else
    	{
    		$toecho_feed_enc   = $admin_lang_optn_no;
    		$optnecho_feed_enc = $admin_lang_optn_yes;
    		$optnval_feed_enc  = 'Y';
    	}
    	
    	if($cfgrow['feed_external_type']=='ER')
    	{
    		$toecho_feed_type   = $admin_lang_optn_rss_opt_rss;
    		$optnecho_feed_type = $admin_lang_optn_rss_opt_atom;
    		$optnval_feed_type  = 'EA';
    	}
    	else
    	{
    		$toecho_feed_type   = $admin_lang_optn_rss_opt_atom;
    		$optnecho_feed_type = $admin_lang_optn_rss_opt_rss;
    		$optnval_feed_type  = 'ER';
    	}
    	
    	/**
    	 * Always show the external feed option if selected
    	 *
    	 */
    	$show_ext_opt = '';
    	if($cfgrow['feed_discovery'] != 'E')
    	{
    		$show_ext_opt = "<script type=\"text/javascript\">flip('external_feed_discovery');</script>";
    	}
    	
    	$feed_style_select = '';
    	for($i = 0; $i <= 4; $i++)
		{
			$sel = '';
			
			if($i == 0){
				$val = 'F';
				$opt = $admin_lang_optn_rss_full;
			}elseif($i == 1){
				$val = 'F0';
				$opt = $admin_lang_optn_rss_full_only;
			}elseif($i == 2){
				$val = 'T';
				$opt = $admin_lang_optn_rss_thumbs;
			}elseif($i == 3){
				$val = 'O';
				$opt = $admin_lang_optn_rss_thumbs_only;
			}elseif($i == 4){
				$val = 'N';
				$opt = $admin_lang_optn_rss_text;
			}
			
    		if($cfgrow['rsstype'] == $val){ $sel=' selected="selected"'; }
			
    		$feed_style_select .= '<option value="'.$val.'"'.$sel.'>'.$opt.'</option>';
		}
		$feed_type_select = '';
	    for($i = 0; $i <= 4; $i++)
	    {
		    $sel = '';
		    
		    if($i == 0){
			    $val = 'RA';
			    $opt = $admin_lang_optn_rss_opt_both;
		    }elseif($i == 1){
			    $val = 'R';
			    $opt = $admin_lang_optn_rss_opt_rss;
		    }elseif($i == 2){
			    $val = 'A';
			    $opt = $admin_lang_optn_rss_opt_atom;
		    }elseif($i == 3){
			    $val = 'E';
			    $opt = $admin_lang_optn_rss_opt_ext;
		    }elseif($i == 4){
			    $val = 'N';
			    $opt = $admin_lang_optn_rss_opt_none;
		    }
		    
    	    if($cfgrow['feed_discovery'] == $val){ $sel=' selected="selected"'; }
            
    	    $feed_type_select .= '<option value="'.$val.'"'.$sel.'>'.$opt.'</option>';
	    }
		
echo <<<EOE
		
		<form method="post" action="{$_SERVER['PHP_SELF']}?{$_SERVER['QUERY_STRING']}&amp;optaction=updateall" accept-charset="UTF-8">
		
		
		<!-- Site Titles and URL -->
		
		
		<div class="jcaption">$admin_lang_optn_title_url</div>
		
		<div class="content">
			$admin_lang_optn_title_url_text
			<p>&nbsp;</p>
			
			<table border="0" cellspacing="2" cellpadding="0">
				<tr>
					<td align="left">$admin_lang_optn_title</td>
					<td align="right">&nbsp;<input type="text" name="new_site_title" value="$pixelpost_site_title" class="input" style="width:300px;" /></td>
				</tr>
				<tr>
					<td align="left">$admin_lang_optn_sub_title</td>
					<td align="right">&nbsp;<input type="text" name="new_sub_title" value="$pixelpost_sub_title" class="input" style="width:300px;" /></td>
				</tr>
				<tr>
					<td align="left">$admin_lang_optn_url</td>
					<td align="right">&nbsp;<input type="text" name="new_site_url" value="{$cfgrow['siteurl']}" class="input" style="width:300px;" /></td>
				</tr>
			</table>
			<p>&nbsp;</p>
			
			$admin_lang_optn_tip
		</div>
		
		
		<!-- Language Settings -->
		
		
		<div class="jcaption">$admin_lang_optn_lang_file</div>
		
		<div class="content">
			$admin_lang_optn_lang
			<br />
			
			<select name="new_lang">
				$default_lang_select
			</select>
			<p>&nbsp;</p>			
			
			$admin_lang_optn_alt_lang
			<br />
			
			<select name="alt_lang">
				$alternative_lang_select
			</select>
		</div>		
		
		<!-- Allow commenting on pictures -->
		
		
		<div class="jcaption">$admin_lang_optn_comment_setting</div>
		
		<div class="content">
			$admin_lang_optn_cmnt_mod_txt
			<br />
			
			<select name="global_comments">
				$global_comments_select
			</select>
		</div>
		
		
		<!-- Send Email on Comment (yes/no) -->
		
		
		<div class="jcaption">$admin_lang_optn_sendemail</div>
		
		<div class="content">
			$admin_lang_optn_sendemail_txt
			<br />
			
			<select name="new_commentemail">
				<option value="{$cfgrow['commentemail']}">$toecho_ce</option>
				<option value="$optnval_ce">$optnecho_ce</option>
			</select>
			<br /><br />
			
			
		<!-- Send HTML Email (yes/no) -->
			
			
			$admin_lang_optn_sendemail_html_txt
			<br />
			
			<select name="new_htmlemailnote">
				<option value="{$cfgrow['htmlemailnote']}">$toecho_ce_html</option>
				<option value="$optnval_ce_html">$optnecho_ce_html</option>
			</select>
		</div>
		
		
		<!-- Visitor Booking -->
		
		
		<div class="jcaption">$admin_lang_optn_visitorbooking_title</div>
		
		<div class="content">
			$admin_lang_optn_visitorbooking_desc
			<br />
			
			<select name="visitorbooking">
				<option value="{$cfgrow['visitorbooking']}">$toecho_vb</option>
				<option value="$optnval_vb">$optnecho_vb</option>
			</select>
		</div>
		
		
		<!-- Markdown -->
		
		
		<div class="jcaption">$admin_lang_optn_markdown</div>
		
		<div class="content">
			$admin_lang_optn_markdown_desc
			<br />
			
			<select name="markdown">
				<option value="{$cfgrow['markdown']}">$toecho_mrkd</option>
				<option value="$optnval_mrkd">$optnecho_mrkd</option>
			</select>
		</div>
		
		
		<!-- EXIF -->
		
		
		<div class="jcaption">$admin_lang_optn_exif</div>
		
		<div class="content">
			$admin_lang_optn_exif_desc
			<br />
			
			<select name="exif">
				<option value="{$cfgrow['exif']}">$toecho_exif</option>
				<option value="$optnval_exif">$optnecho_exif</option>
			</select>
		</div>
		
		<!-- Post every X days -->
		
		<div class="jcaption">$admin_lang_optn_postafterdays</div>
		
		<div class="content">
			$admin_lang_optn_postafterdays_desc
			&nbsp;<input type="text" name="daysafterlastpost" value="{$cfgrow['daysafterlastpost']}" class="input" style="width:20px;" />
		</div>

		<!-- RSS feed options -->
		
		
		<div class="jcaption">$admin_lang_optn_rss_setting</div>
		
		<div class="content">
			$admin_lang_optn_rss_title:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="feed_title" value="$feed_title" style="width:300px;" />
			<br /><br />
			
			$admin_lang_optn_rss_desc:&nbsp;&nbsp;<input type="text" name="feed_description" value="$feed_description" style="width:300px;" />
			<br /><br />
			
			$admin_lang_optn_rss_copyright:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="feed_copyright" value="$feed_copyright" style="width:300px;" />
			<br /><br />
			
			$admin_lang_optn_rss_discovery:&nbsp;&nbsp;
			
			<select name="feed_discovery" onchange="if (this.selectedIndex=='3') { flip('external_feed_discovery'); }else{ hide('external_feed_discovery'); }return false;" >
				$feed_type_select
    		</select>
    		<br /><br />
    		
    		<div id="external_feed_discovery">
    			$admin_lang_optn_rss_ext_type:
    			
    			<select name="feed_external_type">
    				<option value="{$cfgrow['feed_external_type']}">$toecho_feed_type</option>
					<option value="$optnval_feed_type">$optnecho_feed_type</option>
    			</select>
    			<br /><br />
    			
    			$admin_lang_optn_rss_ext:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="feed_external" value="$feed_external" style="width:300px;" />
    			<br />
    			
    			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$admin_lang_example: http://feeds.feedburner.com/YourBurnedBlog
    			<br /><br />
    		</div>
    		
    		$show_ext_opt

			$admin_lang_optn_rss_enable_comment_feed:
			
			<select name="allow_comment_feed">
				<option value="{$cfgrow['allow_comment_feed']}">$toecho_feed</option>
				<option value="$optnval_feed">$optnecho_feed</option>
			</select>
			<br /><br />
			
			$admin_lang_optn_rss_enable_feed_enc:
			
			<select name="allow_feed_enclosure">
				<option value="{$cfgrow['feed_enclosure']}">$toecho_feed_enc</option>
				<option value="$optnval_feed_enc">$optnecho_feed_enc</option>
			</select>
			<br /><br />
			
			$admin_lang_optn_rsstype_desc 
			
			<select name="rsstype">
				$feed_style_select
    		</select>
    		<br /><br />
    		
			$admin_lang_optn_feeditems_desc
			
			<input type="text" size="2" name="feeditems" value="{$cfgrow['feeditems']}" />
		</div>		
		
		<div class="jcaption">$admin_lang_optn_update</div>
		
		<div class="content">
			<input type="submit" value="$admin_lang_optn_update" />
		</div>
		</form>
		
	</div>
	<div id="footer"><a href="index.php?view=options&amp;advancedview=general" title="$admin_lang_adv_optn_show_adv" id="show_optn">$admin_lang_adv_optn_show_adv</a>
EOE;

	}	// END options / general
	
	////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////
	////
	////					START PAGE TWO: TEMPLATE OPTIONS
	////
	////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////
	if(isset($_GET['optionsview']) AND $_GET['optionsview'] == 'template' AND !isset($_GET['advancedview']))
	{
		$template_select = select_option('../templates', 'template');
		
		/**
		 * Category Format option values
		 *
		 */
		$catglue_select = '';
        if($cfgrow['catglueend'] == '')
		{
			$catglue_select = 'Select Category Links Format';
		}
		
		$standard = array(']' , ' ,' , ' -' , ' |' , ' /');
		
		$custom = false;
		if(!in_array($cfgrow['catglueend'], $standard)){ $custom = true; }
		
	    for($i = 0; $i <= 5; $i++)
	    {
		    $sel = '';
		    
		    if($i == 0){
			    $val = '[';
			    $opt = '[people] [nature] [etc]';
		    }elseif($i == 1){
			    $val = ' ,';
			    $opt = 'people, nature, etc';
		    }elseif($i == 2){
			    $val = ' -';
			    $opt = 'people - nature - etc';
		    }elseif($i == 3){
			    $val = ' |';
			    $opt = 'people | nature | etc';
		    }elseif($i == 4){
			    $val = ' /';
			    $opt = 'people / nature / etc';
		    }elseif($i == 5){
			    $val = 'custom';
			    $opt = 'Custom';
		    }
		    
    	    if($cfgrow['catglueend'] == $val OR $custom){ $sel=' selected="selected"'; }
            
    	    $catglue_select .= '<option value="'.$val.'"'.$sel.'>'.$opt.'</option>';
	    }
	    
	    /**
    	 * Always show the custom catglue option if selected
    	 *
    	 */
    	$show_catglue_custom = '';
    	if(!$custom)
    	{
    		$show_catglue_custom = "<script type=\"text/javascript\">flip('costumcatformat');</script>";
    	}
    	
    	/**
		 * Calendar option values
		 *
		 */
    	$calendar_select = '';
	    for($i = 0; $i <= 2; $i++)
	    {
		    $sel = '';
		    
		    if($i == 0){
			    $val = 'Horizontal';
			    $opt = 'Horizontal';
		    }elseif($i == 1){
			    $val = 'Normal';
			    $opt = 'Normal';
		    }elseif($i == 2){
			    $val = 'No Calendar';
			    $opt = 'Don\'t Use a Calendar';
		    }
		    
    	    if($cfgrow['calendar'] == $val){ $sel=' selected="selected"'; }
            
    	    $calendar_select .= '<option value="'.$val.'"'.$sel.'>'.$opt.'</option>';
	    }
		
echo <<<EOE
		
		<form method="post" name="templateopt" action="{$_SERVER['PHP_SELF']}?{$_SERVER['QUERY_STRING']}&amp;optaction=updatetemp" accept-charset="UTF-8">
		
		<!-- Template Options -->
		
		
		<div class="jcaption">$admin_lang_optn_switch_template</div>
		
		<div class="content">
			<select name="new_template">
				$template_select
			</select>
		</div>
		
		
		<!-- Date Format Options -->
		
		
		<div class="jcaption">$admin_lang_optn_dateformat</div>
		
		<div class="content">			
			$admin_lang_optn_dateformat_txt
			<br /><br />
			
			<input type="text" name="new_dateformat" value="{$cfgrow['dateformat']}" style="width:150px;" /> <input type="button" value="PREVIEW" name="preview" onclick="previewDT()" />
			
			<div id="df_preview"></div>
		</div>
		
		
		<!-- Category Format Options -->
		
		
		<div class="jcaption">$admin_lang_optn_cat_link_format</div>
		
		<div class="content">				
			$admin_lang_optn_cat_link_format_txt
			<br />
			
			<select name="catformat" onchange="if (this.selectedIndex=='5') { flip('costumcatformat'); }else{ hide('costumcatformat'); } return false;" >
				$catglue_select
			</select>
			
			<div id="costumcatformat">
				<table border="0" cellspacing="2" cellpadding="1">
					<tr>
						<td align="left">$admin_lang_optn_catlinkformat_custom_start</td>
						<td align="right"><input type="text" name="startcatformat" class="input" size="3" value="{$cfgrow['catgluestart']}" /></td>
					</tr>
					<tr>
						<td align="left">$admin_lang_optn_catlinkformat_custom_end</td>
						<td align="right"><input type="text" name="endcatformat" size="3" value="{$cfgrow['catglueend']}" /></td>
					</tr>
				</table>
			</div>
			
			$show_catglue_custom
		</div>
		
		
		<!-- Calendar Options -->
		
		
		<div class="jcaption">$admin_lang_optn_calendar_type</div>
		
		<div class="content">
			<select name="cal">
				$calendar_select
			</select>
		</div>
		
		<div class="jcaption">$admin_lang_optn_update</div>
		
		<div class="content">
			<input type="submit" value="$admin_lang_optn_update" />
		</div>
		
		</form>
EOE;

	}	// END options / template
	
	////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////
	////
	////					START PAGE THREE: THUMBNAIL OPTIONS
	////
	////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////
	if(isset($_GET['optionsview']) AND $_GET['optionsview'] == 'thumb' AND !isset($_GET['advancedview']))
	{
		/**
		 * Crop option values
		 *
		 */
		$crop_select = '';
	    for($i = 0; $i <= 2; $i++)
	    {
		    $sel = '';
		    
		    if($i == 0){
			    $val = 'yes';
			    $opt = $admin_lang_optn_yes;
		    }elseif($i == 1){
			    $val = '12c';
			    $opt = '12CropImage';
		    }elseif($i == 2){
			    $val = 'no';
			    $opt = $admin_lang_optn_no;
		    }
		    
    	    if($cfgrow['crop'] == $val){ $sel=' selected="selected"'; }
            
    	    $crop_select .= '<option value="'.$val.'"'.$sel.'>'.$opt.'</option>';
	    }
	    
	    /**
		 * USM option values
		 *
		 */
	    $usm_select = '';
	    for($i = 0; $i < 5; $i++)
	    {
	        $usm_select .= '<option value="'.$i.'"'.(($i == $cfgrow['thumb_sharpening']) ? ' selected="selected"' : '').'>'.${'admin_lang_optn_thumb_sharp'.$i}.'</option>';
		}
		
echo <<<EOE
		
		<form method="post" action="{$_SERVER['PHP_SELF']}?{$_SERVER['QUERY_STRING']}&amp;optaction=updatethumb" accept-charset="UTF-8">
		
		<div class="jcaption">$admin_lang_optn_thumb_row</div>
		
		<div class="content">
			$admin_lang_optn_thumb_row_txt
			<br /><br />
				
			<input type="text" name="thumbnumber" value="{$cfgrow['thumbnumber']}" style="width:50px;" />
		</div>
		
		<div class="jcaption">$admin_lang_optn_crop_thumbs</div>
		
		<div class="content">
			$admin_lang_optn_crop_thumbs_txt
			<br /><br />
				
			<select name="new_crop">
				$crop_select
			</select>
		</div>
		
		<div class="jcaption">$admin_lang_optn_thumb_size</div>
		
		<div class="content">			
			$admin_lang_optn_thumb_size_txt
			<br />
				
			<input type="text" name="thumbwidth" value="{$cfgrow['thumbwidth']}" /> x <input type="text" name="thumbheight" value="{$cfgrow['thumbheight']}" /> <input type="checkbox" name="do" value="do" /> <input type="submit" value="$admin_lang_optn_reg_thumbs_button" name="regenerate" />
			<br /><br />
			
			$admin_lang_optn_regen_thumbs_txt
		</div>
		
		<div class="jcaption">$admin_lang_optn_img_compression</div>
		
		<div class="content">
			$admin_lang_optn_img_compression_txt
			<br /><br />
							
			<input type="text" name="new_compression" value="{$cfgrow['compression']}" style="width:50px;" />
		</div>
		
		<div class="jcaption">$admin_lang_optn_thumb_sharp</div>
		
		<div class="content">
			$admin_lang_optn_thumb_sharp_txt
			<br /><br />
						
			<select name="new_thumb_sharpening" value="{$cfgrow['thumb_sharpening']}" style="width:150px;">";
				$usm_select
			</select>
		</div>
		
		<div class="jcaption">$admin_lang_optn_update</div>
		
		<div class="content">
			<input type="submit" value="$admin_lang_optn_update" name="submit" />
		</div>
		
		</form>
EOE;

	}	// END options / thumbnails
	
	////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////
	////
	////					START PAGE FOUR: ANTISPAM OPTIONS
	////
	////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////
    if(isset($_GET['optionsview']) AND $_GET['optionsview'] == 'antispam' AND !isset($_GET['advancedview']))
    {
    	if($cfgrow['token']=='T')
    	{
    		$toecho_token   = $admin_lang_optn_yes;
    		$optnecho_token = $admin_lang_optn_no;
    		$optnval_token  = 'F';
    	}
    	else
    	{
    		$toecho_token   = $admin_lang_optn_no;
    		$optnecho_token = $admin_lang_optn_yes;
    		$optnval_token  = 'T';
    	}
    	
    	//show_anti_spam(); // Moved to advanced menu
    	
echo <<<EOE

    	<form method="post" action="{$_SERVER['PHP_SELF']}?{$_SERVER['QUERY_STRING']}&amp;optaction=updateantispam&" accept-charset="UTF-8">
    	
    	<div class="jcaption">$admin_lang_optn_token</div>
    	
    	<div class="content">
    		$admin_lang_optn_token_desc
    		
    		<select name="token">
    			<option value="{$cfgrow['token']}">$toecho_token</option>
    			<option value="$optnval_token">$optnecho_token</option>
    		</select>
    		<br /><br />
    		
    		$admin_lang_optn_token_time  
    		
    		<input type="text" size="2" name="token_time" value="{$cfgrow['token_time']}" style="width:50px;" />
    	</div>
    	
    	<div class="jcaption">$admin_lang_optn_time_between_comments</div>
    	
    	<div class="content">
    		$admin_lang_optn_time_between_comments_desc
    		
    		<input type="text" size="2" name="comment_timebetween" value="{$cfgrow['comment_timebetween']}" style="width:50px;" /> s
    	</div>
    	
    	<div class="jcaption">$admin_lang_optn_max_uri_comment</div>
    	
    	<div class="content">
    		$admin_lang_optn_max_uri_comment_desc
    		
    		<input type="text" size="2" name="max_uri_comment" value="{$cfgrow['max_uri_comments']}" style="width:50px;" />
    	</div>
EOE;
    	/**
    	 * additional_spam_measures Workspace
    	 *
    	 */
    	eval_addon_admin_workspace_menu("additional_spam_measures","");
    	
echo <<<EOE

    	<div class="jcaption">$admin_lang_optn_update</div>
    	
    	<div class="content">
    		<input type="submit" value="$admin_lang_optn_update"  />
		</div>
		
		</form>
		
	</div>
	<div id="footer"><a href="index.php?view=options&amp;advancedview=antispam" title="$admin_lang_adv_optn_show_adv" id="show_optn">$admin_lang_adv_optn_show_adv</a>
EOE;

	}	// END options / antispam
	
	////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////
	////
	////					START PAGE FIVE: USER OPTIONS
	////
	////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////
    if(isset($_GET['optionsview']) AND $_GET['optionsview'] == 'user' AND !isset($_GET['advancedview']))
    {
    	/**
		 * Store language option variables
		 *
		 */
		$admin_lang_select = select_option('../language', 'adminlangfile');
		
		$timezone_select = timezone_select();
		
		$local_time = gmdate($cfgrow['dateformat'],time()+(3600 * $cfgrow['timezone']));
		
    	$decoded_pass = '';
		$_POST['newadminpass'] = '';
		
echo <<<EOE

		<form method="post" action="{$_SERVER['PHP_SELF']}?{$_SERVER['QUERY_STRING']}&amp;optaction=updateuser" accept-charset="UTF-8">
		
		<!-- Username / Pass Options -->
		
		
		<div class="jcaption">$admin_lang_optn_usr_pss</div>
		
		<div class="content">
			<table border="0" cellspacing="2" cellpadding="0">
				<tr>
					<td colspan="2" align="left">$admin_lang_optn_usr_pss_txt<br /><br /></td>
				</tr>
				<tr>
					<td align="left">$admin_lang_optn_usr:</td>
					<td align="left"><input type="text" name="new_admin_user" value="{$cfgrow['admin']}" /></td>
				</tr>
				<tr>
					<td align="left">$admin_lang_optn_pss:</td>
					<td align="right"><input type="password" name="newadminpass" value="$decoded_pass" /> $admin_lang_optn_pss_re: <input type="password" name="newadminpass_re" value="" /></td>
				</tr>
			</table>
			
			<input type="hidden" name="passchanged" value="no" />
		</div>
		
		
		<!-- Admin Lang Options -->
		
		
		<div class="jcaption">$admin_lang_optn_lang_file_admin</div>
		
		<div class="content">
			<select name="new_admin_lang">
				$admin_lang_select
			</select>
		</div>
		
		
		<!-- Admin Email -->
		
		
		<div class="jcaption">$admin_lang_optn_email</div>
		
		<div class="content">
			<input type="text" name="new_email" value="{$cfgrow['email']}" style="width:255px;" />
			<br />
			
			$admin_lang_optn_fillit
		</div>
		
		
		<!-- Timezone -->
		
		
		<div class="jcaption">$admin_lang_optn_tz: $local_time</div>
		
		<div class="content">
			$admin_lang_optn_tz_txt
			<br />
			
			<select name="timezone">
				$timezone_select
			</select>
			<br /><br />
			
			$admin_lang_optn_gmt
			<br /><br />
		</div>
		
		
		<!-- Update -->
		
		
		<div class="jcaption">$admin_lang_optn_update</div>
		
		<div class="content">
			<input type="submit" value="$admin_lang_optn_update"  />
		</div>
		
		</form>
EOE;

    }	// END options / user
    
    ////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////
	////
	////					START ADVANCED: GENERAL OPTIONS
	////
	////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////
    if(isset($_GET['advancedview']) AND $_GET['advancedview'] == 'general' OR isset($_GET['advancedview']) AND $_GET['advancedview'] == '')
    {
    	$dspl_order_select = '';
		for($i = 0; $i <= 2; $i++)
		{
			$sel = '';
			
			if($i == 0){
				$val = 'datetime';
				$opt = $admin_lang_ni_datetime;
			}elseif($i == 1){
				$val = 'headline';
				$opt = $admin_lang_ni_image_title;
			}elseif($i == 2){
				$val = 'body';
				$opt = $admin_lang_ni_description;
			}
			
			if($cfgrow['display_sort_by'] == $val){ $sel=' selected="selected"'; }
			
			$dspl_order_select .= '<option value="'.$val.'"'.$sel.'>'.$opt.'</option>';
		}
		
		if($cfgrow['display_order']=='default')
		{
			$toecho_dsp   = $admin_lang_optn_img_display_default;
			$optnecho_dsp = $admin_lang_optn_img_display_reversed;
			$optnval_dsp  = 'reversed';
		}
		else
		{
			$toecho_dsp   = $admin_lang_optn_img_display_reversed;
			$optnecho_dsp = $admin_lang_optn_img_display_default;
			$optnval_dsp  = 'default';
		}
		
		/**
		 * Timestamp option values
		 *
		 */
		if($cfgrow['timestamp']=='yes')
		{
			$toecho_ts   = $admin_lang_optn_yes;
			$optnecho_ts = $admin_lang_optn_no;
			$optnval_ts  = 'no';
		}
		else
		{
			$toecho_ts   = $admin_lang_optn_no;
			$optnecho_ts = $admin_lang_optn_yes;
			$optnval_ts  = 'yes';
		}
		
		$tip = str_replace('http://www.pixelpost.org/', '../images/ or ../thumbnails/', $admin_lang_optn_tip);
		
				
echo <<<EOE
		<form method="post" action="{$_SERVER['PHP_SELF']}?view=options&amp;advancedview=general&amp;optaction=updateadv_gen" accept-charset="UTF-8">
		
		<!-- Image and Thumbnail Paths -->
		
		
		<div class="jcaption">$admin_lang_optn_img_path</div>
		
		<div class="content">
			<input type="text" name="new_image_path" value="{$cfgrow['imagepath']}" style="width:300px;" /> <br /><br />
			<input type="text" name="new_thumbnail_path" value="{$cfgrow['thumbnailpath']}" style="width:300px;" /> <br />
			<br />
			
			$tip
		</div>
		
		
		<!-- Timestamp -->
		
		
		<div class="jcaption">$admin_lang_optn_timestamps_title</div>

		<div class="content">
			$admin_lang_optn_timestamps_desc
			<br />
			
			<select name="timestamp">
				<option value="{$cfgrow['timestamp']}">$toecho_ts</option>
				<option value="$optnval_ts">$optnecho_ts</option>
			</select>
		</div>
		
		
		<!-- Display Order -->
		
		
		<div class="jcaption">$admin_lang_optn_img_display</div>
		
		<div class="content">
			$admin_lang_optn_img_display_desc
			<br />
			
			<select name="display_sort_by">
				$dspl_order_select
			</select>
			
			<select name="display_order">
				<option value="{$cfgrow['display_order']}">$toecho_dsp</option>
				<option value="$optnval_dsp">$optnecho_dsp</option>
			</select>
		</div>
		
		<div class="jcaption">$admin_lang_optn_update</div>
		
		<div class="content">
			<input type="submit" value="$admin_lang_optn_update"  />
		</div>
		
		</form>
		
	</div>
	<div id="footer"><a href="index.php?view=options&amp;optionsview=general" title="$admin_lang_adv_optn_show_basic" id="show_optn">$admin_lang_adv_optn_show_basic</a>
	
EOE;

	}	// END view advanced / general
	
	////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////
	////
	////					START ADVANCED: LOCALIZATION OPTIONS
	////
	////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////
	if(isset($_GET['advancedview']) AND $_GET['advancedview'] == 'localization')
	{		
		$language = '';
		if(isset($_POST['language']) AND !isset($lang_success))
		{
			$language = strtolower($_POST['language']);
			$language = preg_replace('# {1,}#', '_', trim($language));
			$language = eregi_replace('[^a-zA-Z_]+','',$language);
						
		}
		$abbreviation = '';
		if(isset($_POST['abbr']) AND strlen($_POST['abbr']) == '2' AND !isset($lang_success))
		{
			$abbreviation = strtoupper(trim($_POST['abbr']));
			$abbreviation  = eregi_replace('[^A-Z]+','',$abbreviation);
		}
		
		$native_tongue = (isset($_POST['native_tongue']) AND !isset($lang_success)) ? trim($_POST['native_tongue']) : '';
		
		/**
		 * Query the database and pullout the language array(s).
		 *
		 */
		$query = mysql_query("SELECT * FROM `".$pixelpost_db_prefix."localization`");
		$row   = mysql_fetch_array($query,MYSQL_ASSOC);
		
		/**
		 * Unserialize the defualt language array using the UTF8 safe unserialize function, mb_unserialize.
		 *
		 */
		$pp_supp_lang = mb_unserialize(stripslashes($row['pp_supp_lang']));
		
		/**
		 * If a user supplied language array exists,
		 * Unserialize the user language array using the UTF8 safe unserialize function, mb_unserialize,
		 * and merge with the default pixelpost array.
		 *
		 */
		if(!empty($row['user_supp_lang']))
		{
			$user_supp_lang = mb_unserialize(stripslashes($row['user_supp_lang']));
			$pp_supp_lang   = array_merge($pp_supp_lang, $user_supp_lang);
		}
		
		//var_dump($pp_supp_lang);
		
		/**
		 * Sort Array By Second Index (SABSI)
		 *
		 */		
		$pp_supp_lang = sabsi($pp_supp_lang, 1);
		
		$i = 0;
		$pp_available_langs = '';
		foreach($pp_supp_lang as $lang => $parts)
		{
			$i++;
			$className = ($i % 2) ? 'cellTwo' : 'cellOne';
						
			$delete = ($parts[0] != 'EN') ? '<td class="'.$className.'" align="center"><input type="checkbox" name="delete[]" value="'.$parts[0].'" /></td>' : '<td></td>';
			
			$pp_available_langs .= '
			<tr>
				<td class="'.$className.'">'.$parts[1].'</td>
				<td class="'.$className.'">'.$lang.'</td>
				<td class="'.$className.'" align="center">'.$parts[0].'</td>
				<td class="'.$className.'"></td>
				'.$delete.'
			</tr>';
			
		}
	
echo <<<EOE
		<form method="post" action="{$_SERVER['PHP_SELF']}?view=options&amp;advancedview=localization&amp;optaction=updateadv_local" accept-charset="UTF-8">
			
			<!-- LOCALIZATION -->
			
			<div class="jcaption">$admin_lang_adv_local_local</div>
	
			<div class="content">
				<table border="0" cellspacing="2" cellpadding="0">
					<tr>
						<td>$admin_lang_adv_local_tongue</td>
						<td>$admin_lang_adv_local_lang</td>
						<td>$admin_lang_adv_local_abbr</td>
						<td style="width:20px;"></td>
						<td>$admin_lang_adv_local_del</td>
					</tr>
					<tr>
						<td class="cellOne"><input type="text" name="native_tongue" value="$native_tongue" size="30" /></td>
						<td class="cellOne"><input type="text" name="language" value="$language" size="30" /></td>
						<td class="cellOne" align="center"><input type="text" name="abbr" value="$abbreviation" size="5" maxlength="2" style="text-align: center;" /></td>
						<td class="cellOne"></td>
						<td class="cellOne" align="center"><input type="checkbox" name="checkall" onclick="checkUncheckAll(this);" /></td>
					</tr>
					$pp_available_langs
				</table>
			</div>
			
			
			<!-- UPDATE -->
			
			<div class="jcaption">$admin_lang_optn_update</div>
	
			<div class="content">
				<input type="submit" value="$admin_lang_optn_update"  />
			</div>
			
		</form>
		
	</div>
	<div id="footer"><a href="index.php?view=options&amp;optionsview=general" title="$admin_lang_adv_optn_show_basic" id="show_optn">$admin_lang_adv_optn_show_basic</a>
	
EOE;


	}	// END view advanced / antispam

	////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////
	////
	////					START ADVANCED: ANTISPAM OPTIONS
	////
	////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////
	if(isset($_GET['advancedview']) AND $_GET['advancedview'] == 'antispam')
	{
	
		echo '
		<form method="post" action="'.$_SERVER['PHP_SELF'].'?view=options&amp;advancedview=antispam&amp;optaction=updateadv_spam" accept-charset="UTF-8">';
			show_anti_spam();
echo <<<EOE
			<div class="jcaption">$admin_lang_optn_update</div>
	
			<div class="content">
				<input type="submit" value="$admin_lang_optn_update"  />
			</div>
			
		</form>
		
	</div>
	<div id="footer"><a href="index.php?view=options&amp;optionsview=antispam" title="$admin_lang_adv_optn_show_basic" id="show_optn">$admin_lang_adv_optn_show_basic</a>
	
EOE;


	}	// END view advanced / antispam

}	// END view options

////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////
////								FUNCTIONS
////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////

// do show anti spam in admin >> option page
function show_anti_spam()
{
	// update it if necessary
	$additional_msg  = update_banlist();
	$additional_msg .= moderate_past_with_list();
	$additional_msg .= delete_past_with_list();
	$additional_msg .= delete_from_badreferer_list();
	
	$html = options_anti_spam_html($additional_msg);
	
	echo $html;
}

// create options HTML code
function options_anti_spam_html($additional_msg)
{
	global $pixelpost_db_prefix,$admin_lang_spam_ban,$admin_lang_spam_content;
	global $admin_lang_spam_modlist,$admin_lang_spam_blacklist,$admin_lang_spam_reflist;
	global $admin_lang_spam_blacklist_text,$admin_lang_spam_htaccess_text,$admin_lang_spam_check_comm;
	global $admin_lang_spam_del_bad_comm,$admin_lang_spam_del_bad_ref,$admin_lang_spam_updateblacklist;

	$mod_list	= get_moderation_banlist();
	$black_list	= get_blacklist();
	$ref_list	= get_ref_ban_list();

	$query	= "SELECT `acceptable_num_links` FROM `{$pixelpost_db_prefix}banlist` LIMIT 1";
	$result	= mysql_query($query)or die( mysql_error());
	if($row = mysql_fetch_row($result))
	{
		$acceptable_num_links = $row[0];
	}
	
	// htaccess stuff
	$htaccess = create_htaccess_banlist();

	$html =
<<<EOE
	<div class="jcaption">$admin_lang_spam_ban</div>
	
	<div class="content">
		$admin_lang_spam_content
		<br /><br />
		
		<!-- <form method="post" action="{$_SERVER['PHP_SELF']}?{$_SERVER['QUERY_STRING']}#banlist"> -->
		
			<table id="banlist" name="banlist" summary="Banlists">
				<tr >
					<td style="padding-right:5px;">
						<strong>$admin_lang_spam_modlist</strong>
						<br />
						
						<textarea name="moderation_list" class="banlists" style="width:200px;height:100px;" rows="" cols="">$mod_list</textarea>
						<br />
					
						<a href="index.php?view=options&amp;advancedview=antispam&amp;antispamaction=moderation">$admin_lang_spam_check_comm</a>
					</td>
					<td style="padding-right:5px;">
						<strong>$admin_lang_spam_blacklist</strong>
						<br />
						
						<textarea name="blacklist" class="banlists" style="width:200px;height:100px;" rows="" cols="">$black_list</textarea>
						<br />
						
						<a href="index.php?view=options&amp;advancedview=antispam&amp;antispamaction=deletecmnt">$admin_lang_spam_del_bad_comm</a>
					</td>
					<td style="padding-right:5px;">
						<strong>$admin_lang_spam_reflist </strong>
						<br />
						
						<textarea name="ref_ban_list" class="banlists" style="width:200px;height:100px;" rows="" cols="">$ref_list</textarea>
						<br />
						
						<a href="index.php?view=options&amp;advancedview=antispam&amp;antispamaction=deleterefs" >$admin_lang_spam_del_bad_ref</a>
					</td>
				</tr>
			</table >
			
			<input type="hidden" name="banlistupdate" value="1" />
			<!--
			<input type="submit" value="$admin_lang_spam_updateblacklist" />
			
		</form>
		-->
		
		$additional_msg
EOE;
		if( isset( $_POST['banlistupdate']))
		{
			$html .=
<<<EOE
			<div id="htaccess-deny" >
				$admin_lang_spam_blacklist_text
				<textarea name="htaccess-deny-list" style="width:600px;height:200px;" >$htaccess</textarea>
			</div>
EOE;
		}
		else
		{
			$html .=
<<<EOE
			<br /><br />
			
			<a href="#" onclick="flip('htaccess-deny'); return false;"><i>$admin_lang_spam_htaccess_text</i></a>
			<br /><br />
			
			<div id="htaccess-deny" >
				<script type="text/javascript">flip('htaccess-deny');</script>
				$admin_lang_spam_blacklist_text
				<textarea name="htaccess-deny-list" style="width:600px;height:200px;" rows="" cols="">$htaccess</textarea>
			</div>
EOE;
		}
		
		$html .= '
	</div>
	<!-- end of content-->';
		
	return $html;
}
/**
 * Creates the dropdown options for:
 * Frontend / Alternative / Admin languages AND Template options
 *
 * type = langfile		(default frontend language files)
 * type = altlangfile	(alternative frontend language files)
 * type = adminlangfile	(admin language files)
 * type = template		(template files)
 *
 * @author dkozikowski
 *
 */
function select_option($dir, $type)
{
    global $cfgrow;
    
    $files = array();
    
    if($handle = opendir($dir))
    {
        while(false !== ($file = readdir($handle)))
        {
            if($type == 'langfile' OR $type == 'altlangfile')
            {
                if(is_file($dir.'/'.$file) && ($file != "index.html"))
                {
                    $file = str_replace("lang-","",$file);
                    $file = str_replace(".php","",$file);
                
                    $admin_pre = substr("$file",0,6);
                    if($admin_pre != "admin-")
                    {
                    	$files[] = $file;
                    }
                }
            }
            elseif($type == 'adminlangfile')
            {
                $admin_pre = substr("$file",0,6);					
                if(is_file($dir.'/'.$file) && ($file != "index.html") && $admin_pre == "admin-")
                {
                    $file = str_replace("admin-lang-","",$file);
                    $file = str_replace(".php","",$file);
                    
                    $files[] = $file;
                }
            }
            elseif($type == 'template')
            {
                if($file != "." && $file != ".." && $file != "splash_page.html" && $file != "index.html")
                { 
                    $files[] = $file; 
                } 
            }
        }
        closedir($handle);
    }

    sort($files);
    
    $options = '';
    foreach($files as $val)
    {
        if($type == 'langfile')
        {
            $selected = (strtolower($cfgrow['langfile']) == strtolower($val)) ? ' selected="selected"' : '';
        }
        elseif($type == 'altlangfile')
        {
        	$selected = (strtolower($cfgrow['altlangfile']) == strtolower($val)) ? ' selected="selected"' : '';
        }
        elseif($type == 'adminlangfile')
        {
            $selected = (strtolower($cfgrow['admin_langfile']) == strtolower($val)) ? ' selected="selected"' : '';
        }
        elseif($type == 'template')
        {
            $selected = (strtolower($cfgrow['template']) == strtolower($val)) ? ' selected="selected"' : '';
        }
        
        $name = ucwords(str_replace('_', ' ', $val));
        
		$options .= "<option value=\"$val\"$selected>$name</option>\n";
    }
    return $options;
}
/**
 * Sort Array By Second Index (SABSI)
 * Source: http://us2.php.net/manual/en/function.asort.php#43513
 *
 */
function sabsi($array, $index, $order='asc', $natsort = true, $case_sensitive = false)
{
	if(is_array($array) && count($array) > 0)
	{
		foreach(array_keys($array) as $key)
		{
			$temp[$key] = $array[$key][$index];
		}
		
	    if(!$natsort)
		{
			($order == 'asc') ? asort($temp) : arsort($temp);
		}
		else
		{
			($case_sensitive) ? natsort($temp) : natcasesort($temp);
			if($order != 'asc')
			{
				$temp = array_reverse($temp,true);
			}
	    }
	    foreach(array_keys($temp) as $key)
		{
			(is_numeric($key)) ? $sorted[] = $array[$key] : $sorted[$key] = $array[$key];
		}
	    return $sorted;
	}
	return $array;
}
?>