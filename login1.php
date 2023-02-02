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
        <form action="login_handler.php" method="post">
            <div class="txt_field">
                <input placeholder="Username" type="text" name="username" required>
            </div>
            <div class="txt_field">
                <input placeholder="Password" type="password" name="password" required>
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