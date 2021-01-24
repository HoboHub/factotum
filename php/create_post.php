<?php 
	header('Content-Type: text/html; charset=utf-8');
	session_start();

	$userMail = filter_var(trim($_COOKIE['email']), FILTER_SANITIZE_STRING);

	$name = $_SESSION["postName"];
	$descr = $_SESSION["postDescr"];
	$postDate = $_SESSION["postTime"];

	$startDate = $_SESSION["startDate"];
	$endDate = $_SESSION["endDate"];
	$period = $_SESSION["period"];



	// $tags = $_SESSION["tags"];	
	// echo "Теги: " . $tags;


	// echo "Время = " . $postDate;

	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	$mysqlPost = new mysqli('localhost', 'root', '', 'factotum_base');

	mysqli_set_charset($mysqlPost, $charset);

	$authSelect = $mysqlPost->query("SELECT `id` FROM `users` WHERE `email` = '$userMail'");
	$authIDArr = $authSelect->fetch_assoc();
	
	// echo 'result = ' . $authID['id'];
	$authID = $authIDArr['id'];
	// echo $authID;

	$mysqlPost->query("INSERT INTO `post`(`name`, `descr`, `start_date`, `end_date`, `period`, `author_id`, `post_time`) 
		VALUES('$name', '$descr', '$startDate', '$endDate', '$period', '$authID', '$postDate')");

	// $queryTag = "INSERT INTO `trip_tags`(`name`) VALUES ()";
	// mysqli_query($mysqlPost, query);

	$mysqlPost->close();

	// $mysqlPostTags = new mysqli('localhost', 'root', '', 'factotum_base');
	// mysqli_set_charset($mysqlPost, $charset);

	// $mysqlPostTags->query("INSERT INTO `trip_tags`(`name`) VALUES('...................')");

	// header('Location: /php/insert_new_post.php');
	header('Location: /trips.php');
	// exit();
?>