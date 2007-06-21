<?php
/*

admin-lang-dutch.php : english (default) language file for Pixelpost-Admin-Section
===================================================================================
Pixelpost version 1.6

SVN file version:
$Id: admin-lang-dutch.php 190 2007-03-28 08:15:27Z schonhose $

Version 1.5:
Development Team:
Ramin Mehran, Connie Mueller-Goedecke, Will Duncan, Joseph Spurling, Piotr "GeoS" Galas
Version 1.1 to Version 1.3: Linus <http://www.shapestyle.se>

Copyright  2006 Pixelpost.org <http://www.pixelpost.org>

Pixelpost www:  	http://www.pixelpost.org/
Pixelpost wiki: 	http://wiki.pixelpost.org/
Pixelpost forum: 	http://forum.pixelpost.org
Attention:
============
This is the Dutch language file for the admin section of Pixelpost
Please note I translated this in like 1 hour, so there are something wich might
be changed.
______________________________________________________________________________

ADMIN PANEL LANGUAGE VARIABLES:

Dont edit                    ||      Edit                                   */

$_lang_file_translator        = 'The Pixelpost Crew';
$_lang_file_email             = 'thecrew@pixelpost.org';
$_lang_file_rev               = '1.6';

$admin_lang_isrtl             = "nee"; // yes for right-to-left languages and no for left-to-right languages
$admin_lang_update            = "Bijwerken";
$admin_lang_reload            = "<br /> Om de veranderingen te zien moet u mogelijk deze pagina verversen.";
$admin_lang_error             = "Fout";
$admin_lang_post              = "posts";
$admin_lang_page              = "pagina";
$admin_lang_of                = "van";
$admin_lang_next              = "Volgende";
$admin_lang_prev              = "Vorige";
$admin_lang_show              = "Laat zien";
$admin_lang_go                = "Gaan!";
$admin_lang_done              = "Klaar:";
$admin_lang_example			  		= "Voorbeeld";


// Admin Start
$admin_start_1                = "De <b>language</b> folder ontbreekt of het bestand ";
$admin_start_2                = "ontbreekt in de folder.\n<br />Controleer of u de bestanden, zoals ze hier staan, precies zo op de server gezet heeft.";
$admin_start_userpw           = "Gebruikersnaam of wachtwoord niet correct.";
$admin_start_pw_forgot        = "Wachtwoord vergeten?";
$admin_start_browser_title    = "ADMIN";
$admin_start_welcome          = "Welkom Pixelpost Admin - U kunt nu inloggen.";
$admin_start_pp_name          = "Link naar uw Pixelpost Photoblog:";
$admin_start_pp_tit           = "Klik hier om naar uw photoblog te gaan";
$admin_start_cookie           = "Inloggen zet een 'cookie'";
$admin_start_username         = "Gebruikersnaam";
$admin_start_pw               = "Wachtwoord";
$admin_start_pw_button        = "Stuur mij mijn nieuwe wachtwoord";
$admin_start_pw_recover       = "Er bestaat <span style='color:red;'><b>geen mogelijkheid om uw oude wachtwoord te achterhalen</b></span> maar Pixelpost kan
                                 een willekeurige nieuwe wachtwoord aanmaken.\n<br />
                                 Voer hier het email adres in welke u ook heeft ingevoerd in het Administratie paneel.
                                 <br />You will get a new password by email immediately.";
$admin_start_email            = "Email Adres:";
$admin_start_email_button     = "Geef uw email adres";
$admin_start_admin_1          = "Administratie";
$admin_start_admin_2          = "voor";
$admin_start_remember         = "Onthoudt mij:";

// Password Recovery

// Front Page
$admin_lang_pw_title            = "Herstellen Pixelpost Wachtwoord";

$admin_lang_pw_wronguser        = "De gebruikersnaam die u opgeeft kom niet overeen met de ADMIN gebruiker voor Pixelpost.";
$admin_lang_pw_back             =  "Terug naar het Administratie Paneel";
$admin_lang_pw_noemail          = "U heeft geen email adres ingevoerd! \n<br />
                                   Als u echt niet weet hoe dit moet, lat dan een bericht achter op <a href='http://forum.pixelpost.org/'>Pixelpost forum</a> waarna iemand u zal helpen.\n<br />";
