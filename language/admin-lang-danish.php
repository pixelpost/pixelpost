<?php
/*
Pixelpost version 1.7

SVN file version:
$Id: admin-lang-danish.php 450 2007-10-22 00:00:42Z david.kozikowski $

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

ADMIN PANEL LANGUAGE VARIABLES:

Dont edit                    ||      Edit                                   */

$_lang_file_translator        = 'Andreas M&oslash;gelmose';
$_lang_file_email             = 'andreas@xerxes.dk';
$_lang_file_rev               = '1.7';

$admin_lang_isrtl             = "no"; // yes for right-to-left languages and no for left-to-right languages
$admin_lang_update            = "Opdater";
$admin_lang_reload            = "<br /> Det kan v&aelig;re n&oslash;dvendigt at opdatere siden for at se &aelig;ndringerne.";
$admin_lang_error             = "Fejl";
$admin_lang_post              = "indl&aelig;g";
$admin_lang_page              = "side";
$admin_lang_of                = "af";
$admin_lang_next              = "N&aelig;ste";
$admin_lang_prev              = "Forrige";
$admin_lang_show              = "Vis";
$admin_lang_go                = "Udf&oslash;r";
$admin_lang_done              = "F&aelig;rdig:";
$admin_lang_example			  = "Example";


// Admin Start
$admin_start_1                = "Mappen <b>language</b> (sprog) findes ikke eller sprogfilen";
$admin_start_2                = "mangler i mappen.\n<br />Kontroller af du har uploadet alle n&oslash;dvendige filer med pr&aelig;cis samme navne som n&aelig;vnt her.";
$admin_start_userpw           = "Brugernavn eller kodeord forkert.";
$admin_start_pw_forgot        = "Glemt kodeord?";
$admin_start_browser_title    = "ADMINISTRATION";
$admin_start_welcome          = "Velkommen til Pixelpost Administrationen - Log ind herunder.";
$admin_start_pp_name          = "Link til din Pixelpost fotoblog:";
$admin_start_pp_tit           = "klik her fra at vise din fotoblog";
$admin_start_cookie           = "Login opretter en cookie";
$admin_start_username         = "Brugernavn";
$admin_start_pw               = "Kodeord";
$admin_start_pw_button        = "Send mig et nyt kodeord";
$admin_start_pw_recover       = "Det er <span style='color:red;'><b>ikke muligt at genskabe dit kodeord,</b></span> men Pixelpost kan generere et nyt, tilf&aelig;ldigt kodeord til dig.\n<br />
                                 Skriv e-mail adressen du har tastet ind i administrationspanelet.
                                 <br />S&aring; f&aring;r du et nyt kodeord tilsendt med det samme.";
$admin_start_email            = "E-mail adresse:";
$admin_start_email_button     = "Skriv din e-mail adresse";
$admin_start_admin_1          = "Administration";
$admin_start_admin_2          = "af";
$admin_start_remember         = "Log mig automatisk p&aring; ved hvert bes&oslash;g:";

// Password Recovery

// Front Page
$admin_lang_pw_title            = "Nyt kodeord til Pixelpost";

$admin_lang_pw_wronguser        = "Brugernavnet er ikke det samme som administratorens.";
$admin_lang_pw_back             =  "Tilbage til administrationspanelet";
$admin_lang_pw_noemail          = "Du har ikke udfyldt e-mail adressen! \n<br />
                                   Hvis du ikke har nogen anelse om dit password, s&aring; skriv en besked p&aring; <a href='http://forum.pixelpost.org/'>Pixelpost forum</a> for hj&aelig;lp.\n<br />";
$admin_lang_pw_notsent          = "Intet sendt! \n<br /> Den indtastede e-mail er ikke den samme som den du har indstillet i administrationspanelet.<br />";
$admin_lang_pw_subject          = "Nyt kodeord til Pixelpost";
$admin_lang_pw_usertext         = "Dit brugernavn:";
$admin_lang_pw_mailtext         = "Din e-mail:";
$admin_lang_pw_newpw            = "Dit nye kodeord:";
$admin_lang_pw_text_1           = "Dette er Pixelposts genoprettelse af kodeord";
$admin_lang_pw_text_2           = "Fra: Pixelpost administrationspanel";
$admin_lang_pw_text_3           = "En e-mail er sendt til din e-mail adresse med dit brugernavn og nye kodeord. \n<br />  Tjek din mail p&aring; ";
$admin_lang_pw_text_4           = "<span style='color:red;'>Fejl! \n<br />E-mail adressen og brugernavnet er i orden, men det kunne ikke afsendes en e-mail! \n<br />Sp&oslash;rg din hosting administrator om hj&aelig;lp.</span>";
$admin_lang_pw_text_5           = "Database fejl:";
$admin_lang_pw_text_6           = "<br />Opdateringen af dit nye kodeord kunne ikke fuldf&oslash;res.";
$admin_lang_pw_text_7           = "Denne mail er afsendt automatisk fra Login-siden til din fotoblog.\nNogen anmodede om et nyt kodeord til administrationspanelet.\n\nLog ind p&aring; din fotoblog med det samme\n\np&aring; ";
$admin_lang_pw_text_8           = "\n\nog log ind med det nye kodeord for at nulstille dette automatisk genererede kodeord.";

