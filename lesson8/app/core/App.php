<?php
    class App {

        protected $contoller = 'home';
        protected $method = 'index';
        protected $params = [];

        public function __construct()
        {
            $url = $this->parseUrl();
        }

        public function parseUrl()
        {
            if (isset($_GET['url'])) {
                return explode('/', filter_var(
                    rtrim($_GET['url'], '/'),
                    FILTER_SANITIZE_STRING
                ));
            }
        }
    }