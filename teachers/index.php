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
    <title>Teachers</title>
    
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
    $(document).ready(function() {
      
      $(".add-btn").on('click', function(){
        $("#add-modal").modal('show');
      })
        
      $(".dlt-btn").on('click', function(){
        $("#delete-modal").modal('show');

        $tr = $(this).closest('tr');
        var data = $tr.children('td').map(function(){
          return $(this).text();
        }).get();

        $("#delete_id").val(data[0]);

      })
      
      $(".edit-btn").on('click', function(){
        $("#edit-modal").modal('show');

        $tr = $(this).closest('tr');
        var data = $tr.children('td').map(function(){
          return $(this).text();
        }).get();
        
        console.log(data);
        $('#update_id').val(data[0]);
        $('#update_name').val(data[1]);
        $('#update_designation').val(data[2]);
        $('#update_department').val(data[3]);
        $('#update_phone').val(data[4]);
        $('#update_email').val(data[5]);
        

      })
      
      $(".view-btn").on('click', function(){
        $("#view-modal").modal('show');

        $tr = $(this).closest('tr');
        var data = $tr.children('td').map(function(){
          return $(this).text();
        }).get();

        console.log(data);
        $("#view_teacher_title").text(data[1]);
        $("#view_id").text(data[0]);
        $("#view_name").text(data[1]);
        $("#view_designation").text(data[2]);
        $("#view_department").text(data[3]);
        $("#view_phone").text(data[4]);
        $("#view_email").text(data[5]);

        $('#view_print_button').on('click',function(){
          window.print();
        })

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
    
    <!--==================== Add Teacher Button ====================-->
    <div class="col-md-3">
      <button class="btn btn-primary add-btn hidden-print"><span class="glyphicon glyphicon-plus"></span> Add Teacher</button>
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
    
    <!--==================== Teachers Data Table ====================-->
    <div class="col-md-12 hidden-print">
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Designation</th>
            <th>Department</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <!--==================== Data Load ====================-->
          <?php
          if(isset($_POST['search_button'])){
            $search_input = $_POST['search_input'];
            $SQL = "SELECT * FROM `teachers` WHERE CONCAT(`id`,`name`,`designation`,`department`,`phone`,`email`) LIKE '%$search_input%'";
          } else {
            $SQL = "SELECT * FROM `teachers`";
          }
          
          $result = mysqli_query($mysqli,$SQL);
          if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
              print "<tr>";
              print "<td>".$row['id']."</td>";
              print "<td>".$row['name']."</td>";
              print "<td>".$row['designation']."</td>";
              print "<td>".$row['department']."</td>";
              print "<td>".$row['phone']."</td>";
              print "<td>".$row['email']."</td>";
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

  <!--==================== Add Teacher Modal ====================-->
  <div class="modal fade" id="add-modal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Teacher</h4>
        </div>
        <div class="modal-body">
          <form action="../api/teachers/add_teacher.php" method="POST">
            <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" id="name" name="full_name" class="form-control" placeholder="Full Name" required>
            </div>
            <div class="form-group">
              <label for="designation">Designation:</label>
              <select name="designation" id="designation" class="form-control">
                <option value="Jr. Instructor">Jr. Instructor</option>
                <option value="Instructor" selected>Instructor</option>
              </select>
            </div>
            <div class="form-group">
              <label for="department">Department:</label>
              <select id="department" name="department" class="form-control">
                <option value="Computer">Computer</option>
                <option value="Telecommunication">Telecommunication</option>
                <option value="Civil">Civil</option>
                <option value="Automobile">Automobile</option>
                <option value="Architecture">Architecture</option>
                <option value="Electrical">Electrical</option>
                <option value="Textile">Textile</option>
                <option value="Garments">Garments</option>
                <option value="Mechanical">Mechanical</option>
                <option value="Marine">Marine</option>
                <option value="Shipbuilding">Shipbuilding</option>
                <option value="Electronics">Electronics</option>
              </select>
            </div>
            <div class="form-group">
              <label for="phone">Phone:</label>
              <div class="input-group">
                <span class="input-group-addon">+88</span>
                <input type="phone" id="phone" name="phone_number" class="form-control" placeholder="Phone Number" required>
              </div>
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="form-group">
              <input class="btn btn-primary" type="submit" value="Add Teacher">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  
  <!--==================== Delete Teacher Modal ====================-->
  <div class="modal fade" id="delete-modal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Delete Confirmation</h4>
        </div>
        <div class="modal-body">
          <p>Do you want to delete?</p>
          <form action="../api/teachers/delete_teacher.php" method="POST">
            <input type="hidden" id="delete_id" name="delete_id">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger" id="delete-confirm-btn">Delete</button>
          </form>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
  
  <!--==================== Edit Teacher Modal ====================-->
  <div class="modal fade" id="edit-modal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit</h4>
        </div>
        <div class="modal-body">
          <form action="../api/teachers/update_teacher.php" method="POST">
            <div class="form-group">
              <label for="update_id">Id:</label>
              <input type="text" id="update_id" class="form-control" readonly required name="id">
            </div>
            <div class="form-group">
              <label for="update_id">Name:</label>
              <input type="text" id="update_name" class="form-control" required name="name">
            </div>
            <div class="form-group">
              <label for="update_id">Designation:</label>
              <select name="designation" id="update_designation" class="form-control">
                <option value="Jr. Instructor">Jr. Instructor</option>
                <option value="Instructor">Instructor</option>
              </select>
            </div>
            <div class="form-group">
              <label for="update_id">Department:</label>
              <select id="update_department" name="department" class="form-control">
                <option value="Computer">Computer</option>
                <option value="Telecommunication">Telecommunication</option>
                <option value="Civil">Civil</option>
                <option value="Automobile">Automobile</option>
                <option value="Architecture">Architecture</option>
                <option value="Electrical">Electrical</option>
                <option value="Textile">Textile</option>
                <option value="Garments">Garments</option>
                <option value="Mechanical">Mechanical</option>
                <option value="Marine">Marine</option>
                <option value="Shipbuilding">Shipbuilding</option>
                <option value="Electronics">Electronics</option>
              </select>
            </div>
            <div class="form-group">
              <label for="update_id">Phone Number:</label>
              <input type="text" id="update_phone" class="form-control" required name="phone">
            </div>
            <div class="form-group">
              <label for="update_id">Email:</label>
              <input type="text" id="update_email" class="form-control" required name="email">
            </div>
            <div class="form-group">
              <input class="btn btn-info" type="submit" value="Update">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  
  <!--==================== View Teacher Modal ====================-->
  <div class="modal fade" id="view-modal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close hidden-print" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="view_teacher_title">Teacher Data</h4>
        </div>
        <div class="modal-body view_data">
          <div>
            <table>
              <tr><td style="padding: 5px;"><label for="view_id">Id:</label></td><td><span id="view_id"></span></td></tr>
              <tr><td style="padding: 5px;"><label for="view_name">Name:</td><td><span id="view_name"></span></td></tr>
              <tr><td style="padding: 5px;"><label for="view_designation">Designation:</td><td><span id="view_designation"></span></td></tr>
              <tr><td style="padding: 5px;"><label for="view_department">Department:</td><td><span id="view_department"></span></td></tr>
              <tr><td style="padding: 5px;"><label for="view_phone">Phone:</td><td><span id="view_phone"></span></td></tr>
              <tr><td style="padding: 5px;"><label for="view_email">Email:</td><td><span id="view_email"></span></td></tr>
            </table>
          </div>
        </div>
        <div class="modal-footer hidden-print">
          <button id="view_print_button" class="btn btn-primary"><span class="glyphicon glyphicon-print"></span> Print</button>
        </div>
      </div>
    </div>
  </div>

</body>
</html>