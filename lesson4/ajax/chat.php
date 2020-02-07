<?php
	$mess = trim(filter_var($_POST['mess'], FILTER_SANITIZE_STRING));
	$error = '';
	if(strlen($mess) < 1)
		$error = 'Введите сообщение';

	if ($error != '') {
		echo $error;
		exit();
	}

	require_once '../mysql_connect.php';

	$sql = 'INSERT INTO chat(message) VALUES(?)';
	$query = $pdo->prepare($sql);
	$query->execute([$mess]);
	echo 'Готово';
?>
