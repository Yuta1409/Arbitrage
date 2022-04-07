<?php

include_once "bd_connexion.php";

function getEquipeInfo() {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from equipe eq INNER JOIN championnat ch ON ch.num_championnat = eq.num_championnat INNER JOIN club cl ON cl.num_club = eq.num_club");
        $req->execute();

        $resultat=$req->fetchAll(PDO::FETCH_ASSOC);
    }catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}
?>