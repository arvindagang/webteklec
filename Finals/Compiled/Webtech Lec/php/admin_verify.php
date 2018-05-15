<?php
	session_start();
	if(!isset($_POST['submit'])){
		echo "Error! Check again!";
		exit;
	}
	require_once "./functions/functions.php";
	$conn = db_connect();

	$username = trim($_POST['name']);
	$password = trim($_POST['pass']);

	if($username == "" || $password == ""){
		echo "Userame or Password is empty!";
		exit;
	}

	$username = mysqli_real_escape_string($conn, $username);
	$password = mysqli_real_escape_string($conn, $password);
	$password = md5($password);

	
	$query = "SELECT username, password from users";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Data is Empty " . mysqli_error($conn);
		exit;
	}
	$row = mysqli_fetch_assoc($result);

	if($username != $row['username'] && $password != $row['password']){
		echo "Userame or Password is wrong. Check again!";
		$_SESSION['admin'] = false;
		exit;
	}

	if(isset($conn)) {mysqli_close($conn);}
	$_SESSION['admin'] = true;
	header("Location: admin_book.php");
?>