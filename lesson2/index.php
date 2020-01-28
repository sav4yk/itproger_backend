<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">
		<title>PHP</title>
	</head>
	<body>
		<?php
		interface Input
		{
			public function show();	//вывод на страницу переменной, содержащей HTML код input поля
			public function addStyles($arr);	//добавление стилей к input полю
		}

		class InputEmail implements Input	//класс вывода Input поля (тип email)
		{
			private $_html = '<input type="email" name="email">';
			function show()
			{
				echo $this->_html;
			}
			function addStyles($arr)
			{
				echo '<style> input[type=email] { ';
				foreach ($arr as $key => $value) {
					echo $key . ':' . $value . ';';
				}
				echo ' } </style>';
			}
		}

		class InputFile implements Input	//класс вывода Input поля (тип file)
		{
			private $_html = '<input type="file" name="file">';
			function show()
			{
				echo $this->_html;
			}
			function addStyles($arr)
			{
				echo '<style> input[type=file] { ';
				foreach ($arr as $key => $value) {
					echo $key . ':' . $value . ';';
				}
				echo ' } </style>';
			}
		}

		class InputText implements Input	//класс вывода Input поля (тип text)
		{
			private $_html = '<input type="text" name="text">';
			function show()
			{
				echo $this->_html;
			}
			function addStyles($arr)
			{
				echo '<style> input[type=text] { ';
				foreach ($arr as $key => $value) {
					echo $key . ':' . $value . '; ';
				}
				echo ' } </style>';
			}
		}

		//$obj = new InputEmail();
		//$obj = new InputFile();
		$obj = new InputText();
		$arr = ['color'=>'green', 'background'=>'black'];
		$obj->addStyles($arr);
		$obj->show();
		 ?>
	</body>
</html>
