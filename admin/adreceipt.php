<?php
session_start();
if(isset($_SESSION['adminid'])){

?>
<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">

  <link rel="stylesheet" href="css/try.css">
  <link rel="stylesheet" href="css/aa.css">
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!--Bootsrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--for tables-->
   <title>Receipt</title>
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
  <?php
if(isset($_GET['action'])){
    echo '<div class="alert alert-'.$_GET['action'].'" role="alert">';
        if($_GET['action'] == 'success')
            echo "<b><center>Payment Aprroved!</center></b>";
    echo '</div>';
}
?><br><br><br><br>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

 
  </head>
  <body>
    
    <div class="container">
      <form action="include/adminprocess.php" method="post">
    	<!-- CREDIT CARD FORM STARTS HERE -->
  <div class="panel panel-default credit-card-box customwidth center-block">
      <div class="panel-heading display-table" >
          <div class="row display-tr" >
               <h3 class="panel-title display-td" >Unpaid Receipt</h3>
              <div class="display-td" >                            
                  <img class="img-responsive pull-right" src="https://i.imgur.com/gIMFDbp.png">
              </div>
          </div>                    
      </div>
      <?php
      if(isset($_POST["receipt"])){
          $date = $_POST["date"];
          $previous = $_POST["previous"];
          $recent = $_POST["recent"];
          $name = $_POST["name"];
          $consume = $recent - $previous;
          $_POST["consume"] = $consume;
          $price = $consume * 9.7027; 
          $_POST["price"]= $price;          
          require "include/admindbcon.php";
          $sql ="SHOW TABLE STATUS FROM billing LIKE '$name'";
          $result = mysqli_query($conn , $sql);
          if(!mysqli_num_rows($result) > 0){
            header("Location:unpaid.php?action=warning");
          }

          if($previous > $recent){
            header("Location:unpaid.php?action=danger");
          }

  }

      ?> 
     <h4>&nbsp;Name:&nbsp;&nbsp;&nbsp;<?php echo $name; ?></h4>
     <h4>&nbsp;Date:&nbsp;&nbsp;&nbsp;<?php echo $date; ?></h4>
     <h4>&nbsp;Previous Meter:&nbsp;&nbsp;&nbsp;<?php echo $previous; ?> Kwh</h4>
     <h4>&nbsp;Recent Meter:&nbsp;&nbsp;&nbsp;<?php echo $recent; ?> Kwh</h4>  

     <h4>&nbsp;Price of 1 Kwh:&nbsp;&nbsp;&nbsp; P 9.7027</h4>

     <h4>&nbsp;Total Consume KiloWatt:&nbsp;&nbsp;&nbsp;<?php echo $consume; ?> khw</h4>
     <br><h4>&nbsp;Total: :</h4>
     <h3>P&nbsp;<?php echo $price; ?>.00</h3>
     <input type="hidden" name="aid" value="<?php echo $_SESSION['adminid']; ?>">
     <input type="hidden" name="id" value="<?php echo $id; ?>">
     <input type="hidden" name="name" value="<?php echo $_POST["name"] ?>">
     <input type="hidden" name="date" value="<?php echo $_POST["date"]; ?>">
     <input type="hidden" name="previous" value="<?php echo $_POST["previous"]; ?>">
      <input type="hidden" name="recent" value="<?php echo $_POST["recent"]; ?>">
      <input type="hidden" name="consume" value="<?php echo $consume; ?>">
      <input type="hidden" name="price" value="<?php echo $price; ?>">
      
      

      <div class="row">
                  <div class="col-xs-12">
                      <button class="btn btn-success btn-lg btn-block" name ="aa"type="submit">Send to Customer</button>
                      <a button class="btn btn-success btn-lg btn-block" href="unpaid.php" name ="receipt"type="submit">Back</a>
                
                  </div>
                </div>
              <div class="row" style="display:none;">
                   <div class="col-xs-12">
                       <p class="payment-errors"></p>
                   </div>
               </div>
            </form>
       </div>
  </div>            
            <!-- CREDIT CARD FORM ENDS HERE -->
    </div>
<script src="js/payment.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>   <?php
    
}else if(isset($_SESSION['userid'])){
  header("Location: ../previous.php?error=click"); 
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