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
        $_SESSION['error_msg'] = "Old password did not matched";
        header('location: ../profile/');
    } else {
        //check new password and confirm password are same
        if($new_password != $confirm_password) {
            $_SESSION['error_msg'] = "New password and confirm password did not matched!";
            header('location: ../profile/');
        } else {
            //change password operation
            $update_password_sql = "UPDATE `users` SET `password` = '$new_password' WHERE `users`.`username` = '$username'";

            if($mysqli->query($update_password_sql) === TRUE) {
                $_SESSION['success_msg'] = "Password Changed Successfully";  
                header('location: ../profile/');
            } else {
                $_SESSION['error_msg'] = $mysqli->error;
                header('location: ../profile/');
            }
        }   
    }
}