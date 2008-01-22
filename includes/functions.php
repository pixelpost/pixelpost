<?php

// SVN file version:
// $Id$


/**
 * Check if directory exists. If it does not, attempt to create it.
 *
 */
function check_and_set($directory)
{
    if(@file_exists($directory))
    {
        if(@is__writable($directory))
        {
            return "ok";
        }
        else
        {
            if(@chmod($directory, 0777))
            {
                return "ok";
            }
            else
            {    
                return "chmod";
            }
        }
    }
    else
    {
        if(@mkdir($directory))
        {
            return check_and_set($directory);
        }
        else
        {
            return "create";
        }
    }    
}

/**
 * Will work despite of Windows ACLs bug
 *
 * NOTE: use a trailing slash for folders!!!
 *
 * See http://bugs.php.net/bug.php?id=27609 AND http://bugs.php.net/bug.php?id=30931
 * Source: <http://www.php.net/is_writable#73596>
 *
 */
function is__writable($path)
{
	// recursively return a temporary file path
	if($path{strlen($path)-1} == '/')
	{
		return is__writable($path.uniqid(mt_rand()).'.tmp');
	}
	elseif(is_dir($path))
	{
		return is__writable($path.'/'.uniqid(mt_rand()).'.tmp');
	}
	
    // check tmp file for read/write capabilities
    $rm = file_exists($path);
    $f  = @fopen($path, 'a');
    
    if($f===false){ return false; }
    
    fclose($f);
    
    if(!$rm){ unlink($path); }
    
    return true;
}

/**
 * Check for a valid email address
 *
 */
function check_email_address($email)
{
	if(preg_match('/[\x00-\x1F\x7F-\xFF]/', $email)) // Check for invalid characters
	{
		return false;
	}

	if(!preg_match('/^[^@]{1,64}@[^@]{1,255}$/', $email)) // Check that there's one @ symbol, and that the lengths are right
	{
		return false;
	}
	
	$email_array = explode('@', $email); // Split it into sections to make life easier

	$local_array = explode('.', $email_array[0]); // Check local section
	
	foreach($local_array as $local_part)
	{
		if(!preg_match('/^(([A-Za-z0-9!#$%&\'*+\/=?^_`{|}~-]+)|("[^"]+"))$/', $local_part))
		{
			return false;
		}
	}
	
	if(preg_match('/^(25[0-5]|2[0-4][0-9]|1[0-9][0-9]|[1-9]?[0-9])(\.(25[0-5]|2[0-4][0-9]|1[0-9][0-9]|[1-9]?[0-9])){3}$/', $email_array[1]) OR preg_match('/^\[(25[0-5]|2[0-4][0-9]|1[0-9][0-9]|[1-9]?[0-9])(\.(25[0-5]|2[0-4][0-9]|1[0-9][0-9]|[1-9]?[0-9])){3}\]$/', $email_array[1])) // Check domain section
	{
		return true; // If an IP address
	}
	else
	{   // If not an IP address
		$domain_array = explode('.', $email_array[1]);
		if(sizeof($domain_array) < 2)
		{
			return false; // Not enough parts to be a valid domain
		}
		foreach($domain_array as $domain_part)
		{
			if(!preg_match('/^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]))$/', $domain_part))
			{
				return false;
			}
		}
		
		return true;
	}
}

/**
 * Returns the Pixelpost version by looking at the database.  Returns 0 if not installed.
 *
 */
function Get_Pixelpost_Version($prefix)
{
	// First, check to see if we are >= v1.4
	$query = mysql_query("SELECT `version` FROM `{$prefix}version` ORDER BY `version` DESC LIMIT 1");
	if($query)
	{
		if($row = mysql_fetch_array($query))
		{
			if($row[0] > 1.3) return $row[0];
		}
	}

	// Second, check to see if we are installed?
	$query = @mysql_query("SELECT COUNT(admin) FROM `{$prefix}config`");
	if($query)
	{
		if($row = mysql_fetch_array($query))
		{
			if($row[0] > 0) return 1.3;	// This could also be 1.2, but that is okay
		}
	}
	return 0; // Everything failed, must not be installed
}

/**
 * Print an images comments
 *
 */
function print_comments($imageid)
{
	global $pixelpost_db_prefix, $lang_no_comments_yet, $lang_visit_homepage, $cfgrow;

	$image_comments = '<ul>';
	
	$cquery = mysql_query("SELECT `datetime`, `message`, `name`, `url`, `email` FROM `".$pixelpost_db_prefix."comments` WHERE `parent_id` = '".$imageid."' AND `publish` = 'yes' ORDER BY `id` ASC");
	$comment_count = 0;
	while(list($comment_datetime, $comment_message, $comment_name, $comment_url, $comment_email) = mysql_fetch_row($cquery))
	{
		$comment_name	 = pullout($comment_name);
		$comment_email	 = pullout($comment_email);
		$comment_message = pullout($comment_message);

		if($comment_url != "")
		{
	  		if(preg_match('/^(http|https):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}'.'((:[0-9]{1,5})?\/.*)?$/i' ,$comment_url))
			{
  				$comment_name = "<a href=\"$comment_url\" title=\"$lang_visit_homepage\" target=\"_blank\" rel=\"nofollow\">$comment_name</a>";
			}
			else
			{
				unset($comment_url);
				$comment_name = "$comment_name";
			}
		}

		$comment_datetime = strtotime($comment_datetime);
		$comment_datetime = date($cfgrow['dateformat'],$comment_datetime);
		
		if($comment_email == $cfgrow['email'])
		{   // admin comment
			$image_comments .= "<li class=\"admin_comment\">$comment_message<br />$comment_name @ $comment_datetime</li>";
		}
		else
		{
			$image_comments .= "<li>$comment_message<br />$comment_name @ $comment_datetime</li>";
		}
		
		$comment_count++;
	}

	if($comment_count == 0){ $image_comments .= "<li>$lang_no_comments_yet</li>"; }

	$image_comments .= '</ul>';

	return $image_comments;
}

/**
 * Return upload error string
 *
 */
function check_upload($string)
{
	global $admin_lang_pp_up_error_0, $admin_lang_pp_up_error_1, $admin_lang_pp_up_error_2, $admin_lang_pp_up_error_3, $admin_lang_pp_up_error_4;

	$error_explained = array(
							 "0" => "$admin_lang_pp_up_error_0",
							 "1" => "$admin_lang_pp_up_error_1",
							 "2" => "$admin_lang_pp_up_error_2",
							 "3" => "$admin_lang_pp_up_error_3",
							 "4" => "$admin_lang_pp_up_error_4"
							 //"6" => "$admin_lang_pp_up_error_6",
							 //"7" => "$admin_lang_pp_up_error_7"
							);

 	$result = $error_explained[$string];
	return($result);
}

/**
 * Create a thumbnail
 *
 */
