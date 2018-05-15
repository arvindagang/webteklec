<?php
	session_start();
	require_once "template/header.php";
	require_once "functions/functions.php";
	$row = select4LatestBook($conn);
?>

<!DOCTYPE html>
<html>
<head>
	<title>PHP</title>
</head>
<p class ="lead	text-center	text-muted">Latest Books</p>
<div class="row">
	<?php foreach($row as $book) { ?>
	<div class="col-md-3">
      		<a href="book.php?bookisbn=<?php echo $book['book_isbn']; ?>">
           <img class="img-responsive img-thumbnail" src="img/<?php echo $book['book_image']; ?>">
          </a>
      	</div>
        <?php } ?>
      </div>
<?php
  if(isset($conn)) {mysqli_close($conn);}
  require_once "template/footer.php";
?>
</html>





