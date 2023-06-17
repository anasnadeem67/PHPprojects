<?php
include 'Connection.php';
include 'header.php';

?>

<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.php"><i class="fa fa-home"></i>Home</a>
                        <?php 

                        if(isset($_GET['product_id']))
                        {
                        $product_id = $_GET["product_id"];
                        }
                        else{
                        $product_id = 1;
                        }
                        
                        $sql = "Select * from products where product_id = '$product_id'";
                        $result = $con->query($sql);
                        while($row = $result->fetch_assoc()){
                        $Cate_id = $row['Cate_id'];

                        $query = "Select * from category where Cate_id = '$Cate_id'";
                        $rst = $con->query($query);
                        while($rows = $rst->fetch_assoc()){
                        ?> 
                        <a href="Category_dt.php?Cate_id=<?php echo $row['Cate_id']; ?>"><i class="fa-solid fa-list"></i><?php echo $rows['Cate_name']; ?></a>
                        <span><?php echo $row['product_title']; ?></span>
                        <title><?php echo $row['product_title']; ?></title>
                        <?php }} ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
    <hr>

<?php

if(isset($_GET['product_id']))
{
    $product_id = $_GET["product_id"];
}
else{
      $product_id = 1;
 }

$sql = "Select * from products where product_id = '$product_id'";
$result = $con->query($sql);
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $qty = $row['product_quantity'];
    ?>
   <!-- Product Details Section Begin -->
   <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__left product__thumb nice-scroll">
                            <a class="pt active" href="#product-1">
                                <img src="<?php echo str_replace('../', '', $row['product_img1']); ?>" alt="">
                            </a>
                            <a class="pt" href="#product-2">
                                <img src="<?php echo str_replace('../', '', $row['product_img2']); ?>" alt="">
                            </a>
                            <a class="pt" href="#product-3">
                                <img src="<?php echo str_replace('../', '', $row['product_img3']); ?>" alt="">
                            </a>
                            <a class="pt" href="#product-4">
                                <img src="<?php echo str_replace('../', '', $row['product_img4']); ?>" alt="">
                            </a>
                        </div>
                        <div class="product__details__slider__content">
                            <div class="product__details__pic__slider owl-carousel">
                                <img data-hash="product-1" class="product__big__img" src="<?php echo str_replace('../', '', $row['product_img1']); ?>" alt="">
                                <img data-hash="product-2" class="product__big__img" src="<?php echo str_replace('../', '', $row['product_img2']); ?>" alt="">
                                <img data-hash="product-3" class="product__big__img" src="<?php echo str_replace('../', '', $row['product_img3']); ?>" alt="">
                                <img data-hash="product-4" class="product__big__img" src="<?php echo str_replace('../', '', $row['product_img4']); ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <form action="" method="POST">
                    <div class="product__details__text">
                        <h3><?php echo $row['product_title']; ?></h3>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <span>( 138 reviews )</span>
                        </div>
                        <div class="product__details__price">Rs <?php echo $row['product_price']; ?></div>
                        <div class="product__details__button">
                            <div class="quantity">
                                <span>Quantity:</span>
                                <div class="pro-qty">
                                    <input type="text" value="1">
                                </div>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $row['product_id']; ?>">
                            <input type="hidden" name="img" value="<?php echo str_replace('../', '', $row['product_img']); ?>">
                            <input type="hidden" min="1" value="1" name="qty" value="<?php echo $row['product_quantity']; ?>">
                            <input type="hidden" name="Title" value="<?php echo $row['product_title']; ?>">
                            <input type="hidden" name="Price" value="<?php echo $row['product_price']; ?>">
                            <a href="addCart.php?id=<?php echo $row['product_id']; ?>" class="cart-btn"><span class="icon_bag_alt"></span> Add to cart</a>
                            <ul>
                                <li><a href="wishlist.php?id=<?php echo $row['product_id']; ?>"><span class="icon_heart_alt"></span></a></li>
                            </ul>
                        </div>
                    </form>
                        <div class="product__details__widget">
                            <ul>
                                <li>
                                    <span>Availability:</span>
                                            <?php
                                            if($qty>0)
                                            {
                                                echo 'Available';
                                            }
                                            else{
                                                echo "No Available";
                                            }
                                            ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> 
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active">Description</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <h6>Description</h6>
                                <p><?php echo $row['product_desc']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            if(isset($_GET['product_id']))
            {
                $product_id = $_GET["product_id"];
                $Relatedpro = $row['Cate_id'];
            }
            }}
            else{
                echo "<script> location.href='index.php'</script>";
             } 
            
        ?>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="related__title">
                        <h5>RELATED PRODUCTS</h5>
                    </div>
                </div>
                <?php
                $sql = "Select * from products where Cate_id = '$Relatedpro' AND Not product_id = '$product_id' limit 4";
                $result = $con->query($sql);
                if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){     
                ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="<?php echo str_replace('../', '', $row['product_img1']); ?>" style='background-image: url("<?php echo  str_replace('../', '', $row['product_img1']);?>");'>
                            <ul class="product__hover">
                                <li><a href="img/product/related/rp-1.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                                <li><a href="wishlist.php?id=<?php echo $row['product_id']; ?>"><span class="icon_heart_alt"></span></a></li>
                                <li><a href="addCart.php?id=<?php echo $row['product_id']; ?>"><span class="icon_bag_alt"></span></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="Product_dt.php?product_id=<?php echo $row['product_id']; ?>"><?php echo $row['product_title']; ?></a></h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">Rs <?php echo $row['product_price']; ?></div>
                        </div>
                    </div>
                </div>
<?php }} ?>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

<!-- Footer Section Begin -->
<?php include 'Footer.php';?>
<!-- Footer Section End -->