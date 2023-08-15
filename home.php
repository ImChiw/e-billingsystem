<?php
session_start();
if(isset($_SESSION['userid'])){

?>
<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">

  <link rel="stylesheet" href="css/try.css">
  <link rel="stylesheet" href="css/dash.css">
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
 <?php
    require "include/dbcon.php";
    $pa =0;
    $unpa=0;
    $all =0;
    $username = $_SESSION['userusername'];
    $address = $_SESSION['add'];
    $img = $_SESSION['userimg_url'];
    $sql ="SELECT paid FROM $username";
    $result = mysqli_query($conn,$sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck >0){
        while($row = mysqli_fetch_assoc($result)){
                $all +=1;
            if($row['paid'] == "PAID"){
                $pa +=1;
            }else{
                $unpa +=1;
            }
        }
}
     ?>

  <div class="grid-container">
   <div class="menu-icon">
    <i class="fas fa-bars header__menu"></i>
  </div>
   <?php
    $name = $_SESSION['username'];
   ?>
  <header class="header">
    <div class="header__search">WELCOME TO E - BILLING SYSTEM</div>
    <div class="header__avatar"><?php echo $name;?></div>
  </header>

  <aside class="sidenav">
    <div class="sidenav__close-icon">
      <i class="fas fa-times sidenav__brand-close"></i>
    </div>
    <ul class="sidenav__list">
      <a href ="home.php"li class="sidenav__list-item">Home</li></a><br><br><br>
      <a href ="previous.php"li class="sidenav__list-item">Paid Transaction</li></a><br><br><br>
      <a href ="balance.php"li class="sidenav__list-item">Unpaid Transaction</li></a><br><br><br>
      <a href ="include/logout.php"li class="sidenav__list-item">Logout</li></a><br><br><br>
    </ul>
  </aside>

  <main class="main">
    <div class="main-header">
     <div class="main-header__heading">
    <br>Name: <?php echo $name;?><br>
        Username: <?php echo $username;  ?><br>
        Address: <?php echo $address;  ?>
        </div>
        <div class="main-header__updates"><img style = "height: 105px; width: 105px;border-radius: 50%;"src="upload/<?php echo $img;  ?>"></div>
    </div>
    <div class="main-overview">
      <div class="overviewcard">
      <i class="fa-solid fa-bolt-lightning"></i>
        <div class="overviewcard__icon">All Transactions</div>
        <div class="overviewcard__info"><?php echo $all;?> / <?php echo $all;?></div>
      </div>
      <div class="overviewcard">
        <div class="overviewcard__icon">Paid Transaction</div>
        <div class="overviewcard__info"><?php echo $pa;?> / <?php echo $all;?></div>
      </div>
      <div class="overviewcard">
        <div class="overviewcard__icon">Unpaid Transaction</div>
        <div class="overviewcard__info"><?php echo $unpa;?> / <?php echo $all;?></div>
      </div>
    </div>

    <div class="main-cards">
        
      <div class="card"id="piechart">
      <input type="hidden" id="PAID" value=<?php echo $pa;?>>
<input type="hidden" id="UNPAID" value=<?php echo $unpa;?>>
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
  ['Task', 'Hours per Day'],
  ['PAID', Number(w.value)],
  ['UNPAID', Number(x.value)],


    ]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Pie Chart of All Transactions','width':400, 'height':400};
  
  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>
      </div>


      <div class="card"id="barchart">
      <input type="hidden" id="PAID" value=<?php echo $pa;?>>
<input type="hidden" id="UNPAID" value=<?php echo $unpa;?>>
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
  ['Task', 'Total'],
  ['PAID', Number(w.value)],

  ['UNPAID', Number(x.value)],


    ]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Bargraph of All Transactions','width':400, 'height':130};
  
  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.BarChart(document.getElementById('barchart'));
  chart.draw(data, options);
}
</script>

      </div>
      <div class="card">
        <h3>Paid Transaction Receipt<h3>
        <h4>&#128071;Click the Button Below&#128071;<h4><br>
        
        <i class="bi bi-file-earmark-spreadsheet"></i>
        <a href="export.php" class="btn btn-primary">Downlaod</a>
      </div>
    </div>
  </main>

  <footer class="footer">
  <div class=""><a href ="https://facebook.com/qwertyuiop031400"target="popup"onclick="window.open('https://facebook.com/qwertyuiop031400','name','width=800,height=800')" style ="color:black">Facebook</a></div>
    <div class=""><a href ="https://www.instagram.com/im_marbin/" target="popup"onclick="window.open('https://www.instagram.com/im_marbin/','name','width=800,height=800')"style ="color:black">Instagram</a></div>
    <div class="">Alrights Reserved</div>
    
  </footer>
</div>

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
   <script src="js/das.js"></script>
  <script src="js/try.js"></script>
</body>

</html>