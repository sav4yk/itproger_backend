<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Сокрытить ссылку быстро и качественно">
    <title>Личный кабинет | Сокращатель</title>
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
        <h1>Кабинет пользователя <?=$data['user']['login'] ?></h1>
        <div class="user-info">
            <p>Привет, <b><?=$data['user']['login'] ?></b></p>
            <div class="error"><?php if (isset($data['message'])) echo $data['message']; ?></div>

            <form action="/user/dashboard" method="post">
                <input type="hidden" name="exit_btn">
                <button type="submit" class="btn btn-secondary mb-2">Выйти</button>
            </form>
        </div>


    </main>
    <?php require_once 'public/blocks/footer.php'; ?>
</div>
</body>
</html>
