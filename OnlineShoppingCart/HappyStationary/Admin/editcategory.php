<?php
define('TITLE', 'Edit Category');
define('PAGE', 'Edit Category');
include '../Connection.php';
include 'includes/header.php';
session_start();
if(isset($_SESSION['is_adminlogin'])){
    $email = $_SESSION['email'];
} else{
    echo "<script> location.href='Login.php'</script>";
}
 ?>
<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Update Category</h1>
<?php
if(isset($_REQUEST['requpdate'])){

    $Cate_id = $_REQUEST['Cate_id'];
        $Cate_name = $_REQUEST['Cate_name'];
        $Cate_Des = $_REQUEST['Cate_Des'];
        $category_img = $_FILES['category_img']['name'];
        $category_img_temp = $_FILES['category_img']['tmp_name'];
        $img_folder = '../img/Categoryimages/'.$category_img;
        move_uploaded_file($category_img_temp, $img_folder);

    if(($_REQUEST['Cate_id'] == "") || ($_REQUEST['Cate_name'] == "")){
        $msg ='<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
    }else if (!preg_match("/^[a-zA-Z ]*$/",$Cate_name)) {  
        $msg = '<div class="alert alert-warning mt-2 role="alert">Only alphabets and white space are allowed</div>'; 
    }else {
        

        $sql = "UPDATE `category` SET `Cate_name`='$Cate_name', `Cate_Des`='$Cate_Des', `category_img`='$img_folder' WHERE Cate_id = $Cate_id";

        if($con->query($sql) == True){
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Update Successfully</div>';
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to Update</div>';
        }
    }
} 
    if(isset($_REQUEST['view'])){
        $sql = "Select * from category where Cate_id = {$_REQUEST['Cate_id']}";
        $result = $con->query($sql);
        $row = $result->fetch_assoc();
    } 
    ?>
    <form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
            <label for="Cate_id">ID</label>
            <input type="text" class="form-control" id="Cate_id" name="Cate_id" value="<?php if(isset($row['Cate_id'])) { echo $row['Cate_id']; } ?>" readonly>
        </div>
        <div class="form-group">
            <label for="Cate_name">Catigory Name</label>
            <input type="text" class="form-control" id="Cate_name" name="Cate_name" value="<?php if(isset($row['Cate_name'])) { echo $row['Cate_name']; } ?>">
        </div>
        <div class="form-group">
            <label for="Cate_Des">Catigory Description</label>
            <textarea class="form-control" id="Cate_Des" name="Cate_Des" row=2><?php if(isset($row['Cate_Des'])) { echo $row['Cate_Des']; } ?></textarea>
        </div>
        <div class="form-group">
            <label for="category_img">image</label>
            <img src="<?php if(isset($_row['category_img'])) { echo $row ['category_img']; }?>" alt="" class="img-thumbnail">
            <input type="file" class="form-control" id="category_img" name="category_img">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="requpdate" name="requpdate">Update</button>
            <a href="Category.php" class="btn btn-secondary">Close</a>
        </div>
        <?php if(isset($msg)) {echo $msg;} ?>
    </form>
</div>

<!-- Footer Section Begin -->
<?php include 'includes/footer.php';?>
<!-- Footer Section End -->
