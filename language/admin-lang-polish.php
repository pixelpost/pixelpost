<?php
/*

admin-lang-polish.php : polish language file for PixelPost-Admin-Section
========================================================================
Pixelpost version 1.5

SVN file version:
$Id$

Language file: polish (PL)
Author:  Piotr "GeoS" Galas
Contact: geos@pixelpost.org
WWW: http://blog.piotrgalas.com/

Version 1.5:
Development Team:
Ramin Mehran, Connie Mueller-Goedecke, Will Duncan, Joseph Spurling, Piotr Galas aka GeoS
Version 1.1 to Version 1.3: Linus <http://www.shapestyle.se>

Copyright © 2006 Pixelpost.org <http://www.pixelpost.org>

Pixelpost www:  	http://www.pixelpost.org/
Pixelpost wiki: 	    http://wiki.pixelpost.org/ 
Pixelpost forum: 	http://forum.pixelpost.org

Please check that the file "admin-lang-polish.php" is uploaded to the
language-directory as well!
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
______________________________________________________________________________

ADMIN PANEL LANGUAGE VARIABLES:

Dont edit                     ||      Edit                                   */

$admin_lang_isrtl  = "no"; // yes for right-to-left languages and no for left-to-right languages
$admin_lang_update = "Aktualizacja";
$admin_lang_reload = "<br /> Musisz przeładować stronę, aby zobaczyć zmiany.";
$admin_lang_error  = "Błąd";
$admin_lang_post   = "wpisów";
$admin_lang_page   = "strona";
$admin_lang_of     = "z";
$admin_lang_next   = "Następna";
$admin_lang_prev   = "Poprzednia";
$admin_lang_show   = "Pokaż";
$admin_lang_go     = "Idź!";
$admin_lang_done   = "Wykonano:";


// Admin Start
$admin_start_1             = "Brak folderu <b>language</b> lub pliku";
$admin_start_2             = "brakuje w tym katalogu.<br />Upewnij się, czy wgrałeś wszystkie potrzebne pliki z dokładnie takimi samymi nazwami
  jak te wspomniane.";
$admin_start_userpw        = "Użytkownik lub hasło jest nieprawidłowe.";
$admin_start_pw_forgot     = "Zapomniałem/am hasła?";
$admin_start_browser_title = "ADMINISTRATOR";
$admin_start_welcome       = "Witamy w Panelu Administracyjnym Pixelpost - Musisz się zalogować.";
$admin_start_pp_name       = "Link do Twojej strony z PixelPostem:";
$admin_start_pp_tit        = "kliknij tutaj, aby załadować Twój photoblog";
$admin_start_cookie        = "Logowanie ustawia cookie";
$admin_start_username      = "Użytkownik";
$admin_start_pw            = "Hasło";
$admin_start_pw_button     = "Wyślij mi moje nowe hasło";
$admin_start_pw_recover    = "Nie ma możliwości odtworzenia starego hasła, ale Pixelpost potrafi
                                 ustawi nowe losowe hasło.\nWpisz adres email, ktry wprowadzono w panelu administratora,
																 a bezzwłocznie zostanie wysłane nowe hasło.";
$admin_start_email           = "Adres Email:";
$admin_start_email_button    = "Wprowadź swój adres email";
$admin_start_admin_1         = "Administracja";
$admin_start_admin_2         = "";
$admin_start_remember        = "Loguj mnie automatycznie przy każdej wizycie:";

// Password Recovery

// Front Page
$admin_lang_pw_title = "Pixelpost  - Przywracanie Hasła";

$admin_lang_pw_wronguser = "Wprowadzona nazwa użytkownika nie jest zgodna z nazwą administratora posiadaną przez Pixelposta.";
$admin_lang_pw_back      =  "Powrót do strony administracji";
$admin_lang_pw_noemail   = "Nie wprowadzono wymaganego adresu email! \n<br />
  Jeśli nie masz pojęcia o haśle, to napisz z prośbą o pomoc na <a href='http://www.pixelpost.org/forum'>forum Pixelposta</a>.\n<br />";
