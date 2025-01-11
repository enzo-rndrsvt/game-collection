<?php

session_start();

# On vérifie que l'utilisateur est connecté, sinon on le renvoie à la page de connexion
if (!isset($_SESSION['user_id'])) {
    header('Location: login');
    exit();
}

# On récupère les fonctions nécessaires
require __DIR__ . '/../models/game.php';
require __DIR__ . '/../models/library.php';

# On vérifie que le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    # On vérifie que tous les champs sont remplis
    if (!empty($_POST['nom']) && !empty($_POST['editeur']) && !empty($_POST['date']) && !empty($_POST['description']) && !empty($_POST['cover']) && !empty($_POST['site'])) {
        # On vérifie que l'utilisateur a coché au moins une plateforme
        $platforms = [
            'playstation' => isset($_POST['playstation']) ? 1 : 0,
            'xbox' => isset($_POST['xbox']) ? 1 : 0,
            'nintendo' => isset($_POST['nintendo']) ? 1 : 0,
            'pc' => isset($_POST['pc']) ? 1 : 0,
        ];

        if (!array_sum($platforms)) {
            $_SESSION['error'] = "⚠ Ce jeu n'a pas pu être créé, vous devez lui attribuer au moins une plateforme.";
            header('Location: addNewGame');
            exit();
        }

        # On récupère les données du formulaire
        $date = date('Y-m-d', strtotime($_POST['date']));
        $nom = htmlspecialchars($_POST['nom']);
        $editeur = htmlspecialchars($_POST['editeur']);
        $description = htmlspecialchars($_POST['description']);
        $cover = htmlspecialchars($_POST['cover']);
        $site = htmlspecialchars($_POST['site']);

        # On vérifie que le jeu n'existe pas déjà
        if (get_game_name($nom) > 0) {
            $_SESSION['error'] = "⚠ Ce jeu existe déjà, il n'a pa pu être créé.";
            header('Location: addNewGame');
            exit();
        }

        # On crée le jeu
        $game_id = create_game(
            $nom,
            $editeur,
            $description,
            $date,
            $platforms['pc'],
            $platforms['playstation'],
            $platforms['xbox'],
            $platforms['nintendo'],
            $cover,
            $site
        );
        
        # On ajoute le jeu à la bibliothèque de l'utilisateur
        create_library($_SESSION['user_id'], $game_id);

        # On redirige l'utilisateur vers la page d'ajout de jeu avec un message de succès
        $_SESSION['validation'] = "✔ Jeu créé et ajouté à votre bibliothèque avec succès !";
        header('Location: addGame');
        exit();
    }
}
?>