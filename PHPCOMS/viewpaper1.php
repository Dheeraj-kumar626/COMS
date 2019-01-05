<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>View Submitted Papers</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/D5B1E700-7C70-7B46-820F-C94ACB215CEF/main.js" charset="UTF-8"></script><style>
.table-striped>tbody>tr:nth-child(odd)>td, 
.table-striped>tbody>tr:nth-child(odd)>th {
   background-color: #C49F0F;
}

.table-hover tbody tr:hover td, .table-hover tbody tr:hover th {
  background-color: #FF9F9F;
}
 </style>
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

$x=1;
?>
<div class="container ">
    <br><br><br>
<table class="table table-striped table-hover">
  <tr>
      <th>S.No</th>
      <th>Title</th>
      <th>Link</th>
      <th>Status</th>
      <th>Result</th>
      <th>Review</th>
      <th>Pay</th>
  </tr> 

<?php
    while($row=mysqli_fetch_assoc($result)){
    //    print_r($row);
        $Title=$row["Title"];
        $papname =$row["Paper_src"];
        $stat=$row["Status"];
        $rev=$row["Review"];
        $res=$row["Results"]; ?>
          <tr>
            <td><?php echo "$x"; ?></td>
            <td><?php echo "<h5>$Title</h5>"; ?></td>
            <td><?php echo "<a href='$papname' target = _blank> Click Here </a>"; ?></td>
            <td><?php echo "$stat"; ?></td>
            <td><?php echo "$res"; ?></td>
            <td><?php echo "$rev"; ?></td>
            <?php
            if($res=='A'){
                ?><td><a href="Payment.php"><input type="submit" value="Proceed for Payment" class="btn"></a></td>
            <?php }
            else{
                ?> <td> </td>
            <?php }  ?>
           
        </tr>
        <?php
        $x++;
    }  ?>
<br /><br />

</body>
</html>
