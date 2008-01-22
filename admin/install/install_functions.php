<?php

// SVN file version:
// $Id$

if(!defined('PP_INSTALL')) { die(header("Location: ../index.php")); }

////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////
////						LANGUAGE SELECTION
////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
/**
 * Supported install languages
 *
 */
$supported_langs = array(
				   'dutch'=>array('NL','Nederlands'),
				   'english'=>array('EN','English'),
				   'french'=>array('FR','Français'),
				   'german'=>array('DE','Deutsch'),
				   'italian'=>array('IT','Italiano'),
				   'norwegian'=>array('NO','Norsk'),
				   'persian'=>array('FA','Farsi'),
				   'polish'=>array('PL','Polskiego'),
				   'portuguese'=>array('PT','Português'),
				   'simplified_chinese'=>array('CN','Chinese'),
				   'spanish'=>array('ES','Español'),
				   'swedish'=>array('SE','Svenska'),
				   'danish'=>array('DK','Dansk'),
				   'japanese'=>array('JP','Japanese')
				   );

/**
 * Set the appropriate language cookie
 * @author: Dkozikowski
 */
if(isset($_POST['language'])) {
	$lang = eregi_replace('[^a-zA-Z]+','',$_POST['language']);
	setcookie('pp_install_lang', $lang, false, '/', false, 0);
}

/**
 * Determine the correct language to use
 * @author: Dkozikowski
 */
if(isset($_COOKIE['pp_install_lang'])){ $lang = $_COOKIE['pp_install_lang']; }else{ $lang = "english"; }

if(isset($_POST['language'])) { $lang = eregi_replace('[^a-zA-Z]+','',$_POST['language']); }

if(file_exists("install/language/install-lang-".$lang.".php")) {

	require("install/language/install-lang-".$lang.".php");

}else{

	if(file_exists("install/language/install-lang-english.php")) {

		require("install/language/install-lang-english.php");

	}else{
		echo "The requested language was not found!";
		exit();
	}
}
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////
////						MENU VARIABLES
////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
/**
 * Apply style to active link (Used for navigation)
 * @author Dkozikowski
 */
if(isset($_GET['view']) && $_GET['view'] == "overview"){
	$menu_cat  = "overview";

}elseif(isset($_GET['view']) && $_GET['view'] == "install"){
    $menu_cat  = "install";

}elseif(isset($_GET['view']) && $_GET['view'] == "db_fix"){
	$menu_cat  = "db_fix";

}elseif(isset($_GET['view']) && $_GET['view'] == "upgrade"){
	$menu_cat  = "upgrade";

}
if(isset($_GET['cat']) && $_GET['cat'] == "introduction"){
    $cat       = "introduction";

}elseif(isset($_GET['cat']) && $_GET['cat'] == "license"){
	$cat       = "license";

}elseif(isset($_GET['cat']) && $_GET['cat'] == "support"){
    $cat       = "support";

}elseif(isset($_GET['cat']) && $_GET['cat'] == "requirements"){
    $cat       = "requirements";

}elseif(isset($_GET['cat']) && $_GET['cat'] == "database"){
    $cat       = "database";

}elseif(isset($_GET['cat']) && $_GET['cat'] == "administrator"){
    $cat       = "administrator";

}elseif(isset($_GET['cat']) && $_GET['cat'] == "settings"){
    $cat       = "settings";

}elseif(isset($_GET['cat']) && $_GET['cat'] == "configuration"){
    $cat       = "configuration";

}elseif(isset($_GET['cat']) && $_GET['cat'] == "finalize"){
    $cat       = "finalize";

}elseif(isset($_GET['cat']) && $_GET['cat'] == "upgrade"){
    $cat       = "upgrade";

}elseif(isset($_GET['view']) && $_GET['view'] == "upgrade"){
	$cat       = "introduction";

}elseif(isset($_GET['view']) && $_GET['view'] == "db_fix"){
	$cat       = "database";

}else{
	$cat       = "introduction";

}
function isActive($var,$value){
	if($var == $value){ echo ' class="nav_on"'; }else{ echo ' class="nav_off"'; }
}
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////
////						CREATE LANGUAGE SELECT
////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
/**
 * Return all available language options for the language drop-down menu
 * @author: Dkozikowski
 */
function langOptions($language){

	$options = "";
	$dir = "install/language/";

	if($handle = opendir($dir)) {
		while (false !== ($file = readdir($handle))) {
			if(is_file($dir.$file) && ($file != "index.html")) {
				$file = ereg_replace("install-lang-","",$file);
				$file = ereg_replace(".php","",$file);
				$lang = ucfirst($file);

				$selected = ($file == $language) ? ' selected="selected"' : '';

				$options .= "<option value=\"$file\"$selected>$lang</option>\n";
			}
		}
		closedir($handle);
	}
	echo $options;
}
/**
 * Return all available admin language options for the language drop-down menu
 * @author: Dkozikowski
 */
