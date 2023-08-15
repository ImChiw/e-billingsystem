<?php
 require "dbcon.php";
//default value
$name = '';
$id = 0;
$username = '';
$password = "";
$address = "";
$update = false;
//add data
if(isset($_POST['save'])){
    $count2 = 0;
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
     $sql = "SELECT * FROM tbluser WHERE username='$username'";
     $res = mysqli_query($conn, $sql);
     if (mysqli_num_rows($res) > 0) {
         header("Location: ../loginform.php?action=username");
     }else{  
      $sql = "INSERT INTO tbluser(name,username,address,password,img_url,count2) VALUES('$name','$username' ,'$address' , '$cipertext','$img_new_name','$count2');";
     
      $result = mysqli_query($conn , $sql);

     }
if($result || $result1){
    header("Location: ../loginform.php?action=success");
}
         } else {
            header("Location: ../loginform.php?message=format");
           
         } 
    } else{
        header("Location: ../loginform.php?message=size");
    }
}
else{
    header("Location: ../loginform.php?message=image");
}

     //CREATING TABLE
     $conn = mysqli_connect("localhost", "root", "", "billing");
     // Check connection
     if($conn === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
      // Attempt create table query execution
    $sql = "CREATE TABLE $username(
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        card VARCHAR(250) NOT NULL,
        date VARCHAR(250) NOT NULL,
        previous VARCHAR(250) NOT NULL,
        recent VARCHAR(250) NOT NULL,
        consume VARCHAR(250) NOT NULL,
        price VARCHAR(250) NOT NULL,
        paid VARCHAR(250) NOT NULL
    )";
     $result = mysqli_query($conn , $sql);
    
     if($result){
        header("Location: ../loginform.php?action=success");
        echo "qweqwe";
     }else {
      header("Location: ../loginform.php?action=username");
             } 
// Close connection
mysqli_close($conn);
}      
$previous=0;
$recent=0;
$consume=0;
$price=0;
$name="";
$id=0;

//sybc data from the payment php
if(isset($_GET['edit'])){
    $username = $_SESSION['userusername'];
    $id  = $_GET['edit'];
    $update = true;
    $sql = "SELECT * FROM $username WHERE id=$id;";
    $result = mysqli_query($conn , $sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            $date = $row['date'];
            $previous = $row['previous'];
            $recent = $row['recent'];
            $consume = $row['consume'];
            $price = $row['price'];
            $paid = $row['paid'];
        }
    }
}
//update data
if(isset($_POST['update'])){
    $userid = $_POST["userid"];
    $id = $_POST['id'];
    $username = $_POST["username"];
    $paid = $_POST["paid"];
    $date = $_POST["date"];
    $price = $_POST["price"];
    $previous = $_POST["previous"];
    $recent = $_POST["recent"]; 
    $consume = $_POST["consume"];
    $price = $_POST["price"];
    $paid = "PAID";
    $card = $_POST["card"];
    $add =1;
    $sql1 = "UPDATE $username SET  card ='$card',date='$date',previous='$previous',recent='$recent',  consume = '$consume' ,  price = '$price',  paid = '$paid' WHERE id=$id;";
    $result1 = mysqli_query($conn , $sql1);
    $sql = "UPDATE tbluser SET  count2 = count2+2 WHERE id=$userid;";
    $result = mysqli_query($conn , $sql);
    if($result1){
        if($result){
        header("Location: ../previous.php?action=success");
        }
    }
}
//changepass

if(isset($_POST['sub'])){
    $name1 =$_POST['name1'];
    $username1 =$_POST['username1'];
    $newpassword =$_POST['newpassword'];

    $sql = "SELECT * FROM tbluser WHERE username='$username1'OR name='$name1'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck  > 0) {
        while($row = mysqli_fetch_assoc($result )){
            $name = $row['name'];
            $username = $row['username'];
        }


        if($name1==$name AND $username1==$username){
        $cipertext = password_hash($newpassword, PASSWORD_DEFAULT);
        $sql = "UPDATE tbluser SET password ='$cipertext' WHERE name = '$name1'OR username='$username1';";
        $result = mysqli_query($conn , $sql);
        if($result){
        header("Location: ../forgot.php?message=success");
        exit();
        }
    } else{
        header("Location: ../forgot.php?message=notregister");
        exit();
      }
}
    else{
        header("Location: ../forgot.php?message=notregister");
        exit();
      }
} 