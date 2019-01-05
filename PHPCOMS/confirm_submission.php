<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Paper Submitted</title>
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
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
    </head>
    <body style="background-size: cover; background: url(img2/submit_bg.jpg)no-repeat center center">
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
//   print_r($_FILES["myFile"]);
    $filename = $_FILES["myFile"]["name"];
    $tmpsrc=    $_FILES["myFile"]["tmp_name"];
    $filetype = $_FILES["myFile"]["type"];
    $folder="Papers/".$filename;
    $aid=$_SESSION['id'];
    $suser=$_SESSION['user'];
//    echo "$aid";
//    echo "$folder";  
    $con1 =move_uploaded_file($tmpsrc, $folder);

 //   echo "$filetype";
$host="127.0.0.1:3306";
$user="root";
$password="";
$db="coms";

//mysql_connect($host, $user, $password);
$con = mysqli_connect($host, $user, $password, $db);

if(!$con){
    die("Connection Failed " . mysqli_connect_error());
}
if(!$con1){
    echo " File Not Uploaded..Please Upload Again.. <br>";
}
else{
    $title=mysqli_real_escape_string($con,$_POST['title']);
    $Short_desc=mysqli_real_escape_string($con,$_POST['Descr']);
if(isset($filename)){
    $query1="insert into track_table(AID,Title,Short_desc,Paper_src) values ('$aid','$title','$Short_desc','$folder')";
    $new_paper_submit=  mysqli_query($con, $query1) or die(mysqli_error($con));
   // echo 'Paper Submitted Successfully'; 
   
    }
?>
  <!--      <div class="w3-jumbo "><i style="float: right;margin-right:30%" class="fa fa-thumbs-up w3-spin "></i><div style="height: 10px">SUBMITTED SUCCESFULLY</div></div>
        <br>
        <br>
        <br>  -->

     
    <?php
        //echo "$folder"."H..IHI<br>";
        
           echo "<h1>Submitted Succesfully!!...</h1>";
           echo "<a href= '$folder' class='btn btn-primary btn-sm' style='margin-left:45%' target = _blank> View Uploaded Paper</a>";
     //      echo "<a href='Home.php' class='btn btn-primary btn-lg active button1' style='margin-left:45%'>Home</a>";  
    }
    ?>
    </body>
</html>
