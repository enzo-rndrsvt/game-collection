<?php

session_start();

# On vérifie que l'utilisateur est connecté, sinon on le renvoie à la page de connexion
if (!isset($_SESSION['user_id'])) {
    header('Location: login');
    exit();
}

# On récupère les fonctions nécessaires
require __DIR__ . '/../models/user.php';

# On vérifie que le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    # On vérifie que tous les champs sont remplis
    if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['verif_password'])) {
        # On récupère les données du formulaire
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $email = htmlspecialchars($_POST['email']);

        # On vérifie que l'adresse mail n'est pas déjà utilisée
        if (get_email($email) > 0) {
            $_SESSION['error'] = "⚠ L'adresse mail est déjà utilisée.";
            header('Location: register');
            exit();
        }
        # On vérifie que les mots de passe correspondent
        if ($_POST['password'] == $_POST['verif_password']) {
            # On hash le mot de passe
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            # On crée l'utilisateur
            create_user($prenom, $nom, $email, $password);
        } else {
            # On renvoie une erreur si les mots de passe ne correspondent pas
            $_SESSION['error'] = "⚠ Les mots de passe ne correspondent pas.";
            header('Location: register');
            exit();
        }

        # On redirige l'utilisateur vers la page de connexion avec un message de succès
        $_SESSION['validation'] = "✔ Inscription réalisée avec succès, veuillez maintenant vous connecter.";
        header('Location: login');
        exit();
    }
}
?>