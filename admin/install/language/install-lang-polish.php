<?php

// SVN file version:
// $Id$

/*
Pixelpost version 1.7.1

Version 1.7.1:
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
____________________________________________________________________________________

ADMIN INSTALL PANEL LANGUAGE VARIABLES:                                           */

////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////
////						LANGUAGE : MENU
////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
$lang_menu_overview    = "Przegląd";
$lang_menu_intro       = "Wprowadzenie";
$lang_menu_lic         = "Licencja";
$lang_menu_support     = "Wsparcie";

$lang_menu_install     = "Instalacja";
$lang_menu_upgrade     = "Aktualizacja";

$lang_menu_req         = "Wymagania";
$lang_menu_db          = "Baza danych";
$lang_menu_admin       = "Administrator";
$lang_menu_settings    = "Ustawienia";
$lang_menu_config      = "Konfiguracja";
$lang_menu_pop         = "Finalizacja";


////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////
////						LANGUAGE : GLOBAL
////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
$lang_install_caption  = "Panel Instalacyjny";
$lang_check_settings   = "Sprawdź ustawienia:";

$lang_language_btn     = "Zmień";
$lang_verify_btn       = "Zweryfikuj szczegóły";
$lang_proceed_btn      = "Przejdź do następnego kroku";
$lang_test_btn         = "Testuj połączenie";
$lang_retest_btn       = "Ponów test wymagań";
$lang_start_btn        = "Rozpocznij instalację";
$lang_up_btn           = "Rozpocznij aktualizację";
$lang_download_btn     = "Ściągnij plik konfiguracyjny";
$lang_finished_btn     = "Zakończ";
$lang_finished_cont_up = "Kontynuuj aktualizację";

$lang_cont             = "Kontynuuj instalację";
$lang_conn_success     = "Udało się połączyć!";
$lang_conn_fail        = "Brak połączenia!";
$lang_db_conn_error    = "Błąd połączenia z bazą danych:";

$lang_yes              = "Tak";
$lang_no               = "Nie";
$lang_passed           = "Powiodło się";
$lang_fail             = "Porażka";
$lang_value            = "Wartość";

$lang_writable_no      = "Nie możliwy do zapisu";
$lang_writable         = "Zapisywalny";

$lang_not_found        = "Nie znaleziono";
$lang_found            = "Znaleziono";

$lang_process          = "Proces";
$lang_status           = "Status";


////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////
////						LANGUAGE : ERROR
////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
$lang_database_error   = "Z powodu błędu w bazie danych instalator nie mógł kontynuować.";
$lang_version_error    = "Powód: Tabela wersji jest nieprawidłowa.";
$lang_config_error     = "Powód:";


////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////
////						LANGUAGE : EMAIL MESSAGE
////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
$lang_email_sent       = "Dane autoryzacyjne zostały wysłane!";
$lang_email_failed     = "Nie udało się wysłać danych autoryzacyjnych! Odznacz opcję wysyłki emaila i spróbuj ponownie.";
$lang_email_cred       = "Wyślij emaila z danymi autoryzacyjnymi:";
$lang_email_cred_msg   = "Wybór tej opcji spowoduje, że dane o Twojej bazie danych i koncie administratora Pixelposta zostaną wysłane pod podany powyżej adres email.";

$lang_email_subject    = "Witamy w Pixelpostie!";
$lang_email_message_0  = "Dziękujemy za wybranie Pixelposta!";
$lang_email_message_1  = "Poniżej znajdziesz informacje autoryzacyjne do logowania, tak jak i dane potrzebne do połączenia się z bazą danych.";
$lang_email_message_2  = "Do swojego panelu administracyjnego możesz zalogować się odwiedzając:";
$lang_email_footer     = "Pamiętaj, aby te dane przechowywać w bezpiecznym miejscu.";
$lang_email_signature  = "Zespół Pixelposta";


