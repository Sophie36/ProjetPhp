<?php

require_once('include/connexion.php');
require_once('include/infoconnexion.php');
require_once('include/executeRequete.php');

$cnx=connexion(UTILISATEUR,MOTDEPASSE,SERVER,BASEDEDONNEES);
$msg="";
$varQuery="CREATE TABLE utilisateurs(
          prenom VARCHAR(25)NOT NULL,
          nom VARCHAR(40)NOT NULL,
          login VARCHAR(25)NOT NULL UNIQUE,
          motpasse VARCHAR(255)NOT NULL)
          CHARSET UTF8 ENGINE=InnoDB";
$idRequete=executeRequete($cnx,$varQuery);
$droite="tk!@";
$gauche="ar30b%";
$prenom="Sophie";
$nom="Lemaire";
$login="slemaire";
$pw="sop36";
$jeton=hash("ripemd128","$gauche.$pw.$droite");
ajouterUtilisateur($cnx,$prenom,$nom,$login,$jeton,$msg);
echo "<p>$msg</p>";

$prenom="Sylvie";
$nom="Lormeau";
$login="slormeau";
$pw="syl36";
$jeton=hash("ripemd128","$gauche.$pw.$droite");
ajouterUtilisateur($cnx,$prenom,$nom,$login,$jeton,$msg);
echo "<p>$msg</p>";

function ajouterUtilisateur($cnx,$prenom,$nom,$login,$jeton,&$msg){
    $sql="INSERT INTO utilisateurs VALUES('$prenom','$nom','$login','$jeton')";
    $idRequete=executeRequete($cnx,$sql);
    $msg=$msg.sprintf("L'utilisateur %s %s a été crée avec succès.</br>",$prenom,$nom);
}


