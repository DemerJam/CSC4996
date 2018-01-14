<!doctype html>
<html lang="en">
  <head>
  <meta charset ="utf-8">
  <title>View Tasks</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  </head>
<div class="sidebar">
  </div>
  <h1> All Tasks </h1>
  
<?php
  include_once 'classes.php';
  
  $obj = new getConnection;

  $query = "SELECT * FROM tasks ORDER BY taskid;";
  $execute = mysqli_query($obj->getConn(), $query);

  if(mysqli_num_rows($execute) > 0) //if the table is at all populated, loop through and output a table of the values
{
 echo "<table>";
      echo "<thead>";
        echo "<tr>";
          echo "<th>Task Name</th>";//table heading
          echo "<th>Status</th>";
          echo "<th>Due Date</th>";
        echo "<tr>";
      echo "</thead>";
      
  while($row = $execute->fetch_assoc())
    {
      echo "<tr>";
        echo "<td>".$row["name"]."</td>"; //output the data for each task
        echo "<td>".$row["status"]."</td>";
        echo "<td>".$row["duedate"]."</td>";
        echo "<td><a href='delete.php?del=$row[taskid]'>Delete</a></td>";//links to delete.php and also passes a value, the taskid, so that it can be included in the delete query. Has to be taskid(primary key) or could lead to accidental deletions
      echo "</tr>";
    }   
echo "</table>";
 echo"<p><a href='delete.php?delAll=$row[delAll]'><button>Delete All</button></a></p>"; 
}
  else{
    echo "<p>There are currently no tasks to be viewed.</p>"."<br>";}

  mysqli_close($obj->getConn());
?>


<p><a href="index.php"><button> Home </button></a></p>;
</html>