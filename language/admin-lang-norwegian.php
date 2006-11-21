<?php
/*

admin-lang-norwegian.php : norwegian language file for PixelPost-Admin-Section
===================================================================================
Pixelpost version 1.5

SVN file version:
$Id$

Language file: norwegian (NO)
Author:  John Christian Olsen
Contact: me@jcolsen.com
WWW: http://jcolsen.com

Version 1.5:
Development Team:
Ramin Mehran, Connie Mueller-Goedecke, Will Duncan, Joseph Spurling, GeoS
Version 1.1 to Version 1.3: Linus <http://www.shapestyle.se>

Copyright © 2006 Pixelpost.org <http://www.pixelpost.org>

Pixelpost www:  	http://www.pixelpost.org/
Pixelpost wiki: 	    http://wiki.pixelpost.org/ 
Pixelpost forum: 	http://forum.pixelpost.org

______________________________________________________________________________

ADMIN PANEL LANGUAGE VARIABLES:

Dont edit                    ||      Edit                                   */

$admin_lang_isrtl              = "no"; // yes for right-to-left languages and no for left-to-right languages
$admin_lang_update            = "Oppdater";
$admin_lang_reload            = "<br /> Du m&aring; kanskje refreshe din nettleser for &aring; se forandringene.";
$admin_lang_error             = "Feil";
$admin_lang_post              = "innlegg";
$admin_lang_page              = "side";
$admin_lang_of                = "av";
$admin_lang_next              = "Neste";
$admin_lang_prev              = "Forrige";
$admin_lang_show              = "Vis";
$admin_lang_go                = "G&aring;!";
$admin_lang_done              = "Ferdig:";


// Admin Start
$admin_start_1                = "Ingen <b>spr&aring;k</b> mappe eksisterer eller filen";
$admin_start_2                = "mangler i mappen.<br />Forsikre deg om at du har lastet opp alle n&oslash;dvendige filer med det eksakte samme navnet som nevnt her.";
$admin_start_userpw           = "Brukernavn eller passord er feil.";
$admin_start_pw_forgot        = "Glemt passord?";
$admin_start_browser_title    = "ADMIN";
$admin_start_welcome          = "Velkommen til Pixelpost Admin panel - Vennligst logg inn.";
$admin_start_pp_name          = "Link til din PixelPost side:";
$admin_start_pp_tit           = "klikk her for &aring; laste din photoblog";
$admin_start_cookie           = "Login setter en cookie";
$admin_start_username         = "Brukernavn";
$admin_start_pw               = "Passord";
$admin_start_pw_button        = "Send meg mitt nye passord";
$admin_start_pw_recover       = "Det er ikke mulig &aring; hente ditt gamle passord, men Pixelpost kan
                                 lage ett nytt tilfeldig passord for deg.\nVennligst skriv inn epost adressen du har registret i administrasjons panelet, 
                                 s&aring; sendes det nye passordet &oslash;yeblikkelig til deg.";
$admin_start_email            = "Epost Adresse:";
$admin_start_email_button     = "Skriv inn din epost adresse";
$admin_start_admin_1          = "Administration";
$admin_start_admin_2          = "for";


// Password Recovery
$admin_lang_pw_title            = "Pixelpost Password Recovery";
$admin_lang_pw_wronguser	= "Der eingegebene Username ist nicht der Username des Pixelpost-Administrators.";
$admin_lang_pw_back             =  "Zur&uuml;ck zur Verwaltungs-Seite";
$admin_lang_pw_noemail          = "Sie haben noch keine email-Adresse eingegeben! Ein neues Passwort kann Ihnen nicht zugesandt werden! \n<br />
				   Wenn Sie sich gar nicht mehr an Ihr Passwort erinnern k&ouml;nnen und nicht weiterkommen, schreiben Sie eine Nachricht im <a href='http://www.pixelpost.org/forum'>Pixelpost Forum</a> 
				   for help.\n<br />";
