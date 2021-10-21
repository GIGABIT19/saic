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
    <script>
        $(document).ready(function(){
            $(".add-btn").on('click',function(){
                $("#add-modal").modal('show');
            })
        })
    </script>
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
            <button class="btn btn-primary add-btn"><span class="glyphicon glyphicon-plus"></span> Add Student</button>

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

            <!--Add Student Modal-->
            <div class="modal fade" id="add-modal" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Add Teacher</h4>
                        </div>
                        <div class="modal-body">
                            <form action="../api/add_student.php" method="POST">
                                <div class="form-group">
                                    <input type="number" name="" id="" placeholder="Roll" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="" id="" placeholder="Name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="" id="" placeholder="Semester" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="" id="" placeholder="Department" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" value="Add Student">
                                </div>
                                
                                
                                
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>


        </div>
</body>
</html>






<!--


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
</head>
<body>
    <div class="container">

        <form action="../api/add_user.php" class="col-md-3">
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Username" name="username">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" placeholder="Password" name="password">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" placeholder="Confirm Password" name="confirm_password">
            </div>
            <div class="form-group">
                <input class="btn btn-primary" type="submit" value="Add User">
            </div>
        </form>
    </div>
</body>
</html>