$admin_lang_pw_notsent          = "Niets verstuurd! \n<br /> De ingevoerde email adres komt niet overeen met het adres in het Administratie Paneel.<br />";
$admin_lang_pw_subject          = "Herstellen Pixelpost Wachtwoord Bericht";
$admin_lang_pw_usertext         = "Uw gebruikersnaam:";
$admin_lang_pw_mailtext         = "Uw Email Adres:";
$admin_lang_pw_newpw            = "Uw nieuwe wachtwoord:";
$admin_lang_pw_text_1           = "Dit is het wachtwoord herstel script van Pixelpost";
$admin_lang_pw_text_2           = "From: Pixelpost Administratie Paneel";
$admin_lang_pw_text_3           = "Een email is verstuurd naar uw email adres met daarin uw gebruikersnaam en nieuwe wachtwoord. \n<br />  Controleer uw mail voor ";
$admin_lang_pw_text_4           = "<span style='color:red;'>Fout! Er is iets misgegaan! \n<br />Het email adres en gebruikersnaam die u opgegeven heeft lijken te kloppen, maar een email kon niet verstuurd worden! \n<br />Vraag uw hostingsbedrijf om hulp</span>";
$admin_lang_pw_text_5           = "Database fout:";
$admin_lang_pw_text_6           = "<br />Bijwerken wachtwoord mislukt.";
$admin_lang_pw_text_7           = "Deze mail is automatisch verstuurd vanaf uw Login pagina van Pixelpost.\nIemand heeft een nieuwe wachtwoord aangevraagd.\n\nWij raden u aan om zo snel mogelijk in te loggen \n\op ";
$admin_lang_pw_text_8           = "\n\nom deze automatisch gegenereerde wachtwoord te vervangen!\n";

// Admin Menu
$admin_lang_new_image          = "Nieuwe Foto";
$admin_lang_images             = "Fotos";
$admin_lang_categories         = "Categorieën";
$admin_lang_comments           = "Reacties";
$admin_lang_options            = "Opties";
$admin_lang_general_info       = "Algemene Info";
$admin_lang_addons             = "Addons";
$admin_lang_logout             = "Uitloggen";

// New Image
$admin_lang_ni_post_a_new_image   = "Plaats een Nieuwe Foto";
$admin_lang_ni_image              = "Foto";
$admin_lang_ni_image_title        = "Fototitel";
$admin_lang_ni_select_cat         = "Selecteer Categorieën / Sleutelwoorden";
$admin_lang_ni_description        = "Foto omschrijving / tekst";
$admin_lang_ni_datetime           = "Datum en Tijd voor de foto";
$admin_lang_ni_post_now           = "Plaats nu";
$admin_lang_ni_post_one_day_after = "Plaats een dag na de laatste plaatsing";
$admin_lang_ni_post_spec_date     = "Plaats op een specifiek moment. Stel hieronder de datum in:";
$admin_lang_ni_post_entry         = "Plaats foto";
$admin_lang_ni_upload             = "Upload";
$admin_lang_ni_upload_error       = "Er ging iets verkeerd tijdens het uploaden!";
$admin_lang_ni_posted             = "GEPLAATST";
$admin_lang_ni_year               = "jaar";
$admin_lang_ni_month              = "maand";
$admin_lang_ni_day                = "dag";
$admin_lang_ni_hour               = "uur";
$admin_lang_ni_min                = "minuut";
$admin_lang_ni_markdown_text      = "Gebruik Markdown of HTML om de tekst te formateren.";
$admin_lang_ni_markdown_hp        = "Markdown homepage";
$admin_lang_ni_markdown_element   = "Basis";
$admin_lang_ni_markdown_syntax    = "Syntax Reference";
$admin_lang_ni_missing_data       = "Ontbrekende data<br />\nU moet minimaal een foto en een titel opgeven.\n
                                     Er is geen foto toegevoegd vanwege deze fout!";
$admin_lang_ni_crop_nextstep      = "U moet nu de thumbnail venster selecteren:";
$admin_lang_ni_crop_background    = "Dit is de achterground van de te snijden foto";
$admin_lang_ni_post_exif_date     = "Gebruik exif datum";
$admin_lang_ni_db_error           = "Een fout vond plaats tijdens het schrijven naar de database";
$admin_lang_ni_tags               = "Label";
$admin_lang_ni_tags_desc          = "(komma, puntkomma en spaties worden gebruikt om labels te scheiden; verbind woorden door een underline of een min-teken)";
$admin_lang_ni_alt_language				= "Geef een foto titel en omschrijving in de alternatieve taal";

// Images
$admin_lang_imgedit_edit           = "Bewerken";
$admin_lang_imgedit_title          = "Titel:";
$admin_lang_imgedit_file_name      = "Bestandsnaam:";
$admin_lang_imgedit_dimensions     = "Afmetingen:";
$admin_lang_imgedit_tbpublished    = "Publicatie op:";
$admin_lang_imgedit_category_plural = "Categorieën:";
$admin_lang_imgedit_delete          = "Verwijder";
$admin_lang_imgedit_delete1         = "Verwijderd";
$admin_lang_imgedit_delete2         = "geselecteerde foto(s).";
$admin_lang_imgedit_deleted         = "Post verwijderen / Foto verwijderen / thumbnail verwijderen";
$admin_lang_imgedit_deleted1        = "Post verwijderd.";
$admin_lang_imgedit_deleted2        = "Foto verwijderd.";
$admin_lang_imgedit_delete_error    = "Kan de foto niet verwijderen.\n
                                       U kunt de foto op een andere manier verwijderen, bijvoorbeeld via FTP.";
