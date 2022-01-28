<?php
session_start();
if(!isset($_SESSION['username'])){
  $_SESSION['error_message'] = 'You have to login first.';
  header('location: ../../login/');
} else {
  if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header('location: ../../users/');
  } else {

    $username =$_POST['username'];
    $password =$_POST['password'];
    $role =$_POST['role'];
    $active =$_POST['status'];

    echo "Username: ".$username."\n";
    echo "Password: ".$password."\n";
    echo "Role: ".$role."\n";
    echo "Status: ".$active;


  }
}

/*
//config file
require_once "../include.php";

//Data Receiving Check
if($_SERVER['REQUEST_METHOD'] == "POST"){

    //POSTED DATA
    
    

    //SQL

    $SQL = "INSERT INTO `users` (`id`, `username`, `password`, `role`, `active`, `created_at`) VALUES
                                (NULL, \'$username\', \'$password\', \'$role\', \'$active\', current_timestamp());";

    if ($mysqli->query($SQL) === TRUE) {
        $_SESSION['success_msg'] = "User added successfully.";
        header("location: ../../users");
      } else {
        //failed message
        $_SESSION['error_msg'] = $mysqli->error;
        header("location: ../../users");
      }

} else {
    header("Location: ../../users");
}
*/