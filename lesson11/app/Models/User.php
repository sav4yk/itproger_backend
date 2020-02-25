<?php
    namespace App\Models;

    class User
    {
        private $name;
        private $last_name;

        public function setUserName($name) {
            $this->name = trim($name);
        }
        public function getUserName() {
            return $this->name;
        }
        public function setUserLastName($last_name) {
            $this->last_name = trim($last_name);
        }
        public function getUserLastName() {
            return $this->last_name;
        }
        public function getUserDataArray() {
            return [
                'name' => $this->getUserName(),
                'last_name' => $this->getUserLastName()
            ];
        }
    }