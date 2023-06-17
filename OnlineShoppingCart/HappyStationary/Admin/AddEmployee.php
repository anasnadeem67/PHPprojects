<?php
define('TITLE', 'Add Employee');
define('PAGE', 'Add Employee');
include '../Connection.php';
include 'includes/header.php';
session_start();
if(isset($_SESSION['is_adminlogin'])){
    $email = $_SESSION['email'];
} else{
    echo "<script> location.href='Login.php'</script>";
}

if(isset($_REQUEST['EmpSubmitBtn'])){
    if(($_REQUEST['emp_name'] == "") || ($_REQUEST['emp_email'] == "") || ($_REQUEST['emp_pass'] == "")){
        $msg ='<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
    }else {
        $emp_name = $_REQUEST['emp_name'];
        $emp_email = $_REQUEST['emp_email'];
        $emp_pass = $_REQUEST['emp_pass'];
        
        
       $sql = "insert into employee (emp_name, emp_email, emp_pass) values ('$emp_name', '$emp_email', '$emp_pass')";

        if($con->query($sql) == True){
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Employee Add Successfully</div>';
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Add Employee</div>';
        }
    }
}
 ?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Add new Employee </h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="emp_name">Employee Name</label>
            <input type="text" class="form-control" id="emp_name" name="emp_name">
        </div>
        <div class="form-group">
            <label for="emp_email">Employee Email</label>
            <input type="text" class="form-control" id="emp_email" name="emp_email">
        </div>
        <div class="form-group">
            <label for="emp_pass">Employee Password</label>
            <input type="text" class="form-control" id="emp_pass" name="emp_pass">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="EmpSubmitBtn" name="EmpSubmitBtn">Submit</button>
            <a href="Employee.php" class="btn btn-secondary">Close</a>
        </div>
        <?php if(isset($msg)) {echo $msg;} ?>
    </form>
</div>

<!-- Footer Section Begin -->
<?php include 'includes/footer.php';?>
<!-- Footer Section End -->