<?php
session_start();
include '../include.php';

if(!isset($_SESSION['username'])){
    $_SESSION['error_message'] = 'You have to login first.';
    header('location: ../../login/');
} else {
    if($_SERVER['REQUEST_METHOD'] != 'POST'){
        header('location: ../../students/');
    } else {
        
        $roll = $_POST['roll'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $semester = $_POST['semester'];
        $department = $_POST['department'];
        
        
        $SQL = "INSERT INTO `students` (`roll`, `name`, `phone`, `semester`, `department`) VALUES
        ('$roll', '$name', '$phone', '$semester', '$department')";

        if($mysqli->query($SQL) == TRUE){
            $_SESSION['success_msg'] = "Teacher added successfully.";
            header("location: ../../students");
        } else {
            $_SESSION['error_msg'] = $mysqli->error;
            header("location: ../../students");
        }
    }
}