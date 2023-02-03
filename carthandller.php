<?php
$procuct_id = $_GET['product_id'];

include "./database/Dbcontroller.php";
session_start();

$db = new DBConnection();
$conn = $db->getConnection();



class Cart {

    public $product_name;
    public $price;
    // public $product_quantity;

 
}


// $cart_array = array();

$sql = "SELECT * FROM product WHERE product_id=' $product_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$_SESSION["product_name"] = $row['product_name'];
$_SESSION["price"] = $row['price'];
// $_SESSION["product_quantity"] = $row['product_quantity'];


echo "your cart list ".$row['product_name'];



?>
<div><?php $row['product_name'];?></div>