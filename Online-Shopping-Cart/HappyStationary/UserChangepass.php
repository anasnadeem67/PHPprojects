<?php
include 'Connection.php';
include 'header.php';
?>
<head>
<title>Change Password</title>
<style>
    .Reg {
    margin-left: 10px;
    font-size: 13px;
    margin-bottom: 50px;
    width: 30%;
  }
  .Reg label {
    font-weight: bold;
  }
  .Reg .action-btn {
    background: white;
    border: 1px solid black;
    width: 200px;
    color: black;
    font-weight: bold;
    padding: 7px;
    margin-left: -13px;
  }
  .Reg .action-btn:hover {
    background: black;
    color: #fff;
  }
  @media only screen and (max-width: 980px){
    .Reg {
    margin-left: 30px;
    font-size: 12px;
  }
  .Reg .action-btn {
    width: 100%;
    position: absolute;
    margin-left: 0; 
    left: 0;
    margin-top: 25px;
  }
  .Reg {
    margin-bottom: 250px;
  }
  .Reg .row {
    margin-bottom: 30px;
  }
  .Reg .row input {
    width: 100%;
    position: absolute;
    margin-left: 0; 
    left: 0;  
  }
  .Reg .form-control, p{
    width: 500px;
      }  
  }
</style>
</head>

<!-- Breadcrumb Begin -->
  <div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                    <span>Pofile</span>
                </div>
            </div>
         </div>
    </div>
  </div>
    <!-- Breadcrumb End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="shop__sidebar">
                        <div class="sidebar__categories">
                            <div class="section-title">
                                <h4>Profile</h4>
                            </div>
                            <div class="categories__accordion">
                                <div class="accordion" id="accordionExample">
                                <div class="card">
                                        <div class="card-heading active">
                                            <a href="MyAcount.php">My Account</a>
                                        </div>
                                    </div>
                                <div class="card">
                                        <div class="card-heading active">
                                            <a href="listOrder.php">List of Orders</a>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-heading active">
                                        <a href="wishlist.php">Wishlist</a>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-heading active">
                                            <a href="UpdateAccount.php">Update Account</a>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-heading active">
                                            <a href="UserChangepass.php">Change Password</a>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
                
                <?php
$user = $_SESSION['user']; 
if(isset($_REQUEST['propass'])){
    if(($_REQUEST['passowrd'] == "")){
        // msg displayed if required field missing
        $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Password Fields is Required </div>'; 
    } else{
        $sql = "Select * from user where email = '$user'";
        $result = $con->query($sql);
        
            $passowrd = $_REQUEST['passowrd'];
           $sql = "Update users set passowrd = '$passowrd' where email = '$user'";
            if($con->query($sql) == TRUE){
                
                $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated Successfully </div>';
            }else{
                
                $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2 role="alert"> Unabale to Update </div>';
            }
        
    }
}
    ?>
                
<!-- Contact Section Start -->
<form class="Reg">
  <div class="row">
  <div class="form-group w-75">
  <p>Update Your Password.</p>
    <label for="email">Your Email Address</label>
    <input type="email" class="form-control" id="email" name="email" value="<?php echo $user ?>" readonly>
  </div>
  </div>
  <div class="row">
  <div class="form-group w-75">
    <label for="passowrd">Password</label>
    <input type="text" class="form-control" id="passowrd" name="passowrd">
  </div>
</div>
    <button type="Submit" class="action-btn" name="propass">Update</button>
    <?php if(isset($passmsg)) {echo $passmsg;} ?>
</form>
<!-- Contact Section End -->                 
                    
            </div>
        </div>
    </section>
    <!-- Shop Section End -->

<!-- Footer Section Begin -->
<?php include 'Footer.php';?>
<!-- Footer Section End -->