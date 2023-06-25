<?php

    session_start();
    if(isset($_SESSION['success'])){
        header('location: profile.php');
    }



    if(file_exists(dirname(__FILE__).'/config.php')){
        require_once(dirname(__FILE__).'/config.php');
    }

    if(file_exists(dirname(__FILE__).'/function.php')){
        require_once(dirname(__FILE__).'/function.php');
    }

if(isset($_POST['login'])){


    $email = $_POST['email_address'];
    // $password = $_POST['password'];
   

    if(email_exists()){

        // $email = $_POST['email_address'];
        $password = $_POST['password'];
    
        $error = array();
    
        if($email == NULL){
            $error['email'] = "Please enter your email address.";
        }
        if($password == NULL){
            $error['password'] = "Please enter your password.";
        }
        if($password != NULL && strlen($password) < 5 ){
            $error['passwordlen'] = "Password must be at least 6 character.";
        }
        
       $query = mysqli_query($connection, "SELECT password FROM member WHERE email_address = '$email'");
       $row = mysqli_fetch_assoc($query);


       if(md5($password) == $row['password']){
        $_SESSION ['success'] = "Success";
        header('location: profile.php');
        
       }else{
        $error['incorrectpass'] =  "Password is incorrect!";
       }
    }else{
        if($email == NULL){
            $error['email'] = "Please enter your email address.";
        }else{
            $error['not_email'] = "Email dose not exists! Please <a href='register.php'>Register</a>";
        }
    }
    
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pic Share | Registration</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="bg">

        <div class="container">
            <div class="registration-form">
                <form action="" method="post">

                    <input type="email" name="email_address" placeholder="Email Address">
                    <div class="error">
                        <?php
                            if(isset($error['email'])){
                                echo $error['email'];
                                }
                            if(isset($error['not_email'])){
                                echo $error['not_email'];
                            }
                        ?>
                    </div>                      

                    <input type="password" name="password" placeholder="Password">
                    <div class="error"><?php
                        if(isset($error['password'])){                            
                             echo $error['password'];
                             }
                        if(isset($error['passwordlen'])){
                             echo $error['passwordlen'];
                            }
                        if(isset($error['incorrectpass'])){
                            echo $error['incorrectpass'];
                            } ?>
                    </div> <br>                    

                    <input type="submit" value="Log In" name="login">
                </form>

                <p>Your dose not have an account! Please <a href="register.php">Register.</a></p>

                
            </div>
        </div>


    </div>
    
    
    
</body>
</html>