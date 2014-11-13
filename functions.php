<?php
	// connect to a database, returns connection.
	function connect_db($dbname) {
		$dbhost = "localhost";
		$user = "root";
		$pass = "secret"; 
		$connection = mysqli_connect($dbhost, $user, $pass, $dbname);
		return $connection;
	}
	
	// close database conection
	function close_db($connection) {
		mysqli_close($connection);
	}
?>