function adminLangOptions($language,$admin_language){

	$options = "";
	$dir = "../language/";

	if($handle = opendir($dir)) {
		while (false !== ($file = readdir($handle))) {
			$admin_pre = substr("$file",0,6);
			if(is_file($dir.$file) && ($file != "index.html") && $admin_pre == "admin-") {
				$file = ereg_replace("admin-lang-","",$file);
				$file = ereg_replace(".php","",$file);
				$file = ereg_replace("_"," ",$file);
				$lang = ucwords($file);

				$selected  = ($admin_language != "" && $file == $admin_language || $file == $language) ? ' selected="selected"' : '';

				$options .= "<option value=\"$file\"$selected>$lang</option>\n";
			}
		}
		closedir($handle);
	}
	echo $options;
}
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////
////						STORED VARIABLES
////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////

/**
 * Do not include the following fields in the output
 *
 */
$excluded  = array('submit', 'db_check', 'admin_check', 'settings_check', 'dlconfig');

/**
 * Run encode() function for listed fields
 *
 */
$sensitive = array('db_pass', 'admin_password1', 'admin_password2');

/**
 * Create hidden fields for each posted variable
 *
 */
$form_values = "";

foreach($_POST as $key => $value) {

	if(!in_array($key, $excluded)) {

		$value = clean_post_vars($value);

		if(in_array($key, $sensitive)) {

			/**
			 * Find the last character in the string
			 * If it contains a '+', do not re-encode
			 *
			 */
			$last_char = substr($value, -1, 1);

			if($last_char != '+') {
				$value = encode($value);
			}
		}

		$form_values .= "<input type=\"hidden\" name=\"$key\" value=\"$value\" />\n";

		$data[$key] = $value;
	}
}
function clean_post_vars($var){

	$var = htmlentities(stripslashes(strip_tags($var)));

	return $var;
}

/**
 * Salt used for encode() / decode() functions
 *
 */
$salt1     = '714821316d';
$salt2     = 'NzE0ODI5f';
function encode($var){

	global $salt1, $salt2;

	$var = base64_encode($salt1.$var.$salt2);

	$var = $var."+";

	return $var;
}
function decode($var){

	global $salt1, $salt2;

	$var = base64_decode($var);
	$var = ereg_replace($salt1, "", $var);
	$var = ereg_replace($salt2, "", $var);

	return $var;
}
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////
////						VERIFY ALL REQUIREMENTS ARE MET
////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
$passed = array('php' => false, 'gdinfo' => false, 'image_found' => false, 'image_write' => false, 'thumb_found' => false, 'thumb_write' => false, 'pcre' => false, 'imagesize' => false);

/**
 * Check for PHP version
 *
 */
$php_version = phpversion();
if (version_compare($php_version, '4.3.3') < 0) {

	$result['php'] = $php_version.", ".$lang_fail;
}else{
	$passed['php'] = true;
	$result['php'] = $php_version;
}

/**
 * Check if register_globals is enabled
 *
 */
if (@ini_get('register_globals') == '1' || strtolower(@ini_get('register_globals')) == 'on') {

	$result['globals'] = $lang_no;
	$css['globals']    = "redHighlightBold";
}else{

	$result['globals'] = $lang_yes;
	$css['globals']    = "grnHighlightBold";
}

/**
 * Check if getimagesize function exists
 *
 */
if (@function_exists('getimagesize')) {

	$passed['imagesize'] = true;
	$result['imagesize'] = $lang_yes;
}else{

	$result['imagesize'] = $lang_fail;
}

/**
 * Check for PCRE UTF-8 support
 *
 */
if (@preg_match('//u', '')) {

	$passed['pcre'] = true;
	$result['pcre'] = $lang_yes;
}else{

	$result['pcre'] = $lang_fail;
}

/**
 * Check for GD_Info support
 *
 */
if(@function_exists('gd_info')) {

	$passed['gdinfo'] = true;
	$gd_array         = gd_info();
	$gd_version       = ereg_replace('[[:alpha:][:space:]()]+', '', $gd_array['GD Version']);

	$result['gdinfo'] = $gd_version;
}else{

	$result['gdinfo'] = $lang_fail;
}

/**
 * Check if images/ directory exist and is writable
 *
 */
$images = check_and_set("../images/");

if($images == "chmod" || $images == "create") {

	$result['image_chmod'] = $lang_writable_no;
}else{

	$passed['image_write'] = true;
	$result['image_chmod'] = $lang_writable;
}

if($images == "create") {

	$result['image_create'] = $lang_not_found;
}else{

	$passed['image_found'] = true;
	$result['image_create'] = $lang_found;
}

/**
 * Check if thumbnails/ directory exist and is writable
 *
 */
$thumbs = check_and_set("../thumbnails/");

if($thumbs == "chmod" || $thumbs == "create") {

	$result['thumb_chmod'] = $lang_writable_no;
}else{

	$passed['thumb_write'] = true;
	$result['thumb_chmod'] = $lang_writable;
}

if($thumbs == "create") {

	$result['thumb_create'] = $lang_not_found;
}else{

	$passed['thumb_found'] = true;
	$result['thumb_create'] = $lang_found;
}
/**
 * Apply correct class name
 *
 */
