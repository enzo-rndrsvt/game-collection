<?php
# Chargement du .env
require_once __DIR__ . '/vendor/autoload.php';


$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// comments


$basePath = dirname($_SERVER['SCRIPT_NAME']);
$basePath = str_replace('\\', '/', $basePath);
$request = $_SERVER['REQUEST_URI'];

$route = str_replace($basePath, '', parse_url($request, PHP_URL_PATH));
$route = trim($route, '/');

$routes = [
    '404' => __DIR__ . '/src/views/404.php',
    'register' => __DIR__ . '/src/views/register.php',
    'login' => __DIR__ . '/src/views/login.php',
    'logout' => __DIR__ . '/src/controllers/logout.php',
    'profile' => 'src/views/profile.php',
    'addGame' => __DIR__ . '/src/views/addGame.php',
    'addNewGame' => __DIR__ . '/src/views/addNewGame.php',
    '' => __DIR__ . '/src/views/home.php',
];

if (array_key_exists($route, $routes)) {
    require $routes[$route];
} else {
    // Page 404 si la route n'existe pas
    http_response_code(404);
    header('Location:' . $basePath . '/404');
    exit();
}
