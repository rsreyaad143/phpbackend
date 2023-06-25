<?php

    require_once('config.php');
    require_once('function.php');
    session_start();
    if (!user_loged_in()) {
        header('location: login.php');
    }

    if(isset($_POST['update'])){
        $pagetitle = isset($_POST['pagetitle']) ? $_POST['pagetitle'] : "Empty Title";
        $pagecontent = $_POST['pagecontent'];

        $page = isset($_GET['page']) ? $_GET['page'] : ' ';

        $update = mysqli_query($connection, "UPDATE pages SET pagetitle='$pagetitle', pagecontent='$pagecontent' WHERE pageid = '$page'");
        
        if(isset($update)){
            $success = "Page has been Update!";
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
                </ul>
            </div>
            <div class="main-content">
                <?php
                    $page = isset($_GET['page']) ? $_GET['page'] : ' ';                    
                    $query = mysqli_query($connection, "SELECT * FROM pages WHERE pageid = '$page'");
                    $info = mysqli_fetch_assoc($query);                    
                ?>
                <form action="" method="post">
                    <input type="text" name="pagetitle" placeholder="Page Title" value="<?php echo $info['pagetitle'] ?>">
                    <textarea class="tinymce" name="pagecontent" cols="30" rows="10">
                    <?php echo $info['pagecontent'] ?>
                    </textarea>

                    <input type="submit" value="Update Page" name="update">
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
