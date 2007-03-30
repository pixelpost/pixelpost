<?php
/*

lang-french.php
===============
Pixelpost version 1.6

SVN file version:
$Id$

Language file: French
Translated by Philippe Durand <http://www.photofloue.net>

Version 1.5:
Development Team:
Ramin Mehran, Connie Mueller-Goedecke, Will Duncan, Joseph Spurling, Piotr "GeoS" Galas
Version 1.1 to Version 1.3: Linus <http://www.shapestyle.se>
Copyright &copy; 2006 Pixelpost.org <http://www.pixelpost.org>

Pixelpost www:       http://www.pixelpost.org/
Pixelpost wiki:     http://wiki.pixelpost.org/
Pixelpost forum:    http://forum.pixelpost.org

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

Une partie du texte affiche par le site depend du modele (template) utilise.
Il vous faut choisir un modele en francais propose sur le site de Pixelpost,
ou construire votre propre modele en modifiant un modele existant.
Vous pouvez modifier ce fichier si les termes proposes ne vous conviennent pas.


/* Dont edit                      ||       Edit                                    */

$_lang_file_translator        = 'Philippe Durand - <a href="http:///www.photofloue.net/" target="_blank">www.photofloue.net</a>';
$_lang_file_email             = 'thecrew@pixelpost.org';
$_lang_file_rev               = '1.5';

// IMAGE NAVIGATION
$lang_previous                     = "Pr&eacute;c&eacute;dente";
$lang_next                         = "Suivante";
$lang_no_previous                  = "Pas d'image pr&eacute;c&eacute;dente";
$lang_no_next                      = "Pas d'image suivante";
$lang_latest									 		 = "Last";
$lang_first										 		 = "First";
$lang_browse_select_category       = "S&eacute;lectionnez un mot-cl&eacute;";
$lang_browse_all                   = "Toutes";
$lang_permalink                    = "Permalien";
$lang_paged_archive								 = "Archive";

// COMMENTS
$lang_message_missing_image        = "Pas d'image s&eacute;lectionn&eacute;e. Commentaire non sauvegard&eacute;.";
$lang_message_missing_comment      = "Pas de message. Commentaire non sauvegard&eacute;.";
$lang_message_missing_name         = "Pas de nom. Commentaire non sauvegard&eacute;.";
$lang_message_moderating_comment   = "Merci de votre commentaire. Il sera publi&eacute; apres v&eacute;rification par l'administrateur du photoblog (pour &eacute;viter le spam).";
$lang_visit_homepage               = "Voir la page d'accueil";
$lang_no_comments_yet              = "Pas de commentaire.";
$lang_comment_thank_you            = "Merci de votre visite et d'avoir pris le temps de laisser un commentaire.";
$lang_comment_redirect             = "Cliquez pour revenir.";
$lang_comment_redirect_error       = "Il y a eu un probl&egrave;me en envoyant votre commentaire. Cliquez ici pour revenir si cela ne se fait pas automatiquement.";
$lang_comment_page_title           = "Commentaire";
$lang_comment_popup                = "Commentaires";
$lang_message_banned_comment       = "Votre commentaire n'a pas pu &ecirc;tre enregistr&eacute; ! Il contient au moins un mot, adresse mail ou IP sur la liste des interdits.";
$lang_comment_popup_disabled       = "Commenting on this picture has been disabled";
$lang_comment_plural						 = "Comments";
$lang_comment_single						 = "Comment";
$lang_tags                         = "Tags:<br/>";

// EXIF DATA
$lang_exposure                     = "Exposition :";
$lang_aperture                     = "Ouverture :";
$lang_capture_date                 = "Date de prise de vue :";
$lang_focal                        = "Focale :";
$lang_camera_maker                 = "Marque :";
$lang_camera_model                 = "Mod&egrave;le :";
$lang_flash_fired                  = "Avec flash";
$lang_flash_not_fired              = "Sans flash";
$lang_iso                          = "ISO :";

// Category
$lang_category_singular            = "mot-cl&eacute; :";
$lang_category_plural              = "mots-cl&eacute;s :";

// Month and Day
$lang_monday                       = "lundi";
$lang_tuesday                      = "mardi";
$lang_wednesday                    = "mercredi";
$lang_thursday                     = "jeudi";
$lang_friday                       = "vendredi";
$lang_saturday                     = "samedi";
$lang_sunday                       = "dimanche";

$lang_january                      = "janvier";
$lang_february                     = "f&eacute;vrier";
$lang_march                        = "mars";
$lang_april                        = "avril";
$lang_may                          = "mai";
$lang_june                         = "juin";
$lang_july                         = "juillet";
$lang_august                       = "ao&ucirc;t";
$lang_september                    = "septembre";
$lang_october                      = "octobre";
$lang_november                     = "novembre";
$lang_december                     = "d&eacute;cembre";

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

// Email Notifications

$lang_email_notification_subject   = "Nouveau commentaire";
$lang_email_notification_pt1       = "Bonjour,\n<br />Un nouveau commentaire est arriv&eacute; sur votre photoblog.\n<br /><br />\n";
$lang_email_notification_pt2       = "<br />Le commentaire est:<br />\n----------------------------------------------------------------------<br />";
$lang_email_notification_pt3       = "de la part de";
$lang_email_notification_pt4       = "\n----------------------------------------------------------------------<br />\n\nEmail envoy&eacute; par Pixelpost<br />";
$lang_email_notificationplain_pt1  = "Bonjour,\n\Un nouveau commentaire est arrive sur votre photoblog.";
$lang_email_notificationplain_pt2  = "Le commentaire est:\n\n----------------------------------------------------------------------";
$lang_email_notificationplain_pt3  = "de la part de";
$lang_email_notificationplain_pt4  = "\n ----------------------------------------------------------------------\n\nEmail envoye par Pixelpost";

// Error Message
$lang_nothing_to_show             = "Revenez bient&ocirc;t, il n'y a pas encore d'image ici !";
$lang_spamflood										= "Comment flood protection is enabled. You need to wait <TIME_TO_WAIT> minutes before posting another comment.";

// RSS & ATOM Feed
$lang_comment_feed_title        = "Newest comments on";
$lang_comment_feed_image_title  = "New comment on";

// end of french language file
?>