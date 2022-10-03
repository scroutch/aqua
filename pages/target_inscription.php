<?php

include('bdd.php');

//fonction pour nettoyer nos variables avant de les envoyer en bdd
function sanitizeData($data)
{
    $result = htmlspecialchars($data);
    $result = strip_tags($data);
    return $result;
}

if ((isset($_POST['name']) && $_POST['name'] != null) &&
    (isset($_POST['firstName']) && $_POST['firstName'] != null) &&
    (isset($_POST['email']) && $_POST['email'] != null) &&
    (isset($_POST['tel']) && $_POST['tel'] != null) &&
    (isset($_POST['password']) && $_POST['password'] != null) &&
    (isset($_POST['confirmPassword']) && $_POST['confirmPassword'] != null)
) {
    // var_dump($_POST);
    $name = sanitizeData($_POST['name']);
    $firstName = sanitizeData($_POST['firstName']);
    $email = sanitizeData($_POST['email']);
    $tel = sanitizeData($_POST['tel']);
    if ($_POST['password'] === $_POST['confirmPassword']) {
        $hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
    }

    $query2 = 'SELECT mail_user FROM user WHERE mail_user LIKE :email';
    $query2 = $bdd->prepare($query2);
    $query2->bindValue(':email', $email, PDO::PARAM_STR);
    $query2->execute();
    $data = $query2->fetch();

    if ($data) {
        header('Location: ../index.php?page=6&inscription=0');
    } else {

        //requête d'insertion des données d'inscription en bdd
        $query = 'insert into user (name_user, firstName_user, tel, mail_user, psw_user) values (:name, :firstName, :tel, :email, :password)';
        $req = $bdd->prepare($query);
        $req->bindValue(':name', $name, PDO::PARAM_STR);
        $req->bindValue(':firstName', $firstName, PDO::PARAM_STR);
        $req->bindValue(':tel', $tel, PDO::PARAM_STR);
        $req->bindValue(':email', $email, PDO::PARAM_STR);
        $req->bindValue(':password', $hash, PDO::PARAM_STR);
        $req->execute();
        header('Location: ../index.php?page=5&inscription=1');
    }
}

//TODO
//verifier que le mail n'est pas déjà en base de donnée