$admin_lang_pw_notsent   = "Nic nie wysłano! \n<br /> Wprowadzony adres email nie jest zgodny z wprowadzonym w panelu administratora.<br />";
$admin_lang_pw_subject   = "Pixelpost - Wiadomość Przywracania Hasła";
$admin_lang_pw_usertext  = "Nazwa użytkownika:"; 
$admin_lang_pw_mailtext  = "Adres email:";
$admin_lang_pw_newpw     = "Nowe hasło:";
$admin_lang_pw_text_1    = "Przywracanie hasła przez Pixelposta";
$admin_lang_pw_text_2    = "From: PIXELPOST - Sekcja Administratora";
$admin_lang_pw_text_3    = "Na podany adres email została wysłana wiadomość z loginem i nowym hasłem. \n<br /> 
  Sprawdź pocztę email o adresie ";
$admin_lang_pw_text_4    = "<span style='color:red;'>Błąd! Coś się wydarzyło! \n<br />
  Wprowadzony adres email oraz nazwa użytkownika są prawidłowe, ale poczta nie może być wysłana! \n<br />
  Zwróć się po pomoc do administratora serwera</span>";
$admin_lang_pw_text_5    = "Błąd bazy danych:";
$admin_lang_pw_text_6    = "<br />Uaktualnienie hasła nie powiodło się.";
$admin_lang_pw_text_7    = "Ta wiadomość została wysłana automatycznie ze strony logowanialy Twojego Photobloga.\nKtoś zażądał ustawienia
  nowego hasła do panelu administratora.\n\nPowinieneś zalogować się do niego pod adresem\n\n ";
$admin_lang_pw_text_8    = "\n\n (z tym nowym automatycznie wygenerowanym hasłem), aby je natychmiast zmienić!";

// Admin Menu
$admin_lang_new_image    = "NOWY OBRAZEK";
$admin_lang_images       = "OBRAZKI";
$admin_lang_categories   = "KATEGORIE";
$admin_lang_comments     =  "KOMENTARZE";
$admin_lang_options      = "OPCJE";
$admin_lang_general_info = "INFORMACJE OGÓLNE";
$admin_lang_addons       = "DODATKI";
$admin_lang_logout       = "WYLOGUJ";

// New Image
$admin_lang_ni_post_a_new_image   = "Wyślij nowy obrazek";
$admin_lang_ni_image              = "Obrazek";
$admin_lang_ni_image_title        = "Tytuł obrazka";
$admin_lang_ni_select_cat         = "Wybierz kategorie / Słowa kluczowe";
$admin_lang_ni_description        = "Opis obrazka / tekst";
$admin_lang_ni_datetime           = "Data i czas wpisu";
$admin_lang_ni_post_now           = "Zrób wpis teraz";
$admin_lang_ni_post_one_day_after = "Zrób wpis dzień po ostatnim wpisie";
$admin_lang_ni_post_spec_date     = "Zrób wpis z konkretną datą. Ustaw datę poniżej:";
$admin_lang_ni_post_entry         = "Wyślij wpis";
$admin_lang_ni_upload             = "Wyślij";
$admin_lang_ni_upload_error       = "Transfer pliku nie powiódł się!";
$admin_lang_ni_posted             = "WYSŁANO";
$admin_lang_ni_year               = "Rok";
$admin_lang_ni_month              = "miesiąc";
$admin_lang_ni_day                = "dzień";
$admin_lang_ni_hour               = "godzina";
$admin_lang_ni_min                = "minuta";
$admin_lang_ni_markdown_text      = "Użyj MARKDOWN lub HTML do sformatowania tekstu w tym polu.";
$admin_lang_ni_markdown_hp        = "Strona domowa MARKDOWN";
$admin_lang_ni_markdown_element   = "Podstawy";
$admin_lang_ni_markdown_syntax    = "Składnia";
$admin_lang_ni_missing_data       = "Brakujące dane<br />Musisz wpisać przynajmniej tytuł i wybrać obrazek! Nie zapisano obrazka, ponieważ
  brakuje części z powyższych informacji!";
$admin_lang_ni_crop_nextstep      = "Teraz należy wybrać okno miniaturek:";
$admin_lang_ni_crop_background    = "To jest tło obrazka do przycięcia";
$admin_lang_ni_post_exif_date     = "Użyj daty z EXIFa";
$admin_lang_ni_db_error           = "<br />Problem aktualizacji danych w bazie!";
$admin_lang_ni_tags               = "Tagi";
$admin_lang_ni_alt_language				= "Podaj tytył i opis obrazka dla drugiego języka";

