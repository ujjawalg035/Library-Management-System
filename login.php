<?php
  include "connection.php";
  include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>

  <title>Student Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
  
  <style type="text/css">
    section
    {
      margin-top: -20px;
    }
    .body{
      height: 650px;
	margin-top: 0px;
      background-image: url(images/li.jpg);
    }
  </style>   
</head>
<body>

<section >
  <div class="body">
   <br>
    <div class="box1">
        <h1 style="text-align: center; font-size: 35px;font-family: Lucida Console;">Library Management System</h1>
        <h1 style="text-align: center; font-size: 25px;">User Login Form</h1><br>
      <form  name="login" action="" method="post">
        <b><p style= " padding-left:50px ;font-size:15px;font-weight:700;">Login as:</p></b>
        <input style="margin-left:100px;width:18px;" type="radio" name="user" id="admin" value="admin">
        <label for="admin">admin</label>
        <input style="margin-left:100px;width:18px;" type="radio" name="user " id="student" value="student">
        <label for="student">student</label>
        <div class="login">
          <input class="form-control" type="text" name="username" placeholder="Username" required=""> <br>
          <input class="form-control" type="password" name="password" placeholder="Password" required=""> <br>
          <input class="btn btn-default" type="submit" name="submit" value="Login" style="color: black; width: 70px; height: 30px"> 
        </div>
      
      <p style="color: white; padding-left: 15px;">
        <br><br>
        <a style="color:yellow; text-decoration: none;" href="Student_/update_password.php">Forgot password?</a>
      </p>
    </form>
    </div>
  </div>
</section>

  <?php

    if(isset($_POST['submit']))
    {
      if($_POST['user']=='admin')
      {
        $count=0;
        $res=mysqli_query($db,"SELECT * FROM `admin` WHERE username='$_POST[username]' && password='$_POST[password]';");
  
        $row= mysqli_fetch_assoc($res);
  
        $count=mysqli_num_rows($res);
  
        if($count==0)
        {
          ?>
                <!--
                <script type="text/javascript">
                  alert("The username and password doesn't match.");
                </script> 
                -->
            <div class="alert alert-danger" style="width: 600px; margin-left: 370px; background-color: #de1313; color: white">
              <strong>The username and password doesn't match</strong>
            </div>    
          <?php
        }
        else
        {
          /*-------------if username & password matches---*/
  
          $_SESSION['login_user'] = $_POST['username']; 
          $_SESSION['pic']= $row['pic'];
  
          ?>
            <script type="text/javascript">
              window.location="Admin_/profile.php"
            </script>
          <?php
        }
      }
      else{

      
      $count=0;
      $res=mysqli_query($db,"SELECT * FROM `student` WHERE username='$_POST[username]' && password='$_POST[password]';");
      
      $row= mysqli_fetch_assoc($res);
      $count=mysqli_num_rows($res);

      if($count==0)
      {
        ?>
              <!--
              <script type="text/javascript">
                alert("The username and password doesn't match.");
              </script> 
              -->
          <div class="alert alert-danger" style="width: 600px; margin-left: 370px; background-color: #de1313; color: white">
            <strong>The username and password doesn't match</strong>
          </div>    
        <?php
      }
      else
      {
        $_SESSION['login_user'] = $_POST['username'];
        $_SESSION['pic']= $row['pic'];

        ?>
          <script type="text/javascript">
            window.location="Student_/profile.php"
          </script>
        <?php
      }
    }
    }

  ?>

</body>
</html>