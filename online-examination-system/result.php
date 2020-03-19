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
            .result-box{
                height: 300px;
                width: 400px;
                background-color: #D1D1D1;
                margin: 50px auto;
                text-align: center;
                padding: 20px;
            }
            body{
                background-color: 
            }
        </style>
    </head>
    <body>
        <?php
            session_start();
            if(isset($_SESSION['login-id']) and $_SESSION['Q-No'] > $_SESSION['total'])
            {
                $subject = $_SESSION['subject'];
                $login_id = $_SESSION['login-id'];
        
                $con = mysqli_connect('localhost', 'root', '');
                mysqli_select_db($con, 'online-examination-system');
        
                $q = "select * from ".$subject." INNER JOIN ".$login_id."_response where ".$subject.".Q_No = ".$login_id."_response.Q_No and correct_option = answer";
        
                $result = mysqli_query($con, $q);
                $num_of_correct_answer = mysqli_num_rows($result);
                $num_of_wrong_answer = $_SESSION['total'] - $num_of_correct_answer;
        ?>
                <div class="header">
                   <h1>Online Examination System <span class="logout"><a href="user-logout.php"><button class="btn btn-danger">Logout</button></a></span></h1>
                </div>
        
                <div class="result-box">
                    <h3 style="text-align:center">RESULT</h3>
                    <br>
                    <p style="color:green; font-weight:500px; font-size:25px;">No. of correct answers: <?php echo $num_of_correct_answer; ?></p>
                    <p style="color:red; font-weight:500px; font-size:25px;">No. of wrong answers: <?php echo $num_of_wrong_answer; ?></p>
                    <a href="home.php"><input type="button" class="btn btn-primary" value="Go to gome page"></a>
                </div>
        <?php
                $q = "insert into ".$login_id."_result values(now(), '$subject',".$num_of_correct_answer.",".$num_of_wrong_answer.")";
                mysqli_query($con, $q);
                
                $q = "drop table ".$login_id."_response";
                mysqli_query($con, $q);
                
                unset($_SESSION['subject']);
                unset($_SESSION['total']);
                unset($_SESSION['Q-No']);
            }
            else
            {
                header('location:http://localhost/examples/online-examination-system/home.php');
            }
        ?>
    </body>
</html>