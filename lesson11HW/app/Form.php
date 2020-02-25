<?php
    namespace App;

    class Form
    {
        private $login;
        private $password;
        private $email;
        private $webURL;
        public function __construct($login="", $password="", $email="", $webURL="")
        {
            $this->login = $login;
            $this->password = $password;
            $this->email = $email;
            $this->webURL = $webURL;
        }

        public function setUserLogin($login) {
            $this->login = $login;
        }

        public function setUserPassword($password) {
            $this->password = $password;
        }
        public function setUserEmail($email) {
            $this->email = trim(filter_var($email, FILTER_SANITIZE_EMAIL));
        }
        public function setUserwebURL($webURL) {
            $this->webURL = trim(filter_var($webURL, FILTER_SANITIZE_URL));
        }

        public function getUserLogin() {
            return $this->login;
        }

        public function getUserPassword() {
            return $this->password;
        }
        public function getUserEmail() {
            return $this->email;
        }
        public function getUserwebURL() {
            return $this->webURL;
        }
    }