<?php
    session_start();
    if(isset($_SESSION['login-id']) and isset($_SESSION['subject']))
    {
        $subject = $_SESSION['subject'];
        $question = $_POST['question'];
        $option1 = $_POST['option1'];
        $option2 = $_POST['option2'];
        $option3 = $_POST['option3'];
        $option4 = $_POST['option4'];
        $correctOption = $_POST['correct-option'];

        $con = mysqli_connect('localhost', 'root', '');
        mysqli_select_db($con, 'online-examination-system');
        
        $q = "insert into ".$subject."(question, option1, option2, option3, option4, correct_option) values('$question', '$option1', '$option2', '$option3', '$option4', '$correctOption')";
        mysqli_query($con, $q);
        
        $_SESSION['numq'] = $_SESSION['numq'] - 1;
        
        header('location:http://localhost/examples/online-examination-system/add-question-form.php');
    }
    else
    {
        header('location:http://localhost/examples/online-examination-system/admin.php');
    }
?>