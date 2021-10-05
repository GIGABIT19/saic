<?php

//DATABASE
$SERVER = "localhost";
$USER = "root";
$PASS = "";
$DB = "saic";

//Connection
$mysqli = new mysqli($SERVER, $USER, $PASS, $DB);

//Check Connection
if($mysqli->connect_errno){
    echo 'Failed to connect database:'.$mysqli->connect_error;
}