function createthumbnail($file)
{
	global $pixelpost_db_prefix;
	
	$img = null;
	
	$cfgquery = mysql_query("SELECT * FROM `".$pixelpost_db_prefix."config`");
	$cfgrow   = mysql_fetch_array($cfgquery);
	
	// credit to codewalkers.com - there is 90% a tutorial there
	$max_width  = $cfgrow['thumbwidth'];
	$max_height = $cfgrow['thumbheight'];
	
	$image_base = rtrim($cfgrow['imagepath'],"/");
	$image_path = $image_base.'/'.$file;
	
	$image_path_exp = explode('.', $image_path);
	$image_path_end = end($image_path_exp);
	
	$ext = strtolower($image_path_end);
	
	if($ext == 'jpg' || $ext == 'jpeg')
	{
		$img = @imagecreatefromjpeg($image_path);
	}
	elseif($ext == 'png')
	{
		$img = @imagecreatefrompng($image_path);
	}
	elseif($ext == 'gif')
	{
		$img = @imagecreatefromgif($image_path);
	}
	
	if($img)
	{
		$width  = imagesx($img);
		$height = imagesy($img);
		$scale  = max($max_width/$width, $max_height/$height);
		
		if($scale < 1)
		{
			$new_width  = floor($scale*$width);
			$new_height = floor($scale*$height);
			$tmp_img    = imagecreatetruecolor($new_width,$new_height);
			
			
			if(function_exists('imagecopyresampled')) // GD >= 2.0.1
			{
				imagecopyresampled($tmp_img, $img, 0,0,0,0,$new_width,$new_height,$width,$height);
			}
			else
			{ // GD <= 2.0
				imagecopyresized($tmp_img, $img, 0,0,0,0,$new_width,$new_height,$width,$height);
			}
			
			imagedestroy($img);
			
			if($cfgrow['thumb_sharpening'] != 0)
			{
				$tmp_img = unsharp_mask($tmp_img, $cfgrow['thumb_sharpening']); 
			}
			
			$img = $tmp_img;
		}
		
		if($cfgrow['crop'] == "yes" | $cfgrow['crop'] == "12c")
		{   // crop
			$tmp_img = imagecreatetruecolor($max_width,$max_height);
			if(function_exists('imagecopyresampled'))
			{
				imagecopyresampled($tmp_img, $img, 0,0,0,0,$max_width,$max_height,$max_width,$max_height);
			}
			else
			{
				imagecopyresized($tmp_img, $img, 0,0,0,0,$max_width,$max_height,$max_width,$max_height);
			}
			imagedestroy($img);
			
			if($cfgrow['thumb_sharpening'] != 0)
			{
				$tmp_img = unsharp_mask($tmp_img, $cfgrow['thumb_sharpening']); 
			}
			
			$img = $tmp_img;
		}
	}
	touch($cfgrow['thumbnailpath']."thumb_$file");
	imagejpeg($img,$cfgrow['thumbnailpath']."thumb_$file",$cfgrow['compression']);
	
	$thumbimage = $cfgrow['thumbnailpath']."thumb_$file";
	chmod($thumbimage,0644);
}

function unsharp_mask($img, $sharpeningsetting){

////////////////////////////////////////////////////////////////////////////////////////////////
////  
////                  Unsharp Mask for PHP - version 2.1.1
////  
////    Unsharp mask algorithm by Torstein H¬Ønsi 2003-07.
////             thoensi_at_netcom_dot_no.
////               Please leave this notice.
////  
///////////////////////////////////////////////////////////////////////////////////////////////
	
	
	
    // $img is an image that is already created within php using
    // imgcreatetruecolor. No url! $img must be a truecolor image.

    switch ($sharpeningsetting) {
    case 1: //light
        $amount= 15; //typically 50 - 200
		$radius= 0.3; //typically 0.5 - 1
		$threshold= 2; //typically 0 - 5
        break;
    case 2: //medium
        $amount= 30; //typically 50 - 200
		$radius= 0.3; //typically 0.5 - 1
		$threshold= 1; //typically 0 - 5
        break;
    case 3: //high
        $amount= 50; //typically 50 - 200
		$radius= 0.3; //typically 0.5 - 1
		$threshold= 3; //typically 0 - 5
        break;
    case 4: //ultra-high
        $amount= 70; //typically 50 - 200
		$radius= 0.3; //typically 0.5 - 1
		$threshold= 3; //typically 0 - 5
        break;
	}
    
    // Attempt to calibrate the parameters to Photoshop:
    if($amount > 500)    $amount = 500;
    $amount = $amount * 0.016;
    if($radius > 50)    $radius = 50;
    $radius = $radius * 2;
    if($threshold > 255)    $threshold = 255;
    
    $radius = abs(round($radius)); // Only integers make sense.
    if($radius == 0) { return $img; imagedestroy($img); break; }
    $w = imagesx($img);
    $h = imagesy($img); 
    $imgCanvas = imagecreatetruecolor($w, $h); 
    $imgBlur   = imagecreatetruecolor($w, $h); 
    
    
    // Gaussian blur matrix: 
    //                         
    //    1    2    1         
    //    2    4    2         
    //    1    2    1         
    //                         
    ////////////////////////////////////////////////// 
    
    
    if(function_exists('imageconvolution')){ // PHP >= 5.1  
            $matrix = array(  
            array( 1, 2, 1 ),  
            array( 2, 4, 2 ),  
            array( 1, 2, 1 )  
        );  
        imagecopy ($imgBlur, $img, 0, 0, 0, 0, $w, $h); 
        imageconvolution($imgBlur, $matrix, 16, 0);  
    }else{

    	// Move copies of the image around one pixel at the time and merge them with weight 
		// according to the matrix. The same matrix is simply repeated for higher radii. 
		for ($i = 0; $i < $radius; $i++)    { 
            imagecopy ($imgBlur, $img, 0, 0, 1, 0, $w - 1, $h); // left 
            imagecopymerge ($imgBlur, $img, 1, 0, 0, 0, $w, $h, 50); // right 
            imagecopymerge ($imgBlur, $img, 0, 0, 0, 0, $w, $h, 50); // center 
            imagecopy ($imgCanvas, $imgBlur, 0, 0, 0, 0, $w, $h); 

            imagecopymerge ($imgBlur, $imgCanvas, 0, 0, 0, 1, $w, $h - 1, 33.33333 ); // up 
            imagecopymerge ($imgBlur, $imgCanvas, 0, 1, 0, 0, $w, $h, 25); // down 
        } 
    } 

    if($threshold>0){ 
        // Calculate the difference between the blurred pixels and the original 
        // and set the pixels 
        for ($x = 0; $x < $w-1; $x++)    { // each row
            for ($y = 0; $y < $h; $y++)    { // each pixel 
                     
                $rgbOrig = ImageColorAt($img, $x, $y); 
                $rOrig = (($rgbOrig >> 16) & 0xFF); 
                $gOrig = (($rgbOrig >> 8) & 0xFF); 
                $bOrig = ($rgbOrig & 0xFF); 
                 
                $rgbBlur = ImageColorAt($imgBlur, $x, $y); 
                 
                $rBlur = (($rgbBlur >> 16) & 0xFF); 
                $gBlur = (($rgbBlur >> 8) & 0xFF); 
                $bBlur = ($rgbBlur & 0xFF); 
                 
                // When the masked pixels differ less from the original 
                // than the threshold specifies, they are set to their original value. 
                $rNew = (abs($rOrig - $rBlur) >= $threshold)  
                    ? max(0, min(255, ($amount * ($rOrig - $rBlur)) + $rOrig))  
                    : $rOrig; 
                $gNew = (abs($gOrig - $gBlur) >= $threshold)  
                    ? max(0, min(255, ($amount * ($gOrig - $gBlur)) + $gOrig))  
                    : $gOrig; 
                $bNew = (abs($bOrig - $bBlur) >= $threshold)  
                    ? max(0, min(255, ($amount * ($bOrig - $bBlur)) + $bOrig))  
                    : $bOrig; 
                 
                 
                             
                if (($rOrig != $rNew) || ($gOrig != $gNew) || ($bOrig != $bNew)) { 
                        $pixCol = ImageColorAllocate($img, $rNew, $gNew, $bNew); 
                        ImageSetPixel($img, $x, $y, $pixCol); 
                    } 
            } 
        } 
    } 
    else{ 
        for ($x = 0; $x < $w; $x++)    { // each row 
            for ($y = 0; $y < $h; $y++)    { // each pixel 
                $rgbOrig = ImageColorAt($img, $x, $y); 
                $rOrig = (($rgbOrig >> 16) & 0xFF); 
                $gOrig = (($rgbOrig >> 8) & 0xFF); 
                $bOrig = ($rgbOrig & 0xFF); 
                 
                $rgbBlur = ImageColorAt($imgBlur, $x, $y); 
                 
                $rBlur = (($rgbBlur >> 16) & 0xFF); 
                $gBlur = (($rgbBlur >> 8) & 0xFF); 
                $bBlur = ($rgbBlur & 0xFF); 
                 
                $rNew = ($amount * ($rOrig - $rBlur)) + $rOrig; 
                    if($rNew>255){$rNew=255;} 
                    elseif($rNew<0){$rNew=0;} 
                $gNew = ($amount * ($gOrig - $gBlur)) + $gOrig; 
                    if($gNew>255){$gNew=255;} 
                    elseif($gNew<0){$gNew=0;} 
                $bNew = ($amount * ($bOrig - $bBlur)) + $bOrig; 
                    if($bNew>255){$bNew=255;} 
                    elseif($bNew<0){$bNew=0;} 
                $rgbNew = ($rNew << 16) + ($gNew <<8) + $bNew; 
                    ImageSetPixel($img, $x, $y, $rgbNew); 
            } 
        } 
    } 
    imagedestroy($imgCanvas); 
    imagedestroy($imgBlur); 
   return $img; 
} 

