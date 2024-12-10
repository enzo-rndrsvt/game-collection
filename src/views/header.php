<!-- HEADER -->
<header>
    <a id="accueil" href="./home.php">
        <img src="assets/images/logo.png" alt="Logo de de game collection">
    </a>
    <nav>
        <ul>
            <li>
                <a href="./events.php">MA BIBLIOTHEQUE</a>
            </li>
            <li>
                <a href="/src/controllers/addAGame.php">AJOUTER UN JEU</a>
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
                    <a href="/src/controllers/login.php">CONNEXION</a>
                </li>
            <?php endif; ?>

      
        </ul>
    </nav>
</header>