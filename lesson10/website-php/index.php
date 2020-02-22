<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <title>PHP веб сайт</title>
    </head>
    <body>
        <h1>Наш маленький сайт</h1>
        <ul>
            <?php
                $json = file_get_contents("http://items-service");
                $obj = json_decode($json);

                $items = $obj->items;
                foreach ($items as $el) {
                    echo "<li>" . $el . "</li>";
                }
             ?>
        </ul>
    </body>
</html>
