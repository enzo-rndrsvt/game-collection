<?php
session_start();
require '../models/library.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: /login');
    exit();
}

if (isset($_POST['game_id'])) {
    $user_id = $_SESSION['user_id'];
    $game_id = $_POST['game_id'];
    create_library($user_id, $game_id);
    header('Location: /addGame');
    exit();
}
?>
