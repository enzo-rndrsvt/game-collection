<?php

session_start();



require __DIR__ . '/../models/user.php';

if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['verif_password'])) {
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);


    if (get_email($email) > 0) {
        $_SESSION['error'] = "⚠ L'adresse mail est déjà utilisée.";
        header('Location: register');
        exit();
    }

    if ($_POST['password'] == $_POST['verif_password']) {
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        create_user($prenom, $nom, $email, $password);
    } else {
        $_SESSION['error'] = "⚠ Les mots de passe ne correspondent pas.";
        header('Location: register');
        exit();
    }

    $_SESSION['validation'] = "✔ Inscription réalisée avec succès, veuillez maintenant vous connecter.";
    header('Location: login');
    exit();
}
?>