<?php
session_start();

# On vérifie que l'utilisateur est connecté, sinon on le renvoie à la page de connexion
if (!isset($_SESSION['user_id'])) {
    header('Location: login');
    exit();
}

# On récupère les fonctions nécessaires
require __DIR__ . "/../models/library.php";

# On vérifie que le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    # On récupère les données nécessaires
    $game_id = intval($_POST['game_id']);
    $user_id = intval($_SESSION['user_id']);

    # On supprime le jeu
    delete_game($game_id, $user_id);

    # On redirige l'utilisateur vers sa bibliothèque avec un message de succès
    $_SESSION['validation'] = "✔ Jeu supprimé avec succès.";
    header('Location: /');
    exit();
} else {
    # Sinon on redirige vers la page de la bibliothèque avec un message d'erreur
    $_SESSION['error'] = "❌ Problème lors de la suppression du jeu.";
    header('Location: /');
    exit();
}

?>