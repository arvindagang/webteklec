<?php
	session_start();
	require_once('dbconfig/config.php');
	//phpinfo();
?>
<!DOCTYPE html>
<html>
<head>
<title>Home Page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div id="main-wrapper">
		<center><h2>Welcome To</h2></center>
		
		
		<form action="index.php" method="post">
			<div class="imageContainer">
				<img src="images/loginImage.png" alt="Avatar" class="avatar">
			</div>
			<div class="innerContainer">
				<button class="logoutButton" type="submit">Log Out</button>	
			</div>
		</form>
	</div>
</body>
</html>