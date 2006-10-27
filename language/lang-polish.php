<?php
/*

lang-polish.php
===============
Pixelpost version 1.5

SVN file version:
$Rev: 24 $
$LastChangedBy: Administrator $
$LastChangedDate: 2006-07-24 02:24:39 +0200 (Pn, 24 lip 2006) $

Language file: polish (PL)
Author:  Piotr "GeoS" Galas
Contact: geos@pixelpost.org
WWW: http://blog.piotrgalas.com/

Version 1.5:
Development Team:
Ramin Mehran, Connie Mueller-Goedecke, Will Duncan, Joseph Spurling, Piotr Galas aka GeoS
Version 1.1 to Version 1.3: Linus <http://www.shapestyle.se>

Copyright © 2006 Pixelpost.org <http://www.pixelpost.org>

Pixelpost www:  	http://www.pixelpost.org/
Pixelpost wiki: 	    http://wiki.pixelpost.org/ 
Pixelpost forum: 	http://forum.pixelpost.org

Please check that the file "admin-lang-polish.php" is uploaded to the
language-directory as well!
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

Dont edit                     ||      Edit                          */

// IMAGE NAVIGATION
$lang_previous								= "Poprzedni";
$lang_next										= "Następny";
$lang_no_previous							= "Brak poprzedniego obrazka";
$lang_no_next									= "Brak następnego obrazka";
$lang_browse_select_category	= "Wybierz kategorię";
$lang_browse_all							= "Wszystkie";
$lang_permalink								= "Permalink";

// COMMENTS
$lang_message_missing_image		= "Nie wybrano obrazka. Komentarz nie został zapisany.";
$lang_message_missing_comment	= "Nie wpisano treści. Komentarz nie został zapisany.";
$lang_message_missing_name    = "Nie wpisano nazwy. Komentarz nie został zapisany.";
$lang_message_moderating_comment = "Komentarz został zapisany! Zostanie opublikowany po zaakceptowaniu go przez administratora photobloga.";
$lang_visit_homepage					= "Odwiedź stronę domową";
$lang_no_comments_yet					= "Brak komentarzy.";
$lang_comment_thank_you				= "Dziękuję za odwiedziny i poświęcenie czasu na dodanie komentarza.";
$lang_comment_redirect				= "Kliknij, aby przenieść się spowrotem.";
$lang_comment_redirect_error	= "Wystąpił błąd dodawania komentarza! Kliknij, aby przenieść się spowrotem.";
$lang_comment_page_title			= "Komentarz";
$lang_comment_popup						= "Komentarze";
$lang_message_banned_comment     = "Komentarz nie został zapisany! Zawiera on jedno lub więcej zabronionych słów/emaili/IP.";

// EXIF DATA
$lang_exposure              = "Ekspozycja:";
$lang_aperture              = "Przesłona:";
$lang_capture_date          = "Data wykonania:";
$lang_focal                 = "Ogniskowa:";
$lang_camera_maker          = "Producent aparatu:";
$lang_camera_model          = "Model aparatu:";
$lang_flash_fired           = "Flash: Wyzwolony";
$lang_flash_not_fired       = "Flash: Niewyzwolony";
$lang_iso										= "ISO:";

// Category
$lang_category_singular	   = "Kategoria:";
$lang_category_plural      = "Kategorie:";

// Month and Day
$lang_monday              = "poniedziałek";
$lang_tuesday             = "wtorek";
$lang_wednesday           = "środa";
$lang_thursday            = "czwartek";
$lang_friday              = "piątek";
$lang_saturday            = "sobota";
$lang_sunday              = "niedziela";

$lang_january             = "styczeń";
$lang_february            = "luty";
$lang_march               = "marzec";
$lang_april               = "kwiecień";
$lang_may                 = "maj";
$lang_june                = "czerwiec";
$lang_july                = "lipiec";
$lang_august              = "sierpień";
$lang_september           = "wrzesień";
$lang_october             = "październik";
$lang_november            = "listopad";
$lang_december            = "grudzień";

// Email Notification

$lang_email_notification_subject = "Nowy komentarz";
$lang_email_notification_pt1 = "
	  Witaj,<br>
      Na Twoim photoblogu został dodany nowy komentarz.<br><br>
	  ";	  
$lang_email_notification_pt2 = "
      <br>
      Treść komentarza: <br>
      ----------------------------------------------------------------------<br>
	  ";	  
$lang_email_notification_pt3 = "przez";  
$lang_email_notification_pt4 = "	  
            ----------------------------------------------------------------------    <br>
      Email wysłany przez pixelposta<br>
";
$lang_email_notificationplain_pt1 = "
	  Witaj,
      Na Twoim photoblogu został dodany nowy komentarz.";	  
$lang_email_notificationplain_pt2 = "
      Treść komentarza:
      ----------------------------------------------------------------------";	  
$lang_email_notificationplain_pt3 = "przez";	  
$lang_email_notificationplain_pt4 = "	  
      ----------------------------------------------------------------------
      Email wysłany przez pixelposta
";

// Error Message 
$lang_nothing_to_show             = "Już niebawem! Obecnie jeszcze nie ma czego oglądać!";
?>