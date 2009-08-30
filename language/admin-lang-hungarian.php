<?php
/*
Pixelpost version 1.7

SVN file version:
$Id: admin-lang-hungarian.php 450 2007-10-22 00:00:42Z david.kozikowski $

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

$_lang_file_translator        				= 'Soós Zoltán - <a href="http://usualsubjects.com">usualsubjects.com</a>';
$_lang_file_email             				= 'zoltan@usualsubjects.com';
$_lang_file_rev               				= '1.7';

$admin_lang_isrtl             				= "no"; // yes for right-to-left languages and no for left-to-right languages
$admin_lang_update            				= "Frissít";
$admin_lang_reload            				= "<br /> Lehet, hogy frissítened kell a lapot.";
$admin_lang_error             				= "Hiba";
$admin_lang_post              				= "bejegyzés";
$admin_lang_page              				= "ez a(z)";
$admin_lang_of                				= "oldal, összesen van";
$admin_lang_next              				= "Következő";
$admin_lang_prev              				= "Előző";
$admin_lang_show              				= "Mutass ";
$admin_lang_go                				= "Mehet!";
$admin_lang_done              				= "Kész:";
$admin_lang_example					= "Példa";


// Admin Start
$admin_start_1                				= "A <b>language</b> könyvtár nem létezik, vagy a(z)";
$admin_start_2                				= "fájl hiányzik a könyvtárból.\n<br />Ellenőrizd, hogy feltöltötted-e a megfelelő 								fájlokat pontosan a fenti nevekkel.";
$admin_start_userpw           				= "Hibás felhasználónév vagy jelszó.";
$admin_start_pw_forgot        				= "Elfelejtetted a jelszavad?";
$admin_start_browser_title    				= "ADMIN";
$admin_start_welcome          				= "Üdv a Pixelpost Admin felületen. Jelentkezz be.";
$admin_start_pp_name          				= "Link a fotóblogodra:";
$admin_start_pp_tit           				= "ide kattintva a fotóblogodra jutsz";
$admin_start_cookie           				= "A bejeltkezés beállít egy sütit";
$admin_start_username         				= "Felhasználónév";
$admin_start_pw               				= "Jelszó";
$admin_start_pw_button        				= "Küldj egy új jelszót";
$admin_start_pw_recover       				= "A régi jelszavad<span style='color:red;'><b>semmilyen módon nem állítható 									vissza</b></span>, de generálhatunk neked egy új, random jelszót.\n<br /> 
							Kérlek, írd be azt az email címet, amelyet az admin felületen korábban megadtál.
                                 			<br />Az új jelszavadat azonnal elküldjük levélben.";
$admin_start_email            				= "Email cím:";
$admin_start_email_button     				= "Írd be az email címed";
$admin_start_admin_1          				= "Admin felület:";
$admin_start_admin_2          				= "";
$admin_start_remember         				= "Minden látogatáskor azonnal léptess be:";

// Password Recovery

// Front Page
$admin_lang_pw_title            			= "Pixelpost jelszó kisegítő";

$admin_lang_pw_wronguser        			= "A megadott felhasználónév nem azonos a Pixelpost adminisztrátor 										felhasználónevével.";
$admin_lang_pw_back             			= "Vissza az adminisztrációhoz";
$admin_lang_pw_noemail          			= "Kifelejtetted az email címet! \n<br />
                                   			Ha fogalmad sincs a jelszavadról, írj egy üzenetet a <a href='http://forum.pixelpost.org/'>Pixelpost fórumba</a>.\n<br />";
$admin_lang_pw_notsent          			= "Hiba! \n<br /> A megadott email cím nem azonos az adminisztrációs panelben megadott 								címmel.<br />";
$admin_lang_pw_subject          			= "Üzenet a Pixelpost rendszertől";
$admin_lang_pw_usertext         			= "A felhasználóneved:";
$admin_lang_pw_mailtext         			= "Az email címed:";
$admin_lang_pw_newpw            			= "Az új jelszavad:";
$admin_lang_pw_text_1           			= "Itt a Pixelpost jelszó kisegítője.";
$admin_lang_pw_text_2           			= "Üzenet a Pixelpost rendszertől";
$admin_lang_pw_text_3           			= "A felhasználónevedet és új jelszavadat elküldtük az email címedre. \n<br /> Nézz 								bele az alábbi postafiókodba: ";
$admin_lang_pw_text_4           			= "<span style='color:red;'>Hiba történt!\n<br />A megadott email cím és 									felhasználónév rendben van, de a levelet nem tudtuk elküldeni! \n<br />Próbálj 									segítséget kérni a rendszergazdádtól!</span>";
$admin_lang_pw_text_5           			= "Adatbázis hiba:";
$admin_lang_pw_text_6           			= "<br />A jelszó frissítése sikertelen.";
$admin_lang_pw_text_7           			= "Ez egy automatikusan generált üzenet a fotóblogodtól.\nValaki új jelszót kért az 								adminisztrációs felülethez.\n\nLépj be a fotóblogodra\n\n ezen a címen";
$admin_lang_pw_text_8           			= "\n\n ezzel az új jelszóval ás változtasd meg azonnal a jelszavad!";
// Admin Menu
$admin_lang_new_image          				= "Új kép";
$admin_lang_images             				= "Képek";
$admin_lang_categories         				= "Kategóriák";
$admin_lang_comments           				= "Megjegyzések";
$admin_lang_options            				= "Beállítások";
$admin_lang_general_info       				= "Általános infók";
$admin_lang_addons             				= "Addon-ok";
$admin_lang_logout             				= "Kilépés";

// New Image
$admin_lang_ni_post_a_new_image   			= "Új kép feltöltése";
$admin_lang_ni_image              			= "Kép";
$admin_lang_ni_image_title        			= "A kép címe";
$admin_lang_ni_select_cat         			= "Jelöld be a képhez rendelendő kategórá(ka)t:";
$admin_lang_ni_description        			= "Képleírás";
$admin_lang_ni_datetime           			= "Dátum és idő megadása";
$admin_lang_ni_post_now           			= "Most";
$admin_lang_ni_post_one_day_after 			= "Egy nappal az utolsó bejegyzés után";
$admin_lang_ni_post_spec_date     			= "Adott időpontban. Alul beállíthatod, hogy mikor:";
$admin_lang_ni_post_entry         			= "Feltöltés";
$admin_lang_ni_upload             			= "Feltölt";
$admin_lang_ni_upload_error       			= "Hiba történt feltöltés közben!";
$admin_lang_ni_posted             			= "FELTÖLTVE";
$admin_lang_ni_year               			= "év";
$admin_lang_ni_month              			= "hónap";
$admin_lang_ni_day                			= "nap";
$admin_lang_ni_hour               			= "óra";
$admin_lang_ni_min                			= "perc";
$admin_lang_ni_markdown_text      			= "Használj Markdown-t vagy HTML-t a szövegformázáshoz ebben a mezőben.";
$admin_lang_ni_markdown_hp        			= "Markdown honlap";
$admin_lang_ni_markdown_element   			= "Alapok";
$admin_lang_ni_markdown_syntax    			= "Szintaktika";
$admin_lang_ni_missing_data      			= "Hiányzó adat.<br />\nMinimum kell egy kép és hozzá egy cím.\n
                                     			Ezúttal nem töltöttünk\nfel semmit a hiányzó adatok miatt!";
$admin_lang_ni_crop_nextstep      			= "Válaszd ki az előnézeti ablakot:";
$admin_lang_ni_crop_background    			= "Az átméretezendő kép háttere";
$admin_lang_ni_post_exif_date     			= "EXIF dátum szerint";
$admin_lang_ni_db_error           			= "hiba az adatbázis irása közben";
$admin_lang_ni_tags               			= "Tag-ek";
$admin_lang_ni_tags_desc          			= "(a vessző, a pontosvessző, és a szóköz elválasztó karakterek, összekötéshez 									használj aláhúzást vagy kötőjelet)";
$admin_lang_ni_alt_language				= "Add meg a kép címét és leírását az alternatív nyelven is";

// Images
$admin_lang_imgedit_edit           			= "Szerkesztés";
$admin_lang_imgedit_title          			= "Cím:";
$admin_lang_imgedit_alttitle          			= "Alt. cím:";
$admin_lang_imgedit_file_name      			= "Fájlnév:";
$admin_lang_imgedit_dimensions     			= "Méret:";
$admin_lang_imgedit_tbpublished    			= "Publikálás dátuma/ideje:";
$admin_lang_imgedit_category_plural 			= "Kategóriák:";
$admin_lang_imgedit_delete          			= "Törlés";
$admin_lang_imgedit_delete1         			= "Törölve";
$admin_lang_imgedit_delete2         			= "kiválasztott kép(ek).";
$admin_lang_imgedit_deleted         			= "Bejegyzés törlése / kép törlése / előnézeti kép törlése";
$admin_lang_imgedit_deleted1        			= "Bejegyzés törölve.";
$admin_lang_imgedit_deleted2        			= "Képfájl törölve.";
$admin_lang_imgedit_delete_error    			= "Nem tudtuk letörölni a képfájlt.\n
                                       			Ezt valahogy másképp kell megoldanod, mondjuk FTP-n keresztül.";
$admin_lang_imgedit_deleted3        			= "Előnézeti kép törölve.";
$admin_lang_imgedit_delete_error2   			= "Nem tudtuk letörölni az előnézeti képet.\n
                                       			Ezt valahogy másképp kell megoldanod, mondjuk FTP-n keresztül.";
$admin_lang_imgedit_reupimg         			= "Kép újrafeltöltés:";
$admin_lang_imgedit_file            			= "Fájl: ";
$admin_lang_imgedit_file_isuploaded 			= "újra feltöltve!";
$admin_lang_imgedit_update          			= "Képmódosítás";
$admin_lang_imgedit_updated         			= "Módosított kép";
$admin_lang_imgedit_txt_desc        			= "Szöveg/leírás:";
$admin_lang_imgedit_dtime           			= "Dátum és idő:";
$admin_lang_imgedit_img             			= "Kép:";
$admin_lang_imgedit_fsize           			= "Fájl méret:";
$admin_lang_imgedit_12cropimg       			= "CropImage:";
$admin_lang_imgedit_12cropimg_txt   			= "Átméretezheted az alábbi előnézeti képet úgy, hogy mozgatod az kivágóablakot az egérrel, 							majd a méretét beállítod a +/- gombokkal:";
$admin_lang_imgedit_uthmb_button    			= "Frissít";
$admin_lang_imgedit_u_post_button   			= "Frissít";
$admin_lang_imgedit_title1          			= "Képek - itt újra feltöltheted, szerkesztheted vagy törölheted a képeid || ";
$admin_lang_imgedit_title2          			= " kép van az adatbázisban.\n<br /> Ebből itt látható ";
$admin_lang_imgedit_title3          			= ". Ez a(z) ";
$admin_lang_imgedit_title4          			= ". oldal, összesen van ";
$admin_lang_imgedit_12crop_opt      			= "<strong>Megjegyzés:</strong> A 12CropImage opció nincs kiválasztva, ezért az előnézeti 							képeket nem módosíthatod.";
$admin_lang_imgedit_edit_post       			= "SZERKESZTÉS";
$admin_lang_imgedit_img_page        			= "képet oldalanként";
$admin_lang_imgedit_cropbg          			= "Ez a 12cropimage háttérszövege";
$admin_lang_imgedit_js_del_im       			= "Biztosan ki szeretnéd törölni ezt a képet?";
$admin_lang_imgedit_preview         			= "Előnézet";
$admin_lang_imgedit_db_error        			= "<br />Ellenőrizd, hogy ezt a permalink stringet nem használtad-e már korábban!";
$admin_lang_imgedit_tags_edit       			= "Tag-ek (a vessző, a pontosvessző és a szóköz elválasztókaralterek, összekötésre használd az 							aláhúzás karaktert):";
$admin_lang_imgedit_alt_language  			= "Add meg a kép címét és leírását az alternatív nyelven is";
$admin_lang_imgedit_masstag  	      			= "Tag-ek csoportos hozzáadása/elvétele";
$admin_lang_imgedit_masstag_set     			= "Tag(ek) felvétele";
$admin_lang_imgedit_masstag_set2    			= "Tag(ek) felvétele az alternatív nyelvhez";
$admin_lang_imgedit_masstag_unset   			= "Tag(ek) törlése";
$admin_lang_imgedit_published          			= "Publikálva";
$admin_lang_imgedit_unpublished_cmnts  			= "korábban nem látható kép.";


// Mass-Edit Categories
$admin_lang_imgedit_mass_1          			= "Csoportos kategóriaszerkesztés";
$admin_lang_imgedit_mass_2          			= "Hozzáad";
$admin_lang_imgedit_mass_3          			= "Elvesz";
$admin_lang_imgedit_mass_4          			= "Csoportos frissítés";


// Categories
$admin_lang_cats_add_cat            			= "Kategória felvétele";
$admin_lang_cats_added              			= "Kategória felvéve.";
$admin_lang_cats_add_cat_txt        			= "Add meg az új kategória nevét.";
$admin_lang_cats_add_cat_txt_altlang			= "Add meg a fenti kategóranév fordítását.";
$admin_lang_cats_edit_cat           			= "Kategóriák módosítása";
$admin_lang_cats_edit_cat_txt       			= "Módosítandó kategória";
$admin_lang_cats_edit_cat_button    			= "Módosít";
$admin_lang_cats_edit_tip           			= "Módosítsd a kategóranevet mindkét nyelven!<br />A régi kategórianévhez tartozó képek 							automatikusan átkerülnek az új név alá.";
$admin_lang_cats_delete_cat         			= "Kategóriák törlése";
$admin_lang_cats_delete_cat_txt     			= "Törlendő kategória";
$admin_lang_cats_delete_cat2        			= "Törlendő:";
$admin_lang_cats_delete_cats_button 			= "Töröl";
$admin_lang_cats_deleted            			= "Kategória törölve.";
$admin_lang_cats_update             			= "Kategória módosítása";
$admin_lang_cats_update_cat_button  			= "Módosít";
$admin_lang_cats_updated            			= "A kategórianevet módosítottuk.";


// Comments
$admin_lang_cmnt_commentlist        			= "Megjegyzések - itt törölheted vagy módosíthatod őket és beállításaikat&nbsp;||&nbsp;Oldalanként ";
$admin_lang_cmnt_name               			= "Név:";
$admin_lang_cmnt_email              			= "Email:";
$admin_lang_cmnt_comment            			= "Megjegyzés:";
$admin_lang_cmnt_image              			= "Kép";
$admin_lang_cmnt_delete             			= "Töröl";
$admin_lang_cmnt_deleted            			= "Megjegyzés törölve.";
$admin_lang_cmnt_delete1            			= "Törölve";
$admin_lang_cmnt_delete2            			= "kijelölt megjegyzés(ek).";
$admin_lang_cmnt_edit               			= "Szerkeszt";
$admin_lang_cmnt_edited             			= "Megjegyzés szerkesztve.";
$admin_lang_cmnt_check_all          			= "Mindet kijelöl";
$admin_lang_cmnt_clear_all				= "Összes kijelölés törlése";
$admin_lang_cmnt_invert_checks      			= "Kijelölés megfordítása";
$admin_lang_cmnt_del_selected       			= "Kijelöltek törlése";
$admin_lang_cmnt_page               			= "megjegyzés oldalanként.";
$admin_lang_cmnt_commenter          			= "Megjegyzés dátuma/ideje:";
$admin_lang_cmnt_ip                 			= "IP cím:";
$admin_lang_cmnt_save               			= "Mentés";
$admin_lang_cmnt_massdelete_text    			= "Ellenőrizd mégegyszer a törlésre kijelölt megjegyzéseket";
$admin_lang_cmnt_js_del_comm        			= "Biztosan ki akarod törölni ezt a megjegyzést?";
$admin_lang_cmnt_publish_sel        			= "Kijelöltek publikálása";
$admin_lang_cmnt_unpublish_sel      			= "Moderációra küld";
$admin_lang_cmnt_published          			= "Publikálva";
$admin_lang_cmnt_unpublished_cmnts  			= "korábban nem látható megjegyzés.";
$admin_lang_cmnt_unpublished        			= "Elrejtve";
$admin_lang_cmnt_published_cmnts    			= "korábban látható megjegyzés.";
$admin_lang_cmnt_error_blacklist    			= "Hiba a tiltólista frissítése közben: ";
$admin_lang_cmnt_error_banlist      			= "Hiba a referrer-tiltó lista frissítése közben: ";
$admin_lang_cmnt_moderation_que     			= "Moderációs sor";
$admin_lang_cmnt_rep_spam           			= "Spam jelentése";
$admin_lang_cmnt_submenu1				= "MEGJEGYZÉSEK";
$admin_lang_cmnt_submenu2				= "MODERÁLÁSRA VÁRÓ MEGJEGYZÉSEK";

// Option
$admin_lang_optn_general            			= "ÁLTALÁNOS";
$admin_lang_optn_template           			= "TÉMA";
$admin_lang_optn_thumbnails         			= "ELŐNÉZETI KÉPEK";
$admin_lang_optn_tip                			= "Ne feledd a záró per jelet (<b>'/'</b>), pl. <i>http://www.pixelpost.org/</i>";

$admin_lang_optn_update             			= "Mehet";
$admin_lang_optn_yes                			= "Igen";
$admin_lang_optn_no                 			= "Nem";

$admin_lang_optn_title_url         			= "AZ OLDAL NEVE ÉS CÍME";
$admin_lang_optn_title             			= "Név:";
$admin_lang_optn_sub_title         			= "Név kiegészítés:";
$admin_lang_optn_url               			= "Cím (URL):";
$admin_lang_optn_usr_pss           			= "ADMINISZTRÁTOR FELHASZNÁLÓNÉV ÉS JELSZÓ";
$admin_lang_optn_usr_pss_txt       			= "Felhasználónév vagy jelszó változtatás";
$admin_lang_optn_usr               			= "Felhasználónév:";
$admin_lang_optn_pss               			= "Jelszó:";
$admin_lang_optn_pss_re            			= "Jelszó mégegyszer:";
$admin_lang_optn_email             			= "ADMINISZTRÁTORI EMAIL CÍM";
$admin_lang_optn_fillit            			= "Töltsd ki. Ha elveszik a jelszavad, hasznos lesz.";
$admin_lang_optn_img_path          			= "KÉPEK ELÉRÉSI ÚTVONALA";
$admin_lang_optn_tz                			= "IDŐZÓNA";
$admin_lang_optn_tz_txt            			= "Válaszd ki az időzónád.";
$admin_lang_optn_sendemail         			= "EMAIL KÜLDÉSE MEGJEGYZÉS ÉRKEZÉSEKOR";
$admin_lang_optn_sendemail_txt    			= "Küldjünk levélben értesítést,amikor megjegyzés érkezik egy képedhez?";
$admin_lang_optn_sendemail_html_txt 			= "HTML formátumban kéred az értesítést?";
$admin_lang_optn_comment_setting 			= "MEGJEGYZÉSEK ÁLTALÁNOS BEÁLLÍTÁSAI";
$admin_lang_optn_comment_setting2			= "Megjegyzések";
$admin_lang_optn_cmnt_mod_txt       			= "A megjegyzéseket ";
$admin_lang_optn_cmnt_mod_txt2      			= "A megjegyzéseket ";
$admin_lang_optn_cmnt_mod_allowed			= "azonnal megjelenítjük";
$admin_lang_optn_cmnt_mod_moderation			= "moderáljuk";
$admin_lang_optn_cmnt_mod_forbidden			= "letiltjuk";

$admin_lang_optn_switch_template    			= "TÉMA KIVÁLASZTÁSA";
$admin_lang_optn_lang_file           			= "NYELV";
$admin_lang_optn_lang_file_admin          		= "ADMIN PANEL LANGUAGE FILE";
$admin_lang_optn_dateformat          			= "DÁTUMFORMÁTUM";
$admin_lang_optn_dateformat_txt      			= "A képek és megjegyzések dátumának formátumát állíthatod itt be. A használt szintaxis 							megegyezik a PHP <a href='http://www.php.net/date' target='_blank'>date()</a> függvényéével. 							Íme néhány példa a használt kódok jelentéséből: Y:év, m:hónap, d:nap, H:óra, i:perc, 								s:másodperc.";
$admin_lang_optn_gmt                 			= "A téli és nyári időszámítások közti váltást ez a beállítás nem kezeli automatikusan, ezt 							kézzel kell elvégezned.<br />Innen (<a href='http://www.worldtimeserver.com/current_time_in_UTC.aspx' target='__blank'>UTC idő, most</a>) megtudhatod, hogy most mennyi a UTC-hez képesti 							időeltolódásod.<br />";
$admin_lang_optn_cat_link_format     			= "KATEGÓRIA LINK FORMÁTUMA";
$admin_lang_optn_catlinkformat_select 			= "Add meg a kategórialinkek formátumát";
$admin_lang_optn_cat_link_format_txt  			= "A kategória linkek formátuma ilyen lesz:";
$admin_lang_optn_catlinkformat_custom 			= "Saját kategória formátum";
$admin_lang_optn_catlinkformat_custom_start		= "Kezdő string:";
$admin_lang_optn_catlinkformat_custom_end 		= "Végstring:";
$admin_lang_optn_calendar_type       			= "NAPTÁR TÍPUS";
$admin_lang_optn_thumb_row           			= "ELŐNÉZETI KÉPEK SZÁMA";
$admin_lang_optn_thumb_row_txt       			= "Hány előnézeti képet szeretnél egy sorban?<br/>Célszerű lesz páratlan számot választanod, 							jobban fog kinézni.";
$admin_lang_optn_crop_thumbs         			= "ELŐNÉZETI KÉPEK OLDALARÁNYA";
$admin_lang_optn_crop_thumbs_txt     			= "Ha azt szeretnéd, hogy az előnézeti képeket fix oldalarányúra vágjuk, válaszd az 								<b>igent</b>.<br/>\n
                                        		Ha meg szeretnéd tartani az eredeti oldalarányokat, válaszd a <b>nemet</b>.<br/>\n
                                        		Ha feltöltés után egyenként szeretnéd létrehozni az előnézeti képeket, válaszd a <b>12CropImage</b> opciót.";
$admin_lang_optn_thumb_size          			= "ELŐNÉZETI KÉPEK MÉRETE";
$admin_lang_optn_thumb_size_txt      			= "Itt állíthatod be az előnézeti képek méretét (szélesség x magasság).";
$admin_lang_optn_thumb_size_new      			= "Beállít";
$admin_lang_optn_reg_thumbs_button   			= "Előnézeti képek újragenerálása";
$admin_lang_optn_regen_thumbs_txt    			= "A fenti gombra kattintva újrageneráljuk az összes előnézeti képet, a korábbi előnézeti 							képek elvesznek. Ha szeretnéd, az egyedi előnézeti képeket újra létrehozhatod a 12CropImage 							segítségével, de csak a képek egyenkénti módosításával.";
$admin_lang_optn_img_compression     			= "ELŐNÉZETI KÉPEK MINŐSÉGE";
$admin_lang_optn_img_compression_txt 			= "Mekkora jpg-kompressziót szeretnél? A 10-es érték kis képet, de rossz minőséget ad, a 							100-as veszteségmentes tömörítést ad nagyobb méret mellett.";
$admin_lang_optn_thumb_sharp              		= "ELŐNÉZETI KÉPEK ÉLESÍTÉSE";
$admin_lang_optn_thumb_sharp_txt          		= "Milyen élesre szeretnéd az előnézeti képeket?";
$admin_lang_optn_thumb_sharp0             		= 'Nem kérek élesítést';
$admin_lang_optn_thumb_sharp1             		= 'Kicsit élesre';
$admin_lang_optn_thumb_sharp2             		= 'Közepesen élesre';
$admin_lang_optn_thumb_sharp3             		= 'Nagyon élesre';
$admin_lang_optn_thumb_sharp4             		= 'Ultra élesre';
$admin_lang_optn_pass_chngd_txt      			= "Jelszó sikeresen megváltoztatva.";
$admin_lang_optn_pass_notchngd_txt   			= "A jelszót nem változtattuk meg, mert a megadott két jelszó nem egyezik.";
$admin_lang_optn_title_url_text      			= "Itt módosíthatod az oldalat nevét és címét";
$admin_lang_optn_thumb_updated       			= "Előnézeti képek frissítve!";
$admin_lang_optn_updated             			= "előnézeti képek frissítve.";
$admin_lang_optn_visitorbooking_title 			= 'LÁTOGATÓK RÖGZÍTÉSE';
$admin_lang_optn_visitorbooking_desc  			= 'Szeretnéd, ha a Pixepost rözítene minden látogatót?';
$admin_lang_optn_upd_done             			= "Frissítés kész.";
$admin_lang_optn_upd_error            			= "Frissítési hiba.";
$admin_lang_optn_upd_lang_error		  		= "A kiválasztott alternatív nyelv megegyezik az alapértelmezett nyelvvel.<br />Ennek nincs 							értelme, tehát válassz egy más alternatív nyelvet vagy tiltsd le az alternatív nyelv 								használatát.";
$admin_lang_optn_markdown             			= "MARKDOWN ENGEDÉLYEZÉSE";
$admin_lang_optn_markdown_desc        			= "Szeretnéd, ha a Pixelpost engedélyezné a Markdown-t a képek leírásában?";
$admin_lang_optn_exif			        	= "EXIF ENGEDÉLYEZÉSE";
$admin_lang_optn_exif_desc		        	= "Szeretnéd, ha a Pixelpost engedélyezné az EXIF információk megjelenítését a főoldalon?";
$admin_lang_optn_token			        	= "TOKENEK ENGEDÉLYEZÉSE";
$admin_lang_optn_token_desc		        	= "A token használata csökkenti az ún. <a href=\"http://en.wikipedia.org/wiki/Cross-site_request_forgery\">Cross-Site Request Forgery</a> valószínűségét.<br/><br/>\n
							Ha ezt engedélyezed, akkor megjegyzések csak akkor mentődnek, ha a formban visszakapott token azonos a kapcsolat (session) tokenjével. Ahhoz, hogy ez működjön, egy  <strong>&lt;TOKEN&gt;</strong> taget kell hozzáadnod a megjegyzés mintához (comments template) a <strong><i>&lt;form&gt;...&lt;/form&gt;</i></strong> tagek közé.
							Ha elfelejted a <strong>&lt;TOKEN&gt;</strong> tag-et, a megjegyzések elküldése nem fog működni és a látogató hibaüzenetet kap.<br /><br/>\n
							Akkor tehát engedélyezzük ezt a beállítást?";
$admin_lang_optn_token_time				= "Add meg a megjegyzés ablak megnyitása és a megjegyzés elküldése közötti maximális 								időtartamot (Token-idő): ";
$admin_lang_optn_token_error				= "Figyelem: 1 percnél kisebb Token-idő nem megengedett. A Token-időt visszaállítottik 1 							percre.";
$admin_lang_optn_dsbl_list 				= "&quot;DISTRIBUTED SENDER BLACKHOLE LIST&quot; BEÁLLÍTÁS (http://www.dsbl.org)";
$admin_lang_optn_dsbl_list_desc 			= "A <a href=\"http://www.dsbl.org\" target=\"_blank\">Distributed Sender Blackhole List</a> 							egy olyan jegyzék, amely pontenciális spam-forrásként nyilvántartott serverek IP-címeit 							tartalmazza.<br /> <br />
							Ellenőrizzük a megjegyzést küldők IP-címeit a fenti jegyzékben?";
$admin_lang_optn_time_between_comments 			= "SPAM KORLÁTOZÁS";
$admin_lang_optn_time_between_comments_desc 		= "Add meg azt a minimális időtartamot, amelynek el kell telnie két megjegyzés beküldése 							között: ";
$admin_lang_optn_max_uri_comment			= "LINKEK SZÁMA";
$admin_lang_optn_max_uri_comment_desc 			= "Add meg az egy megjegyzésben szereplő linkek maximális számát: ";

$admin_lang_optn_rss_setting				= "RSS/ATOM FEED BEÁLLÍTÁSOK";
$admin_lang_optn_rss_title  				= "Feed neve";
$admin_lang_optn_rss_desc   				= "Feed leírása";
$admin_lang_optn_rss_copyright				= "Feed copyright";
$admin_lang_optn_rss_discovery				= "Feed felfedezés";
$admin_lang_optn_rss_opt_both				= "RSS &amp; ATOM";
$admin_lang_optn_rss_opt_rss				= "RSS";
$admin_lang_optn_rss_opt_atom				= "ATOM";
$admin_lang_optn_rss_opt_ext				= "Külső";
$admin_lang_optn_rss_opt_none				= "Nincs";
$admin_lang_optn_rss_ext_type				= "Külső feed típus";
$admin_lang_optn_rss_ext				= "Külső feed";
$admin_lang_optn_rss_enable_comment_feed		= "Megjegyzés feed engedélyezése";
$admin_lang_optn_rsstype_desc				= "Válaszd ki az RSS/ATOM feed fajtáját:";
$admin_lang_optn_rss_full				= "Teljes kép";
$admin_lang_optn_rss_thumbs				= "Előnézeti kép";
$admin_lang_optn_rss_thumbs_only			= "Csak előnézeti kép";
$admin_lang_optn_rss_full_only				= "Csak teljes méretű kép";
$admin_lang_optn_rss_text				= "Csak szöveg";
$admin_lang_optn_feeditems_desc				= "A feedlista hossza: ";
$admin_lang_optn_lang                  			= "Alapnyelv beállítása: ";
$admin_lang_optn_alt_lang             			= "Alternatív nyelv beállítása: ";
$admin_lang_optn_alt_lang_dis         			= "kikapcsolva";
$admin_lang_optn_alt_lang_no          			= "kikapcsolva";
$admin_lang_optn_img_display				="A KÉPEK MEGJELENÍTÉSI SORRENDJE";
$admin_lang_optn_img_display_desc			="Válaszd ki, hogy milyen rendben jelenítjük meg a képeket. Jelenítsük meg: ";
$admin_lang_optn_img_display_default			="csökkenő rendben";
$admin_lang_optn_img_display_reversed			="növekvő rendben";

// Info
$admin_lang_info_gd                  			= "Nincs telepítve. Kérd meg a rendszergazdádat, hogy telepítse!";
$admin_lang_info_gd_jpg              			= "JPEG támogatással";
$admin_lang_pp_version1              			= "A legutolsó Pixelpost verzió:";
$admin_lang_pp_forum                 			= "Ha segítségre van szükséged vagy mondanivalód van, fordulj a Pixelpost fórumhoz.";
$admin_lang_pp_min_php               			= "minimum követelmény";
$admin_lang_pp_min_mysql             			= "minimum követelmény";
$admin_lang_pp_exif1                 			= "<b>EXIF</b> A Pixelpost a(z)";
$admin_lang_pp_exif2                 			= "verzióját használja az EXIF információk megjelenítéséhez";
$admin_lang_pp_path                  			= "Elérési utak";
$admin_lang_pp_imagepath             			= "A képek feltételezett könyvtára(images):";
$admin_lang_pp_imagepath_conf        			= "A képek beállított könytára (images):";
$admin_lang_pp_img_chmod1            			= "A képek könyvtára (images) nem írható!";
$admin_lang_pp_img_chmod2            			= "Állítsd be helyesen az alábbi könyvtár hozzáférési jogait, vagy nem fogsz tudni képeket 							feltölteni.";
$admin_lang_pp_img_chmod3            			= "<br />Állítsd a könyvtár hozzáférését<b>777</b>-re (olvasási, irási és végrehajtási jog a 							tulajdonosnak, a csoportnak és másoknak).";
$admin_lang_pp_img_chmod4            			= "Írható a könyvtár? IGEN.";
$admin_lang_pp_img_chmod5            			= "Az előnézeti képek könyvtára (thumbnails) nem írható!";
$admin_lang_pp_imgfolder             			= "Képek (images) könyvtára:";
$admin_lang_pp_thumbfolder           			= "Előnézeti (thumbnails) képek könyvtára:";
$admin_lang_pp_langfolder            			= "Nyelvi kiegészítések (language) könyvtára:";
$admin_lang_pp_addfolder             			= "Addon-ok könyvtára:";
$admin_lang_pp_incfolder             			= "Bővítmények (includes) könyvtára:";
$admin_lang_pp_tempfolder            			= "Témák (templates) könyvtára:";
$admin_lang_pp_folder_missing        			= "Nem található (";
$admin_lang_pp_ref_log_title         			= "Az utóbbi hét nap referrer-jei";
$admin_lang_hostinfo                 			= "Szerverinformáció";
$admin_lang_fileuploads              			= "<b>A fájlfeltöltés</b> a Pixelpostba ";
$admin_lang_serversoft               			= "Szerver szoftver";
$admin_lang_pixelpostinfo            			= "Pixelpost információk";
$admin_lang_pp_currversion           			= "Használt Pixelpost verziód: ";
$admin_lang_pp_check                 			= "Ellenőrizd";
$admin_lang_pp_sess_path             			= "Session mentési útvonal";
$admin_lang_pp_sess_path_emp         			= "üres";
$admin_lang_pp_fileupload_np         			= 'NEM lehetséges! Ellenőrizd a file_upload változót a php.ini fájlban!';
$admin_lang_pp_fileupload_p          			= 'lehetséges.';
$admin_lang_pp_langs                 			= 'Pixelpost nyelvi változatok';
$admin_lang_pp_lng_fname             			= 'Fájlnév';
$admin_lang_pp_lng_author            			= 'Szerző';
$admin_lang_pp_lng_ver               			= 'Verzió';
$admin_lang_pp_lng_email             			= 'Email';
$admin_lang_pp_newest_ver            			= 'A Pixelpost legújabb verzióját használod!';
$admin_lang_pp_thumbnailpath 				= "Előnézeti képek valószínű elérési útja";
$admin_lang_pp_thumbnailpath_conf 	 		= "Előnézeti képek beállított elérési útja";

// AddOns
$admin_lang_addon_title              			= "Telepített addon-ok";
$admin_lang_failed_addonstatus       			= "Nem tudtuk az addon állapotát állítani: ";
$admin_lang_addon_off                			= "Kattintásra KIAKPCSOL";
$admin_lang_addon_on                 			= "Kattintásra BEKAPCSOL";

// Error Messages
$admin_lang_pp_up_error_0            			= "Hibátlan feltöltés.";
$admin_lang_pp_up_error_1            			= "A web szerver nem tud ekkora fájlt kezelni.";
$admin_lang_pp_up_error_2            			= "A maximális méretnél nagyobb fájl.";
$admin_lang_pp_up_error_3            			= "A fájl nem töltődött fel teljesen.";
$admin_lang_pp_up_error_4            			= "Nem töltöttünk fel fájlt.";
$admin_lang_pp_up_error_6            			= "Nincs meg a temporális könyvtár.";
$admin_lang_pp_up_error_7            			= "Diszkírási hiba.";
$admin_lang_pp_addon_error				= "Az addon fájl nem olvasható. Ellenőrizd a jogosultságot és állítsd 775-re.";


// options >> time stamps
$admin_lang_optn_timestamps_title  			= "IDŐBÉLYEG";
$admin_lang_optn_timestamps_desc   			= "Ha a fájlnevekhez időbélyeget illesztünk, elkerülhetjük az azonos nevű fájlok 								felülírását.<br/>Használjunk időbélyeget? ";

// options >> fight spam
$admin_lang_spam            				= "SPAM ELLENI VÉDELEM";
$admin_lang_spam_change     				= "Összes tiltólista";
$admin_lang_spam_err_1      				= "Hiba a tiltólista-tábla létrehozásakor: ";
$admin_lang_spam_tableadd   				= "A tiltólista hozzáadva";
$admin_lang_spam_err_2      				= "Hiba a moderációs lista frissítése közben: ";
$admin_lang_spam_err_3      				= "Hiba a tiltólista frissítése közben: ";
$admin_lang_spam_err_4      				= "Hiba a referrer-tiltó lista frissítése közben: ";
$admin_lang_spam_err_5      				= "A megjegyzésekben megadható linkek maximális számát nem tudtuk frissíteni: ";
$admin_lang_spam_upd        				= "Minden tiltólistát sikeresen frissítettünk";
$admin_lang_spam_err_6      				= "Hiba a megjegyzések moderációs listával való ellenőrzésekor: ";
$admin_lang_spam_com_upd    				= "Moderációs listával ellenőrzött megjegyzések száma ";
$admin_lang_spam_err_7      				= "Hiba a megjegyzések tiltólistával való ellenőrzésekor: ";
$admin_lang_spam_com_del    				= "A tiltott szavakat vagy IP-címeket tartalmazó megjegyzéseket töröltük.";
$admin_lang_spam_err_8      				= "Hiba a látogatók adatainak referrer-tiltó listával való ellenőrzésekor: ";
$admin_lang_spam_visit_del  				= "A referrer-tiltó listában szereplő látogatók adatait töröltük.";

// Spam
$admin_lang_spam_ban        				= "Tiltási listák módosítása";
$admin_lang_spam_content    				= "Az alábbi szövegmezőkben adhatsz meg tiltott szavakat, IP címeket vagy neveket, soronként egyet.<br/>\n
                               				Ha egy megjegyzés tartalmazza a moderációs listában felsorolt bármely szót, IP címet vagy nevet, azt csak moderáció után tesszük közzé.<br/>\n
                               				Ha egy megjegyzés tartalmazza a tiltólistában felsorolt bármely szót, IP címet vagy nevet, azt sosem tesszük közzé .<br/>
                               				Azon látogatók, akiknek az IP címe szerepel a <b>Referrer-tiltó listában</b> vagy a címük ugyanebben a listában szereplő szót tartalmaz, nem érhetik el az fotóblogodat.\n
                               				(Ahhoz, hogy ez működjön, a mellékelt kódrészletet be kell illesztened a .htaccess fájlodba!)";
$admin_lang_spam_modlist    				= "Moderációs lista";
$admin_lang_spam_blacklist  				= "Tiltólista";
$admin_lang_spam_reflist    				= "Referrer-tiltó lista";
$admin_lang_spam_blacklist_text 			= "Másold az alábbi kódrészletet (CTRL+A és CTRL+C Windowsban) a weboldalad .htaccess fájljába!<br/>";
$admin_lang_spam_htaccess_text 				= "Itt a .htaccess kód. Kattints.";
$admin_lang_spam_check_comm  				= "Korábbi megjegyzések ellenőrzése";
$admin_lang_spam_del_bad_comm 				= "Rosszindulatú megjegyzések törlése";
$admin_lang_spam_del_bad_ref 				= "Rosszindulatú referrerek törlése";
$admin_lang_spam_updateblacklist 			= "Tiltólisták frissítése";

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