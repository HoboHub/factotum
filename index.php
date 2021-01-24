<?php
	header('Content-Type: text/html; charset=utf-8');
	session_start();

	$url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	$url = explode('?', $url);
	$url = $url[0];

	$_SESSION['url'] = $url; 


	// header('Content-Type: text/html; charset=utf-8');
	if (isset($_POST['request'])) {

		$personSearchRes = filter_var(trim($_POST['request']), FILTER_SANITIZE_STRING);

		if ($personSearchRes !== "") {
			$_SESSION['search'] = $personSearchRes;
			header("Location: /result_search.php?search=1");
		}
	}

?>
<?php 

	// popup Создание объявления
	include_once "blocks/create_trip_block.php";

	$title = "Factotum - поиск профессионалов в путешествие";
	include_once "blocks/head.php";

	$bg_url = "img/for header/8.jpg"; //бэкграунд на главной 
	$slogan = "Ищите попутчиков по навыкам, а не по фотографиям"; //слоган на главной
	$placeholder = "альпинист";
	$search_label = "НУЖЕН";
?>
<body>
	
	<!-- topline header -->
	<?php include_once "blocks/topline.php";?>
	<!-- authorize popup block-->
	<?php include_once "blocks/popup_auth.php";?>

	<!-- main search -->
	<?php include_once "blocks/search_block.php";?>

	
	<!--  -->
	<?php include_once "blocks/copyright.php"?>
	<!--  -->

	<?php include_once "blocks/scripts.php" ?>
	<!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/e35bb9b698.js" crossorigin="anonymous"></script>
	<script src="js/common.js"></script> -->
</body>
</html>