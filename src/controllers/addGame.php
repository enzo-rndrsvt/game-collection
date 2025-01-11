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
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    # On vérifie que le jeu a bien été sélectionné
    if (isset($_POST['game_id'])) {
        # On récupère les données nécessaires
        $user_id = $_SESSION['user_id'];
        $game_id = $_POST['game_id'];
        # On vérifie que le jeu n'est pas déjà dans la bibliothèque
        if(get_libraries($user_id, $game_id) > 0) {
            $_SESSION['error'] = "⚠ Ce jeu est déjà dans votre bibliothèque.";
            header('Location: addGame');
            exit();
        }

        # On ajoute le jeu à la bibliothèque de l'utilisateur
        create_library($user_id, $game_id);

        # On redirige l'utilisateur vers la page d'ajout de jeu avec un message de succès
        $_SESSION['validation'] = "✔ Jeu ajouté à votre bibliothèque avec succès !";
        header('Location: addGame');
        exit();
    }
}
?>
