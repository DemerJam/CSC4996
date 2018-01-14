<!doctype html>
<html>
  <head>
  <meta charset ="utf-8">
  <title>Started Tasks</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  </head>
<div class="sidebar">
  </div>
  <h1> Started Tasks </h1>
<?php
  include_once 'classes.php';
  $obj = new getConnection;//objects
  $Q = new query;

  $query = $Q->getStarted();
  $execute = mysqli_query($obj->getConn(), $query);
  if(mysqli_num_rows($execute) > 0)
{
 echo "<table>";
      echo "<thead>";
        echo "<tr>";
          echo "<th>Task Name</th>";
          echo "<th>Status</th>";
          echo "<th>Due Date</th>";
        echo "<tr>";
      echo "</thead>";
      
  while($row = $execute->fetch_assoc())
    {
      //echo "Task Name: ". $row["name"]."<br>"."Status: " . $row["status"]."<br>". "Due Date: " . $row["duedate"]."<br>"."<br>";}
      echo "<tr>";
        echo "<td>".$row["name"]."</td>";
        echo "<td>".$row["status"]."</td>";
        echo "<td>".$row["duedate"]."</td>";
        echo "<td><a href='delete.php?del=$row[taskid]'>Delete</a></td>";
      echo "</tr>";
   
    } 
echo "</table>";   
}
  else{
    echo "<p>There are currently no started tasks to be viewed.</p>"."<br>";}
  
  mysqli_close($obj->getConn());
?>

<p><a href="index.php"><button>Home</button></a></p>
</html>