$admin_lang_pw_notsent          = "Nichts gesendet! \n<br /> Die eingegebene email-Adresse entspricht nicht der eMail-Adresse, die Sie im Verwaltungssystem eingetragen haben!<br />";
$admin_lang_pw_subject		= "Pixelpost Passwort: Neues Passwort wurde angelegt";
$admin_lang_pw_usertext		= "Ihr User-Name:"; 
$admin_lang_pw_mailtext		= "Ihre email-Adresse:";
$admin_lang_pw_newpw		= "Ihr neues Passwort:";
$admin_lang_pw_text_1		= "PixelPost Passwort-Wiederherstellung";
$admin_lang_pw_text_2		= "From: PIXELPOST Administration";
$admin_lang_pw_text_3		= "Eine eMail wurde an Ihre email-Adresse geschickt. Diese enthält Ihren User-Namen und ein neues Passwort. \n<br /> 
				   Prüfen Sie Ihren Postkorb:  ";
$admin_lang_pw_text_4 		= "<span style='color:red;'>Fehler! Ein Fehler ist aufgetreten! \n<br />
				   Die email-Adresse und der User-Name, den Sie eingegeben haben, ist ok, aber es konnte keine Mail verschickt werden. \n<br />
                                   Ask your host administrator for help</span>";
$admin_lang_pw_text_5 		= "Database error:";
$admin_lang_pw_text_6		= "<br />Updating the new password failed.";
$admin_lang_pw_text_7           = "Diese Mail wurde automatisch vom Log-In-Bereich Ihres Pixelpost-Photoblogs versandt.\nEs wurde ein neues Passwort für den Verwaltungsbereich angefordert.\n\nSie sollten jetzt Ihren Photoblog aufrufen \n\nauf ";
$admin_lang_pw_text_8           = "\n\nund sich anmelden mit dem neuen Passwort, um das automatisch generierte Passwort sofort zu überschreiben!\n\nDas ist notwendig, zu Ihrer Sicherheit!";




// Admin Menu
$admin_lang_new_image          = "NYTT BILDE";
$admin_lang_images             = "BILDER";
$admin_lang_categories         = "KATEGORIER";
$admin_lang_comments           = "KOMMENTARER";
$admin_lang_options            = "VALG";
$admin_lang_general_info       = "GENERELL INFO";
$admin_lang_addons             = "TILLEGG";
$admin_lang_logout             = "LOGG UT";

// New Image
$admin_lang_ni_post_a_new_image   = "Legg ut ett nytt bilde";
$admin_lang_ni_image              = "Bilde";
$admin_lang_ni_image_title        = "Bilde tittel";
$admin_lang_ni_select_cat         = "Velg kategorier / n&oslash;kkelord";
$admin_lang_ni_description        = "Bilde beskrivelse / tekst";
$admin_lang_ni_datetime           = "Dato og tid for innlegget";
$admin_lang_ni_post_now           = "Legg ut n&aring;";
$admin_lang_ni_post_one_day_after = "Legg ut en dag etter forrige post";
$admin_lang_ni_post_spec_date     = "Legg ut p&aring; en valgfri dato. Vennligst sett dato under:";
$admin_lang_ni_post_entry         = "Legg ut innlegg";
$admin_lang_ni_upload             = "Last Opp";
$admin_lang_ni_upload_error       = "Feil med fil opplastningen!";
$admin_lang_ni_posted             = "LAGT TIL";
$admin_lang_ni_year               = "&Aring;r";
$admin_lang_ni_month              = "M&aring;ned";
$admin_lang_ni_day                = "Dag";
$admin_lang_ni_hour               = "Time";
$admin_lang_ni_min                = "Minutt";
$admin_lang_ni_markdown_text      = "Bruk Markdown eller HTML til &aring; formatere teksten i dette feltet.";
$admin_lang_ni_markdown_hp        = "Markdown hjemmeside";
$admin_lang_ni_markdown_element   = "Grunnleggende";
$admin_lang_ni_markdown_syntax    = "Syntax Referanse";
$admin_lang_ni_missing_data       = "Manglende data<br />\n
                                     Du trenger minimum en bildetittel og ett bilde.\n
                                     Intet bilde ble lastet opp\n
                                      p&aring; grunn av manglende informasjon!";
$admin_lang_ni_crop_nextstep      = "N&aring; b&oslash;r du velge miniatyrbilde utsnittet:";
$admin_lang_ni_crop_background    = "Dette er bakgrunnen av bildet &aring; beskj&aelig;re";
$admin_lang_ni_db_error             =  "en feil oppstod ved overf&oslash;rsel til databasen";
$admin_lang_ni_tags               = "Tags";
$admin_lang_ni_alt_language				= "Provide an image title and description in the alternative language";

