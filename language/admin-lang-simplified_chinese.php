<?php
/*

admin-lang-english.php : english (default) language file for PixelPost-Admin-Section
===================================================================================
Pixelpost version 1.6

SVN file version:
$Id$

Pixelpost www: http://www.pixelpost.org/
Pixelpost forum: http://forum.pixelpost.org

Version 1.5:
Development Team:
Ramin Mehran, Connie Mueller-Goedecke, Will Duncan, Joseph Spurling, Piotr "GeoS" Galas
Version 1.1 to Version 1.3: Linus <http://www.shapestyle.se>

Copyright ?2006 Pixelpost.org <http://www.pixelpost.org>

Attention:
============
This is the english language file for the admin section of PixelPost
It is absolutely necessary that this file is uploaded to the
Language-folder, as this is the default version as well if no
admin-language-file for another language exists.
______________________________________________________________________________

ADMIN PANEL LANGUAGE VARIABLES:

Dont edit                    ||      Edit                                   */

$_lang_file_translator        = 'The PixelPost Crew';
$_lang_file_email             = 'thecrew@pixelpost.org';
$_lang_file_rev               = '1.0.0';

$admin_lang_isrtl             = "是"; // yes for right-to-left languages and no for left-to-right languages
$admin_lang_update            = "更新";
$admin_lang_reload            = "<br /> 您可能要刷新页面来看看已做出的改变。";
$admin_lang_error             = "错误";
$admin_lang_post              = "条/页";
$admin_lang_page              = "页数";
$admin_lang_of                = "/";
$admin_lang_next              = "下一页";
$admin_lang_prev              = "上一页";
$admin_lang_show              = "显示";
$admin_lang_go                = "执行";
$admin_lang_done              = "完成：";


// Admin Start
$admin_start_1                = "没有<b>语言</b>目录或文件";
$admin_start_2                = "在目录里面找不到。\n<br />请确认您已经上传所有这里列出的同名的所需文件。";
$admin_start_userpw           = "用户名或密码不正确。";
$admin_start_pw_forgot        = "忘记密码？";
$admin_start_browser_title    = "管理员";
$admin_start_welcome          = "欢迎来到Pixelpost管理页面 - 您需要登陆。";
$admin_start_pp_name          = "连接到您的PixelPost网站：";
$admin_start_pp_tit           = "点击这里进入您的网站";
$admin_start_cookie           = "登陆设立cookie";
$admin_start_username         = "用户名";
$admin_start_pw               = "密码";
$admin_start_pw_button        = "发给我新的密码";
$admin_start_pw_recover       = "<span style='color:red;'><b>没有办法恢复您的旧密码</b></span> 但Pixelpost可以为您产生一个随机新密码。\n<br />
				 请输入您在管理面板曾经提交的电子邮箱。
                                 <br />通过电子邮件您马上将会收到一个新的密码。";
$admin_start_email            = "电子邮件地址:";
$admin_start_email_button     = "输入您的电子邮件地址:";
$admin_start_admin_1          = "管理";
$admin_start_admin_2          = "";
$admin_start_remember         =	"每次自动登陆：";

// Password Recovery

// Front Page
$admin_lang_pw_title            = "Pixelpost密码恢复";

$admin_lang_pw_wronguser	= "您输入的用户名与Pixelpost管理员名称不一致。";
$admin_lang_pw_back             =  "返回管理页面";
$admin_lang_pw_noemail          = "您没有输入电子邮件！\n<br />
				   如果您真的记不起密码的话，发个信息到<a href='http://www.pixelpost.org/forum'>Pixelpost论坛</a>
				   寻求帮助吧。\n<br />";
