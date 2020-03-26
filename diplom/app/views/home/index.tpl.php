<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Сократить ссылку быстро и качественно">
    <title>Сокращатель | Sav4yk.ru</title>
    <link href="/public/css/reset.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" crossorigin="anonymous">
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
        <h1 class="cover-heading">Сократи длинную ссылку</h1>
        <p class="lead">Вам нужно сократить ссылку? Сейчас мы это сделаем!</p>
        <form action="/" class="align-items-center w-100" method="post">
            <div class="form-row align-items-center w-100">
                <div class="col-12">
                    <input type="text" class="form-control mb-2 text" id="full-link" name="full-link" placeholder="Введите длинную ссылку" />
                </div>
            </div>
            <div class="form-row align-items-center w-100">
                <div class="col-12">
                    <input type="text" class="form-control mb-2 text" id="short-link" name="short-link" placeholder="Введите короткую ссылку" />
                </div>
            </div>
            <div class="form-row align-items-center w-100">
                <div class="col-12">
                    <button type="submit" class="btn btn-secondary mb-2">Сократить <i class="fas fa-cut"></i></button>
                </div>
            </div>
            <div class="error"><?php if (isset($data['message'])) echo $data['message']; ?></div>
        </form>

    <?php if(isset($data['links']) && sizeof($data['links'])!=0): ?>
        <h2 class="mt-2">Сокращенные ссылки</h2>
        <div class="shortlinks">

            <?php foreach ($data['links'] as $link):?>
                <div class="shortlink text-left rounded mb-2 p-2">
                    <div class="row">
                        <div class="col-12">
                            <b>Длинная:</b> <?=$link['full_link'] ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <b>Короткая:</b> <a href="<?=$link['short_link'] ?>" target="_blank">http://<?=$_SERVER['SERVER_NAME'].'/'.$link['short_link'] ?></a>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6">
                            <button type="button" class="btn btn-secondary mb-2" OnClick="copuBuf('http://<?=$_SERVER['SERVER_NAME'].'/'.$link['short_link'] ?>')">Скопировать в буфер <i class="fas fa-copy"></i></button>
                        </div>
                        <div class="col-6 text-right">
                            <form action="/" method="post">
                                <input type="hidden" name="dellink" value="<?=$link['id'] ?>">
                                <button type="submit" class="btn btn-secondary mb-2">Удалить <i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>

    <?php endif;?>

    </main>
<?php require_once 'public/blocks/footer.php'; ?>
</div>
<script>
    function copuBuf($link) {
        const el = document.createElement('textarea');
        el.value = $link;
        el.setAttribute('readonly', '');
        el.style.position = 'absolute';
        el.style.left = '-9999px';
        document.body.appendChild(el);
        el.select();
        document.execCommand('copy');
        document.body.removeChild(el);
    }
</script>
</body>
</html>
