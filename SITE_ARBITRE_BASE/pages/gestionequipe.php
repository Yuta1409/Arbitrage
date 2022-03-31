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
        if(isset($_GET['btnAjouter'])){
          $connex = connexionPDO();
          $req="INSERT INTO equipe(nom_equipe, num_club, num_championnat) VALUES(:param1, :param2 ,:param3)";
          $prep = $connex->prepare($req);
          $prep->bindValue('param1', $_GET['nom_equipe']);
          $prep->bindValue('param2', $_POST['num_club']);
          $prep->bindValue('param3', $_POST['num_championnat']);
          $prep->execute();

            $afficher = "SELECT * FROM dalton";
            $req2 = $connex->prepare($afficher);
            $req2->execute();
            echo "<h1> Equipe.</h1>";
            while($ligne = $req2->fetch(PDO::FETCH_OBJ)) {
                echo "$ligne->num_equipe $ligne->nom_equipe $ligne->num_club $ligne->num_championnat<br/>";
        }
    }
          else{
          }
          ?>
        <form method="GET"action="">
        <fieldset>
          <legend>Gestion de la competition :</legend>
          <p>
            <br>
            <label for="taille">nom_equipe :</label>
            <input type="text" name="nom_equipe" size="20" />
            <br><br>
            <label for="taille">nom_club :</label>
            <select name="num_club" class = "retour" >

                <?php
                $connex = connexionPDO();
                $req = $connex->prepare("SELECT * FROM club");
                $req->execute();
                while($ligne = $req->fetch(PDO::FETCH_OBJ)){
                    echo"<option value= '$ligne->num_club'>$ligne->nom_club</option>";
                }
                ?>
            </select>

            <br><br>
            <label for="taille">num_championnat :</label>
            <select name="num_championnat" class = "retour" >

                <?php
                $connex = connexionPDO();
                $req = $connex->prepare("SELECT num_championnat, nom_championnat FROM championnat");
                $req->execute();
                while($ligne = $req->fetch(PDO::FETCH_OBJ)){
                    echo"<option value= '$ligne->num_championnat'>$ligne->nom_championnat</option>";
                }
                ?>
            </select>
          </p>
          <p>
            <button type="submit" value="ajouter" name="btnAjouter">Ajouter</button>
          </p>
        </fieldset>
            </select>
        </form>
</html>