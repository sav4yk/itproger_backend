<?php
    class HomeController extends Controller
    {
        public function index()
        {
          //  $products = $this->model('Products');

            $this->view('home/index');
        }
    }