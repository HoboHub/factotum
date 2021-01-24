<?php 
	header('Content-Type: text/html; charset=utf-8');

	$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
	$pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

	$mysql = new mysqli('localhost', 'root', '', 'factotum_base');

	$hashed_result = $mysql->query("SELECT `password` FROM `users` WHERE `email` = '$email'");
	$hashed_pass = $hashed_result->fetch_assoc();
	if (count($hashed_pass) == 0) {
		echo "Пользователь не найден"; //заменить на всплывашку
		exit();
	}

	$hashed_str = implode('', $hashed_pass);

	// echo "password = $pass <br> hash = $hashed_str";

	if(!password_verify($pass, $hashed_str)) {
		echo "Неверный логин или пароль";
		exit();
	}

	$result = $mysql->query("SELECT * FROM `users` WHERE `email` = '$email'");
	$user = $result->fetch_assoc();

	// // проверка на наличие данных
	// $user_string = implode(' || ', $user);
	// echo "$user_string";
	// exit();

	setcookie('user', $user['name'], time() + 3600, "/");
	setcookie('email', $user['email'], time() + 3600, "/");

	$mysql->close();

	header('Location: /');
?>