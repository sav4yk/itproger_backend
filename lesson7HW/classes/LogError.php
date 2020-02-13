<?php
    class LogError implements ILog
    {
        public $msg;

        public function log($msg)
        {
            if (strstr($_SERVER["HTTP_USER_AGENT"], "Win"))
                $obj = new DbLog();
            else
                $obj = new FileLog();
            $obj->log($msg);
        }
    }
