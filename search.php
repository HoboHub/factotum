<?php
	header('Content-Type: text/html; charset=utf-8');
	session_start(); 
	// $_SESSION['url'] = $_SERVER['REQUEST_URI'];

	$url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	$url = explode('?', $url);
	$url = $url[0];

	$_SESSION['url'] = $url;

	if (isset($_POST['request'])) {

		$tripSearchRes = filter_var(trim($_POST['request']), FILTER_SANITIZE_STRING);

		if ($tripSearchRes !== "") {
			$_SESSION['search'] = $tripSearchRes;
			header("Location: /result_search.php?search=2");
		}
	}

	// popup Создание объявления
	include_once "blocks/create_trip_block.php";
?>

<?php
	$title = "Factotum - найди попутчика";
	include_once "blocks/head.php";

	$bg_url = "img/for header/12.jpg"; //bg на странице поиска (по объявлениям)
	$slogan = "Ищите места, а люди найдутся"; //слоган на странице поиска
	$placeholder = "Непал";
	$search_label = "ХОЧУ В";
?>
<body>
	
	<?php include_once "blocks/topline.php";?> 

	<?php include_once "blocks/popup_auth.php";?>

	<?php include_once "blocks/search_block.php"; ?>
	
	<!-- copyright -->
	<?php include_once "blocks/copyright.php" ?>
	<!--  -->
	
	<!-- scripts -->
	<?php include_once "blocks/scripts.php" ?>
	<!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/e35bb9b698.js" crossorigin="anonymous"></script>
	<script src="js/common.js"></script> -->
</body>
</html>