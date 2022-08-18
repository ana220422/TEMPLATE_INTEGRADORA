<?php
require_once "ShoppingCart.php";

$member_id = 2; 

$shoppingCart = new ShoppingCart();
 
$shoppingCart->updateCartQuantity($_POST["new_quantity"], $_POST["cart_id"]);
                
?>