<?php
session_start();

require "../models/user.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = intval($_SESSION['user_id']);
    session_destroy();
    delete_user($user_id);
    header('Location: login');

    exit();
} else {
    $_SESSION['error'] = "Problème lors de la suppression du compte.";
    header('Location: profile');
    exit();
}


?>