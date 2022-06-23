<?php

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/' :
        require 'resources/views/Home.php';
        break;
    case '/register' :
        require 'resources/views/Join.php';
        break;
    case '/login' :
        require 'resources/views/Login.php';
        break;
    default:
        http_response_code(404);
        break;
}