// Admin Menu
$admin_lang_new_image          = "Nyt billede";
$admin_lang_images             = "Billeder";
$admin_lang_categories         = "Kategorier";
$admin_lang_comments           = "Kommentarer";
$admin_lang_options            = "Indstillinger";
$admin_lang_general_info       = "Generel Info";
$admin_lang_addons             = "Udvidelser (Addons)";
$admin_lang_logout             = "Log ud";

// New Image
$admin_lang_ni_post_a_new_image   = "Opret et nyt billede";
$admin_lang_ni_image              = "Billede";
$admin_lang_ni_image_title        = "Titel";
$admin_lang_ni_select_cat         = "V&aelig;lg kategorier";
$admin_lang_ni_description        = "Beskrivelse / tekst";
$admin_lang_ni_datetime           = "Dato og tid for indl&aelig;gget";
$admin_lang_ni_post_now           = "Post nu";
$admin_lang_ni_post_one_day_after = "Post en dag efter sidste indl&aelig;g";
$admin_lang_ni_post_spec_date     = "Post p&aring; en specifik dato. Indstil datoen herunder:";
$admin_lang_ni_post_entry         = "Udf&oslash;r";
$admin_lang_ni_upload             = "Upload";
$admin_lang_ni_upload_error       = "Fejl ved upload af billedet!";
$admin_lang_ni_posted             = "F&aelig;rdig";
$admin_lang_ni_year               = "&aring;r";
$admin_lang_ni_month              = "m&aring;ned";
$admin_lang_ni_day                = "dag";
$admin_lang_ni_hour               = "time";
$admin_lang_ni_min                = "minut";
$admin_lang_ni_markdown_text      = "Brug Markdown eller HTML til at formatere tekst i dette felt.";
$admin_lang_ni_markdown_hp        = "Markdown hjemmeside";
$admin_lang_ni_markdown_element   = "Det grundl&aelig;ggende";
$admin_lang_ni_markdown_syntax    = "Syntaxreference";
$admin_lang_ni_missing_data       = "Manglende data<br />\nDu skal som minimum have en titel til dit billede samt et billede.\n
                                     Bem&aelig;rk at intet billede blev tilf&oslash;jet\np&aring; grund af den manglende information!";
$admin_lang_ni_crop_nextstep      = "V&aelig;lg st&oslash;rrelsen p&aring; din thumbnail:";
$admin_lang_ni_crop_background    = "Dette er baggrunden p&aring; det billede der skal besk&aelig;res";
$admin_lang_ni_post_exif_date     = "Brug exif dato";
$admin_lang_ni_db_error           = "en fejl opstod ved skrivning til databasen";
$admin_lang_ni_tags               = "N&oslash;gleord";
$admin_lang_ni_tags_desc          = "(komma, semikolon og mellemrum bruges til at adskille tags, saml ord med bindestreg eller understreg)";
$admin_lang_ni_alt_language				= "Skriv en titel og beskrivelse i det alternative sprog";

// Images
$admin_lang_imgedit_edit           = "Rediger";
$admin_lang_imgedit_title          = "Titel:";
$admin_lang_imgedit_alttitle     		= "Alt. Title:";
$admin_lang_imgedit_file_name      = "Filnavn:";
$admin_lang_imgedit_dimensions     = "St&oslash;rrelse:";
$admin_lang_imgedit_tbpublished    = "Offentligg&oslash;res:";
$admin_lang_imgedit_category_plural = "Kategorier:";
$admin_lang_imgedit_delete          = "Slet";
$admin_lang_imgedit_delete1         = "Slettet";
$admin_lang_imgedit_delete2         = "valgte billede(r).";
$admin_lang_imgedit_deleted         = "Fjern indl&aelig;g / billede / thumbnail";
$admin_lang_imgedit_deleted1        = "Indl&aelig;g slettet.";
$admin_lang_imgedit_deleted2        = "Billede slettet.";
$admin_lang_imgedit_delete_error    = "Kunne ikke slettet billedfilen.\n
                                       Du bliver n&oslash;dt til at g&oslash;re det p&aring; en anden m&aring;de, f.eks. via dit FTP-program.";
$admin_lang_imgedit_deleted3        = "Thumbnail slettet.";
$admin_lang_imgedit_delete_error2   = "Kunne ikke slettet thumbnail.\n
                                       Du bliver n&oslash;dt til at g&oslash;re det p&aring; en anden m&aring;de, f.eks. via dit FTP-program.";
