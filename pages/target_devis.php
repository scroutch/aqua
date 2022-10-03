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
    (isset($_POST['dateEvent']) && $_POST['dateEvent'] != null) &&
    (isset($_POST['typeEvent']) && $_POST['typeEvent'] != null) &&
    (isset($_POST['typePresta']) && $_POST['typePresta'] != null) &&
    (isset($_POST['person']) && $_POST['person'] != null)
) {
    $name = sanitizeData($_POST['name']);
    $firstName = sanitizeData($_POST['firstName']);
    $email = sanitizeData($_POST['email']);
    $tel = sanitizeData($_POST['tel']);
    $dateEvent = sanitizeData($_POST['dateEvent']);
    $typeEvent = sanitizeData($_POST['typeEvent']);
    $typePresta = sanitizeData($_POST['typePresta']);
    $person = sanitizeData($_POST['person']);

    $query = 'INSERT into devisclient (name_user, firstName_user, mail_user, tel, date_event) VALUES (:name, :firstName, :email, :object, :message)';
    $req = $bdd->prepare($query);
    $req->bindValue(':name', $name, PDO::PARAM_STR);
    $req->bindValue(':firstName', $firstName, PDO::PARAM_STR);
    $req->bindValue(':email', $email, PDO::PARAM_STR);
    $req->bindValue(':object', $object, PDO::PARAM_STR);
    $req->bindValue(':message', $message, PDO::PARAM_STR);
    $req->execute();
}
