<?php

class Router {

    public function get($route, $controller) {
        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            return false;
        }

        $this->handleRoute($route, $controller);
    }

    public function post($route, $controller) {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return false;
        }

        $this->handleRoute($route, $controller);
    }

    public function delete($route, $controller) {
        if ($_SERVER['REQUEST_METHOD'] !== 'DELETE') {
            return false;
        }

        $this->handleRoute($route, $controller);
    }

    private function handleRoute($route, $controller) {
        $controller = explode('@', $controller);
        $controllerName = $controller[0];
        $controllerMethod = $controller[1];

        require_once 'controllers/' . $controllerName . '.php';

        $controllerInstance = new $controllerName;

        call_user_func([$controllerInstance, $controllerMethod]);
    }
}