<?php
define('TITLE', 'Product');
define('PAGE', 'Product');
include '../Connection.php';
include 'includes/header.php';
session_start();
if(isset($_SESSION['is_adminlogin'])){
    $email = $_SESSION['email'];
} else{
    echo "<script> location.href='Login.php'</script>";
}
 ?>
 
<body>
<div class="col-sm-9 mt-5">
    <!-- Table -->
    <p class="bg-dark text-white p-2">List of Products</p>
    <?php
    $sql = "Select * from products";
    $result = $con->query($sql);
    if($result->num_rows > 0){
    ?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">image1</th>
            <th scope="col">image2<small> (Opt)</small></th>
            <th scope="col">image3<small> (Opt)</small></th>
            <th scope="col">image4<small> (Opt)</small></th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
       <?php while($row = $result->fetch_assoc()){
        echo '<tr>';
         echo '<th scope="row">'.$row['product_id'].'</th>';
         echo '<td>'.$row['product_title'].'</td>';
         echo '<td>'.$row['product_desc'].'</td>';
         echo '<td>' . (file_exists($row['product_img1']) ? '<img src="' . $row['product_img1'] . '" width="100px" height="100px">' : 'Image not found') . '</td>';
         echo '<td>' . (file_exists($row['product_img2']) ? '<img src="' . $row['product_img2'] . '" width="100px" height="100px">' : '') . '</td>';
         echo '<td>' . (file_exists($row['product_img3']) ? '<img src="' . $row['product_img3'] . '" width="100px" height="100px">' : '') . '</td>';
         echo '<td>' . (file_exists($row['product_img4']) ? '<img src="' . $row['product_img4'] . '" width="100px" height="100px">' : '') . '</td>';
         echo '<td>'.$row['product_price'].'</td>';
         echo '<td>'.$row['product_quantity'].'</td>';
         echo '<td>'.$row['status'].'</td>';
         echo '<td>';
         echo '
         <form action="editProduct.php" method="POST">
         <input type="hidden" name="product_id" value='.$row["product_id"].'>
         <button
            type="submit"
            class="btn btn-info mr-3"
            name="view"
            value="View"
           >
            <i class="fas fa-pen"></i>
            </button>
            </form>
            <form action="" method="POST" class="mt-2">
            <input type="hidden" name="product_id" value='.$row["product_id"].'>
            <button
            type="submit"
            class="btn btn-secondary"
            name="delete"
            value="Delete"
           >
            <i class="fas fa-trash-alt"></i>
            </button>
            </form>
          </td>
          </tr>';
        } ?>
    </tbody>
</table>
<?php } else {
    echo "0 Result";
} 

if(isset($_REQUEST['delete'])){
   $sql = "DELETE FROM `products` where product_id = {$_REQUEST['product_id']}";
    if($con->query($sql) == True){
        echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
    } else{
        echo "Unabale to Delete Data";
    }
}
?>
</div>
</div>

<!--div row close header-->
<div>
    <a class="btn btn-danger box" href="AddProduct.php"><i class="fa fa-plus fa-2x" aria-hidden="true"></i>
</a>
</div>
</div>

<!-- Footer Section Begin -->
<?php include 'includes/footer.php';?>
<!-- Footer Section End -->
