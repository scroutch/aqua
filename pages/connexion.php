<?php

if (isset($_GET['errorMdp']) && $_GET['errorMdp'] == true) {
    echo '  <div class="alert alert-danger" role="alert">
                Mot de passe incorrect
            </div>';
}

if (isset($_GET['errorUsername']) && $_GET['errorUsername'] == true) {
    echo '  <div class="alert alert-danger" role="alert">
                Identifiant incorrect
            </div>';
}

if (isset($_GET['inscription'])) {
    $inscription = $_GET['inscription'];
    if ($inscription == 1) {
        echo '  <div class="alert alert-success" role="alert">
                    Merci pour votre inscription!
                </div>';
    }
}

?>

<div class="container-fluid">
    <section class="vh-100">
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <h3>Se connecter</h3>
                    <form action="./pages/target_connexion.php" method="post" id="form_connect">
                        <input type="email" name="email" id="" placeholder="email" required>
                        <input type="password" name="password" id="" placeholder="mot de passe" required>
                        <button class="button" type="submit">Se connecter</button>
                    </form>
                    <p class="text-center">Pas encore inscrit ? <a href="index.php?page=6">Cliquez-ici pour vous inscrire</a></p>
                </div>
            </div>
        </div>
    </section>
</div>