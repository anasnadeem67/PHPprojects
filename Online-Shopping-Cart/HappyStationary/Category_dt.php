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
                    <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                    <?php 

                        if(isset($_GET['Cate_id']))
                        {
                        $Cate_id = $_GET["Cate_id"];
                        }
                        else{
                        $Cate_id = 1;
                        }
                        
                        $sql = "Select * from category where Cate_id = '$Cate_id'";
                        $result = $con->query($sql);
                        while($row = $result->fetch_assoc()){
                        $Cate_name = $row['Cate_name'];
       
                        ?>
                        <title><?php echo $row['Cate_name']; ?></title>
                        <span><?php echo $row['Cate_name']; ?></span>
                        <?php } ?>
                </div>
            </div>
         </div>
    </div>
  </div>
    <!-- Breadcrumb End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="shop__sidebar">
                        <div class="sidebar__categories">
                            <div class="section-title">
                                <h4>Categories</h4>
                            </div>
                            <div class="categories__accordion">
                                <div class="accordion" id="accordionExample">
                                <?php
                                if(isset($_GET['Cate_id']))
                                {
                                 $Cate_id = $_GET['Cate_id'];
                                }
                                else
                                {
                                 $Cate_id = 1;
                                }
                                  
                                   $sql = "Select * from category";
                                   $result = $con->query($sql);
                                   if($result->num_rows > 0){
                                     while($row = $result->fetch_assoc()){
                                    ?>

                                    <div class="card">
                                        <div class="card-heading active">
                                            <a href="Category_dt.php?Cate_id=<?php echo $row['Cate_id']; ?>"><?php echo $row['Cate_name']; ?></a>
                                        </div>
                                    </div>
                                    <?php }} ?>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar__filter">
                            <div class="section-title">
                                <h4>Shop by price</h4>
                            </div>
                            <form Method="GET">
                            <div class="filter-range-wrap">
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                data-min="0" data-max="9999"></div>
                                <div class="range-slider">
                                    <div class="price-input">
                                        <p>Price:</p>
                                        <input type="text" id="minamount" name="minamount">
                                        <input type="text" id="maxamount" name="maxamount">
                                    </div>
                                </div>
                            </div>
                            
                            <button type="submit" name="filter" class="f-btn">Filter</button>
                        </div>
                        </form>
                        
                    </div>
                </div>
                

                <div class="col-lg-9 col-md-9">
                    <div class="row">
                        <?php

                        if(isset($_GET['Cate_id']))
                        {
                         $Cate_id = $_GET['Cate_id'];
                         $sql = "Select * from products where Cate_id = '$Cate_id'";
                         $result = $con->query($sql);
                        }
                        else if(isset($_GET['minamount']) && isset($_GET['maxamount']))
                        {
                                $minamount = $_GET['minamount'];
                                $maxamount = $_GET['maxamount'];         
                                
                                $sql = "Select * from products where product_price Between '$minamount' AND '$maxamount'";
                                $result = mysqli_query($con, $sql);
                        }
                        else if(!isset($_GET['Cate_id']))
                        {
                        $sql = "Select * from products";
                        $result = $con->query($sql);
                        }
                        else 
                         {
                             echo "No Record Found";      
                         }
                        
                        if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                        ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="<?php echo str_replace('../', '', $row['product_img1']); ?>" style='background-image: url("<?php echo  str_replace('../', '', $row['product_img1']);?>");'>
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
                       <?php }} ?> 
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->

<!-- Footer Section Begin -->
<?php include 'Footer.php';?>
<!-- Footer Section End -->