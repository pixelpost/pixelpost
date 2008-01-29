<?php

// SVN file version:
// $Id$

$feeditems = (($cfgrow['feeditems'] > 0) ? $cfgrow['feeditems'] : 10);
$rsspicdir = (($cfgrow['rsstype'] == 'T' || $cfgrow['rsstype'] == 'O') ? ltrim($cfgrow['thumbnailpath'], "./")."thumb_" : (($cfgrow['rsstype'] == 'F' || $cfgrow['rsstype'] == 'FO') ? ltrim($cfgrow['imagepath'], "./") : ''));

$feed_title = htmlspecialchars(pullout($cfgrow['feed_title']),ENT_QUOTES);

$feed_description = htmlspecialchars(pullout($cfgrow['feed_description']),ENT_QUOTES);

$feed_copyright = htmlspecialchars(pullout($cfgrow['feed_copyright']),ENT_QUOTES);

// ##########################################################################################//
// RSS 2.0 FEED
// ##########################################################################################//

if(isset($_GET['x']) && $_GET['x'] == "rss"){

    if(($cfgrow['feed_discovery'] == 'RA' || $cfgrow['feed_discovery'] == 'R') || ($cfgrow['feed_discovery'] == 'E' && $cfgrow['feed_external_type'] == 'ER')){

$rss  =
<<<EOE
<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">

<channel>
    <title>$feed_title</title>
    <link>{$cfgrow['siteurl']}</link>
    <atom:link href="{$cfgrow['siteurl']}index.php?x=rss" rel="self" type="application/rss+xml" />
    <description>$feed_description</description>
    <docs>http://blogs.law.harvard.edu/tech/rss</docs>
    <generator>pixelpost</generator>
    <copyright>$feed_copyright</copyright>
EOE;

    $tzoner  = sprintf ("%01.2f", $cfgrow['timezone']);
    $tprefix = '+';

    if (substr($tzoner,0,1)=='-')
    {
        $tzoner = (substr($tzoner,1));
        $tprefix = '-';
    }

    if ($tzoner < 10) { $tzoner = "0".$tzoner; }

    $hh = substr($tzoner,0,2);
    $mm = substr($tzoner,-2);
    $tzoner = $tprefix.$hh.$mm;

    $query = mysql_query("SELECT `id`,`datetime`,`headline`,`body`,`image`,`alt_headline`,`alt_body` FROM `".$pixelpost_db_prefix."pixelpost` WHERE (`datetime`<='$cdate') ORDER BY `datetime` DESC LIMIT ".$feeditems);

    while(list($id,$datetime,$headline,$body,$image,$alt_headline,$alt_body) = mysql_fetch_row($query))
    {
        if ($language_abr == $default_language_abr)
        {
            $headline = pullout($headline);
            $headline = htmlspecialchars($headline,ENT_QUOTES);
        
            $body = ($cfgrow['markdown'] == 'T') ? markdown(pullout($body)) : pullout($body);
            $body = stripslashes($body);
            $body = strip_tags($body);
            $body = htmlspecialchars($body,ENT_QUOTES);
            $body = ereg_replace("\n","\n&lt;br /&gt;",$body);
        }
        else
        {
            if ($alt_headline != '')
            {
                $headline = pullout($alt_headline);
                $headline = htmlspecialchars($alt_headline,ENT_QUOTES);
            }
            else
            {
                $headline = pullout($headline);
                $headline = htmlspecialchars($headline,ENT_QUOTES);
            }
        
            if ($alt_body == '')
            {
                $body = ($cfgrow['markdown'] == 'T') ? markdown(pullout($body)) : pullout($body);
                $body = stripslashes($body);
                $body = strip_tags($body);
                $body = htmlspecialchars($body,ENT_QUOTES);
                $body = ereg_replace("\n","\n&lt;br /&gt;",$body);
            }
            else
            {
                $body = ($cfgrow['markdown'] == 'T') ? markdown(pullout($alt_body)) : pullout($alt_body);
                $body = stripslashes($body);
                $body = strip_tags($body);
                $body = htmlspecialchars($body,ENT_QUOTES);
                $body = ereg_replace("\n","\n&lt;br /&gt;",$body);
            }
        }
			
        if (($cfgrow['feed_enclosure'] != 'N'))
        {
            $enclosure	= $cfgrow['siteurl'].ltrim($cfgrow['imagepath'], "./").rawurlencode($image);
            $filesize	= filesize(ltrim($cfgrow['imagepath'], "./").$image);
        }
    
        $image		= $cfgrow['siteurl'].$rsspicdir.$image;
        $datetime	= strtotime($datetime);
        $datetime	= date("D, d M Y H:i",$datetime);
        $datetime  .= ' ' .$tzoner;
    
        $rss_image      = ($rsspicdir) ? "&lt;img src=&quot;{$image}&quot;&gt;&lt;br/&gt;" : '';
        $rss_body       = (($cfgrow['rsstype'] != 'O') && $cfgrow['rsstype'] != 'FO') ? $body : '';
        $rss_enclosure  = ($cfgrow['feed_enclosure'] != 'N') ? "<enclosure url='$enclosure' length='$filesize' type='image/jpeg' />" : '';

    $rss .= "
    <item>
        <title>$headline</title>
        <link>{$cfgrow['siteurl']}index.php?showimage=$id</link>
        <description>
			$rss_image
			$rss_body
        </description>
        $rss_enclosure
        <pubDate>$datetime</pubDate>
        <guid isPermaLink='true'>{$cfgrow['siteurl']}index.php?showimage=$id</guid>
    </item>";

    }

    $rss .= '
</channel>
</rss>';

        header("Content-type:application/xml");
        echo $rss;
        exit;
    }
}

