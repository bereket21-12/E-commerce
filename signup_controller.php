<!-- ?php
//this will display the error message if there is any 
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "./database/Dbcontroller.php";

$db = new DBConnection();
$conn = $db->getConnection();


    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $phone_number =$_POST['phone'];
    
    $sql = "INSERT INTO user (fname,lname,email,password,address,phone_number) 
    VALUES (?,?,?,?,?,?)";
    
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $fname, $lname, $email ,$password,$address,$phone_number);

    if($stmt->execute()){
        echo "Information submitted successfully";
        session_start();
        $_SESSION["email"] = $email;
        header("Location: login.php");
    } else{
        echo "Error: " . $stmt->error;
    }
    
    mysqli_close($conn);

? -->

<?php

if (isset($_POST['submit'])) {
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirmPassword'];
//   include "Dbcontroller.php";
$host = "localhost";
$username = "root";
$password = "";
$dbname = "E-commerce";

// create a database connection
$conn = mysqli_connect($host, $username, $password, $dbname);
  // Perform validation and sanitization of input data
  echo "Does it work?";
  // Check if passwords match
  if ($password != $confirmPassword) {
    // Return error message
  }
  
  // Hash password for security
  $password = password_hash($password, PASSWORD_DEFAULT);
  
  // Insert data into database
  $sql = "INSERT INTO Customer (first_name, last_name, email, password, address, role, confirmed, username) VALUES ('$firstName', '$lastName', '$email', '.md5($password)', '$address', 'user', '0','$username' )";
//   $sql = "INSERT INTO Customer (first_name, last_name, username, email, address, password)
//           VALUES ('$firstName', '$lastName', '$username', '$email', '$address', '$password')";
  if ($conn->query($sql) === TRUE) {
    // Redirect to login page
    header("Location: login1.php");
  } else {
    // Return error message
  }
}

?>
