<?php
    class Controller {
        protected function model($model) {
            $model = $model . 'Model';
            require_once 'app/models/' . $model . '.php';
            return new $model();
        }

        protected function view($view, $data = []) {
            require_once 'app/views/' . $view . '.tpl.php';
        }
    }
