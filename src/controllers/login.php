<?php
session_start();



require __DIR__ . '/../models/user.php';

if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];

    $user = get_user_by_email($email);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header('Location: /');
        exit();
    } else {
        $_SESSION['error'] = "Adresse mail ou mot de passe incorrect.";
        header('Location: login');
        exit();
    }
}

?>