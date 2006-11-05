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
+ Talk about Persian not being a country and determine if language is really Farsi
+ Ask Jdleung about simplified chinese.
+ Talk to Piotr or Will about the comments on top

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
	$addon_description="This addon provides language support in Pixelpost and introduces two tags for inclusion in the templates:<br />
	<strong>&lt;SECONDARY_LANGUAGE&gt;</strong> => Provides an URL to switch from the default to the secondary language and vice versa<br />
	<strong>&lt;LANGUAGE=XX&gt;</strong> => Provides an URL to another language where XX is the country code</br /><br />
	When the provided URL is clicked a language variable is set and the corresponding language file is loaded. 
	Based on the language selection specific templates are also loaded. For each supported language a set of corresponding 
	template files must be present in the format \"name_xx_template.html\" (where xx is the language code in lowercase).<br /><br />
	An example: let's assume you want to support Polish (language code=PL). When the corresponding URL is clicked the Polish language
	file is loaded and the system search for \"image_pl_template.html\", \"browse_pl_template.html\" and so on. If these templates are
	not present the language isn't supported.<br /><br />
	Select secondary language:<br />
	";
 	$addon_description=$addon_description."
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
	if(isset($PP_supp_lang)){
  	// Aditional functions
  	function create_language_url_from_tag( $language_link_abr, $language_link_full ){
			if (($_SERVER['argv'][0]=="") OR (substr($_SERVER['argv'][0]=="lang=",0,5))){
  			$language_link="<a href='".$_SERVER['PHP_SELF']."?lang=".strtolower( $language_link_abr )."'>".$language_link_full."</a>";
  		} else {
  			$arguments=str_replace("&","&amp;",$_SERVER['argv'][0]);
  			$language_link="<a href='".$_SERVER['PHP_SELF']."?".$arguments."&amp;lang=".strtolower( $language_link_abr )."'>".$language_link_full."</a>";
  		}
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
  	$tpl = str_replace("<SECONDARY_LANGUAGE>",$language_link,$tpl); 
  	
  	
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