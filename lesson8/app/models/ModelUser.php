<?php
    class ModelUser
    {
        public $name;
        private $login;
        private $email;
        public function getInfo() {
            //Выполнил подключение к БД
            // SELECT * FROM `user` WHERE `login` = '$this->>name'
            // exho
        }

        public function reg() {
            if (isset($_POST['login']) && isset($_POST['email'])) {
                $this->login = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING));
                $this->email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
                return ['login' => $this->login, 'email' => $this->email];
            }
        }

    }