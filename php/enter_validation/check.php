<?php
	session_start();
	header('Content-Type: text/html; charset=utf-8');

	$name = $_SESSION["name"];
	$email = $_SESSION["email"];
	$pass = $_SESSION["pass"];
	$prove_pass = $_SESSION["prove_pass"];
	$regDate = $_SESSION["regDate"];

	$hashed_pass = password_hash($pass, PASSWORD_DEFAULT);
	// var_dump($hashed_password);

	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	$mysql = new mysqli('localhost', 'root', '', 'factotum_base');

	mysqli_set_charset($mysql, $charset); //$charset поменять на "uth-8"
	//1)
	// $mysql->query("INSERT INTO `users`(`name`, `email`, `password`) VALUES('$name', '$email', '$hashed_pass')");

	// $mysql->close();

	//2)
	$sql1 = "INSERT INTO `users`(`email`, `login`, `name`, `prof`, `password`, `status`, `gender`, `reg_date`) VALUES('$email', '', '$name', '', '$hashed_pass', '', '', '$regDate')";
	$res = mysqli_query($mysql, $sql1);

	////////
	$resAuth = $mysql->query("SELECT * FROM `users` WHERE `email` = '$email'");
	$user = $resAuth->fetch_assoc();
	
	setcookie('user', $user['name'], time() + 3600, "/");

	setcookie('email', $user['email'], time() + 3600, "/");
	///////
 
	mysqli_close($mysql);


	header("refresh: 5; url=/");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Factotum - подтверждение регистрации</title>
</head>
<body>

	<?php 
		$check = '<i class="fas fa-check-circle"></i>';
		if($_GET["send"] == 1)
			echo "$check На почту: " . $_SESSION["email"] . " выслано письмо с подтверждением регистрации";
	 ?>
	</p>
	
	<div class="button"><a href="/">Вернуться на главную</a></div>

	
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/e35bb9b698.js" crossorigin="anonymous"></script>
	<script src="js/common.js"></script>
</body>
</html>