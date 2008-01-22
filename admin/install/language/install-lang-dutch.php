<?php

// SVN file version:
// $Id$

/*
Pixelpost version 1.7

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
____________________________________________________________________________________

ADMIN INSTALL PANEL LANGUAGE VARIABLES:                                           */

////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////
////						LANGUAGE : MENU
////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
$lang_menu_overview    = "Overzicht";
$lang_menu_intro       = "Introductie";
$lang_menu_lic         = "Licentie";
$lang_menu_support     = "Ondersteuning";

$lang_menu_install     = "Installeren";
$lang_menu_upgrade     = "Upgraden";

$lang_menu_req         = "Eisen";
$lang_menu_db          = "Database";
$lang_menu_admin       = "Administrator";
$lang_menu_settings    = "Instellingen";
$lang_menu_config      = "Configuratie";
$lang_menu_pop         = "Afronden";


////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////
////						LANGUAGE : GLOBAL
////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
$lang_install_caption  = "Installatie Paneel";
$lang_check_settings   = "Controleer de instellingen:";

$lang_language_btn     = "Verander";
$lang_verify_btn       = "Check Details";
$lang_proceed_btn      = "Ga naar de volgende stap";
$lang_test_btn         = "Test Connectie";
$lang_retest_btn       = "Hertest Eisen";
$lang_start_btn        = "Begin Installatie";
$lang_up_btn           = "Begin Upgrade";
$lang_download_btn     = "Download Configuratie Bestand";
$lang_finished_btn     = "Gereed";
$lang_finished_cont_up = "Ga door met Upgrade";

$lang_cont             = "Ga door met Installatie";
$lang_conn_success     = "Connectie Succesvol!";
$lang_conn_fail        = "Connectie Mislukt!";
$lang_db_conn_error    = "Fout in Database Connectie:";

$lang_yes              = "Ja";
$lang_no               = "Nee";
$lang_passed           = "Geslaagd";
$lang_fail             = "Mislukt";
$lang_value            = "Waarde";

$lang_writable_no      = "Onbeschrijfbaar";
$lang_writable         = "Schrijfbaar";

$lang_not_found        = "Niet Gevonden";
$lang_found            = "Gevonden";

$lang_process          = "Process";
$lang_status           = "Status";


////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////
////						LANGUAGE : ERROR
////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
$lang_database_error   = "Vanwege een fout in de database kan de installatie proces niet voltooid worden.";
$lang_version_error    = "Oorzaak: De versie tabel is onjuist.";
$lang_config_error     = "Oorzaak:";


////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////
////						LANGUAGE : EMAIL MESSAGE
////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
$lang_email_sent       = "Credentialen met succes verstuurd!";
$lang_email_failed     = "Aflevering Credentialen mislukt! Deselecteer de verstuur mail optie of probeer het nog een keer.";
$lang_email_cred       = "Email administrator credentialen:";
$lang_email_cred_msg   = "Door deze optie te kiezen zal je database en adminstrator credentialen via email verstuurd worden naar het bovenstaande adres.";
$lang_email_subject    = "Welkom bij Pixelpost!";
$lang_email_message_0  = "Bedankt voor het kiezen van Pixelpost!";
$lang_email_message_1  = "Hieronder vindt u zowel de administratie login credentialen als informatie over de database connectie.";
$lang_email_message_2  = "U kunt hier inloggen in het administratie paneel:";
$lang_email_footer     = "Bewaar deze gegevens op een veilige plek.";
$lang_email_signature  = "Team Pixelpost";


////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////
////						LANGUAGE : OVERVIEW : INTRODUCTION
////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
$lang_overview         = "Welkom bij Pixelpost!";

$lang_overview_intro_1 = "Pixelpost is an open-source, standards-compliant, multi-lingual, fully extensible photoblog application for the web.";
$lang_overview_intro_2 = "Lees onze";
$lang_overview_intro_3 = "installatie handleiding";
$lang_overview_intro_4 = "voor een handmatige installatie van Pixelpost.";
$lang_overview_intro_5 = "Deze installatie wizzard zal u nu door het installatieproces loodsen.";
						 
						 
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
$lang_overview_support = "Ondersteuning";

