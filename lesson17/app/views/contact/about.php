<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Страница про компанию</title>
    <meta name="description" content="Страница про компанию" />

    <link rel="stylesheet" href="/public/css/main.css" type="text/css" charset="utf-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" crossorigin="anonymous">
</head>
<body>
    <?php require_once 'public/blocks/header.php'; ?>

    <div class="container main">
        <h1>Про компанию</h1>
        <p>Здесь просто текст про компанию</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad assumenda blanditiis culpa, cumque impedit,
            itaque laborum natus nemo nihil pariatur placeat porro praesentium, quam repellendus sit totam veniam.
            Veritatis, voluptate.</p>
        <?php
        if (isset($data['param']) && $data['param']!='') {
            echo "<br><h2><b>Есть дополнительный параметр</b></h2><br>Данные из URL: <b>" . $data['param'] . "</b></p>";
        }
        ?>
    </div>

    <?php require_once 'public/blocks/footer.php'; ?>
</body>
</html>