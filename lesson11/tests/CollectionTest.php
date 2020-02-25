<?php
    use App\Core\Collection;

    class CollectionTest extends \PHPUnit\Framework\TestCase {

        private $list;

        public function setUp(): void
        {
            $this->list = new Collection();
        }

        public function testIsCanCreateEmptyArray() {
            $this->assertEmpty($this->list->get());
        }

        public function testCountElementsArray() {
            $array = new Collection([
               1, 5, 8, 10
            ]);

            $this->assertEquals(4, $array->count());
        }

        public function testIsItemsMatchEachOther() {
            $array = new Collection([
                5, 'Hello'
            ]);
            $this->assertEquals(5, $array->get()[0]);
            $this->assertEquals('Hello', $array->get()[1]);
        }

        public function testCanWeMergeArrays() {
            $array_1 = new Collection([
                5, 'Hello'
            ]);
            $array_2 = new Collection([
                1, 5, 8, 10
            ]);
            $newArray = $array_1->merge($array_2);

            $this->assertCount(6, $newArray->get());
        }

        public function testCanWeAddNewItemsToArray() {
            $array = new Collection([
                5, 'Hello', 'World', 7
            ]);

            $array->add([9, 7, 'R']);
            $this->assertEquals(7,$array->count());
        }
    }