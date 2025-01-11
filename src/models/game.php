<?php
# On récupère la fonction dans sql.php
include_once "sql.php";

# Fonction pour créer un nouveau jeu
function create_game(
    string $name,
    string $editor,
    string $description,
    string $release_date, // Au format 'YYYY-MM-DD'
    int $pc,
    int $ps,
    int $xbox,
    int $switch,
    string $image,
    string $site
): int {

    # On crée la connexion à la base de données
    $db = create_bdd();

    # On prépare la requête
    $query = $db->prepare('INSERT INTO games (name, editor, description, release_date, pc, ps, xbox, switch, image, site)
                                  VALUES (:name, :editor, :description, :release_date, :pc, :ps, :xbox, :switch, :image, :site)');

    # On exécute la requête
    $query->execute([
        'name' => $name,
        'editor' => $editor,
        'description' => $description,
        'release_date' => $release_date,
        'pc' => $pc,
        'ps' => $ps,
        'xbox' => $xbox,
        'switch' => $switch,
        'image' => $image,
        'site' => $site
    ]);

    # On retourne l'identifiant du jeu créé
    return $db->lastInsertId();
}

# Fonction pour récupérer un jeu à l'aide de son id
function get_game(int $id): array
{
    $db = create_bdd();
    $query = $db->prepare('SELECT * FROM games WHERE id = :id');
    $query->execute([
        'id' => $id
    ]);
    return $query->fetch();
}

# Fonction pour récupérer tous les jeux
function get_games(): array
{
    $db = create_bdd();
    $query = $db->query('SELECT * FROM games');
    return $query->fetchAll();
}

# Fonction pour récupérer les jeux qui ressemblent à un nom donné
function get_games_like(string $name): array
{
    $db = create_bdd();
    $query = $db->prepare('SELECT * FROM games WHERE name LIKE :name');
    $query->execute([
        'name' => '%' . $name . '%'
    ]);

    return $query->fetchAll();
}

# Fonction qui compte le nombre de jeux avec un nom donné
function get_game_name(string $name): int
{
    $db = create_bdd();
    $query = $db->prepare("SELECT COUNT(*) FROM games WHERE name = :name");
    $query->execute([
        'name' => $name
    ]);
    return $query->fetchColumn();
}

# Fonction pour mettre à jour un jeu
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

# Fonction pour supprimer un jeu
function delete_game(int $id): void
{
    $db = create_bdd();

    $query = $db->prepare('DELETE FROM games WHERE id = :id');
    $query->execute([
        'id' => $id
    ]);
}