$admin_lang_imgedit_reupimg         = "Gen-upload billede:";
$admin_lang_imgedit_file            = "Filen: ";
$admin_lang_imgedit_file_isuploaded = "er gen-uploadet!";
$admin_lang_imgedit_update          = "Opdater billede";
$admin_lang_imgedit_updated         = "Billede opdateret";
$admin_lang_imgedit_txt_desc        = "Beskrivelse / tekst";
$admin_lang_imgedit_dtime           = "Dato og tid for indl&aelig;gget";
$admin_lang_imgedit_img             = "Billede";
$admin_lang_imgedit_fsize           = "Fil-st&oslash;rrelse:";
$admin_lang_imgedit_12cropimg       = "CropImage v&aelig;rkt&oslash;j";
$admin_lang_imgedit_12cropimg_txt   = "Tr&aelig;k besk&aelig;ringsvinduet med musen og juster st&oslash;rrelsen med +/- knapperne for at redigere thumbnailen til dette billede.";
$admin_lang_imgedit_uthmb_button    = "Opdater thumbnail";
$admin_lang_imgedit_u_post_button   = "Opdater post";
$admin_lang_imgedit_title1          = "Billeder - Gen-upload, rediger eller slet billeder || ";
$admin_lang_imgedit_title2          = " billede(r) i databasen \n<br /> Viser ";
$admin_lang_imgedit_title3          = " indl&aelig;g, side ";
$admin_lang_imgedit_title4          = " af ";
$admin_lang_imgedit_12crop_opt      = "<strong>Bem&aelig;rk:</strong> 12CropImage er ikke valgt til besk&aelig;ring af thumbnails. Derfor kan thumbnails ikke &aelig;ndres.";
$admin_lang_imgedit_edit_post       = "REDIGER INDL&AElig;G";
$admin_lang_imgedit_img_page        = "billeder pr. side";
$admin_lang_imgedit_cropbg          = "Dette er baggrundsteksten til 12cropimage";
$admin_lang_imgedit_js_del_im       = "Er du sikker p&aring; at du vil slette billedet?";
$admin_lang_imgedit_preview         = "Eksempel";
$admin_lang_imgedit_db_error        = "<br />Kontroller om permalink-teksten er ubrugt indtil videre!";
$admin_lang_imgedit_tags_edit       = "N&oslash;gleord (komma, semikolon og mellemrum bruges til at adskille tags, saml ord med bindestreg eller understreg):";
$admin_lang_imgedit_alt_language  	= "Skift titel og beskrivelse p&aring; det alternative sprog";
$admin_lang_imgedit_masstag  	      = "Tilf&oslash;j/fjern n&oslash;gleord fra de valgte billeder";
$admin_lang_imgedit_masstag_set     = "Tilf&oslash;j n&oslash;gleord";
$admin_lang_imgedit_masstag_set2    = "Tilf&oslash;j n&oslash;gleord til det alternative sprog";
$admin_lang_imgedit_masstag_unset   = "Fjern n&oslash;gleord";
$admin_lang_imgedit_published          = "Offentliggjort";
$admin_lang_imgedit_unpublished_cmnts  = "tidligere skjult(e) billede(r).";


// Mass-Edit Categories
$admin_lang_imgedit_mass_1          = "Rediger kategorier";
$admin_lang_imgedit_mass_2          = "Tildel";
$admin_lang_imgedit_mass_3          = "Fjern";
$admin_lang_imgedit_mass_4          = "Opdater alle afkrydsede billeder";


// Categories
$admin_lang_cats_add_cat            = "Tilf&oslash;j kategori";
$admin_lang_cats_added              = "Kategori tilf&oslash;jet.";
$admin_lang_cats_add_cat_txt        = "Tilf&oslash;j en kategori du kan tildele billeder.";
$admin_lang_cats_add_cat_txt_altlang= "Overs&aelig;t overst&aring;ende kategori.";
$admin_lang_cats_edit_cat           = "Rediger kategorier";
$admin_lang_cats_edit_cat_txt       = "Rediger en kategori";
$admin_lang_cats_edit_cat_button    = "Rediger kategori";
$admin_lang_cats_edit_tip           = "Rediger navnet p&aring; f&oslash;lgende kategori for begge sprog.<br />Alle billeder i den gamle kategori vil tilh&oslash;re den nye du indtaster.";
$admin_lang_cats_delete_cat         = "Slet kategorier";
$admin_lang_cats_delete_cat_txt     = "Slet en kategori";
$admin_lang_cats_delete_cat2        = "Slet:";
$admin_lang_cats_delete_cats_button = "Slet kategori";
$admin_lang_cats_deleted            = "Kategori slettet.";
$admin_lang_cats_update             = "Opdater kategori";
$admin_lang_cats_update_cat_button  = "Opdater kategori";
$admin_lang_cats_updated            = "Opdaterede kategori til det nye navn.";


