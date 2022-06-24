<?php

$request = $_SERVER['REQUEST_URI'];

$path = explode('/', $_SERVER['REQUEST_URI']);
switch ($path[1]) {
    case '' :
        require 'resources/views/Home.php';
        break;
    case 'register' :
        require 'resources/views/Join.php';
        break;
    case 'login' :
        require 'resources/views/Login.php';
        break;
    case 'list' :
        require 'resources/views/List.php';
        break;
    case 'map' :
        $_SESSION['lat'] = $path[2];
        $_SESSION['log'] = $path[3];
        require 'resources/views/Map.php';
        break;
    case 'profile':
        require 'resources/views/OwnList.php';
        break;
    case 'createTurbine':
        require  'resources/views/CreateTurbine.php';
        break;
    default:
        http_response_code(404);
        break;
}