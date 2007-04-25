<?php

// SVN file version:
// $Id$

$feeditems = (($cfgrow['feeditems'] > 0) ? $cfgrow['feeditems'] : 10);
$rsspicdir = (($cfgrow['rsstype'] == 'T' || $cfgrow['rsstype'] == 'O') ? 'thumbnails/thumb_' : (($cfgrow['rsstype'] == 'F') ? 'images/' : ''));

// ##########################################################################################//
// RSS 2.0 FEED
// ##########################################################################################//

if(isset($_GET['x'])&&$_GET['x'] == "rss")

{
    $output = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
	<rss version=\"2.0\">
	<channel>
	<title>".$pixelpost_site_title."</title>
	<link>".$cfgrow['siteurl']."</link>
	<description>$pixelpost_site_title</description>
	<docs>http://blogs.law.harvard.edu/tech/rss</docs>
	<generator>pixelpost</generator>";
	$tzoner = $cfgrow['timezone'];
	$tprefix = '+';
	$tzoner = sprintf ("%01.2f", $tzoner);
	if (substr($tzoner,0,1)=='-')
	{
		$tzoner = (substr($tzoner,1));
		$tprefix = '-';
	}

	if ($tzoner < 10)	$tzoner = "0".$tzoner;

	$hh = substr($tzoner,0,2);
	$mm = substr($tzoner,-2);
	$tzoner = $tprefix.$hh.$mm;
	$query = mysql_query("SELECT id,datetime,headline,body,image FROM ".$pixelpost_db_prefix."pixelpost WHERE (datetime<='$cdate') ORDER BY datetime desc limit ".$feeditems);

	while(list($id,$datetime,$headline,$body,$image) = mysql_fetch_row($query))
	{
		$headline = pullout($headline);
		$headline = htmlspecialchars($headline,ENT_QUOTES);
		$image = $cfgrow['siteurl'].$rsspicdir.$image;
		$datetime = strtotime($datetime);
		$datetime =date("D, d M Y H:i",$datetime);
		$datetime .= ' ' .$tzoner;
		$body = pullout($body);
		$body = stripslashes($body);
		$body = strip_tags( $body);
		$body = htmlspecialchars($body,ENT_QUOTES);
		$body = ereg_replace("\n","\n&lt;br /&gt;",$body);
		$output .= "
		<item>
		<title>$headline</title>
		<link>".$cfgrow['siteurl']."index.php?showimage=$id</link>
		<description>
";
		if($rsspicdir) $output .= "			&lt;img src=&quot;$image&quot;&gt;&lt;br/&gt;
";
		if($cfgrow['rsstype'] != 'O') $output .= "			$body";
		$output .= "
		</description>
		<pubDate>$datetime</pubDate>
		<guid isPermaLink='true'>".$cfgrow['siteurl']."index.php?showimage=$id</guid>
		</item>";
	}

 	$output .= "
	</channel>
	</rss>";
	header("Content-type:application/xml");
	echo $output;
	exit;
}
// ##########################################################################################//
// COMMENT RSS 2.0 FEED
// ##########################################################################################//

if(isset($_GET['x'])&&$_GET['x'] == "comment_rss")

