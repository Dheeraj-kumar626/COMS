<?php
   // include 'config.php';
    session_start();
    $name = $_SESSION['active'];
    $sql = "SELECT * from users where email_id = '$name'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_assoc($result);
?>


<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="profilestyle.css">
</head>



<body>


  <div class="sidenav" >
      <br><br>
      <div class="hh">

      </div><br>

      <a href="viewprofile.php"><span class="glyphicon glyphicon-eye-open"> ViewProfile</span></a>

      <a href="updateprofile.php"><span class="glyphicon glyphicon-pencil"> EditProfile</span></a>   
   
      <div class="bg-img">
      
      </div>

  </div>




<div class = "main">
    





      <h1 class="ds" >Edit DETAILS</h1>
        <br><br>





  <form action = "update.php" method = "post">
          

<!---================================================================================================-->
      <label for="name"><b>Name</b></label>
      <input type="text" placeholder="Enter Name" name="name" value = "<?php echo $row['name'];?>" ><br>
<!---================================================================================================-->

     
      <label for="email"><b>Email</b></label>
      <input type="email" placeholder="Enter Email" name="username"
                  disabled value = "<?php echo $row['email_id'];?>"><br>
 
 <!---================================================================================================-->     
      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" value = "<?php echo $row['password'] ;?>"><br>
      
<!---================================================================================================-->
      <label for="gender"><b>Gender</b></label>
      <br>

      <?php

      if($row['sex'] == 'm' || $row['sex'] == 'M')
      {

      ?>
          <input type="radio" name="gender" id="male" value="male" checked="checked">
          <label for="male">Male</label><br>
          <input type="radio" name="gender" id="female" value="female">
          <label for="female">Female</label><br>  
      <?php
      }
      else
      {

      ?>
        <input type="radio" name="gender" id="male" value="male" >
          <label for="male">Male</label><br>
          <input type="radio" name="gender" id="female" value="female" checked="checked">
          <label for="female">Female</label><br>  

      
      
      <?php

      }

      ?>


<!---================================================================================================-->
       
      <label for="dob"><b>DOB</b></label>
      <input type="date" placeholder="Date of Birth"  name = "dob" value = "<?php echo $row['dob'] ;?>" ><br>
    
<!---================================================================================================-->
    <button type="submit" class="btn btn-primary">Update</button>


  </form>

        

</div>


</body>
</html>
