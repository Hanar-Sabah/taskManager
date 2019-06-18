<!DOCTYPE html>
<html>
<head>
	<title></title>

</head>
<body>
	

	<?php 
			$servername = "127.0.0.1";
			$username = "root";
			$password = "248624";
			$dbname = "php";

			

			if($dbc = @mysqli_connect($servername, $username, $password, $dbname)){


				$tableName = "auis_tasks";
					

				if ($_GET['action'] == 'Delete') {		//this comes from search.php
					
					$task_id ="'".$_GET['id']."'";
					$q = "DELETE FROM $tableName WHERE task_id = $task_id";
					mysqli_query($dbc, $q);
				}



				if ($_GET['action'] == 'Update') {		//this comes from search.php

					$task_id ="'".$_GET['id']."'";

					$title ="'".$_GET['title']."'";
					$description ="'".$_GET['description']."'";
					$schedule_date ="'".$_GET['scheduledate']."'";
					$due_date ="'".$_GET['duedate']."'";
					$priority ="'".$_GET['priority']."'";

					$q = "UPDATE $tableName SET title = $title, description = $description, schedule_date = $schedule_date, due_date = $due_date, priority = $priority WHERE task_id = $task_id";

					mysqli_query($dbc, $q);

					
				}
			} //-----------------------------

	?>

</body>
</html>