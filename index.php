<?php
# Chargement du .env
require_once __DIR__ . '/vendor/autoload.php';


$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();



$request = $_SERVER['REQUEST_URI'];
$basePath = "/";

$route = str_replace($basePath, '', parse_url($request, PHP_URL_PATH));
$route = trim($route, '/');

$routes = [
    'register' => 'src/views/register.php',
    'login' => 'src/views/login.php',
    'logout' => 'src/controllers/logout.php',
    '' => 'src/views/home.php',
];

if (array_key_exists($route, $routes)) {
    require $routes[$route];
} else {
    // Page 404 si la route n'existe pas
    http_response_code(404);
    echo "404 - Page non trouvée";
}
