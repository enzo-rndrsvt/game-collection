<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Profile</title>

    <link rel="stylesheet" href="/src/assets/css/general.css">
    <link rel="stylesheet" href="/src/assets/css/header.css">
    <link rel="stylesheet" href="/src/assets/css/footer.css">
    <link rel="stylesheet" href="/src/assets/css/profile.css">

</head>
<header>
    <?php require_once "header.php" ?>
</header>

<body>
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

    <form action="/src/controllers/addNewGame.php" method="POST">
        <p>Nom :</p>
        <input type="text" id="nom" name="nom" placeholder="Nom">

        <p>Email :</p>
        <input type="email" id="email" name="email" placeholder="email.email@email.email">

        <p>Mot de passe :</p>
        <input type="password" name="password" id="password">

        <p>Confirmation du mot de passe :</p>
        <input type="password" name="verif_password" required />

        <button type="submit">MODIFIER</button>
    </form>
    <div>
        <a href=""><button>SUPPRIMER MON COMPTE</button></a>
        <a href="/logout"><button>SE DECONNECTER</button></a>
    </div>
</body>

</html>