////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////
////						LANGUAGE : OVERVIEW : INTRODUCTION
////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
$lang_overview         = "Witamy w Pixelpostie!";

$lang_overview_intro_1 = "Pixelpost jest zgodną ze standardami, wielojęzyczną i w pełni rozszerzalną internetową aplikacją fotoblogową o otwartym kodzie.";
$lang_overview_intro_2 = "Prosimy o przeczytanie naszego";
$lang_overview_intro_3 = "Przewodnika Instalacji";
$lang_overview_intro_4 = "dla lepszego zrozumienia procesu instalacji Pixelposta.";
$lang_overview_intro_5 = "Instalator ten przeprowadzi Cię przez proces instalacji Pixelposta.";
						 
						 
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////
////						LANGUAGE : OVERVIEW : LICENSE
////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
$lang_overview_lic     = "GNU General Public License";


////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////
////						LANGUAGE : OVERVIEW : SUPPORT
////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
$lang_overview_support = "Wsparcie";

$lang_overview_sup_1   = "Pełne wsparcie otrzymasz odwiedzając";
$lang_overview_sup_2   = "forum wsparcia Pixelposta";
$lang_overview_sup_3   = "Dostarczymy odpowiedzi na pytania związane z ogólnym przygotowaniem, problemami w konfiguracji i wsparcie określające najczęstsze przyczyny związane z błędami. Umożliwimy również dyskusje na temat modyfikacji i dodatków w postaci własnych kodów i styli.";
$lang_overview_sup_4   = "Dodatkową pomoc uzyskasz odwiedzając naszą";
$lang_overview_sup_5   = "dokumentację online";
						 
						 
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////
////						LANGUAGE : INSTALL : INTRODUCTION
////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
$lang_install          = "Witamy w instalatorze";

$lang_install_intro_1  = "Aby kontynuować, będziesz potrzebował danych o ustawieniach bazy danych.";
$lang_install_intro_2  = "Jeśli nie posiadasz tych informacji, to możesz zapytać się działu wsparcia (Twojego dostawcy usług hostingowych) o pomoc w ich pozyskaniu.";
$lang_install_intro_3  = "Potrzeba następujących danych:";
$lang_install_intro_4  = "Nazwa hosta serwera bazy danych lub DSN - adres serwera baz danych (często localhost).";
$lang_install_intro_5  = "Nazwa bazy danych - nazwa bazy danych na serwerze.";
$lang_install_intro_6  = "Nazwa użytkownika i hasło do bazy danych - dane logowania niezbedne do uzyskania dostępu do bazy danych.";
						 
						 
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////
////						LANGUAGE : INSTALL : REQUIREMENTS
////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
$lang_install_req      = "Wymagania";

$lang_files_folders    = "Pliki i Katalogi";

$lang_req_msg_1        = "Przed przejściem do właściwej instalacji, Pixelpost przeprowadza kilka testów konfiguracji serwera i plików, aby zapewnić powodzenie tej operacji i jego prawidłowego działanie.";
$lang_req_msg_2        = "Proszę upewnić się, że wyniki zostały przeczytane i nie kontynuować aż do momentu spełnienia wymaganych warunków testów.";

$lang_req_php          = "PHP - wersja i ustawienia";
$lang_req_php_ver      = "Czy PHP jest w wersji wyższej lub równej 4.3.3:";

$lang_req_globals_1    = "Czy ustawienie PHP";
$lang_req_globals_2    = "register_globals";
$lang_req_globals_3    = "jest niedostępne:";

$lang_req_globals_msg  = "Pixelpost będzie działał jeśli to ustawienie jest włączone, ale jeśli jest to możliwe, ze względów bezpieczeństwa zaleca się wyłączenie register_globals.";
						  
$lang_req_imagesize_1  = "Czy funkcja PHP";
$lang_req_imagesize_2  = "getimagesize()";
$lang_req_imagesize_3  = "jest dostępna:";

