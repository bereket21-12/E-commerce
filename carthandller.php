<?php
session_start();


$product_id = $_GET['product_id'];
include "./database/Dbcontroller.php";

$db = new DBConnection();
$conn = $db->getConnection();



$sql = "SELECT * FROM product WHERE product_id='$product_id'";
$result = mysqli_query($conn, $sql);
// $row = mysqli_fetch_assoc($result);



    while($row = mysqli_fetch_assoc($result)) {
        $_SESSION['item'] []= array(
        "product_name" => $row["product_name"],
        "price" => $row["price"],
        "product_img_path" => $row["image_url"]


      );
    }


  $_SESSION['counter'] ++;
  $sessionArray = $_SESSION['item'];


//   foreach (  $sessionArray as $value) {

//     echo $value["product_name"];
//     echo $value["price"];
//     echo $value["product_img_path"];

//   }

// $_SESSION["product_name"] = $row['product_name'];
// $_SESSION["price"] = $row['price'];
// $_SESSION["product_quantity"] = 3;

// $_SESSION["item"] []= $_SESSION["product_name"];
// $_SESSION["item"] []= $_SESSION["price"];
// $_SESSION["item"] []= $_SESSION["product_quantity"];
// echo $product_id;





// echo "your cart list ".$_SESSION["item"][0];
// echo "your cart list ".$_SESSION["item"][1];
// echo "your cart list ".$_SESSION["item"][2];
// echo "your cart list ".$_SESSION["item"][3];
// echo "your cart list ".$_SESSION["item"][4];
// echo "your cart list ".$_SESSION["item"][5];
// echo "your cart list ".$_SESSION["item"][6];






?>