<?php
	header('Content-Type: text/html; charset=utf-8');

	session_start(); 

	$email = $_COOKIE['email'];

	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	$mysql_first = new mysqli('localhost', 'root', '', 'factotum_base');
	mysqli_set_charset($mysql_first, $charset);

	$db_work = $mysql_first->query("SELECT `prof` FROM `users` WHERE `email` = '$email'");
	$db_work_mas = $db_work->fetch_assoc();

	

	if ($db_work_mas['prof'] == '') {
		$work_str = "Профессия";
	}else if (count($db_work_mas) !== 0) {
		// echo "профессия есть: " . $db_work_mas['prof'];
		$work_str = $db_work_mas['prof'];
	} else {
		$work_str = "Профессия";
	}

	mysqli_close($mysql_first);


	if(isset($_POST['save'])) {
		$work = filter_var(trim($_POST['work']), FILTER_SANITIZE_STRING);
		$study = filter_var(trim($_POST['study']), FILTER_SANITIZE_STRING);

		$errorW = false;
		$errorS = false;

		$error_ico = '<i class="fas fa-exclamation-circle"></i>';

		$error_work = "";
		$error_study = "";

		if(mb_strlen($work) < 5 || mb_strlen($work) > 100) {
			$error_work = $error_ico . "Недопустимое значение поля";
			$errorW = true;
		}
		if(mb_strlen($study) < 5 || mb_strlen($study) > 100) {
			$error_study = $error_ico . "Недопустимое значение поля";
			$errorS = true;
		}

		if (!$errorW) {
			// setcookie('work', $user['prof'], time() + 3600, "/");

			mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
			$mysql_second = new mysqli('localhost', 'root', '', 'factotum_base');
			mysqli_set_charset($mysql_second, $charset);

			$sql_ins_work = "UPDATE `users` SET `prof` = '$work' WHERE `email` = '$email'";
			$res_work = mysqli_query($mysql_second, $sql_ins_work);

			mysqli_close($mysql_second);

			header("Refresh:0");
		}


		if (!$errors) {
			// $_SESSION["study"] = $study;

			// mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);                //**
			// $mysql_third = new mysqli('localhost', 'root', '', 'factotum_base');     //**
			// mysqli_set_charset($mysql_third, $charset);                             //**

			// $sql_ins_work = "UPDATE `users` SET `prof` = '$work' WHERE `email` = '$email'";
			// $res = mysqli_query($mysql_second, $sql_ins_work);

			// mysqli_close($mysql_third);   //**
			// header("Refresh:0");         //**
		}
	}

 ?>

 <?php

	$title = "Factotum - профиль пользователя";
	include_once "blocks/head.php";

	$full_user_name = $_COOKIE['user']; 
 ?>

 <body>
 	<?php include_once "blocks/topline.php";?>
	
	<div class="profile__page">
		<div class="profile__content">

			<div class="profile__set-btn">
				<a href="prof_sett.php" class="profile__set-btn-link">
					<i class="fas fa-cog"></i>
				</a>
			</div>

			<div class="profile__avatar">
				<a href="#" class="profile__avatar-link"></a>
				<div class="profile__avatar_circle">
					<i class="fas fa-user"></i>
					<!-- <img src="" alt=""> -->
				</div>
			</div>

			<h3 class="profile__name"><?=$full_user_name?></h3>
			<hr class="profile__hr" />
			<div class="profile__status">Мой статус</div>
			
			<!-- добавить это если чужая страница -->
			<!-- <div class="profile__head-btns">
				<button class="profile__wrt-btn btn btn__enter">Написать</button>
				<a href="#" class="profile__mark"><i class="far fa-bookmark"></i></a>
			</div> -->

			<div class="profile__about">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero ipsa qui consectetur molestias fugiat quam blanditiis beatae, alias soluta corrupti doloribus pariatur nostrum at, quo dolor aliquam, laboriosam placeat officiis.</div>

			<hr class="profile__hr profile__hr_long" />
			
			<form name="prof_change" method="post" >
				<!-- <?php //if($work_str == 0 || $db_work_mas['prof'] == ''): ?> -->
				<?php if($db_work_mas['prof'] == ''): ?>
					<label class="profile__warn"><i class="fas fa-exclamation-triangle"></i> 
					Чтобы участвовать в поиске необходимо указать профессию или образование</label>
				<?php endif; ?>
				<!-- <label class="profile__warn"><i class="fas fa-exclamation-triangle"></i> 
				Чтобы участвовать в поиске необходимо указать профессию или образование</label> -->
				
				<br><br>

				<div class="profile__work-block">
					<div class="profile__work">
						<i class="fas fa-briefcase"></i>
						<!-- <p><a class="link_gr" href="#">Заполните поле</a></p>  -->
<!-- 					<?php //if($work_str !== 0): ?>
							<input autocomplete="off" type="text" placeholder="<?php $work_str;?>" class="profile__input-chang" name="work">
						<?php //else: ?>
							<input autocomplete="off" type="text" placeholder="Профессия" class="profile__input-chang" name="work">
						<?php //endif; ?> -->
						<input autocomplete="off" type="text" placeholder="<?php echo $work_str;?>" class="profile__input-chang" name="work">
						<span class="profile__error" id="prof-err1"><?=$error_work?></span>
					</div>
				</div>
				<div class="profile__study-block">
					<div class="profile__study">
						<i class="fas fa-graduation-cap"></i>
						<!-- <p><a class="link_gr" href="#">Заполните поле</a></p>  -->
						<input autocomplete="off" type="text" placeholder="Место учебы" class="profile__input-chang" name="study">
						<span class="profile__error" id="prof-err2"><?=$error_study?></span>
					</div>
				</div>
				<input type="submit" name="save" value="Сохранить изменения" class="profile__chang-save btn btn__enter">
			</form>

		</div>
	</div>


	<?php include_once "blocks/scripts.php" ?>
 	<!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/e35bb9b698.js" crossorigin="anonymous"></script>
	<script src="js/common.js"></script> -->
 </body>