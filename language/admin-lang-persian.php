<?php
/*

admin-lang-persian.php : persian (default) language file for Pixelpost-Admin-Section
===================================================================================
Pixelpost version 1.7

SVN file version:
$Id$

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
Translated by Ramin Mehran
____________________________________________________________________

ADMIN PANEL LANGUAGE VARIABLES:

Dont edit                    ||      Edit                                   */

$_lang_file_translator        = 'Ramin Mehran - <a href="http://www.raminia.com/" target="_blank">www.raminia.com</a>';
$_lang_file_email             = 'ramin@pixelpost.org';
$_lang_file_rev               = '1.4.3';

$admin_lang_isrtl             = "خير"; // yes for right-to-left languages and no for left-to-right languages
$admin_lang_update            = "به‌روز شود";
$admin_lang_reload            = "<br /> براي ديدن اطلاعات جديد صفحه را دوباره بارگذاري کنيد";
$admin_lang_error             = "اشکال";
$admin_lang_post              = "ارسال‌ها";
$admin_lang_page              = "صفحه";
$admin_lang_of                = "از";
$admin_lang_next              = "بعدي";
$admin_lang_prev              = "قبلي";
$admin_lang_show              = "نمايش";
$admin_lang_go                = "انجام بده";
$admin_lang_done              = "انجام شد:";
$admin_lang_example			  = "Example";


// Admin Start
$admin_start_1                = "در مسير قرار ندارد يا فايل <b>language</b> پوشه‌اي به نام";
$admin_start_2                = "موجود نيست.<br/> دقت کنيد که همه فايل‌هايي که در ايجا ذکر شده‌است را کپي کرده‌باشيد. ";
$admin_start_userpw           = "نام‌کاربري يا کلمه عبور اشتباه است.";
$admin_start_pw_forgot        = "کلمه‌عبور را فراموش کرده‌ايد؟";
$admin_start_browser_title    = "مديريت";
$admin_start_welcome          = "به صفحه مديريت پيکسل پست خوش‌آمديد. براي استفاده وارد سيستم شود.";
$admin_start_pp_name          = "فوتوبلاگ شما:";
$admin_start_pp_tit           = "براي ديدن فوتوبلاگ کليک کنيد";
$admin_start_cookie           = "ورود به سيستم cookie ايجاد مي‌کند";
$admin_start_username         = "نام‌کاربري";
$admin_start_pw               = "کلمه‌عبور";
$admin_start_pw_button        = "پسورد جديد من را بفرست";
$admin_start_pw_recover       = "پسورد قديمي قابل بازسازي نيست. پسورد جديدي براي شما ايجاد شده و به آدرس پست‌الکترونيکي شما که در قسمت مديريت وارد شده ارسال مي‌گردد. \n براي تاييد آدرس پست‌الکترونيکي را وارد کنيد";
$admin_start_email            = "پست‌الکترونيکي";
$admin_start_email_button     = "آدرس پست الکترونيکي را وارد کنيد";
$admin_start_admin_1          = "مديريت";
$admin_start_admin_2          = "";

// Password Recovery
// New!
$admin_lang_pw_title            = "Pixelpost Password Recovery";

$admin_lang_pw_wronguser	= "The username you have mentioned is not the same as the admin user of Pixelpost.";
$admin_lang_pw_back             =  "Back to admin page";
$admin_lang_pw_noemail          = "You did not mention email address at all! \n<br />
				   If you have no clue about your password, leave a message in <a href='http://www.pixelpost.org/forum'>Pixelpost forum</a>
				   for help.\n<br />";
$admin_lang_pw_notsent          = "Nothing send! \n<br /> The email address you have entered is not the email address you have set in the admin panel.<br />";
$admin_lang_pw_subject		= "Pixelpost Password Recovery Message";
$admin_lang_pw_usertext		= "Your User-Name:";
$admin_lang_pw_mailtext		= "Your email-Adress:";
$admin_lang_pw_newpw		= "Your new password:";
$admin_lang_pw_text_1		= "This the password recovery of Pixelpost";
$admin_lang_pw_text_2		= "From: PIXELPOST Admin Section";
$admin_lang_pw_text_3		= "An email is sent to your email address with your username and a new password. \n<br />
				   Check your email address at ";
