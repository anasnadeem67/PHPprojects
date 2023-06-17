<?php
include 'Connection.php';
include 'header.php';
?>
<head>
<title>Pofile</title>
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
        $sql = "Select * from users where email = '$user'";
        $result = $con->query($sql);

            while($row = $result->fetch_assoc()){       
        ?>

                        <!-- Contact Section Start -->
                        <div class="col-sm-6 mt-2"> 
<table class="table table-bordered">
        <tbody>
          <tr>
            <th>Name</td>
            <td><?php echo $row['first_name']." ".$row['last_name'];; ?></th>
            </tr>
            <tr>
            <th>Email</th>
            <td><?php echo $row['email']; ?></td>
         </tr>      
       </tbody>
</table>

</div>
<!-- Contact Section End -->
<?php } ?>

                        
                    
            </div>
        </div>
    </section>
    
    <!-- Shop Section End -->

<!-- Footer Section Begin -->
<?php include 'Footer.php';?>
<!-- Footer Section End -->