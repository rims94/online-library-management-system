<?php
    session_start();
    include "navbar.php";
    include 'connection.php';
    $errors=[];
    $success = [];
    if(isset($_SESSION['admin'])) {
        if(isset($_POST['add'])) {
            $name = $_POST['name'];
            $author = $_POST['author'];
            $edition = $_POST['edition'];
            $section = $_POST['section'];
            $quantity = $_POST['quantity'];

            $sql = "SELECT * FROM `books` WHERE Name = '$name'";
            $query = mysqli_query($db, $sql);
            $result = mysqli_num_rows($query);

            if (empty($name || $author || $edition || $section || $quantity)) {
                array_push($errors, "Blank fields cannot be submitted !");
            } else if($result > 0) {
                array_push($errors, "Duplicate Entry !");
            }

            if (count($errors) == 0) {
                $sql2 = "INSERT INTO books(Name, Author, Edition, Section, Quantity) VALUES ('$name', '$author', '$edition', '$section', '$quantity');";
                $result2 = mysqli_query($db, $sql2);
                if($result2) {
                    header("location: books.php");
                } else {
                    ?>
                        <script type="text/javascript">
                            alert("Sql error !");
                        </script>
                    <?php
                }
                
            }
        }
        if(isset($_POST['delete'])) {
            $id = $_POST['id'];
            ?>
            
            <script type="text/javascript">
                let x = confirm("Are You Sure To Delete The Book With Id <?=$id?>");
                if (x) {
                    <?php 
                            $sql = "DELETE FROM `books` WHERE `ID` = '$id'";
                            mysqli_query($db, $sql);
                    ?>
                    alert("Successfully Deleted Book With Id <?=$id?>");
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
    <!-- My CSS -->
    <!-- <link rel="stylesheet" href="css/style.css" type="text/css"> -->
    <title>Add/Delete Books</title>
</head>
<body style="height: 125vh; width: 100vw; background-image: url('carousel/book.jpg')" class="text-center">

    <div class="add_del border rounded border-light text-light position-relative" style="top: 7.5%; left: 30%; height: auto; width: 40vw; background-color: #000000; background-image: linear-gradient(147deg, #000000 0%, #2c3e50 74%);">
        <div class="del position-relative d-flex flex-column justify-content-end w-50" style="left: 25%">
            <div class="header form-title">
                <h2>Delete Book</h2>
            </div>
            <form name="book-delete" method="post">
                <input type="search" name="id" id="id" class="text-center rounded-pill p-2" placeholder="Enter Book Id To Delete" required>
                <button type="submit" name="delete" class="btn btn-primary">
                    <span>
                    <svg class="bi bi-trash" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg>
                    </span>
                </button>
            </form>
        </div>
        <div class="add h-75 position-relative d-flex flex-column justify-content-center align-items-center w-50" style="left: 25%;">
            <form action="" method="post">
                <div class="header form-title">
                    <h2>Add Book</h2>
                </div>
                <?php  if (count($errors) > 0) : ?>
                  <div class="msg bg-dark text-white-50 w-50 position-relative" style="left: 25%; height: 5vh; font-size: 24px;">
                  	<?php foreach ($errors as $error) : ?>
                  	  <span><?php echo $error ?></span>
                  	<?php endforeach ?>
                  </div>
                <?php  endif ?>
                <div class="book_name form-group m-5 d-flex align-items-center justify-content-center" style="width: 50vw;">
                    <label for="name" class="w-25">Book Name : </label>
                    <input type="text" class="form-control w-50 text-center" name="name" id="name">
                </div>
                <div class="author form-group m-5 d-flex align-items-center justify-content-center" style="width: 50vw;">
                    <label for="author" class="w-25">Author : </label>
                    <input type="text" class="form-control w-50 text-center" name="author" id="author">
                </div>
                <div class="edition form-group m-5 d-flex align-items-center justify-content-center" style="width: 50vw;">
                    <label for="edition" class="w-25">Edition : </label>
                    <input type="text" class="form-control w-50 text-center" name="edition" id="edition">
                </div>
                <div class="section form-group m-5 d-flex align-items-center justify-content-center" style="width: 50vw;">
                    <label for="section" class="w-25">Section : </label>
                    <input type="text" class="text-center w-50 form-control" name="section" id="section">
                </div>
                <!-- <div class="status form-group m-5 d-flex align-items-center justify-content-center" style="width: 50vw;">
                    <label for="status" class="w-25">Status : </label>
                    <input type="text" name="status" id="status" class="text-center w-50 form-control" value="1"> 
                </div> -->
                <div class="quantity form-group m-5 d-flex align-items-center justify-content-center" style="width: 50vw;">
                    <label for="quantity" class="w-25">Quantity : </label>
                    <input type="number" class="form-control w-50 text-center" name="quantity" id="quantity">
                </div>
                <div class="add_button form-group">
                    <button type="submit" name="add" id="add" class="btn btn-default btn-primary text-light btn-lg">ADD</button>
                </div>
            </form>
        </div>
    </div>






</body>
</html>