{
    $output = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
	<rss version=\"2.0\">
	<channel>
	<title>".$lang_comment_feed_title." ".$pixelpost_site_title."</title>
	<link>".$cfgrow['siteurl']."</link>
	<description>".$lang_comment_feed_title." ".$pixelpost_site_title."</description>
	<docs>http://blogs.law.harvard.edu/tech/rss</docs>
	<generator>pixelpost</generator>";
	$tzoner = $cfgrow['timezone'];
	$tprefix = '+';
	$tzoner = sprintf ("%01.2f", $tzoner);
	if (substr($tzoner,0,1)=='-')
	{
		$tzoner = (substr($tzoner,1));
		$tprefix = '-';
	}

	if ($tzoner < 10)	$tzoner = "0".$tzoner;

	$hh = substr($tzoner,0,2);
	$mm = substr($tzoner,-2);
	$tzoner = $tprefix.$hh.$mm;
	
	$query = mysql_query("SELECT `".$pixelpost_db_prefix."comments`.`id`, `".$pixelpost_db_prefix."comments`.`datetime`, `".$pixelpost_db_prefix."comments`.`message`, `".$pixelpost_db_prefix."comments`.`name`, `".$pixelpost_db_prefix."comments`.`url`, `".$pixelpost_db_prefix."comments`.`parent_id`, `".$pixelpost_db_prefix."pixelpost`.`headline`, `".$pixelpost_db_prefix."pixelpost`.`image`
	FROM `".$pixelpost_db_prefix."comments`
		INNER JOIN `".$pixelpost_db_prefix."pixelpost` ON `".$pixelpost_db_prefix."pixelpost`.`id` = `".$pixelpost_db_prefix."comments`.`parent_id`
	WHERE publish = 'yes'
	ORDER BY `".$pixelpost_db_prefix."comments`.`id` DESC 
	LIMIT 0,".$feeditems."");

	while(list($comment_id, $comment_datetime, $comment_message, $comment_name, $comment_url, $parent_id, $parent_headline, $parent_image) = mysql_fetch_row($query))
	{
		$comment_name = pullout($comment_name);
		$parent_headline = pullout($parent_headline);
		$parent_headline = htmlspecialchars($parent_headline,ENT_QUOTES);
		$parent_image = $cfgrow['siteurl'].$rsspicdir.$parent_image;
		$comment_datetime = strtotime($comment_datetime);
		$comment_datetime =date("D, d M Y H:i",$comment_datetime);
		$comment_datetime .= ' ' .$tzoner;
		$comment_message = pullout($comment_message);
		$comment_message = stripslashes($comment_message);
		$comment_message = strip_tags($comment_message);
		$comment_message = htmlspecialchars($comment_message,ENT_QUOTES);
		$comment_message = ereg_replace("\n","\n&lt;br /&gt;",$comment_message);
		$output .= "
		<item>
		<title>".$lang_comment_feed_image_title." '$parent_headline' by $comment_name</title>
		<link>".$cfgrow['siteurl']."index.php?showimage=$parent_id</link>
		<description>
";
		if($rsspicdir) $output .= "			&lt;img src=&quot;$parent_image&quot;&gt;&lt;br/&gt;
";
		$output .= "
		$comment_message
		</description>
		<pubDate>$comment_datetime</pubDate>
		<guid isPermaLink='true'>".$cfgrow['siteurl']."index.php?showimage=$parent_id#$comment_id</guid>
		</item>";
	}

 	$output .= "
	</channel>
	</rss>";
	header("Content-type:application/xml");
	echo $output;
	exit;
}
// ##########################################################################################//
// ATOM FEED, Version 1.0
// ##########################################################################################//

if(isset($_GET['x'])&&$_GET['x'] == "atom")
{
	header("content-type: application/atom+xml");
	$tzoner = $cfgrow['timezone'];
	$tprefix = '+';
	$tzoner = sprintf ("%01.2f", $tzoner);

	if (substr($tzoner,0,1)=='-')
	{
     $tzoner = (substr($tzoner,1));
     $tprefix = '-';
	}

	if ($tzoner < 10) $tzoner = "0".$tzoner;

	$hh = substr($tzoner,0,2);
	$mm = substr($tzoner,-2);
	$tzoner = $tprefix.$hh.":".$mm;
	$url = $cfgrow['siteurl'];
	$atom = "<?xml version='1.0' encoding='UTF-8'?>
	<feed xml:lang='en' xmlns='http://www.w3.org/2005/Atom'>
	<title>$pixelpost_site_title photoblog</title>
	<link rel='alternate' type='text/html' href='".$cfgrow['siteurl']."' title='".$pixelpost_site_title."' />
	<link rel='self' type='application/atom+xml' href='".$cfgrow['siteurl']."index.php?x=atom' title='".$pixelpost_site_title."' />
	<author>
	<name>".$pixelpost_site_title."</name>
	<uri>$url</uri>
	</author>
	<generator uri='http://www.pixelpost.org/' version='1.6BETA'>Pixelpost</generator>
	<id>$url</id>
	<updated>".date("Y-m-d\TH:i:s$tzoner")."</updated>";
	$tag_url = $_SERVER['HTTP_HOST'];
	$query = mysql_query("SELECT id,datetime,headline,body,image FROM ".$pixelpost_db_prefix."pixelpost WHERE (datetime <='$cdate') ORDER BY datetime desc limit ".$feeditems);

	while(list($id,$datetime,$headline,$body,$image) = mysql_fetch_row($query))
	{
		$headline = pullout($headline);
		$headline = htmlspecialchars($headline,ENT_QUOTES);
		$body = pullout($body);
		$body = stripslashes($body);
		$body = strip_tags( $body);
		$body = htmlspecialchars($body,ENT_QUOTES);
		$body = ereg_replace("\n","\n&lt;br /&gt;",$body);
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
		$atom .= "
		<entry xmlns='http://www.w3.org/2005/Atom'>
		<title type='html'>$headline</title>
		<link rel='alternate' type='text/html' href='".$cfgrow['siteurl']."index.php?showimage=$id' title='$headline' />
		<id>tag:$tag_url,$id_date:/$id</id>
		<content type='html'>
			<![CDATA[
";
		if($rsspicdir) $atom .= "				<img src='$image' /><br />";
		if($cfgrow['rsstype'] != 'O') $atom .= "$headline<br />$body";
		$atom .= "]]>
		</content>
		<published>$tag_date</published>
		<updated>$modified_date$tzoner</updated>
		</entry>";
		}

	$atom .= "
	</feed>";
	echo $atom;
	exit;
}
// ##########################################################################################//
// COMMENT ATOM FEED, Version 1.0
// ##########################################################################################//

if(isset($_GET['x'])&&$_GET['x'] == "comment_atom")
{
	header("content-type: application/atom+xml");
	$tzoner = $cfgrow['timezone'];
	$tprefix = '+';
	$tzoner = sprintf ("%01.2f", $tzoner);

	if (substr($tzoner,0,1)=='-')
	{
     $tzoner = (substr($tzoner,1));
     $tprefix = '-';
	}

	if ($tzoner < 10) $tzoner = "0".$tzoner;

	$hh = substr($tzoner,0,2);
	$mm = substr($tzoner,-2);
	$tzoner = $tprefix.$hh.":".$mm;
	$url = $cfgrow['siteurl'];
	$atom = "<?xml version='1.0' encoding='UTF-8'?>
	<feed xml:lang='en' xmlns='http://www.w3.org/2005/Atom'>
	<title>".$lang_comment_feed_title." ".$pixelpost_site_title."</title>
	<link rel='alternate' type='text/html' href='".$cfgrow['siteurl']."' title='".$pixelpost_site_title."' />
	<link rel='self' type='application/atom+xml' href='".$cfgrow['siteurl']."index.php?x=comment_atom' title='".$pixelpost_site_title."' />
	<author>
	<name>".$pixelpost_site_title."</name>
	<uri>$url</uri>
	</author>
	<generator uri='http://www.pixelpost.org/' version='1.7BETA'>Pixelpost</generator>
	<id>$url</id>
	<updated>".date("Y-m-d\TH:i:s$tzoner")."</updated>";
	$tag_url = $_SERVER['HTTP_HOST'];
	
	$query = mysql_query("SELECT `".$pixelpost_db_prefix."comments`.`id`, `".$pixelpost_db_prefix."comments`.`datetime`, `".$pixelpost_db_prefix."comments`.`message`, `".$pixelpost_db_prefix."comments`.`name`, `".$pixelpost_db_prefix."comments`.`url`, `".$pixelpost_db_prefix."comments`.`parent_id`, `".$pixelpost_db_prefix."pixelpost`.`headline`, `".$pixelpost_db_prefix."pixelpost`.`image`
	FROM `".$pixelpost_db_prefix."comments`
		INNER JOIN `".$pixelpost_db_prefix."pixelpost` ON `".$pixelpost_db_prefix."pixelpost`.`id` = `".$pixelpost_db_prefix."comments`.`parent_id`
	WHERE publish = 'yes'
	ORDER BY `".$pixelpost_db_prefix."comments`.`id` DESC 
	LIMIT 0,".$feeditems."");

	while(list($comment_id, $comment_datetime, $comment_message, $comment_name, $comment_url, $parent_id, $parent_headline, $parent_image) = mysql_fetch_row($query))
	{
		$comment_name = pullout($comment_name);
		$parent_headline = pullout($parent_headline);
		$parent_headline = htmlspecialchars($parent_headline,ENT_QUOTES);
		$comment_message = pullout($comment_message);
		//$comment_message = htmlspecialchars($comment_message,ENT_QUOTES);
		$comment_message = strip_tags($comment_message);
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
		$atom .= "
		<entry xmlns='http://www.w3.org/2005/Atom'>
		<title type='html'>".$lang_comment_feed_image_title." '$parent_headline' by $comment_name</title>
		<link rel='alternate' type='text/html' href='".$cfgrow['siteurl']."index.php?showimage=$parent_id' title='$parent_headline' />
		<id>tag:$tag_url,$id_date:/$parent_id$comment_id</id>
		<content type='html'>
			<![CDATA[
";
		if($rsspicdir) $atom .= "				<img src='$parent_image' /><br />";
		$atom .= "
		$parent_headline<br />$comment_message
			]]>
		</content>
		<published>$tag_date</published>
		<updated>$modified_date$tzoner</updated>
		</entry>";
		}

	$atom .= "
	</feed>";
	echo $atom;
	exit;
}
// ##########################################################################################//
// RSS + ATOM - tags
// ##########################################################################################//

// ATOM Tags
$atom_url = "http://".$HTTP_HOST.$REQUEST_URI."&amp;x=atom";
$tpl = str_replace("<ATOM_AUTODETECT>",$atom_url,$tpl); // keeping this "old" tag because it is used in user's template maybe
$atom_auto = "<link rel=\"service.feed\" type=\"application/x.atom+xml\" title=\"$pixelpost_site_title - ATOM Feed\" href=\"".$cfgrow["siteurl"]."index.php?x=atom\" />";
$tpl = ereg_replace("<ATOM_AUTODETECT_LINK>",$atom_auto,$tpl);
$tpl = ereg_replace("<SITE_ATOM_LINK>","<a href='./index.php?x=atom'>ATOM feed</a>",$tpl);

// Comment ATOM Tags
$comment_atom_auto = "<link rel=\"service.feed\" type=\"application/x.atom+xml\" title=\"$pixelpost_site_title - Comment ATOM Feed\" href=\"".$cfgrow["siteurl"]."index.php?x=comment_atom\" />";
$tpl = ereg_replace("<COMMENT_ATOM_AUTODETECT_LINK>",$comment_atom_auto,$tpl);
$tpl = ereg_replace("<SITE_COMMENT_ATOM_LINK>","<a href='./index.php?x=comment_atom'>ATOM Comment feed</a>",$tpl);

// RSS Tags
$rss_auto = "<link rel=\"alternate\" type=\"application/rss+xml\" title=\"$pixelpost_site_title - RSS Feed\" href=\"".$cfgrow["siteurl"]."index.php?x=rss\" />";
$tpl = ereg_replace("<RSS_AUTODETECT_LINK>",$rss_auto,$tpl);
$tpl = ereg_replace("<SITE_RSS_LINK>","<a href='./index.php?x=rss'>RSS 2.0</a>",$tpl);

// Comment RSS Tags
$comment_rss_auto = "<link rel=\"alternate\" type=\"application/rss+xml\" title=\"$pixelpost_site_title - Comment RSS Feed\" href=\"".$cfgrow["siteurl"]."index.php?x=comment_rss\" />";
$tpl = ereg_replace("<COMMENT_RSS_AUTODETECT_LINK>",$comment_rss_auto,$tpl);
$tpl = ereg_replace("<SITE_COMMENT_RSS_LINK>","<a href='./index.php?x=comment_rss'>Comment RSS</a>",$tpl);
?>