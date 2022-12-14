<div class="container-fluid">
    <section class="form">
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <h3>Devis</h3>
                    <form action="./pages/target_devis.php" method="post" id="form_connect">
                        <div class="form_sub">
                            <input type="text" name="name" id="" placeholder="nom" required>
                            <input type="text" name="firstName" id="" placeholder="prénom" required>
                        </div>
                        <input type="email" name="email" id="" placeholder="email" required>
                        <div class="form_sub">
                            <input type="tel" name="tel" id="" placeholder="tel" size="10" required>
                            <input type="date" name="dateEvent" id="" placeholder="Date de l'évènement" required>
                        </div>
                        <div class="form_sub">
                            <select name="typeEvent" id="event" required>
                                <option value="">--Choisissez un évènement--</option>
                                <option value="">Baptême</option>
                                <option value="">Mariage</option>
                                <option value="">Anniversaire</option>
                            </select>
                            <select name="typePresta" id="presta" required>
                                <option value="">--Choisissez une prestation--</option>
                                <option value="">Buffet mixte</option>
                                <option value="">Fruits de mer</option>
                                <option value="">A l'assiette</option>
                            </select>
                        </div>
                        <input type="text" name="person" id="" placeholder="Nombre de personnes" required>

                        <button class="button" type="submit">Valider</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>