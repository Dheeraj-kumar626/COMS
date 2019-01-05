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
       <title>Tracker</title>
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
    //mysql_connect($host, $user, $password);
    $con = mysqli_connect($host, $user, $password, $db);

    if(!$con){
        die("Connection Failed " . mysqli_connect_error());
    }
        $sql="select * from track_table where Status='NA' ";
        $result=  mysqli_query($con, $sql) or die(mysqli_errno($con));
        $rows = mysqli_num_rows($result);
     //   $row=mysqli_fetch_assoc($result);
        
        while($row=mysqli_fetch_assoc($result)){
    //        print_r($row);
            $TID=$row["TID"];
            $Title=$row["Title"];
            $papname =$row["Paper_src"];
            echo "<h3>$Title</h3>";
        echo "<a href='$papname' target = _blank> Click Here </a><br>";
        $sql1="select ID from users where Type ='R' ";
         $result1=  mysqli_query($con, $sql1) or die(mysqli_errno($con));
         $rows1 = mysqli_num_rows($result1);
       //  $row1=mysqli_fetch_assoc($result1);
        // print_r($row1);
      //   echo "Row ID is $row1";
        ?>
        <form method="POST" action="#">
        <!--    <input type="text" name="tid" value=" <?php echo $TID ?>"></input>  -->
            <div class="col-lg-4">
        <select class="form-control" name="Reviewer" >
           <?php while($row1=mysqli_fetch_assoc($result1)){ ?>
            <option value="<?php echo $row1["ID"] ?>" ><?php echo $row1["ID"] ?></option>
            <?php }  ?>
        </select>
            </div>
            <button class="btn btn-primary" type="submit" name="submit" value="submit" >Submit</button>
        </form>
        
      <?php
      //$_SERVER["REQUEST_METHOD"]=="POST"
        if(isset($_POST['submit'])){
            echo "Entered <br>";
            echo "Updataing status";
            $revid=  mysqli_escape_string($con,$_POST['Reviewer']);
            echo "Reviewer ID is $revid";
            echo "Track ID is $TID";
            $sql2="UPDATE track_table SET Status='A', RID=$revid where TID=$TID ";
            $result2=  mysqli_query($con, $sql2); //or die(mysqli_errno($con));
            echo "YOOYOO <br>";
           // $rows = mysqli_num_rows($result2);   
        }
        ?>
        
        
        <?php
       } 
        ?>



        
    </body>
</html>

-->








