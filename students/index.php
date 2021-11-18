<!--==================== Authentication ====================-->
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
    <title>Students</title>
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    
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
        <div class="col-md-3">
            <button class="btn btn-primary add-btn"><span class="glyphicon glyphicon-plus"></span> Add Student</button>
        </div>

        <!--==================== Search Box ====================-->
        <div class="col-md-offset-6 col-md-3 hidden-print">
            <form action="" method="POST">
                <div class="input-group">
                    <input type="text" class="form-control" name="search_input" required>
                    <div class="input-group-btn">
                        <input class="btn btn-info" type="submit" value="Search" name="search_button">
                    </div>
                </div>
            </form>
        </div>
        
        <!--==================== Add Teacher Message ====================-->
        <?php
        if(isset($_SESSION['success_msg'])){
            echo $_SESSION['success_msg'];
            unset($_SESSION['success_msg']);
        }
        
        if(isset($_SESSION['error_msg'])){
            echo '<span class="hidden-print">'.$_SESSION['error_msg'].'</span>';
            unset($_SESSION['error_msg']);
        }
        ?>
        
        <!--==================== Students Data Table ====================-->
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>Roll</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Semester</th>
                        <th>Department</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!--==================== Data Load ====================-->
                    <?php
                    if(isset($_POST['search_button'])){
                        $search_input = $_POST['search_input'];
                        $SQL = "SELECT * FROM `students` WHERE CONCAT(`roll`,`name`,`phone`,`semester`,`department`) LIKE '%$search_input%'";
                    } else {
                        $SQL = "SELECT * FROM students";
                    }
                    $result = mysqli_query($mysqli,$SQL);
                    if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                            print "<tr>";
                            print "<td>".$row['roll']."</td>";
                            print "<td>".$row['name']."</td>";
                            print "<td>".$row['phone']."</td>";
                            print "<td>".$row['semester']."</td>";
                            print "<td>".$row['department']."</td>";
                            print "<td><button class='btn btn-primary view-btn'><span class='glyphicon glyphicon-eye-open'></span></button> ";
                            print "<button class='btn btn-info edit-btn'><span class='glyphicon glyphicon-pencil'></span></button> ";
                            print "<button class='btn btn-danger dlt-btn'><span class='glyphicon glyphicon-trash'></span></button></td>";
                            print "</tr>";
                        }
                    }
                    ?>
                    
                </tbody>
            </table>
        </div>
    </div>
    
    <!--==================== Add Student Modal ====================-->
    <div class="modal fade" id="add-modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Student</h4>
                </div>
                <div class="modal-body">
                    <form action="../api/students/add_student.php" method="POST">
                        <div class="form-group">
                            <input type="number" name="roll" placeholder="Roll" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="name" placeholder="Name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="phone" placeholder="Phone" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="semester" placeholder="Semester" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="department" placeholder="Department" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" value="Add Student">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>