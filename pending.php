<!doctype html>
<html>
  <head>
  <meta charset ="utf-8">
  <title>Pending Tasks</title>
<link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <h1> Pending Tasks </h1>
<?php
  include_once 'classes.php';
  $obj = new getConnection;
  $Q = new query;

  $query = $Q->getPending();
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
      echo "</tr>";
    } 
  echo "</table>";   
}
  else{
    echo "There are currently no pending tasks to be viewed."."<br>";}
  
  mysqli_close($obj->getConn());
?>
<p><a href="index.php">Home</a></p>
</html>