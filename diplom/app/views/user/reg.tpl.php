<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Сократить ссылку быстро и качественно">
    <title>Регистрация | Сокращатель</title>
    <link href="/public/css/reset.css" rel="stylesheet">
    <link href="/public/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Favicons -->
    <link rel="icon" href="/public/img/favicon.ico">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <link href="/public/css/short.css" rel="stylesheet">
</head>

<body class="text-center">
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
<?php require_once 'public/blocks/header.php'; ?>
    <main role="main" class="inner cover">
        <a class="navbar-brand" href="/">
            <img src="/public/img/emblem.png" class="" alt="">
        </a>
        <h1 class="cover-heading">Сократи длинную ссылку</h1>
        <p class="lead">Ваших друзей пугают длинные ссылки, занимающие много места в комментариях? Сократи ссылки с помощью нашего сервиса!</p>
        <p class="lead">Прежде чем это сделать зарегистрируйтесь на сайте</p>
        <form action="/user/reg" class="align-items-center w-100" method="post">
            <div class="form-row align-items-center w-100">
                <div class="col-3">
                    <input type="email" class="form-control mb-2 text" autocomplete="new-email" id="email" name="email"
                           value="<?php if (isset($data['email'])) echo $data['email']; ?>" placeholder="Введите email" />
                </div>
                <div class="col-3">
                    <input type="text" class="form-control mb-2 text" id="login" name="login"
                           value ="<?php if (isset($data['login'])) echo $data['login']; ?>" placeholder="Введите логин" />
                </div>
                <div class="col-3">
                    <input type="password" class="form-control mb-2 text" autocomplete="new-password" id="password" name="password" placeholder="Введи пароль" />
                </div>
                <div class="col-3">
                    <input type="password" class="form-control mb-2 text" autocomplete="new-re-password" id="re-password" name="re-password" placeholder="Повтори пароль" />
                </div>
            </div>
            <div class="error"><?php if (isset($data['message'])) echo $data['message']; ?></div>
            <div class="form-row align-items-center w-100">
                <div class="col-auto w-100">
                    <button type="submit" class="btn btn-secondary mb-2">Зарегистрироваться</button>
                </div>
            </div>
            <div class="form-row align-items-center w-100">
                <div class="col-auto w-100">
                    <p>Есть аккаунт? Тогда вы можете <a href="/user/auth">авторизоваться</a></p>
                </div>
            </div>
        </form>

    </main>
<?php require_once 'public/blocks/footer.php'; ?>
</div>
</body>
</html>
