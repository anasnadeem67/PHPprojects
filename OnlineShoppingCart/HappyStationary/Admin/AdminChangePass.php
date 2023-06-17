<?php
define('TITLE', 'AdminChangePass');
define('PAGE', 'AdminChangePass');
include '../Connection.php';
 include 'includes/header.php';
session_start();
if(isset($_SESSION['is_adminlogin'])){
    $email = $_SESSION['email'];
} else{
    echo "<script> location.href='Login.php'</script>";
}
 
$email = $_SESSION['email'];
if(isset($_REQUEST['adminPassUpdatebtn'])){
    if(($_REQUEST['password'] == "")){
        // msg displayed if required field missing
        $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Password Fields is Required </div>'; 
    } else{
        $sql = "Select * from admin where email='$email'";
        $result = $con->query($sql);
        if($result->num_rows == 1){
            $password = $_REQUEST['password'];
            $sql = "Update admin set password = '$password' where email = '$email'";
            if($con->query($sql) == TRUE){
                
                $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated Successfully </div>';
            }else{
                
                $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2 role="alert"> Unabale to Update </div>';
            }
        }
    }
}
?>

 <div class="col-sm-9 mt-5">
     <div class="row">
         <div class="col-sm-6">
             <form class="mt-5 mx-5">
                 <div class="form-group">
                     <label for="inputEmail">Email</label>
                     <input type="email" class="form-control" id="inputEmail" value=" <?php echo $email ?>" readonly>
                 </div>
                 <div class="form-group">
                     <label for="inputnewpassword">New Password</label>
                     <input type="text" class="form-control" id="inputnewpassword" placeholder="New Password" name="password">
                </div>
                <button type="Submit" class="btn btn-warning mr-4 mt-4" name="adminPassUpdatebtn">Update</button>
                <button type="reset" class="btn btn-secondary mt-4">Reset</button>
                <?php if(isset($passmsg)) {echo $passmsg; } ?>
             </form>
        </div>
    </div>
</div>


