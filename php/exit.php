<?php
	setcookie('user', $user['name'], time() - 3600, "/");
	setcookie('email', $user['email'], time() - 3600, "/");

	// setcookie('work', $user['prof'], time() - 3600, "/");
	// setcookie('work'.$curUserId, $work, time() - 3600, "/");

	header('Location: /');
?>