<?php
/*

lang-dutch.php
===============
Pixelpost version 1.6

SVN file version:
$Id$

Language file: dutch (NL)
Author:  Schonhose
WWW: http://foto.schonhose.nl

Version 1.5:
Development Team:
Ramin Mehran, Connie Mueller-Goedecke, Will Duncan, Joseph Spurling, Piotr "GeoS" Galas
Version 1.1 to Version 1.3: Linus <http://www.shapestyle.se>
Copyright © 2006 Pixelpost.org <http://www.pixelpost.org>

Pixelpost www:  	http://www.pixelpost.org/
Pixelpost wiki: 	http://wiki.pixelpost.org/
Pixelpost forum: 	http://forum.pixelpost.org


Info: if you want to have the admin-section in dutch language as well,
      do the following:
      - open the directory "language" in your file-manager
      - copy the file "admin-lang-english.php" as "admin-lang-dutch.php"
      - translate all variables into dutch
      - upload the file "admin-lang-dutch.php" to your server
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

BEGIN OF LANGUAGE VARIABLES:

Dont edit                     ||       Edit                                    */

$_lang_file_translator        = 'Schonhose - <a href="http://foto.schonhose.nl/" target="_blank">foto.schonhose.nl</a>';
$_lang_file_email             = 'ramin@pixelpost.org';
$_lang_file_rev               = '1.0.0';

// IMAGE NAVIGATION
$lang_nothing_to_show          = "Nog niet gereed! Hier zijn nog geen foto's te bekijken!";

$lang_previous                 = "Vorige";
$lang_next                     = "Volgende";
$lang_no_previous              = "Geen vorige foto";
$lang_no_next                  = "Geen volgende foto";
$lang_latest									 = "Laatste";
$lang_first										 = "Eerste";
$lang_browse_select_category   = "Kies categorie";
$lang_browse_all               = "Alles";
$lang_permalink                = "Permalink";
$lang_paged_archive						 = "Archief";

// COMMENTS
$lang_message_missing_image   = "Geen foto geselecteerd. Uw reactie werd niet bewaard.";
$lang_message_missing_comment = "Geen commentaar ingevoerd. Uw reactie werd niet bewaard.";
$lang_visit_homepage          = "Bezoek de voorpagina";
$lang_no_comments_yet         = "Nog geen reacties.";
$lang_comment_thank_you       = "Bedankt voor je bezoek en om de tijd te nemen om een reactie te geven op een foto.\nDeze pagina wordt automatisch gerefreshed na 5 seconden";
$lang_comment_redirect        = "Klik hier om terug te keren.";
$lang_comment_redirect_error  = "Fout tijdens het opslaan van de reactie! Klik om terug te keren wanneer u niet automatisch teruggestuurd wordt.";
$lang_comment_page_title      = "Reactie";
$lang_comment_popup           = "Reacties";
$lang_message_banned_comment  = "Uw reactie kan niet bewaard worden! Het bevat &eacute;&eacute;n of meerdere verboden woorden/email/ips.";
$lang_comment_popup_disabled  = "Reacties op deze foto is uitgeschakeld.";
$lang_comment_plural				  = "Reacties";
$lang_comment_single					= "Reactie";

$lang_tags                    = "Label:<br/>";

// EXIF DATA
$lang_exposure              = "Belichting:";
$lang_aperture              = "Diafragma:";
$lang_capture_date          = "Opnamedatum:";
$lang_focal                 = "Brandpuntsafstand:";
$lang_camera_maker          = "Camerafabrikant:";
$lang_camera_model          = "Cameramodel:";
$lang_flash_fired           = "Flitser: Aan:";
$lang_flash_not_fired       = "Flitser: Uit";
$lang_iso                   = "ISO:";

// Category
$lang_category_singular      = "Categorie:";
$lang_category_plural        = "Categorieën:";

// Month and Day
$lang_monday              = "maandag";
$lang_tuesday             = "dinsdag";
$lang_wednesday           = "woensdag";
$lang_thursday            = "donderdag";
$lang_friday              = "vrijdag";
$lang_saturday            = "zaterdag";
$lang_sunday              = "zondag";

$lang_january             = "januari";
$lang_february            = "februari";
$lang_march               = "maart";
$lang_april               = "april";
$lang_may                 = "mei";
$lang_june                = "juni";
$lang_july                = "juli";
$lang_august              = "augustus";
$lang_september           = "september";
$lang_october             = "oktober";
$lang_november            = "november";
$lang_december            = "december";

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
$lang_alt_lang_danish							="Dansk";

// Email Notification

$lang_email_notification_subject = "Nieuwe Reactie";
$lang_email_notification_pt1 = "
	  Hallo,<br>
      Er is een nieuwe reactie geplaatst op uw photoblog.<br><br>
	  ";
$lang_email_notification_pt2 = "
      <br>
      De inhoud van de reactie is: <br>
      ----------------------------------------------------------------------<br>
	  ";
$lang_email_notification_pt3 = "door";
$lang_email_notification_pt4 = "
            ----------------------------------------------------------------------    <br>
      Email verstuurd door pixelpost<br>
";
$lang_email_notificationplain_pt1 = "
	  Hallo,<br>
      Er is een nieuwe reactie geplaatst op uw photoblog.";
$lang_email_notificationplain_pt2 = "
      De inhoud van de reactie is:
      ----------------------------------------------------------------------";
$lang_email_notificationplain_pt3 = "door";
$lang_email_notificationplain_pt4 = "
      ----------------------------------------------------------------------
      Email verstuurd door pixelpost
";

$lang_spamflood										= "Reactie flood beveiliging staat aan. U moet <TIME_TO_WAIT> minuten wachten voordat u een nieuwe reactie kunt plaatsen.";

// RSS & ATOM Feed
$lang_comment_feed_title        = "Laatste reacties op";
$lang_comment_feed_image_title  = "Laatste reactie op";
?>