$admin_lang_imgedit_deleted3        = "Thumbnail verwijderd.";
$admin_lang_imgedit_delete_error2   = "Kan de thumbnail niet verwijderen.\n
                                       U kunt de thumbnail op een andere manier verwijderen, bijvoorbeeld via FTP.";
$admin_lang_imgedit_reupimg         = "Opnieuw Uploaden Foto:";
$admin_lang_imgedit_file            = "Bestand: ";
$admin_lang_imgedit_file_isuploaded = "is opnieuw uploaded!";
$admin_lang_imgedit_update          = "Foto bijwerken";
$admin_lang_imgedit_updated         = "Bijgewerkte foto";
$admin_lang_imgedit_txt_desc        = "Tekst/omschrijving:";
$admin_lang_imgedit_dtime           = "Datum-tijd:";
$admin_lang_imgedit_img             = "Foto:";
$admin_lang_imgedit_fsize           = "Bestandsgrootte:";
$admin_lang_imgedit_12cropimg       = "Bijsnijd gereedschap:";
$admin_lang_imgedit_12cropimg_txt   = "Om de thumbnail voor deze foto te bewerken, sleep het bijsnijd venster met de muis of vergroot/verklein het met de '+'/'-' knopjes:";
$admin_lang_imgedit_uthmb_button    = "Bijwerken Thumbnail";
$admin_lang_imgedit_u_post_button   = "Bijwerken Post";
$admin_lang_imgedit_title1          = "Fotos - opnieuw uploaden, Bewerken of Verwijder fotos || ";
$admin_lang_imgedit_title2          = " foto(s) in de database \n<br /> Laat ";
$admin_lang_imgedit_title3          = " posts zien, pagina ";
$admin_lang_imgedit_title4          = " van ";
$admin_lang_imgedit_12crop_opt      = "<strong>Opmerking:</strong> 12CropImage optie is niet geselecteerd voor het bijsnijden van thumbnails. Daarom kunnen thumbnails niet aangepast worden.";
$admin_lang_imgedit_edit_post       = "BEWERK POST";
$admin_lang_imgedit_img_page        = "fotos per pagina";
$admin_lang_imgedit_cropbg          = "Dit is de achtergrond tekst voor 12cropimage";
$admin_lang_imgedit_js_del_im       = "Weet u zeker dat u de foto wilt verwijderen?";
$admin_lang_imgedit_preview         = "Voorbeeld";
$admin_lang_imgedit_db_error        = "<br />Controleer of de permalink string nog niet gebruikt is!";
$admin_lang_imgedit_tags_edit       = "Labels (komma, puntkomma en spatie worden gebruikt om labels te scheiden; verbind woorden door een underline of een min-teken):";
$admin_lang_imgedit_alt_language  	= "Geef een foto titel en omschrijving in de alternatieve taal";
$admin_lang_imgedit_masstag  	      = "Voeg labels toe of verwijder labels van geselecteerde fotos";
$admin_lang_imgedit_masstag_set     = "Voeg label(s) toe";
$admin_lang_imgedit_masstag_set2    = "Voeg label(s) toe voor de alternative taal";
$admin_lang_imgedit_masstag_unset   = "Verwijder label(s)";
$admin_lang_imgedit_published          = "Gepubliceerd";
$admin_lang_imgedit_unpublished_cmnts  = "voorheen gemaskeerde foto's.";


// Mass-Edit Categories
$admin_lang_imgedit_mass_1          = "Bulk bewerken categorie";
$admin_lang_imgedit_mass_2          = "Wijs toe";
$admin_lang_imgedit_mass_3          = "Verwijder uit";
$admin_lang_imgedit_mass_4          = "Bulk bijwerken";


