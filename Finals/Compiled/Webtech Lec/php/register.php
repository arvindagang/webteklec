<?php 
	include('functions/functions.php') 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="header">
</div>
<form method="post" action="register.php">

	<div class="input-group">
		<label>Username</label>
		<input type="text" name="username" required>
	</div>
	<div class="input-group">
		<label>Email</label>
		<input type="email" name="email" required>
	</div>
	<div class="input-group">
		<label>Password</label>
		<input type="password" name="password" required>
	</div>
	<div class="input-group">
		<label>Confirm password</label>
		<input type="password" name="cpassword" required>
	</div>
	<div class="input-group">
		<button type="submit" class="btn" name="register_btn">Register</button>
	</div>
	<p>
		Already a member? <a href="index.php">Sign in</a>
	</p>
</form>

</body>
</html>