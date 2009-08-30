<?php
$message = '<div id="status"></div>';
$class = '';
$yesno = 'YES';
if(isset($_GET['ERROR']))
{
	$class = ' error';
	$yesno = 'NO';
	$message = '
	<div id="status" class="error roll">
	<h2 class="caption">Oops!</h2>
	Oops! There seems to be something wrong!
	<ul>
		<li>Your images folder is not writable.</li>
		<li>Your thumbnails folder is not writable.</li>
	</ul>
	<a href="#" id="closeBox">(dismiss)</a>
	</div>';	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Pixelpost Administration</title>
	
	<link href="styles/global.css" media="screen" rel="stylesheet" type="text/css"  />
	<link href="styles/info.css" media="screen" rel="stylesheet" type="text/css" />
	<link href="styles/import.css" media="screen" rel="stylesheet" type="text/css" />
		
	<script src="scripts/mootools.js" type="text/javascript"></script>
	<script src="scripts/info.functions.js" type="text/javascript"></script>
	
	<script type="text/javascript" src="http://www.pixelpost.org/service/version.js"></script>
	<script type="text/javascript">
		var installed_ver = '1.7.1';
	</script>
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
		<a href="info.php" class="active">Info</a>
		<a href="addons.php">Addons</a>
	</div>
	<!-- End Naviagtion -->
	<h2 class="title">Information</h2>
	<!-- Begin Sub-Navigation -->
	<div id="subnavigation">
		<a href="#" class="active">Info</a>
		<a href="#">AntiSpam Stats</a>
		<a href="#">Comment Stats</a>
	</div>
	<!-- End Sub-Navigation -->
	<!-- Begin Error Output -->
	<?php echo $message; ?>
	<!-- End Error Output -->
	<!-- Begin Content -->
	<div id="content">
		
		<fieldset id="ppinfo" class="box">
			
			<h3>Pixelpost Version</label></h3>
			
			<div class="frmwrapper">
				<p>
				You are running Pixelpost version: 1.8 (Better than Ever) - <?php echo date('F'); ?> 2008<br />
				Latest Pixelpost version: <script type="text/javascript">if(curr_ver>installed_ver)document.write(message);else document.write('You have the newest version of Pixelpost!');</script><br />
				Looking for help or want to give feedback, please step into the <a href="http://www.pixelpost.org/forum/">Pixelpost forum</a>.<br />
				<a href="http://www.pixelpost.org/donate">Help support Pixelpost and donate</a>!<br />
				</p>
			</div>
		
		</fieldset>
		
		<fieldset id="bloginfo" class="box alt">
			
			<h3>Pixelpost Information</label></h3>
			
			<h4 class="infoToggle infoHeading">Path Information</h4>
			<div class="element infoStart">
				<dl>
					<dd><strong>Configured image path:</strong> <span class="path">../images/</span></dd>
					<dd><strong>Configured thumbnail path:</strong> <span class="path">../thumbnails/</span></dd>
					<dd><strong>Image directory:</strong> <span class="found">Found</span> - <span class="notice<?php echo $class; ?>">Can we write to the directory? <strong><?php echo $yesno; ?></strong>. Current CHMOD: 0644</span></dd>
					<dd><strong>Thumbnails directory:</strong> <span class="found">Found</span> - <span class="notice<?php echo $class; ?>">Can we write to the directory? <strong><?php echo $yesno; ?></strong>. Current CHMOD: 0644</span></dd>
					<dd><strong>Language directory:</strong> <span class="found">Found</span></dd>
					<dd><strong>Addons directory:</strong> <span class="found">Found</span></dd>
					<dd><strong>Includes directory:</strong> <span class="found">Found</span></dd>
					<dd><strong>Templates directory:</strong> <span class="found">Found</span></dd>
				</dl>
			</div>
			<h4 class="infoToggle infoHeading">Host Information</h4>
			<div class="element infoStart">
				<dl>
					<dd><strong>URL:</strong> <span class="path">http://localhost/pixelpostSVN/admin/index.php</span></dd>
					<dd><strong>PHP-version:</strong> 5.2.5 (Pixelpost's min requirement: PHP version: 4.3.0&nbsp;)</dd>
					<dd><strong>Session save path:</strong> <span class="path">/Applications/MAMP/tmp/php</span></dd>
					<dd><strong>MySQL version:</strong> 5.0.41 (Pixelpost's min requirement: MySQL: 3.23.58&nbsp;)</dd>
					<dd><strong>GD-lib:</strong> bundled (2.0.34 compatible) with JPEG support</dd>
					<dd><strong>File Uploads:</strong> to Pixelpost site are possible.</dd>
					<dd><strong>Server Software:</strong> Apache/2.0.59 (Unix) PHP/5.2.5 DAV/2</dd>
				</dl>
			</div>
			<h4 class="infoToggle infoHeading">Export Information</h4>
			<div class="element infoStart">
				<dl>
					<dd>
						<form action="/" id="selectAll">
						<!-- Begin Plain Text Accordion -->
						<h4 class="codeToggle codeHeading">Plain Text</h4>
						<div class="element codeStart">
							Copy (Ctrl + C for Windows, &#8984; + C for Apple) the following information for use within the Pixelpost forum.
							<br />
							<textarea name="plainText" id="plainText" rows="38" cols="100"  tabindex="1" readonly="readonly">
Pixelpost Information:
	Version: 1.8


Host Information:
	URL: http://localhost/pixelpostSVN/admin/index.php

	PHP-version: 5.2.5 (Pixelpost's min requirement: PHP version: 4.3.0)

	Session save path: /Applications/MAMP/tmp/php

	MySQL version: 5.0.41 (Pixelpost's min requirement: MySQL: 3.23.58)

	GD-lib: bundled (2.0.34 compatible) with JPEG support

	File Uploads to Pixelpost site are possible.

	Server Software: Apache/2.0.59 (Unix) PHP/5.2.5 DAV/2


Path Information:
	Configured Image Path: ../images/

	Configured Thumbnail Path: ../thumbnails/

	Image Directory: Found - Can we write to the directory? YES. Current CHMOD: 0755

	Thumbnails Directory: Found - Can we write to the directory? YES. Current CHMOD: 0755

	Language Directory: Found

	Addons Directory: Found

	Includes Directory: Found

	Templates Directory: Found
							</textarea>
							<input type="button" value="Highlight Text" id="highlightText" onclick="javascript:this.form.plainText.focus();this.form.plainText.select();" />
						</div>
						<!-- End Plain Text Accordion -->
						<!-- Begin Forum Code Accordion -->
						<h4 class="codeToggle codeHeading">Forum BBCode</h4>
						<div class="element codeStart">
							Copy (Ctrl + C for Windows, &#8984; + C for Apple) the following information for use within the Pixelpost forum.
							<br />
							<textarea name="forumCode" id="forumCode" rows="38" cols="100"  tabindex="1" readonly="readonly">
[list]
[*]Pixelpost Information:
[list]
[*][b]Version:[/b] 1.8
[/list]
[/list]

[list]
[*]Host Information:
[list]
[*][b]URL:[/b] [url]http://localhost/pixelpostSVN/admin/index.php[/url]
[*][b]PHP-version:[/b] 5.2.5 [size=1][i](Pixelpost's min requirement: PHP version: 4.3.0)[/i][/size]
[*][b]Session save path:[/b] [i]/Applications/MAMP/tmp/php[/i]
[*][b]MySQL version:[/b] 5.0.41 [size=1][i](Pixelpost's min requirement: MySQL: 3.23.58)[/i][/size]
[*][b]GD-lib:[/b] bundled (2.0.34 compatible) with JPEG support
[*][b]File Uploads to Pixelpost site are possible.[/b]
[*][b]Server Software:[/b] Apache/2.0.59 (Unix) PHP/5.2.5 DAV/2
[/list]
[/list]

[list]
[*]Path Information:
[list]
[*][b]Configured Image Path:[/b] [i]../images/[/i]
[*][b]Configured Thumbnail Path:[/b] [i]../thumbnails/[/i]
[*][b]Image Directory: [color=green]OK[/color][/b] - Can we write to the directory? [b][color=green]YES[/b][/color]. Current CHMOD: [b]0755[/b]
[*][b]Thumbnails Directory: [color=green]OK[/color][/b] - Can we write to the directory? [b][color=green]YES[/b][/color]. Current CHMOD: [b]0755[/b]
[*][b]Language Directory: [color=green]OK[/color][/b]
[*][b]Addons Directory: [color=green]OK[/color][/b]
[*][b]Includes Directory: [color=green]OK[/color][/b]
[*][b]Templates Directory: [color=green]OK[/color][/b]
[/list]
[/list]
							</textarea>
							<input type="button" value="Highlight Text" id="highlightBBCode" onclick="javascript:this.form.forumCode.focus();this.form.forumCode.select();" />
						</div>
						<!-- End Forum Code Accordion -->
						</form>
					</dd>
				</dl>
			</div>
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