<?php

include "./database/Dbcontroller.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

$db = new DBConnection();
$conn = $db->getConnection();

$sql = "SELECT * FROM category";
$result = mysqli_query($conn, $sql); 

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      $catagories[] = array(
        "catagory_id" => $row["category_id"],
        "catagory_name" => $row["category_name"],
        "catagory_img_path" => $row["image_url"]

      );
    }
  } else {
    echo "0 results";
  }
  
  mysqli_close($conn);


?>