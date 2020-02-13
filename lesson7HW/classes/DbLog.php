<?php
    class DbLog implements ILog
    {
        public $msg = '';

        public function log($msg) {
            $this -> msg = $msg;
            echo 'Windows DbLog ' . $msg;
        }
    }
