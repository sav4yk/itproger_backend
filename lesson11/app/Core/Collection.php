<?php
    namespace App\Core;

    class Collection {
        private $items = [];

        public function __construct(array $list = []) {
            $this->items = $list;
        }

        public function get() {
            return $this->items;
        }

        public function count() {
            return count($this->items);
        }

        public function merge(Collection $array) {
            return new Collection(array_merge($this->get(), $array->get()));
        }

        public function add(array $array) {
            $this->items = array_merge($this->items, $array);
        }
    }
