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

require '../models/game.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nom']) && isset($_POST['editeur']) && isset($_POST['date']) && isset($_POST['description']) && isset($_POST['cover']) && isset($_POST['site'])) {
        $platforms = [
            'playstation' => isset($_POST['playstation']) ? 1 : 0,
            'xbox' => isset($_POST['xbox']) ? 1 : 0,
            'nintendo' => isset($_POST['nintendo']) ? 1 : 0,
            'pc' => isset($_POST['pc']) ? 1 : 0,
        ];

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

        create_game(
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

        $_SESSION['validation'] = "Jeu ajouté avec succès !";
        header('Location: addNewGame');
        exit();
    }
}
?>