<?php

class KisahInspiratif extends Controller
{
    public function index()
    {
        if (isset($_SESSION["kisahInspiratif"])) {
            $data["sum"] = $this->model('KisahInspiratif_model')->getKisahInspiratifSum();
        } else {
            $data["sum"] = 0;
        }

        $data['videos'] = $this->model('KisahInspiratif_model')->getAllKisahInspiratif();
        $this->view('templates/header');
        $this->view('templates/kisahInspiratifprogress', $data);
        $this->view('tema/kisahInspiratif', $data);
        $this->view('templates/footer');
    }

    public function video($id)
    {
        $dataById = $this->model('Session_model')->getDataById('kisahInspiratif', $id);
        $data["session"] = array($dataById["id"] => $dataById);
        if (isset($_SESSION["kisahInspiratif"])) {
            if (in_array($dataById["id"], array_keys($_SESSION["kisahInspiratif"]))) {
            } else {
                $_SESSION["kisahInspiratif"] = $_SESSION["kisahInspiratif"] + $data["session"];
            }
        } else {
            $_SESSION["kisahInspiratif"] = $data["session"];
        }

        $data["sum"] = $this->model('KisahInspiratif_model')->getKisahInspiratifSum();
        $data['videos'] = $this->model('KisahInspiratif_model')->getAllKisahInspiratif();
        $data['video'] = $this->model('KisahInspiratif_model')->getKisahInspiratifById($id);

        $this->view('templates/header');
        $this->view('templates/video', $data['video']);
        $this->view('templates/kisahInspiratifprogress', $data);
        $this->view('tema/kisahInspiratif', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $this->view('admin/header');
        if ($this->model('KisahInspiratif_model')->tambahKisahInspiratif($_POST) > 0) {
            header('Location: ' . BASEURL . '/admin/kisahInspiratif');
            exit;
        } else {
            header('Location: ' . BASEURL . '/admin/kisahInspiratif');
            exit;
        }
        $this->view('admin/footer');
    }

    public function hapus($id)
    {
        if ($this->model('KisahInspiratif_model')->delete($id) > 0) {
            echo "berhasil dihapus";
            header('Location: '  . BASEURL . '/admin/kisahInspiratif');
            exit;
        } else {
            echo "tidak berhasil dihapus";
        }
    }
}
