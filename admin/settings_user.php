<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Pixelpost Administration</title>
	
	<link href="styles/global.css" media="screen" rel="stylesheet" type="text/css"  />
	<link href="styles/settings.css" media="screen" rel="stylesheet" type="text/css" />
	<link href="styles/import.css" media="screen" rel="stylesheet" type="text/css" />
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
	
		<h2 class="title">User Settings</h2>
	
		<!-- Begin Sub-Navigation -->
		<div id="subnavigation">
			<a href="settings.php">General</a>
			<a href="settings_template.php">Template</a>
			<a href="settings_thumbnail.php">Thumbnail</a>
			<a href="settings_antispam.php">AntiSpam</a>
			<a href="settings_user.php" class="active">User</a>
			<a href="settings_advanced.php">Advanced</a>
		</div>
		<!-- End Sub-Navigation -->
	
		<!-- Begin Content -->
		<div id="content">
			<form method="post" action="/pixelpostSVN/admin/index.php?view=options&amp;optionsview=user&amp;optaction=updateuser" accept-charset="UTF-8">
			
			<fieldset id="username_password" class="box">
			
				<h3>Admin user &amp; Password</h3>
			
				<div class="frmwrapper">
					<label for="new_admin_user" class="title">User:</label>
					<input type="text" name="new_admin_user" id="new_admin_user" value="admin" class="formfield medium" />
					<br />
					<label for="newadminpass" class="title">Password:</label>
					<input type="password" name="newadminpass" id="newadminpass" value="" class="formfield medium" />
					<br />
					<label for="newadminpass_re" class="title">Reconfirm Password:</label>
					<input type="password" name="newadminpass_re" id="newadminpass_re" value="" class="formfield medium" />
					<br />
					<input type="hidden" name="passchanged" value="no" />
				</div>
			
			</fieldset>
			<fieldset id="admin_language" class="box alt">
			
				<h3>Administrator Language</h3>
			
				<div class="frmwrapper">
					<label for="new_admin_lang" class="title">Administrator language:</label>
					<select name="new_admin_lang" id="new_admin_lang">
						<option value="blank">Blank</option>
						<option value="danish">Danish</option>
						<option value="dutch">Dutch</option>
						<option value="english" selected="selected">English</option>
						<option value="french">French</option>
						<option value="german">German</option>
						<option value="hungarian">Hungarian</option>
						<option value="italian">Italian</option>
						<option value="japanese">Japanese</option>
						<option value="norwegian">Norwegian</option>
						<option value="polish">Polish</option>
						<option value="romanian">Romanian</option>
						<option value="simplified_chinese">Simplified Chinese</option>
						<option value="spanish">Spanish</option>
						<option value="swedish">Swedish</option>
					</select>
					<br />
				</div>
			
			</fieldset>
			<fieldset id="admin_email" class="box">
			
				<h3>Administrator Email</h3>
			
				<div class="frmwrapper">
					<label for="new_email" class="title">Administrator email:</label>
					<input type="text" name="new_email" id="new_email" value="dwilkinsjr@dwilkinsjr.com" class="formfield medium" />
					<p class="notice">Fill it. This will be used for password recovery.</p>
					<br />
				</div>
			
			</fieldset>
			<fieldset id="date_timezone" class="box alt">
			
				<h3>Timezone</h3>
			
				<div class="frmwrapper">
					<label for="timezone" class="title">Timezone offset:</label>
					<select name="timezone" id="timezone">
						<option value="-12">[UTC - 12]</option>
						<option value="-11">[UTC - 11]</option>
						<option value="-10">[UTC - 10]</option>
						<option value="-9.5">[UTC - 9:30]</option>
						<option value="-9">[UTC - 9]</option>
						<option value="-8">[UTC - 8]</option>
						<option value="-7">[UTC - 7]</option>
						<option value="-6">[UTC - 6]</option>
						<option value="-5" selected="selected">[UTC - 5]</option>
						<option value="-4">[UTC - 4]</option>
						<option value="-3.5">[UTC - 3:30]</option>
						<option value="-3">[UTC - 3]</option>
						<option value="-2">[UTC - 2]</option>
						<option value="-1">[UTC - 1]</option>
						<option value="0">[UTC]</option>
						<option value="1">[UTC + 1]</option>
						<option value="2">[UTC + 2]</option>
						<option value="3">[UTC + 3]</option>
						<option value="3.5">[UTC + 3:30]</option>
						<option value="4">[UTC + 4]</option>
						<option value="4.5">[UTC + 4:30]</option>
						<option value="5">[UTC + 5]</option>
						<option value="5.5">[UTC + 5:30]</option>
						<option value="5.75">[UTC + 5:45]</option>
						<option value="6">[UTC + 6]</option>
						<option value="6.5">[UTC + 6:30]</option>
						<option value="7">[UTC + 7]</option>
						<option value="8">[UTC + 8]</option>
						<option value="8.75">[UTC + 8:45]</option>
						<option value="9">[UTC + 9]</option>
						<option value="9.5">[UTC + 9:30]</option>
						<option value="10">[UTC + 10]</option>
						<option value="10.5">[UTC + 10:30]</option>
						<option value="11">[UTC + 11]</option>
						<option value="11.5">[UTC + 11:30]</option>
						<option value="12">[UTC + 12]</option>
						<option value="12.75">[UTC + 12:45]</option>
						<option value="13">[UTC + 13]</option>
						<option value="14">[UTC + 14]</option>
					</select>
					<p class="notice">Note that this does not support daylight saving automatically and you should change it manually. Check <a href='http://www.worldtimeserver.com/current_time_in_UTC.aspx'> UTC Current time</a> if you are not sure about your local time offset form UTC.</p>
					<br />
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