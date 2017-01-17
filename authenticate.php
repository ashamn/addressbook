<?php
session_start();
include_once 'config.php';
include_once 'dbconnect.php';
include_once 'utilities.php';

if ($_POST){
	$username = $_POST['username'];
	$password = sha1($_POST['password']);
	// $password = cleanup($_POST['password']);
	

	$query = "SELECT * FROM users WHERE username='".$username."' AND password='".$password."'";
	
	$result = mysqli_query($_SESSION['dbconn'], $query);
	
	$record = mysqli_fetch_assoc($result);
	
	if($record){
		// $record = mysqli_fetch_assoc($result);
		$_SESSION['user']['username'] = $record['username'];
		$_SESSION['user']['admin'] = $record['admin'];
		$_SESSION['user']['can_add'] = $record['can_add'];
		$_SESSION['user']['can_edit'] = $record['can_edit'];
		$_SESSION['user']['can_delete'] = $record['can_delete'];
		$_SESSION['message'] = array('success', 'Welcome '.$_SESSION['user']['username']);
		header('Location: '.SITE_URL);		
	}
	else{
		$_SESSION['message'] = array('danger', 'User cannot be logged!');
		$_SESSION['user'] = null;
		// header('Location: http://localhost/contacts2/loginform.php');	
		header('Location: '.SITE_URL);
	}
}

?>