// Comments
$admin_lang_cmnt_commentlist        = "Alle kommentarer - slet eller rediger som du lyster&nbsp;||&nbsp;Viser";
$admin_lang_cmnt_name               = "Navn:";
$admin_lang_cmnt_email              = "E-mail:";
$admin_lang_cmnt_comment            = "Kommentar:";
$admin_lang_cmnt_image              = "Billede";
$admin_lang_cmnt_delete             = "Slet";
$admin_lang_cmnt_deleted            = "Kommentaren er slettet.";
$admin_lang_cmnt_delete1            = "Slettet";
$admin_lang_cmnt_delete2            = "valgt(e) kommentar(er).";
$admin_lang_cmnt_edit               = "Rediger";
$admin_lang_cmnt_edited             = "Kommentar redigeret.";
$admin_lang_cmnt_check_all          			= "Vaelig;lg/fravaelig;lg alle";
$admin_lang_cmnt_invert_checks      = "V&aelig;lg modsatte";
$admin_lang_cmnt_del_selected       = "Fjern valgte";
$admin_lang_cmnt_page               = "kommentarer pr. side.";
$admin_lang_cmnt_commenter          = "Kommentar tilf&oslash;jer:";
$admin_lang_cmnt_ip                 = "Fra ip:";
$admin_lang_cmnt_save               = "Gem";
$admin_lang_cmnt_massdelete_text    = "Tjek alle kommentarer som di vil slette p&aring; en gang";
$admin_lang_cmnt_js_del_comm        = "Er du sikker p&aring; at du vil slette den kommentar?";
$admin_lang_cmnt_publish_sel        = "Offenligg&oslash;r valgte";
$admin_lang_cmnt_unpublish_sel      = "Tilf&oslash;j til godkendelses-k&oslash;en";
$admin_lang_cmnt_published          = "Offentliggjort";
$admin_lang_cmnt_unpublished_cmnts  = "tidligere skjulte kommentar(er).";
$admin_lang_cmnt_unpublished        = "Skjult";
$admin_lang_cmnt_published_cmnts    = "tidligere offentliggjorte kommentar(er).";
$admin_lang_cmnt_error_blacklist    = "Fejl ved opdatering af blacklist: ";
$admin_lang_cmnt_error_banlist      = "Fejl ved opdatering af referrer-ban-listen: ";
$admin_lang_cmnt_moderation_que     = "Godkendelses-k&oslash;";
$admin_lang_cmnt_rep_spam           = 'Rapporter spam';
$admin_lang_cmnt_submenu1									= "KOMMENTARER";
$admin_lang_cmnt_submenu2									= "AFVENTER GODKENDELSE";


// Option
$admin_lang_optn_general            = "GENERELT";
$admin_lang_optn_template           = "UDSEENDE";
$admin_lang_optn_thumbnails         = "THUMBNAILS";
$admin_lang_optn_tip                = "Glem ikke efterf&oslash;lgende skr&aring;streg <b>'/'</b> f.eks. <i>http://www.pixelpost.org/</i>";

$admin_lang_optn_update             = "OPDATER";
$admin_lang_optn_yes                = "Ja";
$admin_lang_optn_no                 = "Nej";

$admin_lang_optn_title_url         = "SIDE TITEL OG ADRESSE";
$admin_lang_optn_title             = "Titel:";
$admin_lang_optn_sub_title         = "Sub Title:";
$admin_lang_optn_url               = "Adresse:";
$admin_lang_optn_usr_pss           = "ADMINISTRATOR &amp; KODEORD";
$admin_lang_optn_usr_pss_txt       = "Skift brugernavn eller kodeord?";
$admin_lang_optn_usr               = "Brugernavn:";
$admin_lang_optn_pss               = "Kodeord:";
$admin_lang_optn_pss_re            = "Bekr&aelig;ft kodeord:";
$admin_lang_optn_email             = "ADMIN E-MAIL";
$admin_lang_optn_fillit            = "Udfyld den. Bruges til gendannelse af kodeord.";
$admin_lang_optn_img_path          = "IMAGES & THUMBNAILS PATH";
$admin_lang_optn_tz                = "TIDSZONE";
$admin_lang_optn_tz_txt            = "V&aelig;lg tidszonen for din fotoblog.";
$admin_lang_optn_sendemail         = "SEND E-MAIL MED KOMMENTAR";
$admin_lang_optn_sendemail_txt     = "Send e-mail n&aring;r nogen kommenterer et billede?";
$admin_lang_optn_sendemail_html_txt = "brug HTML e-mails?";
$admin_lang_optn_comment_setting 		= "GLOBALE KOMMENTARINDSTILLINGER";
$admin_lang_optn_comment_setting2		= "Kommentarindstillinger";
$admin_lang_optn_cmnt_mod_txt       = "Standard for kommentarer:";
$admin_lang_optn_cmnt_mod_txt2      = "Ved kommentering:";
$admin_lang_optn_cmnt_mod_allowed		=	"Offentligg&oslash;r med det samme";
$admin_lang_optn_cmnt_mod_moderation=	"Send til godkendelse";
$admin_lang_optn_cmnt_mod_forbidden	=	"Sl&aring; kommentarer fra";

