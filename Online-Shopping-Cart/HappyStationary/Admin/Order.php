<?php
define('TITLE', 'Order');
define('PAGE', 'Order');
include '../Connection.php';
include 'includes/header.php';
session_start();
if(isset($_SESSION['is_adminlogin'])){
    $email = $_SESSION['email'];
} else{
    echo "<script> location.href='Login.php'</script>";
}
?>

<div class="col-sm-9 mt-5">
    <!-- Table -->
    <p class="bg-dark text-white p-2">List of Categories</p>
    <?php
    $sql = "SELECT * FROM orders";
    $result = $con->query($sql);
    if($result->num_rows > 0){
    ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Order ID</th>
                <th scope="col">Customer ID</th>
                <th scope="col">Email</th>
                <th scope="col">Number</th>
                <th scope="col">Address</th>
                <th scope="col">Date</th>
                <th scope="col">Total Bill</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()){
                echo '<tr>';
                echo '<th scope="row">'.$row['order_id'].'</th>';
                echo '<td>'.$row['uid'].'</td>';
                echo '<td>'.$row['email'].'</td>';
                echo '<td>'.$row['number'].'</td>';
                echo '<td>'.$row['address'].'</td>';
                echo '<td>'.$row['date'].'</td>';
                echo '<td>'.$row['totalbill'].'</td>';
                echo '<td>
                        <form action="vieworder.php" method="POST" class="d-inline">
                            <input type="hidden" name="order_id" value='.$row["order_id"].'>
                            <button type="submit" class="btn btn-warning mr-3" name="view" value="View">
                                <i class="fa-solid fa-eye"></i>
                            </button>
                        </form>
                        <form action="" method="POST" class="d-inline">
                            <input type="hidden" name="order_id" value='.$row["order_id"].'>
                            <button type="submit" class="btn btn-secondary" name="delete" value="Delete">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                      </td>';
                echo '</tr>';
            } ?>
        </tbody>
    </table>
    <?php } else {
        echo "0 Result";
    }
    if(isset($_REQUEST['delete'])){
        $order_id = $_REQUEST['order_id'];
        $sql = "DELETE FROM orders WHERE order_id = $order_id";
        if($con->query($sql) === TRUE){
            echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
        } else{
            echo "Unable to Delete Data";
        }
    }
    ?>
</div>

<?php include 'includes/footer.php';?>
