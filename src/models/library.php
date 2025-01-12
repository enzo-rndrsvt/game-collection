<?php

# On récupère la fonction dans sql.php
include_once "sql.php";

# Fonction pour créer une nouvelle librairie de jeux
function create_library(
    int $userid,
    int $gameid,
): int {

    # On crée la connexion à la base de données
    $db = create_bdd();

    # On prépare la requête
    $query = $db->prepare('INSERT INTO library (user_id, game_id, time_played)
                                  VALUES (:userid, :gameid, 0)');

    # On exécute la requête
    $query->execute([
        'userid' => $userid,
        'gameid' => $gameid
        //'timeplayed' => $timeplayed
    ]);

    # On retourne l'identifiant de la librairie créée
    return $db->lastInsertId();
}

# Fonction pour récupérer une librairie de jeux à l'aide de son id
function get_library(int $id): array
{
    $db = create_bdd();

    $query = $db->prepare('SELECT * FROM library WHERE id = :id');
    $query->execute([
        'id' => $id
    ]);

    return $query->fetch();
}

# Fonction qui compte le nombre de jeux dans la librairie d'un utilisateur avec un jeu donné
function get_libraries(int $userId, int $gameId): int
{
    $db = create_bdd();

    $query = $db->prepare('SELECT COUNT(*) FROM library WHERE user_id = :userId AND game_id = :gameId');
    $query->execute([
        'userId' => $userId,
        'gameId' => $gameId
    ]);

    return $query->fetchColumn();
}

# Fonction pour récupérer tous les jeux de la librairie d'un utilisateur
function get_user_library(int $userid): array
{
    $db = create_bdd();

    $query = $db->prepare('SELECT * FROM library WHERE user_id = :userid');
    $query->execute([
        'userid' => $userid
    ]);

    return $query->fetchAll();
}

# Fonction pour récupérer les détails d'un jeu de la librairie d'un utilisateur
function get_user_library_details(int $userid): array
{
    $db = create_bdd();

    $request = 'SELECT games.id, games.name, games.editor, games.description, games.release_date, games.pc, games.ps, games.xbox, games.switch, games.image, games.site, library.time_played FROM users JOIN library ON users.id = library.user_id JOIN games ON library.game_id = games.id WHERE users.id = :userid';
    $query = $db->prepare($request);
    $query->execute([
        'userid' => $userid
    ]);

    return $query->fetchAll();
}

# Fonction pour mettre à jour une librairie de jeux
function update_library(
    int $userid,
    int $gameid,
    int $timeplayed
): void {
    $db = create_bdd();

    $query = $db->prepare('UPDATE library SET time_played = time_played + :timeplayed WHERE user_id = :userid AND game_id = :gameid');
    $query->execute([
        'userid' => $userid,
        'gameid' => $gameid,
        'timeplayed' => $timeplayed,
    ]);
}

# Fonction pour supprimer une librairie de jeux
function delete_library(int $id): void
{
    $db = create_bdd();

    $query = $db->prepare('DELETE FROM library WHERE id = :id');
    $query->execute([
        'id' => $id
    ]);
}

# Fonction pour récupérer les détails d'un jeu de la librairie d'un utilisateur
function get_user_library_game_details(int $userid, int $gameid): array
{
    $db = create_bdd();
    $request = 'SELECT g.id, g.name, g.editor, g.description, g.release_date, g.pc, g.ps, g.xbox, g.switch, g.image, g.site, l.time_played FROM library l INNER JOIN users u ON l.user_id = u.id INNER JOIN games g ON l.game_id = g.id WHERE u.id = :userid AND g.id = :gameid;';
    $query = $db->prepare($request);
    $query->execute([
        'userid' => $userid,
        'gameid' => $gameid
    ]);
    $var = $query->fetch(PDO::FETCH_ASSOC);
    return $var;
}

# Fonction qui récupère le prénom d'un utilisateur à l'aide de son id
function get_user_by_id(int $id): mixed
{
    $db = create_bdd();

    $query = $db->prepare('SELECT first_name FROM users WHERE id = :id');
    $query->execute([
        'id' => $id
    ]);

    $result = $query->fetch(PDO::FETCH_ASSOC);
    return $result['first_name'];
}

# Fonction pour récupérer le temps de jeux des 20 premiers joueurs avec leur jeux préférés
function get_20_first_player(): array
{
    $db = create_bdd();
    $query = $db->prepare('SELECT u.id AS user_id, u.first_name AS first_name, u.last_name AS last_name, total_played.total_time_played, favorite_game.name AS favorite_game, favorite_game.max_time_played AS max_time_on_favorite_game FROM users u
                        JOIN (SELECT l.user_id, SUM(l.time_played) AS total_time_played FROM library l GROUP BY l.user_id) 
                            total_played ON u.id = total_played.user_id
                        LEFT JOIN (SELECT l.user_id, g.name, l.time_played AS max_time_played FROM library l
                                JOIN games g ON l.game_id = g.id WHERE (l.user_id, l.time_played) IN (SELECT user_id, MAX(time_played) FROM library GROUP BY user_id))
                            favorite_game ON u.id = favorite_game.user_id 
                        ORDER BY total_played.total_time_played DESC LIMIT 20;');
    $query->execute();
    return $query->fetchAll();
}