<?php

include('pages/bdd.php');

?>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/bootstrap-5.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/fontawesome-free-6.2.0-web/css/all.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Moon+Dance&family=Moulpali&display=swap" rel="stylesheet">
    <script defer src="./assets/fontawesome-free-6.2.0-web/js/all.js"></script>
    <title>Restaurant aqua</title>
</head>

<body>
    <?php

    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        if ($page == 1) {
            include('./pages/header.php');
            include('./pages/home.php');
        } else if ($page == 2) {
            include('./pages/header2.php');
            include('./pages/carte.php');
        } else if ($page == 3) {
            include('./pages/header2.php');
            include('./pages/devis');
        } else if ($page == 4) {
            include('./pages/header2.php');
            include('./pages/contact.php');
        } else if ($page == 5) {
            include('./pages/header2.php');
            include('./pages/connexion.php');
        }
    } else {
        include('./pages/header.php');
        include('./pages/home.php');
    }

    ?>
    <footer>
        <div class="footer-group">
            <div id="map" class="footer-map">

            </div>
            <div class="footer-infos">
                78 rue de Metz<br>
                57130 Jouy aux Arches – Metz<br>
                Tel. 03 87 68 58 54<br>
                Mail : contact.metz@pasta.fr<br>
                <br>
                Votre restaurant est ouvert du lundi au samedi<br>
                de 11h30 à 14h30 et de 18h15 à 22h00<br>
                (22h30 le vendredi et le samedi)<br>
            </div>
            <div class="footer-social">
                <a href="#"><i class="fa-brands fa-facebook icones"></i></a>
                <a href="#"><i class="fa-brands fa-instagram icones"></i></a>
                <a href="#"><i class="fa-brands fa-twitter icones"></i></a>
            </div>
        </div>
        <div class="copyright">
            <i class="fa-regular fa-copyright"></i> Cécile
        </div>
    </footer>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="./assets/bootstrap-5.2.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>
    <script src="./js/app.js"></script>
    <script src="./js/menuBurger.js"></script>
</body>

</html>