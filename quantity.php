<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


// $data = json_decode(file_get_contents("php://input"), true);
// $newVal = $data['quantity'];

if (isset($_POST['quantity'])) {
  $quantity = $_POST['quantity'];
}

echo "The quantity is " . $quantity;




?>