<?php
/*

lang-swedish.php
================
Pixelpost version 1.6

SVN file version:
$Id$

Language file: swedish
Author:  Linus
WWW: http://www.shapestyle.se

Version 1.5:
Development Team:
Ramin Mehran, Connie Mueller-Goedecke, Will Duncan, Joseph Spurling, Piotr "GeoS" Galas
Version 1.1 to Version 1.3: Linus <http://www.shapestyle.se>

Copyright © 2006 Pixelpost.org <http://www.pixelpost.org>

Pixelpost www:  	http://www.pixelpost.org/
Pixelpost wiki: 	http://wiki.pixelpost.org/
Pixelpost forum: 	http://forum.pixelpost.org

Info: if you want to have the admin-section in swedish language as well,
      do the following:
       - open the directory "language" in your file-manager
       - copy the file "admin-lang-english.php" as "admin-lang-swedish.php"
       - translate all variables into swedish
       - upload the file "admin-lang-swedish.php" to your server
         into the language-directory

 Done!
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
______________________________________________________________________________

BEGIN OF LANGUAGE VARIABLES

Dont edit                     ||      Edit                             */

$_lang_file_translator        = 'Linus - <a href="http://www.shapestyle.se/" target="_blank">www.shapestyle.se</a>';
$_lang_file_email             = 'thecrew@pixelpost.org';
$_lang_file_rev               = '1.0.0';

// IMAGE NAVIGATION
$lang_previous                = "F&ouml;reg&aring;ende";
$lang_next                    = "N&auml;sta";
$lang_no_previous             = "Ingen bild";
$lang_no_next                 = "Ingen bild";
$lang_latest									 = "Last";
$lang_first										 = "First";
$lang_browse_select_category  = "V&auml;lj kategori";
$lang_browse_all              = "Alla";
$lang_paged_archive						= "Archive";

// COMMENTS
$lang_message_missing_image   = "Ingen bild vald, kommentaren sparades inte.";
$lang_message_missing_comment = "Inget meddelande, kommentaren sparades inte.";
$lang_visit_homepage          = "Bes&ouml;k hemsida";
$lang_no_comments_yet         = "Inga kommentarer &auml;nnu.";
$lang_comment_thank_you       = "Tack f&ouml;r ditt bes&ouml;k och f&ouml;r att du tog dig tid att kommentera en bild!";
$lang_comment_redirect        = "Klicka f&ouml;r att g&aring; tillbaka.";
$lang_comment_redirect_error  = "Comment submition error! Please click to be transferred back, if redirection doesn't work";
$lang_message_moderating_comment = "Your comment is received! It will become public after authorizing by photoblog admin.";
$lang_comment_page_title      = "Kommentera";
$lang_comment_popup           = "Kommentarer";
$lang_message_banned_comment  = "Your comment is not saved! It contains one or more banned words/email/ips.";
$lang_comment_popup_disabled  = "Commenting on this picture has been disabled";
$lang_tags                    = "Tags:<br/>";

// EXIF DATA
$lang_exposure              = "Exponering:";
$lang_aperture              = "Bl&auml;ndare:";
$lang_capture_date          = "Tagen:";
$lang_focal                 = "Br&auml;nnvidd:";
$lang_camera_maker          = "Kameram&auml;rke:";
$lang_camera_model          = "Kameramodell:";
$lang_flash_fired           = "Blixt: Avfyrad";
$lang_flash_not_fired       = "Blixt: Ej avfyrad";
$lang_iso      = "ISO:";

// Category
$lang_category_singular    = "Kategori:";
$lang_category_plural      = "Kategorier:";

// Month and Day
$lang_monday              = "M&aring;ndag";
$lang_tuesday             = "Tisdag";
$lang_wednesday           = "Onsdag";
$lang_thursday            = "Torsdag";
$lang_friday              = "Fredag";
$lang_saturday            = "L&ouml;rdag";
$lang_sunday              = "S&ouml;ndag";

$lang_january             = "Januari";
$lang_february            = "Februari";
$lang_march               = "Mars";
$lang_april               = "April";
$lang_may                 = "Maj";
$lang_june                = "Juni";
$lang_july                = "Juli";
$lang_august              = "Augusti";
$lang_september           = "September";
$lang_october             = "Oktober";
$lang_november            = "November";
$lang_december            = "December";

// Alternative language
$lang_alt_lang_dutch							="Nederlands";
$lang_alt_lang_english						="English";
$lang_alt_lang_french							="Français";
$lang_alt_lang_german							="Deutsch";
$lang_alt_lang_italian						="Italiano";
$lang_alt_lang_norwegian					="Norsk";
$lang_alt_lang_persian						="Farsi";
$lang_alt_lang_polish							="Polski";
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