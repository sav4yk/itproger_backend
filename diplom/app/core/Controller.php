<?php
    class Controller {
        protected function model($model) {
            require_once 'app/models/' . $model . 'Model.php';
            return new $model();
        }

        protected function view($view, $data = []) {
            require_once 'app/views/' . $view . '.tpl.php';
        }
    }