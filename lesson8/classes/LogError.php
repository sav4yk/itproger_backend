<?php
    require "../LogInterface.php"
    class LogError implements ILog {
        public function log($msg) {
            echo $msg;
        }
    }

    class DBLog implements ILog {
        public function log($msg) {
            // добавлять данные в БД
        }
    }
