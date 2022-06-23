<?php
    require_once 'database/Database.php';
    require_once 'config/Config.php';
    require_once 'vendor/Router.php';
    require_once 'routes/Api.php';
    require_once 'routes/Web.php';
    session_start();
    $conn = (new Database)->createConnection(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);