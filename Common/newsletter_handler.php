<?php
// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the email address from the form data
  $email = $_POST['email'];

  // Validate the email address
  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // Store the email address in a database or send an email
    // Confirm the subscription
  } else {
    // Return an error message
  }
}
?>
