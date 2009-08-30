<?php
/*
Pixelpost version 1.7

SVN file version:
$Id: admin-lang-norwegian.php 456 2007-10-30 18:41:12Z schonhose $

Version 1.7:
Development Team:
Ramin Mehran, Will Duncan, Joseph Spurling,
Piotr "GeoS" Galas, Dennis Mooibroek, Karin Uhlig, Jay Williams, David Kozikowski

Former members of the Development Team:
Connie Mueller-Goedecke
Version 1.1 to Version 1.3: Linus <http://www.shapestyle.se>

Contact: thecrew (at) pixelpost (dot) org
Copyright 2007 Pixelpost.org <http://www.pixelpost.org>

Pixelpost www:  	http://www.pixelpost.org/
Pixelpost wiki: 	http://wiki.pixelpost.org/
Pixelpost forum: 	http://forum.pixelpost.org
_____________________________________________________________________________
Language file: norwegian (NO)
Author:  John Christian Olsen
Contact: me@jcolsen.com
WWW: http://jcolsen.com
_____________________________________________________________________________

ADMIN PANEL LANGUAGE VARIABLES:

Dont edit                    ||      Edit                                   */

$_lang_file_translator        = 'John Christian Olsen - <a href="http://jcolsen.com/" target="_blank">jcolsen.com</a>';
$_lang_file_email             = 'info@jcolsen.com';
$_lang_file_rev               = '1.7';

$admin_lang_isrtl             = "no"; // yes for right-to-left languages and no for left-to-right languages
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
$admin_lang_example			  = "Example";


// Admin Start
$admin_start_1                = "Ingen <b>spr&aring;k</b> mappe eksisterer eller filen";
$admin_start_2                = "mangler i mappen.<br />Forsikre deg om at du har lastet opp alle n&oslash;dvendige filer med det eksakte samme navnet som nevnt her.";
$admin_start_userpw           = "Brukernavn eller passord er feil.";
$admin_start_pw_forgot        = "Glemt passord?";
$admin_start_browser_title    = "ADMIN";
$admin_start_welcome          = "Velkommen til Pixelpost Admin panel - Vennligst logg inn.";
$admin_start_pp_name          = "Link til din Pixelpost side:";
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
$admin_lang_pw_title            				= "Pixelpost Passord Gjennopprettelse";

$admin_lang_pw_wronguser        				= "Brukernavnet du har nevnt er ikke det samme som administrator bruker av Pixelpost.";
$admin_lang_pw_back             				=  "Tilbake til administrator siden";
$admin_lang_pw_noemail          				= "Du nevnte ingen e-post adresse i det hele tatt! \n<br />
                                   				Hvis du har ingen ide om hva ditt passord var, legg igjen en beskjed i <a href='http://forum.pixelpost.org/'>Pixelpost forum</a> for hjelp.\n<br />";
$admin_lang_pw_notsent          				= "Ingenting sendt! \n<br /> E-post adressen du oppgav er ikke e-post adresses du oppgav i administrator panelet.<br />";
$admin_lang_pw_subject          				= "Pixelpost Passord Gjennopprettelse Beskjed";
$admin_lang_pw_usertext         				= "Ditt brukernavn:";
$admin_lang_pw_mailtext         				= "Din e-post adresse:";
$admin_lang_pw_newpw            				= "Ditt nye passord:";
$admin_lang_pw_text_1           				= "Dette er password gjennopprettelse for Pixelpost";
$admin_lang_pw_text_2           				= "Fra: Pixelpost Administrator Delen";
$admin_lang_pw_text_3           				= "En e-post er sendt til din e-post adresse med ditt brukernavn og ett nytt passord. \n<br />  Sjekk din e-post adresse hos ";
$admin_lang_pw_text_4           				= "<span style='color:red;'>Feil! Noe skjedde! \n<br />E-post adressen og brukernavnet du har gitt er OK men ingen e-post kunne bli sendt! \n<br />Sp&oslash;rr din host administrator for hjelp</span>";
$admin_lang_pw_text_5           				= "Database feil:";
$admin_lang_pw_text_6           				= "<br />Oppdateringen av det nye passordet feilet.";
$admin_lang_pw_text_7           				= "Denne e-posten er sendt automatisk fra Innloggingen av din fotoblog.\nNoen har forespurt ett nytt passord for Administrasjons Delen.\n\nDu burde logge inn p&aring; din Fotoblog\n\nat ";
$admin_lang_pw_text_8           				= "\n\nog logge inn med ditt nye passordet for &aring; resette dette automatisk genererte passordet\n\n&oslash;yeblikkelig!";

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
$admin_lang_ni_tags_desc          = "(comma, semicolon and space are used to seperate tags; join words using underline and dash)";
$admin_lang_ni_alt_language				= "Provide an image title and description in the alternative language";