$admin_lang_optn_switch_template    = "SKIFT UDSEENDE";
$admin_lang_optn_lang_file           = "SPROG";
$admin_lang_optn_lang_file_admin          = "ADMIN PANEL LANGUAGE FILE";
$admin_lang_optn_dateformat          = "DATO FORMAT";
$admin_lang_optn_dateformat_txt      = "Datoformatet for billeder og kommentarer. Det bruges en syntax magen til PHP's <a href='http://www.php.net/date' target='_blank'>date()</a> funktion. Eksempler p&aring; hvad der erstatter de mest almindelig parametre: Y: &Aring;r, m: M&aring;ned, d: Dag, H: Time, i: Minut, s: Sekund.";
$admin_lang_optn_gmt                 = "Bem&aelig;rk at dette ikke automatisk underst&oslash;tter sommertid og du derfor manuelt skal &aelig;ndre det. <br />Kig p&aring; <a href='http://www.worldtimeserver.com/current_time_in_UTC.aspx' target='__blank'> UTC Current time </a> hvis du er i tvivl om din tidsforskel fra UTC.<br />";
$admin_lang_optn_cat_link_format     = "FORMATERING AF KATEGORI-LINKS";
$admin_lang_optn_catlinkformat_select = "V&aelig;lg formatering af kategori-links";
$admin_lang_optn_cat_link_format_txt  = "Formatering for visning af kategori-links i skabelonen.";
$admin_lang_optn_catlinkformat_custom = "Brugerdefineret";
$admin_lang_optn_catlinkformat_custom_start = "F&oslash;r kategori:";
$admin_lang_optn_catlinkformat_custom_end = "Efter kategori:";
$admin_lang_optn_calendar_type       = "KALENDER TYPE";
$admin_lang_optn_thumb_row           = "THUMBNAILR&AElig;KKE";
$admin_lang_optn_thumb_row_txt       = "Det antal thumbnails det skal vises i den automatisk genererede r&aelig;kke.<br/>Et ulige tal giver de bedste resultater, f.eks. 7 eller 9, ikke 6 eller 8.";
$admin_lang_optn_crop_thumbs         = "BESK&AElig;R THUMBNAILS?";
$admin_lang_optn_crop_thumbs_txt     = "Hvis thumbnails skal besk&aelig;res til pr&aelig;cise st&oslash;rrelser, v&aelig;lg <b>ja.</b><br/>\n
                                        Hvis du vil beholde det oprindelige st&oslash;rrelsesforhol, v&aelig;lg <b>nej.</b><br/>\n
                                        Hvis du vil besk&aelig;re billederne manuelt efter upload, v&aelig;lg <b>12CropImage.</b>";
