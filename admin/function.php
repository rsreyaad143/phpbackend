<?php
    require_once('config.php');
    
   function email_exists(){

        global $email;
        global $connection;

        $result = mysqli_query($connection, "SELECT * FROM member WHERE email_address = '$email'");

        if(mysqli_num_rows($result) == 1){
            return true;
        }
    }

    function user_loged_in(){
        if(isset($_SESSION['success'])){
            return true;
        }
    }


?>