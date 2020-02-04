<?php
	$config = parse_ini_file( __DIR__ . '/../config.ini', true);
	$db = $config['database']; extract($db);
	
	try {
		$dbh = new PDO("mysql:host={$host};dbname={$dbname};charset={$charset}", "{$user}", "{$password}");
	} catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
		die();
	}