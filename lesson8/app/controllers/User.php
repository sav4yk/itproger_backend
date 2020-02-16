<?php

    class User extends Controller
    {
        private $data = [];
        public function Reg() {
            $page = $this->model("ModelUser");
            $this->data = $page->reg();
            $this->view('user/reg', $this->data);
        }
    }