<?php 
$conn = mysqli_connect("localhost", "root", "", "E-commerce");

$id = $_GET['id'];

$query = "DELETE FROM Customer WHERE customer_id='$id'";
$result = mysqli_query($conn, $query);

if($result) {
  header("Location: user-dashboard.php");
} else {
  echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>