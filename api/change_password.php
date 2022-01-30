<?php
session_start();

if($_SERVER['REQUEST_METHOD']=="POST"){
    include_once 'include.php';
    
    $username = $_SESSION['username'];
    $current_password = md5($_POST['current_password']);
    $new_password = md5($_POST['new_password']);
    $confirm_password = md5($_POST['confirm_password']);

    //check old password
    $check_old_password_sql = "SELECT * FROM `users` WHERE `username`='$username' AND `password`='$current_password'";
    $result = mysqli_query($mysqli,$check_old_password_sql);
    if(mysqli_num_rows($result) != 1){
        echo "Old password did not matched";
    } else {
        //check new password and confirm password are same
        if($new_password != $confirm_password) {
            echo "New password and old password did not matched!";
        } else {
            //change password operation
            $update_password_sql = "UPDATE `users` SET `password` = '$new_password' WHERE `users`.`username` = '$username'";
            

        }
        
        
    }

    

    

}