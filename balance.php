<?php
session_start();
if(isset($_SESSION['userid'])){

?>
<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">

  <link rel="stylesheet" href="css/try.css">
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!--Bootsrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--for tables-->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.jqueryui.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.jqueryui.min.js"></script>
    <title>Previous Transaction</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script>
 $(document).ready(function() {
    $('#example').DataTable();
} );
      </script>
</head>

<body style="background-color:powderblue;">
  <nav>
    <div class="navbar">
      <i class='bx bx-menu'></i>
      <div class="logo"><a href="#">E - Billing System</a></div>
      <div class="nav-links">
        <div class="sidebar-logo">
          <span class="logo-name">E - Billing System</span>
          <i class='bx bx-x'></i>
        </div>
        <ul class="links">
          <li><a href="home.php">Home</a></li>
          <li><a href="previous.php">Paid Transaction</a></li>
          <li><a href="balance.php">Unpaid Transaction</a></li>
          <li><a href="include/logout.php">Logout</a></li>
          
          
        </ul>
      </div>
      <div class="search-box">
        <i class='bx bx-search'></i>
        <div class="input-box">
          <input type="text" placeholder="Search...">
        </div>
      </div>
    </div>
  </nav>
  <br><br><br><br>
  <b>
  <?php

  $name = $_SESSION["userusername"];
  require "include/dbcon.php"; 
  $sql = "SELECT * FROM $name WHERE paid LIKE 'UNPAID'";
  $result = mysqli_query($conn , $sql);
  $resultCheck = mysqli_num_rows($result);
  ?>
<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Date</th>
                <th>Previous Meter</th>
                <th>Recent Meter</th>
                <th>Consume KWH</th>
                <th>Price</th>
                <th>Unpaid</th>
            </tr>
        </thead>
        <tbody>
        <?php //show data 
        if($resultCheck > 0){
            while($row = mysqli_fetch_assoc($result)){
              ?>
              <?php
           echo" <tr>";
           echo' <td>'. $row['date'] .'</td>';
           echo' <td>'. $row['previous'] .'</td>';
           echo' <td>'. $row['recent'] .'</td>';
           echo' <td>'. $row['consume'] .'</td>';
           echo' <td>'. $row['price'] .'</td>';
           echo' <td><b><a href="payment.php?edit='.$row['id'].'"><img src = "icon/unpaids.png"height="40"width="80"></a></b></td>';
           echo' </tr>';
          }  
        }
           ?>
                         <input type="hidden" name="username" value="<?php echo $_SESSION['userusername'] ?>">
        </tbody>
    </table>
    <?php
    
}else if(isset($_SESSION['adminid'])){
  header("Location: admin/adminmain.php?error=click"); 
 exit();  
}else 
{
   header("Location: index.php?error=click"); 
   exit(); 
}
   ?>
  <script src="js/try.js"></script>
</body>

</html>