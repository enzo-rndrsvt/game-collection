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
    '404' => 'src/views/404.php',
    'register' => 'src/views/register.php',
    'login' => 'src/views/login.php',
    'logout' => 'src/controllers/logout.php',
    'profile' => 'src/views/profile.php',
    'addNewGame' => 'src/views/addNewGame.php',
    '' => 'src/views/home.php',
];

if (array_key_exists($route, $routes)) {
    require $routes[$route];
} else {
    // Page 404 si la route n'existe pas
    http_response_code(404);
    header('Location: /404');
    exit();
}
