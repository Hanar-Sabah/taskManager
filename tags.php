<!DOCTYPE html>
<html>
 <head>
  

  </head>
<body>


	<?php 

		$servername = "127.0.0.1";
		$username = "root";
		$password = "248624";
		$dbname = "php";

			

		if($dbc = @mysqli_connect($servername, $username, $password, $dbname)){

			if ($_GET['action'] == "Link") {				//this comes from add.php
				 $task_id ="'".$_GET['task_id']."'";
				 $tag_id ="'".$_GET['tag_id']."'";

				 $q = "INSERT INTO middleTable (task_id, tag_id) VALUES ($task_id, $tag_id)";
				 mysqli_query($dbc, $q);
							
			}
		}

	 ?>

</body>
</html>