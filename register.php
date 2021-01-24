<?php
	header('Content-Type: text/html; charset=utf-8');
	session_start();

	$url_lin = $_SESSION['url']; 

	if(isset($_POST["close"])) {
		if(isset($_SESSION['url'])) {
			header("Location: $url_lin");
			// header('Location: ' . $_SERVER['HTTP_REFERER']);
			exit(); 
		} else { 
			$url_lin = ''; 
			header("Location: /$url_lin");
			exit(); 
		}
	}

	if(isset($_POST["send"])) {

		$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
		$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
		$pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);
		$prove_pass = filter_var(trim($_POST['prove_pass']), FILTER_SANITIZE_STRING);

		$error = false;

		$error_name = "";
		$error_email = "";
		$error_pass = "";
		$error_prove_pass = "";

		if(mb_strlen($name) < 5 || mb_strlen($name) > 50) {
			$error_name = "Недопустимая длина имени";
			$error = true;
		} 
		if(mb_strlen($email) < 8 || mb_strlen($email) > 50 || !preg_match("/@/", $email)) {
			$error_email = "Недопустимый email";
			$error = true;
		}
		if(mb_strlen($pass) < 4 || mb_strlen($pass) > 16) {
			$error_pass = "Недопустимая длина пароля (от 4 до 16 символов)";
			$error = true;
		}
		if($pass != $prove_pass) {
			$error_prove_pass = "Пароль должен совпадать";
			$error = true;
		}

		if(!$error) {
			$regDate = time();

			$_SESSION["regDate"] = $regDate;
			$_SESSION["name"] = $name;
			$_SESSION["email"] = $email;
			$_SESSION["pass"] = $pass;
			$_SESSION["prove_pass"] = $prove_pass;

			$subject = "=?utf-8?B?".base64_encode('Письмо с подтверждением.')."?=";
			$headers = "From: Factotum\r\nReply-to: Factotum\r\nContent-type: text/plain; charset=utf-8\r\n";
			$message = "Ссылка для подтверждения регистрации на Factotum.com: #Ссылка на сайт#";

			mail($email, $subject, $message, $headers); //поменять метод кодировки, чтобы считывалось как надо

			header("Location: /php/enter_validation/check.php?send=1");
			exit();
		}
	}
?>

<?php
	$title = "Factotum - создание аккаунта";
	include_once "blocks/head.php";
?>

<body>
	<div class="register enter-block">
		<div class="logo register__logo">
			<div class="logo__ico">
				<a href="/"><img src="img/icons/logo1.svg" alt="logo"></a>
			</div>
			<a href="/" class="logo__link_blue">
				<h3 class="logo__text">Factotum<h3>
			</a>
		</div>
		<h2 class="register__header">Регистрация</h2>
		<div class="register__content">
			<form name="sign_in" method="post">
				<label class="register__label">Имя Фамилия</label>
				<input type="text" class="register__form form-control" name="name" id="name">
				<span class="register__error"><?=$error_name?></span>

				<label class="register__label">Адрес электронной почты</label>
				<input type="text" class="register__form form-control" name="email" id="email">
				<span class="register__error"><?=$error_email?></span>

				<div class="register__pass-block">
					<label class="register__label">Пароль</label>
					<input type="password" class="register__form form-control" name="pass" id="pass">
					<a class="register__eye eye_closed" id="pass-eye"><i class="fas fa-eye-slash"></i></a>
					<span class="register__error"><?=$error_pass?></span>
				</div>
				<div class="register__pass-block">
					<label class="register__label">Подтвердите пароль</label>
					<input type="password" class="register__form  form-control" name="prove_pass" id="prove_pass">
					<!-- <a class="register__eye eye_closed" id="pass-eye"><i class="fas fa-eye-slash"></i></a> -->
					<span class="register__error"><?=$error_prove_pass?></span>
				</div>
				<button class="register__enter   register__enter__mt0   btn btn__enter disabled" type="submit" name="send">Зарегестрироваться</button>
			</form>
		</div>
		<form method="post" id="closeForm" name="closeForm">
			<div class="register__close register__close_circle btn btn__close">
				<i class="fas fa-times"></i>
				<input type="submit" style="position: absolute; margin-top: 0px; cursor: pointer; padding-left: 20px; padding-top: 10px; border-radius: 30px; opacity: 0;" name="close" id="close" value=""> 
			</div>
		</form>
	</div>
	
	
	<?php include_once "blocks/scripts.php" ?>
	<!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/e35bb9b698.js" crossorigin="anonymous"></script>
	<script src="js/common.js"></script> -->
</body>