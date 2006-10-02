<?php

/*

Pixelpost version 1.5
Datetime addon version 1.1

CVS file version: $Id: current_datetime.php,v 1.6 2006/06/20 22:40:16 gajcy Exp $

Pixelpost www: http://www.pixelpost.org/

Version 1.5:
Development Team:
Ramin Mehran, Connie Mueller-Goedecke, Will Duncan, Joseph Spurling, GeoS
Version 1.1 to Version 1.3: Linus <http://www.shapestyle.se>

Contact: thecrew@pixelpost.org
Copyright © 2006 Pixelpost.org <http://www.pixelpost.org>

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