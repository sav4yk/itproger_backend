<!DOCTYPE html>
<html lang="ru" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>"Декоратор" | Шаблоны проектирования</title>
	</head>
	<body>
		<?php
			class Link {
				public $html;

				public function __construct() {
					$this->html = "<a href='/'>Главная</a>";
				}

				public function setHtml($html) {
					$this->html = $html;
				}
				public function getHtml() {
					echo $this->html;
				}
			}

			class StrongLink 	{
				protected $link;

				public function __construct($link){
					$this->link = $link;
					$this->setHtml("<strong>" . $this->link->html . "</strong>");
				}

				public function __call($name, $args) {
					$this->link->$name($args[0]);
				}
			}

			$link = new Link();
			$link = new StrongLink($link);
		  $link -> getHtml();

		 ?>
	</body>
</html>
