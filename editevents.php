<!DOCTYPE html>
<html lang="en">

<?php 
require 'database.php';
session_start(); 
header("Content-Type: application/json"); // Since we are sending a JSON response here (not an HTML document), set the MIME Type to application/json
//Because you are posting the data via fetch(), php has to retrieve it elsewhere.
$json_str = file_get_contents('php://input');
//This will store the data into an associative array
$json_obj = json_decode($json_str, true);
//Variables can be accessed as such:
$newtitle = $json_obj['newtitle'];
$newstartdate = $json_obj['newstart_date'];
$newenddate = $json_obj['newend_date'];
$newtime = $json_obj['newtime'];
$newnote = $json_obj['newnote'];
//This is equivalent to what you previously did with $_POST['username'] and $_POST['password']
$stmt = $mysqli->prepare("UPDATE events SET title=?, note=?, time=?, start_date=?, end_date=? WHERE title=?");
if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}
$stmt->bind_param('ssssss', $_SESSION['username'], $newtitle, $newnote, $newtime, $newstartdate, $newenddate);
$stmt->execute(); 
?>