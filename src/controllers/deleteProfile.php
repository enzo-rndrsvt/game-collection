<?php
session_start();

# On vérifie que l'utilisateur est connecté, sinon on le renvoie à la page de connexion
if (!isset($_SESSION['user_id'])) {
    header('Location: login');
    exit();
}

# On récupère les fonctions nécessaires
require __DIR__ . "/../models/user.php";

# On vérifie que le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    # On récupère les données nécessaires
    $user_id = intval($_SESSION['user_id']);
    # On supprime la session
    session_destroy();

    # On supprime l'utilisateur et on redirige vers la page de connexion
    delete_user($user_id);
    header('Location: login');
    exit();
} else {
    # Sinon on redirige vers la page de profil avec un message d'erreur
    $_SESSION['error'] = "Problème lors de la suppression du compte.";
    header('Location: profile');
    exit();
}


?>