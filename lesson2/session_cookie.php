<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">
		<title>PHP</title>
	</head>
	<body>
		<form action="/action_session_cookie.php" method="post">
			Имя
			<input type="text" name="name"><br/>
			email
			<input type="email" name="email"><br/>
			<button type="submit">Отправить</button>
		</form>
		<?php
		if ($_SESSION['name']!="" || $_SESSION['email']!="") {
		echo 'Имя пользователя: '.$_SESSION['name'].'<br/>';
		echo 'Почта пользователя: '.$_SESSION['email'].'<br/>';
		session_destroy();
	}
	if ($_COOKIE['name']!="" || $_COOKIE['email']!="") {
	echo 'Имя пользователя: '.$_COOKIE['name'].'<br/>';
	echo 'Почта пользователя: '.$_COOKIE['email'].'<br/>';

}
		 ?>
	</body>
</html>
