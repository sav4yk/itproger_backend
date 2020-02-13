<!DOCTYPE html>
<html lang="ru" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Добавление товара</title>
    </head>
    <body>
    <?php
        require "autoload.php";
        $logError = new LogError();
        $products = new Products($logError);
        $products->create("Товар");
    ?>
    </body>
</html>
