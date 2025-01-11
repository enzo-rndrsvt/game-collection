<?php

include_once "sql.php";

function create_library(
    int $userid,
    int $gameid,
): int {

    $db = create_bdd();

    $query = $db->prepare('INSERT INTO library (user_id, game_id, time_played)
                                  VALUES (:userid, :gameid, 0)');

    $query->execute([
        'userid' => $userid,
        'gameid' => $gameid
        //'timeplayed' => $timeplayed
    ]);

    return $db->lastInsertId();
}

function get_library(int $id): array
{
    $db = create_bdd();

    $query = $db->prepare('SELECT * FROM library WHERE id = :id');
    $query->execute([
        'id' => $id
    ]);

    return $query->fetch();
}

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

function get_user_library(int $userid): array
{
    $db = create_bdd();

    $query = $db->prepare('SELECT * FROM library WHERE user_id = :userid');
    $query->execute([
        'userid' => $userid
    ]);

    return $query->fetchAll();
}


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

function get_user_library_game_details(int $userid, int $gameid): array
{
    $db = create_bdd();
    $request = 'SELECT games.id, games.name, games.editor, games.description, games.release_date, games.pc, games.ps, games.xbox, games.switch, games.image, games.site, library.time_played FROM library INNER JOIN games ON library.game_id = games.id WHERE library.user_id = :userid AND library.game_id = :gameid;';
    $query = $db->prepare($request);
    $query->execute([
        'userid' => $userid,
        'gameid' => $gameid
    ]);
    return $query->fetchAll();
}

function update_library(
    int $id,
    int $userid,
    int $gameid,
    int $timeplayed
): void {
    $db = create_bdd();

    $query = $db->prepare('UPDATE library SET user_id = :userid, game_id = :gameid, time_played = :timeplayed WHERE id = :id');
    $query->execute([
        'userid' => $userid,
        'gameid' => $gameid,
        'timeplayed' => $timeplayed,
        'id' => $id
    ]);
}


function delete_library(int $id): void
{
    $db = create_bdd();

    $query = $db->prepare('DELETE FROM library WHERE id = :id');
    $query->execute([
        'id' => $id
    ]);
}

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