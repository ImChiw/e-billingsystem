<?php
session_start();
if(isset($_SESSION['userid'])){
 header("Content-type:application/vnd.ms-excel");
 $filename = $_SESSION['username']." PAID TRANSACTION RECEIPT.xls";
 header('Content-Disposition: attachment; filename='. $filename);

 include 'include/dbcon.php';
 $username =$_SESSION['userusername'];
 $name = $_SESSION['username'];
?>
<table class="table table-striped">
    <thead  class="table-dark">
  <tr>
  <th colspan=12 style="background-color:#728602 ; color:#ffffff;border:#55A4AC solid 2px">E - BILLING PAID TRANSACTIONS OFFICIAL RECEIPT</th><br>
  </tr>
  <tr>
  <th colspan=12 style="background-color:#728602 ; color:#ffffff;border:#55A4AC solid 2px">CUSTOMER'S NAME: <?php echo $name;?></th>
  </tr>
  <tr>
        <th colspan=2 style="background-color:#728602 ; color:#ffffff;border:#55A4AC solid 2px">Card Number</th>
            <th colspan=2 style="background-color:#728602 ; color:#ffffff;border:#55A4AC solid 2px">Date</th>
            <th colspan=2 style="background-color:#728602 ; color:#ffffff;border:#55A4AC solid 2px">Previous</th>
            <th colspan=2 style="background-color:#728602 ; color:#ffffff;border:#55A4AC solid 2px">Recent</th>
            <th colspan=2 style="background-color:#728602 ; color:#ffffff;border:#55A4AC solid 2px">Consume</th>
            <th colspan=2 style="background-color:#728602 ; color:#ffffff;border:#55A4AC solid 2px">Price</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $paid = "PAID";
             $sql = "SELECT * FROM $username WHERE paid LIKE'$paid';";
            $result = mysqli_query($conn, $sql);
            $check = mysqli_num_rows($result);
            if($check > 0){
                while($row = mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<td colspan=2 style='background-color:#DEEF7E ; color:#000000;text-align:center; border:#94A242  solid 2px'>".$row['card']."</td>";
                    echo "<td colspan=2 style='background-color:#DEEF7E ; color:#000000;text-align:center; border:#94A242  solid 2px'>".$row['date']."</td>";
                        echo "<td colspan=2 style='background-color:#DEEF7E ; color:#000000;text-align:center;border:#94A242  solid 2px'>".$row['previous']."</td>";
                        echo "<td colspan=2 style='background-color:#DEEF7E ; color:#000000;text-align:center;border:#94A242  solid 2px'>".$row['recent']."</td>";
                        echo "<td colspan=2 style='background-color:#DEEF7E ; color:#000000;text-align:center;border:#94A242  solid 2px'>".$row['consume']."</td>";
                        echo "<td colspan=2 style='background-color:#DEEF7E ; color:#000000;text-align:center;border:#94A242  solid 2px'>".$row['price']."</td>";
                    echo "</tr>";
                }
            } else {
                ?>
                <tr><td colspan=4>No Record Found!</td></tr>
                <?php
            }
        }else if(isset($_SESSION['adminid'])){
            header("Location: admin/adminmain.php?error=click"); 
           exit();  
          }else 
          {
             header("Location: index.php?error=click"); 
             exit(); 
          }
        ?>
    </tbody>
</table>