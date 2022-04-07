<!DOCTYPE html>
<html>
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

<tr>
<th>Gestion des Equipes</th>
</tr>
<tr>
<td><b>n° equipe</b></td>
<td><b>nom equipe</b></td>
<td><b>nom club</b></td>
<td><b>nom championnat</b></td>
</tr>

<?php
include "bd.equipe.php";
$EquipeInfo = getEquipeInfo();

foreach ($EquipeInfo as $uneequipe) {

?>
<tr>
  <td><?php echo $uneequipe['num_equipe']; ?></td>
  <td><?php echo $uneequipe["nom_equipe"]; ?></td>
  <td><?php echo $uneequipe["nom_club"]; ?></td>
  <td><?php echo $uneequipe["nom_championnat"]; ?></td>
</tr>
<?php
}
?>
</html>






















?>