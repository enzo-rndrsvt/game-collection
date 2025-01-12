<?php
session_start();
require __DIR__ . '/../models/library.php';
$game = get_user_library_game_details($_SESSION['user_id'], $_POST['game_id']);
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
        <h1><?php echo $game['name'] ?></h1> <!--à modif avec la requête qui récupère le nom du jeu avec l'id passé en POST-->
        <p>Editeur : <?php echo $game['editor'] ?> </p> <!--à modif avec la requête qui récupère l'éditeur du jeu avec l'id passé en POST-->
        <p>Sortie le <?php echo $game['release_date'] ?></p> <!--à modif avec la requête qui récupère le date de sortie du jeu avec l'id passé en POST-->
        <p>Temps passé: <?php echo $game['time_played'] ?>h</p> <!--à modif avec la requête qui récupère le temps de jeu du joueur avec l'id passé en POST et l'id du joueur-->
    
    
        <h2>Ajouter du temps passé sur le jeu</h2>
        <!--Formulaire pour modifier le temps de jeu-->
        <form action="updateGame" method="POST">
            <p>Temps passé sur le jeu</p>
            <input type="text" id="nbHeuresJeu" name="nbHeuresJeu" value="<?php echo $game['time_played'] ?>">
            <input type="hidden" id="game_id" name="game_id" value="<?php echo $game['id'] ?>">
            <button type="submit">AJOUTER</button>
        </form>

        <div class="buttons">
            <!--Formulaire pour supprimer le jeu de la bibliothèque de l'utilisateur-->
            <form method="POST" action="deleteGame">
                <input type="hidden" id="game_id" name="game_id" value="<?php echo $game['id'] ?>">
                <button type="submit">SUPPRIMER LE JEU DE MA BIBLIOTHEQUE</button>
            </form>
        </div>
    </div>
    <img class="cover" src="<?php echo $game['image'] ?>" alt="Couverture du jeu">
</div>
</body>
<footer>
    <?php require_once "footer.php" ?>
</footer>
</html>