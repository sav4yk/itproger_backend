<?php
    class Categories extends Controller {
        public function index($page = 1) {
            $products = $this->model('Products');
            $data=['products' => $products->getProducts($page),
                    'title' => 'Все товары на сайте'];
            $this->view('categories/index', $data);
        }

        public function tshirt() {
            $products = $this->model('Products');
            $data=['products' => $products->getProductsCategory('tshirt'),
                'title' => 'Футболки'];
            $this->view('categories/index', $data);
        }

        public function shoes() {
            $products = $this->model('Products');
            $data=['products' => $products->getProductsCategory('shoes'),
                'title' => 'Обувь'];
            $this->view('categories/index', $data);
        }
        public function watches() {
            $products = $this->model('Products');
            $data=['products' => $products->getProductsCategory('watches'),
                'title' => 'Часы'];
            $this->view('categories/index',  $data);
        }
        public function hats() {
            $products = $this->model('Products');
            $data=['products' => $products->getProductsCategory('hats'),
                'title' => 'Шапки'];
            $this->view('categories/index',  $data);
        }
    }