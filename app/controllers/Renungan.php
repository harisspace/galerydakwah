<?php

class Renungan extends Controller
{
    public function index()
    {
        if (isset($_SESSION["renungan"])) {
            $data["sum"] = $this->model('Renungan_model')->getRenunganSum();
        } else {
            $data["sum"] = 0;
        }

        $data['videos'] = $this->model('Renungan_model')->getAllRenungan();
        $this->view('templates/header');
        $this->view('templates/renunganprogress', $data);
        $this->view('suasana/renungan', $data);
        $this->view('templates/footer');
    }

    public function video($id)
    {
        $dataById = $this->model('Session_model')->getDataById('renungan', $id);
        $data["session"] = array($dataById["id"] => $dataById);
        if (isset($_SESSION["renungan"])) {
            if (in_array($dataById["id"], array_keys($_SESSION["renungan"]))) {
            } else {
                $_SESSION["renungan"] = $_SESSION["renungan"] + $data["session"];
            }
        } else {
            $_SESSION["renungan"] = $data["session"];
        }

        $data["sum"] = $this->model('Renungan_model')->getRenunganSum();
        $data['videos'] = $this->model('Renungan_model')->getAllRenungan();
        $data['video'] = $this->model('Renungan_model')->getRenunganById($id);

        $this->view('templates/header');
        $this->view('templates/video', $data['video']);
        $this->view('templates/renunganprogress', $data);
        $this->view('suasana/renungan', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $this->view('admin/header');
        if ($this->model('Renungan_model')->tambahRenungan($_POST) > 0) {
            header('Location: ' . BASEURL . '/admin/renungan');
            exit;
        } else {
            header('Location: ' . BASEURL . '/admin/renungan');
            exit;
        }
        $this->view('admin/footer');
    }

    public function hapus($id)
    {
        if ($this->model('Renungan_model')->delete($id) > 0) {
            echo "berhasil dihapus";
            header('Location: '  . BASEURL . '/admin/renungan');
            exit;
        } else {
            echo "tidak berhasil dihapus";
        }
    }
}
