<?php
	$uploaddir = $_SERVER['DOCUMENT_ROOT'].'/server/img/'; 
	// echo "Корневая папка = " . $_SERVER['DOCUMENT_ROOT'] . '<br>';
	$uploadfile = $uploaddir.basename($_FILES['avatar']['name']);

	if (move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadfile)) {
		// echo "Файл загружен!";
	} else {
		// echo "Ошибка загрузки по причине: " . $_FILES['avatar']['error'];  
		exit();
	}

	header("Location: /");
	exit();
?>
<meta charset="utf-8">