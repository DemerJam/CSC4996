<?php
  require 'classes.php';
  $name = "";
  $status = "";
  $duedate = "";
  
  $obj = new getConnection; //connect through a class that has a function specifically for it
  if(isset($_POST['submit']))
  {
    $name = $_POST['name'];
    $status = $_POST['status'];
    $duedate = $_POST['duedate'];
  
    $query = "INSERT INTO tasks (name, status, duedate) VALUES('$name', '$status', '$duedate');";
    mysqli_query($obj->getConn(), $query);
    header('location: index.php'); //redirect to home after insertion
  }
  mysqli_close($obj->getConn());
?>

<!doctype html>
<html>
  <head>
  <meta charset ="utf-8">
  <title>Add a Task</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <h1> Add a Task </h1>
  <p>Please fill out the form and press submit to add a new task</p>
<form action="add.php" method="post">
    <label for="name">Name</label>
    <input type="text" name="name" value="<?php echo $name; ?>">
    <label for="status">Status</label>
    <input type="text" name="status" value="<?php echo $status; ?>">
    <label for="duedate">Due Date</label>
    <input type="text" name="duedate" value="<?php echo $duedate; ?>">
    <input type="submit" name="submit" value="Submit">
    

  </form>
<br>
<a href="index.php">Home/Cancel</a>
</html>