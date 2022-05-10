<?php

include_once "bd_connexion.php";       // permet de relier le fichier contenant la connexion à la base de donnée à celui-ci.

function getEquipeInfo() {
    $resultat = array();

    try {
        $cnx = connexionPDO();        // permet de se connecter à la base de donnée.
        $req = $cnx->prepare("select * from equipe eq INNER JOIN championnat ch ON ch.num_championnat = eq.num_championnat INNER JOIN club cl ON cl.num_club = eq.num_club"); // permet d'ajouter la requête SQL
        $req->execute();              // permet d'executer la requête écrite ci-dessus.

        $resultat=$req->fetchAll(PDO::FETCH_ASSOC); // fetchAll() renvoie toutes les lignes de la table sous forme de tableau
    }catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();     // obtient un message d'erreur en cas de problème
        die();
    }
    return $resultat;
}
?>

<?php
function getEquipeInfoId($id) {

    try {
        $cnx = connexionPDO();        // permet de se connecter à la base de donnée.
        $req = $cnx->prepare("select * from equipe eq INNER JOIN championnat ch ON ch.num_championnat = eq.num_championnat INNER JOIN club cl ON cl.num_club = eq.num_club WHERE num_equipe = :id"); // permet d'ajouter la requête SQL
        $req->bindValue(":id",$id);
        $req->execute();              // permet d'executer la requête écrite ci-dessus.

        $resultat=$req->fetch(PDO::FETCH_ASSOC); // fetchAll() renvoie toutes les lignes de la table sous forme de tableau
    }catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();     // obtient un message d'erreur en cas de problème
        die();
    }
    return $resultat;
}
?>