$lang_overview_sup_1   = "Volledige ondersteuning kan worden verkregen op het Pixelpost's";
$lang_overview_sup_2   = "ondersteunings forum";
$lang_overview_sup_3   = "Hierin geven wij antwoorden op generieke installatie vragen, configuratie problemen en ondersteuning op problemen gerelateerd aan zogenaamde bugs. We discuseren daarnaast ook over modificaties en op maat gemaakte toevoegingen.";
$lang_overview_sup_4   = "Voor meer ondersteuning verwijzen wij u naar onze";
$lang_overview_sup_5   = "online documentatie";
						 
						 
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////
////						LANGUAGE : INSTALL : INTRODUCTION
////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
$lang_install          = "Welkom bij de Installatie";

$lang_install_intro_1  = "Om de installatie uit te voeren dient u beschikking te hebben over uw database gegevens.";
$lang_install_intro_2  = "Wanneer deze gegevens niet bekend zijn kunt u uw hostingsbedrijf vragen of zij deze gegevens willen verstrekken.";
$lang_install_intro_3  = "U heeft het volgende nodig:";
$lang_install_intro_4  = "De Database server hostnaam of DSN - het adres van de database server (vaak localhost).";
$lang_install_intro_5  = "De Database naam - de naam van de database op de server.";
$lang_install_intro_6  = "De Database gebruikersnaam en Database wachtwoord - de inlog data om toegang te krijgen tot de database.";
						 
						 
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////
////						LANGUAGE : INSTALL : REQUIREMENTS
////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
$lang_install_req      = "Eisen";

$lang_files_folders    = "Bestanden en Folders";

$lang_req_msg_1        = "Voordat de volledige installatie begint heeft Pixelpost een aantal tests uitgevoerd op uw server om na te gaan of Pixelpost geinstalleerd kan worden.";
$lang_req_msg_2        = "Wij verzoeken u zorgvuldig de resultaten door te nemen en niet verder te gaan voordat alle tests zijn geaccepteerd.";

$lang_req_php          = "PHP Versie en Instellingen";
$lang_req_php_ver      = "PHP versie > of = 4.3.3:";

$lang_req_globals_1    = "PHP instellingen";
$lang_req_globals_2    = "register_globals";
$lang_req_globals_3    = "is uitgeschakeld:";

$lang_req_globals_msg  = "Pixelpost zal nog steeds werken wanneer deze instelling aan staat. Indien mogelijk raden wij u aan om register_globals uit te schakelen vanwege het mogelijke veiligheidsrisico.";
						  
$lang_req_imagesize_1  = "PHP functie";
$lang_req_imagesize_2  = "getimagesize()";
$lang_req_imagesize_3  = "is aanwezig:";

$lang_req_imgsize_msg  = "Om Pixelpost goed te laten werken is de functie getimagesize nodig.";
						 
$lang_req_pcre         = "PCRE UTF-8 ondersteuning:";
$lang_req_pcre_msg     = "Pixelpost zal niet goed werken wanneer uw PHP installatie niet gecompileerd is met UTF-8 ondersteuning in de PCRE extensie.";

$lang_req_gd           = "GD graphics ondersteuning:";
$lang_req_gd_msg       = "Pixelpost zal niet werken wanneer uw PHP installatie niet gecompileerd is met GD graphics library.";


$lang_req_required_1   = "U heeft op zijn minst versie 4.3.3 van PHP nodig om Pixelpost te kunnen installeren.";

$lang_req_required_2   = "Om goed te kunnen functioneren heeft Pixelpost toegang nodig tot een aantal bestanden en folders.";

$lang_req_not_found    = "Als u 'Niet Gevonden' ziet dan moet u deze folder handmatig maken.";
$lang_req_unwritable   = "Als u 'Onbeschrijfbaar' ziet dan moet u de permissies van de bestanden of folders veranderen zodat Pixelpost er naar kan schrijven. (CHMOD 755 or 777)";
$lang_req_unwritable_2 = "Na afloop van de installatie kunt u de originele permissies weer terugzetten.";


////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////
////						LANGUAGE : INSTALL : DATABASE
////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
$lang_install_db       = "Database Instellingen";
$lang_db_conf          = "Database Configuratie";
$lang_db_conn          = "Database connectie";
$lang_db_test          = "Test connectie:";

$lang_db_host          = "Database host:";
$lang_db_host_msg      = "De naam van uw database's host, vaak 'localhost'";

