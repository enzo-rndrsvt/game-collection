<?php
session_start();

# On détruit la session
session_destroy();

# On vérifie que l'utilisateur est connecté, sinon on le renvoie à la page de connexion
if (!isset($_SESSION['user_id'])) {
    header('Location: login');
    exit();
}

# On redirige l'utilisateur vers la page de connexion
header('Location: login');

exit();
