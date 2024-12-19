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

require '../models/game.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nom']) && isset($_POST['editeur']) && isset($_POST['date']) && isset($_POST['description']) && isset($_POST['cover']) && isset($_POST['site'])) {
        $platforms = [
            'playstation' => isset($_POST['playstation']) ? true : false,
            'xbox' => isset($_POST['xbox']) ? true : false,
            'nintendo' => isset($_POST['nintendo']) ? true : false,
            'pc' => isset($_POST['pc']) ? true : false,
        ];

        //$date = new DateTime($_POST['date']);
        //$date->format('Y-m-d');
        //$date = strval($date->format('Y-m-d'));

        $date = $_POST['date'];

        var_dump($date);

        $nom = htmlspecialchars($_POST['nom']);
        $editeur = htmlspecialchars($_POST['editeur']);
        $description = htmlspecialchars($_POST['description']);
        $cover = htmlspecialchars($_POST['cover']);
        $site = htmlspecialchars($_POST['site']);

        create_game($nom, $description, $date, $platforms['pc'], $platforms['playstation'], xbox: $platforms['xbox'], switch: $platforms['nintendo'], image: $cover, site: $site);

        $_SESSION['validation'] = "Jeu ajouté avec succès !";
        header('Location: /addNewGame');
        exit();
    }


}
?>