function sql_query($str)
{
	$query = "$str";
	$result = mysql_query($query) || die(mysql_error());
}

function sql_array($str)
{
	$query = mysql_query($str) or die( mysql_error());
	$row = mysql_fetch_array($query);
	return $row;
}

function clean($str)
{
	$str = addslashes($str);
	return $str;
}

function pullout($str)
{
	$str = stripslashes($str);
	return $str;
}

function clean_url($str)
{
	$url = EscapeShellCmd($str);
	return $str;
}

/**
 * Book a visitor
 *
 */
function book_visitor($str)
{
	if(!isset($_COOKIE['lastvisit'])) // If the cookie 'lastvisit' is not set, count the person
	{
		global $cfgrow;
		
		$datetime = gmdate("Y-m-d H:i:s",gmdate("U")+(3600 * $cfgrow['timezone']));
		$host = $_SERVER['HTTP_HOST'];
		if(isset($_SERVER['HTTP_REFERER']))
		{
			$referer     = addslashes($_SERVER['HTTP_REFERER']);
			$refererhost = parse_url($referer);
			$refererhost = $refererhost['host'];
			if($refererhost == $host)
			{
		   		$referer = "";
			}
		}
		else
		{
			$referer="";
		}
		$ua   = addslashes($_SERVER['HTTP_USER_AGENT']);
		$ip   = $_SERVER['REMOTE_ADDR'];
		$ruri = addslashes($_SERVER['REQUEST_URI']);
		
		$query = mysql_query("INSERT INTO `$str`(`id`,`datetime`,`host`,`referer`,`ua`,`ip`,`ruri`) VALUES (NULL,'$datetime','$host','$referer','$ua','$ip','$ruri')");
	}
}

/**
 * Start the database connection
 *
 */
function start_mysql($config_file = 'includes/pixelpost.php', $request_uri = 'front')
{
	global $pixelpost_db_host, $pixelpost_db_user, $pixelpost_db_pass, $pixelpost_db_pixelpost;
	
	$dir = 'templates';
	
	if(!file_exists($dir ."/splash_page.html"))
	{
		$dir = '../templates';
	}
	
	if(!file_exists($config_file))
	{
		show_splash("Connect DB Error: ". mysql_error()." Cause #1",$dir);
	}
		
	if(!mysql_connect($pixelpost_db_host, $pixelpost_db_user, $pixelpost_db_pass))
	{
		if($request_uri == 'admin')
		{
			header("Location: install.php?view=db_fix");
			exit;
		}
		else
		{
			show_splash("Connect DB Error: ". mysql_error()." Cause #2",$dir);
		}
	}

	if(!mysql_select_db($pixelpost_db_pixelpost))
	{
		if($request_uri == 'admin')
		{
			header("Location: install.php?view=db_fix");
			exit;
		}
		else
		{
			show_splash("Select DB Error: ". mysql_error()." Cause #2",$dir);
		}
	}
}

/**
 * Show splash screen
 *
 */
function show_splash($extra_message,$splash_dir)
{
	if(file_exists($splash_dir."/splash_page.html"))
	{
		$splash = file_get_contents($splash_dir.'/splash_page.html');
		$splash = ereg_replace("<ERROR_MESSAGE>",$extra_message,$splash);
		die($splash);
	}
	else
	{
		die($extra_message);
	}
}

/**
 * Reduce EXIF
 *
 */
function &reduceExif($exifvalue)
{
	$vals = split("/",$exifvalue);
	if(count($vals) == 2)
	{
		// MJS 29092005 - Code to deal with exposure times of > 1 sec
		if($vals[1] == 0)
		{
			$exposure = round($vals[0].$vals[1],2);
		}
		else
		{
			$exposure = round($vals[0]/$vals[1],2);
			if($exposure < 1)
			{
				$exposure = '1/'.round($vals[1]/$vals[0],0);
			}
		}
	}
	else	$exposure = round($vals[0]/$vals[1], 2);

	return $exposure;
}

/**
 * Create categories HTML table
 *
 */
