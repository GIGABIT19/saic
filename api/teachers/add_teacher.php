<?php
session_start();
//config file
require_once "../include.php";

//Data Receiving Check
if($_SERVER['REQUEST_METHOD'] == "POST"){

    //POSTED DATA
    $full_name = $_POST['full_name'];
    $designation = $_POST['designation'];
    $department = $_POST['department'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];

    //SQL
    $SQL = "INSERT INTO `teachers` (`name`,`designation`,`department`,`phone`,`email`) VALUES
    ('$full_name','$designation','$department','$phone_number','$email')";

    if ($mysqli->query($SQL) === TRUE) {
        $_SESSION['success_msg'] = "Teacher added successfully.";
        header("location: ../../teachers");
      } else {
        //failed message
        $_SESSION['error_msg'] = $mysqli->error;
        header("location: ../../teachers");
      }

} else {
    header("Location: ../../teachers");
}