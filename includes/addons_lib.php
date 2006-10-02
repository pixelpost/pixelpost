<?php

// CVS file version: $Id: addons_lib.php,v 1.3 2006/06/20 22:40:17 gajcy Exp $

$query_ad_s = "SELECT * FROM {$pixelpost_db_prefix}addons WHERE status='on'";
$query_ad_s = mysql_query($query_ad_s);

$dir = "addons/";

while (list($id,$filename,$status)= mysql_fetch_row($query_ad_s))
{
	if (file_exists($dir.$filename.".php"))
		include_once($dir.$filename.".php");
}
	
?>