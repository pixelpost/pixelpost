<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Pixelpost Administration</title>
	
	<link href="styles/global.css" media="screen" rel="stylesheet" type="text/css"  />
	<link href="styles/settings.css" media="screen" rel="stylesheet" type="text/css" />
	<link href="styles/import.css" media="screen" rel="stylesheet" type="text/css" />
	
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
		
		<h2 class="subtitle">Localization Settings</h2>
		
		<!-- Begin Sub-Sub-Navigation -->
		<div id="sub_subnavigation">
			<a href="settings_advanced.php">General</a>
			<a href="settings_adv_locale.php" class="active">Localization</a>
			<a href="settings_adv_antispam.php">AntiSpam</a>
		</div>
		<!-- End Sub-Sub-Navigation -->
	
		<!-- Begin Content -->
		<div id="content">
			<form id="locale_form" method="post" action="/pixelpostSVN/admin/index.php?view=options&amp;advancedview=localization&amp;optaction=updateadv_local" accept-charset="UTF-8">
			
			<fieldset id="locale" class="box">
			
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
