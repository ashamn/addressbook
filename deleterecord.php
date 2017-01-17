<?php
session_start();
ini_set('display_errors',1);
include_once 'config.php';
include_once 'dbconnect.php';

if ($_POST) {
	$query = "DELETE FROM contacts WHERE id = " . $_POST['id'];
	$result = mysqli_query($_SESSION['dbconn'],$query);
	if ($result) {
		$message = "Record deleted.";
		$_SESSION['message'] = array('success',$message);
	} else {
		$message = "Record NOT deleted. " . mysqli_error($_SESSION['dbconn']);
		$_SESSION['message'] = array('warning',$message);
	}
	header('Location: ' . SITE_URL);
}