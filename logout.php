<?php
    ini_set("session.cookie_httponly", 1);
    session_start();
    $_SESSION = array();
    session_destroy();
    echo json_encode(array(
		"success" => true
	));
?>