<?php

// SVN file version:
// $Id$

$feeditems = (($cfgrow['feeditems'] > 0) ? $cfgrow['feeditems'] : 10);
$rsspicdir = (($cfgrow['rsstype'] == 'T' || $cfgrow['rsstype'] == 'O') ? ltrim($cfgrow['thumbnailpath'], "./")."thumb_" : (($cfgrow['rsstype'] == 'F' || $cfgrow['rsstype'] == 'FO') ? ltrim($cfgrow['imagepath'], "./") : ''));

$feed_title = pullout($cfgrow['feed_title']);
$feed_title = htmlspecialchars($feed_title,ENT_QUOTES);

$feed_description = pullout($cfgrow['feed_description']);
$feed_description = htmlspecialchars($feed_description,ENT_QUOTES);
				
$feed_copyright = pullout($cfgrow['feed_copyright']);
$feed_copyright = htmlspecialchars($feed_copyright,ENT_QUOTES);

// ##########################################################################################//
// RSS 2.0 FEED
// ##########################################################################################//

if(isset($_GET['x']) && $_GET['x'] == "rss" && !isset($_GET['tag']) || isset($_GET['tag']) && $_GET['tag'] == '') {
	
	if(($cfgrow['feed_discovery'] == 'RA' || $cfgrow['feed_discovery'] == 'R') || ($cfgrow['feed_discovery'] == 'E' && $cfgrow['feed_external_type'] == 'ER')) {
	
		$output  = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
		$output .= "<rss version=\"2.0\">\n";
		$output .= "<channel>\n";
		$output .= "<title>".$feed_title."</title>\n";
		$output .= "<link>".$cfgrow['siteurl']."</link>\n";
		$output .= "<description>".$feed_description."</description>\n";
		$output .= "<docs>http://blogs.law.harvard.edu/tech/rss</docs>\n";
		$output .= "<generator>pixelpost</generator>\n";
		$output .= "<copyright>".$feed_copyright."</copyright>\n";
	
		$tzoner = $cfgrow['timezone'];
		$tprefix = '+';
		$tzoner = sprintf ("%01.2f", $tzoner);
	
		if (substr($tzoner,0,1)=='-') {
	
			$tzoner = (substr($tzoner,1));
			$tprefix = '-';
		}
	
		if ($tzoner < 10) {	
	
			$tzoner = "0".$tzoner;
		}

		$hh = substr($tzoner,0,2);
		$mm = substr($tzoner,-2);
		$tzoner = $tprefix.$hh.$mm;
	
		$query = mysql_query("SELECT `id`,`datetime`,`headline`,`body`,`image`,`alt_headline`,`alt_body` FROM `".$pixelpost_db_prefix."pixelpost` WHERE (`datetime`<='$cdate') ORDER BY `datetime` DESC LIMIT ".$feeditems);

		while(list($id,$datetime,$headline,$body,$image,$alt_headline,$alt_body) = mysql_fetch_row($query)) {
	
			if ($language_abr == $default_language_abr) {
	
	  			$headline = pullout($headline);
				$headline = htmlspecialchars($headline,ENT_QUOTES);
		
				$body = ($cfgrow['markdown'] == 'T') ? markdown(pullout($body)) : pullout($body);
				$body = stripslashes($body);
				$body = strip_tags($body);
				$body = htmlspecialchars($body,ENT_QUOTES);
				$body = ereg_replace("\n","\n&lt;br /&gt;",$body);
			
			} else {
	
 	 			if ($alt_headline == '') {
  	
	  				$headline = pullout($headline);
					$headline = htmlspecialchars($headline,ENT_QUOTES);
	  			} else {
  	
	  				$headline = pullout($alt_headline);
					$headline = htmlspecialchars($alt_headline,ENT_QUOTES);
 	 			}
  		
				if ($alt_body == '') {
		
					$body = ($cfgrow['markdown'] == 'T') ? markdown(pullout($body)) : pullout($body);
					$body = stripslashes($body);
					$body = strip_tags($body);
					$body = htmlspecialchars($body,ENT_QUOTES);
					$body = ereg_replace("\n","\n&lt;br /&gt;",$body);
				} else {
		
					$body = ($cfgrow['markdown'] == 'T') ? markdown(pullout($alt_body)) : pullout($alt_body);
					$body = stripslashes($body);
					$body = strip_tags($body);
					$body = htmlspecialchars($body,ENT_QUOTES);
					$body = ereg_replace("\n","\n&lt;br /&gt;",$body);
				}
	  		}
  		
	  		$enclosure = $cfgrow['siteurl'].ltrim($cfgrow['imagepath'], "./").$image;
			$filesize = filesize(ltrim($cfgrow['imagepath'], "./").$image."");
			$image = $cfgrow['siteurl'].$rsspicdir.$image;
			$datetime = strtotime($datetime);
			$datetime =date("D, d M Y H:i",$datetime);
			$datetime .= ' ' .$tzoner;

			$output .= "\t<item>\n";
			$output .= "\t<title>".$headline."</title>\n";
			$output .= "\t<link>".$cfgrow['siteurl']."index.php?showimage=".$id."</link>\n";
			$output .= "\t<description>\n";
		
			if($rsspicdir) {
		
				$output .= "\t\t&lt;img src=&quot;".$image."&quot;&gt;&lt;br/&gt;\n";
			}
		
			if(($cfgrow['rsstype'] != 'O') && $cfgrow['rsstype'] != 'FO') {
		
				$output .= "\t\t".$body."\n";
			}
		
			$output .= "\t</description>\n";
			$output .= "\t<enclosure type=\"image/jpeg\" length=\"".$filesize."\" url=\"".$enclosure."\" />\n";
			$output .= "\t<pubDate>".$datetime."</pubDate>\n";
			$output .= "\t<guid isPermaLink='true'>".$cfgrow['siteurl']."index.php?showimage=".$id."</guid>\n";
			$output .= "\t</item>\n";
		}

 		$output .= "</channel>\n";
		$output .= "</rss>\n";
	
		header("Content-type:application/xml");
		echo $output;
		exit;
	} else {
	
		echo "This RSS feed has been disabled.";
		die();
	}
}

