<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>View Papers</title>
               <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!--     <link rel="stylesheet" type="text/css" href="style.css">  -->
        <link rel="icon" href="https://s3.ap-south-1.amazonaws.com/townscript-common-resources/images/custom/townscript_favicon_32.png">

    </head>
    <body background="img2/bg1.png">
        
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
                        <li><a href="Home.php" class="active"><span class="glyphicon glyphicon-user"></span><?php echo "$suser"; ?></a></li>
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

//mysql_connect($host, $user, $password);
$con = mysqli_connect($host, $user, $password, $db);

if(!$con){
    
    die("Connection Failed " . mysqli_connect_error());
}


$sql = "select * from track_table where AID='$aid'";

$result=  mysqli_query($con, $sql); //or die(mysqli_error($con));

    $rows = mysqli_num_rows($result);  
    $var1=$rows;
    echo "<br>";
    echo "<br>";
    echo "<br>";
    
    while($row=mysqli_fetch_assoc($result)){
    //    print_r($row);
        $Title=$row["Title"];
        $papname =$row["Paper_src"];
        $stat=$row["Status"];
        $rev=$row["Review"];
        $res=$row["Results"]; ?>
        <div class="col-lg-4">
    <?php     echo "<h3>$Title</h3>";
       echo "<a href='$papname' target = _blank> Click Here </a><br>";
       echo "Status is $stat <br>";
       echo "Result is $res<br>";
       echo "Review is $rev<br>"; 
            if($res=='A'){
                ?><a href="Payment.php"><input type="submit" value="Proceed for Payment" class="btn"></a>
    <?php        }
    ?>
       </div>
        <?php
       //ec
    }  ?>

   <!--      <a href="<?php $papname ?>"><?php $papaname?></a>  -->
    </body>
</html>
