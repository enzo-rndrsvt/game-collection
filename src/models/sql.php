<?php
require_once __DIR__ . '/../../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__, 2));
$dotenv->load();

function create_bdd()
{
    $host = $_ENV['db_host'];
    $dbname = $_ENV['db_name'];
    $user = $_ENV['db_user'];
    $password = $_ENV['db_password'];
    try {
        $pdo = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $user, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
        return $pdo;
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
        die();
    }
}
