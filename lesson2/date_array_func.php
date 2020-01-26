<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">
		<title>PHP</title>
	</head>
	<body>
		<?php
		date_default_timezone_set("Europe/Moscow");
		echo time().'<br/>';

		echo date('H:i:s', time()).'<br>';
		//Используем DATETIME
		$date_now = new DateTime();
		$date_now->modify('+1 hour');
		echo $date_now->format('Время - H:i:s');
		echo '<hr>';
		$arr = [5, 7, 2, 89.2, 8];
		$arr_new = [6, 81, 3];
		$arr_merge = array_merge($arr, $arr_new); //объединение массивов
		print_r($arr_merge);
		echo '<br/>';

		$arr_slice = array_slice($arr_merge,0,2);//обрезание массива
		print_r($arr_slice);
		echo 'slice<br/>';
		unset($arr[2]); //удаление элемента с индексом 2 из массива
		echo in_array(2,$arr) ? "Да, есть" : "Нет такого"; //проверка наличия элемента 2 в массиве
		echo count($arr).'<br/>';
		var_dump($arr);
		print_r($arr); //вывод массива
		sort($arr); //сортировка по возрастанию
		rsort($arr); //сортировка по убыванию
		echo '<br>';
		print_r($arr);

		$arr_1 = ["a" => 102, "b" => 56, "c" =>87];
		echo '<br>';
		asort($arr_1); //сортирует по значениям элемента по возрастанию
		arsort($arr_1); //сортирует по значениям элемента по убыванию
		krsort($arr_1); //сортирует по ключу
		krsort($arr_1); //сортирует по ключу

		shuffle($arr);

		print_r($arr);

		 ?>
	</body>
</html>
