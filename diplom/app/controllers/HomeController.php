<?php
    class HomeController extends Controller
    {
        public function index()
        {
            $user = $this->model('User');
            $data['user'] = $user->getUser();
            $link = $this->model('Link');
            if (isset($data['user'])) {
                if (isset($_POST['full-link']) && isset($_POST['short-link'])) {

                    $link->setData($data['user']['id'], $_POST['full-link'], $_POST['short-link']);
                    $isValid = $link->validLink();
                    if($isValid == "Верно") {
                        $link->saveShortLink();
                        header ('Location: /');
                    } else {
                        $data['message'] = $isValid;
                        $data['full-link'] =  $_POST['full-link'];
                        $data['short-link'] =  $_POST['short-link'];
                    }
                }
                if (isset($_POST['dellink']))
                    $link->delLink($data['user']['id'], $_POST['dellink']);

                $data['links'] = $link->getLinks($data['user']['id']);
                $this->view('home/index', $data);
            }
            else {
                $this->view('user/reg');
            }
        }

        public function showUrl($url){
            $link = $this->model('Link');
            $isSaved = $link->checkShortLink($url);
            if($isSaved) {
                header("Location: " . $link->getFullLink($url)); exit();
            } else {
                $data['message'] = "Адрес $url в данный момент недоступен";
                $this->view('error/404', $data['message']);
            }
            //
        }

        public function contact(){
            $data = [];
            $data['page'] = 'contact';
            if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['age']) && isset($_POST['message'])) {
                $contact = $this->model('Contact');
                $contact->setData();
                $isValid = $contact->validData();
                if($isValid == "Верно") {
                    $contact->sendMes();
                    $data['good_message'] = 'Ваше сообщение отправлено';
                } else {
                    $data['name'] = $_POST['name'];
                    $data['email'] = $_POST['email'];
                    $data['age'] = $_POST['name'];
                    $data['mes'] = $_POST['message'];
                    $data['message'] = $isValid;
                }
            }
            $this->view('home/contact',$data);
        }

        public function about(){
            $data['page'] = 'about';
            $this->view('home/about',$data);
        }
    }