// Images
$admin_lang_imgedit_edit           = "Rediger";
$admin_lang_imgedit_title          = "Tittel:";
$admin_lang_imgedit_alttitle          		= "Alt. Title:";
$admin_lang_imgedit_file_name      = "Filnavn:";
$admin_lang_imgedit_dimensions     = "Dimmensjon:";
$admin_lang_imgedit_tbpublished    = "Publiseres:";
$admin_lang_imgedit_category_plural = "Kategorier:";
$admin_lang_imgedit_delete          = "Slett";
$admin_lang_imgedit_deleted         = "Slett innlegg / Slett bilde / slett miniatyrbilde";
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
$admin_lang_imgedit_tags_edit       = "Tagger (komma, semikolon og space er brukt for &aring; separere tagger; spleis ord ved &aring; bruke understrek):";
$admin_lang_imgedit_alt_language    = "Bytt alternativt spr&aring;k p&aring; bilde tittel og beskrivelse";
$admin_lang_imgedit_masstag         = "Legg til/fjern tagger fra valgte bilder";
$admin_lang_imgedit_masstag_set     = "Legg til tagg(er)";
$admin_lang_imgedit_masstag_set2    = "Legg til tagg(er) for alternativt spr&aring;k";
$admin_lang_imgedit_masstag_unset   = "Fjern tagg(er)";
$admin_lang_imgedit_published          = "Publisert";
$admin_lang_imgedit_unpublished_cmnts  = "tidligere maskert bilde(r).";


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
$admin_lang_cmnt_email              = "E-post:";
$admin_lang_cmnt_comment            = "Kommentar:";
$admin_lang_cmnt_image              = "Bilde";
$admin_lang_cmnt_delete             = "Slett";
$admin_lang_cmnt_deleted            = "Slett en kommentar.";
$admin_lang_cmnt_delete1            = "Slettet";
$admin_lang_cmnt_delete2            = "velg kommentar(er).";
$admin_lang_cmnt_edit               = "Rediger";
$admin_lang_cmnt_edited             = "Kommentar redigert.";
$admin_lang_cmnt_check_all          			= "Masse Marker/Avmarker";
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
$admin_lang_cmnt_submenu1									= "COMMENTS";
$admin_lang_cmnt_submenu2									= "AWAITING MODERATION";

// New in comment:
$admin_lang_cmnt_error_blacklist    = "Feil under oppdatering av svartelisten: ";
$admin_lang_cmnt_error_banlist      = "Feil under oppdatering av viser til bannlyst listen: ";

// Option
$admin_lang_optn_general            = "GENERELT";
$admin_lang_optn_template           = "STILMAL";
$admin_lang_optn_thumbnails         = "MINIATYRBILDER";
$admin_lang_optn_tip                = "Glem ikke trailing slash <b>'/'</b> eks. <i>http://www.pixelpost.org/</i>";

$admin_lang_optn_update             = "Oppdater";
$admin_lang_optn_yes                = "Ja";
$admin_lang_optn_no                 = "Nei";


