<?php

require_once('include/connexion.php');
require_once('include/infoconnexion.php');
require_once('include/executeRequete.php');

$cnx=connexion(UTILISATEUR,MOTDEPASSE,SERVER,BASEDEDONNEES);

if(isset($_POST['Valider'])){
   $tmp_login=$_POST['f_login'];
   $tmp_pw=$_POST['f_pw'];
   $sql="SELECT * FROM utilisateurs WHERE nom='$tmp_login'";
   $idRequete=executeRequete($cnx,$sql);
   if($idRequete->rowCount()==1){
       $row=$idRequete->fetch(PDO::FETCH_NUM);
       $droite="tk!@";
       $gauche="ar30b%";
       $jeton=hash('ripemd128',"$gauche.$tmp_pw.$droite");
       if($jeton==$row[3]){
           session_start();
           $_SESSION['login']=$tmp_login;
           $_SESSION['nom']=$row[1];
           $_SESSION['prenom']=$row[0];
        header('Local:m:index.php');
       }
   }
    
}
?>
<!--suite et fin d'authentification.php-->
<form method="POST" action="">
    login:<input type='text'
                 name='f_login'
                 value=''>
    Mot de Passe:<input type='password'
                 name='f_pw'
                 value=''>
    <input type='submit' name='valider' value='Se Connecter'>
</form>
    