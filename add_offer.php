<?php
	session_start();
	require_once ( $_SERVER['DOCUMENT_ROOT'] . "/lib/database.php");

	if (empty($_SESSION['user_session'])) {
		$status - false;
	}
	if ((!empty($_POST)) && (!empty($_SESSION['user_session']))) {
		$fields = $_POST;
	
		try {
			$insert = $dbh->prepare("INSERT INTO offer(wndtype, price, podokonnik, otliv, otkos, setka, width, height, user_id, date_created) VALUES (:wndtype, :price, :podokonnik, :otliv, :otkos, :setka, :width, :height, :user_id, :date_created)");
				  
			$datetime = date('Y-m-d H:i:s');
			
			$data = array(
				":user_id" => (int) $_SESSION['user_session'],
				":wndtype" => !empty($fields['wndtype']) ? $fields['wndtype'] : 1,
				":price" => $fields['price'],
				":podokonnik" => !empty($fields['podokonnik']) ? $fields['podokonnik'] : 0,
				":otliv" => !empty($fields['otliv']) ? $fields['otliv'] : 0,
				":otkos" => !empty($fields['otkos']) ? $fields['otkos'] : 0,
				":setka" => !empty($fields['setka']) ? $fields['setka'] : 0,
				":width" => !empty($fields['width']) ? $fields['width'] : ,
				":height" => !empty($fields['height']) ? $fields['height'] : 120,
				":date_created" => $datetime
			);
			
			$status = $insert->execute($data); 

			//return $insert; 
		} catch(PDOException $e) {
			
			echo $e->getMessage();
			
			$status = false;
		} 

	}
	
	echo json_encode(array(
		'status' => $status
	));