// Categories
$admin_lang_cats_add_cat            = "Voeg Categorie toe";
$admin_lang_cats_added              = "Categorie toegevoegd.";
$admin_lang_cats_add_cat_txt        = "Voeg een categorie toe die toegewezen kan worden aan fotos.";
$admin_lang_cats_add_cat_txt_altlang= "Geef de vertaling van bovengenoemde categorie.";
$admin_lang_cats_edit_cat           = "Bewerk Categorieën";
$admin_lang_cats_edit_cat_txt       = "Bewerk een categorie";
$admin_lang_cats_edit_cat_button    = "Bewerk Categorie";
$admin_lang_cats_edit_tip           = "Bewerk de naam van deze categorie voor beide talen<br />Alle fotos die zijn toegewezen aan de oude categorie zullen automatisch aan de nieuwe toegewezen worden.";
$admin_lang_cats_delete_cat         = "Verwijder Categorieën";
$admin_lang_cats_delete_cat_txt     = "Verwijder een categorie";
$admin_lang_cats_delete_cat2        = "Verwijderd:";
$admin_lang_cats_delete_cats_button = "Verwijder Categorie";
$admin_lang_cats_deleted            = "Categorie Verwijderd.";
$admin_lang_cats_update             = "Werk Categorie bij";
$admin_lang_cats_update_cat_button  = "Werk Categorie bij";
$admin_lang_cats_updated            = "Categorie bijgewerkt.";


// Comments
$admin_lang_cmnt_commentlist        = "Overzicht van Reacties - verwijder of bewerk&nbsp;||&nbsp;Laat zien";
$admin_lang_cmnt_name               = "Naam:";
$admin_lang_cmnt_email              = "Email:";
$admin_lang_cmnt_comment            = "Reactie:";
$admin_lang_cmnt_image              = "Foto";
$admin_lang_cmnt_delete             = "Verwijder";
$admin_lang_cmnt_deleted            = "Verwijder een reactie.";
$admin_lang_cmnt_delete1            = "Verwijderd";
$admin_lang_cmnt_delete2            = "geselecteerde reactie(s).";
$admin_lang_cmnt_edit               = "Bewerk";
$admin_lang_cmnt_edited             = "Bewerk een reactie.";
$admin_lang_cmnt_check_all          = "Selecteer alles";
$admin_lang_cmnt_clear_all          = "Verwijder selectie";
$admin_lang_cmnt_invert_checks      = "Keer selectie om";
$admin_lang_cmnt_del_selected       = "Verwijder geselecteerde";
$admin_lang_cmnt_page               = "reacties per pagina.";
$admin_lang_cmnt_commenter          = "Reactie:";
$admin_lang_cmnt_ip                 = "Van ip:";
$admin_lang_cmnt_save               = "Bewaar";
$admin_lang_cmnt_massdelete_text    = "Vink alle reacties aan die u in een keer wilt verwijderen";
$admin_lang_cmnt_js_del_comm        = "Weet u zeker dat u deze reactie wilt verwijderen?";
$admin_lang_cmnt_publish_sel        = "Publiceer geselecteerde";
$admin_lang_cmnt_unpublish_sel      = "Voeg toe aan moderation rij";
$admin_lang_cmnt_published          = "Gepubliceerd";
$admin_lang_cmnt_unpublished_cmnts  = "voorheen gemaskeerde reactie(s).";
$admin_lang_cmnt_unpublished        = "Gemaskeerd";
$admin_lang_cmnt_published_cmnts    = "voorheen gepubliceerde reacties(s).";
$admin_lang_cmnt_error_blacklist    = "Fout in het bijwerken van de zwarte lijst: ";
$admin_lang_cmnt_error_banlist      = "Fout in het bijwerken van de zwarte lijst met referrers: ";
$admin_lang_cmnt_moderation_que     = "Moderation rij";
$admin_lang_cmnt_rep_spam           = 'Meld als Spam';


// Option
$admin_lang_optn_general            = "GENERIEK";
$admin_lang_optn_template           = "TEMPLATE";
$admin_lang_optn_thumbnails         = "THUMBNAILS";
$admin_lang_optn_tip                = "Vergeet niet te eindigen met een slash <b>'/'</b> bijv. <i>http://www.pixelpost.org/</i>";

$admin_lang_optn_update             = "BIJWERKEN";
$admin_lang_optn_yes                = "Ja";
$admin_lang_optn_no                 = "Nee";

