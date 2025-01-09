<?php
session_start();

require __DIR__ . '/../models/library.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login');
    exit();
}

if (isset($_POST['game_id'])) {
    $user_id = $_SESSION['user_id'];
    $game_id = $_POST['game_id'];
    if(get_libraries($user_id, $game_id) > 0) {
        $_SESSION['error'] = "Le jeu est déjà dans votre bibliothèque.";
        header('Location: addGame');
        exit();
    }

    create_library($user_id, $game_id);
    header('Location: addGame');
    exit();
}
?>
