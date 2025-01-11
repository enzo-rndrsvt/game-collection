<?php
session_start();

require __DIR__ . '/../models/user.php';


$user = get_user($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Profile</title>

    <link rel="stylesheet" href="src/assets/css/general.css">
    <link rel="stylesheet" href="src/assets/css/header.css">
    <link rel="stylesheet" href="src/assets/css/footer.css">
    <link rel="stylesheet" href="src/assets/css/profile.css">

</head>
<header>
    <?php require_once "header.php" ?>
</header>

<body>
    <div class="content">
        <h1>Mon profil</h1>

        <!--Affichage des messages d'erreur ou de succès-->
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

        <!--Affichage des informations personnelles de l'utilisateur-->
        <div class="info">
            <p>Nom : <?php echo $user['last_name']; ?></p>
            <p>Prénom : <?php echo $user['first_name']; ?></p>
            <p>Email : <?php echo $user['email']; ?></p>
        </div>

        <!--Section permettant à l'utilisateur d'être redirigé pour modifier son profil / se déconnecter / supprimer son compte -->
        <div class="buttons">
            <button><a href="editProfile">MODIFIER MON PROFIL</a></button>
            <form method="POST" action="deleteProfile">
                <button type="submit">SUPPRIMER MON COMPTE</button>
            </form>
            <button><a href="logout">SE DECONNECTER</a></button>
        </div>
    </div>
</body>
<footer>
    <?php require_once "footer.php" ?>
</footer>
</html>