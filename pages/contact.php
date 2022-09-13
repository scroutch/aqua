<div class="container-fluid container-contact">
    <section class="mb-4">

    <h2 class="h1-responsive font-weight-bold text-center my-4">Nous contacter</h2>

    <p class="text-center w-responsive mx-auto mb-5">Vous avez une question? N'hésitez pas à nous contacter! Nous vous répondrons le plus vite possible.</p>

    <div class="row">

        <div class="col-md-6 mb-md-0 mb-5 mx-auto">
            <form id="contact-form" name="contact-form" action="mail.php" method="POST">

                <div class="row">

                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" id="name" name="name" class="form-control">
                            <label for="name" class="">Nom :</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" id="email" name="email" class="form-control">
                            <label for="email" class="">Email :</label>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form mb-0">
                            <input type="text" id="subject" name="subject" class="form-control">
                            <label for="subject" class="">Objet :</label>
                        </div>
                    </div>
                </div>



                <div class="row">

                    <div class="col-md-12">

                        <div class="md-form">
                            <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                            <label for="message">Votre message : </label>
                        </div>

                    </div>
                </div>


            </form>

            <div class="text-center text-md-left">
                <a class="button btn-contact" onclick="document.getElementById('contact-form').submit();">Send<i class="fa-regular fa-paper-plane"></i></a>
            </div>
            <div class="status"></div>
        </div>

    </div>

</section>
</div>