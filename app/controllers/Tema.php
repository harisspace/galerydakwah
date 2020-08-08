<?php 

class Tema extends Controller{
    public function index() {
        $this->view('templates/header');
        $this->view('tema/index');
        $this->view('templates/footer');
    }
}

