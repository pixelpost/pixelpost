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
	<script src="scripts/dateFormat.functions.js" type="text/javascript"></script>
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
	
	<h2 class="title">Template Settings</h2>
	
	<!-- Begin Sub-Navigation -->
	<div id="subnavigation">
		<a href="settings.php">General</a>
		<a href="settings_template.php" class="active">Template</a>
		<a href="settings_thumbnail.php">Thumbnail</a>
		<a href="settings_antispam.php">AntiSpam</a>
		<a href="settings_user.php">User</a>
		<a href="settings_advanced.php">Advanced</a>
	</div>
	<!-- End Sub-Navigation -->
	
	<!-- Begin Content -->
	<div id="content">
		<form method="post" action="/pixelpostSVN/admin/index.php?view=options&amp;optionsview=template&amp;optaction=updatetemp" accept-charset="UTF-8">
		
		<fieldset id="choose_template" class="box">
			
			<h3>Choose Template</h3>
		
			<div class="frmwrapper">
				<label for="new_template" class="title">Select a template:</label>
			
				<select name="new_template" id="new_template">
					<option value="horizon">Horizon</option>
					<option value="simple" selected="selected">Simple</option>
					<option value="simplicious">Simplicious</option>
					<option value="sotolicious">Sotolicious</option>
				</select>
				<br />
			</div>
			
		</fieldset>
		<fieldset id="dateformat" class="box alt">
			
			<h3>Date Format</h3>

			<div class="frmwrapper">
				<label for="dtf_preview" class="title">Date format preview:</label>
				<div id="dtf_preview"><span class="notice tiny"><?php echo date('Y-m-d H:i:s'); ?></span></div>
				<br />
				<label for="new_dateformat" class="title">Set date format:</label>
				<input type="text" name="new_dateformat" id="new_dateformat" value="Y-m-d H:i:s" class="formfield small center" /> <a href="#" id="previewDTF">Preview</a>
				<p class="notice">The dateformat used for images and comments.<br />The syntax used is identical to the PHP <a href="http://www.php.net/date">date()</a> function.</p>
				<br />
			</div>
		
		</fieldset>
		<fieldset id="category_format" class="box">
			
			<h3>Category Links Format</h3>
			
			<div class="frmwrapper">
				<label for="catformat" class="title">Category format:</label>
				<select name="catformat" id="catformat">
					<option value="[">[people] [nature] [etc]</option>
					<option value=" ,">people, nature, etc</option>
					<option value=" -">people - nature - etc</option>
					<option value=" |">people | nature | etc</option>
					<option value=" /">people / nature / etc</option>
					<option value="custom">Custom</option>
				</select>
				<p class="notice">The format for displaying links to categories in the template.</p>
				<br />
				<div id="customcatformat">
					<label for="catformat" class="title">Custom category format:</label>
					<input type="text" name="startcatformat" size="3" value="[" class="formfield extrasmall" /><input type="text" name="endcatformat" size="3" value="]" class="formfield extrasmall" /> <span class="tiny dim">Beginning / End format</span>
					<br />
				</div>
			</div>
		
		</fieldset>
		<fieldset id="calendar_type" class="box alt">
			
			<h3>Calendar Type</h3>
			
			<div class="frmwrapper">
				<label for="cal" class="title">Calendar:</label>
				<select name="cal" id="cal">
					<option value="Horizontal">Horizontal</option>
					<option value="Normal">Normal</option>
					<option value="No Calendar" selected="selected">Don't Use a Calendar</option>
				</select>
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