$lang_db_name          = "Database naam:";
$lang_db_name_msg      = "De database naam die Pixelpost zal gebruiken om de informatie in op te slaan.";

$lang_db_user          = "Database gebruikersnaam:";
$lang_db_user_msg      = "De gebruikersnaam om een connectie te kunnen maken met de database.";

$lang_db_pass          = "Database wachtwoord:";
$lang_db_pass_msg      = "Het wachtwoord om een connectie te kunnen maken met de database.";

$lang_db_prefix        = "Database prefix:";
$lang_db_prefix_msg    = "De prefix word gebruikt om onderscheid te maken tussen meerdere Pixelpost installaties in een database.";


$lang_db_name_error    = "Geen database naam opgegeven.";
$lang_db_host_error    = "Geen host naam opgegeven.";
$lang_db_prefix_char   = "De gespecificeerde tabel prefix is ongeldig voor uw database. Probeer het gebruik van een koppelteken of een punt te vermijden.";
$lang_db_max_prefix    = "De gespecificeerde tabel prefix is te lang. De maximale lengte is 36 characters.";


////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////
////						LANGUAGE : INSTALL : CONFIGURATION
////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
$lang_install_config   = "Configuratie";
$lang_config_config    = "Pixelpost Configuratie";

$lang_config_open      = "Open bestand:";
$lang_config_open_msg  = "Open het configuratie bestand om te beschrijven.";

$lang_config_write     = "Schrijf bestand:";
$lang_config_write_msg = "Schrijf de inhoud naar het configuratie bestand.";


$lang_config_chmod     = "CHMOD bestand:";
$lang_config_chmod_msg = "Zet de permissies van het configuratie bestand (CHMOD 644). Mocht deze stap niet werken kunt u het later handmatig doen.";


$lang_config_exist     = "Configuratie bestaat:";
$lang_config_exist_msg = "Controleer of het configuratie bestand opgeslagen is";

$lang_config_conn_msg  = "Poging om een databaseverbinding te leggen met het nieuwe configuratie bestand.";

$lang_download_msg_1   = "Iets is verkeerd gegaan tijdens het maken, bewaren en verbinding maken met het nieuwe Pixelpost configuratie bestand.!";
$lang_download_msg_2   = "Hieronder staan misschien suggesties om het probleem op te lossen.";
$lang_download_msg_2_2 = "Wanneer dit ook niet werkt maak dan gebruik van de de download knop om uw configuratie bestand op te slaan en verplaats deze handmatig via FTP naar de includes/ folder.";
$lang_download_msg_3   = "Wanneer u dit heeft gedaan probeer dan nogmaals de connectie te testen.";

$lang_config_message   = "De configuratie is succesvol aangemaakt en bewaard. Alle tests zijn geslaagd!";


////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////
////						LANGUAGE : INSTALL : ADMINISTRATOR
////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
$lang_install_admin    = "Administrator Details";
$lang_admin_conf       = "Administrator Configuratie";
$lang_admin_lang       = "Standaard taal administrator:";

$lang_admin_user       = "Administrator gebruikersnaam:";
$lang_admin_user_msg   = "Voer een gebruikersnaam in van minimaal 3 en maximaal 20 characters.";

$lang_admin_pass1      = "Administrator wachtwoord:";
$lang_admin_pass1_msg  = "Voer een wachtwoord in met een lengte tussen de 6 en 30 characters.";

$lang_admin_pass2      = "Bevestig administrator wachtwoord:";


$lang_admin_email1     = "Contact e-mail adres:";
$lang_admin_email2     = "Bevestig contact e-mail:";

$lang_admin_test_pass  = "Tests geslaagd";
$lang_admin_all_fields = "Alle velden dienen ingevuld te worden.";
$lang_admin_match_psw  = "De wachtwoorden komen niet overeen.";
$lang_admin_user_short = "De gebruikersnaam is te kort. De maximale lengte is 3 characters.";
$lang_admin_user_long  = "De gebruikersnaam is te lang. De maximale lengte is 20 characters.";
$lang_admin_pass_short = "Het wachtwoord is te kort. De maximale lengte is 6 characters.";
$lang_admin_pass_long  = "Het wachtwoord is te lang. De maximale lengte is 30 characters.";
$lang_admin_mail_match = "De e-mails adressen komen niet overeen.";
$lang_admin_mail_wrong = "Het e-mail adres is foutief.";