$admin_lang_pw_text_4 		= "<span style='color:red;'>Error! Something happened! \n<br />
				   The email address and username you have provided is OK but no email could be sent! \n<br />
                                   Ask your host administrator for help</span>";
$admin_lang_pw_text_5 		= "Database error:";
$admin_lang_pw_text_6		= "<br />Updating the new password failed.";
$admin_lang_pw_text_7           = "This email is sent automatically from the LogIn of your Photoblog.\nSomebody requested a new password for the Admin Section.\n\nYou should log in to your Photoblog\n\nat ";
$admin_lang_pw_text_8           = "\n\nand login with that new password to reset this automatical generated passwort\n\nimmediately!";

// Admin Menu
$admin_lang_new_image          = "عکس جديد";
$admin_lang_images             = "عکس‌ها";
$admin_lang_categories         = "طبقه‌بندي‌ها";
$admin_lang_comments           = "نظرات";
$admin_lang_options            = "تنظيمات";
$admin_lang_general_info       = "اطلاعات سيستم";
$admin_lang_addons             = "افزودني‌ها";
$admin_lang_logout             = "خروج";

// New Image
$admin_lang_ni_post_a_new_image   = "ارسال عکس جديد";
$admin_lang_ni_image              = "عکس";
$admin_lang_ni_image_title        = "عنوان عکس";
$admin_lang_ni_select_cat         = "انتخاب طبقه‌بندي";
$admin_lang_ni_description        = "توضيحات عکس";
$admin_lang_ni_datetime           = "زمان ارسال";
$admin_lang_ni_post_now           = "ارسال بلافاصله";
$admin_lang_ni_post_one_day_after = "ارسال به تاريخ يک روز پس از آخرين عکس";
$admin_lang_ni_post_spec_date     = "انتشار در تاريخ مشخص:";
$admin_lang_ni_post_entry         = "انتشار عکس";
$admin_lang_ni_upload             = "بفرست";
$admin_lang_ni_upload_error       = "در ارسال فايل مشکلي رخ داد!";
$admin_lang_ni_posted             = "با موفقيت ارسال شد!";
$admin_lang_ni_year               = "سال";
$admin_lang_ni_month              = "ماه";
$admin_lang_ni_day                = "روز";
$admin_lang_ni_hour               = "ساعت";
$admin_lang_ni_min                = "دقيقه";
$admin_lang_ni_markdown_text      = "از علامت‌هايMarkdown يا HTMLمي‌توانيد در نوشته‌هاي اين بخش استفاده ‌کنيد.";
$admin_lang_ni_markdown_hp        = " صفحه‌خانگيMarkdown";
$admin_lang_ni_markdown_element   = "روش‌نوشتن";
$admin_lang_ni_markdown_syntax    = "مرجع علامت‌ها";
$admin_lang_ni_missing_data       = "اطلاعات ناقص است!<br />\n
																			عکس حتما به عنوان نياز دارد
                                     \n
                                     توجه: به علت اشکالي که رخ داد هيچ عکسي ارسال نشد.\n";
$admin_lang_ni_crop_nextstep      = "پنجره برش عکس کوچک را انتخاب کنيد";
$admin_lang_ni_crop_background    = "اين پس زمينه قسمت برش است";
$admin_lang_ni_db_error           = "an error occured writing into database";
$admin_lang_ni_tags               = "Tags";
$admin_lang_ni_tags_desc          = "(comma, semicolon and space are used to seperate tags; join words using underline and dash)";
$admin_lang_ni_alt_language				= "Provide an image title and description in the alternative language";

