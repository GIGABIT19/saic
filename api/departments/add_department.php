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
        
        $department = $_POST['department'];
        $seat_capacity = $_POST['seat_capacity'];
        
        $SQL = "INSERT INTO `departments` (`id`, `department`, `seat_capacity`) VALUES (NULL, '$department', '$seat_capacity')";

        if($mysqli->query($SQL) == TRUE){
            $_SESSION['success_msg'] = "Department added successfully.";
            header("location: ../../departments");
        } else {
            $_SESSION['error_msg'] = $mysqli->error;
            header("location: ../../departments");
        }
    }
}