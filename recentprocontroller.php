<?php
$db = new DBConnection();
$conn = $db->getConnection();

$sql = "SELECT * FROM Products ORDER BY time_added DESC LIMIT 20";



$result = $conn->query($sql);

if ($result->num_rows > 0) {

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      $new_products[] = array(
        "product_id" => $row["product_id"],
        "product_name" => $row["product_name"],
        "product_description" => $row["product_description"],
        "product_img_path" => $row["image_url"],
        "category_type" => $row["category_type"],
        "category_id" => $row["category_id"]


      );
    }
  } else {
    echo "0 results";
  }

}

mysqli_close($conn);


?>