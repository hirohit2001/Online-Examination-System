<html>
    <head>
        <meta charset="utf-8">
        
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        
        <title>OES | Test Page</title>
    </head>
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
        .quit-test{
                float: right;
                margin: 5px;
            }
        body{
            background-color: #478EEF;
        }
        .question-box{
            height: 500px;
            width: 600px;
            background-color: #d1d1d1;
            margin: 0px auto;
            padding: 10px;
        }
    </style>
    <body>
        <?php
            session_start();
            if(isset($_SESSION['login-id']))
            {
                if(!isset($_SESSION['subject']))
                {
                    if(isset($_POST['subject']))
                    {
                        $login_id = $_SESSION['login-id'];
                        $subject = $_POST['subject'];
                        
                        $con = mysqli_connect('localhost', 'root', '');
                        mysqli_select_db($con, 'online-examination-system');
                        $q = "select * from ".$subject;
                        $result = mysqli_query($con, $q);
                        $num = mysqli_num_rows($result);
                        
                        $_SESSION['subject'] = $subject;
                        $_SESSION['total'] = $num;
                        $_SESSION['Q-No'] = 1;
                            
                        $q = "create table ".$login_id."_response(Q_No int not null AUTO_INCREMENT, answer varchar(100), PRIMARY KEY(Q_No))";
                        mysqli_query($con, $q);
                    }
                    else
                    {
                        header('location:http://localhost/examples/online-examination-system/home.php');  
                    }
                }
                if($_SESSION['Q-No']<=$_SESSION['total'])
                {
                    $qno = $_SESSION['Q-No'];
                    $subject = $_SESSION['subject'];
                    $q = "select * from ".$subject." where Q_No = ".$qno;
                    $con = mysqli_connect('localhost', 'root', '');
                    mysqli_select_db($con, 'online-examination-system');
                    $result = mysqli_query($con, $q);
                    $question = mysqli_fetch_array($result);
                    $_SESSION['Q-No'] = $_SESSION['Q-No'] + 1;
        ?>
                    <div class="header">
                        <h1>Online Examination System <span class="quit-test"><a href="home.php"><button class="btn btn-danger">Quit Test</button></a></span></h1>
                    </div>

                    <div class="question-box">
                        <form action="submit-answer.php" method="post">
                            <h1><?php echo $question['question']; ?></h1><br>
                            <div>
                                <p><input type="radio" name="answer" value="<?php echo $question['option1']; ?>">&nbsp;<?php echo $question['option1']; ?></p>
                            </div>
                            <div>
                                <p><input type="radio" name="answer" value="<?php echo $question['option2']; ?>">&nbsp;<?php echo $question['option2']; ?></p>
                            </div>
                            <div>
                                <p><input type="radio" name="answer" value="<?php echo $question['option3']; ?>">&nbsp;<?php echo $question['option3']; ?></p>
                            </div>
                            <div>
                                <p><input type="radio" name="answer" value="<?php echo $question['option4']; ?>">&nbsp;<?php echo $question['option4']; ?></p>
                            </div>
                            <input type="submit" class="btn btn-success" value="Next Question">
                        </form>
                    </div>
        <?php
                }
                else
                {
                    header('location:http://localhost/examples/online-examination-system/result.php');
                }
            }
            else
            {
                header('location:http://localhost/examples/online-examination-system/home.php');
            }
        ?>
    </body>
</html>
