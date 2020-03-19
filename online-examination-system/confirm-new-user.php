<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        
        <title>Account Confirmation</title>
        <style>
            .warning{
                color: red;
            }
            body{
                text-align: center;
            }
            .header{
                height: 80px;
                width: 100%;
                text-align: center;
                color: #ff0000;
                border: 1px black ridge;
                background-color: black;
                margin: 0px auto 10px auto;
                padding: 10px;
                word-spacing: inherit;
            }
        </style>
    </head>
    <body>
        <?php
            if(isset($_POST['login-id']))
            {
                $loginId = $_POST['login-id'];
                $password1 = $_POST['password'];
                $password2 = $_POST['confirm-password'];
                $name = $_POST['name'];
                $email = $_POST['email'];
        
                if($password1 == $password2)
                {
                    $con = mysqli_connect('localhost','root','');
                    mysqli_select_db($con, 'online-examination-system');
                
                    $q = "select * from user_db where login_id='$loginId'";
                    $result = mysqli_query($con, $q);
                    $num = mysqli_num_rows($result);
                    if($num == 0)
                    {
                        $q = "insert into user_db values('$loginId', '$password1', '$name','$email')";
                        mysqli_query($con, $q);
                
                        $q = "create table ".$_POST['login-id']."_result(date DATE, subject varchar(100), correct int, wrong int)";
                        mysqli_query($con, $q);
        ?>
                        <div class="header">
                            <h1>Online Examination System</h1>
                        </div>                
        
                        <h1 style="color:#259a02">Account created successfully...</h1>
                        <table class="table table-bordered table-striped" style="width:500px; margin:50px auto;">
                            <tr>
                                <th>Login Id : </th>
                                <td><?php echo $loginId; ?></td>
                            </tr>
                            <tr>
                                <th>Password : </th>
                                <td><?php echo $password1; ?></td>
                            </tr>
                            <tr>
                                <th>Name : </th>
                                <td><?php echo $name; ?></td>
                            </tr>
                            <tr>
                                <th>Email : </th>
                                <td><?php echo $email; ?></td>
                            </tr>
                        </table>
                        <a href="index.php"><button class="btn btn-primary">Go Back To Login Page</button></a>
        <?php
                    }
                    else
                    {
        ?>   
                        <h1 class="warning">Login ID is already taken...try another one!!</h1>
                        <script>
                            setTimeout(function(){  history.back(); }, 1000);
                        </script>
        <?php
                    }
                }
                else
                {
        ?>
                    <h1 class="warning">Password didn't match...</h1>
                    <script>
                        setTimeout(function(){  history.back(); }, 1000);
                    </script>
        <?php
                }
            }
            else
            {
                header('location:http://localhost/examples/online-examination-system/new-user.php');
            }
        ?>
   </body>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>