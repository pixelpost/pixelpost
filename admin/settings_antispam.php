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
	
	<h2 class="title">AntiSpam Settings</h2>
	
	<!-- Begin Sub-Navigation -->
	<div id="subnavigation">
		<a href="settings.php">General</a>
		<a href="settings_template.php">Template</a>
		<a href="settings_thumbnail.php">Thumbnail</a>
		<a href="settings_antispam.php" class="active">AntiSpam</a>
		<a href="settings_user.php">User</a>
		<a href="settings_advanced.php">Advanced</a>
	</div>
	<!-- End Sub-Navigation -->
	
	<!-- Begin Content -->
	<div id="content">
		<form method="post" action="/pixelpostSVN/admin/index.php?view=options&amp;optionsview=antispam&amp;optaction=updateantispam" accept-charset="UTF-8">
			
		<fieldset id="form_token" class="box">
			
			<h3>Form Token</h3>
			
			<div class="frmwrapper">
				<label for="token" class="title">Enable form token:</label>
				<select name="token" id="token">
	    			<option value="F">No</option>
	    			<option value="T" selected="selected">Yes</option>
	    		</select>
				<p class="notice">
					Using a token will greatly reduce the risk of <a href="http://en.wikipedia.org/wiki/Cross-site_request_forgery">Cross-Site Request Forgeries</a>.<br />
					When enabled, comments will only be saved when the comment form token corresponds with the token stored within the users session.<br />
				</p>
				<br />
				<label for="token_time" class="title">Token time:</label>
				<input type="text" name="token_time" id="token_time" size="2" value="5" class="formfield extrasmall" /> <span class="tiny dim">minutes</span>
				<p class="notice">
					Maximum allowed time in minutes to comment between opening the comment window and submiting a comment.
					<br /><br />
					Enabling tokens is a multi-step process.
					For more information on implementing tokens, please read the <a href="http://www.pixelpost.org/docs/TemplateTags/TOKEN">token documentation</a>.
				</p>
				<br />
			</div>
			
		</fieldset>
		<fieldset id="spam_flood" class="box alt">
			
			<h3>Spam Flood</h3>
			
			<div class="frmwrapper">
				<label for="comment_timebetween" class="title">Flood interval:</label>
	    		<input type="text" name="comment_timebetween" id="comment_timebetween" size="2" value="30" class="formfield extrasmall" /> <span class="tiny dim">seconds</span>
				<p class="notice">Number of seconds before a new comment can be posted (to prevent floods)</p>
				<br />
			</div>
			
		</fieldset>
		<fieldset id="hyperlink_limit" class="box">
			
			<h3>Hyperlink Limit</h3>

			<div class="frmwrapper">
				<label for="max_uri_comment" class="title">Maximum links:</label>
	    		<input type="text" name="max_uri_comment" id="max_uri_comment" size="2" value="5" class="formfield extrasmall" />
				<p class="notice">Number of links allowed in one comment.</p>
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