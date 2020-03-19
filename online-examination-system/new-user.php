<html>
    <head>
        <meta charset="utf-8">
        
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <style>
            .header{
                height: 80px;
                width: 100%;
                text-align: center;
                color: #ea0808;
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
                margin: 10px;
                padding: 15px;
                background-color: #d1d1d1;
            }
            body{
                background-color: #478eef;
            }
        </style>
        
        <title>OES | New User Registration</title>
    </head>
    <body>
        <div class="header">
            <h1>Online Examination System</h1>
        </div>
        
        <div class="image">
            <img src="images/online-exam-image.jpeg" height="500px" width="720px">
        </div>
        
        <div class="login-form">
            <form class="form" action="confirm-new-user.php" method="post">
                <div class="form-group">
                    <label for="login-id" class="control-label">Login ID:</label>
                    <input type="text" name="login-id" id="login-id" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password" class="control-label">Password:</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="confirm-password" class="control-label">Confirm Password:</label>
                    <input type="password" name="confirm-password" id="confirm-password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">Name: </label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email" class="control-label">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <input type="submit" value="Create Account" class="btn btn-primary">
            </form>
        </div>
    </body>
</html>