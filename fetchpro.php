<?php

include "./database/Dbcontroller.php";

$db = new DBConnection();
$conn = $db->getConnection();

$sql = "SELECT * FROM product";
$result = mysqli_query($conn, $sql); 

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      $products[] = array(
        "product_id" => $row["product_id"],
        "product_name" => $row["product_name"],
        "product_description" => $row["product_description"],
        "product_img_path" => $row["image_url"]


      );
    }
  } else {
    echo "0 results";
  }
  
  mysqli_close($conn);


?>