// Images
$admin_lang_imgedit_edit            = "Edycja";
$admin_lang_imgedit_title           = "Tytuł:";
$admin_lang_imgedit_file_name       = "Nazwa pliku:";
$admin_lang_imgedit_dimensions      = "Rozmiary:";
$admin_lang_imgedit_tbpublished     = "Opublikowany:";
$admin_lang_imgedit_category_plural = "Kategorie:";
$admin_lang_imgedit_delete          = "Usuń";
$admin_lang_imgedit_deleted         = "Usuwanie wpisów / Usuwanie obrazków / Usuwanie miniaturek";
$admin_lang_imgedit_deleted1        = "Wpis skasowany.";
$admin_lang_imgedit_deleted2        = "Obrazek skasowany.";
$admin_lang_imgedit_delete_error    = "Nie można usunęć pliku obrazka.\n
  Musisz zrobić to inaczej, prawdopodobnie poprzez program FTP.";
$admin_lang_imgedit_deleted3        = "Miniaturka skasowana.";
$admin_lang_imgedit_delete_error2   = "Nie można usunęć pliku miniaturki.\n
  Musisz zrobić to inaczej, prawdopodobnie poprzez program FTP.";
$admin_lang_imgedit_reupimg         = "Ponowne przesłanie zdjęcia:";
$admin_lang_imgedit_file            = "Plik: ";
$admin_lang_imgedit_file_isuploaded = "został ponownie zapisany!";
$admin_lang_imgedit_update          = "Aktualizacja obrazka";
$admin_lang_imgedit_updated         = "Zaktualizowano obrazek";
$admin_lang_imgedit_txt_desc        = "Tekst/opis:";
$admin_lang_imgedit_dtime           = "Data i czas:";
$admin_lang_imgedit_img             = "Obraz:";
$admin_lang_imgedit_fsize           = "Rozmiar pliku:";
$admin_lang_imgedit_12cropimg       = "Narzędzie CropImage:";
$admin_lang_imgedit_12cropimg_txt   = "Dla edycji miniaturki do tego zdjęcia opuść myszką okno obcinania lub zwiększ/zmniejsz je przy pomocy
  przycisków '+'/'-':";
$admin_lang_imgedit_uthmb_button    = "Uaktualnij miniaturkę";
$admin_lang_imgedit_u_post_button   = "Uaktualnij wpis";
$admin_lang_imgedit_title1          = "Obrazki / Wpisy - Edycja lub Usuwanie obrazka || ";
$admin_lang_imgedit_title2          = " - liczba wszystkich obrazków w bazie || Pokazuje wpisów: ";
$admin_lang_imgedit_title3          = " , stronę: ";
$admin_lang_imgedit_title4          = " z ";
$admin_lang_imgedit_12crop_opt      = "<strong>Uwaga:</strong> Dodatek 12CropImage nie jest aktywny. Powoduje to, że miniaturki nie są edytowalne.";
$admin_lang_imgedit_edit_post       = "EDYTUJ WPIS";
$admin_lang_imgedit_img_page        = "obrazków na stronę";
$admin_lang_imgedit_cropbg          = "To jest tło tekstowe 12cropimage";
$admin_lang_imgedit_js_del_im       = "Czy napewno chcesz skasować ten obrazek?";
$admin_lang_imgedit_preview         = "Podgląd";
$admin_lang_imgedit_db_error        = "<br />Problem aktualizacji danych w bazie!";
$admin_lang_imgedit_tags            = $admin_lang_ni_tags;
$admin_lang_imgedit_alt_language  	= "Zmiana tytułu i opisu obrazka dla drugiego języka";

// Mass-Edit Categories
$admin_lang_imgedit_mass_1 = "Masowa edycja kategorii";
$admin_lang_imgedit_mass_2 = "Przypisz";
$admin_lang_imgedit_mass_3 = "Wykreśl";
$admin_lang_imgedit_mass_4 = "Uaktualnij";
$admin_lang_imgedit_mass_5 = "Wybrana kategoria/ie została usunięta dla";
$admin_lang_imgedit_mass_6 = "obrazków.";
$admin_lang_imgedit_mass_7 = "Wybrana kategoria/ie została ustawiona dla";
$admin_lang_imgedit_mass_8 = "obrazków.";

