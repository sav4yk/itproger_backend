<?php
	$login = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING));
	$pass = trim(filter_var($_POST['pass'], FILTER_SANITIZE_STRING));

	$error = '';
	if(strlen($login) <= 3)
					$error = 'Введите login';
						else 	if(strlen($pass) <= 3)
								$error = 'Введите пароль';

	if ($error != '') {
		echo $error;
		exit();
	}
	$hash = "fasd436fhgdhbcngdg";
	$pass = md5($pass . $hash);

	require_once '../mysql_connect.php';

	$sql = 'SELECT `id` FROM `users` WHERE `login` = :login && `pass` = :pass';
	$query = $pdo->prepare($sql);
	$query->execute(['login' => $login, 'pass' => $pass]);
	$user = $query->fetch(PDO::FETCH_OBJ);
	if (!$user || ($user->id == 0)) {
		echo 'Такого пользователя не существует';
	} else {
		setcookie('log', $login, time() + 3600 * 24 * 30,"/");
		echo 'Готово';
}
?>
