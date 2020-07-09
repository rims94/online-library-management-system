<?php 


    include "navbar.php";



    if(isset($_POST['submit'])) {

        include "connection.php";
    
       
        $sql = "SELECT * FROM admin WHERE email = '$_POST[username]' && password = '$_POST[password]'";
        $result = mysqli_query($db, $sql);
        $count = mysqli_num_rows($result);
        printf($count);
        

        $row = mysqli_fetch_array($result, MYSQLI_BOTH);


        if ($count == 0) {
            echo "Username/Password Not Found !";
        } else {
            session_start();
            $_SESSION['admin'] = $row['email'];
            header("location: index.php");
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
    <!-- My CSS -->
    <!-- <link rel="stylesheet" href="css/style.css" type="text/css"> -->
    <title>Log IN</title>
</head>
<body style="height: 100vh; width: 100vw; background-image: url('carousel/sign_in.jpg')" class="text-center">
    <div class="border rounded border-light text-light form-container position-relative d-flex flex-column justify-content-center align-items-center" style="top: 20%; left: 12.5%; width: 40vw; height: 50vh; background-color: #000000; background-image: linear-gradient(147deg, #000000 0%, #2c3e50 74%);">
        <form class="form w-100 h-75" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <?php $error ?>
            <div class="header"><h1>Log In Here</h1></div>
            <div class="form-info position-relative" style="top: 15%;">
                <div class="m-3 form-username">
                    <label for="username">UserName <i class="fas fa-user"></i>:</label>
                    <input type="text" name="username" id="username"/>
                </div>
                <div class="m-3 form-password">
                    <label for="password">Password <i class="fas fa-key"></i>:</label>
                    <input type="password" name="password" id="password"/>
                </div>
                <div class="m-3 form-group form-login">
                    <button class="btn btn-primary" type="submit" name="submit" id="submit">LogIN</button>
                </div>
            </div>
        </form>
    </div>
    
</body>
</html>