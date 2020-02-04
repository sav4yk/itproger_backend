<?php
	$error = '';
	if (!isset($_COOKIE['log']) || $_COOKIE['log'] == '')
		$error = 'Нет доступа';

		$id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);

	if($id <= 0)
			$error = 'Ошибка удаления пользователя';

	if ($error != '') {
		echo $error;
		exit();
	}

	require_once '../mysql_connect.php';

	$sql = 'DELETE FROM `users` WHERE `id` = :id LIMIT 1';
	$query = $pdo->prepare($sql);
	$query->execute(['id' => $id]);
		echo 'Готово';


?>
