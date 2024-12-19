<!-- HEADER -->
<?php
session_start();
if (isset($_SESSION['user'])) {
    $isUserLoggedIn = true;
} else {
    $isUserLoggedIn = false;
}
?>
<header>
    <a id="accueil" href="/">
        <img src="/src/assets/images/logo.png" alt="Logo de de game collection">
    </a>
    <nav>
        <ul>
            <li>
                <a href="./events.php">MA BIBLIOTHEQUE</a>
            </li>
            <li>
                <a href="/addNewGame">AJOUTER UN JEU</a>
            </li>
            <li>
                <a href="/src/controllers/ranking.php">CLASSEMENT</a>
            </li>
            <?php if ($isUserLoggedIn): ?>
                <li>
                    <a href=/src/controllers/profil.php>PROFIL</a>
                </li>

            <?php else: ?>
                <li>
                    <a href="/register">CONNEXION</a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</header>