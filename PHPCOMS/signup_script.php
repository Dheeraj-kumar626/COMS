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

session_start();

if(isset($_POST['email1'])){

$name = mysqli_real_escape_string($con, $_POST['name']);
$email = mysqli_real_escape_string($con, $_POST['email1']);
$password1 = mysqli_real_escape_string($con, $_POST['passwd']);
$cat = mysqli_real_escape_string($con, $_POST['Type']);
$contact = mysqli_real_escape_string($con, $_POST['contact']);
$city = mysqli_real_escape_string($con, $_POST['city']);
$address = mysqli_real_escape_string($con, $_POST['address']);

//insert query and store the data in the database
$select_query="select * from users where Email='".$email."' ";
$result_query=  mysqli_query( $con,$select_query); // or die(mysqli_error($con));
$total_rows_fetched= mysqli_num_rows($result_query);
echo "Mail ID is $email <br>";
echo "Rows Fetched is $total_rows_fetched <br>";
if($total_rows_fetched>0){
    echo 'Email Id has to be Unique';
    
}
else{
    $query1="insert into users(Email,User,Pass,Type,
             Contact,City,Address) values ('$email','$name','$password1','$cat','$contact','$city','$address')";
    $new_user_submit=  mysqli_query($con, $query1) or die(mysqli_error($con));
    echo 'User created Successfully';
    echo "<h1>Hello $name</h1>";
  //  session_start();
    $_SESSION['email']=$email;
    $_SESSION['user']=$name;
    $_SESSION['id']=mysqli_insert_id($con);
    $_SESSION['Type']=$cat;
    header('Location: Home.php');
  }
}
?>


