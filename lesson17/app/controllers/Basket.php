<?php
    class Basket extends Controller {
        public function index() {

            $data = [];
            $cart = $this->model('BasketModel');
            if(isset($_POST['item_id']))
                $cart->addToCart($_POST['item_id']);

            if(!$cart->isSetSession())
                $data['empty'] = 'Пустая корзина';
            else {
                $products = $this->model('Products');
                $data['products'] = $products->getProductsCart($cart->getSession());
            }
            $this->view('basket/index',$data);
        }

        public function removeOneItem() {
            $data = [];
            $cart = $this->model('BasketModel');
            if(isset($_POST['item_id']) && is_numeric($_POST['item_id']) && $_POST['item_id']>=0)
                $cart->removeFromCart($_POST['item_id']);
            header ('Location: /basket');
        }

        public function removeAllItem() {
            $cart = $this->model('BasketModel');
            $cart->deleteSession();
            header ('Location: /basket');
        }
    }