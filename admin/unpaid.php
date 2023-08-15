<?php
session_start();
if(isset($_SESSION["adminid"])){

?>
<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">

  <link rel="stylesheet" href="css/try.css">
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!--Bootsrap-->
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--for tables-->
   <title>Unpaid Details</title>
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

  <br><br><br><br><br>
  <?php
if(isset($_GET['action'])){
  echo '<div class="alert alert-'.$_GET['action'].'" role="alert">';
      if($_GET['action'] == 'success')
          echo "<b><center>Transaction has been Sent!</center></b>";
          if($_GET['action'] == 'danger')
          echo "<b><center>BOBO ANO IKAW PA MAY UTANG?!</center></b>";
          if($_GET['action'] == 'warning')
          echo "<b><center>Username Doesn't Exist!</center></b>";
  echo '</div>';
}
  ?>
  <br>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

 
  </head>
  <body>
    <div class="container">
    	<!-- CREDIT CARD FORM STARTS HERE -->
  <div class="panel panel-default credit-card-box customwidth center-block">
      <div class="panel-heading display-table" >
          <div class="row display-tr" >
               <h3 class="panel-title display-td" >Unpaid Details</h3>
              <div class="display-td" >                            
                  <img class="img-responsive pull-right" src="https://i.imgur.com/gIMFDbp.png">
              </div>
          </div>                    
      </div>
      <div class="panel-body">
          <form  action="adreceipt.php" method="post">
            <?php
                 $name="";
            ?>
              <div class="row">
                  <div class="col-xs-12">
                      <div class="form-group">
                          <label for="cardNumber">USERNAME</label>
                          <div class="input-group">
                              <input type="username" name="name"class="form-control"  placeholder="Enter Customer's Username" value="<?php echo $name;?>"required/>
                               <span class="input-group-addon"><i class="fa fa-credit-card" id="cardlogo" style="color:purple;font-size:2rem;"></i></span>
                           </div>
                      </div>                            
                  </div>
              </div>
              <div class="row">
                  <div class="col-xs-12">
                      <div class="form-group">
                      <script src="js/calendar.js"></script>
                      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                          <label for="cardNumber">DATE</label>
                          <div class="input-group">
                          <input type="date"class="form-control"id="txtDate" name="date" value ="<?php echo $date;?>"required/>
                          <span class="input-group-addon"><i class="fa fa-calendar" id="cardlogo" style="color:purple;font-size:2rem;"></i></span>
                         <script src="js/calendar.js"></script>
                           </div>
                      </div>                            
                  </div>
              </div>
              <?php
              ?>
               <div class="row">
                   <div class="col-xs-7 col-md-7">
                       <div class="form-group">
                          <label for="Previous"><span class="hidden-xs">PREVIOUS</span><span class="visible-xs-inline">PRE</span> METER</label>
                           <input type="number" name="previous"value="<? echo $previous;?>" class="form-control" name="cardExpiry"placeholder="Previous Meter"required />
                      </div>
                   </div>
                   <div class="col-xs-5 col-md-5 pull-right">
                       <div class="form-group">
                          <label for="Recent">RECENT METER</label>
                          <input type="number"name="recent"value="<? echo $recent;?>" class="form-control"placeholder="Recent Meter"required/>
                          <?php
                          ?>
                      </div>
                  </div>
               </div>
               <?php
                $aid = $_SESSION['adminid'];
               ?>
               <input type="hidden" name="consume" value="<?php echo $consume; ?>">
               <input type="hidden" name="price" value="<?php echo $price; ?>">
              <div class="row">
                  <div class="col-xs-12">
                      <button class="btn btn-success btn-lg btn-block" name ="receipt"type="submit">Show Receipt</button>
                      <a button class="btn btn-success btn-lg btn-block" href="adminhome.php" name ="receipt"type="submit">Back</a>
                  </div>
                </div>
              <div class="row" style="display:none;">
                   <div class="col-xs-12">
                       <p class="payment-errors"></p>
                   </div>
               </div>
                </form>
          </form>
       </div>
  </div>            
            <!-- CREDIT CARD FORM ENDS HERE -->
    </div>
<script src="js/payment.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>  
     <?php
    
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