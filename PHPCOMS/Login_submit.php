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
//mysqli_select_db($link, $db);

//session_start();

if(isset($_POST['emaill'])){
    $umail=$_POST['emaill'];
    $upass=$_POST['passwd'];
    $cat=  mysqli_escape_string($con,$_POST['Type']);
    
    $sql="select ID,User from users where Email='".$umail."' and Pass='".$upass."' and Type='".$cat."'  ";
  //  $sql="select ID,User from users where Email='$umail' and Pass='$upass' ";
    $result=  mysqli_query($con,$sql);
    $rows = mysqli_num_rows($result);
    
    $row=mysqli_fetch_assoc($result);
     
    
    if($rows==1){
        echo "Rows are $rows";
     //   echo "User Mail  is $umail <br>";
        session_start();
        $_SESSION['email']=$umail;
        $_SESSION['user']=$row["User"];
        $_SESSION['id']=$row["ID"];
        $_SESSION['Type']=$cat;
       // $_SESSION['id']=mysqli_insert_id($con);
        echo "Session variables are set ".$_SESSION['email'].", ID is ".$_SESSION['id'];
        if($cat=='A'){
        header('Location: Home.php');
        }
        else if($cat=='R'){
            header('Location: RHome.php');
        }
        else if($cat=='CM'){
            header('Location: CMHome.php');
        }
        else if($cat=='T'){
            header('Location: THome.php');
        }
        else if($cat=='RM'){
            header('Location: RMHome.php ');
        }
        exit();
    }
    else{
        
        echo "Rows are $rows";
        echo "cat is $cat";
        echo "<h1>Invalid Login</h1>";
        exit();
    }
     
}


?>
