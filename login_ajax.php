<?php
// login_ajax.php
require 'database.php';


header("Content-Type: application/json"); // Since we are sending a JSON response here (not an HTML document), set the MIME Type to application/json

//Because you are posting the data via fetch(), php has to retrieve it elsewhere.
$json_str = file_get_contents('php://input');
//This will store the data into an associative array
$json_obj = json_decode($json_str, true);

//Variables can be accessed as such:


//This is equivalent to what you previously did with $_POST['username'] and $_POST['password']

$mysqli->query(/* perform transfer */);
// Use a prepared statement
$stmt = $mysqli->prepare("SELECT COUNT(*), id, pass_word FROM users WHERE username=?");
// Bind the parameter
$stmt->bind_param('s', $username);
$username = $json_obj['username'];
//$user = $_POST['username'];
$stmt->execute();
// Bind the results
$stmt->bind_result($cnt, $user_id, $pwd_hash);
$stmt->fetch();
   
$password = $json_obj['password'];
//$pwd_guess = $_POST['pass_word'];
// Compare the submitted password to the actual password hash
//echo "$pwd_guess $pwd_hash";
//echo password_verify($pwd_guess, $pwd_hash);

if($cnt == 1 && password_verify($username, $password) ){
	session_start();
	$_SESSION['username'] = $username;
	$_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(32)); 

	echo json_encode(array(
		"success" => true
	));
	exit;
}else{
	echo json_encode(array(
		"success" => false,
		"message" => "Incorrect Username or Password"
	));
	exit;
}
?>