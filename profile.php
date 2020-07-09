<?php
    session_start();
    include "navbar.php";
    include "connection.php";
    // echo "Welcome " . $_SESSION["user"] . "!";



    $user=$_SESSION["user"];
    $sql = "SELECT firstname,lastname,mobile FROM student WHERE  email = '$user'";
    $result = mysqli_query($db, $sql);
    $row=mysqli_fetch_array($result, MYSQLI_BOTH);
    
    


    if(isset($_POST['update'])){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $mobile = $_POST['mobile'];
        if (!$firstname && !$lastname && !$mobile) {    
            ?>    
                <script type="text/javascript">
                    alert("<?php echo 'Cannot Submit Blank Fields!' ?>");
                </script>
            <?php   
        } else {
            $sql2 = "UPDATE student SET firstname = '$firstname', lastname = '$lastname', mobile = '$mobile' WHERE email = '$user'";
            $result2 = mysqli_query($db, $sql2);
            ?>
                <script type = "text/javascript">
                    alert("Your Informations Updated Successfully !");
                </script>
            <?php
            header("location: profile.php");
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
        
        <!-- my css  -->
        <link rel="stylesheet" href="css/style.css" type="text/css">
        <style>
            .edit-profile {
                height: 90vh;
                width: 30vw;
                margin: 0 auto;
                text-align: end;
            }

        </style>

        <title>
            <?php 
                $email = $_SESSION['user'];
                $username = strstr($email, '@', true);
                echo $username; 
            ?>
        </title>
    
    </head>
    
    <body style="background-image: url('carousel/sign_in.jpg')">
        <div class="edit-profile">

            
            <input onclick="edit_info()" type="button" value="Edit" class="slide-toggle btn btn-dark .text-nowrap btn-lg">

            <form action="" id='test' method="post">    


                <div class="header">
                    <h4 class="text-center text-primary">My Profile</h4>
                </div>


                <table class="table table-bordered table-hover table-striped">

                    <thead class="table-dark">
                        <tr>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody class="table-light">

                        <tr>
                            <td class="text-center"><label for="firstname">FirstName</label></td>
                            <td class="text-center"><input type="text" class="text-center test" name="firstname" id="firstname" value="<?=$row[0]?>" disabled></td>
                        </tr>

                        <tr>
                            <td class="text-center"><label for="lastname">LastName</label></td>
                            <td class="text-center"><input type="text" class="text-center test" name="lastname" id="lastname" value="<?=$row[1]?>" disabled></td>
                        </tr>

                        <tr>
                            <td class="text-center"><label for="mobile">Mobile</label></td>
                            <td class="text-center"><input type="text" class="text-center test" name="mobile" id="mobile" value="<?=$row[2]?>" disabled></td>
                        </tr>

                    </tbody>

                </table>

                <button type="submit" class="text-center btn btn-primary .text-nowrap btn-lg" name="update" disabled>Update</button>    


            </form>
        
        </div>
        
        <script type="text/javascript"> 
            function edit_info() { 
                let pass = '<?php echo $_SESSION['pass'];?>'; 
                let i = prompt("Enter Password !");
                if (i!=pass){
                    alert('Password does not matched, Re-enter !');
                } else {
                    $("#test :input").prop("disabled", false);
                }
            } 
        </script> 

    </body>

</html>