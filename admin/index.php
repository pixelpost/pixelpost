<?php
	define('SITETITLE', 'Visual Pixels');
	define('PP_VERSION', '1.8');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />  
	<title>Pixelpost Administration</title>
	
	<link href="styles/login.css" media="screen" rel="stylesheet" type="text/css" />
	
	<script src="scripts/mootools.js" type="text/javascript"></script>
	<script src="scripts/login.functions.js" type="text/javascript"></script>
</head>

<body>

<!-- Begin Wrapper -->
<div id="wrapper">
	<!-- Begin Header -->
	<div id="header">
		<h1><?php echo SITETITLE; ?></h1>
	</div>
	<!-- End Header -->
	<!-- Begin Content -->
	<div id="content">
		<!-- Begin Sign In -->
		<div id="signin">
			<h3>Sign in</h3>
			
			<div id="flashes"><div id="flash-errors" style="display:none"></div></div>
		
			<form action="?login" id="login" method="post">
				<dl>
					<dt><label for="email">Username</label></dt>
					<dd><input id="email" name="email" tabindex="1" type="text" value="admin" class="formfield" /></dd>
					<dt><label for="password">Password</label></dt>
					<dd><input id="password" name="password" tabindex="2" type="password" value="123456" class="formfield" /></dd>
					<dd><label>Remember me? <input checked="checked" id="remember_me" name="remember_me" type="checkbox" value="1" /></label></dd>
				</dl>
				<p class="btns"><input class="submit" value="Login" tabindex="4" type="submit" /></p>
			</form>
			<!-- Begin Links -->
			<div id="links">
				<p class="sleek">
					<a href="#" class="sleek">Back to <?php echo SITETITLE; ?> Photoblog</a><br /><a href="#" id="toggle">Forget your password?</a>
				</p>
			</div>
			<!-- End Links -->
			<!-- Begin Ask for Pass -->
			<div id="askforpass">
				<form action="?forget" id="reset-password" method="post">
					<p>Please enter the email address you registered with.<br />A new password will be emailed to you.</p>
					<p><input class="big formfield" id="reset_email" name="email" type="text" /></p>
					<p class="btns"><input class="submit" value="Send Email" tabindex="4" type="submit" /></p>
				</form>
			</div>
			<!-- End Ask for Pass -->
		</div>
		<!-- End Sign In -->
		<!-- Begin Footer -->
		<div id="footer">
			<p class="sleek"><a href="http://www.pixelpost.org/">Pixelpost v<?php echo PP_VERSION; ?></a></p>
		</div>
		<!-- End Footer -->
	</div>
	<!-- End Content -->
</div>
<!-- End Wrapper -->

</body>
</html>