$admin_lang_optn_thumb_size          = "THUMBNAIL-ST&Oslash;RRELSE";
$admin_lang_optn_thumb_size_txt      = "V&aelig;lg st&oslash;rrelsen p&aring; dine thumbnails, bredde x h&oslash;jde.";
$admin_lang_optn_thumb_size_new      = "Gem";
$admin_lang_optn_reg_thumbs_button   = "Re-generer thumbnails";
$admin_lang_optn_regen_thumbs_txt    = "Denne knap genererer nye thumbnails til alle billeder p&aring; fotobloggen. Du mister alle manuelt besk&aring;rede thumbnails til fordel for standardmetoden. Du kan dog redigere thumbnails med 12CropImage ved redigering af hvert billede.";
$admin_lang_optn_img_compression     = "THUMBNAIL-KOMPRIMERING";
$admin_lang_optn_img_compression_txt = "Hvor h&aring;rd skal jpg-komprimeringen v&aelig;re? 10 er lav kvalitet og 100 er max kvalitet (tabsfri)";
$admin_lang_optn_thumb_sharp              = "THUMBNAIL SHARPENING";
$admin_lang_optn_thumb_sharp_txt          = "How sharp do you want the thumbnails to be?";
$admin_lang_optn_thumb_sharp0             = 'No Sharpening';
$admin_lang_optn_thumb_sharp1             = 'Light';
$admin_lang_optn_thumb_sharp2             = 'Medium';
$admin_lang_optn_thumb_sharp3             = 'High';
$admin_lang_optn_thumb_sharp4             = 'Ultra-High';
$admin_lang_optn_pass_chngd_txt      = "Kodeordet er &aelig;ndret.";
$admin_lang_optn_pass_notchngd_txt   = "Kodeordet er ikke &aelig;ndret. De to nye kodeord skal v&aelig;re ens.";
$admin_lang_optn_title_url_text      = "Se eller rediger sidens titel og webadressen til din installation";
$admin_lang_optn_thumb_updated       = "Thumbnails opdateret!";
$admin_lang_optn_updated             = "thumbnails opdateret.";
$admin_lang_optn_visitorbooking_title = 'STATISTIK';
$admin_lang_optn_visitorbooking_desc  = 'Skal Pixelpost gemme info om hvert bes&oslash;g?';
$admin_lang_optn_upd_done             = "Opdatering udf&oslash;rt.";
$admin_lang_optn_upd_error            = "Fejl ved opdatering.";
$admin_lang_optn_upd_lang_error			  = "Det valgte alternative sprog er det samme som standard-sproget.<br />V&aelig;lg enten et andet alternativt sprog eller sl&aring; funktionen fra.";
$admin_lang_optn_markdown             = "BRUG MARKDOWN";
$admin_lang_optn_markdown_desc        = "Skal Pixelpost sl&aring; Markdown-funktionen til i billedbekrivelsen?";
$admin_lang_optn_exif			            = "BRUG EXIF";
$admin_lang_optn_exif_desc		        = "Skal Pixelpost sl&aring; Exif-information p&aring; forsiden til?";
$admin_lang_optn_token			          = "BRUG TOKEN VED KOMMENTARER";
$admin_lang_optn_token_desc		        = "Brug af token vil reducere risikoen for s&aring;kaldte<a href=\"http://en.wikipedia.org/wiki/Cross-site_request_forgery\">Cross-Site Request Forgeries</a>.<br/><br/>\n
																				 Hvis denne funktion er sl&aring;et til vil kommentarer kun bliver gemt, hvis kommentarfeltets token passer med den der er gemt i brugerens session. For at implementere dette skal du tilf&oslash;je <strong>&lt;TOKEN&gt;</strong> til kommentar-skabelonen et sted mellem <strong><i>&lt;form&gt; og &lt;/form&gt;</i></strong>.
																				 Hvis du glemmer <strong>&lt;TOKEN&gt;</strong> kommandoen vil kommentarer ikke fungere og brugeren vil se en fejlmeddelse.<br /><br/>\n
																				 &Oslash;nsker du at sl&aring; denne funktion til?";
$admin_lang_optn_token_time						= "Maksimal tid i minutter mellem &aring;bning af kommentarvinduet og indsendelsen af en kommenter: ";
$admin_lang_optn_token_error					= "Bemaelig;rk: Vaelig;rdier for token-tiden under 1 minut er ikke mulige. Token-tiden er nulstillet til 1 minut.";
$admin_lang_optn_dsbl_list 						= "DISTRIBUTED SENDER BLACKHOLE LIST INDSTILLINGER (http://www.dsbl.org)";
$admin_lang_optn_dsbl_list_desc 			= "Listen <a href=\"http://www.dsbl.org\" target=\"_blank\">Distributed Sender Blackhole List</a> indeholder IP-adressen p&aring; servere der er s&aring;kaldt &aring;bne relays, &aring;bne proxyer eller har andre sikkerhedsproblemer. Disse servere misbruges ofte af spammere til at sende e-mails men er ogs&aring; kendt for at l&aelig;gge falske kommentarer.<br /> <br />
																				 Skal kommentar-ip-adressen sammenlignes med denne liste?";
$admin_lang_optn_time_between_comments = "FOREBYG SPAM FLOOD";
$admin_lang_optn_time_between_comments_desc = "Antal sekunder f&oslash;r en ny kommentar kan skrives af samme bruger: ";
$admin_lang_optn_max_uri_comment			= "MAX ANTAL LINKS I KOMMENTAR";
$admin_lang_optn_max_uri_comment_desc = "Antal links tilladt i ÃƒÂ©n kommentar: ";
$admin_lang_optn_rss_setting					= "RSS/ATOM FEED INDSTILLINGER";
$admin_lang_optn_rss_title  					= "Feed titel";
$admin_lang_optn_rss_desc   					= "Feed beskrivelse";
$admin_lang_optn_rss_copyright					= "Feed copyright";
$admin_lang_optn_rss_discovery					= "Automatisk detektering af feed";
$admin_lang_optn_rss_opt_both					= "RSS &amp; ATOM";
$admin_lang_optn_rss_opt_rss					= "RSS";
$admin_lang_optn_rss_opt_atom					= "ATOM";
$admin_lang_optn_rss_opt_ext					= "Ekstern";
$admin_lang_optn_rss_opt_none					= "Ingen";
$admin_lang_optn_rss_ext_type					= "Ekstern feed type";
$admin_lang_optn_rss_ext						= "Ekstern feed";
$admin_lang_optn_rss_enable_comment_feed		= "Slaring; kommentar-feeds til";
$admin_lang_optn_rsstype_desc					= "V&aelig;lg typen af RSS/ATOM feed:";
$admin_lang_optn_rss_full							= "Vis billeder i fuld st&oslash;rrelse";
$admin_lang_optn_rss_thumbs						= "Vis thumbnails";
$admin_lang_optn_rss_thumbs_only					= "Vis kun thumbnails";
$admin_lang_optn_rss_full_only						= "Vis kun billedet i fuld stoslash;rrelse";
$admin_lang_optn_rss_text							= "Vis kun tekst";
$admin_lang_optn_feeditems_desc				= "Antal indl&aelig;g i listen: ";
$admin_lang_optn_lang                  = "Grundlaelig;ggende sprogindstillinger: ";
$admin_lang_optn_alt_lang             = "Indstillinger for alternative sprog: ";
$admin_lang_optn_alt_lang_dis         = "sl&aring;et fra";
$admin_lang_optn_alt_lang_no          = "sl&aring;et fra";
$admin_lang_optn_img_display						="BILLEDRaelig;KKEFoslash;LGE";
$admin_lang_optn_img_display_desc				="Vaelig;lg hvordan billederne skal sorteres ved visning. Sorter efter: ";
$admin_lang_optn_img_display_default		="faldende raelig;kkefoslash;lge";
$admin_lang_optn_img_display_reversed		="stigende raelig;kkefoslash;lge";


