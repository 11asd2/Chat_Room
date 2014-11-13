<?php
	$start_time = time();
	require_once("functions.php");
	$connection = connect_db("chat_app");
	$messages = [];
	$entering_latest = $_GET['latest_id'];

	if ($entering_latest !== "initial") {
		$latest_id = $entering_latest;
		$latest_id = mysqli_escape_string($connection, $latest_id);
		$query = "SELECT * ";
		$query .= "from messages ";
		$query .= "WHERE id > {$latest_id}"; 
		
		while(time() - $start_time < 25) {
			$result = mysqli_query($connection, $query);
			$count = mysqli_num_rows($result); // number of rows fetched
			if ($count == 0) 	
				continue;
			for($i = 1; $row = mysqli_fetch_assoc($result); $i++) {
				$messages[] =  ['message' => $row['text'], 'time' => $row['time']]; // load the $messages array up with messages.
				if($i === $count)
					$messages['latest_id'] = $row['id'];
			}
			break;
		}
		// if $count is still 0, after the allowed script running period of 25 seconds.
		if($count == 0)
			$messages['latest_id'] = $entering_latest; // sending same id back to client.
	}
		
	else { // else set the latest_id to the last message's id in the database.
		$query = "SELECT MAX(id) FROM messages";
		$result = mysqli_query($connection, $query);
		$latest_id = mysqli_fetch_assoc($result)['MAX(id)'];
		$messages['latest_id'] = $latest_id; // $messages will be empty of any messages, but will have a non-null $latest_id for next request.
	}
	
	$json_str = json_encode($messages);
	echo $json_str;
	close_db($connection)
?>
