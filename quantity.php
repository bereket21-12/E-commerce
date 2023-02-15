<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// session_start();

// $quantity = $_GET['quantity'];

// echo "value  is ".$quantity ."</br>"; 

// foreach($_SESSION['item'] as $item ){

//     $_SESSION['item']['quantity'] = $quantity;

   
//     print_r($_SESSION['item'])."</br>"; 

// }

// $quantity = $_POST["quantity"];
// Do something with the new quantity value, such as updating it in a database
// echo "the value ". $quantity;

if (isset($_POST['qu'])) {
    $quantity = $_POST['qu'];
    if ($quantity == null) {
      echo "null";
    }else{
        echo "success";
    }
    // use $quantity in your code
  }
  


echo "the value is ".  $quantity;


?>