function category_list_as_table($categories, $cfgrow)
{
	global $pixelpost_db_prefix;

	if(!is_array($categories)){ $categories = array(); }
	
	// get the id and name of the first entered category, default category.
	$query = mysql_query("SELECT * FROM `".$pixelpost_db_prefix."categories` ORDER BY `id` ASC LIMIT 0,1");
	list($firstid,$firstname) = mysql_fetch_row($query);
	
	$getid = isset($_GET['id']);
	$getid = intval($getid);
	
	// begin of category-list as a table
	
	$x = 0;
	$query = mysql_query("SELECT t1.id, `name`, `alt_name`, `image_id` FROM `".$pixelpost_db_prefix."categories` AS t1 LEFT JOIN `".$pixelpost_db_prefix."catassoc` t2 ON t2.cat_id = t1.id AND t2.image_id = '$getid' ORDER BY t1.name");
	while(list($id,$name) = mysql_fetch_row($query))
	{
		echo "<table id='cattable'><tr>";
		
		$catcounter = 0;
		$query = mysql_query("SELECT t1.id, `name`, `alt_name`, `image_id` FROM `".$pixelpost_db_prefix."categories` AS t1 LEFT JOIN `".$pixelpost_db_prefix."catassoc` t2 ON t2.cat_id = t1.id AND t2.image_id = '$getid' ORDER BY t1.name");
		while(list($id,$name,$alt_name,$image_id) = mysql_fetch_row($query))
		{
			$name = pullout($name);
			
			$alt_name = ($cfgrow['altlangfile'] != 'Off') ? " (".pullout($alt_name).")" : null;
			
			$id = pullout($id);
			$catcounter++;
			$inarow = 4;
			if(($image_id != "" AND isset($_GET['view']) AND $_GET['view'] == 'images') || in_array($id,$categories))
			{
				echo "<td><input type='checkbox' CHECKED name='category[]' value='".$id."' id='cat".$x."'/>&nbsp;<label for='cat".$x."'>".$name.$alt_name."</label></td>";
			}
			else
			{
				//if($firstid == $id && $_GET['view']!='images') // if it is the first defualt category in the new_image page
				echo "<td><input type='checkbox' name='category[]' value='".$id."' id='cat".$x."'/>&nbsp;<label for='cat".$x."'>".$name.$alt_name."</label></td>";
				//else // if it is other categories in the new image page
				//echo "<td><input type='checkbox' name='category[]' value='".$id."' id='cat".$x."'/>&nbsp;<label for='cat".$x."'>".$name.$alt_name."</label></td>";
			}
			
			if($catcounter % $inarow == 0)
			{
				echo "\n</tr><tr>\n";
			}
			else
			{
				echo "\n";
			}

			$x++;
		}
	}

	if($catcounter % $inarow > 0){ echo "</tr>"; }

	echo "</table>\n\n";
}

/**
 * Refresh the addon table
 *
 */
function refresh_addons_table($dir){
	add_new_addons_2table($dir);
	
	delete_obsolete_addon($dir);
}

/**
 * Add a new addon to the addons table
 *
 */
function add_new_addons_2table($dir){

	global $pixelpost_db_prefix;

	$query = mysql_query("SELECT * FROM `".$pixelpost_db_prefix."addons` LIMIT 1");
	if($query){
	
		$str = '';

		if($handle = opendir($dir))
		{
			while(false !== ($file = readdir($handle)))
			{
				if($file != "." && $file != "..")
				{
					$ftype = '';
					
					if(is_dir($dir."/".$file))
					{
						$sub_dir = $file;
						
 				    	if(substr($sub_dir, 0, 1)=="_")
 				    	{	// only suck in files from folders starting with a _
 				    		// read through the files in this folder (only one level deep)
  							if($handle_subdir = opendir($dir."/".$sub_dir))
  							{
  								while(false !== ($file_subdir = readdir($handle_subdir)))
  								{
  									if($file_subdir != "." && $file_subdir != "..")
  									{ 
  										$farry = explode('.', $file_subdir);
										reset($farry);
										
										$filename	  = current($farry);
										$filename_exp = explode('_', $filename);
										if(is_array($filename_exp)){ $filename_crnt = current($filename_exp); }
									
										$addontype = strtolower($filename_crnt);
										$farry_end = end($farry);
										$ftype	   = strtolower($farry_end);
										$filename  = $sub_dir."/".$filename;
									}
									if($ftype == "php" AND !check_addon_exists($filename,$pixelpost_db_prefix))
									{
										switch (strtolower($addontype)){
											case "admin":
												$query = "INSERT INTO `{$pixelpost_db_prefix}addons` VALUES ( NULL, '$filename',  'off', '".strtolower($addontype)."')";
												break;	
											case "front":
												$query = "INSERT INTO `{$pixelpost_db_prefix}addons` VALUES ( NULL, '$filename',  'off', '".strtolower($addontype)."')";
												break;	
											default:
												$query = "INSERT INTO `{$pixelpost_db_prefix}addons` VALUES ( NULL, '$filename', 'off', 'normal')";
												break; 	
										}
										mysql_query($query);
										if(mysql_error()){ echo 'Failed to insert addon: ' .$filename .'.php'; }
									}
								}
								closedir($handle_subdir);
							}
						}
					}
					else
					{
						$farry = explode('.', $file);
						reset($farry);
						
						$filename = current($farry);
						$filename_exp = explode('_', $filename);
						if(is_array($filename_exp)){ $filename_crnt = current($filename_exp); }
						
						$addontype = strtolower($filename_crnt);
						$farry_end = end($farry);
						$ftype	   = strtolower($farry_end);
					}
					if($ftype == "php" AND !check_addon_exists($filename,$pixelpost_db_prefix))
					{
						switch (strtolower($addontype)){
							case "admin":
								$query = "INSERT INTO {$pixelpost_db_prefix}addons VALUES ( NULL, '$filename',  'off', '".strtolower($addontype)."')";
								break;	
							case "front":
								$query = "INSERT INTO {$pixelpost_db_prefix}addons VALUES ( NULL, '$filename',  'off', '".strtolower($addontype)."')";
								break;	
							default:
								$query = "INSERT INTO {$pixelpost_db_prefix}addons VALUES ( NULL, '$filename', 'off', 'normal')";
								break; 	
						}
						mysql_query( $query);
						if(mysql_error()){ echo 'Failed to insert addon: ' .$filename .'.php'; }
					}
				}
			}
			closedir($handle);
		}
	}
}

/**
 * Deletes the table row of the previously removed addon
 *
 */
function delete_obsolete_addon($dir)
{
	global $pixelpost_db_prefix;

	$query = mysql_query("SELECT * FROM `".$pixelpost_db_prefix."addons` LIMIT 1");
	if($query)
	{
		$query = mysql_query("SELECT `id`, `addon_name` FROM `".$pixelpost_db_prefix."addons`");
		while(list($id, $addon_name) = mysql_fetch_row($query))
		{
			if(!file_exists($dir.$addon_name.'.php'))
			{
				$query = mysql_query("DELETE FROM `".$pixelpost_db_prefix."addons` WHERE `id` = '$id'");
				if(mysql_error()){ echo 'Failed to delete the addon_name: '.$addon_name; }
			}
		}
	}
}

/**
 * Check existence of an addon in the addons table
 *
 */
function check_addon_exists($name,$db_prefix)
{
	$returnvalue = FALSE;
	$query = "select id from {$db_prefix}addons where addon_name='$name'";
	$query = mysql_query($query);
	while (list($id)= mysql_fetch_row($query))
	{
		if (is_numeric($id))	$returnvalue = TRUE;
	}
	return $returnvalue;
}

/**
 * Check existence of a table
 *
 */
function is_table_created($table_name)
{
	global $pixelpost_db_prefix;

	$query = mysql_query("SELECT `id` FROM `{$pixelpost_db_prefix}".$table_name."` LIMIT 1");
	
	if(!$query)
	{
		return false;
	}
	
	return true;
}

/**
 * Check if a field exists inside a table
 *
 */
function is_field_exists($fieldname,$table)
{
	global $pixelpost_db_prefix, $pixelpost_db_pixelpost, $table_name;
		
	$table = $pixelpost_db_prefix.$table;
	$fieldexists = FALSE;
	$t = 0;
	$attention_call = '';
	if($table != '')
	{
		$result_id = mysql_list_fields($pixelpost_db_pixelpost, $table);
		
		for($t = 0; $t < mysql_num_fields($result_id); $t++)
		{
			$msql_fname = mysql_field_name($result_id, $t);

			if(strtolower($fieldname) == strtolower($msql_fname))
			{
				$fieldexists = TRUE;
				break;
			}
		}
	}
	return $fieldexists;
}

//----------- for addons in admin panel

