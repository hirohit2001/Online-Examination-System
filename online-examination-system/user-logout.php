<?php
    session_start();
    session_destroy();
    header('location:http://localhost/examples/online-examination-system/index.php');
?>