$admin_lang_pw_notsent          = "没有任何东西！ \n<br /> 您输入的电子邮件与管理面板设置的不一致。<br />";
$admin_lang_pw_subject		= "Pixelpost密码恢复信息";
$admin_lang_pw_usertext		= "您的用户名：";
$admin_lang_pw_mailtext		= "您的电子邮件：";
$admin_lang_pw_newpw		= "您的新密码：";
$admin_lang_pw_text_1		= "这是Pixelpost的密码恢复";
$admin_lang_pw_text_2		= "来自：PIXELPOST管理部";
$admin_lang_pw_text_3		= "用户名和新的密码已经发送到您的电子邮箱。请检查您的电子邮箱 \n<br />";
$admin_lang_pw_text_4 		= "<span style='color:red;'>错误！有意外的问题发生！ \n<br />
				   您的用户名和电子邮件输入正确，但邮件不能发送出去！ \n<br />
                                   咨询您的网络管理员请求协助</span>";
$admin_lang_pw_text_5 		= "数据库错误：";
$admin_lang_pw_text_6		= "<br />更新密码失败。";
$admin_lang_pw_text_7           = "这封电子邮件自动发送自您网站的登陆系统。\n 某人在管理区请求一个新的密码。\n\n您应该登陆您的网站\n\n";
$admin_lang_pw_text_8           = "\n\n 然后以新的密码登陆马上重新设置这个自动产生的密码！";

// Admin Menu
$admin_lang_new_image          = "新图片";
$admin_lang_images             = "图片";
$admin_lang_categories         = "类别";
$admin_lang_comments           = "评论";
$admin_lang_options            = "选项";
$admin_lang_general_info       = "综合信息";
$admin_lang_addons             = "插件";
$admin_lang_logout             = "退出";

// New Image
$admin_lang_ni_post_a_new_image   = "发表一张新图片";
$admin_lang_ni_image              = "图片";
$admin_lang_ni_image_title        = "图片标题";
$admin_lang_ni_select_cat         = "选择类别/关键词";
$admin_lang_ni_description        = "图片描述";
$admin_lang_ni_datetime           = "发表图片的日期时间";
$admin_lang_ni_post_now           = "使用现在的时间";
$admin_lang_ni_post_one_day_after = "使用最后一张上传图片一天后的时间";
$admin_lang_ni_post_spec_date     = "自定义时间。请在下面设置：";
$admin_lang_ni_post_entry         = "发表图片";
$admin_lang_ni_upload             = "上传";
$admin_lang_ni_upload_error       = "文件上传出现了问题！";
$admin_lang_ni_posted             = "发表成功";
$admin_lang_ni_year               = "年";
$admin_lang_ni_month              = "月";
$admin_lang_ni_day                = "日";
$admin_lang_ni_hour               = "时";
$admin_lang_ni_min                = "分";
$admin_lang_ni_markdown_text      = "使用Markdown或HTML格式化本栏的文字。";
$admin_lang_ni_markdown_hp        = "Markdown主页";
$admin_lang_ni_markdown_element   = "基本的";
$admin_lang_ni_markdown_syntax    = "语法参考";
$admin_lang_ni_missing_data       = "缺少数据<br />\n
                                     您的图片至少需要一个标题。\n
                                     请注意，因为缺少的信息，所以图片并没有上传！";
$admin_lang_ni_crop_nextstep      = "现在您应该选择缩略图窗口：";
$admin_lang_ni_crop_background    = "这是准备裁剪图的背景";
$admin_lang_ni_post_exif_date     = "使用exif日期";
$admin_lang_ni_db_error           =  "写入数据库时有误";
$admin_lang_ni_tags               = "Tags";
$admin_lang_ni_tags_desc          = "(comma, semicolon and space are used to seperate tags; join words using underline and dash)";
$admin_lang_ni_alt_language				= "Provide an image title and description in the alternative language";

// Images
$admin_lang_imgedit_edit           = "编辑";
$admin_lang_imgedit_title          = "标题：";
$admin_lang_imgedit_file_name      = "文件名：";
$admin_lang_imgedit_dimensions     = "尺寸：";
$admin_lang_imgedit_tbpublished    = "发表时间：";
$admin_lang_imgedit_category_plural = "类别：";
$admin_lang_imgedit_delete          = "删除";
$admin_lang_imgedit_deleted         = "删除发表/删除图片/删除缩略图";
$admin_lang_imgedit_deleted1        = "发表已经删除。";
$admin_lang_imgedit_deleted2        = "图片已经删除。";
$admin_lang_imgedit_delete_error    = "不能删除图片。\n
                                       您需要用其他方法，可能需要用您的ftp软件。";
