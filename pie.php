<?php
session_start();
if(isset($_SESSION['userid'])){
include "../include/dbcon.php";
$username =$_SESSION['userusername'];
$unpaid=0;
$paid=0;
$script="";
$sql="SELECT * from $username";
$result=$conn ->query($sql);     
  if($result->num_rows>0){
  while($row=$result->fetch_assoc()){
    if($row["paid"]=="PAID"){
      $paid+=1;
    }
     if($row["paid"]=="UNPAID"){
      $unpaid+=1;
    }
  }
}
mysqli_close($conn); 
?>




<!DOCTYPE html>
<html lang="en-US">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
<body>
<a button type ="submit" href = "bar.php" class="btn btn-warning" name = "back" > Bar Graph </button></a>
<a button type ="submit" href = "../admin/adminheader.php" class="btn btn-primary" name = "back" > Back </button></a>

<br><br><br>
<div id="piechart"></div>


<input type="hidden" id="PAID" value=<?php echo $paid?>>
<input type="hidden" id="UNPAID" value=<?php echo $unpaid?>>

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
  var options = {'title':'TRANSACTIONS, 'width':1000, 'height':800};
  
  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
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


</body>
</html>