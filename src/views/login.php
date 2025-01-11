<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="src/assets/css/general.css">
    <link rel="stylesheet" href="src/assets/css/footer.css">
    <link rel="stylesheet" href="src/assets/css/login.css">

</head>

<body>
    <div class="connexion">
        <h1>Se connecter à Game Collection</h1>

        <!--Affichage des messages d'erreur ou de succès-->
        <?php
        session_start();
        if (isset($_SESSION['error'])) {
            echo '<p class="message">' . $_SESSION['error'] . '</p>';
            unset($_SESSION['error']);
        }
        if (isset($_SESSION['validation'])) {
            echo '<p class="message">' . $_SESSION['validation'] . '</p>';
            unset($_SESSION['validation']);
        }
        ?>

        <!--Formulaire de connexion-->
        <form method="post" action="loginUser">
            <div class="form">
                <div>
                    <p>Email :</p>
                    <input type="email" name="email" required />
                </div>
                <div>
                    <p>Mot de passe :</p>
                    <input type="password" name="password" required />
                </div>
                <div>
                    <button type="submit">SE CONNECTER</button>
                </div>
            </div>
            <a href="register">S'inscrire</a> <!--Redirection pour l'inscription-->
        </form>
    </div>
</body>
<footer>
    <?php require_once "footer.php" ?>
</footer>

</html>