$admin_lang_imgedit_deleted3        = "缩略图已经删除。";
$admin_lang_imgedit_delete_error2   = "不能删除缩略图。\n
                                       您需要用其他方法，可能需要用您的ftp软件。";
$admin_lang_imgedit_reupimg         = "重新上传图片：";
$admin_lang_imgedit_file            = "文件：";
$admin_lang_imgedit_file_isuploaded = "重新上传成功！";
$admin_lang_imgedit_update          = "图片更新";
$admin_lang_imgedit_updated         = "图片更新成功";
$admin_lang_imgedit_txt_desc        = "描述：";
$admin_lang_imgedit_dtime           = "日期时间：";
$admin_lang_imgedit_img             = "图片：";
$admin_lang_imgedit_fsize           = "文件大小：";
$admin_lang_imgedit_12cropimg       = "裁剪图片工具：";
$admin_lang_imgedit_12cropimg_txt   = "编辑这图片的缩略图，用鼠标拖曳裁剪窗口或使用放大/缩小'+'/'-'按钮";
$admin_lang_imgedit_uthmb_button    = "更新缩略图";
$admin_lang_imgedit_u_post_button   = "更新发表";
$admin_lang_imgedit_title1          = "图片 - 重新上传，编辑或删除图片 || 有 ";
$admin_lang_imgedit_title2          = " 张图片在数据库\n<br /> 显示";
$admin_lang_imgedit_title3          = "张/页，页";
$admin_lang_imgedit_title4          = "/";
$admin_lang_imgedit_12crop_opt      = "<strong>注意：</strong> 12CropImage选项不是裁剪缩略图的。因此，缩略图不会改变。";
$admin_lang_imgedit_edit_post       = "编辑发表";
$admin_lang_imgedit_img_page        = "张图片/页";
$admin_lang_imgedit_cropbg          = "这是12cropimage背景文本";
$admin_lang_imgedit_js_del_im       = "确定删除这张图片吗？";
$admin_lang_imgedit_preview         = "预览";
$admin_lang_imgedit_db_error        = "<br />检查目前是否没用永久连接！";
$admin_lang_imgedit_tags_edit       = "Tags (comma, semicolon and space are used to seperate tags; join words using underline):";
$admin_lang_imgedit_alt_language    = "Change the alternative language image title and description";
$admin_lang_imgedit_masstag         = "Add/remove tags from selected images";
$admin_lang_imgedit_masstag_set     = "Add tag(s)";
$admin_lang_imgedit_masstag_set2    = "Add tag(s) for alternative language";
$admin_lang_imgedit_masstag_unset   = "Remove tag(s)";
$admin_lang_imgedit_published          = "Published";
$admin_lang_imgedit_unpublished_cmnts  = "previously masked image(s).";

// Mass-Edit Categories
$admin_lang_imgedit_mass_1          = "批量编辑类别";
$admin_lang_imgedit_mass_2          = "分配";
$admin_lang_imgedit_mass_3          = "撤消分配";
$admin_lang_imgedit_mass_4          = "批量更新";


// Categories
$admin_lang_cats_add_cat            = "增加类别";
$admin_lang_cats_added              = "类别增加成功";
$admin_lang_cats_add_cat_txt        = "增加一个可以分配给图片的类别。";
$admin_lang_cats_edit_cat           = "编辑类别";
$admin_lang_cats_edit_cat_txt       = "编辑类别";
$admin_lang_cats_edit_cat_button    = "编辑类别";
$admin_lang_cats_edit_tip           = "编辑以下类别名称。<br />所有属于旧名称的图片将会属于您输入的新名称。";
$admin_lang_cats_delete_cat         = "删除类别";
$admin_lang_cats_delete_cat_txt     = "删除类别";
$admin_lang_cats_delete_cat2        = "删除：";
$admin_lang_cats_delete_cats_button = "删除类别";
$admin_lang_cats_deleted            = "类别删除成功。";
$admin_lang_cats_update             = "更新类别";
$admin_lang_cats_update_cat_button = "更新类别";
$admin_lang_cats_updated            = "更新类别名称";


