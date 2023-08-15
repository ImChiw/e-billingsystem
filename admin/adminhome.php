<?php
session_start();
if(isset($_SESSION['adminid'])){

?>
<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">

  <link rel="stylesheet" href="css/try.css">
  <link rel="stylesheet" href="css/home.css">
  <!-- Boxicons CDN Link -->
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.jqueryui.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.jqueryui.min.js"></script>
    <title>Home</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script>
 $(document).ready(function() {
    $('#example').DataTable();
} );
      </script>
</head>

 <body>
 

  <div class="grid-container">
   <div class="menu-icon">
    <i class="fas fa-bars header__menu"></i>
  </div>
   <?php
   ?>
  <header class="header">
    <div class="header__search">WELCOME TO E - BILLING SYSTEM</div>
    <div class="header__avatar"></div>
  </header>

  <aside class="sidenav">
    <div class="sidenav__close-icon">
      <i class="fas fa-times sidenav__brand-close"></i>
    </div>
    <ul class="sidenav__list">
      <a href ="adminhome.php"li class="sidenav__list-item">Home</li></a><br><br><br>
      <a href ="adminmain.php"li class="sidenav__list-item">User Transaction</li></a><br><br><br>
      <a href ="adacc.php"li class="sidenav__list-item">Admin Account</li></a><br><br><br>
      <a href ="usacc.php"li class="sidenav__list-item">User Account</li></a><br><br><br>
      <a href ="unpaid.php"li class="sidenav__list-item">Add User Unpaid Bill</li></a><br><br><br>
      <a href ="adminsign.php"li class="sidenav__list-item">Add New Admin</li></a><br><br><br>
      <a href ="include/adminlogout.php"li class="sidenav__list-item">Logout</li></a><br><br><br>
    </ul>
  </aside>
<?php
$img=$_SESSION["adminimg_url"];
?>
  <main class="main">
    <div class="main-header">
     <div class="main-header__heading">
    <br>Name: <?php echo $_SESSION['adminname'];?><br>
        Username: <?php echo $_SESSION['adminusername'];?> <br>
        Address: <?php echo $_SESSION['adminaddress'];?>
        </div>
<div class="main-header__updates"><img style = "height: 105px; width: 105px;border-radius: 50%;"src="profile/<?php echo $_SESSION["adminimg_url"];?>"></div>
         </div>
         <?php
        require "include/admindbcon.php";
        $sql = "SELECT sum(count1) FROM admin";
        $sql1 = "SELECT sum(count2) FROM tbluser";
        $sql2="select count(*) from tbluser";
        $sql3="select count(*) from admin";
        $result = mysqli_query($conn , $sql);
        $result1 = mysqli_query($conn , $sql1);

        $result2=mysqli_query($conn , $sql2);
        $result3=mysqli_query($conn , $sql3);

        $row = mysqli_fetch_array($result);
        $row1 = mysqli_fetch_array($result1);

        $row2 = mysqli_fetch_assoc($result2);
        $row3 = mysqli_fetch_assoc($result3);
        $count = $row2["count(*)"];
        $counts = $row3["count(*)"];
        $total = $row[0] - $row1[0];
        $totals = $row1[0];
        ?>
    <div class="main-overview">
      <div class="overviewcard">
        <div class="overviewcard__icon">Admins:<br><br>Users:</div>
        <div class="overviewcard__info"><?php echo $counts." <br><br>".$count;?></div>
      </div>
      <div class="overviewcard">
        <div class="overviewcard__icon">All Paid Transactions:</div>
        <div class="overviewcard__info"><?php echo $totals." / ".$row[0];?></div>
      </div>
      <div class="overviewcard">

        
        <div class="overviewcard__icon">All Unpaid Transaction:</div>
        <div class="overviewcard__info"><?php echo $total." / ".$row[0];?></div>
      </div>
    </div>

    <div class="main-cards"id="">
        
      <div class="card"id="piechart">
      <input type="hidden" id="PAID" value=<?php echo $totals;?>>
<input type="hidden" id="UNPAID" value=<?php echo $total;?>>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {

    var w=document.getElementById("PAID");
  var x=document.getElementById("UNPAID");


  var data = google.visualization.arrayToDataTable([
  ['Task', 'Transactions: '],
  ['PAID', Number(w.value)],
  ['UNPAID', Number(x.value)],


    ]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Pie Chart of All Paid and Unpaid Transactions','width':400, 'height':450};
  
  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>
      </div>


      <div class="card"id="barchart">
      <input type="hidden" id="PAID" value=<?php echo $totals;?>>
<input type="hidden" id="UNPAID" value=<?php echo $total;?>>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {

    var w=document.getElementById("PAID");
  var x=document.getElementById("UNPAID");


  var data = google.visualization.arrayToDataTable([
  ['Task', 'Transactions: '],
  ['PAID', Number(w.value)],
  ['UNPAID', Number(x.value)],


    ]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Bar Chart of All Paid and Unpaid Transactions','width':400, 'height':150};
  
  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.BarChart(document.getElementById('barchart'));
  chart.draw(data, options);
}
</script>
      </div>
      <div class="card"id="linechart">
      <input type="hidden" id="PAID" value=<?php echo $totals;?>>
<input type="hidden" id="UNPAID" value=<?php echo $total;?>>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {

    var w=document.getElementById("PAID");
  var x=document.getElementById("UNPAID");


  var data = google.visualization.arrayToDataTable([
  ['Task', 'Transactions: '],
  ['PAID', Number(w.value)],
  ['UNPAID', Number(x.value)],


    ]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Area Chart of All Paid and Unpaid Transactions','width':400, 'height':200};
  
  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.AreaChart(document.getElementById('linechart'));
  chart.draw(data, options);
}
</script>
    </div>


  </main>

  <footer class="footer">
    <div class=""><a href ="https://facebook.com/qwertyuiop031400"target="popup"onclick="window.open('https://facebook.com/qwertyuiop031400','name','width=800,height=800')" style ="color:black">Facebook</a></div>
    <div class=""><a href ="https://www.instagram.com/im_marbin/" target="popup"onclick="window.open('https://www.instagram.com/im_marbin/','name','width=800,height=800')"style ="color:black">Instagram</a></div>
    <div class="">Alrights Reserved</div>
    
  </footer>
</div>

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
   <script src="js/home.js"></script>
  <script src="js/try.js"></script>
</body>

</html>