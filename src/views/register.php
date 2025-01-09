<?php
require_once __DIR__ . '/../tools/getBasePath.php';

$basePath = getBasePath();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="src/assets/css/general.css">
    <link rel="stylesheet" href="src/assets/css/register.css">

</head>

<body>
    <div class="register">
        <h1>Inscription</h1>
        <?php
        session_start();
        if (isset($_SESSION['error'])) {
            echo '<p id="error_message">' . $_SESSION['error'] . '</p>';
            unset($_SESSION['error']);
        }
        if (isset($_SESSION['validation'])) {
            echo '<p id="validation_message">' . $_SESSION['validation'] . '</p>';
            unset($_SESSION['validation']);
        }
        ?>
        <form method="post" action="<?php echo $basePath; ?>/src/controllers/register.php">
            <div class="form">
                <div>
                    <p>Nom :</p>
                    <input type="text" name="nom" required />
                </div>
                <div>
                    <p>Prénom :</p>
                    <input type="text" name="prenom" required />
                </div>
                <div>
                    <p>Email :</p>
                    <input type="email" name="email" required />
                </div>
                <div>
                    <p>Mot de passe :</p>
                    <input type="password" name="password" required />
                </div>
                <div>
                    <p>Confirmation du mot de passe :</p>
                    <input type="password" name="verif_password" required />
                </div>
                <div>
                    <button type="submit">S'INSCRIRE</button>
                </div>
            </div>
            <a href="<?php echo $basePath; ?>/login">Se connecter</a>
        </form>
    </div>
</body>
</html>