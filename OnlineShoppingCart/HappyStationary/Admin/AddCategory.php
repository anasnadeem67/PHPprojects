<?php
define('TITLE', 'Add Category');
define('PAGE', 'Add Category');
include '../Connection.php';
include 'includes/header.php';
session_start();
if(isset($_SESSION['is_adminlogin'])){
    $email = $_SESSION['email'];
} else{
    echo "<script> location.href='Login.php'</script>";
}

if(isset($_REQUEST['CategorySubmitBtn'])){
    
        $Cate_name = $_REQUEST['Cate_name'];
        $Cate_Des = $_REQUEST['Cate_Des'];
        $category_img = $_FILES['category_img']['name'];
        $category_img_temp = $_FILES['category_img']['tmp_name'];
        $img_folder = '../img/Categoryimages/'.$category_img;
        move_uploaded_file($category_img_temp, $img_folder);

    if(($_REQUEST['Cate_name'] == "") || ($_FILES['category_img']['size'] == 0)){
        $msg ='<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
    }else if (!preg_match("/^[a-zA-Z ]*$/",$Cate_name)) {  
        $msg = '<div class="alert alert-warning mt-2 role="alert">Only alphabets and white space are allowed</div>'; 
    }else {
        

        $sql = "insert into category (Cate_name, Cate_Des, category_img) values ('$Cate_name', '$Cate_Des', '$img_folder')";
        if($con->query($sql) == True){
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Category Add Successfully</div>';
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Add Category</div>';
        }
    }
}
 ?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Add new Category </h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="Cate_name">Catigory Name</label>
            <input type="text" class="form-control" id="Cate_name" name="Cate_name">
        </div>
        <div class="form-group">
            <label for="Cate_Des">Catigory Description<small> (Optional)</small></label>
            <textarea class="form-control" id="Cate_Des" name="Cate_Des" row=2></textarea>
        </div>
        <div class="form-group">
            <label for="category_img">image</label>
            <input type="file" class="form-control" id="category_img" name="category_img">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="CategorySubmitBtn" name="CategorySubmitBtn">Submit</button>
            <a href="Category.php" class="btn btn-secondary">Close</a>
        </div>
        <?php if(isset($msg)) {echo $msg;} ?>
    </form>
</div>

<!-- Footer Section Begin -->
<?php include 'includes/footer.php';?>
<!-- Footer Section End -->