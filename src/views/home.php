<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: /login');
    exit();
}

require_once __DIR__ . '../../models/library.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Accueil</title>

    <link rel="stylesheet" href="/src/assets/css/general.css">
    <link rel="stylesheet" href="/src/assets/css/header.css">
    <link rel="stylesheet" href="/src/assets/css/footer.css">
    <link rel="stylesheet" href="/src/assets/css/home.css">

</head>
<header>
    <?php require_once "header.php" ?>
</header>

<body>
    <div class="image-container">
        <img src="/src/assets/images/fond.png" alt="Image d'arriere plan">
        <div class="text-1"><p>SALUT <?php echo get_user_by_id($_SESSION['user_id']) ?> !</p></div>
        <div class="text-2"><p>PRÊT À AJOUTER DES</p></div>
        <div class="text-3"><p>JEUX À TA COLLECTION ?</p></div>
    </div>
    <h3 class="titre">Mes jeux</h3>
    <div class="games">
        <?php foreach(get_user_library_details($_SESSION['user_id']) as $game): ?>
            <div class="game-card">
                <div class="game-image">
                    <img src="<?php echo $game['image'] ?>" alt="Arriere plan">
                </div>
                <div class="game-content">
                    <h2><?php echo $game['name']?></h2>
                    <p><?php echo $game['editor']?></p>
                    
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>