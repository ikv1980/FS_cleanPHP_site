<?php
class Error404 extends Controller {
    public function index() {
        $this->view('home/404');
    }
}