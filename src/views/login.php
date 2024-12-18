<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="/src/assets/css/general.css">
    <link rel="stylesheet" href="/src/assets/css/login.css">

</head>

<body>
    <div class="connexion">
        <h1>Se connecter à Game Collection</h1>
        <?php
        session_start();
        if (isset($_SESSION['error'])) {
            echo '<p style="color:red;">' . $_SESSION['error'] . '</p>';
            unset($_SESSION['error']);
        }
        if (isset($_SESSION['validation'])) {
            echo '<p style="color:green;">' . $_SESSION['validation'] . '</p>';
            unset($_SESSION['validation']);
        }
        ?>
        <form method="post" action="/src/controllers/login.php">
            <div class="form">
                <div>
                    <p>Email :</p>
                    <input type="email" name="email" />
                </div>
                <div>
                    <p>Mot de passe :</p>
                    <input type="password" name="password" />
                </div>
                <div>
                    <button type="submit">SE CONNECTER</button>
                </div>
            </div>
            <a href="/register">S'inscrire</a>
        </form>
    </div>
</body>

</html>