<?php 
$conn = mysqli_connect("localhost", "root", "", "E-commerce3");

$id = $_GET['id'];

$query = "DELETE FROM Products WHERE product_id='$id'";
$result = mysqli_query($conn, $query);

if($result) {
  header("Location: admin1.php");
} else {
  echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>