<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .disable {
            pointer-events: none;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <form action="" method="post" class="disable" id="form">
            <label for="user">User</label>
            <input type="text" class="test" name="user" id="user" value="test">
            <br><br>
    </form>
    <form action="" method="post">
        <button type="submit" name="submit">Change</button>
    </form>
    
</body>
</html>


<?php
    if (isset($_POST['submit'])) {
        ?>
        <script>
            document.getElementById('form').classList.remove('disable');
        </script>
        <?php
    }
?>

