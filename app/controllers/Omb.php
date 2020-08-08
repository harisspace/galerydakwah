<?php 

class Omb extends Controller {
    public function index()
    {
        if (isset($_SESSION["omb"])) {
            $data["sum"] = $this->model('Omb_model')->getOmbSum();
        } else {
            $data["sum"] = 0;
        }

        $data['videos'] = $this->model('Omb_model')->getAllOmb();
        $this->view('templates/header');
        $this->view('templates/ombprogress', $data);
        $this->view('tema/omb', $data);
        $this->view('templates/footer');
    }

    public function video($id)
    {
        $dataById = $this->model('Session_model')->getDataById('omb', $id);
        $data["session"] = array($dataById["id"] => $dataById);
        if (isset($_SESSION["omb"])) {
            if (in_array($dataById["id"], array_keys($_SESSION["omb"]))) {
            } else {
                $_SESSION["omb"] = $_SESSION["omb"] + $data["session"];
            }
        } else {
            $_SESSION["omb"] = $data["session"];
        }

        $data["sum"] = $this->model('Omb_model')->getOmbSum();
        $data['videos'] = $this->model('Omb_model')->getAllOmb();
        $data['video'] = $this->model('Omb_model')->getOmbById($id);

        $this->view('templates/header');
        $this->view('templates/video', $data['video']);
        $this->view('templates/ombprogress', $data);
        $this->view('tema/omb', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $this->view('admin/header');
        if ($this->model('Omb_model')->tambahOmb($_POST) > 0) {
            header('Location: ' . BASEURL . '/admin/omb');
            exit;
        } else {
            header('Location: ' . BASEURL . '/admin/omb');
            exit;
        }
        $this->view('admin/footer');
    }

    public function hapus($id)
    {
        if ($this->model('Omb_model')->delete($id) > 0) {
            echo "berhasil dihapus";
            header('Location: '  . BASEURL . '/admin/omb');
            exit;
        } else {
            echo "tidak berhasil dihapus";
        }
    }
}