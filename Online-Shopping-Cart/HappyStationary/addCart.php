<?php
session_start();

if(isset($_SESSION['user'])) {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    if (!isset($_SESSION['qty_array'])) {
        $_SESSION['qty_array'] = array();
    }

    if (!in_array($_GET['id'], $_SESSION['cart'])) {
        array_push($_SESSION['cart'], $_GET['id']);
        array_push($_SESSION['qty_array'], 1);
        $_SESSION['message'] = 'Product added to the cart';
        header('location:shop-cart.php');
    } else {
        $_SESSION['message'] = 'Product already in cart';
        header('location:shop-cart.php');
    }
} else {
    header("location:login.php");
}
?>
