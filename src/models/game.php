<?php

function create_game(
    string $name,
    string $description,
    string $release_date, // Au format 'YYYY-MM-DD'
    bool $pc,
    bool $ps,
    bool $xbox,
    bool $switch,
    string $image
) : int {

    $db = create_bdd();

    $query = $db->prepare('INSERT INTO games (name, description, release_date, pc, ps, xbox, switch, image)
                                  VALUES (:name, :description, :release_date, :pc, :ps, :xbox, :switch, :image)');

    $query->execute([
        'name' => $name,
        'description' => $description,
        'release_date' => $release_date,
        'pc' => $pc,
        'ps' => $ps,
        'xbox' => $xbox,
        'switch' => $switch,
        'image' => $image
    ]);

    return $db->lastInsertId();
}

function get_game(int $id) : array {
    $db = create_bdd();

    $query = $db->prepare('SELECT * FROM games WHERE id = :id');
    $query->execute([
        'id' => $id
    ]);

    return $query->fetch();
}

function get_games() : array {
    $db = create_bdd();

    $query = $db->query('SELECT * FROM games');
    return $query->fetchAll();
}

function update_game(
    int $id,
    string $name,
    string $description,
    string $release_date, // Au format 'YYYY-MM-DD'
    bool $pc,
    bool $ps,
    bool $xbox,
    bool $switch,
    string $image
) : void {
    $db = create_bdd();

    $query = $db->prepare('UPDATE games SET name = :name, description = :description, release_date = :release_date, pc = :pc, ps = :ps, xbox = :xbox, switch = :switch, image = :image WHERE id = :id');

    $query->execute([
        'id' => $id,
        'name' => $name,
        'description' => $description,
        'release_date' => $release_date,
        'pc' => $pc,
        'ps' => $ps,
        'xbox' => $xbox,
        'switch' => $switch,
        'image' => $image
    ]);
}

function delete_game(int $id) : void
{
    $db = create_bdd();

    $query = $db->prepare('DELETE FROM games WHERE id = :id');
    $query->execute([
        'id' => $id
    ]);
}