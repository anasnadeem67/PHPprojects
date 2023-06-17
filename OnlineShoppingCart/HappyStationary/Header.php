<?php
session_start();
if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
    $_SESSION['t']=0;
  }
include 'Connection.php';?>

<!DOCTYPE html>
<html lang="zxx">
<head>
<!-- Font Awesome Css -->
<script src="https://kit.fontawesome.com/932cb4677f.js" crossorigin="anonymous"></script>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__close">+</div>
        <ul class="offcanvas__widget">
            <li><span class="icon_search search-switch"></span></li>
            <li><a href="#"><span class="icon_heart_alt"></span>
                <div class="tip">2</div>
            </a></li>
            <li><a href="shop-cart.php"><span class="icon_bag_alt"></span>
                <div class="tip"><?php if(isset($_SESSION['cart'])){ echo count($_SESSION['cart']); }else { echo '0';} ?></div>
            </a></li>
        </ul>
        <div class="offcanvas__logo">
            <a href="./index.php"><img src="img/logo.png" alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__auth">
            <a href="Login.php">Login</a>
            <a href="Register.php">Register</a>
            <?php if(isset($_SESSION["user"])) {?>
             <?php echo $_SESSION["name"]; ?><br><a href="MyAcount.php"><small>My Account</small></a>
             <?php } else {?>
             <a href="login.php"><span class="fas fa-user"></span> </a>
             <?php  } ?><br>
             <a href="logout.php"><span class="fas fa-sign-out-alt"></span></a>
           
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header d-print-none">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-2">
                    <div class="header__logo">
                        <a href="./index.php"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-7">
                <nav class="header__menu">
                    <?php $page=basename($_SERVER['PHP_SELF']); ?>
                        <ul>
                            <li class="<?php if($page == 'index.php'):echo 'active';endif; ?>"><a href="./index.php">Home</a></li>
                            <li class="<?php if($page == 'Categories.php'):echo 'active';endif; ?>"><a href="Categories.php">Categories</a>
                                <ul class="dropdown">
                                <?php
                                $sql = "Select * from category";
                                $result = $con->query($sql);
                                if($result->num_rows > 0){
                                    while($row = $result->fetch_assoc()){
                                        
                                        ?>
                            <li><a href="Category_dt.php?Cate_id=<?php echo $row['Cate_id']; ?>"><?php echo $row['Cate_name']; ?></a></li>
                            <?php }} ?>
                                </ul> 
                            </li>
                            <li class="<?php if($page == 'About.php'):echo 'active';endif; ?>"><a href="About.php">About</a></li>
                            <li class="<?php if($page == 'contact.php'):echo 'active';endif; ?>"><a href="./contact.php">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__right">
                    <?php if(!isset($_SESSION["user"])) {?>
                        <div class="header__right__auth">
                            <a href="Login.php">Login</a>
                            <a href="Register.php">Register</a>
                        </div>
                        <?php } ?>
                        <ul class="header__right__widget">
                            <li><span class="icon_search search-switch"></span></li>
                            <li><a href="wishlist.php"><span class="icon_heart_alt"></span>
                                <div class="tip">0</div>
                            </a></li>
                            <li><a href="shop-cart.php"><span class="icon_bag_alt"></span>
                                <div class="tip"><?php if(isset($_SESSION['cart'])){ echo count($_SESSION['cart']); }else { echo '0';} ?></div>
                            </a></li>
                            <?php if(isset($_SESSION["user"])) {?>
                            <li><a href="logout.php"><span class="fas fa-sign-out-alt"></span> 
                            </a></li>
                            <?php echo $_SESSION["name"]; ?><li><a href="MyAcount.php"><small>My Account</small> 
                            </a></li>
                            <?php } else {?>
                            <li><a href="login.php"><span class="fas fa-user"></span> 
                            </a></li>
                            <?php  } ?>
                           
                        </ul>
                    </div>
                </div>
            </div>
            <div class="canvas__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
</body>
</html>