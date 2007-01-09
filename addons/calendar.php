<?php

/*

Pixelpost version 1.6
Calendar addon version 1.1.5
Modified by jdleung 2006.10.2
Contact: jdleung@yahoo.com

SVN file version:
$Id$

Pixelpost www: http://www.pixelpost.org/

Version 1.6:
Development Team:
Ramin Mehran, Connie Mueller-Goedecke, Will Duncan, Joseph Spurling, GeoS
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

$addon_name = "Pixelpost Calendar";
$addon_version = "1.1.5";
$addon_description = "A standard calendar. Highlights days on which images are posted.<br />
Will return either a horizontal looking calendar, or a \"normal\" display.<br>
Uses the language-files for months and weekdays<br />
<br />
<b>Installation:</b><br />
Copy calendar.php to addons directory.<br />
<b>&lt;SITE_CALENDAR&gt;</b> - insert this tag in image_template.html.<br />
";

$sunday_first = 1;  //set to "1" if you want sunday displayed first in the week in vertical type.
$use_lang_var = 1; // set it to "1" if you want to use the language-variables from the active language file

// use the language-variables from the active  language file
$days = array("$lang_monday","$lang_tuesday","$lang_wednesday","$lang_thursday","$lang_friday","$lang_saturday","$lang_sunday");
if($sunday_first == 1){
	$days = array("$lang_sunday","$lang_monday","$lang_tuesday","$lang_wednesday","$lang_thursday","$lang_friday","$lang_saturday");
} 

$months = array("","01","02","03","04","05","06","07","08","09","10","11","12");
if ($use_lang_var == "1"){
	$months = array("","$lang_january","$lang_february","$lang_march","$lang_april","$lang_may","$lang_june","$lang_july","$lang_august","$lang_september","$lang_october","$lang_november","$lang_december");
}

// Don't use calendar
if($cfgrow['calendar'] == "No Calendar") {
	$tpl = ereg_replace("<SITE_CALENDAR>"," ",$tpl);
}

$tz = $cfgrow['timezone'];
$cdate = gmdate("Y-m-d H:i:s",gmdate("U")+(3600 * $tz));

$curr_month = $_GET['curr_month'];
$curr_year = $_GET['curr_year'];
if(!$curr_year) { $curr_year = date("Y"); }
if(!$curr_month) { $curr_month = date("n"); }
if(!$curr_day) { $curr_day = date("j"); }
$showimage = $_GET['showimage'];
if(!$_GET['showimage']){ $showimage = $image_id; }

if ( $_GET['showimage'] !="" && $_GET['curr_month'] ==""){
  $showimage = $_GET['showimage'];
	$query2 = mysql_query("select * from ".$pixelpost_db_prefix."pixelpost where (id='$showimage') and (datetime<='$cdate')");
	while(list($img_id,$img_datetime) = mysql_fetch_row($query2)) {
		$curr_year = substr($img_datetime,0,4);
		$curr_month = substr($img_datetime,5,2); 
		if ($curr_month < 10){ $curr_month = substr($curr_month,1,1);}
	}
}

$prev_month = $curr_month-1;
if ($prev_month <= 9){ $prev_month = "0$prev_month";}
$next_month = $curr_month+1;
if ($next_month <= 9){ $next_month = "0$next_month";}

$prev_image_id = $showimage;
$prev_browsing_month_day = "$curr_year-$prev_month";
$query2 = mysql_query("select * from ".$pixelpost_db_prefix."pixelpost where datetime like '$prev_browsing_month_day%' AND datetime<='$cdate' order by datetime desc limit 1");
while(list($img_id,$img_datetime) = mysql_fetch_row($query2)) {
	$prev_image_id = $img_id;
}

$next_image_id = $showimage;
$next_browsing_month_day = "$curr_year-$next_month";
$query3 = mysql_query("select * from ".$pixelpost_db_prefix."pixelpost where datetime like '$next_browsing_month_day%' AND datetime<='$cdate' order by datetime desc limit 1");
while(list($img_id,$img_datetime) = mysql_fetch_row($query3)) {
	$next_image_id = $img_id;
}

$total_days = array(0,31,28,31,30,31,30,31,31,30,31,30,31);

// calendar in "normal" output

if($cfgrow['calendar'] == "Normal") {
	$cal_vz = "";
	
	// february is one day longer anyway
	if(date("L", mktime(0,0,0,$curr_month,1,$curr_year))) {
		$total_days[2] = 29;
	}
	$prev_month = $curr_month-1;
	$prev_year = $curr_year;
	if($prev_month < 1) {
		$prev_month=12;
		$prev_year--;
	}
	$next_month = $curr_month+1;
	$next_year = $curr_year;
	if($next_month > 12) {
		$next_month=1;
		$next_year++;
	}
	// first day, corrected, when month starts with sunday
	$first_day_month = date("w", mktime(0,0,0,$curr_month,1,$curr_year));
	if ($first_day_month=="0"){$first_day_month="7";} 
	if($sunday_first == 1){ $first_day_month++;}
	$asc_mon = $months[$curr_month];
	$cal_vz .= "
	<table class='table-calendar-vz' cellspacing='0'>
	<tr>
	<td class='td-calendar-navi-vz'><a href='$PHP_SELF?curr_month=$prev_month&amp;curr_year=$prev_year&amp;showimage=$prev_image_id'>&laquo;</a></td>
	<td colspan='5' class='td-calendar-navi-vz'>
        $asc_mon-$curr_year
	</td>
	<td class='td-calendar-navi-vz'><a href='$PHP_SELF?curr_month=$next_month&amp;curr_year=$next_year&amp;showimage=$next_image_id'>&raquo;</a></td>
	</tr>
	<tr>";
	for ($x=0; $x<7; $x++) {
		$day = $days[$x];
		$cal_vz .= "<td class='td-calendar-days-vz'>$day</td>";
	}
	$cal_vz .= "</tr><tr>";
	for($x=2; $x<=$first_day_month; $x++) {
		$row_count++;
		$cal_vz .= "<td class='td-calendar-days-vz'>&nbsp;</td>";
	}

	$day_count=1;
	while($day_count <= $total_days[$curr_month]) {
		if($row_count % 7 == 0) { $cal_vz .= "</tr><tr>"; }
		if($day_count <= 9) { $day_count = "0$day_count"; }
		$thismonth = $curr_month;
		if($curr_month <= 9) { $thismonth = "0$curr_month"; }
		if($day_count <= date("j") && $curr_year == date("Y") && $curr_month == date("n") OR ($curr_month < date("m") AND $curr_year <= date("Y"))) {
			$class = "td-calendar-days-vz";
		} else {
			$class = "td-calendar-days-vz";
		}
		$image_search = "$curr_year-$thismonth-$day_count"; // correct queryformat to check if any image are present the current day
		$link = ""; // forgot, dare not delete yet
		$link2 = ""; // forgot, dare not delete yet
		// search for image for this day
		$dayimage = "false";
		$query = mysql_query("select * from ".$pixelpost_db_prefix."pixelpost where (datetime like '$image_search%') and (datetime<='$cdate') order by datetime");
		while(list($img_id, $img_datetime, $img_headline, $img_body, $img_image) = mysql_fetch_row($query)) {
			$dayimage = "true";
			$curr_image_id = $img_id;
		}
		if($dayimage == "true") {
			$class = "td-calendar-days-imagefound";
			$link = "<a href='$PHP_SELF?curr_month=$curr_month&amp;curr_year=$curr_year&amp;showimage=$curr_image_id' title='An Image Was Posted This Day'>";
			$link2 = "</a>";
		}
		$cal_vz .= "<td class='$class'>$link$day_count$link2</td>";
		$day_count++;
		$row_count++;
	}
	$cal_vz .= "
	</tr>
	</table>";
	$tpl = ereg_replace("<SITE_CALENDAR>",$cal_vz,$tpl);
} // normal cal end

if($cfgrow['calendar'] == "Horizontal") {
	// horizontal
	$cal_hz = "";
	
	if(date("L", mktime(0,0,0,$curr_month,1,$curr_year))) {
		$total_days[2] = 29;
	}
	$prev_month = $curr_month-1;
	$prev_year = $curr_year;
	if($prev_month < 1) {
		$prev_month=12;
		$prev_year--;
	}
	$next_month = $curr_month+1;
	$next_year = $curr_year;
	if($next_month > 12) {
		$next_month=1;
		$next_year++;
	}
	// first day of month
	$first_day_month = date("w", mktime(0,0,0,$curr_month,1,$curr_year));
	$cal_hz .= "<table class='table-calendar' cellspacing='0'><tr>";
	
	// print the calendar days
	$day_count=1;
	while($day_count <= $total_days[$curr_month]) {
		if($day_count <= 9) { $day_count = "0$day_count"; }
		$thismonth = $curr_month;
		if($curr_month <= 9) { $thismonth = "0$curr_month"; }
		if($day_count <= date("j") && $curr_year == date("Y") && $curr_month == date("n") OR ($curr_month < date("m") AND $curr_year <= date("Y"))) {
			$class = "td-calendar-days";
		} else {
			$class = "td-calendar-days";
		}
		$image_search = "$curr_year-$thismonth-$day_count"; // correct queryformat to check if any image are present the current day
		$link = "";
		$link2 = "";
		// search for image for this day
		$dayimage = "false";
		$query = mysql_query("select * from ".$pixelpost_db_prefix."pixelpost where (datetime like '$image_search%') and (datetime<='$cdate') order by datetime");
		while(list($img_id, $img_datetime, $img_headline, $img_body, $img_image) = mysql_fetch_row($query)) {
			$dayimage = "true";
			$curr_image_id = $img_id;
		}
		if($dayimage == "true") {
			$class = "td-calendar-days-imagefound";
			$link = "<a href='$PHP_SELF?curr_month=$curr_month&amp;curr_year=$curr_year&amp;showimage=$curr_image_id' title='An Image Was Posted This Day'>";
			$link2 = "</a>";
		}
		$cal_hz .= "<td class='$class'>$link$day_count$link2</td>";
		$day_count++;
		$row_count++;
	}
	$asc_mon = $months[$curr_month];
	$cal_hz .= "
	</tr>
	<tr>
	<td colspan='31' class='td-calendar-navi'>
	<a href='$PHP_SELF?curr_month=$prev_month&amp;curr_year=$prev_year&amp;showimage=$prev_image_id'>&laquo;</a>
	$asc_mon-$curr_year
	<a href='$PHP_SELF?curr_month=$next_month&amp;curr_year=$next_year&amp;showimage=$next_image_id'>&raquo;</a>
	</td>
	</tr></table>	";
	$tpl = ereg_replace("<SITE_CALENDAR>",$cal_hz,$tpl);
}
// end horizontal calendar
// end calendar in condition, because otherwise calendar would not show because x can never empty
?>