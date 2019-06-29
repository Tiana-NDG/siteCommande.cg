<?php 
    require_once('../database.php');
?>
<?php

    $code = $_GET['Code'];

    $delete = $bdd->prepare('DELETE FROM Produits WHERE CODE_PRO = ?'); 

    $variables = array($code);

    $delete->execute($variables);

    header("location:AfficherProduit.php");