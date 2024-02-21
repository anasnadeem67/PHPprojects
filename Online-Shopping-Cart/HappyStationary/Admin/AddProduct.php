<?php
define('TITLE', 'Add Product');
define('PAGE', 'Add Product');
include '../Connection.php';
include 'includes/header.php';
session_start();
if(isset($_SESSION['is_adminlogin'])){
    $email = $_SESSION['email'];
} else{
    echo "<script> location.href='Login.php'</script>";
}


if(isset($_REQUEST['ProductSubmitBtn'])){
    $pro_image=array();
    if(($_REQUEST['product_title'] == "") || ($_REQUEST['product_desc'] == "") || ($_REQUEST['Cate_id'] == "") || ($_REQUEST['product_price'] == "") || ($_REQUEST['product_quantity'] == "")){
        $msg ='<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
    }else {
        $product_title = $_REQUEST['product_title'];
        $product_desc = $_REQUEST['product_desc'];
        $Cate_id = $_REQUEST['Cate_id'];
        $product_price = $_REQUEST['product_price'];
        $product_quantity = $_REQUEST['product_quantity'];
        $product_label = $_REQUEST['product_label'];
       
        $error=array();
        $extension=array("jpeg","jpg","png","gif");
        foreach($_FILES["product_img"]["tmp_name"] as $key=>$tmp_name) {
            $file_name=$_FILES["product_img"]["name"][$key];
            $file_tmp=$_FILES["product_img"]["tmp_name"][$key];
            $ext=pathinfo($file_name,PATHINFO_EXTENSION);
        array_push($pro_image,"../img/Productimages/".$file_name);
            if(in_array(strtolower($ext),$extension)) {
                if(!file_exists("../img/Productimages/".$file_name.".".$ext)) {
                    move_uploaded_file($file_tmp=$_FILES["product_img"]["tmp_name"][$key],"../img/Productimages/".$file_name);
                }
                else {
                    $filename=basename($file_name,$ext);
                    $newFileName=$filename.time().".".$ext;
                    move_uploaded_file($file_tmp=$_FILES["product_img"]["tmp_name"][$key],"../img/Productimages/".$newFileName);
                }
            }
            else {
                array_push($error,"$file_name, ");
            }
        }

if(count($pro_image)==4)
{
        $sql = "INSERT INTO `products`(`product_title`, `product_desc`, `Cate_id`, `product_price`, `product_quantity`, `product_label`, `product_img1`, `product_img2`, `product_img3`, `product_img4`) VALUES ('$product_title','$product_desc','$Cate_id','$product_price','$product_quantity','$product_label', '$pro_image[0]', '$pro_image[1]', '$pro_image[2]', '$pro_image[3]')";
}else if(count($pro_image)==3)
{
        $sql = "INSERT INTO `products`(`product_title`, `product_desc`, `Cate_id`, `product_price`, `product_quantity`, `product_label`, `product_img1`, `product_img2`, `product_img3`) VALUES ('$product_title','$product_desc','$Cate_id','$product_price','$product_quantity','$product_label', '$pro_image[0]', '$pro_image[1]', '$pro_image[2]')";
}else if(count($pro_image)==2)
{
        $sql = "INSERT INTO `products`(`product_title`, `product_desc`, `Cate_id`, `product_price`, `product_quantity`, `product_label`, `product_img1`, `product_img2`) VALUES ('$product_title','$product_desc','$Cate_id','$product_price','$product_quantity','$product_label', '$pro_image[0]', '$pro_image[1]')";
}else if(count($pro_image)==1)
{
        $sql = "INSERT INTO `products`(`product_title`, `product_desc`, `Cate_id`, `product_price`, `product_quantity`, `product_label`, `product_img1`) VALUES ('$product_title','$product_desc','$Cate_id','$product_price','$product_quantity','$product_label', '$pro_image[0]')";
}
        if($con->query($sql) == True){
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Product Add Successfully</div>';
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Add Product</div>';
        }
    }
}
 ?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Add new Product </h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="product_title">Title</label>
            <input type="text" class="form-control" id="product_title" name="product_title">
        </div>
        <div class="form-group">
            <label for="product_desc">Description</label>
            <textarea class="form-control" id="product_desc" name="product_desc" row=2></textarea>
        </div>
        <div class="form-group">
            <label for="product_img">image</label>
            <input type="file" class="form-control" id="product_img" name="product_img[]" multiple>
        </div>
        <div class="form-group">
            <label for="Category">Category</label>
            <div class="col-md-8">
                       <select class="form-control input-sm" id="Cate_id" name="Cate_id">
                          <option value="None">Select Category</option>
                          <?php
                                $sql = "Select * from category";
                                $result = $con->query($sql);
                                if($result->num_rows > 0){
                                    while($row = $result->fetch_assoc()){                                      
                                        ?>
                          <option  value="<?php echo $row['Cate_id']; ?>"><?php echo $row['Cate_name']; ?></option>
                          <?php
                        }}
                        ?>                         
                        </select> 
                      </div>              
        </div>
        <div class="form-group">
            <label for="product_price">Price</label>
            <input type="text" class="form-control" id="product_price" name="product_price">
        </div>
        <div class="form-group">
            <label for="product_quantity">Quantity</label>
            <input type="number" class="form-control" id="product_quantity" name="product_quantity">
        </div>
        <div class="form-group">
            <label for="product_label">Label<small> (Optional) </small></label>
            <div class="col-md-8">
                       <select class="form-control input-sm" id="product_label" name="product_label">
                          <option value="None">Select Label</option>
                          <option value="Hot Trend">Hot Trend</option>
                          <option value="Best Saler">Best Saler</option>
                          <option value="Feature">Feature</option>                      
                        </select> 
                      </div>              
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="ProductSubmitBtn" name="ProductSubmitBtn">Submit</button>
            <a href="Product.php" class="btn btn-secondary">Close</a>
        </div>
        
        <?php if(isset($msg)) {echo $msg;} ?>
    </form>
</div>

<!-- Footer Section Begin -->
<?php include 'includes/footer.php';?>
<!-- Footer Section End -->