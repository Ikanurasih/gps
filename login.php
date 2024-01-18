<!DOCTYPE html>
<html>
	<head>
		<title>Login GPS</title>
		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
		
		<link rel='stylesheet' href='css/style-login.css' type='text/css' />
		<link href='http://fonts.googleapis.com/css?family=Lobster|Raleway' rel='stylesheet' type='text/css'>
		
	</head>
	
	<body id="induk">
		<div id="header">
			<u class="logo" href="">
				<img src="images/satelit.png" width="65" /> GPS Tracking System
			</u>
		</div>
		
		<div id="active_tab_page" class="tabbar2">
			<div class="login_form">
				<form id="login_form" action="loginact.php" method="post">
					<?php echo $_GET['error']; ?>
					<div class="login_form_label">
						Nama Pengguna :
					</div>
					<input class="login_form_field" type="text" name="username" value="" />
					
					<div class="login_form_label">
						Kata Kunci :
					</div>
					<input class="login_form_field" type="password" name="password" />
					
					
					<input class="button" id="login" type="submit" value="Masuk" />				
				</form>
			</div>
		</div>
		
		<div class="login_center">
			<div class="login_center">
				Copyright by GpsTrackSystem.com &copy; <?php echo date('Y'); ?>
			</div>
		</div>
	</body>
</html>