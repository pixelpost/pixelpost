<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Pixelpost Administration</title>
	
	<link href="styles/global.css" media="screen" rel="stylesheet" type="text/css"  />
	<link href="styles/browse.css" media="screen" rel="stylesheet" type="text/css" />
	<link href="styles/import.css" media="screen" rel="stylesheet" type="text/css" />
	
	<script src="scripts/mootools.js" type="text/javascript"></script>
	<script src="scripts/browse.functions.js" type="text/javascript"></script>
	
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
		<a href="browse.php" class="active">Browse</a>
		<a href="organize.php">Organize</a>
		<a href="comments.php">Comments</a>
		<a href="settings.php">Settings</a>
		<a href="info.php">Info</a>
		<a href="addons.php">Addons</a>
	</div>
	<!-- End Naviagtion -->
	
	<h2 class="title">Browse</h2>
	
	<!-- Begin Sub-Navigation -->
	<div id="subnavigation">
		<a href="#" id="show_filter">Filter</a>
		<a href="#" id="show_massedit">Mass Edit</a>
		<a href="#" id="show_allinfo">Show All Info</a>
	</div>
	<!-- End Sub-Navigation -->
	
	<!-- Begin Content -->
	<div id="content">
		<form method="post" id="filter_form" action="index.php?view=images" accept-charset="UTF-8">
		
		<fieldset id="filter" class="box">
			
			<h3>Filter</h3>
			
			<div class="frmwrapper">
				<label for="selectfcat" class="title">Show Categories:</label>
				<select name="selectfcat" id="selectfcat">
					<option value="" selected="selected">All</option>
					<option value="1">Animals</option>
					<option value="2">Default</option>
					<option value="3">Nature</option>
					<option value="4">People</option>
					<option value="5">Scenery</option>
					<option value="6">Sports</option>
					<option value="7">Urban</option>
				</select>
				<input class="cmnt-buttons" type="submit" name="filtercat" value="Go!" />
				<br />

				<label for="selectftag" class="title">Show Tags English:</label>
				<select name="selectftag" id="selectftag">
					<option value="all" selected="selected">All</option>
					<option value="dirty">dirty</option>
					<option value="female">female</option>
					<option value="sexy">sexy</option>
					<option value="soccer">soccer</option>
					<option value="sports">sports</option>
				</select>
				<input class="cmnt-buttons" type="submit" name="filtertag" value="Go!" />
				<br />

				<label for="selectfalttag" class="title">Show Tags Polski:</label>
				<select name="selectfalttag" id="selectfalttag">
					<option value="all" selected="selected">All</option>
					<option value="brudny">brudny</option>
					<option value="dziewczyna">dziewczyna</option>
					<option value="seksowny">seksowny</option>
					<option value="piłka_nożna">piłka nożna</option>
					<option value="sporty">sporty</option>
				</select>
				<input class="cmnt-buttons" type="submit" name="filteralttag" value="Go!" />
				<br />

				<label for="selectfmon" class="title">Show Month:</label>
				<select name="selectfmon" id="selectfmon">
					<option value="" selected="selected">All</option>
					<option value="2008-03">2008-03</option>
				</select>
				<input class="cmnt-buttons" type="submit" name="filtermon" value="Go!" />
				<br />

				<label for="findfid" class="title">Show ID:</label>
				<input type="text" size="6" name="findfid" id="findfid" value="" class="formfield extrasmall" />
				<input class="cmnt-buttons" type="submit" name="findid" value="Go!" />
				<br />
			</div>
						
		</fieldset>
		
		</form>
		<form method="post" id="manageposts" accept-charset="UTF-8" action="?view=images&amp;page=0">
		
		<fieldset id="massedit" class="box alt">
			
			<h3>Mass Edit Functions</h3>
			
			<div class="frmwrapper">
				<input type="button" name="checkall" id="checkall" value="Mass Select/Deselect" />

				<input type="submit" name="submitdelete" id="submitdelete" value="Delete selected" onclick="return (confirm('Delete all selected images? \n  \'Cancel\' to stop, \'OK\' to delete.')) ? document.getElementById('manageposts').action='index.php?view=images&amp;action=massdelete' : false;"/>

				<input type="submit" name="submitpublish" id="submitpublish" value="Publish Selected" onclick="return (confirm('Publish all selected images? \n  \'Cancel\' to stop, \'OK\' to publish.')) ? document.getElementById('manageposts').action='index.php?view=images&amp;action=masspublish' : false;"/>
				<br />
				<br />
			</div>
			
			<h3>Mass Edit Categories</h3>
			
			<div class="frmwrapper">
				<label for="mass-edit-cat" class="title">Category:</label>
				<select name="mass-edit-cat" id="mass-edit-cat" onchange="document.getElementById('manageposts').action='index.php?view=images&amp;action=masscatedit&amp;cmd='+this.options[this.selectedIndex].value; ">
					<option value ="0" disabled="disabled">Choose a category</option> 
					<option value="1">Animals</option>
					<option value="2">Default</option>
					<option value="3">Nature</option>
					<option value="4">People</option>
					<option value="5">Scenery</option>
					<option value="6">Sports</option>
					<option value="7">Urban</option>
				</select>
				<br />

				<label for="unassign_cat" class="title">UnAssign category:</label>
				<input type="checkbox" id="unassign_cat" name="unassign_cat" value="assign" />
				<p class="notice">If left unchecked, the category will be assigned.</p>
				<br />
			</div>
			
			<h3>Mass Edit Tags</h3>
			
			<div class="frmwrapper">
				<label for="masstag" class="title">Tags:</label>
				<input type="text" size="40" name="masstag" id="masstag" value="" class="formfield long" />
				<p class="notice">
					Enter the tag(s) you wish to add or remove. You may seperate multiple tags by space, comma, or semicolon.
				</p>
				<br />
				
				<label for="masstagopt" class="title">Action:</label>
				<select name="masstagopt" id="masstagopt">
					<option value ="0" disabled="disabled">Choose an option</option> 
					<option value="set">Add default language tag(s)</option>
					<option value="set2">Add alternative language tag(s)</option>
					<option value="unset">Remove tag(s)</option>
				</select>
				<br />
			</div>
			
			<input type="submit" name="submit-mass-catedit" id="submit-mass-edit" value="Update in mass" />
			<input type="reset" name="reset-mass-catedit" id="reset-mass-edit" value="Reset" />
			
		</fieldset>
		<fieldset id="browse3" class="box">
			
			<h2 class="caption dim">Soccer (Piłka nożna)</h2>
			<h3 class="photoid dim" title="Image ID"><label for="checkbox3">123</label></h3>
			
			<input type="checkbox" name="moderate_image_boxes[]" id="checkbox3" value="3" class="imgchkbox" />
			
			<div class="imagemenu">
				<a href="#">[Edit]</a> <a href="#">[Preview]</a> <a href="#">[Delete]</a> 
			</div>
			
			<div class="imagewrapper">

				<a href="#">
					<img src="images/thumb_20080302103438.jpg" alt="View image"  />
				</a>
				<ul class="imageinfo">
					<li title="2008-04-02 04:03:30">To be published in: 5 minutes</li>
					<li>Categories: [People] [Sports]</li>
					<li>Tags: dirty, female, sexy, soccer, sports <span title="(Polski tagi)">(brudny, dziewczyna, seksowny, piłka nożna, sporty)</span></li>
				</ul>
				<div class="extrainfo">
					<a href="#" class="toggleinfo imagemenu">[Show More Info]</a>
					<ul class="imageinfo toggle">
						<li>File-name: thumb_20080302103438.jpg</li>
						<li>Dimensions: 320 x 480, 88.648 KB</li>
					</ul>
				</div>
				
			</div>
			
		</fieldset>
		<fieldset id="browse2" class="box alt">
			
			<h2 class="caption dim">Soccer (Piłka nożna)</h2>
			<h3 class="photoid dim" title="Image ID"><label for="checkbox2">12</label></h3>

			<input type="checkbox" name="moderate_image_boxes[]" id="checkbox2" value="2" class="imgchkbox" />
			
			<div class="imagemenu">
				<a href="#">[Edit]</a> <a href="#">[Preview]</a> <a href="#">[Delete]</a> 
			</div>

			<div class="imagewrapper">

				<a href="#">
					<img src="images/thumb_20080302103439.jpg" alt="View image"  />
				</a>
				<ul class="imageinfo">
					<li title="2008-03-02 01:03:30">Published: 18 hours ago</li>
					<li>Categories: [People] [Sports]</li>
					<li>Tags: dirty, female, sexy, soccer, sports <span title="(Polski tagi)">(brudny, dziewczyna, seksowny, piłka nożna, sporty)</span></li>
				</ul>
				<div class="extrainfo">
					<a href="#" class="toggleinfo imagemenu">[Show More Info]</a>
					<ul class="imageinfo toggle">
						<li>File-name: thumb_20080302103439.jpg</li>
						<li>Dimensions: 320 x 480, 88.648 KB</li>
					</ul>
				</div>
				
			</div>
			
		</fieldset>
		<fieldset id="browse1" class="box">
			
			<h2 class="caption dim">Soccer (Piłka nożna)</h2>
			<h3 class="photoid dim" title="Image ID"><label for="checkbox1">1</label></h3>
			
			<input type="checkbox" name="moderate_image_boxes[]" id="checkbox1" value="1" class="imgchkbox" />
			
			<div class="imagemenu">
				<a href="#">[Edit]</a> <a href="#">[Preview]</a> <a href="#">[Delete]</a> 
			</div>
			
			<div class="imagewrapper">
				<a href="#">
					<img src="images/thumb_20080302103437.jpg" alt="View image" />
				</a>
				<ul class="imageinfo">
					<li title="2008-02-02 01:00:00">Published: 2 days ago</li>
					<li>Categories: [People] [Sports]</li>
					<li>Tags: dirty, female, sexy, soccer, sports <span title="(Polski tagi)">(brudny, dziewczyna, seksowny, piłka nożna, sporty)</span></li>
				</ul>
				<div class="extrainfo">
					<a href="#" class="toggleinfo imagemenu">[Show More Info]</a>
					<ul class="imageinfo toggle">
						<li>File-name: thumb_20080302103437.jpg</li>
						<li>Dimensions: 320 x 480, 88.648 KB</li>
					</ul>
				</div>
				
			</div>
			
		</fieldset>
		
		</form>
	</div>
	<!-- End Content -->
	
	<!-- Begin Pagination -->
	<div id="pagination">
		
		<div class="pagination">
			<?php if(isset($_GET['page']) && $_GET['page'] > 1){ ?>
			<a href="<?php echo (isset($_GET['page'])) ? ($_GET['page'] > 5) ? '?page=4' : '?page='.($_GET['page'] - 1) : '?page=1'; ?>">Previous</a>
			<?php } ?>
				
			<input type="text" name="pagination" id="pagination_value" value="<?php echo (isset($_GET['page'])) ? ($_GET['page'] > 5) ? '5' : $_GET['page'] : '1'; ?>" class="formfield extrasmall" onfocus="this.value = '';" onblur="this.value = '<?php echo (isset($_GET['page'])) ? ($_GET['page'] > 5) ? '5' : $_GET['page'] : '1'; ?>';" onkeydown="pagination_listener(event);" /> <span class="out_of">/ 5</span>
	
			<a href="<?php echo (isset($_GET['page'])) ? '?page='.($_GET['page'] + 1) : '?page=2'; ?>">Next</a>
		</div>
		
	</div>
	<!-- End Pagination -->
	
	<!-- Begin Footer -->
	<div id="footer">
		<span id="copyright">2008 <a href="http://www.pixelpost.org/">Pixelpost v1.8</a></span>
	</div>
	<!-- End Footer -->
	
</div>
<!-- End Wrapper -->
</body>
</html>