<?php
session_start();
include "dbcon.php";
    if(isset($_POST['login'])){
        function charvalidation($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $uname = charvalidation($_POST['uname']);
        $pass = charvalidation($_POST['password']);
        if(empty($uname)){
            header("Location: ../loginform.php?error=username");
            exit();
        } elseif(empty($pass)){
            header("Location: ../loginform.php?error=password");
            exit();
        } else {
            $sql = "SELECT * FROM tbluser WHERE username='$uname';";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if($resultCheck > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $ciphertext = $row['password'];
                    $verify = password_verify($pass , $ciphertext);
                    if($verify){
                        $_SESSION['userpassword'] = $row['password'];
                        $_SESSION['userimg_url'] = $row['img_url'];
                        $_SESSION['userusername'] = $row['username'];
                        $_SESSION['username'] = $row['name'];
                        $_SESSION['userid'] = $row['id'];
                        $_SESSION['add'] = $row['address'];
                        header("Location: ../home.php");
                        exit();
                    } else {
                        header("Location: ../loginform.php?error=incorrect");
                        exit();
                    }
                }
            } else {
                header("Location: ../loginform.php?error=incorrect");
                exit();
            }
        }
    } else {
        header("Location: index.php?error=click");
        exit();
    }
