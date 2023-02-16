<?php

// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "E-commerce3");

// Check if the form was submitted
if (isset($_POST['submit'])) {

  // Get the user ID
  $id = $_POST['id'];

  // Get the user information from the form
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $email = $_POST['email'];
  $username = $_POST['username'];
  $role = $_POST['role'];

  // Update the user information in the database
  $query = "UPDATE Customer SET first_name = '$first_name', last_name = '$last_name', email = '$email', username = '$username', role = '$role' WHERE customer_id = $id";
  $result = mysqli_query($conn, $query);

  // Check if the update was successful
  if ($result) {
    // Redirect the user to the user dashboard
    header("Location: user-dashboard.php");
  } else {
    // Show an error message
    echo "Error updating user: " . mysqli_error($conn);
  }
}

?>