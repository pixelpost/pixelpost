<?php

/**************************
SVN file version:
$Id$
**************************/

if(!isset($_SESSION["pixelpost_admin"]) || $cfgrow['password'] != $_SESSION["pixelpost_admin"] || $_GET["_SESSION"]["pixelpost_admin"] == $_SESSION["pixelpost_admin"] || $_POST["_SESSION"]["pixelpost_admin"] == $_SESSION["pixelpost_admin"])
{
	die ("Try another day!!");
}

require("../includes/exifer1_5/exif.php");

// if no page is specified return a new post / image upload thing
if($_GET['view'] == "")
{
	$show_image_after_upload = True; // For default behavior this is set to 'True' you can change this to false in your addons in the new image page
?>

   <form method="post" action="<?php echo $PHP_SELF; ?>?x=save" enctype="multipart/form-data" accept-charset="UTF-8">
<div id="caption"><b><?=$admin_lang_new_image?></b></div>
   <div class="jcaption"><?php echo $admin_lang_ni_post_a_new_image; ?></div>
   <div class="content">
	<?php echo $admin_lang_ni_image ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <input name="userfile" type="file" size="76" /><p />
	<?php echo $admin_lang_ni_image_title; ?>&nbsp;&nbsp;&nbsp;
   <input type="text" name="headline" style="width:550px;" value="<?=$_POST['headline'];?>" /><p />
	<?php echo $admin_lang_ni_tags; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <input type="text" name="tags" style="width:550px;" value="<?=$_POST['tags'];?>" /><p />
  <?php echo $admin_lang_ni_select_cat; ?>
	<?php
	category_list_as_table($_POST['category']);
 	$tz = $cfgrow["timezone"];
 	$cur_time = gmdate("Y-m-d H:i:s",time()+(3600 * $tz));
 	$cur_year = gmdate("Y",time()+(3600 * $tz));
 	$selected_autodate[$_POST['autodate']] = 1;
 	if($_POST['autodate']=='')	$selected_autodate[2] = 1;
 ?>
</div>

    <div class='jcaption'><?php echo $admin_lang_ni_description; ?></div>
    <div class='content'>
    <? echo $admin_lang_ni_markdown_text; ?><br />
    <a href='http://daringfireball.net/projects/markdown/' title='<? echo $admin_lang_ni_markdown_hp; ?>' target='_blank'><? echo $admin_lang_ni_markdown_hp; ?></a>
    &nbsp;&nbsp;&nbsp;
    <a href='http://daringfireball.net/projects/markdown/basics' title='<? echo $admin_lang_ni_markdown_element; ?>' target='_blank'><? echo $admin_lang_ni_markdown_element; ?></a>
    &nbsp;&nbsp;&nbsp;
    <a href='http://daringfireball.net/projects/markdown/syntax' title='<? echo $admin_lang_ni_markdown_syntax; ?>' target='_blank'><? echo $admin_lang_ni_markdown_syntax; ?></a>
    <p />
	<div style="text-align:center;">
    <textarea name="body" style="width:97%;height:100px;" rows="" cols=""><?=$_POST['body'];?></textarea><p />
	</div>
    </div>
    <div class='jcaption'>
    <?php echo $admin_lang_ni_datetime; ?></div>
    <div class='content'>
     <input type="radio" name="autodate" value="2" <?php if($selected_autodate[2]) echo 'checked="checked"';?> /><?php echo $admin_lang_ni_post_now . ' (~'.$cur_time.')'; ?><br />
     <input type="radio" name="autodate" value="1" <?php if($selected_autodate[1]) echo 'checked="checked"';?> /><?php echo $admin_lang_ni_post_one_day_after; ?><br />
     <input type='radio' name='autodate' value='3' <?php if($selected_autodate[3]) echo 'checked="checked"';?>id="exifdate" /><?php echo $admin_lang_ni_post_exif_date; ?><br />
     <input type='radio' name='autodate' value='0' <?php if($selected_autodate[0]) echo 'checked="checked"';?>id="specificdate" /><?php echo $admin_lang_ni_post_spec_date; ?><br /><br />
     
	 <table id="datetable">
	 <tr>
	 <td><?php echo $admin_lang_ni_year; ?></td><td style="width:5px;">-</td><td><?php echo $admin_lang_ni_month; ?></td><td style="width:5px;">-</td><td><?php echo $admin_lang_ni_day; ?></td><td><img src='../includes/spacer.gif' height='1' width='30' alt=""/></td><td><?php echo $admin_lang_ni_hour; ?></td><td style="width:5px;">-</td><td><?php echo $admin_lang_ni_min; ?></td>
 </tr>
 <tr><td>
  <select name='post_year' onchange="return ondatechange()" >
	<option value='<?php $cur_year; ?>'><?php echo $cur_year; ?></option>
	<?php
	$lc = 2002;
	while($lc <= 2010)
	{
	  echo "<option";
	  if($_POST['post_year']==$lc)	echo " SELECTED";
	  echo " value='$lc'>$lc</option>";
	  $lc++;
	}
	?>
	</select>
	</td>
	<td style="width:5px;">-</td>
	<td>
	<select name='post_month' onchange="return ondatechange()">
	<option value='<?php echo gmdate("m",time()+(3600 * $tz)); ?>'><?php echo gmdate("m",time()+(3600 * $tz)); ?></option>
	<?php
	$lc = 1;

	while($lc <= 12)
	{
	  if($lc < 10) { $lc = "0$lc"; }
	  echo "<option";
	  if($_POST['post_month']==$lc)	echo " SELECTED";
	  echo " value='$lc'>$lc</option>";
	  $lc++;
	}
	?>
	</select>
	</td>
	<td style="width:5px;">-</td>
	<td>
	<select name='post_day' onchange="return ondatechange()">
	<option value='<?php echo gmdate("d",time()+(3600 * $tz)); ?>'><?php echo gmdate("d",time()+(3600 * $tz)); ?></option>
	<?php
	$lc = 1;
	while($lc <= 31)
	{
	  if($lc < 10) { $lc = "0$lc"; }
	  echo "<option";
	  if($_POST['post_day']==$lc)	echo " SELECTED";
	  echo " value='$lc'>$lc</option>";
	  $lc++;
	}
	?>
	</select>
	</td>
	<td><img src='../includes/spacer.gif' height='1' width='30' alt="" /></td>
	<td>
	<select name='post_hour' onchange="return ondatechange()">
	<option value='<?php echo gmdate("H",time()+(3600 * $tz)); ?>'><?php echo gmdate("H",time()+(3600 * $tz)); ?></option>
	<?php
	$lc = 0;
	while($lc < 24)
	{
	  if($lc < 10) { $lc = "0$lc"; }
	  echo "<option";
	  if($_POST['post_hour']==$lc)	echo " SELECTED";
	  echo " value='$lc'>$lc</option>";
	  $lc++;
  }
	?>
	</select>
	</td>
	<td style="width:5px;">-</td>
	<td>
	<select name='post_minute' onchange="return ondatechange()">
	<option value='<?php echo gmdate("i",time()+(3600 * $tz)); ?>'><?php echo gmdate("i",time()+(3600 * $tz)); ?></option>
	<?php
	$lc = 0;
	while($lc <= 59)
	{
	  if($lc < 10) { $lc = "0$lc"; }
	  echo "<option";
	  if($_POST['post_minute']==$lc)	echo " SELECTED";
	  echo " value='$lc'>$lc</option>";
	  $lc++;
	}
	?>
	</select>
</td></tr></table>
    <p />
    </div>
		<?php // workspace: new_image_form
		eval_addon_admin_workspace_menu('new_image_form');
		?>
    <div class='jcaption'>
    <?php echo $admin_lang_ni_post_entry; ?></div>

    <div class="content">
    <input type="submit" value="<?php echo $admin_lang_ni_upload; ?>" style='width:100px;font-weight:bold;' />
	<a name="warnings">&nbsp;</a>
    </div>
	</form>

    <?php

   // save new post
	if($_GET['x'] == "save")
	{
		$headline = clean($_POST['headline']);
		$body =  clean($_POST['body']);
	  $datetime =
             $_POST['post_year']."-".
             $_POST['post_month']."-".
             $_POST['post_day']." ".
             $_POST['post_hour'].":".
             $_POST['post_minute'].":".date('s');

		if( $_POST['autodate'] == 1 )
		{
			$query = mysql_query("select datetime + INTERVAL 1 DAY from ".$pixelpost_db_prefix."pixelpost order by datetime desc limit 1");
			$row = mysql_fetch_row($query);
			if( $row ) $datetime = $row[0];	// If there is none, will default to the other value
		}
		else if( $_POST['autodate'] == 2 )
		{
			$datetime = gmdate("Y-m-d H:i:s",time()+(3600 * $tz));
		}
		else if ($_POST['autodate'] == 3)// exifdate
		{
			// New, JFK: post date from EXIF
			// delay action to later point. We don't know the filename yet...
			// just set a flag so we know what to do later on
			$postdatefromexif = TRUE;
		};
	
	  if($headline == "")
	  {
			echo  "
  		 <div id='warning'>$admin_lang_ni_missing_data</div><p />
       <script type='text/javascript'>
			 <!--
			 document.location = '#warnings'
			 -->
		 </script>";
	    exit;
	  }

	  // prepare the file
		if($_FILES['userfile'] != "")
		{
			$userfile = strtolower($_FILES['userfile']['name']);
			$tz = $cfgrow['timezone'];

			if ($cfgrow['timestamp']=='yes')
				$time_stamp_r = gmdate("YmdHis",time()+(3600 * $tz)) .'_';

			$uploadfile = $upload_dir .$time_stamp_r .$userfile;

			if(move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile))
			{
				chmod($uploadfile, 0644);
				$result = check_upload($_FILES['userfile']['error']);
				$filnamn =strtolower($_FILES['userfile']['name']);
				$filnamn = $time_stamp_r .$filnamn;
				$filtyp = $_FILES['userfile']['type'];
				$filstorlek = $_FILES['userfile']['size'];
				$status = "ok";
				if($postdatefromexif == TRUE)
				{
					$exif_result = read_exif_data_raw($uploadfile,"0");
					$exposuredatetime = $exif_result['SubIFD']['DateTimeOriginal'];
					if ($exposuredatetime!='')
					{
						list($exifyear,$exifmonth,$exifday,$exifhour,$exifmin, $exifsec) = split('[: ]', $exposuredatetime);
				    $datetime = date("Y-m-d H:i:s", mktime($exifhour, $exifmin, $exifsec, $exifmonth, $exifday, $exifyear));
				  }
				  else
				  	$datetime = gmdate("Y-m-d H:i:s",time()+(3600 * $tz));
	      }
			}
			else
			{
				// something went wrong, try to describe what
				if ($_FILES['userfile']['error']!='0')
					$result = check_upload($_FILES['userfile']['error']);
				else
					$result = "$admin_lang_ni_upload_error ";

				echo "<div id='warning'>$admin_lang_error  ";
				echo "<br>$result</div><hr>";
	 			$status = "no";
			} // end move
		} // end prepare of file ($_FILES['userfile'] != "")

	  // insert post in mysql
		$image = $filnamn;
		if($status == "ok")
		{
			$query = "insert into ".$pixelpost_db_prefix."pixelpost(datetime,headline,body,image)
			VALUES('$datetime','$headline','$body','$image')";
			$result = mysql_query($query) || die("Error: ".mysql_error().$admin_lang_ni_db_error);
	
	    $theid = mysql_insert_id(); //Gets the id of the last added image to use in the next "insert"
	
			if (isset($_POST['category']))
			{
				foreach($_POST['category'] as $val)
				{
					$query  ="INSERT INTO ".$pixelpost_db_prefix."catassoc(id,cat_id,image_id) VALUES(NULL,'$val','$theid')";
					$result = mysql_query($query) || die("Error: ".mysql_error());
				}
	    }
	
	    // done

			// workspace: image_uploaded
			eval_addon_admin_workspace_menu('image_uploaded');
			$headline = pullout($_POST['headline']);
			$body = pullout($_POST['body']);
			$headline = htmlspecialchars($headline,ENT_QUOTES);
			$body = htmlspecialchars($body,ENT_QUOTES);
			$to_echo = "
			 <div id='caption'>$admin_lang_ni_posted: $headline</div>
			 <div class='content'>$body<br />
			 $datetime<br/><a href=\"$PHP_SELF?view=images&id=$theid\">[$admin_lang_imgedit_edit]</a><p>
			 ";
			// Check if the '12c' is selected as the crop then add 3 buttons to the page '+', '-', and 'crop'
			if ($cfgrow['crop']=='12c')
			{
				$to_echo .="
							 $admin_lang_ni_crop_nextstep<br />
							 <input type='button' name='Submit1' value='".$txt['cropimage']."' onclick=\"cropCheck('def','".$filnamn ."');\" />
							 <input type='button' name='Submit3' value='".$txt['smaller']."' onmousedown=\"cropZoom('in');\" onmouseup='stopZoom();' />
							 <input type='button' name='Submit4' value='".$txt['bigger']."' onmousedown=\"cropZoom('out');\" onmouseup='stopZoom();' />
							 <br /> ";
			};
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
					if ($cfgrow['crop']!='12c')
					{
						if ($show_image_after_upload)
						echo "<img src='../images/$filnamn'  />";
						echo "</div><!-- end of content div -->" ; // close content div
					}// end if
					/* else it is '12c' crop and show cropdiv and the cropping frame
							at the bottom of the page.
					*/
					else
					{
					// set the size of the crop frame according to the uploaded image
					setsize_cropdiv ($filnamn);
					//--------------------------------------------------------
						$for_echo ="
							<img src='../images/$filnamn' id='myimg' />
							<div id='cropdiv'>
							<table width='100%' height='100%' border='1' cellpadding='0' cellspacing='0' bordercolor='#000000'>
							<tr>
							<td><img src='".$spacer."' /></td>
							</tr>
							</table>
							</div> <!-- end of crop div -->
							<div id='editthumbnail'>
							<hidden>$admin_lang_ni_crop_background</hidden>
							</div><!-- end of editthumbnail id -->

						</div> <!-- end of content div -->  ";
						echo $for_echo;
					//--------------------------------------------------------
					} // end else
				} // gd info
			} // function_exists

			// save tags
			save_tags_new($_POST['tags'],$theid);
		} // end status ok
	} // end save
} // end view=null
?>