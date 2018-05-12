<?php
	session_start();

	$conn = $db = mysqli_connect('localhost', 'root', '', 'web');
if (isset($_POST['login_btn'])) {
	login();
}

function login(){
	global $conn, $username, $err;

	$username = e($_POST['username']);
	$username = e($_POST['username']);

	if(count($err)==0){
		$password = md5($password);

		$query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
		$results = mysqli_query($conn, $query);

		if(mysqli_num_rows($results) == 1) { // user found
			// check if user is admin or user
			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['user_type'] == 'admin') {

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: admin/admin.php');		  
			}else{
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";

				header('location: homepage.php');
			}
		}else {
			echo '<script type="text/javascript">alert("No such User exists. Invalid Credentials")</script>';
		}
	}
}