<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Pixelpost Administration</title>
	
	<link href="styles/global.css" media="screen" rel="stylesheet" type="text/css"  />
	<link href="styles/organize.css" media="screen" rel="stylesheet" type="text/css" />
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
		<a href="organize.php" class="active">Organize</a>
		<a href="comments.php">Comments</a>
		<a href="settings.php">Settings</a>
		<a href="info.php">Info</a>
		<a href="addons.php">Addons</a>
	</div>
	<!-- End Naviagtion -->
	
	<h2 class="title">Organize</h2>
	
	<!-- Begin Content -->
	<div id="content">
		<fieldset id="categories" class="box">
			
			<h3>Manage Categories</h3>
			
			<form method="post" action="index.php?view=categories&amp;action=edit" accept-charset="UTF-8">
			<div class="frmwrapper">
				<label for="editcat" class="title">Edit a Category</label>
				<select name="id" id="editcat">
					<option disabled="disabled">Choose a category</option>
					<option value="1">Default</option>
					<option value="2">People</option>
					<option value="3">Animals</option>
					<option value="4">Scenery</option>
					<option value="5">Nature</option>
					<option value="6">Urban</option>
				</select>
				<input type="submit" value="Edit Category"  class="submit" />
				<br />
			</div>
			</form>
			
			<form method="post" action="index.php?view=categories&amp;action=delete" accept-charset="UTF-8">
			<div class="frmwrapper">
				<label for="delcat" class="title">Delete a Category</label>
				<select name="id" id="delcat">
					<option value="" disabled="disabled">Choose a category</option>
					<option value="1">Default</option>
					<option value="2">People</option>
					<option value="3">Animals</option>
					<option value="4">Scenery</option>
					<option value="5">Nature</option>
					<option value="6">Urban</option>
				</select>
				<input type="submit" value="Delete Category" class="submit" />
				<br />
			</div>
			</form>
			
			<form method="post" action="index.php?view=categories&amp;action=add" accept-charset="UTF-8">
			<div class="frmwrapper">
				<label for="addcat" class="title">Add a Category</label>
				<input type="text" name="category" id="addcat" class="formfield medium" />
				<input type="submit" value="Add Category" class="submit pad" />
				<p class="notice">Add a category to which you can later assign an image to.</p>
				<br />
			</div>
			</form>
			
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