// Categories
$admin_lang_cats_add_cat            = "Dodaj kategorię";
$admin_lang_cats_added              = "Kategoria została dodana.";
$admin_lang_cats_add_cat_txt        = "Dodaj kategorię, którą możesz przypisać do obrazków.";
$admin_lang_cats_edit_cat           = "Edytuj kategorie";
$admin_lang_cats_edit_cat_txt       = "Edytuj kategorię";
$admin_lang_cats_edit_cat_button    = "Edytuj kategorię";
$admin_lang_cats_edit_tip           = "Edycja nazwy wskazanej kategorii.<br />Wszystkie obrazki należące do starej kategorii zostaną przepisane do
  nowo wpisanej.";
$admin_lang_cats_delete_cat         = "Usuń kategorie";
$admin_lang_cats_delete_cat_txt     = "Usuń kategorię";
$admin_lang_cats_delete_cat2        = "Usunięcie:";
$admin_lang_cats_delete_cats_button = "Usuń kategorię";
$admin_lang_cats_deleted            = "Kategoria została usunięta.";
$admin_lang_cats_update             = "Uaktualnij Kategorię";
$admin_lang_cats_update_cat_button  = "Uaktualnij Kategorię";
$admin_lang_cats_updated            = "Kategorię Uaktualniono.";


// Comments
$admin_lang_cmnt_commentlist       = "Lista komentarzy - edycja i usuwanie&nbsp;|| Pokazuje: ";
$admin_lang_cmnt_name              = "Nick:";
$admin_lang_cmnt_email             = "Email:";
$admin_lang_cmnt_comment           = "Komentarz:";
$admin_lang_cmnt_image             = "Obrazek";
$admin_lang_cmnt_delete            = "Usuń";
$admin_lang_cmnt_deleted           = "Usunięto komentarz.";
$admin_lang_cmnt_delete1           = "Usunięto";
$admin_lang_cmnt_delete2           = "wybrane komentarze.";
$admin_lang_cmnt_edit              = "Edytuj";
$admin_lang_cmnt_edited            = "Komentarz wyedytowano.";
$admin_lang_cmnt_check_all         = "Wybierz wszystkie";
$admin_lang_cmnt_clear_all         = "Wyczyść wybrane";
$admin_lang_cmnt_invert_checks     = "Odwróć selekcję";
$admin_lang_cmnt_del_selected      = "Usuń wybrane";
$admin_lang_cmnt_page              = "komentarzy na stronę.";
$admin_lang_cmnt_commenter         = "Komentarz wpisał:";
$admin_lang_cmnt_ip                = "Z IP:";
$admin_lang_cmnt_save              = "Zapisz";
$admin_lang_cmnt_massdelete_text   = "Zaznacz wszystkie komentarze, które chcesz skasować na raz";
$admin_lang_cmnt_js_del_comm       = "Czy napewno chcesz skasować ten komentarz?";
$admin_lang_cmnt_publish_sel       = "Publikuj wybrane";
$admin_lang_cmnt_unpublish_sel     = "Moderuj";
$admin_lang_cmnt_published         = "Opublikowane";
$admin_lang_cmnt_unpublished_cmnts = "uprzednio zamaskowane komentarze.";
$admin_lang_cmnt_unpublished       = "Ukryte";
$admin_lang_cmnt_published_cmnts   = "uprzednio opublikowane komentarze.";
$admin_lang_cmnt_error_blacklist   = "Błąd uaktualnienia czarnej listy: ";
$admin_lang_cmnt_error_banlist     = "Błąd uaktualnienia listy zbanowanych referujących: ";
$admin_lang_cmnt_moderation_que    = "Kolejka moderacji";
$admin_lang_cmnt_rep_spam          = 'Zgłoś Spam';


// Option
$admin_lang_optn_general    = "GŁÓWNE";
$admin_lang_optn_template   = "SKÓRKI";
$admin_lang_optn_thumbnails = "MINIATURKI";
$admin_lang_optn_tip        = "Nie zapomnij o zamykającym sleszu <b>'/'</b> n.p. <i>http://www.pixelpost.org/</i>";

$admin_lang_optn_update = "Uaktualnij";
$admin_lang_optn_yes    = "Tak";
$admin_lang_optn_no     = "Nie";