$lang_req_imgsize_msg  = "W celu prawidłowego funkcjonowania, Pixelpost wymaga dostępności funkcji getimagesize.";
						 
$lang_req_pcre         = "Czy jest wsparcie PCRE UTF-8:";
$lang_req_pcre_msg     = "Pixelpost nie będzie działał prawidłowo, jeśli PHP nie zostało skompilowane z opcją wsparcia UTF-8 w rozszerzeniu PCRE.";

$lang_req_gd           = "Czy jest wsparcie grafiki przez GD:";
$lang_req_gd_msg       = "Pixelpost nie będzie działał prawidłowo, jeśli PHP nie zostało skompilowane z biblioteką graficzną GD.";


$lang_req_required_1   = "Serwer musi mieć PHP w wersji minimum 4.3.3, aby zainstalować Pixelposta.";

$lang_req_required_2   = "W celu prawidłowego funkcjonowania, Pixelpost wymaga możliwości odczytu i zapisu wybranych plików i katalogów.";

$lang_req_not_found    = "Jeśli widzisz 'Nie znaleziono', wówczas musisz stworzyć odpowiedni katalog.";
$lang_req_unwritable   = "Jeśli widzisz 'Nie możliwy do zapisu', wówczas musisz zmienić prawa dostępu do pliku lub katalogu w celu umożliwienia Pixelpostowi zapisu. (CHMOD 755 lub 777)";
$lang_req_unwritable_2 = "Pamiętaj, aby przywrócić poprzednie uprawnienia do katalogów po zakończeniu procesu instalacji.";


////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////
////						LANGUAGE : INSTALL : DATABASE
////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
$lang_install_db       = "Ustawienia bazy danych";
$lang_db_conf          = "Konfiguracja bazy danych";
$lang_db_conn          = "Połączenie do bazy danych";
$lang_db_test          = "Test połączenia:";

$lang_db_host          = "Host bazy danych:";
$lang_db_host_msg      = "Nazwa hosta bazy danych, często 'localhost'";

$lang_db_name          = "Nazwa bazy danych:";
$lang_db_name_msg      = "Nazwa bazy danych, którą Pixelpost użyje do zapisu informacji tego fotobloga.";

$lang_db_user          = "Nazwa użytkownika bazy danych:";
$lang_db_user_msg      = "Nazwa użytkownika używana do połączenia się z bazą danych.";

$lang_db_pass          = "Hasło do bazy danych:";
$lang_db_pass_msg      = "Hasło używane do połaczenia się z bazą danych.";

$lang_db_prefix        = "Prefix bazy danych:";
$lang_db_prefix_msg    = "Prefix używany do odróżenienia wielu instalacji Pixelposta (jak i innych tabelek) w tej samej bazie danych.";


$lang_db_name_error    = "Nie podano nazwy bazy danych.";
$lang_db_host_error    = "Nie podano nazwy hosta.";
$lang_db_prefix_char   = "Podany prefix jest nieprawidłowy dla podanej bazy danych. Spróbuj wprowadzić inny, usuwając znaki takie jak myślnik lub kropka.";
$lang_db_max_prefix    = "Podany prefix tabel jest zbyt długi. Maksymalna długość to 36 znaków.";


////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////
////						LANGUAGE : INSTALL : CONFIGURATION
////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
$lang_install_config   = "Konfiguracja";
$lang_config_config    = "Konfiguracja Pixelposta";

$lang_config_open      = "Otwarcie pliku:";
$lang_config_open_msg  = "Otwiera plik konfiguracyjny i przygotowuje do zapisu.";

$lang_config_write     = "Zapis pliku:";
$lang_config_write_msg = "Zapisuje treść do pliku konfiguracyjnego.";


$lang_config_chmod     = "Ustawienie CHMOD pliku:";
$lang_config_chmod_msg = "Ustawia uprawnienia do pliku konfiguracyjnego (CHMOD 644). Jeśli ten krok nie powiedzie się, to nie przejmuj się. Później uprawnienia możesz zmienić manualnie.";


