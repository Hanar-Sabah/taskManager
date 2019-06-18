<!DOCTYPE html>
<html>
<head>
	<title></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style type="text/css">
		td,th{
			border: 1px solid black;
		}
	</style>
</head>
<body>
<div class="container">
<h2 class="well ">TASK MANAGER</h2>

			<?php 
			$servername = "127.0.0.1";
			$username = "root";
			$password = "248624";
			$dbname = "php";


			//check if the user is logged in
			$cookie_name = "auis_auth";
			if(!isset($_COOKIE[$cookie_name])) {
    			echo "You are not logged in <a href='login.php'  class='btn btn-primary'>Login</a>";
			} else {
    			echo "You are logged in ";
    		}


			if($dbc = @mysqli_connect($servername, $username, $password, $dbname)){
				

//reset the cookie when user logges out
				if ($_GET['action'] =="logout"){
 				


				setcookie("auis_auth", "", time() - (86400 * 15), "/");
				print "<div class='alert alert-secondary' role='alert'> <strong>You have logged out!</strong> <a href='login.php' class='alert-link'>Login again</a> .</div>";
					


			}




				// New Account 
				if ($_POST['action'] =="register"){
					$q = "CREATE TABLE IF NOT EXISTS auis_users(
					userid int PRIMARY KEY AUTO_INCREMENT,
					username VARCHAR(30),
					password VARCHAR(100),
					email VARCHAR(30),
					login_date datetime)";
					mysqli_query($dbc, $q);
					
					$name ="'".$_POST['name']."'";
					$email ="'".$_POST['email']."'";
					$password ="'".$_POST['pwd']."'";
					$confirmpassword ="'".$_POST['cpwd']."'";

					//hashing the password
					$hashed_password ="'". password_hash($password, PASSWORD_DEFAULT)."'";



					// checking both passowrds - validation
					if($password!= $confirmpassword){      		

         			print "<div class='alert alert-warning' role='alert'> <strong>Validation!</strong> The password dont match <a href='register.php' class='alert-link'>Try again</a> .</div>";
					
    				}
					if($password== $confirmpassword){
					$q = "INSERT INTO auis_users( username, password, email, login_date) VALUES ( $name, $hashed_password, $email, now())";
					mysqli_query($dbc, $q);

					 print "<div class='alert alert-success' role='alert'> <strong>Success!</strong> You successfully registered. <a href='login.php' class='alert-link'>login</a></div>";
					
			}

				}

				//adding a new task and giving it to the users
				if ($_GET['action'] == "Add") {

					$q = "CREATE TABLE IF NOT EXISTS auis_tasks(
					task_id int PRIMARY KEY AUTO_INCREMENT,
					title VARCHAR(30),
					description VARCHAR(100),
					schedule_date datetime,
					due_date datetime,
					priority VARCHAR(1),
					userid VARCHAR(100))";

					mysqli_query($dbc, $q);

					$title ="'".$_GET['title']."'";
					$description ="'".$_GET['description']."'";
					$schedule_date ="'".$_GET['scheduledate']."'";
					$due_date ="'".$_GET['duedate']."'";
					$priority ="'".$_GET['priority']."'";
					$uid ="'".$_COOKIE[$cookie_name]."'";

					$q = "INSERT INTO auis_tasks (task_id, title, description, schedule_date, due_date, priority, userid) VALUES (NULL, $title, $description, $schedule_date, $due_date, $priority, $uid)";
					mysqli_query($dbc, $q);
					print "<div class='alert alert-success' role='alert'> <strong>You have inserted task!</strong> <a href='index.php' class='alert-link'>Add another task </a> .</div>";
					

				}
				

				if ($_GET['action'] == "Add Tag") {  //this comes from index.php

					$tag ="'".$_GET['tag']."'";
					$uid ="'".$_COOKIE[$cookie_name]."'";
					$q = "CREATE TABLE IF NOT EXISTS auis_tags(
					tag_id int PRIMARY KEY AUTO_INCREMENT,
					tags VARCHAR(15) NOT NULL,
					userid VARCHAR(100))";

					mysqli_query($dbc, $q);

					$q = "INSERT INTO auis_tags (tag_id, tags,userid) VALUES (NULL, $tag, $uid)";
					mysqli_query($dbc, $q);

					print "<div class='alert alert-success' role='alert'> <strong>You have inserted tag!</strong> <a href='index.php' class='alert-link'>Add another tag </a> .</div>";
					
				}
				else if ($_GET['action'] == "Link Tag") {		//this comes from search.php

					 $task_id =$_GET['id'];
					 $cookie_name = "auis_auth";
					 $uid ="'".$_COOKIE[$cookie_name]."'";
					$q = "CREATE TABLE IF NOT EXISTS middleTable(
					task_id int,
					tag_id int,
					userid VARCHAR(100), 
					FOREIGN KEY (task_id) REFERENCES auis_tasks(task_id),
					FOREIGN KEY (tag_id) REFERENCES auis_tags(tag_id))";

					mysqli_query($dbc, $q);



					$q = "SELECT * FROM auis_tags where userid=".$uid ;

					print "<table>";
					print "<tr>";
					print "<th>Tag ID</th>";
				    print "<th>Tags</th>";
				    print "</tr>";
					if($result = mysqli_query($dbc, $q)){
		                while ($row = mysqli_fetch_array($result)){
		                    print "<tr>";
		                    print "<td>".$row['tag_id']."</td>";
		                    print "<td>".$row['tags']."</td>";
		                	print "</tr>";
		                }
		            }

		            print "</table>";



		            print " <form action = 'tags.php' method = 'GET'>
		            			<input type = 'hidden'  value='$task_id' name= 'task_id'>
	                			Input The Appropriate ID:<input type = 'text' name= 'tag_id'>
	                			<input type='submit' value = 'Link' name = 'action'>
                			</form>";
                 	print "<td>";

					
				}

				

			}



	?>
</div>
</body>
</html>