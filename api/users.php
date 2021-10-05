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

$SQL = "SELECT `id`,`username`, `active` FROM `users`";

if ($result=mysqli_query($mysqli,$SQL))
  {
  // Return the number of rows in result set
  //$rowcount=mysqli_num_rows($result);
  //printf("Result set has %d rows.\n",$rowcount);
  // Free result set

  //echo json_encode($result);


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
?>