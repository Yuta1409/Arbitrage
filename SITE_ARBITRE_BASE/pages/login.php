<link rel="stylesheet" href="css/connexion.css">
<?php
include "C:\wamp64\www\arbitrage\ap2.2_equipe5\ap2.2_equipe5\SITE_ARBITRE_BASE\pour connexion\connexion.php";


if(!isset($_POST["mailU"]) || !isset($_POST["mdpU"])){
    ?>
<div id="con">
    <u1>
        <h1>Connexion</h1>
        <form action="./?action=login" method="POST">
 
        <input type="text" name="mailU" placeholder="Email de connexion" /><br><br>
        <input type="password" name="mdpU" placeholder="Mot de passe"  /><br><br>
        <input type="submit" />
 
        </form>
        <br/>
    </u1>
</div>
<?php
}
else{
    $mailU = $_POST["mailU"];
    $mdpU = $_POST["mdpU"];
    if(isLoggedOn()){

    }
    else{
        login($mailU, $mdpU);
        header("Location:/arbitrage/ap2.2_equipe5/ap2.2_equipe5/SITE_ARBITRE_BASE/");
    }
}