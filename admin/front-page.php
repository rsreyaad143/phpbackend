<?php
    require_once('function.php');
    session_start();
    if (!user_loged_in()) {
        header('location: login.php');
    }

    if(isset($_POST['assign'])){
        $frontpage = $_POST['front-page'];
        $query = mysqli_query($connection, "UPDATE pages SET url ='index.php?page=1', pageid='1' WHERE pagetitle='$frontpage'");
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
                <h1>Which page you want to make front page?</h1>

                <form action="" method="POST">

                <select name="front-page" class="page-group">
                    <?php
                        $query = mysqli_query($connection, "SELECT * FROM pages");
                        

                        while ($info = mysqli_fetch_assoc($query)) :
                    ?>
                    <option class="pageoption" value="<?php echo $info['pagetitle']; ?>" ><?php echo $info['pagetitle']; ?></option>

                    <?php endwhile; ?>
                </select>

                <input type="submit" value="Assign" name="assign">

                </form>
            </div>
        </div>
    </div>

    
</body>
</html>