<!-- HEADER -->
<?php
session_start();
$isUserLoggedIn = isset($_SESSION['user_id']);
?>


<header>
    <a id="accueil" href="/">
        <img src="src/assets/images/logo.png" alt="Logo de de game collection">
    </a>
    <nav>
        <ul>
            <li><a href="/">MA BIBLIOTHEQUE</a></li>
            <li><a href="addGame">AJOUTER UN JEU</a></li>
            <li><a href="addNewGame">add nv jeu</a></li>
            <li><a href="ranking">CLASSEMENT</a></li>
            <li><a href="profile">PROFIL</a></li>
        </ul>
    </nav>
</header>