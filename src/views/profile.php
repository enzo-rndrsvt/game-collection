<?php
session_start();

$basePath = dirname($_SERVER['SCRIPT_NAME']);
$basePath = str_replace('\\', '/', $basePath);

require __DIR__ . '../../models/user.php';

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

    <div class="content">
        <div class="info">
            <p>Nom : <?php echo $user['last_name']; ?></p>
            <p>Prénom : <?php echo $user['first_name']; ?></p>
            <p>Email : <?php echo $user['email']; ?></p>
    </div>
    
    <div class="buttons">
        <a href="<?php echo $basePath; ?>/editProfile"><button>MODIFIER MON PROFIL</button></a>
        <form method="POST" action="<?php echo $basePath; ?>/src/controllers/deleteProfile.php">
            <button type="submit">SUPPRIMER MON COMPTE</button>
        </form>
        <a href="<?php echo $basePath; ?>/logout"><button>SE DECONNECTER</button></a>
    </div>
</body>
<footer>
    <?php require_once "footer.php" ?>
</footer>
</html>