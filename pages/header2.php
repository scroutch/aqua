<header>
    <h1>Aqua</h1>
    <nav>
        <?php
        if (isset($_SESSION['id'])) {
            // var_dump($_SESSION);
        ?>
            <p>Bonjour <?php echo $_SESSION['name_user']; ?></p>
        <?php } ?>
        <ul class="itemsmenu" id="menu-navigation">
            <li class="menu-item"><a href="index.php?page=1">Accueil</a></li>
            <li class="menu-item click_drop">
                <a href="#">Notre carte</a>
                <ul class="drop_down">
                    <?php
                    $queryCat = "SELECT * FROM category"; // <- categorie 
                    $reqCat = $bdd->prepare($queryCat);
                    $reqCat->execute();
                    // la boucle
                    while ($data = $reqCat->fetch()) {
                        echo '<li><a href="index.php?page=2&category=' . $data["id_cat"] . '">' . $data["name_cat"] . '</a></li>';
                    }

                    ?>
                </ul>
            </li>
            <li class="menu-item"><a href="index.php?page=3">Devis traiteur</a></li>
            <li class="menu-item"><a href="index.php?page=4">Contact</a></li>
            <?php
            if (!isset($_SESSION['id'])) {
            ?>
                <li class="menu-item"><a href="index.php?page=5">Connexion</a></li>
            <?php
            } else {
            ?>
                <li class="menu-item"><a href="./pages/logout.php">Déconnexion</a></li>
            <?php
            }

            ?>
        </ul>
    </nav>
    <button type="button" aria-label="toggle curtain navigation" class="nav-toggler">
        <span class="line l1"></span>
        <span class="line l2"></span>
        <span class="line l3"></span>
    </button>
</header>