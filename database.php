

<?php

$mysqli = new mysqli('localhost', 'calUser', 'calPass', 'calendar');

if($mysqli->connect_errno) {
	printf("Connection Failed: %s\n", $mysqli->connect_error);
	exit;
}
?>