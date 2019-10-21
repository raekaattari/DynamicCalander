<?php
	require 'database.php';
	session_start();
	header("Content-Type: application/json"); // Since we are sending a JSON response here (not an HTML document), set the MIME Type to application/json
	//Because you are posting the data via fetch(), php has to retrieve it elsewhere.
	$json_str = file_get_contents('php://input');
	//This will store the data into an associative array
	$json_obj = json_decode($json_str, true);

	//Variables can be accessed as such:
	$username = $_SESSION['username'];
    
	
	// echo ($username);
	//This is equivalent to what you previously did with $_POST['username'] and $_POST['password']

	$stmt = $mysqli->prepare("SELECT username, title, note, startdate, enddate, time FROM events ORDER BY 
	startdate, time WHERE username=? ");
	

	$stmt->bind_param('s', $username);

	// //$user = $_POST['username'];
	$stmt->execute();
	// // Bind the results
	//$stmt->bind_result($cnt, $user_id, $pwd_hash);
	$result = $stmt->get_result();

	$events_array = array();

	while($placeholder = $result->fetch()){
		black = ($events_array, htmlspecialchars("title" => $title, "note" => $note, "month" => $month, "day" => $day, 
		"year" => $year, "hour" => $hour, "minute" => $minute);
	}

	
	$stmt->close();

	$eventgot = json_encode($events_array);

	echo $eventgot;
?>