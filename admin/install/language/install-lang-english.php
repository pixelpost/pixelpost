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
$lang_menu_overview    = "Overview";
$lang_menu_intro       = "Introduction";
$lang_menu_lic         = "License";
$lang_menu_support     = "Support";

$lang_menu_install     = "Install";
$lang_menu_upgrade     = "Upgrade";

$lang_menu_req         = "Requirements";
$lang_menu_db          = "Database";
$lang_menu_admin       = "Administrator";
$lang_menu_settings    = "Settings";
$lang_menu_config      = "Configuration";
$lang_menu_pop         = "Finalize";


////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////
////						LANGUAGE : GLOBAL
////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
$lang_install_caption  = "Installation Panel";
$lang_check_settings   = "Check your settings:";

$lang_language_btn     = "Change";
$lang_verify_btn       = "Verify Details";
$lang_proceed_btn      = "Proceed to next step";
$lang_test_btn         = "Test Connection";
$lang_retest_btn       = "Re-test Requirements";
$lang_start_btn        = "Begin Installation";
$lang_up_btn           = "Begin Upgrade";
$lang_download_btn     = "Download Configuration File";
$lang_finished_btn     = "Finished";
$lang_finished_cont_up = "Continue w/ Upgrade";

$lang_cont             = "Continue Installation";
$lang_conn_success     = "Connection Successful!";
$lang_conn_fail        = "Connection Failed!";
$lang_db_conn_error    = "Database Connection Error:";

$lang_yes              = "Yes";
$lang_no               = "No";
$lang_passed           = "Passed";
$lang_fail             = "Failed";
$lang_value            = "Value";

$lang_writable_no      = "Unwritable";
$lang_writable         = "Writable";

$lang_not_found        = "Not Found";
$lang_found            = "Found";

$lang_process          = "Process";
$lang_status           = "Status";


////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////
////						LANGUAGE : ERROR
////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
$lang_database_error   = "Due to an error in your database, the installer was unable to continue.";
$lang_version_error    = "Reason: The version table is incorrect.";
$lang_config_error     = "Reason:";


////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////
////						LANGUAGE : EMAIL MESSAGE
////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
$lang_email_sent       = "Credentials successfully sent!";
$lang_email_failed     = "Credential delivery failed! Uncheck the send email option or try again.";
$lang_email_cred       = "Email administrator credentials:";
$lang_email_cred_msg   = "By choosing this option, your database and administrator credentials will be emailed to the specified address above.";

$lang_email_subject    = "Welcome to Pixelpost!";
$lang_email_message_0  = "Thank you for choosing Pixelpost!";
$lang_email_message_1  = "You will find your administration login credentials below as well as your database connection information.";
$lang_email_message_2  = "You may login to your administration panel by visiting:";
$lang_email_footer     = "Remember to keep these details in a safe place.";
$lang_email_signature  = "Team Pixelpost";


////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////
////						LANGUAGE : OVERVIEW : INTRODUCTION
////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
$lang_overview         = "Welcome to Pixelpost!";

$lang_overview_intro_1 = "Pixelpost is an open-source, standards-compliant, multi-lingual, fully extensible photoblog application for the web.";
$lang_overview_intro_2 = "Please read our";
$lang_overview_intro_3 = "installation guide";
$lang_overview_intro_4 = "for a more manual approach to installing Pixelpost.";
$lang_overview_intro_5 = "This installation system will guide you through the process of installing Pixelpost.";
						 
						 
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
$lang_overview_support = "Support";

$lang_overview_sup_1   = "Full support can be obtained by visiting Pixelpost's";
$lang_overview_sup_2   = "support forum";
$lang_overview_sup_3   = "We will provide answers to general setup questions, configuration problems, and support for determining common problems mostly related to bugs. We also allow discussions about modifications and custom code/style additions.";
$lang_overview_sup_4   = "For additional assistance, please refer to our";
$lang_overview_sup_5   = "online documentation";
						 
						 
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////
////						LANGUAGE : INSTALL : INTRODUCTION
////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
$lang_install          = "Welcome to Installation";

$lang_install_intro_1  = "In order to proceed, you will need your database settings.";
$lang_install_intro_2  = "If you do not know this information, you may ask your hosting provider's support department to aid you with obtaining it.";
$lang_install_intro_3  = "You will need the following:";
$lang_install_intro_4  = "The Database server hostname or DSN - the address of the database server (often localhost).";
$lang_install_intro_5  = "The Database name - the name of the database on the server.";
$lang_install_intro_6  = "The Database username and Database password - the login data to access the database.";
						 
						 
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////
////						LANGUAGE : INSTALL : REQUIREMENTS
////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
$lang_install_req      = "Requirements";

$lang_files_folders    = "Files and Directories";

