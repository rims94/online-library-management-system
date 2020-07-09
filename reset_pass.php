<?php


session_start();
include "navbar.php";
include "connection.php";


$errors=[];


if (isset($_POST['submit'])) {
    $new_pass = $_POST['password'];
    $new_pass_r = $_POST['repeat_password'];

    $token = $_SESSION['token'];

    if (empty($new_pass) || empty($new_pass_r)) array_push($errors, "Password is required");
    if ($new_pass !== $new_pass_r) array_push($errors, "Password do not match");
    
    if (count($errors) == 0) {
      // select email address of user from the password_reset table 
      $sql = "SELECT email FROM password_reset WHERE token='$token' LIMIT 1";
      $results = mysqli_query($db, $sql);
      $email = mysqli_fetch_assoc($results)['email'];
  
        if ($email) {
            $new_pass = md5($new_pass);
            $sql = "UPDATE student SET password='$new_pass' WHERE email='$email'";
            $results = mysqli_query($db, $sql);
            header('location: index.php');
        }
    }
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <!-- font awesome cdn -->
    <script src="https://kit.fontawesome.com/9963ef9d00.js" crossorigin="anonymous"></script>
 
    
    <title>Reset Password</title>
</head>
<body style="height: 100vh; width: 100vw; background-image: url('carousel/forgotpassword.jpg')" class="text-center">


    <div class="form border rounded border-light position-relative d-flex flex-column justify-content-center align-items-center text-light" style="top: 20%; left:19.2%; width: 30vw; height:50vh; background-color: #000000; background-image: linear-gradient(147deg, #000000 0%, #2c3e50 74%);">
        <form action="" method="post">
            <div class="header">
                <h3 class="form-title">Reset Password</h3>
            </div>
            
            <?php  if (count($errors) > 0) : ?>
              <div class="msg">
              	<?php foreach ($errors as $error) : ?>
              	  <span><?php echo $error ?></span>
              	<?php endforeach ?>
              </div>
            <?php  endif ?>
            
            <div class="password form-group">
                <label for="password">Enter New Password :</label>
                <input type="password" class="form-control text-center" name="password" placeholder="enter new password" id="password">
            </div>
            <div class="repeat_password form-group">
                <label for="repeat_password">Re-enter New Password :</label>
                <input type="password" class="form-control text-center" name="repeat_password" placeholder="re-enter new password" id="repeat_password">
            </div>
            <div class="submit form-group">
                <button type="submit" class="form-control btn btn-primary" name="submit">Reset Password</button>
            </div>
        </form>    
    </div>


</body>
</html>