// Comments
$admin_lang_cmnt_commentlist        = "评论列表 - 随意删除或编辑&nbsp;||&nbsp;显示";
$admin_lang_cmnt_name               = "名称：";
$admin_lang_cmnt_email              = "电子邮件：";
$admin_lang_cmnt_comment            = "评论：";
$admin_lang_cmnt_image              = "图片";
$admin_lang_cmnt_delete             = "删除";
$admin_lang_cmnt_deleted            = "删除评论。";
$admin_lang_cmnt_delete1            = "删除成功";
$admin_lang_cmnt_delete2            = "已选 择评论。";
$admin_lang_cmnt_edit               = "编辑";
$admin_lang_cmnt_edited             = "编辑评论。";
$admin_lang_cmnt_check_all          = "全部选择";
$admin_lang_cmnt_clear_all          = "清除选择";
$admin_lang_cmnt_invert_checks      = "反向选择";
$admin_lang_cmnt_del_selected       = "删除已选";
$admin_lang_cmnt_page               = "个评论/页。";
$admin_lang_cmnt_commenter          = "评论时间：";
$admin_lang_cmnt_ip                 = "来自ip：";
$admin_lang_cmnt_save               = "保存";
$admin_lang_cmnt_massdelete_text    = "检查所有准备一次性删除的评论";
$admin_lang_cmnt_js_del_comm        = "确定删除评论吗？";
$admin_lang_cmnt_publish_sel        = "发布已选";
$admin_lang_cmnt_unpublish_sel      = "加入到待阅批队列";
$admin_lang_cmnt_published          = "发布成功";
$admin_lang_cmnt_unpublished_cmnts  = "条之前已屏蔽的评论。";
$admin_lang_cmnt_unpublished        = "屏蔽";
$admin_lang_cmnt_published_cmnts    = "条之前已发布的评论。";
$admin_lang_cmnt_error_blacklist    = "更新黑名单有误：";
$admin_lang_cmnt_error_banlist      = "更新referer禁止列表有误：";
$admin_lang_cmnt_moderation_que     = "待审批队列";
$admin_lang_cmnt_rep_spam 			= '报告垃圾广告';


// Option
$admin_lang_optn_general            = "综合";
$admin_lang_optn_template           = "模板";
$admin_lang_optn_thumbnails         = "缩略图";
$admin_lang_optn_tip                = "请不要忘记输入尾部的斜线<b>'/'</b> 例如：<i>http://www.pixelpost.org/</i>";

$admin_lang_optn_update             = "更新";
$admin_lang_optn_yes                = "是";
$admin_lang_optn_no                 = "否";

$admin_lang_optn_title_url         = "网站标题和网址";
$admin_lang_optn_title             = "标题：";
$admin_lang_optn_url               = "网址：";
$admin_lang_optn_usr_pss           = "管理员用户名和密码";
$admin_lang_optn_usr_pss_txt       = "更改用户名或密码？";
$admin_lang_optn_usr               = "用户名：";
$admin_lang_optn_pss               = "密码：";
$admin_lang_optn_pss_re            = "再次确认密码：";
$admin_lang_optn_email             = "管理员电子邮件";
$admin_lang_optn_fillit            = "请填写。这对您密码恢复有用处。";
$admin_lang_optn_img_path          = "图片路径";
$admin_lang_optn_tz                = "时区";
$admin_lang_optn_tz_txt            = "选择您所在的时区。";
$admin_lang_optn_sendemail         = "为每个评论发送电子邮件";
$admin_lang_optn_sendemail_txt     = "为每个评论发送电子邮件通知？";
$admin_lang_optn_sendemail_html_txt = "使用HTML格式的电子邮件通知函？";
$admin_lang_optn_comment_setting 		= "GLOBAL COMMENT SETTINGS";
$admin_lang_optn_comment_setting2		= "Comment setting";
$admin_lang_optn_cmnt_mod_txt       = "Default action for comments:";
$admin_lang_optn_cmnt_mod_txt2      = "Action for comments:";
$admin_lang_optn_cmnt_mod_allowed		=	"Publish instantly";
$admin_lang_optn_cmnt_mod_moderation=	"To moderation queue";
$admin_lang_optn_cmnt_mod_forbidden	=	"Disable commenting";

