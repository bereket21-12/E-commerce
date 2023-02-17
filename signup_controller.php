<?php
//this will display the error message if there is any 
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "./database/Dbcontroller.php";

$db = new DBConnection();
$conn = $db->getConnection();
if (isset($_POST['submit'])) {

   $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirmPassword'];
    
   $sql = "INSERT INTO Customer (first_name,last_name,email,password,address,confirmed,username) VALUES (?,?,?,?,?,?,?)";
    
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss",$firstName, $lastName, $email ,$password,$address, $confirmPassword, $username);

    if($stmt->execute()){
        echo "Information submitted successfully";
        session_start();
        $_SESSION["email"] = $email;
        header("Location: login.php");
    } else{
        echo "Error: " . $stmt->error;
    }
    
    }
    
    mysqli_close($conn);

?>
