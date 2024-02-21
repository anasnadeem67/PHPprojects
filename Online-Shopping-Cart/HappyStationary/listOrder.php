<?php
include 'Connection.php';
include 'header.php';



?>
<head>

</head>

<!-- Breadcrumb Begin -->
  <div class="breadcrumb-option d-print-none">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                    <span>List Order</span>
                </div>
            </div>
         </div>
    </div>
  </div>
    <!-- Breadcrumb End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row ">
                <div class="col-lg-3 col-md-3 d-print-none">
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
                                            <a>List of Orders</a>
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
        $uid = $_SESSION['uid'];
        $sql = "Select * from orders where uid = '$uid'";
        $result = $con->query($sql);

            while($row = $result->fetch_assoc()){       
        ?>

                        <!-- Contact Section Start -->
                        <div class="col-sm-6 mt-2"> 
<table class="table table-bordered ">
        <tbody>
          <tr>
            <th>order id</td>
            <td><?php echo $row['order_id']; ?></th>
            </tr>
            <tr>
            <th>Email</th>
            <td><?php echo $row['email']; ?></td>
         </tr>  
         <tr>
            <th>Number</th>
            <td><?php echo $row['number']; ?></td>
         </tr>
         <tr>
            <th>Address</th>
            <td><?php echo $row['address']; ?></td>
         </tr>
         <tr>
            <th>Date</th>
            <td><?php echo $row['date']; ?></td>
         </tr>
         <tr>
            <th>Total bill</th>
            <td><?php echo $row['totalbill']; ?></td>
         </tr>    
       </tbody>
</table>
<div class="text-center">
               <form action="" class="mb-3 d-print-none d-inline">
                   <input class="btn btn-danger" type="submit" value="Print" onClick="window.print()">
                </form>
             </div> 

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


