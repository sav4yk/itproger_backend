<?php
    require 'DB.php';

    class Products {
        private $_db = null;

        public function __construct()
        {
            $this->_db = DB::getInstense();
        }

        public function getProducts($page = 1) {
            $start = ($page-1) * 3;
            $end = ($page) * 3 ;
            $result = $this->_db->query("SELECT *, (SELECT count(*) FROM products) as cnt FROM products ORDER BY id DESC LIMIT $start, $end ");
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getProductsLimited($order, $limit) {
            $result = $this->_db->query("SELECT * FROM `products` ORDER BY $order DESC LIMIT $limit");
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getProductsCategory($category) {
            $result = $this->_db->query("SELECT *, (SELECT count(*) FROM products WHERE `category` = '$category') as cnt FROM `products` WHERE `category` = '$category' ORDER BY id DESC");
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getOneProduct($id) {
            $result = $this->_db->query("SELECT * FROM `products` WHERE `id` = '$id' LIMIT 1");
            return $result->fetch(PDO::FETCH_ASSOC);
        }

        public function getProductsCart($items){
            $result = $this->_db->query("SELECT * FROM `products` WHERE `id` IN ($items)");
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }
    }