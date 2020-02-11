<!DOCTYPE html>
<html lang="ru" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>"Фабричный метод" | Шаблоны проектирования</title>
	</head>
	<body>
	<?php

		abstract class Button {
			protected $html;

			public function getHtml() {
				return $this->html;
			}
		}

		class InputButton extends Button	{
			protected $html = "<input type='button' value='Кнопка'>";
		}
		class DivButton extends Button	{
			protected $html = "<div>Кнопка</div>";
		}
		class FlashButton extends Button	{
			protected $html = "<button>Кнопка</button>";
		}

		class ButtonFactory {
			public static function create($type){
				$base = 'Button';
				$target = ucfirst($type).$base;

				if(class_exists($target) && is_subclass_of($target, $base))
					return new $target;
				else
					throw new Exception("Класс для создания кнопки был не найден");
			}
		}

		$buttons = array('div', 'input');
		foreach ($buttons as $el) {
			echo ButtonFactory::create($el)->getHtml();
		}
	?>
	</body>
</html>
