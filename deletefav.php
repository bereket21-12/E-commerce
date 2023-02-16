<?php
// include("./Common/header.php");
// echo "<script>
// // Remove the last entry from the browsing history
// history.go(-1);
// </script>";

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

$array = $_SESSION['favorite'];


$item_id = $_GET['product_id'];




foreach ($_SESSION['favorite'] as $outerKey => $innerArray) {
  // Loop through each inner array element
  foreach ($innerArray as $innerKey => $value) {
      // Check if the value is "value2"
      if ($value === $item_id) {
          // Remove the entire inner array
          unset($_SESSION['favorite'][$outerKey]);
          include("./deletpopup.php");
      }
  }
}





?>