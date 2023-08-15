<?php
session_start();
if(isset($_SESSION["userid"])){

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
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--for tables-->
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
          <span class="logo-name">Billing System</span>
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

  <br><br><br>  
  <?php
  require "include/process.php"; 
if(isset($_GET['action'])){
  echo '<div class="alert alert-'.$_GET['action'].'" role="alert">';
      if($_GET['action'] == 'success')
          echo "<b><center>Payment Aprroved!</center></b>";
  echo '</div>';
}
  ?>
  <br>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

 
  </head>
  <body>
    <div class="container">
          <form  action="include/process.php" method="post">
 
    	<!-- CREDIT CARD FORM STARTS HERE -->
  <div class="panel panel-default credit-card-box customwidth center-block">
      <div class="panel-heading display-table" >
          <div class="row display-tr" >


<h3 class="panel-title display-td" >Payment Details</h3>
 
              <div class="display-td" >                            
                  <img class="img-responsive pull-right" src="https://i.imgur.com/gIMFDbp.png">
              </div>
          </div>                    
      </div>
      <?php
        $name = $_SESSION["username"];
        $paid = "PAID";
      ?>


      <div class="panel-body">
      <div class="row">
                  <div class="col-xs-12">
                      <div class="form-group">
                          <label for="cardNumber">CUSTOMER'S NAME</label>
                          <div class="input-group">
                          <label for="previous"class="form-control"><?php echo $name;   ?></label>
                               <span class="input-group-addon"><i class="fa fa-user" style="color:purple;font-size:2rem;"></i></span>
                           </div>
                      </div>                            
                  </div>
              </div>
              <div class="row">
                  <div class="col-xs-12">
                      <div class="form-group">
                          <label for="cardNumber">CARD NUMBER</label>
                          <div class="input-group">
                              <input type="number"class="form-control"  name="card" placeholder="Valid Card Number"value="<? echo $card;?>"required/>
                               <span class="input-group-addon"><i class="fa fa-credit-card"  style="color:purple;font-size:2rem;"></i></span>
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
               <div class="row">
                   <div class="col-xs-12">
                       <div class="form-group">
                       <label for="previous">PREVIOUS METER</label>
                       <label for="previous"class="form-control"><?php echo $previous;   ?> KWH</label>
                   </div>
                </div>
    </div>
                <div class="row">
                   <div class="col-xs-12">
                       <div class="form-group">
                       <label for="Recent">RECENT METER</label>
                       <label for="Recent"class="form-control"><?php echo $recent;   ?> KWH</label>
                   </div>
                </div>
    </div>
                <div class="row">
                   <div class="col-xs-12">
                       <div class="form-group">
                       <label for="consume">CONSUME KWH</label>
                       <label for="consume"class="form-control"><?php echo $consume;   ?> KWH</label>
                   </div>
                </div>
    </div>
                <div class="row">
                   <div class="col-xs-12">
                       <div class="form-group">
                       <label for="price">TOTAL PRICE</label>
                       <label for="price"class="form-control"><?php echo $price;   ?> KWH</label>
                   </div>
                </div>
           </div>
           <?php
           require "include/dbcon.php";
        $username = $_SESSION['userusername'];
        $userid = $_SESSION['userid'];
        
           ?>
           
              <input type="hidden" name="id" value="<?php echo $id; ?>">
              <input type="hidden" name="userid" value="<?php echo $_SESSION["userid"]; ?>">
              <input type="hidden" name="username" value="<?php echo $username; ?>">
              <input type="hidden" name="name" value="<?php echo $name; ?>">
              <input type="hidden" name="previous" value="<?php echo $previous; ?>">
              <input type="hidden" name="recent" value="<?php echo $recent; ?>">
              <input type="hidden" name="consume" value="<?php echo $consume; ?>">
              <input type="hidden" name="price" value="<?php echo $price; ?>">
              <input type="hidden" name="paid" value="<?php echo $paid; ?>">
              <div class="row">
                  <div class="col-xs-12">      
<button type="submit" class="btn btn-success btn-lg btn-block" name ="update" >Pay Now</button>
<a button type="submit" href = "balance.php"name ="back"  class="btn btn-success btn-lg btn-block">Back</button></a>

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