<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Регистрация</title>
    <meta name="description" content="Регистрация" />

    <link rel="stylesheet" href="/public/css/main.css" type="text/css" charset="utf-8">
    <link rel="stylesheet" href="/public/css/form.css" type="text/css" charset="utf-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" crossorigin="anonymous">
</head>
<body>
<?php require_once 'public/blocks/header.php'; ?>

<div class="container main">
    <h1>Регистрация</h1>
    <p>Здесь вы можете зарегистрироваться</p>
    <form action="/user/reg" method="post" class="form-control">
        <input type="text" name="name" placeholder="Введите имя" value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>"><br>
        <input type="email" name="email" placeholder="Введите email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"><br>
        <input type="password" name="password" placeholder="Введите пароль" value="<?php if (isset($_POST['pass'])) echo $_POST['pass']; ?>"><br>
        <input type="password" name="re_password" placeholder="Повторите пароль" value="<?php if (isset($_POST['pass'])) echo $_POST['pass']; ?>"><br>

        <div class="error"><?php if (isset($data['message'])) echo $data['message']; ?></div>
        <button class="btn" id="send">Готово</button>
    </form>
</div>

<?php require_once 'public/blocks/footer.php'; ?>
</body>
</html>