<?php
session_start();

include 'Connection.php';
include 'header.php';

if(!isset($_SESSION['user'])){
    echo "<script> location.href='Login.php'</script>";
}else{
    $u_id = $_SESSION['uid'];
    
    if(isset($_GET['id']))
    {
        $pro_id = $_GET['id'];
        $sql_check = "Select * from wishlist where product_id = $pro_id And uid = $u_id";
        $result_check = mysqli_query($con, $sql_check);
    
        if(mysqli_num_rows($result_check) == 1) {
            $message = "product already exit in wishlist";
                echo "<script>alert('$message');</script>";
        }else{
            $insertwishlist = "insert into wishlist (product_id, uid) values ('$pro_id', '$u_id')";
    
            if(mysqli_query($con, $insertwishlist)){
                $message = "Add to wishlist";
                echo "<script>alert('$message');</script>";
            }  
        }
        // Reload the page without the 'id' parameter
        echo "<script>location.href='wishlist.php'</script>";
    }
    else
    {
        //
    }
}
?>

<title>Wishlist</title>
<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                    <span>Wishlist</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Shop Cart Section Begin -->
<section class="shop-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shop__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                           $uid = $_SESSION['uid'];
                               $sql = "Select * from wishlist where uid='$uid'";
                               $result = mysqli_query($con, $sql);
                               
                               while($row = mysqli_fetch_assoc($result)){

                                $p_id = $row['product_id'];

                                $proquery = "Select * from products where product_id='$p_id'";
                                $proreslut = mysqli_query($con, $proquery);
                                   
                              while($row = mysqli_fetch_assoc($proreslut)){

                                ?>
                            <tr>  
                                <td class="cart__product__item">
                                    <img src="<?php echo str_replace('../', '', $row['product_img1']); ?>" height="90px" widhth="90px" alt="">
                                    <div class="cart__product__item__title">
                                    <h6><a href="Product_dt.php?product_id=<?php echo $row['product_id']; ?>" style="color: black;"><?php echo $row['product_title']; ?></a></h6>
                                        <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                </td>
                                <td class="cart__price">Rs <?php echo $row['product_price']; ?></td>
                                <td class="cart__close"><a href="deletewishlist.php?id=<?php echo $row['product_id']; ?>"><span class="icon_close"></span></a></td>
                            </tr>            
                            <?php }} ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shop Cart Section End -->

<!-- Footer Section Begin -->
<?php include 'Footer.php';?>
<!-- Footer Section End -->
