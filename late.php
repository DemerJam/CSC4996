<!doctype html>
<html>
  <head>
  <meta charset ="utf-8">
  <title>Late Tasks</title>
  </head>
  <h1> Late Tasks </h1>
<?php
$conn = mysqli_connect("localhost", "root", "", "todo");
  if (!$conn)
    echo "Connection failed, check to make sure username/password are correct.";

  $query = "SELECT * FROM tasks WHERE status='Late';";
  $execute = mysqli_query($conn, $query);
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
      echo "<br>";
    echo "</table>";
    }    
}
  else{
    echo "There are currently no late tasks to be viewed."."<br>";}
  
  mysqli_close($conn);
?>

<a href="index.php">Home</a>
</html>