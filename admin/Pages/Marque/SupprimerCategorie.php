<?php
    require_once('../database.php');
    $code = $_GET['id'];

    $req = $bdd->prepare('DELETE FROM Categorie WHERE CODE_CAT=?');
    $valeur = array($code);
    $req->execute($valeur);

    header('location:AfficherCategorie.php');
?>