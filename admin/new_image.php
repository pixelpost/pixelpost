<?php

// SVN file version:
// $Id$

if(!isset($_SESSION["pixelpost_admin"]) || $cfgrow['password'] != $_SESSION["pixelpost_admin"] || isset($_GET["_SESSION"]["pixelpost_admin"]) AND $_GET["_SESSION"]["pixelpost_admin"] == $_SESSION["pixelpost_admin"] || isset($_POST["_SESSION"]["pixelpost_admin"]) AND $_POST["_SESSION"]["pixelpost_admin"] == $_SESSION["pixelpost_admin"] || isset($_COOKIE["_SESSION"]["pixelpost_admin"]) AND $_COOKIE["_SESSION"]["pixelpost_admin"] == $_SESSION["pixelpost_admin"])
{
	die ("Try another day!!");
}

//require("../includes/exifer1_5/exif.php");

// if no page is specified return a new post / image upload thing
if(!isset($_GET['view']) OR $_GET['view'] == '')
{
	$show_thumbnail_creation_page = false; // For default behavior this is set to 'False' you can change this to True in your addons in the new image page
   // save new post
	if(isset($_GET['x']) AND $_GET['x'] == "save")
	{
		$headline = clean($_POST['headline']);
		$body = clean($_POST['body']);

		if(isset($_POST['alt_headline']))
		{
 		  //Obviously we would like to use the alternative language
			$alt_headline = clean($_POST['alt_headline']);
			$alt_body =  clean($_POST['alt_body']);
			$alt_tags = clean($_POST['alt_tags']);
		}
		else
		{
			$alt_headline = "";
			$alt_body =  "";
			$alt_tags = "";
		}

		$comments_settings = clean($_POST['allow_comments']);
	  $datetime =
             intval($_POST['post_year'])."-".
             intval($_POST['post_month'])."-".
             intval($_POST['post_day'])." ".
             intval($_POST['post_hour']).":".
             intval($_POST['post_minute']).":".date('s');

        $postdatefromexif = FALSE;
		if( $_POST['autodate'] == 1)
		{
			$query = mysql_query("select datetime + INTERVAL ".$cfgrow['daysafterlastpost']." DAY from ".$pixelpost_db_prefix."pixelpost order by datetime desc limit 1");
			$row = mysql_fetch_row($query);
			if( $row) $datetime = $row[0];	// If there is none, will default to the other value
		}
		else if( $_POST['autodate'] == 2)
		{
			$datetime = gmdate("Y-m-d H:i:s",time()+(3600 * $cfgrow['timezone']));
		}
		else if($_POST['autodate'] == 3)// exifdate
		{
			// New, JFK: post date from EXIF
			// delay action to later point. We don't know the filename yet...
			// just set a flag so we know what to do later on
			$postdatefromexif = TRUE;
		};

	  if($headline == "")
	  {
			echo  "
  		 <div id='warning'>$admin_lang_ni_missing_data</div><p/>
       <script type='text/javascript'>
			 <!--
			 document.location = '#warnings'
			 -->
		 </script>";
	    exit;
	  }

		$status = "no";

	  // prepare the file
		if($_FILES['userfile'] != "")
		{
			$userfile = strtolower($_FILES['userfile']['name']);
			$tz = $cfgrow['timezone'];

			if($cfgrow['timestamp']=='yes')	$time_stamp_r = gmdate("YmdHis",time()+(3600 * $tz)) .'_';

			$uploadfile = $upload_dir .$time_stamp_r .$userfile;

			// NEW WORKSPACE ADDED
      		eval_addon_admin_workspace_menu('image_upload_start');

			if(move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile))
			{
				chmod($uploadfile, 0644);
				$result = check_upload($_FILES['userfile']['error']);
				$filnamn =strtolower($_FILES['userfile']['name']);
				$filnamn = $time_stamp_r .$filnamn;
				$filtyp = $_FILES['userfile']['type'];
				$filstorlek = $_FILES['userfile']['size'];
				$status = "ok";

				//Get the exif data so we can store it.
				// what about files that don't have exif data??
				include_once('../includes/functions_exif.php');

				$exif_info_db = serialize_exif($uploadfile);

				if($postdatefromexif == TRUE)
				{
					// since we all ready escaped everything for database commit we have
					// strip the slashes before we can use the exif again.
					$exif_info = stripslashes($exif_info_db);
					$exif_result=unserialize_exif($exif_info);
					$exposuredatetime = $exif_result['DateTimeOriginalSubIFD'];
					if($exposuredatetime!='')
					{
						list($exifyear,$exifmonth,$exifday,$exifhour,$exifmin, $exifsec) = split('[: ]', $exposuredatetime);
				    $datetime = date("Y-m-d H:i:s", mktime($exifhour, $exifmin, $exifsec, $exifmonth, $exifday, $exifyear));
				  }
				  else	$datetime = gmdate("Y-m-d H:i:s",time()+(3600 * $tz));
	      		}
	      		// NEW WORKSPACE ADDED
        		eval_addon_admin_workspace_menu('image_upload_succesful');
			}
			else
			{
				// something went wrong, try to describe what
				if($_FILES['userfile']['error']!='0')	$result = check_upload($_FILES['userfile']['error']);
				else	$result = "$admin_lang_ni_upload_error ";

				echo "<div id='warning'>$admin_lang_error  ";
				echo "<br/>$result";

				if(!is__writable($upload_dir))	echo "<br/>$admin_lang_pp_img_chmod1";

				echo "</div><hr/>";

	 			// NEW WORKSPACE ADDED
        		eval_addon_admin_workspace_menu('image_upload_failed');
			} // end move
		} // end prepare of file ($_FILES['userfile'] != "")

	  // insert post in mysql
		$image = $filnamn;

		if($status == "ok")
		{
			$query = "INSERT INTO ".$pixelpost_db_prefix."pixelpost (datetime,headline,body,image,alt_headline,alt_body,comments,exif_info)
			VALUES('$datetime','$headline','$body','$image','$alt_headline','$alt_body','$comments_settings','$exif_info_db')";
			$result = mysql_query($query) || die("Error: ".mysql_error().$admin_lang_ni_db_error);

	    	$theid = mysql_insert_id(); //Gets the id of the last added image to use in the next "insert"

			if(isset($_POST['category']))
			{
				$query_val = array();
	
				foreach($_POST['category'] as $val)
				{
					$val = clean($val);
					$query_val[] = "(NULL,'$val','$theid')";
				}
	
				$query_st = "INSERT INTO ".$pixelpost_db_prefix."catassoc (id,cat_id,image_id) VALUES ".implode(",", $query_val).";";
				$result = mysql_query($query_st) || die("Error: ".mysql_error());
	    	}
	    	// done
	    	// moved by Dennis to get a more consistent upload process.
			$to_echo = '';
			if ($show_thumbnail_creation_page){
				$to_echo = "<div id='caption'>$admin_lang_ni_posted: $headline</div>
		 			<div class='content'>$body<br/>
		 			$datetime<br/><a href=\"".PHP_SELF."?view=images&id=$theid\">[$admin_lang_imgedit_edit]</a><p>";
		 	} else {
				if ($cfgrow['crop'] != '12c')
				{
					$host  = $_SERVER['HTTP_HOST'];
					$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
					$extra = 'index.php?view=images';
					echo '<meta http-equiv="refresh" content="0;url=http://'.$host.$uri."/".$extra.'" />';
				}	
			}
			// Check if the '12c' is selected as the crop then add 3 buttons to the page '+', '-', and 'crop'
			if($cfgrow['crop']=='12c')
			{
				$to_echo .="$admin_lang_ni_crop_nextstep<br/>
						 <input type='button' name='Submit1' value='".$txt['cropimage']."' onclick=\"cropCheck('def','".$filnamn ."');\"/>
						 <input type='button' name='Submit3' value='".$txt['smaller']."' onmousedown=\"cropZoom('in');\" onmouseup='stopZoom();'/>
						 <input type='button' name='Submit4' value='".$txt['bigger']."' onmousedown=\"cropZoom('out');\" onmouseup='stopZoom();'/>
						 <br/> ";
			}
			echo $to_echo; // tag of content div still open
			//create thumbnail
			if(function_exists('gd_info'))
			{
				$gd_info = gd_info();
				if($gd_info != "")
				{
					$thumbnail = $filnamn;
					$thumbnail = createthumbnail($thumbnail);
					eval_addon_admin_workspace_menu('thumb_created');
					// if crop is not '12c' use the oldfashioned crop
					if($cfgrow['crop']!='12c')
					{
						echo "</div><!-- end of content div -->" ; // close content div
					}
					else
					{
						// set the size of the crop frame according to the uploaded image
						setsize_cropdiv ($filnamn);
						$for_echo ="<img src='".$cfgrow['imagepath'].$filnamn."' id='myimg'/>
							<div id='cropdiv'>
							<table width='100%' height='100%' border='1' cellpadding='0' cellspacing='0' bordercolor='#000000'>
							<tr><td><img src='".$spacer."'/></td></tr>
							</table></div> <!-- end of crop div -->
							<div id='editthumbnail'>
							<hidden>$admin_lang_ni_crop_background</hidden>
							</div><!-- end of editthumbnail id -->
							</div> <!-- end of content div -->  ";
						echo $for_echo;
					} // end else
				} // gd info
			} // function_exists
			// workspace: image_uploaded
			eval_addon_admin_workspace_menu('image_uploaded');
			// save tags
			save_tags_new(clean($_POST['tags']),$theid);

			// save the alt_tags to if the variable is set
			if($cfgrow['altlangfile'] != 'Off')	save_tags_new(clean($_POST['alt_tags']),$theid,"alt_");

			// workspace: image_uploaded
			eval_addon_admin_workspace_menu('upload_finished');
		} // end status ok
	} // end save


	if(isset($status) && $status == 'ok')
	{
		unset($alt_headline, $alt_tags, $alt_body, $_POST['category'], $_POST['autodate'], $_POST['post_year'], $_POST['post_month'], $_POST['post_day'], $_POST['post_hour'], $_POST['post_minute'], $_POST['allow_comments']);
	}
	if (isset($_GET['x']) AND $_GET['x'] != "save" OR !isset($_GET['x']))
    {
?>

	<form method="post" action="<?php echo PHP_SELF;?>?x=save" enctype="multipart/form-data" accept-charset="UTF-8">
		<div id="caption"><b><?php echo $admin_lang_new_image;?></b></div>
		<div class="jcaption"><?php echo $admin_lang_ni_post_a_new_image;?></div>
		<div class="content">
	<?php echo $admin_lang_ni_image ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <input name="userfile" type="file" size="76"/><p/>
	<?php echo $admin_lang_ni_image_title;?>&nbsp;&nbsp;&nbsp;
   <input type="text" name="headline" style="width:550px;" value="<?php if(isset($status) && $status!='ok') echo $_POST['headline'];?>"/><p/>
	<?php echo $admin_lang_ni_tags;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <input type="text" name="tags" style="width:550px;" value="<?php if(isset($status) && $status!='ok') echo $_POST['tags'];?>"/><br/>
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $admin_lang_ni_tags_desc;?><p/>
  	<?php	
	eval_addon_admin_workspace_menu('new_image_form_def_lang'); 
  	echo $admin_lang_ni_select_cat;
	category_list_as_table(clean(isset($_POST['category'])), $cfgrow);
 	$tz = $cfgrow["timezone"];
 	$cur_time = gmdate("Y-m-d H:i:s",time()+(3600 * $tz));
 	$cur_year = gmdate("Y",time()+(3600 * $tz));
	if(isset($_POST['autodate']))
	{
	    $autodate = intval($_POST['autodate']);
	    
 	    $selected_autodate[$autodate] = 1;
 	}
 	elseif(!isset($_POST['autodate']) OR $_POST['autodate'] == '')
 	{
 	    $selected_autodate[0] = '';
 	    $selected_autodate[1] = '';
 	    $selected_autodate[2] = 1;
 	    $selected_autodate[3] = '';
 	}
 	?>
</div>

    <div class='jcaption'><?php echo $admin_lang_ni_description;?></div>
    <div class='content'>
    <?php	if($cfgrow['markdown'] == 'T')
				{
					echo $admin_lang_ni_markdown_text;?><br/>
    <a href='http://daringfireball.net/projects/markdown/' title='<?php echo $admin_lang_ni_markdown_hp;?>' target='_blank'><?php echo $admin_lang_ni_markdown_hp;?></a>
    &nbsp;&nbsp;&nbsp;
    <a href='http://daringfireball.net/projects/markdown/basics' title='<?php echo $admin_lang_ni_markdown_element;?>' target='_blank'><?php echo $admin_lang_ni_markdown_element;?></a>
    &nbsp;&nbsp;&nbsp;
    <a href='http://daringfireball.net/projects/markdown/syntax' title='<?php echo $admin_lang_ni_markdown_syntax;?>' target='_blank'><?php echo $admin_lang_ni_markdown_syntax;?></a><?php } ?>
    <p/>
	<div style="text-align:center;">
    <textarea name="body" style="width:97%;height:100px;" rows="" cols=""><?php if(isset($status) && $status!='ok') echo $_POST['body'];?></textarea><p/>
	</div>
    </div>
    <div class='jcaption'>
    <?php echo $admin_lang_ni_datetime;?></div>
    <div class='content'>
     <input type="radio" name="autodate" value="2" <?php if($selected_autodate[2]) echo 'checked="checked" ';?>id="postnow"/><label for="postnow"><?php echo $admin_lang_ni_post_now . ' (~'.$cur_time.')';?></label><br/>
     <input type="radio" name="autodate" value="1" <?php if($selected_autodate[1]) echo 'checked="checked" ';?>id="postdayaft"/><label for="postdayaft"><?php if ($cfgrow['daysafterlastpost']==1){echo $admin_lang_ni_post_one_day_after;}else{echo $admin_lang_ni_post.$cfgrow['daysafterlastpost'].$admin_lang_ni_post_multiple_days_after;}?></label><br/>
     <input type='radio' name='autodate' value='3' <?php if($selected_autodate[3]) echo 'checked="checked" ';?>id="exifdate"/><label for="exifdate"><?php echo $admin_lang_ni_post_exif_date;?></label><br/>
     <input type='radio' name='autodate' value='0' <?php if($selected_autodate[0]) echo 'checked="checked" ';?>id="specificdate"/><label for="specificdate"><?php echo $admin_lang_ni_post_spec_date;?></label><br/><br/>

	 <table id="datetable">
	 <tr>
	 <td><?php echo $admin_lang_ni_year;?></td><td style="width:5px;">-</td><td><?php echo $admin_lang_ni_month;?></td><td style="width:5px;">-</td><td><?php echo $admin_lang_ni_day;?></td><td><img src='../includes/spacer.gif' height='1' width='30' alt=""/></td><td><?php echo $admin_lang_ni_hour;?></td><td style="width:5px;">-</td><td><?php echo $admin_lang_ni_min;?></td>
 </tr>
 <tr><td>
  <select name='post_year' onchange="return ondatechange()" >
	<option value='<?php echo $cur_year;?>'><?php echo $cur_year;?></option>
	<?php
	$lc = 2002;

	while($lc <= (date("Y")+3))
	{
	  echo "<option";
	  if(isset($_POST['post_year']) AND $_POST['post_year']==$lc)	echo " SELECTED";
	  echo " value='$lc'>$lc</option>";
	  $lc++;
	}
	?>
	</select>
	</td>
	<td style="width:5px;">-</td>
	<td>
	<select name='post_month' onchange="return ondatechange()">
	<option value='<?php echo gmdate("m",time()+(3600 * $tz));?>'><?php echo gmdate("m",time()+(3600 * $tz));?></option>
	<?php
	$lc = 1;

	while($lc <= 12)
	{
	  if($lc < 10) { $lc = "0$lc"; }
	  echo "<option";
	  if(isset($_POST['post_month']) AND $_POST['post_month']==$lc)	echo " SELECTED";
	  echo " value='$lc'>$lc</option>";
	  $lc++;
	}
	?>
	</select>
	</td>
	<td style="width:5px;">-</td>
	<td>
	<select name='post_day' onchange="return ondatechange()">
	<option value='<?php echo gmdate("d",time()+(3600 * $tz));?>'><?php echo gmdate("d",time()+(3600 * $tz));?></option>
	<?php
	$lc = 1;

	while($lc <= 31)
	{
	  if($lc < 10) { $lc = "0$lc"; }
	  echo "<option";
	  if(isset($_POST['post_day']) AND $_POST['post_day']==$lc)	echo " SELECTED";
	  echo " value='$lc'>$lc</option>";
	  $lc++;
	}
	?>
	</select>
	</td>
	<td><img src='../includes/spacer.gif' height='1' width='30' alt=""/></td>
	<td>
	<select name='post_hour' onchange="return ondatechange()">
	<option value='<?php echo gmdate("H",time()+(3600 * $tz));?>'><?php echo gmdate("H",time()+(3600 * $tz));?></option>
	<?php
	$lc = 0;

	while($lc < 24)
	{
	  if($lc < 10) { $lc = "0$lc"; }
	  echo "<option";
	  if(isset($_POST['post_hour']) AND $_POST['post_hour']==$lc)	echo " SELECTED";
	  echo " value='$lc'>$lc</option>";
	  $lc++;
  }
	?>
	</select>
	</td>
	<td style="width:5px;">-</td>
	<td>
	<select name='post_minute' onchange="return ondatechange()">
	<option value='<?php echo gmdate("i",time()+(3600 * $tz));?>'><?php echo gmdate("i",time()+(3600 * $tz));?></option>
	<?php
	$lc = 0;
	while($lc <= 59)
	{
	  if($lc < 10) { $lc = "0$lc"; }
	  echo "<option";
	  if(isset($_POST['post_minute']) AND $_POST['post_minute']==$lc)	echo " SELECTED";
	  echo " value='$lc'>$lc</option>";
	  $lc++;
	}
	?>
	</select>
</td></tr></table>
    <p/>
    </div>
		<?php
  // added select box for allowing comments posted for picture
	echo "<div class='jcaption'>$admin_lang_optn_comment_setting2</div>
		<div class='content'>$admin_lang_optn_cmnt_mod_txt2
		<select name=\"allow_comments\">";

	$allow_comments = (isset($_POST['allow_comments']) AND strlen($_POST['allow_comments']) > 0) ? clean($_POST['allow_comments']) : $cfgrow["global_comments"];

	if($allow_comments == 'A')
	{
		echo "<option selected=\"selected\" value=\"A\">$admin_lang_optn_cmnt_mod_allowed</option><option value=\"M\">$admin_lang_optn_cmnt_mod_moderation</option><option value=\"F\">$admin_lang_optn_cmnt_mod_forbidden</option>";
	}
	elseif($allow_comments == 'M')
	{
		echo "<option value=\"A\">$admin_lang_optn_cmnt_mod_allowed</option><option  selected=\"selected\" value=\"M\">$admin_lang_optn_cmnt_mod_moderation</option><option value=\"F\">$admin_lang_optn_cmnt_mod_forbidden</option>";
	}
	else
	{
		echo "<option value=\"A\">$admin_lang_optn_cmnt_mod_allowed</option><option value=\"M\">$admin_lang_optn_cmnt_mod_moderation</option><option selected=\"selected\" value=\"F\">$admin_lang_optn_cmnt_mod_forbidden</option>";
	}

	echo "</select></div>";

 	// added for language support
	// Check if the language addon is enabled. If not there is no need to show these fields
	if($cfgrow['altlangfile'] != 'Off')
	{

		echo "
		<div class='jcaption'>".$admin_lang_ni_alt_language."</div>
		<div class='content'>".$admin_lang_ni_image_title."&nbsp;&nbsp;&nbsp;
		<input type='text' name='alt_headline' style='width:550px;' /><p/>".$admin_lang_ni_tags."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type='text' name='alt_tags' style='width:550px;' /><br/>   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $admin_lang_ni_tags_desc . "<p/>";

		eval_addon_admin_workspace_menu('new_image_form_alt_lang');

		if($cfgrow['markdown'] == 'T')
		{
			echo "
		<div>".$admin_lang_ni_markdown_text."<br/>
			<a href='http://daringfireball.net/projects/markdown/' title='<?php echo $admin_lang_ni_markdown_hp;?>' target='_blank'>".$admin_lang_ni_markdown_hp."</a>
			&nbsp;&nbsp;&nbsp;
			<a href='http://daringfireball.net/projects/markdown/basics' title='<?php echo $admin_lang_ni_markdown_element;?>' target='_blank'>".$admin_lang_ni_markdown_element."</a>
			&nbsp;&nbsp;&nbsp;
			<a href='http://daringfireball.net/projects/markdown/syntax' title='<?php echo $admin_lang_ni_markdown_syntax;?>' target='_blank'>".$admin_lang_ni_markdown_syntax."</a>
			<p/>";
		}

		echo "
			<div style='text-align:center;'>
				<textarea name='alt_body' style='width:97%;height:100px;' rows='' cols=''></textarea><p/>
			</div>
		</div></div>";
	}
		// workspace: new_image_form
		eval_addon_admin_workspace_menu('new_image_form');
		?>
    <div class='jcaption'>
    <?php echo $admin_lang_ni_post_entry;?></div>
    <div class="content">
    <input type="submit" value="<?php echo $admin_lang_ni_upload;?>" style='width:100px;font-weight:bold;'/>
	<a name="warnings">&nbsp;</a>
    </div>
	</form>

<?php
	}
} // end view=null
?>