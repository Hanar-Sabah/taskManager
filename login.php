<?php


//this is to redirect to https
if(empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == "off"){
    $redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $redirect);
    exit();
}


//check if user logged in or not 
if(!isset($_COOKIE["auis_auth"])) {
    echo'<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container" style="width:500px;">

<h2 class="well ">TASK MANAGER</h2>


<form method="post" action="'. $_SERVER['PHP_SELF'] .'">

   <input type="text" name="name" class="form-control"><br>
 <input type="password" name="pass" class="form-control"><br>

   <input type="submit" name="submit" value="Login" class="btn btn-primary">

   or <a href="register.php">create new account</a>


</form>
</div>

</body>
</html>
    ';



// getting login info and authentication
if(isset($_POST['submit']))

{

      $servername = "127.0.0.1";
      $username = "root";
      $password = "248624";
      $dbname = "php";

    
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
 $pass ="'".$_POST['pass']."'";
 $name =$_POST['name'];
$sql = "SELECT  password FROM auis_users where username='$name' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
 
        $hpwd=  $row["password"];
       
      

           
//compare hashed password with entered password
 if(password_verify($pass, $hpwd)){



        print "<div class='alert alert-success' role='alert'> <strong>$name</strong> You successfully logged in. </div>";
        $sql = "SELECT  userid FROM auis_users where username='$name' ";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
 
               $userid=$row["userid"];
        }
        $cookie_name = "auis_auth";
        $cookie_value = md5($userid);
        setcookie($cookie_name, $cookie_value, time() + (86400 * 14), "/");
        $sql = "UPDATE auis_users SET login_date = now() WHERE userid = $userid";
        $conn->query($sql);


         

      header("Location: index.php"); 
    exit();
          
           } 

else {
 print "<div class='alert alert-warning' role='alert'> <strong>Wrong password! </strong> Try again. </div>";
}

    }
} else {
 print "<div class='alert alert-warning' role='alert'> <strong>Wrong Username! </strong> Try again. </div>";
}
}

} else {
    header("Location: index.php"); 
    exit();
}
?>

