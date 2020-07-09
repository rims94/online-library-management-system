<?php

session_start();
include "navbar.php";
include "connection.php";

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
    
// Load Composer's autoloader
require 'vendor/autoload.php';
    
// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);


$errors=[];


if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $sql1 = "SELECT email FROM student WHERE email = '$email'";
    $result1 = mysqli_query($db,$sql1);

    if (empty($email)) {
        array_push($errors, "Your email is required");
    }else if(mysqli_num_rows($result1) <= 0) {
        array_push($errors, "Sorry, no user exists on our system with that email");
    }

    $token = bin2hex(random_bytes(50));

    if (count($errors) == 0) {
        $sql2 = "INSERT INTO password_reset(email, token) VALUES ('$email', '$token')";
        $result2 = mysqli_query($db, $sql2);

        

        try {
            //Server settings
        
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp-relay.sendinblue.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'info.at.e.library@gmail.com';                     // SMTP username
            $mail->Password   = 'hJfrE0bU2LwQKT9G';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        
            //Recipients
            $mail->setFrom('info.at.e.library@gmail.com', 'Online Library');
            $mail->addAddress($email);     // Add a recipient
        
        
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Reset Your Password';
            $mail->Body    = 'reset_pass.php?token=' . $token;
            $mail->AltBody = 'Reset Password';
        
            $mail->send();
            header("location: pending.php?email=" .$email);
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
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
<body style="height: 100vh; width: 100vw; background-image: url('carousel/passwordforgot.jpg')" class="text-center">
    <div class="form text-light position-relative d-flex flex-column justify-content-center align-items-center" style="top: 17.5%; left: 19.2%; height: 60vh; width: 25vw; background-color: #000000; background-image: linear-gradient(147deg, #000000 0%, #2c3e50 74%);">
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
            
            <div class="email form-group">
                <label for="email">Enter Your Mail :</label>
                <input type="email" class="form-control text-center" name="email" placeholder="enter your email" id="email">
            </div>
            <div class="submit form-group">
                <button type="submit" class="form-control btn btn-primary" name="submit">Send Link</button>
            </div>
        </form>    
    </div>
</body>
</html>