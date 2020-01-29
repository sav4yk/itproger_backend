<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<?php
				$user = 'root';
				$password = 'root';
				$db = 'testing';
				$host = 'localhost';

				$dsn = 'mysql:host='.$host.';dbname='.$db;
				$pdo = new PDO($dsn, $user, $password);

				
		?>
	</body>
</html>