// Images
$admin_lang_imgedit_edit           = "ويرايش";
$admin_lang_imgedit_title          = "عنوان:";
$admin_lang_imgedit_alttitle          		= "Alt. Title:";
$admin_lang_imgedit_file_name      = "";
$admin_lang_imgedit_dimensions     = "";
$admin_lang_imgedit_tbpublished    = "تاريخ انتشار:";
$admin_lang_imgedit_category_plural = "طبقه‌بندي‌ها";
$admin_lang_imgedit_delete          = "حذف";
$admin_lang_imgedit_deleted         = "حذف مطلب / عکس / عکس‌کوچک";
$admin_lang_imgedit_deleted1        = "مطلب ارسالي حذف شد.";
$admin_lang_imgedit_deleted2        = "عکس حذف شد.";
$admin_lang_imgedit_delete_error    = "در حذف عکس مشکلي رخ داد..\n
                                       براي حذف عکس بايد راه ديگري پيش بگيريد. پيشنهاد مي‌شود از FTP استفاده کنيد.";
$admin_lang_imgedit_deleted3        = "عکس‌کوچک حذف شد.";
$admin_lang_imgedit_delete_error2   = "در حذف عکس کوچک مشکلي رخ داد..\n
                                       براي حذف عکس بايد راه ديگري پيش بگيريد. پيشنهاد مي‌شود از FTP استفاده کنيد.";
$admin_lang_imgedit_reupimg         = "ارسال مجدد عکس:";
$admin_lang_imgedit_file            = "فايل: ";
$admin_lang_imgedit_file_isuploaded = "دوباره ارسال شد!";
$admin_lang_imgedit_update          = "به‌روز کردن عکس";
$admin_lang_imgedit_updated         = "عکس‌به روز شده";
$admin_lang_imgedit_txt_desc        = "توضيحات:";
$admin_lang_imgedit_dtime           = "زمان:";
$admin_lang_imgedit_img             = "عکس:";
$admin_lang_imgedit_fsize           = "";
$admin_lang_imgedit_12cropimg       = "ابزار برش عکس:";
$admin_lang_imgedit_12cropimg_txt   = "براي برش عکس پنجره روي عکس را با ماوس تکان دهيد و با + و - اندازه‌اش را تنظيم کنيد.";
$admin_lang_imgedit_uthmb_button    = "به‌روز رساني عکس‌کوچک";
$admin_lang_imgedit_u_post_button   = "به‌روز رساني";
$admin_lang_imgedit_title1          = "تصاوير - ارسال دوباره، ويرايش، حذف :: ";
$admin_lang_imgedit_title2          = " تصوير در کل بانک‌اطلاعاتي :: نمايش ";
$admin_lang_imgedit_title3          = " مطلب ارسالي از کل مطالب، صفحه‌ي";
$admin_lang_imgedit_title4          = " از ";
$admin_lang_imgedit_12crop_opt      = "براي ويرايش تصاوير در قسمت تنظيمات 12CropImage را فعال کنيد.";
$admin_lang_imgedit_edit_post       = "ويرايش مطلب";
$admin_lang_imgedit_img_page        = "عکس در هر صفحه";
$admin_lang_imgedit_cropbg          = "اينجا پس‌زمينه برش عکس است";
$admin_lang_imgedit_js_del_im       = "عکس حذف خواهد شد، مطمئن هستيد؟";
$admin_lang_imgedit_db_error        = "<br />Check if permalink string isn't used so far!";
$admin_lang_imgedit_tags_edit       = "Tags (comma, semicolon and space are used to seperate tags; join words using underline):";
$admin_lang_imgedit_alt_language    = "Change the alternative language image title and description";
$admin_lang_imgedit_masstag         = "Add/remove tags from selected images";
$admin_lang_imgedit_masstag_set     = "Add tag(s)";
$admin_lang_imgedit_masstag_set2    = "Add tag(s) for alternative language";
$admin_lang_imgedit_masstag_unset   = "Remove tag(s)";
$admin_lang_imgedit_published          = "Published";
$admin_lang_imgedit_unpublished_cmnts  = "previously masked image(s).";

// Mass-Edit Categories
$admin_lang_imgedit_mass_1          = "ويرايش عمده طبقه‌بندي‌ها";
$admin_lang_imgedit_mass_2          = "افزودن";
$admin_lang_imgedit_mass_3          = "برداشتن";
$admin_lang_imgedit_mass_4          = "به طور عمده به‌روز رساني شود";


