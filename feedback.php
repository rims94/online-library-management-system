<?php

include "navbar.php";
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $msg = $_POST['story'];
    include "connection.php";
    $sql = "INSERT INTO feedbacks(Email, Message) VALUES ('$email','$msg')";
    mysqli_query($db, $sql);
?>
    <script>
        alert("<?php echo 'Thank you for your concern !'; ?>");
    </script>
<?php

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
    <style>
       

        label, textarea {
            font-family: inherit;
            font-size: 16px;
            letter-spacing: 1px;
        }
        textarea {
            padding: 10px;
            line-height: 1.5;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-shadow: 1px 1px 1px #999;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        

        

    </style>
    
    <title>Feedback</title>
</head>
<body>

    
        <div class="header position-relative p-2 text-center d-flex justify-content-center align-items-center"><h4>If you have any query or suggestion,<br>feel free to share with us !</h4></div>
        <div class="feedback form-group position-relative d-flex flex-row justify-content-center align-items-center">
        <form method="post">
            <div class="email">
                <label for="email">Email : </label>
                <input type="email" name="email" id="email" placeholder="Your mail id" class="form-control" required>
            </div>
            <div class="message">
                <label for="story">Tell us your story:</label>
                <textarea id="story" name="story" rows="5" cols="33" class="form-control" required></textarea>
            </div>
            <div class="submit">
                <button type="submit" name="submit" id="submit" class="btn btn-block btn-primary">
                    <span>Post</span><span><i class="fas fa-paper-plane"></i></span>
                </button>
            </div>
        </form>
    </div>
    
</body>
</html>