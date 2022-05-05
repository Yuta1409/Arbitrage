<?php
include_once "bd_connexion.php";

function getEquipeModifier($idE ,$nomE, $nomClub, $nomChamp) {
    try {
           $cnx = connexionPDO();       // permet de se connecter à la base de donnée.
           $req = $cnx->prepare("UPDATE equipe SET nom_equipe = :NomE, num_club = :nomclub, num_championnat = :nomchamp WHERE num_equipe = :id");   // requête permettant la modification (UPDATE)
           $req->bindValue(':id', $idE);    
           $req->bindValue(':NomE', $nomE);             // ensemble de paramètres déjà paramétrés dans la requête  
           $req->bindValue(':nomclub', $nomClub);       // que l'on relit à des variables qui vont nous servir pour listearbitre.php
           $req->bindValue(':nomchamp', $nomChamp);
           $req->execute();
       }catch (PDOException $e) {
           print "Erreur !: " . $e->getMessage();       // obtient un message d'erreur en cas de problème
           die();
       }
   }

   function getEquipeSuppr($id) {
    try {
           $cnx = connexionPDO();       // permet de se connecter à la base de donnée.
           $req = $cnx->prepare("DELETE FROM equipe WHERE num_equipe=:id");     // requête permettant la suppression (DELETE)
           $req->bindValue(':id', $id);        // relie le paramètre :id qui contient le numéro d'équipe à une variable.
           $req->execute();                    // exécuter la requête.
       }catch (PDOException $e) {
           print "Erreur !:" . $e->getMessage();
           die();
       } 
   }
?>
