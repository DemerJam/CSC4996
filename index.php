<!doctype html>
<html>
  <head>
  <meta charset ="utf-8">
  <title>Todo Application</title>
  </head>
  <h1> Todo Application </h1>
  <body>
  <ul>
	<li><a href="add.php">Add a Task</a></li>
	<li><a href="delete.php">Delete Tasks</a></li>
	<li><a href="view.php">View all Tasks</a></li>
  </ul>

<?php
  $conn = mysqli_connect("localhost", "root", "", "todo");
  if ($conn == false)
     echo "Connection failed, check to make sure username/password are correct.";

  $query = "SELECT * FROM tasks;";
  $execute = mysqli_query($conn, $query); //execute the query with the given connection
  $totalNum = mysqli_num_rows($execute); //get the total number of rows that the query satisfies
  echo "Total Number of Tasks in the System: $totalNum"; //output result
  echo "<br>"; //easiest way I found to do newline in PHP
  

  $query = "SELECT * FROM tasks WHERE status='Pending';"; //get only those tasks where status is pending
  $execute = mysqli_query($conn, $query); 
  $pendingNum = mysqli_num_rows($execute);
  echo "Total Number of Pending Tasks in the System";
  echo "<a href=pending.php>: $pendingNum</a>";//create a hyperlink to page that displays pending tasks
  echo "<br>";
  //echo "Total Number of Pending Tasks in the System: <a href="pending.php>$pendingNum</a>";
  

  $query = "SELECT * FROM tasks WHERE status='Started';";//seelct only tasks with status started
  $execute = mysqli_query($conn, $query);//execute the given query with the connection established above
  $startedNum = mysqli_num_rows($execute); //get the number of rows from the executed query
  echo "Total Number of Started Tasks in the System";
  echo "<a href=started.php>: $startedNum</a>";//create a hyperlink to page that displays pending tasks
  echo "<br>";
  

  $query = "SELECT * FROM tasks WHERE status='Completed';";
  $execute = mysqli_query($conn, $query);
  $completedNum = mysqli_num_rows($execute);
  echo "Total Number of Completed Tasks in the System";
  echo "<a href=completed.php>: $completedNum</a>";//create a hyperlink to page that displays completed tasks
  echo "<br>";

  $query = "SELECT * FROM tasks WHERE status='Late';";
  $execute = mysqli_query($conn, $query);
  $lateNum = mysqli_num_rows($execute);
  echo "Total Number of Late Tasks in the System";
  echo "<a href=late.php>: $lateNum</a>";//create hyperlink to page that displays late tasks
  echo "<br>";

  mysqli_close($conn);
?>

  </body>
</html>