<?php
session_start();

# On vérifie que l'utilisateur est connecté, sinon on le renvoie à la page de connexion
if (!isset($_SESSION['user_id'])) {
    header('Location: login');
    exit();
}

# On récupère les fonctions nécessaires
require __DIR__ . '/../models/library.php';



# On vérifie que le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    # On vérifie que tous les champs sont remplis
    $time_played = !empty($_POST['nbHeuresJeu']) ? htmlspecialchars($_POST['nbHeuresJeu']) : 0;
    $game_id = $_POST['game_id'];

    # On récupère l'identifiant de l'utilisateur
    $user_id = intval($_SESSION['user_id']);
    
    # On vérifie que le temps de jeu est un chiffre
    if (!is_numeric($time_played)) {
        $_SESSION['error'] = "❌ Le temps de jeu doit être un chiffre.";
        header('Location: /');
        exit();
    }

    # On met à jour le temps de jeu
    update_library($user_id, $game_id, $time_played);

    # On redirige l'utilisateur vers sa bibliothèque avec un message de succès
    $_SESSION['validation'] = "✔ Temps de jeu mis à jour avec succès.";
    header('Location: /');
    exit();
}


?>