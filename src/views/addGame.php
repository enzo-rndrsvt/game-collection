<?php
$basePath = dirname($_SERVER['SCRIPT_NAME']);
$basePath = str_replace('\\', '/', $basePath);

require __DIR__ . '../../models/game.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ajout d'un jeu</title>

    <link rel="stylesheet" href="src/assets/css/general.css">
    <link rel="stylesheet" href="src/assets/css/header.css">
    <link rel="stylesheet" href="src/assets/css/footer.css">
    <link rel="stylesheet" href="src/assets/css/addGame.css">

</head>
<header>
    <?php require_once "header.php" ?>
</header>

<body>
    <div class="research">
        <h1>Ajouter un jeu à sa bibliothèque</h1>
        <input type="text" name="search" placeholder="Rechercher un jeu">
        <button>RECHERCHER</button>
        <h1>Resultats de la recherche</h1>
    </div>
    
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
    
    <div class="games">
        <?php foreach(get_games() as $game): ?>
            <div class="game-card">
                <div class="game-image">
                    <img src="<?php echo $game['image'] ?>" alt="Arriere plan">
                </div>
                <div class="game-content">
                    <h2><?php echo $game['name']?></h2>
                    <p><?php echo $game['editor']?></p>
                    <form action="<?php echo $basePath; ?>/src/controllers/addGame.php" method="POST">
                        <input type="hidden" name="game_id" value="<?php echo $game['id'] ?>">
                        <button type="submit">AJOUTER A LA BIBLIOTHEQUE</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    
</body>
<footer>
    <?php require_once "footer.php" ?>
</footer>
</html>