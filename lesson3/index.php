<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<?php
				$user = 'root';
				$password = '';
				$db = 'testing';
				$host = 'localhost';

				$dsn = 'mysql:host='.$host.';dbname='.$db;
				$pdo = new PDO($dsn, $user, $password);

				$query = $pdo -> query('SELECT * FROM `users` ORDER BY `id` DESC LIMIT 2');
				while($row = $query->fetch(PDO::FETCH_ASSOC)) { // вывод как массив
					echo '<h1>'.$row['login'].'</h1><p><b>Email:' . $row['email']. '</b></p>';
				}

				$query = $pdo -> query('SELECT * FROM `users`');
				while($row = $query->fetch(PDO::FETCH_OBJ)) { // вывод как объект
					echo '<h1>'.$row->login.'</h1><p><b>Email:' . $row->email. '</b></p>';
				}

				$name = 'Петр';
				$sql = 'SELECT `name`, `id`, `email` FROM `users` WHERE `name` = ?';
				$query = $pdo->prepare($sql);
				$query->execute([$name]); //используя массив
				$users = $query->FetchAll(PDO::FETCH_OBJ);
				var_dump($users);
				foreach($users as $user) {
					echo $user->email.'<br>';
				}

				$name = 'Петр';
				$sql = 'SELECT `name`, `id`, `email` FROM `users` WHERE `name` = :name';
				$query = $pdo->prepare($sql);
				$query->execute(['name' => $name]); //используя ассоциативный массив
				$users = $query->FetchAll(PDO::FETCH_OBJ);
				var_dump($users);
				foreach($users as $user) {
					echo $user->email.'<br>';
				}
/*
				$login = 'codi999';
				$email = 'test@test.ru';
				$name = 'Влад';
				$surname = 'Дударь';

				$sql = 'INSERT INTO users(login, email, name, surname) VALUES (:login, :email :name, :surname)';
				$query = $pdo->prepare($sql);
				$query->execute(['login' => $login, 'email' => $email, 'name' => $name, 'surname' => $surname]);
*/

		?>
	</body>
</html>
