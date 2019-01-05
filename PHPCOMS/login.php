<?php
session_start();

if (isset($_SESSION['Type'])) {
    $cat=$_SESSION['Type'];
    if($cat=='A'){
    header('Location: Home.php');
    }
    else{
        $str='Location: '.$cat.'Home.php';
        echo "String is $str";
        header($str);
    }
}
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Login</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="icon" href="https://s3.ap-south-1.amazonaws.com/townscript-common-resources/images/custom/townscript_favicon_32.png">

    </head>
    <body>
          <div class="container">
            <div class="row">
                <div class="panel-heading">
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#MyNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <ul class="nav navbar-nav navbar-left">
                        <li><a href="./index.php"><img src="https://s3.ap-south-1.amazonaws.com/townscript-common-resources/images/custom/townscript_favicon_16.png" class="img-responsive"></a></li>
                        <li><a href="index.php" class="navbar-brand Logo1">COMS</a></li>
                    </ul>
                </div>
                <div class="collapse navbar-collapse" id="MyNavbar"> 
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="signup.php" class="active"><span class="glyphicon glyphicon-user"></span>Sign Up</a></li>
                        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    </ul>
                </div>
            </div>              
        </nav>   
                </div>
                <div class="panel-body">
                   
                    <h2>LOGIN</h2>
                    <div class="col-sm-6">
                    <form method="POST" action="Login_submit.php">
                        <div class="form-group">
                        <label for="email1">Email</label>
                        <input type="email" class="form-control" name="emaill" placeholder="Email-id" required="true">
                        </div>
                        <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="passwd" placeholder="Enter password" required="true">
                        </div>
                            <div class="radio">
                            <label>
                                <input type="radio" name="Type" value="A">Author
                            </label>
                            <label>
                                <input type="radio" name="Type" value="R">Reviewer
                            </label>
                                <!--
                            <label>
                                <input type="radio" name="Type" value="RM">Registration Manager
                            </label>
                            <label>
                                <input type="radio" name="Type" value="CM">Conference Manager
                            </label>  -->
                            <label>
                                <input type="radio" name="Type" value="T">Track Chair
                            </label>
                            </div>
                        <label>
                            <button class="btn btn-primary">Submit</button>
                        </label>
                         <div id="abc">
                        <a href="signup.php" >Don't have an account? Register</a>
                         </div>  
                    </form>
                </div>
                </div>
            </div>

        <div class="bottom1">
            <footer>
                <a href="signup.php" >Don't have an account? Register</a>
                <p><br>Copyright © COMS. All Rights Reserved|Contact Us: +91 9553668153</p>
            </footer>
        </div>
        </div>
         

        <?php
        // put your code here
        ?>
    </body>
</html>
