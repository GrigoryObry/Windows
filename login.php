<?php
	session_start();
	require_once ( $_SERVER['DOCUMENT_ROOT'] . "/lib/database.php");
	require_once ( $_SERVER['DOCUMENT_ROOT'] . "/lib/User.php");

	// Очистим сторонние символы
	$fields = array(
		'email' => strip_tags(trim($_POST['email'])),
		'password' => $_POST['password']
	);

	$user = new User($dbh);
	$login = $user->login($fields);

	header('Location: /');