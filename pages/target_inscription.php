<?php

include('bdd.php');

function sanitizeData($data)
{
    $result = htmlspecialchars($data);
    $result = strip_tags($data);
    return $result;
}

if ((isset($_POST['name']) && $_POST['name'] != null) &&
    (isset($_POST['firstName']) && $_POST['firstName'] != null) &&
    (isset($_POST['email']) && $_POST['email'] != null) &&
    (isset($_POST['password']) && $_POST['password'] != null) &&
    (isset($_POST['confirmPassword']) && $_POST['confirmPassword'] != null)
) {
    var_dump($_POST);
    $name = sanitizeData($_POST['name']);
    $firstName = sanitizeData($_POST['firstName']);
    $mail = sanitizeData($_POST['email']);
    if ($_POST['password'] === $_POST['confirmPassword']) {
        $hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
    }


    $query = 'insert into user (name_user, firstName_user, mail_user, psw_user) values (:name, :firstName, :email, :password)';
    $req = $bdd->prepare($query);
    $req->bindValue(':name', $name, PDO::PARAM_STR);
    $req->bindValue(':firstName', $firstName, PDO::PARAM_STR);
    $req->bindValue(':email', $mail, PDO::PARAM_STR);
    $req->bindValue(':password', $hash, PDO::PARAM_STR);
    $req->execute();
    header('Location: ../index.php?page=5');
}

//TODO
//verifier que le mail n'est pas déjà en base de donnée