<?php
require_once "include.php";

//Data Receiving Check
if($_SERVER['REQUEST_METHOD'] == "POST"){

    //POSTED DATA
    $full_name = $_POST['full_name'];
    $designation = $_POST['designation'];
    $department = $_POST['department'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];

    //SQL
    $SQL = "INSERT INTO `teachers` (`name`,`designation`,`department`,`phone_number`,`email`) VALUES ('$full_name','$designation','$department','$phone_number','$email')";

    if ($mysqli->query($SQL) === TRUE) {
        
        header("Location: ../teachers");

      } else {
        echo "Error: " . $SQL . "<br>" . $mysqli->error;
      }




} else {
    header("Location: ../teachers");
}