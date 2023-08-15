<?php
session_start();
include "admindbcon.php";

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
            header("Location: ../adminsign.php?error=username");
            exit();
        } elseif(empty($pass)){
            header("Location: ../adminsign.php?error=password");
            exit();
        } else {
            $sql = "SELECT * FROM admin WHERE username='$uname';";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if($resultCheck > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $ciphertext = $row['password'];
                    $verify = password_verify($pass , $ciphertext);
                    if($verify){
                        $_SESSION['adminaccess'] = $row['access'];
                        $_SESSION['adminpassword'] = $row['password'];
                        $_SESSION['adminusername'] = $row['username'];
                        $_SESSION['adminname'] = $row['name'];
                        $_SESSION['adminid'] = $row['id'];
                    
                        header("Location: ../adminmain.php");
                        exit();
                    } else {
                        header("Location: ../admi.php?action=danger");
                        exit();
                    }
                }
            } else {
                header("Location: ../admi.php?action=danger");
                exit();
            }
        }
    } else {
        header("Location: ../admi.php?error=click");
        exit();
    }

 
    