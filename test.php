<?php

    include "connection.php";

    if(isset($_POST['test'])) {
        $sql = "SELECT * FROM `book` WHERE ID = '1'";
        $query = mysqli_query($db, $sql);
        if($query) {
            echo 'Success !';
        } else {
            echo 'Fail !';
        }
    }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
    
        <button type="submit" name="test">Test</button>
    
    </form>
</body>
</html>