// Categories
$admin_lang_cats_add_cat            = "افزودن طبقه‌بندي";
$admin_lang_cats_added              = "طبقه‌بندي افزوده شد.";
$admin_lang_cats_add_cat_txt        = "افزودن يک طبقه‌بندي";
$admin_lang_cats_edit_cat           = "ويرايش طبقه‌بندي‌ها";
$admin_lang_cats_edit_cat_txt       = "ويرايش يک طبقه‌بندي";
$admin_lang_cats_edit_cat_button    = "ويرايش طبقه‌بندي";
$admin_lang_cats_edit_tip           = "نام اين طبقه‌بندي را ويرايش کنيد. با ويرايش آن نام طبقه‌بندي همه عکس‌هاي مرتبط نيز تغيير خواهد کرد.";
$admin_lang_cats_delete_cat         = "حذف طبقه‌بندي‌ها";
$admin_lang_cats_delete_cat_txt     = "حذف يک طبقه‌بندي";
$admin_lang_cats_delete_cat2        = "حذف:";
$admin_lang_cats_delete_cats_button = "حذف طبقه‌بندي";
$admin_lang_cats_deleted            = "طبقه‌بندي حذف شد.";
$admin_lang_cats_update             = "طبقه‌بندي به‌روز شد.";
$admin_lang_cats_update_cat_button  = "به‌روز کن";
$admin_lang_cats_updated            = "نام طبقه‌بندي عوض شد.";

// Comments
$admin_lang_cmnt_commentlist        = "List of Comments - delete or edit at will&nbsp;||&nbsp;Showing";
$admin_lang_cmnt_name               = "Name:";
$admin_lang_cmnt_email              = "Email:";
$admin_lang_cmnt_comment            = "Comment:";
$admin_lang_cmnt_image              = "Image";
$admin_lang_cmnt_delete             = "Delete";
$admin_lang_cmnt_deleted            = "Deleted a comment.";
$admin_lang_cmnt_delete1            = "Deleted";
$admin_lang_cmnt_delete2            = "selected comment(s).";
$admin_lang_cmnt_edit               = "Edit";
$admin_lang_cmnt_edited             = "Edited a comment.";
$admin_lang_cmnt_check_all          = "Select all";
$admin_lang_cmnt_clear_all          = "Clear selections";
$admin_lang_cmnt_invert_checks      = "Invert selections";
$admin_lang_cmnt_del_selected       = "Delete selected";
$admin_lang_cmnt_page               = "comments per page.";
$admin_lang_cmnt_commenter          = "Comment made:";
$admin_lang_cmnt_ip                 = "From ip:";
$admin_lang_cmnt_save               = "Save";
$admin_lang_cmnt_massdelete_text    = "Check all comments, which you want to delete at once";
$admin_lang_cmnt_js_del_comm        = "Are you sure you want to delete that comment?";
$admin_lang_cmnt_publish_sel        = "Publish Selected";
$admin_lang_cmnt_unpublish_sel      = "Add to mooderation queue";
$admin_lang_cmnt_published          = "Published";
$admin_lang_cmnt_unpublished_cmnts  = "previously masked comment(s).";
$admin_lang_cmnt_unpublished        = "Masked";
$admin_lang_cmnt_published_cmnts    = "previously published comment(s).";

// New in comment:
$admin_lang_cmnt_error_blacklist    = "Error in updating the blacklist: ";
$admin_lang_cmnt_error_banlist      = "Error in updating the referer ban list: ";


// Option
$admin_lang_optn_general            = "GENERAL";
$admin_lang_optn_template           = "TEMPLATE";
$admin_lang_optn_thumbnails         = "THUMBNAILS";
$admin_lang_optn_tip                = "Don't forget the tailing slash <b>'/'</b> e.g. <i>http://www.pixelpost.org/</i>";

$admin_lang_optn_update             = "Update";
$admin_lang_optn_yes                = "Yes";
$admin_lang_optn_no                 = "No";

