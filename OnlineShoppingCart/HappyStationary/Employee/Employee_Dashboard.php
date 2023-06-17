<?php
define('TITLE', 'Employee_Dashboard');
define('PAGE', 'Employee_Dashboard');
include '../Connection.php';
include 'includes/header.php';
session_start();
 if(isset($_SESSION['is_emplogin'])){
     $emp_email = $_SESSION['emp_email'];
 } else{
     echo "<script> location.href='Login.php'</script>";
 }

$ordersql = "Select * from orders";
$orresult = $con->query($ordersql);
$Totalor = $orresult->num_rows;

?>

<div class="col-sm-9 col-md-10"> <!--- Start Dashboard 2st column --->
<div class="row text-center mx-5">
<div class="col-sm-4 mt-5">
<div class="card text-white bg-danger mb-3" style="max-width:18rem;">
<div class="card-header">Received Orders</div>
<div class="card-body">
<h4 class="card-title"><?php echo $Totalor; ?></h4>
<a class="btn text-white" href="Order.php">View</a>
</div>
</div>
</div>



</div>






<div class="mx-5 mt-5 text-center">
<p class="bg-dark text-white p-2">List of Orders</p>
<?php
$sql = "Select * from orders";
$result = $con->query($sql);
if($result->num_rows > 0){
    echo '
<table class="table">
<thread>
<tr>
<th scope="col">Order ID</th>
<th scope="col">Customer ID</th>
<th scope="col">Email</th>
<th scope="col">Number</th>
<th scope="col">Address</th>
<th scope="col">Date</th>
<th scope="col">Total Bill</th>
</tr>
</thread>
<tbody>';
while($row = $result->fetch_assoc()){
echo '<tr>';
echo '<td>'.$row["order_id"].'</td>';
echo '<td>'.$row["uid"].'</td>';
echo '<td>'.$row["email"].'</td>';
echo '<td>'.$row["number"].'</td>';
echo '<td>'.$row["address"].'</td>';
echo '<td>'.$row["date"].'</td>';
echo '<td>'.$row["totalbill"].'</td>';
echo '</tr>';
}
echo '</tbody>
</table>';
}else {
    echo '0 Result';
}
?>
</div>

</div> <!--- End Dashboard 2st column --->


<!-- Footer Section Begin -->
<?php include 'includes/footer.php';?>
<!-- Footer Section End -->