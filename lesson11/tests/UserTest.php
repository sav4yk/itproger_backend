<?php
    use App\Models\User;

    class UserTest extends PHPUnit\Framework\TestCase {
        private $user;

        public function setUp():void
        {
            $this->user = new User();
        }

        /** @test */
        public function IsWeCanSetUserName() {
            $this->user->setUserName('George');
            $this->assertEquals($this->user->getUserName(), 'George');
        }

        public function testIsWeCanSetUserLastName() {
            $this->user->setUserLastName('Dudar');
            $this->assertEquals($this->user->getUserLastName(), 'Dudar');
        }

        public function testIsUserNameTrimmed() {
            $this->user->setUserName('   George  ');
            $this->user->setUserLastName('     Dudar    ');

            $this->assertEquals($this->user->getUserName(), 'George');
            $this->assertEquals($this->user->getUserLastName(), 'Dudar');
        }
    }