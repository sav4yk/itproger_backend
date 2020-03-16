<?php
    require 'DB.php';

    class Products {
        private $_db = null;

        public function __construct()
        {
            $this->_db = DB::getInstense();
        }

        public function getProducts() {
            $result = $this->_db->query("SELECT * FROM `products`");
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getProductsLimited($order, $limit) {
            $result = $this->_db->query("SELECT * FROM `products` ORDER BY $order DESC LIMIT $limit");
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }
    }