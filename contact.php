<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>PepCode-Coding Forum</title>
</head>

<body>
    <?php include 'partials/_header.php'; ?>

    <!-- sql to add contact to database -->
    <?php
        $showError=false;
        $showAlert=false;
        if ($_SERVER['REQUEST_METHOD']=="POST") {
            include 'partials/_dbconnect.php';
            $name=$_POST['name'];
            $email=$_POST['email'];
            $message=$_POST['message'];

            // check if email already exists
            $existsSql="SELECT * FROM `contact` WHERE `email`='$email'";
            $result=mysqli_query($conn,$existsSql);
            $numRows=mysqli_num_rows($result);
            if ($numRows>0) {
                $showError="Email already exists";
            }
            else{
                $sql="INSERT INTO `contact` (`name`, `email`, `concern`, `timestamp`) VALUES ('$name', '$email', '$message', current_timestamp())
                ";
                $result=mysqli_query($conn,$sql);
                if ($result) {
                    $showAlert=true;
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> We\'ll soon get in touch with you.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
                }
            }
        }
    ?>


    <!-- form starts here -->
    <div class="container">
        <h1 class="text-center my-3">Contact Us</h1>
        <form action="contact.php" method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                <div class="invalid-feedback">Please enter valid name.</div>
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email">
                <div class="invalid-feedback">Please enter valid email.</div>
            </div>
            
            <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" name="message" rows="3"></textarea>
                <div class="invalid-feedback">Please enter valid message.</div>
            </div>
            <button class="btn btn-success" id="submit">Submit</button>
        </form>
    </div>

    <!-- footer -->
    <?php include 'partials/_footer.php'; ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

</body>



</html>