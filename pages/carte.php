<?php

$id = $_GET['category'];
// affichage de produits uniquement d'une cat / sous cat

$queryC = "SELECT *
FROM  category
WHERE id_cat = :idCat";
$reqC = $bdd->prepare($queryC);
$reqC->bindValue(':idCat', $id, PDO::PARAM_STR);
$reqC->execute();

while ($dataC = $reqC->fetch()) {
?>
    <h4><?php echo "Nos " . $dataC['name_cat']; ?></h4>
    <?php
    $querySC = "SELECT *
    FROM  souscategory
    WHERE category_id =:idCat";

    $reqSC = $bdd->prepare($querySC);
    $reqSC->bindValue(':idCat', $dataC['id_cat'], PDO::PARAM_STR);
    $reqSC->execute();

    while ($dataSC = $reqSC->fetch()) {

    ?>
        <h6><?php echo "- " . $dataSC['name_sousCat']; ?></h6>
        <?php

        $queryP = "SELECT * 
        FROM  produits 
        WHERE sousCategory_id =:idSCat";
        $reqP = $bdd->prepare($queryP);
        $reqP->bindValue(':idSCat', $dataSC['id_sousCat'], PDO::PARAM_STR);
        $reqP->execute();
        ?>
        <div class="container-menu">
            <?php
            while ($dataP = $reqP->fetch()) {

            ?>

                <div class="box">
                    <div class="photo">
                        <img src="<?php echo $dataP['img_product']; ?>">
                        <h4><?php echo $dataP['name_product']; ?> </h4>
                    </div>
                    <div class="describe">
                        <span class="description"><?php echo $dataP['describe_product']; ?></span>
                        <span class="price"><?php echo $dataP['price_product'] . " €"; ?></span>
                    </div>
                </div>

            <?php
            }
            ?>
        </div>
<?php
    }
}
?>