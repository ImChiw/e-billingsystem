<?php
session_start();

if(isset($_SESSION['userid'])){
	header("Location: ../home.php?error=click");
	exit();
}else if(isset($_SESSION['adminid'])){
	header("Location: adminmain.php?error=click");
	exit();
}else
{

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/admin.css">
  <title>Admin Log in</title>
</head>
<body>

<div id="login" class="animated bounce">
<?php

require "include/adminprocess.php";
if(isset($_GET['action'])){
    echo '<div class="alert alert-'.$_GET['action'].'" role="alert">';
  if($_GET['action'] == 'danger')
    echo '<b><br><center style="background-color: #faa49d;height:40px;justify_items:center;">Invalid username or Password</center></b>';

  }     
?>
  <h2>login As Admin</h2>
  <form action="include/adminlogin.php" method="post">
    <div class="input">
      <label for="name" class="entypo-user"></label>
      <input type="text" name="uname" id="name" placeholder="Enter Username" required/>
    </div>
    <div class="input">
      <label for="name" class="entypo-lock"></label>
      <input type="password" name="password" id="pw" placeholder="Enter Password" required/>
      
    </div>
    <a href="adminforgot.php">forgotpassword?</a>
      <input type="submit" onclick="makePage()" name="login"value="Sign In" /></button>

      <center><a href="../index.php"><img src = "../icon/back.png"height="30"width="30"></a></center>
  </form>  
</div>  
<script src="js/makepage.js"></script>
<?php
}
?>
</body>
</html>
