<?php
	require_once("functions.php");
	$connection = connect_db("chat_app");
	
	$message = $_POST['message'];
	$time = $_POST['time'];
	$message = mysqli_real_escape_string($connection, $message);
	$time = mysqli_real_escape_string($connection, $time);
	
	$query = "INSERT INTO messages (text, time) "; 
	$query .= "VALUES('{$message}','{$time}')";
	
	mysqli_query($connection, $query);
	mysqli_error($connection); // will display error from last query, if any.
	
	close_db($connection);
?>