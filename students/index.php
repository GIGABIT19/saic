<?php
session_start();
if(!isset($_SESSION['username'])){
  header("Location: ../");
}

include "../api/include.php";
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <title>Students</title>
</head>
<body>
    <div class="container">
        <!--Nav-->
        <nav class="navbar navbar-inverse">
                <div class="container-fluid">

                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="../dashboard">SIMT</a>
                    </div>
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav">
                            <li><a href="../dashboard">Dashboard</a></li>
                            <li><a href="../teachers">Teachers</a></li>
                            <li class="active"><a href="../students">Students</a></li>
                            <li><a href="../departments">Departments</a></li>
                            <li><a href="../users">Users</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="../api/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!--==================== Add Student Button ====================-->
            <button class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add Student</button>

            <!-- DATA Table -->
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Roll</th>
                            <th>Name</th>
                            <th>Semester</th>
                            <th>Department</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $SQL = "SELECT * FROM students";

                        $result = mysqli_query($mysqli,$SQL);

                        if($result->num_rows > 0){

                            while($row = $result->fetch_assoc()){
                                print "<tr>";
                                print "<td>".$row['roll']."</td>";
                                print "<td>".$row['name']."</td>";
                                print "<td>".$row['semester']."</td>";
                                print "<td>".$row['department']."</td>";
                            }
                        }

                        ?>
                    </tbody>

                </table>

            </div>
        </div>
</body>
</html>