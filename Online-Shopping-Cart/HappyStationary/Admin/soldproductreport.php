<?php
define('TITLE', 'soldproductreport');
define('PAGE', 'soldproductreport');
include '../Connection.php';
 include 'includes/header.php';
session_start();
if(isset($_SESSION['is_adminlogin'])){
    $email = $_SESSION['email'];
} else{
    echo "<script> location.href='Login.php'</script>";
}
 ?>
 
 <!-- Start 2nd Column -->

 <div class="col-sm-9 col-md-10 mt-5 text-center">
     <form action="" method="POST" class="d-print-none">
         <div class="form-row">
             <div class="form-group col-md-2">
                 <input type="date" class="form-control" id="startdate" name="startdate">
            </div> <span> to </span>
            <div class="form-group col-md-2">
                 <input type="date" class="form-control" id="enddate" name="enddate">
            </div>
<div class="form-group">
    <input type="submit" class="btn btn-secondary" name="searchsubmit" value="Search">
</div>
</div>
</form>
<?php 
if(isset($_REQUEST['searchsubmit'])){
    $startdate = $_REQUEST['startdate'];
    $enddate = $_REQUEST['enddate'];
    $sql = "Select * from orders where date Between '$startdate' AND '$enddate'";
    $result = $con->query($sql);
    if($result->num_rows > 0){
        echo '<p class="bg-dark text-white p-2 mt-4">Details</p>';
        echo '<table class="table">';
        echo '<thead>';
        echo '<tr>';
        echo '<th scope="col">Order ID</th>';
        echo '<th scope="col">Custom ID</th>';
        echo '<th scope="col">Email</th>';
        echo '<th scope="col">Number</th>';
        echo '<th scope="col">Address</th>';
        echo '<th scope="col">Date</th>';
        echo '<th scope="col">Totalbill</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        while($row = $result->fetch_assoc()){
            echo '<tr>';
            echo '<td>'.$row['order_id'].'</td>';
            echo '<td>'.$row['uid'].'</td>';
            echo '<td>'.$row['email'].'</td>';
            echo '<td>'.$row['number'].'</td>';
            echo '<td>'.$row['address'].'</td>';
            echo '<td>'.$row['date'].'</td>';
            echo '<td>'.$row['totalbill'].'</td>';
            echo '</tr>';
        }
        echo '<tr>';
        echo '<td>';
        echo '<input type="submit" class="btn btn-danger d-print-none" value="Print" onClick="window.print()">';
        echo '</td>';
        echo '</tr>';
        echo '</tbody>';
        echo '</table>';
    } else {
        echo "<div class='alert alert-warning col-sm-6 ml-5 mt-2' role='alert'> No Record Found ! </div>";
    }
}
?>
</div>

<!-- Footer Section Begin -->
<?php include 'includes/footer.php';?>
<!-- Footer Section End -->
