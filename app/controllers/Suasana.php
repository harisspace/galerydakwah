<?php 

class Suasana extends Controller {
    public function index() {
        $this->view('templates/header');
        $this->view('suasana/index');
        $this->view('templates/footer');
    }
}