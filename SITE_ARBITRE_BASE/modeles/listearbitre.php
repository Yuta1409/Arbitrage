<h2>ARBITRE ...</h2>

<?php
include "bd_connexion.php";

function getArbitres(){
    $resultat = array();

    try{
        $cnx = connexionPDO();
        $req = $cnx->prepare("select num_equipe, nom_equipe, num_club, num_championnat");
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);

    }catch (PDOException $e) {
        print "Erreur !:" . $e->getMessage();
    }
    return $resultat;
}























?>