<?php

// SVN file version:
// $Id: create_tables.php 514 2008-01-16 19:24:38Z schonhose $

if(!defined('PP_INSTALL')) { die(header("Location: ../index.php")); }

$prefix = $pixelpost_db_prefix;

function Create13Tables($prefix) {

	global $lang_created, $lang_create_config, $lang_create_cat, $lang_create_pixelpost;
	global $lang_create_comments, $lang_create_visitors;

	// Config table
	mysql_query("CREATE TABLE IF NOT EXISTS `{$prefix}config` (
				 `admin` VARCHAR(20) NOT NULL DEFAULT '',
				 `password` VARCHAR(90) NOT NULL DEFAULT '',
				 `email` VARCHAR(90) NOT NULL DEFAULT '',
				 `commentemail` VARCHAR(3) NOT NULL DEFAULT '',
				 `template` VARCHAR(150) NOT NULL DEFAULT '',
				 `imagepath` VARCHAR(150) NOT NULL DEFAULT '',
				 `siteurl` VARCHAR(100) NOT NULL DEFAULT '',
				 `sitetitle` VARCHAR(100) NOT NULL DEFAULT '',
				 `langfile` VARCHAR(100) NOT NULL DEFAULT '',
				 `calendar` VARCHAR(30) NOT NULL DEFAULT '',
				 `crop` VARCHAR(3) NOT NULL DEFAULT '',
				 `thumbwidth` INT(11) NOT NULL,
				 `thumbheight` INT(11) NOT NULL,
				 `thumbnumber` INT(11) NOT NULL,
				 `compression` INT(11) NOT NULL,
				 `dateformat` VARCHAR(30) NOT NULL DEFAULT '')")or die("MySQL Error: ". mysql_error());
	
	$create_status[$lang_create_config] = $lang_created;

	// Categories Table
	mysql_query("CREATE TABLE IF NOT EXISTS `{$prefix}categories` (
				 `id` INT(11) NOT NULL auto_increment,
				 `name` VARCHAR(100) NOT NULL DEFAULT '',
				 KEY id (`id`))")or die("MySQL Error: ". mysql_error());

	mysql_query("INSERT INTO `{$prefix}categories` VALUES (0, 'default')")or die("MySQL Error: ". mysql_error());
	
	$create_status[$lang_create_cat] = $lang_created;

	// Pixelpost table
	mysql_query("CREATE TABLE IF NOT EXISTS `{$prefix}pixelpost` (
				 `id` INT(11) NOT NULL auto_increment,
				 `datetime` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
				 `headline` VARCHAR(150) NOT NULL DEFAULT '',
				 `body` TEXT NOT NULL,
				 `image` TEXT NOT NULL,
				 `category` VARCHAR(150) NOT NULL DEFAULT '',
				 KEY id (`id`))")or die("MySQL Error: ". mysql_error());
	
	$create_status[$lang_create_pixelpost] = $lang_created;

	// Comments table
	mysql_query("CREATE TABLE IF NOT EXISTS {$prefix}comments (
				 `id` INT(11) NOT NULL auto_increment,
				 `parent_id` INT(11) NOT NULL DEFAULT '0',
				 `datetime` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
				 `ip` VARCHAR(20) NOT NULL DEFAULT '',
				 `message` TEXT NOT NULL,
				 `name` VARCHAR(20) NOT NULL DEFAULT '',
				 `url` VARCHAR(40) NOT NULL DEFAULT '',
				 KEY id (`id`))")or die("MySQL Error: ". mysql_error());
	
	$create_status[$lang_create_comments] = $lang_created;

	// Visitors table
	mysql_query("CREATE TABLE IF NOT EXISTS {$prefix}visitors (
				 `id` INT(11) NOT NULL auto_increment,
				 `datetime` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
				 `host` VARCHAR(100) NOT NULL DEFAULT '',
				 `referer` VARCHAR(255) NOT NULL DEFAULT '',
				 `ua` VARCHAR(255) NOT NULL DEFAULT '',
				 `ip` VARCHAR(255) NOT NULL DEFAULT '',
				 `ruri` VARCHAR(150) NOT NULL DEFAULT '',
				 PRIMARY KEY (`id`))")or die("MySQL Error: ". mysql_error());
	
	$create_status[$lang_create_visitors] = $lang_created;
	
	return $create_status;
}

