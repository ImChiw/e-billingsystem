<?php
session_start();

if(isset($_SESSION['adminid'])){

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/adminsign.css">
  <title>Admin Sign Up</title>
</head>
<body>

<?php
$name="";
$username="";
$address="";
$password="";

      ?>
<div id="login" class="animated bounce">
     <?php
          if(isset($_GET['action'])){
            if($_GET['action'] == 'success')
            echo '<b><center style="background-color: lightgreen;height:40px;justify_items:center;">Record has been saved!</center></b>';           
              elseif($_GET['action'] == 'username')
              echo '<b><br><center style="background-color: #faa49d;height:40px;justify_items:center;">Username Already Exist!</center></b>';
    
      }
      if(isset($_GET['message'])){
        echo '<div class="alert alert-danger" role="alert">';
        $_message = $_GET['message'];
        if($_message == 'upload')
          echo "<b><center>Submit an Image first!</center></b>";
        else if($_message == 'size')
        echo '<b><br><center style="background-color: #faa49d;height:40px;justify_items:center;">Image must be 2 MB or less!</center></b>';
     
        else if($_message == 'format')
        echo '<b><br><center style="background-color: #faa49d;height:40px;justify_items:center;">Wrong Image Format must be ( png , jpeg , jpg )</center></b>';

          echo '</div>';
        }      
require "include/adminprocess.php"; 
?>
  <h2>Sign Up As Admin</h2>
  <form action="include/adminprocess.php" method="POST"enctype="multipart/form-data"class="sign-up-form">
 
    <div class="input">
      <label for="name" class="entypo-user"></label>
      <input type="text" name="name" value="<?php echo$name;?>"id="name" placeholder="Enter Name" required/>
    </div>
    <div class="input">
      <label for="name" class="entypo-user"></label>
      <input type="text" name="username"value="<?php echo$username;?>" id="pw" placeholder="Enter Username" required/>
    </div>
    <div class="input">
      <label for="name" class="entypo-home"></label>
      <input type="text" name="address"value="<?php echo$address;?>" id="pw" placeholder="Enter Address" required/>
    </div>
    <div class="input">
      <label for="name" class="entypo-lock"></label>
      <input type="password" name="password"value="<?php echo$password;?>" id="pw" placeholder="Enter Password" required/>
    </div>
    <div class="input">
      <label for="name" class="entypo-user"></label>
      <input type="file" name="img_input" required />
    </div>
    <input type="hidden"name="id"value="<?php echo$id;?>">
      <input type="submit" name="save" value="Sign In" />
<center><a href="adminhome.php"><img src = "../icon/back.png"height="30"width="30"></a></center>
          
  </form>  
</div>  
<?php
}else if(isset($_SESSION["userid"])){
header("Location: ../home.php?error=click");
exit();
}else{

}
?>
</body>
</html>