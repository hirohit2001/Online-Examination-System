<html>
    <head>
        <meta charset="utf-8">
        
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        
        <title>OES | Login Page</title>
        
        <style>
            .header{
                height: 80px;
                width: 100%;
                text-align: center;
                color: #FF0000;
                border: 1px black ridge;
                background-color: black;
                margin: 0px auto 10px auto;
                padding: 10px;
                word-spacing: inherit;
            }
            .image{
                height: 500px;
                width: 720px;
                float: left;
                margin: 15px 15px 15px 40px;
            }
            .login-form{
                height: auto;
                width: 500px;
                float: right;
                margin: 20px;
                padding: 20px;
                background-color: #d1d1d1;
            }
            body{
                background-color: #478eef;
            }
            .admin-login{
                float: right;
                margin: 5px;
            }
        </style>
        
    </head>
    
    <body>
        <div class="header">
            <h1>Online Examination System<a href="admin.php"><span class="admin-login"><button class="btn btn-danger">Admin Login</button></span></a></h1>
        </div>
        
        <div class="image">
            <img src="images/online-exam-image.jpeg" height="500px" width="720px">
        </div>
   
        <div class="login-form">
            <h1 style="text-align:center; color:#0022af">Student Login</h1>
            <form class="form-vertical" action="validate-user.php" method="post">
                <div class="form-group">
                    <label for="login-id" class="control-label">Login ID:</label>
                    <input type="text" name="login-id" id="login-id" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password" class="control-label">Password:</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <input type="submit" value="Login" class="btn btn-primary">
            </form>
            <a href="new-user.php">New User? Sign up for FREE</a>
        </div>
        
    </body>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>