$admin_lang_optn_title_url         = "SIDENS TITTEL OG URL";
$admin_lang_optn_title             = "Tittel:";
$admin_lang_optn_sub_title         = "Sub Title:";
$admin_lang_optn_url               = "URL:";
$admin_lang_optn_usr_pss           = "ADMIN BRUKERNAVN &amp; PASSORD";
$admin_lang_optn_usr_pss_txt       = "Bytt brukernavn eller passord?";
$admin_lang_optn_usr               = "Bruker:";
$admin_lang_optn_pss               = "Passord:";
$admin_lang_optn_pss_re            = "Gjennta Passord:";
$admin_lang_optn_email             = "ADMIN EPOST";
$admin_lang_optn_fillit            = "Fyll ut. P&aring; denne adressen vil du motta glemt passord. Viktig!";
$admin_lang_optn_img_path          = "BILDER & MINITYRBILDERS STI";
$admin_lang_optn_tz                = "Tidssone";
$admin_lang_optn_tz_txt            = "Velg tidssone avvik for ditt land/by.";
$admin_lang_optn_sendemail         = "SEND EPOST VED NY KOMMENTAR";
$admin_lang_optn_sendemail_txt     = "Sende epost varsel ved ny kommentar?";
$admin_lang_optn_sendemail_html_txt = "bruk HTML varsel epost?";
// NEW!
$admin_lang_optn_comment_setting 		= "GLOBAL KOMMENTAR VALG";
$admin_lang_optn_comment_setting2		= "Kommentar valg";
$admin_lang_optn_cmnt_mod_txt       = "Vanlig handling for kommentarer:";
$admin_lang_optn_cmnt_mod_txt2      = "Valg for kommentarer:";
$admin_lang_optn_cmnt_mod_allowed		=	"Publiser &oslash;yeblikkelig";
$admin_lang_optn_cmnt_mod_moderation=	"Til moderations k&oslash;";
$admin_lang_optn_cmnt_mod_forbidden	=	"Sl&aring; av kommentering";

$admin_lang_optn_switch_template    = "Bytt stilmal";
$admin_lang_optn_lang_file           = "Velg spr&aring;k";
$admin_lang_optn_lang_file_admin          = "ADMIN PANEL SPR&Aring;K FIL";
$admin_lang_optn_dateformat          = "Dato format";
$admin_lang_optn_dateformat_txt      = "Dato formatet for visning av bilder og kommentarer. Denne syntaxen brukt er identisk med PHP <a href='http://www.php.net/date' target='_blank'>dato()</a> funksjonen. Dette er eksempler for hva som vil erstatte noen vanlige paramenterer: Y:&aring;r m:m&aring;ned d:dag H:time i:minutt s:sekund";
$admin_lang_optn_gmt                 = "Vennligst noter at dette ikke st&oslash;tter sommer/vinter tid automatisk og at du m&aring; forandre dette manuelt.<br />Sjekk <a href='http://www.worldtimeserver.com/current_time_in_UTC.aspx' target='__blank'> GMT Current time </a> om du er usikker p&aring; ditt land/bys lokale tids avvik fra GMT.<br />";
$admin_lang_optn_cat_link_format     = "Kategori format linker";
$admin_lang_optn_cat_link_format_txt = "Formatet for visning av linker til kategoriene i stilmalen.";

