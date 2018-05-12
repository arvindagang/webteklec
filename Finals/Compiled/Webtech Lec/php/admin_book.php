<?php
	session_start();
	require_once "functions/functions.php";
	
	require_once "template/header.php";
	

	
	$result = getAll($conn);
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Administrator Panel</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>


	<div id="container">
		<div id="column">
			<td><p class="lead">
				<a href="admin_add.php">Add new book</a>
			</p></td>
		</div>
		<div>
			<td><p class="lead">
				<a href="admin_add_user.php">Add new admin</a>
			</p></td>
		</div>
	</div>

	<a href="admin_signout.php" class="btn btn-primary">Sign out!</a>
	<table class="table" style="margin-top: 20px">
		<tr>
			<th>ISBN</th>
			<th>Title</th>
			<th>Author</th>
			<th>Image</th>
			<th>Description</th>
			<th>Price</th>
			<th>Publisher</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
		<?php while($row = mysqli_fetch_assoc($result)){ ?>
		<tr>
			<td><?php echo $row['book_isbn']; ?></td>
			<td><?php echo $row['book_title']; ?></td>
			<td><?php echo $row['book_author']; ?></td>
			<td><?php echo $row['book_image']; ?></td>
			<td><?php echo $row['book_descr']; ?></td>
			<td><?php echo $row['book_price']; ?></td>
			<td><?php echo getPubName($conn, $row['publisherid']); ?></td>
			<td><a href="admin_edit.php?bookisbn=<?php echo $row['book_isbn']; ?>">Edit</a></td>
			<td><a href="admin_delete.php?bookisbn=<?php echo $row['book_isbn']; ?>">Delete</a></td>
		</tr>
		<?php } ?>
	</table>

<?php
	if(isset($conn)) {mysqli_close($conn);}
	require_once "template/footer.php";
?>
</body>
</html>