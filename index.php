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
    <script defer src="./assets/fontawesome-free-6.2.0-web/js/all.js"></script>
    <title>Restaurant aqua</title>
</head>

<body>
    <header>
        <h1>Aqua</h1>
        <i class="fa-solid fa-bars"></i>
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