$admin_lang_optn_title_url         = "SITE TITEL EN URL";
$admin_lang_optn_title             = "Titel:";
$admin_lang_optn_sub_title         = "Sub Title:";
$admin_lang_optn_url               = "URL:";
$admin_lang_optn_usr_pss           = "ADMIN GEBRUIKER &amp; WACHTWOORD";
$admin_lang_optn_usr_pss_txt       = "Verander gebruikersnaam of wachtwoord?";
$admin_lang_optn_usr               = "Gebruiker:";
$admin_lang_optn_pss               = "Wachtwoord:";
$admin_lang_optn_pss_re            = "Bevestig Wachtwoord:";
$admin_lang_optn_email             = "ADMIN EMAIL";
$admin_lang_optn_fillit            = "Vul dit in, het wordt gebruikt wanneer u het wachtwoord niet meer weet.";
$admin_lang_optn_img_path          = "IMAGES & THUMBNAILS PATH";
$admin_lang_optn_tz                = "TIJDZONE";
$admin_lang_optn_tz_txt            = "Selecteer uw tijdzone (of de tijdzone van de server).";
$admin_lang_optn_sendemail         = "VERSTUUR EMAIL BIJ REACTIE";
$admin_lang_optn_sendemail_txt     = "Verstuur een email wanneer er een reactie is geplaatst?";
$admin_lang_optn_sendemail_html_txt = "gebruik HTML in email?";
$admin_lang_optn_comment_setting 		= "GLOBALE REACTIE INSTELLINGEN";
$admin_lang_optn_comment_setting2		= "Reactie instelling";
$admin_lang_optn_cmnt_mod_txt       = "Standaard actie voor reacties:";
$admin_lang_optn_cmnt_mod_txt2      = "Actie voor reacties:";
$admin_lang_optn_cmnt_mod_allowed		=	"Publiceer direct";
$admin_lang_optn_cmnt_mod_moderation=	"Naar moderation rij";
$admin_lang_optn_cmnt_mod_forbidden	=	"Schakel reacties uit";

$admin_lang_optn_switch_template    = "SWITCH TEMPLATE";
$admin_lang_optn_lang_file           = "TAAL BESTAND";
$admin_lang_optn_dateformat          = "DATUM FORMAAT";
$admin_lang_optn_dateformat_txt      = "Het datum formaat voor fotos en reacties. De syntax is gelijk aan die van PHP <a href='http://www.php.net/date' target='_blank'>date()</a> functie. Dit zijn voorbeelden van vervangbare items: Y:year m:month d:day H:hour i:minute s:second";
$admin_lang_optn_gmt                 = "Dit ondersteund de zomer/wintertijd niet.<br />Check <a href='http://www.worldtimeserver.com/current_time_in_UTC.aspx' target='__blank'> GMT Huidige tijd </a> als u niet weet wat het verschil is met uw tijdzone.<br />";
$admin_lang_optn_cat_link_format     = "CATEGORIE LINK FORMAAT";
$admin_lang_optn_catlinkformat_select = "Selecteer Categorie Link Formaat";
$admin_lang_optn_cat_link_format_txt  = "Het formaat om links weer te geven naar categorieën in de template.";
$admin_lang_optn_catlinkformat_custom = "Op maat gemaakte categorie formaat";
$admin_lang_optn_catlinkformat_custom_start = "Begin string:";
$admin_lang_optn_catlinkformat_custom_end = "Einde string:";
$admin_lang_optn_calendar_type       = "KALENDER TYPE";
$admin_lang_optn_thumb_row           = "THUMBNAILRIJ";
$admin_lang_optn_thumb_row_txt       = "Hoe veel thumbnails laten zien in de automatisch gegenereerde rij.<br/>Een oneven nummer geeft de beste resultaten, bijv. 7 of 9, niet 6 of 8.";
$admin_lang_optn_crop_thumbs         = "SNIJ THUMBNAILS BIJ?";
$admin_lang_optn_crop_thumbs_txt     = "Als u wil dat de thumbnails worden bijgesneden naar de exacte grootte, kies <b>JA.</b><br/>\n
                                        Als u de originele verhouding wilt behouden, kies <b>NEE.</b><br/>\n
                                        Als u de thumbnails handmatig wilt bijsnijden kies dan voor <b>12CropImage.</b>";
