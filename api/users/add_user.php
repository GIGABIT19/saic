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
    $password =md5($_POST['password']);
    $role =$_POST['role'];
    $active =$_POST['status'];

    //config file
    require_once "../include.php";
    
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
  }
}