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
        
        $SQL = "INSERT INTO `departments` (`id`, `department`) VALUES (NULL, '$department')";

        if($mysqli->query($SQL) == TRUE){
            $_SESSION['success_msg'] = "Department added successfully.";
            header("location: ../../departments");
        } else {
            $_SESSION['error_msg'] = $mysqli->error;
            header("location: ../../departments");
        }
    }
}