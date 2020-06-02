<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--Font awesome library-->
  <script src="https://kit.fontawesome.com/9963ef9d00.js" crossorigin="anonymous"></script>
  <!--Google font-->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&family=Special+Elite&display=swap" rel="stylesheet">
  <!-- my stylesheet -->
  <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
  <nav>
    <div class="logo">
      <h4>Online Library Management System</h4>
    </div>
    <ul class="nav-links">
      <li><a href="index.php">Home</a></li>
      <li><a href="books.php">Books</a></li>
      
      <?php 
      if(isset($_SESSION['user'])) {
      ?>
        <li>
          <a href="profile.php">
            <div class="user">
              <?php 

              $email = $_SESSION['user'];

              $username = strstr($email, '@', true);
              echo $username;
              
              ?>    
            </div>
          </a>
        </li>
        <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> LogOut</a></li>
      <?php
      } else {
      ?>
        <li><a href="signup.php">SignUp</a></li>
      <?php
      }
      ?>

      <li><a href="feedback.php">Feedback</a></li>
    </ul>
    <div class="burger">
      <div class="line1"></div>
      <div class="line2"></div>
      <div class="line3"></div>
    </div>
  </nav>
  


  <?php 
      if(isset($_SESSION['user'])) {
      ?>
      
      <div class="admin text-right">
          <a href="admin_login.php" class="bg-warning text-primary">To log in as an Admin, Click here !</a>
      </div>
      <?php
      } else if(isset($_SESSION['admin'])) {
        ?>
      <div class="admin text-right">
          <a href="admin_login.php" class="bg-warning text-primary">To log in as a Student, Click here !</a>
      </div>
      <?php
      } else {
        ?>
        <div class="login d-flex justify-content-between">
          <div class="admin">
            <a href="admin_login.php" class="bg-warning text-primary">To log in as an Admin, Click here !</a>
          </div>
          <div class="admin">
            <a href="login.php" class="bg-warning text-primary">To log in as a Student, Click here !</a>
          </div>
        </div>
        <?php
      }
      ?>
  <script src="js/app.js"></script>
</body>
</html>