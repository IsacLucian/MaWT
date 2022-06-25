<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Credentials: true");
    header ("Access-Control-Expose-Headers: Content-Length, X-JSON");
    header ("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
    header ("Access-Control-Allow-Headers: Content-Type, Authorization, Accept, Accept-Language, X-Authorization");

    require_once 'database/Database.php';
    require_once 'config/Config.php';
    require_once 'vendor/Router.php';

    session_start();

    $conn = (new Database)->createConnection(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

    require_once 'routes/Api.php';
    require_once 'routes/Web.php';
