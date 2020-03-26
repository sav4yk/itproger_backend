<?php
require_once 'DB.php';

    class UserModel {
        private $login;
        private $email;
        private $pass;
        private $re_pass;

        private $_db = null;

        public function __construct()
        {
            $this->_db = DB::getInstense();
        }

        public function setData($login, $email, $pass, $re_pass) {
            $this->login = $login;
            $this->email = $email;
            $this->pass = $pass;
            $this->re_pass = $re_pass;
        }

        private function checkUser() {
            $result = $this->_db->query("SELECT * FROM `users` WHERE  `login` = '$this->login' LIMIT 1");
            if ($result->fetch())
                return 'yes';
            else return 'no';

        }

        public function validForm() {
            if(strlen($this->login) < 3)
                return "Логин слишком короткий";
            else if(strlen($this->email) < 3)
                return "Email слишком короткий";
            else if(strlen($this->pass)<3)
                return "Пароль не менее 3х симоволов";
            else if($this->pass != $this->re_pass)
                return "Пароли не совпадают";
            else if ($this->checkUser() != 'no')
                return 'Пользователь с таким логином уже существует';
            else
                return "Верно";
        }



        public function addUser() {
            $sql = 'INSERT INTO users(login, email, pass) VALUES(:login, :email, :pass)';
            $query = $this->_db->prepare($sql);

            $pass = password_hash($this->pass, PASSWORD_DEFAULT);
            $query->execute(['login'=>$this->login, 'email'=>$this->email, 'pass'=>$pass]);

            $this->setAuth($this->email);
        }

        public function getUser(){

            if (isset($_COOKIE['login']))  {
                $login = $_COOKIE['login'];
                $result = $this->_db->query("SELECT * FROM `users` WHERE `login` = '$login' LIMIT 1");
                return $result->fetch(PDO::FETCH_ASSOC);
            }
        }

        public function logOut() {
            setcookie('login', '', time() - 3600 * 24 * 30, '/');
            unset($_COOKIE['login']);
            header ('Location: /user/auth');
        }

        public function auth($login, $pass) {
            $result = $this->_db->query("SELECT * FROM `users` WHERE `login` = '$login' LIMIT 1");
            $user = $result->fetch(PDO::FETCH_ASSOC);
            if($user == '' || $user['login'] == '') {
                return 'Пользователя с таким логином не существует';
            } elseif (password_verify($pass, $user['pass'])) {
                $this->setAuth($user['login']);
            } else {
                return 'Пароли не совпадают';
            }
        }

        public function setAuth($login) {
            setcookie('login', $login, time() + 3600 * 24 * 30, '/');
            header ('Location: /');
        }



    }
