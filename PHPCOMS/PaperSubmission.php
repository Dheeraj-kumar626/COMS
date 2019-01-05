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
        <title>Paper Submission</title>
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
                        <li><a href="index.php" class="navbar-brand Logo1">COMS</a></li>
                    </ul>
                </div>
                <div class="collapse navbar-collapse Header-Link1" id="MyNavbar"> 
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="Home.php" class="active"><span class="glyphicon glyphicon-user"></span><?php echo "$suser"; ?></a></li>
                        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                    </ul>
                </div>
            </div>              
        </nav>

        <div>
            <div class="container-fluid">
                <div class="row">
                    
                    <div class="col-lg-4 col-lg-offset-4 col-sm-6 col-sm-offset-3">
                        <h1>PAPER SUBMISSION</h1>
                        <form method="POST" enctype="multipart/form-data" action="confirm_submission.php">
                            <div class="form-group">
                                <input type="text" class="form-control" name="title" placeholder="Paper Title">
                            </div>
                            
                            <div class="form-group">
                                <label for="Type of Submission">Type of Submission</label>
                            <select class="form-control">
                                <option>Abstract</option>
                                <option>Full Proposal</option>
                                <option>Abstract and Proposal</option>
                                <option>Abstract and Presentation</option>
                            </select>
                            </div>

                          <label>Select file:</label><input type="file" name="myFile"><br><br>

                            <div class="form-group">
                                <input type="text" class="form-control" name="Descr" placeholder="Short Description">
                            </div>
                          
                          <button class="btn btn-primary" value="Upload" >Submit</button>
                      </form>
                        
                    </div>

                </div>
            </div>
        </div>
        
        
        
        <?php
        // put your code here
        ?>
    </body>
</html>

<?php

/*    
 //   print_r($_FILES["myFile"]);
    $filename = $_FILES["myFile"]["name"];
    $tmpsrc=    $_FILES["myFile"]["tmp_name"];
    $filetype = $_FILES["myFile"]["type"];
    $folder="Papers/".$filename;
    echo "$folder";
 //   if(isset($_POST['Upload'])){
                echo "hihi";
        
    $con1 =move_uploaded_file($tmpsrc, $folder);
    if($con1){
        echo " YOO <br>";
    }
    echo "$filetype";
  //      if($filetype!="text/plain"){
    //        echo "<img src='$folder' height='100' width='100' />";
     //   }
      //  else{
            echo "yahoo!";
        //    echo file_get_contents($folder);
       // }
 //   }
    echo "hjkl";  */
    
?>