$lang_req_msg_1        = "Before proceeding with the full installation, Pixelpost has carried out some tests on your servers configuration and files to ensure that you are able to install and run Pixelpost.";
$lang_req_msg_2        = "Please ensure you read through the results thoroughly and do not proceed until all the required tests are passed.";

$lang_req_php          = "PHP Version and Settings";
$lang_req_php_ver      = "PHP version > or = 4.3.3:";

$lang_req_globals_1    = "PHP setting";
$lang_req_globals_2    = "register_globals";
$lang_req_globals_3    = "is disabled:";

$lang_req_globals_msg  = "Pixelpost will still run if this setting is enabled, but if possible, it is recommended that register_globals is disabled on your PHP install for security reasons.";
						  
$lang_req_imagesize_1  = "PHP function";
$lang_req_imagesize_2  = "getimagesize()";
$lang_req_imagesize_3  = "is available:";

$lang_req_imgsize_msg  = "In order for Pixelpost to function correctly, the getimagesize function needs to be available.";
						 
$lang_req_pcre         = "PCRE UTF-8 support:";
$lang_req_pcre_msg     = "Pixelpost will not run correctly if your PHP installation is not compiled with UTF-8 support in the PCRE extension.";

$lang_req_gd           = "GD graphics support:";
$lang_req_gd_msg       = "Pixelpost will not run if your PHP installation is not compiled with the GD graphics library.";


$lang_req_required_1   = "You must be running at least version 4.3.3 of PHP in order to install Pixelpost.";

$lang_req_required_2   = "In order to function correctly, Pixelpost needs to be able to access or write to certain files or directories.";

$lang_req_not_found    = "If you see 'Not Found' you need to create the relevant directory.";
$lang_req_unwritable   = "If you see 'Unwritable' you need to change the permissions on the file or directory to allow Pixelpost to write to it. (CHMOD 755 or 777)";
$lang_req_unwritable_2 = "Remember to revert back to the folders original file permissions when installation has been completed.";


////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////
////						LANGUAGE : INSTALL : DATABASE
////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
$lang_install_db       = "Database Settings";
$lang_db_conf          = "Database Configuration";
$lang_db_conn          = "Database connection";
$lang_db_test          = "Test connection:";

$lang_db_host          = "Database host:";
$lang_db_host_msg      = "The name of your database's host, often 'localhost'";

$lang_db_name          = "Database name:";
$lang_db_name_msg      = "The database name Pixelpost will use to store your photoblogs information.";

$lang_db_user          = "Database username:";
$lang_db_user_msg      = "The username used to connect to your database.";

$lang_db_pass          = "Database password:";
$lang_db_pass_msg      = "The password used to connect to your database.";

$lang_db_prefix        = "Database prefix:";
$lang_db_prefix_msg    = "The prefix used to distinguish between multiple Pixelpost installations within the same database.";


$lang_db_name_error    = "No database name specified.";
$lang_db_host_error    = "No host name specified.";
$lang_db_prefix_char   = "The table prefix you have specified is invalid for your database. Please try another, removing characters such as the hyphen or period.";
$lang_db_max_prefix    = "The table prefix you have specified is too long. The maximum length is 36 characters.";


////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////
////						LANGUAGE : INSTALL : CONFIGURATION
////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
$lang_install_config   = "Configuration";
$lang_config_config    = "Pixelpost Configuration";

$lang_config_open      = "Open file:";
$lang_config_open_msg  = "Opens configuration file and prepares for writing.";

$lang_config_write     = "Write file:";
$lang_config_write_msg = "Writes contents to configuration file.";


$lang_config_chmod     = "CHMOD file:";
$lang_config_chmod_msg = "Sets the configuration file permissions (CHMOD 644). If this step fails, do not worry. You can manually change the permissions at a later date.";


$lang_config_exist     = "Configuration exists:";
$lang_config_exist_msg = "Checks if configuration file has been saved.";

$lang_config_conn_msg  = "Attempts to connect to the database using the new configuration file.";

$lang_download_msg_1   = "Something has gone awry while attempting to create, store, and connect with your Pixelpost configuration file!";
$lang_download_msg_2   = "Have a look below to see if any suggestions have been offered to correct the problem.";
$lang_download_msg_2_2 = "If all else fails, please use the download button above to save your configuration file and proceed to manually upload it to your includes/ folder via FTP once you have verified its contents.";
$lang_download_msg_3   = "Once you have done this, please continue with the installation by re-testing your connection.";

$lang_config_message   = "Your configuration has been successfully created and saved. All tests have passed!";


////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////
////						LANGUAGE : INSTALL : ADMINISTRATOR
////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
$lang_install_admin    = "Administrator Details";
$lang_admin_conf       = "Administrator Configuration";
$lang_admin_lang       = "Default administrator language:";