// Info
$admin_lang_info_gd                  = "Ikke installeret, bed dit hostingselskab installere det for dig.";
$admin_lang_info_gd_jpg              = "med JPEG underst&oslash;ttelse";
$admin_lang_pp_version1              = "Seneste Pixelpost version:";
$admin_lang_pp_forum                 = "Leder du efter hj&aelig;lp eller har lyst til at komme med forslag s&aring; kig ind p&aring; Pixelpost forummet.";
$admin_lang_pp_min_php               = "Pixelpost's minimumskrav: PHP version";
$admin_lang_pp_min_mysql             = "Pixelpost's minimumskrav: MySQL";
$admin_lang_pp_exif1                 = "<b>EXIF</b> Pixelpost bruger";
$admin_lang_pp_exif2                 = "til EXIF-information";
$admin_lang_pp_path                  = "Stier";
$admin_lang_pp_imagepath             = "Formodet sti til billeder:";
$admin_lang_pp_imagepath_conf        = "Konfigureret sti til billeder:";
$admin_lang_pp_img_chmod1            = "Billedmappe kan ikke skrives til!";
$admin_lang_pp_img_chmod2            = "Du skal s&aelig;tte de korrekte tilladelse for denne mappe for at kunne uploade billeder.";
$admin_lang_pp_img_chmod3            = "<br /> S&aelig;t mappen til <b>chmod 777</b> (i serversprog: read, write and execute permissions for owner, group and world).";
$admin_lang_pp_img_chmod4            = "Kan vi skrive til mappen? JA.";
$admin_lang_pp_img_chmod5            = "Kan ikke skrive til thumbnailsmappen!";
$admin_lang_pp_imgfolder             = "Billed-mappe:";
$admin_lang_pp_thumbfolder           = "Thumbnail-mappe:";
$admin_lang_pp_langfolder            = "Languages-mappe:";
$admin_lang_pp_addfolder             = "Addons-mappe:";
$admin_lang_pp_incfolder             = "Includes-mappe:";
$admin_lang_pp_tempfolder            = "Templates-mappe:";
$admin_lang_pp_folder_missing        = "Findes ikke (burde v&aelig;re";
$admin_lang_pp_ref_log_title         = "Henvisninger de seneste syv dage";
$admin_lang_hostinfo                 = "Host Information";
$admin_lang_fileuploads              = "<b>Filupload</b> til Pixelpost er";
$admin_lang_serversoft               = "Server Software";
$admin_lang_pixelpostinfo            = "Pixelpost Information";
$admin_lang_pp_currversion           = "Du k&oslash;rer Pixelpost version: ";
$admin_lang_pp_check                 = "Tjek";
$admin_lang_pp_sess_path             = "Session save sti";
$admin_lang_pp_sess_path_emp         = "er tom";
$admin_lang_pp_fileupload_np         = 'IKKE muligt! Kontroller file_upload variable i php.ini filen!';
$admin_lang_pp_fileupload_p          = 'muligt.';
$admin_lang_pp_langs                 = 'Pixelpost overs&aelig;ttelser';
$admin_lang_pp_lng_fname             = 'Filnavn';
$admin_lang_pp_lng_author            = 'Forfatter';
$admin_lang_pp_lng_ver               = 'Version';
$admin_lang_pp_lng_email             = 'E-mail';
$admin_lang_pp_newest_ver            = 'Du har den nyeste version af Pixelpost!';
$admin_lang_pp_thumbnailpath 				 = "Gaelig;ttet sti til thumbnails";
$admin_lang_pp_thumbnailpath_conf 	 = "Indstillet sti til thumbnails";