$admin_lang_optn_switch_template    = "切换模板";
$admin_lang_optn_lang_file           = "语言文件";
$admin_lang_optn_dateformat          = "日期格式";
$admin_lang_optn_dateformat_txt      = "图片和评论的日期显示格式。这个使用的语法与PHP的<a href='http://www.php.net/date' target='_blank'>date()</a>函数一样。这是一些可替换的参数：Y:年 m:月 d:日 H:时 i:分 s:秒";
$admin_lang_optn_gmt                 = "注意这个不会自动支持夏令时，您可以自己更改。<br />如果您不确定您所在的GMT时区，请查找<a href='http://www.worldtimeserver.com/current_time_in_UTC.aspx' target='__blank'>GMT现在的时间。</a><br />";
$admin_lang_optn_cat_link_format     = "类别连接格式";
$admin_lang_optn_catlinkformat_select = "选择类别连接格式";
$admin_lang_optn_cat_link_format_txt = "模板里面显示类别连接的格式。";
$admin_lang_optn_catlinkformat_custom  = "自定义格式";
$admin_lang_optn_catlinkformat_custom_start = "开始字符：";
$admin_lang_optn_catlinkformat_custom_end = "结束字符：";
$admin_lang_optn_calendar_type       = "日历类型";
$admin_lang_optn_thumb_row           = "缩略图";
$admin_lang_optn_thumb_row_txt       = "每一行自动显示多少个缩略图。<br/>最好显示效果是设置为奇数，如7或9，而不是6或8。";
$admin_lang_optn_crop_thumbs         = "裁剪缩略图？";
$admin_lang_optn_crop_thumbs_txt     = "如果您愿意，缩略图可以裁剪到指定的尺寸：请选择<b>是。</b><br/>\n
                                        如果您想保持图片原来的比例，请选择<b>不是。</b><br/>\n
                                        如果您想上传后手动裁剪图片，请选择<b>12CropImage.</b>";
$admin_lang_optn_thumb_size          = "缩略图尺寸";
$admin_lang_optn_thumb_size_txt      = "设置缩略图尺寸，宽 x 高。";
$admin_lang_optn_thumb_size_new      = "设置新尺寸";
$admin_lang_optn_reg_thumbs_button   = "重新产生缩略图";
$admin_lang_optn_regen_thumbs_txt    = "这会为所有已发布的图片产生新的缩略图。所有手动裁剪的图片将会以设置的缩略图代替。然而，编辑图片的时候您可以使用12CropImage更改缩略图。";
$admin_lang_optn_img_compression     = "缩略图压缩比率";
$admin_lang_optn_img_compression_txt = "您想jpg压缩到哪个程度呢？10是最低质量，100是最好质量(无损)";
$admin_lang_optn_pass_chngd_txt      = "密码更改成功";
$admin_lang_optn_pass_notchngd_txt   = "密码没有更改。请在确认栏输入一样的的密码。";
$admin_lang_optn_title_url_text      = "检查或修改您安装的网站标题和网址";
$admin_lang_optn_thumb_updated       = "缩略图更新成功！";
$admin_lang_optn_updated             = "缩略图更新成功！";
$admin_lang_optn_visitorbooking_title = '登记来访者';
$admin_lang_optn_visitorbooking_desc  = '要Pixelpost登记每个来访者的信息吗？';
$admin_lang_optn_upd_done     = "更新成功！";
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
$admin_lang_optn_token_time						= "Maximum time between opening the comment window and submit a comment: ";
$admin_lang_optn_dsbl_list 						= "Distributed Sender Blackhole List setting (http://www.dsbl.org)";
$admin_lang_optn_dsbl_list_desc 			= "The <a href=\"http://www.dsbl.org\" target=\"_blank\">Distributed Sender Blackhole List</a> contains the IP addresses of servers who are an open relay, an open proxy or have other vulnerabilities. These servers are often misused by SPAMMERS to send e-mails but are also know for posting comments.<br /> <br />
																				 Should the comment IP address be checked against the Distributed Sender Blackhole List?";
