<?php
session_start();

if(!isset($_SESSION['username'])){
    $_SESSION['error_message'] = 'You have to login first.';
    header('location: ../../login/');
} else {
    if($_SERVER['REQUEST_METHOD'] != 'POST'){
        header('location: ../../students/');
    } else {
        
        $roll = $_POST['roll'];
        $name = $_POST['name'];
        $session = $_POST['session'];
        $department = $_POST['department'];
        $birthdate = $_POST['birthdate'];
        $phone = $_POST['phone'];

        include '../include.php';
        $SQL = "INSERT INTO `students` (`roll`, `name`, `session`, `department`, `birthdate`, `phone`) VALUES
        ('$roll', '$name', '$session', '$department', '$birthdate', '$phone')";

        if($mysqli->query($SQL) == TRUE){
            $_SESSION['success_msg'] = "Student added successfully.";
            header("location: ../../students");
        } else {
            $_SESSION['error_msg'] = $mysqli->error;
            /*
            if (mysql_errno() == 1022) {
                die("Username already exists");
            } else {
                die(mysql_error());
            }
            */
            header("location: ../../students");
        }
    }
}