$admin_lang_optn_thumb_size          = "THUMBNAILS GROOTTE";
$admin_lang_optn_thumb_size_txt      = "Stel de thumbnail grootte in, Breedte x Hoogte.";
$admin_lang_optn_thumb_size_new      = "Stel nieuwe grootte in";
$admin_lang_optn_reg_thumbs_button   = "Genereer thumbs overnieuw";
$admin_lang_optn_regen_thumbs_txt    = "Dit genereereerd nieuwe thumbnails voor alle foto's. Alle handmatige bijgesneden thumbnails zullen worden vervangen. Via de 12cropimage optie tijdens het bewerken van de foto kunnen deze wel teruggezet worden.";
$admin_lang_optn_img_compression     = "THUMBNAIL COMPRESSIE";
$admin_lang_optn_img_compression_txt = "Welke JPG-compressie moet gebruikt worden? 10 is lage kwaliteit en 100 is maximale kwaliteit (geen verlies)";
$admin_lang_optn_pass_chngd_txt      = "Wachtwoord is veranderd.";
$admin_lang_optn_pass_notchngd_txt   = "Wachtwoord is niet veranderd. Typ het zelfde wachtwoord in het bevestigingsveld.";
$admin_lang_optn_title_url_text      = "Controleer of verander de Site titel en de URL of de installatie";
$admin_lang_optn_thumb_updated       = "Thumbnails bijgewerkt!";
$admin_lang_optn_updated             = "thumbnails bijgewerkt.";
$admin_lang_optn_visitorbooking_title = 'BOEK BEZOEKERS';
$admin_lang_optn_visitorbooking_desc  = 'Moet Pixelpost elke bezoeker inboeken?';
$admin_lang_optn_upd_done             = "Bijgewerkt.";
$admin_lang_optn_upd_error            = "Fout tijdens bijwerken.";
$admin_lang_optn_upd_lang_error			  = "De geselecteerde alternatieve taal is hetzelfde als de standaard taal.<br />Dit is onlogisch, dus kies of een andere alternatief of schakel de alternatieve taal uit.";
$admin_lang_optn_markdown             = "SCHAKEL MARKDOWN IN";
$admin_lang_optn_markdown_desc        = "Moet Pixelpost Markdown eigenschap inschakelen in de foto omschrijving?";
$admin_lang_optn_exif			            = "SCHAKEL EXIF IN";
$admin_lang_optn_exif_desc		        = "Moet Pixelpost EXIF eigenschap inschakelen op de voorpagina?";
$admin_lang_optn_token			          = "SCHAKEL TOKEN IN IN FORMULIEREN";
$admin_lang_optn_token_desc		        = "Wanneer een token gebruikt wordt verminderd dit de kans op een zogenaamde <a href=\"http://en.wikipedia.org/wiki/Cross-site_request_forgery\">Cross-Site Request Vervalsing</a><br/><br/>\n
																				 Als deze instelling is ingeschakeld zullen reacties alleen maar opgeslagen worden wanneer het token in de formulier overeenkomt met de gebruikerssessie. Om dit te implementeren moet u <strong>&lt;TOKEN&gt;</strong> toevoegen aan de reactie template bestand ergens tussen de <strong><i>&lt;form&gt;...&lt;/form&gt;</i></strong> tags.
																				 Indien u de <strong>&lt;TOKEN&gt;</strong> vergeet kan de gebruiker geen reacties achterlaten en krijgt een foutmelding te zien.<br /><br/>\n
																				 Moet deze instelling ingeschakeld worden?";
$admin_lang_optn_token_time						= "Maximum tijd in minuten tussen het open van de reactie venster en het opsturen van een reactie: ";
$admin_lang_optn_token_error					= "Opgelet: waarden kleiner dan 1 minuut voor de Token tijd zijn niet mogelijk. De Token tijd is ingesteld op het minimum van 1 minuut.";
$admin_lang_optn_dsbl_list 						= "DISTRIBUTED SENDER BLACKHOLE LIST INSTELLING (http://www.dsbl.org)";
$admin_lang_optn_dsbl_list_desc 			= "De <a href=\"http://www.dsbl.org\" target=\"_blank\">Distributed Sender Blackhole Lijst</a> bevat de IP adressen van servers die als een open relay, een open proxy fungeren of die andere beveligingsissues bevatten. Deze servers worden vaak misbruikt door SPAMMERS om e-mails te versturen maar soms ook voor het plaatsen van een reactie.<br /> <br />
																				 Moet het IP adres van een reactie gecontroleerd worden tegen de Distributed Sender Blackhole Lijst?";
$admin_lang_optn_time_between_comments = "VOORKOM SPAM VLOED";
$admin_lang_optn_time_between_comments_desc = "Aantal seconden waarna er weer een nieuwe reactie geplaatst kan worden (voorkomt SPAM vloed): ";
$admin_lang_optn_max_uri_comment			= "MAXIMUM AANTAL HYPERLINKS";
$admin_lang_optn_max_uri_comment_desc = "Aantal hyperlinks in een reactie: ";
$admin_lang_optn_rss_setting					= "RSS/ATOM FEED INSTELLINGEN";
$admin_lang_optn_rss_title  					= "Feed titel";
$admin_lang_optn_rss_desc   					= "Feed omschrijving";
$admin_lang_optn_rss_copyright					= "Feed copyright";
$admin_lang_optn_rss_discovery					= "Feed ontdekking";
$admin_lang_optn_rss_opt_both					= "RSS &amp; ATOM";
$admin_lang_optn_rss_opt_rss					= "RSS";
$admin_lang_optn_rss_opt_atom					= "ATOM";
$admin_lang_optn_rss_opt_ext					= "Externe";
$admin_lang_optn_rss_opt_none					= "Geen";
$admin_lang_optn_rss_ext_type					= "Externe feed type";
$admin_lang_optn_rss_ext						= "Externe feed";
$admin_lang_optn_rss_enable_comment_feed		= "Gebruik Reactie feeds";
$admin_lang_optn_rsstype_desc					= "Selecteer de style van de RSS/ATOM feed:";
$admin_lang_optn_rss_full							= "Laat volledige foto's zien";
$admin_lang_optn_rss_thumbs						= "Laat thumbnails zien";
$admin_lang_optn_rss_thumbs_only			= "Laat alleen thumbnails zien";
$admin_lang_optn_rss_full_only				= "Laat alleen de volledige foto zien";
$admin_lang_optn_rss_text							= "Laat alleen tekst zien";
$admin_lang_optn_feeditems_desc				= "Aantal items in de feedlijst: ";
$admin_lang_optn_alt_lang             = "Alternatieve taal instellingen: ";
$admin_lang_optn_alt_lang_dis         = "uitgeschakeld";
$admin_lang_optn_alt_lang_no          = "uitgeschakeld";