/**
 * Add admin functions
 *
 */
function add_admin_functions($function_name, $function_workspace,$function_menu ='' ,$function_submenu ='')
{
	global $addon_admin_functions;
	
	$wrkspc_fcn = array('function_name' => $function_name,
						'workspace' => $function_workspace,
						'menu_name' => $function_menu,
						'submenu_name' => $function_submenu
					   );
					   
	$c   = count($addon_admin_functions);
	$end = array($c => $wrkspc_fcn);
	$addon_admin_functions = array_merge($addon_admin_functions, $end);
}

/**
 * Add front functions
 *
 */
function add_front_functions($function_name, $function_workspace)
{
	global $addon_front_functions;
	
	$wrkspc_fcn = array('function_name' => $function_name,
						'workspace' => $function_workspace
					   );
					   
	$c   = count($addon_front_functions);
	$end = array($c => $wrkspc_fcn);
	
	//var_dump($c);
	if($c > 0){
		$addon_front_functions = array_merge($addon_front_functions, $end);
	}
	
	
}

/**
 * Evaluates the admin workspace menu functions
 *
 */
function eval_addon_admin_workspace_menu($workspace,$menu_name ='')
{
	global $addon_admin_functions;
	
	for($i = 0 ; $i < count($addon_admin_functions) ; $i++)
	{
		$funcs = $addon_admin_functions[$i];
		
		$view_menu = $menu_name ."view";

		// if action is needed
		if ($funcs['workspace']== strtolower($workspace))
		{
			// if main menu
			if($funcs['workspace']=='admin_main_menu')
			{
				echo "<a href='".$_SERVER['PHP_SELF']."?view=".strtolower($funcs['menu_name'])."'>".$funcs['menu_name']."</a>";
				continue;
			}
			// no menu
			if($menu_name == '')
			{
				if($funcs['workspace']=='admin_main_menu_contents' & isset($_GET['view']) AND $_GET['view']!=strtolower($funcs['menu_name']))	continue;
				call_user_func ($funcs['function_name']);
			}
			else
			{
				if($_GET['view'] == strtolower($menu_name) && $_GET[$view_menu] == strtolower($funcs['submenu_name']))
				{
					call_user_func ($funcs['function_name']);
				}
			}
		}
	}
}

/**
* Evaluates the front workspace functions
 *
 */
function eval_addon_front_workspace($workspace)
{
	global $addon_front_functions;
	
	for ($i = 0 ; $i < count($addon_front_functions) ; $i++)
	{
		$funcs = $addon_front_functions[$i];
		
		if($funcs['workspace']== strtolower($workspace))
		{
			call_user_func ($funcs['function_name']);
		}
	}
}

/**
 * Create the admin addon array
 *
 */
function create_admin_addon_array()
{
	global $addon_admin_functions, $pixelpost_db_prefix;
	
	if(isset($_GET['view']) AND $_GET['view'] != "addons" OR !isset($_GET['view']))
	{
		$addons = mysql_query("SELECT * FROM `{$pixelpost_db_prefix}addons` WHERE `status` = 'on' AND `type` = 'admin' ORDER BY `id` ASC");  

		while(list($id, $filename, $status, $addon_type) = mysql_fetch_row($addons))
		{
			require_once(ADDON_DIR.$filename.'.php');
		}
	}
}

/**
 * Create the front addon array
 *
 */
function create_front_addon_array()
{
	global $addon_front_functions, $pixelpost_db_prefix;
	
	$query = mysql_query("SELECT * FROM `{$pixelpost_db_prefix}addons` WHERE `status` = 'on' AND `type` = 'front'");
		
	while(list($id, $filename, $status, $addon_type) = mysql_fetch_row($query))
	{
		include_once(ADDON_DIR.$filename.'.php');
	}
}

/**
 * Print the sub-menus title
 *
 */
function echo_addon_admin_menus($addon_admin_menus,$menu_name,$additional = '')
{
	for($i = 0 ; $i < count($addon_admin_menus) ; $i++)
	{
		$submenus = $addon_admin_menus[$i];

		if($submenus['menu_name'] == $menu_name)
		{
			$submenu_name = $submenus['submenu_name'];
			$menuitem     = strtolower($menu_name).'view';
			$submenuitem  = strtolower($submenu_name);
			$selecteclass = '';
			if(isset($_GET[$menuitem]) && ($_GET[$menuitem] == $submenuitem))
			{
				$selecteclass='selectedsubmenu';
			}
			$toecho ="|<a class='".$selecteclass."' href='?view=".strtolower($menu_name) ."&amp;".$menuitem ."=".$submenuitem.$additional."' id='".$menu_name.$submenu_name."'>" .strtoupper($submenu_name) ."</a>";
			echo $toecho;
		}
	}
}

/**
 * Count addon admin menus
 *
 */
function count_addon_admin_menus($addon_admin_menus,$menu_name,$additional = '')
{
	$menu_items = 0;
	for($i = 0 ; $i < count($addon_admin_menus) ; $i++)
	{
		$submenus = $addon_admin_menus[$i];
		if($submenus['menu_name'] == $menu_name)
		{
			$menu_items=$menu_items+1;
		}
	}
	return $menu_items;
}

//============================= TIMEZONE SECTION BEGINS ========================

/**
 * Creates dropdown menu options of available timezones
 *
 */
function timezone_select()
{
	global $tz_array, $cfgrow;
	
	$default = ($cfgrow['timezone'] == '0') ? '0' : $cfgrow['timezone'];
	
	$tz_select = '';
	foreach($tz_array as $offset => $zone)
	{
		if(is_numeric($offset))
		{
			$selected   = ($offset == $default) ? ' selected="selected"' : '';
			$tz_select .= "<option value=\"$offset\"$selected>$zone</option>\n";
		}
	}
	return $tz_select;
}

$tz_array = array('-12'   => '[UTC - 12]',
				  '-11'   => '[UTC - 11]',
				  '-10'   => '[UTC - 10]',
				  '-9.5'  => '[UTC - 9:30]',
				  '-9'    => '[UTC - 9]',
				  '-8'    => '[UTC - 8]',
				  '-7'    => '[UTC - 7]',
				  '-6'    => '[UTC - 6]',
				  '-5'    => '[UTC - 5]',
				  '-4'    => '[UTC - 4]',
				  '-3.5'  => '[UTC - 3:30]',
				  '-3'    => '[UTC - 3]',
				  '-2'    => '[UTC - 2]',
				  '-1'    => '[UTC - 1]',
				  '0'     => '[UTC]',
				  '1'     => '[UTC + 1]',
				  '2'     => '[UTC + 2]',
				  '3'     => '[UTC + 3]',
				  '3.5'   => '[UTC + 3:30]',
				  '4'     => '[UTC + 4]',
				  '4.5'   => '[UTC + 4:30]',
				  '5'     => '[UTC + 5]',
				  '5.5'   => '[UTC + 5:30]',
				  '5.75'  => '[UTC + 5:45]',
				  '6'     => '[UTC + 6]',
				  '6.5'   => '[UTC + 6:30]',
				  '7'     => '[UTC + 7]',
				  '8'     => '[UTC + 8]',
				  '8.75'  => '[UTC + 8:45]',
				  '9'     => '[UTC + 9]',
				  '9.5'   => '[UTC + 9:30]',
				  '10'	  => '[UTC + 10]',
				  '10.5'  => '[UTC + 10:30]',
				  '11'	  => '[UTC + 11]',
				  '11.5'  => '[UTC + 11:30]',
				  '12'    => '[UTC + 12]',
				  '12.75' => '[UTC + 12:45]',
				  '13'    => '[UTC + 13]',
				  '14'    => '[UTC + 14]'
				);
		   
