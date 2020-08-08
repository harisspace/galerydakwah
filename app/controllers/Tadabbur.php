<?php

class Tadabbur extends Controller
{
    public function index()
    {
        if (isset($_SESSION["tadabbur"])) {
            $data["sum"] = $this->model('Tadabbur_model')->getTadabburSum();
        } else {
            $data["sum"] = 0;
        }

        $data['videos'] = $this->model('Tadabbur_model')->getAllTadabbur();
        $this->view('templates/header');
        $this->view('templates/tadabburprogress', $data);
        $this->view('tema/tadabbur', $data);
        $this->view('templates/footer');
    }

    public function video($id){
        $dataById = $this->model('Session_model')->getDataById('tadabbur', $id);
        $data["session"] = array($dataById["id"] => $dataById);
        if (isset($_SESSION["tadabbur"])) {
            if (in_array($dataById["id"], array_keys($_SESSION["tadabbur"]))) {
            } else {
                $_SESSION["tadabbur"] = $_SESSION["tadabbur"] + $data["session"];
            }
        } else {
            $_SESSION["tadabbur"] = $data["session"];
        }

        $data["sum"] = $this->model('Tadabbur_model')->getTadabburSum();
        $data['videos'] = $this->model('Tadabbur_model')->getAllTadabbur();
        $data['video'] = $this->model('Tadabbur_model')->getTadabburById($id);
        $this->view('templates/header');
        $this->view('templates/video', $data['video']);
        $this->view('templates/tadabburprogress', $data);
        $this->view('tema/tadabbur', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $this->view('admin/header');
        if ($this->model('Tadabbur_model')->tambahTadabbur($_POST) > 0) {
            header('Location: ' . BASEURL . '/admin/tadabbur');
            exit;
        } else {
            header('Location: ' . BASEURL . '/admin/tadabbur');
            exit;
        }
        $this->view('admin/footer');
    }

    public function hapus($id)
    {
        if ($this->model('Tadabbur_model')->delete($id) > 0) {
            echo "berhasil dihapus";
            header('Location: '  . BASEURL . '/admin/tadabbur');
            exit;
        } else {
            echo "tidak berhasil dihapus";
        }
    }
}