// Info
$admin_lang_info_gd                  = "Niet geïnstalleerd! Vraag uw hoster om dit te installeren.";
$admin_lang_info_gd_jpg              = "met JPEG ondersteuning";
$admin_lang_pp_version1              = "Laatste Pixelpost versie:";
$admin_lang_pp_forum                 = "Als u hulp nodig heeft of feedback wilt geven ga dan naar het Pixelpost Forum.";
$admin_lang_pp_min_php               = "Pixelpost's minimale vereiste: PHP versie";
$admin_lang_pp_min_mysql             = "Pixelpost's minimale vereiste: MySQL";
$admin_lang_pp_exif1                 = "<b>EXIF</b> Pixelpost gebruikt";
$admin_lang_pp_exif2                 = "voor EXIF-informatie";
$admin_lang_pp_path                  = "Paden";
$admin_lang_pp_imagepath             = "Gegokte foto pad:";
$admin_lang_pp_imagepath_conf        = "geconfigureerde foto pad:";
$admin_lang_pp_img_chmod1            = "Foto folder niet beschrijfbaar!";
$admin_lang_pp_img_chmod2            = "U moet op deze folder de juiste rechten zetten, anders kunt u geen foto's uploaden.";
$admin_lang_pp_img_chmod3            = "<br /> Stel de folder in op <b>chmod 777</b> (lees, schrijf en uitvoer rechten voor eigenaar, groep en de wereld).";
$admin_lang_pp_img_chmod4            = "Kunnen we schrijven in de folder? JA.";
$admin_lang_pp_img_chmod5            = "Thumbnails folder niet beschrijfbaar!";
$admin_lang_pp_imgfolder             = "Foto Directory:";
$admin_lang_pp_thumbfolder           = "Thumbnails Directory:";
$admin_lang_pp_langfolder            = "Taal Directory:";
$admin_lang_pp_addfolder             = "Addons Directory:";
$admin_lang_pp_incfolder             = "Includes Directory:";
$admin_lang_pp_tempfolder            = "Templates Directory:";
$admin_lang_pp_folder_missing        = "Bestaat niet (verwacht: ";
$admin_lang_pp_ref_log_title         = "Referrers van de laatste zeven dagen";
$admin_lang_hostinfo                 = "Host Informatie";
$admin_lang_fileuploads              = "<b>Bestandsuploads</b> naar Pixelpost site zijn";
$admin_lang_serversoft               = "Server Software";
$admin_lang_pixelpostinfo            = "Pixelpost Informatie";
$admin_lang_pp_currversion           = "U gebruikt Pixelpost version: ";
$admin_lang_pp_check                 = "Check";
$admin_lang_pp_sess_path             = "Session save pad";
$admin_lang_pp_sess_path_emp         = "is leeg";
$admin_lang_pp_fileupload_np         = 'NIET mogelijk! Controleer file_upload variable in php.ini file!';
$admin_lang_pp_fileupload_p          = 'mogelijk.';
$admin_lang_pp_langs                 = 'Pixelpost taal vertalingen';
$admin_lang_pp_lng_fname             = 'Bestands naam';
$admin_lang_pp_lng_author            = 'Auteur';
$admin_lang_pp_lng_ver               = 'Versie';
$admin_lang_pp_lng_email             = 'Email';
$admin_lang_pp_newest_ver            = 'U heeft de laatste versie van Pixelpost!';

// AddOns
$admin_lang_addon_title              = "Geïnstalleerde Addons";
$admin_lang_failed_addonstatus       = "De status bijwerken van een addon is mislukt: ";
$admin_lang_addon_off                = "Klik om UIT te zetten";
$admin_lang_addon_on                 = "Klik om AAN te zetten";

