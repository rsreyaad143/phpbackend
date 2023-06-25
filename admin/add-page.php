<?php

    require_once('config.php');
    require_once('function.php');
    session_start();
    if (!user_loged_in()) {
        header('location: login.php');
    }

    if(isset($_POST['creatpage'])){
        $pagetitle = isset($_POST['pagetitle']) ? $_POST['pagetitle'] : "Empty Title";
        $pagecontent = $_POST['pagecontent'];

        $randnumber = rand(1, 100).rand(1,100);

        $url = '?page='.$randnumber;

        $insert = mysqli_query($connection, "INSERT INTO pages (pagetitle, pagecontent, url, pageid) VALUES ('$pagetitle', '$pagecontent', '$url', '$randnumber')");
        
        if(isset($insert)){
            $success = "Page has been created!";
            header('location: edit.php'.$url);
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Page</title>
    <link rel="stylesheet" href="admin.css">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        selector: '.tinymce'
      });
    </script>
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
                <form action="" method="post">
                    <input type="text" name="pagetitle" placeholder="Page Title">
                    <textarea class="tinymce" name="pagecontent" cols="30" rows="10"></textarea>

                    <input type="submit" value="Create Page" name="creatpage">
                </form>
                <div class="page-created">
                    <?php if(isset($success)){
                        echo $success;
                    }?>
                </div>
            </div>
        </div>
    </div>
    


</body>
</html>
