<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
                        <li><a href="../dashboard">Dashboard</a></li>
                        <li><a href="../teachers">Teachers</a></li>
                        <li><a href="../students">Students</a></li>
                        <li><a href="../departments">Departments</a></li>
                        <li><a href="../users">Users</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="../profile/"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
                        <li><a href="../api/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <!--==================== Change Password ====================-->
        <div class="col-md-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Change Password</div>
                <div class="panel-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <input type="password" name="current_password" id="" placeholder="Current Password" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="password" name="new_password" id="" placeholder="New Password" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="password" name="confirm_password" id="" placeholder="Confirm New Password" class="form-control">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="" id="">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>