<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Главная страница</title>
    <meta name="description" content="Главная страница интернет магазина" />

    <link rel="stylesheet" href="/public/css/main.css" type="text/css" charset="utf-8">
    <link rel="stylesheet" href="/public/css/form.css" type="text/css" charset="utf-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" crossorigin="anonymous">
</head>
<body>
    <?php require_once 'public/blocks/header.php'; ?>

    <div class="container main">
        <h1>Обратная связь</h1>
        <p>Напишите нам, если у вас есть вопросы</p>
        <form action="/contact" method="post" class="form-control">
            <input type="text" name="name" placeholder="Введите имя" value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>"><br>
            <input type="email" name="email" placeholder="Введите email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"><br>
            <input type="text" name="age" placeholder="Введите возраст" value="<?php if (isset($_POST['age'])) echo $_POST['age']; ?>"><br>
            <textarea name="message" placeholder="Введите само сообщение" value="<?php if (isset($_POST['message'])) echo $_POST['message']; ?>"></textarea><br>
            <div class="error"><?php if (isset($data['message'])) echo $data['message']; ?></div>
            <button class="btn" id="send">Отправить</button>
        </form>
    </div>

    <?php require_once 'public/blocks/footer.php'; ?>
</body>
</html>