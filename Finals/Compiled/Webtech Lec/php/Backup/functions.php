<?php
	$conn = mysqli_connect("localhost", "root", "", "web");
function db_connect(){
		$conn = mysqli_connect("localhost", "root", "", "web");
		if(!$conn){
			echo "Can't connect database " . mysqli_connect_error($conn);
			exit;
		}
		return $conn;
	}




	function select4LatestBook($conn){
		$row = array();
		$query = "SELECT book_isbn, book_image FROM books ORDER BY book_isbn DESC";
		$result = mysqli_query($conn, $query);
		if(!$result){
		    echo "Can't retrieve data " . mysqli_error($conn);
		    exit;
		}
		for($i = 0; $i < 4; $i++){
			array_push($row, mysqli_fetch_assoc($result));
		}
		return $row;
	}

	function getBookByIsbn($conn, $isbn){
		$query = "SELECT book_title, book_author, book_price FROM books WHERE book_isbn = '$isbn'";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Can't retrieve data " . mysqli_error($conn);
			exit;
		}
		return $result;
	}

	function getOrderId($conn, $customerid){
		$query = "SELECT orderid FROM orders WHERE customerid = '$customerid'";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "retrieve data failed!" . mysqli_error($conn);
			exit;
		}
		$row = mysqli_fetch_assoc($result);
		return $row['orderid'];
	}

	function insertIntoOrder($conn, $customerid, $total_price, $date, $ship_name, $ship_address, $ship_city, $ship_zip_code, $ship_country){
		$query = "INSERT INTO orders VALUES 
		('', '" . $customerid . "', '" . $total_price . "', '" . $date . "', '" . $ship_name . "', '" . $ship_address . "', '" . $ship_city . "', '" . $ship_zip_code . "', '" . $ship_country . "')";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Insert orders failed " . mysqli_error($conn);
			exit;
		}
	}

	function getbookprice($isbn){
		$conn = db_connect();
		$query = "SELECT book_price FROM books WHERE book_isbn = '$isbn'";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "get book price failed! " . mysqli_error($conn);
			exit;
		}
		$row = mysqli_fetch_assoc($result);
		return $row['book_price'];
	}

	function getCustomerId($name, $address, $city, $zip_code, $country){
		$conn = db_connect();
		$query = "SELECT customerid from customers WHERE 
		name = '$name' AND 
		address= '$address' AND 
		city = '$city' AND 
		zip_code = '$zip_code' AND 
		country = '$country'";
		$result = mysqli_query($conn, $query);
		// if there is customer in db, take it out
		if($result){
			$row = mysqli_fetch_assoc($result);
			return $row['customerid'];
		} else {
			return null;
		}
	}

	function setCustomerId($name, $address, $city, $zip_code, $country){
		$conn = db_connect();
		$query = "INSERT INTO customers VALUES 
			('', '" . $name . "', '" . $address . "', '" . $city . "', '" . $zip_code . "', '" . $country . "')";

		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "insert false !" . mysqli_error($conn);
			exit;
		}
		$customerid = mysqli_insert_id($conn);
		return $customerid;
	}

	function getPubName($conn, $pubid){
		$query = "SELECT publisher_name FROM publisher WHERE publisherid = '$pubid'";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Can't retrieve data " . mysqli_error($conn);
			exit;
		}
		if(mysqli_num_rows($result) == 0){
			echo "Empty books ! Something wrong! check again";
			exit;
		}

		$row = mysqli_fetch_assoc($result);
		return $row['publisher_name'];
	}

	function getAll($conn){
		$query = "SELECT * from books ORDER BY book_isbn DESC";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Can't retrieve data " . mysqli_error($conn);
			exit;
		}
		return $result;
	}
	
$username = "";
$email    = "";
$errors   = array();

if (isset($_POST['register_btn'])) {
	register();
}
	
function register(){
	// call these variables with the global keyword to make them available in function
	global $conn, $errors, $username, $email;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$username    =  e($_POST['username']);
	$email       =  e($_POST['email']);
	$password    =  e($_POST['password']);
	$cpassword   =  e($_POST['cpassword']);

	

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password);//encrypt the password before saving in the database

		if (isset($_POST['usertype'])) {
			$user_type = e($_POST['usertype']);
			$query = "INSERT INTO users (username, email, usertype, password) 
					  VALUES('$username', '$email', '$usertype', '$password')";
			mysqli_query($conn, $query);
			$_SESSION['success']  = "New user successfully created!!";
			header('location: homepage.php');
		}else{
			$query = "INSERT INTO users (username, email, usertype, password) 
					  VALUES('$username', '$email', 'user', '$password')";
			mysqli_query($conn, $query);

			// get id of the created user
			$logged_in_user_id = mysqli_insert_id($conn);

			$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
			$_SESSION['success']  = "You are now logged in";
			header('location: index.php');				
		}
	}
}
function admin(){
	global $conn, $errors, $username, $email;

	$username    =  e($_POST['username']);
	$email       =  e($_POST['email']);
	$password  =  e($_POST['password']);
	$cpassword  =  e($_POST['cpassword']);
	
	if (count($errors) == 0) {
		$password = md5($password);//encrypt the password before saving in the database

		if (isset($_POST['usertype'])) {
			$usertype = 'admin';
			$query = "INSERT INTO admin (username, email, usertype, password) 
					  VALUES('$username', '$email', '$usertype', '$password')";
			mysqli_query($conn, $query);
			$_SESSION['success']  = "New user successfully created!!";
			header('location: ../index.php');
		}else{
			
		}
}
}
function getUserById($userId){
	global $conn;
	$query = "SELECT * FROM users WHERE userId=" . $userId;
	$result = mysqli_query($conn, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

function e($val){
	global $conn;
	return mysqli_real_escape_string($conn, trim($val));
}

if (isset($_POST['login_btn'])) {
	login();
}

// LOGIN USER
function login(){
	global $conn, $username, $errors;

	// grap form values
	$username = e($_POST['username']);
	$password = e($_POST['password']);

	// make sure form is filled properly
	

	// attempt login if no errors on form
	if (count($errors) == 0) {
		$password = md5($password);

		$query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
		$results = mysqli_query($conn, $query);

		if (mysqli_num_rows($results) == 1) { // user found
			// check if user is admin or user
			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['usertype'] == 'admin') {

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: admin_book.php');		  
			}else{
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";

				header('location: homepage.php');
			}
		}else {
			echo '<script type="text/javascript">alert("No such User exists. Invalid Credentials")</script>';
			header('location: index.php');
		}
	}
}

?>