$admin_lang_optn_time_between_comments = "Prevent SPAM flood";
$admin_lang_optn_time_between_comments_desc = "Number of seconds before a new comment can be posted (to prevent floods): ";
$admin_lang_optn_max_uri_comment			= "MAXIMUM NUMBER OF URI";
$admin_lang_optn_max_uri_comment_desc = "Number of URI allowed in one comment: ";
$admin_lang_optn_rss_setting					= "RSS/ATOM feed settings";
$admin_lang_optn_rsstype_desc					= "Select the style of the RSS/ATOM feed:";
$admin_lang_optn_rss_full							= "Show full size pictures";
$admin_lang_optn_rss_thumbs						= "Show thumbnails";
$admin_lang_optn_rss_thumbs_only					= "Show thumbnails only";
$admin_lang_optn_rss_text							= "Show text only";
$admin_lang_optn_feeditems_desc				= "Number of items in the feedlist: ";
$admin_lang_optn_alt_lang             = "Alternative language settings: ";
$admin_lang_optn_alt_lang_dis         = "disabled";
$admin_lang_optn_alt_lang_no          = "disabled";





// Info
$admin_lang_info_gd                  = "没有安装，请咨询您的主机管理员为您安装！";
$admin_lang_info_gd_jpg              = "支持JPEG";
$admin_lang_pp_version1              = "最新pixelpost版本";
$admin_lang_pp_forum                 = "需要协助或反馈信息，请进入pixelpost论坛";
$admin_lang_pp_min_php               = "Pixelpost的最低配置：PHP版本";
$admin_lang_pp_min_mysql             = "Pixelpost的最低配置：MySQL";
$admin_lang_pp_exif1                 = "<b>EXIF</b> Pixelpost正在使用";
$admin_lang_pp_exif2                 = "来显示EXIF-信息";
$admin_lang_pp_path                  = "路径";
$admin_lang_pp_imagepath             = "推测的图片路径：";
$admin_lang_pp_imagepath_conf        = "设定的图片路径：";
$admin_lang_pp_img_chmod1            = "图片文件夹不能写入！";
$admin_lang_pp_img_chmod2            = "您必须在这文件夹设定正确的许可，否则您不能上传任何图片。";
$admin_lang_pp_img_chmod3            = "<br /> 设置文件夹为<b>chmod 777</b>(所有者可以读，写，可执行)。";
$admin_lang_pp_img_chmod4            = "我们可以写入到目录吗？是。";
$admin_lang_pp_img_chmod5            = "缩略图文件夹不能写入！";
$admin_lang_pp_imgfolder             = "图片目录：";
$admin_lang_pp_thumbfolder           = "缩略图目录：";
$admin_lang_pp_langfolder            = "语言目录：";
$admin_lang_pp_addfolder             = "插件目录：";
$admin_lang_pp_incfolder             = "包括目录：";
$admin_lang_pp_tempfolder            = "模板目录：";
$admin_lang_pp_folder_missing        = "不要退出(应该";
$admin_lang_pp_ref_log_title         = "最后七天的Referers";
$admin_lang_hostinfo				 = "主机信息";
$admin_lang_fileuploads				 = "<b>上传文件</b>到pixelpost";
$admin_lang_serversoft				 = "服务器软件";
$admin_lang_pixelpostinfo			 = "Pixelpost信息";
$admin_lang_pp_currversion			 = "您正在使用的Pixelpost版本";
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

