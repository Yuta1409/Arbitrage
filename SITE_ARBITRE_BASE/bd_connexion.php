<?php
function connexionPDO() {
    $login = "root";            // Variable servant pour "Nom d'utilisateur"
    $mdp = "";                  // Variable servant pour "Mot de passe" de l'utilisateur
    $bd = "arbitrage";          // Variable servant pour se connecter à la table correspondante (ici : arbitrage)
    $serveur = "localhost";     // Variable permettant de relier le serveur local (wamp) au site web.

    try {
        $conn = new PDO("mysql:host=$serveur;dbname=$bd", $login, $mdp, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'')); // sert à relier les variables ci-dessus aux commandes MySqlCommand
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        print "Erreur de connexion PDO ";
        die();
    }
}