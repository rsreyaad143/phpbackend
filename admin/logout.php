<?php
     session_start();
     
     session_destroy();
     $_SESSION = array();

     
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Out | Pic Share</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<a class="home" href="index.php">Home</a>
<a class="home" href="login.php">Log In</a>



    
</body>
</html>