<?php
/*
Pixelpost version 1.7

SVN file version:
$Id: admin-lang-simplified_chinese.php 434 2007-10-19 16:59:01Z schonhose $

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

$_lang_file_translator        = 'jdleungs.com';
$_lang_file_email             = 'jdleungs@gmail.com';
$_lang_file_rev               = '1.7';

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
$admin_lang_example			  = "样本";


// Admin Start
$admin_start_1                = "没有<b>语言</b>目录或文件";
$admin_start_2                = "在目录里面找不到。\n<br />请确认您已经上传所有这里列出的同名的所需文件。";
$admin_start_userpw           = "用户名或密码不正确。";
$admin_start_pw_forgot        = "忘记密码？";
$admin_start_browser_title    = "管理员";
$admin_start_welcome          = "欢迎来到Pixelpost管理页面 - 您需要登陆。";
$admin_start_pp_name          = "连接到您的Pixelpost网站：";
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
$admin_lang_ni_tags               = "标签";
$admin_lang_ni_tags_desc          = "(使用逗号、分号和空格来分隔标签；连接词用下划线和连线符)";
$admin_lang_ni_alt_language				= "为交替的语言提供一个图片标题和说明";

// Images
$admin_lang_imgedit_edit           = "编辑";
$admin_lang_imgedit_title          = "标题：";
$admin_lang_imgedit_alttitle          		= "Alt. 标题：";
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
$admin_lang_imgedit_tags_edit       = "标签(使用逗号、分号和空格来分隔标签；连接词用下划线和连线符)：";
$admin_lang_imgedit_alt_language    = "更改交替语言的图片标题和说明";
$admin_lang_imgedit_masstag         = "增加/删除选定图片的标签";
$admin_lang_imgedit_masstag_set     = "增加标签";
$admin_lang_imgedit_masstag_set2    = "为另一种语言增加标签";
$admin_lang_imgedit_masstag_unset   = "删除标签";
$admin_lang_imgedit_published          = "发布";
$admin_lang_imgedit_unpublished_cmnts  = "之前标记的图片。";

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
$admin_lang_cmnt_check_all          = "批量选择/取消选择";
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
$admin_lang_cmnt_submenu1									= "评论";
$admin_lang_cmnt_submenu2									= "等待审查";


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
$admin_lang_optn_sub_title         = "副标题：";
$admin_lang_optn_url               = "网址：";
$admin_lang_optn_usr_pss           = "管理员用户名和密码";
$admin_lang_optn_usr_pss_txt       = "更改用户名或密码？";
$admin_lang_optn_usr               = "用户名：";
$admin_lang_optn_pss               = "密码：";
$admin_lang_optn_pss_re            = "再次确认密码：";
$admin_lang_optn_email             = "管理员电子邮件";
$admin_lang_optn_fillit            = "请填写。这对您密码恢复有用处。";
$admin_lang_optn_img_path          = "图片和缩略图路径";
$admin_lang_optn_tz                = "时区";
$admin_lang_optn_tz_txt            = "选择您所在的时区。";
$admin_lang_optn_sendemail         = "为每个评论发送电子邮件";
$admin_lang_optn_sendemail_txt     = "为每个评论发送电子邮件通知？";
$admin_lang_optn_sendemail_html_txt = "使用HTML格式的电子邮件通知函？";
$admin_lang_optn_comment_setting 		= "全局评论设置";
$admin_lang_optn_comment_setting2		= "评论设置";
$admin_lang_optn_cmnt_mod_txt       = "评论的缺省操作：";
$admin_lang_optn_cmnt_mod_txt2      = "评论的操作：";
$admin_lang_optn_cmnt_mod_allowed		=	"立即发布";
$admin_lang_optn_cmnt_mod_moderation=	"到审查列队";
$admin_lang_optn_cmnt_mod_forbidden	=	"禁止评论";

$admin_lang_optn_switch_template    = "切换模板";
$admin_lang_optn_lang_file           = "语言文件";
$admin_lang_optn_lang_file_admin          = "控制面板语言文件";
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
$admin_lang_optn_thumb_sharp              = "缩略图锐化";
$admin_lang_optn_thumb_sharp_txt          = "您想缩略图锐化到什么程度？";
$admin_lang_optn_thumb_sharp0             = '不锐化';
$admin_lang_optn_thumb_sharp1             = '轻微';
$admin_lang_optn_thumb_sharp2             = '中等';
$admin_lang_optn_thumb_sharp3             = '高度';
$admin_lang_optn_thumb_sharp4             = '超高度';
$admin_lang_optn_pass_chngd_txt      = "密码更改成功";
$admin_lang_optn_pass_notchngd_txt   = "密码没有更改。请在确认栏输入一样的的密码。";
$admin_lang_optn_title_url_text      = "检查或修改您安装的网站标题和网址";
$admin_lang_optn_thumb_updated       = "缩略图更新成功！";
$admin_lang_optn_updated             = "缩略图更新成功！";
$admin_lang_optn_visitorbooking_title = '登记来访者';
$admin_lang_optn_visitorbooking_desc  = '要Pixelpost登记每个来访者的信息吗？';
$admin_lang_optn_upd_done     = "更新成功！";
$admin_lang_optn_upd_error            = "更新失败。";
$admin_lang_optn_upd_lang_error			  = "被选定的另一种语言与缺省语言一样。<br />这样没有意义，要么选择另一种不同的语言或禁止使用另一种语言。";
$admin_lang_optn_markdown             = "使用Markdown";
$admin_lang_optn_markdown_desc        = "在图片说明使用Markdown功能吗？";
$admin_lang_optn_exif			            = "使用Exif";
$admin_lang_optn_exif_desc		        = "在首页使用Exif功能吗？";
$admin_lang_optn_token			          = "在表单中使用记号";
$admin_lang_optn_token_desc		        = "使用记号会有效降低<a href=\"http://en.wikipedia.org/wiki/Cross-site_request_forgery\">跨网站的虚假请求</a>。<br/><br/>\n
																				 如果这个设置用在评论上，只有表单的记号与用户的session一致才保存。实施的话需要加入<strong>&lt;TOKEN&gt;</strong>到评论的模板文件中的<strong><i>&lt;form&gt;...&lt;/form&gt;</i></strong>标签。
																				 如果您忘记了<strong>&lt;TOKEN&gt;</strong> 标签，评论不会再运作而且用户会收到错误的信息。<br /><br/>\n
																				 允许这设置吗？";
$admin_lang_optn_token_time						= "打开评论到发表评论之间所需最大时间：";
$admin_lang_optn_token_error					= "注意：少于一分钟的值是不允许的。记号时间已被复位到一分钟。";
$admin_lang_optn_dsbl_list 						= "分发的发送者黑名单设置(http://www.dsbl.org)";
$admin_lang_optn_dsbl_list_desc 			= "<a href=\"http://www.dsbl.org\" target=\"_blank\">分发的发送者黑名单</a>包含公开的中继、代理或其他容易遭到攻击的服务器的ip地址。 这些服务器被垃圾广告公开滥用作为发送邮件，也用来发表评论。<br /> <br />
																				 要从名单中检查评论者的ip地址吗？";
$admin_lang_optn_time_between_comments = "防止垃圾广告的攻击";
$admin_lang_optn_time_between_comments_desc = "写一个新评论之前所需要的秒数(防止攻击)： ";
$admin_lang_optn_max_uri_comment			= "最多的URI";
$admin_lang_optn_max_uri_comment_desc = "一条评论允许最多的URI数目：";
$admin_lang_optn_rss_setting					= "RSS/ATOM feed设置";
$admin_lang_optn_rss_title  					= "Feed标题";
$admin_lang_optn_rss_desc   					= "Feed说明";
$admin_lang_optn_rss_copyright					= "Feed版权";
$admin_lang_optn_rss_discovery					= "Feed发现";
$admin_lang_optn_rss_opt_both					= "RSS &amp; ATOM";
$admin_lang_optn_rss_opt_rss					= "RSS";
$admin_lang_optn_rss_opt_atom					= "ATOM";
$admin_lang_optn_rss_opt_ext					= "外部的";
$admin_lang_optn_rss_opt_none					= "没有";
$admin_lang_optn_rss_ext_type					= "外部的feed类型";
$admin_lang_optn_rss_ext						= "外部的feed";
$admin_lang_optn_rss_enable_comment_feed		= "允许评论feeds";
$admin_lang_optn_rsstype_desc					= "选择RSS/ATOM feed的样式：";
$admin_lang_optn_rss_full							= "显示全图";
$admin_lang_optn_rss_thumbs						= "显示缩略图";
$admin_lang_optn_rss_thumbs_only					= "只显示缩略图";
$admin_lang_optn_rss_full_only						= "只显示全图";
$admin_lang_optn_rss_text							= "Show text only";
$admin_lang_optn_feeditems_desc				= "feed清单中的条数";
$admin_lang_optn_lang                  = "其本语言设置：";
$admin_lang_optn_alt_lang             = "另一种语言设置：";
$admin_lang_optn_alt_lang_dis         = "不允许";
$admin_lang_optn_alt_lang_no          = "不允许";
$admin_lang_optn_img_display						="图片显示顺序";
$admin_lang_optn_img_display_desc				="选择图片显示的方式。排列：";
$admin_lang_optn_img_display_default		="倒序";
$admin_lang_optn_img_display_reversed		="顺序";

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
$admin_lang_pp_check                 = "检查";
$admin_lang_pp_sess_path             = "Session存储路径";
$admin_lang_pp_sess_path_emp         = "是空的";
$admin_lang_pp_fileupload_np         = '不允许！在php.ini文件中检查file_upload变量！';
$admin_lang_pp_fileupload_p          = '允许';
$admin_lang_pp_langs                 = 'Pixelpost语言翻译';
$admin_lang_pp_lng_fname             = '文件名';
$admin_lang_pp_lng_author            = '作者';
$admin_lang_pp_lng_ver               = '版本';
$admin_lang_pp_lng_email             = '电子邮箱';
$admin_lang_pp_newest_ver            = '您使用的是最新版本的Pixelpost!';
$admin_lang_pp_thumbnailpath 				 = "推测的缩略图路径";
$admin_lang_pp_thumbnailpath_conf 	 = "设置的缩略图路径"; 

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
$admin_lang_pp_up_error_6            = "没有临时目录。";
$admin_lang_pp_up_error_7            = "写入文件失败。";
$admin_lang_pp_addon_error								= "Pixelpost不能读入插件文件。请检查属性并更改他们为755";

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

?>