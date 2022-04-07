<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Gestion des équipes</title>
  <link href="style.css" rel="stylesheet">
</head>

<body>
</body>

<?php
include "bd_connexion.php";
if (isset($_POST['btnAjouter'])) {
  $connex = connexionPDO();
  $req = "INSERT INTO equipe(nom_equipe, num_club, num_championnat) VALUES(:param1, :param2 ,:param3)";
  $prep = $connex->prepare($req);
  $prep->bindValue('param1', $_POST['nom_equipe']);
  $prep->bindValue('param2', $_POST['num_club']);
  $prep->bindValue('param3', $_POST['num_championnat']);
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
      <tr>
        <td><input class="txt" type="texte" name="txtNumeroEquipe"></td>
        <td><input class="txt" type="texte" name="txtNomEquipe"></td>
        <td><input class="txt" type="texte" name="txtNomClub"></td>
        <td><input class="txt" type="texte" name="txtNomChamp"></td>
        <td><input class="txt" type="submit" name="mod" value="modifier"></td>
        <td><input class="txt" type="submit" name="supp" value="supprimer"></td>
      </tr>
    </table>


  </fieldset>
  </select>
</form>

</html>