<?php
session_start();

# On vérifie que l'utilisateur est connecté, sinon on le renvoie à la page de connexion
if (!isset($_SESSION['user_id'])) {
    header('Location: login');
    exit();
}

# On récupère les fonctions nécessaires
require __DIR__ . '/../models/user.php';

# On récupère les informations nécessaires
$user_id = $_SESSION['user_id'];
$user = get_user($user_id);

# On vérifie que le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    # On vérifie que tous les champs sont remplis
    $fname = !empty($_POST['prenom']) ? htmlspecialchars($_POST['prenom']) : $user['first_name'];
    $lname = !empty($_POST['nom']) ? htmlspecialchars($_POST['nom']) : $user['last_name'];
    $email = !empty($_POST['email']) ? htmlspecialchars($_POST['email']) : $user['email'];

    # On vérifie que l'email n'est pas déjà utilisé
    if ($email !== $user['email'] && get_email($email) > 0) {
        $_SESSION['error'] = "Cet email est déjà utilisé par un autre compte.";
        header('Location: editProfile');
        exit();
    }

    # On vérifie que les mots de passe correspondent
    if (!empty($_POST['password']) || !empty($_POST['verif_password'])) {
        if (!empty($_POST['password']) && !empty($_POST['verif_password'])) {
            if ($_POST['password'] === $_POST['verif_password']) {
                # On hash le mot de passe
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            } else {
                # On renvoie une erreur si les mots de passe ne correspondent pas
                $_SESSION['error'] = "⚠ Les mots de passe ne correspondent pas.";
                header('Location: editProfile');
                exit();
            }
        } else {
            # On renvoie une erreur si un des deux champs de mot de passe est vide
            $_SESSION['error'] = "⚠ Veuillez remplir les deux champs de mot de passe.";
            header('Location: editProfile');
            exit();
        }
    } else {
        # On garde le mot de passe actuel si les champs ne sont pas remplis
        $password = $user['password'];
    }

    # On met à jour le profil
    update_user($user_id, $fname, $lname, $email, $password);

    # On redirige l'utilisateur vers son profil avec un message de succès
    $_SESSION['validation'] = "✔ Profil mis à jour avec succès.";
    header('Location: profile');
    exit();
}

?>