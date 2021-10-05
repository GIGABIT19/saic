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
    
    <title>Add User</title>
</head>
<body>
    <div class="container">

        <form action="../api/add_user.php" class="col-md-3">
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Username" name="username">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" placeholder="Password" name="password">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" placeholder="Confirm Password" name="confirm_password">
            </div>
            <div class="form-group">
                <input class="btn btn-primary" type="submit" value="Add User">
            </div>
        </form>
    </div>
</body>
</html>