<!doctype html> 
<html>
  <head>
  <meta charset ="utf-8">
  <title>TODO Application</title>
  <link rel="stylesheet" type="text/css" href="style.css">

  <div class="sidebar">
  </div>
 
  <h1> TODO Application </h1>
  
  <p><a href="add.php"><button>Add a Task</button></a></p>
  <p><a href="view.php"><button>View/Delete Tasks</button></a></p>


<?php
  require 'classes.php';
  $obj = new getConnection;
  $Q = new query;

  /*$query = $Q->getAllTasks();
  $execute = mysqli_query($obj->getConn(), $query); //execute the query with the given connection
  if($execute){
  $totalNum = mysqli_num_rows($execute); //get the total number of rows that the query satisfies
  echo "<p>Total Number of Tasks in the System";//output result w/ hyperlink
  echo "<a href=view.php>: $totalNum</a></p>";}
  
  else{
	$totalNum = 0;
	echo"<p>Total Number of Tasks in the System";
	echo"<a href=view.php>: $totalNum</a></p>;}*/

  $query = "CREATE DATABASE IF NOT EXISTS todo;";
  $execute = mysqli_query($obj->getConn(), $query);

  $query = "USE todo;";
  $execute = mysqli_query($obj->getConn(), $query);

  $query = "CREATE TABLE IF NOT EXISTS Tasks(
taskid integer auto_increment,
name varchar(50),
status varchar(15),
duedate varchar(10),
primary key(taskid));";
  $execute = mysqli_query($obj->getConn(), $query);

  $query = $Q->getAllTasks();
  $execute = mysqli_query($obj->getConn(), $query); //execute the query with the given connection
  $totalNum = mysqli_num_rows($execute); //get the total number of rows that the query satisfies
  echo "<p>Total Number of Tasks in the System";//output result w/ hyperlink
  echo "<a href=view.php>: $totalNum</a></p>";

  $query = $Q->getPending(); //get only those tasks where status is pending
  $execute = mysqli_query($obj->getConn(), $query); 
  $pendingNum = mysqli_num_rows($execute);
  echo "<p>Total Number of Pending Tasks in the System";
  echo "<a href=pending.php>: $pendingNum</a></p>";//create a hyperlink to page that displays pending tasks

  $query = $Q->getStarted();//select only tasks with status started
  $execute = mysqli_query($obj->getConn(), $query);//execute the given query with the connection established above
  $startedNum = mysqli_num_rows($execute); //get the number of rows from the executed query
  echo "<p>Total Number of Started Tasks in the System";
  echo "<a href=started.php>: $startedNum</a></p>";//create a hyperlink to page that displays pending tasks

  $query = $Q->getCompleted();
  $execute = mysqli_query($obj->getConn(), $query);
  $completedNum = mysqli_num_rows($execute);
  echo "<p>Total Number of Completed Tasks in the System";
  echo "<a href=completed.php>: $completedNum</a></p>";//create a hyperlink to page that displays completed tasks

  $query = $Q->getLate();
  $execute = mysqli_query($obj->getConn(), $query);
  $lateNum = mysqli_num_rows($execute);
  echo "<p>Total Number of Late Tasks in the System";
  echo "<a href=late.php>: $lateNum</a></p>";//create hyperlink to page that displays late tasks

  $query = $Q->getOther(); //get queries that dont have one of the predefined statuses
  $execute = mysqli_query($obj->getConn(), $query);
  $otherNum = mysqli_num_rows($execute);
  echo "<p>Total Number of Other Tasks in the System";
  echo "<a href=other.php>: $otherNum </a></p>";

  mysqli_close($obj->getConn());
?>
<br><br><br><br><br><br><br><br><br>
<div class="footer"> TODO app James Demery </div>
</html>