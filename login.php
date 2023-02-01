<!-- php
session_start();

// Connect to the database
$connection = mysqli_connect("localhost", "user", "password", "database");

// Check if the user has submitted the form
if (isset($_POST['email']) && isset($_POST['password'])) {
   // Get the values from the form
   $email = mysqli_real_escape_string($connection, $_POST['email']);
   $password = mysqli_real_escape_string($connection, $_POST['password']);

   // Retrieve the user data from the database
   $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
   $result = mysqli_query($connection, $query);

   // Check if the user exists
   if (mysqli_num_rows($result) == 1) {
      // User exists, set the session variables
      $user = mysqli_fetch_assoc($result);
      $_SESSION['email'] = $user['email'];
      $_SESSION['logged_in'] = true;

      // Redirect the user to the protected page
      header("Location: index.php");
      exit;
   }
}
 -->

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="./css/login.css">
   <title>Document</title>
</head>

<body>
   <div class="center">
      <h1>Login </h1>
      <form method="post" action="">
         <div class="txt_field">
            <input type="text" name="email" required>
            <span></span>
            <label>Username</label>
         </div>
         <div class="txt_field">
            <input type="password" name="password" required>
            <span></span>
            <label>Password</label>
         </div>
         <div class="pass">Forgot Password?</div>
         <input type="submit" value="Login">
         <div class="signup_link">
            Not a member? <a href="./signup.php">Signup</a>
         </div>
      </form>
   </div>
</body>

</html>