<?php
	session_start();
	require_once ('dbconfig/config.php');
	
?>
<!DOCTYPE html>
<html>
<head>
<title>PHP Login Page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div id="main-wrapper">
	<center><h2>Login</h2></center>
			<div class="imageContainer">
				<img src="images/loginImage.png" alt="Avatar" class="avatar">
			</div>
		<form action="index.php" method="post">
		
			<div class="innerContainer">
				<label><b>Username</b></label>
				<input type="text" placeholder="Enter Username" name="username" required>
				<label><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="password" required>
				<button class="loginButton" name="login" type="submit">Login</button>
				<p><b>Not Yet A Member? <b></p>

				<a href="register.php"><button type="button" class="registerButton">Register</button></a>
			</div>
		</form>

<?php
			if(isset($_POST['login']))
			{
				@$username=$_POST['username'];
				@$password=$_POST['password'];
				$query = "select * from user where username='$username' and password='$password' ";
				//echo $query;
				$query_run = mysqli_query($con,$query);
				//echo mysql_num_rows($query_run);
				if($query_run)
				{
					if(mysqli_num_rows($query_run)>0)
					{
					$row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
					
					$_SESSION['username'] = $username;
					$_SESSION['password'] = $password;
					
					header( "Location: admin/index.php");
					}
					else
					{
						echo '<script type="text/javascript">alert("No such User exists. Invalid Credentials")</script>';
					}
				}
				else
				{
					echo '<script type="text/javascript">alert("Database Error")</script>';
				}
			}
			else
			{
			}
		?>

	</body>
</html>