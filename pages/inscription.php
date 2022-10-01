<div class="container-fluid">
    <section class="form">
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <h3>S'inscrire</h3>
                    <form action="/target_connexion.php" method="post" id="form_connect">
                        <div class="form_sub">
                            <input type="text" name="name" id="" placeholder="nom">
                            <input type="text" name="firstName" id="" placeholder="prénom">
                        </div>
                        <input type="email" name="email" id="" placeholder="email">
                        <div class="form_sub">
                            <input type="password" name="password" id="" placeholder="mot de passe">
                            <input type="password" name="password" id="" placeholder="confirmation du mot de passe">
                        </div>

                        <button class="button" type="submit">Valider</button>
                    </form>
                    <p class="text-center">Déjà inscrit ? <a href="index.php?page=5">Cliquez-ici pour vous connecter</a></p>
                </div>
            </div>
        </div>
    </section>
</div>