<?php
session_start();
ini_set('display_errors',1);
include_once 'config.php';
include_once 'dbconnect.php';
include_once 'contacts_def.php';
include_once 'utilities.php';

if ($_POST) {
	$query = "UPDATE contacts SET ";
	foreach ($contacts_definition as $k => $v) {
		if ($_POST[$k]) {
			$query .= $k . " = '" . clean_up($_POST[$k]) . "',";
			// $query .= $k . " = '" . $_POST[$k] . "',";
		}
	}
	$query1 = substr($query,0,(strlen($query)-1));
	$query1 .= " WHERE id = " . $_POST['id'];
	
	$result = mysqli_query($_SESSION['dbconn'],$query1);
	if ($result) {
		$message = "Record updated.";
		$_SESSION['message'] = array('success',$message);
	} else {
		$message = "Record NOT updated. " . mysqli_error($_SESSION['dbconn']);
		$_SESSION['message'] = array('warning',$message);
	}
	header('Location: ' . SITE_URL);
}