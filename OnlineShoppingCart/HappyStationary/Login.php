<?php
 include 'Connection.php';
 include 'Header.php'; 


if(isset($_REQUEST['Login'])){
  if(($_REQUEST['email'] == "") || ($_REQUEST['password'] == "")){
    $regmsg = '<div class="alert alert-warning mt-2 role="alert">All Fields are Required</div>';
    }else {
    $email = $_REQUEST['email'];
    $passowrd = $_REQUEST['password'];
    
     $sql = "Select * from users where email='".$email."' AND passowrd='".$passowrd."'";
     $result = $con->query($sql);

     if($result->num_rows == 1){
      $_SESSION['user']=$email;
      $row = mysqli_fetch_array($result);
      $_SESSION['uid']=$row['uid'];
       $_SESSION['name']=$row['first_name'].' '.$row['last_name'];
        $regmsg = '<div class="alert alert-success mt-2 role="alert">You have Successfully Login</div>';

       } else{
        $regmsg = '<div class="alert alert-warning mt-2 role="alert">Unabale to Login</div>';
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
                        <span>Login</span>
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
    <label for="email">Email Address</label>
    <input type="text" class="form-control" id="email" name="email">
  </div>
</div>
  <div class="row">
  <div class="form-group w-25">
    <label for="password">Password</label>
    <input type="Password" class="form-control" id="password" name="password">
    <?php if(isset($regmsg)) {echo $regmsg;}?>
  </div>
  </div>
    <button type="Submit" class="action-btn" name="Login">Login</button>
</form>
<!-- Contact Section End -->

<!-- Footer Section Begin -->
<?php include 'Footer.php';?>
<!-- Footer Section End -->
</body>
</html>