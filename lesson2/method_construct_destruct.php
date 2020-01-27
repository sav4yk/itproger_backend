<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">
		<title>PHP</title>
	</head>
	<body>
		<?php
		class User {
			const PASS = "password";

			public $name = "Default";
			private $surname = "None";
			private $email;
			private $login;
			private $pass;

			function __construct ($name, $surname, $login) {
				$this->name = $name;
				$this->surname = $surname;
				$this->login = $login;

				echo self::PASS . '<br>';
			}

			function __destruct (){
				print 'Уничтожается ' . __CLASS__ . '<br>';
			}

			function showAll($text) {
				echo $text . $this->name . ", " . $this->surname;
			}

			function getSurname() {
				return $this->surname;
			}

		}
		echo User::PASS;
		$admin = new User('Name','Surname','Login');
		$admin->name = "Johns";
		$admin->ShowAll('text');
		echo '<br>';
		echo $admin->getSurname();

		?>
	</body>
</html>
