<?php

class App { 
    protected $controller = 'ProductController';
    protected $method = 'index';
    protected $params =[];

    public function _construct() {
        $url = $this->parsURL();
        if (file_exist('../appcontroller/' . ucfirst($url[0]) . 'Controller.php')) {
            this->controller = ucfirst($url[0]) . 'Controller';
            unset($url[0]);
        }
    }

    require_once '../app/controllers/' . $this->controller . '.php';
    $this->controller = new $this->controller;

    if (isset($url[1])) {
        if (method_exist($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        }
    }

    $this->params =$url ? array_values($url) : [];
    call_user_func_array([$this-controller, $this->method], $this->params);

    public function parseUrl() {
        if (isset($_GET['url'])) {
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }

    public function __construct() {
        $controller = isset($_GET['url']) ? $_GET['url'] : 'home';
        $this->loadController($controller);
    }

    private function loadController($controller) {
        $controller = ucfirst($controller) . 'Controller';
        $controllerPath = '../app/controllers/' . $controller . '.php';

        if (file_exists($controllerPath)) {
            require_once $controllerPath;
            $controllerInstance = new $controller();
            $controllerInstance->index();
        } else {
            die("Controller does not exist: " . $controllerPath);
        }
    }
}