// ##########################################################################################//
// TAG RSS 2.0 FEED
// ##########################################################################################//

if(isset($_GET['x']) && $_GET['x'] == "rss" && isset($_GET['tag'])) {

	if(($cfgrow['feed_discovery'] == 'RA' || $cfgrow['feed_discovery'] == 'R') || ($cfgrow['feed_discovery'] == 'E' && $cfgrow['feed_external_type'] == 'ER')) {

    	$output  = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
		$output .= "<rss version=\"2.0\">\n";
		$output .= "<channel>\n";
		$output .= "<title>".$feed_title."</title>\n";
		$output .= "<link>".$cfgrow['siteurl']."</link>\n";
		$output .= "<description>".$feed_description."</description>\n";
		$output .= "<docs>http://blogs.law.harvard.edu/tech/rss</docs>\n";
		$output .= "<generator>pixelpost</generator>\n";
		$output .= "<copyright>".$feed_copyright."</copyright>\n";
	
		$tzoner = $cfgrow['timezone'];
		$tprefix = '+';
		$tzoner = sprintf ("%01.2f", $tzoner);
	
		if (substr($tzoner,0,1)=='-') {
	
			$tzoner = (substr($tzoner,1));
			$tprefix = '-';
		}

		if ($tzoner < 10) {
	
			$tzoner = "0".$tzoner;
		}

		$hh = substr($tzoner,0,2);
		$mm = substr($tzoner,-2);
		$tzoner = $tprefix.$hh.$mm;
	
		$tag = addslashes($_GET['tag']);
	
		$query = mysql_query("SELECT `".$pixelpost_db_prefix."pixelpost`.`id`, `".$pixelpost_db_prefix."pixelpost`.`datetime`, `".$pixelpost_db_prefix."pixelpost`.`headline`, `".$pixelpost_db_prefix."pixelpost`.`body`, `".$pixelpost_db_prefix."pixelpost`.`image`, `".$pixelpost_db_prefix."pixelpost`.`alt_headline`, `".$pixelpost_db_prefix."pixelpost`.`alt_body`, `".$pixelpost_db_prefix."tags`.`tag`, `".$pixelpost_db_prefix."tags`.`alt_tag`
		FROM `".$pixelpost_db_prefix."pixelpost`
			INNER JOIN `".$pixelpost_db_prefix."tags` ON `".$pixelpost_db_prefix."tags`.`img_id` = `".$pixelpost_db_prefix."pixelpost`.`id`
		WHERE ((`".$pixelpost_db_prefix."tags`.`tag`) = '".$tag."' OR (`".$pixelpost_db_prefix."tags`.`alt_tag`) = '".$tag."') AND (`datetime`<='$cdate')
		ORDER BY `datetime` DESC
		LIMIT ".$feeditems);

		while(list($id,$datetime,$headline,$body,$image,$alt_headline,$alt_body) = mysql_fetch_row($query)) {
		
			if ($language_abr == $default_language_abr) {
	
  				$headline = pullout($headline);
				$headline = htmlspecialchars($headline,ENT_QUOTES);
		
				$body = ($cfgrow['markdown'] == 'T') ? markdown(pullout($body)) : pullout($body);
				$body = stripslashes($body);
				$body = strip_tags($body);
				$body = htmlspecialchars($body,ENT_QUOTES);
				$body = ereg_replace("\n","\n&lt;br /&gt;",$body);
		
			} else {
	
  				if ($alt_headline == '') {
  	
  					$headline = pullout($headline);
					$headline = htmlspecialchars($headline,ENT_QUOTES);
  				} else {
  	
  					$headline = pullout($alt_headline);
					$headline = htmlspecialchars($alt_headline,ENT_QUOTES);
  				}
  		
				if ($alt_body == '') {
		
					$body = ($cfgrow['markdown'] == 'T') ? markdown(pullout($body)) : pullout($body);
					$body = stripslashes($body);
					$body = strip_tags( $body);
					$body = htmlspecialchars($body,ENT_QUOTES);
					$body = ereg_replace("\n","\n&lt;br /&gt;",$body);
				} else {
		
					$body = ($cfgrow['markdown'] == 'T') ? markdown(pullout($alt_body)) : pullout($alt_body);
					$body = stripslashes($body);
					$body = strip_tags($body);
					$body = htmlspecialchars($body,ENT_QUOTES);
					$body = ereg_replace("\n","\n&lt;br /&gt;",$body);
				}
  			}
  		
			$enclosure = $cfgrow['siteurl'].ltrim($cfgrow['imagepath'], "./").$image;
			$filesize = filesize(ltrim($cfgrow['imagepath'], "./").$image."");
			$image = $cfgrow['siteurl'].$rsspicdir.$image;
			$datetime = strtotime($datetime);
			$datetime =date("D, d M Y H:i",$datetime);
			$datetime .= ' ' .$tzoner;
		
			$output .= "\t<item>\n";
			$output .= "\t<title>".$headline."</title>\n";
			$output .= "\t<link>".$cfgrow['siteurl']."index.php?showimage=".$id."</link>\n";
			$output .= "\t<description>\n";
		
			if($rsspicdir) {
		
				$output .= "\t\t&lt;img src=&quot;".$image."&quot;&gt;&lt;br/&gt;\n";
			}
		
			if(($cfgrow['rsstype'] != 'O') && $cfgrow['rsstype'] != 'FO') {
		
				$output .= "\t\t".$body."\n";
			}
		
			$output .= "\t</description>\n";
			$output .= "\t<enclosure type=\"image/jpeg\" length=\"".$filesize."\" url=\"".$enclosure."\" />\n";
			$output .= "\t<pubDate>".$datetime."</pubDate>\n";
			$output .= "\t<guid isPermaLink='true'>".$cfgrow['siteurl']."index.php?showimage=".$id."</guid>\n";
			$output .= "\t</item>\n";
		}

 		$output .= "</channel>\n";
		$output .= "</rss>\n";
	
		header("Content-type:application/xml");
		echo $output;
		exit;
	} else {
		
		echo "This RSS feed has been disabled.";
		die();
	}
}

// ##########################################################################################//
// COMMENT RSS 2.0 FEED
// ##########################################################################################//

if(isset($_GET['x']) && $_GET['x'] == "comment_rss") {

	if(($cfgrow['allow_comment_feed'] == 'Y') && ($cfgrow['feed_discovery'] == 'RA' || $cfgrow['feed_discovery'] == 'R') || ($cfgrow['feed_discovery'] == 'E' && $cfgrow['feed_external_type'] == 'ER')) {
	
    	$output  = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
		$output .= "<rss version=\"2.0\">\n";
		$output .= "<channel>\n";
		$output .= "<title>".$lang_comment_feed_title." : ".$feed_title."</title>\n";
		$output .= "<link>".$cfgrow['siteurl']."</link>\n";
		$output .= "<description>".$feed_description."</description>\n";
		$output .= "<docs>http://blogs.law.harvard.edu/tech/rss</docs>\n";
		$output .= "<generator>pixelpost</generator>\n";
		$output .= "<copyright>".$feed_copyright."</copyright>\n";
	
		$tzoner = $cfgrow['timezone'];
		$tprefix = '+';
		$tzoner = sprintf ("%01.2f", $tzoner);
	
		if (substr($tzoner,0,1)=='-') {
	
			$tzoner = (substr($tzoner,1));
			$tprefix = '-';
		}

		if ($tzoner < 10) {
	
			$tzoner = "0".$tzoner;
		}

		$hh = substr($tzoner,0,2);
		$mm = substr($tzoner,-2);
		$tzoner = $tprefix.$hh.$mm;
	
		$query = mysql_query("SELECT `".$pixelpost_db_prefix."comments`.`id`, `".$pixelpost_db_prefix."comments`.`datetime`, `".$pixelpost_db_prefix."comments`.`message`, `".$pixelpost_db_prefix."comments`.`name`, `".$pixelpost_db_prefix."comments`.`url`, `".$pixelpost_db_prefix."comments`.`parent_id`, `".$pixelpost_db_prefix."pixelpost`.`headline`, `".$pixelpost_db_prefix."pixelpost`.`image`, `".$pixelpost_db_prefix."pixelpost`.`alt_headline`
		FROM `".$pixelpost_db_prefix."comments`
			INNER JOIN `".$pixelpost_db_prefix."pixelpost` ON `".$pixelpost_db_prefix."pixelpost`.`id` = `".$pixelpost_db_prefix."comments`.`parent_id`
		WHERE publish = 'yes'
		ORDER BY `".$pixelpost_db_prefix."comments`.`id` DESC 
		LIMIT 0,".$feeditems."");

		while(list($comment_id,$comment_datetime,$comment_message,$comment_name,$comment_url,$parent_id,$parent_headline,$parent_image,$alt_headline) = mysql_fetch_row($query)) {
	
			if ($language_abr == $default_language_abr) {
	
  				$parent_headline = pullout($parent_headline);
				$parent_headline = htmlspecialchars($parent_headline,ENT_QUOTES);
		
			} else {
	
  				if ($alt_headline == '') {
  	
  					$parent_headline = pullout($parent_headline);
					$parent_headline = htmlspecialchars($parent_headline,ENT_QUOTES);
  				} else {
  	
  					$parent_headline = pullout($alt_headline);
					$parent_headline = htmlspecialchars($alt_headline,ENT_QUOTES);
  				}
  			}
  		
			$comment_name = pullout($comment_name);
			$comment_message = pullout($comment_message);
			$comment_message = stripslashes($comment_message);
			$comment_message = strip_tags( $comment_message);
			$comment_message = htmlspecialchars($comment_message,ENT_QUOTES);
			$comment_message = ereg_replace("\n","\n&lt;br /&gt;",$comment_message);
			$parent_image = $cfgrow['siteurl'].$rsspicdir.$parent_image;
			$comment_datetime = strtotime($comment_datetime);
			$comment_datetime =date("D, d M Y H:i",$comment_datetime);
			$comment_datetime .= ' ' .$tzoner;

			$output .= "\t<item>\n";
			$output .= "\t<title>".$lang_comment_feed_image_title." '".$parent_headline."' by ".$comment_name."</title>\n";
			$output .= "\t<link>".$cfgrow['siteurl']."index.php?showimage=".$parent_id."</link>\n";
			$output .= "\t<description>\n";
		
			if($rsspicdir) {
		
				$output .= "\t\t&lt;img src=&quot;".$parent_image."&quot;&gt;&lt;br/&gt;\n";
			}
		
			$output .= "\t\t".$comment_message."\n";
			$output .= "\t</description>\n";
			$output .= "\t<pubDate>".$comment_datetime."</pubDate>\n";
			$output .= "\t<guid isPermaLink='true'>".$cfgrow['siteurl']."index.php?showimage=".$parent_id."#".$comment_id."</guid>\n";
			$output .= "\t</item>\n";
		}

 		$output .= "</channel>\n";
		$output .= "</rss>\n";
	
		header("Content-type:application/xml");
		echo $output;
		exit;
	} else {

		echo "This comment RSS feed has been disabled.";
		die();
	}
}


// ##########################################################################################//
// ATOM FEED, Version 1.0
// ##########################################################################################//

if(isset($_GET['x']) && $_GET['x'] == "atom" && !isset($_GET['tag']) || isset($_GET['tag']) && $_GET['tag'] == '') {

	if(($cfgrow['feed_discovery'] == 'RA' || $cfgrow['feed_discovery'] == 'A') || ($cfgrow['feed_discovery'] == 'E' && $cfgrow['feed_external_type'] == 'EA')) {

		header("content-type: application/atom+xml");
	
		$tzoner = $cfgrow['timezone'];
		$tprefix = '+';
		$tzoner = sprintf ("%01.2f", $tzoner);

		if (substr($tzoner,0,1)=='-') {
		
			$tzoner = (substr($tzoner,1));
			$tprefix = '-';
		}

		if ($tzoner < 10) {
		
			$tzoner = "0".$tzoner;
		}
	
		$hh = substr($tzoner,0,2);
		$mm = substr($tzoner,-2);
		$tzoner = $tprefix.$hh.":".$mm;
		$url = $cfgrow['siteurl'];
	
		$atom  = "<?xml version='1.0' encoding='UTF-8'?>\n";
		$atom .= "<feed xml:lang='en' xmlns='http://www.w3.org/2005/Atom'>\n";
		$atom .= "<title>".$feed_title."</title>\n";
		$atom .= "<subtitle>".$feed_description."</subtitle>\n";
		$atom .= "<link rel='alternate' type='text/html' href='".$cfgrow['siteurl']."' title='".$pixelpost_site_title."' />\n";
		$atom .= "<link rel='self' type='application/atom+xml' href='".$cfgrow['siteurl']."index.php?x=atom' title='".$pixelpost_site_title."' />\n";
		$atom .= "<author>\n";
		$atom .= "<name>".$pixelpost_site_title."</name>\n";
		$atom .= "<uri>".$url."</uri>\n";
		$atom .= "</author>\n";
		$atom .= "<generator uri='http://www.pixelpost.org/' version='1.6.0'>Pixelpost</generator>\n";
		$atom .= "<rights>".$feed_copyright."</rights>\n";
		$atom .= "<id>".$url."</id>\n";
		$atom .= "<updated>".date("Y-m-d\TH:i:s".$tzoner."")."</updated>\n";
	
		$tag_url = $_SERVER['HTTP_HOST'];
	
		$query = mysql_query("SELECT `id`,`datetime`,`headline`,`body`,`image`,`alt_headline`,`alt_body` FROM `".$pixelpost_db_prefix."pixelpost` WHERE (`datetime`<='$cdate') ORDER BY `datetime` DESC LIMIT ".$feeditems);

		while(list($id,$datetime,$headline,$body,$image,$alt_headline,$alt_body) = mysql_fetch_row($query)) {
	
			if ($language_abr == $default_language_abr) {
	
  				$headline = pullout($headline);
				$headline = htmlspecialchars($headline,ENT_QUOTES);
		
				$body = ($cfgrow['markdown'] == 'T') ? markdown(pullout($body)) : pullout($body);
				$body = stripslashes($body);
				$body = strip_tags($body);
				$body = htmlspecialchars($body,ENT_QUOTES);
				$body = ereg_replace("\n","\n<br />",$body);
		
			} else {
	
  				if ($alt_headline == '') {
  	
  					$headline = pullout($headline);
					$headline = htmlspecialchars($headline,ENT_QUOTES);
  				} else {
  	
  					$headline = pullout($alt_headline);
					$headline = htmlspecialchars($alt_headline,ENT_QUOTES);
  				}
  		
				if ($alt_body == '') {
		
					$body = ($cfgrow['markdown'] == 'T') ? markdown(pullout($body)) : pullout($body);
					$body = stripslashes($body);
					$body = strip_tags($body);
					$body = htmlspecialchars($body,ENT_QUOTES);
					$body = ereg_replace("\n","\n<br />",$body);
				} else {
		
					$body = ($cfgrow['markdown'] == 'T') ? markdown(pullout($alt_body)) : pullout($alt_body);
					$body = stripslashes($body);
					$body = strip_tags($body);
					$body = htmlspecialchars($body,ENT_QUOTES);
					$body = ereg_replace("\n","\n<br />",$body);
				}
  			}

			$enclosure = $cfgrow['siteurl'].ltrim($cfgrow['imagepath'], "./").$image;
			$filesize = filesize(ltrim($cfgrow['imagepath'], "./").$image."");
			$image = $cfgrow['siteurl'].$rsspicdir.$image;
			$tag_date =substr($datetime,0,10);
			$id_date = substr($datetime,0,10);
			$tag_time = substr($datetime,11,8);
			$tag_date .=T;
			$tag_date .=$tag_time;
			$tag_date .=Z;

			$modified_date =substr($datetime,0,10);
			$modified_date = $modified_date."T".(substr($datetime,11,8));
			$datetime = strtotime($datetime);
		
			$atom .= "\t<entry xmlns='http://www.w3.org/2005/Atom'>\n";
			$atom .= "\t<title type='html'>".$headline."</title>\n";
			$atom .= "\t<link rel='alternate' type='text/html' href='".$cfgrow['siteurl']."index.php?showimage=".$id."' title='".$headline."' />\n";
			$atom .= "\t<id>tag:".$tag_url.",".$id_date.":/".$id."</id>\n";
			$atom .= "\t<content type='html'>\n";
		
			$atom .= "\t\t<![CDATA[\n";
		
			if($rsspicdir) {
		
				$atom .= "\t\t<img src='".$image."' /><br />\n";
			}
		
			if(($cfgrow['rsstype'] != 'O') && $cfgrow['rsstype'] != 'FO') {
		
				$atom .= "\t\t".$headline."<br />".$body."\n";
			}
		
			$atom .= "\t\t]]>\n";
		
			$atom .= "\t</content>\n";
			$atom .= "\t<link rel=\"enclosure\" type=\"image/jpeg\" length=\"".$filesize."\" title=\"".$headline."\" href=\"".$enclosure."\" />\n";
			$atom .= "\t<published>".$tag_date."</published>\n";
			$atom .= "\t<updated>".$modified_date.$tzoner."</updated>\n";
			$atom .= "\t</entry>\n";
		}

		$atom .= "</feed>\n";
	
		echo $atom;
		exit;
	} else {
		
		echo "This ATOM feed has been disabled.";
		die();
	}
}

// ##########################################################################################//
// TAG ATOM FEED, Version 1.0
// ##########################################################################################//

if(isset($_GET['x']) && $_GET['x'] == "atom" && isset($_GET['tag'])) {

	if(($cfgrow['feed_discovery'] == 'RA' || $cfgrow['feed_discovery'] == 'A') || ($cfgrow['feed_discovery'] == 'E' && $cfgrow['feed_external_type'] == 'EA')) {

		header("content-type: application/atom+xml");
		
		$tzoner = $cfgrow['timezone'];
		$tprefix = '+';
		$tzoner = sprintf ("%01.2f", $tzoner);

		if (substr($tzoner,0,1)=='-') {
	
			$tzoner = (substr($tzoner,1));
			$tprefix = '-';
		}

		if ($tzoner < 10) {
	
			$tzoner = "0".$tzoner;
		}

		$hh = substr($tzoner,0,2);
		$mm = substr($tzoner,-2);
		$tzoner = $tprefix.$hh.":".$mm;
		$url = $cfgrow['siteurl'];
	
		$tag = addslashes($_GET['tag']);
	
		$atom  = "<?xml version='1.0' encoding='UTF-8'?>\n";
		$atom .= "<feed xml:lang='en' xmlns='http://www.w3.org/2005/Atom'>\n";
		$atom .= "<title>".$feed_title."</title>\n";
		$atom .= "<subtitle>".$feed_description."</subtitle>\n";
		$atom .= "<link rel='alternate' type='text/html' href='".$cfgrow['siteurl']."' title='".$pixelpost_site_title."' />\n";
		$atom .= "<link rel='self' type='application/atom+xml' href='".$cfgrow['siteurl']."index.php?x=atom&amp;tag=".$tag."' title='".$pixelpost_site_title."' />\n";
		$atom .= "<author>\n";
		$atom .= "<name>".$pixelpost_site_title."</name>\n";
		$atom .= "<uri>".$url."</uri>\n";
		$atom .= "</author>\n";
		$atom .= "<generator uri='http://www.pixelpost.org/' version='1.6.0'>Pixelpost</generator>\n";
		$atom .= "<rights>".$feed_copyright."</rights>\n";
		$atom .= "<id>".$url."</id>\n";
		$atom .= "<updated>".date("Y-m-d\TH:i:s".$tzoner."")."</updated>\n";
	
		$tag_url = $_SERVER['HTTP_HOST'];
		
		$query = mysql_query("SELECT `".$pixelpost_db_prefix."pixelpost`.`id`, `".$pixelpost_db_prefix."pixelpost`.`datetime`, `".$pixelpost_db_prefix."pixelpost`.`headline`, `".$pixelpost_db_prefix."pixelpost`.`body`, `".$pixelpost_db_prefix."pixelpost`.`image`, `".$pixelpost_db_prefix."pixelpost`.`alt_headline`, `".$pixelpost_db_prefix."pixelpost`.`alt_body`, `".$pixelpost_db_prefix."tags`.`tag`, `".$pixelpost_db_prefix."tags`.`alt_tag`
		FROM `".$pixelpost_db_prefix."pixelpost`
			INNER JOIN `".$pixelpost_db_prefix."tags` ON `".$pixelpost_db_prefix."tags`.`img_id` = `".$pixelpost_db_prefix."pixelpost`.`id`
		WHERE ((`".$pixelpost_db_prefix."tags`.`tag`) = '".$tag."' OR (`".$pixelpost_db_prefix."tags`.`alt_tag`) = '".$tag."') AND (`datetime`<='$cdate')
		ORDER BY `datetime` DESC
		LIMIT ".$feeditems);

		while(list($id,$datetime,$headline,$body,$image,$alt_headline,$alt_body) = mysql_fetch_row($query)) {
	
			if ($language_abr == $default_language_abr) {
	
  				$headline = pullout($headline);
				$headline = htmlspecialchars($headline,ENT_QUOTES);
		
				$body = ($cfgrow['markdown'] == 'T') ? markdown(pullout($body)) : pullout($body);
				$body = stripslashes($body);
				$body = strip_tags( $body);
				$body = htmlspecialchars($body,ENT_QUOTES);
				$body = ereg_replace("\n","\n<br />",$body);
		
			} else {
	
  				if ($alt_headline == '') {
  	
  					$headline = pullout($headline);
					$headline = htmlspecialchars($headline,ENT_QUOTES);
  				} else {
  	
  					$headline = pullout($alt_headline);
					$headline = htmlspecialchars($alt_headline,ENT_QUOTES);
  				}
  		
				if ($alt_body == '') {
		
					$body = ($cfgrow['markdown'] == 'T') ? markdown(pullout($body)) : pullout($body);
					$body = stripslashes($body);
					$body = strip_tags( $body);
					$body = htmlspecialchars($body,ENT_QUOTES);
					$body = ereg_replace("\n","\n<br />",$body);
				} else {
		
					$body = ($cfgrow['markdown'] == 'T') ? markdown(pullout($alt_body)) : pullout($alt_body);
					$body = stripslashes($body);
					$body = strip_tags($body);
					$body = htmlspecialchars($body,ENT_QUOTES);
					$body = ereg_replace("\n","\n<br />",$body);
				}
  			}
  		
			$enclosure = $cfgrow['siteurl'].ltrim($cfgrow['imagepath'], "./").$image;
			$filesize = filesize(ltrim($cfgrow['imagepath'], "./").$image."");
			$image = $cfgrow['siteurl'].$rsspicdir.$image;
			$tag_date =substr($datetime,0,10);
			$id_date = substr($datetime,0,10);
			$tag_time = substr($datetime,11,8);
			$tag_date .=T;
			$tag_date .=$tag_time;
			$tag_date .=Z;

			$modified_date =substr($datetime,0,10);
			$modified_date = $modified_date."T".(substr($datetime,11,8));
			$datetime = strtotime($datetime);
		
			$atom .= "\t<entry xmlns='http://www.w3.org/2005/Atom'>\n";
			$atom .= "\t<title type='html'>".$headline."</title>\n";
			$atom .= "\t<link rel='alternate' type='text/html' href='".$cfgrow['siteurl']."index.php?showimage=".$id."' title='".$headline."' />\n";
			$atom .= "\t<id>tag:".$tag_url.",".$id_date.":/".$id."</id>\n";
			$atom .= "\t<content type='html'>\n";
			
			$atom .= "\t\t<![CDATA[\n";
		
			if($rsspicdir) {
		
				$atom .= "\t\t<img src='".$image."' /><br />\n";
			}
		
			if(($cfgrow['rsstype'] != 'O') && $cfgrow['rsstype'] != 'FO') {
		
				$atom .= "\t\t".$headline."<br />".$body."\n";
			}
		
			$atom .= "\t\t]]>\n";
		
			$atom .= "\t</content>\n";
			$atom .= "\t<link rel=\"enclosure\" type=\"image/jpeg\" length=\"".$filesize."\" title=\"".$headline."\" href=\"".$enclosure."\" />\n";
			$atom .= "\t<published>".$tag_date."</published>\n";
			$atom .= "\t<updated>".$modified_date.$tzoner."</updated>\n";
			$atom .= "\t</entry>\n";
		}

		$atom .= "</feed>\n";
	
		echo $atom;
		exit;
	} else {
		
		echo "This ATOM feed has been disabled.";
		die();
	}
}

// ##########################################################################################//
// COMMENT ATOM FEED, Version 1.0
// ##########################################################################################//

if(isset($_GET['x']) && $_GET['x'] == "comment_atom") {

	if(($cfgrow['allow_comment_feed'] == 'Y') && ($cfgrow['feed_discovery'] == 'RA' || $cfgrow['feed_discovery'] == 'A') || ($cfgrow['feed_discovery'] == 'E' && $cfgrow['feed_external_type'] == 'EA')) {
	
		header("content-type: application/atom+xml");
	
		$tzoner = $cfgrow['timezone'];
		$tprefix = '+';
		$tzoner = sprintf ("%01.2f", $tzoner);

		if (substr($tzoner,0,1)=='-') {
	
			$tzoner = (substr($tzoner,1));
			$tprefix = '-';
		}

		if ($tzoner < 10) {
	
			$tzoner = "0".$tzoner;
		}

		$hh = substr($tzoner,0,2);
		$mm = substr($tzoner,-2);
		$tzoner = $tprefix.$hh.":".$mm;
		$url = $cfgrow['siteurl'];
	
		$atom  = "<?xml version='1.0' encoding='UTF-8'?>\n";
		$atom .= "<feed xml:lang='en' xmlns='http://www.w3.org/2005/Atom'>\n";
		$atom .= "<title>".$lang_comment_feed_title." : ".$feed_title."</title>\n";
		$atom .= "<subtitle>".$feed_description."</subtitle>\n";
		$atom .= "<link rel='alternate' type='text/html' href='".$cfgrow['siteurl']."' title='".$pixelpost_site_title."' />\n";
		$atom .= "<link rel='self' type='application/atom+xml' href='".$cfgrow['siteurl']."index.php?x=comment_atom' title='".$pixelpost_site_title."' />\n";
		$atom .= "<author>\n";
		$atom .= "<name>".$pixelpost_site_title."</name>\n";
		$atom .= "<uri>".$url."</uri>\n";
		$atom .= "</author>\n";
		$atom .= "<generator uri='http://www.pixelpost.org/' version='1.6.0'>Pixelpost</generator>\n";
		$atom .= "<rights>".$feed_copyright."</rights>\n";
		$atom .= "<id>".$url."</id>\n";
		$atom .= "<updated>".date("Y-m-d\TH:i:s".$tzoner."")."</updated>\n";
	
		$tag_url = $_SERVER['HTTP_HOST'];
	
		$query = mysql_query("SELECT `".$pixelpost_db_prefix."comments`.`id`, `".$pixelpost_db_prefix."comments`.`datetime`, `".$pixelpost_db_prefix."comments`.`message`, `".$pixelpost_db_prefix."comments`.`name`, `".$pixelpost_db_prefix."comments`.`url`, `".$pixelpost_db_prefix."comments`.`parent_id`, `".$pixelpost_db_prefix."pixelpost`.`headline`, `".$pixelpost_db_prefix."pixelpost`.`image`, `".$pixelpost_db_prefix."pixelpost`.`alt_headline`, `".$pixelpost_db_prefix."pixelpost`.`alt_body`
		FROM `".$pixelpost_db_prefix."comments`
		INNER JOIN `".$pixelpost_db_prefix."pixelpost` ON `".$pixelpost_db_prefix."pixelpost`.`id` = `".$pixelpost_db_prefix."comments`.`parent_id`
		WHERE publish = 'yes'
		ORDER BY `".$pixelpost_db_prefix."comments`.`id` DESC 
		LIMIT 0,".$feeditems."");

		while(list($comment_id,$comment_datetime,$comment_message,$comment_name,$comment_url,$parent_id,$parent_headline,$parent_image,$alt_headline,$alt_body) = mysql_fetch_row($query)) {
	
			if ($language_abr == $default_language_abr) {
	
  				$parent_headline = pullout($parent_headline);
				$parent_headline = htmlspecialchars($parent_headline,ENT_QUOTES);
			} else {
	
  				if ($alt_headline == '') {
  	
  					$parent_headline = pullout($parent_headline);
					$parent_headline = htmlspecialchars($parent_headline,ENT_QUOTES);
  				} else {
  	
  					$parent_headline = pullout($alt_headline);
					$parent_headline = htmlspecialchars($alt_headline,ENT_QUOTES);
  				}
  			}
  		
			$comment_name = pullout($comment_name);
			$comment_message = pullout($comment_message);
			$comment_message = stripslashes($comment_message);
			$comment_message = strip_tags( $comment_message);
			$comment_message = htmlspecialchars($comment_message,ENT_QUOTES);
			$comment_message = ereg_replace("\n","\n<br />",$comment_message);
			$parent_image = $cfgrow['siteurl'].$rsspicdir.$parent_image;
			$tag_date =substr($comment_datetime,0,10);
			$id_date = substr($comment_datetime,0,10);
			$tag_time = substr($comment_datetime,11,8);
			$tag_date .=T;
			$tag_date .=$tag_time;
			$tag_date .=Z;

			$modified_date =substr($comment_datetime,0,10);
			$modified_date = $modified_date."T".(substr($comment_datetime,11,8));
			$datetime = strtotime($comment_datetime);
		
			$atom .= "\t<entry xmlns='http://www.w3.org/2005/Atom'>\n";
			$atom .= "\t<title type='html'>".$lang_comment_feed_image_title." '".$parent_headline."' by ".$comment_name."</title>\n";
			$atom .= "\t<link rel='alternate' type='text/html' href='".$cfgrow['siteurl']."index.php?showimage=".$parent_id."' title='".$parent_headline."' />\n";
			$atom .= "\t<id>tag:".$tag_url.",".$id_date.":/".$parent_id.$comment_id."</id>\n";
			$atom .= "\t<content type='html'>\n";
		
			$atom .= "\t\t<![CDATA[\n";
		
			if($rsspicdir) {
		
				$atom .= "\t\t<img src='".$parent_image."' /><br />\n";
			}
		
			$atom .= "\t\t".$parent_headline."<br />".$comment_message."\n";
		
			$atom .= "\t\t]]>\n";
		
			$atom .= "\t</content>\n";
			$atom .= "\t<published>".$tag_date."</published>\n";
			$atom .= "\t<updated>".$modified_date.$tzoner."</updated>\n";
			$atom .= "\t</entry>\n";
		}

		$atom .= "</feed>\n";
	
		echo $atom;
		exit;
	} else {

		echo "This comment ATOM feed has been disabled.";
		die();
	}
}

// ##########################################################################################//
// RSS + ATOM - tags
// ##########################################################################################//

// ATOM Tags
$atom_url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."&amp;x=atom";
$tpl = str_replace("<ATOM_AUTODETECT>",$atom_url,$tpl); // keeping this "old" tag because it is used in user's template maybe
$atom_auto = "<link rel=\"service.feed\" type=\"application/x.atom+xml\" title=\"".$feed_title." - ATOM Feed\" href=\"".$cfgrow["siteurl"]."index.php?x=atom\" />";
$tpl = ereg_replace("<ATOM_AUTODETECT_LINK>",$atom_auto,$tpl);
$tpl = ereg_replace("<SITE_ATOM_LINK>","<a href='./index.php?x=atom'>ATOM feed</a>",$tpl);
if (isset($_GET['tag']) && $_GET['tag'] != '') $tpl = ereg_replace("<TAG_ATOM_LINK>","<a href='./index.php?x=atom&amp;tag=".$_GET['tag']."'>ATOM feed for &quot;".$_GET['tag']."&quot;</a>",$tpl);
else $tpl = ereg_replace("<TAG_ATOM_LINK>","",$tpl);

// Comment ATOM Tags
$comment_atom_auto = "<link rel=\"service.feed\" type=\"application/x.atom+xml\" title=\"".$feed_title." - Comment ATOM Feed\" href=\"".$cfgrow["siteurl"]."index.php?x=comment_atom\" />";
$tpl = ereg_replace("<COMMENT_ATOM_AUTODETECT_LINK>",$comment_atom_auto,$tpl);
$tpl = ereg_replace("<SITE_COMMENT_ATOM_LINK>","<a href='./index.php?x=comment_atom'>ATOM Comment feed</a>",$tpl);

// RSS Tags
$rss_auto = "<link rel=\"alternate\" type=\"application/rss+xml\" title=\"".$feed_title." - RSS Feed\" href=\"".$cfgrow["siteurl"]."index.php?x=rss\" />";
$tpl = ereg_replace("<RSS_AUTODETECT_LINK>",$rss_auto,$tpl);
$tpl = ereg_replace("<SITE_RSS_LINK>","<a href='./index.php?x=rss'>RSS 2.0</a>",$tpl);
if (isset($_GET['tag']) && $_GET['tag'] != '') $tpl = ereg_replace("<TAG_RSS_LINK>","<a href='./index.php?x=rss&amp;tag=".$_GET['tag']."'>RSS 2.0 for &quot;".$_GET['tag']."&quot;</a>",$tpl);
else $tpl = ereg_replace("<TAG_RSS_LINK>","",$tpl);

// Comment RSS Tags
$comment_rss_auto = "<link rel=\"alternate\" type=\"application/rss+xml\" title=\"".$feed_title." - Comment RSS Feed\" href=\"".$cfgrow["siteurl"]."index.php?x=comment_rss\" />";
$tpl = ereg_replace("<COMMENT_RSS_AUTODETECT_LINK>",$comment_rss_auto,$tpl);
$tpl = ereg_replace("<SITE_COMMENT_RSS_LINK>","<a href='./index.php?x=comment_rss'>Comment RSS</a>",$tpl);

// FEED Autodiscovery
if($cfgrow['feed_discovery'] == 'RA') { // AUTO DISCOVER RSS and ATOM feed
	
	$feed_auto_discovery  = $rss_auto;
	$feed_auto_discovery .= "\n";
	$feed_auto_discovery .= $atom_auto;
}elseif($cfgrow['feed_discovery'] == 'R') { // AUTO DISCOVER RSS feed

	$feed_auto_discovery  = $rss_auto;
}elseif($cfgrow['feed_discovery'] == 'A') { // AUTO DISCOVER ATOM feed

	$feed_auto_discovery  = $atom_auto;
}elseif($cfgrow['feed_discovery'] == 'E') { // AUTO DISCOVER External feed

	if($cfgrow['feed_external_type'] == 'ER') { // AUTO DISCOVER External RSS feed
	
		$feed_auto_discovery  = "<link rel=\"alternate\" type=\"application/rss+xml\" title=\"".$feed_title." - RSS Feed\" href=\"".pullout($cfgrow['feed_external'])."\" />";
	} else { // AUTO DISCOVER External ATOM feed
	
		$feed_auto_discovery  = "<link rel=\"service.feed\" type=\"application/x.atom+xml\" title=\"".$feed_title." - ATOM Feed\" href=\"".pullout($cfgrow['feed_external'])."\" />";
	}	
} else { // No feed to AUTO DISCOVER

	$feed_auto_discovery ="<!--Feeds are currently disabled-->";
}
$tpl = ereg_replace("<FEED_AUTO_DISCOVERY>",$feed_auto_discovery,$tpl);
?>