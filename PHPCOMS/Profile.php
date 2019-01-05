<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Profile</title>
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

  <!--      <nav class="navbar navbar-inverse navbar-fixed-top header1">
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
                        <li><a href="Profile.php.php" class="active"><span class="glyphicon glyphicon-user"></span><?php echo "$suser"; ?></a></li>
                        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                    </ul>
                </div>
            </div>              
        </nav>  -->
        <?php
$host="127.0.0.1:3306";
$user="root";
$password="";
$db="coms";

//mysql_connect($host, $user, $password);
$con = mysqli_connect($host, $user, $password, $db);

if(!$con){
    die("Connection Failed " . mysqli_connect_error());
}

 $sql="select * from users where Email='".$semail."' ";
    
    $result=  mysqli_query($con,$sql);
 //   $rows = mysqli_num_rows($result);
    if(!$result){
        echo "Problem with Result <br>";
    }
    $row=mysqli_fetch_assoc($result);
 //   print_r($row);
    ?>
  
  <form class="col-lg-4 col-lg-offset-4 col-sm-6 col-sm-offset-3" method="POST" action="Profile_Update.php">
                             <h2>UPDATE PROFILE</h2>
                            <div class="form-group">
                                <label for="password">Name</label>
                                <input type="text" class="form-control" name="name" value="<?php echo $row["User"]; ?>">
                            </div>
                        
                            <div class="form-group">
                                <label for="password">Email</label>
                                <input type="email" class="form-control" name="email1" value="<?php echo $row["Email"] ?>"placeholder="Email" required="true">
                            </div>
                            <div class="form-group">
                                <label for="password">Update Password</label>
                                <input type="password" class="form-control" name="passwd" value="<?php echo $row["Pass"] ?>" placeholder="password">
                            </div>
                          <!--  <div class="form-group">
                                <label for="password">Comfirm Password</label>
                                <input type="text" class="form-control" name="passwd1" value="<?php echo $row["Pass"] ?>"placeholder="contact">
                            </div>  -->
                            <div class="form-group">
                                <label for="password">Contact</label>
                                <input type="text" class="form-control" name="contact"  value="<?php echo $row["Contact"] ?> "placeholder="city">
                            </div>
                            <div class="form-group">
                                <label for="password">Address</label>
                               <input type="text" class="form-control" name="address" value="<?php echo $row["Address"] ?> "placeholder="Address">
                            </div>
                            <label>
                            <button class="btn btn-danger">Update Profile</button>
                            </label>
                        </form>
  
  
    
        
        
        
    </body>
</html>
