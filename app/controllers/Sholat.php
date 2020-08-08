<?php

class Sholat extends Controller
{
    public function index()
    {
        if (isset($_SESSION["sholat"])) {
            $data["sum"] = $this->model('Sholat_model')->getSholatSum();
        } else {
            $data["sum"] = 0;
        }

        $data['videos'] = $this->model('Sholat_model')->getAllSholat();
        $this->view('templates/header');
        $this->view('templates/sholatprogress', $data);
        $this->view('tema/sholat', $data);
        $this->view('templates/footer');
    }

    public function video($id)
    {
        $dataById = $this->model('Session_model')->getDataById('sholat', $id);
        $data["session"] = array($dataById["id"] => $dataById);
        if (isset($_SESSION["sholat"])) {
            if (in_array($dataById["id"], array_keys($_SESSION["sholat"]))) {
            } else {
                $_SESSION["sholat"] = $_SESSION["sholat"] + $data["session"];
            }
        } else {
            $_SESSION["sholat"] = $data["session"];
        }

        $data["sum"] = $this->model('Sholat_model')->getSholatSum();
        $data['videos'] = $this->model('Sholat_model')->getAllSholat();
        $data['video'] = $this->model('Sholat_model')->getSholatById($id);

        $this->view('templates/header');
        $this->view('templates/video', $data['video']);
        $this->view('templates/sholatprogress', $data);
        $this->view('tema/sholat', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $this->view('admin/header');
        if ($this->model('Sholat_model')->tambahSholat($_POST) > 0) {
            header('Location: ' . BASEURL . '/admin/sholat');
            exit;
        } else {
            header('Location: ' . BASEURL . '/admin/sholat');
            exit;
        }
        $this->view('admin/footer');
    }

    public function hapus($id)
    {
        if ($this->model('Sholat_model')->delete($id) > 0) {
            echo "berhasil dihapus";
            header('Location: '  . BASEURL . '/admin/sholat');
            exit;
        } else {
            echo "tidak berhasil dihapus";
        }
    }
}
