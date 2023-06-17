<!DOCTYPE html>
<html lang="zxx">

<head>
</head>
<body>
<?php
include 'Connection.php';
include 'header.php';
if(isset($_SESSION['message']))
{
    echo "<script>alert('".$_SESSION['message']."');</script>";
    unset($_SESSION["message"]) ;
}
 ?>
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <span>Shopping cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Cart Section Begin -->
    <form method="post" action="saveCart.php">
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
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
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
                                <tr>
                                    <td class="cart__product__item">
                                        <img src="<?php echo str_replace('../', '', $row['product_img1']); ?>" width='90px' hight='90px' alt="">
                                        <div class="cart__product__item__title">
                                            <h6><?php echo $row['product_title'];?></h6>
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__price">Rs <?php echo $row['product_price'];?></td>
                                    <input type="hidden" name="indexes[]" value="<?php echo $index; ?>">
                                    <td class="cart__quantity">
                                        <div class="pro-qty">
                                            <input type="text" value="<?php echo $_SESSION['qty_array'][$index];?>" name="qty_<?php echo $index;?>">
                                        </div>
                                    </td>
                                    <?php $total+=$_SESSION['qty_array'][$index]*$row['product_price']; ?>
                                    <td class="cart__total">Rs <?php echo $_SESSION['qty_array'][$index]*$row['product_price']; ?></td>
                                    <td class="cart__close"><a href="deleteCart.php?id=<?php echo $row['product_price'];?>"><span class="icon_close"></span></a></td>
                                </tr>
                                <?php
                                $index ++;
                                $_SESSION['t']=$total;     
                                  }
                                }
                                else
                                {
                                ?>
                                <tr>
                                <td colspan="4" class="text-center">No Item in Cart</td>
                               </tr>
                               <?php
                               }
                               ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn">
                        <a href="#">Continue Shopping</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn update__btn">
                    <button type="submit" class="site-btn" name="save">Update Cart</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="discount__content">
                        <h6>Discount codes</h6>
                            <input type="text" placeholder="Enter your coupon code">
                            <button type="" class="site-btn">Apply</button>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-2">
                    <div class="cart__total__procced">
                        <h6>Cart total</h6>
                        <ul>
                            
                            <li>Total <span>Rs <?php echo $_SESSION['t'];?></span></li>
                        </ul>
                        <a href="Orderpage.php" class="primary-btn" onMouseOver="this.style.color='#ffffff'"
onMouseOut="this.style.color='#ffffff'">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </form>
    <!-- Shop Cart Section End -->

<!-- Footer Section Begin -->
<?php include 'Footer.php';?>
<!-- Footer Section End -->
</body>
</html>