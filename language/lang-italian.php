<?php
/*

lang-italian.php
================
Pixelpost version 1.7

SVN file version:
$Id$

Language file: italian (I)
Author:  Cristiano Gazzi (kroom)
WWW: http://www.roomk.it

Version 1.5:
Development Team:
Ramin Mehran, Will Duncan, Joseph Spurling, Piotr "GeoS" Galas
Version 1.1 to Version 1.3: Linus <http://www.shapestyle.se>
Copyright  2006 Pixelpost.org <http://www.pixelpost.org>

Pixelpost www:  	http://www.pixelpost.org/
Pixelpost wiki: 	http://wiki.pixelpost.org/
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

If you want to have the admin section in italian language as well,
take care the the file admin-lang-italian.php exists in your language folder!
___________________________________________________________________________


BEGIN OF LANGUAGE VARIABLES:

Dont edit                     ||       Edit                                    */

$_lang_file_translator        = 'Cristiano Gazzi (kroom) - <a href="http://www.roomk.it/" target="_blank">www.roomk.it</a>';
$_lang_file_email             = 'thecrew@pixelpost.org';
$_lang_file_rev               = '1.0.0';

// IMAGE NAVIGATION
$lang_previous                = "Precedente";
$lang_next                    = "Successiva";
$lang_no_previous             = "Nessuna Immagine Precedente";
$lang_no_next                 = "Nessuna Immagine Successiva";
$lang_latest									 = "Last";
$lang_first										 = "First";
$lang_browse_select_category  = "Seleziona Categoria";
$lang_browse_all              = "Tutte";
$lang_permalink               = "Permalink";
$lang_paged_archive						= "Archive";

// COMMENTS
$lang_message_missing_image   = "Nessuna immagine selezionata. Il commento non &egrave; stato salvato.";
$lang_message_missing_comment = "Nessun messaggio inserito. Il commento non &egrave; stato salvato.";
$lang_visit_homepage          = "Visita la Homepage";
$lang_no_comments_yet         = "Nessun commento, per ora.";
$lang_comment_thank_you       = "Grazie per la visita e per il tempo dedicato a commentare l'immagine.\nSarete reindirizzati in 5 secondi.";
$lang_comment_redirect        = "Fare click qui per tornare indietro.";
$lang_comment_redirect_error  = "Errore nell&prime;invio del commento! Fare click per tornare indietro, se il reindirizzamento automatico non funziona.";
$lang_comment_page_title      = "Commento";
$lang_comment_popup           = "Commenti";
$lang_message_banned_comment  = "Il vostro commento non &egrave; stato accettato! Contiene una o pi&ugrave; parole/email/ip vietati.";
$lang_comment_popup_disabled  = "Commenting on this picture has been disabled";
$lang_comment_plural						 = "Comments";
$lang_comment_single						 = "Comment";
$lang_tags                    = "Tags:<br/>";

// EXIF DATA
$lang_exposure              = "Esposizione:";
$lang_aperture              = "Apertura:";
$lang_capture_date          = "Data Scatto:";
$lang_focal                 = "Focale:";
$lang_camera_maker          = "Marca:";
$lang_camera_model          = "Modello:";
$lang_flash_fired           = "Flash: Utilizzato";
$lang_flash_not_fired       = "Flash: Non Utilizzato";
$lang_flash_not_detected         = "Flash: Not Detected";
$lang_iso                   = "ISO:";

// Category
$lang_category_singular    = "Categoria:";
$lang_category_plural      = "Categorie:";

// Month and Day

$lang_monday              = "Luned&igrave;";
$lang_tuesday             = "Marted&igrave;";
$lang_wednesday           = "Mercoled&igrave;";
$lang_thursday            = "Gioved&igrave;";
$lang_friday              = "Venerd&igrave;";
$lang_saturday            = "Sabato";
$lang_sunday              = "Domenica";

$lang_january             = "Gennaio";
$lang_february            = "Febbraio";
$lang_march               = "Marzo";
$lang_april               = "Aprile";
$lang_may                 = "Maggio";
$lang_june                = "Giugno";
$lang_july                = "Luglio";
$lang_august              = "Agosto";
$lang_september           = "Settembre";
$lang_october             = "Ottobre";
$lang_november            = "Novembre";
$lang_december            = "Dicembre";

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

$lang_email_notification_subject = "Nuovo Commento";
$lang_email_notification_pt1 = "Ciao,<br />Il tuo photoblog ha ricevuto un nuovo commento.<br /><br />";
$lang_email_notification_pt2 = "<br />Il commento &egrave;: <br />\n----------------------------------------------------------------------<br />";
$lang_email_notification_pt3 = "da";
$lang_email_notification_pt4 = "----------------------------------------------------------------------    <br />
                               Email inviata da Pixelpost<br />";
$lang_email_notificationplain_pt1 = "Ciao,\nIl tuo photoblog ha ricevuto un nuovo commento.";
$lang_email_notificationplain_pt2 = "\n\nIl commento &egrave;:\n\n----------------------------------------------------------------------";
$lang_email_notificationplain_pt3 = "da";
$lang_email_notificationplain_pt4 = "\n\n----------------------------------------------------------------------\n\nEmail inviata da Pixelpost";

// Error Message
$lang_nothing_to_show             = "Presto online! Niente da mostrare. Nessuna immagine qu&igrave; or they are set to show in future!";
// Please do not translate any tags like this one: <TIME_TO_WAIT>
$lang_spamflood										= "Comment flood protection is enabled. You need to wait <TIME_TO_WAIT> before posting another comment.";


// RSS & ATOM Feed
$lang_comment_feed_title        = "Newest comments on";
$lang_comment_feed_image_title  = "New comment on";

// End of language file
?>