foreach($passed as $value => $status) {

	$style = ($status == 1) ? 'grnHighlightBold' : 'redHighlightBold';

	$css[$value] = $style;
}
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////
////						VERIFY MYSQL DETAILS
////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
$connect_test = false;
$error = array();

if(isset($_POST['db_check'])) {

	$db_host    = clean_post_vars($_POST['db_host']);
	$db_name    = clean_post_vars($_POST['db_name']);
	$db_user    = clean_post_vars($_POST['db_user']);
	$db_pass    = clean_post_vars($_POST['db_pass']);
	$tbl_prefix = clean_post_vars($_POST['tbl_prefix']);

	$connect_test = connect_check($error, $db_host, $db_name, $db_user, $db_pass, $tbl_prefix);
}else{

	$db_host    = "";
	$db_name    = "";
	$db_user    = "";
	$db_pass    = "";
	$tbl_prefix = "pixelpost_";
}

if($connect_test) {
	$result['connect_test'] = "&nbsp;".$lang_conn_success;
}else{
	$result['connect_test'] = implode('<br />', $error);
}

function connect_check(&$error, $db_host, $db_name, $db_user, $db_pass, $tbl_prefix) {

	global $lang_db_host_error,$lang_db_name_error,$lang_db_prefix_char,$lang_db_max_prefix,$lang_db_conn_error;

	/**
	 * Check that we have a database host
	 *
	 */
	if($db_host == '') {

		$error[] = "&nbsp;".$lang_db_conn_error."&nbsp;".$lang_db_host_error;
	}

	/**
	 * Check that we have a database name
	 *
	 */
	if($db_name == '') {

		$error[] = "&nbsp;".$lang_db_conn_error."&nbsp;".$lang_db_name_error;
	}

	/**
	 * Make sure our table prefix does not contain illegal characters ( - . )
	 *
	 */
	if (strpos($tbl_prefix, '-') !== false || strpos($tbl_prefix, '.') !== false) {

		$error[] = "&nbsp;".$lang_db_conn_error."&nbsp;".$lang_db_prefix_char;
	}

	/**
	 * Make sure the table prefix does not exceed 36 characters in length
	 *
	 */
	$prefix_max_length = 36;

	if (strlen($tbl_prefix) > $prefix_max_length){

		$error[] = "&nbsp;".$lang_db_conn_error."&nbsp;".$lang_db_max_prefix;
	}

	/**
	 * Try and connect
	 *
	 */
	if(!@mysql_connect($db_host, $db_user, $db_pass)){

		$error[] = "&nbsp;".$lang_db_conn_error."&nbsp;".mysql_error();
	}

	if(!@mysql_select_db($db_name)){

		$error[] = "&nbsp;".$lang_db_conn_error."&nbsp;".mysql_error();
	}

	if (!isset($error) || !sizeof($error)) {

		return true;
	}

	return false;
}
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////
////						VERIFY ADMIN DETAILS
////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
$admin_passed = false;

if(isset($_POST['admin_check'])) {

	$admin_language  = clean_post_vars($_POST['admin_language']);
	$admin_username  = clean_post_vars($_POST['admin_username']);
	$admin_password1 = clean_post_vars($_POST['admin_password1']);
	$admin_password2 = clean_post_vars($_POST['admin_password2']);
	$admin_email1    = clean_post_vars($_POST['admin_email1']);
	$admin_email2    = clean_post_vars($_POST['admin_email2']);
	$admin_error = array();

	// Check the entered email address and password
	if($admin_username == '' || $admin_password1 == '' || $admin_password2 == '' || $admin_email1 == '' || $admin_email2 == '') {
		$admin_error[] = "&nbsp;".$lang_check_settings."&nbsp;".$lang_admin_all_fields;
	}

	if($admin_password1 != $admin_password2 && $admin_password1 != '') {
		$admin_error[] = "&nbsp;".$lang_check_settings."&nbsp;".$lang_admin_match_psw;
	}

	// Test against the default username rules
	if($admin_username != '' && strlen($admin_username) < 3) {
		$admin_error[] = "&nbsp;".$lang_check_settings."&nbsp;".$lang_admin_user_short;
	}

	if($admin_username != '' && strlen($admin_username) > 20) {
		$admin_error[] = "&nbsp;".$lang_check_settings."&nbsp;".$lang_admin_user_long;
	}

	// Test against the default password rules
	if($admin_password1 != '' && strlen($admin_password1) < 6) {
		$admin_error[] = "&nbsp;".$lang_check_settings."&nbsp;".$lang_admin_pass_short;
	}

	if($admin_password1 != '' && strlen($admin_password1) > 30) {
		$admin_error[] = "&nbsp;".$lang_check_settings."&nbsp;".$lang_admin_pass_long;
	}

	if($admin_email1 != $admin_email2 && $admin_email1 != '') {
		$admin_error[] = "&nbsp;".$lang_check_settings."&nbsp;".$lang_admin_mail_match;
	}

	if($admin_email1 != '' && !check_email_address($admin_email1)) {
		$admin_error[] = "&nbsp;".$lang_check_settings."&nbsp;".$lang_admin_mail_wrong;
	}

	if(isset($_POST['send_email']) && $_POST['send_email'] == '1' && !sizeof($admin_error)){

		$email_status = send_email($admin_email1);

		if($email_status) {
			$admin_success[] = "&nbsp;".$lang_email_sent;
		}else{
			$admin_error[] = "&nbsp;".$lang_email_failed;
		}
	}

	if(!sizeof($admin_error)) {
		$admin_success[] = "&nbsp;".$lang_admin_test_pass;

		$admin_passed = true;

		$result['admin_details'] = implode('<br />', $admin_success);

	}else{

		$result['admin_details'] = implode('<br />', $admin_error);
	}
}else{
	$admin_language  = "";
	$admin_username  = "";
	$admin_password1 = "";
	$admin_password2 = "";
	$admin_email1    = "";
	$admin_email2    = "";
	$send_email      = "";
}
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////
////						VERIFY SETTINGS DETAILS
////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
$settings_passed = false;

