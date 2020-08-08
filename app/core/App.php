<?php 

class App {
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        $url = $this->parseUrl();

        $url[0] = str_split($url[0]);
        $url[0][0] = strtoupper($url[0][0]);
        $url[0] = implode($url[0]);

        // controller
        if(file_exists('../app/controllers/' . $url[0] . '.php')) {
            clearstatcache();
            $this->controller = $url[0];
            unset($url[0]);
        }
        require_once '../app/controllers/'. $this->controller . '.php';
        $this->controller = new $this->controller;

        // method
        if(isset($url[1])) {
            if(method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // params
        if(!empty($url)) {
            $this->params = array_values($url);
        }

        // running controller, method and params
        call_user_func_array([$this->controller, $this->method], $this->params);

        
    }

    public function parseUrl() {
        if(isset($_GET['url'])) {
            $url = $_GET['url'];
            $url = rtrim($url, '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}