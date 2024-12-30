<?php

session_start();

$basePath = dirname(dirname(dirname($_SERVER['SCRIPT_NAME'])));
$basePath = str_replace('\\', '/', $basePath);


require '../models/user.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];

    $user = get_user($email);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header('Location: ' . $basePath . '/');
        exit();
    } else {
        $_SESSION['error'] = "Adresse mail ou mot de passe incorrect.";
        header('Location:' . $basePath . '/login');
        exit();
    }
}

?>