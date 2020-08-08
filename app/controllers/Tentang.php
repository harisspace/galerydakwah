<?php 

class Tentang extends Controller {
    public function index() {
        $this->view('templates/header');
        $this->view('tentang/tentang');
        $this->view('templates/footer');
    }
}