<?php
	require_once '../mysql_connect.php';

	$sql = 'SELECT * FROM `chat` ORDER BY `id` DESC LIMIT 10';
	$query = $pdo->query($sql);
	if ($query->rowCount() > 0) {
		while ($row = $query->fetch(PDO::FETCH_OBJ)) {
			echo "<div class='alert alert-info mb-2'>$row->message</div>";
		}
	} else {
		echo "<div class='alert alert-warning mb-2'>Пока сообщений еще нет</div>";
	}
?>
