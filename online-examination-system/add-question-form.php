<html>
    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        
        <title>Add Questions</title>
        
        <style>
            .heading{
                text-align: center;
                color: #ea0808;
                background-color: black;
                height: auto;
                padding: 10px;
            }
            .finish{
                float: right;
                margin: 5px;
            }
            .question-box{
                height: auto;
                width: 600px;
                border: 1px black ridge;
                margin: 0px auto;
                padding: 15px;
                background-color: #D1D1D1;
            }
            #question{
                height: 60px;
                width: 550px;
                padding: 0px;
                margin: 0px;
                padding: 5px;
            }
            .options{
                width: 500px;
                margin: 0px 0px 5px 0px;
            }
            body{
                background-color: #478EEF;
            }
        </style>
        
    </head>
    <body>
        <?php
            session_start();
            if(isset($_SESSION['login-id']))
            {
                if( !(isset($_SESSION['subject']) and isset($_SESSION['numq'])) )
                {
                    if(isset($_POST['subject']) and isset($_POST['numq']))
                    {
                        $_SESSION['subject'] = $_POST['subject'];
                        $_SESSION['numq'] = $_POST['numq'];   
                    }
                    else
                    {
                        header('location:http://localhost/examples/online-examination-system/admin-home.php');     
                    }
                }
                
                if($_SESSION['numq']>0)
                {
        ?>
                    <h1 class="heading">
                        ADD QUESTIONS <span class="logout"><a href="admin-logout.php"><button class="btn btn-danger">Logout</button></a></span></h1>
        
                    <div class="question-box">
                        <form action="add-question.php" method="post">
                            <div style="margin-left:200px;">
                                <select name="subject"><option value="<?php echo $_SESSION['subject'] ?>"><?php echo $_SESSION['subject'] ?></option></select>
                            </div>
                            <label for="question">Enter question: <textarea type="text" name="question" id="question"></textarea></label>
                            <label for="option1" class="control-label">Option 1: <input type="text" name="option1" id="option1" class="options"></label>
                            <label for="option2" class="control-label">Option 2: <input type="text" name="option2" id="option2" class="options"></label>
                            <label for="option3" class="control-label">Option 3: <input type="text" name="option3" id="option3" class="options"></label>
                            <label for="option4" class="control-label">Option 4: <input type="text" name="option4" id="option4" class="options"></label>
                            <label for="correct-option">Correct Option: <input type="text" name="correct-option" id="correct-option" class="options"></label>
                            <div style="margin:10px 0px 0px 200px;">
                                <input type="submit" class="btn btn-success" value="Add Question">
                            </div>
                        </form>
                    </div>        
        
        <?php
                }
                else
                {
                    unset($_SESSION['subject']);
                    unset($_SESSION['numq']);
                    header('location:http://localhost/examples/online-examination-system/admin-home.php');    
                }
            }
            else
            {
                header('location:http://localhost/examples/online-examination-system/admin.php'); 
            }
        ?>
    </body>
</html>
    
    
    
    
    
    
    
    
    
    
    
    
    
    