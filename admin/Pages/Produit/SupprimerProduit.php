<?php 
    require_once('../database.php');
?>
<?php

    $code = $_GET['id'];

    $delete = $bdd->prepare('DELETE FROM Pieces WHERE CodePro = ?'); 

    $variables = array($code);

    $delete->execute($variables);

    header("location:AfficherProduit.php");