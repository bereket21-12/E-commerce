<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <title>Document</title>

<style>
input:invalid~ span::before{
  background-color : red;
}
input:valid~ span::before{
  border-color : green;
}
</style>

</head>
<body>
  <div class="center">
    <h1>Login</h1>
    <form method="post" action="logincontroller.php">
      <div class="txt_field">
        <input type="email" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
        <span></span>
        <label>Email</label>
      </div>
      <div class="txt_field">
        <input type="password" name="password" required minlength="8">
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