// AddOns
$admin_lang_addon_title              = "Installerede tilf&oslash;jelse";
$admin_lang_failed_addonstatus       = "Kan ikke opdatere status p&aring; denne udvidelse: ";
$admin_lang_addon_off                = "Klik for at sl&aring; den FRA";
$admin_lang_addon_on                 = "Klik for at sl&aring; den TIL";

// Error Messages
$admin_lang_pp_up_error_0            = "Upload gik uden problemer.";
$admin_lang_pp_up_error_1            = "Filen overskrider den maksimale filst&oslash;rrelse webserveren kan klare.";
$admin_lang_pp_up_error_2            = "Filen overskrider den maksimale filst&oslash;rrelse.";
$admin_lang_pp_up_error_3            = "Filen blev ikke fuldt uploadet.";
$admin_lang_pp_up_error_4            = "Der blev ikke uploadet nogen fil.";
$admin_lang_pp_up_error_6            = "Mangler en midlertidig mappe (temp).";
$admin_lang_pp_up_error_7            = "Kunne ikke skrive til disken.";
$admin_lang_pp_addon_error								= "Pixelpost er ikke i stand til at laelig;se add-on-filen. Kontroller chmod indstillingerne og saelig;t dem til 755";

// options >> time stamps
$admin_lang_optn_timestamps_title  = "TIDSSTEMPLER";
$admin_lang_optn_timestamps_desc   = "Tilf&oslash;jer tidsstempler til filnavne for at undg&aring; overskrivning af filer med samme navn. <br/>
                                     Brug tidsstempler? ";

// options >> fight spam
$admin_lang_spam            = "SPAM KONTROL";
$admin_lang_spam_change     = "Alle banlister";
$admin_lang_spam_err_1      = "Fejl ved oprettelse af banlist-tabel: ";
$admin_lang_spam_tableadd   = "Banlist-tabel er tilf&oslash;jet for at modvirke spam";
$admin_lang_spam_err_2      = "Fejl ved opdatering af godkendelseslisten: ";
$admin_lang_spam_err_3      = "Fejl ved opdatering af blacklist: ";
$admin_lang_spam_err_4      = "Fejl ved opdatering af referrer ban list: ";
$admin_lang_spam_err_5      = "Fejl ved opdatering af det tilladte antal links i kommentarer : ";
$admin_lang_spam_upd        = "Opdatering af ban-lister lykkedes";
$admin_lang_spam_err_6      = "Fejl ved opdatering af kommentarer ved sammenlining med godkendelseslisten: ";
$admin_lang_spam_com_upd    = "Udf&oslash;rt: Kommentarer sammenlignes med godkendelseslisten ";
$admin_lang_spam_err_7      = "Fejl ved sletning af kommentarer ved sammenlining med blacklist: ";
$admin_lang_spam_com_del    = "Udf&oslash;rt: Kommentarer der indeholder ord/IP'er fra blacklisten er slettet.";
$admin_lang_spam_err_8      = "Fejl ved sletning af bes&oslash;gende ved sammenlining med bad-referrers-list: ";
$admin_lang_spam_visit_del  = "Udf&oslash;rt: Kommentarer med ord/IP'er fra bad-referrer-listen er slettet.";

// Spam
$admin_lang_spam_ban        = "Opdater banlister";
$admin_lang_spam_content    = "Tilf&oslash;j lister med ikke tilladte ord/IP'er/navne i tekst-felterne herunder, et ord pr. linie.<br/>\n
                               Kommentarer med ord, IP'er eller navne der optr&aelig;der i godkendelseslisten bliver sat i k&oslash; til godkendelse.<br/>\n
                               Kommentarer med ord, IP'er eller navne der optr&aelig;der i blacklisten bliver f&aring;r slet ikke lov at blive sendt.<br/>
                               Bes&oslash;gende med IP i Referrer Banned List eller med en adresse der indeholder ord fra den liste vil\n
                               blive n&aelig;gtet adgang til din fotoblog (den givne kode skal tilf&oslash;jes til .htaccess-filen for at virke!)";
$admin_lang_spam_modlist    = "Godkendelsesliste";
$admin_lang_spam_blacklist  = "Black List";
$admin_lang_spam_reflist    = "Referrer Banned List";
$admin_lang_spam_blacklist_text = "Kopier koden herunder (CTRL+A og CTRL+C i Windows) og s&aelig;t det ind i .htaccess-filen for din hjemmeside for at udelukke spammere.";
$admin_lang_spam_htaccess_text = "Generer .htaccess kode";
$admin_lang_spam_check_comm  = "Kontrollere tidligere kommentarer";
$admin_lang_spam_del_bad_comm = "Slet ikke-tilladte kommentarer";
$admin_lang_spam_del_bad_ref = "Slet ikke-tilladte referrers";
$admin_lang_spam_updateblacklist = "Opdater alle lister";

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

// End of Admin-Language-File
?>