<?php

include('bdd.php');

//fonction pour nettoyer nos variables avant de les envoyer en bdd
function sanitizeData($data)
{
    $result = htmlspecialchars($data);
    $result = strip_tags($data);
    return $result;
}

if ((isset($_POST['email']) && $_POST['email'] != null) &&
    (isset($_POST['password']) && $_POST['password'] != null)
) {
    $email = sanitizeData($_POST['email']);
    $password = $_POST['password'];

    // var_dump($_POST);
    $query = 'SELECT * FROM user where mail_user = :email';
    $req = $bdd->prepare($query);
    $req->bindValue(':email', $email, PDO::PARAM_STR);
    $req->execute();
    $result = $req->fetch();

    //Si il y a des résultats on verifie que les passwords sont les mêmes
    if (!empty($result)) {
        if (password_verify($password, $result['psw_user'])) {

            $_SESSION['name_user'] = $result['name_user'];
            var_dump($_SESSION);
            $_SESSION['id'] = $result['id'];
            if ($_SESSION['id']) {
                header('Location: ../index.php?page=1');
            }
            // var_dump($_SESSION['id']);
        } else {
            $errorMdp = true;
            header('refresh: 2; url=../index.php?page=5&errorMdp=true');
        }
    } else {
        $errorUsername = true;
        header('refresh: 2; url=../index.php?page=5&errorUsername=true');
    }
}
