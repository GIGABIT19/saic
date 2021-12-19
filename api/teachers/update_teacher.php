<?php
if($_SERVER['REQUEST_METHOD'] != "POST"){
    header('location: ../teachers/');
}

$id = $_POST['id'];
$name = $_POST['name'];
$designation = $_POST['designation'];
$department = $_POST['department'];
$phone = $_POST['phone'];
$email = $_POST['email'];

include_once "../include.php";

$sql = "UPDATE `teachers` SET `name` = '$name', `designation` = '$designation', `department` = '$department', `phone` = '$phone', `email` = '$email' WHERE `teachers`.`id` = '$id'";

if($mysqli->query($sql) === TRUE) {
    $_SESSION['success_msg'] = "Updated Successfully";
    header('location: ../../teachers/');
} else {
    $_SESSION['error_msg'] = $mysqli->error;
    header('location: ../../teachers/');
}