// Images
$admin_lang_imgedit_edit           = "Rediger";
$admin_lang_imgedit_title          = "Tittel:";
$admin_lang_imgedit_file_name      = "Filnavn:";
$admin_lang_imgedit_dimensions     = "Dimmensjon:";
$admin_lang_imgedit_tbpublished    = "Publiseres:";
$admin_lang_imgedit_category_plural = "Kategorier:";
$admin_lang_imgedit_delete          = "Slett";
$admin_lang_imgedit_deleted         = "Slett innlegg / Slett bilde / slett thumbnail";
$admin_lang_imgedit_deleted1        = "Innlegg slettet.";
$admin_lang_imgedit_deleted2        = "Bilde slettet.";
$admin_lang_imgedit_delete_error    = "Kunne ikke slette bildefil.\n
                                       Du m&aring; gj&oslash;re det p&aring; en annen m&aring;te, som for eksempel med ditt ftp program.";
$admin_lang_imgedit_deleted3        = "Thumbnail slettet.";
$admin_lang_imgedit_delete_error2   = "Kunne ikke slette miniatyrbilde.\n
                                       Du m&aring; gj&oslash;re det p&aring; en annen m&aring;te, som for eksempel med ditt ftp program.";
$admin_lang_imgedit_reupimg         = "Last Opp Bilde P&aring; Nytt:";
$admin_lang_imgedit_file            = "Fil: ";
$admin_lang_imgedit_file_isuploaded = "er lastet opp p&aring; nytt!";
$admin_lang_imgedit_update          = "Oppdater bilde";
$admin_lang_imgedit_updated         = "Oppdatert bilde";
$admin_lang_imgedit_txt_desc        = "Tekst/beskrivelse:";
$admin_lang_imgedit_dtime           = "Datotid:";
$admin_lang_imgedit_img             = "Bilde:";
$admin_lang_imgedit_fsize           = "Filst&oslash;rrelse:";
$admin_lang_imgedit_12cropimg       = "Beskj&aelig;r Bilde verkt&oslash;y:";
$admin_lang_imgedit_12cropimg_txt   = "For &aring; redigere miniatyrbilde for dette bildet, dra beskj&aelig;ringsvinduet med en mus eller utvid/krymp den med '+'/'-' knappene:";
$admin_lang_imgedit_uthmb_button    = "Oppdater Thumbnail";
$admin_lang_imgedit_u_post_button   = "Oppdater Innlegg";
$admin_lang_imgedit_title1          = "Bilder - Last opp p&aring; nytt, rediger eller slett ett bilde || ";
$admin_lang_imgedit_title2          = " bilder totalt i databasen ||\n<br /> Viser ";
$admin_lang_imgedit_title3          = " innlegg, side ";
$admin_lang_imgedit_title4          = " av ";
$admin_lang_imgedit_12crop_opt      = "<strong>Notat:</strong> 12CropImage valget er ikke valgt for beskj&aelig;ring av miniatyrbilder. Derfor, miniatyrbilder ikke er forandrbare.";
$admin_lang_imgedit_edit_post       = "ENDRE INNLEGG";
$admin_lang_imgedit_img_page        = "bilder per side";
$admin_lang_imgedit_cropbg          = "Dette er bakgrunnstekst for 12cropimage";
$admin_lang_imgedit_js_del_im       = "Er du sikker p&aring; at du vil slette bilde?";
$admin_lang_imgedit_db_error        = "<br />Sjekk om permalink strenger ikke er brukt s&aring; langt!";

// Mass-Edit Categories
$admin_lang_imgedit_mass_1          = "Mengde rediger kategori";
$admin_lang_imgedit_mass_2          = "Tildele";
$admin_lang_imgedit_mass_3          = "Frasi";
$admin_lang_imgedit_mass_4          = "Mengde oppdater";
$admin_lang_imgedit_tags            = $admin_lang_ni_tags;
$admin_lang_imgedit_alt_language  	= "Change the alternative language image title and description";


