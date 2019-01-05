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
       <title>Reviewer</title>
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
        echo "<br>";
        echo "<br>";
        echo "<br>";
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
        <?php
        // put your code here
    $host="127.0.0.1:3306";
    $user="root";
    $password="";
    $db="coms";
    $TID;
    $x=0;
    //mysql_connect($host, $user, $password);
    $con = mysqli_connect($host, $user, $password, $db);

    if(!$con){
        die("Connection Failed " . mysqli_connect_error());
    }
        $sql="select * from track_table where RID=$aid and Status='A' ";
        $result=  mysqli_query($con, $sql) or die(mysqli_erno($con));
        $rows = mysqli_num_rows($result);
     //   $row=mysqli_fetch_assoc($result);
        
        while($row=mysqli_fetch_assoc($result)){
    //        print_r($row);
            $TID=$row["TID"];
            $Title=$row["Title"];
            $papname =$row["Paper_src"];
            echo "<h3>$Title</h3>";
        echo "<a href='$papname' target = _blank> Click Here </a><br>";
      /*  $sql1="select ID from users where Type ='R' ";
         $result1=  mysqli_query($con, $sql1) or die(mysqli_errno($con));
         $rows1 = mysqli_num_rows($result1);  */
       //  $row1=mysqli_fetch_assoc($result1);
        // print_r($row1);
      //   echo "Row ID is $row1";
        ?>
        
        <form method="POST" action="#">
        <!--    <input type="text" name="tid" value=" <?php //echo $TID ?>"></input>  -->
          
                        <div class="form-group">
                        <label for="Review">Review</label>
                        <input type="text" class="form-control" name="text1" placeholder="Review" required="true">
                        </div>
                            <div class="radio">
                            <label>
                                <input type="radio" name="Type" value="A">Assigned
                            </label>
                            <label>
                                <input type="radio" name="Type" value="D">Declined
                            </label>
                            </div>
            
          <?php  $x=$TID;  ?>
            <button class="btn btn-primary" type="submit" name="<?php echo $x ?>" value="submit" >Submit</button>
          
        </form>
  
      <?php
      //$_SERVER["REQUEST_METHOD"]=="POST"
        if(isset($_POST[$x])){
            echo "Entered <br>";
            echo "Updataing status";
            $rev=  mysqli_escape_string($con,$_POST['text1']);
            $res=  mysqli_escape_string($con,$_POST['Type']);
            echo "Track ID is $TID";
            echo "Reviewer ID is $aid";
            echo "Review is $rev";
            echo "Res is $res";
            $sql2="UPDATE track_table SET Status='R' where TID=$TID";//,Results=$res,Review=$rev where TID=$TID ";
            $result2=  mysqli_query($con, $sql2); //or die(mysqli_errno($con));
            echo "YOOYOO <br>";
            if($res=='A'){
            $sql3="UPDATE track_table SET Results='A' where TID=$TID";//,Results=$res,Review=$rev where TID=$TID ";
            $result3=  mysqli_query($con, $sql3);
            }
            $sql5=" UPDATE `track_table` SET `Review` = '$rev ' WHERE `track_table`.`TID` = $TID";
         //   $sql4="UPDATE track_table SET Review=$rev where TID=$TID";//,Results=$res,Review=$rev where TID=$TID ";
            $result4=  mysqli_query($con, $sql5);
           // $rows = mysqli_num_rows($result2);   
        }
        ?>
        
        
        <?php
       } 
        ?>



        
    </body>
</html>
