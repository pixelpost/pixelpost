<?php
$message = '';
if(!isset($_COOKIE['pp_adv_warning']))
{
	$message = '
	<div id="status" class="error roll">
	<h2 class="caption">Caution!</h2>
	The settings below are intended for advanced users only!<br />
	You can easily cause undesirable changes to your photoblog if you do not know what your are doing!<br />
	Please proceed with caution.
	<a href="#" id="closeBox" title="dismiss for duration of current browser session">(dismiss)</a>
	</div>';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Pixelpost Administration</title>
	
	<link href="styles/global.css" media="screen" rel="stylesheet" type="text/css"  />
	<link href="styles/settings.css" media="screen" rel="stylesheet" type="text/css" />
	<link href="styles/import.css" media="screen" rel="stylesheet" type="text/css" />
	
	<script src="scripts/mootools.js" type="text/javascript"></script>
	<script src="scripts/settings.functions.js" type="text/javascript"></script>
</head>

<body>
	<!-- Begin Wrapper -->
	<div id="wrapper">
	
		<!-- Begin Header -->
		<div id="header">
			<h1><a href="http://www.visualpixels.com" title="Visual Pixels">Visual Pixels</a></h1>
			<div id="headerlinks">
				<span id="dashlink"><a href="dashboard.php">Dashboard</a></span> <span id="logout"><a href="index.php?x=logout">Logout</a></span>
			</div>
		</div>
		<!-- End Header -->
	
		<!-- Begin Naviagtion -->
		<div id="navigation">
			<a href="main.php">New Image</a>
			<a href="browse.php">Browse</a>
			<a href="organize.php">Organize</a>
			<a href="comments.php">Comments</a>
			<a href="settings.php" class="active">Settings</a>
			<a href="info.php">Info</a>
			<a href="addons.php">Addons</a>
		</div>
		<!-- End Naviagtion -->
	
		<h2 class="title">Advanced Settings</h2>
	
		<!-- Begin Sub-Navigation -->
		<div id="subnavigation">
			<a href="settings.php">General</a>
			<a href="settings_template.php">Template</a>
			<a href="settings_thumbnail.php">Thumbnail</a>
			<a href="settings_antispam.php">AntiSpam</a>
			<a href="settings_user.php">User</a>
			<a href="settings_advanced.php" class="active">Advanced</a>
		</div>
		<!-- End Sub-Navigation -->
		
		<!-- Begin Error Output -->
		<?php echo $message; ?>
		<!-- End Error Output -->
	
		<!-- Begin Content -->
		<div id="content">
			<form method="post" action="/pixelpostSVN/admin/index.php?view=options&amp;advancedview=general&amp;optaction=updateadv_gen" accept-charset="UTF-8">
			
			<fieldset id="image_thumb_path" class="box">
			
				<h3>Image &amp; Thumbnail Paths</h3>
			
				<div class="frmwrapper">
					<label for="new_image_path" class="title">Image path:</label>
					<input type="text" name="new_image_path" id="new_image_path" value="../images/" class="formfield medium" />
					<br />
					<label for="new_thumbnail_path" class="title">Thumbnail path:</label>
					<input type="text" name="new_thumbnail_path" id="new_thumbnail_path" value="../thumbnails/" class="formfield medium" />
					<p class="notice">Don't forget the trailing slash <b>'/'</b> e.g. <i>../images/ or ../thumbnails/</i></p>
					<br />
				</div>
			
			</fieldset>
			<fieldset id="file_timestamp" class="box alt">
			
				<h3>File Timestamp</h3>
			
				<div class="frmwrapper">
					<label for="timestamp" class="title">Use timestamp:</label>
					<select name="timestamp" id="timestamp">
						<option value="yes">Yes</option>
						<option value="no">No</option>
					</select>
					<p class="notice">Adding a time stamp to the file name avoids overwriting images with the same name.</p>
					<br />
				</div>
			
			</fieldset>
			<fieldset id="display_order" class="box">
			
				<h3>Display Order</h3>
			
				<div class="frmwrapper">
					<label for="timestamp" class="title">Sort by:</label>
					<select name="display_sort_by">
						<option value="datetime" selected="selected">Date and Time for the entry</option>
						<option value="headline">Image Title</option>
						<option value="body">Image description / text</option>
					</select>
					<p class="notice">Select the way the images are sorted for display.</p>
					<br />
					<label for="timestamp" class="title">Sort order:</label>
					<select name="display_order">
						<option value="default">Descending</option>
						<option value="reversed">Ascending</option>
					</select>
					<p class="notice">Descending, latest to oldest. Ascending, oldest to latest.</p>
					<br />
				</div>
			
			</fieldset>
			<fieldset id="locale" class="box alt">
			
				<h3>Localization</h3>
				
				<div class="frmwrapper">
					<label for="native_tongue" class="title">Native Tongue:</label>
					<input type="text" name="native_tongue" id="native_tongue" value="" size="30" class="formfield small" />
					<br />
					<label for="language" class="title">Language:</label>
					<input type="text" name="language" id="language" value="" size="30" class="formfield small" />
					<br />
					<label for="abbr" class="title">Abreviation:</label>
					<input type="text" name="abbr" id="abbr" value="" size="5" maxlength="2" class="formfield extrasmall" />
					<br />
				</div>
				<div class="localewrapper">
					<table border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td  class="cellOne header long">Native Tongue:</td>
							<td  class="cellOne header long">Language:</td>
							<td  class="cellOne header">Abbreviation:</td>
							<td  class="cellOne header small"></td>
							<td  class="cellOne header center">Delete:</td>
						</tr>
						<tr>
							<td class="cellTwo">Česky</td>
							<td class="cellTwo">czech</td>
							<td class="cellTwo center">CS</td>
							<td class="cellTwo"></td>
							<td class="cellTwo center"><input type="checkbox" name="delete[]" value="CS" /></td>
						</tr>
						<tr>
							<td class="cellOne">Chinese</td>
							<td class="cellOne">simplified_chinese</td>
							<td class="cellOne center">ZH</td>
							<td class="cellOne"></td>
							<td class="cellOne center"><input type="checkbox" name="delete[]" value="ZH" /></td>
						</tr>
						<tr>
							<td class="cellTwo">Dansk</td>
							<td class="cellTwo">danish</td>
							<td class="cellTwo center">DA</td>
							<td class="cellTwo"></td>
							<td class="cellTwo center"><input type="checkbox" name="delete[]" value="DA" /></td>
						</tr>
						<tr>
							<td class="cellOne">Deutsch</td>
							<td class="cellOne">german</td>
							<td class="cellOne center">DE</td>
							<td class="cellOne"></td>
							<td class="cellOne center"><input type="checkbox" name="delete[]" value="DE" /></td>
						</tr>
						<tr>
							<td class="cellTwo">English</td>
							<td class="cellTwo">english</td>
							<td class="cellTwo center">EN</td>
							<td class="cellTwo"></td>
							<td class="cellTwo"></td>
						</tr>
						<tr>
							<td class="cellOne">Español</td>
							<td class="cellOne">spanish</td>
							<td class="cellOne center">ES</td>
							<td class="cellOne"></td>
							<td class="cellOne center"><input type="checkbox" name="delete[]" value="ES" /></td>
						</tr>
						<tr>
							<td class="cellTwo">Farsi</td>
							<td class="cellTwo">persian</td>
							<td class="cellTwo center">FA</td>
							<td class="cellTwo"></td>
							<td class="cellTwo center"><input type="checkbox" name="delete[]" value="FA" /></td>
						</tr>
						<tr>
							<td class="cellOne">Français</td>
							<td class="cellOne">french</td>
							<td class="cellOne center">FR</td>
							<td class="cellOne"></td>
							<td class="cellOne center"><input type="checkbox" name="delete[]" value="FR" /></td>
						</tr>
						<tr>
							<td class="cellTwo">Italiano</td>
							<td class="cellTwo">italian</td>
							<td class="cellTwo center">IT</td>
							<td class="cellTwo"></td>
							<td class="cellTwo center"><input type="checkbox" name="delete[]" value="IT" /></td>
						</tr>
						<tr>
							<td class="cellOne">Japanese</td>
							<td class="cellOne">japanese</td>
							<td class="cellOne center">JA</td>
							<td class="cellOne"></td>
							<td class="cellOne center"><input type="checkbox" name="delete[]" value="JA" /></td>
						</tr>
						<tr>
							<td class="cellTwo">Magyar</td>
							<td class="cellTwo">hungarian</td>
							<td class="cellTwo center">HU</td>
							<td class="cellTwo"></td>
							<td class="cellTwo center"><input type="checkbox" name="delete[]" value="HU" /></td>
						</tr>
						<tr>
							<td class="cellOne">Nederlands</td>
							<td class="cellOne">dutch</td>
							<td class="cellOne center">NL</td>
							<td class="cellOne"></td>
							<td class="cellOne center"><input type="checkbox" name="delete[]" value="NL" /></td>
						</tr>
						<tr>
							<td class="cellTwo">Norsk</td>
							<td class="cellTwo">norwegian</td>
							<td class="cellTwo center">NO</td>
							<td class="cellTwo"></td>
							<td class="cellTwo center"><input type="checkbox" name="delete[]" value="NO" /></td>
						</tr>
						<tr>
							<td class="cellOne">Polskiego</td>
							<td class="cellOne">polish</td>
							<td class="cellOne center">PL</td>
							<td class="cellOne"></td>
							<td class="cellOne center"><input type="checkbox" name="delete[]" value="PL" /></td>
						</tr>
						<tr>
							<td class="cellTwo">Português</td>
							<td class="cellTwo">portuguese</td>
							<td class="cellTwo center">PT</td>
							<td class="cellTwo"></td>
							<td class="cellTwo center"><input type="checkbox" name="delete[]" value="PT" /></td>
						</tr>
						<tr>
							<td class="cellOne">Romana</td>
							<td class="cellOne">romanian</td>
							<td class="cellOne center">RO</td>
							<td class="cellOne"></td>
							<td class="cellOne center"><input type="checkbox" name="delete[]" value="RO" /></td>
						</tr>
						<tr>
							<td class="cellTwo">Russian</td>
							<td class="cellTwo">russian</td>
							<td class="cellTwo center">RU</td>
							<td class="cellTwo"></td>
							<td class="cellTwo center"><input type="checkbox" name="delete[]" value="RU" /></td>
						</tr>
						<tr>
							<td class="cellOne">Svenska</td>
							<td class="cellOne">swedish</td>
							<td class="cellOne center">SV</td>
							<td class="cellOne"></td>
							<td class="cellOne center"><input type="checkbox" name="delete[]" value="SV" /></td>
						</tr>
						<tr>
							<td align="right" colspan="4"></td>
							<td class="center">
								<!--
								<p class="dim">
									<a href="javascript:SetChecked(1,'delete[]')">check</a> / <a href="javascript:SetChecked(0,'delete[]')">uncheck</a>
								</p>
								-->
								<input type="checkbox" name="checkall" onclick="checkUncheckAll(this);" />
							</td>
						</tr>
					</table>
				</div>
			
			</fieldset>
			<fieldset id="antispam_ban_list" class="box">
			
				<h3>AntiSpam Ban Lists</h3>
			
				<div class="frmwrapper">
					<!--
					<p class="notice">
					Add banned words / IPs / names to the text-boxes below, one word per line.
					<br />
					(You should add the given code to an .htaccess to make it work!)
					</p>
					<br />
					-->
					
					<label for="moderation_list" class="title">Moderation list:</label>
					<textarea name="moderation_list" id="moderation_list" class="textfield small" rows="8" cols="25"></textarea>
					<br />
					<br />
					<p class="notice">
						Any comment with a word, an IP, or name inside the moderation list will be sent to the moderation queue.<br />
						<a href="index.php?view=options&amp;advancedview=antispam&amp;antispamaction=moderation">Check Past Comments</a>
					</p>
					<br />
					<br />
					<label for="blacklist" class="title">Black list:</label>
					<textarea name="blacklist" id="blacklist" class="textfield small" rows="8" cols="25"></textarea>
					<br />
					<br />
					<p class="notice">
						Any comment with a word, an IP, or name inside the black list never gets permission to enter the comment list.<br />
						<a href="index.php?view=options&amp;advancedview=antispam&amp;antispamaction=deletecmnt">Delete Bad Comments</a>
					</p>
					<br />
					<br />
					<label for="ref_ban_list" class="title">Banned referrer list:</label>
					<textarea name="ref_ban_list" id="ref_ban_list" class="textfield small" rows="8" cols="25">
tramadol
-online
adipex
advicer
ambien
bllogspot
carisoprodol
casino
casinos
baccarrat
cialis
cwas
cyclen
cyclobenzaprine
day-trading
discreetordering
dutyfree
duty-free
fioricet
freenet-shopping
incest
levitra
macinstruct
meridia
online-gambling
paxil
phentermine
platinum-celebs
poker-chip
poze
prescription
soma
slot-machine
taboo
teen
trim-spa
ultram
viagra
xanax
booker
zolus
chatroom
poker
texas
holdem
					</textarea>
					<br />
					<br />
					<p class="notice">
						Any visitor with an IP inside the Referrer Ban List or with an address that contains words in that list will be denied from accessing your photoblog.<br />
						<a href="index.php?view=options&amp;advancedview=antispam&amp;antispamaction=deleterefs" >Delete Bad Referrers</a>
					</p>
					<br />
					<br />
					<input type="hidden" name="banlistupdate" value="1" />
					
					<p class="notice"><a href="#" id="htaccess_toggle"><i>Get .htaccess code</i></a></p>
					<br />
					<div id="htaccess" >
						<label for="htaccess_deny_list" class="title">Htaccess deny list:</label>
						<textarea name="htaccess_deny_list" id="htaccess_deny_list" class="textfield" rows="12" cols="50">
SetEnvIfNoCase Referer ".*(tramadol|-online|adipex|advicer|ambien|bllogspot|carisoprodol|casino|casinos|baccarrat|cialis|cwas|cyclen|cyclobenzaprine|day-trading|discreetordering|dutyfree|duty-free|fioricet|freenet-shopping|incest|levitra|macinstruct|meridia|online-gambling|paxil|phentermine|platinum-celebs|poker-chip|poze|prescription|soma|slot-machine|taboo|teen|trim-spa|ultram|viagra|xanax|booker|zolus|chatroom|poker|texas|holdem|baccarat.host-c.com).*" BadReferrer
order deny,allow
deny from env=BadReferrer
						</textarea>
						<br />
						<br />
						<p class="notice">Select then copy the code below (CTRL+A and CTRL+C in Windows) and paste it into .htaccess file of your website to ban spam IPs and referrers.</p>
						<br />
					</div>					
				</div>
			
			</fieldset>
			<fieldset id="submitbtn" class="box alt">
			
				<h2 class="caption">Update</h2>
			
				<div id="submit">
					<input type="submit" class="submit" id="update" value="UPDATE" />
				</div>
		
			</fieldset>
		
			</form>
		</div>
		<!-- End Content -->
	
		<!-- Begin Footer -->
		<div id="footer">
			<span id="copyright">2008 <a href="http://www.pixelpost.org/">Pixelpost v1.8</a></span>
		</div>
		<!-- End Footer -->
	
	</div>
	<!-- End Wrapper -->
</body>
</html>