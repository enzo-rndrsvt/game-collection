<?php
//nom
//editeur
//date
//playstation
//xbox
//nintendo
//pc
//description
//cover
//site
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login');
    exit();
}

require __DIR__ . '/../models/game.php';
require __DIR__ . '/../models/library.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['nom']) && !empty($_POST['editeur']) && !empty($_POST['date']) && !empty($_POST['description']) && !empty($_POST['cover']) && !empty($_POST['site'])) {
        $platforms = [
            'playstation' => isset($_POST['playstation']) ? 1 : 0,
            'xbox' => isset($_POST['xbox']) ? 1 : 0,
            'nintendo' => isset($_POST['nintendo']) ? 1 : 0,
            'pc' => isset($_POST['pc']) ? 1 : 0,
        ];

        if (!array_sum($platforms)) {
            $_SESSION['error'] = "Echec : pour créer un jeu vous devez lui attribuer au moins une plateforme.";
            header('Location: addNewGame');
            exit();
        }

        $date = date('Y-m-d', strtotime($_POST['date']));
        $nom = htmlspecialchars($_POST['nom']);
        $editeur = htmlspecialchars($_POST['editeur']);
        $description = htmlspecialchars($_POST['description']);
        $cover = htmlspecialchars($_POST['cover']);
        $site = htmlspecialchars($_POST['site']);

        if (get_game_name($nom) > 0) {
            $_SESSION['error'] = "Le jeu existe déjà.";
            header('Location: addNewGame');
            exit();
        }

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
        
        create_library($_SESSION['user_id'], $game_id);

        $_SESSION['validation'] = "Jeu créé et ajouté à votre bibliothèque avec succès !";
        header('Location: addGame');
        exit();
    }
}
?>