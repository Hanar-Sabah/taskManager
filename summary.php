<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap Template</title>

    <!-- Bootstrap (CDN) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


    <style type="text/css">
		td,th{
			border: 1px solid black;
		}
	</style>
  </head>
<body>
	<div class="container">
		<div class="navbar-default sticky-top">
	      <ul class="nav navbar-nav">
	        <li><a href="index.php">Create</a></li>
	        <li><a href="view.html">View</a></li>
	        <li class="active"><a href="summary.php">Summary</a></li>
	      </ul>
		</div>

		<br>
		<br>
		<br>
		<br>
		<br>
		<div>
			<?php 
				$servername = "127.0.0.1";
				$username = "root";
				$password = "248624";
				$dbname = "php";

			

				if($dbc = @mysqli_connect($servername, $username, $password, $dbname)){

					$q = "SELECT COUNT(title), priority FROM auis_tasks GROUP BY priority ORDER BY priority";

					print "<table>";
					print "<tr>";
				    print "<th>Priority</th>";
				    print "<th>Count</th>";		   
				  	print "</tr>";
					if($result = mysqli_query($dbc, $q)){
		                while ($row = mysqli_fetch_array($result)){
		                    print "<tr>";
		                    print "<td>".$row['priority']."</td>";
		                    print "<td>".$row['COUNT(title)']."</td>";
		                    print "</tr>";
		                }
		            }
		            print "</table>";



		            


		            print "<br>";
		            print "<br>";
		            print "<br>";

		            $q = "SELECT COUNT(middleTable.task_id), auis_tags.tags FROM auis_tags RIGHT JOIN middleTable ON middleTable.tag_id = auis_tags.tag_id GROUP BY auis_tags.tags ORDER BY auis_tags.tags";

					print "<table>";
					print "<tr>";
				    print "<th>Tags</th>";
				    print "<th>Count</th>";		   
				  	print "</tr>";
					if($result = mysqli_query($dbc, $q)){
		                while ($row = mysqli_fetch_array($result)){
		                    print "<tr>";
		                    print "<td>".$row['tags']."</td>";
		                    print "<td>".$row['COUNT(middleTable.task_id)']."</td>";
		                    print "</tr>";
		                }
		            }
		            print "</table>";
				}

			 ?>
		</div>
	</div>


	
		

</body>
</html>