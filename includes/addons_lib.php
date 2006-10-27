<?php

// SVN file version:
// $Rev: 24 $
// $LastChangedBy: Administrator $
// $LastChangedDate: 2006-07-24 02:24:39 +0200 (Pn, 24 lip 2006) $

$query_ad_s = "SELECT * FROM {$pixelpost_db_prefix}addons WHERE status='on'";
$query_ad_s = mysql_query($query_ad_s);

$dir = "addons/";

while (list($id,$filename,$status)= mysql_fetch_row($query_ad_s))
{
	if (file_exists($dir.$filename.".php"))
		include_once($dir.$filename.".php");
}
	
?>