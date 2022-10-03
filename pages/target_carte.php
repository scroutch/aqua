<?php

$query = "select id_category, nom_category FROM category where id_category = :idcat";
$req = $bdd->prepare($query);
$req->bindValue(':idcat', $_GET['id'], PDO::PARAM_STR);
$req->execute();

while ($data = $req->fetch()) {
}
