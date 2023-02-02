<?php
// database connection details
$host = "localhost";
$username = "root";
$password = "";
$dbname = "E-commerce";

// create a database connection
$conn = mysqli_connect($host, $username, $password, $dbname);

// check for connection errors
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected Successfully!"."Oh yeahhhh!";
?>
