<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>PHP</title>
</head>
<body>
	<h2>Форма регистрации</h2>
	<form class="" action="check.php" method="post">
		<input type="text" name="name" value="John"><br/>
		<input type="email" name="email" value="example@some.ru"><br/>
		<input type="text" name="tel" value="+780000000"><br/>
		Выберите любимые автомобили<br/>
		<select name="cars[]" size="4" multiple>
			<option selected value="BMV">BMV</option>
			<option value="Mercedes">Mercedes</option>
			<option selected value="Audi">Audi</option>
			<option value="Volvo">Volvo</option>
		</select><br/>
		Введите любимые фильмы. Минимум 2 или более. Вводить через запятую<br/>
		<input type="text" name="films" value="Титаник, Аватар"><br/>
		<button type="submit" style="background: red; width: 100px; height:30px; color:white;">Отправить</button>
	</form>
</body>
</html>
