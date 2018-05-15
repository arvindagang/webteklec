<?php
  session_start();
  $count = 0;
  require_once "functions/functions.php";
  $conn = db_connect();

  $query = "SELECT book_isbn, book_image FROM books";
  $result = mysqli_query($conn, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($conn);
    exit;
  }

  $title = "Full Catalogs of Books";
  require_once "template/header.php";
?>
<!DOCTYPE html>
<html>
<head>
  <title>PHP Books</title>
</head>
<body>


  <p class="lead text-center text-muted">Full Catalogs of Books</p>
    <?php for($i = 0; $i < mysqli_num_rows($result); $i++){ ?>
      <div class="row">
        <?php while($query_row = mysqli_fetch_assoc($result)){ ?>
          <div class="col-md-3">
            <a href="book.php?bookisbn=<?php echo $query_row['book_isbn']; ?>">
              <img class="img-responsive img-thumbnail" src="img/<?php echo $query_row['book_image']; ?>">
            </a>
          </div>
        <?php
          $count++;
          if($count >= 5){
              $count = 0;
              break;
            }
          } ?> 
      </div>
<?php
      }
  if(isset($conn)) { mysqli_close($conn); }
  require_once "template/footer.php";
?>
</body>
</html>