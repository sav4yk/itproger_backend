<!DOCTYPE html>
<html lang="ru" >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Форма рпегистрации</title>
</head>
<body>
<?php
if (isset($data)) {
    echo 'Данные полученные от пользователя:<br><b>Логин:</b> ' .
        $data['login'] . '<br><b>Email:</b> ' .   $data['email'];
}
?>
    <h2>Форма регистрации</h2>
    <form method="post">
        <input type="text" name="login" id="login" value="" class="form-control" placeholder="Введите логин">
        <br>
        <input type="email" name="email" id="email" value="" class="form-control" placeholder="Введите email">
        <button type="submit" name="reg_user">Добавить</button>
    </form>
</body>
</html>

