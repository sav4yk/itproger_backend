<?php

    function __autoload($class) {
        $class = str_replace("\\", "/", $class);
        echo $class.'<br>';
        include $class.'.php';
    }


    require_once 'file1.php';
    require_once 'file2.php';

    $user = new app\User();
    echo '<br>';
    $user = new app\core\User();