// Categories
$admin_lang_cats_add_cat            = "Legg til kategori";
$admin_lang_cats_added              = "Kategori lagt til.";
$admin_lang_cats_add_cat_txt        = "Legg til en kategori som du kan tildele dine bilder.";
$admin_lang_cats_edit_cat           = "Rediger kategorier";
$admin_lang_cats_edit_cat_txt       = "Rediger en kategori";
$admin_lang_cats_edit_cat_button    = "Rediger Kategori";
$admin_lang_cats_edit_tip           = "Rediger navnet p&aring; f&oslash;lgende kategori.<br />Alle bilder tilh&oslash;rende det gamle navnet vil tillh&oslash;re det nye navnet du velger.";
$admin_lang_cats_delete_cat         = "Slett Kategorier";
$admin_lang_cats_delete_cat_txt     = "Slett en kategori";
$admin_lang_cats_delete_cat2        = "Sletting:";
$admin_lang_cats_delete_cats_button = "Slett Kategori";
$admin_lang_cats_deleted            = "Kategori slettet.";
$admin_lang_cats_update             = "Oppdater Kategori";
$admin_lang_cats_update_cat_button  = "Oppdater Kategori";
$admin_lang_cats_updated            = "Kategori oppdatert til nytt navn.";

// Comments
$admin_lang_cmnt_commentlist        = "Liste over kommentarer - slett eller rediger som du &oslash;nsker&nbsp;||&nbsp;Viser";
$admin_lang_cmnt_name               = "Navn:";
$admin_lang_cmnt_email              = "Epost:";
$admin_lang_cmnt_comment            = "Kommentar:";
$admin_lang_cmnt_image              = "Bilde";
$admin_lang_cmnt_delete             = "Slett";
$admin_lang_cmnt_deleted            = "Slett en kommentar.";
$admin_lang_cmnt_delete1            = "Slettet";
$admin_lang_cmnt_delete2            = "velg kommentar(er).";
$admin_lang_cmnt_edit               = "Rediger";
$admin_lang_cmnt_edited             = "Kommentar redigert.";
$admin_lang_cmnt_check_all          = "Velg alle";
$admin_lang_cmnt_clear_all          = "Fjern markeringer";
$admin_lang_cmnt_invert_checks      = "Marker omvendt";
$admin_lang_cmnt_del_selected       = "Slett valgte";
$admin_lang_cmnt_page               = "kommentarer per side.";
$admin_lang_cmnt_commenter          = "Kommentar gitt:";
$admin_lang_cmnt_ip                 = "Fra ip:";
$admin_lang_cmnt_save               = "Lagre";
$admin_lang_cmnt_massdelete_text    = "Hakk av alle kommentarer som du vil slette p&aring; en gang";
$admin_lang_cmnt_js_del_comm        = "Er du sikker p&aring; at du vil slette den kommentaren?";
$admin_lang_cmnt_publish_sel        = "Publiser Valgte";
$admin_lang_cmnt_unpublish_sel      = "Legg til i moderasjons k&oslash;";
$admin_lang_cmnt_published          = "Publisert";
$admin_lang_cmnt_unpublished_cmnts  = "tidligere maskert kommentar(er).";
$admin_lang_cmnt_unpublished        = "Maskerte";
$admin_lang_cmnt_published_cmnts    = "tidligere publiserte kommentar(er).";

// New in comment: 
$admin_lang_cmnt_error_blacklist    = "Error in updating the blacklist: ";
$admin_lang_cmnt_error_banlist      = "Error in updating the referer ban list: ";

// Option
$admin_lang_optn_general            = "GENERELT";
$admin_lang_optn_template           = "STILMAL";
$admin_lang_optn_thumbnails         = "MINIATYRBILDER";
$admin_lang_optn_tip                = "Glem ikke tailing slash <b>'/'</b> eks. <i>http://www.pixelpost.org/</i>";

$admin_lang_optn_update             = "Oppdater";
$admin_lang_optn_yes                = "Ja";
$admin_lang_optn_no                 = "Nei";


