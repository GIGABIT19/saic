<?php
session_start();
if(isset($_SESSION['username'])){
    header("location: ../dashboard/");
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script>
        function focusInput(){
            document.getElementById("username").focus();
        }
    </script>

</head>
<body style="margin-top: 100px;" onload="focusInput()">
    <div class="container">

        <!--==================== Login Panel ====================-->
        <div class="panel panel-default col-md-4 col-md-offset-4">
            <div class="panel-body">
                <form action="../api/login.php" method="POST"  style="text-align: center;">
                    <img src="logo.png" alt="Logo" width="100px" style="margin-bottom: 20px;">
                    <div class="form-group">
                        <input type="text" id="username" placeholder="Username" class="form-control" name="username" required>
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="Password" class="form-control" name="password" required>
                    </div>
                    <button class="btn btn-primary" type="submit">Login</button>
                </form>
            </div>
        </div>


        <!--==================== Error Message Panel ====================-->
        <?php
        if(isset($_SESSION['error_message'])){
            ?>
            
            <div class="panel panel-danger col-md-4 col-md-offset-4">
                <div class="panel-body">
                    <?php
                    echo $_SESSION['error_message'];
                    session_destroy();
                    ?>
                </div>
            </div>
            
            <?php
        }
        ?>
        
    </div>
</body>
</html>