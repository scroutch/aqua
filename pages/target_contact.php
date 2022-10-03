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
    (isset($_POST['object']) && $_POST['object'] != null) &&
    (isset($_POST['message']) && $_POST['message'] != null)
) {
    $name = sanitizeData($_POST['name']);
    $firstName = sanitizeData($_POST['firstName']);
    $email = sanitizeData($_POST['email']);
    $object = sanitizeData($_POST['object']);
    $message = sanitizeData($_POST['message']);

    var_dump($_POST);
}
