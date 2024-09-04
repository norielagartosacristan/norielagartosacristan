<?php

class App {
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

