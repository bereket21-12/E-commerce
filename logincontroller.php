<?php
session_start();

include "./database/Dbcontroller.php"; 

error_reporting(E_ALL);
ini_set('display_errors', 1);

// check if email and password are set
if(isset($_POST["email"]) && isset($_POST["password"])) {
  
  $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
  $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);

  $db = new DBConnection();
  $conn = $db->getConnection();

  // prepare and execute SQL statement to check user credentials
  $sql = "SELECT * FROM Customer WHERE email=?";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "s", $email);
  mysqli_stmt_execute($stmt);

  // check if a matching record was found
  $result = mysqli_stmt_get_result($stmt);
  if (mysqli_num_rows($result) == 1) {
    
    // get user details and verify password
    $row = mysqli_fetch_assoc($result);
    if (md5($password) == $row['password']) {
      $_SESSION['customer_id'] = $row['customer_id'];
      $_SESSION['first_name'] = $row['first_name'];
      $_SESSION['last_name'] = $row['last_name'];
      $_SESSION['email'] = $row['email'];
      $_SESSION['role'] = $row['role'];
      $_SESSION['username'] = $row['username'];

      // initialize session variables
      $_SESSION["item"] = array();
      $_SESSION["favorite"] = array();
      $_SESSION["ccounter"] = 0;
      $_SESSION["fcounter"] = 0;
      $_SESSION["is_loggedin"] = true;
      $_SESSION["product_amount"] = 0;

      // redirect user based on their role
      if($_SESSION['role'] =="admin"){
        header("Location: admin/admin1.php");
      } else {
        header("Location: index.php");
      }
      exit();
    }
  } 
  mysqli_stmt_close($stmt); // close prepared statement
  mysqli_close($conn); // close database connection
} 

// if login fails, redirect user back to login page
header("Location: login.php");
exit();
?>