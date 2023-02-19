<?php
session_start();
$array1 = array_unique($_SESSION['item'], SORT_REGULAR);
$array = array_unique($_SESSION['item'], SORT_REGULAR);

$cartItems = [];

foreach ($array as $product) {
    $cartItem = [
        "itemId" => $product["product_id"],
        "itemName" => $product["product_name"],
        "unitPrice" => $product["price"],
        "quantity" => 1,
    ];
    $cartItems[] = $cartItem;
}

print_r($cartItems);
?>