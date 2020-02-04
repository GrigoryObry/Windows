<?php
	require_once ( $_SERVER['DOCUMENT_ROOT'] . "/lib/database.php");
	require_once ( $_SERVER['DOCUMENT_ROOT'] . "/lib/User.php");
	
	// Валидация данных формы регистрации
	function validateFormRegistration($data) {
		// Массив ошибок (по умолчанию - пуст, т.е. ошибок нет)
		$errors = [];
		
		// Очистим сторонние символы
		$fields = array(
			'name' => strip_tags(trim($data['name'])),
			'email' => strip_tags(trim($data['email'])),
			'password' => trim($data['password']),
			'repeat_password' => trim($data['repeat_password'])
		);
		
		// Проверка корректности ввода имя пользователя
		if (!(strlen($fields['name']) >=2 && strlen($fields['name'] <=255))) {
			$errors[] = array(
				'field' => 'name',
				'error' => 'Длина имени должна быть не меньше 2 и не должна превышать 255 символов!',
			);
		}
		
		// Проверка корректности ввода email
		if (!filter_var($fields['email'], FILTER_VALIDATE_EMAIL)) {
			$errors[] = array(
				'field' => 'email',
				'error' => 'Email введен некорретно!',
			);
		}
		
		// Проверка на минимальную длину пароля
		if (strlen($fields['password']) < 6) {
			$errors[] = array(
				'field' => 'password',
				'error' => 'Длина пароля должна быть не менее 6 символов!',
			);
		}
		
		// Проверка на корректное подтверждение пароля
		if ($fields['password'] != $fields['repeat_password']) {
			$errors[] = array(
				'field' => 'repeat_password',
				'error' => 'Введенные пароли не совпадают!',
			);
		}
		
		return array(
			'errors' => $errors,
			'fields' => $fields
		);
	}
	
	$vaildation = validateFormRegistration($_POST);
	
	if (empty($vaildation['errors'])) {
		$user = new User($dbh);
		$register = $user->register($vaildation['fields']);
	}

	header("Location: '/'")