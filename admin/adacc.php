<?php
session_start();
if(isset($_SESSION['adminid'])){

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
    <title>Admin Account</title>
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
          <span class="logo-name">Billing System</span>
          <i class='bx bx-x'></i>
        </div>
        <ul class="links">
        <li><a href="adminhome.php">Home</a></li>
          <li><a href="adminmain.php">Users Transactions</a></li>
          <li>
            <a href="#">Records</a>
            <i class='bx bxs-chevron-down htmlcss-arrow arrow  '></i>
            <ul class="htmlCss-sub-menu sub-menu">
              <li><a href="adacc.php">Admin Accounts</a></li>
              <li><a href="usacc.php">Users Account</a></li>             
            </ul>
          </li>
          <li><a href="unpaid.php">Add User Unpaid Bill</a></li>
          <li><a href="adminsign.php">Add New Admin</a></li>
          <li><a href="include/adminlogout.php">Logout</a></li>
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
  <div class="alert alert-info" role="alert">
  <center><b>You're Viewing Admin's Account Database
</div>
  <?php
  require "include/admindbcon.php"; 
  $sql = "SELECT * FROM admin";
  $result = mysqli_query($conn , $sql);
  $resultCheck = mysqli_num_rows($result);
  ?>
<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Username</th>
                <th>Adress</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
        <?php //show data
        if($resultCheck > 0){
            while($row = mysqli_fetch_assoc($result)){
              
           echo" <tr>";
           echo' <td>'. $row['name'] .'</td>';
           echo' <td>'. $row['username'] .'</td>';
           echo' <td>'. $row['address'] .'</td>';
           echo' <td><img style = "height: 50px; width: 50px;" src="profile/'.$row['img_url'].'"class="rounded-circle" alt="..."></td>';
         
           echo' </tr>';
          }  
        }
           ?>
        </tbody>

    </table>
    <?php
    
}else if(isset($_SESSION['userid'])){
  header("Location: ../home.php?error=click"); 
 exit();  
}else 
{
   header("Location: ../previous.php?error=click"); 
   exit(); 
}
   ?>
  <script src="js/adminmain.js"></script>
</body>

</html>