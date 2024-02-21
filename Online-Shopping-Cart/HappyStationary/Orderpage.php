<?php
include 'Connection.php';
include 'Header.php'; 

echo "User ID: " . $_SESSION['uid'];


if(isset($_POST['btnOrder'])) {
    // Form data
    $uid = $_POST['uid'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $address = $_POST['address'];

    $total_amount = $_SESSION['t'];
    $cId = $_SESSION['user'];
    $date = date('Y-m-d');

    $uid = $_SESSION['uid']; 

    $q = "INSERT INTO orders (`uid`, `date`, `totalbill`, `email`, `number`, `address`) 
        VALUES ('$uid', '$date', '$total_amount', '$email', '$number', '$address')";
    

    $result = mysqli_query($con, $q);

    if($result) {
        // Clear the cart
        unset($_SESSION['cart']);
        unset($_SESSION['qty_array']);

        $_SESSION['message'] = 'Order Placed Successfully';
        header('location:index.php');
    } else {
        echo "Failed to place order";
        echo mysqli_error($con);
    }
}
?>


<!doctype html>
<html>
<head>
    <!-- Css Styles -->
    <link rel="stylesheet" href="css/custom.css" type="text/css">
</head>
<body>
<main>

    <div class="row g-5 m-5">
        <div class="col-md-5 col-lg-4 order-md-last">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-primary">Your cart</span>
                <span class="badge bg-primary rounded-pill"><?php if(isset($_SESSION['cart'])){ echo count($_SESSION['cart']); }else { echo '0';} ?></span>
            </h4>
            <?php 

                            $total =0;
                            if(!empty($_SESSION['cart']) )
                            {
                            include 'Connection.php';
                            $index =0;
                            if(!isset($_SESSION['qty_array']))
                            {
                            $_SESSION['qty_array']=array_fill(0, count ($_SESSION['cart']),1);
                            }
                            $sql="SELECT * FROM products  WHERE product_id IN (".implode(',', $_SESSION['cart']).")";
                            $result=mysqli_query($con,$sql);
                            while ($row =mysqli_fetch_assoc($result)) 
                            {
                            ?>
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-sm">
                    <div>
                        <h6 class="my-0"><?php echo $row['product_title'];?></h6>
                        <small class="text-muted">Best Quality</small>
                    </div>
                    <span class="text-muted">Rs <?php echo $row['product_price'];?></span>
                </li>
                <?php }} ?>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (Rupee)</span>
                    <strong>Rs <?php echo $_SESSION['t'];?></strong>
                </li>
            </ul>

            <form class="card p-2">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Promo code">
                    <button type="submit" class="btn btn-warning">Redeem</button>
                </div>
            </form>
        </div>
        <div class="col-md-7 col-lg-8">
            <h4 class="mb-3">Billing address</h4>
            <form method="POST">
                <div class="row g-3">


                    <div class="col-12">
                        <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com">
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="address" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="number" name="number" placeholder="03142285926" required>
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Plaza street" required>
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>

                </div>


                <hr class="my-4">

                <input class="w-100 btn btn-warning btn-lg" type="submit" value="Order Now" name="btnOrder">
            </form>
        </div>
    </div>
</main>

<script type='text/javascript'></script>

<!-- Footer Section Begin -->
<?php include 'Footer.php';?>
<!-- Footer Section End --> 

</body>
</html>