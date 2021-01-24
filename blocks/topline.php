<?php
	$user_name = '';

	$cut_pos = strpos($_COOKIE['user'], " ");
	if (!$cut_pos) {
		$user_name = $_COOKIE['user'];
		// echo "empty";
	} else if ($cut_pos) {
		// echo "full";
		$user_name = substr($_COOKIE['user'], 0, $cut_pos);
	} else if ($_COOKIE['user'] == ''){
		$user_name = "Профиль";
	}

	/////Если профиль - убрать "созданиие объявления"
	$cur_url = $_SERVER['REQUEST_URI'];
	// echo $cur_url;
	///////////////////////////////
	// Создание обхявления



	//////////////////////////////

?>

<!-- <?php
	// popup Создание объявления
	// include_once "blocks/create_trip_block.php";
?> -->

<div class="topline">
	<div class="logo topline__logo">
		<div class="logo__ico">
			<a href="/"><img src="img/icons/logo1.svg" alt="logo"></a>
		</div>
		<a href="/" class="logo__link_blue">
			<h3 class="logo__text">Factotum<h3>
		</a>
	</div>
	<nav class="main-mnu">
	<?php if($_COOKIE['user'] == '' || $cur_url == '/profile.php'): ?>
		<a class="main-mnu__item" id="btn-create-post" style="display: none;"><i class="fas fa-plus"></i></a>
	<?php else: ?>
		<a class="main-mnu__item" id="btn-create-post"><i class="fas fa-plus"></i></a> <!--добавить объявление -->
	<?php endif; ?>
		<a href="/" class="main-mnu__item">Главная</a> <!--поиск по объявлениям-->
		<a href="/search.php" class="main-mnu__item">Поиск</a> <!--поиск по людям-->
		<a href="/trips.php" class="main-mnu__item">Маршруты</a> 
	</nav>
	<?php if($_COOKIE['user'] == ''): //вывводит "войти"" если user не авторизован ?>
		<button class="btn btn__enter btn__enter_top" id="auth-btn">Войти</button>
	<?php else: ?>
		<div class="btn__slide-wrap" id="dropdown-wrap">
			<button class="btn btn__profile btn__profile_top " id="prof-btn"><i class="far fa-user"></i></button>
			<div class="btn__down-mnu" id="dropdown-mnu">
				<div class="btn__down-inv-top"></div>
				<nav>
					<ul class="btn__down-list">
						<li class="btn__list-item"><a class="btn__list-link" href="/profile.php">
							<i class="fas fa-user"></i><!--  Профиль --> <?=$user_name?></a>
						</li>
						<li class="btn__list-item"><a class="btn__list-link" href="#">
							<i class="far fa-comment"></i> Сообщения</a>
						</li>
						<li class="btn__list-item"><a class="btn__list-link" href="#">
							<i class="fas fa-cog"></i> Настройки</a>
						</li>
						<li class="btn__list-item"><a class="btn__list-link" href="#">
							<i class="far fa-bookmark"></i> Избранное</a>
						</li>
						<li class="btn__list-item"><a class="btn__list-link" href="../php/exit.php">
							<i class="far fa-arrow-alt-circle-left"></i> Выход</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	<?php endif;?>
</div>