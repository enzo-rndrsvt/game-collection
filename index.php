<?php
# Chargement du .env
require_once __DIR__ . '/vendor/autoload.php';


$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


$routes = [
    '/' => '/src/views/home.php',
    '/register' => '/src/views/register.php',
    '/login' => '/src/views/login.php',
];

$request = strtok($_SERVER['REQUEST_URI'], '?');
if (array_key_exists($request, $routes)) {
    require __DIR__ . $routes[$request];
} else {
    # Page 404 si la route n'existe pas
    http_response_code(404);
    echo "404 - Page not found";
}


