<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<?php
		abstract class Car {
			protected $speed;
			protected $color;
			abstract protected function showInfo();
		}

		class BMW extends Car {
			function __construct($speed) {
				$this->speed = $speed;
			}
			public function showInfo() {
				echo "Скорость автомобилья: " . $this->speed;
			}
		}
		
		$m3 = new BMW(240);
		$m3->showInfo();
		 ?>
	</body>
</html>
