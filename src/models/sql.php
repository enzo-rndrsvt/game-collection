<?php

# Chargement du .env
require_once __DIR__ . '/../../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__, 2));
$dotenv->load();

# Création de la connexion à la base de données
function create_bdd()
{
    # Récupération des variables d'environnement
    $host = $_ENV['db_host']; 
    $dbname = $_ENV['db_name'];
    $user = $_ENV['db_user'];
    $password = $_ENV['db_password'];
    # Connexion à la base de données
    try {
        $pdo = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $user, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
        return $pdo;
    # En cas d'erreur, on affiche un message et on arrête tout
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
        die();
    }
}
