<?php 

class Admin extends Controller {
    public function index() {
        $this->session();
        $this->view('admin/header');
        echo "Selamat datang admin";
        $this->view('admin/footer');
    }

    public function session() {
        if(!isset($_SESSION['login'])) {
            header('Location: '  . BASEURL . '/admin/login');
        }else {
            return true;
        }
    }

    public function tema() {
        $this->session();
        $this->view('admin/header');
        $this->view('admin/tema');
        $this->view('admin/footer');
    }

    public function suasana() {
        $this->session();
        $this->view('admin/header');
        $this->view('admin/suasana');
        $this->view('admin/footer');
    }

    public function sirah() {
        $this->session();
        $data['videos'] = $this->model('Sirah_model')->getAllSirah();
        $this->view('admin/header');
        $this->view('admin/sirahA', $data);
        $this->view('admin/footer');
    }

    public function tadabbur()
    {
        $this->session();
        $data['videos'] = $this->model('Tadabbur_model')->getAllTadabbur();
        $this->view('admin/header');
        $this->view('admin/tadabburA', $data);
        $this->view('admin/footer');
    }

    public function senang()
    {
        $this->session();
        $data['videos'] = $this->model('Senang_model')->getAllSenang();
        $this->view('admin/header');
        $this->view('admin/senangA', $data);
        $this->view('admin/footer');
    }

    public function omb()
    {
        $this->session();
        $data['videos'] = $this->model('Omb_model')->getAllOmb();
        $this->view('admin/header');
        $this->view('admin/ombA', $data);
        $this->view('admin/footer');
    }

    public function renungan()
    {
        $this->session();
        $data['videos'] = $this->model('Renungan_model')->getAllRenungan();
        $this->view('admin/header');
        $this->view('admin/renunganA', $data);
        $this->view('admin/footer');
    }

    public function login() {
        if(isset($_SESSION['login'])) {
            header('Location: ' . BASEURL . '/admin');
        }

        if(isset($_POST['login'])) {
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);

            if($username === 'harisjago' && $password === '13102000') {
                $_SESSION['login'] = true;
                header('Location: '  . BASEURL . '/admin');
                exit;
            }else {
                echo "<script>
                    alert('password/username anda masukkan salah')
                </script>";
            }
        }
            
            $this->view('admin/login');
        }

    public function logout() {
        session_destroy();
        session_unset();
        header('Location: '  . BASEURL . '/admin/login');
    }
}