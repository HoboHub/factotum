<?php
	header('Content-Type: text/html; charset=utf-8');
	session_start();

	if (isset($_POST['request'])) {

		$personSearchRes = filter_var(trim($_POST['request']), FILTER_SANITIZE_STRING);

		if ($personSearchRes !== "") {
			$_SESSION['search'] = $personSearchRes;
			header("Location: /result_search.php?search=1");
		}
	}

	$personSearchRes = $_SESSION['search'];


	if($_GET["search"] == 1) {
		mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
		$mysql_search = new mysqli('localhost', 'root', '', 'factotum_base');
		mysqli_set_charset($mysql_search, $charset);

		//проверка на подключение к бд
		if (mysqli_connect_errno()) {
			printf("Не удалось подключиться: %s\n", mysqli_connect_error());
			exit();
		}

		$db_work = $mysql_search->query("SELECT `name`, `status`, `reg_date` FROM `users` WHERE `prof` = '$personSearchRes'");
		

		//добавляем значения в массив
		$row_mas = array();
		while($row = mysqli_fetch_assoc($db_work)) {
			// echo $row['id'] . $row['name'] . $row['status'] . '<br>';
			$row_mas[] = array_values($row);
		}

		$db_work->close();

		// echo count($row_mas);

		//
		// echo "<br>" .count($row_mas);

    	// echo $row_mas;
    		
    		// $db_res_mas[] = $row['id'] . $row['name'] . $row['status'];


		// $db_work_mas = $db_work->fetch_assoc();

		// echo count($db_work_mas);

		// if ($db_work_mas['prof'] == '') {
		// 	echo "Ничего не найдено :(";
		// 	// $work_str = "Профессия";
		// }else if (count($db_work_mas) !== 0) {
		// 	echo $db_work_mas['name'];
		// 	echo "<br>";
		// 	echo $db_work_mas['prof'];
		// 	// $work_str = $db_work_mas['prof'];
		// } else {
		// 	echo "Непонятно";
		// 	// $work_str = "Профессия";
		// }

		mysqli_close($mysql_search);

		// echo "Результат = ".$row_mas[0];
	}

	//////////////////////////////////////////////

	// if($_GET["search"] == 2) {
	// 	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	// 	$mysql_trip_search = new mysqli('localhost', 'root', '', 'factotum_base');
	// 	mysqli_set_charset($mysql_trip_search, $charset);

	// 	//проверка на подключение к бд
	// 	if (mysqli_connect_errno()) {
	// 		printf("Не удалось подключиться: %s\n", mysqli_connect_error());
	// 		exit();
	// 	}

	// 	// $db_place = $mysql_search->query("SELECT `name`, `status`, `reg_date` FROM `users` WHERE `prof` = '$personSearchRes'");
		

	// 	//добавляем значения в массив
	// 	$trip_mas = array();
	// 	while($trip = mysqli_fetch_assoc($db_place)) {
	// 		$trip_mas[] = array_values($trip);
	// 	}

	// 	$db_place->close();

	// 	// echo count($row_mas);

	// 	mysqli_close($mysql_trip_search);

		// echo "Результат = ".$row_mas[0];
	// }

?>

<?php
	$title = "Factotum - результат поиска";
	include_once "blocks/head.php";
?>

<body>
	<!-- topline header -->
	<?php include_once "blocks/topline.php";?>
	<!-- authorize popup block-->
	<?php include_once "blocks/popup_auth.php";?>
	
	<!-- input и кнопки поиска -->
	<?php $search_label = "";?>
	<?php include_once "blocks/form_search.php" ?>


	<?php if($_GET["search"] == 1): ?>
		<div class="result__content">
			<ul class="result__list">
				<?php
					if (count($row_mas) == 0) {
						echo "<img src='img/icons/404_white.png' alt='404' style='width: 30%; margin-top: -50px'>";
						// echo "404";
						// exit();
					}
					for($i=0; $i<count($row_mas); $i++) {
						for ($j=0; $j<count($row_mas[$i]); $j++) {
							$li_insert = '<li class="result__item result__person" id="person-it-'.$i.'">
									<a href="#" class="result__item-link"></a>
									<div class="result__item-img"><img src="img/avatars/'.($i+1).'.jpg" alt="img"></div>
									<div class="result__item-name">'. $row_mas[$i][0] .'</div>
									<div class="result__item-status">'. $row_mas[$i][1] .'</div>
									<div class="result__item-reg">На сайте с '. date("M Y", $row_mas[$i][2]+0) .'</div>
								</li>';
						}
						echo $li_insert;
					}
				?>
			</ul>
		</div>
	<?php endif; ?>

	<!-- <img src='img/icons/404_white.png' alt='404' style='width: 100%'> -->


	<?php include_once "blocks/scripts.php" ?>
	<!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/e35bb9b698.js" crossorigin="anonymous"></script>
	<script src="js/common.js"></script> -->
</body>