<?php

require 'controllers/AuthController.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($uri === '/') {
    $controller = new AuthController();
    $controller->index();
    exit;
}
if ($uri === '/login_process' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new AuthController();
    $controller->login_process();
    exit;
}
if($uri  === '/register'){
    $controller = new AuthController();
    $controller->register();
    exit;
}
if($uri  === '/register_process' && $_SERVER['REQUEST_METHOD'] === 'POST'){
    $controller = new AuthController();
    $controller->register_process();
    exit;
}
http_response_code(404);
echo '404 Not Found';
