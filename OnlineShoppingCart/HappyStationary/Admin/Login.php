<?php
 include '../Connection.php';
session_start();
if(!isset($_SESSION['is_adminlogin'])){
 if(isset($_REQUEST['email'])){
 $email = mysqli_real_escape_string($con, trim($_REQUEST['email']));
 $password = mysqli_real_escape_string($con, trim($_REQUEST['password']));
 $sql = "Select email, password from admin where email = '".$email."' AND password = '".$password."' limit 1";
$result = $con->query($sql);
if($result->num_rows == 1){
    $_SESSION['is_adminlogin'] = true;
    $_SESSION['email'] = $email;
    echo "<script> location.href='admin_Dashboard.php';</script>";
    exit;
}else{
    $msg = '<div class="alert alert-warning mt-2">Enter valid Email and Password</div>';
     }
}
}else{
    echo "<script> location.href='admin_Dashboard.php';</script>";
}
 ?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    
    <!-- Fonts -->
    <script src="https://kit.fontawesome.com/932cb4677f.js" crossorigin="anonymous"></script>


    <!-- Css Styles -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="../css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../css/style.css" type="text/css">

<style>
    .custom-margin {
        margin-top: 8vh;
    }
</style>

</head>
<body>
<div class="mb-3 mt-5 text-center" style="font-size: 30px;">
<i class="fas fa-stethoscope"></i>
    <span>Happy Stationary</span>
</div>
<p class="text-center" style="font-size:20px;"><i class="fas fa-user-secret text-danger"></i>Admin Area (Demo)</p>
<div class="container-fluid">
<div class="row justify-content-center custom-margin">
    <div class="col-sm-6 col-md-4">
        <form action="" class="shadow-lg p-4" method="POST">
            <div class="form-goup">
            <i class="fas fa-user"></i><label for="email" class="font-weight-bold pl-2">Email</label><input type="email" class="form-control" placeholder="Email" name="email">
            <small class="form-text">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-goup">
            <i class="fas fa-key"></i><label for="pass" class="font-weight-bold pl-2">Password</label><input type="password" class="form-control" placeholder="Password" name="password">
            </div>
            <button type="Submit" class="btn btn-outline-danger mt-5 font-weight-bold btn-block shadow-sm">Login</button>
            <?php if(isset($msg)) {echo $msg;}?>
        </form>
        <div class="text-center"><a href="http://localhost/happystationary/" class="btn btn-info mt-3 font-weight-bold shadow-sm">Back to home</a></div>
    </div>
</div>
</div>

<!-- Footer Section Begin -->
<?php include 'includes/footer.php';?>
<!-- Footer Section End -->
</body>
</html>