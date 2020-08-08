<?php 

class Sirah extends Controller {
    public function index()
    {
        if (isset($_SESSION["sirah"])) {
            $data["sum"] = $this->model('Sirah_model')->getSirahSum();
        }else {
            $data["sum"] = 0;
        }

        $data['videos'] = $this->model('Sirah_model')->getAllSirah();
        $this->view('templates/header');
        $this->view('templates/sirahprogress', $data);
        $this->view('tema/sirah', $data);
        $this->view('templates/footer');
    }

    public function video($id)
    {
        $dataById = $this->model('Session_model')->getDataById('sirah', $id);
        $data["session"] = array($dataById["id"] => $dataById);
        if (isset($_SESSION["sirah"])) {
            if (in_array($dataById["id"], array_keys($_SESSION["sirah"]))) {
            } else {
                $_SESSION["sirah"] = $_SESSION["sirah"] + $data["session"];
            }
        } else {
            $_SESSION["sirah"] = $data["session"];
        }

        $data["sum"] = $this->model('Sirah_model')->getSirahSum();
        $data['videos'] = $this->model('Sirah_model')->getAllSirah();
        $data['video'] = $this->model('Sirah_model')->getSirahById($id);

        $this->view('templates/header');
        $this->view('templates/video', $data['video']);
        $this->view('templates/sirahprogress', $data);
        $this->view('tema/sirah', $data);
        $this->view('templates/footer');
    }

    public function tambah() {
        $this->view('admin/header');
        if($this->model('Sirah_model')->tambahSirah($_POST) > 0) {
            header('Location: ' . BASEURL . '/admin/sirah');
            exit;
        }else {
            header('Location: ' . BASEURL . '/admin/sirah');
            exit;
        }
        $this->view('admin/footer');
    }

    public function hapus($id) {
        if($this->model('Sirah_model')->delete($id) > 0) {
            echo "berhasil dihapus";
            header('Location: '  . BASEURL . '/admin/sirah');
            exit;
        }else {
            echo "tidak berhasil dihapus";
        }
    }
}