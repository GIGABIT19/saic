<?php
//------------------Authentication--------------------//
session_start();
//TO DO:



include_once '../api/include.php';
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
    
    <title>Departments</title>

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
                            <li><a href="../students">Students</a></li>
                            <li class="active"><a href="../departments">Departments</a></li>
                            <li><a href="../users">Users</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="../api/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!--==================== Add Department ====================-->
            <div class="col-md-3">
                <button class="btn btn-primary add-btn hidden-print"><span class="glyphicon glyphicon-plus"></span> Add Department</button>
            </div>
            <!--==================== Add Department Message ====================-->
            <?php
            if(isset($_SESSION['success_msg'])){
                ?>
                <div class="col-md-12 alert alert-success" style="margin-top: 10px;">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php
                    echo '<span class="hidden-print">'.$_SESSION['success_msg'].'</span>';
                    unset($_SESSION['success_msg']);
                    ?>
                </div>
                <?php
            }
            
            if(isset($_SESSION['error_msg'])){
                echo '<div class=\'col-md-12 alert alert-danger\' style=\'margin-top: 10px;\'';
                echo '<span class="hidden-print">'.$_SESSION['error_msg'].'</span>';
                echo '</div>';

                unset($_SESSION['error_msg']);
            }
            
            ?>

            <!--==================== DATA TABLE ====================-->
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Department</th>
                            <th>Total Student</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $SQL = "SELECT * FROM `departments`";
                    $result = mysqli_query($mysqli,$SQL);
                    if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                            $dep = $row['department'];
                            print "<tr><td>".$dep."</td>";
                            print "<td>";
                            $count_sql = "SELECT * FROM `students` WHERE `department`='$dep'";
                            $count_result = mysqli_query($mysqli,$count_sql);
                            echo mysqli_num_rows($count_result);
                            print "</td></tr>";
                        }
                    }
                    ?>
                    </tbody>
                    <tfoot>
                        <tr style="font-weight: bold; background: #64B5F6;">
                            <td>Total</td>
                            <td>
                                <?php
                                $sql = "SELECT * FROM `students`";
                                $result = mysqli_query($mysqli,$sql);
                                echo mysqli_num_rows($result);
                                ?>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
     
    </div>

    <!--==================== Add Department Modal ====================-->
    <div class="modal fade" id="add-modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Department</h4>
                </div>
                <div class="modal-body">
                    <form action="../api/departments/add_department.php" method="POST">
                        <div class="form-group">
                            <label for="department">Department</label>
                            <input id="department" type="text" class="form-control" placeholder="Department" required name="department">
                        </div>
                        <input type="submit" value="Add Department" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>