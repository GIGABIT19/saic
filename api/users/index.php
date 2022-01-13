<?php
session_start();
header("Content-Type:application/json");
//TODO: Authentication


//Config File
require_once "../include.php";

$SQL = "SELECT `id`,`username`,`role`,`active`,`created_at`  FROM `users`";

if ($result=mysqli_query($mysqli,$SQL)){
  if ($result->num_rows > 0) {
    // output data of each row

    $emparray = array();

    while($row = $result->fetch_assoc()) {

      $emparray[] = $row;

    }
  } else {
    echo "0 results";
  }

  $response = [];

  $response['users'] =  $emparray;

  echo json_encode($response, JSON_PRETTY_PRINT);

  //mysqli_free_result($result);
  
}

mysqli_close($mysqli);