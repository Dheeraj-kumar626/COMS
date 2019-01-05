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
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
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

if($_SERVER["REQUEST_METHOD"] == "POST"){
 $aid =$_SESSION['id'];
$name = mysqli_real_escape_string($con, $_POST['name']);
$email = mysqli_real_escape_string($con, $_POST['email1']);
$password1 = mysqli_real_escape_string($con, $_POST['passwd']);
//$up1 = mysqli_real_escape_string($con, $_POST['passwd1']);
$contact = mysqli_real_escape_string($con, $_POST['contact']);
//$city = mysqli_real_escape_string($con, $_POST['city']);
$address = mysqli_real_escape_string($con, $_POST['address']);
echo "email is $email";
echo "p is $password1 and up is $up1<br>";
echo "aid is $aid";
/*
//insert query and store the data in the database
$select_query="UPDATE users SET Email=$email,Name=$name,Pass=$password1,Contact=$contact,City=$city,Address=$address where ";
$result_query=  mysqli_query( $con,$select_query); // or die(mysqli_error($con));
$total_rows_fetched= mysqli_num_rows($result_query);
echo "Mail ID is $email <br>";
echo "Rows Fetched is $total_rows_fetched <br>";
if($total_rows_fetched>0){
    echo 'Email Id has to be Unique';
    
}  */

    $query1="UPDATE users SET Pass=$password1 where ID=$aid ";
    $new_user_submit=  mysqli_query($con, $query1) ;//or die(mysqli_error($con));
    echo 'User Updated Successfully';
    echo "<h1>Hello $name</h1>";
  //  session_start();
    $_SESSION['email']=$email;
    $_SESSION['user']=$name;
  //  $_SESSION['id']=mysqli_insert_id($con);
 //   $_SESSION['Type']=$cat;
    header('Location: Home.php');
  
}

        ?>
    </body>
</html>
