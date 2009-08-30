<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Pixelpost Administration</title>
	
	<link href="styles/global.css" media="screen" rel="stylesheet" type="text/css"  />
	<link href="styles/dashboard.css" media="screen" rel="stylesheet" type="text/css"  />
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
		<a href="addons.php">Addons</a>
	</div>
	<!-- End Naviagtion -->
	<h2 class="title">Dashboard</h2>
	<!-- Begin Content -->
	<div id="content">
		<!-- Begin Dashboard -->
		<fieldset id="dashboard" class="box">
			<!-- Begin Column Wrapper -->
			<div class="colwrapper">
				<!-- Begin Left Column -->
				<div class="leftcolumn">
					<!-- Begin Getting Started -->
					<div id="gettingstarted">
						<h3>Getting started:</h3>
						<dl>
							<dd><a href="main.php">Post a photo</a></dd>
							<dd><a href="comments.php">Manage comments</a></dd>
							<dd><a href="http://www.pixelpost.org/extend/">Extend your photoblog</a></dd>
							<dd><a href="settings_template.php">Change your site's look or theme</a></dd>
							<dd><a href="settings_user.php">Update your profile or change your password</a></dd>
						</dl>
						<dl>
							<dt><label class="title">Need help with Pixelpost?</label></dt>
							<dd>Please see our <a href="http://www.pixelpost.org/docs/">documentation</a> or visit the <a href="http://www.pixelpost.org/forum/">support forums</a>.</dd>
						</dl>
					</div>
					<!-- End Getting Started -->
				</div>
				<!-- End Left Column -->
				<!-- Begin Right Column -->
				<div class="rightcolumn">
					<!-- Begin General Stats -->
					 <div id="blogstats">
						<h3>Blog statistics:</h3>
					     <dl>
							<dd>Total Photos in blog: 720</dd>
							<dd>Avg posted per week: 5</dd>
							<dd>Total visitors: 268478</dd>
							<dd>Avg visitors per day: 112</dd>
							<dd>Total comments: 1468</dd>
							<dd>Avg comments per image: 3</dd>
						</dl>
					 </div>
					 <!-- End General Stats -->
				</div>
				<!-- End Right Column -->
			</div>
			<!-- End Column Wrapper -->
		</fieldset>
		<!-- End Dashboard -->
		<!-- Begin Pixelpost Blog -->
		<fieldset id="pixelpost" class="box alt">
			<!-- Begin Blog Posts -->
			<div id="blogpost">
				<h3><a href="http://www.pixelpost.org/blog/">Pixelpost Blog</a><br /></h3>
				<dl>
					<dt><label class="title"><a href="http://www.pixelpost.org/blog/2008/01/16/pixelpost-v171-security-update/">Pixelpost v1.7.1 - Security Update</a> <span class="blogpostdate">January 16</span></label></dt>
					<dd class="box">
						You know what's best about open source applications such as Pixelpost?
						Everyone has the ability to look at our code and make sure that everything is secure.
						Well, as it turns out, someone did just that, and found a security flaw...
					</dd>
					<dt><label class="title"><a href="http://www.pixelpost.org/blog/2008/01/13/pixelpost-v17-better-than-ever/">Pixelpost v1.7 - Better than Ever</a> <span class="blogpostdate">January 13</span></label></dt>
				    <dd class="box alt">
						Ladies and Gentlemen,
						I am pleased to announce the immediate release of Pixelpost v1.7 (FINAL)!
						What does this mean to me?
						If you currently have a Pixelpost photoblog, you might want to upgrade in order to take advantage of the new super cool features, addons, and latest security measures...
				    </dd>
					<dt><label class="title"><a href="http://www.pixelpost.org/blog/2007/12/04/were-still-alive/">We're Still Alive!</a> <span class="blogpostdate">December 4</span></label></dt>
				    <dd class="box">
						Greetings All Pixelpost Users!

						We're just about ready to release the brand new Pixelpost v1.7, which I believe is our BEST version ever, but unfortunately, we have been experiencing some issues with our website.
						Rest assured, we are working to bring pixelpost.org back online as soon as possible, but in the mean time, you can still access the site using...
				    </dd>
				</dl>
			</div>
			<!-- End Blog Posts -->
		</fieldset>
		<!-- End Pixelpost Blog -->
		<!-- Begin Pixelpost Extend -->
		<fieldset id="ppextend" class="box">
			<!-- Begin Column Wrapper -->
			<div class="colwrapper">
				<!-- Begin Left Column -->
				<div class="leftcolumn">
					<!-- Begin Pixelpost Addons -->
					<div id="addons">
						<h3 class="caption"><a href="http://www.pixelpost.org/extend/addons/">Pixelpost Addons</a></h3>
						<dl>
							<dt><a href="http://www.pixelpost.org/extend/addons/adobe-photoshop-lightroom-export-plugin/">Adobe Photoshop Lightroom Export Plugin v1.0 (Beta)</a></dt>
							<dd><label class="title">Author:</label> <a href="http://www.pixelpost.org/forum/member.php?u=1287">jaywilliams+</a></dd>
							
							<dt><a href="http://www.pixelpost.org/extend/addons/aperture-pixelpost-plugin/">Aperture Pixelpost Plugin v1.3</a></dt>
							<dd><label class="title">Author:</label> <a href="http://www.pixelpost.org/forum/member.php?u=4398">macroni</a></dd>
							
							<dt><a href="http://www.pixelpost.org/extend/addons/text-archive-addon/">Text Archive Addon v1.2</a></dt>
							<dd><label class="title">Author:</label> <a href="http://www.pixelpost.org/forum/member.php?u=5859">kevincrafts</a></dd>
						</dl>
					</div>
					<!-- End Pixelpost Addons -->
				</div>
				<!-- End Left Column -->
				<!-- Begin Right Column -->
				<div class="rightcolumn">
					<!-- Begin Pixelpost Templates -->
					 <div id="template">
						<h3 class="caption"><a href="http://www.pixelpost.org/extend/templates/">Pixelpost Templates</a></h3>
						<dl>
							<dt><a href="http://www.pixelpost.org/extend/templates/templates-16-17-en-francais/">Templates 1.6 &amp; 1.7 en francais v1.1</a></dt>
							<dd><label class="title">Author:</label> <a href="http://www.pixelpost.org/forum/member.php?u=1344">phild</a></dd>
							
							<dt><a href="http://www.pixelpost.org/extend/templates/lafaille-template/">Lafaille template v2.0.2</a></dt>
							<dd><label class="title">Author:</label> <a href="http://www.pixelpost.org/forum/member.php?u=3096">fred-eric</a></dd>
							
							<dt><a href="http://www.pixelpost.org/extend/templates/horus-template/">Horus Template v1.0</a></dt>
							<dd><label class="title">Author:</label> <a href="http://www.pixelpost.org/forum/member.php?u=7200">Scarabaeus</a></dd>
						</dl>
					 </div>
					 <!-- Begin Pixelpost Templates -->
				</div>
				<!-- End Right Column -->
			</div>
			<!-- End Column Wrapper -->
		</fieldset>
		<!-- End Pixelpost Extend -->
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