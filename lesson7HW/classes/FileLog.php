<?php
    class FileLog implements ILog
    {
        public $msg = '';

        public function log($msg) {
            $this->msg = $msg;
            echo 'Mac FileLog '. $msg;
        }
    }
