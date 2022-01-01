<?php
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


            <!--DATA TABLE-->
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Department</th>
                            <th>Total Student</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Computer</td>
                            <td>
                                <?php
                                $sql = "SELECT * FROM `students` WHERE `department`='Computer'";
                                $result = mysqli_query($mysqli,$sql);
                                echo mysqli_num_rows($result);
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Telecommunication</td>
                            <td>
                                <?php
                                $sql = "SELECT * FROM `students` WHERE `department`='Telecommunication'";
                                $result = mysqli_query($mysqli,$sql);
                                echo mysqli_num_rows($result);
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Civil</td>
                            <td>
                                <?php
                                $sql = "SELECT * FROM `students` WHERE `department`='Civil'";
                                $result = mysqli_query($mysqli,$sql);
                                echo mysqli_num_rows($result);
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Automobile</td>
                            <td>
                                <?php
                                $sql = "SELECT * FROM `students` WHERE `department`='Automobile'";
                                $result = mysqli_query($mysqli,$sql);
                                echo mysqli_num_rows($result);
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Architecture</td>
                            <td>
                                <?php
                                $sql = "SELECT * FROM `students` WHERE `department`='Architecture'";
                                $result = mysqli_query($mysqli,$sql);
                                echo mysqli_num_rows($result);
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Electrical</td>
                            <td>
                                <?php
                                $sql = "SELECT * FROM `students` WHERE `department`='Electrical'";
                                $result = mysqli_query($mysqli,$sql);
                                echo mysqli_num_rows($result);
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Textile</td>
                            <td>
                                <?php
                                $sql = "SELECT * FROM `students` WHERE `department`='Textile'";
                                $result = mysqli_query($mysqli,$sql);
                                echo mysqli_num_rows($result);
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Garments</td>
                            <td>
                                <?php
                                $sql = "SELECT * FROM `students` WHERE `department`='Garments'";
                                $result = mysqli_query($mysqli,$sql);
                                echo mysqli_num_rows($result);
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Mechanical</td>
                            <td>
                                <?php
                                $sql = "SELECT * FROM `students` WHERE `department`='Mechanical'";
                                $result = mysqli_query($mysqli,$sql);
                                echo mysqli_num_rows($result);
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Marine</td>
                            <td>
                                <?php
                                $sql = "SELECT * FROM `students` WHERE `department`='Marine'";
                                $result = mysqli_query($mysqli,$sql);
                                echo mysqli_num_rows($result);
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Shipbuilding</td>
                            <td>
                                <?php
                                $sql = "SELECT * FROM `students` WHERE `department`='Shipbuilding'";
                                $result = mysqli_query($mysqli,$sql);
                                echo mysqli_num_rows($result);
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Electronics</td>
                            <td>
                                <?php
                                $sql = "SELECT * FROM `students` WHERE `department`='Electronics'";
                                $result = mysqli_query($mysqli,$sql);
                                echo mysqli_num_rows($result);
                                ?>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
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
    
</body>
</html>