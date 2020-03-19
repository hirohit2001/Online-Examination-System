<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <title>Admin Home</title>
        
        <style>
        .heading{
            text-align: center;
            color: #ea0808;
            background-color: black;
            height: auto;
            padding: 10px;
        }
        .add-subject, .add-question, .delete-subject, .subjects{
            height: 500px;
            width: 300px;
            background-color: #D1D1D1;
            padding: 50px;
            float: left;
            margin: 18px;
        }
        body{
            background-color: #478EEF;
        }
        table td{
            border-bottom: 0.25px black ridge;
            padding: 10px;
            width: 300px;
        }
        .logout{
            float: right;
            margin: 5px;
        }
        .main{
            margin: 0px auto;
        }
    </style>
        
    </head>
    <body>
        <?php
            session_start();
            if(isset($_SESSION['login-id']))
            {
        ?>
                <h1 class="heading">Admin Home Page <span class="logout"><a href="admin-logout.php"><button class="btn btn-danger">Logout</button></a></span></h1>
        
                <div class="main">
                     <div class="add-subject">
                    <h4 style="text-align:center;">ADD SUBJECTS</h4><br>
                    <form action="add-subject.php" method="post">
                        <div class="form-group custom">
                            <label for="subject"><b>SUBJECT NAME: </b></label>
                            <input type="text" name="subject" id="subject" class="form-control" required>
                        </div>
                        <input type="submit" value="Add Subject" class="btn btn-primary">
                    </form>
                </div>
        
        
                <div class="add-question">
                    <h4 style="text-align:center;">ADD QUESTIONS</h4><br>
                    <form action="add-question-form.php" method="post">
                        <div class="form-group custom">
                            <label for="subject" class=""><b>SELECT SUBJECT: </b></label>
                            <select name="subject" class="form-control" required>
        <?php
                                $con = mysqli_connect('localhost', 'root', '');
                                mysqli_select_db($con, 'online-examination-system');
                                $q = "select * from subject_db";
                                $result = mysqli_query($con, $q);
                                $num = mysqli_num_rows($result);
                                for($i = 1; $i <= $num; $i++)
                                {
                                    $row = mysqli_fetch_array($result);
        ?>
                                    <option value="<?php echo $row['subject']; ?>"><?php echo $row['subject']; ?></option> 
        <?php
                                }
        ?>
                            </select>
                            <br>
                            <div class="form-group custom">
                                <label for="numq"><b>NUMBER OF QUESTIONS:</b></label>
                                <input type="number" name="numq" class="form-control">
                            </div>
                        </div>
                        <input type="submit" value="Add Questions" class="btn btn-primary">
                    </form>
                </div>
        
                <div class="delete-subject">
                    <h4 style="text-align:center;">DELETE SUBJECTS</h4><br>
                    <form action="delete-subject.php" method="post">
                        <div class="form-group custom">
                            <label for="subject" class=""><b>SELECT SUBJECT: </b></label>
                            <select name="subject" class="form-control" required>
        <?php
                                $con = mysqli_connect('localhost', 'root', '');
                                mysqli_select_db($con, 'online-examination-system');
                                $q = "select * from subject_db";
                                $result = mysqli_query($con, $q);
                                $num = mysqli_num_rows($result);
                                for($i = 1; $i <= $num; $i++)
                                {
                                    $row = mysqli_fetch_array($result);
        ?>
                                    <option value="<?php echo $row['subject']; ?>"><?php echo $row['subject']; ?></option> 
        <?php
                                }
        ?>
                            </select>
                        </div>
                        <input type="submit" value="Delete Subject" class="btn btn-primary" title="Deleting subject will delete all the questions of that subject present in the database">
                    </form>
                </div>
        
                <div class="subjects">
                    <h4 style="text-align:center;">SUBJECTS IN DATABASE</h4><br>
                    <table style="text-align:center;">
        <?php
                        $con = mysqli_connect('localhost', 'root', '');
                        mysqli_select_db($con, 'online-examination-system');
                        $q = "select * from subject_db";
                        $result = mysqli_query($con, $q);
                        $num = mysqli_num_rows($result);
                        for($i = 1; $i <= $num; $i++)
                        {
                            $row = mysqli_fetch_array($result);
        ?>
                            <tr><td><?php echo $row['subject']; ?></td></tr>
        <?php
                        }
                    ?>
                    </table>
                </div>
                </div>
        <?php
            }
            else
            {
                header('location:http://localhost/examples/online-examination-system/admin.php');
            }
        ?>
    </body>
     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>