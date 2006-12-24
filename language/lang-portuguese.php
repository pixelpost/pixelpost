<?php
/*

lang-portuguese.php
=========================
Pixelpost version 1.6

SVN file version:
$Id$

Language file: Portugues (P)

Version 1.5:
Development Team:
Ramin Mehran, Connie Mueller-Goedecke, Will Duncan, Joseph Spurling, Piotr "GeoS" Galas
Version 1.1 to Version 1.3: Linus <http://www.shapestyle.se>
Copyright  2006 Pixelpost.org <http://www.pixelpost.org>

Pixelpost www:  	http://www.pixelpost.org/
Pixelpost wiki: 	    http://wiki.pixelpost.org/
Pixelpost forum: 	http://forum.pixelpost.org

Info: if you want to have the admin-section in portuguese language as well,
      do the following:
      - open the directory "language" in your file-manager
      - copy the file "admin-lang-english.php" as "admin-lang-portuguese.php"
      - translate all variables into portuguese
      - upload the file "admin-lang-portuguese.php" to your server
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

Dont edit                      ||       Edit                                    */

// IMAGE NAVIGATION
$lang_previous                 = "Anterior";
$lang_next                     = "Seguinte";
$lang_no_previous              = "Sem Imagem Anterior";
$lang_no_next                  = "Sem Imagem Seguinte";
$lang_browse_select_category   = "Seleccionar Categoria";
$lang_browse_all               = "Todas";
$lang_permalink                = "Permalink";
$lang_paged_archive						= "Archive";

// COMMENTS
$lang_message_missing_image    = "Nenhuma imagem seleccionada. O coment&aacute;rio n&atilde;o foi registado.";
$lang_message_missing_comment  = "Nenhuma mensagem. O coment&aacute;rio n&atilde;o foi registado.";
$lang_visit_homepage           = "Visitar P&aacute;gina Inicial";
$lang_no_comments_yet          = "Sem coment&aacute;rios";
$lang_comment_thank_you        = "Obrigado por comentar esta fotografia.\nVoc&ecirc; ser&aacute; dirigido de novo em 5 segundos.";
$lang_comment_redirect         = "Por favor, carregue para voltar atr&aacute;s.";
$lang_comment_redirect_error   = "Erro do submition do coment&aacute;rio! Estale por favor para ser transferido para tr&aacute;s, se o redirection n&atilde;o trabalhar";
$lang_comment_page_title       = "Coment&aacute;rio";
$lang_comment_popup            = "Coment&aacute;rios";
$lang_message_banned_comment   = "Seu coment&aacute;rio n&atilde;o &eacute; conservado! Contem aquele ou mais palavras/email/ips proibidas.";
$lang_comment_popup_disabled   = "Commenting on this picture has been disabled";
$lang_tags\1= "Tags:<br/>";                     = "Tags:<br/>";

// EXIF DATA
$lang_exposure                 = "Exposi&ccedil;&atilde;o:";
$lang_aperture                 = "Abertura:";
$lang_capture_date             = "Data da captura:";
$lang_focal                    = "Focagem:";
$lang_camera_maker             = "Marca da c&acirc;mara:";
$lang_camera_model             = "Modelo da c&acirc;mara:";
$lang_flash_fired              = "Flash: Disparado";
$lang_flash_not_fired          = "Flash: N&atilde;o Disparado";
$lang_iso                      = "ISO:";

// Category
$lang_category_singular    = "Category:";
$lang_category_plural      = "Categories:";


// Month and Day
$lang_monday              = "Segunda-feira";
$lang_tuesday             = "Ter&ccedil;a-feira";
$lang_wednesday           = "Quarta-feira";
$lang_thursday            = "Quinta-feira";
$lang_friday              = "Sexta-feira";
$lang_saturday            = "S&aacute;bado";
$lang_sunday              = "Domingo";

$lang_january             = "Janeiro";
$lang_february            = "Fevereiro";
$lang_march               = "Mar&ccedil;o";
$lang_april               = "Abril";
$lang_may                 = "Maio";
$lang_june                = "Junho";
$lang_july                = "Julho";
$lang_august              = "Agosto";
$lang_september           = "Setembro";
$lang_october             = "Outubro";
$lang_november            = "Novembro";
$lang_december            = "Dezembro";

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