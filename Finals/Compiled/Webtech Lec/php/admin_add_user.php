<?php
	session_start();
	require_once "./functions/functions.php";
	require_once "./template/header.php";
	$conn = db_connect();
	$result = getAll($conn);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin-Create Admin</title>
</head>
<body>
	<form method="post" action="admin_add_user.php">
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" required>
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="text" name="email" required>
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
			<button type="submit" class="btn" name="register_btn">Create Admin</button>
		</div>
	</form>
</body>
</html>