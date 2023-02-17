<?php

// include "./database/Dbcontroller.php";

$db = new DBConnection();
$conn = $db->getConnection();

if (isset($_GET["search"])) {

  $search_term = $_GET["search"];

  $sql = "SELECT * FROM Products WHERE product_name LIKE '%$search_term%'";


} 
else {

  $sql = "SELECT * FROM Products";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      $products[] = array(
        "product_id" => $row["product_id"],
        "product_name" => $row["product_name"],
        "product_description" => $row["product_description"],
        "product_img_path" => $row["image_url"],
        "category_type" => $row["category_type"],
        "category_id" => $row["category_id"],
        "price" => $row["price"]



      );
    }
  } else {
    echo "0 results";
  }
}else{

 echo'<div class="container-fluid pt-5 pb-3">
 <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">NO Products found </span></h2>
 ';

}
  mysqli_close($conn);


?>