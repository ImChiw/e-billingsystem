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
  <link rel="stylesheet" href="css/forgot.css">
  <title>Admin Log in</title>
</head>
<body>

<div id="login" class="animated bounce">
<?php

echo '<b><center>';
           if(isset($_GET['action'])){
            echo '<div class="alert alert-'.$_GET['action'].'" role="alert">';
               if($_GET['action'] == 'danger'){
                echo '<b><br><center style="background-color: #faa49d;height:40px;justify_items:center;">Name or Username are not Registred</center></b>';

               }
               elseif($_GET['action']== 'success'){
                echo '<b><br><center style="background-color: #02b00d;height:40px;justify_items:center;">Changepassword Success</center></b>';
               }
           }
           echo '</b></center>';
       ?>
  <h2>Set New Password</h2>
  <form action="include/adminprocess.php" method="post">
    <div class="input">
      <label for="name" class="entypo-user"></label>
      <input type="text" name="name1" id="name" placeholder="Enter Name"onChange="javascript:this.value=this.value.toLowerCase();" requried/>
    </div>
    <div class="input">
      <label for="name" class="entypo-user"></label>
      <input type="username" name="username1" id="username" placeholder="Enter Username"onChange="javascript:this.value=this.value.toLowerCase();" required/>
    </div>
    <div class="input">
      <label for="name" class="entypo-lock"></label>
      <input type="password" name="newpassword" id="pw" placeholder="Enter New Password" required/>
    </div>
      <input type="submit" name="sub"value="Change Password" />

      <center><a href="admi.php"><img src = "../icon/back.png"height="30"width="30"></a></center>
  </form>  
</div>  
<?php
}
?>
</body>
</html>
