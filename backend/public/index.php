<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, DELETE, PUT");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");
    header('Content-Type: application/json');
    
    require_once '../app/core/App.php';
    require_once '../app/core/Controller.php';

    $app = new App();