$admin_lang_optn_title_url          = "NAZWA WITRYNY I URL";
$admin_lang_optn_title              = "Tytuł:";
$admin_lang_optn_url                = "URL:";
$admin_lang_optn_usr_pss            = "ADMINISTRATOR &amp; HASŁO";
$admin_lang_optn_usr_pss_txt        = "Zmienić nazwę użytkownika lub hasło?";
$admin_lang_optn_usr                = "Użytkownik:";
$admin_lang_optn_pss                = "Hasło:";
$admin_lang_optn_pss_re             = "Powtórz hasło:";
$admin_lang_optn_email              = "EMAIL ADMINISTRATORA";
$admin_lang_optn_fillit             = "Wypełnij. Będzie to wymagane do odzyskiwania hasła.";
$admin_lang_optn_img_path           = "ŚCIEŻKA DO OBRAZKÓW";
$admin_lang_optn_tz                 = "Strefa czasowa";
$admin_lang_optn_tz_txt             = "Wybierz strefę czasową dla Twojej lokalizacji.";
$admin_lang_optn_sendemail          = "POWIADAMIANIE EMAILEM O KOMENTARZACH";
$admin_lang_optn_sendemail_txt      = "Powiadamiać emailem o nowych komentarzach?";
$admin_lang_optn_sendemail_html_txt = "Używać powiadamiania emailem w formacie HTML?";
$admin_lang_optn_comment_moderation = "MODERACJA KOMENTARZY";
$admin_lang_optn_cmnt_mod_txt       = "Chcesz moderować komentarze przed ich publikacją?";

$admin_lang_optn_switch_template    = "ZMIEŃ SKÓRKĘ";
$admin_lang_optn_lang_file          = "PLIK Z LOKALIZACJĄ";
$admin_lang_optn_dateformat         = "FORMAT DATY";
$admin_lang_optn_dateformat_txt     = "Format daty dla obrazków oraz wyświetlania komentarzy.  Wykorzystana składnia jest identyczna z tą dla
  funkcji PHP <a href='http://www.php.net/date' target='_blank'>date()</a>. To są przykłady znaczenia najczęściej używanych parametrów: Y:rok
  m:miesiąc d:dzień H:godzina i:minuta s:sekunda";
$admin_lang_optn_gmt                = "NALEŻY PAMIĘTAĆ, że to nie wspiera przejścia na czas letni/zimowy automatycznie i należy to zmienić
  ręcznie.<br />Sprawdź <a href='http://www.worldtimeserver.com/current_time_in_UTC.aspx'> aktualny czas GMT </a> jeśli nie masz pewności
  odnośnie przesunięcia Twojego czasu lokalnego względem GMT.<br />";
$admin_lang_optn_cat_link_format            = "FORMAT LINKÓW KATEGORII";
$admin_lang_optn_catlinkformat_select       = "Wybierz format linków kategorii";
$admin_lang_optn_cat_link_format_txt        = "Format wyświetlania linków kategorii w skórce.";
$admin_lang_optn_catlinkformat_custom       = "Własny format kategorii";
$admin_lang_optn_catlinkformat_custom_start = "Łańcuch początkowy:";
$admin_lang_optn_catlinkformat_custom_end   = "Łańcuch końcowy:";

$admin_lang_optn_calendar_type = "TYP KALENDARZA";

$admin_lang_optn_thumb_row            = "MINIATUREK W WIERSZU";
$admin_lang_optn_thumb_row_txt        = "Ustala ilość miniaturek dla automatycznie generowanego wiersza.<br/>Liczba ta powinna być nieparzysta dla
  najlepszego efektu, np. 7 lub 9, nie 6 lub 8.";
$admin_lang_optn_crop_thumbs          = "PRZYCINANIE MINIATUREK?";
$admin_lang_optn_crop_thumbs_txt      = "Jeśli chcesz, żeby miniaturki były przycięte do dokładnego wymiaru: wybierz <b>TAK.</b><br/>\n
  Jeśli chcesz zachować oryginalne proporcje: wybierz <b>NIE.</b><br/>\n
  Jeśli chcesz przyciąć miniaturkę samodzielnie po wgraniu obrazka na serwer: wybierz <b>12CropImage.</b>";
$admin_lang_optn_thumb_size           = "ROZMIAR MINIATUREK";
$admin_lang_optn_thumb_size_txt       = "Ustal rozmiar miniaturek, Szerokość x Wysokość.";
$admin_lang_optn_thumb_size_new       = "ustaw nowe wymiary";
$admin_lang_optn_reg_thumbs_button    = "Wygeneruj miniaturki ponownie";
$admin_lang_optn_regen_thumbs_txt     = "Opcja ta pozwala wygenerować ponownie miniaturki dla wszystkich wpisanych obrazków. NALEŻY PAMIĘTAĆ, że
  spowoduje to utratę wszystkich ręcznie przycinanych miniaturek na rzecz ich domyślnej postaci. Warto również wiedzieć, że można zmienić
  każdą z  miniaturek samodzielnie korzystając z 12CropImage podczas edycji wpisu.";
