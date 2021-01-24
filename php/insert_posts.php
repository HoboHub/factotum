<?php

	function get_posts() {
		mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
		$mysqlGetPost = new mysqli('localhost', 'root', '', 'factotum_base');

		mysqli_set_charset($mysqlGetPost, $charset);
		
		// $sqlGetPost = "SELECT * FROM `post` ORDER BY `id` DESC";
		$sqlGetPost = "SELECT `post`.*, `users`.`name` AS users_name, `users`.`status` AS users_status FROM `post` INNER JOIN `users` ON `post`.`author_id` = `users`.`id` ORDER BY `post`.`id` DESC";

		// $sqlGetPost = "SELECT * FROM `post` INNER JOIN `users` ON `post`.`author_id` = `users`.`id` ORDER BY `post`.`id` DESC";

		$postRes = mysqli_query($mysqlGetPost, $sqlGetPost);

		$posts = mysqli_fetch_all($postRes, MYSQLI_ASSOC);

		return $posts;

		$mysqlGetPost->close(); 
	}

?>