<!doctype html>
<html>
  <head>
  <meta charset ="utf-8">
  <title>Completed Tasks</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <h1> Completed Tasks </h1>
<?php
$conn = mysqli_connect("localhost", "root", "", "todo");
  if ($conn == false)
    echo "Connection failed, check to make sure username/password are correct.";

  $query = "SELECT * FROM tasks WHERE status='Completed';";
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
    }    
    echo "</table>";
}
  else{
    echo "There are currently no completed tasks to be viewed."."<br>";}
  
  mysqli_close($conn);


?>

<a href="index.php">Home</a>
</html>