$admin_lang_optn_title_url         = "SITE TITLE AND URL";
$admin_lang_optn_title             = "Title:";
$admin_lang_optn_sub_title         = "Sub Title:";
$admin_lang_optn_url               = "URL:";
$admin_lang_optn_usr_pss           = "ADMIN USER &amp; PASSWORD";
$admin_lang_optn_usr_pss_txt       = "Change username or password?";
$admin_lang_optn_usr               = "User:";
$admin_lang_optn_pss               = "Password:";
$admin_lang_optn_pss_re            = "Reconfirm Password:";
$admin_lang_optn_email             = "ADMIN EMAIL";
$admin_lang_optn_fillit            = "Fill it. This will be used for password recovery.";
$admin_lang_optn_img_path          = "IMAGES PATH";
$admin_lang_optn_tz                = "Timezone";
$admin_lang_optn_tz_txt            = "Select the timezone offset of your location.";
$admin_lang_optn_sendemail         = "SEND EMAIL ON COMMENT";
$admin_lang_optn_sendemail_txt     = "Send notification email on comments?";
$admin_lang_optn_sendemail_html_txt = "use HTML notification emails?";
$admin_lang_optn_comment_setting 		= "GLOBAL COMMENT SETTINGS";
$admin_lang_optn_comment_setting2		= "Comment setting";
$admin_lang_optn_cmnt_mod_txt       = "Default action for comments:";
$admin_lang_optn_cmnt_mod_txt2      = "Action for comments:";
$admin_lang_optn_cmnt_mod_allowed		=	"Publish instantly";
$admin_lang_optn_cmnt_mod_moderation=	"To moderation queue";
$admin_lang_optn_cmnt_mod_forbidden	=	"Disable commenting";

$admin_lang_optn_switch_template    = "SWITCH TEMPLATE";
$admin_lang_optn_lang_file           = "LANGUAGE FILE";
$admin_lang_optn_lang_file_admin          = "ADMIN PANEL LANGUAGE FILE";
$admin_lang_optn_dateformat          = "DATE FORMAT";
$admin_lang_optn_dateformat_txt      = "The dateformat for images and comments display. This syntax used is identical for the PHP <a href='http://www.php.net/date' target='_blank'>date()</a> function. These are examples of what would replace some common parameters: Y:year m:month d:day H:hour i:minute s:second";
$admin_lang_optn_gmt                 = "Note that this does not support daylight saving automatically and you should change it manually.<br />Check <a href='http://www.worldtimeserver.com/current_time_in_UTC.aspx' target='__blank'> GMT Current time </a> if you are not sure about your local time offset form GMT.<br />";
$admin_lang_optn_cat_link_format     = "CATEGORY LINKS FORMAT";
// New!
$admin_lang_optn_catlinkformat_select = "Select Category Links Format";
$admin_lang_optn_cat_link_format_txt = "The format for displaying links to categories in the template.";

// NEW!
$admin_lang_optn_catlinkformat_custom  = "Custom category format";
$admin_lang_optn_catlinkformat_custom_start = "Starting string:";
$admin_lang_optn_catlinkformat_custom_end = "Ending string:";

$admin_lang_optn_calendar_type       = "CALENDAR TYPE";

$admin_lang_optn_thumb_row           = "THUMBNAILROW";
$admin_lang_optn_thumb_row_txt       = "How many thumbnails to display in the automatically generated row.<br/>Make this an odd number for best results, ie 7 or 9, not 6 or 8.";
$admin_lang_optn_crop_thumbs         = "CROP THUMBNAILS?";
$admin_lang_optn_crop_thumbs_txt     = "If you want, that thumbnails should be cropped to exact sizes: choose <b>YES.</b><br/>\n
                                        If you you want to maintain the original ratio, choose <b>NO.</b><br/>\n
                                         If you want to crop the thumbnails manually after uploading the images, choose <b>12CropImage.</b>";
