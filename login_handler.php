<?php
// session_start();

// Connect to the database
// include "Dbcontroller.php";
// echo "What is happening";  
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
// Check if the user has submitted the form
if (isset($_POST['username']) && isset($_POST['password'])) {
   echo "Connected Successfully!"."Oh yeahhhh! Really?  ";
   $username = $_POST['username'];
   $password = $_POST['password'];

//    // Retrieve the user data from the database
   $query = "SELECT * FROM Customer WHERE username='$username' AND password='$password'";
   $result = mysqli_query($conn, $query);

   if (mysqli_num_rows($result) == 1) {
      $user = mysqli_fetch_assoc($result);
      $_SESSION['username'] = $user['username'];
      $_SESSION['logged_in'] = true;

      header("Location: index.php");
//       exit;
   }
}
// ?>

<!-- <html>
<body>

<h1>Hello World!!</h1>

</body>
</html> -->