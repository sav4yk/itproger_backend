<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">
		<title>PHP</title>
	</head>
	<body>
		<h1><b>Все заказы</b></h1>
		<?php
		$user = 'root';
		$password = '';
		$db = 'testing';
		$host = 'localhost';

		$dsn = 'mysql:host='.$host.';dbname='.$db;
		$pdo = new PDO($dsn, $user, $password);

		$login = 'john';
		$sql = 'SELECT  `id`, `login`, `pass` FROM `users` WHERE `login` = ?';
		$query = $pdo->prepare($sql);
		$query->execute([$login]);
		$users = $query->FetchAll(PDO::FETCH_OBJ);


		$category = 'hats';
		$sql = 'SELECT  `id`, `title`, `price`, `category` FROM `items` WHERE `category` = ?';
		$query = $pdo->prepare($sql);
		$query->execute([$category]);
		$items = $query->FetchAll(PDO::FETCH_OBJ);


		foreach($users as $user) {
			foreach($items as $item) {
				$sql = 'INSERT INTO orders(user_id, item_id) VALUES (:user_id, :item_id)';
				$query = $pdo->prepare($sql);
				$query->execute(['user_id' =>  $user->id, 'item_id' => $item->id]);
			}
		}

		$query = $pdo -> query('SELECT users.login, items.title FROM `users`, `orders`,`items` WHERE users.id = orders.user_id AND items.id=orders.item_id');
		while($row = $query->fetch(PDO::FETCH_OBJ)) { // вывод как объект
			echo '<b>'.$row->login.'</b> - <u>' . $row->title. '</u><br>';
		}
		?>
	</body>
</html>