$lang_config_exist     = "Istnienie konfiguracji:";
$lang_config_exist_msg = "Sprawdź, czy plik konfiguracyjny został znaleziony.";

$lang_config_conn_msg  = "Próba połączenia do bazy danych przy wykorzystaniu nowego pliku konfiguracyjnego.";

$lang_download_msg_1   = "Coś zostało wykonane nieprawidłowo podczas tworzenia, zapisu i łączenia się z Twojego pliku konfiguracyjnego Pixelposta!";
$lang_download_msg_2   = "Popatrz poniżej i sprawdź, czy zostały zaoferowane jakiekolwiek sugestie rozwiązujące problem.";
$lang_download_msg_2_2 = "Jeśli wszystko inne zawiedzie, to użyj powyższego przycisku ściągnięcia w celu ściągnięcia pliku konfiguracyjnego i, korzystając z FTP, własnoręcznie zapisz go na serwerze w katalogu /includes, po uprzedniej weryfikacji jego treści.";
$lang_download_msg_3   = "Po wykonaniu tego kontynuuj proces instalacji poprzez ponowne przetestowanie połączenia.";

$lang_config_message   = "Konfiguracja została prawidłowo utworzona i zapisana. Wszystkie testy zakończyły się pozytywnie!";


////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////
////						LANGUAGE : INSTALL : ADMINISTRATOR
////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
$lang_install_admin    = "Dane szczegółowe administratora";
$lang_admin_conf       = "Konfiguracja administratora";
$lang_admin_lang       = "Domyślny język administratora:";

$lang_admin_user       = "Nazwa użytkownika:";
$lang_admin_user_msg   = "Wprowadź nazwę użytkownika o długości pomiędzy 3, a 20 znaków.";

$lang_admin_pass1      = "Hasło:";
$lang_admin_pass1_msg  = "Wprowadź hasło o długości pomiędzy 6, a 30 znaków.";

$lang_admin_pass2      = "Potwiedź hasło:";


$lang_admin_email1     = "Adres email:";
$lang_admin_email2     = "Potwierdź adres email:";

$lang_admin_test_pass  = "Test powiódł się";
$lang_admin_all_fields = "Musisz wypełnić wszystkie pola w tej części.";
$lang_admin_match_psw  = "Wprowadzone hasła nie zgadzają się ze sobą.";
$lang_admin_user_short = "Wprowadzona nazwa użytkownika jest zbyt krótka. Minimalna długość to 3 znaki.";
$lang_admin_user_long  = "Wprowadzona nazwa użytkownika jest zbyt długa. Maksymalna długość to 20 znaków.";
$lang_admin_pass_short = "Wprowadzone hasło jest zbyt krótkie. Minimalna długość to 6 znaków.";
$lang_admin_pass_long  = "Wprowadzone hasło jest zbyt długie. Maksymalna długość to 30 znaków.";
$lang_admin_mail_match = "Wprowadzone adresy email nie zgadzają się ze sobą.";
$lang_admin_mail_wrong = "Wprowadzony adres email jest nieprawidłowy.";


////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////
////						LANGUAGE : INSTALL : SETTINGS
////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
$lang_set_title        = "Tytuł:";
$lang_set_sub_title    = "Podtytuł:";
$lang_set_path         = "URL:";

$lang_set_timezone     = "Strefa czasowa:";
$lang_set_timezone_msg = "Wybierz strefę czasową, w której jesteś. Po więcej informacji wejdź na <a href='http://www.timeanddate.com/' target='_blank'>Timeanddate.com</a>.";

$lang_set_tz_dst       = "DST:";
$lang_set_tz_dst_msg   = "Czy obecnie używasz czasu letniego? (Nie zapomnij później tego zmienić w odpowiednim dniu!)";

$lang_set_title_long   = "Wprowadzony tytuł / podtytuł jest zbyt długi. Maksymalna długość to 100 znaków.";
$lang_set_eos          = "URL musi kończyć się slashem (/).";


