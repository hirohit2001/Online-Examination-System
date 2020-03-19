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
            .menu{
                height: 270px;
                width: 300px;
                background-color: #D1D1D1;
                margin: 100px 100px 100px 200px;
                text-align: center;
                padding: 20px;
                float: left;
            }
            .menu ul li{
                list-style: none;
                margin: 20px;
                font-weight: 270;
                border-bottom: 1px black ridge;
                padding-bottom: 20px;
            }
            .menu ul{
                padding: 0px;
                margin: 0px;
                font-size: 20px;
            }
            .menu ul li a:hover{
                font-weight: 400;
                text-decoration: none;
            }
            .menu ul li a{
                color: black;
            }
            .take-test{
                height: 270px;
                width: 300px;
                background-color: #D1D1D1;
                margin: 100px 100px 100px 200px;
                text-align: center;
                padding: 20px;
                float: left;
            }
        </style>
    </head>
    <body>
        <?php
            session_start();
            if(isset($_SESSION['login-id']))
            {
        ?>
                <div class="header">
                    <h1>Online Examination System <span class="logout"><a href="user-logout.php"><button class="btn btn-danger">Logout</button></a></span></h1>
                </div>
        
                <div class="menu">
                    <h3 style="text-align:center;">Welcome, <?php echo strtoupper($_SESSION['login-id']) ?></h3><br>
                    <ul>
                        <li><a href="update-profile.php">Update your Profile</a></li>
                        <li><a href="prev-result.php">Check previous results</a></li>
                    </ul>
                </div>
        
                <div class="take-test">
                    <h4 style="text-align:center;">TAKE TEST</h4><br>
                    <form action="test.php" method="post">
                        <div class="form-group custom">
                            <label for="subject" class=""><b>SELECT SUBJECT: </b></label>
                            <select name="subject" class="form-control" required>
        <?php
                                $con = mysqli_connect('localhost', 'root', '');
                                mysqli_select_db($con, 'online-examination-system');
                                $q = "select * from subject_db";
                                $result = mysqli_query($con, $q);
                                $num = mysqli_num_rows($result);
                                for($i = 1; $i <= $num; $i++)
                                {
                                    $row = mysqli_fetch_array($result);
        ?>
                                    <option value="<?php echo $row['subject']; ?>"><?php echo $row['subject']; ?></option> 
        <?php
                                }
        ?>
                            </select>
                        </div>
                        <input type="submit" value="Start" class="btn btn-success">
                    </form>
                </div>
        
    </body>
        <?php
            }
            else
            {
                header('location:http://localhost/examples/online-examination-system/index.php');
            }
        ?>
</html>