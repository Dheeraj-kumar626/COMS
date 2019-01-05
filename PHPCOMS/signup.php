<?php
session_start();

if (isset($_SESSION['email'])) { 
    header('Location: Home.php');
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
        <title>SignUp</title>
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

    <!--    <meta charset="UTF-8">
        <title>SIGN UP</title>   -->
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top header1">
            <div class="container innerHeader1">
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
                <div class="collapse navbar-collapse Header-Link1" id="MyNavbar"> 
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="signup.php" class="active"><span class="glyphicon glyphicon-user"></span>Sign Up</a></li>
                        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    </ul>
                </div>
            </div>              
        </nav>
        
        
        
        
        <div>
            <div class="container-fluid">
                <div class="row">
                    
                    <div class="col-lg-4 col-lg-offset-4 col-sm-6 col-sm-offset-3">
                        <h1>SIGN UP</h1>
                        <form method="POST" action="signup_script.php">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email1" placeholder="Email" required="true">
                            </div>
                            <div class="form-group">
                              <input type="password" class="form-control" name="passwd" placeholder="password">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="contact" placeholder="contact">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="city" placeholder="city">
                            </div>
                            <div class="form-group">
                               <input type="text" class="form-control" name="address" placeholder="Address">
                            </div>
                            <div class="radio">
                            <label>
                                <input type="radio" name="Type" value="A">Author
                            </label>
                            <label>
                                <input type="radio" name="Type" value="R">Reviewer
                            </label>
                           <!-- <label>
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
                        </form>
                      
                        
                        
                    </div>
                    

                </div>
            </div>
        </div>        
        
        <div class="panel-footer">
        <footer>
                Copyright © COMS . All Rights Reserved|Contact Us: +91 9553668153
        </footer>
        </div>        
    <!--    <div>TODO write content</div>  -->


    </body>
</html>
