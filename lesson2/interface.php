<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
<?php
interface Human
{
	public function talk();
	public function walk();
}

interface Mutant
{
	public function fly();
}

class Person implements Human, Mutant {
	function talk() {
		echo 'Человек говорит<br>';
	}
	function walk() {
		echo 'Человек ходит<br>';
	}
	function fly() {
			echo 'Мутант летит<br>';
	}
}

$bob = new Person();
$bob->talk();
$bob->walk();
$bob->fly();

 ?>
	</body>
</html>
