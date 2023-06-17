<?php
include 'Connection.php';
?>

<?php

    if(isset($_GET['id']))
    {
    $pro_id = $_GET['id'];
    $del_wishlist = "Delete from wishlist where product_id = $pro_id";
    if($con->query($del_wishlist) == True){
        header('location:wishlist.php');
    } else{
        echo "Unabale to Delete Data";
    }
    }

?>