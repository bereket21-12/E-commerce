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
   // $query = "SELECT role FROM Customer WHERE username = '$username' AND password = '$password'";
   $result = mysqli_query($conn, $query);
   // $result2 = mysqli_query($conn, $query);

   if (mysqli_num_rows($result) == 1) {

      $user = mysqli_fetch_assoc($result);
      // $row = mysqli_fetch_assoc($result2);
      $role = $user['role'];
      // Store the role in a session variable
      $_SESSION['logged_in'] = true;
      $_SESSION['username'] = $user['username'];
      $_SESSION['role'] = $role;

      if ($role == 'admin') {
         header("Location: ./admin/admin1.php");
      } else if ($role == 'customer' || $role == 'user') {
         header("Location: index.php");
      }
   } else {
      // If no match was found, show an error message
      echo "Incorrect username or password";
   }
}

?>

<!-- <html>
<body>

<h1>Hello World!!</h1>

</body>
</html> -->