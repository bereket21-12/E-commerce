<?php

include "./database/Dbcontroller.php";

$db = new DBConnection();
$conn = $db->getConnection();

$email = $_POST["email"];
$password = $_POST["password"];

$sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // email and password are correct
    // do something, for example start a session
    session_start();
$_SESSION["item"] = array();

    $_SESSION["email"] = $email;
    $_SESSION["counter"] = 0;

    $_SESSION["is_loggedin"] = true;
    $_SESSION["product_amount"] = $product_amount;



    header("Location: index.php");

    } else {
    // email and password are incorrect
    // do something, for example show an error message
    echo "Email or password is incorrect";
 }

mysqli_close($conn);
?>