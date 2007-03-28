<?php
/*

lang-spanish.php
================
Pixelpost version 1.6

SVN file version:
$Id$

Language file: spanish (E)
Translation: Sebastian Yepes
www: http://photoblog.x123.info

Version 1.5:
Development Team:
Ramin Mehran, Connie Mueller-Goedecke, Will Duncan, Joseph Spurling, Piotr "GeoS" Galas
Version 1.1 to Version 1.3: Linus <http://www.shapestyle.se>
Copyright &copy; 2006 Pixelpost.org <http://www.pixelpost.org>

Pixelpost www:  	http://www.pixelpost.org/
Pixelpost wiki: 	http://wiki.pixelpost.org/
Pixelpost forum: 	http://forum.pixelpost.org

Info: if you want to have the admin-section in spanish language as well,
      do the following:
      - open the directory "language" in your file-manager
      - copy the file "admin-lang-english.php" as "admin-lang-spanish.php"
      - translate all variables into spanish
      - upload the file "admin-lang-spanish.php" to your server
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
___________________________________________________________________________

BEGIN OF LANGUAGE VARIABLES:

Dont edit                                ||       Edit                                    */

$_lang_file_translator        = 'The PixelPost Crew';
$_lang_file_email             = 'thecrew@pixelpost.org';
$_lang_file_rev               = '1.0.0';

// IMAGE NAVIGATION
$lang_previous                  = "Anterior";
$lang_next                      = "Siguiente";
$lang_no_previous               = "No hay Anterior";
$lang_no_next                   = "No hay Siguiente";
$lang_latest									 = "Last";
$lang_first										 = "First";
$lang_browse_select_category    = "Seleccione una Categor&iacute;a";
$lang_browse_all                = "Todas";
$lang_permalink                 = "Permalink";
$lang_paged_archive						= "Archive";

// COMMENTS
$lang_message_missing_image     = "Ninguna imagen seleccionada. Opini&oacute;n no guardada.";
$lang_message_missing_comment   = "No hay mensaje. Opini&oacute;n no guardada.";
$lang_visit_homepage            = "Visite La Pagina Web";
$lang_no_comments_yet           = "No hay Opiniones aun.";
$lang_comment_thank_you         = "Gracias por visitar y dar tu opini&oacute;n sobre esta fotograf&iacute;a.\nLe volver&aacute;n a dirigir en 5 segundos.";
$lang_comment_redirect          = "Has click para ir hacia tras.";
$lang_comment_redirect_error    = "&iexcl;Error del submition del comentario! Chasque por favor para ser transferido detr&aacute;s, si el cambio de direcci&oacute;n no trabaja";
$lang_comment_page_title        = "Opini&oacute;n";
$lang_comment_popup             = "Opiniones";
$lang_message_banned_comment    = "&iexcl;Su comentario no se ahorra! Contiene unas o m&aacute;s palabras/email/ips prohibidas.";
$lang_comment_popup_disabled    = "Commenting on this picture has been disabled";
$lang_comment_plural						 = "Comments";
$lang_comment_single						 = "Comment";
$lang_tags                      = "Tags:<br/>";

// EXIF DATA
$lang_exposure                  = "Exposici&oacute;n:";
$lang_aperture                  = "Apertura:";
$lang_capture_date              = "Capture Date:";
$lang_focal                     = "Focal:";
$lang_camera_maker              = "Fabricante:";
$lang_camera_model              = "Modelo:";
$lang_flash_fired               = "Flash: Activo";
$lang_flash_not_fired           = "Flash: No Activo";
$lang_iso                       = "ISO:";

// Category
$lang_category_singular          = "Categor&iacute;a:";
$lang_category_plural            = "Categor&iacute;as:";

// Month and Day
$lang_monday                    = "Lunes";
$lang_tuesday                   = "Martes";
$lang_wednesday                 = "Mi&eacute;rcoles";
$lang_thursday                  = "Jueves";
$lang_friday                    = "Viernes";
$lang_saturday                  = "S&aacute;bado";
$lang_sunday                    = "Domingo";

$lang_january                   = "Enero";
$lang_february                  = "Febrero";
$lang_march                     = "Marzo";
$lang_april                     = "Abril";
$lang_may                       = "Mayo";
$lang_june                      = "Junio";
$lang_july                      = "Julio";
$lang_august                    = "Agosto";
$lang_september                 = "Septiembre";
$lang_october                   = "Octubre";
$lang_november                  = "Noviembre";
$lang_december                  = "Diciembre";

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
$lang_spamflood										= "Comment flood protection is enabled. You need to wait <TIME_TO_WAIT> minutes before posting another comment.";
?>