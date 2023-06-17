<?php
session_start();
$key=array_search($GET['id'],$_SESSION['cart']);
unset($_SESSION['cart'][$key]);
unset($_SESSION['qty_array']['$Get'['index']]);
$_SESSION['qty_array']=array_values($_SESSION['qty_array']);
$_SESSION['message']="Product Deleted Successfully !";
header('location:shop-cart.php');
?>