////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////
////						LANGUAGE : INSTALL : SETTINGS
////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
$lang_set_title        = "Titel:";
$lang_set_sub_title    = "Sub titel:";
$lang_set_path         = "URL:";

$lang_set_timezone     = "Tijdzone:";
$lang_set_timezone_msg = "Selecteer een tijdzone die het beste overeenkomt. Zie <a href='http://www.timeanddate.com/' target='_blank'>Timeanddate.com</a> voor meer informatie.";

$lang_set_tz_dst       = "DST:";
$lang_set_tz_dst_msg   = "Zit u momenteel in de zogenaamde daylight savings time? (Vergeet dit niet aan te passen terwijl het jaar verstrijkt!)";

$lang_set_title_long   = "De titel / sub-titel is te lang. De maximale lengte is 100 characters.";
$lang_set_eos          = "De URL moet een 'trailing slash' (/) bevatten.";


////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////
////						LANGUAGE : INSTALL : FINALIZE
////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////					 
$lang_menu_pop_db      = "Kolonisatie Database";
$lang_dsb_addon_00_01  = "Standaard zal Pixelpost alle addons van derden uitschakelen.:";				 
$lang_dsb_addon_01     = "Sommige addons van derden zijn uitgeschakeld:";
$lang_dsb_addon_02     = "Sommige addons van derden kunnen niet goed werken met deze versie van Pixelpost.";
$lang_dsb_addon_02_1   = "Deze actie zorgt er voor dat u niet achterblijf met een verbeterde-maar-niet-werkende configuratie van Pixelpost.";
$lang_dsb_addon_02_2   = "De standaard addons van Pixelpost blijven aan- of uitgeschakeld (afhankelijk van hun huidige status).";

$lang_dsb_addon_03     = "De volgende addons zijn uitgeschakeld:";
$lang_dsb_addon_04     = "wanneer u weer ingelogd bent in het administratie paneel activeer deze addons een voor een en controleer de werking van Pixelpost.";
$lang_dsb_addon_04_1   = "Wanneer een addon niet werkt, deactiveer de addon en neem contact op met de auteur.";

$lang_dsb_addon_00     = "Er zijn geen addons van derden gevonden. Er zijn geen addons uitgeschakeld.";

$show_psw_msg          = "Dit zijn u login gegevens. Bewaar deze gegevens goed.";
$lang_convert_psw      = "Converteer wachtwoord:";
$lang_convert_psw_suc  = "Het wachtwoord is geconverteerd naar een MD5 hash. Het wachtwoord is niet gewijzigd.";
$lang_convert_psw_err  = "Tijdens de conversie van het wachtwoord naar een MD5 hash is er een fout opgetreden. Het wachtwoord is niet gewijzigd.";

$lang_created          = "Aangemaakt";
$lang_populated        = "Gekoloniseerd";
$lang_updated          = "Bijgewerkt";
$lang_create_update_to = "Bijgewertk tot";

$lang_create_populate  = "Koloniseer configuratie tabel:";

$lang_create_config    = "Maak configuratie tabel aan:";
$lang_create_cat       = "Maak categories tabel aan:";
$lang_create_pixelpost = "Maak pixelpost tabel aan:";
$lang_create_comments  = "Maak comments tabel aan:";
$lang_create_visitors  = "Maak visitors tabel aan:";
$lang_create_version   = "Maak version tabel aan:";
$lang_create_catassoc  = "Maak catassoc tabel aan:";
$lang_create_addons    = "Maak addons tabel aan:";
$lang_create_banlist   = "Maak banlist tabel aan:";


////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////
////						LANGUAGE : UPGRADE
////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
$lang_upgrade_msg_1    = "Pixelpost's database tabellen worden nu bijgewerkt. Dit is nodig voor de goede werking van Pixelpost.";
$lang_upgrade_msg_2    = "Klik op de Bijwerk knop om verder te gaan.";


////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////
////						LANGUAGE : DB FIX
////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
$lang_db_fix_msg       = "Het huidige configuratie bestand kan niet langer een connectie maken met de database. Dit kan komen door een verandering door uw hosting provider of door uzelf. U kunt hieronder de correcte informatie opgeven.";
?>