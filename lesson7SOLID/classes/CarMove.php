<?php
    class CarMove {
        private $car = null;

        public function __construct(Car $car) {
            $this->car = $car;
        }

        public function moveCar() {
            $moveCarSpeed = $this->car->move();
        }
    }
