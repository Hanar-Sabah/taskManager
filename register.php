<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<!--got this from w3schhols templates-->
<div class="container">
<h2 class="well ">TASK MANAGER</h2>

  <h3>Register </h3>
  <hr>
  <form action="add.php" method="POST">
  <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" required>
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" required>
    </div>
     <div class="form-group">
      <label for="pwd">Confirm Password</label>
      <input type="password" class="form-control" id="cpwd" placeholder="Confirm password" name="cpwd" required>
    </div>
    
    <button type="submit" value="register" name="action" class="btn btn-default">Register</button>
    
     <a href="login.php"  class="btn btn-primary">Login</a>
    
  </form>
</div>

</body>
</html>

