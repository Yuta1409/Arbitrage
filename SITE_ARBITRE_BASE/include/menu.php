<link rel="stylesheet" href="style.css">
<nav id="menu" class="menu" role="navigation">
    <ul>

        <?php
        session_start();
        if (isset($_SESSION["mailU"])) {


        ?>
            <ul>
                <li class="parent sousmenu"><a href="index.php">Accueil</a></li>
                <li class="parent sousmenu"><a href="index.php?action=gestionequipe">Gestion des équipes</a></li>
                <li class="parent sousmenu"><a href="index.php?action=listearbitre">Liste des arbitres</a></li>
                <li class="parent sousmenu"><a href="index.php?action=deconnexion">Déconnexion</a></li>
            </ul>


        <?php
        } else {
        ?>
            <li class="parent sousmenu"><a href="index.php">Accueil</a></li>
            <li class="parent sousmenu"><a href="index.php?action=login">Connexion</a></li>

        <?php
        }
        ?>


    </ul>
</nav>