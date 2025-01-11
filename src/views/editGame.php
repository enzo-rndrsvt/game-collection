<?php

require __DIR__ . '/../models/library.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un jeu</title>
    <link rel="stylesheet" href="src/assets/css/general.css">
    <link rel="stylesheet" href="src/assets/css/header.css">
    <link rel="stylesheet" href="src/assets/css/footer.css">
    <link rel="stylesheet" href="src/assets/css/editGame.css">
</head>
<header>
    <?php require_once "header.php" ?>
</header>
<body>
<div class="content">

    <!--On affiche les informations du jeu sélectionné-->
    <div class="principal">
        <h1>Nom jeu</h1> <!--à modif avec la requête qui récupère le nom du jeu avec l'id passé en POST-->
        <p>Editeur : Ubisoft </p> <!--à modif avec la requête qui récupère l'éditeur du jeu avec l'id passé en POST-->
        <p>Sortie le 10/11/13</p> <!--à modif avec la requête qui récupère le date de sortie du jeu avec l'id passé en POST-->
        <p>Temps passé: 60h</p> <!--à modif avec la requête qui récupère le temps de jeu du joueur avec l'id passé en POST et l'id du joueur-->

        <h2>Ajouter du temps passé sur le jeu</h2>
        <!--Formulaire pour modifier le temps de jeu-->
        <form action="updateProfile" method="POST">
            <p>Temps passé sur le jeu</p>
            <input type="text" id="nbHeuresJeu" name="nbHeuresJeu" value="nb heures actuelles"> <!--à modif avec la requête qui récupère le nom du jeu passé en POST-->
            <button type="submit">AJOUTER</button>
        </form>

        <div class="buttons">
            <!--Formulaire pour supprimer le jeu de la bibliothèque de l'utilisateur-->
            <form method="POST" action="deleteGameLibrary">
                <button type="submit">SUPPRIMER LE JEU DE MA BIBLIOTHEQUE</button>
            </form>
        </div>
    </div>
    <img class="cover" src="src/assets/images/co1q1f.png" alt="Couverture du jeu"> <!--à modif avec la requête qui récupère l'image du jeu avec l'id passé en POST + supprimer l'image du jeu dans le dossier image-->
</div>
</body>
<footer>
    <?php require_once "footer.php" ?>
</footer>
</html>