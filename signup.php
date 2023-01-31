
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/signup.css">
  <title>Sign Up</title>
</head>
<body>
  <div class="container mt-5">
    <h2 class="text-center">Sign Up</h2>
    <form  method ="post" action="./signup_controller.php">
      <div class="form-group">
        <label for="fname">First Name</label>
        <input name ="fname" type="text" class="form-control" id="firstName" placeholder="Enter First Name">
      </div>
      <div class="form-group">
        <label for="lname">Last Name</label>
        <input name = "lname" type="text" class="form-control" id="lastName" placeholder="Enter Last Name">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input name= "email" type="email" class="form-control" id="email" placeholder="Enter Email">
      </div>
      <div class="form-group">
        <label for="password" autocomplete="off">Password</label>
        <input name = "password" type="password" class="form-control" id="password" placeholder="Enter Password">
      </div>
      <div class="form-group">
        <label for="confirmPassword">Confirm Password</label>
        <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password">
      </div>
      <div class="form-group">
        <label for="address">Address</label>
        <input name = "address" type="text" class="form-control" id="lastName" placeholder="Enter Last Name">
      </div><div class="form-group">
        <label >Phone No.</label>
        <input name = "phone" type="tel" class="form-control" id="phone" placeholder="Enter Phone number">
      </div>
      <button type="submit" class="btn btn-primary btn-block">Submit</button>
    </form>
  </div>
</body>
</html>
