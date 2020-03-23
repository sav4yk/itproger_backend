<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Корзина товаров</title>
    <meta name="description" content="Корзина товаров" />

    <link rel="stylesheet" href="/public/css/main.css" type="text/css" charset="utf-8">
    <link rel="stylesheet" href="/public/css/products.css" type="text/css" charset="utf-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" crossorigin="anonymous">
</head>
<body>
<?php require_once 'public/blocks/header.php'; ?>

<div class="container main">
    <h1>Корзина товаров</h1>
    <?php if (!isset($data['products']) || count($data['products']) == 0): ?>
        <p><?php if (isset($data['empty'])) echo $data['empty']; ?></p>
    <?php else: ?>
        <form action="/basket/removeallitem" method="post">
            <input type="hidden" name="remove_all" value="all">
            <button class ="btn">Удалить все <i class="fas fa-trash"></i></button>
        </form>

        <div class="products">
            <?php
                $sum = 0;
                for($i = 0; $i < count($data['products']); $i++):
                    $sum += $data['products'][$i]['price'];
            ?>
            <div class="row">
                <img src="/public/img/<?=$data['products'][$i]['img']?>" alt="<?=$data['products'][$i]['title']?>">
                <h4><?=$data['products'][$i]['title']?></h4>
                <span><?=$data['products'][$i]['price']?> руб.</span>
                <form action="/basket/removeOneItem" method="post">
                    <input type="hidden" name="item_id" value="<?=$data['products'][$i]['id']?>">
                    <button class ="btn">Удалить <i class="fas fa-trash-alt"></i></button>
                </form>

            </div>    
            <?php endfor; ?>
            <button class="btn">Приобрести (<b><?=$sum?></b>)</button>
        </div>


    <?php endif;?>
</div>

<?php require_once 'public/blocks/footer.php'; ?>
</body>
</html>