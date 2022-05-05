<?php

include_once "bd_connexion.php";

function getListeArbitre() {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from arbitre ar INNER JOIN equipe eq ON eq.num_equipe = ar.num_equipe INNER JOIN club cl ON cl.num_club = ar.num_club");
        $req->execute();

        $resultat=$req->fetchAll(PDO::FETCH_ASSOC);
    }catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}
?>