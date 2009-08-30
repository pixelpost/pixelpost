<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Pixelpost Administration</title>
	
	<link href="styles/global.css" media="screen" rel="stylesheet" type="text/css"  />
	<link href="styles/addons.css" media="screen" rel="stylesheet" type="text/css" />
	<link href="styles/import.css" media="screen" rel="stylesheet" type="text/css" />
	
	<script src="scripts/mootools.js" type="text/javascript"></script>
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
		<a href="settings.php">Settings</a>
		<a href="info.php">Info</a>
		<a href="addons.php" class="active">Addons</a>
	</div>
	<!-- End Naviagtion -->
	<h2 class="title">Addons</h2>
	<!-- Begin Content -->
	<div id="content">
		<fieldset id="autoresize" class="box">
			<h2 class="caption">Auto Resize Addon (Special Edition)</h2>
			<h3 class="status on">(_autoresize/admin_auto_resize - version 2.1.2) - status: <a href="index.php?view=addons&amp;turnoff=_autoresize/admin_auto_resize" title="Click to turn OFF">ON</a></h3>
			<!--<input type="checkbox" name="addonswitch[]" value="turnoff" id="switch" />-->
			<div class="description">
				This addon will take your full-sized photograph and resize it to your desired width/height while maintaining a perfect aspect ratio.<br />
				You also have the option of uploading the original full-sized image along with your resized photo for safe keeping.<br />
				Please read the <a href="../addons/_autoresize/admin_auto_resize/autoResizeManual.html">AutoResize</a> User Guide for full installation and configuration instructions.<br /><br />
				ADDON Author: Dwilkinsjr (<a href="http://www.dwilkinsjr.com/myaddons">dwilkinsjr.com</a>) (<a href="http://www.versioncheckr.com/29/2.1.2/">Check for updates</a>) (<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&amp;business=dwilkinsjr%40dwilkinsjr%2ecom&amp;item_name=Dwilkinsjr%27s%20Pixelpost%20Addons&amp;page_style=PayPal&amp;no_shipping=1&amp;return=http%3a%2f%2fdwilkinsjr%2ecom%2fdonation%2fthankyou%2f&amp;cancel_return=http%3a%2f%2fdwilkinsjr%2ecom%2fdonation%2fcancel%2f&amp;no_note=1&amp;cn=Comments&amp;tax=0&amp;currency_code=USD&amp;lc=US&amp;bn=PP%2dDonationsBF&amp;charset=UTF%2d8">Donate</a>) (<a href="http://www.pixelpost.org/extend/addons/auto-resize-addon/reviews/#write">Review</a>)
			</div>
		</fieldset>
		
		<fieldset id="pingservice" class="box alt">
			<h2 class="caption">Ping service</h2>
			<h3 class="status on">(admin_ping - version 1.0) - status: <a href="index.php?view=addons&amp;turnoff=admin_ping" title="Click to turn it OFF">ON</a></h3>
			<!--<input type="checkbox" name="addonswitch[]" value="turnoff" id="switch" />-->
			<div class="description">
				List of RPC services for automatic pinging.<br />
				Example services:
				<ul style="list-style:none;padding-left:10px;">
				<li>http://rpc.pingomatic.com/</li>
				<li>http://rpc.blogrolling.com/pinger/</li>
				<li>http://ping.blo.gs/</li>
				</ul>
				You can copy &amp; paste these services, one on each line, to the form below to start pinging.
				<form method="post" action="index.php?view=addons">
					<input type="hidden" name="pinglistupdate" value="1" />
				  	<textarea name="pinglist" cols="40" rows="8"></textarea><br />
				  	<input type="submit" value="Update Pinglist" />
				</form>
			</div>
		</fieldset>
		
		<fieldset id="admin_12CropImage" class="box">
			<h2 class="caption">Admin Sample 12CropImage addon</h2>
			<h3 class="status off">(admin_12CropImage - version 1.0) - status: <a href="index.php?view=addons&amp;turnon=admin_12CropImage" title="Click to turn ON">OFF</a></h3>
			<!--<input type="checkbox" name="addonswitch[]" value="turnon" id="switch" />-->
		</fieldset>
		
		<fieldset id="advstat" class="box alt">
			<h2 class="caption">Advanced stats</h2>
			<h3 class="status off">(advanced_stat - version 1.0) - status: <a href="index.php?view=addons&amp;turnon=advanced_stat" title="Click to turn ON">OFF</a></h3>
			<!--<input type="checkbox" name="addonswitch[]" value="turnon" id="switch" />-->
		</fieldset>
		
		<fieldset id="imagesxy" class="box">
			<h2 class="caption">Image Sx/y</h2>
			<h3 class="status off">(_dwilkinsjr/image_sxsy - version 0.5) - status: <a href='index.php?view=addons&amp;turnon=_dwilkinsjr/image_sxsy' title='Click to turn it ON'>OFF</a></h3>
			<!--<input type="checkbox" name="addonswitch[]" value="turnon" id="switch" />-->
		</fieldset>
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