$admin_lang_optn_title_url         = "SIDENS TITTEL OG URL";
$admin_lang_optn_title             = "Tittel:";
$admin_lang_optn_url               = "URL:";
$admin_lang_optn_usr_pss           = "ADMIN BRUKERNAVN &amp; PASSORD";
$admin_lang_optn_usr_pss_txt       = "Bytt brukernavn eller passord?";
$admin_lang_optn_usr               = "Bruker:";
$admin_lang_optn_pss               = "Passord:";
$admin_lang_optn_pss_re            = "Gjennta Passord:";
$admin_lang_optn_email             = "ADMIN EPOST";
$admin_lang_optn_fillit            = "Fyll ut. P&aring; denne adressen vil du motta glemt passord. Viktig!";
$admin_lang_optn_img_path          = "BILDE STI";
$admin_lang_optn_tz                = "Tidssone";
$admin_lang_optn_tz_txt            = "Velg tidssone avvik for ditt land/by.";
$admin_lang_optn_sendemail         = "SEND EPOST VED NY KOMMENTAR";
$admin_lang_optn_sendemail_txt     = "Sende epost varsel ved ny kommentar?";
$admin_lang_optn_sendemail_html_txt = "bruk HTML varsel epost?";
$admin_lang_optn_comment_moderation = "KOMMENTAR MODERASJON";
$admin_lang_optn_cmnt_mod_txt       = "Vil du moderere kommentarer f&oslash;r publisering?";

$admin_lang_optn_switch_template    = "Bytt stilmal";
$admin_lang_optn_lang_file           = "Velg spr&aring;k";
$admin_lang_optn_dateformat          = "Dato format";
$admin_lang_optn_dateformat_txt      = "Dato formatet for visning av bilder og kommentarer. Denne syntaxen brukt er identisk med PHP <a href='http://www.php.net/date' target='_blank'>dato()</a> funksjonen. Dette er eksempler for hva som vil erstatte noen vanlige paramenterer: Y:&aring;r m:m&aring;ned d:dag H:time i:minutt s:sekund";
$admin_lang_optn_gmt                 = "Vennligst noter at dette ikke st&oslash;tter sommer/vinter tid automatisk og at du m&aring; forandre dette manuelt.<br />Sjekk <a href='http://www.worldtimeserver.com/current_time_in_UTC.aspx' target='__blank'> GMT Current time </a> om du er usikker p&aring; ditt land/bys lokale tids avvik fra GMT.<br />";
$admin_lang_optn_cat_link_format     = "Kategori format linker";
$admin_lang_optn_cat_link_format_txt = "Formatet for visning av linker til kategoriene i stilmalen.";

// NEW!
$admin_lang_optn_catlinkformat_custom  = "Custom category format";
$admin_lang_optn_catlinkformat_custom_start = "Starting string:";
$admin_lang_optn_catlinkformat_custom_end = "Ending string:";

$admin_lang_optn_calendar_type       = "Kalender type";

$admin_lang_optn_thumb_row           = "Miniatyrbilde rader";
$admin_lang_optn_thumb_row_txt       = "Hvor mange miniatyrbilder som vises i de automatisk genererte radene.<br/>Oddetall gir best resultat, eks. 7 eller 9, og ikke 6 eller 8.";
$admin_lang_optn_crop_thumbs         = "Beskj&aelig;r miniatyrbilde?";
$admin_lang_optn_crop_thumbs_txt     = "Hvis du vil at miniatyrbildene skal bli beskj&aelig;rt til eksakt st&oslash;rrelse: velg <b>JA.</b><br/>\n
                                        Hvis du vil beholde det orginale formatet, velg <b>NEI.</b><br/>\n
                                         Hvis du vil beskj&aelig;re miniatyrbilder manuelt etter &aring; ha lastet opp bildene, velg <b>12CropImage.</b>";
