<?php
session_start();//sans cette session le html ne marche pas
if (!isset($_SESSION['login'])){
    header('location:authentification.php');
}
?>
<!DOCTYPE html>
<head>
    
</head>
<body>
    <?php
        echo'Bonjour '.$_SESSION['login'];
        
    ?>
    </br>
    <a href="deconnexion.php">Déconnexion</a>
</body>