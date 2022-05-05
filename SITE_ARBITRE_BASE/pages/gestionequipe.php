<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Gestion des équipes</title>
  <link href="style.css" rel="stylesheet">
  <link rel="stylesheet" href="css/gestion_equipe.css">
</head>

<body>
</body>

<?php
include "bd_connexion.php";
include "bd.modsup.php";
if (isset($_POST['btnAjouter'])) {
  $connex = connexionPDO();
  $req = "INSERT INTO equipe(nom_equipe, num_club, num_championnat) VALUES(:param1, :param2 ,:param3)";
  $prep = $connex->prepare($req);
  $prep->bindValue('param1', $_POST['nom_equipe']);
  $prep->bindValue('param2', $_POST['num_club']);             // les paramètres sont réliés chacune à leur donnée (ex: :param1 = nom_equipe)
  $prep->bindValue('param3', $_POST['num_championnat']);      // les paramètres servent à relier les menu déroulants et les textbox aux données de la table.
  $prep->execute();
}

?>

<form method="POST" action="">
  <fieldset>
    <legend>Gestion des équipes :</legend>
    <p>
      <br>
      <label for="taille">Nom de l'équipe :</label>
      <input type="text" name="nom_equipe" size="20" />
      <br><br>
      <label for="taille">Nom du club :</label>
      <select name="num_club" class="retour">

        <?php
        $connex = connexionPDO();
        $req = $connex->prepare("SELECT * FROM club");
        $req->execute();
        while ($ligne = $req->fetch(PDO::FETCH_OBJ)) {
          echo "<option value= '$ligne->num_club'>$ligne->nom_club</option>";
        }
        ?>
      </select>

      <br><br>
      <label for="taille">Nom du championnat :</label>
      <select name="num_championnat" class="retour">

        <?php
        $connex = connexionPDO();
        $req = $connex->prepare("SELECT num_championnat, nom_championnat FROM championnat");
        $req->execute();
        while ($ligne = $req->fetch(PDO::FETCH_OBJ)) {
          echo "<option value= '$ligne->num_championnat'>$ligne->nom_championnat</option>";
        }
        ?>
      </select>
    </p>
    <p>
      <button type="submit" value="ajouter" name="btnAjouter">Ajouter</button>
    </p>

    <table id="ta">

      <tr>
        <th>Gestion des Equipes</th>
      </tr>
      <tr>
        <th><b>n° equipe</b></th>
        <th><b>nom equipe</b></th>
        <th><b>nom club</b></th>
        <th><b>nom championnat</b></th>
      </tr>

      <?php
      include "bd.equipe.php";        // include sert à inclure le fichier comportant les informations que l'ont veut (ici la fonction getEquipeInfo())
      $EquipeInfo = getEquipeInfo();  // permet d'implémenter la fonction à une variable 

      foreach ($EquipeInfo as $uneequipe) {   // foreach est une boucle qui parcours les valeurs du tableau pour en donnée qu'une ligne par ligne comme ce qu'on voit dans la base de donnée.

        if (isset($_GET["idSup"])) {    // La fonction isset() vérifie si une variable est définie, ce qui signifie qu'elle doit être déclarée et n'est pas NULL
          $id = $_GET["idSup"];         // variable qui permet de récupérer les données des variables de bd.modsup.php
          getEquipeSuppr($id);          // Appel de la fonction qui contient la requête de suppression et la variable de données des numéros d'équipe, ligne la plus importante.
        }
      ?>
        <?php
        if (isset($_POST['Valider'], $_GET["idE"])) {     // la fonction isset() vérifie si une variable est définie, ce qui signifie qu'elle doit être déclarée et n'est pas NULL 
          $idE = $_GET["idE"];                            // ensemble de variables qui permettent de récupérer les données des variables de bd.modsup.php
          $nomE = $_POST['nomE'];                         // $_GET et $_POST sont des variables qui permet de collecter les données
          $nomClub = $_POST['club'];
          $nomChamp = $_POST['champ'];
          getEquipeModifier($idE, $nomE, $nomClub, $nomChamp);      // Appel de la fonction qui contient la requête et les variables de données des colonnes, ligne la plus importante.
        }
        ?>
        <container>

            <tr>
              <td><?php echo $uneequipe['num_equipe']; ?></td>
              <td><?php echo $uneequipe["nom_equipe"]; ?></td>
              <td><?php echo $uneequipe["nom_club"]; ?></td>
              <td><?php echo $uneequipe["nom_championnat"]; ?></td>
              <td><a href="index.php?action=gestionequipe&idE=<?php echo $uneequipe['num_equipe']; ?>">Modifier</a></td>
              <td><a href="index.php?action=gestionequipe&idSup=<?php echo $uneequipe['num_equipe']; ?>">Supprimer</a></td>
            </tr>


        </container>

      <?php
      }
      ?>
      <?php

      if (isset($_GET["idE"])) {
      ?>
        <form method="post" action="">
          <td></td>
          <td><input type="text" id="nomE" name="nomE"></td>
          <td><input type="text" id="club" name="club"></td>
          <td><input type="text" id="champ" name="champ"></td>
          <td><button type="submit" name="Valider" value="Valider">Valider</button></td>
        </form>
      <?php
      }
      ?>
    </table>
  </fieldset>
  </select>
</form>


</html>