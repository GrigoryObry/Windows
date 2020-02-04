<?php 
	include_once( __DIR__ . '/../app.php' );
	
	if (empty($_SESSION['user_session'])) exit('Not Access!');
	
	$user_id = (int) $_SESSION['user_session'];
	$action = $_REQUEST['action'];
	$id = (int) $_REQUEST['id'];
	
	$isUserTask = $dbh->prepare('SELECT * FROM task WHERE user_id = :user_id AND id = :id');
	$isUserTask->execute(array(
		'id' => $id,
		'user_id' => $user_id 
	));
	$task = $isUserTask->fetch(PDO::FETCH_ASSOC);
	
	if (empty($task)) exit('Not access to this task!');
	
	switch ($action) {
	case 'get':
			$query = $dbh->prepare('SELECT * FROM task WHERE id = :id');
			$query->execute(array(
				'id' => $id
			));
			$fields = $query->fetch(PDO::FETCH_ASSOC);
			echo json_encode($fields, JSON_PRETTY_PRINT);
			
			break;
	
		case 'activate':
			$activate = $dbh->prepare('UPDATE task SET completed = 0 WHERE id = :id');
			$activate->execute(array(
				'id' => $id
			));
			break;
			
		case 'completed':
			$activate = $dbh->prepare('UPDATE task SET completed = 1 WHERE id = :id');
			$activate->execute(array(
				'id' => $id
			));
			break;
			
		case 'delete':
			$activate = $dbh->prepare('DELETE FROM task WHERE id = :id');
			$activate->execute(array(
				'id' => $id
			));
			break;
			
		case 'update':
			$query = $dbh->prepare('UPDATE task SET title = :title,description = :description WHERE id = :id');
			
			$query->execute(array(
				'id' => $id,
				'title' => $_REQUEST['title'],
				'description' => $_REQUEST['description']
			));
			
			header('Location: /tasks.php');
			break;
	}