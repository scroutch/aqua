<?php

include('bdd.php');

?>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/bootstrap-5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/fontawesome-free-6.2.0-web/css/all.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Moon+Dance&family=Moulpali&display=swap" rel="stylesheet">
    <script defer src="./assets/fontawesome-free-6.2.0-web/js/all.js"></script>
    <title>Restaurant aqua</title>
</head>

<body>
    <header>
        <nav>
            <h1>Aqua</h1>
            <i class="fa-solid fa-bars"></i>
        </nav>
        <div class="header-cta">
            <p>"Venez goûter nos produits de la mer"</p>
            <a href="#">nous découvrir</a>
        </div>
    </header>
    <?php

    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        if ($page == 1) {
            include('./home.php');
        } else if ($page == 2) {
            include('');
        } else if ($page == 3) {
            include('');
        } else if ($page == 4) {
            include('');
        } 
    } else {
        include('./home.php');
    }

    ?>
    <footer>

    </footer>
    

    <script src="./assets/bootstrap-5.2.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>