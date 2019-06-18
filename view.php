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
  <div class="container">

  	<div class="navbar-default sticky-top">
        <ul class="nav navbar-nav">
          <li><a href="index.php">Create</a></li>
          <li class="active"><a href="view.html">View</a></li>
          <li><a href="summary.php">Summary</a></li>
        </ul>
  	</div>


    <br>
    <br>
    <div>
      <form action="search.php" method="GET">
        <h3>Title</h3><input type="text" name="title">
        <h3>Description</h3><input type="text" name="description">
        <h3>Due Date</h3><input type="date" name="duedate">
        <h3>Priority</h3>
        <select name="priority">
          <option value="">None</option>
          <option name="A">A</option>
          <option name="B">B</option>
          <option name="C">C</option>
        </select>
        <br>
        <br>
        <input type="submit" value="Search" name="search">
        
      </form>
    </div>
  </div>
  	

</body>
</html>