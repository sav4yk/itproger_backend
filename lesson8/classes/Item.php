<?php
    class Item {
        private $logError;

        public function __construct(ILog $logError) {
            $this->logError = $logError;
        }

        // public function __construct() {
        //     $this->logError = new LogError();
        // }

        // public function __construct(LogError $log) {
        //     $this->logError = new $log;
        // }

        public function setPrice($price) {
            try {

            } catch(DbException $e) {
                $this->logError->log($e->getMessage());
            }
        }

    }
