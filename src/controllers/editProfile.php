<?php
session_start();

require __DIR__ . '/../models/user.php';

$user_id = $_SESSION['user_id'];
$user = get_user($user_id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fname = !empty($_POST['prenom']) ? htmlspecialchars($_POST['prenom']) : $user['first_name'];
    $lname = !empty($_POST['nom']) ? htmlspecialchars($_POST['nom']) : $user['last_name'];
    $email = !empty($_POST['email']) ? htmlspecialchars($_POST['email']) : $user['email'];

    if ($email !== $user['email'] && get_email($email) > 0) {
        $_SESSION['error'] = "Cet email est déjà utilisé par un autre compte.";
        header('Location: editProfile');
        exit();
    }


    if (!empty($_POST['password']) || !empty($_POST['verif_password'])) {
        if (!empty($_POST['password']) && !empty($_POST['verif_password'])) {
            if ($_POST['password'] === $_POST['verif_password']) {
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            } else {
                $_SESSION['error'] = "⚠ Les mots de passe ne correspondent pas.";
                header('Location: editProfile');
                exit();
            }
        } else {
            $_SESSION['error'] = "⚠ Veuillez remplir les deux champs de mot de passe.";
            header('Location: editProfile');
            exit();
        }
    } else {
        $password = $user['password'];
    }

    update_user($user_id, $fname, $lname, $email, $password);

    $_SESSION['validation'] = "✔ Profil mis à jour avec succès.";
    header('Location: profile');
    exit();
}

?>