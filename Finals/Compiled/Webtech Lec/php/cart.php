<?php

	session_start();
	require_once "functions/functions.php";
	require_once "functions/cart_functions.php";

	$number = 1;
	echo $number;
	$query = "SELECT * FROM questions
        			WHERE question = $number";
     $result = mysqli_query($conn,$query);
	require "template/header.php";


?>

<!DOCTYPE html>
<html>

<head>
    
    <title>Cart Quiz</title>
   <link rel="stylesheet" type="text/css" href="css/style.css">
    
</head>

<body>
   
   
        <div class="container">
            <div class="current" style="color: yellow"> CART QUIZ: Question 1</div>
            <p class="question" name='question'>
               <?php 

                    $question = mysqli_fetch_assoc($result);
                    echo $question['text'];
                ?>
            </p>
            <form method="post" action="answer.php">
                <ul class="choices" style="color: yellow; list-style-type:none;text-align: left">
                    <li><input name="choice" type="radio" value="1" />Hypertext Preprocessor</li>
                    <li><input name="choice" type="radio" value="1" />Personal Hyper Page</li>
                    <li><input name="choice" type="radio" value="1" />Personal Hypertext Preprocessor</li>
                    <li><input name="choice" type="radio" value="1" />People Hypertext Preprocessor</li>
                </ul>
                <input type="submit" value="submit" />
            </form>
        </div>
   

   
</body>

</html>
<?php
if(isset($conn)){ mysqli_close($conn); }
	require_once "template/footer.php";
?>