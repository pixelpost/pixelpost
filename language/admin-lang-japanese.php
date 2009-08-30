<?php
/*
Pixelpost version 1.7

SVN file version:
$Id: admin-lang-japanese.php 434 2007-10-19 16:59:01Z schonhose $

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

$_lang_file_translator                          = 'Mitsuhiro Yoshida';
$_lang_file_email                               = 'mits@mitstek.com';
$_lang_file_rev                                 = '1.7';

$admin_lang_isrtl                               = "no"; // yes for right-to-left languages and no for left-to-right languages
$admin_lang_update                              = "更新";
$admin_lang_reload                              = "<br /> 変更内容を表示するには、ページをリロードしてください。";
$admin_lang_error                               = "エラー";
$admin_lang_post                                = "投稿";
$admin_lang_page                                = "ページ";
$admin_lang_of                                  = "/";
$admin_lang_next                                = "次へ";
$admin_lang_prev                                = "前へ";
$admin_lang_show                                = "表示";
$admin_lang_go                                  = "Go!";
$admin_lang_done                                = "完了:";
$admin_lang_example                             = "例";

// Admin Start
$admin_start_1                                  = "<b>言語</b>フォルダがない、またはファイル";
$admin_start_2                                  = "がフォルダ内にありません。<br />ここで指定されているすべてのファイルを正確に同じ名称でアップロードしているかどうか確認してください。";
$admin_start_userpw                             = "ユーザ名またはパスワードが正しくありません。";
$admin_start_pw_forgot                          = "パスワードを忘れましたか?";
$admin_start_browser_title                      = "ADMIN";
$admin_start_welcome                            = "ようこそPixelpost管理ページへ - ログインしてください。";
$admin_start_pp_name                            = "あなたのPixelpost Photoblogにリンクする:";
$admin_start_pp_tit                             = "Photoblogをロードするには、ここをクリックしてください。";
$admin_start_cookie                             = "ログイン時にクッキーを設定します。";
$admin_start_username                           = "ユーザ名";
$admin_start_pw                                 = "パスワード";
$admin_start_pw_button                          = "私の新しいパスワードを送信してください";
$admin_start_pw_recover                         = "<span style='color:red;'><b>あなたの古いパスワードをリカバリする方法はありません。</b></span>
                                                   代わりにPixelpostがランダムに作成した新しいパスワードを提供します。<br />
                                                   あなたが管理パネルに登録したメールアドレスを入力してください。
                                                   <br />新しいパスワードが、すぐにあなたのメールアドレス宛に送信されます。";
$admin_start_email                              = "メールアドレス:";
$admin_start_email_button                       = "メールアドレスを入力してください。";
$admin_start_admin_1                            = "管理";
$admin_start_admin_2                            = "-";
$admin_start_remember                           = "今後、自動的にログインする:";

// Password Recovery

// Front Page
$admin_lang_pw_title                            = "Pixelpostパスワードリカバリ";

$admin_lang_pw_wronguser                        = "あなたが入力したユーザ名は、Pixelpostの管理ユーザのユーザ名と異なります。";
$admin_lang_pw_back                             = "管理ページに戻る";
$admin_lang_pw_noemail                          = "あなたはメールアドレスを指定しませんでした! \n<br />
                                                   あなたのパスワードに関するヒントがない場合、<a href='http://forum.pixelpost.org/'>Pixelpostフォーラム</a>でお尋ねください。\n<br />";
$admin_lang_pw_notsent                          = "パスワードは送信されませんでした! <br />あなたが指定したメールアドレスは、Pixelpost管理パネルのメールアドレスと異なります。<br />";
$admin_lang_pw_subject                          = "Pixelpostパスワードリカバリ";
$admin_lang_pw_usertext                         = "あなたのユーザ名:";
$admin_lang_pw_mailtext                         = "あなたのメールアドレス:";
$admin_lang_pw_newpw                            = "あなたの新しいパスワード:";
$admin_lang_pw_text_1                           = "これはPixelpostのパスワードリカバリです。";
$admin_lang_pw_text_2                           = "From: Pixelpost管理セクション";
$admin_lang_pw_text_3                           = "あなたのメールアドレス宛にユーザ名および新しいパスワードを記載したメールが送信されました。<br />送信されたメールを確認してください: ";
$admin_lang_pw_text_4                           = "<span style='color:red;'>エラーが発生しました!<br />あなたが指定したメールアドレスとユーザ名は正しいものですが、メールは送信されませんでした! <br />詳細は管理者にお問い合わせください。</span>";
$admin_lang_pw_text_5                           = "データベースエラー:";
$admin_lang_pw_text_6                           = "<br />新しいパスワードの更新に失敗しました。";
$admin_lang_pw_text_7                           = "このメールは、あなたのPhotoblogログインから自動送信されました。管理セクションで誰かが新しいパスワードをリクエストしました。\n\nあなたのPhotoblogにログインしてください:\n\n ";
$admin_lang_pw_text_8                           = "\n\n自動生成された新しいパスワードでログインした後、パスワードをすぐに変更してください!";

// Admin Menu
$admin_lang_new_image                           = "新しいイメージ";
$admin_lang_images                              = "イメージ";
$admin_lang_categories                          = "カテゴリ";
$admin_lang_comments                            = "コメント";
$admin_lang_options                             = "オプション";
$admin_lang_general_info                        = "一般情報";
$admin_lang_addons                              = "アドオン";
$admin_lang_logout                              = "ログアウト";

// New Image
$admin_lang_ni_post_a_new_image                 = "新しいイメージの投稿";
$admin_lang_ni_image                            = "イメージ";
$admin_lang_ni_image_title                      = "イメージタイトル";
$admin_lang_ni_select_cat                       = "カテゴリ/キーワードを選択してください。";
$admin_lang_ni_description                      = "イメージ説明/テキスト";
$admin_lang_ni_datetime                         = "エントリの日時";
$admin_lang_ni_post_now                         = "現在の日時で投稿する";
$admin_lang_ni_post_one_day_after               = "最終投稿日時の1日後に投稿する";
$admin_lang_ni_post_spec_date                   = "投稿日時を指定する。下記で日時を指定してください:";
$admin_lang_ni_post_entry                       = "エントリの投稿";
$admin_lang_ni_upload                           = "アップロード";
$admin_lang_ni_upload_error                     = "ファイルのアップロード中にエラーが発生しました!";
$admin_lang_ni_posted                           = "投稿完了";
$admin_lang_ni_year                             = "年";
$admin_lang_ni_month                            = "月";
$admin_lang_ni_day                              = "日";
$admin_lang_ni_hour                             = "時";
$admin_lang_ni_min                              = "分";
$admin_lang_ni_markdown_text                    = "このフィールドでテキストの書式を変更するには、MarkdownまたはHTMLを使用してください。";
$admin_lang_ni_markdown_hp                      = "Markdownホームページ";
$admin_lang_ni_markdown_element                 = "基本";
$admin_lang_ni_markdown_syntax                  = "シンタックス参考資料";
$admin_lang_ni_missing_data                     = "データがありません。<br />少なくともイメージおよびイメージのタイトルが必要です。
                                                   情報が不足しているため、イメージはアップロードされませんでした!";
$admin_lang_ni_crop_nextstep                    = "サムネイルウィンドウを選択してください:";
$admin_lang_ni_crop_background                  = "イメージトリミング時の背景です。";
$admin_lang_ni_post_exif_date                   = "Exif日時を使用する";
$admin_lang_ni_db_error                         = "データベースへの書込み中にエラーが発生しました。";
$admin_lang_ni_tags                             = "タグ";
$admin_lang_ni_tags_desc                        = "(タグを分離するためには、カンマ、セミコロンおよびスペースを使用してください。単語を連結するためには、アンダーバー「_」を使用してください。 and dash)";
$admin_lang_ni_alt_language                     = "イメージタイトルおよび説明のための代替テキストを入力してください。";

// Images
$admin_lang_imgedit_edit                        = "編集";
$admin_lang_imgedit_title                       = "タイトル:";
$admin_lang_imgedit_alttitle                    = "代替タイトル:";
$admin_lang_imgedit_file_name                   = "ファイル名:";
$admin_lang_imgedit_dimensions                  = "サイズ:";
$admin_lang_imgedit_tbpublished                 = "投稿日時:";
$admin_lang_imgedit_category_plural             = "カテゴリ:";
$admin_lang_imgedit_delete                      = "削除";
$admin_lang_imgedit_delete1                     = "選択したイメージが";
$admin_lang_imgedit_delete2                     = "削除されました。";
$admin_lang_imgedit_deleted                     = "投稿削除 / イメージ削除 / サムネイル削除";
$admin_lang_imgedit_deleted1                    = "投稿が削除されました。";
$admin_lang_imgedit_deleted2                    = "イメージが削除されました。";
$admin_lang_imgedit_delete_error                = "イメージファイルを削除できませんでした。<br />
                                                   FTPソフトウェア等の他の方法で削除してください。";
$admin_lang_imgedit_deleted3                    = "サムネイルが削除されました。";
$admin_lang_imgedit_delete_error2               = "サムネイルを削除できませんでした。<br />
                                                   FTPソフトウェア等の他の方法で削除してください。";
$admin_lang_imgedit_reupimg                     = "イメージを再アップロードする:";
$admin_lang_imgedit_file                        = "ファイル: ";
$admin_lang_imgedit_file_isuploaded             = "が再アップロードされました!";
$admin_lang_imgedit_update                      = "イメージの更新";
$admin_lang_imgedit_updated                     = "更新イメージ ";
$admin_lang_imgedit_txt_desc                    = "テキスト/説明:";
$admin_lang_imgedit_dtime                       = "日時:";
$admin_lang_imgedit_img                         = "イメージ:";
$admin_lang_imgedit_fsize                       = "ファイルサイズ:";
$admin_lang_imgedit_12cropimg                   = "CropImageツール:";
$admin_lang_imgedit_12cropimg_txt               = "この写真のサムネイルを編集するには、マウスでcropウィンドウをドラッグするか、「+」「-」ボタンで拡大/縮小してください:";
$admin_lang_imgedit_uthmb_button                = "サムネイルを更新する";
$admin_lang_imgedit_u_post_button               = "投稿を更新する";
$admin_lang_imgedit_title1                      = "";
$admin_lang_imgedit_title2                      = " 件のイメージがデータベースに登録されています。<br /> 表示 ";
$admin_lang_imgedit_title3                      = " 件 - ページ ";
$admin_lang_imgedit_title4                      = " / ";
$admin_lang_imgedit_12crop_opt                  = "<strong>注意:</strong> サムネイルのトリミングに12CropImageオプションが選択されていません。サムネイルを変更することはできません。";
$admin_lang_imgedit_edit_post                   = "投稿の編集";
$admin_lang_imgedit_img_page                    = "イメージ/ページ";
$admin_lang_imgedit_cropbg                      = "これは12cropimageのバックグラウンドテキストです。";
$admin_lang_imgedit_js_del_im                   = "本当にこのイメージを削除してもよろしいですか?";
$admin_lang_imgedit_preview                     = "プレビュー";
$admin_lang_imgedit_db_error                    = "<br />パーマリンクストリングが使用されていないか確認してください!";
$admin_lang_imgedit_tags_edit                   = "タグ (タグを分離するためには、カンマ、セミコロンおよびスペースを使用してください。単語を連結するためには、アンダーバー「_」を使用してください。):";
$admin_lang_imgedit_alt_language                = "イメージタイトルおよび説明のための代替テキストを変更する";
$admin_lang_imgedit_masstag                     = "選択したイメージよりタグを追加/削除する";
$admin_lang_imgedit_masstag_set                 = "タグを追加する";
$admin_lang_imgedit_masstag_set2                = "代替言語のタグを追加する";
$admin_lang_imgedit_masstag_unset               = "タグを削除する";
$admin_lang_imgedit_published                   = "非公開にされたイメージ";
$admin_lang_imgedit_unpublished_cmnts           = "件を公開しました。";


// Mass-Edit Categories
$admin_lang_imgedit_mass_1                      = "大量更新するカテゴリ";
$admin_lang_imgedit_mass_2                      = "割り当て済み";
$admin_lang_imgedit_mass_3                      = "未割り当て";
$admin_lang_imgedit_mass_4                      = "大量更新する";


// Categories
$admin_lang_cats_add_cat                        = "カテゴリを追加する";
$admin_lang_cats_added                          = "カテゴリが追加されました。";
$admin_lang_cats_add_cat_txt                    = "あなたがイメージを割り当てることのできるカテゴリを追加してください。";
$admin_lang_cats_add_cat_txt_altlang            = "上記カテゴリに別名を設定する。";
$admin_lang_cats_edit_cat                       = "カテゴリの編集";
$admin_lang_cats_edit_cat_txt                   = "編集するカテゴリを選択してください";
$admin_lang_cats_edit_cat_button                = "カテゴリを編集する";
$admin_lang_cats_edit_tip                       = "次のカテゴリの新しいカテゴリ名を入力してください。<br />カテゴリ名を変更する前のカテゴリ内にあるイメージは、変更されたカテゴリ名に移動されます。";
$admin_lang_cats_delete_cat                     = "カテゴリの削除";
$admin_lang_cats_delete_cat_txt                 = "削除するカテゴリを選択してください";
$admin_lang_cats_delete_cat2                    = "削除:";
$admin_lang_cats_delete_cats_button             = "カテゴリを削除する";
$admin_lang_cats_deleted                        = "カテゴリが削除されました。";
$admin_lang_cats_update                         = "カテゴリを更新する";
$admin_lang_cats_update_cat_button              = "カテゴリを更新する";
$admin_lang_cats_updated                        = "カテゴリ名が更新されました。";


// Comments
$admin_lang_cmnt_commentlist                    = "コメント一覧 - 自由に削除または編集してください。&nbsp;||&nbsp;表示";
$admin_lang_cmnt_name                           = "氏名:";
$admin_lang_cmnt_email                          = "メールアドレス:";
$admin_lang_cmnt_comment                        = "コメント:";
$admin_lang_cmnt_image                          = "イメージ";
$admin_lang_cmnt_delete                         = "削除";
$admin_lang_cmnt_deleted                        = "コメントが削除されました。";
$admin_lang_cmnt_delete1                        = "選択したコメントが";
$admin_lang_cmnt_delete2                        = "削除されました。";
$admin_lang_cmnt_edit                           = "編集";
$admin_lang_cmnt_edited                         = "コメントが編集されました。";
$admin_lang_cmnt_check_all                      = "大量選択/選択解除";
$admin_lang_cmnt_invert_checks                  = "選択を反転する";
$admin_lang_cmnt_del_selected                   = "選択した投稿を削除する";
$admin_lang_cmnt_page                           = "ページあたりのコメント数";
$admin_lang_cmnt_commenter                      = "コメント作成日時:";
$admin_lang_cmnt_ip                             = "IPアドレス:";
$admin_lang_cmnt_save                           = "保存";
$admin_lang_cmnt_massdelete_text                = "すべてのコメントを削除したい場合、「すべてを選択する」ボタンをクリックしてください。";
$admin_lang_cmnt_js_del_comm                    = "本当にこのコメントを削除してもよろしいですか?";
$admin_lang_cmnt_publish_sel                    = "選択したコメントを公開する";
$admin_lang_cmnt_unpublish_sel                  = "モデレーションキューに追加する";
$admin_lang_cmnt_published                      = "非公開にされたコメント";
$admin_lang_cmnt_unpublished_cmnts              = "件を公開しました。";
$admin_lang_cmnt_unpublished                    = "公開されたコメント";
$admin_lang_cmnt_published_cmnts                = "件を非公開にしました。";
$admin_lang_cmnt_error_blacklist                = "ブラックリストの更新中にエラーが発生しました: ";
$admin_lang_cmnt_error_banlist                  = "リファラ禁止リストの更新中にエラーが発生しました: ";
$admin_lang_cmnt_moderation_que                 = "モデレーションキュー";
$admin_lang_cmnt_rep_spam                       = 'スパム報告';
$admin_lang_cmnt_submenu1                       = "コメント";
$admin_lang_cmnt_submenu2                       = "モデレーション待ち";

// Option
$admin_lang_optn_general                        = "一般";
$admin_lang_optn_template                       = "テンプレート";
$admin_lang_optn_thumbnails                     = "サムネイル";
$admin_lang_optn_tip                            = "末尾のスラッシュ <b>'/'</b> を忘れずに入力してください。例 <i>http://www.pixelpost.org/</i>";

$admin_lang_optn_update                         = "更新";
$admin_lang_optn_yes                            = "Yes";
$admin_lang_optn_no                             = "No";

$admin_lang_optn_title_url                      = "サイトタイトルおよびURI";
$admin_lang_optn_title                          = "タイトル:";
$admin_lang_optn_sub_title                      = "サブタイトル:";
$admin_lang_optn_url                            = "URI:";
$admin_lang_optn_usr_pss                        = "管理者およびパスワード";
$admin_lang_optn_usr_pss_txt                    = "ユーザ名またはパスワードを変更しますか?";
$admin_lang_optn_usr                            = "ユーザ:";
$admin_lang_optn_pss                            = "パスワード:";
$admin_lang_optn_pss_re                         = "パスワードをもう一度:";
$admin_lang_optn_email                          = "管理者メールアドレス";
$admin_lang_optn_fillit                         = "このメールアドレスは、パスワードリカバリに使用されます。";
$admin_lang_optn_img_path                       = "イメージおよびサムネイルパス";
$admin_lang_optn_tz                             = "タイムゾーン";
$admin_lang_optn_tz_txt                         = "あなたのロケーションのタイムゾーンオフセットを選択してください。";
$admin_lang_optn_sendemail                      = "コメント投稿時のメール送信";
$admin_lang_optn_sendemail_txt                  = "コメント投稿時に通知メールを送信しますか?";
$admin_lang_optn_sendemail_html_txt             = "HTML形式の通知メールを送信しますか?";
$admin_lang_optn_comment_setting                = "全体的なコメント設定";
$admin_lang_optn_comment_setting2               = "コメント設定";
$admin_lang_optn_cmnt_mod_txt                   = "コメントに対するデフォルトのアクション:";
$admin_lang_optn_cmnt_mod_txt2                  = "コメントに対するアクション:";
$admin_lang_optn_cmnt_mod_allowed               = "すぐに公開する";
$admin_lang_optn_cmnt_mod_moderation            = "モデレーションキューへ移動する";
$admin_lang_optn_cmnt_mod_forbidden             = "コメント機能を無効にする";

$admin_lang_optn_switch_template                = "テンプレートを変更する";
$admin_lang_optn_lang_file                      = "言語ファイル";
$admin_lang_optn_lang_file_admin                = "管理パネル言語ファイル";
$admin_lang_optn_dateformat                     = "日付表示形式";
$admin_lang_optn_dateformat_txt                 = "イメージおよびコメント表示の日付フォーマットです。このシンタックスでは、PHP <a href='http://www.php.net/date' target='_blank'>date() </a>関数と同じものを使用します。一般的なパラメータの例: Y:年 m:月 d:日 H:時 i:分 s:秒";
$admin_lang_optn_gmt                            = "ここでは自動的な夏時間調整をサポートしませんので注意してください。手動で夏時間に変更してください。<br />あなたのローカル時間とGMTとの差が分からない場合、<a href='http://www.worldtimeserver.com/current_time_in_UTC.aspx' target='__blank'>GMT現在時刻</a>を参考にしてください。<br />";
$admin_lang_optn_cat_link_format                = "カテゴリリンクフォーマット";
$admin_lang_optn_catlinkformat_select           = "カテゴリリンクフォーマットを選択してください";
$admin_lang_optn_cat_link_format_txt            = "テンプレートでカテゴリへのリンクを表示するためのフォーマットです。";
$admin_lang_optn_catlinkformat_custom           = "カスタムカテゴリフォーマット";
$admin_lang_optn_catlinkformat_custom_start     = "開始ストリング:";
$admin_lang_optn_catlinkformat_custom_end       = "終了ストリング:";
$admin_lang_optn_calendar_type                  = "カレンダータイプ";
$admin_lang_optn_thumb_row                      = "サムネイル";
$admin_lang_optn_thumb_row_txt                  = "自動的に作成される行に何件のサムネイルを表示しますか?<br/>適切に表示されるためには、奇数の入力をお勧めします。例 「6または8」を入力するのではなく「7または9」を入力する。";
$admin_lang_optn_crop_thumbs                    = "サムネイルをトリミングしますか?";
$admin_lang_optn_crop_thumbs_txt                = "サムネイルを適切なサイズにトリミングしたい場合: 「<b>YES</b>」を選択してください。<br/>
                                                   オリジナルサイズを保持したい場合: 「<b>NO</b>」を選択してください。<br/>
                                                   イメージのアップロード後にサムネイルを手動でトリミングしたい場合: 「<b>12CropImage</b>」を選択してください。";
$admin_lang_optn_thumb_size                     = "サムネイルサイズ";
$admin_lang_optn_thumb_size_txt                 = "サムネイルの幅 x 高さを設定してください。";
$admin_lang_optn_thumb_size_new                 = "新しいサイズを設定する";
$admin_lang_optn_reg_thumbs_button              = "サムネイルを再生成する";
$admin_lang_optn_regen_thumbs_txt               = "ここでは、すべての投稿されたイメージから新しいサムネイルを生成します。手動でトリミングされたすべてのサムネイルが削除され、デフォルトサムネイルが生成されます。それぞれのイメージを編集する場合、12CropImageを使用してサムネイルを変更することができます。";
$admin_lang_optn_img_compression                = "サムネイル圧縮";
$admin_lang_optn_img_compression_txt            = "JPEG圧縮率を指定してください。10は低いクオリティで、100は最高のクオリティ (ロスなし) です。";
$admin_lang_optn_thumb_sharp                    = "サムネイルシャープニング";
$admin_lang_optn_thumb_sharp_txt                = "どのようにサムネイルをシャープニングしますか?";
$admin_lang_optn_thumb_sharp0                   = 'シャープニングなし';
$admin_lang_optn_thumb_sharp1                   = 'ライト';
$admin_lang_optn_thumb_sharp2                   = 'ミディアム';
$admin_lang_optn_thumb_sharp3                   = 'ハイ';
$admin_lang_optn_thumb_sharp4                   = 'ウルトラハイ';
$admin_lang_optn_pass_chngd_txt                 = "パスワードが更新されました。";
$admin_lang_optn_pass_notchngd_txt              = "パスワードは更新されませんでした。「パスワードをもう一度」フィールドに同じパスワードを入力してください。";
$admin_lang_optn_title_url_text                 = "あなたがインストール時に入力したサイトタイトルおよびURIを確認または修正してください。";
$admin_lang_optn_thumb_updated                  = "サムネイルが更新されました!";
$admin_lang_optn_updated                        = "サムネイルが更新されました。";
$admin_lang_optn_visitorbooking_title           = '訪問者の記録';
$admin_lang_optn_visitorbooking_desc            = 'Pixelpostのすべての訪問者情報を記録しますか?';
$admin_lang_optn_upd_done                       = "正常に更新されました。";
$admin_lang_optn_upd_error                      = "更新エラーが発生しました。";
$admin_lang_optn_upd_lang_error                 = "選択された代替言語はデフォルト言語と同じです。<br />異なる代替言語を選択するか、代替言語を無効にしてください。";
$admin_lang_optn_markdown                       = "Markdownを有効にする";
$admin_lang_optn_markdown_desc                  = "イメージ説明でPixelpostのMarkdown機能を有効にしますか?";
$admin_lang_optn_exif                           = "Exifを有効にする";
$admin_lang_optn_exif_desc                      = "フロントページでPixelpostのExif機能を有効にしますか?";
$admin_lang_optn_token                          = "フォームでトークンを有効にする";
$admin_lang_optn_token_desc                     = "トークンを使用することで、おそらく<a href=\"http://en.wikipedia.org/wiki/Cross-site_request_forgery\">Cross-Site Request Forgeries</a>を減らすことができます。<br/><br/>\n
                                                   コメントでトークンの使用を設定することにより、ユーザセッションとトークンが一致する場合のみコメントが保存されます。この機能を実装するには、コメントテンプレートファイル内で <strong><i>&lt;form&gt;...&lt;/form&gt;</i></strong> タグの間に <strong>&lt;TOKEN&gt;</strong> を追加してください。
                                                   <strong>&lt;TOKEN&gt;</strong> タグを設定しない場合、ユーザにはコメントが投稿できない旨のエラーメッセージが表示されます。<br /><br/>
                                                   この設定を有効にしてもよろしいですか?";
$admin_lang_optn_token_time                     = "コメントウィンドウを開いてコメントを送信するまでの最大時間: ";
$admin_lang_optn_token_error                    = "注意: 1分より少ないトークン時間は利用できません。トークン時間は、1分にリセットされました。";
$admin_lang_optn_dsbl_list                      = "Distributed Sender Blackhole List設定 (http://www.dsbl.org)";
$admin_lang_optn_dsbl_list_desc                 = "<a href=\"http://www.dsbl.org\" target=\"_blank\">Distributed Sender Blackhole List</a>には、オープンリレー、オープンプロクシまたはその他の脆弱性があるホストのIPアドレスを含んでいます。これらのサーバは、しばしばスパム送信者からメール送信に悪用されますが、コメントスパムを登録するためのサーバとしても知られています。<br /> <br />
                                                   Distributed Sender Blackhole ListでコメントのIPアドレスをチェックしますか?";
$admin_lang_optn_time_between_comments             = "スパムフラッドを防ぐ";
$admin_lang_optn_time_between_comments_desc     = "次に新しいコメントを投稿できる秒数 (フラッドを避けるため): ";
$admin_lang_optn_max_uri_comment                = "URIの最大数";
$admin_lang_optn_max_uri_comment_desc           = "コメントが許可されているURI数: ";

$admin_lang_optn_rss_setting                    = "RSS/ATOMフィード設定";
$admin_lang_optn_rss_title                      = "フィードタイトル";
$admin_lang_optn_rss_desc                       = "フィード説明";
$admin_lang_optn_rss_copyright                  = "フィード著作権";
$admin_lang_optn_rss_discovery                  = "フィード発見";
$admin_lang_optn_rss_opt_both                   = "RSS &amp; ATOM";
$admin_lang_optn_rss_opt_rss                    = "RSS";
$admin_lang_optn_rss_opt_atom                   = "ATOM";
$admin_lang_optn_rss_opt_ext                    = "外部";
$admin_lang_optn_rss_opt_none                   = "None";
$admin_lang_optn_rss_ext_type                   = "外部フィードタイプ";
$admin_lang_optn_rss_ext                        = "外部フィード";
$admin_lang_optn_rss_enable_comment_feed        = "フィードへのコメントを有効にする";
$admin_lang_optn_rsstype_desc                   = "RSS/ATOMフィードのスタイルを選択してください:";
$admin_lang_optn_rss_full                       = "フルサイズの写真を表示する";
$admin_lang_optn_rss_thumbs                     = "サムネイルを表示する";
$admin_lang_optn_rss_thumbs_only                = "サムネイルのみ表示する";
$admin_lang_optn_rss_full_only                  = "フルサイズの写真のみ表示する";
$admin_lang_optn_rss_text                       = "テキストのみ表示する";
$admin_lang_optn_feeditems_desc                 = "フィードリストのアイテム数: ";
$admin_lang_optn_lang                           = "ベース言語設定: ";
$admin_lang_optn_alt_lang                       = "代替言語設定: ";
$admin_lang_optn_alt_lang_dis                   = "無効";
$admin_lang_optn_alt_lang_no                    = "無効";
$admin_lang_optn_img_display                    ="イメージ表示順";
$admin_lang_optn_img_display_desc               ="イメージの表示順を選択してください: ";
$admin_lang_optn_img_display_default            ="降順";
$admin_lang_optn_img_display_reversed           ="昇順";

// Info
$admin_lang_info_gd                             = "インストールされていません。サーバの管理者にお問い合わせください!";
$admin_lang_info_gd_jpg                         = "- JPEGサポート";
$admin_lang_pp_version1                         = "最新のPixelpostバージョン:";
$admin_lang_pp_forum                            = "ヘルプを探したい、またはフィードバックを投稿したい場合、Pixelpostフォーラムにアクセスしてください。";
$admin_lang_pp_min_php                          = "Pixelpostの最小システム要件: PHPバージョン";
$admin_lang_pp_min_mysql                        = "Pixelpostの最小システム要件: MySQL";
$admin_lang_pp_exif1                            = "<b>EXIF</b> Pixelpostは";
$admin_lang_pp_exif2                            = "をEXIF情報のため使用しています";
$admin_lang_pp_path                             = "パス";
$admin_lang_pp_imagepath                        = "推測されるイメージパス:";
$admin_lang_pp_imagepath_conf                   = "設定されたイメージパス:";
$admin_lang_pp_img_chmod1                       = "イメージフォルダに書込み権がありません!";
$admin_lang_pp_img_chmod2                       = "このフォルダに正しいパーミッションを設定しない場合、イメージをアップロードできません。";
$admin_lang_pp_img_chmod3                       = "<br /><b>chmod 777</b>によりフォルダに書込み権を設定してください (オーナー、グループ、その他のユーザに対する読み込み、書込み、実行権)。";
$admin_lang_pp_img_chmod4                       = "ディレクトリに書き込めますか? YES ";
$admin_lang_pp_img_chmod5                       = "サムネイルフォルダに書込み権がありません!";
$admin_lang_pp_imgfolder                        = "イメージディレクトリ:";
$admin_lang_pp_thumbfolder                      = "サムネイルディレクトリ:";
$admin_lang_pp_langfolder                       = "言語ディレクトリ:";
$admin_lang_pp_addfolder                        = "アドオンディレクトリ:";
$admin_lang_pp_incfolder                        = "インクルードディレクトリ:";
$admin_lang_pp_tempfolder                       = "テンプレートディレクトリ:";
$admin_lang_pp_folder_missing                   = "存在しません。 (要作成";
$admin_lang_pp_ref_log_title                    = "直近7日間のリファラ";
$admin_lang_hostinfo                            = "ホスト情報";
$admin_lang_fileuploads                         = "Pixelpostサイトへの<b>ファイルアップロード</b>";
$admin_lang_serversoft                          = "サーバソフトウェア";
$admin_lang_pixelpostinfo                       = "Pixelpost情報";
$admin_lang_pp_currversion                      = "Pixelpostバージョン: ";
$admin_lang_pp_check                            = "チェック";
$admin_lang_pp_sess_path                        = "セッション保存パス";
$admin_lang_pp_sess_path_emp                    = "が空です。";
$admin_lang_pp_fileupload_np                    = '可能ではありません! php.iniファイルのファイルアップロード変数を確認してください!';
$admin_lang_pp_fileupload_p                     = '可能です。';
$admin_lang_pp_langs                            = 'Pixelpost言語翻訳';
$admin_lang_pp_lng_fname                        = 'ファイル名';
$admin_lang_pp_lng_author                       = '著者';
$admin_lang_pp_lng_ver                          = 'バージョン';
$admin_lang_pp_lng_email                        = 'メールアドレス';
$admin_lang_pp_newest_ver                       = 'あなたのPixelpostは最新バージョンです!';
$admin_lang_pp_thumbnailpath                    = "推測されるサムネイルパス";
$admin_lang_pp_thumbnailpath_conf               = "設定されたサムネイルパス"; 

// AddOns
$admin_lang_addon_title                         = "インストール済みアドオン";
$admin_lang_failed_addonstatus                  = "アドオンのステータス変更時にエラーが発生しました: ";
$admin_lang_addon_off                           = "OFFにするには、ここをクリックしてください。";
$admin_lang_addon_on                            = "ONにするには、ここをクリックしてください。";

// Error Messages
$admin_lang_pp_up_error_0                       = "正常にアップロードされました。";
$admin_lang_pp_up_error_1                       = "ウェブサーバで設定された最大ファイルサイズを超えました。";
$admin_lang_pp_up_error_2                       = "最大ファイルサイズを超えました。";
$admin_lang_pp_up_error_3                       = "ファイルは完全にアップロードされませんでした。";
$admin_lang_pp_up_error_4                       = "アップロードされているファイルはありません。";
$admin_lang_pp_up_error_6                       = "テンポラリフォルダがありません。";
$admin_lang_pp_up_error_7                       = "ファイルのディスク書込みに失敗しました。";
$admin_lang_pp_addon_error                      = "Pixelpostはアドオンファイルを読み込むことができません。アドオンファイルのchmod設定を確認して、755に変更してください。";

// options >> time stamps
$admin_lang_optn_timestamps_title               = "タイムスタンプ";
$admin_lang_optn_timestamps_desc                = "同じファイル名のイメージ上書きを避けるため、ファイル名にタイムスタンプを使用します。<br/>
                                                   タイムスタンプを使用しますか? ";

// options >> fight spam
$admin_lang_spam                                = "スパムコントロール";
$admin_lang_spam_change                         = "すべての禁止リスト";
$admin_lang_spam_err_1                          = "禁止リストテーブル作成中にエラーが発生しました: ";
$admin_lang_spam_tableadd                       = "スパム対策のため、禁止リストテーブルが追加されました。";
$admin_lang_spam_err_2                          = "モデレーションリスト更新中にエラーが発生しました: ";
$admin_lang_spam_err_3                          = "ブラックリスト更新中にエラーが発生しました: ";
$admin_lang_spam_err_4                          = "リファラ禁止リスト更新中にエラーが発生しました: ";
$admin_lang_spam_err_5                          = "許可するコメント内のリンク数を更新中にエラーが発生しました: ";
$admin_lang_spam_upd                            = "すべての禁止リストを正常に更新しました。";
$admin_lang_spam_err_6                          = "コメント更新においてモデレーションリストの比較中にエラーが発生しました: ";
$admin_lang_spam_com_upd                        = "パス: コメントがモデレーションリストと比較されました。 ";
$admin_lang_spam_err_7                          = "コメント削除においてブラックリストの比較中にエラーが発生しました: ";
$admin_lang_spam_com_del                        = "パス: ブラックリストの単語/IPアドレスを含んでいるコメントを削除しました。";
$admin_lang_spam_err_8                          = "訪問者削除においてリファラ禁止リストの比較中にエラーが発生しました: ";
$admin_lang_spam_visit_del                      = "単語/IPアドレスがリファラ禁止リストに登録されている訪問者を削除しました。";

// Spam
$admin_lang_spam_ban                            = "禁止リストを更新する";
$admin_lang_spam_content                        = "単語/IPアドレスの禁止リストを下記のテキストボックスに1行あたり1件入力してください。<br/>
                                                   モデレーションリスト内の単語またはIPアドレスを含んだコメントは、モデレーションキューに移動されます。<br/>
                                                   ブラックリスト内の単語またはIPアドレスを含んだコメントは、コメントリストへの投稿が許可されません。<br/>
                                                   リファラ禁止リスト内のIPアドレスまたはリファラを含んだアドレスからは、あなたのPhotoblogへのアクセスが拒否されます。<br/>
                                                   (これらの機能を動作させるため、「.htaccessコードを取得する」をクリックして、取得したコードをあなたの.htaccessファイルに追加してください!)";
$admin_lang_spam_modlist                        = "モデレーションリスト";
$admin_lang_spam_blacklist                      = "ブラックリスト";
$admin_lang_spam_reflist                        = "リファラ禁止リスト";
$admin_lang_spam_blacklist_text                 = "あなたのサイトから特定のIPアドレスおよびリファラのアクセスを拒否するため、下記コードをコピー (Windowsでは、CTRL+A および CTRL+C) して、「.htaccess」ファイルに貼り付けてください。";
$admin_lang_spam_htaccess_text                  = ".htaccessコードを取得する";
$admin_lang_spam_check_comm                     = "過去のコメントをチェックする";
$admin_lang_spam_del_bad_comm                   = "不正なコメントを削除する";
$admin_lang_spam_del_bad_ref                    = "不正なリファラを削除する";
$admin_lang_spam_updateblacklist                = "すべての禁止リストを更新する";

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