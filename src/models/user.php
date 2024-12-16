<?php

function create_user(
    string $fname,
    string $lname,
    string $email,
    string $password # Must be hashed
) : int {

    $db = create_bdd();

    $query = $db->prepare('INSERT INTO users (email, password, first_name, last_name)
                                  VALUES (:email, :password, :fname, :lname)');

    $query->execute([
        'email' => $email,
        'password' => $password,
        'fname' => $fname,
        'lname' => $lname
    ]);

    return $db->lastInsertId();
}


function get_user(int $id) : array {
    $db = create_bdd();

    $query = $db->prepare('SELECT * FROM users WHERE id = :id');
    $query->execute([
        'id' => $id
    ]);

    return $query->fetch();
}

function update_user(
    int $id,
    string $fname,
    string $lname,
    string $email,
    string $password # Must be hashed
) : void {
    $db = create_bdd();

    $query = $db->prepare('UPDATE users SET email = :email, password = :password, first_name = :fname, last_name = :lname WHERE id = :id');
    $query->execute([
        'email' => $email,
        'password' => $password,
        'fname' => $fname,
        'lname' => $lname,
        'id' => $id
    ]);
}

function delete_user(int $id) : void {
    $db = create_bdd();

    $query = $db->prepare('DELETE FROM users WHERE id = :id');
    $query->execute([
        'id' => $id
    ]);
}
