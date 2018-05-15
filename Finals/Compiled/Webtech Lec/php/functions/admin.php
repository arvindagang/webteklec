<?php
	if(!isset($_SESSION['admin']) && $_SESSION['admin'] != true){
		header("Location: admin_book.php");
	}
?>