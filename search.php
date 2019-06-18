<!DOCTYPE html>
<html>
<head>
	<title></title>

	<style type="text/css">
		td,th{
			border: 1px solid black;
		}
	</style>
</head>
<body>
	

	<?php 
			$servername = "127.0.0.1";
			$username = "root";
			$password = "248624";
			$dbname = "php";

			

			if($dbc = @mysqli_connect($servername, $username, $password, $dbname)){

				$tableName = "auis_tasks";
				$title =$_GET['title'];
				$description =$_GET['description'];
				$priority =$_GET['priority'];
				$due_date =$_GET['duedate'];
				$uid ="'".$_COOKIE[$cookie_name]."'";

				if (isset($_GET['title']) || isset($_GET['description']) || isset($_GET['priority']) || isset($_GET['duedate'])) {		//this comes from view.html

					print "<table>";
					print "<tr>";
					 print "<th>Task ID</th>";
				    print "<th>Title</th>";
				    print "<th>Description</th>";
				    print "<th>Due Date</th>";
				    print "<th>Priority</th>";		   
				  	print "</tr>";


				  	$q = "SELECT * FROM $tableName WHERE userid=$uid";

				  	if ($title != "") {
				  		$q = $q." AND title = '$title'";
				  		
				  	}
				  	if ($description != "") {
				  		$q = $q." AND description = '$description'";
				  	}else
				  	if ($priority != "") {
				  		$q = $q." AND priority = '$priority'";
				  	}else
				  	if ($due_date != "") {
				  		$q = $q." AND due_date = '$due_date'";
				  	}



					if($result = mysqli_query($dbc, $q)){
		                while ($row = mysqli_fetch_array($result)){
		                    print "<tr>";
		                    print "<td>".$row['task_id']."</td>";
		                    print "<td>".$row['title']."</td>";
		                    print "<td>".$row['description']."</td>";
		                    print "<td>".$row['due_date']."</td>";
		                    print "<td>".$row['priority']."</td>";
		                    print "<td>
		                    		<form action = 'deleteANDupdate.php' method = 'GET'>
		                    			<input type = 'hidden'  value='".$row['task_id']."' name= 'id'>
		                    			<input type='submit' value = 'Delete' name = 'action'>
		                    		</form>";
		                     print "<td>
		                    		<form action = 'update.php' method = 'GET'>
		                    			<input type = 'hidden'  value='".$row['task_id']."' name= 'id'>
		                    			<input type='submit' value = 'Update' name = 'action'>
		                    		</form>";
		                    print "<td>
		                    		<form action = 'add.php' method = 'GET'>
		                    			<input type = 'hidden'  value='".$row['task_id']."' name= 'id'>
		                    			<input type='submit' value = 'Link Tag' name = 'action'>
		                    		</form>";

		                   

		                    print "</tr>";
		                }
		            }
		            print "</table>";

				}

					
				
			}
		 ?>

</body>
</html>