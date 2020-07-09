<?php

include "navbar.php";


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
    
    <!--Font awesome library-->
    <script src="https://kit.fontawesome.com/9963ef9d00.js" crossorigin="anonymous"></script>
    
    <!--Google font-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&family=Special+Elite&display=swap" rel="stylesheet">
    
    
    <title>Online Library Management System</title>
</head>
<body style="height: 100vh; width: 100vw; background-color: #bdcad9; background-image: linear-gradient(315deg, #bdcad9 0%, #e1dada 74%);" class="text-center">

    
    <!-- Carousel -->

    <div id="demo" class="carousel slide h-75 position-relative d-flex flex-column justify-content-center align-items-center w-75" style="top: 10%; left: 12.5%;" data-ride="carousel">

        
        <!-- Indicators -->
        
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
            <li data-target="#demo" data-slide-to="3"></li>
            <li data-target="#demo" data-slide-to="4"></li>
        </ul>

        
        <!-- The SlideShow -->

        <div class="carousel-inner">
            <div class="carousel-item active"><img src="carousel/1000*586.jpg" alt="1st"></div>
            <div class="carousel-item"><img src="carousel/1024*683.jpg" alt="2nd"></div>
            <div class="carousel-item"><img src="carousel/1152*768.jpg" alt="3rd"></div>
            <div class="carousel-item"><img src="carousel/1920*1080.jpg" alt="4th"></div>
            <div class="carousel-item"><img src="carousel/2048*1152.jpg" alt="5th"></div>
        </div>

        
        <!-- Left & Right Controls -->

        <a href="#demo" class="carousel-control-prev" data-slide="prev"><span class="carousel-control-prev-icon"></span></a>
        <a href="#demo" class="carousel-control-next" data-slide="next"><span class="carousel-control-next-icon"></span></a>



    </div>







<footer class="p-2 bg-warning position-relative d-flex flex-column justify-content-center align-items-center w-100" style="height:30vh; top: 20%;">
        <div class="footer">
            <div class="social-media d-flex justify-content-around m-3" style="font-size: 32px;">
                <a href="https://www.facebook.com/sayanghosh3121994" target="_blank"><i class="fa fa-facebook"></i></a>
                <a href="https://twitter.com/imsaayaan" target="_blank"><i class="fa fa-twitter"></i></a>
                <a href="https://in.linkedin.com/in/sayan-ghosh-32a818105" target="_blank"><i class="fa fa-linkedin"></i></a>
                <a href="https://github.com/rims94" target="_blank"><i class="fa fa-github"></i></a>
                <a href="https://www.freecodecamp.org/sayanghosh" target="_blank"><i class="fa fa-free-code-camp"></i></a>
            </div>
            <div class="contact">
                <h4>Email us at : <strong><em>saayaanghosh@gmail.com</em></strong></h4>
                <h5>or, Call us at : <strong><em>+919609241666</em></strong></h5>
            </div>

        </div>
    </footer>
</body>
</html>