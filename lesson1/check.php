<?php
$err='';
if (($_POST['name']=="") || strlen($_POST['name'])<3) {	//Проверяем содержит ли поле имя 3 символа или более
	$err='Укажите имя длиннее 3 символов<br/>'; /// а как же Ян?
}
if (($_POST['email']=="") || mb_strlen($_POST['email'])<5) {	//Проверяем содержит ли поле email 5 символов или более
	$err.='Укажите почту длиннее 3 символов<br/>';
}
if (($_POST['tel']=="") || mb_strlen($_POST['tel'])<10) {	//Проверяем содержит ли поле телефон 10 символов или более
	$err.='Укажите номер телефона длиннее 3 символов<br/>';
}
if(!isset($_POST["cars"]) && (in_array("BMV",$_POST["cars"]) || in_array("Mercedes",$_POST["cars"])
|| in_array("Audi",$_POST["cars"]) || in_array("Volvo",$_POST["cars"]))) { //Проверяем была ли выбрана хоть одна любимая машина
	$err.='Укажите хоть одну (можно больше) любимую машину<br/>';
}
$arr=explode(',',$_POST['films']); 	//Разбиваем переменную films с помощью разделителя ","
if (count($arr)<2)  { 	//Проверяем прописал ли пользователь 2 или более любимых фильма
	$err.='Укажите два и более любимых фильма через запятую<br/><a href="/">Назад</a>';
}
if ($err){ //Если в каком-то поле ошибка, то отображаем ее пользователю
	echo $err;
} else { //Если ошибок нет, то отображаем все данные из формы на экран
?>
<h1><b>Вся информация</b></h1>
<?php
	echo $_POST['name'].'<br/>'.$_POST['email'].'<br/>'.$_POST['tel'].'<br/>';
	echo '<b>fav_cars:</b><br><ul>';
	foreach ($_POST["cars"] as $key => $value)
		echo '<li>'.$value.'</li>';
	echo '</ul><br><b>fav_films:</b><br><ul>';
	foreach ($arr as $key => $value)
		echo '<li>'.$value.'</li>';
		echo '</ul>';
}
?>
