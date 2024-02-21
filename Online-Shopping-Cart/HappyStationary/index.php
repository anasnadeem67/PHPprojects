<!-- Header Section Begin -->
<?php 
session_start();



include 'Header.php';



    include 'Connection.php';
    define('TITLE', 'index');
    define('PAGE', 'index');
    if(isset($_SESSION['message']))
    {
        echo "<script>alert('".$_SESSION['message']."');</script>";
        unset($_SESSION["message"]) ;
    }
    
?>
<!-- Header Section End -->

<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>Home</title>
</head>
<body>
<?php
    $sql = "Select * from category";
    $result = $con->query($sql);
?>
   <!-- Categories Section Begin -->
   <section class="categories">
        <div class="container-fluid">
            <div class="row">
            <?php
            $index=0;
                   while($row=mysqli_fetch_assoc($result))
                   {
                   ?>
                <div class="col-lg-6 p-0">
                    <div class="categories__item categories__large__item set-bg"
                    data-setbg="<?php echo str_replace('../', '', $row['category_img']); ?>">
                    <div class="categories__text">
                        <h1><?php echo $row['Cate_name']?></h1>
                        <p><?php echo $row['Cate_Des']?></p>
                        <?php $Itemquery = "Select * from products where Cate_id = '".$row["Cate_id"]."'";
                                $results = $con->query($Itemquery);
                                $Items = $results->num_rows; ?>
                        <p><?php echo $Items; ?> Items</p>
                        <a href="Category_dt.php?Cate_id=<?php echo $row['Cate_id']; ?>">Shop now</a>
                    </div>
                </div>
                </div>
                <?php
                $index++;
                if($index>0)
                {
                break;
                }
                   }
                   ?>
            <div class="col-lg-6">
                <div class="row">
                   <?php
                   $index=0;
                   $sql = "Select * from category limit 5";
                   $result = $con->query($sql);
                   while($row=mysqli_fetch_assoc($result))
                   {
                       if($index>0)
                       {
                   ?>
                    <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                        <div class="categories__item set-bg" data-setbg="<?php echo str_replace('../', '', $row['category_img']); ?>">
                            <div class="categories__text">
                                <h4><?php echo $row['Cate_name']?></h4>
                                <p><?php echo $row['Cate_Des']?></p>
                                <?php $Itemquery = "Select * from products where Cate_id = '".$row["Cate_id"]."'";
                                $results = $con->query($Itemquery);
                                $Items = $results->num_rows; ?>

                                <p><?php echo $Items; ?> Items</p>
                                <a href="Category_dt.php?Cate_id=<?php echo $row['Cate_id']; ?>">Shop now</a>
                            </div>
                        </div>
                    </div>
                   <?php
                   
                    }   
                    $index++;   
                }
                   ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="section-title">
                    <h4>New product</h4>
                </div>
            </div>
            <div class="col-lg-8 col-md-8">
                <ul class="filter__controls">
                    
                    <li><a href="?All">All</a></li>
                    <?php
                                $sql = "Select * from category limit 6";
                                $result = $con->query($sql);
                                if($result->num_rows > 0){
                                    while($row = $result->fetch_assoc()){  
                                        ?>
                    <li><a href="?Cate_id=<?php echo $row['Cate_id']; ?>"><?php echo $row['Cate_name']; ?></a></li>
                   <?php }} ?>
                </ul>
            </div>
        </div>
        <div class="row property__gallery">
        <?php
        if(isset($_GET['Cate_id']))
        {
            $Cate_id = $_GET["Cate_id"];
            if($Cate_id == 'All')
            {
                $sql = "Select * from products where status = 'Active' AND product_label is not null limit 8";
            }
            else{
                $sql = "Select * from products where Cate_id = '$Cate_id' AND status = 'Active' AND product_label is not null limit 8";
            }
        }
        else{
            $sql = "Select * from products where status = 'Active' AND product_label is not null limit 8";
        }      
            $result = $con->query($sql);
            if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
        ?>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product__item">
                
                    <div class="product__item__pic set-bg" data-setbg="<?php echo str_replace('../', '', $row['product_img1']); ?>" style='background-image: url("<?php echo  str_replace('../', '', $row['product_img1']);?>");'>
                        <div class="label new">New</div>
                        <ul class="product__hover">
                            <li><a href="<?php echo str_replace('../', '', $row['product_img1']); ?>" class="image-popup"><span class="arrow_expand"></span></a></li>
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
            <?php 
            }}
            ?>
        </div>
    </div>
</section>
<!-- Product Section End -->

<!-- Banner Section Begin -->
<section class="banner set-bg" data-setbg="img/banner/bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-8 m-auto">
                <div class="banner__slider owl-carousel">
               <?php
               $sql = "Select * from category limit 3";
               $result = $con->query($sql);
               if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
               ?>
                    <div class="banner__item">
                        <div class="banner__text">
                            <span>The <?php echo $row['Cate_name']?> Collection</span>
                            <h1>The <?php echo $row['Cate_name']?> Items</h1>
                            <a href="Category_dt.php?Cate_id=<?php echo $row['Cate_id']; ?>">Shop now</a>
                        </div>
                    </div>
         <?php }} ?>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner Section End -->

<!-- Trend Section Begin -->
<section class="trend spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6">

                <div class="trend__content">
                    <div class="section-title">
                        <h4>Hot Trend</h4>
                    </div>
                    <?php
                $sql = "Select * from products where status = 'Active' AND product_label = 'Hot Trend' limit 3";
                $result = $con->query($sql);
                if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){     
                ?>
                    <div class="trend__item">
                        <div class="trend__item__pic">
                            <img src="<?php echo str_replace('../', '', $row['product_img1']); ?>" width="90px" height="90px" alt="">
                        </div>
                        <div class="trend__item__text">
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
                    <?php }}?>
                    
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="trend__content">
                    <div class="section-title">
                        <h4>Best seller</h4>
                    </div>
                    <?php
                $sql = "Select * from products where status = 'Active' AND product_label = 'Best Saler' limit 3";
                $result = $con->query($sql);
                if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){     
                ?>
                    <div class="trend__item">
                        <div class="trend__item__pic">
                            <img src="<?php echo str_replace('../', '', $row['product_img1']); ?>" width="90px" height="90px" alt="">
                        </div>
                        <div class="trend__item__text">
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
                    <?php }}?>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="trend__content">
                    <div class="section-title">
                        <h4>Feature</h4>
                    </div>
                    <?php
                $sql = "Select * from products where status = 'Active' AND product_label = 'Feature' limit 3";
                $result = $con->query($sql);
                if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){     
                ?>
                    <div class="trend__item">
                        <div class="trend__item__pic">
                            <img src="<?php echo str_replace('../', '', $row['product_img1']); ?>" width="90px" height="90px" alt="">
                        </div>
                        <div class="trend__item__text">
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
                    <?php }}?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Trend Section End -->


<!-- Services Section Begin -->
<section class="services spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-car"></i>
                    <h6>Free Shipping</h6>
                    <p>For all oder over $99</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-money"></i>
                    <h6>Money Back Guarantee</h6>
                    <p>If good have Problems</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-support"></i>
                    <h6>Online Support 24/7</h6>
                    <p>Dedicated support</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-headphones"></i>
                    <h6>Payment Secure</h6>
                    <p>100% secure payment</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Services Section End -->

<!-- Footer Section Begin -->
<?php include 'Footer.php';?>
<!-- Footer Section End -->

</body>
</html>