// Error Messages
$admin_lang_pp_up_error_0            = "Upload uitgevoerd zonder fouten.";
$admin_lang_pp_up_error_1            = "Maximum bestandsgrootte van de webserver overschreden.";
$admin_lang_pp_up_error_2            = "Maximum bestandsgrootte overschreden.";
$admin_lang_pp_up_error_3            = "Het bestand is niet volledig geplaatst.";
$admin_lang_pp_up_error_4            = "Er is geen bestand geplaatst.";
$admin_lang_pp_up_error_6            = "Er ontbreekt een tijdelijke folder.";
$admin_lang_pp_up_error_7            = "Niet instaat bestand weg te schrijven op de schijf.";


// options >> time stamps
$admin_lang_optn_timestamps_title  = "TIJDSTEMPEL";
$admin_lang_optn_timestamps_desc   = "Het toevoegen van een tijdstempel voorkomt het overschrijven van eerdere bestanden. <br/>
                                     Gebruik tijdstempel? ";

// options >> fight spam
$admin_lang_spam            = "SPAM CONTROLE";
$admin_lang_spam_change     = "Alle Blocklijsten";
$admin_lang_spam_err_1      = "Fout in het maken van de Blocklijst tabel: ";
$admin_lang_spam_tableadd   = "Blocklijst tabel is toegevoegd om SPAM te bestrijden";
$admin_lang_spam_err_2      = "Fout in bijwerken moderation list: ";
$admin_lang_spam_err_3      = "Fout in bijwerken blacklist: ";
$admin_lang_spam_err_4      = "Fout in bijwerken van de referrer ban list: ";
$admin_lang_spam_err_5      = "Fout in bijwerken het aantal geaccepteerde links in reacties : ";
$admin_lang_spam_upd        = "Alle Blocklijsten succesvol bijgewerkt";
$admin_lang_spam_err_6      = "Fout in bijwerken reacties bij het vergelijken van de moderation lijst: ";
$admin_lang_spam_com_upd    = "Past: reacties worden vergeleken met de moderation lijst ";
$admin_lang_spam_err_7      = "Fout in het verwijderen van de reacties wanneer er vergeleken wordt met de Blocklijsten: ";
$admin_lang_spam_com_del    = "Past: Reacties met woorden/IP nummers in de Blocklijsten zijn verwijderd.";
$admin_lang_spam_err_8      = "Fout in het verwijderen van bezoekers wanneer er vergeleken wordt met de bad-referrers-lijst: ";
$admin_lang_spam_visit_del  = "Bezoekers met woorden/IP nummers in de bad-referrer-lijst zijn verwijderd.";

// Spam
$admin_lang_spam_ban        = "Bijwerken Blocklijsten";
$admin_lang_spam_content    = "Voeg lijsten met woorden/IPs/namen toe aan de tekst-boxen hieronder, een woord per regel.<br/>\n
                               Elke reactie met een woord, een IP, of een naam in de moderation list zal naar de moderation rij gestuurd worden.<br/>\n
                               Elke reactie met een woord, een IP, of een naam in de Blocklijsten zal nooit opgeslagen worden.<br/>
                               Elke bezoeker met de IP in de <b>Referrer Banned Lijst</b> of met een adres welke woorden uit de blocklijsten bevat\n
                               zal geen toegang krijgen tot uw fotoblog. (U zult de code aan de .htaccess bestand moeten toevoegen om dit te laten werken!)";
$admin_lang_spam_modlist    = "Moderation Lijst";
$admin_lang_spam_blacklist  = "BlockLijsten";
$admin_lang_spam_reflist    = "Referrer Banned Lijst";
$admin_lang_spam_blacklist_text = "Copieer de code hieronder (CTRL+A en CTRL+C in Windows) en plak het in een de .htaccess bestand van uw website om IP adressen en woorden in een URL te blokkeren.";
$admin_lang_spam_htaccess_text = "Maak .htaccess code";
$admin_lang_spam_check_comm  = "Controleer oude reacties";
$admin_lang_spam_del_bad_comm = "Verwijder Slechte reacties";
$admin_lang_spam_del_bad_ref = "Verwijder Slechte Referrers";
$admin_lang_spam_updateblacklist = "Werk All Blocklijsten bij";

$admin_lang_dutch="Nederlands";
$admin_lang_english="Engels";
$admin_lang_french="Frans";
$admin_lang_german="Duits";
$admin_lang_italian="Italiaans";
$admin_lang_norwegian= "Noors";
$admin_lang_persian= "Perzisch";
$admin_lang_polish= "Pools";
$admin_lang_portuguese="Portugees";
$admin_lang_simplified_chinese="Chinese";
$admin_lang_spanish="Spaans";
$admin_lang_swedish= "Zweeds";
$admin_lang_japanese= "Japans";
$admin_lang_danish= "Deens";

// End of Admin-Language-File
?>