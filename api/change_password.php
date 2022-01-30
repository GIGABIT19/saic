<?php
session_start();
if($_SERVER['REQUEST_METHOD']=="POST"){
include_once 'include.php';
$current_password = md5($_POST['current_password']);
$new_password = md5($_POST['new_password']);
$confirm_password = $_POST['confirm_password'];
}