// ##########################################################################################//
// COMMENT RSS 2.0 FEED
// ##########################################################################################//

if(isset($_GET['x']) && $_GET['x'] == "comment_rss"){

    if(($cfgrow['allow_comment_feed'] == 'Y') && ($cfgrow['feed_discovery'] == 'RA' || $cfgrow['feed_discovery'] == 'R') || ($cfgrow['feed_discovery'] == 'E' && $cfgrow['feed_external_type'] == 'ER')){
	
$rss  =
<<<EOE
<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">

<channel>
    <title>$lang_comment_feed_title : $feed_title</title>
    <link>{$cfgrow['siteurl']}</link>
    <atom:link href="{$cfgrow['siteurl']}index.php?x=comment_rss" rel="self" type="application/rss+xml" />
    <description>$feed_description</description>
    <docs>http://blogs.law.harvard.edu/tech/rss</docs>
    <generator>pixelpost</generator>
    <copyright>$feed_copyright</copyright>
EOE;

	$tzoner = sprintf ("%01.2f", $cfgrow['timezone']);
	$tprefix = '+';
	
	if(substr($tzoner,0,1)=='-')
	{
		$tzoner = (substr($tzoner,1));
		$tprefix = '-';
	}
	
	if($tzoner < 10){ $tzoner = "0".$tzoner; }
	
	$hh = substr($tzoner,0,2);
	$mm = substr($tzoner,-2);
	$tzoner = $tprefix.$hh.$mm;
		
	$query = mysql_query("
	
	SELECT `".$pixelpost_db_prefix."comments`.*, `".$pixelpost_db_prefix."pixelpost`.*
	
	FROM `".$pixelpost_db_prefix."comments`
	
		INNER JOIN `".$pixelpost_db_prefix."pixelpost` ON `".$pixelpost_db_prefix."pixelpost`.`id` = `".$pixelpost_db_prefix."comments`.`parent_id`
	
	WHERE `publish` = 'yes'
	
	ORDER BY `".$pixelpost_db_prefix."comments`.`id` DESC
	
	LIMIT 0,".$feeditems."
	
	");

	while($row = mysql_fetch_array($query,MYSQL_BOTH))
	{
		if ($language_abr == $default_language_abr)
		{
			$parent_headline = htmlspecialchars(pullout($row['headline']),ENT_QUOTES);
		}
		else
		{
			if ($alt_headline == '')
			{
				$parent_headline = htmlspecialchars(pullout($row['headline']),ENT_QUOTES);
			}
			else
			{
				$parent_headline = htmlspecialchars(pullout($row['alt_headline']),ENT_QUOTES);
			}
		}

		$comment_name      = pullout($row['name']);
		$comment_message   = htmlspecialchars(strip_tags(pullout($row['message'])),ENT_QUOTES);
		$comment_message   = ereg_replace("\n","\n&lt;br /&gt;",$comment_message);
		$parent_image      = $cfgrow['siteurl'].$rsspicdir.$row['image'];
		$comment_datetime  = strtotime($row[2]);
		$comment_datetime  = date("D, d M Y H:i",$comment_datetime);
		$comment_datetime .= ' ' .$tzoner;
		
        $rss_image = ($rsspicdir) ? "&lt;img src=&quot;{$parent_image}&quot;&gt;&lt;br/&gt;" : '';
        
    $rss .= "
    <item>
        <title>$lang_comment_feed_image_title '$parent_headline' by $comment_name</title>
        <link>{$cfgrow['siteurl']}index.php?showimage={$row['parent_id']}</link>
        <description>
			$rss_image
			$comment_message
        </description>
        <pubDate>$comment_datetime</pubDate>
        <guid isPermaLink='true'>{$cfgrow['siteurl']}index.php?showimage={$row['parent_id']}#{$row[0]}</guid>
    </item>";
    
	}
	
	$rss .= '
</channel>
</rss>';
	
	    header("Content-type:application/xml");
	    echo $rss;
	    exit;
	}
}


// ##########################################################################################//
// ATOM FEED, Version 1.0
// ##########################################################################################//

if (isset($_GET['x']) && $_GET['x'] == "atom" && !isset($_GET['tag'])) {

	if (($cfgrow['feed_discovery'] == 'RA' || $cfgrow['feed_discovery'] == 'A') || ($cfgrow['feed_discovery'] == 'E' && $cfgrow['feed_external_type'] == 'EA')) {
	
    $tzoner  = sprintf ("%01.2f", $cfgrow['timezone']);
    $tprefix = '+';

    if (substr($tzoner,0,1)=='-')
    {
        $tzoner = (substr($tzoner,1));
        $tprefix = '-';
    }

    if ($tzoner < 10) { $tzoner = "0".$tzoner; }

    $hh = substr($tzoner,0,2);
    $mm = substr($tzoner,-2);
    $tzoner = $tprefix.$hh.":".$mm;
		
    $updated = date('Y-m-d\TH:i:s'.$tzoner);
		
$atom  = <<<EOE
<?xml version="1.0" encoding="UTF-8"?>
<feed xml:lang="en" xmlns="http://www.w3.org/2005/Atom">
    
    <title>$feed_title</title>
    <subtitle>$feed_description</subtitle>
    <link rel="alternate" type="text/html" href="{$cfgrow['siteurl']}" title="$pixelpost_site_title" />
    <link rel="self" type="application/atom+xml" href="{$cfgrow['siteurl']}index.php?x=atom" title="$pixelpost_site_title" />
    <author>
        <name>$pixelpost_site_title</name>
        <uri>{$cfgrow['siteurl']}</uri>
    </author>
    <generator uri="http://www.pixelpost.org/" version="1.72">Pixelpost</generator>
    <rights>$feed_copyright</rights>
    <id>{$cfgrow['siteurl']}</id>
    <updated>$updated</updated>
EOE;

    $tag_url = $_SERVER['HTTP_HOST'];

    $query = mysql_query("SELECT `id`,`datetime`,`headline`,`body`,`image`,`alt_headline`,`alt_body` FROM `".$pixelpost_db_prefix."pixelpost` WHERE (`datetime`<='$cdate') ORDER BY `datetime` DESC LIMIT ".$feeditems);

    while (list($id,$datetime,$headline,$body,$image,$alt_headline,$alt_body) = mysql_fetch_row($query))
    {
        if ($language_abr == $default_language_abr)
        {
            $headline = pullout($headline);
            $headline = htmlspecialchars($headline,ENT_QUOTES);

            $body = ($cfgrow['markdown'] == 'T') ? markdown(pullout($body)) : pullout($body);
            $body = stripslashes($body);
            $body = strip_tags($body);
            $body = htmlspecialchars($body,ENT_QUOTES);
            $body = ereg_replace("\n","\n<br />",$body);
        }
        else
        {
            if ($alt_headline == '')
            {
                $headline = pullout($headline);
                $headline = htmlspecialchars($headline,ENT_QUOTES);
            }
            else
            {
                $headline = pullout($alt_headline);
                $headline = htmlspecialchars($alt_headline,ENT_QUOTES);
            }

            if ($alt_body == '')
            {
                $body = ($cfgrow['markdown'] == 'T') ? markdown(pullout($body)) : pullout($body);
                $body = stripslashes($body);
                $body = strip_tags($body);
                $body = htmlspecialchars($body,ENT_QUOTES);
                $body = ereg_replace("\n","\n<br />",$body);
            }
            else
            {
                $body = ($cfgrow['markdown'] == 'T') ? markdown(pullout($alt_body)) : pullout($alt_body);
                $body = stripslashes($body);
                $body = strip_tags($body);
                $body = htmlspecialchars($body,ENT_QUOTES);
                $body = ereg_replace("\n","\n<br />",$body);
            }
        }
        
        if (($cfgrow['feed_enclosure'] != 'N'))
        {
            $enclosure	= $cfgrow['siteurl'].ltrim($cfgrow['imagepath'], "./").rawurlencode($image);
            $filesize	= filesize(ltrim($cfgrow['imagepath'], "./").$image."");
        }
			 
		$image     = $cfgrow['siteurl'].$rsspicdir.$image;
		$tag_date  = substr($datetime,0,10);
		$id_date   = substr($datetime,0,10);
		$tag_time  = substr($datetime,11,8);
		$tag_date .= 'T'.$tag_time.'Z';

		$modified_date = substr($datetime,0,10);
		$modified_date = $modified_date.'T'.(substr($datetime,11,8)).$tzoner;
		$datetime = strtotime($datetime);

        $atom_image      = ($rsspicdir) ? "<img src='$image' /><br />" : '';
        $atom_body       = (($cfgrow['rsstype'] != 'O') && $cfgrow['rsstype'] != 'FO') ? $headline.'<br />'.$body : '';
        $atom_enclosure  = ($cfgrow['feed_enclosure'] != 'N') ? "<link rel='enclosure' href='$enclosure' title='$headline' length='$filesize' type='image/jpeg' />" : '';

    $atom .= "
    <entry xmlns='http://www.w3.org/2005/Atom'>
        <title type='html'>$headline</title>
        <link rel='alternate' type='text/html' href='{$cfgrow['siteurl']}index.php?showimage=$id' title='$headline' />
        <id>tag:{$tag_url},{$id_date}:.{$id}</id>
        <content type='html'>
            <![CDATA[
                $atom_image
                $atom_body
            ]]>
        </content>
        $atom_enclosure
        <published>$tag_date</published>
        <updated>$modified_date</updated>
    </entry>";
    }

    $atom .= '
</feed>';
    
        header("content-type: application/atom+xml");
        echo $atom;
        exit;
	}
}

// ##########################################################################################//
// COMMENT ATOM FEED, Version 1.0
// ##########################################################################################//

if(isset($_GET['x']) && $_GET['x'] == "comment_atom") {

	if(($cfgrow['allow_comment_feed'] == 'Y') && ($cfgrow['feed_discovery'] == 'RA' || $cfgrow['feed_discovery'] == 'A') || ($cfgrow['feed_discovery'] == 'E' && $cfgrow['feed_external_type'] == 'EA')) {
	
    $tzoner  = sprintf ("%01.2f", $cfgrow['timezone']);
    $tprefix = '+';

    if (substr($tzoner,0,1)=='-')
    {
        $tzoner = (substr($tzoner,1));
        $tprefix = '-';
    }

    if ($tzoner < 10) { $tzoner = "0".$tzoner; }

    $hh = substr($tzoner,0,2);
    $mm = substr($tzoner,-2);
    $tzoner = $tprefix.$hh.":".$mm;
		
    $updated = date('Y-m-d\TH:i:s'.$tzoner);
		
$atom  = <<<EOE
<?xml version="1.0" encoding="UTF-8"?>
<feed xml:lang="en" xmlns="http://www.w3.org/2005/Atom">
    
    <title>$lang_comment_feed_title : $feed_title</title>
    <subtitle>$feed_description</subtitle>
    <link rel="alternate" type="text/html" href="{$cfgrow['siteurl']}" title="$pixelpost_site_title" />
    <link rel="self" type="application/atom+xml" href="{$cfgrow['siteurl']}index.php?x=comment_atom" title="$pixelpost_site_title" />
    <author>
        <name>$pixelpost_site_title</name>
        <uri>{$cfgrow['siteurl']}</uri>
    </author>
    <generator uri="http://www.pixelpost.org/" version="1.72">Pixelpost</generator>
    <rights>$feed_copyright</rights>
    <id>{$cfgrow['siteurl']}</id>
    <updated>$updated</updated>
EOE;

    $tag_url = $_SERVER['HTTP_HOST'];
    
	$query = mysql_query("
	
	SELECT `".$pixelpost_db_prefix."comments`.*, `".$pixelpost_db_prefix."pixelpost`.*
	
	FROM `".$pixelpost_db_prefix."comments`
	
		INNER JOIN `".$pixelpost_db_prefix."pixelpost` ON `".$pixelpost_db_prefix."pixelpost`.`id` = `".$pixelpost_db_prefix."comments`.`parent_id`
	
	WHERE `publish` = 'yes'
	
	ORDER BY `".$pixelpost_db_prefix."comments`.`id` DESC
	
	LIMIT 0,".$feeditems."
	
	");

	while($row = mysql_fetch_array($query,MYSQL_BOTH))
	{
		if ($language_abr == $default_language_abr)
		{
			$parent_headline = htmlspecialchars(pullout($row['headline']),ENT_QUOTES);
		}
		else
		{
			if ($alt_headline == '')
			{
				$parent_headline = htmlspecialchars(pullout($row['headline']),ENT_QUOTES);
			}
			else
			{
				$parent_headline = htmlspecialchars(pullout($row['alt_headline']),ENT_QUOTES);
			}
		}
		
			
		$comment_name       = pullout($row['name']);
		$comment_message    = htmlspecialchars(strip_tags(pullout($row['message'])),ENT_QUOTES);
		$comment_message    = ereg_replace("\n","\n<br />",$comment_message);
		$parent_image       = $cfgrow['siteurl'].$rsspicdir.$row['image'];
		
		$tag_date           = substr($row[2],0,10);
		$id_date            = substr($row[2],0,10);
		$tag_time           = substr($row[2],11,8);
		$tag_date          .= 'T'.$tag_time.'Z';
		
		$modified_date      = substr($row[2],0,10);
		$modified_date      = $modified_date."T".(substr($row[2],11,8)).$tzoner;
		$datetime           = strtotime($row[2]);
		
        $atom_image = ($rsspicdir) ? "<img src='$parent_image' /><br />" : '';

    $atom .= "
    <entry xmlns='http://www.w3.org/2005/Atom'>
        <title type='html'>$lang_comment_feed_image_title '$parent_headline' by $comment_name</title>
        <link rel='alternate' type='text/html' href='{$cfgrow['siteurl']}index.php?showimage={$row['parent_id']}' title='$parent_headline' />
        <id>tag:{$tag_url},{$id_date}:.{$row['parent_id']}</id>
        <content type='html'>
            <![CDATA[
                $atom_image
                $parent_headline<br />$comment_message
            ]]>
        </content>
        <published>$tag_date</published>
        <updated>$modified_date</updated>
    </entry>";
    
    }

    $atom .= '
</feed>';

        header("content-type: application/atom+xml");
		echo $atom;
		exit;
	}
}

// ##########################################################################################//
// RSS + ATOM - tags
// ##########################################################################################//

/**
 * Atom template tags
 *
 */
$atom_auto = '<link rel="service.feed" type="application/x.atom+xml" title="'.$feed_title.' - ATOM Feed" href="'.$cfgrow['siteurl'].'index.php?x=atom" />';

$tpl = ereg_replace('<ATOM_AUTODETECT_LINK>', $atom_auto, $tpl);

$tpl = ereg_replace('<SITE_ATOM_LINK>', '<a href="./index.php?x=atom">ATOM feed</a>', $tpl);

/**
 * Comment Atom template tags
 *
 */
$comment_atom_auto = '<link rel="service.feed" type="application/x.atom+xml" title="'.$feed_title.' - Comment ATOM Feed" href="'.$cfgrow['siteurl'].'index.php?x=comment_atom" />';

$tpl = ereg_replace('<COMMENT_ATOM_AUTODETECT_LINK>', $comment_atom_auto, $tpl);

$tpl = ereg_replace('<SITE_COMMENT_ATOM_LINK>', '<a href="./index.php?x=comment_atom">ATOM Comment feed</a>', $tpl);

/**
 * Rss template tags
 *
 */
$rss_auto = '<link rel="alternate" type="application/rss+xml" title="'.$feed_title.' - RSS Feed" href="'.$cfgrow['siteurl'].'index.php?x=rss" />';

$tpl = ereg_replace('<RSS_AUTODETECT_LINK>', $rss_auto, $tpl);

$tpl = ereg_replace('<SITE_RSS_LINK>', '<a href="./index.php?x=rss">RSS 2.0</a>', $tpl);

/**
 * Comment Rss template tags
 *
 */
$comment_rss_auto = '<link rel="alternate" type="application/rss+xml" title="'.$feed_title.' - Comment RSS Feed" href="'.$cfgrow['siteurl'].'index.php?x=comment_rss" />';

$tpl = ereg_replace('<COMMENT_RSS_AUTODETECT_LINK>', $comment_rss_auto, $tpl);

$tpl = ereg_replace('<SITE_COMMENT_RSS_LINK>','<a href="./index.php?x=comment_rss">Comment RSS</a>', $tpl);

/**
 * FEED auto discovery tag
 *
 */
if($cfgrow['feed_discovery'] == 'RA')           // AUTO DISCOVER RSS and ATOM feed
{
	$feed_auto_discovery  = $rss_auto."\n".$atom_auto;
}
elseif($cfgrow['feed_discovery'] == 'R')        // AUTO DISCOVER RSS feed
{
	$feed_auto_discovery = $rss_auto;
}
elseif($cfgrow['feed_discovery'] == 'A')        // AUTO DISCOVER ATOM feed
{
	$feed_auto_discovery = $atom_auto;
}
elseif($cfgrow['feed_discovery'] == 'E')        // AUTO DISCOVER External feed
{
	if($cfgrow['feed_external_type'] == 'ER')   // AUTO DISCOVER External RSS feed
	{
		$feed_auto_discovery = "<link rel=\"alternate\" type=\"application/rss+xml\" title=\"".$feed_title." - RSS Feed\" href=\"".pullout($cfgrow['feed_external'])."\" />";
	}
	else                                        // AUTO DISCOVER External ATOM feed
	{
		$feed_auto_discovery = "<link rel=\"service.feed\" type=\"application/x.atom+xml\" title=\"".$feed_title." - ATOM Feed\" href=\"".pullout($cfgrow['feed_external'])."\" />";
	}	
}
else                                            // NO feed to AUTO DISCOVER
{
	$feed_auto_discovery = '<!--Feeds are currently disabled-->';
}
$tpl = ereg_replace('<FEED_AUTO_DISCOVERY>', $feed_auto_discovery, $tpl);
?>