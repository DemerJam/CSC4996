<?php
  include_once 'classes.php';
  require 'view.php';

  $obj = new getConnection;  
  $Q = new query;
  if( isset($_GET['del']))
  {
     $taskid = $_GET['del']; //get the taskid of the task to be deleted
     $query = "DELETE FROM tasks WHERE taskid='$taskid';";//use that id to delete the task
     $execute = mysqli_query($obj->getConn(), $query);
     header('location: index.php'); //redirect to home after deleting specified record
  }
  else
    echo "Task could not be deleted.";

  if(isset($_GET['delAll']))
	{
		$query = $Q->deleteAll();
		$execute = mysqli_query($obj->getConn(), $query);
		header('location:index.php');
	}
  else
	echo "Tasks could not be deleted.";

   mysqli_close($obj->getConn());
?>