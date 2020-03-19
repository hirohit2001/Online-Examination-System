<html>
    <head>
        <meta charset="utf-8">
        
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        
        <title>Home Page</title>
        
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
            .logout{
                float: right;
                margin: 5px;
            }
            body{
                background-color: #478EEF;
            }
            .update-form{
                background-color: #d1d1d1;
                height: 400px;
                width: 400px;
                text-align: center;
                margin: 50px auto;
                padding: 20px;
            }
            table{
                margin: 0px auto;
            }
            table tr th{
                text-align: right;
                padding: 20px;
            }
        </style>
    </head>
    <body>
        <?php
            session_start();
            if(isset($_SESSION['login-id']))
            {
                $login_id = $_SESSION['login-id'];
                $con = mysqli_connect('localhost', 'root', '');
                mysqli_select_db($con, 'online-examination-system');
                $q = "select * from user_db where login_id = '$login_id'";
                $result = mysqli_query($con, $q);
                $row = mysqli_fetch_array($result);
                
        ?>      <div class="header">
                    <h1>Online Examination System <span class="logout"><a href="user-logout.php"><button class="btn btn-danger">Logout</button></a></span></h1>
                </div>
                
                <div class="update-form">
                    <h3 style="text-align:center;">UPDATE YOUR PROFILE</h3>
                    <br>
                    <form action="update.php" method="post">
                        <table>
                            <tr>
                                <th>Name: </th>
                                <td><input type="text" name="name" value="<?php echo $row['name']; ?>" required></td>
                            </tr>
                            <tr>
                                <th>Password: </th>
                                <td><input type="password" name="password" value="<?php echo $row['password']; ?>" required></td>
                            </tr>
                            <tr>
                                <th>Email: </th>
                                <td><input type="text" name="email" value="<?php echo $row['email']; ?>" required></td>
                            </tr>
                        </table>
                        <br>
                        <input type="submit" class="btn btn-primary" value="Update">
                    </form>
                </div>
        


        <?php
            }
            else
            {
                header('location:http://localhost/examples/online-examination-system/index.php');
            }
        ?>
</html>