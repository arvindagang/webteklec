<?php
	session_start();
	require_once "../functions/functions.php";
	require_once "../template/header.php";
	
	$conn = db_connect();
	$result = getAll($conn);

	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin -Create Admin</title>
</head>
<body>
	<form method="post" action="admin_add_user.php">
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" required>
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password" required>
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password2" required>
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="register_btn">Create Admin</button>
			<?php 
				if (isset($_POST['register_btn'])) {
					$username=$_POST['username'];
					$password=$_POST['password'];
					$query = "select * from admin";
					$query = "insert into admin ('username',password') values('$username','$password')";
					$query_run = mysqli_query($con,$query);
					
					
					header( "Location: admin.php");


				}
			?>
		</div>

	</form>





</body>
</html>