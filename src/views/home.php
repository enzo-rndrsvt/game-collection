<?php
session_start();
if (!isset($_SESSION['user_id'])) {

    header('Location: login');
    exit();
}

require_once __DIR__ . '/../models/library.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Accueil</title>

    <link rel="stylesheet" href="src/assets/css/general.css">
    <link rel="stylesheet" href="src/assets/css/header.css">
    <link rel="stylesheet" href="src/assets/css/footer.css">
    <link rel="stylesheet" href="src/assets/css/home.css">

</head>
<header>
    <?php require_once "header.php" ?>
</header>

<body>
    <!--Bandeau de la page d'accueil-->
    <div class="image-container">
        <img src="src/assets/images/fond.png" alt="Image d'arriere plan">
        <div class="text-1"><p>SALUT <?php echo get_user_by_id($_SESSION['user_id']) ?> !</p></div>
        <div class="text-2"><p>PRÊT À AJOUTER DES</p></div>
        <div class="text-3"><p>JEUX À TA COLLECTION ?</p></div>
    </div>
    <h3 class="titre">Mes jeux</h3>

    <?php
    if (isset($_SESSION['error'])) {
        echo '<p class="message">' . $_SESSION['error'] . '</p>';
        unset($_SESSION['error']);
    }
    if (isset($_SESSION['validation'])) {
        echo '<p class="message">' . $_SESSION['validation'] . '</p>';
        unset($_SESSION['validation']);
    }
    ?>
    
    <div class="games">
        <?php
        // On récupère les jeux de l'utilisateur
        $userLibrary = get_user_library_details($_SESSION['user_id']);
        if (empty($userLibrary)): ?>
            <p>Vous n'avez pas encore de jeux dans votre bibliothèque.</p>
        <?php else: ?>
            <!-- On affiche les jeux de l'utilisateur s'il en a-->
            <?php foreach($userLibrary as $game): ?>
                <form action="editGame" method="POST" class="game-card">
                    <input type="hidden" name="game_id" value="<?php echo $game['id'] ?>">
                    <button type="submit">
                    <div class="edit-message">Modifier</div>
                    <div class="game-image">
                        <img src="<?php echo $game['image'] ?>" alt="Arriere plan">
                    </div>
                    <div class="game-content">
                        <h2><?php echo $game['name']?> <span class="game-hours"><?php echo $game['time_played']?>h</span></h2>
                        <p><?php echo $game['editor']?></p>
                    </div>
                    
                    </button>
                </form>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</body>
<footer>
    <?php require_once "footer.php" ?>
</footer>

</html>