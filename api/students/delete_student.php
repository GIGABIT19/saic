<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location: ../../login/');
} else {
    if($_SERVER['REQUEST_METHOD'] != "POST"){
        header('location: ../../students/');
    } else {
        if(!isset($_POST['delete_roll'])){
            header('location: ../../students/');
        } else {
            $delete_roll = $_POST['delete_roll'];
            include_once '../include.php';

            $sql = "DELETE FROM `students` WHERE `roll`='$delete_roll'";
            
            if($mysqli->query($sql) == TRUE){
                $_SESSION['success_msg'] = "Deleted Successfully";
                header('location: ../../students/');
            }
        }
    }
}