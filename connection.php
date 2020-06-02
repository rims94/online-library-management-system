<?php 

    $db = mysqli_connect("localhost","root","","online_library_management_system");
    /* check if server is alive */
    if (mysqli_ping($db)) {
        printf ("Our connection is ok!\n");
    } else {
        printf ("Error: %s\n", mysqli_error($db));
    }
?>