<?php
require "include/admindbcon.php";
$sql = "show tables";
$result = mysqli_query($conn, $sql); // run the query and assign the result to $result
while($table = mysqli_fetch_array($result)) { 
    if($table[0] == "admin" || $table[0] == "tbluser"){//Don't Show Admin and Tbluser
        continue;
      }// go through each row that was returned in $result
 echo($table[0] . " ");  // print the table that was returned on that row.
 $content = $_GET["content"];
$file = "accounts/".$table[0].".php";
file_put_contents($file, $content);
echo $file;
}

 ?>
