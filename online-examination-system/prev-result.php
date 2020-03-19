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
            .result-box{
                height: auto;
                width: 600px;
                padding: 20px;
                text-align: center;
                margin: 0px auto;
                background-color: #d1d1d1;
            }
            table, table tr{
                background-color: white;
                text-align: center;
            }
            body{
                 background-color: #478eef;
            }
        </style>
    </head>
    <body>
        <?php
            session_start();
            if(isset($_SESSION['login-id']))
            {
                $login_id = $_SESSION['login-id'];
                $con = mysqli_connect('localhost', 'root');
                mysqli_select_db($con, 'online-examination-system');
                $q = "select * from ".$login_id."_result";
                $result = mysqli_query($con, $q);
                $num = mysqli_num_rows($result);
        ?>
                <div class="header">
                    <h1>Online Examination System <span class="logout"><a href="user-logout.php"><button class="btn btn-danger">Logout</button></a></span></h1>
                </div>
                
                <div class="result-box">
                    <h3 style="text-align:center;">PREVIOUS RESULTS</h3>
                    <table class="table table-bordered">
                        <tr>
                            <th>DATE</th><th>SUBJECT</th><th>CORRECT ANSWERS</th><th>WRONG ANSWERS</th>
                        </tr>
                        <?php
                            for($i = 1; $i<=$num; $i++)
                            {
                                $row = mysqli_fetch_array($result);
                        ?>
                                <tr>
                                    <td><?php echo $row['date']; ?></td>
                                    <td><?php echo $row['subject']; ?></td>
                                    <td><?php echo $row['correct']; ?></td>
                                    <td><?php echo $row['wrong']; ?></td>
                                </tr>
                        <?php
                            }
                        ?>
                    </table>
                    <a href="home.php"><input type="button" value="Go Back to home page" class="btn btn-primary"></a>
                </div>
        <?php
            }
            else
            {
                header('location:http://localhost/examples/online-examination-system/index.php');
            }
        ?>
    </body>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>