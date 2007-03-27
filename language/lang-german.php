<?php
/*

lang-german.php
===============
Pixelpost version 1.6

SVN file version:
$Id$

Language file: german (D)
Author:  Connie Mller-Gdecke
Contact: connie@Pixelpost.org
WWW: http:www.zweiterblick.de + http://www.avantart.com

Version 1.5:
Development Team:
Ramin Mehran, Connie Mueller-Goedecke, Will Duncan, Joseph Spurling, Piotr "GeoS" Galas
Version 1.1 to Version 1.3: Linus <http://www.shapestyle.se>

Copyright  2006 Pixelpost.org <http://www.pixelpost.org>

Pixelpost www:  	http://www.pixelpost.org/
Pixelpost wiki: 	http://wiki.pixelpost.org/
Pixelpost forum: 	http://forum.pixelpost.org

Achtung:
========
Zu dieser Datei gehrt die Datei "admin-lang-german.php", die ebenfalls
in das Sprachverzeichnis geladen werden muss!
Fehlt sie dort, wird automatisch die englischsprachige Admin-Oberflche
aktiviert!

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

Die SPRACHDATEI-VARIABLEN:

Linke Seite: Nichts aendern!      ||    rechte Seite: aendern, wenn gewuenscht */

$_lang_file_translator        = 'Connie Mller-Gdecke - <a href="http://www.zweiterblick.de/" target="_blank">www.zweiterblick.de</a>';
$_lang_file_email             = 'connie@pixelpost.org';
$_lang_file_rev               = '1.6';

// IMAGE NAVIGATION
$lang_previous                    = "zur&uuml;ck";
$lang_next                        = "weiter";
$lang_no_previous                 = "keine weiteren Bilder";
$lang_no_next                     = "keine neueren Bilder";
$lang_latest									 = "Last";
$lang_first										 = "First";
$lang_browse_select_category      = "Kategorie w&auml;hlen";
$lang_browse_all                  = "alle";
$lang_permalink			          = "Permalink";
$lang_paged_archive						= "Archive";

// COMMENTS
$lang_message_missing_image    = "Kein Bild ausgew&auml;hlt. Der Kommentar wurde nicht gespeichert.";
$lang_message_missing_comment  = "Kein Text eingegeben. Der Kommentar wurde nicht gespeichert.";
$lang_visit_homepage           = "Zur Startseite";
$lang_no_comments_yet          = "Noch keine Kommentare.";
$lang_message_moderating_comment = "Ihr Kommentar wurde gespeichert! Nach der Freigabe wird er auf der Seite angezeigt werden.";
$lang_comment_thank_you        = "Danke dass Sie sich Zeit f&uuml;r einen Kommentar genommen haben.<br>\n\nSie werden nach 5 Sekunden zur&uuml;ckgeleitet.";
$lang_comment_redirect         = "Klicken Sie hier um zur&uuml;ckzukehren";
$lang_comment_redirect_error   = "Kommentar konnte nicht eingetragen werden. Klicken Sie hier, um zur&uuml;ck zur Eingabe zu kommen, falls die automatische Umleitung nicht funktioniert.";
$lang_comment_page_title       = "Kommentar";
$lang_comment_popup            = "Kommentare";
$lang_message_banned_comment   = "Ihr Kommentar wurde nicht gespeichert, da er Worte, Email-Adressen oder IP-Adressen enth&auml;lt, die in Ban-Listen vorkommen.";
$lang_comment_popup_disabled   = "Commenting on this picture has been disabled";
$lang_comment_plural						 = "Comments";
$lang_comment_single						 = "Comment";
$lang_tags                     = "Tags:<br/>";

// EXIF DATA
$lang_exposure              = "Verschlusszeit:";
$lang_aperture              = "Blende:";
$lang_capture_date          = "Aufnahmedatum:";
$lang_focal                 = "Fokus:";
$lang_camera_maker          = "Hersteller:";
$lang_camera_model          = "Kamera-Modell:";
$lang_flash_fired           = "Blitz:";
$lang_flash_not_fired       = "Kein Blitz";
$lang_iso		            = "ISO:";

// Category
$lang_category_singular	   = "Kategorie:";
$lang_category_plural      = "Kategorien:";


// Month and Day
$lang_monday              = "Montag";
$lang_tuesday             = "Dienstag";
$lang_wednesday           = "Mittwoch";
$lang_thursday            = "Donnerstag";
$lang_friday              = "Freitag";
$lang_saturday            = "Samstag";
$lang_sunday              = "Sonntag";

$lang_january             = "Januar";
$lang_february            = "Februar";
$lang_march               = "M&auml;rz";
$lang_april               = "April";
$lang_may                 = "Mai";
$lang_june                = "Juni";
$lang_july                = "Juli";
$lang_august              = "August";
$lang_september           = "September";
$lang_october             = "Oktober";
$lang_november            = "November";
$lang_december            = "Dezember";

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
$lang_alt_lang_danish						="Dansk";

// Email Notification

$lang_email_notification_subject = "Neuer Kommentar";
$lang_email_notification_pt1 = "Hallo,<br>ein neuer Kommentar wurde in Ihrem Photoblog eingetragen.<br><br>";
$lang_email_notification_pt2 = "<br>Kommentartext<br>----------------------------------------------------------------------<br>";
$lang_email_notification_pt3 = "abgegeben von";
$lang_email_notification_pt4 = "----------------------------------------------------------------------<br>diese Mail wurde von Pixelpost automatisch versandt<br>";

// Benachrichtigungstext in reinem Textformat:
// Damit der Text richtig umbrochen wird, ist es notwendig, ab und an einen Zeilenumbruch
// einzubinden. Dazu wird "\n" genutzt.
// Achten Sie bitte darauf, diese Sonderzeichen beizubehalten

$lang_email_notificationplain_pt1 = "Hallo,\n\nein neuer Kommentar wurde in Ihrem Photoblog zu diesem Eintrag abgegeben";
$lang_email_notificationplain_pt2 = "Kommentartext:";
$lang_email_notificationplain_pt3 = "abgegeben von";
$lang_email_notificationplain_pt4 = "---------------------------------------------------------------------- \n\ndies ist eine von Pixelpost automatisch erstellte Benachrichtigung";

// Error Message
$lang_nothing_to_show             = "Das Photoblog enth&auml;lt noch keine Bilder. Erst am Anfang! Kommen Sie sp&auml;ter nochmal vorbei!";
$lang_spamflood										= "Comment flood protection is enabled. You need to wait longer before posting another comment.";

// Ende der Sprachdatei
?>