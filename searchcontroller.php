<?php
include "./database/Dbcontroller.php";
include("./Common/header.php");
include("./Common/navbar.php");


// $db = new DBConnection();
// $conn = $db->getConnection();

error_reporting(E_ALL);
ini_set('display_errors', 1);

    $search_term = $_GET["search"];





include("./featured_products.php");



// if (isset($_GET["search"])) {

//     $search_term = $_GET["search"];

//     $sql = "SELECT * FROM product WHERE product_name LIKE '%$search_term%'";


//   } else {

//     $sql = "SELECT * FROM product";
//   }

//   $result = $conn->query($sql);

//   // Check if there are any results
//   if ($result->num_rows > 0) {
//     // Loop through the results and display them in a card

//     while($row = $result->fetch_assoc()) {
//     //   echo "<div >";
//     //   echo "<div >" . $row["product_name"] . "</div>";
//     //   echo "<div >" . $row["product_description"] . "</div>";
//     //   echo "<div>$" . $row["price"] . "</div>";
//     //   echo "</div>";
//     include("./searchdisplay.php");


    

//     }
//   } else {
//     echo "No products found.";
//   }

//   // Close the connection
//   $conn->close();

  include("./Common/footer.php");
?>