//============================= TIMEZONE SECTION ENDS ========================


//============================= CONTROL SPAM SECTION BEGINS ========================


// Update the ban list if the form is called
function update_banlist()
{
	global $pixelpost_db_prefix;
	
	$result = '';
	
	if(isset($_POST['banlistupdate']))
	{
		// moderation list
		if(isset($_POST['moderation_list']))
		{
			$banlist = str_replace( "\r\n", "\n", $_POST['moderation_list']);
			$banlist = str_replace( "\r", "\n", $banlist);
			if(version_compare(phpversion(),"4.3.0")=="-1")
			{
				$banlist = mysql_escape_string($banlist);
			}
			else
			{
				$banlist = mysql_real_escape_string($banlist);
			}

			$query = "UPDATE `{$pixelpost_db_prefix}banlist` SET `moderation_list` = '$banlist' LIMIT 1";
			mysql_query($query) ;
			if(mysql_error()){ $result .= "$admin_lang_spam_err_2".mysql_error()."<br/>"; }
		}
		// black list
		if(isset( $_POST['blacklist']))
		{
			$banlist = str_replace( "\r\n", "\n", $_POST['blacklist']);
			$banlist = str_replace( "\r", "\n", $banlist);
			
			if(version_compare(phpversion(),"4.3.0")=="-1")
			{
				$banlist = mysql_escape_string($banlist);
			}
			else
			{
				$banlist = mysql_real_escape_string($banlist);
			}

			$query = "UPDATE `{$pixelpost_db_prefix}banlist` SET `blacklist` = '$banlist' LIMIT 1";
			mysql_query($query) ;
			if(mysql_error()){ $result .= "$admin_lang_spam_err_3".mysql_error()."<br/>"; }
		}
		// referer ban list
		if(isset($_POST['ref_ban_list']))
		{
			$banlist = str_replace( "\r\n", "\n", $_POST['ref_ban_list']);
			$banlist = str_replace( "\r", "\n", $banlist);

			if(version_compare(phpversion(), "4.3.0")=="-1")
			{
				$banlist = mysql_escape_string($banlist);
			}
			else
			{
				$banlist = mysql_real_escape_string($banlist);
			}

			$query = "UPDATE `{$pixelpost_db_prefix}banlist` SET `ref_ban_list` = '$banlist' LIMIT 1";
			mysql_query($query) ;
			if(mysql_error()){ $result .= "$admin_lang_spam_err_4 ".mysql_error()."<br/>"; }
		}
		// acceptable_num_links
		if(isset($_POST['acceptable_num_links']))
		{
			$acceptable_num_links = clean($_POST['acceptable_num_links']);
			
			$query = "UPDATE `{$pixelpost_db_prefix}banlist` SET `acceptable_num_links` = '$acceptable_num_links' LIMIT 1";
			mysql_query($query) ;
			if(mysql_error()){ $result .= "$admin_lang_spam_err_5 ".mysql_error()."<br/>"; }
		}
		if(!isset($result))	$result = "$admin_lang_spam_upd";

		$result = $result."<br/>";
	}
	
	return $result;
}

function clean_banlists($p_value)
{
	if(is_array($p_value))
	{
		if(count($p_value) == 0)
		{
			$p_value = null;
		}
		else
		{
			foreach($p_value as $m_key => $m_value)
			{
				$p_value[$m_key] = clean_banlists ($m_value);
				if (empty ($p_value[$m_key])) unset ($p_value[$m_key]);
			}
		}
	}
	else
	{
		if(empty($p_value))
		{
			$p_value = null;
		}
	}
	
  return $p_value;
  
}
		
/**
 * Get the moderation list
 *
 */
function get_moderation_banlist()
{
	global $pixelpost_db_prefix;
	
	$query = mysql_query("SELECT `moderation_list` FROM `{$pixelpost_db_prefix}banlist` LIMIT 1")or die(mysql_error());

	if($row = mysql_fetch_row($query)){ $banlist = $row[0]; }
	
	$moderation_ban_list_array         = split("[\n|\r]", $banlist);
	$unique_moderation_ban_list_array  = array_keys(array_flip($moderation_ban_list_array));
	$cleaned_moderation_ban_list_array = clean_banlists ($unique_moderation_ban_list_array);
	
	$banlist = implode("\n", $cleaned_moderation_ban_list_array);
	
	if(count($moderation_ban_list_array) > count($cleaned_moderation_ban_list_array))
	{	//the list needs to be updated in the db.;
		$_POST['banlistupdate'] = true;
		$_POST['moderation_list'] = $banlist;
		update_banlist();
		unset($_POST['banlistupdate']);
		unset($_POST['moderation_list']);
	}
	return $banlist;
}

/**
 * Get the blacklist
 *
 */
function get_blacklist()
{
	global $pixelpost_db_prefix;
	
	$query = mysql_query("SELECT `blacklist` FROM `{$pixelpost_db_prefix}banlist` LIMIT 1")or die( mysql_error());
	
	if($row = mysql_fetch_row($query)){ $banlist = $row[0]; }
	
	$blacklist_array		 = split("[\n|\r]", $banlist);
	$unique_blacklist_array  = array_keys(array_flip($blacklist_array));
	$cleaned_blacklist_array = clean_banlists ($unique_blacklist_array);
	
	$banlist = implode("\n", $cleaned_blacklist_array);
	
	if(count($blacklist_array) > count($cleaned_blacklist_array))
	{	//the list needs to be updated in the db.;
		$_POST['banlistupdate'] = true;
		$_POST['blacklist'] = $banlist;
		update_banlist();
		unset($_POST['banlistupdate']);
		unset($_POST['blacklist']);
	}
	return $banlist;
}

/**
 * Get the ref_ban_list
 *
 */
function get_ref_ban_list()
{
  global $pixelpost_db_prefix;
  
	$query = mysql_query("SELECT `ref_ban_list` FROM `{$pixelpost_db_prefix}banlist` LIMIT 1") or die( mysql_error());
	
	if($row = mysql_fetch_row($query)){ $banlist = $row[0]; }

	$ref_ban_list_array         = split("[\n|\r]", $banlist);
	$unique_ref_ban_list_array  = array_keys(array_flip($ref_ban_list_array));
	$cleaned_ref_ban_list_array = clean_banlists ($unique_ref_ban_list_array);
	
	$banlist = implode("\n", $cleaned_ref_ban_list_array);
	
	if (count($ref_ban_list_array) > count($cleaned_ref_ban_list_array))
	{	//the list needs to be updated in the db.;
		$_POST['banlistupdate'] = true;
		$_POST['ref_ban_list'] = $banlist;
		update_banlist();
		unset($_POST['banlistupdate']);
		unset($_POST['ref_ban_list']);
	}
	return $banlist;
}

/**
 * Prevent bad comments
 *
 */
