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
	
	<h2 class="title">Thumbnail Settings</h2>
	
	<!-- Begin Sub-Navigation -->
	<div id="subnavigation">
		<a href="settings.php">General</a>
		<a href="settings_template.php">Template</a>
		<a href="settings_thumbnail.php" class="active">Thumbnail</a>
		<a href="settings_antispam.php">AntiSpam</a>
		<a href="settings_user.php">User</a>
		<a href="settings_advanced.php">Advanced</a>
	</div>
	<!-- End Sub-Navigation -->
	
	<!-- Begin Content -->
	<div id="content">
		<form method="post" action="/pixelpostSVN/admin/index.php?view=options&amp;optionsview=template&amp;optaction=updatetemp" accept-charset="UTF-8">
		
		<fieldset id="thumbnail_row" class="box">
			
			<h3>Thumbnail Row</h3>
			
			<div class="frmwrapper">
				<label for="thumbnumber" class="title">Thumbnail row quantity:</label>
				<input type="text" name="thumbnumber" id="thumbnumber" value="5" class="formfield extrasmall" />
				<p class="notice">Determines how many thumbnails should be display within the automatically generated thumbnail row. Make this an odd number for best results, ie 7 or 9, not 6 or 8.</p>
				<br />
			</div>
			
		</fieldset>
		<fieldset id="crop_thumbnails" class="box alt">
			
			<h3>Crop Thumbnails</h3>
		
			<div class="frmwrapper">
				<label for="new_crop" class="title">Crop thumbnails:</label>
				<select name="new_crop" id="new_crop">
					<option value="yes" selected="selected">Yes</option>
					<option value="12c">12CropImage</option>
					<option value="no">No</option>
				</select>
				<p class="notice">
					If you want your thumbnails cropped to an exact size, choose <b>YES.</b><br />
					If you you want to maintain the original aspect ratio, choose <b>NO.</b><br />
					If you wish to manually crop your thumbnails, choose <b>12CropImage.</b>
				</p>
				<br />
			</div>
			
		</fieldset>
		<fieldset id="thumbnail_size" class="box">
			
			<h3>Thumbnail Size</h3>
			
			<div class="frmwrapper">
				<label for="thumbwidth" class="title">Thumbnail dimensions:</label>
				<input type="text" name="thumbwidth" id="thumbwidth" value="100" class="formfield extrasmall" />  <input type="text" name="thumbheight" value="75" class="formfield extrasmall" /> <!--<input type="checkbox" name="do" value="do" /> <input type="submit" value="Re-generate thumbs" name="regenerate" />-->
				<p class="notice">
					Set thumbnails size, width x height.<br />
					This generates new thumbnails from all posted images. Losing all manually cropped thumbnails to the default thumbnail generation.
				</p>
				<br />
			</div>
			
		</fieldset>
		<fieldset id="thumbnail_quality" class="box alt">
			
			<h3>Thumbnail Quality</h3>
		
			<div class="frmwrapper">
				<label for="new_compression" class="title">Thumbnail quality:</label>
			
				<input type="text" name="new_compression" id="new_compression" value="75" class="formfield extrasmall" />
				<p class="notice">How hard do you want the jpg-compression to be?<br/>10 is low quality and 100 is max quality (no loss).</p>
				<br />
			</div>

		</fieldset>
		<fieldset id="thumbsharp_settings" class="box">
			
			<h3>Thumbnail Sharpening</h3>
		
			<div class="frmwrapper">
				<label for="new_thumb_sharpening" class="title">Thumbnail sharpening:</label>
				<select name="new_thumb_sharpening" id="new_thumb_sharpening">
					<option value="0" selected="selected">No Sharpening</option>
					<option value="1">Light</option>
					<option value="2">Medium</option>
					<option value="3">High</option>
					<option value="4">Ultra-High</option>
				</select>
				<p class="notice">How sharp do you want the thumbnails to be?</p>
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