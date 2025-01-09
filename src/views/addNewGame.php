<?php
// On affiche les erreurs
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ajout d'un nouveau jeu</title>

    <link rel="stylesheet" href="src/assets/css/general.css">
    <link rel="stylesheet" href="src/assets/css/header.css">
    <link rel="stylesheet" href="src/assets/css/footer.css">
    <link rel="stylesheet" href="src/assets/css/addNewGame.css">

</head>
<header>
    <?php require_once "header.php" ?>
</header>

<body>
    <h1>Ajouter un jeu à sa bibliothèque</h1>
    <p>Le jeu que vous souhaiter ajouter n'existe pas ! Vous pouvez le créer, celui-ci sera automatiquement ajouter a
        votre bibliothèque !</p>

    <?php
    if (isset($_SESSION['error'])) {
        echo '<p id="error_message">' . $_SESSION['error'] . '</p>';
        unset($_SESSION['error']);
    }
    if (isset($_SESSION['validation'])) {
        echo '<p id="validation_message">' . $_SESSION['validation'] . '</p>';
        unset($_SESSION['validation']);
    }
    ?>

    <form action="createGame" method="POST">
        <p>Nom du jeu</p>
        <input type="text" id="nom" name="nom" placeholder="Nom du jeu">

        <p>Editeur du jeu</p>
        <input type="text" id="editeur" name="editeur" placeholder="Editeur du jeu">

        <p>Sortie du jeu</p>
        <input type="date" name="date" id="date">

        <div class="platformes">
            <p>Platformes</p>
            <p><input type="checkbox" id="playstation" name="playstation"> Playstation</p>
            <p><input type="checkbox" id="xbox" name="xbox"> Xbox</p>
            <p><input type="checkbox" id="nintendo" name="nintendo"> Nintendo</p>
            <p><input type="checkbox" id="pc" name="pc"> PC</p>
        </div>

        <p>Description du jeu</p>
        <textarea id="description" placeholder="Description du jeu" name="description"></textarea>

        <p>URL de la cover</p>
        <input type="url" id="cover" name="cover" placeholder="URL de la cover">

        <p>URL du site</p>
        <input type="url" id="site" name="site" placeholder="URL du site">

        <button type="submit">AJOUTER LE JEU</button>
    </form>
</body>
<footer>
    <?php require_once "footer.php" ?>
</footer>
</html>