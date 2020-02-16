<?php
    class Home extends Controller
    {
        public function index($name = '') {
            echo "home/indexw";
            $user = $this->model("ModelUser");
            $user->name = $name;
            $user->getInfo();

            $this->view('home/index',
                ['name' => $user->name, 'test' => 'Hello world']);
        }

        public function about() {
            echo "home/about";
        }
    }