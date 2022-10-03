<?php

if (isset($_GET['success'])) {
    $success = $_GET['success'];
    if ($success == 1) {
        echo '  <div class="alert alert-success" role="alert">
                    Votre message a bien été envoyé!
                </div>';
    } else {
        echo '  <div class="alert alert-danger" role="alert">
                    Echec d\'envoi du message
                </div>';
    }
}

?>

<div class="container-fluid">
    <section>
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <h3>Nous contacter</h3>
                    <form action="./pages/target_contact.php" method="post" id="form_connect">
                        <div class="form_sub">
                            <input type="text" name="name" id="" placeholder="nom" required>
                            <input type="text" name="firstName" id="" placeholder="prénom" required>
                        </div>
                        <input type="email" name="email" id="" placeholder="email" required>

                        <input type="text" name="object" id="" placeholder="Objet" required>
                        <input type="textaera" name="message" id="" placeholder="Entrez votre message" required>


                        <button class="button" type="submit">Envoyer<i class="fa-regular fa-paper-plane"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>