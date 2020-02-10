<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>"Адаптер" | Шаблоны проектирования</title>
	</head>
	<body>
<?php

trait TAdapter {
	public function sum($a, $b)	{
		$method = $this->method;
		return $this->$method($a, $b);
	}
}

class First {
	use TAdapter;
	private $method = 'first_sum';
	function first_sum($a, $b)	{
		return $a + $b;
	}
}

class Second  {
	use TAdapter;
	private $method = 'second_sum';
	function second_sum($a, $b)	{
		return $a + $b;
	}
}


	$obj_1 = new First();
	echo $obj_1->sum(123, 15);
	echo '<br>';

	$obj_2 = new Second();
	echo $obj_2->sum(12, 15);
	echo '<br>';
?>
	</body>
</html>