$admin_lang_optn_thumb_size          = "THUMBNAILS SIZE";
$admin_lang_optn_thumb_size_txt      = "Set thumbnails size, Width x Height.";
// NEW!
$admin_lang_optn_thumb_size_new      = "set new sizes";
$admin_lang_optn_reg_thumbs_button   = "Re-generate thumbs";
$admin_lang_optn_regen_thumbs_txt    = "This generates new thumbnails from all posted images. Losing all manually cropped thumbnails to the default thumbnail generation. However, you can change thumbnail with 12CropImage when editing each image.";
$admin_lang_optn_img_compression     = "THUMBNAIL COMPRESSION";
$admin_lang_optn_img_compression_txt = "How hard do you want the jpg-compression to be? 10 is low quality and 100 is max quality (no loss)";
$admin_lang_optn_pass_chngd_txt      = "Password is changed.";
$admin_lang_optn_pass_notchngd_txt   = "Password is not changed. Type the same password in the reconfirm field.";
$admin_lang_optn_title_url_text      = "Check or modify the Site title and the URL of your installation";
// NEW!
$admin_lang_optn_thumb_updated       = "Thumbnails updated!";
$admin_lang_optn_updated             = "thumbnails updated.";
$admin_lang_optn_img_display						="IMAGE DISPLAY ORDER";
$admin_lang_optn_img_display_desc				="Select the order in which images should be displayed. Start with: ";
$admin_lang_optn_img_display_default		="newest image (default)";
$admin_lang_optn_img_display_reversed		="oldest image (reversed)";

// Info
$admin_lang_info_gd                  = "Not installed, ask your hoster to install it for you!";
$admin_lang_info_gd_jpg              = "with JPEG support";
$admin_lang_pp_version1              = "Latest pixelpost version:";
$admin_lang_pp_forum                 = "Looking for help or want to give feedback, please step into pixelpost forum.";
$admin_lang_pp_min_php               = "Pixelpost's min requirement: PHP version";
$admin_lang_pp_min_mysql             = "Pixelpost's min requirement: MySQL";
$admin_lang_pp_exif1                 = "<b>EXIF</b> Pixelpost is using";
$admin_lang_pp_exif2                 = "for EXIF-information";
$admin_lang_pp_path                  = "Paths";
$admin_lang_pp_imagepath             = "Guessed imagepath:";
$admin_lang_pp_imagepath_conf        = "Configured Imagepath:";
$admin_lang_pp_img_chmod1            = "Images folder not writable!";
$admin_lang_pp_img_chmod2            = "You must set correct permissions on this folder or you will not be able to upload any images.";
$admin_lang_pp_img_chmod3            = "<br /> Set the folder to <b>chmod 777</b> (read, write and execute permissions for owner, group and world).";
$admin_lang_pp_img_chmod4            = "Can we write to the directory? YES.";
$admin_lang_pp_img_chmod5            = "Thumbnails folder not writable!";
$admin_lang_pp_imgfolder             = "Image Directory:";
$admin_lang_pp_thumbfolder           = "Thumbnails Directory:";
$admin_lang_pp_langfolder            = "Language Directory:";
$admin_lang_pp_addfolder             = "Addons Directory:";
$admin_lang_pp_incfolder             = "Includes Directory:";
$admin_lang_pp_tempfolder            = "Templates Directory:";
$admin_lang_pp_folder_missing        = "Does Not Exist (should be";
$admin_lang_pp_ref_log_title         = "Referers of Last Seven Days";
$admin_lang_hostinfo				 = "Host Information";
$admin_lang_fileuploads				 = "<b>File Uploads</b> to pixelpost site are";
$admin_lang_serversoft				 = "Server Software";
$admin_lang_pixelpostinfo			 = "Pixelpost Information";
$admin_lang_pp_currversion			 = "You are running Pixelpost version";
$admin_lang_pp_check                 = "Check";
$admin_lang_pp_sess_path             = "Session save path";
$admin_lang_pp_sess_path_emp         = "is empty";
$admin_lang_pp_fileupload_np         = 'NOT possible! Check file_upload variable in php.ini file!';
$admin_lang_pp_fileupload_p          = 'possible.';
$admin_lang_pp_langs                 = 'Pixelpost language translations';
$admin_lang_pp_lng_fname             = 'Filename';
$admin_lang_pp_lng_author            = 'Author';
$admin_lang_pp_lng_ver               = 'Version';
$admin_lang_pp_lng_email             = 'Email';
$admin_lang_pp_newest_ver            = 'You have the newest version of Pixelpost!';
$admin_lang_pp_thumbnailpath 				 = "Guessed thumbnailpath";
$admin_lang_pp_thumbnailpath_conf 	 = "Configured Thumbnailpath"; 