$lang_admin_user       = "Administrator username:";
$lang_admin_user_msg   = "Please enter a username between 3 and 20 characters in length.";

$lang_admin_pass1      = "Administrator password:";
$lang_admin_pass1_msg  = "Please enter a password between 6 and 30 characters in length.";

$lang_admin_pass2      = "Confirm administrator password:";


$lang_admin_email1     = "Contact e-mail address:";
$lang_admin_email2     = "Confirm contact e-mail:";

$lang_admin_test_pass  = "Tests passed";
$lang_admin_all_fields = "You must fill out all fields in this block.";
$lang_admin_match_psw  = "The passwords you entered did not match.";
$lang_admin_user_short = "The username you entered is too short. The minimum length is 3 characters.";
$lang_admin_user_long  = "The username you entered is too long. The maximum length is 20 characters.";
$lang_admin_pass_short = "The password you entered is too short. The minimum length is 6 characters.";
$lang_admin_pass_long  = "The password you entered is too long. The maximum length is 30 characters.";
$lang_admin_mail_match = "The e-mails you entered did not match.";
$lang_admin_mail_wrong = "The e-mail address you entered is invalid.";


////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////
////						LANGUAGE : INSTALL : SETTINGS
////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
$lang_set_title        = "Title:";
$lang_set_sub_title    = "Sub title:";
$lang_set_path         = "URL:";

$lang_set_timezone     = "Timezone:";
$lang_set_timezone_msg = "Select the timezone that closely resembles your own. See <a href='http://www.timeanddate.com/' target='_blank'>Timeanddate.com</a> for more information.";

$lang_set_tz_dst       = "DST:";
$lang_set_tz_dst_msg   = "Are you currently observing daylight savings time? (Don't forget to change that as the year passes!)";

$lang_set_title_long   = "The title / sub-title you entered is too long. The maximum length is 100 characters.";
$lang_set_eos          = "Your URL must contain a trailing slash (/).";


////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////
////						LANGUAGE : INSTALL : FINALIZE
////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////					 
$lang_menu_pop_db      = "Populate Database";
$lang_dsb_addon_00_01  = "By default, Pixelpost will attempt to disable all found 3rd party addons:";				 
$lang_dsb_addon_01     = "Some 3rd party addons have been disabled:";
$lang_dsb_addon_02     = "Some 3rd party addons may fail to properly function with this version of Pixelpost.";
$lang_dsb_addon_02_1   = "This action will ensure that you don't end up with an upgraded-but-broken installation of Pixelpost.";
$lang_dsb_addon_02_2   = "Pixelpost's default addons remain activated/deactivated based on your configuration.";

$lang_dsb_addon_03     = "The following addons have been disabled:";
$lang_dsb_addon_04     = "Once logged into the administration panel, one-by-one, turn the disabled 3rd party addons back on and verify that Pixelpost functions as expected.";
$lang_dsb_addon_04_1   = "If an addon fails to function, deactivate the addon and contact the addon author to encourage him (or her) to upgrade the addon.";

$lang_dsb_addon_00     = "No 3rd party addons found. No additional addons have been disabled.";

$show_psw_msg          = "Here are your login credentials. Remember to write them down and keep them in a safe place.";
$lang_convert_psw      = "Convert password:";
$lang_convert_psw_suc  = "Your password has been converted and is now stored as a MD5 hash. This does not alter your passwords value in any way.";
$lang_convert_psw_err  = "An error occurred while converting your password to the new MD5 hash. Your passwords value has not been altered in any way.";

$lang_created          = "Created";
$lang_populated        = "Populated";
$lang_updated          = "Updated";
$lang_create_update_to = "Update to";

$lang_create_populate  = "Populate configuration table:";

$lang_create_config    = "Create configuration table:";
$lang_create_cat       = "Create categories table:";
$lang_create_pixelpost = "Create pixelpost table:";
$lang_create_comments  = "Create comments table:";
$lang_create_visitors  = "Create visitors table:";
$lang_create_version   = "Create version table:";
$lang_create_catassoc  = "Create catassoc table:";
$lang_create_addons    = "Create addons table:";
$lang_create_banlist   = "Create banlist table:";


////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////
////						LANGUAGE : UPGRADE
////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
$lang_upgrade_msg_1    = "Pixelpost's database tables are about to be updated. This is required for the current version of Pixelpost to function properly.";
$lang_upgrade_msg_2    = "Press the Upgrade button to continue.";


////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////
////						LANGUAGE : DB FIX
////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
$lang_db_fix_msg       = "Your configuration file can no longer establish a database connection. Either your hosting provider or yourself has changed your database connection information. Please enter the correct information below.";
?>