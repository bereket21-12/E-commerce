<?php
include "./database/Dbcontroller.php";

$db = new DBConnection();
$conn = $db->getConnection();



$category_id = $_GET['category_id'];





// error_reporting(E_ALL);
// ini_set('display_errors', 1);


$sql = "SELECT * FROM Products where category_id='$category_id '";
$result = mysqli_query($conn, $sql); 

if ($result->num_rows > 0) {

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
          $products[] = array(
            "product_id" => $row["product_id"],
            "product_name" => $row["product_name"],
            "product_description" => $row["product_description"],
            "product_img_path" => $row["image_url"],
            "category_id" => $row["category_id"],
            "price" => $row["price"]

    
          );
        }
      } else {
        echo "0 results";
      }
    }
  
  mysqli_close($conn);


?>