// AddOns
$admin_lang_addon_title              = "INSTALLED ADDONS";
$admin_lang_failed_addonstatus		 = "Failed in updating the status of addon: ";
$admin_lang_addon_off				 = "Click to turn it OFF!";
$admin_lang_addon_on				 = "Click to turn it ON!";

// Error Messages
$admin_lang_pp_up_error_0            = "Upload went without error.";
$admin_lang_pp_up_error_1            = "Exceeded maximum filesize for webserver to handle.";
$admin_lang_pp_up_error_2            = "Exceeded maximum filesize.";
$admin_lang_pp_up_error_3            = "File was not fully uploaded.";
$admin_lang_pp_up_error_4            = "No file was uploaded.";
$admin_lang_pp_up_error_6            = "Missing a temporary folder.";
$admin_lang_pp_up_error_7            = "Failed to write file to disk.";
$admin_lang_pp_addon_error								= "Pixelpost is not able to read the addon file. Please check the chmod settings and change them to 755";
// newly added ones
$admin_lang_cmnt_moderation_que    = "Moderation queue";


// options >> time stamps
$admin_lang_optn_timestamps_title  = "Time Stamps";
$admin_lang_optn_timestamps_desc   = "Adding time stamps to file names avoids overwriting images with same name. <br/>
                                     Use time stamps? ";

// options >> fight spam
$admin_lang_spam            = "SPAM CONTROL";
$admin_lang_spam_err_1      = "Error in creating banlist table: ";
$admin_lang_spam_tableadd   = "Banlist table is added to fight spam from core";
$admin_lang_spam_err_2      = "Error in updating the moderation list: ";
$admin_lang_spam_err_3      = "Error in updating the blacklist: ";
$admin_lang_spam_err_4      = "Error in updating the referer ban list: ";
$admin_lang_spam_err_5      = "Error in updating the acceptable number of links in comments : ";
$admin_lang_spam_upd        = "Successfully updated all ban-lists";
$admin_lang_spam_err_6      = "Error in updating the comments when comparing with moderation list: ";
$admin_lang_spam_com_upd    = "Past: comments are compared with the moderation list ";
$admin_lang_spam_err_7      = "Error in deleting the comments when comparing with blacklist: ";
$admin_lang_spam_com_del    = "Past: comments which contain words/IPs from the blacklist are deleted.";
$admin_lang_spam_err_8      = "Error in deleting the visitors when comparing with bad-referers-list: ";
$admin_lang_spam_visit_del  = "Visitors with words/IPs from the bad-referer-list are deleted.";
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

$admin_lang_ni_post_exif_date = "Use exif date";

$admin_lang_optn_upd_done     = "Update done.";
$admin_lang_optn_upd_error            = "Update Error.";
$admin_lang_optn_upd_lang_error			  = "The selected alternative language is the same as the default language.<br />This makes no sense so either choose a different alternative language or disable the alternative language.";
$admin_lang_optn_markdown             = "Enable Markdown";
$admin_lang_optn_markdown_desc        = "Should Pixelpost enable Markdown feature in Image description?";
$admin_lang_optn_exif			            = "Enable Exif";
$admin_lang_optn_exif_desc		        = "Should Pixelpost enable Exif feature on the frontpage?";
$admin_lang_optn_token			          = "Enable token in forms";
$admin_lang_optn_token_desc		        = "Using a token will reduce the probability of <a href=\"http://en.wikipedia.org/wiki/Cross-site_request_forgery\">Cross-Site Request Forgeries</a>.<br/><br/>\n
																				 If this setting is on comments will only be saved when the token of the form corresponds to the one in the user session. To implement this you need to add <strong>&lt;TOKEN&gt;</strong> to the comments template file somewhere between the <strong><i>&lt;form&gt;...&lt;/form&gt;</i></strong> tags.
																				 If you forget the <strong>&lt;TOKEN&gt;</strong> tag commenting will not work anymore and the user is presented with an error message.<br /><br/>\n
																				 Should this setting be enabled?";
