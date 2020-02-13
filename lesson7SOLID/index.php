<!DOCTYPE html>
<html lang="ru" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Принципы программирования</title>
    </head>
    <body>
    <?php
        require "autoload.php";
        //DRY, DIE, KISS, SOLID и YAGNI
        // DRY - не повторяйся, выноси повторы в отдельную функцию
        //DIE - - || -
        //KISS - не усложняй это глупец. Любую программу необходимо делать
        //макисмально просто. Не изобретай велосипед.
        //YAGNI - вам это не понадобиться. Реализуй только поставленные задачи

        //SOLID
        //S - Single responsibility (Принцип единственной ответственности)
        //Каждый класс выполняет только свои обязанности
        $logError = new LogError():
        $item = new Item($logError);
        $item->setPrice(100);

        //O - Open-closed (Принцип открытости/закрытости)
        //прошлые классы не изменяем, а добавляем новые
        $logError2 = new DbLog():
        $item2 = new Item($logError2);
        $item2->setPrice(100);

        //L - Liskov substitution (Принцип подстановки Барбары Лисков)
        //Все классы наследники должны быть с ожидаемым поведением
        $car = new Car();
        $mercedes = new Mercedes(); // число
        $brokenCar = new BrokenCar(); //строка
        $carMove = new CarMove($mercedes);

        //I - Interface segregation (Принцип разделения интерфейса)
        //Лучше иметь несколько маленьких интерфейсов, чем один большой

        //D - Dependency Invertion (Принцип инверсии зависимостей)
        //Класс и конструкторы в них необходимо строить максимально гибкими

    ?>
    </body>
</html>
