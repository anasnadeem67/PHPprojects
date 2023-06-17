<?php
 include 'Connection.php';
 include 'Header.php'; 

if(isset($_REQUEST['Signup'])){

       $first_name = $_REQUEST['first_name'];
       $last_name = $_REQUEST['last_name'];
       $email = $_REQUEST['email'];
       $password = $_REQUEST['password'];

  if(($_REQUEST['first_name'] == "") || ($_REQUEST['last_name'] == "") || ($_REQUEST['email'] == "") || ($_REQUEST['password'] == "")){
    $regmsg = '<div class="alert alert-warning mt-2 role="alert">All Fields are Required</div>';
       }else if (!preg_match("/^[a-zA-Z ]*$/",$first_name)) {  
        $regmsg = '<div class="alert alert-warning mt-2 role="alert">Only alphabets and white space are allowed</div>'; 
    }else if (!preg_match("/^[a-zA-Z ]*$/",$last_name)) {  
      $regmsg = '<div class="alert alert-warning mt-2 role="alert">Only alphabets and white space are allowed</div>'; 
  }
    else if(strlen($password) < 8) {
      $regmsg = '<div class="alert alert-danger mt-2 role="alert">Password must be at least 8 characters in length</div>';
     }else {

       $sql = "Select * from users where email='".$_REQUEST['email']."'";
       $result = $con->query($sql);
       if($result->num_rows==1){
       $regmsg = '<div class="alert alert-warning mt-2 role="alert">Email ID Already Registered</div>';
       } else{
       

       $sql = "INSERT INTO `users`(`first_name`, `last_name`, `email`, `passowrd`) VALUES ('$first_name','$last_name','$email','$password')";
       if($con->query($sql) == True){
          $regmsg = '<div class="alert alert-success mt-2 role="alert">Register Successfully</div>';
         } else {
          $regmsg = '<div class="alert alert-danger mt-2 role="alert">Unable to Register</div>';
         }
       }
    }

 }
 ?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Css Styles -->
    <link rel="stylesheet" href="css/custom.css" type="text/css">
</head>
<body>
    
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <span>Register</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
    <hr>

<!-- Contact Section Start -->
    <form class="Reg" action="" method="POST">
      <div class="row">
  <div class="form-group w-25">
  <p>Sign up for a free account at Happy Stationary.</p>
    <label for="first_name">First Name</label>
    <input type="text" class="form-control" id="first_name" name="first_name">
  </div>
</div>
<div class="row">
  <div class="form-group w-25">
    <label for="last_name">Last Name</label>
    <input type="text" class="form-control" id="last_name" name="last_name">
  </div>
  </div>
  <div class="row">
  <div class="form-group w-25">
    <label for="email">Your Email Address</label>
    <input type="email" class="form-control" id="email" name="email">
  </div>
  </div>
  <div class="row">
  <div class="form-group w-25">
    <label for="password">Your Password</label>
    <input type="password" class="form-control" id="password" name="password">
    <?php if(isset($regmsg)) {echo $regmsg;}?>
  </div>
  </div>
    <button type="Submit" class="action-btn" name="Signup">Create An Account</button>
</form>
<!-- Contact Section End -->

<!-- Footer Section Begin -->
<?php include 'Footer.php';?>
<!-- Footer Section End --> 
</body>
</html>