// NEW!
$admin_lang_optn_catlinkformat_custom  = "Egendefinert kategori format";
$admin_lang_optn_catlinkformat_custom_start = "Starter streng:";
$admin_lang_optn_catlinkformat_custom_end = "Slutter streng:";

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
$admin_lang_optn_thumb_sharp              = "MINIATYRBILDE SKARPHET";
$admin_lang_optn_thumb_sharp_txt          = "Hvor skarpt vil du at miniatyrbildet skal v&aelig;re?";
$admin_lang_optn_thumb_sharp0             = 'Ingen skarphet';
$admin_lang_optn_thumb_sharp1             = 'Lett';
$admin_lang_optn_thumb_sharp2             = 'Medium';
$admin_lang_optn_thumb_sharp3             = 'H&oslash;y';
$admin_lang_optn_thumb_sharp4             = 'Veldig-H&oslash;y';
$admin_lang_optn_pass_chngd_txt      = "Passordet er forandret.";
$admin_lang_optn_pass_notchngd_txt   = "Passordet er ikke forandret. Skriv inn det samme passordet i gjennta feltet.";
$admin_lang_optn_title_url_text      = "Sjekk eller forandre sidens tittel og URL for din installasjon";
// NEW!
$admin_lang_optn_thumb_updated       = "Miniatyrbilder oppdatert!";
$admin_lang_optn_updated             = "miniatyrbilder oppdatert.";
$admin_lang_optn_img_display						="BILDE VISNINGS REKKEF&Oslash;LGE";
$admin_lang_optn_img_display_desc				="Velg m&aring;ten bildene skal sortert for visning. Sorter det i: ";
$admin_lang_optn_img_display_default		="synkende rekkef&oslash;lge";
$admin_lang_optn_img_display_reversed		="stigende rekkef&oslash;lge";

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
$admin_lang_hostinfo				 = "Host Informasjon";
$admin_lang_fileuploads				 = "<b>Fil Opplastinger</b> til pixelpost siden er";
$admin_lang_serversoft				 = "Server Software";
$admin_lang_pixelpostinfo			 = "Pixelpost Informasjon";
$admin_lang_pp_currversion			 = "Du kj&oslash;prer Pixelpost version";
$admin_lang_pp_check                 = "Sjekk";
$admin_lang_pp_sess_path             = "Session lagre sti";
$admin_lang_pp_sess_path_emp         = "er tom";
$admin_lang_pp_fileupload_np         = 'IKKE mulig! Sjekk file_upload variabel i php.ini file!';
$admin_lang_pp_fileupload_p          = 'mulig.';
$admin_lang_pp_langs                 = 'Pixelpost spr&aring;k oversettelser';
$admin_lang_pp_lng_fname             = 'Filnavn';
$admin_lang_pp_lng_author            = 'Opphav';
$admin_lang_pp_lng_ver               = 'Versjon';
$admin_lang_pp_lng_email             = 'E-post';
$admin_lang_pp_newest_ver            = 'Du har den nyeste versjonen av Pixelpost!';
$admin_lang_pp_thumbnailpath 				 = "Gjettet miniatyrbildesti";
$admin_lang_pp_thumbnailpath_conf 	 = "Konfigurert Miniatyrbildesti"; 

// AddOns
$admin_lang_addon_title              = "INSTALLERTE TILLEGG";
$admin_lang_failed_addonstatus		 = "Feil under oppdatering av tilleggets status: ";
$admin_lang_addon_off				 = "Klikk for &aring; sl&aring; AV!";
$admin_lang_addon_on				 = "Klikk for &aring; sl&aring; P&Aring;!";

// Error Messages
$admin_lang_pp_up_error_0            = "Opplastet uten feil.";
$admin_lang_pp_up_error_1            = "Overgikk maksimum filest&oslash;rrelse for hva webtjeneren din talker.";
$admin_lang_pp_up_error_2            = "Overgikk maksimum filest&oslash;rrelse.";
$admin_lang_pp_up_error_3            = "Filen ble ikke fullstendig opplastet.";
$admin_lang_pp_up_error_4            = "Ingen fil ble lastet opp.";
$admin_lang_pp_up_error_6            = "Mangler en temporary folder.";
$admin_lang_pp_up_error_7            = "Feilet &aring; skrive fil til disken.";
$admin_lang_pp_addon_error								= "Pixelpost kan ikke lese tilleggs filen. Vennligst sjekk chmod innstillingene og forandre dem til 755";
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
$admin_lang_spam_ban        = "Bannlyst Lister";
$admin_lang_spam_content    = "	Legg til lister over bannlyste ord/IPer/navn i tekstboksen under, ett ord per linje.<br/>\n
				Alle kommentarer med ett ord, en IP, eller navn i moderasjons listen vil bli sendt til moderasjons k&oslash;en.<br/>\n
  				Alle kommentarer med ett ord, en IP, eller navn i svartelisten f&aring;r aldri tillatelse til &aring; legges i listen over kommentarer.<br/>
  				Alle bes&oslash;kende med IPer listet i <b>Referer Bannlyst Liste</b> eller med adresse som inneholder ord i den listen vil\n
				nektet adgang til din fotoblog. ( Du b&oslash;r legge til angitt kode til .htaccess for &aring; f&aring; det til &aring; virke!)";
