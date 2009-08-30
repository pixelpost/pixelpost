<?php
/*
Pixelpost version 1.7

SVN file version:
$Id: admin-lang-swedish.php 450 2007-10-22 00:00:42Z david.kozikowski $

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

$_lang_file_translator        		= 'Anders Hallkvist - <a href="http://flog.folkbitar.se/" target="_blank">flog.folkbitar.se</a>';
$_lang_file_email             		= 'anders [at] folkbitar.se';
$_lang_file_rev               		= '1.7';


$admin_lang_isrtl             					= "nej"; // yes for right-to-left languages and no for left-to-right languages
$admin_lang_update            					= "Uppdatera";
$admin_lang_reload            					= "<br /> Du kanske beh&ouml;ver ladda om sidan f&ouml;r att se &auml;ndringarna.";
$admin_lang_error             					= "Fel";
$admin_lang_post              					= "poster";
$admin_lang_page              					= "sida";
$admin_lang_of                					= "av";
$admin_lang_next              					= "N&auml;sta";
$admin_lang_prev              					= "F&ouml;reg&aring;ende";
$admin_lang_show              					= "Visa";
$admin_lang_go                					= "K&ouml;r!";
$admin_lang_done              					= "Klart:";
$admin_lang_example								= "Exempel";


// Admin Start
$admin_start_1                					= "Det finns ingen <b>spr&aring;k</b>mapp eller s&aring; saknas";
$admin_start_2                					= "filen i den mappen.\n<br />Se till att du har laddat upp alla n&ouml;dv&auml;ndiga filer och att dom har exakt samma namn som beskrivs h&auml;r.";
$admin_start_userpw           					= "Anv&auml;ndarnamn eller l&ouml;senord &auml;r felaktigt.";
$admin_start_pw_forgot        					= "Har du gl&ouml;mt ditt l&ouml;senord?";
$admin_start_browser_title    					= "ADMIN";
$admin_start_welcome          					= "V&auml;lkommen till Pixelposts Admin - Du beh&ouml;ver logga in.";
$admin_start_pp_name          					= "L&auml;nk till din fotoblogg:";
$admin_start_pp_tit           					= "klicka h&auml;r f&ouml;r att ladda din fotoblogg";
$admin_start_cookie           					= "En cookie skapas n&auml;r du loggar in";
$admin_start_username         					= "Anv&auml;ndarnamn:";
$admin_start_pw               					= "L&ouml;senord:";
$admin_start_pw_button        					= "Skicka mej mitt nya l&ouml;senord";
$admin_start_pw_recover       					= "Det finns <span style='color:red;'><b>inget s&auml;tt att &aring;terst&auml;lla din gamla l&ouml;senord</b></span> men Pixelpost kan
                                 				skapa ett nytt, slumpm&auml;ssigt l&ouml;senord &aring;t dej.\n<br />
                                 				Skriv den epost-adress du har angett i admin-delen.
                                 				<br />Du kommer omg&aring;ende att f&aring; ett nytt l&ouml;senord med epost.";
$admin_start_email            					= "Epost-adress:";
$admin_start_email_button     					= "Skriv din epost-adress";
$admin_start_admin_1          					= "Administration";
$admin_start_admin_2          					= "f&ouml;r";
$admin_start_remember         					= "Logga in mej automatiskt vid varje bes&ouml;k:";

// Password Recovery

// Front Page
$admin_lang_pw_title            				= "&Aring;terst&auml;llning f&ouml;r Pixelpost l&ouml;senord";

$admin_lang_pw_wronguser        				= "Det anv&auml;ndarnamn du angav &auml;r inte detsamma som f&ouml;r administrat&ouml;ren av Pixelpost.";
$admin_lang_pw_back             				=  "Tillbaka till adminsidan";
$admin_lang_pw_noemail          				= "Du skrev ingen epostadress! \n<br />
                                   				Om du fullst&auml;ndigt har gl&ouml;mt bort ditt l&ouml;senord kan du skriva ett meddelande i <a href='http://forum.pixelpost.org/'>Pixelposts forum</a>.\n<br />";
$admin_lang_pw_notsent          				= "Inget skickades! \n<br /> Epost-adressen du angav st&auml;mmer inte &ouml;verens med den du har angett i admin-panelen.<br />";
$admin_lang_pw_subject          				= "Meddelande fr&aring;n Pixelpost, &aring;terwst&auml;llning av l&ouml;senord";
$admin_lang_pw_usertext         				= "Ditt anv&auml;ndarnamn:";
$admin_lang_pw_mailtext         				= "Din epost-adress:";
$admin_lang_pw_newpw            				= "Ditt nya l&ouml;senord:";
$admin_lang_pw_text_1           				= "&Aring;terst&auml;llning av l&ouml;senord till Pixelpost";
$admin_lang_pw_text_2           				= "Fr&aring;n: Pixelpost admin";
$admin_lang_pw_text_3           				= "Ditt anv&auml;ndarnamn och ett nytt l&ouml;senord har skickats till din epost-adress. \n<br />  Kontrollera din epost-adress.";
$admin_lang_pw_text_4           				= "<span style='color:red;'>Ett fel uppstod! \n<br />Epost-adressen och anv&auml;ndarnamnet du angav &auml;r OK men det gick inte att skicka n&aring;gon epost! \n<br />Be supporten p&aring; ditt webbhotell om hj&auml;lp</span>";
$admin_lang_pw_text_5           				= "Databasfel:";
$admin_lang_pw_text_6           				= "<br />Uppdatering av det nya l&ouml;senordet misslyckades.";
$admin_lang_pw_text_7           				= "Den h&auml;r eposten &auml;r skickad automatiskt fr&aring;n loginsidan p&aring; din fotoblogg.\nN&aring;gon har beg&auml;rt ett nytt l&ouml;senord till administrationen.\n\nDu b&ouml;r omg&aring;ende logga in p&aring; din fotoblogg\n\nat ";
$admin_lang_pw_text_8           				= "\n\nand med det nya l&ouml;senordet och &aring;terst&auml;lla detta automatisk genererade \n\l&ouml;senord!";

// Admin Menu
$admin_lang_new_image          					= "Ny bild";
$admin_lang_images             					= "Bilder";
$admin_lang_categories         					= "Kategorier";
$admin_lang_comments           					= "Kommentarer";
$admin_lang_options            					= "Alternativ";
$admin_lang_general_info       					= "Allm&auml;n info";
$admin_lang_addons             					= "Till&auml;gg";
$admin_lang_logout             					= "Logga ut";

// New Image
$admin_lang_ni_post_a_new_image   				= "Posta en ny bild";
$admin_lang_ni_image              				= "Bild";
$admin_lang_ni_image_title        				= "Titel";
$admin_lang_ni_select_cat         				= "V&auml;lj kategorier / Nyckelord";
$admin_lang_ni_description        				= "Bildbeskrivning / text";
$admin_lang_ni_datetime           				= "Datum och tid f&ouml;r posten";
$admin_lang_ni_post_now           				= "Posta nu";
$admin_lang_ni_post_one_day_after 				= "Posta en dag efter senaste posten";
$admin_lang_ni_post_spec_date     				= "Posta ett speciellt datum. Ange datumet nedan:";
$admin_lang_ni_post_entry         				= "Posta bilden";
$admin_lang_ni_upload             				= "Ladda upp";
$admin_lang_ni_upload_error       				= "N&aring;gonting &auml;r fel i uppladdningen!";
$admin_lang_ni_posted             				= "POSTAD";
$admin_lang_ni_year               				= "&aring;r";
$admin_lang_ni_month              				= "m&aring;nad";
$admin_lang_ni_day                				= "dag";
$admin_lang_ni_hour               				= "timme";
$admin_lang_ni_min                				= "minut";
$admin_lang_ni_markdown_text      				= "Anv&auml;nd Markdown eller HTML f&ouml;r att formatera texten i detta f&auml;ltet.";
$admin_lang_ni_markdown_hp        				= "Markdowns webbplats";
$admin_lang_ni_markdown_element   				= "Grundl&auml;ggande";
$admin_lang_ni_markdown_syntax    				= "Syntax Reference";
$admin_lang_ni_missing_data      				= "Det fattas information<br />\nDu m&aring;ste &aring;tminstone ange ett namn p&aring; bilden och du m&aring;ste ange en bild.\n
                                     			Observera att ingen bild laddades upp pga n&ouml;dv&auml;ndig information saknades!";
$admin_lang_ni_crop_nextstep      				= "Nu ska du v&auml;lja f&ouml;sntret med tumnaglar:";
$admin_lang_ni_crop_background    				= "Det h&auml;r &auml;r bakgrunden till bilden du vill besk&auml;ra";
$admin_lang_ni_post_exif_date     				= "Anv&auml;nd exif-data";
$admin_lang_ni_db_error           				= "ett fel uppstod vid skrivning till databasen";
$admin_lang_ni_tags               				= "Taggar";
$admin_lang_ni_tags_desc          				= "(Anv&auml;nd komma, semikolon och mellanslag f&ouml;r att separera taggarna. Anv&auml;nd understrykningstecken eller bindestreck f&ouml;r att sammanfoga ord)";
$admin_lang_ni_alt_language						= "Ange bildnamn och beskrivning f&ouml;r det alternativa spr&aring;ket";

// Images
$admin_lang_imgedit_edit           				= "&Auml;ndra";
$admin_lang_imgedit_title          				= "Namn:";
$admin_lang_imgedit_alttitle          			= "Alternativt namn:";
$admin_lang_imgedit_file_name      				= "Filnamn:";
$admin_lang_imgedit_dimensions     				= "Dimensioner:";
$admin_lang_imgedit_tbpublished    				= "Publiceras:";
$admin_lang_imgedit_category_plural 			= "Kategorier:";
$admin_lang_imgedit_delete          			= "Ta bort";
$admin_lang_imgedit_delete1         			= "Borttagen";
$admin_lang_imgedit_delete2         			= "vald(a) bild(er).";
$admin_lang_imgedit_deleted         			= "Ta bort post / Ta bort bild / Ta bort tumnagel";
$admin_lang_imgedit_deleted1        			= "Post borttagen.";
$admin_lang_imgedit_deleted2        			= "Bild borttagen.";
$admin_lang_imgedit_delete_error    			= "Kunde inte ta bort bildeflien.\n
                                       			Du m&aring;ste ta bort manuellt, t ex med ditt ftp-program.";
$admin_lang_imgedit_deleted3        			= "Tumnagel borttagen.";
$admin_lang_imgedit_delete_error2   			= "Kunde inte ta bort tumnagelfilen.\n
                                       			Du m&aring;ste ta bort manuellt, t ex med ditt ftp-program.";
$admin_lang_imgedit_reupimg         			= "Ladda upp bilder igen:";
$admin_lang_imgedit_file            			= "Fil: ";
$admin_lang_imgedit_file_isuploaded 			= "har laddats upp igen!";
$admin_lang_imgedit_update          			= "Uppdatering bild";
$admin_lang_imgedit_updated         			= "Bild uppdaterad";
$admin_lang_imgedit_txt_desc        			= "Text/beskrivning:";
$admin_lang_imgedit_dtime           			= "Datum-tid:";
$admin_lang_imgedit_img             			= "Bild:";
$admin_lang_imgedit_fsize           			= "Filstorlek:";
$admin_lang_imgedit_12cropimg       			= "Verktyg f&ouml;r CropImage:";
$admin_lang_imgedit_12cropimg_txt   			= "F&ouml;r att g&ouml;ra en tumnageln till detta foto drar du med musen i f&ouml;nstret eller s&aring; anv&auml;nder du knapparna '+'/'-' f&ouml;r att &ouml;ka eller minska bilden:";
$admin_lang_imgedit_uthmb_button    			= "Uppdatera tumnagel";
$admin_lang_imgedit_u_post_button   			= "Uppdatera post";
$admin_lang_imgedit_title1          			= "Bilder - Ladda upp igen, &auml;ndra eller ta bort || ";
$admin_lang_imgedit_title2          			= " bild(er) i databasen \n<br /> Visar ";
$admin_lang_imgedit_title3          			= " poster, sida ";
$admin_lang_imgedit_title4          			= " av ";
$admin_lang_imgedit_12crop_opt      			= "<strong>Obs:</strong> 12CropImage &auml;r inte valt f&ouml;r besk&auml;rning av tumnaglar. D&auml;rf&ouml;r g&aring;r dom inte att &auml;ndra.";
$admin_lang_imgedit_edit_post       			= "&Auml;NDRA POST";
$admin_lang_imgedit_img_page        			= "bilder per sida";
$admin_lang_imgedit_cropbg          			= "Detta &auml;r bakgrundstexten p&aring; 12cropimage";
$admin_lang_imgedit_js_del_im       			= "&Auml;r du s&auml;ker p&aring; att du vill ta bort bilden?";
$admin_lang_imgedit_preview         			= "F&ouml;rhandstitt";
$admin_lang_imgedit_db_error        			= "<br />Check if permalink string isn't used so far!";
$admin_lang_imgedit_tags_edit       			= "Taggar (Anv&auml;nd komma, semikolon och mellanslag f&ouml;r att separera taggarna; Anv&auml;nd understrykningstecken f&ouml;r att sammanfoga ord):";
$admin_lang_imgedit_alt_language  				= "&Auml;ndra bildnamn och beskrivning f&ouml;r det alternativa spr&aring;ket";
$admin_lang_imgedit_masstag  	      			= "&Auml;ndra/ta bort taggar till vald bild";
$admin_lang_imgedit_masstag_set     			= "L&auml;gg till tagg(ar)";
$admin_lang_imgedit_masstag_set2    			= "L&auml;gg till tagg(ar) f&ouml;r det alternativa spr&aring;ket";
$admin_lang_imgedit_masstag_unset   			= "Ta bort tagg(ar)";
$admin_lang_imgedit_published          			= "Publicerad";
$admin_lang_imgedit_unpublished_cmnts  			= "tidigare opublicerade bilder.";


// Mass-Edit Categories
$admin_lang_imgedit_mass_1          			= "&Auml;ndra flera kategorier";
$admin_lang_imgedit_mass_2          			= "Tilldela";
$admin_lang_imgedit_mass_3          			= "Ta bort tilldelning";
$admin_lang_imgedit_mass_4          			= "Uppdatera flera";


// Categories
$admin_lang_cats_add_cat            			= "L&auml;gg till kategori";
$admin_lang_cats_added              			= "Kategori tillagd.";
$admin_lang_cats_add_cat_txt        			= "L&auml;gg till en kategori som du kan tilldela bilder.";
$admin_lang_cats_add_cat_txt_altlang			= "Ange &ouml;vers&auml;ttning till kategorien ovan.";
$admin_lang_cats_edit_cat           			= "&Auml;ndra kategorier";
$admin_lang_cats_edit_cat_txt       			= "&Auml;ndra en kategori";
$admin_lang_cats_edit_cat_button    			= "&Auml;ndra kategori";
$admin_lang_cats_edit_tip           			= "&Auml;ndra namnet, p&aring; b&aring;da spr&aring;ken, p&aring; f&ouml;ljande kategori.<br />Alla bilder som tillh&ouml;r kategorin med det gamla namnet kommer att tillh&ouml;ra den kategori med det nya namnet du anger.";
$admin_lang_cats_delete_cat         			= "Ta bort kategorier";
$admin_lang_cats_delete_cat_txt     			= "Ta bort en kategori";
$admin_lang_cats_delete_cat2        			= "Borttagning:";
$admin_lang_cats_delete_cats_button 			= "Ta bort kategori";
$admin_lang_cats_deleted            			= "Kategori borttagen.";
$admin_lang_cats_update             			= "Uppdatera kategori";
$admin_lang_cats_update_cat_button  			= "Uppdatera kategori";
$admin_lang_cats_updated            			= "Uppdatera kategori med nytt namn.";


// Comments
$admin_lang_cmnt_commentlist        			= "Lista med kommentarer - ta bort eller &auml;ndra&nbsp;||&nbsp;Visar";
$admin_lang_cmnt_name               			= "Namn:";
$admin_lang_cmnt_email              			= "Epost-adress:";
$admin_lang_cmnt_comment            			= "Kommentar:";
$admin_lang_cmnt_image              			= "Bild";
$admin_lang_cmnt_delete             			= "Ta bort";
$admin_lang_cmnt_deleted            			= "Tog bort en kommentar.";
$admin_lang_cmnt_delete1            			= "Borttagen";
$admin_lang_cmnt_delete2            			= "Vald(a) kommentar(er).";
$admin_lang_cmnt_edit               			= "&Auml;ndra";
$admin_lang_cmnt_edited             			= "&Auml;ndra en kommentar.";
$admin_lang_cmnt_check_all          			= "Markera/Avmarkera flera";
$admin_lang_cmnt_invert_checks      			= "Invertera markeringar";
$admin_lang_cmnt_del_selected       			= "Ta bort markerade";
$admin_lang_cmnt_page               			= "kommentarer per sida.";
$admin_lang_cmnt_commenter          			= "Kommentar gjord:";
$admin_lang_cmnt_ip                 			= "Fr&aring;n ip-nummer:";
$admin_lang_cmnt_save               			= "Spara";
$admin_lang_cmnt_massdelete_text    			= "Markera alla kommentarer som du vill ta bort med en g&aring;ng";
$admin_lang_cmnt_js_del_comm        			= "&Auml;r du s&auml;ker p&aring; att du vill ta bort den h&auml;r kommentaren?";
$admin_lang_cmnt_publish_sel        			= "Publicera markerade";
$admin_lang_cmnt_unpublish_sel      			= "L&auml;gg i  modereringsk&ouml;";
$admin_lang_cmnt_published          			= "Publicerad";
$admin_lang_cmnt_unpublished_cmnts  			= "tidigare opublicerade kommentarer.";
$admin_lang_cmnt_unpublished        			= "Opublicerad";
$admin_lang_cmnt_published_cmnts    			= "tidigare publicerade kommentarer.";
$admin_lang_cmnt_error_blacklist    			= "Error in updating the blacklist: ";
$admin_lang_cmnt_error_banlist      			= "Error in updating the referrer ban list: ";
$admin_lang_cmnt_moderation_que     			= "Modereringsk&ouml;";
$admin_lang_cmnt_rep_spam           			= 'Rapportera spam';
$admin_lang_cmnt_submenu1									= "KOMMENTARER";
$admin_lang_cmnt_submenu2									= "V&Auml;NTAR P&Aring; MODERERING";

// Option
$admin_lang_optn_general            			= "ALLM&Auml;NT";
$admin_lang_optn_template           			= "SIDMALL";
$admin_lang_optn_thumbnails         			= "TUMNAGLAR";
$admin_lang_optn_tip                			= "Gl&ouml;m inte bort den avslutnade slashen <b>'/'</b> dvs <i>http://www.pixelpost.org/</i>";

$admin_lang_optn_update             			= "UPPDATERA";
$admin_lang_optn_yes                			= "Ja";
$admin_lang_optn_no                 			= "Nej";

$admin_lang_optn_title_url         				= "SIDANS NAMN OCH ADRESS";
$admin_lang_optn_title             				= "Namn:";
$admin_lang_optn_sub_title         				= "Undertitel:";
$admin_lang_optn_url               				= "ADRESS:";
$admin_lang_optn_usr_pss           				= "ADMIN ANV&Auml;NDARNAMN &amp; L&Ouml;SENORD";
$admin_lang_optn_usr_pss_txt       				= "&Auml;ndra anv&auml;ndarnamn och l&ouml;senord?";
$admin_lang_optn_usr               				= "Anv&auml;ndarnamn:";
$admin_lang_optn_pss               				= "L&ouml;senord:";
$admin_lang_optn_pss_re            				= "Bekr&auml;fta l&ouml;senordet:";
$admin_lang_optn_email             				= "ADMIN EPOS-ADRESS";
$admin_lang_optn_fillit            				= "Fyll i den. Den kommer att anv&auml;ndar om du beh&ouml;ver &aring;terst&auml;lla ditt l&ouml;senord.";
$admin_lang_optn_img_path          				= "S&Ouml;KV&Auml;GAR TILL BILDER &amp; TUMNAGLAR";
$admin_lang_optn_tz                				= "TIDZON";
$admin_lang_optn_tz_txt            				= "V&auml;lj din tidzon.";
$admin_lang_optn_sendemail         				= "SKICKA EPOST N&Auml;R KOMMENTAR G&Ouml;RS";
$admin_lang_optn_sendemail_txt    				= "Skicka epostmeddelande n&auml;r kommentarer g&ouml;rs?";
$admin_lang_optn_sendemail_html_txt 			= "anv&auml;nd HTML i meddelandena?";
$admin_lang_optn_comment_setting 				= "GLOBALA INST&Auml;LLNIGAR F&Ouml;R KOMMENTARER";
$admin_lang_optn_comment_setting2				= "Inst&auml;llning f&ouml;r kommentarer";
$admin_lang_optn_cmnt_mod_txt       			= "Default action for comments:";
$admin_lang_optn_cmnt_mod_txt2      			= "Action for comments:";
$admin_lang_optn_cmnt_mod_allowed				= "Publicera omg&aring;ende";
$admin_lang_optn_cmnt_mod_moderation			= "L&auml;gg i modereringsk&ouml;";
$admin_lang_optn_cmnt_mod_forbidden				= "St&auml;ng av kommentarer";

$admin_lang_optn_switch_template    			= "BYT SIDMALL";
$admin_lang_optn_lang_file           			= "SPR&Aring;KFIL";
$admin_lang_optn_lang_file_admin          		= "SPR&Aring;KFIL F&Ouml;R ADMINPANELEN";
$admin_lang_optn_dateformat          			= "DATUMFORMAT";
$admin_lang_optn_dateformat_txt      			= "Datumformat vid visnings av bilder och kommentarer. Syntaxen som anv&auml;nds &auml;r densamma som f&ouml;r PHP <a href='http://www.php.net/date' target='_blank'>date()</a> function. Detta &auml;r n&aring;gra exempel p&aring; vad som skulle kunna ers&auml;tta n&aring;gra vanliga inst&auml;llningar: Y:&aring;r m:m&aring;nad d:dag H:timme i:minut s:sekund";
$admin_lang_optn_gmt                 			= "Observera att sommar/vintertid inte st&ouml;ds automatiskt och du m&aring;ste d&auml;rf&ouml;r &auml;ndra till det manuellt.<br />Kontrollera p&aring; <a href='http://www.worldtimeserver.com/current_time_in_UTC.aspx' target='__blank'> UTC Current time </a> om du &auml;r os&auml;ker p&aring; din tidzon.<br />";
$admin_lang_optn_cat_link_format     			= "FORMAT F&Ouml;R KATEGORIEL&Auml;NKAR";
$admin_lang_optn_catlinkformat_select 			= "V&auml;lj format f&ouml;r kategoril&auml;nkar";
$admin_lang_optn_cat_link_format_txt  			= "Format f&ouml;r l&auml;nkar till kategorier som visas i sidmallen.";
$admin_lang_optn_catlinkformat_custom 			= "Standardformat f&ouml;r kategori";
$admin_lang_optn_catlinkformat_custom_start		= "B&ouml;rjar str&auml;ng:";
$admin_lang_optn_catlinkformat_custom_end 		= "Avslutar str&auml;ng:";
$admin_lang_optn_calendar_type       			= "TYP AV KALENDER";
$admin_lang_optn_thumb_row           			= "RAD MED TUMNAGLAR";
$admin_lang_optn_thumb_row_txt       			= "Hur m&aring;nga tumnaglar ska visas i den automatiskt skapade raden?.<br/>Anv&auml;nd ett oj&auml;mt antal f&ouml;r b&auml;sta resultat, t ex 7 eller 9, inte 6 eller 8.";
$admin_lang_optn_crop_thumbs         			= "BESK&Auml;RA TUNAGLAR?";
$admin_lang_optn_crop_thumbs_txt     			= "Om du vill, s&aring; kan tumnaglar besk&auml;ras med exakta m&aring;tt: v&auml;lj <b>JA.</b><br/>\n
                                        		Om du vill beh&aring;lla orginalproportionerna ska du v&auml;lja <b>NEJ.</b><br/>\n
                                        		Om du vill besk&auml;ra tumnaglarna manuellt efter det att du laddat upp bilden, v&auml;lj <b>12CropImage.</b>";
$admin_lang_optn_thumb_size          			= "STORLEK P&Aring; TUMNAGLAR";
$admin_lang_optn_thumb_size_txt      			= "St&auml;ll in storlek p&aring; tumnaglar, bredd x h&ouml;jd.";
$admin_lang_optn_thumb_size_new      			= "st&auml;ll in nya storlekar";
$admin_lang_optn_reg_thumbs_button   			= "&Aring;terskapa tumnaglar";
$admin_lang_optn_regen_thumbs_txt    			= "Det h&auml;r skapar nya tumnaglar fr&aring;n alla postade bilder. Alla manuellt beskurna bilder kommer att g&aring; f&ouml;rlorade, men du kan &auml;ndra tumnageln med verktyget 12CropImage n&auml;r du &auml;ndrar en bild.";
$admin_lang_optn_img_compression     			= "KVALITET P&Aring; TUMNAGEL";
$admin_lang_optn_img_compression_txt 			= "Hur h&aring;rt vill du komprimera din jpg-bild? 10 &auml;r l&aring;g kvalitet och 100 &auml;r h&ouml;g (ingen f&ouml;rslust)";
$admin_lang_optn_thumb_sharp              = "SK&Auml;RPA P&Aring; TUMNAGLAR";
$admin_lang_optn_thumb_sharp_txt          = "Hur skarp vill du att tumnaglen ska vara?";
$admin_lang_optn_thumb_sharp0             = 'Ingen sk&auml;rpa';
$admin_lang_optn_thumb_sharp1             = 'L&auml;tt';
$admin_lang_optn_thumb_sharp2             = 'Medium';
$admin_lang_optn_thumb_sharp3             = 'H&ouml;g';
$admin_lang_optn_thumb_sharp4             = 'Ultra-h&ouml;g';
$admin_lang_optn_pass_chngd_txt      			= "L&ouml;senordet &auml;r &auml;ndrat.";
$admin_lang_optn_pass_notchngd_txt   			= "L&ouml;senordet &auml;ndrades inte. Skriv in samma l&ouml;sen ord i rutan f&ouml;r l&ouml;senordsbekr&auml;ftlese.";
$admin_lang_optn_title_url_text      			= "Kontrollera eller &auml;ndra sidan namn, undertitel och adressen till till installation";
$admin_lang_optn_thumb_updated       			= "Tumnaglar uppdaterade!";
$admin_lang_optn_updated             			= "Tumnaglar uppdaterade.";
$admin_lang_optn_visitorbooking_title 			= 'SPARA BES&Ouml;KARE';
$admin_lang_optn_visitorbooking_desc  			= 'Ska Pixelpost spara information om varje bes&ouml;kare?';
$admin_lang_optn_upd_done             			= "Uppdatering klar.";
$admin_lang_optn_upd_error            			= "Fel vid uppdatering.";
$admin_lang_optn_upd_lang_error		  			= "Spr&aring;ket du valt som alternativ &auml;r detsamma som standardspr&aring;ket.<br />V&auml;lj ett annat alternativt spr&aring;k eller avmarkera alternativet f&ouml;r alternativt spr&aring;k.";
$admin_lang_optn_markdown             			= "AKTIVERA MARKDOWN";
$admin_lang_optn_markdown_desc        			= "Ska Pixel post aktivera Markdown feature f&ouml;r bildbeskrivningar?";
$admin_lang_optn_exif			        		= "AKTIVERA EXIF";
$admin_lang_optn_exif_desc		        		= "Ska Pixelpost aktivera Exif feature p&aring; startsidan?";
$admin_lang_optn_token			        		= "AKTIVERA TOKEN I FORMUL&Auml;R";
$admin_lang_optn_token_desc		        		= "Om du anv&auml;nder Token s&aring; kommer sannolikheten f&ouml;r <a href=\"http://en.wikipedia.org/wiki/Cross-site_request_forgery\">Cross-Site Request Forgeries</a> att minska<br/><br/>\n
												Om den h&auml;r inst&auml;llningen &auml;r aktiverad s&aring; kommer kommentarer bara sparas om Token-f&auml;ltet st&auml;mmer &ouml;vernes med det i din anv&auml;ndarsession. F&ouml;r att l&auml;gga till funktionen p&aring; din fotoblogg s&aring; m&aring;ste du l&auml;gga till Pixelpost-taggen <strong>&lt;TOKEN&gt;</strong> i sidmallen f&ouml;r kommentarer. Placera den n&aring;gonstans mellan <strong><i>&lt;form&gt;...&lt;/form&gt;</i></strong> taggarna.
												Om du gl&ouml;mmer bort <strong>&lt;TOKEN&gt;</strong>-taggen s&aring; kommer dina bes&ouml;kare inte att kunna l&auml;gga till kommentarer. Ett felmeddelande kommer ist&auml;llet att visas.<br /><br/>\n
												Vill du aktivera den h&auml;r inst&auml;llningen?";
$admin_lang_optn_token_time						= "Maxtid, i minuter, mellan det att kommentarf&ouml;nsret &ouml;ppnas och det att en kommentar postas: ";
$admin_lang_optn_token_error					= "Obs: v&auml;rden mindre &auml;n 1 minut &auml;r inte m&ouml;jligt. Tiden f&ouml;r Token-funktionen har &aring;terst&auml;llts til 1 minut.";
$admin_lang_optn_dsbl_list 						= "DISTRIBUTED SENDER BLACKHOLE LIST SETTING (http://www.dsbl.org)";
$admin_lang_optn_dsbl_list_desc 				= "<a href=\"http://www.dsbl.org\" target=\"_blank\">Distributed Sender Blackhole List</a> inneh&aring;ller IP-adresser p&aring; servrar som st&aring;r &ouml;ppna, har en &ouml;ppen proxy eller har andra s&aring;rbarheter. Dessa servar utnyttjas ofta av spammare f&ouml;r att skicka epost, men &auml;r ocks&aring; k&auml;nda f&ouml;r att posta kommentarer.<br /> <br />
																				 Ska IP-adressen p&aring; konnentarerna kontrolleras mot Distributed Sender Blackhole List?";
$admin_lang_optn_time_between_comments 			= "F&Ouml;RHINDRA SPAMFLOD";
$admin_lang_optn_time_between_comments_desc 	= "Antal sekunder innan en ny kommentar kan postas (f&ouml;r att f&ouml;rhindra floder): ";
$admin_lang_optn_max_uri_comment				= "MAX ANTAL URI";
$admin_lang_optn_max_uri_comment_desc 			= "Antal URI som till&aring;ts i en kommentar: ";

$admin_lang_optn_rss_setting					= "INST&Auml;LLNINGAR F&Ouml;R RSS/ATOM FEED";
$admin_lang_optn_rss_title  					= "Feed - titel";
$admin_lang_optn_rss_desc   					= "Feed - beskrivning";
$admin_lang_optn_rss_copyright					= "Feed - copyright";
$admin_lang_optn_rss_discovery					= "Feed discovery";
$admin_lang_optn_rss_opt_both					= "RSS &amp; ATOM";
$admin_lang_optn_rss_opt_rss					= "RSS";
$admin_lang_optn_rss_opt_atom					= "ATOM";
$admin_lang_optn_rss_opt_ext					= "Extern";
$admin_lang_optn_rss_opt_none					= "Ingen";
$admin_lang_optn_rss_ext_type					= "Extern feed type";
$admin_lang_optn_rss_ext						= "Extern feed";
$admin_lang_optn_rss_enable_comment_feed		= "Aktivera feeds f&ouml;r kommentarer";
$admin_lang_optn_rsstype_desc					= "Ange stilen f&ouml;r RSS/ATOM feed:";
$admin_lang_optn_rss_full						= "Visa bilder i fullstorlek";
$admin_lang_optn_rss_thumbs						= "Visa tumnaglar";
$admin_lang_optn_rss_thumbs_only				= "Visa endast tumnaglar";
$admin_lang_optn_rss_full_only					= "Visa endast bilder i fullstorlek";
$admin_lang_optn_rss_text						= "Visa endast text";
$admin_lang_optn_feeditems_desc					= "Antal punkter i feedlistan: ";
$admin_lang_optn_lang                  			= "Inst&auml;llning f&ouml;r spr&aring;k: ";
$admin_lang_optn_alt_lang             			= "Inst&auml;llning f&ouml;r alternativt spr&aring;k: ";
$admin_lang_optn_alt_lang_dis         			= "avaktiverad";
$admin_lang_optn_alt_lang_no          			= "avaktiverad";
$admin_lang_optn_img_display						="VISNINGSORDNING AV BILDER";
$admin_lang_optn_img_display_desc				="V&auml;lj hur bilderna ska sorteras f&ouml;r visnings. Sortera efter: ";
$admin_lang_optn_img_display_default		="fallande ordning";
$admin_lang_optn_img_display_reversed		="stigande ordning";

// Info
$admin_lang_info_gd                  			= "Inte installerad, be ditt webbhotell att installerade det &aring;t dej!";
$admin_lang_info_gd_jpg              			= "med JPEG-support";
$admin_lang_pp_version1              			= "Senaste versionen av Pixelpost:";
$admin_lang_pp_forum                 			= "Surfa till Pixelposts forum om du beh&ouml;ver hj&auml;lp eller vill ge feedback.";
$admin_lang_pp_min_php               			= "Pixelposts minimum systemkrav: PHP, version";
$admin_lang_pp_min_mysql             			= "Pixelposts minimum systemkrav: MySQL";
$admin_lang_pp_exif1                 			= "<b>EXIF</b> Pixelpost anv&auml;nder";
$admin_lang_pp_exif2                 			= "f&ouml;r EXIF-information";
$admin_lang_pp_path                  			= "S&ouml;kv&auml;gar";
$admin_lang_pp_imagepath             			= "Gissad s&ouml;kv&auml;g f&ouml;r bilder:";
$admin_lang_pp_imagepath_conf        			= "Konfigurerad s&ouml;kv&auml;g f&ouml;r bilder:";
$admin_lang_pp_img_chmod1            			= "Mappen f&ouml;r bilder &auml;r inte skrivbar!";
$admin_lang_pp_img_chmod2            			= "Du m&aring;ste st&auml;lla in korrekta r&auml;ttigheter p&aring; mappen. Annars kommer du inte att kunna ladda upp n&aring;gra bilder.";
$admin_lang_pp_img_chmod3            			= "<br /> St&auml;ll in mappen p&aring; <b>chmod 777</b> (read, write and execute permissions for owner, group and world).";
$admin_lang_pp_img_chmod4            			= "Kan vi skriva till mappen? JA.";
$admin_lang_pp_img_chmod5            			= "Mappen f&ouml;r tumnaglar &auml;r inte skrivbar!";
$admin_lang_pp_imgfolder             			= "Mapp f&ouml;r bilder:";
$admin_lang_pp_thumbfolder           			= "Mapp f&ouml;r tumnaglar:";
$admin_lang_pp_langfolder            			= "Mapp f&ouml;r spr&aring;k:";
$admin_lang_pp_addfolder             			= "Mapp f&ouml;r till&auml;gg:";
$admin_lang_pp_incfolder             			= "Mapp f&ouml;r Includes:";
$admin_lang_pp_tempfolder            			= "Mapp f&ouml;r sidmallar:";
$admin_lang_pp_folder_missing        			= "Finns inte (ska vara";
$admin_lang_pp_ref_log_title         			= "Referrers of Last Seven Days";
$admin_lang_hostinfo                 			= "Information om webbhetellet";
$admin_lang_fileuploads              			= "<b>Uppladdning av filer</b> till Pixelpost &auml;r";
$admin_lang_serversoft               			= "Servermjukvara";
$admin_lang_pixelpostinfo            			= "Information om Pixelpost";
$admin_lang_pp_currversion           			= "Du anv&auml;nder Pixelpost, version: ";
$admin_lang_pp_check                 			= "Kontrollera";
$admin_lang_pp_sess_path             			= "S&ouml;kv&auml;g f&ouml;r att spara sessioner";
$admin_lang_pp_sess_path_emp         			= "&auml;r tom";
$admin_lang_pp_fileupload_np         			= 'INTE m&ouml;jlig! Kontrollera variablen file_upload i php.ini filen!';
$admin_lang_pp_fileupload_p          			= 'm&ouml;jlig.';
$admin_lang_pp_langs                 			= 'Pixelpost spr&aring;k&ouml;vers&auml;ttningar';
$admin_lang_pp_lng_fname             			= 'Filnamn';
$admin_lang_pp_lng_author            			= 'F&ouml;rfattare';
$admin_lang_pp_lng_ver               			= 'Version';
$admin_lang_pp_lng_email             			= 'E-postadress';
$admin_lang_pp_newest_ver            			= 'Du anv&auml;nder den senaste versionen av Pixelpost!';
$admin_lang_pp_thumbnailpath 				 	= "Gissad s&ouml;kv&auml;g f&ouml;r tumnaglar";
$admin_lang_pp_thumbnailpath_conf 	 			= "Konfigurerad s&ouml;kv&auml;g f&ouml;r tumnaglar"; 

// AddOns
$admin_lang_addon_title              			= "Installerade till&auml;gg";
$admin_lang_failed_addonstatus       			= "Fel vid uppdatering av till&auml;ggets status: ";
$admin_lang_addon_off                			= "Klicka f&ouml;r att st&auml;nga AV";
$admin_lang_addon_on                 			= "Klicka f&ouml;r att s&auml;tta P&Aring;";

// Error Messages
$admin_lang_pp_up_error_0            			= "Uppladdningen gick felfritt.";
$admin_lang_pp_up_error_1            			= "Filstorleken som webbservern klarar av &ouml;verskreds.";
$admin_lang_pp_up_error_2            			= "&Ouml;verskred maximum f&ouml;r filstorlek.";
$admin_lang_pp_up_error_3            			= "Filen blev inte helt och fullt uppladdad.";
$admin_lang_pp_up_error_4            			= "Ingen fil blev uppladdad.";
$admin_lang_pp_up_error_6            			= "Tempor&auml;r mapp saknas.";
$admin_lang_pp_up_error_7            			= "Misslyckades att skriva filen till disken.";
$admin_lang_pp_addon_error						= "Pixelpost kunde inte l&auml;sa till&auml;ggsfilen. Kontrollera chmod-inst&auml;llnigarna och &auml;ndra dom till 755";


// options >> time stamps
$admin_lang_optn_timestamps_title  				= "TIME STAMPS";
$admin_lang_optn_timestamps_desc   				= "Om du l&auml;gger till time stamps till filnamnet s&aring; underviker du att en fil med samma namn av misstag skrivs &ouml;ver. <br/>
                                     			Anv&auml;nda time stamps? ";

// options >> fight spam
$admin_lang_spam            					= "SPAMKONTROLL";
$admin_lang_spam_change     					= "Alla bannlistor";
$admin_lang_spam_err_1      					= "Ett fel uppstod n&auml;r databastabellen f&ouml;r bannlistan skulle skapas: ";
$admin_lang_spam_tableadd   					= "Databastabell med bannlista &auml;r tillagd f&ouml;r bek&auml;mpning av spam";
$admin_lang_spam_err_2      					= "Fel vid uppdatering av modereringslistan: ";
$admin_lang_spam_err_3      					= "Fel vid uppdatering av blacklist: ";
$admin_lang_spam_err_4      					= "Fel vid uppdatering av bannlistan f&ouml;r h&auml;nvisningar: ";
$admin_lang_spam_err_5      					= "Fel vid uppdatering av antalet accepterade antal av l&auml;nkar i en kommentar: ";
$admin_lang_spam_upd        					= "Uppdaterat alla bannlistor";
$admin_lang_spam_err_6      					= "Fel vid uppdatering av kommentar, n&auml;r den j&auml;mf&ouml;rdes med modereringslistan: ";
$admin_lang_spam_com_upd    					= "Past: kommentarer j&auml;mf&ouml;rs med modereringslistan";
$admin_lang_spam_err_7      					= "Fel vid borttagning av kommentar, n&auml;r den j&auml;mf&ouml;rdes med modereringslistan: ";
$admin_lang_spam_com_del    					= "Past: kommentarer som inneh&aring;ller ord/IP-nummer fr&aring;n balcklist &auml;r borttagna.";
$admin_lang_spam_err_8      					= "Fel vid borttagning av bes&ouml;kare vid j&auml;mf&ouml;relse med bad-referrers-list: ";
$admin_lang_spam_visit_del  					= "Bes&ouml;kare med ord/IP-nummer fr&aring;n bad-referrer-list &auml;r borttagna.";

// Spam
$admin_lang_spam_ban        					= "Uppdatera bannlistor";
$admin_lang_spam_content    					= "L&auml;gg till listor med bannade ord/IP-nummer/namn i textrutan nedan. Ett ord per rad.<br/>\n
                               					En kommentar som inneh&aring;ller ett ord, ett IP-nummer eller ett namn som finns i modereringslistan, 		 												skickas till modereringsk&ouml;n.<br/>\n
                               					En kommentar som inneh&aring;ller ett ord, ett IP-nummer eller ett namn som finns med i blacklist, kommer inte att till&aring;tas hamna i kommentarslistan.<br/>
                               					En bes&ouml;kare med ett IP-nummer som finns i<b>Referrer Banned List</b> eller som har en adress som finns med i samma lista\n
                               					kommer att nekas tilltr&auml;de till din fotoblogg. (F&ouml;r att det ska fungera ska du l&auml;gga till angiven kod i din .htaccess!)";
$admin_lang_spam_modlist    					= "Modereringslista";
$admin_lang_spam_blacklist  					= "Black List";
$admin_lang_spam_reflist    					= "Referrer Banned List";
$admin_lang_spam_blacklist_text 				= "Kopiera koden nedan (CTRL+A och CTRL+C i Windows) och klistra in den i din .htaccess-fil som finns p&aring; ditt webbhotell f&ouml;r att banna spam IPs and referrers.";
$admin_lang_spam_htaccess_text 					= "H&auml;mta .htaccess kod";
$admin_lang_spam_check_comm  					= "Check Past Comments";
$admin_lang_spam_del_bad_comm 					= "Delete Bad Comments";
$admin_lang_spam_del_bad_ref 					= "Delete Bad Referrers";
$admin_lang_spam_updateblacklist 				= "Update All Banlists";

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