$admin_lang_optn_thumb_size          = "Miniatyrbilde st&oslash;rrelse";
$admin_lang_optn_thumb_size_txt      = "Velg miniatrybilde st&oslash;rrelse, Bredde x H&oslash;yde.";
$admin_lang_optn_reg_thumbs_button   = "Generer miniatyrbilder p&aring; nytt";
$admin_lang_optn_regen_thumbs_txt    = "Dette genererer nye miniatyrbilder p&aring; alle bilder i databasen. Du mister alle manuelt besk&aelig;rte miniatyrbilder til fordel for de nye automatisk genererte. Men du kan forandre miniatyrbildene med 12CropImage n&aring;r du redigerer hvert enkelt bilde senere.";
$admin_lang_optn_img_compression     = "Miniatyrbilde kompresjon";
$admin_lang_optn_img_compression_txt = "Hvor mye &oslash;nsker du jpg komprimeringene skal v&aelig;re? 10 er lav kvalitet mens 100 er maks kvalitet (ingen tap)";
$admin_lang_optn_pass_chngd_txt      = "Passordet er forandret.";
$admin_lang_optn_pass_notchngd_txt   = "Passordet er ikke forandret. Skriv inn det samme passordet i gjennta feltet.";
$admin_lang_optn_title_url_text      = "Sjekk eller forandre sidens tittel og URL for din installasjon";
// NEW! 
$admin_lang_optn_thumb_updated       = "Thumbnails updated!";
$admin_lang_optn_updated             = "thumbnails updated.";

// Info
$admin_lang_info_gd                  = "Ikke installert, sp&oslash;r din webtjener om dem kan innstallere det for deg!";
$admin_lang_info_gd_jpg              = "med JPEG st&oslash;tte";
$admin_lang_pp_version1              = "Seneste pixelpost version tilgjengelig:";
$admin_lang_pp_forum                 = "S&oslash;ker etter hjelp, eller &oslash;nsker &aring; gi en tilbakemelding? Vennligst bes&oslash;k pixelpost forum.";
$admin_lang_pp_min_php               = "Pixelpost's minimumskrav: PHP version";
$admin_lang_pp_min_mysql             = "Pixelpost's minimumskrav: MySQL";
$admin_lang_pp_exif1                 = "<b>EXIF</b> Pixelpost bruker";
$admin_lang_pp_exif2                 = "for EXIF-informasjon";
$admin_lang_pp_path                  = "Stier";
$admin_lang_pp_imagepath             = "Gjettet bildesti:";
$admin_lang_pp_imagepath_conf        = "Konfigurert bildesti:";
$admin_lang_pp_img_chmod1            = "Bilde mappe ikke skrivbar!";
$admin_lang_pp_img_chmod2            = "Du m&aring; anngi riktige tillatelser for denne mappen, ellers vil du ikke kunne laste opp noen bilder.";
$admin_lang_pp_img_chmod3            = "<br /> Sett mappen til <b>chmod 777</b> (read, write og execute tillatelse for owner, group og world).";
$admin_lang_pp_img_chmod4            = "Kan vi skrive til katalog? JA.";
$admin_lang_pp_img_chmod5            = "Miniatyrbilde mappe ikke skrivbar!";
$admin_lang_pp_imgfolder             = "Bilde katalog:";
$admin_lang_pp_thumbfolder           = "Miniatyrbilde katalog:";
$admin_lang_pp_langfolder            = "Spr&aring;k katalog:";
$admin_lang_pp_addfolder             = "Tillegg katalog:";
$admin_lang_pp_incfolder             = "Innkludert katalog:";
$admin_lang_pp_tempfolder            = "Stilmal katalog:";
$admin_lang_pp_folder_missing        = "Eksisterer ikke (skulle v&aelig;rt";
$admin_lang_pp_ref_log_title         = "Referanser for siste syv dager";
$admin_lang_hostinfo				 = "Host Information";
$admin_lang_fileuploads				 = "<b>File Uploads</b> to pixelpost site are";
$admin_lang_serversoft				 = "Server Software";
$admin_lang_pixelpostinfo			 = "Pixelpost Information";
$admin_lang_pp_currversion			 = "You are running Pixelpost version";

// AddOns
$admin_lang_addon_title              = "INSTALLERTE TILLEGG";
$admin_lang_failed_addonstatus		 = "Failed in updating the status of addon: ";
$admin_lang_addon_off				 = "Click to turn it OFF!";
$admin_lang_addon_on				 = "Click to turn it ON!";

// Error Messages
$admin_lang_pp_up_error_0            = "Opplastet uten feil.";
$admin_lang_pp_up_error_1            = "Overgikk maksimum filest&oslash;rrelse for hva webtjeneren din talker.";
$admin_lang_pp_up_error_2            = "Overgikk maksimum filest&oslash;rrelse.";
$admin_lang_pp_up_error_3            = "Filen ble ikke fullstendig opplastet.";
$admin_lang_pp_up_error_4            = "Ingen fil ble lastet opp.";
$admin_lang_pp_up_error_6            = "Missing a temporary folder.";
$admin_lang_pp_up_error_7            = "Failed to write file to disk.";

