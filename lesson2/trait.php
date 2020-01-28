<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<?php
			trait PrintSome {
				public function talk() {
					echo "Привет мир!<br>";
				}
				public function saybye() {
					echo "Пока всем<br>";
				}
			}

			trait Testing {
				public function some() {
					echo "Работа тестовой функции <br>";
				}
			}
			class Test {
				use PrintSome, Testing;
			}

			$obj = new Test();
			$obj -> talk();
			$obj -> saybye();
			$obj -> some();
		 ?>
	</body>
</html>
