<?php
    class Products
    {
        private $_db = null;
        public $product;
        private $logError;

        public function __construct(ILog $logError)
        {
            $this->_db = DB::getInstance();
            $this->logError = $logError;
        }

        public function create($product)
        {
            try {
                $this->product = $product;
                $sql = 'INSERT INTO products(product) VALUES(?)';
                //$sql = 'INSERT INTO products(error_column) VALUES(?)';
                $query = $this->_db->prepare($sql);
                $query->execute([$this->product]);
            } catch (PDOException $e) {
                $this->logError->log($e->getMessage());
            }
        }
    }