// AddOns
$admin_lang_addon_title              = "安装插件";
$admin_lang_failed_addonstatus		 = "更新插件状况失败：";
$admin_lang_addon_off				 = "点击关闭";
$admin_lang_addon_on				 = "点击开启";

// Error Messages
$admin_lang_pp_up_error_0            = "上传无错误通过。";
$admin_lang_pp_up_error_1            = "超过服务器能够处理的最大文件大小。";
$admin_lang_pp_up_error_2            = "超过最大的文件大小。";
$admin_lang_pp_up_error_3            = "文件没有完全上传。";
$admin_lang_pp_up_error_4            = "没有上传到文件。";
$admin_lang_pp_up_error_6            = "Missing a temporary folder.";
$admin_lang_pp_up_error_7            = "Failed to write file to disk.";


// options >> time stamps
$admin_lang_optn_timestamps_title  = "时间标签";
$admin_lang_optn_timestamps_desc   = "为文件加入时间标签以避免复盖同名的文件。<br/>
                                     使用时间标签？";

// options >> fight spam
$admin_lang_spam            = "垃圾广告控制";
$admin_lang_spam_err_1      = "创建禁止清单表格有误：";
$admin_lang_spam_tableadd   = "禁止清单表格已加入到核心打击垃圾广告";
$admin_lang_spam_err_2      = "更新待审阅清单有误：";
$admin_lang_spam_err_3      = "更新黑名单有误：";
$admin_lang_spam_err_4      = "更新refere禁止清单有误";
$admin_lang_spam_err_5      = "更新评论可接受连接数有误：";
$admin_lang_spam_upd        = "所有禁止清单更新成功";
$admin_lang_spam_err_6      = "当比较待审阅清单时更新评论时有误：";
$admin_lang_spam_com_upd    = "结束：评论已与待审阅清单比较过";
$admin_lang_spam_err_7      = "当与黑名单比较的时候删除评论有误：";
$admin_lang_spam_com_del    = "结束：含有黑名单中的词语/IPs的评论已经删除。";
$admin_lang_spam_err_8      = "当与恶意referers清单比较的时候删除来访者有误：";
$admin_lang_spam_visit_del  = "含有恶意referers清单中的词语/IPs的来访者已被删除。";

// Spam
$admin_lang_spam_ban        = "禁止清单";
$admin_lang_spam_content    = "	增加禁止的词语/IPs/名字的清单到以下的文本框，一个词一行。<br/>\n
				任何评论含有待审阅清单中的词语，IP，或名字将会发送到待审阅队列中。<br/>\n
  				任何评论含有黑名单中的词语，IP，或名字将永远不会允许发表评论。<br/>
  				任何来访者使用<b>Referer禁止清单</b>中的IP或使用含有清单中词语的地址将会\n
				拒绝访问您的网站。(您可以加入产生的代码到.htaccess中使他起作用！)";
$admin_lang_spam_modlist    = "待审阅清单";
$admin_lang_spam_blacklist  = "黑名单";
$admin_lang_spam_reflist    = "Referer禁止清单";
$admin_lang_spam_blacklist_text = "复制以下代码(windows中的CTRL+A和CTRL+C)然后粘贴到您的网站.htaccess文件以阻止恶意的IP和referers。";
$admin_lang_spam_htaccess_text = "获取.htaccess代码";
$admin_lang_spam_check_comm = "检查过去的评论";
$admin_lang_spam_del_bad_comm = "删除恶意的评论";
$admin_lang_spam_del_bad_ref = "删除恶意的Referers";
$admin_lang_spam_updateblacklist = "更新全部禁止清单";
?>