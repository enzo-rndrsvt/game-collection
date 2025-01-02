<?php
session_start();

$basePath = dirname(dirname(dirname($_SERVER['SCRIPT_NAME'])));
$basePath = str_replace('\\', '/', $basePath);

require "../models/user.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = intval($_SESSION['user_id']);
    session_destroy();
    delete_user($user_id);
    header('Location: ' . $basePath . '/');

    exit();
} else {
    $_SESSION['error'] = "Problème lors de la suppression du compte.";
    header('Location:' . $basePath . '/profile');
    exit();
}


?>