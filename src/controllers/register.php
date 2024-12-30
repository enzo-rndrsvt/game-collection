<?php

session_start();

$basePath = dirname(dirname(dirname($_SERVER['SCRIPT_NAME'])));
$basePath = str_replace('\\', '/', $basePath);


require '../models/user.php';

if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['verif_password'])) {
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);


    if (get_email($email) > 0) {
        $_SESSION['error'] = "L'adresse mail est déjà utilisée.";
        header('Location:' . $basePath . '/register');
        exit();
    }

    if ($_POST['password'] == $_POST['verif_password']) {
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        create_user($nom, $prenom, $email, $password);
    } else {
        $_SESSION['error'] = "Les mots de passe ne correspondent pas.";
        header('Location:' . $basePath . '/register');
        exit();
    }

    $_SESSION['validation'] = "Veuillez maintenant vous connecter.";
    header('Location:' . $basePath . '/login');
    exit();
}
?>