$admin_lang_optn_img_compression      = "KOMPRESJA MINIATUREK";
$admin_lang_optn_img_compression_txt  = "Określenie stopnia kompresji zdjęć w formacie JPEG? 10 stanowi niską jakość, a 100 najlepszą (brak
  strat)";
$admin_lang_optn_pass_chngd_txt       = "Hasło zostało zmienione.";
$admin_lang_optn_pass_notchngd_txt    = "Hasło nie zostało zmienione. Wpisz to samo hasło w pole potwierdzenia.";
$admin_lang_optn_title_url_text       = "Sprawdź lub zmodyfikuj tytuł strony oraz adres URL Twojej instalacji";
$admin_lang_optn_thumb_updated        = "Miniaturki uaktualnione!";
$admin_lang_optn_updated              = "miniaturki uaktualnione.";
$admin_lang_optn_visitorbooking_title = "Zapis odwiedzających";
$admin_lang_optn_visitorbooking_desc  = "Czy Pixelpost powinien zapisywać informacje o każdym odwiedzającym?";
$admin_lang_optn_upd_done             = "Zaktualizowano dane.";

// Info
$admin_lang_info_gd           = "Nie zainstalowane, poproś swojego dostawcę o zainstalowanie!";
$admin_lang_info_gd_jpg       = "z obsługą JPEG";
$admin_lang_pp_version1       = "Najnowsza wersja Pixelposta:";
$admin_lang_pp_forum          = "Szukasz pomocy lub chcesz ofiarować wsparcie, zapraszamy na forum Pixelpost";
$admin_lang_pp_min_php        = "Minimalne wymagania Pixelposta: PHP wersja";
$admin_lang_pp_min_mysql      = "Minimalne wymagania Pixelposta: MySQL";
$admin_lang_pp_exif1          = "<b>EXIF</b> Pixelpost używa";
$admin_lang_pp_exif2          = "dla informacji o EXIF";
$admin_lang_pp_path           = "Ścieżki";
$admin_lang_pp_imagepath      = "Domyślna ścieżka:";
$admin_lang_pp_imagepath_conf = "Skonfigurowana ścieżka:";
$admin_lang_pp_img_chmod1     = "Katalog obrazków bez praw zapisu!";
$admin_lang_pp_img_chmod2     = "Musisz ustawić prawidłowe prawa dostępu dla tego folderu lub nie będzie można wysyłać żadnych obrazów.";
$admin_lang_pp_img_chmod3     = "<br /> Ustaw <b>chmod 777</b> (prawa odczytu, zapisu i wykonania dla właściciela, grupy i reszty).";
$admin_lang_pp_img_chmod4     = "Czy można zapisywać do katalogu? TAK.";
$admin_lang_pp_img_chmod5     = "Katalog miniaturek bez praw zapisu!";
$admin_lang_pp_imgfolder      = "Katalog obrazków:";
$admin_lang_pp_thumbfolder    = "Katalog miniaturek:";
$admin_lang_pp_langfolder     = "Katalog lokalizacji:";
$admin_lang_pp_addfolder      = "Katalog dodatków:";
$admin_lang_pp_incfolder      = "Katalog bibliotek:";
$admin_lang_pp_tempfolder     = "Katalog skórek:";
$admin_lang_pp_folder_missing = "Nie istnieje (powinno być";
$admin_lang_pp_ref_log_title  = "Referujący z ostatnich siedmiu dni";
$admin_lang_hostinfo          = "Informacje o serwerze";
$admin_lang_fileuploads       = "<b>Wysyłanie plików</b> na stronę pixelposta są";
$admin_lang_serversoft        = "Oprogramowanie serwera";
$admin_lang_pixelpostinfo     = "Pixelpost Information";
$admin_lang_pp_currversion    = "Używasz PixelPosta w wersji";

// AddOns
$admin_lang_addon_title        = "ZAINSTALOWANE DODATKI";
$admin_lang_failed_addonstatus = "Wystąpił problem przy aktualizacji statusu dodatku: ";
$admin_lang_addon_off          = "Kliknij żeby wyłączyć!";
$admin_lang_addon_on           = "Kliknij żeby włączyć!";

