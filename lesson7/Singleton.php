<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>"Одиночка" | Шаблоны проектирования</title>
	</head>
	<body>
		<?php
			require "Articles.php";


			$articles = new Articles();
			print_r($articles->getAll());
		 ?>
	</body>
</html>
