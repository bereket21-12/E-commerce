<?php
session_start();

$host = "localhost";
$username = "root";
$password = "";
$dbname = "E-commerce";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['username']) && isset($_POST['password'])) {
   // echo "Connected Successfully!"."Oh yeahhhh! Really?  ";
   $username = $_POST['username'];
   $password = $_POST['password'];

   $query = "SELECT * FROM Customer WHERE username='$username' AND password='$password'";
   $result = mysqli_query($conn, $query);

   if (mysqli_num_rows($result) == 1) {

      $user = mysqli_fetch_assoc($result);
      $role = $user['role'];

      $_SESSION['logged_in'] = true;
      $_SESSION['username'] = $user['username'];
      $_SESSION['role'] = $role;

      if ($role == 'admin') {
         header("Location: ./admin/admin1.php");
      } else if ($role == 'customer' || $role == 'user') {
         header("Location: index.php");
      }
   } else {
      echo "Incorrect username or password";
   }
}
?>
