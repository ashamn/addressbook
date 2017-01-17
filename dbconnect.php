<?php

$link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB);
if (!$link) {
	$message = "Cannot connect to the database.";
	$_SESSION['message'] = array('danger',$message);
} else {
	$_SESSION['dbconn'] = $link;
}