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
	
	<h2 class="title">General Settings</h2>
	
	<!-- Begin Sub-Navigation -->
	<div id="subnavigation">
		<a href="settings.php" class="active">General</a>
		<a href="settings_template.php">Template</a>
		<a href="settings_thumbnail.php">Thumbnail</a>
		<a href="settings_antispam.php">AntiSpam</a>
		<a href="settings_user.php">User</a>
		<a href="settings_advanced.php">Advanced</a>
	</div>
	<!-- End Sub-Navigation -->
	
	<!-- Begin Content -->
	<div id="content">
		<form method="post" action="/pixelpostSVN/admin/index.php?view=options&amp;optionsview=general&amp;optaction=updateall" accept-charset="UTF-8">
		
		<fieldset id="site_title_url_settings" class="box">
			
			<h3>Site Title and URL</h3>
			
			<div class="frmwrapper">
				<label for="new_site_title" class="title">Title:</label>
				<input type="text" name="new_site_title" id="new_site_title" value="Pixelpost" class="formfield long" />
				<br />
				<label for="new_sub_title" class="title">Sub Title:</label>
				<input type="text" name="new_sub_title" id="new_sub_title" value="Authentic photoblog flavour" class="formfield long" />
				<br />
				<label for="new_site_url" class="title">URL:</label>
				<input type="text" name="new_site_url" id="new_site_url" value="http://localhost:8888/pixelpostSVN/" class="formfield long" />
				<p class="notice">Don't forget the trailing slash '/' e.g. http://www.pixelpost.org/</p>
				<br />
			</div>
			
		</fieldset>
		<fieldset id="language_settings" class="box alt">
			
			<h3>Language File</h3>
			
			<div class="frmwrapper">
				<label for="new_lang" class="title">Default language:</label>
				<select name="new_lang" id="new_lang">
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
				<label for="alt_lang" class="title">Alternative language:</label>
				<select name="alt_lang" id="alt_lang">
					<option value="Off">++Disabled++</option>
					<option value="blank">Blank</option>
					<option value="danish">Danish</option>
					<option value="dutch">Dutch</option>
					<option value="english">English</option>
					<option value="french">French</option>
					<option value="german">German</option>
					<option value="hungarian">Hungarian</option>
					<option value="italian">Italian</option>
					<option value="japanese">Japanese</option>
					<option value="norwegian">Norwegian</option>
					<option value="polish" selected="selected">Polish</option>
					<option value="romanian">Romanian</option>
					<option value="simplified_chinese">Simplified Chinese</option>
					<option value="spanish">Spanish</option>
					<option value="swedish">Swedish</option>
				</select>
				<br />
		 	</div>
			
		</fieldset>
		<fieldset id="global_comment" class="box">
			
			<h3>Global Comment Settings</h3>

			<div class="frmwrapper">
				<label for="global_comments" class="title">Default action for comments:</label>
				<select name="global_comments" id="global_comments">
					<option value="A" selected="selected">Publish instantly</option>
					<option value="M">To moderation queue</option>
					<option value="F">Disable commenting</option>
				</select>
				<br />
			</div>

		</fieldset>
		<fieldset id="comment_email" class="box alt">

			<h3>Send Email on Comment</h3>
			
			<div class="frmwrapper">
				<label for="new_commentemail" class="title">Send comment notification email:</label>
				<select name="new_commentemail" id="new_commentemail">
					<option value="no">No</option>
					<option value="yes">Yes</option>
				</select>
				<br />
				<label for="new_htmlemailnote" class="title">Use HTML notification emails:</label>
				<select name="new_htmlemailnote" id="new_htmlemailnote">
					<option value="yes">Yes</option>
					<option value="no">No</option>
				</select>
				<br />
			</div>

		</fieldset>
		<fieldset id="visitor_booking" class="box">

			<h3>Book Visitors</h3>

			<div class="frmwrapper">
				<label for="visitorbooking" class="title">Should Pixelpost book information of every visitor:</label>
				<select name="visitorbooking" id="visitorbooking">
					<option value="yes">Yes</option>
					<option value="no">No</option>
				</select>
				<br />
			</div>

		</fieldset>
		<fieldset id="markdown_settings" class="box alt">

			<h3>Enable Markdown</h3>

			<div class="frmwrapper">
				<label for="markdown" class="title">Should Pixelpost enable Markdown feature in Image description:</label>
				<select name="markdown" id="markdown">
					<option value="F">No</option>
					<option value="T">Yes</option>
				</select>
				<br />
			</div>

		</fieldset>
		<fieldset id="exif_settings" class="box">
			
			<h3>Enable EXIF</h3>

			<div class="frmwrapper">
				<label for="exif" class="title">Should Pixelpost enable Exif feature on the frontpage:</label>
				<select name="exif" id="exif">
					<option value="T">Yes</option>
					<option value="F">No</option>
				</select>
				<br />
			</div>
			
		</fieldset>
		<fieldset id="post_x_days_settings" class="box alt">
			
			<h3>Number of Days to Post After Last Post</h3>

			<div class="frmwrapper">
					<label for="daysafterlastpost" class="title">Set the number of days after the last post you want to post the new image:</label>
					<input type="text" name="daysafterlastpost" id="daysafterlastpost" value="1" class="formfield extrasmall" />
					<br />
			</div>

		</fieldset>
		<fieldset id="feed_settings" class="box">
			
			<h3>Feed Settings</h3>

			<div class="frmwrapper">
				<label for="feed_title" class="title">Feed title:</label>
				<input type="text" name="feed_title" id="feed_title" value="Pixelpost" class="formfield long" />
				<br />
				
				<label for="feed_description" class="title">Feed description:</label>
				<input type="text" name="feed_description" id="feed_description" value="Authentic photoblog flavour" class="formfield long" />
				<br />
				
				<label for="feed_copyright" class="title">Feed copyright:</label>
				<input type="text" name="feed_copyright" id="feed_copyright" value="Copyright 2008 http://localhost:8888/pixelpostSVN/, All Rights Reserved" class="formfield long" />
				<br />
				
				<label for="feed_discovery" class="title">Feed discovery:</label>
				<select name="feed_discovery" id="feed_discovery">
					<option value="RA" selected="selected">RSS &amp; ATOM</option>
					<option value="R">RSS</option>
					<option value="A">ATOM</option>
					<option value="E">External</option>
					<option value="N">None</option>
				</select>
				<br />
				<div id="ext_feed_discovery">
					<label for="feed_external_type" class="title">External feed type:</label>
					<select name="feed_external_type" id="feed_external_type">
		    			<option value="ER">RSS</option>
						<option value="EA">ATOM</option>
		    		</select>
					<br />
					<label for="feed_external" class="title">External feed:</label>
					<input type="text" name="feed_external" id="feed_external" value="" class="formfield long" />
					<p class="notice">Example: http://feeds.feedburner.com/YourBurnedBlog</p>
					<br />
		    	</div>				
				<label for="allow_comment_feed" class="title">Enable comment feeds:</label>
				<select name="allow_comment_feed" id="allow_comment_feed">
					<option value="Y">Yes</option>
					<option value="N">No</option>
				</select>
				<br />
				
				<label for="allow_feed_enclosure" class="title">Enable feed enclosures:</label>
				<select name="allow_feed_enclosure" id="allow_feed_enclosure">
					<option value="Y">Yes</option>
					<option value="N">No</option>
				</select>
				<br />
				
				<label for="rsstype" class="title">Feed style:</label>
				<select name="rsstype" id="rsstype">
					<option value="F">Full-size pictures with text</option>
					<option value="F0">Full-size pictures only</option>
					<option value="T" selected="selected">Thumbnails with text</option>
					<option value="O">Thumbnail pictures only</option>
					<option value="N">Text only</option>
    			</select>
				<br />
				
				<label for="feeditems" class="title">Maximum feed items:</label>
				<input type="text" size="2" name="feeditems" id="feeditems" value="10" class="formfield extrasmall" />
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