if(isset($_POST['settings_check'])) {

	$pp_title        = clean_post_vars($_POST['pp_title']);
	$pp_sub_title    = clean_post_vars($_POST['pp_sub_title']);
	$pp_path         = clean_post_vars($_POST['pp_path']);
	$pp_timezone     = clean_post_vars($_POST['pp_timezone']);

	$setting_error = array();

	/**
	 * Check the fields for empty values
	 *
	 */
	if($pp_title == '' || $pp_path == '') {
		$setting_error[] = "&nbsp;".$lang_check_settings."&nbsp;".$lang_admin_all_fields;
	}

	/**
	 * Make sure the title and sub-title do not exceed 100 characters in length
	 *
	 */
	if($pp_title != '' && strlen($pp_title) > 100) {
		$setting_error[] = "&nbsp;".$lang_check_settings."&nbsp;".$lang_set_title_long;
	}

	if($pp_sub_title != '' && strlen($pp_sub_title) > 100) {
		$setting_error[] = "&nbsp;".$lang_check_settings."&nbsp;".$lang_set_title_long;
	}

	/**
	 * Check the URL for trailing /
	 *
	 */
	$end_of_string = substr($pp_path, -1);

	if($end_of_string != "/") {
		$setting_error[] = "&nbsp;".$lang_check_settings."&nbsp;".$lang_set_eos;
	}

	if(!sizeof($setting_error)) {

		$settings_passed = true;

		$result['setting_details'] = $lang_admin_test_pass;
	}else{
		$result['setting_details'] = implode('<br />', $setting_error);
	}
}else{

	$pp_title        = "Pixelpost";
	$pp_sub_title    = "Authentic photoblog flavour";
	$pp_path         = get_env('/');
	$pp_timezone     = "";
	$pp_timezone_dst = "";
}
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////
////						CREATE & SEND EMAIL
////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
function send_email($recipient) {

	global $data;
	global $lang_email_subject, $lang_email_message_0, $lang_email_message_1, $lang_email_message_2, $lang_install_admin, $lang_admin_user;
	global $lang_admin_pass1, $lang_install_db, $lang_db_host, $lang_db_name, $lang_db_user;
	global $lang_db_pass, $lang_db_prefix, $lang_email_footer, $lang_email_signature;

	$server_name = (!empty($_SERVER['SERVER_NAME'])) ? $_SERVER['SERVER_NAME'] : getenv('SERVER_NAME');
	$server_name = preg_replace('#^www\.#', '', strtolower($server_name));

	$admin_username = html_entity_decode(stripslashes($data['admin_username']));
	$admin_password = html_entity_decode(stripslashes(decode($data['admin_password1'])));
	$db_host        = stripslashes($data['db_host']);
	$db_name        = stripslashes($data['db_name']);
	$db_user        = stripslashes($data['db_user']);
	$db_pass        = stripslashes(decode($data['db_pass']));
	$db_prefix      = stripslashes($data['tbl_prefix']);

	$recipient   = strtolower($recipient);

	$subject     = $lang_email_subject;

	$body        = "$lang_email_message_0\r\n";
	$body       .= "$lang_email_message_1\r\n\r\n";
	$body       .= "$lang_email_message_2\r\n";
	$body       .= get_env('/',false)."\r\n\r\n";
	$body       .= $lang_install_admin.":\r\n";
	$body       .= "------------------------------------------------------------\r\n\r\n";
	$body       .= "$lang_admin_user $admin_username\r\n\r\n";
	$body       .= "$lang_admin_pass1 $admin_password\r\n\r\n\r\n";
	$body       .= $lang_install_db.":\r\n";
	$body       .= "------------------------------------------------------------\r\n\r\n";
	$body       .= "$lang_db_host $db_host\r\n\r\n";
	$body       .= "$lang_db_name $db_name\r\n\r\n";
	$body       .= "$lang_db_user $db_user\r\n\r\n";
	$body       .= "$lang_db_pass $db_pass\r\n\r\n";
	$body       .= "$lang_db_prefix $db_prefix\r\n\r\n\r\n";
	$body       .= "$lang_email_footer\r\n\r\n";
	$body       .= "--\r\n";
	$body       .= "$lang_email_signature\r\n";

	$headers  = "Content-type: text/plain; charset=UTF-8\r\n";
	$headers .= "Content-Transfer-Encoding: 8bit\r\n";
	$headers .= "From: Pixelpost Installer  <pixelpost@$server_name>\r\n";

	if(mail($recipient, $subject, $body, $headers)) {
		return true;
	}

	return false;
}
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////
////						CREATE ZEBRA TABLE
////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
function createTableStatus($ins_data) {

	$html = "";

	//var_dump($ins_data);

	$t = (count($ins_data));

	$i = 0;
	for ($row = 0; $row < $t; $row++) {

    	foreach($ins_data[$row] as $key => $value) {
    		if(!empty($value)){
    	 		$i++;
    			$className = ($i % 2) ? 'cellTwo' : 'cellOne';

    			$html .= "
				<tr>
					<td class='$className'>
						<span class='defaultBold'>$key</span>
					</td>
					<td class='$className'>
						$value
					</td>
				</tr>";
    		}
    	}
	}
	return $html;
}
function createStatusMsg($status, $cssClass) {
	$html = "";

	$html .= "<div class='$cssClass messageBox'><div>";

	foreach($status as $key => $msg){

		$html .= $addon_status['Addon Off'] = $msg;
	}

	$html .= "</div></div>";

	return $html;
}
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////
////						TIME ZONE SETTINGS
////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
function tz_select($default = '-5', $truncate = false, $chars = '80') {

	global $tz, $data;

	$tz_select = '';
	foreach ($tz as $offset => $zone) {

		if($truncate){

			$zone = $zone." ";
			$zone = substr($zone,0,$chars);
			$zone = substr($zone,0,strrpos($zone,' '));
			$zone = $zone;
		}

		if(is_numeric($offset)) {

			$selected   = ($offset == $data['pp_timezone']) ? ' selected="selected"' : '';
			$tz_select .= "<option value=\"$offset\"$selected>$zone</option>\n";
		}
	}

	return $tz_select;
}
function tz_offset($timezone, $offset) {

	$timezone = $timezone+$offset;

	return $timezone;
}
$tz = array('-12'	=> '[UTC - 12] Baker Island Time',
			'-11'	=> '[UTC - 11] Niue Time, Samoa Standard Time',
			'-10'	=> '[UTC - 10] Hawaii-Aleutian Standard Time, Cook Island Time',
			'-9.5'	=> '[UTC - 9:30] Marquesas Islands Time',
			'-9'	=> '[UTC - 9] Alaska Standard Time, Gambier Island Time',
			'-8'	=> '[UTC - 8] Pacific Standard Time',
			'-7'	=> '[UTC - 7] Mountain Standard Time',
			'-6'	=> '[UTC - 6] Central Standard Time',
			'-5'	=> '[UTC - 5] Eastern Standard Time',
			'-4'	=> '[UTC - 4] Atlantic Standard Time',
			'-3.5'	=> '[UTC - 3:30] Newfoundland Standard Time',
			'-3'	=> '[UTC - 3] Amazon Standard Time, Central Greenland Time',
			'-2'	=> '[UTC - 2] Fernando de Noronha Time, South Georgia &amp; the South Sandwich Islands Time',
			'-1'	=> '[UTC - 1] Azores Standard Time, Cape Verde Time, Eastern Greenland Time',
			'0'		=> '[UTC] Western European Time, Greenwich Mean Time',
			'1'		=> '[UTC + 1] Central European Time, West African Time',
			'2'		=> '[UTC + 2] Eastern European Time, Central African Time',
			'3'		=> '[UTC + 3] Moscow Standard Time, Eastern African Time',
			'3.5'	=> '[UTC + 3:30] Iran Standard Time',
			'4'		=> '[UTC + 4] Gulf Standard Time, Samara Standard Time',
			'4.5'	=> '[UTC + 4:30] Afghanistan Time',
			'5'		=> '[UTC + 5] Pakistan Standard Time, Yekaterinburg Standard Time',
			'5.5'	=> '[UTC + 5:30] Indian Standard Time, Sri Lanka Time',
			'5.75'	=> '[UTC + 5:45] Nepal Time',
			'6'		=> '[UTC + 6] Bangladesh Time, Bhutan Time, Novosibirsk Standard Time',
			'6.5'	=> '[UTC + 6:30] Cocos Islands Time, Myanmar Time',
			'7'		=> '[UTC + 7] Indochina Time, Krasnoyarsk Standard Time',
			'8'		=> '[UTC + 8] Chinese Standard Time, Australian Western Standard Time, Irkutsk Standard Time',
			'8.75'	=> '[UTC + 8:45] Southeastern Western Australia Standard Time',
			'9'		=> '[UTC + 9] Japan Standard Time, Korea Standard Time, Chita Standard Time',
			'9.5'	=> '[UTC + 9:30] Australian Central Standard Time',
			'10'	=> '[UTC + 10] Australian Eastern Standard Time, Vladivostok Standard Time',
			'10.5'	=> '[UTC + 10:30] Lord Howe Standard Time',
			'11'	=> '[UTC + 11] Solomon Island Time, Magadan Standard Time',
			'11.5'	=> '[UTC + 11:30] Norfolk Island Time',
			'12'	=> '[UTC + 12] New Zealand Time, Fiji Time, Kamchatka Standard Time',
			'12.75'	=> '[UTC + 12:45] Chatham Islands Time',
			'13'	=> '[UTC + 13] Tonga Time, Phoenix Islands Time',
			'14'	=> '[UTC + 14] Line Island Time'
		   );
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////
////						STORE ADMINISTRATOR SETTINGS
////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
function store_vars($prefix) {

	global $data;

	/**
	 * The Username and password were already stored in create_tables.php
	 *
	 */

	$admin_email    = addslashes($data['admin_email1']);

	$site_url       = addslashes($data['pp_path']);

	$admin_lang     = addslashes($data['admin_language']);

	$site_title     = addslashes($data['pp_title']);

	$sub_title      = addslashes($data['pp_sub_title']);

	if($data['pp_timezone_dst'] == "1") {

		$time_zone  = addslashes(tz_offset($data['pp_timezone'], '1'));
	}else{

		$time_zone  = addslashes($data['pp_timezone']);
	}

	$feed_copyright = "Copyright ".date('Y')." $site_url, All Rights Reserved";

	$query = mysql_query("UPDATE {$prefix}config SET
	`email`   = '$admin_email',
	`siteurl` = '$site_url',
	`admin_langfile` = '$admin_lang',
	`sitetitle`= '$site_title',
	`subtitle` = '$sub_title',
	`feed_title`= '$site_title',
	`feed_description` = '$sub_title',
	`feed_copyright` = '$feed_copyright',
	`timezone` = '$time_zone'
	") or die("Error: ". mysql_error());

}
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////
////						ACTIVATE / DEACTIVE ADDONS
////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
function deactivateAddons($prefix) {

	$result = mysql_query("SELECT count(`status`) as `total` FROM `{$prefix}addons` WHERE `status` = 'on'");

	while($row = mysql_fetch_assoc($result)) {

		if($row['total'] > 0) {

    		// create a new field to hold previous settings
    		mysql_query("ALTER TABLE `{$prefix}addons` ADD `status_backup` VARCHAR(3) NOT NULL DEFAULT 'on'");

    		// copy previous settings
    		mysql_query("UPDATE `{$prefix}addons` SET `status_backup` = `status`");

    		// turn all addons off
    		mysql_query("UPDATE `{$prefix}addons` SET `status` = 'off'");
    	}
	}
}
function activatePxlpstAddons($prefix) {

	global $lang_dsb_addon_00, $lang_dsb_addon_01, $lang_dsb_addon_02, $lang_dsb_addon_02_1;
	global $lang_dsb_addon_02_2, $lang_dsb_addon_03, $lang_dsb_addon_04, $lang_dsb_addon_04_1;
	global $lang_dsb_addon_00_01;

	// list of default PP addons:
	$default_addons = array('_akismet/admin_akismet_comment',
							'_akismet/front_akismet_comment',
							'_defensio/admin_defensio',
							'_defensio/front_defensio',
							'admin_12CropImage',
							'admin_ping',
							'admin_update_exif',
							'advanced_stat',
							'calendar',
							'copy_folder',
							'current_datetime',
							'paged_archive');

	foreach($default_addons as $addon_name) {
    	mysql_query("UPDATE `{$prefix}addons` SET `status` = `status_backup`, `status_backup` = 'res' WHERE `addon_name` = '{$addon_name}'");
    }

	// we can get a list of disabled third party addons here:
	$result   = mysql_query("SELECT `addon_name` FROM `{$prefix}addons` where `status_backup` = 'on'");
	$num_rows = @mysql_num_rows($result);

	// cleanup temp field
	mysql_query("ALTER TABLE `{$prefix}addons` DROP `status_backup`");

	if($num_rows > 0){
		$create_status['tpa_disabled_01'] = "$lang_dsb_addon_01<br /><br />";
		$create_status['tpa_disabled_02'] = "$lang_dsb_addon_02<br />$lang_dsb_addon_02_1<br />$lang_dsb_addon_02_2<p />";
		$create_status['tpa_disabled_03'] = "$lang_dsb_addon_03<ul id='disabled_addons'>";
		$c = 0;
		while($row = mysql_fetch_array($result)) {

			$addon = $row['addon_name'];
			$addon = ereg_replace("_"," ",$addon);
			$addon = ucwords(strtolower($addon));

			$create_status['tpa_disabled_0_'.$c.''] = "<li>$addon</li>";
			$c++;
		}
		$create_status['tpa_disabled_04'] = "</ul>$lang_dsb_addon_04<br />$lang_dsb_addon_04_1";
		$cssClass = "statusmsg";

		// Remove lines below if statment below is uncommented
		$status = createStatusMsg($create_status, 'statusmsg');

		echo $status;
		// Remove lines above if statement bellow is uncommented
	}
	/* I decided not to display a message if no addons were altered.
	else{
		$create_status['tpa_disabled_00_01'] = "$lang_dsb_addon_00_01<br /><br />";
		$create_status['tpa_disabled_00']    = "$lang_dsb_addon_00";
		$cssClass = "success";
	}

	$status = createStatusMsg($create_status, 'statusmsg');

	echo $status;
	*/
}
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////
////						MISCELLANEOUS FUNCTIONS
////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
function Show_username_password() {

	global $data, $show_psw_msg, $lang_admin_user, $lang_admin_pass1;

	/**
	 * Only show if the user decided not to email themselves their credentials
	 *
	 */
	if(isset($_POST['send_email']) && $_POST['send_email'] == '0'){

		$admin_user     = html_entity_decode(stripslashes($data['admin_username']));
		$admin_password = html_entity_decode(stripslashes(decode($data['admin_password1'])));

		$create_status['show_psw_msg'] = $show_psw_msg."<p />";
		$create_status['username']     = $lang_admin_user."&nbsp;".$admin_user."<br />";
		$create_status['password']     = $lang_admin_pass1."&nbsp;&nbsp;".$admin_password;

		$status = createStatusMsg($create_status, 'success');

		echo $status;
	}
}
/**
 * Converts the password from the 1.3 base64encoded to MD5 hash
 *
 * Do not do this unless we are upgrading
 *
 */
function ConvertPassword($prefix) {

	global $lang_convert_psw, $lang_convert_psw_suc, $lang_convert_psw_err;

	$result = mysql_query("SELECT `password` FROM `{$prefix}config` LIMIT 1")or die("MySQL Error: ". mysql_error());

	if($row = mysql_fetch_array($result)) {

		$adm_pass = base64_decode($row['password']);

		mysql_query("UPDATE `{$prefix}config` SET `password` = MD5('$adm_pass') LIMIT 1")or die("MySQL Error: ". mysql_error());

		$create_status['convert_psw_success'] = "$lang_convert_psw<br />$lang_convert_psw_suc";
		$cssClass = "success";

	}else{

		$create_status['convert_psw_error'] = "$lang_convert_psw<br />$lang_convert_psw_err";
		$cssClass = "error";
	}
	$status = createStatusMsg($create_status, $cssClass);
	echo $status;
}
/**
 * Returns environment path
 *
 */
function get_env($append, $admin = true){

	$server_name = (!empty($_SERVER['SERVER_NAME'])) ? $_SERVER['SERVER_NAME'] : getenv('SERVER_NAME');
	$server_port = (!empty($_SERVER['SERVER_PORT'])) ? (int) $_SERVER['SERVER_PORT'] : (int) getenv('SERVER_PORT');
	$secure      = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 1 : 0;

	$script_name = (!empty($_SERVER['PHP_SELF'])) ? $_SERVER['PHP_SELF'] : getenv('PHP_SELF');
	if(!$script_name) {
		$script_name = (!empty($_SERVER['REQUEST_URI'])) ? $_SERVER['REQUEST_URI'] : getenv('REQUEST_URI');
	}

	/**
	 * Replace any number of consecutive backslashes and/or slashes with a single slash
	 * (could happen on some proxy setups and/or Windows servers)
	 *
	 */
	$script_path = trim(dirname($script_name)).$append;
	if($admin){ $script_path = str_replace("/admin", "", $script_path); }
	$script_path = preg_replace('#[\\\\/]{2,}#', '/', $script_path);

	$url = (($secure) ? 'https://' : 'http://') . $server_name;

	if($server_port && (($secure && $server_port <> 443) || (!$secure && $server_port <> 80))) {

		$url .= ':' . $server_port;
	}

	$url .= $script_path;

	return $url;

}
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////
////						WRITE CONFIG FILE
////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
function create_config_file($config_dir,$config_path) {

	global $data;
	global $lang_passed,$lang_not_found,$lang_fail,$lang_found;
	global $lang_writable_no, $lang_writable;
	global $lang_conn_success,$lang_conn_fail;

	$db_pass = decode($data['db_pass']);

	$written = false;

	/**
	 * Time to convert the data provided into a config file
	 *
	 */
	$config_data  = "<?php\n\n";

	$config_data .= "/*\n\n";

	$config_data .= "Pixelpost version ".PP_VERSION."\n\n";

	$config_data .= "Pixelpost www: http://www.pixelpost.org/\n\n";

	$config_data .= "Version ".PP_VERSION.":\n";
	$config_data .= "Development Team:\n";
	$config_data .= "Ramin Mehran, Will Duncan, Joseph Spurling,\n";
	$config_data .= "Piotr \"GeoS\" Galas, Dennis Mooibroek, Karin Uhlig, Jay Williams, David Kozikowski\n";
	$config_data .= "Version 1.1 to Version 1.3: Linus <http://www.shapestyle.se>\n\n";

	$config_data .= "Contact: thecrew (at) pixelpost (dot) org\n";
	$config_data .= "Copyright ".date('Y')." Pixelpost.org <http://www.pixelpost.org>\n\n\n";


	$config_data .= "License: http://www.gnu.org/copyleft/gpl.html\n\n";

	$config_data .= "This program is free software; you can redistribute it and/or\n";
	$config_data .= "modify it under the terms of the GNU General Public License\n";
	$config_data .= "as published by the Free Software Foundation; either version 2\n";
	$config_data .= "of the License, or (at your option) any later version.\n\n";

	$config_data .= "This program is distributed in the hope that it will be useful,\n";
	$config_data .= "but WITHOUT ANY WARRANTY; without even the implied warranty of\n";
	$config_data .= "MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the\n";
	$config_data .= "GNU General Public License for more details.\n\n";

	$config_data .= "You should have received a copy of the GNU General Public License\n";
	$config_data .= "along with this program; if not, write to the Free Software\n";
	$config_data .= "Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.\n\n";

	$config_data .= "*/\n\n";

	$config_data .= "// database variables - this is info you've received from you hosting service\n";
	$config_data .= "// those are needed for the script to connect and use MySQL\n\n";

	$config_data .= "\$pixelpost_db_host      = \"{$data['db_host']}\";  // database host, often \"localhost\"\n";
	$config_data .= "\$pixelpost_db_user      = \"{$data['db_user']}\";  // database user\n";
	$config_data .= "\$pixelpost_db_pass      = \"{$db_pass}\";  // database user password\n";
	$config_data .= "\$pixelpost_db_pixelpost = \"{$data['db_name']}\";  // database\n\n";

	$config_data .= "\$pixelpost_db_prefix = \"{$data['tbl_prefix']}\";  // table prefix, leave as is unless you want to install multiple blogs on the same database\n\n";

	$config_data .= '?' . '>';

	/**
	 * Attempt to write out the config file directly.
	 *
	 */
	//if((file_exists($config_path) && is_writable($config_path)) || is_writable($config_dir)) {

		$written = true;

		if(!is_writable($config_dir)) {

			if(!@chmod($config_dir, 0777)){

				$result['writable']		= $lang_writable_no;
				$result['error']		= $result['writable'];
				$result['css_writable']	= "redHighlightBold";
			}else{
				$result['writable']		= $lang_writable;
				$result['css_writable']	= "grnHighlightBold";
			}

		}else{
			$result['writable']		= $lang_writable;
			$result['css_writable']	= "grnHighlightBold";
		}

		if(!($fp = @fopen($config_path, 'w'))) {

			$result['fopen']     = $lang_fail;
			$result['error']     = $result['fopen'];
			$result['css_fopen'] = "redHighlightBold";

			$written = false;

		}else{
			$result['fopen']     = $lang_passed;
			$result['css_fopen'] = "grnHighlightBold";
		}

		if(!(@fwrite($fp, $config_data))) {

			$result['fwrite']     = $lang_fail;
			$result['error']      = $result['fwrite'];
			$result['css_fwrite'] = "redHighlightBold";

			$written = false;

		}else{
			$result['fwrite']     = $lang_passed;
			$result['css_fwrite'] = "grnHighlightBold";
		}

		@fclose($fp);

		if($written){

			@chmod($config_path, 0644);

			$result['chmod']     = $lang_passed;
			$result['css_chmod'] = "grnHighlightBold";

		}else{
			$result['chmod']     = $lang_fail;
			$result['error']     = $result['chmod'];
			$result['css_chmod'] = "redHighlightBold";
		}

		if(file_exists($config_path)){
			$written = true;

			$result['exists'] = $lang_found;
			$result['css_exists'] = "grnHighlightBold";

		}else{

			$result['exists']     = $lang_not_found;
			$result['error']      = $result['exists'];
			$result['css_exists'] = "redHighlightBold";
		}

		$connect_test = false;

		if($written){
			require($config_path);

			$connect_test = connect_check($error, $pixelpost_db_host, $pixelpost_db_pixelpost, $pixelpost_db_user, $pixelpost_db_pass, $pixelpost_db_prefix);
		}

		if($connect_test){

			$result['connect']     = $lang_conn_success;
			$result['verifed']     = true;
			$result['css_connect'] = "grnHighlightBold";

		}else{

			$result['connect']     = $lang_conn_fail;
			$result['verifed']     = false;
			$result['error']       = $result['connect'];
			$result['css_connect'] = "redHighlightBold";

			/**
			 * Delete the recently created config file.
			 * Even though it was successfully created, we were unable to use it to connect so something went wrong.
			 *
			 */
			if(file_exists($config_path)){
				@unlink($config_path);
			}
		}

		@chmod($config_dir, 0755);
	//}

	if(isset($_POST['dlconfig'])) {

		return $config_data;
	}

	return $result;
}
?>