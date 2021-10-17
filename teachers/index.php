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


    <script>
    $(document).ready(function() {
      
      $(".add-btn").on('click', function(){
        $("#add-modal").modal('show');
      })
        
      $(".dlt-btn").on('click', function(){
        $("#delete-modal").modal('show');
      })
      
      $(".edit-btn").on('click', function(){
        $("#edit-modal").modal('show');
      })
      
      $(".view-btn").on('click', function(){
        $("#view-modal").modal('show');
      })

    })
    
    </script>


    <title>Teachers</title>
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
                            <li class="active"><a href="../teachers">Teachers</a></li>
                            <li><a href="../students">Students</a></li>
                            <li><a href="../departments">Departments</a></li>
                            <li><a href="../users">Users</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="../api/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!--========== Add Teacher Button ==========-->
            <button class="btn btn-primary add-btn"><span class="glyphicon glyphicon-plus"></span> Add Teacher</button>
            
            <!--========== Data Table ==========-->
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Department</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        //include
                        

                        $SQL = "SELECT * FROM teachers";

                        $result = mysqli_query($mysqli,$SQL);

                        if($result->num_rows > 0){
                            
                            while($row = $result->fetch_assoc()){
                                print "<tr>";
                                print "<td>".$row['id']."</td>";
                                print "<td>".$row['name']."</td>";
                                print "<td>".$row['designation']."</td>";
                                print "<td>".$row['department']."</td>";
                                print "<td>".$row['phone_number']."</td>";
                                print "<td>".$row['email']."</td>";
                                print "<td><a class='btn btn-primary view-btn' href='#'><span class='glyphicon glyphicon-eye-open'></span></a> ";
                                print "<a class='btn btn-info edit-btn' href='#'><span class='glyphicon glyphicon-pencil'></span></a> ";
                                print "<a class='btn btn-danger dlt-btn' href='#'><span class='glyphicon glyphicon-trash'></span></a></td>";
                                
                                print "</tr>";
                            }

                        }

                        ?>
                    </tbody>
                </table>
            </div>
    </div>

    <!--========== Delete User Confirmation Modal ==========-->
  <div class="modal fade" id="delete-modal" role="dialog">
    <div class="modal-dialog">
    
      
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Delete Confirmation</h4>
        </div>
        <div class="modal-body">
          <p>Do you want to delete?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger">Delete</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </div>
      
    </div>
  </div>

    <!--========== Edit Confirmation Modal ==========-->
  <div class="modal fade" id="edit-modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit</h4>
        </div>
        <div class="modal-body">
            <form action="">
              <div class="form-group">
                <input type="text" placeholder="Name" class="form-control">
              </div>
              <div class="form-group">
                <input type="text" placeholder="Designation" class="form-control">
              </div>
              <div class="form-group">
                <input type="text" placeholder="Department" class="form-control">
              </div>
              <div class="form-group">
                <input type="text" placeholder="Phone Number" class="form-control">
              </div>
              <div class="form-group">
                <input type="text" placeholder="Email" class="form-control">
              </div>
              <div class="form-group">
                <input class="btn btn-info" type="submit" placeholder="Phone Number" value="Update">
              </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


    <!--========== Add User Modal ==========-->
  <div class="modal fade" id="add-modal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Teacher</h4>
        </div>
        <div class="modal-body">
          <form action="../api/add_teacher.php" method="POST">
              <div class="form-group">
                <input type="text" placeholder="Full Name" name="full_name" required class="form-control">
              </div>

              <div class="form-group">
                <input type="text" placeholder="Designation" name="designation" required class="form-control">
              </div>

              <div class="form-group">
                <input type="text" placeholder="Department" name="department" required class="form-control">                        
              </div>
              
              <div class="form-group">
                <input type="text" placeholder="Phone Number" name="phone_number" required class="form-control">
              </div>
              
              <div class="form-group">
                <input type="text" placeholder="Email" name="email" required class="form-control">
              </div>
              
              <div class="form-group">
                <input class="btn btn-primary" type="submit">
              </div>
              
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

    <!--========== View User Modal ==========-->
    <div class="modal fade" id="view-modal" role="dialog">
      <div class="modal-dialog">
        <!-- Modal Content -->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Teacher Data</h4>
          </div>
          <div class="modal-body"></div>
          <div class="modal-footer"></div>
        </div>
      </div>

    </div>
    
    

</body>
</html>