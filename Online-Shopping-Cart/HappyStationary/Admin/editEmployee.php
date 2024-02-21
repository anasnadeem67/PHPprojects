<?php
define('TITLE', 'Edit Employee');
define('PAGE', 'Edit Employee');
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
    <h3 class="text-center">Update Employee</h1>
<?php
if(isset($_REQUEST['requpdate'])){
    if(($_REQUEST['emp_id'] == "") || ($_REQUEST['emp_name'] == "") || ($_REQUEST['emp_email'] == "") || ($_REQUEST['emp_pass'] == "")){
        $msg ='<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
    }else {
        $emp_id = $_REQUEST['emp_id'];
        $emp_name = $_REQUEST['emp_name'];
        $emp_email = $_REQUEST['emp_email'];
        $emp_pass = $_REQUEST['emp_pass'];

        $sql = "UPDATE `employee` SET `emp_name`='$emp_name', `emp_email`='$emp_email', `emp_pass`='$emp_pass' WHERE emp_id = $emp_id";

        if($con->query($sql) == True){
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Update Successfully</div>';
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to Update</div>';
        }
    }
}

if(isset($_REQUEST['view'])){
    $sql = "Select * from employee where emp_id = {$_REQUEST['emp_id']}";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
}
?>

    <form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
            <label for="emp_id">ID</label>
            <input type="text" class="form-control" id="emp_id" name="emp_id" value="<?php if(isset($row['emp_id'])) { echo $row['emp_id']; } ?>" readonly>
        </div>
        <div class="form-group">
            <label for="emp_name">Name</label>
            <input type="text" class="form-control" id="emp_name" name="emp_name" value="<?php if(isset($row['emp_name'])) { echo $row['emp_name']; } ?>">
        </div>
        <div class="form-group">
            <label for="emp_email">Email</label>
            <input type="text" class="form-control" id="emp_email" name="emp_email" value="<?php if(isset($row['emp_email'])) { echo $row['emp_email']; } ?>">
        </div>
        <div class="form-group">
            <label for="emp_pass">Password</label>
            <input type="text" class="form-control" id="emp_pass" name="emp_pass" value="<?php if(isset($row['emp_pass'])) { echo $row['emp_pass']; } ?>">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="requpdate" name="requpdate">Update</button>
            <a href="Employee.php" class="btn btn-secondary">Close</a>
        </div>
        <?php if(isset($msg)) {echo $msg;} ?>
    </form>
</div>

<!-- Footer Section Begin -->
<?php include 'includes/footer.php';?>
<!-- Footer Section End -->