////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////
////						LANGUAGE : INSTALL : FINALIZE
////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////					 
$lang_menu_pop_db      = "Tworzenie bazy danych";
$lang_dsb_addon_00_01  = "Domyślnie Pixelpost wyłączy wszystkie znalezione zewnętrzne dodatki:";				 
$lang_dsb_addon_01     = "Niektóre zewnętrzne dodatki zostały wyłączone:";
$lang_dsb_addon_02     = "Niektóre zewnętrzne dodatki mogą nie działać prawidłowo z tą wersją Pixelposta.";
$lang_dsb_addon_02_1   = "Ta operacja zapewni, że Pixelpost nie pozostanie w stanie zaktualizowanym, ale nie działającym.";
$lang_dsb_addon_02_2   = "Domyślne dodatki Pixelposta pozostaną aktywne/nieaktywne, w zależności od Twojej konfiguracji.";

$lang_dsb_addon_03     = "Poniższe dodatki zostały wyłączone:";
$lang_dsb_addon_04     = "Po zalogowaniu się do panelu administracyjnego, jeden po drugim, spowrotem włączaj zewnętrzne wyłączone dodatki i weryfikuj, czy Pixelpost nadal działa prawidłowo.";
$lang_dsb_addon_04_1   = "Jeśli jakiś dodatek przestał działać, to deaktywuj go i skontaktuj się z jego autorem namawiając go (ją) do aktualizacji tego dodatku.";

$lang_dsb_addon_00     = "Nie znaleziono zewnętrznych dodatków. Żaden dodatek nie został wyłączony.";

$show_psw_msg          = "To są dane autoryzacyjne. Pamiętaj, żeby zapisać je i trzymać w bezpiecznym miejscu.";
$lang_convert_psw      = "Konwertuj hasło:";
$lang_convert_psw_suc  = "Hasło zostało skonwertowane i zapisane jako hasz MD5. W żadnym wypadku nie spowodowało to zmiany wartości hasła.";
$lang_convert_psw_err  = "Wystąpił błąd podczas konwersji hasła do hasza MD5. W żadnym wypadku nie spowodowało to zmiany wartości hasła.";

$lang_created          = "Stworzono";
$lang_populated        = "Uzupełniono";
$lang_updated          = "Zaktualizowano";
$lang_create_update_to = "Zaktualizowano do";

$lang_create_populate  = "Uzupełniono tablę konfiguracyjną:";

$lang_create_config    = "Utworzono tablę konfiguracyjną:";
$lang_create_cat       = "Utworzono tablę kategorii:";
$lang_create_pixelpost = "Utworzono tablę pixelpost:";
$lang_create_comments  = "Utworzono tablę komentarzy:";
$lang_create_visitors  = "Utworzono tablę odwiedzających:";
$lang_create_version   = "Utworzono tablę wersji:";
$lang_create_catassoc  = "Utworzono tablę powiązania wersji:";
$lang_create_addons    = "Utworzono tablę dodatków:";
$lang_create_banlist   = "Utworzono tablę banlist:";


////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////
////						LANGUAGE : UPGRADE
////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
$lang_upgrade_msg_1    = "Tabele w bazie danych Pixelposta powinny zostać zaktualizowane. Jest to wymagane, aby aktualna wersja Pixelposta mogła działać prawidłowo.";
$lang_upgrade_msg_2    = "Wciśnij przycisk Aktualizuj i kontynuuj.";


////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////
////						LANGUAGE : DB FIX
////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
$lang_db_fix_msg       = "Plik konfiguracyjny nie zapewnia już połączenia z bazą danych. Z powodu zmiany danych potrzebnych do połączenia się z bazą danych, przez Ciebie lub dostawcę Twoich usług hostingowych, nie można nawiązać połączenia. Poniżej wprowadź prawidłowe dane.";
?>