function check_moderation_blacklist($cmnt_message,$cmnt_ip,$cmnt_name,$field)
{
	global $pixelpost_db_prefix;

	// help from wordpress codes
	$query = mysql_query("SELECT `".$field."` FROM `{$pixelpost_db_prefix}banlist` LIMIT 1");
	$bad_keys = mysql_fetch_array($query);

	$words = explode("\n", $bad_keys[$field]);

	foreach($words as $word)
	{
		$word = trim($word);

		// Skip empty lines
		if(empty($word)){ continue; }

		// Do some escaping magic so that '#' chars in the
		// spam words don't break things:
		$word = preg_quote($word, '#');

		$pattern = "#$word#i";
		if(preg_match($pattern, $cmnt_message)){ return true; }
		if(preg_match($pattern, $cmnt_ip)){ return true; }
		if(preg_match($pattern, $cmnt_name)){ return true; }
		/*
		if( preg_match($pattern, $comment)){ return true; }
		if( preg_match($pattern, $user_ip)){ return true; }
		if( preg_match($pattern, $user_agent)){ return true; }
		*/
	}
	return false;
}

// is it in blacklist
function is_comment_in_blacklist($cmnt_message,$cmnt_ip,$cmnt_name)
{
	return check_moderation_blacklist($cmnt_message,$cmnt_ip,$cmnt_name,'blacklist');
}

// is it in blacklist
function is_comment_in_moderation_list($cmnt_message,$cmnt_ip,$cmnt_name)
{
	return check_moderation_blacklist($cmnt_message,$cmnt_ip,$cmnt_name,'moderation_list');
}

// Clean the ref list entry. No HTTP
function clean_reflist($entry)
{
	$entry = explode('http://',$entry);
	$entry = end($entry);
	$entry = end(explode('https://',$entry));
	return $entry;
}

// is ref list entry an IP?
function is_entry_ip($entry)
{
	$entry = explode('.',$entry);
	$entry = current($entry);
	$entry = trim($entry);
	return is_numeric($entry);
}

/**
 * Create the .htaccess for copy paste
 *
 */
function create_htaccess_banlist()
{
	$badreflist  = "SetEnvIfNoCase Referer \".*(";
	$ref_banlist = get_ref_ban_list();
	$ref_banlist = explode("\n",$ref_banlist);
	$denylist = '';
	if(is_array($ref_banlist))
	{
		foreach($ref_banlist as $entry)
		{
			if($entry==''){ continue; }

			$entry = trim($entry);
			$entry = clean_reflist($entry);

			if(is_entry_ip($entry))
			{
				$denylist .= "deny from " .$entry."\n";
			}
			else
			{
				$badreflist .= $entry."|";
			}
		}
	}
	else
	{
		$entry = trim($ref_banlist);
		$entry = clean_reflist($entry);
		if(is_entry_ip($entry))
		{
			$denylist .= "deny from " .$entry."\n";
		}
		else
		{
			$badreflist .= $entry."|";
		}
	}
	
	$badreflist .="baccarat.host-c.com).*\" BadReferrer\norder deny,allow\n";
	$badreflist .="deny from env=BadReferrer";

	$to_htaccess = $denylist.$badreflist;

	return $to_htaccess;
}

/**
 * Compare the moderation list with comments
 *
 */
function moderate_past_with_list()
{
	global $pixelpost_db_prefix;
	
	$additional_msg = '';
	
	$where ='';
	if(isset($_GET['antispamaction']) AND $_GET['antispamaction']=='moderation')
	{
		$banlist = get_moderation_banlist();
		$banlist = str_replace( "\r\n", "\n",$banlist);
		$banlist = str_replace( "\r", "\n", $banlist);
		$banlist = explode("\n",$banlist);

		if(is_array($banlist))
		{
			foreach($banlist as $entry)
			{
				if($entry==''){ continue; }
				
				$entry  = trim($entry);
				$where .= " `message` LIKE '%{$entry}%' OR `name` LIKE '%{$entry}%' OR `ip` LIKE '%{$entry}%' OR ";
			}
		}
		else
		{
			$entry  = trim($ref_banlist);
			$where .= " `message` LIKE '%{$entry}%' OR `name` LIKE '%{$entry}%' OR `ip` LIKE '%{$entry}%' OR ";
		}

		$where .= ' 0 ';

		$query = "UPDATE `{$pixelpost_db_prefix}comments` SET `publish` = 'no' WHERE $where ";
		mysql_query($query);

		if(mysql_error())
		{
			$additional_msg = "$admin_lang_spam_err_6 ".mysql_error()."<br/>";
		}
		else
		{
			$additional_msg = "$admin_lang_spam_com_upd"."<br/>";
		}
	}
	
	$additional_msg = $additional_msg;
	
	return $additional_msg;
}

/**
 * Delete comments which contains words from the blacklist
 *
 */
function delete_past_with_list()
{
	global $pixelpost_db_prefix;
	
	$additional_msg = '';
	
	$where ='';
	if(isset($_GET['antispamaction']) AND $_GET['antispamaction']=='deletecmnt')
	{
		$banlist = get_blacklist();
		$banlist = str_replace( "\r\n", "\n",$banlist);
		$banlist = str_replace( "\r", "\n", $banlist);
		$banlist = explode("\n",$banlist);

		if(is_array($banlist))
		{
			foreach($banlist as $entry)
			{
				if($entry==''){ continue; }
				
				$entry  = trim($entry);
				$where .= " `message` LIKE '%{$entry}%' OR `name` LIKE '%{$entry}%' OR `ip` LIKE '%{$entry}%' OR ";
			}
		}
		else
		{
			$entry  = trim($ref_banlist);
			$where .= " `message` LIKE '%{$entry}%' OR `name` LIKE '%{$entry}%' OR `ip` LIKE '%{$entry}%' OR ";
		}
		$where .= ' 0 ';

		$query = "DELETE FROM `{$pixelpost_db_prefix}comments` WHERE $where ";

		mysql_query($query);
		if(mysql_error())
		{
			$additional_msg = "$admin_lang_spam_err_7 ".mysql_error()."<br/>";
		}
		else
		{
			$additional_msg = "$admin_lang_spam_com_del"."<br/>";
		}
	}

	$additional_msg = $additional_msg;
	
	return $additional_msg;
}

/**
 * Delete refs that are listed in the ref ban list
 *
 */
function delete_from_badreferer_list()
{
	global $pixelpost_db_prefix;
	
	$additional_msg = '';
	
	$where ='';
	if(isset($_GET['antispamaction']) AND $_GET['antispamaction']=='deleterefs')
	{
		$banlist = get_ref_ban_list();
		$banlist = str_replace( "\r\n", "\n",$banlist);
		$banlist = str_replace( "\r", "\n", $banlist);
		$banlist = explode("\n",$banlist);

		if(is_array($banlist))
		{
			foreach($banlist as $entry)
			{
				if($entry==''){ continue; }
				
				$entry  = trim($entry);
				$where .= " `referer` LIKE '%{$entry}%' OR ";
			}// end for each
		}
		else
		{
			$entry  = trim($ref_banlist);
			$where .= " `referer` LIKE '%{$entry}%' OR ";
		}
		$where .= ' 0 ';

		$query = "DELETE FROM `{$pixelpost_db_prefix}visitors` WHERE $where ";
		mysql_query($query);
		if(mysql_error())
		{
			$additional_msg = "$admin_lang_spam_err_8".mysql_error()."<br/>";
		}
		else
		{
			$additional_msg = "$admin_lang_spam_visit_del"."<br/>";
		}
	}

	$additional_msg = $additional_msg;
	
	return $additional_msg;
}

//============================= ANTI SPAM SECTION ENDS   ========================

