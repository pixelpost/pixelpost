<?php

// SVN file version:
// $Id$

/*

Admin Sample 12CropImage addon 1.0
Pixelpost 1.5

================================================================
Provided as a basic example.

This addon works with new feature: addons in admin panel.
This addon will include some scripts in the admin panel under submenus
of main Pixelpost menus. Currently Images->Edit and Options are supported in
admin/index.php but the code is general and could be extended to other sections.

Notes:
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

5 - To use this addon, open the images menu and try to edit an image.
You should see additional submenu named 12CROPIMAGE there. use it and you get the point:)

When creating an addon, please always have the $addon_* variables.

These are displayed in a users admin panel under addons:
$addon_name
$addon_description
$addon_version

and the others are used for utility of the addon in the admin panel.

*/

$addon_name         = "Admin Sample 12CropImage addon";
$addon_description  = "This is a sample addon testing 12CropImage inside admin panel of Pixelpost";
$addon_version      = "1.0";

/**
 * The workspace. Where to activate the function inside index.php
 *
 */
$addon_workspace = "image_edit";

/**
 * The menu where the addon should appear in the admin panel. In this case: images menu
 *
 */
$addon_menu = "images";

/**
 * What would be the title of submenu of this addon: 12cropimage
 *
 */
$addon_admin_submenu = "12cropimage";

/**
 * What is the function name
 *
 */
$addon_function_name = "cropimage12_admin_addon";

/**
 * Add the function
 *
 */
add_admin_functions($addon_function_name,$addon_workspace,$addon_menu,$addon_admin_submenu);

add_admin_functions('crop_image12_make_ready','admin_html_head','','');


function crop_image12_make_ready()
{
    global $cfgrow , $txt ,$image, $spacer,$pixelpost_db_prefix, $javafile;
	
    if(isset($_GET['view']) AND $_GET['view']=="images" && isset($_GET['id']))
    {
        if(!isset($_SESSION["pixelpost_admin"]) || $cfgrow['password'] != $_SESSION["pixelpost_admin"] || isset($_GET["_SESSION"]["pixelpost_admin"]) AND $_GET["_SESSION"]["pixelpost_admin"] == $_SESSION["pixelpost_admin"] || isset($_POST["_SESSION"]["pixelpost_admin"]) AND $_POST["_SESSION"]["pixelpost_admin"] == $_SESSION["pixelpost_admin"] || isset($_COOKIE["_SESSION"]["pixelpost_admin"]) AND $_COOKIE["_SESSION"]["pixelpost_admin"] == $_SESSION["pixelpost_admin"])
		{
		    die ("Try another day!!");
        }
        
        if($cfgrow['crop'] == '12c'){
		    require_once("../includes/12cropimageinc.php");
		    require_once("../includes/12cropimageincscripts.php");
		}
	}
}

function cropimage12_admin_addon()
{
	global $cfgrow , $txt, $image, $spacer;
	
	if($cfgrow['crop']=='12c')
	{
	
        echo "
        <hr />
        <strong>12CropImage tool:</strong>
        <br />
        
        This functionality is already inside admin/index.php but this addon is for demo only that show the abilities of \"addons for admin panel\" feature.
        <br /><br />
        
        To edit the thumbnail for this photo, drag the crop window with mouse or expand/shrink it with '+'/'-' buttons:
        <br />
        
        <input type='button' name='Submit1' value='Update Thumbnail' onclick=\"cropCheck('def','".$image ."');\" />
        <input type='button' name='Submit3' value='".$txt['smaller']."' onMouseDown=\"cropZoom('in');\" onMouseUp='stopZoom();' />
        <input type='button' name='Submit4' value='".$txt['bigger']."' onMouseDown=\"cropZoom('out');\" onMouseUp='stopZoom();' />";
        
        /**
         * Set the size of the crop frame according to the uploaded image
         *
         */
        setsize_cropdiv($image);
        
        echo "
        <p />
        
        <img src='".$cfgrow['imagepath'].$image."' id='myimg' />
        
        <div id='cropdiv'>
            <table width='100%' height='100%' border='1' cellpadding='0' cellspacing='0' bordercolor='#000000'>
                <tr>
                    <td><img src='".$spacer."' /></td>
                </tr>
            </table>
        </div>
        </div>
        </div>
        <p />";
    }
	else
	{
        echo "<strong>Note:</strong> The 12CropImage option is not selected for cropping thumbnails.<p />Please enable the 12CropImage option <a href='index.php?view=options&optionsview=thumb'>here</a>.";
	}
}
?>