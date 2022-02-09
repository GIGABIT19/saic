<?php

//session
session_start();

//config file
include_once('../include.php');

//check data posted or not
if($_SERVER['REQUEST_METHOD']!='POST'){
    header('location: ../../students/');    
}

$roll = $_POST['update_roll'];
$name = $_POST['update_name'];
$session = $_POST['update_session'];
$department = $_POST['update_department'];
$birthdate = $_POST['update_birthdate'];
$phone = $_POST['update_phone'];

//check birthdate submit or not
if($birthdate==null){
    $sql = "UPDATE `students` SET `roll`='$roll', `name`='$name', `session`='$session', `department`='$department', `phone`='$phone' WHERE `roll`='$roll'";
} else {
    $sql = "UPDATE `students` SET `roll`='$roll', `name`='$name', `session`='$session', `department`='$department', `birthdate`='$birthdate', `phone`='$phone' WHERE `roll`='$roll'";
}



if($mysqli->query($sql) === TRUE) {
    $_SESSION['success_msg'] = "Updated Successfully";
    header('location: ../../students/');
} else {
    $_SESSION['error_msg'] = $mysqli->error;
    header('location: ../../students/');
}