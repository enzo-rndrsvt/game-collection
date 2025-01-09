<?php
# Chargement du .env
require_once __DIR__ . '/vendor/autoload.php';


$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


$basePath = dirname($_SERVER['SCRIPT_NAME']);
$basePath = str_replace('\\', '/', $basePath);
$request = $_SERVER['REQUEST_URI'];

$route = str_replace($basePath, '', parse_url($request, PHP_URL_PATH));
$route = trim($route, '/');

$routes = [
    // views
    '404' => __DIR__ . '/src/views/404.php',
    'register' => __DIR__ . '/src/views/register.php',
    'login' => __DIR__ . '/src/views/login.php',
    'profile' => 'src/views/profile.php',
    'editProfile' => __DIR__ . '/src/views/editProfile.php',
    'addGame' => __DIR__ . '/src/views/addGame.php',
    'addNewGame' => __DIR__ . '/src/views/addNewGame.php',
    'editGame' => __DIR__ . '/src/views/editGame.php',
    'ranking' => __DIR__ . '/src/views/ranking.php',
    '' => __DIR__ . '/src/views/home.php',


    // Controllers
    'addGameLib' => __DIR__ . '/src/controllers/addGame.php',
    'createGame' => __DIR__ . '/src/controllers/addNewGame.php',
    'deleteProfile' => __DIR__ . '/src/controllers/deleteProfile.php',
    'updateProfile' => __DIR__ . '/src/controllers/editProfile.php',
    'loginUser' => __DIR__ . '/src/controllers/login.php',
    'logout' => __DIR__ . '/src/controllers/logout.php',
    'registerUser' => __DIR__ . '/src/controllers/register.php',
];

if (array_key_exists($route, $routes)) {
    require $routes[$route];
} else {
    // Page 404 si la route n'existe pas
    http_response_code(404);
    //header('Location:' . $basePath . '404');
    require $routes['404'];
    exit();
}
