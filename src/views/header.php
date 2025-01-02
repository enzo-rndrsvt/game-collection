<!-- HEADER -->
<?php
session_start();

$basePath = dirname($_SERVER['SCRIPT_NAME']);
$basePath = str_replace('\\', '/', $basePath);


$isUserLoggedIn = isset($_SESSION['user_id']);
?>
<header>
    <a id="accueil" href="<?php echo $basePath; ?>/">
        <img src="src/assets/images/logo.png" alt="Logo de de game collection">
    </a>
    <nav>
        <ul>
            <li><a href="<?php echo $basePath; ?>/">MA BIBLIOTHEQUE</a></li>
            <li><a href="<?php echo $basePath; ?>/addGame">AJOUTER UN JEU</a></li>
            <li><a href="<?php echo $basePath; ?>/addNewGame">add nv jeu</a></li>
            <li><a href="<?php echo $basePath; ?>/ranking">CLASSEMENT</a></li>
            <li><a href="<?php echo $basePath; ?>/profile">PROFIL</a></li>
        </ul>
    </nav>
</header>