// Error Messages
$admin_lang_pp_up_error_0 = "Wysyłanie przebiegło bez problemów.";
$admin_lang_pp_up_error_1 = "Osiągnięto maksymalny rozmiar pliku jaki może obsłużyć serwer.";
$admin_lang_pp_up_error_2 = "Osiągnięto maksymalny rozmiar pliku.";
$admin_lang_pp_up_error_3 = "Plik nie został przesłany w całości.";
$admin_lang_pp_up_error_4 = "Żaden plik nie został przesłany.";
$admin_lang_pp_up_error_6 = "Brak katalogu tymczasowego.";
$admin_lang_pp_up_error_7 = "Plik nie został zapisany na dysku.";


// options >> time stamps
$admin_lang_optn_timestamps_title = "Znacznik czasu";
$admin_lang_optn_timestamps_desc  = "Dodawanie znacznika czasu do nazw plików zapobiega nadpisywaniu obrazków z tą samą nazwą. <br/>
																			Użyć znacznika czasu? ";

// options >> fight spam
$admin_lang_spam           = "SPAM CONTROL";
$admin_lang_spam_err_1     = "Błąd tworzenia tabeli z lista banów: ";
$admin_lang_spam_tableadd  = "Tabela z lista banów Banlist została dodana do wali z SPAMem z poziomu rdzenia";
$admin_lang_spam_err_2     = "Błąd aktualizacji listy moderacji: ";
$admin_lang_spam_err_3     = "Błąd aktualizacji blacklisty: ";
$admin_lang_spam_err_4     = "Błąd aktualizacji banów listy referujących: ";
$admin_lang_spam_err_5     = "Błąd aktualizacji liczby akceptowalnych linków w komentarzach : ";
$admin_lang_spam_upd       = "Zaktualizowano wszystkie listy banów";
$admin_lang_spam_err_6     = "Błąd aktualizacji komentarzy, gdy porównywano z lista moderacji : ";
$admin_lang_spam_com_upd   = "Wykonano: komentarze są porównywane z listą moderacji ";
$admin_lang_spam_err_7     = "Błąd usunięcia komentarzy, gdy porównywano z blacklistą: ";
$admin_lang_spam_com_del   = "Wykonano: komentarze ze słowami/adresami IP z listy bad-referer zostały skasowane.";
$admin_lang_spam_err_8     = "Błąd usunięcia odwiedzających, gdy porównywano z blacklistą: ";
$admin_lang_spam_visit_del = "Odwiedzający ze słowami/adresami IP z listy bad-referer są skasowani.";

// New! 
$admin_lang_spam_ban             = "Lista banów";
$admin_lang_spam_content         = "Dodaj listy zbanowanych słów/adresów IP/nazw do pól tekstowych poniżej, jedno słowo w linii.<br/>\n
  Każdy komentarz ze słowem, adresem IP lub nazwą na liście moderacji zostanie wysłany do kolejki moderacji.<br/>\n
  Każdy komentarz ze słowem, adresem IP lub nazwą na czarnej liście nie dostanie prawa pojawienia się na liście komentarzy.<br/>
  Każdy odwiedzający z adresem IP na <b>Liście zbanowanych Referujących</b> lub z adresem zawierającym słowa z listy zostanie\n
  pozbawiony możliwości dostępu do Twojego photobloga. ( Kod ten powinien zostać dodany do .htaccess, aby to działało!)";
$admin_lang_spam_modlist         = "Lista moderacji";
$admin_lang_spam_blacklist       = "Czarna lista";
$admin_lang_spam_reflist         = "Lista zbanowanych referujących";
$admin_lang_spam_blacklist_text  = "Skopiuj kod poniżej (CTRL+A i CTRL+C w Windows) i wklej go do pliku .htaccess Twojej strony żeby zbanować spamujące adresy IP i referujących.";
$admin_lang_spam_htaccess_text   = "Pobierz kod .htaccess";
$admin_lang_spam_check_comm      = "Sprawdź dotychczasowe komentarze";
$admin_lang_spam_del_bad_comm    = "Skasuj Złe Komentarze";
$admin_lang_spam_del_bad_ref     = "Skasuj Złych Referujących";
$admin_lang_spam_updateblacklist = "Aktualizuj wszystkie listy zbanowanych";
?>