$admin_lang_optn_token_time						= "Maximum time in minutes between opening the comment window and submit a comment: ";
$admin_lang_optn_token_error					= "Attention: values smaller then 1 minute for the Token time are not possible. The Token time has been reset to 1 minute.";
$admin_lang_optn_dsbl_list 						= "Distributed Sender Blackhole List setting (http://www.dsbl.org)";
$admin_lang_optn_dsbl_list_desc 			= "The <a href=\"http://www.dsbl.org\" target=\"_blank\">Distributed Sender Blackhole List</a> contains the IP addresses of servers who are an open relay, an open proxy or have other vulnerabilities. These servers are often misused by SPAMMERS to send e-mails but are also know for posting comments.<br /> <br />
																				 Should the comment IP address be checked against the Distributed Sender Blackhole List?";
$admin_lang_optn_time_between_comments = "Prevent SPAM flood";
$admin_lang_optn_time_between_comments_desc = "Number of seconds before a new comment can be posted (to prevent floods): ";
$admin_lang_optn_max_uri_comment			= "MAXIMUM NUMBER OF URI";
$admin_lang_optn_max_uri_comment_desc = "Number of URI allowed in one comment: ";
$admin_lang_optn_rss_setting					= "RSS/ATOM feed settings";
$admin_lang_optn_rss_title  					= "Feed title";
$admin_lang_optn_rss_desc   					= "Feed description";
$admin_lang_optn_rss_copyright					= "Feed copyright";
$admin_lang_optn_rss_discovery					= "Feed discovery";
$admin_lang_optn_rss_opt_both					= "RSS &amp; ATOM";
$admin_lang_optn_rss_opt_rss					= "RSS";
$admin_lang_optn_rss_opt_atom					= "ATOM";
$admin_lang_optn_rss_opt_ext					= "External";
$admin_lang_optn_rss_opt_none					= "None";
$admin_lang_optn_rss_ext_type					= "External feed type";
$admin_lang_optn_rss_ext						= "External feed";
$admin_lang_optn_rss_enable_comment_feed		= "Enable comment feeds";
$admin_lang_optn_rsstype_desc					= "Select the style of the RSS/ATOM feed:";
$admin_lang_optn_rss_full							= "Show full size pictures";
$admin_lang_optn_rss_thumbs						= "Show thumbnails";
$admin_lang_optn_rss_thumbs_only					= "Show thumbnails only";
$admin_lang_optn_rss_full_only						= "Show full size pictures only";
$admin_lang_optn_rss_text							= "Show text only";
$admin_lang_optn_feeditems_desc				= "Number of items in the feedlist: ";
$admin_lang_optn_lang                  = "Base language settings: ";
$admin_lang_optn_alt_lang             = "Alternative language settings: ";
$admin_lang_optn_alt_lang_dis         = "disabled";
$admin_lang_optn_alt_lang_no          = "disabled";



$admin_lang_imgedit_preview   = "Preview";

$admin_lang_cmnt_rep_spam = 'Report Spam';

$admin_lang_optn_visitorbooking_title = 'Book visitors';
$admin_lang_optn_visitorbooking_desc  = 'Should Pixelpost book information of every visitor?';

$admin_lang_dutch							="Dutch";
$admin_lang_english						="English";
$admin_lang_french						="French";
$admin_lang_german						="German";
$admin_lang_italian						="Italian";
$admin_lang_norwegian					="Norwegian";
$admin_lang_persian						="Persian";
$admin_lang_polish						="Polish";
$admin_lang_portuguese				="Portuguese";
$admin_lang_simplified_chinese="Chinese";
$admin_lang_spanish						="Spanish";
$admin_lang_swedish						="Swedish";
$admin_lang_japanese					="Japanese";
$admin_lang_danish						="Danish";
?>