function clean_comment($string)
{
	$string = strip_tags($string);
	$string = htmlspecialchars($string,ENT_QUOTES);
	$string = addslashes($string);
	return $string;
}

//=============================== TAGS SECTION BEGINS ===========================

function save_tags_new($tags_str,$theid,$alt = '')
{
	global $pixelpost_db_prefix;

	if(strlen($tags_str) > 0)
	{
		$strtr_arr = array(',' => ' ', ';' => ' ');
		$tags = strtr($tags_str, $strtr_arr);

		$pat1 = '/([^a-zA-Z 0-9_-\pL]+)/u';
		$pat2 = '/([^a-zA-Z 0-9_-]+)/';
		$tags_org = $tags;

		if(($tags = preg_replace($pat1, '_', $tags)) === NULL){ $tags = preg_replace($pat2, '_', $tags_org); }

		$pat2 = array('/ _ /', '/ _/', '/(_){2,}/','/ - /', '/ -/', '/(-){2,}/');
		$rep2 = array('', '', '_', '', '', '-');
		$tags = preg_replace( $pat2, $rep2, $tags);
		$tags_arr = preg_split('/[ ]{1,}/',$tags,-1,PREG_SPLIT_NO_EMPTY);

		$query_val = array();

		foreach($tags_arr as $val)
		{
			$query_val[] = "( " . $theid . ",'" . $val . "')";
		}

		$sql_tag = mysql_query("INSERT INTO `".$pixelpost_db_prefix."tags` (img_id, ".$alt."tag) VALUES ".implode(",", $query_val)."");
	}
}

function list_tags_edit($id,$alt = '')
{
	global $pixelpost_db_prefix;
	
	$tags = '';

	$query = mysql_query("SELECT `".$alt."tag` FROM `".$pixelpost_db_prefix."tags` WHERE `img_id` = ".$id." AND `".$alt."tag` NOT LIKE '' ORDER BY `".$alt."tag` ASC");

	while(list($tag) = mysql_fetch_row($query))
	{
		$tags .= ' '.$tag;
	}
	
	return trim($tags);
}

function del_tags_edit($id,$alt = '')
{
	global $pixelpost_db_prefix;

	mysql_query("DELETE FROM `".$pixelpost_db_prefix."tags` WHERE `img_id` = ".$id." AND `".$alt."tag` NOT LIKE ''");
}

function save_tags_edit($tags_str,$id,$alt = '')
{
	global $pixelpost_db_prefix;
	
	del_tags_edit($id, $alt);
	save_tags_new($tags_str, $id, $alt);
}

//
//=============================== TAGS SECTION ENDS =============================

//============================= LANGUAGE SECTION BEGINS =========================

function create_language_url_from_tag($language_link_abr, $language_link_full)
{
	// changing $_SERVER['argv'] to $_SERVER['QUERY_STRING'], because argv may be not "on"
	if(($_SERVER['QUERY_STRING'] == "") OR (substr($_SERVER['QUERY_STRING'],0,5)=="lang="))
	{
		$language_link="<a href='".$_SERVER['PHP_SELF']."?lang=".strtolower( $language_link_abr)."'>".$language_link_full."</a>";
	}
	else
	{
		// removed &lang=XX from query string, otherways it is added which each language change
		$arguments=preg_replace('/\&lang=\w{2}/', '',$_SERVER['QUERY_STRING']);
		$arguments=str_replace("&","&amp;", $arguments);
		$language_link="<a href='".$_SERVER['PHP_SELF']."?".$arguments."&amp;lang=".strtolower( $language_link_abr)."'>".$language_link_full."</a>";
	}
	return $language_link;
}

function replace_alt_lang_tags( $tpl, $language_abr, $PP_supp_lang, $cfgrow)
{
	global $lang_alt_lang_dutch,$lang_alt_lang_english,$lang_alt_lang_french,$lang_alt_lang_german;
	global $lang_alt_lang_italian,$lang_alt_lang_norwegian,$lang_alt_lang_persian,$lang_alt_lang_polish;
	global $lang_alt_lang_portuguese,$lang_alt_lang_simplified_chinese,$lang_alt_lang_spanish,$lang_alt_lang_swedish;
	
	$default_language_abr = strtolower($PP_supp_lang[$cfgrow['langfile']][0]);
	$alt_language_abr	  = strtolower($PP_supp_lang[$cfgrow['altlangfile']][0]);
	
	$link_language_abr = ($language_abr == $default_language_abr) ? $alt_language_abr : $default_language_abr;
	
	// Determine the full name of the link_language
	foreach ($PP_supp_lang as $key => $row)
	{
		foreach($row as $cell)
		{
   			if($cell == strtoupper($link_language_abr)){ $language_link_key = $key; }
    	}
  	}
	$language_link_name = "lang_alt_lang_".$language_link_key;
	$language_link_full = ${$language_link_name};
	
	$language_link = create_language_url_from_tag($link_language_abr, $language_link_full);
	
	// Create one template tag for all templates and both languages
	$tpl = str_replace("<ALTERNATIVE_LANGUAGE>",$language_link,$tpl);
	
	// support for <LANGUAGE=XX> TAG
	preg_match_all("/<(\s*language\s*=\s*([^<>\s]*)\s*)>/iU", $tpl, $matches);
	for($i = 0; $i < count($matches[0]); $i++)
	{
		foreach($PP_supp_lang as $key => $row)
		{
			foreach($row as $cell)
  			{
   				if($cell == strtoupper($matches[2][$i])){ $language_link_key = $key; }
  	  		}
  		}
  		$alt_language_link=create_language_url_from_tag( $matches[2][$i],$PP_supp_lang[$language_link_key][1]);
  		$tpl = str_replace("<LANGUAGE=".$matches[2][$i].">",$alt_language_link,$tpl);
  	}
	// return the template
	return $tpl;
}

function translation_data()
{
	global $admin_lang_pp_lng_fname, $admin_lang_pp_lng_author, $admin_lang_pp_lng_ver, $admin_lang_pp_lng_email;
	
	$d = dir("../language");
	$dir_con = array();
	
	while(false !== ($entry = $d->read()))
	{
		($entry != '.' && $entry != '..') ? $dir_con[] = $entry : '';
	}
	
	$d->close();

	sort($dir_con);

	$out = '<table border="0" cellspacing="5">
	<tr>
		<td><b>'.$admin_lang_pp_lng_fname.'</b></td>
		<td><b>'.$admin_lang_pp_lng_author.'</b></td>
		<td><b>'.$admin_lang_pp_lng_ver.'</b></td>
		<td><b>'.$admin_lang_pp_lng_email.'</b></td>
	</tr>';
	
	foreach($dir_con as $k => $v)
	{
		if($v != "index.html" && is_file('../language/'.$v))
		{
			$_lang_file_translator = '';
			$_lang_file_rev = '';
			$_lang_file_email = '';
			include('../language/'.$v);
			$out .= '
			<tr>
				<td>'.$dir_con[$k].'</td>
				<td>'.$_lang_file_translator.'</td>
				<td>'.$_lang_file_rev.'</td>
				<td><a href="mailto:'.$_lang_file_email.'?subject=Pixelpost translation">'.$_lang_file_email.'</a></td>
			</tr>';
		}
	}

	$out .= '
	</table>';

	return $out;
}

//============================= LANGUAGE SECTION ENDS ===========================
?>