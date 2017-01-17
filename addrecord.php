<?php
session_start();
ini_set('display_errors',1);
include_once 'config.php';
include_once 'dbconnect.php';
include_once 'contacts_def.php';

if ($_POST) {
	$query = "INSERT INTO contacts (";
	foreach ($contacts_definition as $k => $v) {
		if ($_POST[$k]) {
			$query .= $k . ",";
		}
	}
	$query1 = substr($query,0,(strlen($query)-1));
	$query1 .= ") VALUES (";
	
	foreach ($contacts_definition as $k => $v) {
		if ($_POST[$k]) {
			$query1 .= "'" . $_POST[$k] . "',";
		}
	}
	$query2 = substr($query1,0,(strlen($query1)-1));
	$query2 .= ")";
	$result = mysqli_query($_SESSION['dbconn'],$query2);
	if ($result) {
		$message = "Record added.";
		$_SESSION['message'] = array('success',$message);
	} else {
		$message = "Record NOT added. " . mysqli_error($_SESSION['dbconn']);
		$_SESSION['message'] = array('warning',$message);
	}
	header('Location: ' . SITE_URL);
}