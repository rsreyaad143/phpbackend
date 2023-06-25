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

if(isset($_POST['register'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email_address'];
    $password = md5($_POST['password']);

    $error = array();

    if($fname == NULL){
        $error['fname'] = "Please enter your first name.";
    }
    if($lname == NULL){
        $error['lname'] = "Please enter your last name.";
    }
    if($email == NULL){
        $error['email'] = "Please enter your email address.";
    }
    if($password == NULL){
        $error['password'] = "Please enter your password.";
    }
    if($password != NULL && strlen($password) < 5 ){
        $error['passwordlen'] = "Password must be at least 6 character.";
    }
    if(email_exists()){
        $error['email_exists'] = "This email already exists. please try other email.";
    }

    if(count($error) == 0){

       $query = mysqli_query($connection, "INSERT INTO member (fname, lname, email_address, password) VALUES ('$fname', '$lname', '$email', '$password' );");

        if($query){
            $success = "You have successfully registered. Please <a href='login.php'>Log In</a>";
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
                    <input type="text" name="fname" placeholder="First Name">
                    <div class="error"><?php if(isset($error['fname'])){ echo $error['fname'];} ?></div>
                    

                    <input type="text" name="lname" placeholder="Last Name">
                    <div class="error"> <?php if(isset($error['lname'])){ echo $error['lname'];} ?></div>
                   

                    <input type="email" name="email_address" placeholder="Email Address">
                    <div class="error"><?php if(isset($error['email'])){ echo $error['email'];} ?></div>
                    <div class="error"><?php if(isset($error['email_exists'])){ echo $error['email'];} ?></div>

                    

                    <input type="password" name="password" placeholder="Password">
                    <div class="error"><?php
                        if(isset($error['password'])){                            
                             echo $error['password'];
                             }
                        if(isset($error['passwordlen'])){
                             echo $error['passwordlen'];
                            } ?>
                    </div> <br>                    

                    <input type="submit" value="Register" name="register">
                </form>

                <div class="success">
                    <?php if(isset($success)){ echo $success;} ?>
                </div>
            </div>
        </div>


    </div>


    <div class="container">

    <table class="table" border="1">
        <tr>
            <th>User ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email Address</th>
            <th>Password</th>
        </tr>

        <?php 
            $query = $connection->query("SELECT * FROM member");
            while($row = $query->fetch_object()) : ?>

        <tr>
            <td><?php echo $row->id; ?></td>
            <td><?php echo $row->fname; ?></td>
            <td><?php echo $row->lname; ?></td>
            <td><?php echo $row->email_address; ?></td>
            <td><?php echo $row->password; ?></td>
        </tr>
        <?php endwhile ?>



    </table>


    </div>
    
    
    
</body>
</html>