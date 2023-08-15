<?php

$serverName = "127.0.0.1";
$dbUserName = "root";
$dbPassword = "";
$dbName = "billing";

$conn = mysqli_connect($serverName , $dbUserName , $dbPassword , $dbName);

if($conn){
    //echo "Connected.";
} else {
    die("Connection Failed." . mysqli_connect_error());
}
?>