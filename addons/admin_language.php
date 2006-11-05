<?php
/*

Language addon version 0.1
Written by Dennis Mooibroek, http://foto.schonhose.nl

License: http://www.gnu.org/copyleft/gpl.html

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

*/


/* TODO list:
+ Provide a nice description on the admin page
+ Provide a nice message when in the <LANGUAGE=XX> tag a nonavailable language is given
+ Provide LANGUAGE file support in some way
+ Talk about Persian not being a country and determine if language is really Farsi
+ Ask Jdleung about simplified chinese.
+ Thing of a better tag then <CH_LANG> (<PP_SECOND_LANG> ???)
+ Talk to Piotr or Will about the comments on top
+ Make function create_language_url_from_tag more robust

*/
$addon_name = "Bilingual addon (for PP 1.6 SVN)";
$addon_version = "0.1";
$addon_message="";


// If on Admin page, get information
if( isset( $_GET['view'] ) && $_GET['view']=='addons' )
{
		// Checks whether specified field exists in current or specified table.
	$fieldname = "secondlangfile";
	// Assume field doesn't exist
	$fieldexists = 0;
	//Execute SQL query
	$result_id = mysql_list_fields( $pixelpost_db_pixelpost, $pixelpost_db_prefix."config" );
	for ($t = 0; $t < mysql_num_fields($result_id); $t++)
	{
		if (strtolower( $fieldname) == strtolower(mysql_field_name($result_id, $t)))
		{
			$fieldexists = 1;
			break;
		}
	}

	// if the field does not exit: Create it!
	if ($fieldexists==0)
	{
		$cfgrow = sql_array("SELECT * FROM ".$pixelpost_db_prefix."config");
		$result = mysql_query("ALTER TABLE ".$pixelpost_db_prefix."config ADD `secondlangfile` VARCHAR( 100 ) DEFAULT '".$cfgrow['langfile']."' NOT NULL");
		$addon_message = "<p><font style='color:#ff0000;font-weight:bold;'>Fields succesfully created, installation completed.</font></p>";
		$cfgrow = sql_array("SELECT * FROM ".$pixelpost_db_prefix."config");
	}

	// Perform update routine if update was pressed
	if($_GET['addonaction'] =='updatelang')
	{
		$addon_message= "<p><font style='color:#ff0000;font-weight:bold;'>Fields succesfully updated.</font></p>";
		$update = sql_query("update ".$pixelpost_db_prefix."config set secondlangfile='".$_POST['second_lang']."' where admin='".$cfgrow['admin']."'");
		$cfgrow = sql_array("SELECT * FROM ".$pixelpost_db_prefix."config");
	}
	
	// do admin stuff (to be written)
 	$addon_description="
 			<form method='post' action='$PHP_SELF?view=addons&amp;addonaction=updatelang' accept-charset='UTF-8'>
 			<select name='second_lang'>
			<option value='".$cfgrow['secondlangfile']."'>".$cfgrow['secondlangfile']."</option>
		";
		// go through template folder
		$dir = "../language";
		if($handle = opendir($dir)) {
			while (false !== ($file = readdir($handle))) {
					if($file != "." && $file != "..") {
					$file = ereg_replace("lang-","",$file);
					$file = ereg_replace(".php","",$file);
			// check that admin-language-files are not listed
					$admin_pre = substr("$file",0,6);
					if ($admin_pre != "admin-"){
						if ($file !== $cfgrow['secondlangfile']) {
							$addon_description=$addon_description."<option value='$file'>$file</option>";}
						}
					}
				}
			closedir($handle);
			}
		$addon_description =$addon_description."
			</select>
			<input type='submit' value='Update' />
			</form>
		";
		if ($addon_message != "")
		{
			$addon_description=$addon_description.$addon_message;
		}	
}
else
{
	// if we are not in the adminpanel do this code
	if($admin_panel != 1){
  	// Aditional functions
  	function create_language_url_from_tag( $language_link_abr, $language_link_full ){
  			// If the query string is empty or already contains only previous language query, only need to pass the new language query
  		$language_link="<a href='".$_SERVER['PHP_SELF'];
  		if (( $_SERVER["QUERY_STRING"] == "" )OR( substr( $_SERVER["QUERY_STRING"],0,5) == "lang=" ) ){
      	$language_link = $language_link."?lang=".strtolower( $language_link_abr );
  		} else {
  			// If the query string is not empty, collect all the elements of the query for reassembly with new language query
  	  	// Extract queries on "browse" and "about" pages and other custom pages
      	if( isset($_GET['x'])) {
          $templatequery = "x=".$_GET['x'];
          if( isset($_GET['category']))
              $categoryquery = "&amp;category=".$_GET['category'];
          else
              $categoryquery = "";
          if( isset($_GET['archivedate']))
              $archivequery = "&amp;archivedate=".$_GET['archivedate'];
          else
              $archivequery = "";
          // reassemble the query with the new language instruction        
          $language_link = $language_link."?".$templatequery.$categoryquery.$archivequery."&amp;lang=".strtolower( $language_link_abr );
      	} else {
      		// Extract queries on "image" page with GeoS Browse addon and JBGmap addon enabled
          $imagequery = "showimage=".$_GET['showimage'];
          if( isset($_GET['category']))
              $categoryquery = "&amp;category=".$_GET['category'];
          else
              $categoryquery = "";
          // reassemble the query with the new language instruction        
          $language_link = $language_link."?".$imagequery.$categoryquery."&amp;lang=".strtolower( $language_link_abr );
      	}
    	}
    	$language_link = $language_link."'>".$language_link_full."</a>";
    	return $language_link;
  	}
  	
  	// TAG REPLACEMENT AND BUILD UP
  		// This addon supports a switch_language tag to enable the user to switch to another
  	// language. 
  	$default_language_abr = strtolower($PP_supp_lang[$cfgrow['langfile']][0]);
  	$second_language_abr = strtolower($PP_supp_lang[$cfgrow['secondlangfile']][0]);
  	
  	if ($language_abr == $default_language_abr) 
  	{
  		$link_language_abr = $second_language_abr;
  	} 
  	else 
  	{
  		$link_language_abr = $default_language_abr;
  	}
  	// Determine the full name of the link_language
  	foreach ($PP_supp_lang as $key => $row)
  	{
  		foreach($row as $cell)
    	{
    		if ($cell == strtoupper($link_language_abr))
      		$language_link_key = $key;
  	  }
  	}
  	$language_link_full=$PP_supp_lang[$language_link_key][1];
  	$language_link	=	create_language_url_from_tag( $link_language_abr, $language_link_full  );
  	// Create one template tag for all templates and both languages
  	$tpl = str_replace("<CH_LANG>",$language_link,$tpl); 
  	
  	
  	// support for <LANGUAGE=XX> TAG
  	preg_match_all("/<(\s*language\s*=\s*([^<>\s]*)\s*)>/iU", $tpl, $matches);
  	for($i = 0; $i < count($matches[0]); $i++)
  	{
  		foreach ($PP_supp_lang as $key => $row)
  		{
  			foreach($row as $cell)
    		{
    			if ($cell == strtoupper($matches[2][$i]))
      		$language_link_key = $key;
  	  	}
  		}
  		$alt_language_link=create_language_url_from_tag( $matches[2][$i],$PP_supp_lang[$language_link_key][1] );
  		$tpl = str_replace("<LANGUAGE=".strtoupper($matches[2][$i]).">",$alt_language_link,$tpl);
  	}
  }
}
?>