<?php
    require 'DB.php';

    class UserModel {
        private $name;
        private $email;
        private $pass;
        private $re_pass;

        private $_db = null;

        public function __construct()
        {
            $this->_db = DB::getInstense();
        }

        public function setData($name, $email, $pass, $re_pass) {
            $this->name = $name;
            $this->email = $email;
            $this->pass = $pass;
            $this->re_pass = $re_pass;
        }

        public function validForm() {
            if(strlen($this->name) < 3)
                return "Имя слишком короткое";
            else if(strlen($this->email) < 3)
                return "Email слишком короткий";
            else if(strlen($this->pass)<3)
                return "Пароль не менее 3х симоволов";
            else if($this->pass != $this->re_pass)
                return "Пароли не совпадают";
            else
                return "Верно";
        }

        public function addUser() {
            $sql = 'INSERT INTO users(name, email, pass) VALUES(:name, :email, :pass)';
            $query = $this->_db->prepare($sql);

            $pass = password_hash($this->pass, PASSWORD_DEFAULT);
            $query->execute(['name'=>$this->name, 'email'=>$this->email, 'pass'=>$pass]);

            $this->setAuth($this->email);
        }

        public function getUser(){
            if (isset($_COOKIE['login'])) {
                $email = $_COOKIE['login'];
                $result = $this->_db->query("SELECT * FROM `users` WHERE `email` = '$email' LIMIT 1");
                return $result->fetch(PDO::FETCH_ASSOC);
            }
        }

        public function logOut() {
            setcookie('login', $this->email, time() - 3600 * 24 * 30, '/');
            unset($_COOKIE['login']);
            header ('Location: /user/auth');
        }

        public function auth($email, $pass) {
            $result = $this->_db->query("SELECT * FROM `users` WHERE `email` = '$email' LIMIT 1");
            $user = $result->fetch(PDO::FETCH_ASSOC);

            if($user['email'] == '') {
                return 'Пользователя с таким email не существует';
            } elseif (password_verify($pass, $user['pass'])) {
                $this->setAuth($email);
            } else {
                return 'Пароли не совпадают';
            }
        }

        public function setAuth($email) {
            setcookie('login', $email, time() + 3600 * 24 * 30, '/');
            header ('Location: /user/dashboard');
        }

        public function uploadImg(){
            if (isset($_COOKIE['login'])) {
                $email = $_COOKIE['login'];
                $file_name = $_FILES['img_user']['name'];
                $file_size = $_FILES['img_user']['size'];
                $file_tmp = $_FILES['img_user']['tmp_name'];
                $file_type = $_FILES['img_user']['type'];
                $tmp = explode('.', $_FILES['img_user']['name']);
                $file_ext = strtolower(end($tmp));

                $expensions = array("jpeg", "jpg", "png");

                if ($file_size > (500 * 1024)) {
                    return 'Файл не более 500 Кбайт';
                }

                if ($_FILES['img_user']['error']==4) {
                    return 'Вы не указали файл для загрузки';
                }
                $new_filename =   time() . "_" .  $file_name;
                move_uploaded_file($file_tmp, "public/img/upload/" . $new_filename);

                $sql = 'UPDATE users SET img=:img WHERE email=:email';
                $query = $this->_db->prepare($sql);


                $query->execute(['img' => $new_filename, 'email' => $email]);
                return "/public/img/upload/" . $file_name;
                //header ('Location: /user/dashboard');

            } else
                return 'Нет доступа';
        }


    }