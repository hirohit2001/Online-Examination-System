<?php
    $con = mysqli_connect('localhost', 'root', '');
    mysqli_select_db($con, 'online-examination-system');
    $sub = $_POST['subject'];
    $q = "insert into subject_db values('$sub')";
    mysqli_query($con, $q);

    $q = "create table ".$sub."(Q_No int(5) not null auto_increment, question varchar(100), option1 varchar(100), option2 varchar(100), option3 varchar(100), option4 varchar(100), correct_option varchar(100), primary key(Q_No))";
    mysqli_query($con, $q);

    header('location:http://localhost/examples/online-examination-system/admin-home.php');
?>