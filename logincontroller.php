<?php

include "./database/Dbcontroller.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

$db = new DBConnection();
$conn = $db->getConnection();

$email = $_POST["email"];
$password = $_POST["password"];

$sql = "SELECT * FROM Customer WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
    // email and password are correct
    // do something, for example start a session
    session_start();

     $row = mysqli_fetch_assoc($result);
  
  
$_SESSION['customer_id'] = $row['customer_id'];
$_SESSION['first_name'] = $row['first_name'];
$_SESSION['last_name'] = $row['last_name'];
$_SESSION['email'] = $row['email'];
$_SESSION['role'] = $row['role'];
$_SESSION['username'] = $row['username'];


    $_SESSION["item"] = array();
   $_SESSION["favorite"] = array();


    $_SESSION["email"] = $email;
    $_SESSION["ccounter"] = 0;
    $_SESSION["fcounter"] = 0;


    $_SESSION["is_loggedin"] = true;
    $_SESSION["product_amount"] = $product_amount;

   if($_SESSION['role'] =="admin"){


       header("Location: admin/admin1.php");

   }else{

    header("Location: index.php");

   }


 

}else {
    // email and password are incorrect
    // do something, for example show an error message
    echo "Email or password is incorrect";
 }




mysqli_close($conn);
?>