<?php
// echo "<script>
// // Remove the last entry from the browsing history
// history.go(-1);
// </script>";

session_start();


$product_id = $_GET['product_id'];
include "./database/Dbcontroller.php";

$db = new DBConnection();
$conn = $db->getConnection();



$sql = "SELECT * FROM Products WHERE product_id='$product_id'";
$result = mysqli_query($conn, $sql);
// $row = mysqli_fetch_assoc($result);



    while($row = mysqli_fetch_assoc($result)) {
        $_SESSION['item'] []= array(
        "product_name" => $row["product_name"],
        "price" => $row["price"],
        "product_img_path" => $row["image_url"],
        "product_id" => $row["product_id"]

      );
    }
    


    // foreach ($_SESSION['favorite'] as $outerKey => $innerArray) {
    //     // Loop through each inner array element
    //     foreach ($innerArray as $innerKey => $value) {
    //         // Check if the value is "value2"
    //         if ($value === $product_id) {
    //             // Remove the entire inner array
    //             unset($_SESSION['favorite'][$product_id]);
    //         }
    //     }
    //   }
    include("./addpopup.php");
    include("./deletefav.php");
    


?>