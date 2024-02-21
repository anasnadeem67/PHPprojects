<?php
session_start();

if(isset($_GET['id'])) {
    $id = $_GET['id']; 

    if(isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
        $key = array_search($id, $_SESSION['cart']);

        if($key !== false) {
            unset($_SESSION['cart'][$key]); 
            unset($_SESSION['qty_array'][$key]); 
            $_SESSION['qty_array'] = array_values($_SESSION['qty_array']); 
            $_SESSION['message'] = "Product Deleted Successfully!";
        }
    }
}

header('location: shop-cart.php');
exit(); 
?>
