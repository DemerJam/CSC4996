<!doctype html> 
<html>
  <head>
  <meta charset ="utf-8">
  <title>Todo Application</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
  <h1> Todo Application </h1>
  
  <ul>
	<li><a href="add.php">Add a Task</a></li>
	<li><a href="view.php">View/Delete Tasks</a></li>
  </ul>

<?php
  require 'classes.php';
  $obj = new getConnection;
  
  $query="CREATE TABLE IF NOT EXISTS tasks(task id integer auto_increment, name varchar(50), status varchar(15), duedate varchar(10), primary key(taskid));";
  $execute = mysqli_query($obj->getConn(), $query);

  $query = "SELECT * FROM tasks;";
  $execute = mysqli_query($obj->getConn(), $query);
  if(mysqli_num_rows($execute) == 0)
  {
    $query = "INSERT INTO tasks(name, status, duedate) VALUES ('Learning PHP', 'Pending', '01/10/2018');";
    $execute = mysqli_query($obj->getConn(), $query);
    $query = "INSERT INTO tasks(name, status, duedate) VALUES ('Database Design Basics', 'Completed', '12/12/2017');";
    $execute = mysqli_query($obj->getConn(), $query);
    $query = "INSERT INTO tasks(name, status, duedate) VALUES ('Understanding WAMP Stacks', 'Started', '01/10/2018');";
    $execute = mysqli_query($obj->getConn(), $query);
    $query = "INSERT INTO tasks(name, status, duedate) VALUES ('Accurate Self-Reflection', 'Late', '01/09/2018');";
    $execute = mysqli_query($obj->getConn(), $query);
  }

  $query = "SELECT * FROM tasks;";
  $execute = mysqli_query($obj->getConn(), $query); //execute the query with the given connection
  $totalNum = mysqli_num_rows($execute); //get the total number of rows that the query satisfies
  echo "Total Number of Tasks in the System";//output result w/ hyperlink
  echo "<a href=view.php>: $totalNum</a>"; 
  echo "<br>"; //easiest way I found to do newline in PHP
  

  $query = "SELECT * FROM tasks WHERE status='Pending';"; //get only those tasks where status is pending
  $execute = mysqli_query($obj->getConn(), $query); 
  $pendingNum = mysqli_num_rows($execute);
  echo "Total Number of Pending Tasks in the System";
  echo "<a href=pending.php>: $pendingNum</a>";//create a hyperlink to page that displays pending tasks
  echo "<br>";
  //echo "Total Number of Pending Tasks in the System: <a href="pending.php>$pendingNum</a>";
  

  $query = "SELECT * FROM tasks WHERE status='Started';";//seelct only tasks with status started
  $execute = mysqli_query($obj->getConn(), $query);//execute the given query with the connection established above
  $startedNum = mysqli_num_rows($execute); //get the number of rows from the executed query
  echo "Total Number of Started Tasks in the System";
  echo "<a href=started.php>: $startedNum</a>";//create a hyperlink to page that displays pending tasks
  echo "<br>";
  

  $query = "SELECT * FROM tasks WHERE status='Completed';";
  $execute = mysqli_query($obj->getConn(), $query);
  $completedNum = mysqli_num_rows($execute);
  echo "Total Number of Completed Tasks in the System";
  echo "<a href=completed.php>: $completedNum</a>";//create a hyperlink to page that displays completed tasks
  echo "<br>";

  $query = "SELECT * FROM tasks WHERE status='Late';";
  $execute = mysqli_query($obj->getConn(), $query);
  $lateNum = mysqli_num_rows($execute);
  echo "Total Number of Late Tasks in the System";
  echo "<a href=late.php>: $lateNum</a>";//create hyperlink to page that displays late tasks
  echo "<br>";

  mysqli_close($obj->getConn());
?>

  
</html>