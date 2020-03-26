<?php
    class UserController extends Controller {
        public function reg() {
            $data = [];
            $data['page'] = 'reg';
            if(isset($_POST['login'])) {
                $user = $this->model('User');
                $user->setData($_POST['login'], $_POST['email'], $_POST['password'], $_POST['re-password']);

                $isValid = $user->validForm();
                if($isValid == "Верно") {
                    $user->addUser();
                    header ('Location: /user/auth');
                } else {
                    $data['message'] = $isValid;
                    $data['email'] =  $_POST['email'];
                    $data['login'] =  $_POST['login'];
                    $this->view('user/reg', $data);
                }
            }
        }

        public function dashboard() {
            $data = [];
            $data['page'] = 'dashboard';
            $user = $this->model('User');
            if(isset($_POST['exit_btn'])) {
                $user->logOut();
                exit();
            }
            $data['user'] = $user->getUser();
                $this->view('user/dashboard',$data);
        }

        public function auth(){
            $data = [];
            $data['page'] = 'auth';
            if(isset($_POST['login'])) {
                $user = $this->model('User');
                $data['message'] = $user->auth($_POST['login'], $_POST['password']);
                $data['login'] = $_POST['login'];
            }
            $this->view('user/auth',$data);
        }
    }
