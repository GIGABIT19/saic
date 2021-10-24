<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location: ../login/');
} else {
    if($_SERVER['REQUEST_METHOD'] != "POST"){
        header('location: ../teachers/');
    } else {
        if(!isset($_POST['delete_id'])){
            header('location: ../teachers/');
        } else {
            $delete_id = $_POST['delete_id'];
            include_once 'include.php';

            $sql = "DELETE FROM `teachers` WHERE `id`='$delete_id'";

            if($mysqli->query($sql) == TRUE){
                header('location: ../teachers/');
            }
        }
    }
}