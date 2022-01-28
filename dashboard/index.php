<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: ../login");
}
?>

<html>
    <head>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <title>Dashboard</title>

    </head>
    <body>
        <div class="container">
            
            <!--==================== Nav ====================-->
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
                            <li class="active"><a href="../dashboard">Dashboard</a></li>
                            <li><a href="../teachers">Teachers</a></li>
                            <li><a href="../students">Students</a></li>
                            <li><a href="../departments">Departments</a></li>
                            <li><a href="../users">Users</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="../profile/"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
                            <li><a href="../api/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            
            <!--==================== Welcome ====================-->
            <div class="col-md-12">
                <div class="panel panel-info">
                    <div class="panel-heading">Welcome</div>
                    <div class="panel-body"><h1><?php echo 'Welcome '.ucfirst($_SESSION['username']); ?> <br></h1></div>
                </div>
            </div>
            
            <!--==================== Total Users ====================-->
            <div class="col-md-3">
                <div class="panel panel-info">
                    <div class="panel-heading">Total Users</div>
                    <div class="panel-body"><h1>
                    <?php
                        include '../api/include.php';
                        $sql = "SELECT * FROM `users`;";
                        $result = mysqli_query($mysqli,$sql);
                        echo mysqli_num_rows($result);
                        ?>
                    </h1></div>
                </div>
            </div>
            
            <!--==================== Total Teachers ====================-->
            <div class="col-md-3">
                <div class="panel panel-info">
                    <div class="panel-heading">Total Teachers</div>
                    <div class="panel-body"><h1>
                        <?php
                        include '../api/include.php';
                        $sql = "SELECT * FROM `teachers`;";
                        $result = mysqli_query($mysqli,$sql);
                        echo mysqli_num_rows($result);
                        ?>
                    </h1></div>
                </div>
            </div>
            
            <!--==================== Total Students ====================-->
            <div class="col-md-3">
                <div class="panel panel-info">
                    <div class="panel-heading">Total Students</div>
                    <div class="panel-body"><h1>
                    <?php
                        include '../api/include.php';
                        $sql = "SELECT * FROM `students`;";
                        $result = mysqli_query($mysqli,$sql);
                        echo mysqli_num_rows($result);
                        ?>
                    </h1></div>
                </div>
            </div>

            <!--==================== Total Departments ====================-->
            <div class="col-md-3">
                <div class="panel panel-info">
                    <div class="panel-heading">Total Departments</div>
                    <div class="panel-body"><h1>
                    <?php
                        include '../api/include.php';
                        $sql = "SELECT * FROM `departments`;";
                        $result = mysqli_query($mysqli,$sql);
                        echo mysqli_num_rows($result);
                        ?>
                    </h1></div>
                </div>
            </div>
        </div>
    </body>
</html>