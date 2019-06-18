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


  </head>
<body>


    <?php  
          $servername = "127.0.0.1";
          $username = "root";
          $password = "248624";
          $dbname = "php";

      

          if($dbc = @mysqli_connect($servername, $username, $password, $dbname)){

            $tableName = "auis_tasks";
            $task_id ="'".$_GET['id']."'";      //this comes from search.php

            $q = "SELECT * FROM $tableName WHERE task_id = $task_id";
           

           if($result = mysqli_query($dbc, $q)){
              while ($row = mysqli_fetch_array($result)){

                $title = $row['title'];
                $description = $row['description'];
                $scheduleDate = $row['schedule_date'];
                $dueDate = $row['due_date'];
                $priority = $row['priority'];
              }
            }

          }



    ?>
    <div class="container">

      <form action="deleteANDupdate.php" method="GET">



        <input type="hidden" name="id" value=<?php echo $task_id ?>>
        <h3>Title</h3><input type="text" name="title" required value=<?php echo $title ?>>
        <h3>Description</h3><input type="text" name="description" required value=<?php echo $description ?> >
        <h3>Schedule Date</h3><input type="date" name="scheduledate" required value=<?php echo $scheduleDate ?> >
        <h3>Due Date</h3><input type="date" name="duedate" required value=<?php echo $dueDate ?> >
        <h3>Priority</h3>
        <select name="priority" required value=<?php echo $priority ?> >
          <option name="A">A</option>
          <option name="B">B</option>
          <option name="C">C</option>
        </select>
          
        

        <br>
        <br>
        <input type="submit" value="Update" name="action">
        
      </form>
    </div>
    

</body>
</html>