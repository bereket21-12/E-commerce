<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['quantity'])) {
  $quantity = $_POST['quantity'];
  // Do something with the quantity value, such as updating it in the database or performing some calculations
}
  


echo "the value is ".  $quantity;


?>