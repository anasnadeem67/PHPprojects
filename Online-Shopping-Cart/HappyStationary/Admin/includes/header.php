<!DOCTYPE html>
<html lang="zxx">

<head>
<meta charset="UTF-8">
    
    <title><?php echo TITLE ?></title>

    <!-- Font Awesome Css -->
    <script src="https://kit.fontawesome.com/932cb4677f.js" crossorigin="anonymous"></script>

    <!-- Bootstrap Css -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">

    <!-- Css Styles -->
    <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../css/custom.css" type="text/css">

</head>
<body>
    <!--- Top Navbar --->
    <nav class="navbar navbar-dark fixed-top bg-warning flex-md-nowrap p-0 shadow"><a class="navbar-brand col-sm-3 col-md-2 mr-0" href="admin_Dashboard.php">Happy Stationary</a></nav>

<!--- Side Bar --->

<!--- Container --->
<div class="container-fluid" style="margin-top:40px;">
<div class="row"> <!--- Start Row --->
<nav class="col-sm-2 bg-light sidebar py-5 d-print-none"> <!--- Start Side bar 1st Column --->
    <div class="sidebar-sticky">
<ul class="nav flex-column">
    <li class="nav-item"><a class="nav-link <?php if(PAGE == 'admin_Dashboard'){echo 'active';} ?>" href="admin_Dashboard.php"><i class="fa-solid fa-user mr-1"></i>Dashboard</a></li>
    <li class="nav-item"><a class="nav-link <?php if(PAGE == 'Category'){echo 'active';} ?>" href="Category.php"><i class="fa-solid fa-list mr-1"></i>Category</a></li>
    <li class="nav-item"><a class="nav-link <?php if(PAGE == 'Product'){echo 'active';} ?>" href="Product.php"><i class="fa-solid fa-list mr-1"></i>Product</a></li>
    <li class="nav-item"><a class="nav-link <?php if(PAGE == 'Order'){echo 'active';} ?>" href="Order.php"><i class="fa-solid fa-bars mr-1"></i>Order</a></li>
    <li class="nav-item"><a class="nav-link <?php if(PAGE == 'Employee'){echo 'active';} ?>" href="Employee.php"><i class="fa-solid fa-user mr-1"></i>Employee</a></li>
    <li class="nav-item"><a class="nav-link <?php if(PAGE == 'soldproductreport'){echo 'active';} ?>" href="soldproductreport.php"><i class="fa-solid fa-chart-simple mr-1"></i>Sale Report</a></li>
    <li class="nav-item"><a class="nav-link <?php if(PAGE == 'AdminChangePass'){echo 'active';} ?>" href="AdminChangePass.php"><i class="fa-solid fa-key mr-1"></i>Change Password</a></li>
    <li class="nav-item"><a class="nav-link <?php if(PAGE == 'Logout'){echo 'active';} ?>" href="Logout.php"><i class="fa-solid fa-right-from-bracket mr-1"></i>Log Out</a></li>
</ul>
</div>
</nav> <!--- End Side bar 1st Column --->