$admin_lang_spam_modlist    = "Moderasjons Liste";
$admin_lang_spam_blacklist  = "Svarteliste Liste";
$admin_lang_spam_reflist    = "Referer Bannlyst Liste";
$admin_lang_spam_blacklist_text = "Kopier koden under (CTRL+A og CTRL+C i Windows) og lim inn i .htaccess filen til din webside for &aring; bannlyse spam IPer og referers.";
$admin_lang_spam_htaccess_text = "Sjekk .htaccess kode";
$admin_lang_spam_check_comm = "Sjekk Tidligere Kommentarer";
$admin_lang_spam_del_bad_comm = "Slett D&aring;rlige Kommentarer";
$admin_lang_spam_del_bad_ref = "Slett D&aring;rlige Referers";
$admin_lang_spam_updateblacklist = "Oppdater Alle Svartelister";

$admin_lang_ni_post_exif_date = "Bruk exif dato";

$admin_lang_optn_upd_done     = "Oppdatering ferdig.";
$admin_lang_optn_upd_error            = "Oppdaterings Feil.";
$admin_lang_optn_upd_lang_error			  = "Valgt alternativ spr&aring;k er det samme som default spr&aring;k.<br />Dette er det ingen mening i s&aring; enten velg ett annet alternativt spr&aring;k eller sl&aring; av det alternative spr&aring;ket.";
$admin_lang_optn_markdown             = "Sl&aring; p&aring; Markdown";
$admin_lang_optn_markdown_desc        = "Skal Pixelpost sl&aring; p&aring; Markdown valget i Bilde beskrivelse?";
$admin_lang_optn_exif			            = "Enable Exif";
$admin_lang_optn_exif_desc		        = "Skal Pixelpost sl&aring; p&aring; Exif valget p&aring; f&oslash;rstesiden?";
$admin_lang_optn_token			          = "Sl&aring; p&aring; token i former";
$admin_lang_optn_token_desc		        = "Bruk av en token vil redusere sannsynligheten for <a href=\"http://en.wikipedia.org/wiki/Cross-site_request_forgery\">Cross-Site Request Forgeries</a>.<br/><br/>\n
																				 Hvis dette valget er p&aring;, vil kommentarer bare bli lagret n&aring;r token fra formen korresponderer med den i brukerens session. For &aring; implementere dette m&aring; du legge til <strong>&lt;TOKEN&gt;</strong> til kommentarens template fil en plass mellom <strong><i>&lt;form&gt;...&lt;/form&gt;</i></strong> taggene.
																				 Hvis du glemmer <strong>&lt;TOKEN&gt;</strong> taggen, vil ikke kommentarer virke lenger og brukeren vil f&aring; presentert en feil melding.<br /><br/>\n
																				 Skal denne innstillingen sl&aring;es p&aring;?";
$admin_lang_optn_token_time						= "Maksimum tid i minutter mellom &aring;pningen av kommentar vinduet og publiseringen av kommentaren: ";
$admin_lang_optn_token_error					= "V&aelig;r Oppmerksom: verdier mindre enn 1 minutt for Token tid er ikke mulig. Token tiden har blitt resatt til 1 minutt.";
$admin_lang_optn_dsbl_list 						= "Distributed Sender Blackhole List valg (http://www.dsbl.org)";
$admin_lang_optn_dsbl_list_desc 			= "<a href=\"http://www.dsbl.org\" target=\"_blank\">Distributed Sender Blackhole List</a> inneholder IP adresser over servere som er en &aring;pen relay, en &aring;pen proxy eller har andre s&aring;rbarheter. Disse serverne er ofte missbrukt av SPAMMERE for &aring; sende e-poster, men er ogs&aring; kjent for &aring; poste kommentarer.<br /> <br />
																				 Skal kommentarens IP adresse sjekkes opp mot Distributed Sender Blackhole List?";
