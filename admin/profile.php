<?php

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
    <title>Pic Share</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<header>
        <div class="container">
            <div class="header">
                <div class="logo-area">
                    <img src="image/logo.png" alt="logo">
                    <h1><a href="index.php">PIC SHARE</a></h1>
                </div>
                
                </div>
            </div>
        </div>
    </header>

    <div class="main-content">
        <div class="container">
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aspernatur amet dolore veritatis incidunt, nobis unde facere asperiores cumque quos natus dicta beatae doloribus rerum blanditiis hic et, dolor tempore dolorum quaerat sequi, adipisci autem voluptas suscipit mollitia! Quas ab, laudantium porro iure reprehenderit dolore tempore accusantium illum velit aperiam quidem doloremque eius eaque magnam delectus dolorem corrupti ipsa neque voluptatem veritatis aspernatur excepturi sit? At quae consectetur quasi odio aperiam magnam veniam, ex laboriosam, soluta aut maxime itaque maiores tempora, eum beatae? Quasi, quia iusto et id porro aliquid sed excepturi nemo! Placeat corrupti accusantium fugit possimus ut, est cumque mollitia molestias ipsum ad recusandae quae a tempore dolorum. Magnam aspernatur natus culpa iusto quis dolores perferendis quae? Maiores numquam sequi cupiditate dolores totam, minus omnis aliquam necessitatibus consequuntur saepe placeat reprehenderit quam eveniet magnam sed at animi praesentium quisquam eos eligendi, vero voluptatem. Minima, iste. Distinctio, ducimus inventore tempora dolorum quaerat, quisquam quibusdam molestiae excepturi facilis repellat voluptatem voluptas eum esse non voluptates placeat vel? Quidem aliquid consequuntur doloremque vitae consectetur soluta nobis odio animi sapiente expedita, a labore omnis laboriosam totam ad. Ex earum maiores id laboriosam magni, debitis itaque obcaecati quisquam veritatis neque. Quia, facilis. Iure, nisi?</p>
        </div>
    </div>

    <div class="container">
        <div class="home"><a href="logout.php">Logout</a></div>
        <div class="home"><a href="index.php">Admin Panal</a></div>
    </div>

    
    


</body>
</html>