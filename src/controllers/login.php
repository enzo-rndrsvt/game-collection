<?php

session_start();

require '../models/user.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];

    $user = get_user($email);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user['id'];
        header('Location: /');
        exit();
    } else {
        $_SESSION['error'] = "Adresse mail ou mot de passe incorrect.";
        header('Location: /login');
        exit();
    }


}

?>