$admin_lang_optn_time_between_comments = "Forhindre SPAM flood";
$admin_lang_optn_time_between_comments_desc = "Antall sekunder f&oslash;r en ny kommentar kan postes (for &aring; forhindre floods): ";
$admin_lang_optn_max_uri_comment			= "MAKSIMUM ANTALL URI";
$admin_lang_optn_max_uri_comment_desc = "Antall URI tillatt i en kommentar: ";
$admin_lang_optn_rss_setting					= "RSS/ATOM feed valg";
$admin_lang_optn_rss_title  					= "Feed tittel";
$admin_lang_optn_rss_desc   					= "Feed beskrivelse";
$admin_lang_optn_rss_copyright					= "Feed copyright";
$admin_lang_optn_rss_discovery					= "Feed oppdagelse";
$admin_lang_optn_rss_opt_both					= "RSS &amp; ATOM";
$admin_lang_optn_rss_opt_rss					= "RSS";
$admin_lang_optn_rss_opt_atom					= "ATOM";
$admin_lang_optn_rss_opt_ext					= "Ekstern";
$admin_lang_optn_rss_opt_none					= "Ingen";
$admin_lang_optn_rss_ext_type					= "Ekstern feed type";
$admin_lang_optn_rss_ext						= "Ekstern feed";
$admin_lang_optn_rss_enable_comment_feed		= "Sl&aring; p&aring; kommentar feeds";
$admin_lang_optn_rsstype_desc					= "Velg RSS/ATOM feed stil:";
$admin_lang_optn_rss_full							= "Show full size pictures";
$admin_lang_optn_rss_thumbs						= "Vis miniatyrbilder";
$admin_lang_optn_rss_thumbs_only					= "Vis bare miniatyrbilder";
$admin_lang_optn_rss_full_only						= "Vis bare bilder i full st&oslash;rrelse";
$admin_lang_optn_rss_text							= "Vis bare tekst";
$admin_lang_optn_feeditems_desc				= "Anntal gjennstander i feedlisten: ";
$admin_lang_optn_lang                  = "Base spr&aring;k valg: ";
$admin_lang_optn_alt_lang             = "Alternativt spr&aring;k valg: ";
$admin_lang_optn_alt_lang_dis         = "sl&aring;tt av";
$admin_lang_optn_alt_lang_no          = "sl&aring;tt av";


$admin_lang_imgedit_preview   = "Forh&aring;ndsvis";

$admin_lang_cmnt_rep_spam = 'Rapporter Spam';

$admin_lang_optn_visitorbooking_title = 'Lagre bes&oslash;kende';
$admin_lang_optn_visitorbooking_desc  = '&Oslash;nsker du at Pixelpost skal lagre informasjon for hver bes&oslash;kende?';

// Alternative language (PLEASE DO NOT TRANSLATE THESE!!!)
$admin_lang_dutch								="Nederlands";
$admin_lang_english								="English";
$admin_lang_french								="Fran&ccedil;ais";
$admin_lang_german								="Deutsch";
$admin_lang_italian								="Italiano";
$admin_lang_norwegian							="Norsk";
$admin_lang_persian								="Farsi";
$admin_lang_polish								="Polski";
$admin_lang_portuguese							="Portugu&egrave;s";
$admin_lang_simplified_chinese					="Chinese";
$admin_lang_spanish								="Espa&ntilde;ol";
$admin_lang_swedish								="Swedish";
$admin_lang_japanese							="Japanese";
$admin_lang_danish								="Dansk";
$admin_lang_romanian 							="Romana";
$admin_lang_hungarian							="Magyar";

?>