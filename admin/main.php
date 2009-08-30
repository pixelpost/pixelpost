<?php
$message = '';
if(isset($_GET['OK']) or isset($_GET['ERROR']))
{
	$message = '
	<div id="status" class="error roll">
	<h2 class="caption">Oops!</h2>
	Oops! There seems to be something missing!<br />Your image was not uploaded for the following reasons:
	<ul>
		<li>Please select an image to upload.</li>
		<li>Please enter an image title.</li>
	</ul>
	<a href="#" id="closeBox">(dismiss)</a>
	</div>';
	if(isset($_GET['OK']))
	{
		$message = '
		<div id="status" class="ok fade">
		<h2 class="caption">Success!</h2>
		Your photo has been successfully uploaded and saved!
		<a href="#" id="closeBox">(dismiss)</a>
		</div>';
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Pixelpost Administration</title>
	
	<link href="styles/global.css" media="screen" rel="stylesheet" type="text/css"  />
	<link href="styles/main.css" media="screen" rel="stylesheet" type="text/css" />
	<link href="styles/import.css" media="screen" rel="stylesheet" type="text/css" />
	
	<script src="scripts/mootools.js" type="text/javascript"></script>
	<script src="scripts/main.functions.js" type="text/javascript"></script>
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
	
	<!-- Begin Navigation -->
	<div id="navigation">
		<a href="main.php" class="active">New Image</a>
		<a href="browse.php">Browse</a>
		<a href="organize.php">Organize</a>
		<a href="comments.php">Comments</a>
		<a href="settings.php">Settings</a>
		<a href="info.php">Info</a>
		<a href="addons.php">Addons</a>
	</div>
	<!-- End Navigation -->
	
	<h2 class="title">New Image</h2>
	
	<!-- Begin Error Output -->
	<?php echo $message; ?>
	<!-- End Error Output -->
	
	<!-- Begin Content -->
	<div id="content">
		<form method="post" action="index.php?x=save" enctype="multipart/form-data" accept-charset="UTF-8">
			
			<fieldset id="image_settings" class="box">
				
				<h3>Image Properties</h3>

				<div class="frmwrapper">
					<label for="image" class="title">Image</label>
					<input name="userfile" id="image" type="file" tabindex="1" />
					<br />
				
					<label for="headline" class="title">Image title</label>
					<input type="text" name="headline" id="headline" value="" class="formfield long"  tabindex="2" />
					<br />
				
					<label for="tags" class="title">Tags</label>
					<input type="text" name="tags" id="tags" value="" class="formfield long"  tabindex="3" />
					<p class="notice">(Use a comma, semicolon or space to separate tags. Join words using an underline or dash)</p>
					<br />

					<label class="title">Assign categories</label>
					<div id="cattable" class="cattable">
						<span class="cat"><input type="checkbox" name="category[]" value="0" id="cat0"/>&nbsp;<label for="cat0" class="title">Animals <span title="Polski kategorię">(zwierzęta)</span></label></span>
						<span class="cat"><input type="checkbox" name="category[]" value="1" id="cat1"/>&nbsp;<label for="cat1" class="title">Default <span title="Polski kategorię">(domyślny)</span></label></span>
						<span class="cat"><input type="checkbox" name="category[]" value="2" id="cat2"/>&nbsp;<label for="cat2" class="title">People <span title="Polski kategorię">(ludzie)</span></label></span>
						<span class="cat"><input type="checkbox" name="category[]" value="3" id="cat3"/>&nbsp;<label for="cat3" class="title">Scenery <span title="Polski kategorię">(sceneria)</span></label></span>
						<span class="cat"><input type="checkbox" name="category[]" value="4" id="cat4"/>&nbsp;<label for="cat4" class="title">Sports <span title="Polski kategorię">(sporty)</span></label></span>
						<span class="cat"><input type="checkbox" name="category[]" value="5" id="cat5"/>&nbsp;<label for="cat5" class="title">Nature <span title="Polski kategorię">(przyroda)</span></label></span>
						<span class="cat"><input type="checkbox" name="category[]" value="6" id="cat6"/>&nbsp;<label for="cat6" class="title">Urban <span title="Polski kategorię">(miejski)</span></label></span>
					</div>
					<br />
					
					<label for="photo_desc" class="title">Image description</label>
					<textarea name="body" id="photo_desc" rows="8" cols="100" tabindex="4" class="textfield"></textarea>
					<br />
				</div>

			</fieldset>
			
			<fieldset id="datetable" class="box alt">
				
				<h3>Post Date</h3>

				<div class="frmwrapper">
					<label for="post_dates">Post date</label>
					<select name="post_dates" id="post_dates">
						<option value="2008-03-11 14:04:09">Now</option>
						<option value="2008-03-12 14:04:09">One day after last post</option>
						<option value="2008-02-07 00:00:00">Use EXIF date</option>
						<option value="specific">On a specific date</option>
					</select>
					<input type="text" name="post_date" id="post_date" class="formfield small" />
					<br />
				</div>
				
			</fieldset>
			
			<fieldset id="comment_settings" class="box">
				
				<h3>Comment Settings</h3>

				<div class="frmwrapper">
					<label for="allow_comments" class="title">Action for comments:</label>
					<select name="allow_comments" id="allow_comments"  tabindex="11">
						<option selected="selected" value="A">Publish instantly</option>
						<option value="M">To moderation queue</option>
						<option value="F">Disable commenting</option>
					</select>
					<br />
				</div>
					
			</fieldset>
			
			<fieldset id="submitbtn" class="box alt">
				
				<h2 class="caption">Post Entry</h2>
				<div id="submit"><input type="submit" class="submit" id="upload" value="Upload"  tabindex="12" /></div>
				
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