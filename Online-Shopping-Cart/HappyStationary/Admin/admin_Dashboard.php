<?php
define('TITLE', 'admin_Dashboard');
define('PAGE', 'admin_Dashboard');
include '../Connection.php';
include 'includes/header.php';
session_start();
if(isset($_SESSION['is_adminlogin'])){
    $email = $_SESSION['email'];
} else{
    echo "<script> location.href='Login.php'</script>";
}

$sql = "Select * from employee";
$result = $con->query($sql);
$TotalEmp = $result->num_rows;

$ordersql = "Select * from orders";
$orresult = $con->query($ordersql);
$Totalor = $orresult->num_rows;

$prosql = "Select * from products where status = 'Active'";
$proresult = $con->query($prosql);
$Totalpro = $proresult->num_rows;
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

<div class="col-sm-4 mt-5">
<div class="card text-white bg-success mb-3" style="max-width:18rem;">
<div class="card-header">Total Products</div>
<div class="card-body">
<h4 class="card-title"><?php echo $Totalpro; ?></h4>
<a class="btn text-white" href="Product.php">View</a>
</div>
</div>
</div>

<div class="col-sm-4 mt-5">
<div class="card text-white bg-info mb-3" style="max-width:18rem;">
<div class="card-header">No. of Employees</div>
<div class="card-body">
<h4 class="card-title"><?php echo $TotalEmp; ?></h4>
<a class="btn text-white" href="Employee.php">View</a>
</div>
</div>
</div>
</div>

<div class="mx-5 mt-5 text-center">
<p class="bg-dark text-white p-2">List of Users</p>
<?php
$sql = "Select * from users";
$result = $con->query($sql);
if($result->num_rows > 0){
    echo '
<table class="table">
<thread>
<tr>
<th scope="col">User ID</th>
<th scope="col">Name</th>
<th scope="col">Email</th>
</tr>
</thread>
<tbody>';
while($row = $result->fetch_assoc()){
echo '<tr>';
echo '<td>'.$row["uid"].'</td>';
echo '<td>'.$row["first_name"].' '.$row["last_name"].'</td>';
echo '<td>'.$row["email"].'</td>';
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