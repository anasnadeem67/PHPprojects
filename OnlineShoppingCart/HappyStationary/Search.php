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
                    <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                    <?php
                    if(isset($_GET['search']))
                    {
                        $search = $_GET["search"];
                        $sql = "Select * from products where product_title Like '%{$search}%'";
                    }
                    else
                    {
                        echo "Search Karo";
                    }
                        
                    $sql = "Select * from products where product_title Like '%{$search}%' limit 1";
                    $result = $con->query($sql);
                    while($row = $result->fetch_assoc()){
                    $Cate_id = $row['Cate_id'];

                    $query = "Select * from category where Cate_id = '$Cate_id' limit 1";
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
                            <div class="filter-range-wrap">
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                data-min="33" data-max="99"></div>
                                <div class="range-slider">
                                    <div class="price-input">
                                        <p>Price:</p>
                                        <input type="text" id="minamount">
                                        <input type="text" id="maxamount">
                                    </div>
                                </div>
                            </div>
                            <a href="#">Filter</a>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <div class="row">
                        <?php
                        if(isset($_GET['search']))
                        {
                            $search = $_GET["search"];
                            $sql = "Select * from products where product_title Like '%{$search}%'";
                        }
                        else
                        {
                            echo "Search Karo";
                        }
                        
                        $result = $con->query($sql);
                        if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                        ?>
                        <div class="col-lg-4 col-md-6">
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