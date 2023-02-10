<?php
include "./database/Dbcontroller.php";

$db = new DBConnection();
$conn = $db->getConnection();



$category_id = $_GET['category_id'];





error_reporting(E_ALL);
ini_set('display_errors', 1);


$sql = "SELECT * FROM Categories";
$result = mysqli_query($conn, $sql); 

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      $catagories[] = array(
        "category_id" => $row["category_id"],
        "category_name" => $row["category_name"],
        "product_quantity" => $row["product_quantity"]

      );
    }
  } else {
    echo "0 results";
  }
  
  mysqli_close($conn);


?>