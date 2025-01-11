<?php
session_start();

# On récupère les fonctions nécessaires
require __DIR__ . '/../models/user.php';

# On vérifie que le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    # On vérifie que tous les champs sont remplis
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        # On récupère les données du formulaire
        $email = htmlspecialchars($_POST['email']);
        $password = $_POST['password'];

        # On vérifie que l'utilisateur existe et que le mot de passe est correct
        $user = get_user_by_email($email);
        if ($user && password_verify($password, $user['password'])) {
            # On connecte l'utilisateur et on le redirige vers la page d'accueil
            $_SESSION['user_id'] = $user['id'];
            header('Location: /');
            exit();
        } else {
            # On renvoie une erreur si l'utilisateur n'existe pas ou si le mot de passe est incorrect
            $_SESSION['error'] = "Adresse mail ou mot de passe incorrect.";
            header('Location: login');
            exit();
        }
    }
}
?>