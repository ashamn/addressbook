<?php

session_start();
include_once 'config.php';
ini_set('display_errors',0);


$page_title = "Logout";

if ($_SESSION['user']['username']) {
	session_destroy();
	header('Location: '.SITE_URL);		
}


?>