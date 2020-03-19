<?php
    $subject = $_POST['subject'];

    $con = mysqli_connect('localhost', 'root', '');
    mysqli_select_db($con, 'online-examination-system');
    $q1 = "delete from subject_db where subject = '$subject'";
    $q2 = "drop table ".$subject;
    mysqli_query($con, $q1);
    mysqli_query($con, $q2);
    header('location:http://localhost/examples/online-examination-system/admin-home.php');
?>