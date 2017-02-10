<?php
function executeRequete($cnx, $sql, $parametre=NULL){
    if($parametre==NULL){
        // requete simple
        $idRequete=$cnx->query($sql);
    } else {
        // requete preparé
        $idRequete = $cnx->prepare($sql);
        $idRequete->execute($parametre);
    }
    return $idRequete; 
}

