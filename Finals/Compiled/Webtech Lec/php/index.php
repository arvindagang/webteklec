<?php
	session_start();
	require_once "functions/functions.php";

?>
<!DOCTYPE html>
<html>
<head>
	<title>PHP</title>
	  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
      	<div class="container">
      	<a class="navbar-brand" href="../">Main Page</a>
      	</div>
    </nav>
	<form class="login-group" method="post" action="homepage.php">
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" required="">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password" required>
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_btn">Login</button>
		</div>
		<p>
			Not yet a member? <a href="register.php">Sign up</a>
		</p>
		
	</form>
</body>
</html>










    