<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/signup.css">
    <title>Document</title>
</head>

<body>
  <div class="container">
    <div class="title">Signup</div>
    <div class="content">
      <form action="signup_controller.php" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">First Name</span>
            <input type="text" name="firstName" placeholder="Enter your first name" required />
          </div>
          <div class="input-box">
            <span class="details">Last Name</span>
            <input type="text" name="lastName" placeholder="Enter your last name" required />
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" name="username" placeholder="Enter your username" required />
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" name="email" placeholder="Enter your email" required />
          </div>
          <div class="input-box">
            <span class="details">Address</span>
            <input type="text" name="address" placeholder="Enter your Address" required />
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" name="password" placeholder="Enter your password" required />
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" name="confirmPassword" placeholder="Confirm your password" required />
          </div>
        </div>
        <div class="button">
          <input type="submit" name="submit" value="Signup" />
          <div class="login_link">
            <a href="./login.php">Back to Login</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</body>

</html>
