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
      <form action="signup_controller.php" method="post" onsubmit="return validateForm()">
        <div class="user-details">
          <div class="input-box">
            <span class="details">First Name</span>
            <input type="text" name="firstName" placeholder="Enter your first name" pattern="[a-zA-Z]{4,15}" title="Name must be proper" required />
          </div>
          <div class="input-box">
            <span class="details">Last Name</span>
            <input type="text" name="lastName" placeholder="Enter your last name" pattern="[a-zA-Z]{4,15}" title="Name must be proper" required />
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" name="username" placeholder="Enter your username" pattern="[a-zA-Z]{4,15}" title="Username must be proper" required />
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
            <input type="password" name="password" placeholder="Enter your password" required minlength="8" />
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" name="confirmPassword" placeholder="Confirm your password" required minlength="8" />
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

  <script>
    function validateForm() {
      const password = document.getElementsByName("password")[0].value;
      const confirmPassword = document.getElementsByName("confirmPassword")[0].value;

      if (password !== confirmPassword) {
        alert("Passwords do not match!");
        return false;
      }

      return true;
    }
  </script>

</body>

</html>