/**
 * This is v1.3 of the config except the password is now MD5
 *
 */
function Set_Configuration($prefix) {	

	global $data, $lang_populated, $lang_create_populate;
	
	$site_url    = get_env('/');
	
	$images_path = "../images/";
	
	$admin     = addslashes($data['admin_username']);
	$password  = addslashes(html_entity_decode(decode($data['admin_password1'])));
	
	$query = mysql_query("INSERT INTO `{$prefix}config`
	
	(`admin` , `password`       ,  `email`  , `commentemail`  , `template`  ,  `imagepath`     ,   `siteurl`   ,  `sitetitle`  ,  `langfile`  ,   `calendar`    ,  `crop`  ,  `thumbwidth`  ,  `thumbheight`  ,  `thumbnumber`  ,  `compression`  ,    `dateformat`   )VALUES
	('$admin', MD5('$password') ,    ''     ,      'no'       , 'simple'    , '$images_path'   ,  '$site_url'  ,  'Pixelpost'  ,   'english'  ,  'No Calendar'  ,  'yes'   ,     '100'      ,      '75'       ,       '5'       ,      '75'       ,    'Y-m-d H:i:s'  )
	
	")or die("MySQL Error: ". mysql_error());
	
	$create_status[$lang_create_populate] = $lang_populated;
	
	return $create_status;
}

/**
 * Upgrade the database from 1.3 schema to the 1.4 schema
 *
 */
function UpgradeTo14($prefix) {

	global $lang_created, $lang_create_version, $lang_create_catassoc;

	// Version 1.4
	// Make future upgrade scripts easier by adding a version table
	mysql_query("CREATE TABLE IF NOT EXISTS `{$prefix}version` (
				 `id` INT(10) unsigned NOT NULL auto_increment,
				 `upgrade_date` TIMESTAMP(14) NOT NULL,
				 `version` FLOAT NOT NULL DEFAULT '0',
				 PRIMARY KEY  (`id`),
				 KEY `version` (`version`))")or die("MySQL Error: ". mysql_error());

	mysql_query("INSERT INTO `{$prefix}version` (`version`) VALUES ('1.4')")or die("MySQL Error: ". mysql_error());
	
	$create_status[$lang_create_version] = $lang_created;

	// Multiple Categories support
	mysql_query("CREATE TABLE IF NOT EXISTS `{$prefix}catassoc` (
				 `id` INT(11) NOT NULL auto_increment,
				 `cat_id` INT(11) NOT NULL DEFAULT '0',
				 `image_id` INT(11) NOT NULL DEFAULT '0',
				 PRIMARY KEY  (id),
				 KEY cat_id (`cat_id`),
				 KEY image_id (`image_id`))")or die("MySQL Error: ". mysql_error());
	
	$create_status[$lang_create_catassoc] = $lang_created;


	$tz = date("Z")/3600; // set the default timezone value equal to the server timezone
	
	// Timezone support added
	mysql_query("ALTER TABLE `{$prefix}config` ADD `timezone` FLOAT DEFAULT '".$tz."' NOT NULL")or die("MySQL Error: ". mysql_error());
	
	// Custom category added
	mysql_query("ALTER TABLE `{$prefix}config` ADD `catgluestart` VARCHAR(5) DEFAULT '[' NOT NULL")or die("MySQL Error: ". mysql_error());
	
	// Custom category added
	mysql_query("ALTER TABLE `{$prefix}config` ADD `catglueend` VARCHAR(5) DEFAULT ']' NOT NULL")or die("MySQL Error: ". mysql_error());
	
	// HTML comment email notification added
	mysql_query("ALTER TABLE `{$prefix}config` ADD `htmlemailnote` CHAR(3) DEFAULT 'yes'")or die("MySQL Error: ". mysql_error());
	
	// Email VARCHAR extended
	mysql_query("ALTER TABLE `{$prefix}comments` ADD `email` VARCHAR(100)")or die("MySQL Error: ". mysql_error());
	
	// Name VARCHAR extended
	mysql_query("ALTER TABLE `{$prefix}comments` MODIFY  `name` VARCHAR(30)")or die("MySQL Error: ". mysql_error());
	
	// URL VARCHAR extended
	mysql_query("ALTER TABLE `{$prefix}comments` MODIFY  `url` VARCHAR(70)")or die("MySQL Error: ". mysql_error());
	
	// ID table added
	mysql_query("ALTER TABLE `{$prefix}config` ADD `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST")or die("MySQL Error: ". mysql_error());
	
	// Add index
	mysql_query("ALTER TABLE `{$prefix}categories` DROP INDEX `id`, ADD PRIMARY KEY (`id`)");
	
	// Add index
	mysql_query("ALTER TABLE `{$prefix}comments` DROP INDEX `id`, ADD PRIMARY KEY (`id`), ADD INDEX (`parent_id`)");
	
	// Add index
	mysql_query("ALTER TABLE `{$prefix}pixelpost` DROP INDEX `id`, ADD PRIMARY KEY (`id`), ADD INDEX (`datetime`)");
	
	// Add index
	mysql_query("ALTER TABLE `{$prefix}visitors` ADD INDEX (`datetime`), ADD INDEX (`referer`), ADD INDEX (`ip`)");
	
	// Move any existing categories into the new category association table
	$result    = mysql_query("SELECT `id`, `category` FROM {$prefix}pixelpost")or die("MySQL Error: ". mysql_error());
	while($row = mysql_fetch_array($result)){
	
		mysql_query("INSERT INTO `{$prefix}catassoc` VALUES (0, '{$row[1]}', '{$row[0]}')")or die("MySQL Error: ". mysql_error());
	}
	
	return $create_status;
}

/**
 * Upgrade the version table from the 1.4 to the 1.41
 *
 */
function UpgradeTo141($prefix) {

	global $lang_updated, $lang_create_update_to;
	
	mysql_query("INSERT INTO `{$prefix}version` (`version`) VALUES ('1.41')")or die("MySQL Error: ". mysql_error());
	
	$create_status[$lang_create_update_to." 1.41"] = $lang_updated;
	
	return $create_status;
}

/**
 * Upgrade the version table to 1.499 (means 1.5alpha)
 *
 */
function UpgradeTo1501($prefix) {

	global $lang_created, $lang_create_addons;
	
	if(!is_field_exists('moderate_comments','config')) {
	
		// Add moterate_comments
		mysql_query("ALTER TABLE `{$prefix}config` ADD `moderate_comments` VARCHAR(3) DEFAULT 'no' NOT NULL ")or die("MySQL Error: ". mysql_error());

		// Add publish
		mysql_query("ALTER TABLE `{$prefix}comments` ADD `publish` VARCHAR(3) DEFAULT 'yes' NOT NULL ")or die("MySQL Error: ". mysql_error());
	}

	// Create addons table
	mysql_query("CREATE TABLE `{$prefix}addons` (
				 `id` INT(11) NOT NULL auto_increment,
				 `addon_name` VARCHAR(66) NOT NULL DEFAULT '',
				 `status` VARCHAR(3) NOT NULL DEFAULT 'on',
				 `type` VARCHAR(15) NOT NULL DEFAULT 'normal',
				 PRIMARY KEY (`id`))")or die("MySQL Error: ". mysql_error());
				 
	$create_status[$lang_create_addons] = $lang_created;

	// Populate the addons table
	refresh_addons_table('../addons');
	
	// Update version
	mysql_query("INSERT INTO `{$prefix}version` (`version`) VALUES ('1.49931')")or die("MySQL Error: ". mysql_error());
	
	return $create_status;
}

function UpgradeTo15011($prefix) {

	global $lang_updated, $lang_create_update_to;

	$create_status[null] = null;

	if(is_field_exists ('clean_url','config')) {
	
		// del clean_url field from config table
		mysql_query("ALTER TABLE `{$prefix}config` DROP `clean_url`")or die("MySQL Error: ". mysql_error());

		// del clean_url field from pixelpost table
		mysql_query("ALTER TABLE `{$prefix}pixelpost` DROP `clean_url`")or die("MySQL Error: ". mysql_error());

		// update version
		mysql_query("INSERT INTO `{$prefix}version` (`version`) VALUES ('1.4995')")or die("MySQL Error: ". mysql_error());
		
		$create_status[$lang_create_update_to." 1.5 &alpha;"] = $lang_updated;
	}
	
	return $create_status;
}

function UpgradeTo15012($prefix) {

	global $lang_updated, $lang_create_update_to;

	$create_status[null] = null;

	if(!is_field_exists('timestamp','config')) {
	
		// add timestamp
		mysql_query("ALTER TABLE `{$prefix}config` ADD `timestamp` VARCHAR(4) DEFAULT 'yes' NOT NULL ")or die("MySQL Error: ". mysql_error());

		// update version
		mysql_query("INSERT INTO `{$prefix}version` (`version`) VALUES ('1.4995')")or die("MySQL Error: ". mysql_error());
		
		$create_status[$lang_create_update_to." 1.5 &alpha;"] = $lang_updated;
	}
	
	return $create_status;
}

/**
 * Upgrade the version table to 1.5beta
 *
 */
function UpgradeTo15beta($prefix,$newversion) {
	
	global $lang_created, $lang_updated, $lang_create_update_to, $lang_create_addons;

	$create_status[null] = null;

	if(!is_field_exists('moderate_comments','config')) {
	
		// add moterate_comments field to config table
		mysql_query("ALTER TABLE `{$prefix}config` ADD `moderate_comments` VARCHAR(3) DEFAULT 'no' NOT NULL ")or die("MySQL Error: ". mysql_error());

		// add publish field to comments table
		mysql_query("ALTER TABLE {$prefix}comments ADD `publish` VARCHAR(3) DEFAULT 'yes' NOT NULL")or die("MySQL Error: ". mysql_error());
	}

	// Create addons table if necessary
	if(!is_table_created('addons')) {
	
		mysql_query("CREATE TABLE `{$prefix}addons` (
					 `id` INT(11) NOT NULL auto_increment,
					 `addon_name` VARCHAR(66) NOT NULL DEFAULT '',		
					 `status` VARCHAR(3) NOT NULL DEFAULT 'on',		
					 `type` VARCHAR(15) NOT NULL DEFAULT 'normal',
					 PRIMARY KEY (`id`))")or die("MySQL Error: ". mysql_error());
		
		refresh_addons_table('../addons/');
		
		$create_status[$lang_create_addons] = $lang_created;
		
	}

	if(!is_field_exists('timestamp','config')) {
	
		// Timestamp
		mysql_query("ALTER TABLE `{$prefix}config` ADD `timestamp` VARCHAR(4) DEFAULT 'yes' NOT NULL")or die("MySQL Error: ". mysql_error());
	}
	
	if(!is_field_exists('visitorbooking','config')) {
	
		// Visitor booking ON/OFF switch
		mysql_query("ALTER TABLE `{$prefix}config` ADD `visitorbooking` VARCHAR(4) DEFAULT 'yes' NOT NULL")or die("MySQL Error: ". mysql_error());

		// Update version
		mysql_query("INSERT INTO `{$prefix}version` (`version`) VALUES (".$newversion.")")or die("MySQL Error: ". mysql_error());
		
		$create_status[$lang_create_update_to."&nbsp;".$newversion." &beta;"] = $lang_updated;
	}
	
	return $create_status;
}

function UpgradeTo15final($prefix,$newversion) {

	global $lang_updated, $lang_create_update_to;
	
	$create_status[null] = null;
	
	if(is_field_exists('clean_url','config')) {
	
		// Delete clean_url field from config table
		mysql_query("ALTER TABLE `{$prefix}config` DROP `clean_url`")or die("MySQL Error: ". mysql_error());

		// Delete clean_url field from pixelpost table
		mysql_query("ALTER TABLE `{$prefix}pixelpost` DROP `clean_url`")or die("MySQL Error: ". mysql_error());

		// Update version
		mysql_query("INSERT INTO `{$prefix}version` (`version`) VALUES ('1.5')")or die("MySQL Error: ". mysql_error());
		
		$create_status[$lang_create_update_to."&nbsp;".$newversion." final"] = $lang_updated;
	}
	
	return $create_status;
}

function UpgradeTo16beta($prefix, $newversion) {
	
	global $lang_updated, $lang_create_update_to;

	mysql_query("CREATE TABLE `{$prefix}tags` (
				 `img_id` INT NOT NULL ,
				 `tag` TINYTEXT NOT NULL,
				 `alt_tag` TINYTEXT NOT NULL)")or die("MySQL Error: ". mysql_error());

	// Add alternative language
	mysql_query("ALTER TABLE `{$prefix}config` ADD `altlangfile` VARCHAR(100) DEFAULT 'Off' NOT NULL")or die("MySQL Error: ". mysql_error());
	
	mysql_query("ALTER TABLE `{$prefix}pixelpost` ADD `alt_headline` VARCHAR(150) DEFAULT '' NOT NULL,ADD `alt_body` TEXT")or die("MySQL Error: ". mysql_error());
	
	mysql_query("ALTER TABLE {$prefix}categories ADD `alt_name` VARCHAR(100) DEFAULT 'DEFAULT' NOT NULL")or die("MySQL Error: ". mysql_error());

	// Add markdown
	mysql_query("ALTER TABLE `{$prefix}config` ADD `markdown` VARCHAR(1) DEFAULT 'f' NOT NULL")or die("MySQL Error: ". mysql_error());

	// Add creation of primary key for tags table
	mysql_query("ALTER TABLE {$prefix}tags ADD PRIMARY KEY (`img_id` , `tag` (128), `alt_tag` (128)) ")or die("MySQL Error: ". mysql_error());

	// Drop moderate comments
	mysql_query("ALTER TABLE `{$prefix}config` DROP `moderate_comments`")or die("MySQL Error: ". mysql_error());

	// Add global comment settings
	mysql_query("ALTER TABLE `{$prefix}config` ADD `global_comments` ENUM('A', 'M', 'F') NOT NULL DEFAULT 'A'")or die("MySQL Error: ". mysql_error());
	
	// Add picture based comment disable
	mysql_query("ALTER TABLE `{$prefix}pixelpost` ADD `comments` ENUM('A', 'M', 'F') NOT NULL DEFAULT 'A'")or die("MySQL Error: ". mysql_error());

	// Drop markdown field
	mysql_query("ALTER TABLE `{$prefix}config` DROP `markdown`;")or die("MySQL Error: ". mysql_error());

	// Add markdown field
	mysql_query("ALTER TABLE `{$prefix}config` ADD `markdown` ENUM('F', 'T') NOT NULL DEFAULT 'F'")or die("MySQL Error: ". mysql_error());

	// Add exif
	mysql_query("ALTER TABLE `{$prefix}config` ADD `exif` ENUM('F', 'T') NOT NULL DEFAULT 'T'")or die("MySQL Error: ". mysql_error());

	// Add picture based exif
	mysql_query("ALTER TABLE `{$prefix}pixelpost` ADD `exif_info` TEXT NULL DEFAULT NULL")or die("MySQL Error: ". mysql_error());

	// Add token field
	mysql_query("ALTER TABLE `{$prefix}config` ADD `token` ENUM('F', 'T') NOT NULL DEFAULT 'F'")or die("MySQL Error: ". mysql_error());

	// Add token time
	mysql_query("ALTER TABLE `{$prefix}config` ADD `token_time` VARCHAR(2) NOT NULL DEFAULT '5'")or die("MySQL Error: ". mysql_error());

	// Add comment dsbl
	mysql_query("ALTER TABLE `{$prefix}config` ADD `comment_dsbl` ENUM('F', 'T') NOT NULL DEFAULT 'F'")or die("MySQL Error: ". mysql_error());

	// Add comment time between
	mysql_query("ALTER TABLE `{$prefix}config` ADD `comment_timebetween` VARCHAR(3) NOT NULL DEFAULT '30'")or die("MySQL Error: ". mysql_error());

	// Add rss type
	mysql_query("ALTER TABLE `{$prefix}config` ADD `rsstype` ENUM('F', 'T', 'O' ,'N') NOT NULL DEFAULT 'T'")or die("MySQL Error: ". mysql_error());

	// Add feed items
	mysql_query("ALTER TABLE `{$prefix}config` ADD `feeditems` VARCHAR(3) NOT NULL DEFAULT '10'")or die("MySQL Error: ". mysql_error());

	// no_uri_comments
	mysql_query("ALTER TABLE `{$prefix}config` ADD `max_uri_comments` VARCHAR(3) NOT NULL DEFAULT '5'")or die("MySQL Error: ". mysql_error());

	// Update version
	mysql_query("INSERT INTO `{$prefix}version` (`version`) VALUES ('".$newversion."')")or die("MySQL Error: ". mysql_error());

	$create_status[$lang_create_update_to."&nbsp;".$newversion." &beta;"] = $lang_updated;
	
	return $create_status;
}

function UpgradeTo16final($prefix, $newversion) {

	global $lang_updated, $lang_create_update_to;
	
	// Drop rss type
	mysql_query("ALTER TABLE `{$prefix}config` DROP `rsstype`");
	
	// Add rsst ype field
	mysql_query("ALTER TABLE `{$prefix}config` ADD `rsstype` ENUM('F', 'T', 'O' ,'N') NOT NULL DEFAULT 'T'")or die("MySQL Error: ". mysql_error());

	// Update version
	mysql_query("INSERT INTO `{$prefix}version` (version) VALUES ($newversion)")or die("MySQL Error: ". mysql_error());

	$create_status[$lang_create_update_to."&nbsp;".$newversion." final"] = $lang_updated;
	
	return $create_status;
}

function UpgradeTo17($prefix, $newversion) {

	global $lang_updated, $lang_create_update_to;
	
	$create_status[null] = null;
	
	if(!is_field_exists('thumbnailpath','config')) {
	
	// Add admin langfile
	mysql_query("ALTER TABLE `{$prefix}config` ADD `admin_langfile` VARCHAR(100) NOT NULL DEFAULT 'english'")or die("MySQL Error: ". mysql_error());
	
	// Add thumbnail path
	mysql_query("ALTER TABLE `{$prefix}config` ADD `thumbnailpath` VARCHAR(150) NOT NULL DEFAULT '../thumbnails/' AFTER `imagepath`")or die("MySQL Error: ". mysql_error());
	
	// Add sub title
	mysql_query("ALTER TABLE `{$prefix}config` ADD `subtitle` VARCHAR(100) NOT NULL DEFAULT 'Authentic photoblog flavour' AFTER `sitetitle`")or die("MySQL Error: ". mysql_error());
	
	// Drop rss type field
	mysql_query("ALTER TABLE `{$prefix}config` DROP `rsstype`");
	
	// Add rss type field
	mysql_query("ALTER TABLE `{$prefix}config` ADD `rsstype` ENUM('F', 'FO', 'T', 'O', 'N') NOT NULL DEFAULT 'T' AFTER `max_uri_comments`")or die("MySQL Error: ". mysql_error());
	
	// Add feed discovery
	mysql_query("ALTER TABLE `{$prefix}config` ADD `feed_discovery` ENUM('RA', 'R', 'A', 'E', 'N') NOT NULL DEFAULT 'RA' AFTER `rsstype`")or die("MySQL Error: ". mysql_error());
	
	// Add feed title
	mysql_query("ALTER TABLE `{$prefix}config` ADD `feed_title` VARCHAR(100) NOT NULL DEFAULT 'Pixelpost' AFTER `feed_discovery`")or die("MySQL Error: ". mysql_error());
	
	// Add feed description
	mysql_query("ALTER TABLE `{$prefix}config` ADD `feed_description` VARCHAR(100) NOT NULL DEFAULT 'Authentic photoblog flavour' AFTER `feed_title`")or die("MySQL Error: ". mysql_error());
	
	// Add feed copyright
	mysql_query("ALTER TABLE `{$prefix}config` ADD `feed_copyright` VARCHAR(100) NOT NULL DEFAULT 'Copyright 2007 yoursite.com, All Rights Reserved' AFTER `feed_description`")or die("MySQL Error: ". mysql_error());
	
	// Add allow comment feed
	mysql_query("ALTER TABLE `{$prefix}config` ADD `allow_comment_feed`  ENUM('Y', 'N') NOT NULL DEFAULT 'Y' AFTER `feed_copyright`")or die("MySQL Error: ". mysql_error());
	
	// Add external feed
	mysql_query("ALTER TABLE `{$prefix}config` ADD `feed_external` VARCHAR(150) NOT NULL DEFAULT '' AFTER `allow_comment_feed`")or die("MySQL Error: ". mysql_error());
	
	// Add external feed type
	mysql_query("ALTER TABLE `{$prefix}config` ADD `feed_external_type` ENUM('ER', 'EA') NOT NULL DEFAULT 'ER' AFTER `feed_external`")or die("MySQL Error: ". mysql_error());
	
	// Add display order
	mysql_query("ALTER TABLE `{$prefix}config` ADD `display_order` ENUM('default', 'reversed') NOT NULL DEFAULT 'default'")or die("MySQL Error: ". mysql_error());
		
	// Add admin thumb sharpening
	mysql_query("ALTER TABLE `{$prefix}config` ADD `thumb_sharpening` VARCHAR(1) DEFAULT '0'")or die("MySQL Error: ". mysql_error());
	
	// Add display sort by
	mysql_query("ALTER TABLE `{$prefix}config` ADD `display_sort_by` VARCHAR(150) NOT NULL DEFAULT 'datetime' AFTER `display_order`")or die("MySQL Error: ". mysql_error());
		
	// Dorop comment_dsbl
	mysql_query("ALTER TABLE `{$prefix}config` DROP `comment_dsbl`")or die("MySQL Error: ". mysql_error());
	
	// Update thumbnail path
	mysql_query("UPDATE `{$prefix}config` SET `thumbnailpath` = '../thumbnails/'")or die("MySQL Error: ". mysql_error());
	
	// Update version
	mysql_query("INSERT INTO `{$prefix}version` (version) VALUES ($newversion)")or die("MySQL Error: ". mysql_error());
	
	$create_status[$lang_create_update_to."&nbsp;".$newversion] = $lang_updated;
	
	}
	
	return $create_status;
}
function UpgradeTo171($prefix, $newversion) 
{
	
	global $lang_updated, $lang_create_update_to;

	deactivateAddons($prefix);
	activatePxlpstAddons($prefix);

	$create_status[null] = null;
	// Update version
	mysql_query("INSERT INTO `{$prefix}version` (version) VALUES ($newversion)")or die("MySQL Error: ". mysql_error());
	
	$create_status[$lang_create_update_to."&nbsp;".$newversion] = $lang_updated;
	return $create_status;
}

?>