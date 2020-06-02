<?php 

include "navbar.php";
include "connection.php";


if(isset($_POST['submit'])) {
    $sql = "SELECT * FROM books WHERE  Name LIKE '%$_POST[search]%'";
    $result = mysqli_query($db, $sql);
} else {
    $sql="select * from books";
    $result=mysqli_query($db,$sql); 
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

    <title>Books</title>
</head>
<body>

    <div class="search-bar">
        <form name="book-search" method="post">
        
        <input type="search" name="search" id="search" placeholder="type book name" required>
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
    
</body>
</html>