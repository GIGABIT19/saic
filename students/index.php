<?php
//==================== Authentication ====================//
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

    <style>
      @page {
        size: auto;
        margin: 0mm; }
    </style>
    
    
    <script>
        $(document).ready(function(){

            //Add Student Button On Click Action
            $('.add-btn').on('click',function(){
                $("#add-modal").modal('show');
            })

            //View Student Button On Click Action
            $('.view-btn').on('click', function(){
                $("#view-modal").modal('show');
                
                $tr = $(this).closest('tr');
                
                var data = $tr.children('td').map(function(){
                    return $(this).text()    
                }).get();
                
                //console.log(data);
                $('#view_student_title').text(data[1]);
                $('#view_roll').text(data[0]);
                $('#view_name').text(data[1]);
                $('#view_session').text(data[2]);
                $('#view_department').text(data[3]);
                $('#view_phone').text(data[4]);
                
                
                $('#view_print_button').on('click',function(){
                    window.print();
                })
            })

            //Edit Student Button On Click Action
            $('.edit-btn').on('click', function(){
                $('#edit-modal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children('td').map(function(){
                    return $(this).text()
                }).get();

                //console.log(data);
                $('#update_roll').val(data[0]);
                $('#update_name').val(data[1]);
                $('#update_session').val(data[2]);
                $('#update_department').val(data[3]);
                $('#update_phone').val(data[4]);
            })

            //Delete Student Button On Click Action
            $('.dlt-btn').on('click', function(){
                $('#delete-modal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children('td').map(function(){
                    return $(this).text()
                }).get();

                //console.log(data);
                $("#delete_roll").val(data[0]);
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
        <div class="col-md-3 hidden-print">
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
        
        <!--==================== Add Student Message ====================-->
        <?php
        if(isset($_SESSION['success_msg'])){
            echo '<span class="hidden-print">'.$_SESSION['success_msg'].'</span>';
            unset($_SESSION['success_msg']);
        }
        
        if(isset($_SESSION['error_msg'])){
            echo '<span class="hidden-print">'.$_SESSION['error_msg'].'</span>';
            unset($_SESSION['error_msg']);
        }
        ?>
        
        <!--==================== Students Data Table ====================-->
        <div class="col-md-12 hidden-print">
            <table class="table">
                <thead>
                    <tr>
                        <th>Roll</th>
                        <th>Name</th>
                        <th>Session</th>
                        <th>Department</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!--==================== Data Load ====================-->
                    <?php
                    if(isset($_POST['search_button'])){
                        $search_input = $_POST['search_input'];
                        $SQL = "SELECT * FROM `students` WHERE CONCAT(`roll`,`name`,`phone`,`session`,`department`) LIKE '%$search_input%'";
                    } else {
                        $SQL = "SELECT * FROM students";
                    }
                    $result = mysqli_query($mysqli,$SQL);
                    if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                            print "<tr>";
                            print "<td>".$row['roll']."</td>";
                            print "<td>".$row['name']."</td>";
                            print "<td>".$row['session']."</td>";
                            print "<td>".$row['department']."</td>";
                            print "<td>".$row['phone']."</td>";
                            print "<td><button class='btn btn-primary view-btn'><span class='glyphicon glyphicon-eye-open'></span></button> ";
                            print "<button class='btn btn-info edit-btn'><span class='glyphicon glyphicon-pencil'></span></button> ";
                            print "<button class='btn btn-danger dlt-btn'><span class='glyphicon glyphicon-trash'></span></button></td>";
                            print "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No Data Found</td></tr>";
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
                            <label for="roll">Roll:</label>
                            <input type="number" name="roll" placeholder="Roll" class="form-control" id="roll" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" placeholder="Name" class="form-control" id="name" required>
                        </div>
                        <div class="form-group">
                            <label for="session">Session:</label>
                            <input type="text" name="session" placeholder="Session" class="form-control" id="session" required>
                        </div>
                        <div class="form-group">
                            <label for="department">Department:</label>
                            <select id="department" name="department" class="form-control">
                                <?php
                                $depsql = "SELECT * FROM `departments`";
                                $result = mysqli_query($mysqli,$depsql);
                                if($result->num_rows > 0){
                                    while($row = $result->fetch_assoc()){
                                        ?>
                                        <option value="<?php echo $row['department']?>"><?php echo $row['department']?></option>
                                        <?php
                                        } //end while loop
                                    } //end if condition
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input type="text" name="phone" placeholder="Phone" class="form-control" id="phone" required>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" value="Add Student">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--==================== View Student Modal ====================-->
    <div class="modal fade" id="view-modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close hidden-print" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id="view_student_title">Student Data</h4>
                </div>
                <div class="modal-body view_data">
                    <table>
                        <tr><td style="padding: 5px;"><label for="view_roll">Roll:</label></td><td><span id="view_roll"></span></td></tr>
                        <tr><td style="padding: 5px;"><label for="view_name">Name:</td><td><span id="view_name"></span></td></tr>
                        <tr><td style="padding: 5px;"><label for="view_session">Session:</td><td><span id="view_session"></span></td></tr>
                        <tr><td style="padding: 5px;"><label for="view_department">Department:</td><td><span id="view_department"></span></td></tr>
                        <tr><td style="padding: 5px;"><label for="view_phone">Phone:</td><td><span id="view_phone"></span></td></tr>
                    </table>
                </div>
                <div class="modal-footer hidden-print">
                    <button id="view_print_button" class="btn btn-primary"><span class="glyphicon glyphicon-print"></span> Print</button>
                </div>
            </div>
        </div>
    </div>

    <!--==================== Edit Student Modal ====================-->
    <div class="modal fade" id="edit-modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit</h4>
                </div>
                <div class="modal-body">
                    <form action="../api/students/update_student.php" method="POST">
                        <div class="form-group">
                            <label for="update_roll">Roll:</label>
                            <input type="text" name="update_roll" id="update_roll" placeholder="Roll" class="form-control" readonly required>
                        </div>
                        <div class="form-group">
                            <label for="update_name">Name:</label>
                            <input type="text" name="update_name" id="update_name" placeholder="Name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="update_session">Session:</label>
                            <input type="text" name="update_session" id="update_session" placeholder="Session" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="update_department">Department:</label>
                            <select id="update_department" name="update_department" class="form-control">
                                <?php
                                $depsql = "SELECT * FROM `departments`";
                                $result = mysqli_query($mysqli,$depsql);
                                if($result->num_rows > 0){
                                    while($row = $result->fetch_assoc()){
                                        ?>
                                        <option value="<?php echo $row['department']?>"><?php echo $row['department']?></option>
                                        <?php
                                        } //end while loop
                                    } //end if condition
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="update_phone">Phone:</label>
                            <input type="text" name="update_phone" id="update_phone" placeholder="Phone" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-info" type="submit" value="Update">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--==================== Delete Student Modal ====================-->
    <div class="modal fade" id="delete-modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Delete Confirmation</h4>
                </div>
                <div class="modal-body">
                    <p>Do you want to delete?</p>
                    <form action="../api/students/delete_student.php" method="POST">
                        <input type="hidden" id="delete_roll" name="delete_roll">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger" id="delete-confirm-btn">Delete</button>
                    </form>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

</body>
</html>