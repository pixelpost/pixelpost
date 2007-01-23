<?php
/*

lang-persian.php
================
Pixelpost version 1.6

SVN file version:
$Id$

Language file: persian
Author:  Ramin Mehran
Contact: ramin@pixelpost.org
WWW: http://www.raminia.com

Version 1.5:
Development Team:
Ramin Mehran, Connie Mueller-Goedecke, Robert Prouse, Will Duncan, Joseph Spurling, Piotr "GeoS" Galas
Version 1.1 to Version 1.3: Linus <http://www.shapestyle.se>
Copyright © 2006 Pixelpost.org <http://www.pixelpost.org>

Pixelpost www:  	http://www.pixelpost.org/
Pixelpost wiki: 	    http://wiki.pixelpost.org/
Pixelpost forum: 	http://forum.pixelpost.org
______________________________________________________________________________

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
___________________________________________________________________________

BEGIN OF LANGUAGE VARIABLES:

Dont edit                   ||       Edit                                    */


// IMAGE NAVIGATION
$lang_previous              = "قبلي";
$lang_next                  = "بعدي";
$lang_no_previous           = "عکس قبلي نداريم";
$lang_no_next               = "عکس بعدي نداريم";
$lang_latest									 = "Last";
$lang_first										 = "First";
$lang_browse_select_category    = "انتخاب زيرمجموعه";
$lang_browse_all            = "همه";
$lang_permalink								= "Permalink";
$lang_paged_archive						= "Archive";

// COMMENTS
$lang_message_missing_image = "هيچ تص?يري انتخاب نشده. يادداشت ذخيره نشد";
$lang_message_missing_comment   = "پيغامي دريا?ت نشد. يادداشت ذخيره نشد";
$lang_visit_homepage        = "بازديد صفحه اصلي";
$lang_no_comments_yet       = "هيچ يادداشتي وجود ندارد";
$lang_comment_thank_you     = "از اينکه به اين سايت آمديد و نظر داديد متشکرم";
$lang_comment_redirect      = "براي بازگشتن به صفحه بعد کليک کنيد";
$lang_comment_redirect_error		= "Comment submition error! Please click to be transferred back, if redirection doesn't work";
$lang_comment_page_title    = "يادداشت";
$lang_comment_popup         = "يادداشت‌ها";
$lang_message_banned_comment     = "Your comment is not saved! It contains one or more banned words/email/ips.";
$lang_comment_popup_disabled     = "Commenting on this picture has been disabled";
$lang_tags                      = "Tags:<br/>";

// EXIF DATA
$lang_exposure              = "Exposure:";
$lang_aperture              = "Aperture:";
$lang_capture_date          = "Capture Date:";
$lang_focal                 = "Focal:";
$lang_camera_maker          = "Camera Maker";
$lang_camera_model          = "Camera Model";
$lang_flash_fired           = "Flash: Fired";
$lang_flash_not_fired       = "Flash: Not Fired";
$lang_iso = "ISO:";

$lenses = array(
		"Fujinon 37-370mm"
);
// Category
$lang_category_singular	   = "زيرمجموعه:";
$lang_category_plural      = "زيرمجموعه‌ها:";

// Month and Day
$lang_monday              = "دوشنبه";
$lang_tuesday             = "سه‌شنبه";
$lang_wednesday           = "چهارشنبه";
$lang_thursday            = "پنج‌شنبه";
$lang_friday              = "جمعه";
$lang_saturday            = "شنبه";
$lang_sunday              = "يک‌شنبه";

$lang_january             = "ژانويه";
$lang_february            = "فوريه";
$lang_march               = "مارس";
$lang_april               = "آوريل";
$lang_may                 = "مه";
$lang_june                = "ژوئيه";
$lang_july                = "جولاي";
$lang_august              = "آگوست";
$lang_september           = "سپتامبر";
$lang_october             = "اکتبر";
$lang_november            = "نوامبر";
$lang_december            = "دسامبر";

$lang_isunicode           = "yes";

// Alternative language
$lang_alt_lang_dutch							="Nederlands";
$lang_alt_lang_english						="English";
$lang_alt_lang_french							="Français";
$lang_alt_lang_german							="Deutsch";
$lang_alt_lang_italian						="Italiano";
$lang_alt_lang_norwegian					="Norsk";
$lang_alt_lang_persian						="Farsi";
$lang_alt_lang_polish							="Polskiego";
$lang_alt_lang_portuguese					="Português";
$lang_alt_lang_simplified_chinese	="Chinese";
$lang_alt_lang_spanish						="Español";
$lang_alt_lang_swedish						="Svenska";
$lang_alt_lang_japanese						="Japanese";

// Email Notification

$lang_email_notification_subject = "New Comment";
$lang_email_notification_pt1 = "
	  Hello,<br>
      A new comment has been made at your photoblog.<br><br>
	  ";
$lang_email_notification_pt2 = "
      <br>
      The comment is: <br>
      ----------------------------------------------------------------------<br>
	  ";
$lang_email_notification_pt3 = "by";
$lang_email_notification_pt4 = "
            ----------------------------------------------------------------------    <br>
      Email sent by pixelpost<br>
";
$lang_email_notificationplain_pt1 = "
	  Hello,
      A new comment has been made at your photoblog.";
$lang_email_notificationplain_pt2 = "
      The comment is:
      ----------------------------------------------------------------------";
$lang_email_notificationplain_pt3 = "by";
$lang_email_notificationplain_pt4 = "
      ----------------------------------------------------------------------
      Email sent by pixelpost
";
// Error Message
$lang_nothing_to_show             = "Coming Soon! Nothing to show. No image to show here!";
?>