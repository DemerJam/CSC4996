<?php

class getConnection {
	public function getConn(){
		$conn = mysqli_connect('localhost', 'root', '');
  		if(!$conn)
			die("database conn failed".mysqli_error($conn));

		$query = "CREATE DATABASE IF NOT EXISTS todo;";
  		$execute = mysqli_query($conn, $query);

  		$select = mysqli_select_db($conn, 'todo');
  		if(!$select)
			die("Database select failed".mysqli_error($select));

		return $conn;}	
}

class query{

	public function getAllTasks(){
		$allTasks="SELECT * FROM tasks;";
		return $allTasks;}
	public function getPending(){
		$pendingTasks = "SELECT * FROM tasks WHERE status='Pending';";
		return $pendingTasks;}
	public function getStarted(){
		$startedTasks = "SELECT * FROM tasks WHERE status='Started';";
		return $startedTasks;}
	public function getCompleted(){
		$completedTasks = "SELECT * FROM tasks WHERE status='Completed';";
		return $completedTasks;}
	public function getLate(){
		$lateTasks = "SELECT * FROM tasks WHERE status='Late';";
		return $lateTasks;}
	public function getOther(){
		$otherTasks = "SELECT * FROM tasks WHERE status!='Started' AND status != 'Completed' AND status != 'Pending' AND status != 'Late';";
		return $otherTasks;}
	public function delete(){
		$delete = "DELETE FROM tasks WHERE taskid='$taskid';";
		return $delete;}
	public function deleteAll(){
		$deleteAll = "DELETE FROM tasks;";
		return $deleteAll;}
}


?>