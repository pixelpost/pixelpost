<?php
// Admin-Ping addon for Pixelpost 1.5 
// Version 1.0
// 
// SVN file version:
// $Id$
//
// Written By Ramin Mehran - 2005/06/22
//
/*
================================================================
How to write addons like this:
1 - To create such an addon you should fill $addon_* variables properly.
All of the activity of each addon is encapsulated inside a custom function
by the addon developer. Therefore, it's recommended that the function name have a fixed
variable name, $addon_function_name.
example:
	add_admin_functions($addon_function_name,$addon_workspace,$addon_menu,$addon_admin_submenu);
description:
	This addes a function $addon_function_name to a place in admin area with anchor named in 
	$addon_workspace, in $addon_menu and submenu $addon_admin_submenu. If your function does 
	not need any menu/submenu you can pass empty strings for each.


2 - The function should not have any arguments. In next version this should be
replaced by some function with one array argument filled by necessary info.

3 - The filename of an addon addon should start with "admin_".
This is the only way that these addons are distinguished and included inside
admin/index.php.

4 - If you need variables of the admin files, you can access them as "global" inside
the custom function of the addon. 
(In later versions, This should be changed by some safer methods)


When creating an addon, please always have the $addon_* variables.

These are displayed in a users admin panel under addons:
$addon_name
$addon_description
$addon_version

and the others are used for utility of the addon in the admin panel.

*/

// includes library only in picture save mode
if( isset($_GET['x']) && $_GET['x']=='save')
{
	include_once('../includes/IXR_Library.inc');
	$pinglist ='';
}
// Admin page
if( isset( $_GET['view'] ) && $_GET['view']=='addons' )
{


// Check to see if the ban table exists, if not, create it
$query = "SELECT id FROM {$pixelpost_db_prefix}ping LIMIT 1";
if( !mysql_query( $query ) ) {
  $query = "CREATE TABLE {$pixelpost_db_prefix}ping (
	  id INT(11) NOT NULL auto_increment,
	  pinglist MEDIUMTEXT NOT NULL default '',
	  PRIMARY KEY  (id)
	)";
  mysql_query( $query );
 // $query = "INSERT INTO {$pixelpost_db_prefix}ping VALUES ( NULL, 'http://rpc.pingomatic.com/\nhttp://rpc.blogrolling.com/pinger/\nhttp://ping.blo.gs/' )";
 // mysql_query( $query );
	}

	// Update the ban list if the form is called
	if( isset( $_POST['pinglistupdate'] ) && isset( $_POST['pinglist'] ) ) {
		$pinglist = str_replace( "\r\n", "\n", $_POST['pinglist'] );
		$pinglist = str_replace( "\r", "\n", $pinglist );
		if(version_compare(phpversion(),"4.3.0")=="-1") {
			 $pinglist = mysql_escape_string($pinglist);
		 } else {
			 $pinglist = mysql_real_escape_string($pinglist);
		 }
		$query = "UPDATE {$pixelpost_db_prefix}ping SET pinglist='$pinglist' LIMIT 1";
		mysql_query($query) or die( mysql_error() );
	}

	// Get the ban list
	$query = "SELECT pinglist FROM {$pixelpost_db_prefix}ping LIMIT 1";
	$result = mysql_query($query) or die( mysql_error() );
	if( $row = mysql_fetch_row($result) ) {
		$pinglist = $row[0];
		$pinglistarray = explode( "\n", $pinglist );
	} else {
		$pinglist = '';
		$pinglistarray = array();
	}
}

// Same info as non admin addons
$addon_name = "Ping service";
$addon_description = "List of RPC services for automatic pinging. <br/>
Example services:<br/>
http://rpc.pingomatic.com/<br/>
http://rpc.blogrolling.com/pinger/<br/>
http://ping.blo.gs/<br/>

You can copy paste these services, one at each line, to the form below to start pinging.

  <form method='post' action='index.php?view=addons'>
  <input type='hidden' name='pinglistupdate' value='1'>
  <textarea name='pinglist' value='50' style='width:300px;height:100px;'>$pinglist</textarea><br \>
  <input type='submit' value='Update Pinglist'>
  </form>
";

$addon_version = "1.0";

// The workspace. Where to activate the function inside index.php
$addon_workspace = "image_uploaded";

// menu where the addon should appear in admin panel. in this case: images menu
$addon_menu = "";

// What would be the title of submenu of this addon: 
$addon_admin_submenu = "";

// What is the function
$addon_function_name = "do_pings";

// Check to see if the ban table exists, if exist add the admin function
$query = "SELECT id FROM {$pixelpost_db_prefix}ping LIMIT 1";
if( mysql_query( $query ) ) {
	// add the function
	add_admin_functions($addon_function_name,$addon_workspace,$addon_menu,$addon_admin_submenu);
}
//

function do_pings()
{
	global $pixelpost_db_prefix;
	// Get the ban list
	$query = "SELECT pinglist FROM {$pixelpost_db_prefix}ping LIMIT 1";
	$result = mysql_query($query) or die( mysql_error() );
	if( $row = mysql_fetch_row($result) ) {
		$pinglist = $row[0];
		$pinglistarray = explode( "\n", $pinglist );
	} else {
		$pinglist = '';
		$pinglistarray = array();
	}

	foreach ($pinglistarray as $ping)
	{
		$ping = trim($ping);
		if ($ping!='')
			weblog_pings($ping);
	}

}
// function from wordpress 1.5 functions.php
function weblog_pings($server = '', $path = '')
{
	global $cfgrow ;

	// using a timeout of 3 seconds should be enough to cover slow servers
	$client = new IXR_Client($server, ((!strlen(trim($path)) || ('/' == $path)) ? false : $path));
	$client->timeout = 3;
	$client->useragent .= ' -- Pixelpost/';

	// when set to true, this outputs debug messages by itself
	$client->debug = false;
	$home = trailingslashit( $cfgrow['siteurl'] );

	$r = $client->query('weblogUpdates.ping', $cfgrow['sitetitle'], $home);
	if ($r)
		echo "<div class='content'>". $server ." is pinged! </div>";


}

function trailingslashit($string)
{
    if ( '/' != substr($string, -1)) {
        $string .= '/';
    }
    return $string;
}
?>