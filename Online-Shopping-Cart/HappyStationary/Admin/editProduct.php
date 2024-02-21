<?php
define('TITLE', 'Edit Product');
define('PAGE', 'Edit Product');
include '../Connection.php';
include 'includes/header.php';
session_start();
if(isset($_SESSION['is_adminlogin'])){
    $email = $_SESSION['email'];
} else{
    echo "<script> location.href='Login.php'</script>";
}

 if(isset($_REQUEST['requpdate'])){
    $pro_image=array();
    if(($_REQUEST['product_id'] == "") || ($_REQUEST['product_title'] == "") || ($_REQUEST['product_desc'] == "") || ($_REQUEST['product_price'] == "") || ($_REQUEST['product_quantity'] == "") || ($_REQUEST['status'] == "")){
        $msg ='<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
    }else {
        $product_id = $_REQUEST['product_id'];
        $product_title = $_REQUEST['product_title'];
        $product_desc = $_REQUEST['product_desc'];
        $Cate_id = $_REQUEST['Cate_id'];
        $product_price = $_REQUEST['product_price'];
        $product_quantity = $_REQUEST['product_quantity'];
        $product_label = $_REQUEST['product_label'];
        $status = $_REQUEST['status'];
       
        $error=array();
        $extension=array("jpeg","jpg","png","gif");
        foreach($_FILES["product_img"]["tmp_name"] as $key=>$tmp_name) {
            $file_name=$_FILES["product_img"]["name"][$key];
            $file_tmp=$_FILES["product_img"]["tmp_name"][$key];
            $ext=pathinfo($file_name,PATHINFO_EXTENSION);
        array_push($pro_image,"../img/Productimages/".$file_name);
            if(in_array($ext,$extension)) {
                if(!file_exists("../img/Productimages/".$file_name)) {
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

if(empty($pro_image))
{
    if(count($pro_image)==4)
{
    $sql = "UPDATE `products` SET `product_title`='$product_title', `product_desc`='$product_desc', `Cate_id`='$Cate_id', `product_price`='$product_price', `status`='$status', `product_label`='$product_label', `product_img1`='$pro_image[0]', `product_img2`='$pro_image[1]', `product_img3`='$pro_image[2]', `product_img4`='$pro_image[3]' WHERE product_id = $product_id";

}else if(count($pro_image)==3)
{
    $sql = "UPDATE `products` SET `product_title`='$product_title', `product_desc`='$product_desc', `Cate_id`='$Cate_id', `product_price`='$product_price', `status`='$status', `product_label`='$product_label', `product_img1`='$pro_image[0]', `product_img2`='$pro_image[1]', `product_img3`='$pro_image[2]' WHERE product_id = $product_id";
}else if(count($pro_image)==2)
{
    $sql = "UPDATE `products` SET `product_title`='$product_title', `product_desc`='$product_desc', `Cate_id`='$Cate_id', `product_price`='$product_price', `status`='$status', `product_label`='$product_label', `product_img1`='$pro_image[0]', `product_img2`='$pro_image[1]' WHERE product_id = $product_id";
}else if(count($pro_image)==1)
{
    $sql = "UPDATE `products` SET `product_title`='$product_title', `product_desc`='$product_desc', `Cate_id`='$Cate_id', `product_price`='$product_price', `status`='$status', `product_label`='$product_label', `product_img1`='$pro_image[0]' WHERE product_id = $product_id";
}
}else{
    $sql = "UPDATE `products` SET `product_title`='$product_title', `product_desc`='$product_desc', `Cate_id`='$Cate_id', `product_price`='$product_price', `status`='$status', `product_label`='$product_label'  WHERE product_id = $product_id";

}
        if($con->query($sql) == True){
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Product Add Successfully</div>';
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Add Product</div>';
        }
    }
}

    if(isset($_REQUEST['view'])){
        $sql = "Select * from products where product_id = {$_REQUEST['product_id']}";
        $result = $con->query($sql);
        $row = $result->fetch_assoc();
    }
    
?>
<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Update Product </h1>
    <form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
            <label for="product_id">ID</label>
            <input type="text" class="form-control" id="product_id" name="product_id" value="<?php if(isset($row['product_id'])) { echo $row['product_id']; } ?>" readonly>
        </div>
        <div class="form-group">
            <label for="product_title">Title</label>
            <input type="text" class="form-control" id="product_title" name="product_title" value="<?php if(isset($row['product_title'])) { echo $row['product_title']; } ?>">
        </div>
        <div class="form-group">
            <label for="Category">Category</label>
                       <select class="form-control input-sm" id="Cate_id" name="Cate_id">
                          <option value="None">Select Category</option>
                          <?php
                                $sql = "Select * from category";
                                $result = $con->query($sql);
                                if($result->num_rows > 0){
                                    while($row1 = $result->fetch_assoc()){    
                                        if($row1['Cate_id']==$row['Cate_id'])   
                                        {                           
                                        ?>
                          <option  value="<?php echo $row1['Cate_id']; ?>" selected><?php echo $row1['Cate_name']; ?></option>
                          <?php
                        }else
                    {?> 
<option  value="<?php echo $row1['Cate_id']; ?>"><?php echo $row1['Cate_name']; ?></option>
                          <?php
                    }}}
                        ?>                         
                        </select>              
        </div>
        <div class="form-group">
            <label for="product_desc">Description</label>
            <textarea class="form-control" id="product_desc" name="product_desc" row=2><?php if(isset($row['product_desc'])) { echo $row['product_desc']; } ?></textarea>
        </div>
        <div class="form-group">
            <label for="product_img">image</label>
            <img src="<?php if(isset($_row['product_img'])) { echo $row ['product_img']; }?>" alt="" class="img-thumbnail">
            <input type="file" class="form-control" id="product_img" name="product_img[]" multiple>
        </div>
        <div class="form-group">
            <label for="product_price">Price</label>
            <input type="text" class="form-control" id="product_price" name="product_price" value="<?php if(isset($row['product_price'])) { echo $row['product_price']; } ?>">
        </div>
        <div class="form-group">
            <label for="product_quantity">Quantity</label>
            <input type="number" class="form-control" id="product_quantity" name="product_quantity" value="<?php if(isset($row['product_quantity'])) { echo $row['product_quantity']; } ?>">
        </div>
        <div class="form-group">
            <label for="Category">Status</label>
            <div class="col-md-8">
                       <select class="form-control input-sm" id="status" name="status">
                       <?php if($row['status'] == "Active")
                       {?>
                          <option value="Active" selected>Active</option>
                       <?php }else 
                       {?>
                        <option value="Active">Active</option>
                       <?php  }if($row['status'] == "Un_Active")
                       {?>
                          <option value="Un_Active" selected>Un Active</option> 
                       <?php } else{?>       
                        <option value="Un_Active">Un Active</option> 
                       <?php } ?>            
                        </select> 
                      </div>             
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
            <button type="submit" class="btn btn-danger" id="requpdate" name="requpdate">Update</button>
            <a href="Product.php" class="btn btn-secondary">Close</a>
        </div>  
        <?php if(isset($msg)) {echo $msg;} ?>
    </form>
</div>

</div>

<!-- Footer Section Begin -->
<?php include 'includes/footer.php';?>
<!-- Footer Section End -->
