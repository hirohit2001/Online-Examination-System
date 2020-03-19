<?php
    session_start();
     $login_id = $_SESSION['login-id'];
     $answer = $_POST['answer'];

    $con = mysqli_connect('localhost', 'root', '');
    mysqli_select_db($con, 'online-examination-system');
    
    $q = "insert into ".$login_id."_response(answer) values('$answer')";
    mysqli_query($con, $q);
    
    header('location:http://localhost/examples/online-examination-system/test.php');
?>