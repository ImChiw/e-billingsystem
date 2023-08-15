<?php
    require "admindbcon.php";
//default value
$name = "";
$username = "";
$address = "";
$password = "";
$id = 0;
//add data
if(isset($_POST['save'])){
    $count1=0;
    $name = strtolower($_POST['name']);
    $username = strtolower($_POST['username']);
    $address = $_POST['address'];
    $password = $_POST['password'];
    $img_name = $_FILES['img_input']['name'];
    $img_type = $_FILES['img_input']['type'];
    $img_tmp_name = $_FILES['img_input']['tmp_name'];
    $img_error = $_FILES['img_input']['error'];
    $img_size = $_FILES['img_input']['size'];


    $img_extension = pathinfo($img_name , PATHINFO_EXTENSION);
    $img_extension = strtolower($img_extension);

    $allowed_extension = array("jpeg", "jpg", "png");

    if($img_error == 0 ){
        if($img_size <= 1000000){
            if(in_array($img_extension , $allowed_extension )){
            $img_new_name = uniqid("IMG-", true). '.'.$img_extension;
            $img_upload_path = '../upload/' . $img_new_name;
            move_uploaded_file($img_tmp_name , $img_upload_path);  

     $cipertext = password_hash($password, PASSWORD_DEFAULT);

     // checking if username exist
     $sql = "SELECT * FROM admin WHERE username='$username'";
     $res = mysqli_query($conn, $sql);
     if (mysqli_num_rows($res) > 0) {
         header("Location: ../adminsign.php?action=username");
     }else{  
      $sql = "INSERT INTO admin(name,username,address,password,img_url,count2) VALUES('$name','$username' ,'$address' , '$cipertext','$img_new_name','$count2');";
     
      $result = mysqli_query($conn , $sql);

     }
if($result || $result1){
    header("Location: ../adminsign.php?action=success");
}
         } else {
            header("Location: ../adminsign.php?message=format");
           
         } 
    } else{
        header("Location: ../adminsign.php?message=size");
    }
}
else{
    header("Location: ../adminsign.php?message=image");
}
    }    

if(isset($_POST["aa"])){
    $aid = $_POST['aid'];
    $name = $_POST["name"];
    $date = $_POST["date"];
    $previous = $_POST["previous"];
    $recent = $_POST["recent"];
    $paid = "UNPAID";
    $consume = $_POST["consume"];
    $price = $_POST["price"];
    $sql = "UPDATE admin SET  count1 = count1 + 1    WHERE id=$aid;";
    $sql1 = "INSERT INTO $name(date,previous,recent,consume,price , paid) VALUES('$date','$previous','$recent' ,'$consume' , '$price' , '$paid');";
    $result1 = mysqli_query($conn , $sql1);
    $result = mysqli_query($conn , $sql);
    if($result1){
        if($result){
        header("Location: ../unpaid.php?action=success");
        }
    }
}

//changepass

if(isset($_POST['sub'])){
    $name1 =$_POST['name1'];
    $username1 =$_POST['username1'];
    $newpassword =$_POST['newpassword'];

    $sql = "SELECT * FROM admin WHERE username='$username1'OR name='$name1'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck  > 0) {
        while($row = mysqli_fetch_assoc($result )){
            $name = $row['name'];
            $username = $row['username'];
        }


        if($name1==$name AND $username1==$username){
        $cipertext = password_hash($newpassword, PASSWORD_DEFAULT);
        $sql = "UPDATE admin SET password ='$cipertext' WHERE name = '$name1'OR username='$username1';";
        $result = mysqli_query($conn , $sql);
        if($result){
        header("Location: ../adminforgot.php?action=success");
        exit();
        }
    } else{
        header("Location: ../adminforgot.php?action=danger");
        exit();
      }
}
    else{
        header("Location: ../adminforgot.php?action=danger");
        exit();
      }
} 