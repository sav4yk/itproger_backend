<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$data['title']?></title>
    <meta name="description" content="<?=$data['title']?>" />

    <link rel="stylesheet" href="/public/css/main.css" type="text/css" charset="utf-8">
    <link rel="stylesheet" href="/public/css/product.css" type="text/css" charset="utf-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" crossorigin="anonymous">
</head>
<body>
<?php require_once 'public/blocks/header.php'; ?>

<div class="container main">
    <a href="/categories/<?=$data['category']?>">Назад</a>
    <h1><?=$data['title']?></h1>
    <div class="info">
        <div>
            <img src="/public/img/<?=$data['img']?>" alt="<?=$data['title']?>">
        </div>
        <div>
                <p><?=$data['anons']?></p>
                <p><?=$data['text']?></p>
        </div>
        <div>
            <button class ="btn"> Купить за <?=$data['price']?> рублей</button>
        </div>
    </div>

</div>

<?php require_once 'public/blocks/footer.php'; ?>
</body>
</html>