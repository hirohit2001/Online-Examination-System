<?php
    session_start();
    if(isset($_SESSION['login-id']))
    {
        $login_id = $_SESSION['login-id'];
        $name = $_POST['name'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        
        $con = mysqli_connect('localhost', 'root', '');
        mysqli_select_db($con, 'online-examination-system');
        
        $q = "UPDATE user_db SET password = '$password', name = '$name', email = '$email' where login_id = '$login_id'";
        mysqli_query($con, $q);
        header('location:http://localhost/examples/online-examination-system/home.php');
    }
    else
    {
        header('location:http://localhost/examples/online-examination-system/index.php');
    }
?>