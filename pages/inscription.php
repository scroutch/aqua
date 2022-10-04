<?php

if (isset($_GET['inscription'])) {
    $inscription = $_GET['inscription'];
    if ($inscription == 0) {
        echo '  <div class="alert alert-danger" role="alert text-center">
                    Mail ou pseudo déjà pris ! Veuillez recommencer votre inscription!
                </div>';
    }
}

?>

<div class="container-fluid">
    <section class="form">
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <h3>S'inscrire</h3>
                    <form action="./pages/target_inscription.php" method="post" id="form_connect">
                        <div class="form_sub">
                            <input type="text" name="name" id="" placeholder="nom" required>
                            <input type="text" name="firstName" id="" placeholder="prénom" required>
                        </div>
                        <input type="email" name="email" id="" placeholder="email" required>
                        <input type="tel" name="tel" id="" placeholder="tel" Pattern="[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}" size="10" required>
                        <div class="form_sub">
                            <input type="password" name="password" id="" placeholder="mot de passe" required>
                            <input type="password" name="confirmPassword" id="" placeholder="confirmation du mot de passe" required>
                        </div>

                        <button class="button" type="submit">Valider</button>
                    </form>
                    <p class="text-center">Déjà inscrit ? <a href="index.php?page=5">Cliquez-ici pour vous connecter</a></p>
                </div>
            </div>
        </div>
    </section>
</div>