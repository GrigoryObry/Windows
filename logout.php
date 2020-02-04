<?php
	session_start();
	
	require_once ( $_SERVER['DOCUMENT_ROOT'] . "/lib/database.php");
	require_once ( $_SERVER['DOCUMENT_ROOT'] . "/lib/User.php");
	
	$user = new User($dbh);
	$login = $user->logout();
	
	header('Location: /');