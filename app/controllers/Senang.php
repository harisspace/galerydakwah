<?php 

class Senang extends Controller {
    public function index()
    {
        if (isset($_SESSION["senang"])) {
            $data["sum"] = $this->model('Senang_model')->getSenangSum();
        } else {
            $data["sum"] = 0;
        }

        $data['videos'] = $this->model('Senang_model')->getAllSenang();
        $this->view('templates/header');
        $this->view('templates/senangprogress', $data);
        $this->view('suasana/senang', $data);
        $this->view('templates/footer');
    }

    public function video($id)
    {
        $dataById = $this->model('Session_model')->getDataById('senang', $id);
        $data["session"] = array($dataById["id"] => $dataById);
        if (isset($_SESSION["senang"])) {
            if (in_array($dataById["id"], array_keys($_SESSION["senang"]))) {
            } else {
                $_SESSION["senang"] = $_SESSION["senang"] + $data["session"];
            }
        } else {
            $_SESSION["senang"] = $data["session"];
        }

        $data["sum"] = $this->model('Senang_model')->getSenangSum();
        $data['videos'] = $this->model('Senang_model')->getAllSenang();
        $data['video'] = $this->model('Senang_model')->getSenangById($id);
        $this->view('templates/header');
        $this->view('templates/video', $data['video']);
        $this->view('templates/senangprogress', $data);
        $this->view('suasana/senang', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $this->view('admin/header');
        if ($this->model('Senang_model')->tambahSenang($_POST) > 0) {
            header('Location: ' . BASEURL . '/admin/senang');
            exit;
        } else {
            header('Location: ' . BASEURL . '/admin/senang');
            exit;
        }
        $this->view('admin/footer');
    }

    public function hapus($id)
    {
        if ($this->model('Senang_model')->delete($id) > 0) {
            echo "berhasil dihapus";
            header('Location: '  . BASEURL . '/admin/senang');
            exit;
        } else {
            echo "tidak berhasil dihapus";
        }
    }
}