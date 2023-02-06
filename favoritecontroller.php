<?php
session_start();


$product_id = $_GET['product_id'];
include "./database/Dbcontroller.php";

// $db = new DBConnection();
$conn = $db->getConnection();



$sql = "SELECT * FROM product WHERE product_id='$product_id'";
$result = mysqli_query($conn, $sql);
// $row = mysqli_fetch_assoc($result);



    while($row = mysqli_fetch_assoc($result)) {
        $_SESSION['favorite'] []= array(
        "product_name" => $row["product_name"],
        "product_id" => $row["product_id"],
        "price" => $row["price"],
        "product_img_path" => $row["image_url"]


      );
    }


  // $_SESSION['fcounter'] ++;
  



?>