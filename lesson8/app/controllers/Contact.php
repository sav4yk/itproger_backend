<?php
    class Contact extends Controller
    {
        public function index($firstParametr = '', $number = '') {
            echo 'contact index - ' . $firstParametr . ' - ' . $number;

        }

        public function about() {
            echo 'contact about';
        }
    }