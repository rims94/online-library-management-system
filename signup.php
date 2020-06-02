<?php

    include "navbar.php";


    if (isset($_POST['submit'])) {

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $password = $_POST['password'];
        $repeat_password = $_POST['repeat_password'];

        if (!$firstname && !$lastname && !$email && !$mobile &&!$password &&!$repeat_password) {    
?>

            <script type="text/javascript">
                alert("<?php echo 'Cannot Submit Blank Fields!' ?>");
            </script>

<?php

        }

        include "connection.php";
        
        $main_sql = "INSERT INTO student (firstname, lastname, email, mobile, password, repeat_password) 
                    VALUES ('$firstname','$lastname','$email','$mobile','$password','$repeat_password');";
        
        $result = mysqli_query($db, $main_sql);
        
        if(!$result){ 

?>

            <script>
                alert("<?php echo 'error : ' .mysqli_error($db); ?>");
            </script>

<?php

        } else {

?>

            <script type = "text/javascript">
                alert("Your Account Created Successfully !");
            </script>

<?php

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
    <title>Sign UP</title>
</head>
<body>
    <div class="form-container">
        <form class="form" action="" method="post">
            <div class="header"><h1>Sign Up Here</h1></div>
            
            <div class="form-group row">
            
              <div class="col-md-6">
                  <label for="firstname">First Name :</label>
                  <input type="text" name="firstname" id="firstname" class="form-control" placeholder="firstname" required>
              </div>  
              <div class="col-md-6">
                  <label for="laststname">Last Name :</label>
                  <input type="text" name="lastname" id="lastname" class="form-control" placeholder="lastname" required>
              </div>
            
            </div>
            <div class="form-group row">
            
              <div class="col-md-6">
                  <label for="email">Email :</label>
                  <input type="email" class="email form-control" name="email" id="email" placeholder="email" required>
              </div>
              <div class="col-md-6">
                  <label for="mobile">Phone No. :</label>
                  <input type="tel" name="mobile" id="mobile" class="form-control" placeholder="***-***-****" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>
              </div>
                
            </div>

            <div class="form-group row">
              
                <div class="col-md-6">
                    <label for="password">Password :</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="password" required>
                </div>
                <div class="col-md-6">
                    <label for="repeat-password">Repeat Password :</label>
                    <input type="password" class="form-control" name="repeat_password" id="repeat-password" placeholder="repeat password" required>
                </div>
                
            </div>
            <div class="form-group form-login">
                <button type="submit" name="submit" id="submit" class="btn btn-primary btn-lg btn-block">Sign Up</button>
            </div>
        </form>
    </div>

    

</body>
</html>