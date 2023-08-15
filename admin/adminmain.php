<?php
session_start();
if(isset($_SESSION['adminid'])){
  require "include/admindbcon.php";
  
?>
<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">

  <link rel="stylesheet" href="css/try.css">
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!--Bootsrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--for tables-->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.jqueryui.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.jqueryui.min.js"></script>
    <title>User's Transaction</title>
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
      <div class="logo"><a href="#">E- Billing System</a></div>
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
    <center><b>You're Viewing User's Transaction Database</center>
</div>


    <?php
?>
<?php
$sql = "show tables";
$result = mysqli_query($conn, $sql); // run the query and assign the result to $result
while($table = mysqli_fetch_array($result)) { // go through each row that was returned in $result
  if($table[0] == "admin" || $table[0] == "tbluser"){//Don't Show Admin and Tbluser
    continue;
  }
  ?>
    
  <a button class="btn" href ="accounts/<?php echo$table[0];?>.php"><i class="fa fa-folder"
  style="font-size:60px;color:dodgerblue;text-shadow:2px 2px 4px #000000;">
 </i> 
  <br><?php  echo($table[0] . " ");  // print the table that was returned on that row.
  
  ?> </button>
<?php
}
?>
    <?php
}else if(isset($_SESSION['userid'])){
  header("Location: ../home.php?error=click"); 
 exit();  
}else 
{
   header("Location: index.php?error=click"); 
   exit(); 
}
   ?>
   </form>
  <script src="js/adminmain.js"></script>
</body>

</html>