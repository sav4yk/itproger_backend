<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Сократить ссылку быстро и качественно">
    <title>Контакты | Сокращатель</title>
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
        <a class="navbar-brand" href="#">
            <img src="/public/img/emblem.png" class="" alt="">
        </a>
        <h1 class="cover-heading">Обратная связь</h1>
        <p class="lead">Напишите нам, если у вас есть вопросы</p>
        <form action="/home/contact" class="align-items-center w-100 needs-validation" method="post">
            <div class="form-row align-items-center w-100">
                <div class="col-12">
                    <input type="text" class="form-control mb-2 text" id="name" name="name"
                           value ="<?php if (isset($data['name'])) echo $data['name']; ?>" placeholder="Введите имя" value ="<?php if (isset($data['name'])) echo $data['name']; ?>" required />
                </div>
            </div>
            <div class="form-row align-items-center w-100">
                <div class="col-12">
                    <input type="email" class="form-control mb-2 text" autocomplete="new-email" id="email" name="email"
                           value="<?php if (isset($data['email'])) echo $data['email']; ?>" placeholder="Введите email" value ="<?php if (isset($data['email'])) echo $data['email']; ?>" required/>
                </div>
            </div>
            <div class="form-row align-items-center w-100">
                <div class="col-12">
                    <input type="number" class="form-control mb-2 text" id="age" name="age"
                           value ="<?php if (isset($data['age'])) echo $data['age']; ?>" placeholder="Введите возраст" value ="<?php if (isset($data['age'])) echo $data['age']; ?>"required/>
                </div>
            </div>
            <div class="form-row align-items-center w-100">
                <div class="col-12">
                    <textarea class="form-control mb-2 text" id="message" name="message" rows="3" placeholder="Введите само сообщение" required><?php if (isset($data['mes'])) echo $data['mes']; ?></textarea>
                </div>
            </div>
            <div class="form-row align-items-center w-100">
                <div class="col-12">
                    <button type="submit" class="btn btn-secondary mb-2">Отправить</button>
                </div>
            </div>

            <div class="text-success"><?php if (isset($data['good_message'])) echo $data['good_message']; ?></div>
            <div class="error"><?php if (isset($data['message'])) echo $data['message']; ?></div>
        </form>

    </main>
<?php require_once 'public/blocks/footer.php'; ?>
</div>

</body>
</html>
