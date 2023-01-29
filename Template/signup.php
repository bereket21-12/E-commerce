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
    <form>
      <div class="form-group">
        <label for="firstName">First Name</label>
        <input type="text" class="form-control" id="firstName" placeholder="Enter First Name">
      </div>
      <div class="form-group">
        <label for="lastName">Last Name</label>
        <input type="text" class="form-control" id="lastName" placeholder="Enter Last Name">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" placeholder="Enter Email">
      </div>
      <div class="form-group">
        <label for="password" autocomplete="off">Password</label>
        <input type="password" class="form-control" id="password" placeholder="Enter Password">
      </div>
      <div class="form-group">
        <label for="confirmPassword">Confirm Password</label>
        <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password">
      </div>
      <div class="form-group">
        <label for="lastName">Address 1</label>
        <input type="text" class="form-control" id="lastName" placeholder="Enter Last Name">
      </div><div class="form-group">
        <label for="lastName">Address 2</label>
        <input type="text" class="form-control" id="lastName" placeholder="Enter Last Name">
      </div><div class="form-group">
        <label for="lastName">Address 3</label>
        <input type="text" class="form-control" id="lastName" placeholder="Enter Last Name">
      </div>
      <button type="submit" class="btn btn-primary btn-block">Submit</button>
    </form>
  </div>
</body>
</html>
