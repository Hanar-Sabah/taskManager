<?php
$cookie_name = "auis_auth";
if(!isset($_COOKIE[$cookie_name])) {
    echo '

<html>
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap Template</title>

    <!-- Bootstrap (CDN) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  </head>
<body>

	<div class="container">
	<h2 class="well ">TASK MANAGER </h2>	
	<a href="login.php" class="btn btn-primary">Login</a> 
	</div>
</body>
</html>
';} 
else {
echo '

<html>
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap Template</title>

    <!-- Bootstrap (CDN) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  </head>
<body>

<div class="container">
		
</div>
	<div class="container">
	<h2 class="well ">TASK MANAGER <form method="GET" action="add.php" >
					
				    <input type="submit" value="logout" name="action" class="btn btn-primary" style="float:right;">

				</form></h2>
		<div class="navbar-default sticky-top">

	      <ul class="nav navbar-nav">
	      
	      
	        <li class="active"><a href="index.php">Create</a></li>
	        <li><a href="view.html">View</a></li>
	        <li><a href="summary.php">Summary</a></li>
	      </ul>
		</div>

		<br>
		<br>
		<div class="row">
			<div class="col-xs-12 ">
				<form action="add.php" method="GET">
<h3>
					NEW TASK
	
</h3>
					<p>Title</p><input type="text" name="title" class="form-control" required><br/>
					<p>Description</p><input type="text" name="description" class="form-control" required><br/>
					<p>Schedule Date</p><input type="date" name="scheduledate" class="form-control" required><br/>
					<p>Due Date</p><input type="date" name="duedate" class="form-control" required><br/>
					<p>Priority</p	>
					<select name="priority" required class="form-control">
						<option value="">None</option>
						<option name="A">A</option>
						<option name="B">B</option>
						<option name="C">C</option>
					</select><br/>
					
					<br>
					<input type="submit" value="Add" name="action" class="btn btn-primary">
					
				</form>
			</div>

			<div class="col-sm-12">
			<hr>
				<form action="add.php" method="GET">
					<h3>NEW TAG</h3><input type="text" name="tag" class="form-control" required>
					<br>
					<br>
					<input type="submit" value="Add Tag" name="action" class="btn btn-primary">
			

				</form>


				
			</div>
			
		</div>
	</div>


	
		

</body>
</html>
';

}
?>

