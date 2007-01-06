<?php
/*

Pixelpost version 1.6

SVN file version:
$Id$

Pixelpost www: http://www.pixelpost.org/

Version 1.5:
Development Team:
Ramin Mehran, Connie Mueller-Goedecke, Will Duncan, Joseph Spurling, Piotr "GeoS" Galas, Dennis Mooibroek
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
	$query = mysql_query("SELECT id,datetime,headline,body,image FROM ".$pixelpost_db_prefix."pixelpost WHERE (datetime<='$cdate') ORDER BY datetime desc limit 10");

	while(list($id,$datetime,$headline,$body,$image) = mysql_fetch_row($query))
	{
		$headline = pullout($headline);
		$headline = htmlspecialchars($headline,ENT_QUOTES);
		$image = $cfgrow['siteurl']."thumbnails/thumb_$image";
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
			&lt;img src=&quot;$image&quot;&gt;
			&lt;br /&gt;$body
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
	<generator uri='http://www.pixelpost.org/' version='1.5BETA'>PixelPost</generator>
	<id>$url</id>
	<updated>".date("Y-m-d\TH:i:s$tzoner")."</updated>";
	$tag_url = $_SERVER['HTTP_HOST'];
	$query = mysql_query("SELECT id,datetime,headline,body,image FROM ".$pixelpost_db_prefix."pixelpost WHERE (datetime <='$cdate') ORDER BY datetime desc limit 0,20");

	while(list($id,$datetime,$headline,$body,$image) = mysql_fetch_row($query))
	{
		$headline = pullout($headline);
		$headline = htmlspecialchars($headline,ENT_QUOTES);
		$body = pullout($body);
		$body = htmlspecialchars($body,ENT_QUOTES);
		$body = strip_tags($body);
		$image = $cfgrow['siteurl']."thumbnails/thumb_$image";
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
		<link rel='alternate' type='text/html' href='".$cfgrow['siteurl']."?showimage=$id' title='$headline' />
		<id>tag:$tag_url,$id_date:/$id</id>
		<content type='html'>
			<![CDATA[
				<img src='$image' /><br />$headline<br />$body]]>
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
// keeping this "old" tag because it is used in user's template maybe
$atom_url = "http://".$HTTP_HOST.$REQUEST_URI."&amp;x=atom";
$tpl = str_replace("<ATOM_AUTODETECT>",$atom_url,$tpl);
$atom_auto = "<link rel=\"service.feed\" type=\"application/x.atom+xml\" title=\"$pixelpost_site_title - ATOM Feed\" href=\"".$cfgrow["siteurl"]."index.php?x=atom\" />";
$tpl = ereg_replace("<ATOM_AUTODETECT_LINK>",$atom_auto,$tpl);
$tpl = ereg_replace("<SITE_ATOM_LINK>","<a href='./index.php?x=atom'>ATOM feed</a>",$tpl);

$rss_auto = "<link rel=\"alternate\" type=\"application/rss+xml\" title=\"$pixelpost_site_title - RSS Feed\" href=\"".$cfgrow["siteurl"]."index.php?x=rss\" />";
$tpl = ereg_replace("<RSS_AUTODETECT_LINK>",$rss_auto,$tpl);
$tpl = ereg_replace("<SITE_RSS_LINK>","<a href='./index.php?x=rss'>RSS 2.0</a>",$tpl);
?>