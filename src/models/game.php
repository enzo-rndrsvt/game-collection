<?php

require "sql.php";

function create_game(
    string $name,
    string $description,
    string $release_date, // Au format 'YYYY-MM-DD'
    int $pc,
    int $ps,
    int $xbox,
    int $switch,
    string $image,
    string $site
): int {

    $db = create_bdd();

    $query = $db->prepare('INSERT INTO games (name, description, release_date, pc, ps, xbox, switch, image, site)
                                  VALUES (:name, :description, :release_date, :pc, :ps, :xbox, :switch, :image, :site)');

    $query->execute([
        'name' => $name,
        'description' => $description,
        'release_date' => $release_date,
        'pc' => $pc,
        'ps' => $ps,
        'xbox' => $xbox,
        'switch' => $switch,
        'image' => $image,
        'site' => $site
    ]);

    return $db->lastInsertId();
}

function get_game(int $id): array
{
    $db = create_bdd();

    $query = $db->prepare('SELECT * FROM games WHERE id = :id');
    $query->execute([
        'id' => $id
    ]);

    return $query->fetch();
}

function get_games(): array
{
    $db = create_bdd();

    $query = $db->query('SELECT * FROM games');
    return $query->fetchAll();
}

function get_game_name(string $name): int
{
    $db = create_bdd();
    $query = $db->prepare("SELECT COUNT(*) FROM games WHERE name = :name");
    $query->execute([
        'name' => $name
    ]);
    return $query->fetchColumn();
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
    string $image,
    string $site
): void {
    $db = create_bdd();

    $query = $db->prepare('UPDATE games SET name = :name, description = :description, release_date = :release_date, pc = :pc, ps = :ps, xbox = :xbox, switch = :switch, image = :image, site = :site WHERE id = :id');

    $query->execute([
        'id' => $id,
        'name' => $name,
        'description' => $description,
        'release_date' => $release_date,
        'pc' => $pc,
        'ps' => $ps,
        'xbox' => $xbox,
        'switch' => $switch,
        'image' => $image,
        'site' => $site
    ]);
}

function delete_game(int $id): void
{
    $db = create_bdd();

    $query = $db->prepare('DELETE FROM games WHERE id = :id');
    $query->execute([
        'id' => $id
    ]);
}