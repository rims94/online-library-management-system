<?php 

session_start();
include "navbar.php";

if(isset($_SESSION['user']) || isset($_SESSION['admin'])) {
    include "connection.php";


    if(isset($_POST['submit'])) {
        $sql = "SELECT * FROM books WHERE  Name LIKE '%$_POST[search]%'";
        $result = mysqli_query($db, $sql);
    } else {
        $sql="select * from books";
        $result=mysqli_query($db,$sql); 
    }
}else {
    header("location: index.php");
}

if(isset($_SESSION['user'])){
    if(isset($_POST['request'])) {
        ?>
        
        <script type="text/javascript">
        
            let x = confirm("Are you Sure to request for the book with id <?=$_POST['bid']?>");
            if(x) {
                <?php
                    $sql ="INSERT INTO `issue_info`(`user`, `bid`) VALUES ('$_SESSION[user]', '$_POST[bid]');";
                    $query = mysqli_query($db, $sql);
                    header('location: request_book.php');
                ?>
            } else {
                window.location('books.php');
            }
        
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
    <!-- my css  -->
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <style>

        .sidenav {
          height: 100%;
          width: 0;
          position: fixed;
          z-index: 1;
          top: 0;
          left: 0;
          background-color: #111;
          overflow-x: hidden;
          transition: 0.5s;
          padding-top: 60px;
        }

        .sidenav a {
          padding: 8px 8px 8px 32px;
          text-decoration: none;
          font-size: 25px;
          color: #818181;
          display: block;
          transition: 0.3s;
        }

        .sidenav a:hover {
          color: #f1f1f1;
        }

        .sidenav .closebtn {
          position: absolute;
          top: 0;
          right: 25px;
          font-size: 36px;
          margin-left: 50px;
        }

        #main {
          transition: margin-left .5s;
          padding: 16px;
        }

        @media screen and (max-height: 450px) {
          .sidenav {padding-top: 15px;}
          .sidenav a {font-size: 18px;}
        }
    </style>

    <title>Books</title>
</head>
<body style="height: 100vh; width: 100vw; font-family: 'Lato', sans-serif; transition: .5s; background-image: url('carousel/book.jpg')">
    <div id="mySidenav" class="sidenav d-flex flex-column justify-content-even align-items-center">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <?php
            if(isset($_SESSION['admin'])) {
        ?>  
            <a href="books.php">Book Information</a>
            <a href="add_delete.php">Add/Delete Book</a>
        <?php
        }
        ?>
        <?php
            if(isset($_SESSION['user'])) {
        ?>  
                <a href="profile.php" class="text-center">
                    <i class="fas fa-user-circle" style="font-size: 160px;"></i><br>
        <?php 
                    $email = $_SESSION['user'];
                    $username = strstr($email, '@', true);
                    echo $username;
        ?>
                </a>
                <a href="books.php">Book Information</a>
                <a href="request_book.php">Book Request</a>
                <a href="issue_book.php">Issue Information</a>
        <?php
        }
        ?>
    </div>

    <div id="main" class="d-flex flex-column justify-content-center">
        <div class="title-bar d-flex justify-content-between align-items-center">
            <div class="book-navbar">
                <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
            </div>

            <div class="search-section">

                <div class="search-bar p-2">
                    <form name="book-search" method="post" class="d-flex">

                    <input type="search" name="search" id="search" class="text-center form-control" placeholder="type book name" required>
                    <button type="submit" name="submit" class="btn">
                        <span>
                            <svg class="bi bi-search" width="1em" height="1em" viewBox="0 0 16 16" fill="#fdfdfe" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                                <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                            </svg>
                        </span>
                    </button>

                    </form>
                </div>  

                <div class="request-bar p-2">
                    <form name="book-search" method="post" class="d-flex">

                    <input type="number" name="bid" id="search" class="text-center form-control" placeholder="enter book id" required>
                    <button type="submit" name="request" class="btn text-light bg-dark">Request</button>
                    </form>
                </div>

            </div>


        </div>
        
        <div class="table-responsive">
            <div class="header"><h1>List of Books</h1></div>
            <table class="table table-bordered table-hover table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Book</th>
                        <th>Author</th>
                        <th>Edition</th>
                        <th>Section</th>
                        <th>Status</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <?php while($array=mysqli_fetch_row($result)) { ?>
                <tbody class="table-light">
                
                    <tr>
                        <td><?php echo $array[0]; ?></td>
                        <td><?php echo $array[1]; ?></td>
                        <td><?php echo $array[2]; ?></td>
                        <td><?php echo $array[3]; ?></td>
                        <td><?php echo $array[4]; ?></td>
                        <td><?php echo $array[5]; ?></td>
                        <td><?php echo $array[6]; ?></td>
                    </tr>
                    <?php } ?>
                    <?php mysqli_free_result($result); ?>
                    <?php mysqli_close($db); ?>
                </tbody>
                
            </table>
        </div>
    </div>

    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
            document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            document.getElementById("main").style.marginLeft= "0";
            document.body.style.backgroundColor = "white";
        }
    </script>


</body>
</html>