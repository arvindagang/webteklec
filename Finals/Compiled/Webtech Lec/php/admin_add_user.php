<?php
	session_start();
	require_once "functions/functions.php";
	require_once "template/header.php";
	
	
	$result = getAll($conn);

	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin -Create Admin</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<form method="post" action="admin_add_user.php">
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
			<input type="password" name="password_1" required>
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2" required>
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="register_btn_admin">Create Admin</button>
			<?php 
				if (isset($_POST['register_btn_admin'])) {
						admin();
					}

				
			?>
		</div>

	</form>





</body>
</html>