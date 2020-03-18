<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Кабинет пользователя</title>
    <meta name="description" content="Кабинет пользовател" />

    <link rel="stylesheet" href="/public/css/main.css" type="text/css" charset="utf-8">
    <link rel="stylesheet" href="/public/css/user.css" type="text/css" charset="utf-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" crossorigin="anonymous">
</head>
<body>
<?php require_once 'public/blocks/header.php'; ?>

<div class="container main">
    <h1>Кабинет пользователя <?=$data['name'] ?></h1>
    <div class="user-info">
        <p>Привет, <b><?=$data['name'] ?></b></p>
        <form action="/user/dashboard" method="post">
            <input type="hidden" name="exit_btn">
            <button class="btn" type="submit">Выйти</button>
        </form>
    </div>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad assumenda blanditiis culpa, cumque impedit,
        itaque laborum natus nemo nihil pariatur placeat porro praesentium, quam repellendus sit totam veniam.
        Veritatis, voluptate.</p>

</div>

<?php require_once 'public/blocks/footer.php'; ?>
</body>
</html>