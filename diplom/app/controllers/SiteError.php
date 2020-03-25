<?php
class SiteError extends Controller {
    public function index() {

    }

    public function err404() {
        $this->view('error/404');
    }
}
