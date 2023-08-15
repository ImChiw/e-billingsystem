<?php
session_start();

if(isset($_SESSION['userid'])){
    header("Location: home.php?error=click");
	exit();
}else if(isset($_SESSION['adminid'])){
  header("Location: admin/adminmain.php?error=click");
exit();
}
else{
	
	?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/forgot.css">
    <title>Forgot Password</title>
</head>
<body>
<br>

<div class="container">
<?php

echo '<b><center>';
           if(isset($_GET['message'])){
               $error = $_GET['message'];
               if($error == 'notregister'){
                   echo '<p class="alert alert-danger">Name or Username are not Registered</p>';
               }
               elseif($error == 'success'){
                   echo '<p class="alert alert-success">Password Changed!</p>';
               }
               elseif($error == 'error'){
                   echo '<p class="alert alert-danger">No User</p>';
               }
           }
           echo '</b></center>';
       ?>
	<div class="main">
		<div class="logo">
			<h2>E</a></h2>
		</div>
		<form action="include/process.php"method="post">
			<input type="name" onChange="javascript:this.value=this.value.toLowerCase();"placeholder="Enter Name" name ="name1"autocomplete="off" required>	<i class="fa fa-user"></i>
            <input type="username"onChange="javascript:this.value=this.value.toLowerCase();" placeholder="Enter Username" name ="username1"autocomplete="off" required>	<i class="fa fa-user"></i>
			<input type="password" placeholder="Set New Password" name ="newpassword"autocomplete="off" required>	<i class="fa fa-lock"></i>
			<button type="submit" name="sub">Change</button>
            <button type="submit" onclick="location.href='loginform.php'" value="Back">Back</button>
		</form>
	</div>
</div>
<?php
}
?>
</body>
</html>