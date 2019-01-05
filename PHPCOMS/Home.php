<?php
session_start();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Conference Management System</title>
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
        
        <?php
     //   echo "YOOO ".$_SESSION['id'].".<br> ";
        $suser=$_SESSION['user'];
        $semail=$_SESSION['email']; 
        $aid=$_SESSION['id'];
        ?>

        <nav class="navbar navbar-inverse navbar-fixed-top header1">
            <div class="container innerHeader1">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#MyNavbar">
                       <span class="icon-bar"></span>
                       <span class="icon-bar"></span> 
                       <span class="icon-bar"></span>
                    </button>
                    <ul class="nav navbar-nav navbar-left">
                        <li><a href="index.php"><img src="https://s3.ap-south-1.amazonaws.com/townscript-common-resources/images/custom/townscript_favicon_16.png" class="img-responsive"></a></li>
                        <li><a href="Home.php" class="navbar-brand Logo1">COMS</a></li>
                    </ul>
                </div>
                <div class="collapse navbar-collapse Header-Link1" id="MyNavbar"> 
                    <ul class="nav navbar-nav navbar-right">
                        <
                        <li><a href="Profile.php" class="active"><span class="glyphicon glyphicon-user"></span><?php echo "$suser"; ?></a></li>
                        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                    </ul>
                </div>
            </div>              
        </nav>

        
        <h1 style="text-align: center">HELLO <?php echo "$suser"; ?></h1> <br>
   <?php     echo "<h2> Email ID is $semail .<br>"; ?>
   <?php     echo "<h2> Author ID  is $aid .<br>";
        echo "Successfully Logged in . <br>";  ?>
    <!--    <h2 style="text-align: center">Hurry! Start Submitting Paper</h2><br>  -->
    <h2 style="text-align: center">Hurry! Start Submitting Paper</h2><br>
    <div> 
        <div style="float: left; margin-left: 30%">
            <a href="PaperSubmission.php" class="btn btn-primary btn-lg active button1"  >Submit a Paper</a>
        </div>
        <div style="float: right;margin-right:30%; ">
            <a href="viewpaper1.php" class="btn btn-primary btn-lg active button1">View Submitted Papers</a>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
 <!--   <a href="Logout.php" class="btn btn-primary btn-lg active button1" style="margin-left: 45%; margin-top: 10px;" >Logout</a>  -->
    </body>
</html>
