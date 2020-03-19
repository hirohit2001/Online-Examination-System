<html>
    <head>
        <meta charset="utf-8">
        <title>Admin Validation</title>
        <style>
            .warning{
                color: red;
                text-align:center;
            }
        </style>
    </head>
    <body>
        <?php
            if(isset($_POST['login-id']))
            {
                $loginId = $_POST['login-id'];
                $password = $_POST['password'];
        
                $con = mysqli_connect('localhost','root','');
                mysqli_select_db($con, 'online-examination-system');
                
                $q = "select * from admin_db where login_id='$loginId' and password='$password'";
                $result = mysqli_query($con, $q);
        
                $num = mysqli_num_rows($result);
        
                if($num == 0)
                {
        ?>
                    <h1 class="warning">Enter valid Login-ID and Password!!</h1>
                    <script> setTimeout(function(){  location.href = "http://localhost/examples/online-     examination-system/admin.php"; }, 2000);
                    </script>
        <?php
                }
                else
                {
                    session_start();
                    $_SESSION['login-id'] = $loginId;
        ?>
                    <script> location.replace("http://localhost/examples/online-examination-system/admin-home.php");  </script>
        <?php
                }
            }
            else
            {
                header("location:http://localhost/examples/online-examination-system/admin.php");    
            }
        ?>
   </body>
</html>
