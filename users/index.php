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

        <script>
            $(document).ready(function(){
                $(".add-btn").on('click',function(){
                    $("#add-modal").modal("show")
                })
            })
        </script>
        
        <title>Users</title>
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
                            <li class="active"><a href="../users">Users</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="../api/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!--==================== Add Users ====================-->
            <div class="col-md-3">
                <button class="btn btn-primary add-btn hidden-print"><span class="glyphicon glyphicon-plus"></span> Add User</button>
            </div>

            <!--==================== Users Data Load ====================-->
            <div class="col-md-12 hidden-print">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--==================== Data Load ====================-->
                        <?php
                        include "../api/include.php";
                        
                        $SQL = "SELECT * FROM `users`";
                        
                        $result = mysqli_query($mysqli,$SQL);
                        
                        if($result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                                print "<tr>";
                                print "<td>".$row['id']."</td>";
                                print "<td>".$row['username']."</td>";
                                
                                if($row['role']==1){
                                    print "<td>Admin</td>";
                                } else {
                                    print "<td>".$row['role']."</td>";
                                }
                                
                                if($row['active']){
                                    print "<td><span style='color: green;'>● </span>";
                                    print "Active</td>";

                                } else {
                                    print"<td><span style='color: red;'>● </span>";
                                    print "Inactive</td>";
                                }

                                
                                print "<td>".$row['created_at']."</td>";
                                print "<td><button class='btn btn-primary view-btn'><span class='glyphicon glyphicon-eye-open'></span></button> ";
                                print "<button class='btn btn-info edit-btn'><span class='glyphicon glyphicon-pencil'></span></button> ";
                                print "<button class='btn btn-danger dlt-btn'><span class='glyphicon glyphicon-trash'></span></button></td>";
                                print "</tr>";
                            
                            }
                        } else {
                            
                            echo "<tr><td colspan='7'>No Data Found</td></tr>";
                        }
                        
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
    </div>

    <!--==================== Add User Modal ====================-->
    <div class="modal fade" id="add-modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add User</h4>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" placeholder="Username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" placeholder="Password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Role:</label>
                            <input type="radio" checked> Admin
                        </div>
                        <div class="form-group">
                            <label for="">Status:</label>
                            <input type="radio" name="status" checked> Active
                            <input type="radio" name="status"> Inactive
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Add User" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</body>
</html>