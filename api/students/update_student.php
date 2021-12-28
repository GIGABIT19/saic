<?php

if($_SERVER['REQUEST_METHOD']!='POST'){
    header('location: ../../students/');    
}

$roll = $_POST['update_roll'];
$name = $_POST['update_name'];
$session = $_POST['update_session'];
$department = $_POST['update_department'];
$phone = $_POST['update_phone'];

include_once('../include.php');

$sql = "UPDATE `students` SET `roll`='$roll', `name`='$name', `session`='$session', `department`='$department', `phone`='$phone' WHERE `roll`='$roll'";


if($mysqli->query($sql) === TRUE) {
    $_SESSION['success_msg'] = "Updated Successfully";
    header('location: ../../students/');
} else {
    $_SESSION['error_msg'] = $mysqli->error;
    header('location: ../../students/');
}