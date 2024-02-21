<?php
include 'Connection.php';
include 'header.php';
?>
<title>Categories</title>
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                        <span>Categories</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
    <hr>

<!-- Categories Section Begin -->
<section class="categories">
        <div class="container-fluid ">
                <div class="row m-0 mb-3">
                <?php
               $sql = "Select * from category limit 5";
               $result = $con->query($sql);
               if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
               ?>
                    <div class="col-lg-3 col-md-3 col-sm-3 p-0">
                        <div class="categories__item set-bg" data-setbg="<?php echo str_replace('../', '', $row['category_img']); ?>">
                            <div class="categories__text">
                                <h4><?php echo $row['Cate_name']?></h4>
                                <?php $Itemquery = "Select * from products where Cate_id = '".$row["Cate_id"]."'";
                                $results = $con->query($Itemquery);
                                $Items = $results->num_rows; ?>

                                <p><?php echo $Items; ?> Items</p>
                                <a href="Category_dt.php?Cate_id=<?php echo $row['Cate_id']; ?>">Shop now</a>
                            </div>
                        </div>
                    </div>
                    <?php }} else {
                       echo "0 Result";
                     } ?>
                    
                </div>
                </div>     
    </div>
</section>
<!-- Categories Section End -->


<!-- Footer Section Begin -->
<?php include 'Footer.php';?>
<!-- Footer Section End -->


