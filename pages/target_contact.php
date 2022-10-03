<?php

include('bdd.php');

$success = 0;
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
    (isset($_POST['object']) && $_POST['object'] != null) &&
    (isset($_POST['message']) && $_POST['message'] != null)
) {
    $name = sanitizeData($_POST['name']);
    $firstName = sanitizeData($_POST['firstName']);
    $email = sanitizeData($_POST['email']);
    $object = sanitizeData($_POST['object']);
    $message = sanitizeData($_POST['message']);

    $query = 'INSERT into contact (name_contact, first_name_contact, mail_contact, subject_contact, message_contact) VALUES (:name, :firstName, :email, :object, :message)';
    $req = $bdd->prepare($query);
    $req->bindValue(':name', $name, PDO::PARAM_STR);
    $req->bindValue(':firstName', $firstName, PDO::PARAM_STR);
    $req->bindValue(':email', $email, PDO::PARAM_STR);
    $req->bindValue(':object', $object, PDO::PARAM_STR);
    $req->bindValue(':message', $message, PDO::PARAM_STR);
    $req->execute();
    header('Location: ../index.php?page=4&success=1');
}
