<?php
class getConnection {
  
	public function getConn(){
		$conn=mysqli_connect("localhost", "root", "", "todo");
		if(!$conn)
			echo "Error connecting to database.";
		return $conn;}	
}

?>