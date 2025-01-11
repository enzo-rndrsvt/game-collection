<?php
require __DIR__ . '/../models/library.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classement</title>

    <link rel="stylesheet" href="src/assets/css/general.css">
    <link rel="stylesheet" href="src/assets/css/header.css">
    <link rel="stylesheet" href="src/assets/css/footer.css">
    <link rel="stylesheet" href="src/assets/css/ranking.css">   
</head>
<header>
    <?php require_once "header.php" ?>
</header>
<body>
<div class="ranking">
    <h1>Classement des temps passés</h1>
    <!--Tableau des scores-->
        <table border="0">
            <tr>
                <th>Joueur</th>
                <th>Temps passés</th>
                <th>Jeu favori</th>
            </tr>
            <!--Affichage des 20 meilleurs joueurs du classement en terme de total d'heures de jeu-->
        <?php foreach(get_20_first_player() as $users): ?>
            <tr>
                <td><?php echo $users['first_name'] . ' ' . $users['last_name'] ?></td>
                <td><?php echo $users['total_time_played'] . ' h' ?></td>
                <td><?php echo $users['favorite_game'] ?></td>
            </tr>
        <?php endforeach; ?>
        </table>
    </div>
</body>
<footer>
    <?php require_once "footer.php" ?>
</footer>
</html>