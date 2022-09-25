



<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <style>
      #ques{
        min-height:100vh;
      }
    </style>

  <title>Welcome to PepCode - Coding Forums</title>
</head>

  <?php
  include 'partials/_dbconnect.php'; 
  ?>




   
    <div class="container my-4">
    <div class="alert alert-success" role="alert">
  <h4 class="alert-heading"> Welcome  </h4>
  <p>Hey , How are you doing?  welcome to PepCode.  You are logged in as Admin </p>
  <hr>
  <p class="mb-0">Whenever you need to, be sure to logout <a href="partials/_logout.php"> using this link.</a></p>
</div>
    </div>









  
<?php
error_reporting(0);



if(isset($_POST['title'])){

$th_desc =  $_POST['title'];
$th_descc =  $_POST['comment'];

$th_desc =str_replace("<","&lt;",$th_desc);
$th_desc =str_replace(">","&gt;",$th_desc);
$th_descc=str_replace("<","&lt;",$th_descc);
$th_descc =str_replace(">","&gt;",$th_descc);

$sql = "INSERT INTO `categories` ( `category_name`, `category_description`, `created`)
          VALUES ( '$th_desc', '$th_descc', current_timestamp());"; 
$result = mysqli_query($conn, $sql);

header('Location:index.php');

}
?>

<div class="container mb-3">
<form action="admin.php" method="POST">
<h1 class="py-2">Post a Category</h1>

<div class="form-group">
<label for="exampleInputEmail1">Category title</label>
       <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" placeholder="Title">
    <label for="exampleFormControlTextarea1">Category Discription</label>
    <textarea class="form-control" id="comment" name="comment" rows="3" placeholder="Discription"></textarea>
 
</div>

<button type="submit" class="btn btn-success">Post </button>
</form>

</div>




<?php
  include 'partials/_footer.php'; 
  ?>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>