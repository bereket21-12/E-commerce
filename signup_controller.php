<?php
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

?>