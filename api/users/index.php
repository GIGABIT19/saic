<?php
session_start();
//TODO: Authentication


//Config File
require_once "../include.php";

$SQL = "SELECT `id`,`username`, `active` FROM `users`";

if ($result=mysqli_query($mysqli,$SQL)){
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo json_encode($row, JSON_PRETTY_PRINT);
    }
  } else {
    echo "0 results";
  }

  mysqli_free_result($result);
  
}

mysqli_close($mysqli);