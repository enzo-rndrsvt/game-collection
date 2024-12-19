<?php


function create_library(
    int $userid,
    int $gameid,
    string $timeplayed // Au format 'YYYY-MM-DD HH:MM:SS'
): int {

    $db = create_bdd();

    $query = $db->prepare('INSERT INTO library (user_id, game_id, time_played)
                                  VALUES (:userid, :gameid, :timeplayed)');

    $query->execute([
        'userid' => $userid,
        'gameid' => $gameid,
        'timeplayed' => $timeplayed
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

function get_user_library(int $userid): array
{
    $db = create_bdd();

    $query = $db->prepare('SELECT * FROM library WHERE user_id = :userid');
    $query->execute([
        'userid' => $userid
    ]);

    return $query->fetchAll();
}

function update_library(
    int $id,
    int $userid,
    int $gameid,
    string $timeplayed // Au format 'YYYY-MM-DD HH:MM:SS'
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

