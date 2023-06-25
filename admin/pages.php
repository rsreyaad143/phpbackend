<?php

require_once('config.php');
require_once('function.php');
session_start();
    if (!user_loged_in()) {
        header('location: login.php');
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panal</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>

    <div class="main-screen">
        <div class="container">
            <div class="left-sidebar">
                <ul>
                    <li><a href="add-page.php">Add new page</a></li>
                    <li><a href="pages.php">All Pages</a></li>
                    <li><a href="front-page.php">Front Page Setup</a></li>
                </ul>
            </div>
            <div class="main-content">
                <h1>Pages</h1>


                <ul class="list">
                    <?php 
                        $query = mysqli_query($connection, "SELECT * FROM pages");
                       
                        while($row = mysqli_fetch_assoc($query)) : 
                    ?>
                    <li class="list-item"><a class="list-link" href="edit.php<?php echo $row['url']; ?>"><?php echo $row['pagetitle']; ?></a></li>
                    <hr class="hr-line">

                    <?php endwhile; ?>

                </ul>
            </div>
        </div>
    </div>

    
</body>
</html>