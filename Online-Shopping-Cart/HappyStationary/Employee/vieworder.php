<?php
define('TITLE', 'Order');
define('PAGE', 'Order');
include '../Connection.php';
include 'includes/header.php';
session_start();
 if(isset($_SESSION['is_emplogin'])){
     $emp_email = $_SESSION['emp_email'];
} else{
    echo "<script> location.href='Login.php'</script>";
}
        $sql = "Select * from orders";
        $result = $con->query($sql);
        $row = $result->fetch_assoc();
 ?>

<div class="col-sm-6 mt-5 mx-3"> 
<h3 class="text-center">Orders</h3>
<table class="table table-bordered">
        <tbody>
        <tr>
            <td>Order ID</td>
            <td><?php echo $row['order_id']; ?></td>
            </tr>
            <tr>
            <td>User ID</td>
            <td><?php echo $row['uid']; ?></td>
            </tr>
            <tr>
            <td>Email</td>
            <td><?php echo $row['email']; ?></td>
            </tr>
            <tr>
            <td>Number</td>
            <td><?php echo $row['number']; ?></td>
            </tr>
            <tr>
            <td>Address</td>
            <td><?php echo $row['address']; ?></td>
            </tr>
            <tr>
            <td>Order Date</td>
            <td><?php echo $row['date']; ?></td>
            </tr>
            <tr>
            <td>Total Bill</td>
            <td><?php echo $row['totalbill']; ?></td>
            </tr>
           </tbody>
           </table>
           <div class="text-center">
               <form action="" class="mb-3 d-print-none d-inline">
                   <input class="btn btn-danger" type="submit" value="Print" onClick="window.print()">
                </form>
                <form action="Order.php" class="mb-3 d-print-none d-inline">
                   <input class="btn btn-secondary" type="submit" value="close">
                </form>
             </div>            
</div>

<!-- Footer Section Begin -->
<?php include 'includes/footer.php';?>
<!-- Footer Section End -->