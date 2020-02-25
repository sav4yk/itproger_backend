<?php
    use App\Form;

    class FormTest extends \PHPUnit\Framework\TestCase
    {
        private $form;

        public function setUp(): void
        {
            $this->form = new Form();
        }

        public function tearDown(): void
        {
            $this->form = null;
        }

        public function testCreateObjFormTwoParameters() {
            $new_form = new Form('login', 'password');

            $this->assertEquals($new_form->getUserLogin(), 'login');
            $this->assertEquals($new_form->getUserPassword(), 'password');
            $this->assertEquals($new_form->getUserEmail(), '');
            $this->assertEquals($new_form->getUserwebURL(), '');

        }

        public function testCreateObjFormFourParameters() {
            $new_form = new Form('login', 'password', 'mymail@mail.ru', 'mail.ru');

            $this->assertEquals($new_form->getUserLogin(), 'login');
            $this->assertEquals($new_form->getUserPassword(), 'password');
            $this->assertEquals($new_form->getUserEmail(), 'mymail@mail.ru');
            $this->assertEquals($new_form->getUserwebURL(), 'mail.ru');

        }

        public function testSetLoginPassEmailWeburlOnly() {
            $this->form->setUserLogin('mylogin');
            $this->assertEquals($this->form->getUserLogin(), 'mylogin');

            $this->form->setUserPassword('mypassword');
            $this->assertEquals($this->form->getUserPassword(), 'mypassword');

            $this->form->setUserEmail('mymail@mail.ru');
            $this->assertEquals($this->form->getUserEmail(), 'mymail@mail.ru');

            $this->form->setUserwebURL('mail.ru');
            $this->assertEquals($this->form->getUserwebURL(), 'mail.ru');
        }

        public function testSetIncorrectEmail () {
            $this->form->setUserEmail('mymail@mail.ru'); // Здесь будет ошибка
            $this->assertEquals($this->form->getUserEmail(), 'mymail@mail.ru');
        }

        public function testSetIncorrectWebURL () {
            $this->form->setUserwebURL('mail.ru'); // Здесь будет ошибка
            $this->assertEquals($this->form->getUserwebURL(), 'mail.ru');
        }
    }