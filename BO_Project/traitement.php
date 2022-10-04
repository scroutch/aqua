<?php
include('../pages/bdd.php'); //(chemin à adapter)

$username = $_POST['username'];
$mdp = $_POST['mdp'];

$query = "SELECT * FROM admin WHERE name_admin = :name_admin";
$req = $bdd->prepare($query);
$req->bindValue(':name_admin', $username, PDO::PARAM_STR);
$req->execute();

$data = $req->fetch();

if ($data != NULL) {
    if (password_verify($mdp, $data['psw_admin'])) {
        // if ($data['role'] == 'ADMIN') {
        //     $_SESSION['prenom'] = $data['prenom'];
        //     $_SESSION['nom'] = $data['nom'];
        $_SESSION['username'] = $data['name_admin'];
        $_SESSION['admin'] = 'ADMIN';

        $_SESSION['message'] = '<div class="alert alert-success text-center" role="alert"><i class="fa-solid fa-check me-3"></i>Bienvenue dans l\'administration</div>';
        header('location: admin.php');
        // } else {
        //     $_SESSION['message'] = '<div class="alert alert-danger text-center" role="alert"><i class="fa-solid fa-triangle-exclamation me-3"></i>Utilisateur inconnu</div>';
        //     header('location: ../index.php'); // redirection vers le site (chemin à adapter)
        // }
    } else {
        $_SESSION['message'] = '<div class="alert alert-danger text-center" role="alert"><i class="fa-solid fa-triangle-exclamation me-3"></i>Mot de passe incorrect</div>';
        header('location: index.php');
    }
} else {
    $_SESSION['message'] = '<div class="alert alert-danger text-center" role="alert"><i class="fa-solid fa-triangle-exclamation me-3"></i>Utilisateur inconnu</div>';
    header('location: ../index.php'); // redirection vers le site (chemin à adapter)
}
