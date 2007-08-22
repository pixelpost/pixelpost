<?php

// SVN file version:
// $Id$

/*

Pixelpost version 1.7
Datetime addon version 1.1

================================================================

Provided as a basic example.
It retreives the current datetime as reported by the server.

The new tag to use in templates are
<CURRENT_DATE_TIME>
which will be replaced with the variable $current_date_time.

It's very simplistic.

When creating an addon, please always have the $addon_* variables.
Those are displayed in a users admin panel under general info.

All variables from the main script are available here, be sure not to overwrite!

$tpl holds the current template (image_template.html or comments_template.html etc).

*/

$addon_name = "Pixelpost Current DateTime";
$addon_description = "Displays current date and time as reported by the server.<br />
Format is the same as you have set in admin panel >> options <br />
 An example of how to create addons.";
$addon_version = "1.1";
$tz = $cfgrow["timezone"];

$current_date_time = gmdate($cfgrow['dateformat'],time() + (3600 * $tz));
$tpl = str_replace("<CURRENT_DATE_TIME>",$current_date_time,$tpl);

?>