// newly added ones
$admin_lang_cmnt_moderation_que    = "Moderasjons k&oslash;";


// options >> time stamps
$admin_lang_optn_timestamps_title  = "Tids Stempler";
$admin_lang_optn_timestamps_desc   = "Ved &aring; anngi tids stempling p&aring; filnavn unng&aring;r du overskrivelse av bilder ved samme navn. <br/>
                                     Bruke tids stempler? ";

// options >> fight spam
$admin_lang_spam            = "SPAM KONTROL";
$admin_lang_spam_err_1      = "Feil oppstod, kunne ikke lage svarteliste tabell: ";
$admin_lang_spam_tableadd   = "Svarteliste tabellen er lagt til kampen mot spam fra kjernen";
$admin_lang_spam_err_2      = "Feil under oppdatering av moderasjon listen: ";
$admin_lang_spam_err_3      = "Feil under oppdatering av svartelisten: ";
$admin_lang_spam_err_4      = "Feil under oppdatering av referanse svartelisten: ";
$admin_lang_spam_err_5      = "Feil under oppdatering av akseptable anntall linker i kommentarer : ";
$admin_lang_spam_upd        = "Suksessfull oppdatering av alle svartelister";
$admin_lang_spam_err_6      = "Feil under oppdatering av kommentarer n&aring;r sammenlignet med moderasjonslisten: ";
$admin_lang_spam_com_upd    = "Tidliger: kommentarer er sammenlignet med moderasjonslisten ";
$admin_lang_spam_err_7      = "Feil under oppdatering av kommentarer n&aring;r sammenlignet med svartelisten: ";
$admin_lang_spam_com_del    = "Tidligere: kommentarer som inneholder ord/IPer fra svartelisten er slettet.";
$admin_lang_spam_err_8      = "Feil under sletting av bes&oslash;kende n&aring;r sammenlignet med d&aring;rlig-referanse-listen: ";
$admin_lang_spam_visit_del  = "Bes&oslash;kende med ord/IPer fra d&aring;rlige-referanse-listen er slettet.";

// New! 
$admin_lang_spam_ban        = "Ban Lists";
$admin_lang_spam_content    = "	Add lists of banned words/IPs/names to the textboxs below, one word per line.<br/>\n
				Any comment with a word, an IP, or name inside the moderation list will be sent to the moderation queue.<br/>\n
  				Any comment with a word, an IP, or name inside the black list never gets permission to enter the comment list.<br/>
  				Any visitor with the IP inside the <b>Referer Banned List</b> or with address that contains words in that list will\n
				be denied from accessing your photoblog. ( You should add the given code to .htaccess to make it work!)";
$admin_lang_spam_modlist    = "Moderation List";
$admin_lang_spam_blacklist  = "Black List";
$admin_lang_spam_reflist    = "Referer Banned List";
$admin_lang_spam_blacklist_text = "Copy the code below (CTRL+A and CTRL+C in Windows) and paste it into .htaccess file of your website to ban spam IPs and referers.";
$admin_lang_spam_htaccess_text = "Get .htaccess code";
$admin_lang_spam_check_comm = "Check Past Comments";
$admin_lang_spam_del_bad_comm = "Delete Bad Comments";
$admin_lang_spam_del_bad_ref = "Delete Bad Referers";
$admin_lang_spam_updateblacklist = "Update All Banlists";

$admin_lang_ni_post_exif_date = "Bruk exif dato";

$admin_lang_optn_upd_done     = "Oppdatering ferdig.";
$admin_lang_imgedit_preview   = "Forh&aring;ndsvis";

$admin_lang_cmnt_rep_spam = 'Rapporter Spam';

$admin_lang_optn_visitorbooking_title = 'Lagre bes&oslash;kende';
$admin_lang_optn_visitorbooking_desc  = '&Oslash;nsker du at Pixelpost skal lagre informasjon for hver bes&oslash;kende?';
?>