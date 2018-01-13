<?php
class getConnection {
  
	public function getConn(){
		$conn=mysqli_connect("localhost", "root", "", "todo");
		if(!$conn)
			echo "Error connecting to database.";
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