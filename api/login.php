<?php

if($_SERVER['REQUEST_METHOD']=="POST"){
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    //DATABASE
    $SERVER = "localhost";
    $USER = "root";
    $PASS = "";
    $DB = "saic";

    //Connect Database
    $mysqli = new mysqli($SERVER, $USER, $PASS, $DB);

    //Check Connection
    if($mysqli->connect_errno){
        echo "Failed to connect database: ".$mysqli->connect_error;
        exit();
    }

    //SQL Query
    $SQL = "SELECT * FROM `users` WHERE `username`='$username' AND `password`='$password'";

    //Perform Query
    if ($result = $mysqli -> query($SQL)) {
        
        if($result->num_rows==1){
            session_start();

            $_SESSION['username'] = $username;
            

            header("location: ../dashboard");

        } else {
            echo "Username or Password Error!";
        }
        
      } else {
          echo "Something went wrong!";
      }

    

} else {
    header("location: ..");
}

