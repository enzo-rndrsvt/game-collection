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

    <title>Modifier le profil</title>

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

    <form action="updateProfile" method="POST">
        <p>Nom :</p>
        <input type="text" id="nom" name="nom" value="<?php echo $user['last_name']; ?>">

        <p>Prénom :</p>
        <input type="text" id="prenom" name="prenom" value="<?php echo $user['first_name']; ?>">

        <p>Email :</p>
        <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>">

        <p>Mot de passe :</p>
        <input type="password" name="password" id="password">

        <p>Confirmation du mot de passe :</p>
        <input type="password" name="verif_password" id="verif_password"/>

        <button type="submit">MODIFIER</button>
    </form>
    <div class="buttons">
        <form method="POST" action="deleteProfile">
            <button type="submit">SUPPRIMER MON COMPTE</button>
        </form>
        <a href="logout"><button>SE DECONNECTER</button></a>
    </div>
</div>
</body>
<footer>
    <?php require_once "footer.php" ?>
</footer>
</html>