<?php 

class Home extends Controller{
    public function index() {
        $this->view('home/index');
    }

    public function video($id)
    {
        $data['videos'] = $this->model('Tadabbur_model')->getAllTadabbur();
        $data['video'] = $this->model('Tadabbur_model')->getTadabburById($id);
        $this->view('templates/header');
        $this->view('templates/video', $data['video']);
        $this->view('tema/tadabbur', $data);
        $this->view('templates/footer');
    }
}
