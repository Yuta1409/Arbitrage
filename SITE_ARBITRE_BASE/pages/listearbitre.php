<!DOCTYPE html>
<html>
<div style="overflow:scroll; border:#000000 1px solid;">
    <?php
    include "bd_connexion.php";

    function getArbitres()
    {
        $resultat = array();

        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select num_equipe, nom_equipe, num_club, num_championnat");
            $req->execute();

            $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !:" . $e->getMessage();
        }
        return $resultat;
    }
    ?>

    <table id="ta2">
        <tr>
            <th>Liste des arbitres</th>
        </tr>
        <tr>
            <th><b>Numéro arbitre</b></th>
            <th><b>nom_arbitre</b></th>
            <th><b>prenom_arbitre</b></th>
            <th><b>adresse_arbitre</b></th>
            <th><b>cp_arbitre</b></th>
            <th><b>ville_arbitre</b></th>
            <th><b>date_naiss_arbitre</b></th>
            <th><b>tel_fixe_arbitre</b></th>
            <th><b>tel_port_arbitre</b></th>
            <th><b>mail_arbitre</b></th>
            <th><b>nom_club</b></th>
            <th><b>nom_equipe</b></th>

        </tr>



        <?php


        include "bd.arbitre.php";                // include sert à inclure le fichier comportant les informations que l'ont veut (ici la fonction getListeArbitre())
        $ListeArbitre = getListeArbitre();       // permet d'implémenter la fonction à une variable 

        foreach ($ListeArbitre as $unarbitre) {        // foreach est une boucle qui parcours les valeurs du tableau pour en donnée qu'une ligne par ligne comme ce qu'on voit dans la base de donnée.

        ?>
            <tr>
                <td>
                    <center><?php echo $unarbitre['num_arbitre']; ?></center>
                </td>
                <td>
                    <center><?php echo $unarbitre['nom_arbitre']; ?></center>
                </td>
                <td>
                    <center><?php echo $unarbitre['prenom_arbitre']; ?></center>
                </td>
                <td>
                    <center><?php echo $unarbitre['adresse_arbitre']; ?></center>
                </td>
                <td>
                    <center><?php echo $unarbitre['cp_arbitre']; ?></center>
                </td>
                <td>
                    <center><?php echo $unarbitre['ville_arbitre']; ?></center>
                </td>
                <td>
                    <center><?php echo $unarbitre['date_naiss_arbitre']; ?></center>
                </td>
                <td>
                    <center><?php echo $unarbitre['tel_fixe_arbitre']; ?></center>
                </td>
                <td>
                    <center><?php echo $unarbitre['tel_port_arbitre']; ?></center>
                </td>
                <td>
                    <center><?php echo $unarbitre['mail_arbitre']; ?></center>
                </td>
                <td>
                    <center><?php echo $unarbitre['nom_club']; ?></center>
                </td>
                <td>
                    <center><?php echo $unarbitre['nom_equipe']; ?></center>
                </td>

            </tr>
        <?php
        }


        ?>
        <br>

    </table>
    <br>
    <br>
    <div id="pdf">
        <link rel="stylesheet" href="css/pdf.css">
        <li><a href="pdf\pdf.listearbitre.php">Télécharger la liste en PDF</a></li>
    </div>

</div>

</html>